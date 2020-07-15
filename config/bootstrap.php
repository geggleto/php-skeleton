<?php

define('APP_ROOT', dirname(__DIR__));

if (!defined('APP_ENV')) {
    $env = getenv('APP_ENV') ?? 'development';
    define('APP_ENV', $env);
}

include_once APP_ROOT . '/vendor/autoload.php';

