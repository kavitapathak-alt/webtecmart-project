<?php
$diagnosticKey = $_GET['key'] ?? null;
if (!is_string($diagnosticKey) || !hash_equals('wtm2026', $diagnosticKey)) {
    http_response_code(403);
    header('Content-Type: text/plain; charset=UTF-8');
    exit("Forbidden\n");
}

require_once __DIR__ . '/config.php';

header('Content-Type: text/plain; charset=UTF-8');
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');

$statement = db()->query(
    "SELECT id, title, LENGTH(body) AS body_length, LENGTH(metadata) AS metadata_length
     FROM content_items
     WHERE content_type = 'blog'
     ORDER BY id"
);

echo "Blog rows:\n";
while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    $title = str_replace(["\r", "\n", "\t"], ' ', (string) $row['title']);
    printf(
        "id=%d\ttitle=%s\tbody_length=%d\tmetadata_length=%d\n",
        (int) $row['id'],
        $title,
        (int) $row['body_length'],
        (int) $row['metadata_length']
    );
}

echo "\nPHP limits:\n";
foreach (['post_max_size', 'upload_max_filesize', 'max_input_vars', 'memory_limit'] as $setting) {
    printf("%s=%s\n", $setting, (string) ini_get($setting));
}

echo "\nExtensions:\n";
printf("iconv=%s\n", extension_loaded('iconv') ? 'loaded' : 'not loaded');
printf("mbstring=%s\n", extension_loaded('mbstring') ? 'loaded' : 'not loaded');
