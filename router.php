<?php
/**
 * Router script for PHP built-in web server:
 * Run locally with: php -S localhost:8000 router.php
 */

$uri = urldecode(parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH));
$filePath = __DIR__ . $uri;

// 1. Direct static files
if ($uri !== '/' && file_exists($filePath) && !is_dir($filePath)) {
    return false;
}

// 2. Protect sensitive files
if (preg_match('~^\/(?:\.env|\.git|storage\/site\.db|composer\.(?:json|lock))~i', $uri)) {
    http_response_code(403);
    echo "403 Forbidden";
    exit;
}

// 3. Root URL
if ($uri === '' || $uri === '/') {
    require __DIR__ . '/index.php';
    exit;
}

// 4. Blog routing: /blog/slug-or-id
if (preg_match('~^\/blog\/([a-zA-Z0-9_-]+)\/?$~', $uri, $m)) {
    $param = $m[1];
    if (ctype_digit($param)) {
        $_GET['id'] = (int) $param;
    } else {
        $_GET['slug'] = $param;
    }
    require __DIR__ . '/blog.php';
    exit;
}

// 5. Blog listing: /blogs or /blog
if ($uri === '/blogs' || $uri === '/blog') {
    require __DIR__ . '/blogs.php';
    exit;
}

// 6. Service detail routing: /service/slug or /services/slug
if (preg_match('~^\/services?\/([a-zA-Z0-9_-]+)\/?$~', $uri, $m)) {
    $slug = $m[1];
    // Check if dedicated file exists, e.g. /services/ecommerce-seo -> ecommerce-seo.php
    if (file_exists(__DIR__ . '/' . $slug . '.php')) {
        require __DIR__ . '/' . $slug . '.php';
        exit;
    }
    $_GET['slug'] = $slug;
    require __DIR__ . '/service.php';
    exit;
}

// 7. Delhi SEO and Exhibition SEO shortcuts
if (in_array($uri, ['/b2b-seo', '/exhibition-seo', '/b2b-exhibition-seo'], true)) {
    require __DIR__ . '/b2b-exhibition-seo.php';
    exit;
}

// 7. Delhi SEO shortcuts
if (in_array($uri, ['/seo-company-in-delhi', '/seo-services-in-delhi', '/digital-marketing-agency-delhi', '/seo-services-delhi'], true)) {
    require __DIR__ . '/seo-services-delhi.php';
    exit;
}

// 8. Extensionless clean URLs: e.g. /about -> /about.php
if (file_exists(__DIR__ . $uri . '.php')) {
    require __DIR__ . $uri . '.php';
    exit;
}

// 9. Standard file with .php
if (file_exists($filePath)) {
    require $filePath;
    exit;
}

// 10. 404 Not Found
http_response_code(404);
require_once __DIR__ . '/functions.php';
$pageMeta = ['title' => 'Page Not Found | ' . APP_NAME];
require_once __DIR__ . '/app/templates/header.php';
?>
<main class="container text-center py-5" style="min-height:50vh;display:flex;flex-direction:column;align-items:center;justify-content:center;">
    <h1 style="font-size:3rem;font-weight:800;color:var(--primary);margin-bottom:12px;">404</h1>
    <h2 style="font-size:1.6rem;font-weight:700;margin-bottom:14px;">Page Not Found</h2>
    <p style="color:#6B7280;max-width:500px;margin-bottom:24px;">The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.</p>
    <a href="/" class="btn" style="background:var(--primary);color:#fff;padding:12px 28px;border-radius:50px;font-weight:700;text-decoration:none;">Back to Home</a>
</main>
<?php
require_once __DIR__ . '/app/templates/footer.php';
