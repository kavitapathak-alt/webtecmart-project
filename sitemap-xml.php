<?php
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/functions.php';

header('Content-Type: application/xml; charset=UTF-8');

$siteUrl = 'https://webtecmart.com';
$staticPaths = [
    '/',
    '/about.php',
    '/services.php',
    '/packages.php',
    '/portfolio.php',
    '/blogs.php',
    '/contact.php',
    '/seo-services-delhi.php',
    '/website-design-development.php',
    '/digital-business-branding.php',
    '/search-engine-marketing.php',
    '/social-media-optimization.php',
    '/mobile-app-development.php',
    '/content-marketing.php',
    '/performance-marketing.php',
    '/local-seo.php',
    '/ecommerce-seo.php',
    '/privacy-policy.php',
    '/terms-conditions.php',
];

$urls = [];
foreach ($staticPaths as $path) {
    $urls[] = ['loc' => $siteUrl . $path, 'lastmod' => null];
}

$blogPosts = blogPosts();
$updatedAtByBlogId = [];
$statement = db()->query("SELECT id, updated_at FROM content_items WHERE content_type = 'blog' AND is_active = 1");
foreach ($statement->fetchAll() as $row) {
    $id = (int) ($row['id'] ?? 0);
    $updatedAt = trim((string) ($row['updated_at'] ?? ''));
    if ($id > 0 && $updatedAt !== '') {
        $date = new DateTimeImmutable($updatedAt, new DateTimeZone('UTC'));
        $updatedAtByBlogId[$id] = $date->format('Y-m-d\TH:i:sP');
    }
}

$seenBlogUrls = [];
foreach ($blogPosts as $post) {
    $loc = $siteUrl . blogUrl($post);
    if (isset($seenBlogUrls[$loc])) {
        continue;
    }
    $seenBlogUrls[$loc] = true;
    $id = (int) ($post['id'] ?? 0);
    $urls[] = [
        'loc' => $loc,
        'lastmod' => $updatedAtByBlogId[$id] ?? null,
    ];
}
?>
<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<?php foreach ($urls as $url): ?>
    <url>
        <loc><?= htmlspecialchars($url['loc'], ENT_XML1 | ENT_QUOTES, 'UTF-8') ?></loc>
        <?php if ($url['lastmod'] !== null): ?>
        <lastmod><?= htmlspecialchars($url['lastmod'], ENT_XML1 | ENT_QUOTES, 'UTF-8') ?></lastmod>
        <?php endif; ?>
    </url>
<?php endforeach; ?>
</urlset>
