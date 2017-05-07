<?php
/**
 * Author: bfunky
 */

namespace BFunky\HttpParser\Entity;


use BFunky\HttpParser\Exception\HttpParserBadFormatException;

class HttpDataValidation
{
    /**
     * @param string $httpLine
     * @return bool
     */
    public static function isField(string $httpLine)
    {
        return (strpos($httpLine, ':') !== false);
    }

    /**
     * @param string $method
     * @param string $path
     * @param string $protocol
     * @throws HttpParserBadFormatException
     */
    public static function checkHeaderOrRaiseError(string $method, string $path, string $protocol)
    {
        if (empty($method) || empty($path) || empty($protocol)) {
            throw new HttpParserBadFormatException();
        }
    }
}