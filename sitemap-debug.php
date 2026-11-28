<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

register_shutdown_function(function () {
    $e = error_get_last();
    echo "\n<pre>SHUTDOWN: " . ($e ? print_r($e, true) : 'no fatal error') . "</pre>";
});

echo "<pre>STEP 0: start\n";
echo "PHP version: " . PHP_VERSION . "\n";
echo "short_open_tag: " . ini_get('short_open_tag') . "\n";
echo "sitemap-xml.php exists: " . (is_file(__DIR__ . '/sitemap-xml.php') ? 'yes' : 'NO') . "\n";
flush();

try {
    require_once __DIR__ . '/config.php';
    echo "STEP 1: config.php OK\n"; flush();

    require_once __DIR__ . '/functions.php';
    echo "STEP 2: functions.php OK\n"; flush();

    $rows = db()->query("SELECT COUNT(*) FROM content_items WHERE content_type = 'blog' AND is_active = 1")->fetchColumn();
    echo "STEP 3: DB OK, active blogs = $rows\n"; flush();

    $posts = blogPosts();
    echo "STEP 4: blogPosts() OK, count = " . count($posts) . "\n"; flush();
} catch (Throwable $e) {
    echo "ERROR: " . $e->getMessage() . "\nFILE: " . $e->getFile() . ":" . $e->getLine() . "\n";
}
echo "</pre>";