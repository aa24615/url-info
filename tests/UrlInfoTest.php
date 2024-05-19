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
        $urlInfo = new UrlInfo('http://www.baidu.com/');
        $data = $urlInfo->getData();

        $this->assertTrue(is_array($data));



    }

    public function testPortIs8000(){

        $urlInfo = new UrlInfo('http://www.baidu.com:8000');
        $data = $urlInfo->getData();

        $this->assertTrue($data['base_url']=='http://www.baidu.com:8000');
        $this->assertTrue($data['port']=='8000');

    }

    public function testIsFilename(){

        $urlInfo = new UrlInfo('http://www.baidu.com:8000/abc/123.php');
        $data = $urlInfo->getData();

        $this->assertTrue($data['base_url']=='http://www.baidu.com:8000');
        $this->assertTrue($data['port']=='8000');
        $this->assertTrue($data['filename']=='123');
        $this->assertTrue($data['dirname']=='/abc');

    }


    public function testBase(){

        $urlInfo = new UrlInfo('http://www.baidu.com/123/abc/123.php?abc=1');
        $data = $urlInfo->getData();
        $this->assertTrue($data['base_url']=='http://www.baidu.com');
        $this->assertTrue($data['port']=='80');
        $this->assertTrue($data['filename']=='123');
        $this->assertTrue($data['dirname']=='/123/abc');

    }

    public function testTest(){
        $urlInfo = new UrlInfo('http://www.baidu.com/123/abc/123.php?abc=1');


    }

}
