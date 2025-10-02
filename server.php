<?php

/**
 * Laravel Server for Long Running Requests
 * خادم Laravel مخصص للطلبات طويلة المدى
 */

// Set memory and time limits
ini_set('memory_limit', '1G');
ini_set('max_execution_time', 0);
set_time_limit(0);

// Handle SIGTERM gracefully
if (function_exists('pcntl_signal')) {
    pcntl_signal(SIGTERM, function () {
        echo "\nServer shutting down gracefully...\n";
        exit(0);
    });
}

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? ''
);

// This file allows us to emulate Apache's "mod_rewrite" functionality from the
// built-in PHP web server. This provides a convenient way to test a Laravel
// application without having installed a "real" web server software here.
if ($uri !== '/' && file_exists(__DIR__.'/public'.$uri)) {
    return false;
}

require_once __DIR__.'/public/index.php';