<?php
/**
 * Author: Jairo Rodríguez <jairo@bfunky.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BFunky\HttpParser\Entity;

class HttpResponseHeader implements HttpHeaderInterface
{
    /**
     * @var string
     */
    protected $protocol;

    /**
     * @var string
     */
    protected $code;

    /**
     * @var string
     */
    protected $message;

    /**
     * HttpResponseHeader constructor.
     * @param string $protocol
     * @param string $code
     * @param string $message
     */
    public function __construct(string $protocol, string $code, string $message)
    {
        $this->protocol = $protocol;
        $this->code = $code;
        $this->message = $message;
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
     * @return HttpResponseHeader
     */
    public function setProtocol(string $protocol): HttpResponseHeader
    {
        $this->protocol = $protocol;
        return $this;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     * @return HttpResponseHeader
     */
    public function setCode(string $code): HttpResponseHeader
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     * @return HttpResponseHeader
     */
    public function setMessage(string $message): HttpResponseHeader
    {
        $this->message = $message;
        return $this;
    }
}