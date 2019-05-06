# -*- coding: utf-8 -*-
from urllib import request
import hashlib
import json
import time
import datetime
import re

import smtplib
from email.mime.text import MIMEText


HEBCDI_LIST = [
    'http://www.hebcdi.gov.cn/node_122866.htm',
    'http://www.hebcdi.gov.cn/node_124627.htm',
]

CCDI = 'http://www.ccdi.gov.cn/scdc/'

CONFIG_FILE = 'config.json'

SEND_LIST = []


def getHebcdListHtml(url):
    wp = request.urlopen(url)
    return wp.read()


def md5(str):
    m = hashlib.md5()
    m.update(str)
    return m.hexdigest()


def readConfig():
    return json.loads(open(CONFIG_FILE, 'r').read())


def updateConfig(config):
    f = open(CONFIG_FILE, 'w')
    f.write(json.dumps(config))
    f.close()


def parseList(html, startTime):
    list = html.decode('UTF-8', 'strict').split('<div class="feed-item">')
    for index in range(len(list)):
        r = re.search(
            r'<h2><a href="(.*?)">(.*?)</a></h2> <div class="feed-time">(.*?)</div>', list[index])
        if r:
            timeArray = time.strptime(r.group(3), "%Y-%m-%d")
            timeStamp = int(round(time.mktime(timeArray) * 1000))
            if timeStamp > startTime:
                SEND_LIST.append({
                    "url": 'http://www.hebcdi.gov.cn/'+r.group(1),
                    "title": r.group(2),
                    "date": r.group(3)
                })


def sendEmail(config):
    msg_from = config['email']
    passward = config['password']
    msg_to = config['to']

    subject = '【重要】检测到新信息更新'
    content = ''
    print(str(SEND_LIST))
    for index in range(len(SEND_LIST)):
        item = SEND_LIST[index]
        content += '<a href="%s" target="_blank">%s</a><em>%s</em><br />' % (
            item['url'], item['title'], item['date']
        )
        content += '<hr>'

    content += '<br/>'*5+'<h6>%s</h6>' % config['signature']
    msg = MIMEText(content, 'html', 'utf-8')
    msg['Subject'] = subject
    msg['From'] = msg_from
    msg['To'] = msg_to

    try:
        s = smtplib.SMTP('smtp.163.com', 25)
        s.login(msg_from, passward)
        s.sendmail(msg_from, msg_to, msg.as_string())
        print('发送成功')
    except smtplib.SMTPException as e:
        print('发送失败' + format(e))
    finally:
        s.quit()


if __name__ == "__main__":
    config = readConfig()
    print('PRISM START..., INIT CONFIG = %s' % str(config))
    if not config.get('startTime'):
        config['startTime'] = int(round(time.time() * 1000))
        updateConfig(config)

    for index in range(len(HEBCDI_LIST)):
        url = HEBCDI_LIST[index]
        html = getHebcdListHtml(url)
        stamp = md5(html)
        original = config.get(url)
        if stamp != original:
            config[url] = stamp
            updateConfig(config)
            parseList(html, config['startTime'])

    if len(SEND_LIST):
        sendEmail(config)
