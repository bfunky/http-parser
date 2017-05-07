<?php
/**
 * Author: bfunky
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
        $this->httpFields = $httpFields;
    }

    /**
     * @param HttpField $obj
     */
    public function add(HttpField $obj)
    {
        $this->httpFields[$obj->getName()] = $obj;
    }

    /**
     * @param string $key
     * @throws HttpFieldNotFoundOnCollection
     */
    public function delete(string $key)
    {
        $this->checkKeyExists($key);
        unset($this->httpFields[$key]);
    }

    /**
     * @param string $key
     * @return HttpField
     * @throws HttpFieldNotFoundOnCollection
     */
    public function get(string $key)
    {
        $this->checkKeyExists($key);
        return $this->httpFields[$key];
    }

    /**
     * @param $key
     * @throws HttpFieldNotFoundOnCollection
     */
    private function checkKeyExists($key)
    {
        if (is_null($this->httpFields[$key])) {
            throw new  HttpFieldNotFoundOnCollection('Field ' . $key . ' not found');
        }
    }

    /**
     * @param array $httpFields
     * @return HttpFieldCollection
     */
    public static function fromHttpFieldArray(array $httpFields)
    {
        return new self($httpFields);
    }
}