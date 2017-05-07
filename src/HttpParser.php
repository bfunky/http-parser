<?php
/**
 * Author: jairo.rodriguez <jairo@bfunky.net>
 */

namespace BFunky\HttpParser;

use \BFunky\HttpParser\Entity\HttpField;
use \BFunky\HttpParser\Entity\HttpRequestHeader;
use \BFunky\HttpParser\Entity\HttpResponseHeader;
use \BFunky\HttpParser\Entity\HttpHeaderInterface;
use \BFunky\HttpParser\Exception\HttpParserBadFormatException;

class HttpParser
{
    /**
     * @var string
     */
    protected $httpRaw;

    /**
     * @var HttpHeaderInterface
     */
    protected $httpHeader;

    /**
     * @var HttpField[]
     */
    protected $httpFields;

    /**
     * HttpParser constructor.
     */
    public function __construct()
    {
    }

    /**
     * @param string $rawHttpHeader
     */
    public function parseHttpRequestHeader(string $rawHttpHeader)
    {
        list($header, $fieldList) = $this->processHeader($rawHttpHeader);
        $this->httpHeader = new HttpRequestHeader($header[0], $header[1], $header[2]);
        $this->processFields($fieldList);
    }

    /**
     * @param string $rawHttpHeader
     */
    public function parseHttpResponseHeader(string $rawHttpHeader)
    {
        list($header, $fieldList) = $this->processHeader($rawHttpHeader);
        $this->httpHeader = new HttpResponseHeader($header[0], $header[1], $header[2]);
        $this->processFields($fieldList);
    }

    /**
     * @param string $headerFieldName
     * @return string
     */
    public function get(string $headerFieldName): string
    {
        $value = '';
        foreach ($this->httpFields as $httpField) {
            if ($httpField->getName() === $headerFieldName) {
                $value = $httpField->getValue();
                break;
            }

        }
        return $value;
    }

    /**
     * @return HttpHeaderInterface
     */
    public function getHeader(): HttpHeaderInterface
    {
        return $this->httpHeader;
    }

    /**
     * @param string $rawHttpHeader
     * @return array
     */
    protected function processHeader(string $rawHttpHeader): array
    {
        $this->setHttpRaw($rawHttpHeader);
        return $this->extract();
    }

    /**
     * Split the http string
     * @return array
     * @throws HttpParserBadFormatException
     */
    protected function extract(): array
    {
        $header = array();
        $fieldList = array();
        $headers = explode("\n", $this->httpRaw);
        foreach ($headers as $i => $headerLine) {
            if (trim($headerLine) === '') {
                continue;
            }
            $parts = $this->splitRawLine($headerLine);
            if (isset($parts[1])) {
                $fieldList[$parts[0]] = $parts[1];
            } else {
                $header = preg_split('/ /', $headerLine);
                if (count($header) != 3) {
                    throw new HttpParserBadFormatException();
                }
            }
        }
        return array($header, $fieldList);
    }

    /**
     * @param string $line
     * @return array
     */
    protected function splitRawLine(string $line): array
    {
        $parts = array();
        if (strpos($line, ': ') !== false) {
            $parts = explode(': ', $line);
        } else if (strpos($line, ':') !== false) {
            $parts = explode(':', $line);
        }
        return $parts;
    }

    /**
     * @param array $fieldList
     */
    protected function processFields(array $fieldList)
    {
        foreach ($fieldList as $fieldName => $fieldValue) {
            $this->httpFields [] = new HttpField($fieldName, $fieldValue);
        }
    }

    /**
     * @param string $httpRaw
     * @return HttpParser
     */
    protected function setHttpRaw(string $httpRaw): HttpParser
    {
        $this->httpRaw = $httpRaw;
        return $this;
    }


}