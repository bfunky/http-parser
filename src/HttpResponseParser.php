<?php
/**
 * Author: bfunky
 */

namespace BFunky\HttpParser;


use BFunky\HttpParser\Entity\HttpResponseHeader;

class HttpResponseParser extends AbstractHttpParser
{
    /**
     * @param string $method
     * @param string $path
     * @param string $protocol
     */
    protected function setHttpHeader(string $method, string $path, string $protocol)
    {
        $this->httpHeader = new HttpResponseHeader($method, $path, $protocol);
    }
}