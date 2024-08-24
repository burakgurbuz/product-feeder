<?php

namespace PtteM\ProductFeeder\Exceptions;

class ExceptionHandler
{
    /**
     * @param $exception
     * @return void
     */
    public static function handleException($exception): void
    {
        date_default_timezone_set('Europe/Istanbul');
        $time = date('F j, Y, g:i a e O');
        $message = "[{$time}] {$exception->getMessage()}\n";

        error_log($message, 3, BASE_PATH . 'logs/errors.log');

        echo 'Whoops, looks like something went wrong!';
    }
}
