<?php
/**
 * Author: Jairo Rodríguez <jairo@bfunky.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BFunky\HttpParser\Exception;

abstract class AbstractHttpParserException extends \Exception
{
    /**
     * AbstractHttpParserException constructor.
     * @param string $message
     * @param int $code
     * @param \Exception|null $previous
     */
    public function __construct(string $message = "", int $code = 0, \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}