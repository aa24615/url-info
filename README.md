

# zyan/url-info

url信息


## 要求

1. php >= 7.3
2. Composer

## 安装

```shell
composer require zyan/url-info -vvv
```
## 用法

```php

use Zyan\UrlInfo\UrlInfo;

$urlInfo = new UrlInfo('http://www.baidu.com/abc/123/test.php?a=2');

```

获取所有信息

```php

$urlInfo->getData();

/*

Array
(
    [url] => http://www.baidu.com/123/abc/123.php?abc=1
    [scheme] => http
    [host] => www.baidu.com
    [port] => 80
    [domain] => baidu.com
    [suffix] => com
    [base_url] => http://www.baidu.com
    [pwd_url] => http://www.baidu.com/123/abc
    [dirname] => /123/abc
    [filename] => 123
    [extension] => php
    [query] => abc=1
    [file] => 123.php
)
*/

```

单个获取

```php
//获取协议
$urlInfo->getScheme();

//获取域名
$urlInfo->getHost();

//获取端口
$urlInfo->getPort();

//获取顶级域名
$urlInfo->getDomain();

//获取域名后缀
$urlInfo->getSuffix();

//获取文件后缀
$urlInfo->getExtension();

//获取根URL
$urlInfo->getBaseUrl();

//获取文件全名
$urlInfo->getFile();

//获取文件名(不带后缀)
$urlInfo->getFilename();

//获取传入的URL
$urlInfo->getUrl();

//获取GET参数
$urlInfo->getQuery();

//获取文件当前URL
$urlInfo->getPwdUrl();

//获取文件当前目录
$urlInfo->getDirname();


```

## 参与贡献

1. fork 当前库到你的名下
3. 在你的本地修改完成审阅过后提交到你的仓库
4. 提交 PR 并描述你的修改，等待合并
> 注: 本项目同时发布在gitee 请使用github提交      
> github: https://github.com/aa24615/url-info

## License

[MIT license](https://opensource.org/licenses/MIT)
