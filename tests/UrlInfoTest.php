<?php
/*
 * This file is part of the zyan/url-info.
 *
 * (c) 读心印 <aa24615@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
use Zyan\UrlInfo\UrlInfo;

/**
 * Class UrlInfoTest.
 *
 *
 * @author 读心印 <aa24615@qq.com>
 */
class UrlInfoTest extends \PHPUnit\Framework\TestCase
{
    public function testGetData()
    {
        $urlInfo = new UrlInfo('http://www.baidu.com');
        $data = $urlInfo->getData();
        $this->assertTrue(is_array($data));
    }
}
