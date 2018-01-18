<?php
/**
 * Author: jairo.rodriguez <jairo@bfunky.net>
 */

namespace BFunky\HttpParser;


use BFunky\HttpParser\Entity\HttpResponseHeader;

class HttpResponseParser extends AbstractHttpParser
{
    /**
     * @inheritdoc
     */
    protected function setHttpHeader(string $method, string $path, string $protocol): void
    {
        $this->httpHeader = new HttpResponseHeader($method, $path, $protocol);
    }
}