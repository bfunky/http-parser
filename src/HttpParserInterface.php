<?php
/**
 * Author: jairo.rodriguez <jairo@bfunky.net>
 */

namespace BFunky\HttpParser;


interface HttpParserInterface
{
    /**
     * @param string $rawHttpHeader
     */
    public function parse(string $rawHttpHeader): void;
}