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
 * Class UrlInfoStatic.
 *
 * @package Zyan\UrlInfo
 *
 * @author 读心印 <aa24615@qq.com>
 */
class UrlInfoStatic
{
    /**
     * @var array
     */
    protected static $urls = [];


    /**
     * set.
     *
     * @param string $url
     *
     * @return UrlInfo
     *
     * @author 读心印 <aa24615@qq.com>
     */
    public static function setUrl(string $url)
    {
        if (!isset(self::$urls[$url])) {
            self::$urls[$url] = new UrlInfo($url);
        }

        return self::$urls[$url];
    }
}
