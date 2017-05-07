<?php
/**
 * Author: jairo.rodriguez <jairo@bfunky.net>
 */

namespace BFunky\HttpParser\Entity;


class HttpField
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $value;

    /**
     * HttpHeaderField constructor.
     * @param string $name
     * @param string $value
     */
    public function __construct(string $name, string $value)
    {
        $this->name = $name;
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return HttpField
     */
    public function setName(string $name): HttpField
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     * @return HttpField
     */
    public function setValue(string $value): HttpField
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @param string $key
     * @param string $value
     * @return HttpField
     */
    public static function fromKeyAndValue(string $key, string $value){
        return new self($key, $value);
    }
}