<?php
/**
 * Author: jairo.rodriguez <jairo@bfunky.net>
 */

namespace BFunky\Test\HttpParser\Entity;

use BFunky\HttpParser\Entity\HttpField;
use PHPUnit\Framework\TestCase;

class HttpFieldTest extends TestCase
{

    public function testGetters()
    {
        $field = new HttpField('a name' ,'a value');
        $this->assertEquals($field->getName(), 'a name');
        $this->assertEquals($field->getValue(), 'a value');
    }

    public function testSetters()
    {
        $field = new HttpField('a name' ,'a value');
        $field->setName('a different name');
        $field->setValue('a different value');
        $this->assertEquals($field->getName(), 'a different name');
        $this->assertEquals($field->getValue(), 'a different value');
    }
}