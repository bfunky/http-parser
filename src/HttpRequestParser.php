<?php
/**
 * Author: jairo.rodriguez <jairo@bfunky.net>
 */

namespace BFunky\HttpParser;


use BFunky\HttpParser\Entity\HttpRequestHeader;

class HttpRequestParser extends AbstractHttpParser
{
    /**
     * @inheritdoc
     */
    protected function setHttpHeader(string $method, string $path, string $protocol): void
    {
        $this->httpHeader = new HttpRequestHeader($method, $path, $protocol);
    }
}