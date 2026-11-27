<?php
$key = isset($_GET['key']) ? $_GET['key'] : null;
if (!is_string($key) || !hash_equals('wtm2026', $key)) {
    http_response_code(403);
    exit('Forbidden');
}

header('Content-Type: text/plain; charset=UTF-8');
echo PHP_VERSION;
