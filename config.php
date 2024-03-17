<?php

define('APP_ROOT',  __DIR__);

$errorLogPath = APP_ROOT . '/logs/error.log';

function errorHandler($severity, $message, $file, $line) {
    global $errorLogPath;
    $error = date('[Y-m-d H:i:s]') . " [$severity] $message in $file on line $line" . PHP_EOL;
    error_log($error, 3, $errorLogPath);
}

set_error_handler('errorHandler');

function exceptionHandler($exception) {
    global $errorLogPath;
    $error = date('[Y-m-d H:i:s]') . ' [Exception] ' . $exception->getMessage() . ' in ' . $exception->getFile() . ' on line ' . $exception->getLine() . PHP_EOL;
    error_log($error, 3, $errorLogPath);
}

set_exception_handler('exceptionHandler');

echo $undefinedVariable;