<?php
/**
 * Author: bfunky
 */

namespace BFunky\Test\HttpParser\Entity;


use BFunky\HttpParser\Entity\HttpDataValidation;
use PHPUnit\Framework\TestCase;

class HttpDataValidationTest extends TestCase
{
    public function testIsFieldValidationWithAFieldLine(){
        $line = 'Pragma: no-cache';
        $this->assertTrue(HttpDataValidation::isField($line));
    }

    public function testIsFieldValidationWithAHeader(){
        $line = 'HTTP/1.1 200 OK';
        $this->assertFalse(HttpDataValidation::isField($line));
    }
}
