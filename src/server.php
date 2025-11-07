<?php

$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

// If the requested file exists in the public directory, let the built-in server serve it directly
if ($uri !== '/' && file_exists(__DIR__ . '/public' . $uri)) {
    return false;
}

// Otherwise, forward the request to Laravel's front controller
require_once __DIR__ . '/public/index.php';


