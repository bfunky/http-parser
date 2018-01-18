<?php
/**
 * Author: jairo.rodriguez <jairo@bfunky.net>
 */

namespace BFunky\Test\HttpParser\Entity;


use BFunky\HttpParser\Entity\HttpDataValidation;
use PHPUnit\Framework\TestCase;
use \BFunky\HttpParser\Exception\HttpParserBadFormatException;

class HttpDataValidationTest extends TestCase
{
    public function testIsFieldValidationWithAFieldLine()
    {
        $line = 'Pragma: no-cache';
        $this->assertTrue(HttpDataValidation::isField($line));
    }

    public function testIsFieldValidationWithAHeader()
    {
        $line = 'HTTP/1.1 200 OK';
        $this->assertFalse(HttpDataValidation::isField($line));
    }

    public function testCheckHeaderOrRaiseErrorWithAWrongHeader()
    {
        $this->expectException(HttpParserBadFormatException::class);
        HttpDataValidation::checkHeaderOrRaiseError('POST', '', '');
    }

    public function testCheckHeaderOrRaiseErrorWithACorrectHeader()
    {
        $return = HttpDataValidation::checkHeaderOrRaiseError('POST', '/path', 'HTTP/1.1');
        $this->assertNull($return);
    }
}
