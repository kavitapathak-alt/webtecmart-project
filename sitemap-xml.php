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
$seenBlogUrls = [];
foreach ($blogPosts as $post) {
    $loc = $siteUrl . blogUrl($post);
    if (isset($seenBlogUrls[$loc])) {
        continue;
    }
    $seenBlogUrls[$loc] = true;
    $publishedAt = trim((string) ($post['date'] ?? ''));
    $publishedTimestamp = $publishedAt !== '' ? strtotime($publishedAt) : false;
    $urls[] = [
        'loc' => $loc,
        'lastmod' => $publishedTimestamp !== false ? date('Y-m-d', $publishedTimestamp) : null,
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
