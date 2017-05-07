<?php
/**
 * Author: jairo.rodriguez <jairo@bfunky.net>
 */

namespace BFunky\HttpParser;

use BFunky\HttpParser\Entity\HttpDataValidation;
use BFunky\HttpParser\Entity\HttpField;
use BFunky\HttpParser\Entity\HttpFieldCollection;
use BFunky\HttpParser\Entity\HttpHeaderInterface;
use BFunky\HttpParser\Exception\HttpFieldNotFoundOnCollection;
use BFunky\HttpParser\Exception\HttpParserBadFormatException;

abstract class AbstractHttpParser implements HttpParserInterface
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
     * @var HttpFieldCollection
     */
    protected $httpFieldCollection;

    /**
     * HttpParser constructor.
     * @param HttpFieldCollection $httpFieldCollection
     */
    public function __construct(HttpFieldCollection $httpFieldCollection = null)
    {
        $this->httpFieldCollection = $httpFieldCollection ?? HttpFieldCollection::fromHttpFieldArray([]);
    }

    /**
     * @param string $rawHttp
     */
    public function parse(string $rawHttp)
    {
        $this->process($rawHttp);
    }

    /**
     * @param string $headerFieldName
     * @return string
     * @throws HttpFieldNotFoundOnCollection
     */
    public function get(string $headerFieldName): string
    {
        $httpField = $this->httpFieldCollection->get($headerFieldName);
        return $httpField->getValue();
    }

    /**
     * @return HttpHeaderInterface
     */
    public function getHeader(): HttpHeaderInterface
    {
        return $this->httpHeader;
    }

    /**
     * @param string $rawHttp
     */
    protected function process(string $rawHttp)
    {
        $this->setHttpRaw($rawHttp);
        $this->extract();
    }

    /**
     * Split the http string
     * @throws HttpParserBadFormatException
     */
    protected function extract()
    {
        $headers = explode("\n", $this->httpRaw);
        foreach ($headers as $i => $headerLine) {
            if (trim($headerLine) === '') {
                continue;
            }
            if (HttpDataValidation::isField($headerLine)) {
                $this->addField($headerLine);
            } else {
                $this->addHeader($headerLine);
            }
        }
    }

    /**
     * @param string $headerLine
     * @throws HttpParserBadFormatException
     */
    protected function addHeader(string $headerLine)
    {
        $data = preg_split('/ /', $headerLine);
        $data = array_merge($data, ['', '', '']);
        HttpDataValidation::checkHeaderOrRaiseError($data[0], $data[1], $data[2]);
        $this->setHttpHeader($data[0], $data[1], $data[2]);
    }

    /**
     * @param string $headerLine
     */
    protected function addField(string $headerLine)
    {
        list($fieldKey, $fieldValue) = $this->splitRawLine($headerLine);
        $this->httpFieldCollection->add(HttpField::fromKeyAndValue($fieldKey, $fieldValue));
    }

    /**
     * @param string $method
     * @param string $path
     * @param string $protocol
     */
    abstract protected function setHttpHeader(string $method, string $path, string $protocol);

    /**
     * @param string $line
     * @return array
     */
    protected function splitRawLine(string $line): array
    {
        $parts = [];
        if (strpos($line, ': ') !== false) {
            $parts = explode(': ', $line);
        } else if (strpos($line, ':') !== false) {
            $parts = explode(':', $line);
        }
        return $parts;
    }

    /**
     * @param string $httpRaw
     * @return HttpParserInterface
     */
    protected function setHttpRaw(string $httpRaw): HttpParserInterface
    {
        $this->httpRaw = $httpRaw;
        return $this;
    }
}