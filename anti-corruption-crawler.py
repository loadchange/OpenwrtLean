# -*- coding: utf-8 -*-
from urllib import request
import hashlib
import json
import time

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
    print('='*99)
    print(html)
    print('='*99)


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

        print(url)
        print(stamp == original)
        # print('*'*88)
        # print(html)
        # print('*'*88)
        # print(stamp)
