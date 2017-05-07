<?php
/**
 * Author: bfunky
 */

namespace BFunky\HttpParser;


use BFunky\HttpParser\Entity\HttpRequestHeader;

class HttpRequestParser extends AbstractHttpParser
{
    /**
     * @param string $method
     * @param string $path
     * @param string $protocol
     */
    protected function setHttpHeader(string $method, string $path, string $protocol)
    {
        $this->httpHeader = new HttpRequestHeader($method, $path, $protocol);
    }
}