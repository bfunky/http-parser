<?php
/**
 * Author: bfunky
 */

namespace BFunky\Test\HttpParser\Entity;


use BFunky\HttpParser\Entity\HttpDataValidation;
use PHPUnit\Framework\TestCase;

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

    /**
     * @expectedException \BFunky\HttpParser\Exception\HttpParserBadFormatException
     */
    public function testCheckHeaderOrRaiseErrorWithAWrongHeader()
    {
        HttpDataValidation::checkHeaderOrRaiseError('POST', '', '');
    }

    public function testCheckHeaderOrRaiseErrorWithACorrectHeader()
    {
        HttpDataValidation::checkHeaderOrRaiseError('POST', '/path', 'HTTP/1.1');
    }
}
