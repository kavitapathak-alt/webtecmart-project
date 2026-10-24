<?php
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/functions.php';

$requestedSlug = trim((string) ($_GET['slug'] ?? ''));
$service = null;
if ($requestedSlug !== '' && preg_match('/^[a-z0-9]+(?:-[a-z0-9]+)*$/', $requestedSlug)) {
    foreach (serviceDetailPages() as $servicePage) {
        if (($servicePage['slug'] ?? '') === $requestedSlug) {
            $service = $servicePage;
            break;
        }
    }
}

if ($service === null) {
    http_response_code(404);
    $packagesPageMeta = [
        'page_meta_title' => 'Service not found | ' . APP_NAME,
        'page_meta_description' => 'The requested service page is unavailable.',
    ];
    require_once __DIR__ . '/app/templates/header.php';
    ?>
    <main class="container py-5 text-center">
        <h1>Service not found</h1>
        <p>This service may have been unpublished or removed.</p>
        <a class="btn btn-primary" href="/services.php">View all services</a>
    </main>
    <?php
    require_once __DIR__ . '/app/templates/footer.php';
    exit;
}

$packagesPageMeta = [
    'page_meta_title' => $service['title'] . ' | ' . APP_NAME,
    'page_meta_description' => $service['summary'] ?? '',
];
require_once __DIR__ . '/app/templates/header.php';
require_once __DIR__ . '/app/templates/service-page-layout.php';

renderServicePageLayout([
    'icon' => $service['icon'] ?? 'sparkles',
    'title' => $service['title'] ?? 'Service',
    'tagline' => $service['tagline'] ?? '',
    'heroDescription' => $service['hero_description'] ?? ($service['summary'] ?? ''),
    'overview' => $service['body'] ?? '',
    'features' => $service['features'] ?? [],
    'process' => $service['process'] ?? [],
    'faqs' => $service['faqs'] ?? [],
]);

require_once __DIR__ . '/app/templates/footer.php';
