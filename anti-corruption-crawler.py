# -*- coding: utf-8 -*-
from urllib import request
import hashlib
import json
import time
import datetime
import re


HEBCDI_LIST = [
    'http://www.hebcdi.gov.cn/node_122866.htm',
    'http://www.hebcdi.gov.cn/node_124627.htm',
]

CONFIG_FILE = 'config.json'


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
    pattern = re.compile(r'<div class="feed">([\s\S]*)</div><div id="displaypagenum"')
    result = pattern.findall(html.decode('UTF-8', 'strict'))
    if len(result):
        list = result[0].split('<div class="feed-item">')
        for index in range(len(list)):
            r = re.search(r'<div class="feed-time">([\S]*)</div>', list[index])
            if r:
                timeArray = time.strptime(r.group(1), "%Y-%m-%d")
                timeStamp = int(round(time.mktime(timeArray) * 1000))
                if timeStamp > startTime:
                    print(timeStamp)


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
        if stamp != original or not index:
            config[url] = stamp
            updateConfig(config)
            parseList(html, config['startTime'])

        print(url)
        print(stamp == original)
        # print('*'*88)
        # print(html)
        # print('*'*88)
        # print(stamp)
