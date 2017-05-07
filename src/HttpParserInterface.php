<?php
/**
 * Author: bfunky
 */

namespace BFunky\HttpParser;


interface HttpParserInterface
{
    /**
     * @param string $rawHttpHeader
     */
    public function parse(string $rawHttpHeader);
}