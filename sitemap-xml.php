<?php
ob_start();

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/functions.php';

$siteUrl = 'https://webtecmart.com';

// Static pages: sirf wahi jinki file actually exist karti hai
$staticPaths = [
    '/'                               => 'index.php',
    '/about.php'                      => 'about.php',
    '/services.php'                   => 'services.php',
    '/packages.php'                   => 'packages.php',
    '/portfolio.php'                  => 'portfolio.php',
    '/blogs.php'                      => 'blogs.php',
    '/contact.php'                    => 'contact.php',
    '/seo-services-delhi.php'         => 'seo-services-delhi.php',
    '/website-design-development.php' => 'website-design-development.php',
    '/digital-business-branding.php'  => 'digital-business-branding.php',
    '/search-engine-marketing.php'    => 'search-engine-marketing.php',
    '/social-media-optimization.php'  => 'social-media-optimization.php',
    '/mobile-app-development.php'     => 'mobile-app-development.php',
    '/content-marketing.php'          => 'content-marketing.php',
    '/performance-marketing.php'      => 'performance-marketing.php',
    '/local-seo.php'                  => 'local-seo.php',
    '/ecommerce-seo.php'              => 'ecommerce-seo.php',
    '/b2b-exhibition-seo.php'         => 'b2b-exhibition-seo.php',
    '/privacy-policy.php'             => 'privacy-policy.php',
    '/terms-conditions.php'           => 'terms-conditions.php',
];

$urls = [];
foreach ($staticPaths as $path => $file) {
    if (is_file(__DIR__ . '/' . $file)) {
        $urls[] = ['loc' => $siteUrl . $path, 'lastmod' => null];
    }
}

// Sirf DB ke ACTIVE blogs: naye auto aayenge, delete/inactive auto hatenge
$activeBlogs = [];
try {
    $statement = db()->query("SELECT id, updated_at FROM content_items WHERE content_type = 'blog' AND is_active = 1");
    foreach ($statement->fetchAll() as $row) {
        $id = (int) (isset($row['id']) ? $row['id'] : 0);
        if ($id <= 0) {
            continue;
        }
        $lastmod = null;
        $updatedAt = trim((string) (isset($row['updated_at']) ? $row['updated_at'] : ''));
        if ($updatedAt !== '') {
            try {
                $date = new DateTimeImmutable($updatedAt, new DateTimeZone('UTC'));
                $lastmod = $date->format('Y-m-d\TH:i:sP');
            } catch (Exception $e) {
                $lastmod = null;
            }
        }
        $activeBlogs[$id] = $lastmod;
    }
} catch (Throwable $e) {
    $activeBlogs = [];
}

$seenBlogUrls = [];
try {
    $posts = blogPosts();
} catch (Throwable $e) {
    $posts = [];
}
foreach ($posts as $post) {
    $id = (int) (isset($post['id']) ? $post['id'] : 0);

    // Purane / demo / inactive blogs skip
    if ($id <= 0 || !array_key_exists($id, $activeBlogs)) {
        continue;
    }

    $loc = $siteUrl . blogUrl($post);
    if (isset($seenBlogUrls[$loc])) {
        continue;
    }
    $seenBlogUrls[$loc] = true;

    $urls[] = ['loc' => $loc, 'lastmod' => $activeBlogs[$id]];
}

// config/functions ka koi bhi extra output hata do
while (ob_get_level() > 0) {
    ob_end_clean();
}

header('Content-Type: application/xml; charset=UTF-8');
header('Cache-Control: no-cache, must-revalidate');

echo '<' . '?xml version="1.0" encoding="UTF-8"?' . '>' . "\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
foreach ($urls as $url) {
    echo "    <url>\n";
    echo '        <loc>' . htmlspecialchars($url['loc'], ENT_XML1 | ENT_QUOTES, 'UTF-8') . "</loc>\n";
    if ($url['lastmod'] !== null) {
        echo '        <lastmod>' . htmlspecialchars($url['lastmod'], ENT_XML1 | ENT_QUOTES, 'UTF-8') . "</lastmod>\n";
    }
    echo "    </url>\n";
}
echo '</urlset>' . "\n";
exit;