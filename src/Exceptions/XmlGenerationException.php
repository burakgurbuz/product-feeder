<?php

namespace PtteM\ProductFeeder\Exceptions;

use RuntimeException;
use Throwable;

class XmlGenerationException extends RuntimeException
{
    /**
     * @param $message
     * @param $code
     * @param Throwable|null $previous
     */
    public function __construct($message = "Failed to generate XML.", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
