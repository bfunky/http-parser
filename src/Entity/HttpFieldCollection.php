<?php
/**
 * Author: jairo.rodriguez <jairo@bfunky.net>
 */

namespace BFunky\HttpParser\Entity;


use BFunky\HttpParser\Exception\HttpFieldNotFoundOnCollection;

class HttpFieldCollection
{
    /**
     * @var HttpField[]
     */
    protected $httpFields;

    /**
     * HttpFieldCollection constructor.
     * @param HttpField[] $httpFields
     */
    public function __construct(array $httpFields = [])
    {
        $this->httpFields = [];
        foreach ($httpFields as $httpField) {
            $this->httpFields[$httpField->getName()] = $httpField;
        }
    }

    /**
     * @param HttpField $obj
     */
    public function add(HttpField $obj): void
    {
        $this->httpFields[$obj->getName()] = $obj;
    }

    /**
     * @param string $key
     * @throws HttpFieldNotFoundOnCollection
     */
    public function delete(string $key): void
    {
        $this->checkKeyExists($key);
        unset($this->httpFields[$key]);
    }

    /**
     * @param string $key
     * @return HttpField
     * @throws HttpFieldNotFoundOnCollection
     */
    public function get(string $key): HttpField
    {
        $this->checkKeyExists($key);
        return $this->httpFields[$key];
    }

    /**
     * @param $key
     * @throws HttpFieldNotFoundOnCollection
     */
    private function checkKeyExists($key): void
    {
        if (!array_key_exists($key, $this->httpFields)) {
            throw new  HttpFieldNotFoundOnCollection('Field ' . $key . ' not found');
        }
    }

    /**
     * @param array $httpFields
     * @return self
     */
    public static function fromHttpFieldArray(array $httpFields): self
    {
        return new self($httpFields);
    }
}