<?php
/**
 * Author: jairo.rodriguez <jairo@bfunky.net>
 */

namespace BFunky\Test\HttpParser\Entity;

use BFunky\HttpParser\Entity\HttpResponseHeader;
use PHPUnit\Framework\TestCase;

class HttpResponseHeaderTest extends TestCase
{

    public function testGetters()
    {
        $field = new HttpResponseHeader('a protocol', 'a code', 'a message');
        $this->assertEquals($field->getProtocol(), 'a protocol');
        $this->assertEquals($field->getCode(), 'a code');
        $this->assertEquals($field->getMessage(), 'a message');
    }

    public function testSetters()
    {
        $field = new HttpResponseHeader('a protocol', 'a code', 'a message');
        $field->setProtocol('a different protocol');
        $field->setCode('a different code');
        $field->setMessage('a different message');
        $this->assertEquals($field->getProtocol(), 'a different protocol');
        $this->assertEquals($field->getCode(), 'a different code');
        $this->assertEquals($field->getMessage(), 'a different message');
    }
}