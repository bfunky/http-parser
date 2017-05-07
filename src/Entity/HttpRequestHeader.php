<?php
/**
 * Author: jairo.rodriguez <jairo@bfunky.net>
 */

namespace BFunky\HttpParser\Entity;


class HttpRequestHeader implements HttpHeaderInterface
{
    /**
     * @var string
     */
    protected $method;

    /**
     * @var string
     */
    protected $path;

    /**
     * @var string
     */
    protected $protocol;

    /**
     * HttpRequestHeader constructor.
     * @param string $method
     * @param string $path
     * @param string $protocol
     */
    public function __construct(string $method, string $path, string $protocol)
    {
        $this->method = $method;
        $this->path = $path;
        $this->protocol = $protocol;
    }


    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @param string $method
     * @return HttpRequestHeader
     */
    public function setMethod(string $method): HttpRequestHeader
    {
        $this->method = $method;
        return $this;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @param string $path
     * @return HttpRequestHeader
     */
    public function setPath(string $path): HttpRequestHeader
    {
        $this->path = $path;
        return $this;
    }

    /**
     * @return string
     */
    public function getProtocol(): string
    {
        return $this->protocol;
    }

    /**
     * @param string $protocol
     * @return HttpRequestHeader
     */
    public function setProtocol(string $protocol): HttpRequestHeader
    {
        $this->protocol = $protocol;
        return $this;
    }
}