<?php
/**
 * Author: jairo.rodriguez <jairo@bfunky.net>
 */

namespace BFunky\Test\HttpParser\Entity;

use BFunky\HttpParser\Entity\HttpRequestHeader;
use PHPUnit\Framework\TestCase;

class HttpRequestHeaderTest extends TestCase
{

    public function testGetters()
    {
        $field = new HttpRequestHeader('a method', 'a path', 'a protocol');
        $this->assertEquals($field->getMethod(), 'a method');
        $this->assertEquals($field->getPath(), 'a path');
        $this->assertEquals($field->getProtocol(), 'a protocol');
    }

    public function testSetters()
    {
        $field = new HttpRequestHeader('a method', 'a path', 'a protocol');
        $field->setMethod('a different method');
        $field->setPath('a different path');
        $field->setProtocol('a different protocol');
        $this->assertEquals($field->getMethod(), 'a different method');
        $this->assertEquals($field->getPath(), 'a different path');
        $this->assertEquals($field->getProtocol(), 'a different protocol');
    }
}