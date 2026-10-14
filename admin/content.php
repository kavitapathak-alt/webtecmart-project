<?php
/*
 * PHP 7.2 compatibility: str_starts_with / str_ends_with / str_contains PHP 8.0 ke functions hain.
 * Ye polyfill purane PHP pe unhe define kar deta hai. Naye PHP pe apne aap skip ho jata hai.
 * Ye require_once se pehle rakha hai taaki functions.php ke liye bhi available rahe.
 */
if (!function_exists('str_starts_with')) {
    function str_starts_with($haystack, $needle)
    {
        $haystack = (string) $haystack;
        $needle = (string) $needle;
        return $needle === '' || strncmp($haystack, $needle, strlen($needle)) === 0;
    }
}
if (!function_exists('str_ends_with')) {
    function str_ends_with($haystack, $needle)
    {
        $haystack = (string) $haystack;
        $needle = (string) $needle;
        return $needle === '' || substr($haystack, -strlen($needle)) === $needle;
    }
}
if (!function_exists('str_contains')) {
    function str_contains($haystack, $needle)
    {
        $haystack = (string) $haystack;
        $needle = (string) $needle;
        return $needle === '' || strpos($haystack, $needle) !== false;
    }
}

require_once __DIR__ . '/../functions.php';
ensureAdmin();

$pages = [
    'index.php' => 'Homepage',
    'about.php' => 'About Us',
    'services.php' => 'Services',
    'packages.php' => 'Packages',
    'pricing.php' => 'Pricing',
    'portfolio.php' => 'Portfolio / Projects',
    'blog.php' => 'Blog / Insights',
    'contact.php' => 'Contact Us',
    'digital-business-branding.php' => 'Digital Business Branding',
    'website-design-development.php' => 'Website Design & Development',
    'search-engine-optimization.php' => 'Search Engine Optimization',
    'search-engine-marketing.php' => 'Search Engine Marketing',
    'social-media-optimization.php' => 'Social Media Optimization',
    'mobile-app-development.php' => 'Mobile App Development',
];

$collections = [
    'service' => ['label' => 'What We Do / Services', 'page' => 'index.php', 'description' => 'Service cards shown in the homepage services section.', 'icon' => '◇'],
    'testimonial' => ['label' => 'Testimonials', 'page' => 'index.php', 'description' => 'Client reviews displayed in the homepage testimonial carousel.', 'icon' => '“'],
    'success_story' => ['label' => 'SEO Portfolio / Case Studies', 'page' => 'index.php', 'description' => 'SEO success stories shown in the homepage portfolio section.', 'icon' => '↗'],
    'blog' => ['label' => 'Blog / Insights', 'page' => 'blog.php', 'description' => 'Articles made available to the blog page.', 'icon' => '▤'],
    'pricing' => ['label' => 'Pricing Plans', 'page' => 'pricing.php', 'description' => 'Plans and feature lists used on the pricing pages.', 'icon' => '₹'],
];

$homeSections = [
    'hero' => ['Hero Section', 'Homepage headline and lead-generation hero are rendered by the homepage PHP component.'],
    'partners' => ['Trusted Partners', 'Partner logos are defined by the homepage Trusted Partners component.'],
    'about' => ['About WebTecMart', 'Agency introduction and metrics are rendered by the homepage About component.'],
    'visibility' => ['Search Visibility', 'Search visibility content is rendered by the homepage Search Visibility component.'],
    'contact' => ['Contact Form', 'The homepage contact form is handled by the existing contact workflow.'],
    'footer' => ['Footer', 'The public footer is shared from the site template.'],
];

$selectedSection = trim($_GET['section'] ?? $_POST['section'] ?? 'collection:service');
$sectionInfo = null;
$sectionType = '';
$sectionPage = '';
$isRegistry = false;
$registryKey = '';

if (str_starts_with($selectedSection, 'collection:')) {
    $sectionType = substr($selectedSection, strlen('collection:'));
    if (isset($collections[$sectionType])) $sectionInfo = $collections[$sectionType];
} elseif (str_starts_with($selectedSection, 'page:')) {
    $sectionPage = substr($selectedSection, strlen('page:'));
    if (isset($pages[$sectionPage])) {
        $sectionType = 'page';
        $sectionInfo = ['label' => 'Page Content Blocks', 'page' => $sectionPage, 'description' => 'Additional content blocks shown on this page using the existing public page template.', 'icon' => '▧'];
    }
} elseif (str_starts_with($selectedSection, 'registry:') && ($selectedSection === 'registry:homepage' || isset($homeSections[substr($selectedSection, strlen('registry:'))]))) {
    $isRegistry = true;
    $sectionType = 'homepage';
    $registryKey = substr($selectedSection, strlen('registry:'));
    $registrySection = $homeSections[$registryKey] ?? null;
    $sectionInfo = ['label' => $registrySection[0] ?? 'Homepage Section Directory', 'page' => 'index.php', 'description' => $registrySection[1] ?? 'Browse homepage sections from the existing content records and PHP components.', 'icon' => '⌂'];
}

if ($sectionInfo === null) {
    $selectedSection = 'collection:service';
    $sectionType = 'service';
    $sectionInfo = $collections[$sectionType];
}

if (!isset($_SESSION['cms_csrf_token'])) $_SESSION['cms_csrf_token'] = bin2hex(random_bytes(32));

$setFlash = static function (string $kind, string $message): void {
    $_SESSION['cms_flash'] = ['kind' => $kind, 'message' => $message];
};

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = $_POST['csrf_token'] ?? '';
    if (!is_string($token) || !hash_equals($_SESSION['cms_csrf_token'], $token)) {
        http_response_code(400);
        $setFlash('error', 'Your session could not be verified. Refresh the page and try again.');
        redirect('/admin/content.php?section=' . rawurlencode($selectedSection));
    }
    try {
        if ($isRegistry) throw new RuntimeException('This homepage section is rendered by a PHP component and is not editable in the current CMS.');
        $action = $_POST['action'] ?? '';
        $id = filter_var($_POST['id'] ?? 0, FILTER_VALIDATE_INT) ?: 0;

        if ($action === 'delete' || $action === 'toggle') {
            $existing = $id > 0 ? cmsGetById($id) : null;
            if (!$existing || $existing['content_type'] !== $sectionType) throw new RuntimeException('The selected content could not be found in this section.');
            $existingMetadata = json_decode($existing['metadata'] ?? '', true);
            $existingMetadata = is_array($existingMetadata) ? $existingMetadata : [];
            if ($sectionType === 'page' && ($existingMetadata['page'] ?? '') !== $sectionPage) throw new RuntimeException('The selected content does not belong to this page.');
            if ($action === 'delete') { cmsDelete($id); $setFlash('success', 'Content deleted.'); }
            else { cmsSetActive($id, empty($existing['is_active'])); $setFlash('success', empty($existing['is_active']) ? 'Content published.' : 'Content unpublished.'); }
        } elseif ($action === 'create' || $action === 'update') {
            if (trim($_POST['title'] ?? '') === '') throw new RuntimeException('A title is required.');
            $existing = null; $metadata = [];
            if ($action === 'update') {
                $existing = $id > 0 ? cmsGetById($id) : null;
                if (!$existing || $existing['content_type'] !== $sectionType) throw new RuntimeException('The selected content could not be found in this section.');
                $metadata = json_decode($existing['metadata'] ?? '', true);
                $metadata = is_array($metadata) ? $metadata : [];
                if ($sectionType === 'page' && ($metadata['page'] ?? '') !== $sectionPage) throw new RuntimeException('The selected content does not belong to this page.');
            } elseif ($sectionType === 'page') $metadata['page'] = $sectionPage;

            $summary = trim($_POST['summary'] ?? '');
            $body = trim($_POST['body'] ?? '');

            switch ($sectionType) {
                case 'service':
                    $href = trim($_POST['href'] ?? '');
                    if ($href !== '' && ((str_starts_with($href, '//')) || (!str_starts_with($href, '/') && (!filter_var($href, FILTER_VALIDATE_URL) || !in_array(parse_url($href, PHP_URL_SCHEME), ['http', 'https'], true))))) throw new RuntimeException('Enter a valid service link using an http(s) URL or a site path.');
                    $metadata['icon'] = trim($_POST['icon'] ?? ''); $metadata['href'] = $href; break;
                case 'pricing':
                    $price = trim($_POST['price'] ?? '');
                    if ($price === '') throw new RuntimeException('A plan price is required.');
                    $metadata['price'] = $price; $metadata['popular'] = isset($_POST['popular']); break;
                case 'testimonial':
                    $rating = filter_var($_POST['rating'] ?? 5, FILTER_VALIDATE_INT);
                    if ($rating === false || $rating < 1 || $rating > 5) throw new RuntimeException('Choose a rating from 1 to 5 stars.');
                    if ($summary === '') throw new RuntimeException('A testimonial description is required.');
                    $metadata['name'] = trim($_POST['title']); $metadata['role'] = trim($_POST['role'] ?? '');
                    $metadata['quote'] = $summary; $metadata['rating'] = $rating; break;
                case 'success_story':
                    $website = trim($_POST['website'] ?? '');
                    if ($website !== '' && (!filter_var($website, FILTER_VALIDATE_URL) || !in_array(parse_url($website, PHP_URL_SCHEME), ['http', 'https'], true))) throw new RuntimeException('Enter a valid project URL beginning with http:// or https://.');
                    $metadata['description'] = $summary;
                    foreach (['industry', 'country', 'duration', 'result'] as $field) $metadata[$field] = trim($_POST[$field] ?? '');
                    $metadata['website'] = $website; break;
            }
            if (isset($_FILES['image']) && ($_FILES['image']['error'] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_NO_FILE) $metadata['image'] = uploadCmsImage($_FILES['image']);
            cmsSave($sectionType, trim($_POST['title']), $summary, $body, $metadata, $action === 'update' ? $id : null);
            $setFlash('success', $action === 'update' ? 'Content updated successfully.' : 'Content added successfully.');
        } else throw new RuntimeException('The requested action is not supported.');
    } catch (Throwable $exception) {
        error_log('CMS content action failed: ' . $exception->getMessage());
        $setFlash('error', $exception instanceof RuntimeException ? $exception->getMessage() : 'Content could not be saved. Please try again.');
    }
    redirect('/admin/content.php?section=' . rawurlencode($selectedSection));
}

serviceCards(); pricingPlans(); testimonials(); blogPosts(); successStories(); homepageSections();

$allItems = cmsAllContent();

// PHP 7.2 fix: arrow function (fn) ki jagah normal anonymous function
$homepageRecords = array_values(array_filter($allItems, static function (array $item): bool {
    return $item['content_type'] === 'homepage';
}));

$homepageSectionTargets = ['Hero Section' => 'registry:hero', 'Trusted Partners' => 'registry:partners', 'About WebTecMart' => 'registry:about', 'What We Do' => 'collection:service', 'Search Visibility' => 'registry:visibility', 'SEO Portfolio' => 'collection:success_story', 'Testimonials' => 'collection:testimonial', 'Contact Form' => 'registry:contact'];
$items = array_values(array_filter($allItems, static function (array $item) use ($sectionType, $sectionPage, $isRegistry): bool {
    if ($item['content_type'] !== $sectionType) return false;
    if ($sectionType === 'page') { $metadata = json_decode($item['metadata'] ?? '', true); return is_array($metadata) && ($metadata['page'] ?? '') === $sectionPage; }
    return !$isRegistry || $sectionType === 'homepage';
}));

$search = trim($_GET['q'] ?? '');
if ($search !== '') {
    $needle = function_exists('mb_strtolower') ? mb_strtolower($search) : strtolower($search);
    $items = array_values(array_filter($items, static function (array $item) use ($needle): bool {
        $text = implode(' ', [$item['title'] ?? '', $item['summary'] ?? '', $item['body'] ?? '']);
        $text = function_exists('mb_strtolower') ? mb_strtolower($text) : strtolower($text);
        return str_contains($text, $needle);
    }));
}

$editId = filter_var($_GET['edit'] ?? 0, FILTER_VALIDATE_INT) ?: 0;
$editingItem = null;
if ($editId > 0 && !$isRegistry) foreach ($items as $item) if ((int) $item['id'] === $editId) { $editingItem = $item; break; }
$editingMetadata = json_decode($editingItem['metadata'] ?? '', true);
$editingMetadata = is_array($editingMetadata) ? $editingMetadata : [];
$itemCountByType = []; $itemCountByPage = [];
foreach ($allItems as $item) {
    $itemCountByType[$item['content_type']] = ($itemCountByType[$item['content_type']] ?? 0) + 1;
    if ($item['content_type'] === 'page') {
        $metadata = json_decode($item['metadata'] ?? '', true);
        if (is_array($metadata) && isset($pages[$metadata['page'] ?? ''])) $itemCountByPage[$metadata['page']] = ($itemCountByPage[$metadata['page']] ?? 0) + 1;
    }
}
$flash = $_SESSION['cms_flash'] ?? null;
unset($_SESSION['cms_flash']);

require_once __DIR__ . '/templates/header.php';
?>
<!-- Bootstrap 5 + Icons + Font -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<style>
    /* Bootstrap reboot header ke links pe underline laga deta hai — usko hata diya */
    a { text-decoration: none; }

    .cms-shell {
        --brand: #C4007A;
        --brand-deep: #A3005F;
        --brand-soft: #FCE8F3;
        --brand-faint: #FFF4FA;

        --bs-primary: var(--brand);
        --bs-primary-rgb: 196, 0, 122;
        --bs-link-color: var(--brand);
        --bs-link-hover-color: var(--brand-deep);
        --bs-body-font-family: 'Plus Jakarta Sans', system-ui, -apple-system, 'Segoe UI', Arial, sans-serif;

        font-family: var(--bs-body-font-family);
        letter-spacing: normal;
        background: #FBF8F1;
        color: #1f1b24;
        min-height: calc(100vh - 72px);
        padding: 1.5rem 0 3rem;
    }

    /* Brand buttons */
    .cms-shell .btn-primary {
        --bs-btn-bg: var(--brand);
        --bs-btn-border-color: var(--brand);
        --bs-btn-hover-bg: var(--brand-deep);
        --bs-btn-hover-border-color: var(--brand-deep);
        --bs-btn-active-bg: var(--brand-deep);
        --bs-btn-active-border-color: var(--brand-deep);
        --bs-btn-disabled-bg: var(--brand);
        --bs-btn-disabled-border-color: var(--brand);
        --bs-btn-focus-shadow-rgb: 196, 0, 122;
        font-weight: 600;
    }
    .cms-shell .btn { font-weight: 600; }

    /* Form focus ring in brand color */
    .cms-shell .form-control:focus,
    .cms-shell .form-select:focus {
        border-color: #e0398f;
        box-shadow: 0 0 0 .22rem rgba(196, 0, 122, .14);
    }
    .cms-shell .form-check-input:checked { background-color: var(--brand); border-color: var(--brand); }
    .cms-shell .form-check-input:focus { border-color: #e0398f; box-shadow: 0 0 0 .22rem rgba(196, 0, 122, .14); }

    /* Page title (header ka global h1 size override) */
    .cms-shell .cms-title { font-size: 1.35rem !important; line-height: 1.3 !important; font-weight: 700 !important; letter-spacing: -.01em !important; margin: 0 0 .25rem !important; }

    /* Cards */
    .cms-card { border: 1px solid rgba(36, 26, 38, .07); border-radius: 1rem; box-shadow: 0 8px 24px rgba(35, 19, 32, .05); background: #fff; }

    /* Sidebar */
    @media (min-width: 992px) {
        .cms-sticky { position: sticky; top: 88px; }
        .cms-side { max-height: calc(100vh - 112px); overflow-y: auto; scrollbar-width: thin; }
    }
    .cms-side-title { font-size: .7rem; font-weight: 700; letter-spacing: .08em; color: #8d8590; padding: .25rem .75rem .5rem; }
    .cms-link {
        display: flex; align-items: center; gap: .65rem;
        padding: .5rem .75rem; border-radius: .65rem;
        color: #4b4452; font-size: .86rem; line-height: 1.3;
        transition: background .15s, color .15s;
    }
    .cms-link:hover { background: var(--brand-faint); color: var(--brand-deep); }
    .cms-link.active { background: var(--brand-soft); color: var(--brand-deep); font-weight: 700; }
    .cms-ico { width: 1.15rem; flex: none; text-align: center; color: var(--brand); }
    .cms-count { margin-left: auto; font-size: .7rem; font-weight: 600; color: #7d7583; background: #f4eff3; border-radius: 50rem; padding: .12rem .5rem; }
    .cms-link.active .cms-count { background: #fff; color: var(--brand-deep); }

    .cms-group-toggle {
        display: flex; align-items: center; gap: .65rem; width: 100%;
        padding: .55rem .75rem; border: 0; background: transparent; border-radius: .65rem;
        color: #29232d; font-weight: 700; font-size: .86rem; text-align: left;
    }
    .cms-group-toggle:hover { background: #f8f5f7; }
    .cms-group-toggle .bi-chevron-down { margin-left: auto; font-size: .72rem; color: #928995; transition: transform .2s; }
    .cms-group-toggle[aria-expanded="false"] .bi-chevron-down { transform: rotate(-90deg); }
    .cms-children { margin: .15rem 0 .35rem 1.2rem; padding-left: .55rem; border-left: 1px solid #eee7ed; }

    /* Records */
    .cms-thumb { width: 56px; height: 56px; flex: none; border-radius: .75rem; object-fit: cover; }
    .cms-thumb-ph { display: grid; place-items: center; background: var(--brand-soft); color: var(--brand); font-size: 1.35rem; }
    .cms-record { padding: 1rem 1.25rem; transition: background .15s; }
    .cms-record:hover { background: #fffafd; }
    .cms-record h3 { font-size: 1rem; font-weight: 700; margin: 0 0 .2rem; overflow-wrap: anywhere; }
    .cms-record p { margin: 0; font-size: .85rem; color: #6c6672; overflow-wrap: anywhere; }

    /* Directory */
    .cms-dir-item { border: 1px solid #eee9ed; border-radius: .85rem; padding: 1rem; height: 100%; transition: border-color .15s, box-shadow .15s; }
    .cms-dir-item:hover { border-color: #e5c4d6; box-shadow: 0 4px 14px rgba(50, 28, 43, .05); }

    .cms-modal { border-radius: 1rem; }

    /* Tablet & below */
    @media (max-width: 991.98px) {
        .cms-shell { padding-top: 1rem; }
    }

    /* Mobile */
    @media (max-width: 575.98px) {
        .cms-shell { padding-bottom: 2rem; }
        .cms-shell .cms-title { font-size: 1.2rem !important; }
        #cmsAddButton { width: 100%; }

        .cms-record { padding: .9rem; }
        .cms-thumb { width: 44px; height: 44px; border-radius: .6rem; }
        .cms-record h3 { font-size: .95rem; }
        .cms-record p { font-size: .82rem; }

        /* Edit / Publish / Delete: ek line me 3 equal buttons */
        .cms-record-actions { display: grid !important; grid-template-columns: repeat(3, 1fr); gap: .5rem; width: 100%; padding-top: .75rem; border-top: 1px solid #f1ecef; }
        .cms-record-actions form { display: block !important; }
        .cms-record-actions .btn { width: 100%; padding: .4rem .25rem; font-size: .78rem; white-space: nowrap; }
        .cms-record-actions .btn .bi { margin-right: .25rem !important; }

        .cms-shell .cms-modal { border-radius: 0; }
        .cms-shell .modal-body, .cms-shell .modal-header, .cms-shell .modal-footer { padding-left: 1rem !important; padding-right: 1rem !important; }
        .cms-shell .modal-footer .btn { flex: 1; }
    }
</style>

<div class="cms-shell">
    <div class="container-xxl px-3 px-lg-4">

        <?php if ($flash): ?>
            <?php $flashClass = ($flash['kind'] ?? 'success') === 'error' ? 'danger' : 'success'; ?>
            <div class="alert alert-<?= $flashClass ?> alert-dismissible fade show d-flex align-items-center shadow-sm" role="status">
                <i class="bi bi-<?= $flashClass === 'danger' ? 'exclamation-triangle-fill' : 'check-circle-fill' ?> me-2"></i>
                <div><?= e($flash['message'] ?? '') ?></div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <!-- Mobile: sections menu (header ke Menu se alag) -->
        <button class="btn btn-white bg-white border shadow-sm w-100 d-lg-none d-flex align-items-center gap-2 mb-3 py-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#cmsSidebar" aria-controls="cmsSidebar">
            <i class="bi bi-layout-sidebar-inset" style="color:var(--brand)"></i>
            <span class="text-truncate"><?= e($isRegistry ? 'Homepage Section Directory' : $sectionInfo['label']) ?></span>
            <span class="ms-auto small text-body-secondary">Sections <i class="bi bi-chevron-down ms-1"></i></span>
        </button>

        <div class="row g-4 align-items-start">

            <!-- ===== SIDEBAR ===== -->
            <div class="col-lg-3">
                <aside class="offcanvas-lg offcanvas-start cms-sticky" tabindex="-1" id="cmsSidebar" aria-label="Website sections">
                    <div class="offcanvas-header border-bottom d-lg-none">
                        <h5 class="offcanvas-title fw-bold">Website management</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#cmsSidebar" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body p-0">
                        <nav class="cms-card cms-side p-2 w-100">
                            <div class="cms-side-title d-none d-lg-block">WEBSITE MANAGEMENT</div>

                            <a class="cms-link" href="/admin/dashboard.php">
                                <span class="cms-ico"><i class="bi bi-house-door"></i></span>Dashboard
                            </a>

                            <!-- Homepage group -->
                            <button class="cms-group-toggle mt-1" type="button" data-bs-toggle="collapse" data-bs-target="#grp-home" aria-expanded="true" aria-controls="grp-home">
                                <span class="cms-ico"><i class="bi bi-house"></i></span>Homepage
                                <i class="bi bi-chevron-down"></i>
                            </button>
                            <div class="collapse show" id="grp-home">
                                <div class="cms-children">
                                    <a class="cms-link <?= $selectedSection === 'registry:homepage' ? 'active' : '' ?>" href="?section=registry%3Ahomepage">
                                        <span class="cms-ico"><i class="bi bi-grid-3x3-gap"></i></span>Section directory
                                        <span class="cms-count"><?= count($homepageRecords) + 1 ?></span>
                                    </a>
                                    <?php foreach ($homeSections as $key => [$homeSectionLabel]): ?>
                                        <a class="cms-link <?= $selectedSection === 'registry:' . $key ? 'active' : '' ?>" href="?section=registry%3A<?= rawurlencode($key) ?>">
                                            <span class="cms-ico"><i class="bi bi-dot fs-5"></i></span><?= e($homeSectionLabel) ?>
                                        </a>
                                    <?php endforeach; ?>
                                    <?php foreach (['service', 'testimonial', 'success_story'] as $type): ?>
                                        <?php $collection = $collections[$type]; ?>
                                        <a class="cms-link <?= $selectedSection === 'collection:' . $type ? 'active' : '' ?>" href="?section=collection%3A<?= e($type) ?>">
                                            <span class="cms-ico"><?= e($collection['icon']) ?></span><?= e($collection['label']) ?>
                                            <span class="cms-count"><?= (int) ($itemCountByType[$type] ?? 0) ?></span>
                                        </a>
                                    <?php endforeach; ?>
                                    <a class="cms-link <?= $selectedSection === 'page:index.php' ? 'active' : '' ?>" href="?section=page%3Aindex.php">
                                        <span class="cms-ico"><i class="bi bi-file-earmark-text"></i></span>Page content blocks
                                        <span class="cms-count"><?= (int) ($itemCountByPage['index.php'] ?? 0) ?></span>
                                    </a>
                                </div>
                            </div>

                            <!-- Other pages -->
                            <?php foreach ($pages as $pageFile => $pageLabel): ?>
                                <?php if ($pageFile === 'index.php') continue; ?>
                                <?php
                                $groupId = 'grp-' . preg_replace('/[^a-z0-9]+/i', '-', $pageFile);
                                $isSelectedPage = $selectedSection === 'page:' . $pageFile
                                    || ($pageFile === 'blog.php' && $selectedSection === 'collection:blog')
                                    || ($pageFile === 'pricing.php' && $selectedSection === 'collection:pricing');
                                ?>
                                <button class="cms-group-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#<?= e($groupId) ?>" aria-expanded="<?= $isSelectedPage ? 'true' : 'false' ?>" aria-controls="<?= e($groupId) ?>">
                                    <span class="cms-ico"><i class="bi bi-file-earmark-text"></i></span><?= e($pageLabel) ?>
                                    <i class="bi bi-chevron-down"></i>
                                </button>
                                <div class="collapse <?= $isSelectedPage ? 'show' : '' ?>" id="<?= e($groupId) ?>">
                                    <div class="cms-children">
                                        <?php if ($pageFile === 'blog.php'): ?>
                                            <a class="cms-link <?= $selectedSection === 'collection:blog' ? 'active' : '' ?>" href="?section=collection%3Ablog">
                                                <span class="cms-ico"><i class="bi bi-journal-text"></i></span>Articles
                                                <span class="cms-count"><?= (int) ($itemCountByType['blog'] ?? 0) ?></span>
                                            </a>
                                        <?php elseif ($pageFile === 'pricing.php'): ?>
                                            <a class="cms-link <?= $selectedSection === 'collection:pricing' ? 'active' : '' ?>" href="?section=collection%3Apricing">
                                                <span class="cms-ico"><i class="bi bi-currency-rupee"></i></span>Pricing plans
                                                <span class="cms-count"><?= (int) ($itemCountByType['pricing'] ?? 0) ?></span>
                                            </a>
                                        <?php endif; ?>
                                        <a class="cms-link <?= $selectedSection === 'page:' . $pageFile ? 'active' : '' ?>" href="?section=page%3A<?= rawurlencode($pageFile) ?>">
                                            <span class="cms-ico"><i class="bi bi-plus-lg"></i></span>Page content blocks
                                            <span class="cms-count"><?= (int) ($itemCountByPage[$pageFile] ?? 0) ?></span>
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </nav>
                    </div>
                </aside>
            </div>

            <!-- ===== MAIN ===== -->
            <div class="col-lg-9">
                <section class="cms-card overflow-hidden" aria-labelledby="cmsSectionTitle">

                    <!-- Head -->
                    <div class="d-flex flex-wrap align-items-start justify-content-between gap-3 p-3 p-md-4 border-bottom">
                        <div class="d-flex align-items-start gap-3 flex-grow-1" style="min-width:0">
                            <div style="min-width:0">
                                <h1 class="cms-title" id="cmsSectionTitle"><?= e($isRegistry ? 'Homepage Section Directory' : $sectionInfo['label']) ?></h1>
                                <p class="text-body-secondary mb-0"><?= e($sectionInfo['description']) ?></p>
                            </div>
                        </div>
                        <?php if (!$isRegistry): ?>
                            <button type="button" class="btn btn-primary px-3" id="cmsAddButton">
                                <i class="bi bi-plus-lg me-1"></i> Add New
                            </button>
                        <?php endif; ?>
                    </div>

                    <?php if ($isRegistry): ?>
                        <div class="p-3 p-md-4">
                            <div class="row g-3">
                                <?php if ($registryKey === 'homepage'): ?>
                                    <?php foreach ($homepageRecords as $record): ?>
                                        <?php $target = $homepageSectionTargets[$record['title']] ?? 'registry:homepage'; ?>
                                        <div class="col-md-6">
                                            <article class="cms-dir-item d-flex gap-3">
                                                <span class="cms-ico fs-5"><i class="bi bi-stars"></i></span>
                                                <div>
                                                    <a class="fw-bold d-block mb-1" href="?section=<?= rawurlencode($target) ?>"><?= e($record['title']) ?></a>
                                                    <p class="small text-body-secondary mb-0"><?= e($record['summary'] ?: 'Homepage section') ?></p>
                                                </div>
                                            </article>
                                        </div>
                                    <?php endforeach; ?>
                                    <div class="col-md-6">
                                        <article class="cms-dir-item d-flex gap-3">
                                            <span class="cms-ico fs-5"><i class="bi bi-stars"></i></span>
                                            <div>
                                                <a class="fw-bold d-block mb-1" href="?section=registry%3Afooter">Footer</a>
                                                <p class="small text-body-secondary mb-0"><?= e($homeSections['footer'][1]) ?></p>
                                            </div>
                                        </article>
                                    </div>
                                <?php else: ?>
                                    <div class="col-12">
                                        <article class="cms-dir-item d-flex gap-3">
                                            <span class="cms-ico fs-5"><i class="bi bi-stars"></i></span>
                                            <div>
                                                <strong class="d-block mb-1"><?= e($sectionInfo['label']) ?></strong>
                                                <p class="small text-body-secondary mb-0"><?= e($sectionInfo['description']) ?></p>
                                            </div>
                                        </article>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="alert alert-warning small mt-4 mb-0">
                                <i class="bi bi-info-circle me-1"></i>
                                Sections backed by CMS records have their own Add, Edit, Publish, and Delete controls. Sections rendered directly in PHP are informational here because the existing CMS has no editable fields for them.
                            </div>
                        </div>
                    <?php else: ?>

                        <!-- Toolbar -->
                        <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 px-3 px-md-4 py-3 border-bottom bg-body-tertiary bg-opacity-50">
                            <form method="GET" action="/admin/content.php" class="flex-grow-1" style="max-width:380px">
                                <input type="hidden" name="section" value="<?= e($selectedSection) ?>">
                                <label class="visually-hidden" for="cmsSearch">Search content</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white"><i class="bi bi-search text-body-secondary"></i></span>
                                    <input id="cmsSearch" type="search" name="q" class="form-control border-start-0" value="<?= e($search) ?>" placeholder="Search this section">
                                </div>
                            </form>
                            <span class="badge rounded-pill text-bg-light border fw-semibold px-3 py-2"><?= count($items) ?> item<?= count($items) === 1 ? '' : 's' ?></span>
                        </div>

                        <?php if (!$items): ?>
                            <div class="text-center py-5 px-3">
                                <div class="d-inline-grid place-items-center rounded-4 mb-3 d-inline-flex align-items-center justify-content-center" style="width:56px;height:56px;background:var(--brand-soft);color:var(--brand);font-size:1.5rem">
                                    <i class="bi bi-plus-lg"></i>
                                </div>
                                <h2 class="h5 fw-bold"><?= $search !== '' ? 'No matching content' : 'Nothing here yet' ?></h2>
                                <p class="text-body-secondary mx-auto mb-3" style="max-width:420px">
                                    <?= $search !== '' ? 'Try a different search term, or clear the search.' : 'Add content to this section to make it available on the public website.' ?>
                                </p>
                                <?php if ($search === ''): ?>
                                    <button type="button" class="btn btn-primary" data-cms-add>
                                        <i class="bi bi-plus-lg me-1"></i> Add your first item
                                    </button>
                                <?php else: ?>
                                    <a class="btn btn-outline-secondary" href="?section=<?= rawurlencode($selectedSection) ?>">Clear search</a>
                                <?php endif; ?>
                            </div>
                        <?php else: ?>
                            <div class="list-group list-group-flush">
                                <?php foreach ($items as $item): ?>
                                    <?php $meta = json_decode($item['metadata'] ?? '', true); $meta = is_array($meta) ? $meta : []; ?>
                                    <?php $description = $item['summary'] ?: ($item['body'] ?? ''); ?>
                                    <article class="list-group-item cms-record d-flex flex-column flex-md-row align-items-md-center gap-3">
                                        <div class="d-flex align-items-start gap-3 flex-grow-1" style="min-width:0">
                                            <?php if (!empty($meta['image'])): ?>
                                                <img class="cms-thumb" src="<?= e($meta['image']) ?>" alt="" loading="lazy">
                                            <?php else: ?>
                                                <span class="cms-thumb cms-thumb-ph" aria-hidden="true"><?= e($sectionInfo['icon']) ?></span>
                                            <?php endif; ?>
                                            <div style="min-width:0">
                                                <h3><?= e($item['title']) ?></h3>
                                                <p><?= e($description !== '' ? $description : 'No summary provided.') ?></p>
                                                <div class="d-flex flex-wrap align-items-center gap-2 mt-2">
                                                    <?php if (!empty($item['is_active'])): ?>
                                                        <span class="badge rounded-pill bg-success-subtle text-success-emphasis"><i class="bi bi-circle-fill me-1" style="font-size:.45rem;vertical-align:middle"></i>Published</span>
                                                    <?php else: ?>
                                                        <span class="badge rounded-pill bg-secondary-subtle text-secondary-emphasis"><i class="bi bi-circle-fill me-1" style="font-size:.45rem;vertical-align:middle"></i>Draft</span>
                                                    <?php endif; ?>
                                                    <?php if ($sectionType === 'pricing' && !empty($meta['price'])): ?>
                                                        <span class="small fw-semibold text-body-secondary"><?= e($meta['price']) ?></span>
                                                    <?php endif; ?>
                                                    <?php if ($sectionType === 'testimonial' && !empty($meta['role'])): ?>
                                                        <span class="small text-body-secondary"><?= e($meta['role']) ?></span>
                                                    <?php endif; ?>
                                                    <?php if ($sectionType === 'testimonial'): ?>
                                                        <span class="small text-warning-emphasis"><i class="bi bi-star-fill me-1"></i><?= (int) ($meta['rating'] ?? 5) ?>/5</span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="cms-record-actions d-flex flex-wrap align-items-center gap-2 flex-shrink-0">
                                            <a class="btn btn-sm btn-outline-secondary" href="?section=<?= rawurlencode($selectedSection) ?>&amp;edit=<?= (int) $item['id'] ?>">
                                                <i class="bi bi-pencil me-1"></i> Edit
                                            </a>
                                            <form method="POST" class="d-flex">
                                                <input type="hidden" name="csrf_token" value="<?= e($_SESSION['cms_csrf_token']) ?>">
                                                <input type="hidden" name="section" value="<?= e($selectedSection) ?>">
                                                <input type="hidden" name="action" value="toggle">
                                                <input type="hidden" name="id" value="<?= (int) $item['id'] ?>">
                                                <button type="submit" class="btn btn-sm btn-light border">
                                                    <i class="bi bi-<?= !empty($item['is_active']) ? 'eye-slash' : 'eye' ?> me-1"></i>
                                                    <?= !empty($item['is_active']) ? 'Unpublish' : 'Publish' ?>
                                                </button>
                                            </form>
                                            <form method="POST" class="d-flex" data-delete-form>
                                                <input type="hidden" name="csrf_token" value="<?= e($_SESSION['cms_csrf_token']) ?>">
                                                <input type="hidden" name="section" value="<?= e($selectedSection) ?>">
                                                <input type="hidden" name="action" value="delete">
                                                <input type="hidden" name="id" value="<?= (int) $item['id'] ?>">
                                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                                    <i class="bi bi-trash me-1"></i> Delete
                                                </button>
                                            </form>
                                        </div>
                                    </article>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </section>
            </div>
        </div>
    </div>

    <?php if (!$isRegistry): ?>
        <?php $formMeta = $editingMetadata; ?>
        <!-- ===== ADD / EDIT MODAL ===== -->
        <div class="modal fade" id="cmsModal" tabindex="-1" aria-labelledby="cmsDialogTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable modal-fullscreen-sm-down">
                <form method="POST" class="modal-content border-0 shadow-lg cms-modal" id="cmsForm" enctype="multipart/form-data">
                    <div class="modal-header border-bottom px-4 py-3">
                        <div>
                            <h2 class="modal-title h5 fw-bold mb-0" id="cmsDialogTitle"><?= $editingItem ? 'Edit content' : 'Add content' ?></h2>
                            <div class="small text-body-secondary"><?= e($sectionInfo['label']) ?> · Changes appear on the public website after saving.</div>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body px-4 py-4">
                        <input type="hidden" name="csrf_token" value="<?= e($_SESSION['cms_csrf_token']) ?>">
                        <input type="hidden" name="section" value="<?= e($selectedSection) ?>">
                        <input type="hidden" name="content_type" value="<?= e($sectionType) ?>">
                        <input type="hidden" name="action" value="<?= $editingItem ? 'update' : 'create' ?>">
                        <?php if ($editingItem): ?><input type="hidden" name="id" value="<?= (int) $editingItem['id'] ?>"><?php endif; ?>

                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label fw-semibold" for="f-title">Title / name</label>
                                <input type="text" class="form-control" id="f-title" name="title" required maxlength="250" value="<?= e($editingItem['title'] ?? '') ?>">
                            </div>

                            <div class="col-12">
                                <label class="form-label fw-semibold" for="f-summary"><?= $sectionType === 'testimonial' ? 'Testimonial description' : ($sectionType === 'success_story' ? 'Project description' : ($sectionType === 'blog' ? 'Excerpt' : ($sectionType === 'pricing' ? 'Plan description' : 'Short description'))) ?></label>
                                <textarea class="form-control" id="f-summary" name="summary" rows="3" <?= $sectionType === 'testimonial' ? 'required' : '' ?>><?= e($editingItem['summary'] ?? '') ?></textarea>
                            </div>

                            <?php if (in_array($sectionType, ['blog', 'page'], true)): ?>
                                <div class="col-12">
                                    <label class="form-label fw-semibold" for="f-body"><?= $sectionType === 'blog' ? 'Article body' : 'Additional details' ?></label>
                                    <textarea class="form-control" id="f-body" name="body" rows="6"><?= e($editingItem['body'] ?? '') ?></textarea>
                                </div>
                            <?php endif; ?>

                            <?php if ($sectionType === 'service'): ?>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold" for="f-icon">Icon or emoji</label>
                                    <input type="text" class="form-control" id="f-icon" name="icon" value="<?= e($formMeta['icon'] ?? '') ?>" maxlength="80">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold" for="f-href">Destination URL</label>
                                    <!-- type=text: browser ka type=url "/services.php" jaisa path reject kar deta tha -->
                                    <input type="text" class="form-control" id="f-href" name="href" value="<?= e($formMeta['href'] ?? '') ?>" placeholder="/services.php">
                                </div>

                            <?php elseif ($sectionType === 'pricing'): ?>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold" for="f-price">Price</label>
                                    <input type="text" class="form-control" id="f-price" name="price" value="<?= e($formMeta['price'] ?? '') ?>">
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-semibold" for="f-features">Plan features <span class="text-body-secondary fw-normal small">· one feature per line</span></label>
                                    <textarea class="form-control" id="f-features" name="body" rows="6"><?= e($editingItem['body'] ?? (isset($formMeta['features']) && is_array($formMeta['features']) ? implode("\n", $formMeta['features']) : '')) ?></textarea>
                                </div>
                                <div class="col-12">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" id="f-popular" name="popular" value="1" <?= !empty($formMeta['popular']) ? 'checked' : '' ?>>
                                        <label class="form-check-label" for="f-popular">Mark as a popular plan</label>
                                    </div>
                                </div>

                            <?php elseif ($sectionType === 'testimonial'): ?>
                                <div class="col-md-8">
                                    <label class="form-label fw-semibold" for="f-role">Client role / company</label>
                                    <input type="text" class="form-control" id="f-role" name="role" value="<?= e($formMeta['role'] ?? '') ?>">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold" for="f-rating">Rating</label>
                                    <select class="form-select" id="f-rating" name="rating" required>
                                        <?php $rating = (int) ($formMeta['rating'] ?? 5); ?>
                                        <?php for ($stars = 1; $stars <= 5; $stars++): ?>
                                            <option value="<?= $stars ?>" <?= $rating === $stars ? 'selected' : '' ?>><?= $stars ?> star<?= $stars === 1 ? '' : 's' ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </div>

                            <?php elseif ($sectionType === 'success_story'): ?>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold" for="f-industry">Industry</label>
                                    <input type="text" class="form-control" id="f-industry" name="industry" value="<?= e($formMeta['industry'] ?? '') ?>">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold" for="f-country">Country</label>
                                    <input type="text" class="form-control" id="f-country" name="country" value="<?= e($formMeta['country'] ?? '') ?>">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold" for="f-duration">Duration</label>
                                    <input type="text" class="form-control" id="f-duration" name="duration" value="<?= e($formMeta['duration'] ?? '') ?>">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold" for="f-result">Result</label>
                                    <input type="text" class="form-control" id="f-result" name="result" value="<?= e($formMeta['result'] ?? '') ?>">
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-semibold" for="f-website">Project URL</label>
                                    <input type="url" class="form-control" id="f-website" name="website" value="<?= e($formMeta['website'] ?? '') ?>" placeholder="https://">
                                </div>
                            <?php endif; ?>

                            <?php if (in_array($sectionType, ['page', 'success_story', 'testimonial'], true)): ?>
                                <div class="col-12">
                                    <label class="form-label fw-semibold" for="f-image"><?= $sectionType === 'testimonial' ? 'Client photo' : 'Image' ?> <span class="text-body-secondary fw-normal small">· JPG, PNG, WEBP or GIF, max 5 MB</span></label>
                                    <input type="file" class="form-control" id="f-image" name="image" accept="image/jpeg,image/png,image/webp,image/gif">
                                    <div class="d-flex align-items-center gap-3 mt-2" id="cmsImagePreviewWrap" <?= empty($formMeta['image']) ? 'hidden' : '' ?>>
                                        <img id="cmsImagePreview" class="rounded-3 border" style="width:64px;height:64px;object-fit:cover" src="<?= e($formMeta['image'] ?? '') ?>" alt="">
                                        <span class="small text-body-secondary"><?= !empty($formMeta['image']) ? 'Current photo is retained unless you upload a replacement.' : 'Photo preview.' ?></span>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="modal-footer border-top px-4 py-3">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-<?= $editingItem ? 'check-lg' : 'plus-lg' ?> me-1"></i>
                            <?= $editingItem ? 'Save changes' : 'Add to website' ?>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
(() => {
    const modalEl = document.getElementById('cmsModal');
    const form = document.getElementById('cmsForm');

    // Delete confirm
    document.querySelectorAll('[data-delete-form]').forEach(f => {
        f.addEventListener('submit', e => {
            if (!window.confirm('Delete this content? This action cannot be undone.')) e.preventDefault();
        });
    });

    if (!modalEl || !form) return;

    const modal = bootstrap.Modal.getOrCreateInstance(modalEl);
    const params = new URLSearchParams(window.location.search);
    const hasEditOrAdd = params.has('edit') || params.has('add');
    const addUrl = '?section=<?= rawurlencode($selectedSection) ?>&add=1';
    let dirty = false;

    const openAdd = () => {
        // Agar abhi edit mode me hai to fresh (empty) form ke liye reload
        if (params.has('edit')) { window.location.href = addUrl; return; }
        modal.show();
    };
    document.getElementById('cmsAddButton')?.addEventListener('click', openAdd);
    document.querySelectorAll('[data-cms-add]').forEach(b => b.addEventListener('click', openAdd));

    // Unsaved changes guard
    form.addEventListener('input', () => { dirty = true; });
    form.addEventListener('change', () => { dirty = true; });
    form.addEventListener('submit', () => { dirty = false; });
    modalEl.addEventListener('hide.bs.modal', e => {
        if (dirty && !window.confirm('Discard your unsaved changes?')) { e.preventDefault(); return; }
        dirty = false;
    });
    // Modal band hone par URL se edit/add hata do
    modalEl.addEventListener('hidden.bs.modal', () => {
        if (!hasEditOrAdd) return;
        params.delete('edit'); params.delete('add');
        history.replaceState(null, '', window.location.pathname + '?' + params.toString());
    });

    // Image preview
    const imageInput = form.querySelector('input[type="file"][name="image"]');
    const imagePreview = document.getElementById('cmsImagePreview');
    const imagePreviewWrap = document.getElementById('cmsImagePreviewWrap');
    imageInput?.addEventListener('change', () => {
        const file = imageInput.files?.[0];
        if (!file || !imagePreview || !imagePreviewWrap) return;
        if (imagePreview.dataset.objectUrl) URL.revokeObjectURL(imagePreview.dataset.objectUrl);
        const url = URL.createObjectURL(file);
        imagePreview.src = url;
        imagePreview.dataset.objectUrl = url;
        imagePreviewWrap.hidden = false;
    });

    if (hasEditOrAdd) modal.show();
})();
</script>

<?php require_once __DIR__ . '/templates/footer.php'; ?>