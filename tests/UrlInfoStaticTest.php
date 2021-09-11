<?php
/*
 * This file is part of the zyan/url-info.
 *
 * (c) 读心印 <aa24615@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
use Zyan\UrlInfo\UrlInfoStatic;

/**
 * Class UrlInfoStaticTest.
 *
 *
 * @author 读心印 <aa24615@qq.com>
 */
class UrlInfoStaticTest extends \PHPUnit\Framework\TestCase
{
    public function testGetData()
    {
        $data = UrlInfoStatic::setUrl('http://www.baidu.com')->getData();

        $this->assertTrue(is_array($data));

        $data2 = UrlInfoStatic::setUrl('https://www.qq."com')->getData();

        $this->assertTrue(is_array($data2));
    }
}
