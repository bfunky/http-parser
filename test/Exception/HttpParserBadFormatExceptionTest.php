<?php
/**
 * Author: jairo.rodriguez <jairo@bfunky.net>
 */

namespace BFunky\Test\HttpParser\Exception;

use BFunky\HttpParser\Exception\HttpParserBadFormatException;
use PHPUnit\Framework\TestCase;

class HttpParserBadFormatExceptionTest extends TestCase
{
    public function testMessage()
    {
        $exception = new HttpParserBadFormatException();
        $this->assertEquals($exception->getMessage(), 'Bad format on raw data');
    }
}