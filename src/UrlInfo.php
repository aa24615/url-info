<?php
/*
 * This file is part of the zyan/url-info.
 *
 * (c) 读心印 <aa24615@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Zyan\UrlInfo;

/**
 * Class UrlInfo.
 *
 * @package Zyan\UrlInfo
 *
 * @author 读心印 <aa24615@qq.com>
 */
class UrlInfo
{
    /**
     * @var string
     */
    protected $url = null;
    /**
     * @var array
     */
    protected $parseUrl = null;
    /**
     * @var array
     */
    protected $domainInfo = null;
    /**
     * @var string[]
     */
    protected $suffixs = [
        'com.cn',
        'net.cn',
        'gov.cn',
        'org.cn',
        'com',
        'net',
        'cn',
        'org',
        'live',
        'vip',
        'me',
        'tv',
        'cc',
        'hk',
        'link',
        'top',
        'sh',
    ];




    /**
     * UrlInfo constructor.
     *
     * @param string $url
     * @param array $suffixs
     *
     * @author 读心印 <aa24615@qq.com>
     */
    public function __construct(string $url, array $suffixs = [])
    {
        $this->setUrl($url);

        if ($suffixs) {
            $this->setSuffixs($suffixs);
        }
    }


    /**
     * setUrl.
     *
     * @param string $url
     *
     * @return void
     *
     * @author 读心印 <aa24615@qq.com>
     */
    public function setUrl(string $url)
    {
        $this->url = strtolower(urldecode($url));
    }

    /**
     * setSuffixs.
     *
     * @param array $suffixs
     *
     * @return void
     *
     * @author 读心印 <aa24615@qq.com>
     */
    public function setSuffixs(array $suffixs)
    {
        $this->suffixs = array_merge($this->suffixs, $suffixs);
    }

    /**
     * getParseUrl.
     *
     * @return array
     *
     * @author 读心印 <aa24615@qq.com>
     */
    protected function getParseUrl()
    {
        if (is_null($this->parseUrl)) {
            $this->parseUrl = parse_url($this->url);
        }
        return $this->parseUrl;
    }

    /**
     * getDomainInfo.
     *
     * @return array
     *
     * @author 读心印 <aa24615@qq.com>
     */
    protected function getDomainInfo()
    {
        $this->getParseUrl();

        if (is_null($this->domainInfo)) {
            preg_match("/[^\\.]+\.(".join('|', $this->suffixs).")/", $this->getHost(), $matches);
            $this->domainInfo = $matches;
        }

        return $this->domainInfo;
    }

    /**
     * getData.
     *
     * @return array
     *
     * @author 读心印 <aa24615@qq.com>
     */
    public function getData()
    {
        return [
            'scheme' => $this->getScheme(),
            'host' => $this->getHost(),
            'port' => $this->getPort(),
            'domain' => $this->getDomain(),
            'suffix' => $this->getSuffix(),
        ];
    }
    /**
     * getScheme.
     *
     * @return string
     *
     * @author 读心印 <aa24615@qq.com>
     */
    public function getScheme()
    {
        return $this->getParseUrl()['scheme'] ?? '';
    }

    /**
     * getHost.
     *
     * @return string
     *
     * @author 读心印 <aa24615@qq.com>
     */
    public function getHost()
    {
        return $this->getParseUrl()['host'] ?? '';
    }

    /**
     * getPort.
     *
     * @return int
     *
     * @author 读心印 <aa24615@qq.com>
     */
    public function getPort()
    {
        $port = $this->getParseUrl()['port'] ?? '';
        if (!empty($port)) {
            return $port;
        }

        $scheme = $this->getScheme();
        $port = 0;
        switch ($scheme) {
            case 'http':
                $port = 80;
                break;
            case 'https':
                $port = 443;
                break;
        }

        return $port;
    }
    /**
     * getDomain.
     *
     * @return string
     *
     * @author 读心印 <aa24615@qq.com>
     */
    public function getDomain()
    {
        return $this->getDomainInfo()[0] ?? '';
    }
    /**
     * getSuffix.
     *
     * @return string
     *
     * @author 读心印 <aa24615@qq.com>
     */
    public function getSuffix()
    {
        return $this->getDomainInfo()[1] ?? '';
    }
}
