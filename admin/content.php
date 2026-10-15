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
    'hero_content' => ['label' => 'Hero Section', 'page' => 'index.php', 'description' => 'Open this section to edit every visible hero heading, paragraph, checklist item, button, lead form label, service choice, phone detail and trust message.', 'icon' => '⌂'],
    'partner' => ['label' => 'Trusted Partners', 'page' => 'index.php', 'description' => 'Edit the Trusted Partners heading and subtitle, and add, update, publish or remove partner logos.', 'icon' => '◇'],
    'homepage_about' => ['label' => 'About WebTecMart', 'page' => 'index.php', 'description' => 'Edit every visible part of the homepage About section, including image, copy, metrics, checklist, feature cards, USP and CTA.', 'icon' => 'ⓘ'],
    'about_page' => ['label' => 'About Page Content', 'page' => 'about.php', 'description' => 'Edit all About page copy, stats, story, values, milestones, highlights and calls to action.', 'icon' => 'ⓘ'],
    'service' => ['label' => 'Homepage Service Cards', 'page' => 'index.php', 'description' => 'Service cards shown in the homepage services section.', 'icon' => '◇'],
    'services_page' => ['label' => 'What We Do Page', 'page' => 'services.php', 'description' => 'Edit every section, text block, service list, form label, CTA, and SEO field on the public What We Do page.', 'icon' => '◇'],
    'testimonial' => ['label' => 'Testimonials', 'page' => 'index.php', 'description' => 'Client reviews displayed in the homepage testimonial carousel.', 'icon' => '“'],
    'success_story' => ['label' => 'SEO Portfolio / Case Studies', 'page' => 'index.php', 'description' => 'SEO success stories shown in the homepage portfolio section.', 'icon' => '↗'],
    'blog' => ['label' => 'Blog / Insights', 'page' => 'blog.php', 'description' => 'Articles made available to the blog page.', 'icon' => '▤'],
    'pricing' => ['label' => 'Pricing Plans', 'page' => 'pricing.php', 'description' => 'Plans and feature lists used on the pricing pages.', 'icon' => '₹'],
    'packages_page' => ['label' => 'Packages Page Content', 'page' => 'packages.php', 'description' => 'Edit package plan prices and features, add-ons, trust badges, FAQs, page copy, and contact call-to-action.', 'icon' => '₹'],
];

$homeSections = [
    'hero' => ['Hero Section', 'Edit all homepage hero text and lead form content in one place.'],
    'partners' => ['Trusted Partners', 'Edit the section text and partner logos displayed on the homepage.'],
    'about' => ['About WebTecMart', 'Edit all content in the homepage About WebTecMart section.'],
    'visibility' => ['Search Visibility', 'Search visibility content is rendered by the homepage Search Visibility component.'],
    'contact' => ['Contact Form', 'The homepage contact form is handled by the existing contact workflow.'],
    'footer' => ['Footer', 'The public footer is shared from the site template.'],
];

$selectedSection = trim($_GET['section'] ?? $_POST['section'] ?? 'collection:service');
if ($selectedSection === 'registry:partners') $selectedSection = 'collection:partner';
if ($selectedSection === 'registry:about') $selectedSection = 'collection:homepage_about';
if ($selectedSection === 'page:services.php') $selectedSection = 'collection:services_page';
if ($selectedSection === 'page:packages.php') $selectedSection = 'collection:packages_page';
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
$heroContent = homepageHeroContent();
$trustedPartnersSection = trustedPartnersContent();
trustedPartnerLogos();
$aboutPage = aboutPageContent();
$homepageAbout = homepageAboutContent();
$servicesPage = servicesPageContent();
$packagesPage = packagesPageContent();

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

        if ($action === 'save_partner_settings' && $sectionType === 'partner') {
            $settingsId = (int) db()->query("SELECT MIN(id) FROM content_items WHERE content_type = 'trusted_partners_content'")->fetchColumn();
            if ($settingsId < 1) throw new RuntimeException('Trusted Partners section settings could not be found.');
            $settingsRecord = cmsGetById($settingsId);
            if (!$settingsRecord || $settingsRecord['content_type'] !== 'trusted_partners_content') throw new RuntimeException('Trusted Partners section settings could not be found.');
            $settingsMetadata = json_decode($settingsRecord['metadata'] ?? '', true);
            $settingsMetadata = is_array($settingsMetadata) ? $settingsMetadata : [];
            foreach (['badge', 'heading_prefix', 'heading_highlight', 'heading_suffix'] as $field) {
                $settingsMetadata[$field] = trim($_POST[$field] ?? '');
            }
            $settingsTitle = trim(implode(' ', array_filter([
                $settingsMetadata['heading_prefix'],
                $settingsMetadata['heading_highlight'],
                $settingsMetadata['heading_suffix'],
            ], static function (string $part): bool {
                return $part !== '';
            })));
            if ($settingsTitle === '') throw new RuntimeException('Enter at least one part of the Trusted Partners heading.');
            $settingsSummary = trim($_POST['summary'] ?? '');
            cmsSave('trusted_partners_content', $settingsTitle, $settingsSummary, '', $settingsMetadata, $settingsId);
            $setFlash('success', 'Trusted Partners section text updated.');
        } elseif ($action === 'delete' || $action === 'toggle') {
            if (in_array($sectionType, ['hero_content', 'about_page', 'homepage_about', 'services_page', 'packages_page'], true)) throw new RuntimeException('This page content cannot be unpublished or deleted. Edit its content instead.');
            $existing = $id > 0 ? cmsGetById($id) : null;
            if (!$existing || $existing['content_type'] !== $sectionType) throw new RuntimeException('The selected content could not be found in this section.');
            $existingMetadata = json_decode($existing['metadata'] ?? '', true);
            $existingMetadata = is_array($existingMetadata) ? $existingMetadata : [];
            if ($sectionType === 'page' && ($existingMetadata['page'] ?? '') !== $sectionPage) throw new RuntimeException('The selected content does not belong to this page.');
            if ($action === 'delete') { cmsDelete($id); $setFlash('success', 'Content deleted.'); }
            else { cmsSetActive($id, empty($existing['is_active'])); $setFlash('success', empty($existing['is_active']) ? 'Content published.' : 'Content unpublished.'); }
        } elseif ($action === 'create' || $action === 'update') {
            if (in_array($sectionType, ['hero_content', 'about_page', 'homepage_about', 'services_page', 'packages_page'], true) && $action !== 'update') throw new RuntimeException('This page has one content record. Edit its existing content instead of adding another.');
            $title = trim($_POST['title'] ?? '');
            if ($sectionType === 'hero_content') {
                $headingParts = array_map(static function (string $field): string {
                    return trim($_POST[$field] ?? '');
                }, ['heading_prefix', 'heading_underline', 'heading_highlight', 'heading_suffix']);
                $title = implode(' ', array_filter($headingParts, static function (string $part): bool {
                    return $part !== '';
                }));
            } elseif ($sectionType === 'about_page') {
                $title = trim(implode(' ', array_filter([
                    trim($_POST['hero_prefix'] ?? ''),
                    trim($_POST['hero_highlight'] ?? ''),
                    trim($_POST['hero_suffix'] ?? ''),
                ], static function (string $part): bool {
                    return $part !== '';
                })));
            } elseif ($sectionType === 'homepage_about') {
                $title = trim(implode(' ', array_filter([
                    trim($_POST['heading_prefix'] ?? ''),
                    trim($_POST['heading_highlight'] ?? ''),
                    trim($_POST['heading_suffix'] ?? ''),
                ], static function (string $part): bool {
                    return $part !== '';
                })));
            } elseif ($sectionType === 'services_page') {
                $title = trim(implode(' ', array_filter([
                    trim($_POST['hero_heading_prefix'] ?? ''),
                    trim($_POST['hero_heading_highlight'] ?? ''),
                ], static function (string $part): bool {
                    return $part !== '';
                })));
            } elseif ($sectionType === 'packages_page') {
                $title = trim(implode(' ', array_filter([
                    trim($_POST['heading_prefix'] ?? ''),
                    trim($_POST['heading_highlight'] ?? ''),
                ], static function (string $part): bool {
                    return $part !== '';
                })));
            }
            if ($title === '') throw new RuntimeException('A title is required.');
            $existing = null; $metadata = [];
            if ($action === 'update') {
                $existing = $id > 0 ? cmsGetById($id) : null;
                if (!$existing || $existing['content_type'] !== $sectionType) throw new RuntimeException('The selected content could not be found in this section.');
                if (in_array($sectionType, ['hero_content', 'about_page', 'homepage_about', 'services_page', 'packages_page'], true)) {
                    $canonical = db()->prepare('SELECT MIN(id) FROM content_items WHERE content_type = :type');
                    $canonical->execute([':type' => $sectionType]);
                    if ((int) $canonical->fetchColumn() !== $id) throw new RuntimeException('Only the main page content record can be edited here.');
                }
                $metadata = json_decode($existing['metadata'] ?? '', true);
                $metadata = is_array($metadata) ? $metadata : [];
                if ($sectionType === 'page' && ($metadata['page'] ?? '') !== $sectionPage) throw new RuntimeException('The selected content does not belong to this page.');
            } elseif ($sectionType === 'page') $metadata['page'] = $sectionPage;

            $summary = trim($_POST['summary'] ?? '');
            $body = trim($_POST['body'] ?? '');

            switch ($sectionType) {
                case 'hero_content':
                    $heroTextFields = [
                        'heading_prefix', 'heading_underline', 'heading_highlight', 'heading_suffix',
                        'badge', 'description_secondary', 'form_title', 'form_subtitle',
                        'contact_for_label', 'contact_for', 'name_placeholder', 'email_placeholder',
                        'phone_placeholder', 'company_placeholder', 'service_placeholder',
                        'message_placeholder', 'consent_text', 'robot_text', 'recaptcha_text',
                        'submit_label', 'phone_label', 'phone_number', 'trust_first', 'trust_second',
                        'trust_third',
                    ];
                    foreach ($heroTextFields as $field) $metadata[$field] = trim($_POST[$field] ?? '');
                    if ($metadata['phone_number'] !== '' && !preg_match('/^[0-9+() .-]+$/', $metadata['phone_number'])) throw new RuntimeException('Enter a valid phone number.');
                    $metadata['benefits'] = trim($_POST['benefits'] ?? '');
                    $serviceOptions = array_values(array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', trim($_POST['service_options'] ?? ''))), static function (string $option): bool {
                        return $option !== '';
                    }));
                    if (!$serviceOptions) throw new RuntimeException('Add at least one service option, one per line.');
                    $metadata['service_options'] = implode("\n", $serviceOptions);
                    break;
                case 'partner':
                    if ($summary === '') $summary = $title;
                    break;
                case 'about_page':
                    $textFields = [
                        'badge', 'hero_prefix', 'hero_highlight', 'hero_suffix',
                        'story_heading_prefix', 'story_heading_highlight', 'story_visual_brand', 'story_visual_tagline',
                        'values_heading_prefix', 'values_heading_highlight', 'values_subtitle',
                        'journey_heading_prefix', 'journey_heading_highlight', 'journey_subtitle',
                        'cta_title', 'cta_description', 'cta_primary_label', 'cta_primary_href',
                        'cta_secondary_label', 'cta_secondary_href',
                    ];
                    foreach ($textFields as $field) $metadata[$field] = trim($_POST[$field] ?? '');
                    $metadata['story_paragraphs'] = array_values(array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', trim($_POST['story_paragraphs'] ?? ''))), static function (string $paragraph): bool {
                        return $paragraph !== '';
                    }));
                    $parseRows = static function (string $input, array $columns, string $label): array {
                        $rows = [];
                        foreach (preg_split('/\r\n|\r|\n/', trim($input)) as $line) {
                            if (trim($line) === '') continue;
                            $values = array_map('trim', explode('|', $line));
                            if (count($values) !== count($columns) || in_array('', $values, true)) {
                                throw new RuntimeException($label . ' must have ' . count($columns) . ' non-empty fields per line, separated by |.');
                            }
                            $rows[] = array_combine($columns, $values);
                        }
                        return $rows;
                    };
                    $metadata['stats'] = $parseRows((string) ($_POST['stats'] ?? ''), ['icon', 'value', 'label', 'description'], 'Stats');
                    $metadata['core_values'] = $parseRows((string) ($_POST['core_values'] ?? ''), ['icon', 'title', 'description'], 'Core values');
                    $metadata['milestones'] = $parseRows((string) ($_POST['milestones'] ?? ''), ['year', 'title', 'description'], 'Journey milestones');
                    $metadata['usp_items'] = $parseRows((string) ($_POST['usp_items'] ?? ''), ['icon', 'title', 'description'], 'Highlights');
                    $validAboutIcons = ['sparkles', 'award', 'users', 'briefcase', 'trending', 'target', 'lightbulb', 'handshake', 'rocket', 'shield', 'zap', 'quote', 'arrow'];
                    foreach (['stats', 'core_values', 'usp_items'] as $listField) {
                        foreach ($metadata[$listField] as $row) {
                            if (!in_array($row['icon'], $validAboutIcons, true)) throw new RuntimeException('Choose a valid icon name for ' . str_replace('_', ' ', $listField) . '.');
                        }
                    }
                    if ($metadata['cta_primary_href'] !== '' && (str_starts_with($metadata['cta_primary_href'], '//') || (!str_starts_with($metadata['cta_primary_href'], '/') && (!filter_var($metadata['cta_primary_href'], FILTER_VALIDATE_URL) || !in_array(parse_url($metadata['cta_primary_href'], PHP_URL_SCHEME), ['http', 'https'], true))))) throw new RuntimeException('Enter a valid primary button link using an http(s) URL or a site path.');
                    if ($metadata['cta_secondary_href'] !== '' && (str_starts_with($metadata['cta_secondary_href'], '//') || (!str_starts_with($metadata['cta_secondary_href'], '/') && (!filter_var($metadata['cta_secondary_href'], FILTER_VALIDATE_URL) || !in_array(parse_url($metadata['cta_secondary_href'], PHP_URL_SCHEME), ['http', 'https'], true))))) throw new RuntimeException('Enter a valid secondary button link using an http(s) URL or a site path.');
                    break;
                case 'homepage_about':
                    $textFields = [
                        'badge', 'heading_prefix', 'heading_highlight', 'heading_suffix',
                        'image_src', 'image_alt', 'brand_name', 'brand_tagline',
                        'why_heading', 'trust_prefix', 'trust_highlight', 'trust_suffix',
                        'content_heading_prefix', 'content_heading_highlight',
                        'usp_title', 'usp_description', 'cta_label', 'cta_href', 'excellence_text',
                    ];
                    foreach ($textFields as $field) $metadata[$field] = trim($_POST[$field] ?? '');
                    $metadata['paragraphs'] = array_values(array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', trim($_POST['paragraphs'] ?? ''))), static function (string $paragraph): bool {
                        return $paragraph !== '';
                    }));
                    $metadata['why_points'] = array_values(array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', trim($_POST['why_points'] ?? ''))), static function (string $point): bool {
                        return $point !== '';
                    }));
                    $parseAboutRows = static function (string $input, array $columns, string $label): array {
                        $rows = [];
                        foreach (preg_split('/\r\n|\r|\n/', trim($input)) as $line) {
                            if (trim($line) === '') continue;
                            $values = array_map('trim', explode('|', $line));
                            if (count($values) !== count($columns) || in_array('', $values, true)) {
                                throw new RuntimeException($label . ' must have ' . count($columns) . ' non-empty fields per line, separated by |.');
                            }
                            $rows[] = array_combine($columns, $values);
                        }
                        return $rows;
                    };
                    $metadata['stats'] = $parseAboutRows((string) ($_POST['stats'] ?? ''), ['icon', 'value', 'label'], 'Stats');
                    $metadata['features'] = $parseAboutRows((string) ($_POST['features'] ?? ''), ['icon', 'title', 'description'], 'Feature cards');
                    $aboutIcons = ['award', 'shield', 'dollar', 'users2', 'rocket', 'target', 'brain', 'handshake'];
                    foreach (array_merge($metadata['stats'], $metadata['features']) as $row) {
                        if (!in_array($row['icon'], $aboutIcons, true)) throw new RuntimeException('Choose a valid icon name for the About section.');
                    }
                    $imageSource = $metadata['image_src'];
                    if ($imageSource !== '' && !str_starts_with($imageSource, '/') && (!filter_var($imageSource, FILTER_VALIDATE_URL) || !in_array(parse_url($imageSource, PHP_URL_SCHEME), ['http', 'https'], true))) {
                        throw new RuntimeException('Enter a valid image URL beginning with http://, https://, or a site path.');
                    }
                    $ctaHref = $metadata['cta_href'];
                    if ($ctaHref !== '' && (str_starts_with($ctaHref, '//') || (!str_starts_with($ctaHref, '/') && (!filter_var($ctaHref, FILTER_VALIDATE_URL) || !in_array(parse_url($ctaHref, PHP_URL_SCHEME), ['http', 'https'], true))))) {
                        throw new RuntimeException('Enter a valid button link using an http(s) URL or a site path.');
                    }
                    break;
                case 'service':
                    $href = trim($_POST['href'] ?? '');
                    if ($href !== '' && ((str_starts_with($href, '//')) || (!str_starts_with($href, '/') && (!filter_var($href, FILTER_VALIDATE_URL) || !in_array(parse_url($href, PHP_URL_SCHEME), ['http', 'https'], true))))) throw new RuntimeException('Enter a valid service link using an http(s) URL or a site path.');
                    $metadata['icon'] = trim($_POST['icon'] ?? ''); $metadata['href'] = $href; break;
                case 'blog':
                    $metadata['category'] = trim((string) ($_POST['category'] ?? ''));
                    $metadata['author'] = trim((string) ($_POST['author'] ?? ''));
                    $metadata['date'] = trim((string) ($_POST['date'] ?? ''));
                    $metadata['readTime'] = trim((string) ($_POST['read_time'] ?? ''));
                    $likes = filter_var($_POST['likes'] ?? 0, FILTER_VALIDATE_INT);
                    if ($likes === false || $likes < 0) throw new RuntimeException('Likes must be zero or a positive whole number.');
                    $metadata['likes'] = $likes;
                    $metadata['image'] = trim((string) ($_POST['image_url'] ?? ''));
                    if ($metadata['image'] !== '' && !str_starts_with($metadata['image'], '/') && (!filter_var($metadata['image'], FILTER_VALIDATE_URL) || !in_array(parse_url($metadata['image'], PHP_URL_SCHEME), ['http', 'https'], true))) {
                        throw new RuntimeException('Enter a valid image URL beginning with http://, https://, or a site path.');
                    }
                    $hasUploadedImage = isset($_FILES['image']) && ($_FILES['image']['error'] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_NO_FILE;
                    if ($metadata['image'] === '' && !$hasUploadedImage) throw new RuntimeException('Add a blog image URL or upload an image.');
                    if ($summary === '') throw new RuntimeException('A blog excerpt is required.');
                    if ($body === '') throw new RuntimeException('Add the blog article content before saving.');
                    $metadata['body'] = $body;
                    break;
                case 'services_page':
                    $textFields = [
                        'page_meta_title', 'page_meta_description', 'hero_badge', 'hero_heading_prefix', 'hero_heading_highlight',
                        'hero_primary_label', 'hero_primary_href', 'button_separator_label', 'hero_phone', 'hero_phone_label',
                        'quote_title', 'quote_name_placeholder', 'quote_phone_placeholder', 'quote_email_placeholder',
                        'quote_message_placeholder', 'robot_label', 'recaptcha_label', 'quote_submit_label',
                        'intro_eyebrow', 'intro_heading_prefix', 'intro_heading_highlight',
                        'website_pre', 'website_heading', 'website_description', 'website_primary_label', 'website_primary_href',
                        'website_phone', 'website_phone_label', 'website_image', 'website_image_alt',
                        'services_eyebrow', 'services_heading_prefix', 'services_heading_highlight', 'services_subtitle',
                        'main_service_link_label', 'main_service_link_href',
                        'main_service_link_label', 'main_service_link_href',
                        'seo_badge', 'seo_heading_prefix', 'seo_heading_highlight', 'seo_subtitle', 'seo_quote_label', 'seo_quote_href',
                        'results_heading_prefix', 'results_heading_highlight', 'process_heading_prefix', 'process_heading_highlight',
                        'process_subtitle', 'faq_heading_prefix', 'faq_heading_highlight', 'cta_title', 'cta_description',
                        'cta_primary_label', 'cta_primary_href', 'cta_secondary_label', 'cta_secondary_href',
                        'proposal_pre', 'proposal_heading_prefix', 'proposal_heading_highlight', 'proposal_heading_suffix',
                        'proposal_name_placeholder', 'proposal_phone_placeholder', 'proposal_email_placeholder',
                        'proposal_message_placeholder', 'proposal_robot_label', 'proposal_recaptcha_label', 'proposal_submit_label',
                    ];
                    foreach ($textFields as $field) $metadata[$field] = trim((string) ($_POST[$field] ?? ''));
                    $urlFields = ['hero_primary_href', 'website_primary_href', 'main_service_link_href', 'seo_quote_href', 'cta_primary_href', 'cta_secondary_href'];
                    foreach ($urlFields as $field) {
                        $href = $metadata[$field];
                        if ($href !== '' && (str_starts_with($href, '//') || (!str_starts_with($href, '/') && (!filter_var($href, FILTER_VALIDATE_URL) || !in_array(parse_url($href, PHP_URL_SCHEME), ['http', 'https'], true))))) {
                            throw new RuntimeException('Enter a valid link for ' . str_replace('_', ' ', $field) . ' using an http(s) URL or a site path.');
                        }
                    }
                    foreach (['website_image'] as $field) {
                        $image = $metadata[$field];
                        if ($image !== '' && !str_starts_with($image, '/') && (!filter_var($image, FILTER_VALIDATE_URL) || !in_array(parse_url($image, PHP_URL_SCHEME), ['http', 'https'], true))) {
                            throw new RuntimeException('Enter a valid image URL beginning with http://, https://, or a site path.');
                        }
                    }
                    if ($metadata['hero_phone'] !== '' && !preg_match('/^[0-9+() .-]+$/', $metadata['hero_phone'])) throw new RuntimeException('Enter a valid hero phone number.');
                    if ($metadata['website_phone'] !== '' && !preg_match('/^[0-9+() .-]+$/', $metadata['website_phone'])) throw new RuntimeException('Enter a valid website CTA phone number.');
                    $parseServiceRows = static function (string $input, array $columns, string $label): array {
                        $rows = [];
                        foreach (preg_split('/\r\n|\r|\n/', trim($input)) as $line) {
                            if (trim($line) === '') continue;
                            $values = array_map('trim', explode('|', $line, count($columns)));
                            if (count($values) !== count($columns) || in_array('', $values, true)) throw new RuntimeException($label . ' must have ' . count($columns) . ' non-empty fields per line, separated by |.');
                            $rows[] = array_combine($columns, $values);
                        }
                        return $rows;
                    };
                    $metadata['intro_paragraphs'] = array_values(array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', trim((string) ($_POST['intro_paragraphs'] ?? '')))), static function (string $line): bool { return $line !== ''; }));
                    $metadata['stats'] = $parseServiceRows((string) ($_POST['stats'] ?? ''), ['icon', 'value', 'label'], 'Stats');
                    $metadata['main_services'] = [];
                    foreach (preg_split('/\r\n|\r|\n/', trim((string) ($_POST['main_services'] ?? ''))) as $line) {
                        if (trim($line) === '') continue;
                        $values = array_map('trim', explode('|', $line, 4));
                        if (count($values) !== 4 || in_array('', array_slice($values, 0, 3), true)) throw new RuntimeException('Core services must have icon | title | description | features per line.');
                        $metadata['main_services'][] = ['icon' => $values[0], 'title' => $values[1], 'description' => $values[2], 'features' => array_values(array_filter(array_map('trim', explode(';', $values[3]))))];
                    }
                    $metadata['seo_services'] = [];
                    foreach (preg_split('/\r\n|\r|\n/', trim((string) ($_POST['seo_services'] ?? ''))) as $line) {
                        if (trim($line) === '') continue;
                        $values = array_map('trim', explode('|', $line, 4));
                        if (count($values) !== 4 || in_array('', array_slice($values, 0, 3), true)) throw new RuntimeException('SEO services must have icon | title | description | benefits per line.');
                        $metadata['seo_services'][] = ['icon' => $values[0], 'title' => $values[1], 'description' => $values[2], 'benefits' => array_values(array_filter(array_map('trim', explode(';', $values[3]))))];
                    }
                    $metadata['results'] = $parseServiceRows((string) ($_POST['results'] ?? ''), ['title', 'description'], 'Results');
                    $metadata['process'] = $parseServiceRows((string) ($_POST['process'] ?? ''), ['step', 'title', 'description'], 'Process steps');
                    $metadata['faqs'] = $parseServiceRows((string) ($_POST['faqs'] ?? ''), ['q', 'a'], 'FAQs');
                    break;
                case 'packages_page':
                    $packageTextFields = [
                        'page_meta_title', 'page_meta_description', 'hero_badge', 'heading_prefix', 'heading_highlight',
                        'monthly_label', 'yearly_label', 'save_badge', 'popular_badge', 'monthly_period_label',
                        'yearly_period_label', 'addons_heading_prefix', 'addons_heading_highlight', 'addons_subtitle',
                        'faq_heading_prefix', 'faq_heading_highlight', 'faq_subtitle', 'cta_title', 'cta_description',
                        'cta_primary_label', 'cta_primary_href', 'cta_phone', 'cta_phone_label',
                    ];
                    foreach ($packageTextFields as $field) $metadata[$field] = trim((string) ($_POST[$field] ?? ''));
                    $packageHref = $metadata['cta_primary_href'];
                    if ($packageHref !== '' && (str_starts_with($packageHref, '//') || (!str_starts_with($packageHref, '/') && (!filter_var($packageHref, FILTER_VALIDATE_URL) || !in_array(parse_url($packageHref, PHP_URL_SCHEME), ['http', 'https'], true))))) {
                        throw new RuntimeException('Enter a valid package CTA link using an http(s) URL or a site path.');
                    }
                    if ($metadata['cta_phone'] !== '' && !preg_match('/^[0-9+() .-]+$/', $metadata['cta_phone'])) throw new RuntimeException('Enter a valid package contact phone number.');
                    $parsePackageRows = static function (string $input, array $columns, string $label): array {
                        $rows = [];
                        foreach (preg_split('/\r\n|\r|\n/', trim($input)) as $line) {
                            if (trim($line) === '') continue;
                            $values = array_map('trim', explode('|', $line, count($columns)));
                            if (count($values) !== count($columns) || in_array('', $values, true)) {
                                throw new RuntimeException($label . ' must have ' . count($columns) . ' non-empty fields per line, separated by |.');
                            }
                            $rows[] = array_combine($columns, $values);
                        }
                        return $rows;
                    };
                    $metadata['packages'] = [];
                    $packageIds = [];
                    foreach (preg_split('/\r\n|\r|\n/', trim((string) ($_POST['packages'] ?? ''))) as $line) {
                        if (trim($line) === '') continue;
                        $values = array_map('trim', explode('|', $line, 10));
                        if (count($values) !== 10 || in_array('', array_slice($values, 0, 7), true) || in_array('', array_slice($values, 8, 2), true)) {
                            throw new RuntimeException('Packages need 10 fields per line: id | name | icon | monthly price | yearly price | description | features (; separated) | popular (yes/no) | button text | button link.');
                        }
                        if (!preg_match('/^[a-z0-9-]+$/', $values[0])) throw new RuntimeException('Package IDs may contain lowercase letters, numbers, and hyphens only.');
                        if (in_array($values[0], $packageIds, true)) throw new RuntimeException('Each package must have a unique ID.');
                        $packageIds[] = $values[0];
                        if (!in_array($values[2], ['zap', 'rocket', 'crown'], true)) throw new RuntimeException('Choose zap, rocket, or crown as the package icon.');
                        $monthly = filter_var($values[3], FILTER_VALIDATE_INT);
                        $yearly = filter_var($values[4], FILTER_VALIDATE_INT);
                        if ($monthly === false || $monthly < 0 || $yearly === false || $yearly < 0) throw new RuntimeException('Package monthly and yearly prices must be zero or positive whole numbers.');
                        if (!in_array(strtolower($values[7]), ['yes', 'no'], true)) throw new RuntimeException('Set each package popular value to yes or no.');
                        $buttonHref = $values[9];
                        if ($buttonHref !== '' && (str_starts_with($buttonHref, '//') || (!str_starts_with($buttonHref, '/') && (!filter_var($buttonHref, FILTER_VALIDATE_URL) || !in_array(parse_url($buttonHref, PHP_URL_SCHEME), ['http', 'https'], true))))) {
                            throw new RuntimeException('Package button links must be an http(s) URL or a site path.');
                        }
                        $metadata['packages'][] = [
                            'id' => $values[0], 'name' => $values[1], 'icon' => $values[2],
                            'monthly' => $monthly, 'yearly' => $yearly, 'description' => $values[5],
                            'features' => array_values(array_filter(array_map('trim', explode(';', $values[6])))),
                            'popular' => strtolower($values[7]) === 'yes',
                            'buttonText' => $values[8], 'buttonHref' => $buttonHref,
                        ];
                    }
                    if (!$metadata['packages']) throw new RuntimeException('Add at least one package plan.');
                    $metadata['addons'] = $parsePackageRows((string) ($_POST['addons'] ?? ''), ['name', 'price'], 'Add-ons');
                    $metadata['trust_badges'] = $parsePackageRows((string) ($_POST['trust_badges'] ?? ''), ['icon', 'title', 'subtitle'], 'Trust badges');
                    $metadata['faqs'] = $parsePackageRows((string) ($_POST['faqs'] ?? ''), ['question', 'answer'], 'FAQs');
                    foreach ($metadata['trust_badges'] as $badge) {
                        if (!in_array($badge['icon'], ['award', 'users', 'shield', 'clock'], true)) throw new RuntimeException('Choose award, users, shield, or clock as the trust badge icon.');
                    }
                    break;
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
            if (isset($_FILES['image']) && ($_FILES['image']['error'] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_NO_FILE) {
                $uploadedImage = uploadCmsImage($_FILES['image']);
                if ($sectionType === 'homepage_about') $metadata['image_src'] = $uploadedImage;
                else $metadata['image'] = $uploadedImage;
            }
            if ($sectionType === 'partner' && empty($metadata['image'])) throw new RuntimeException('Choose a logo image before saving this partner.');
            cmsSave($sectionType, $title, $summary, $body, $metadata, $action === 'update' ? $id : null);
            $setFlash('success', $action === 'update' ? 'Content updated successfully.' : 'Content added successfully.');
        } else throw new RuntimeException('The requested action is not supported.');
    } catch (Throwable $exception) {
        error_log('CMS content action failed: ' . $exception->getMessage());
        $setFlash('error', $exception instanceof RuntimeException ? $exception->getMessage() : 'Content could not be saved. Please try again.');
    }
    redirect('/admin/content.php?section=' . rawurlencode($selectedSection));
}

serviceCards(); pricingPlans(); testimonials(); $blogPosts = blogPosts(); successStories(); homepageSections();

$allItems = cmsAllContent();

// PHP 7.2 fix: arrow function (fn) ki jagah normal anonymous function
$homepageRecords = array_values(array_filter($allItems, static function (array $item): bool {
    return $item['content_type'] === 'homepage';
}));

$homepageSectionTargets = ['Hero Section' => 'collection:hero_content', 'Trusted Partners' => 'collection:partner', 'About WebTecMart' => 'collection:homepage_about', 'What We Do' => 'collection:service', 'Search Visibility' => 'registry:visibility', 'SEO Portfolio' => 'collection:success_story', 'Testimonials' => 'collection:testimonial', 'Contact Form' => 'registry:contact'];
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
if ($sectionType === 'hero_content') $editingMetadata = array_merge($heroContent, $editingMetadata);
if ($sectionType === 'about_page') $editingMetadata = array_merge($aboutPage, $editingMetadata);
if ($sectionType === 'homepage_about') $editingMetadata = array_merge($homepageAbout, $editingMetadata);
if ($sectionType === 'services_page') $editingMetadata = array_merge($servicesPage, $editingMetadata);
if ($sectionType === 'packages_page') $editingMetadata = array_merge($packagesPage, $editingMetadata);
if ($sectionType === 'blog' && $editingItem) {
    foreach ($blogPosts as $blogPost) {
        if ((int) ($blogPost['id'] ?? 0) === (int) $editingItem['id']) {
            $editingMetadata = array_merge($editingMetadata, $blogPost);
            break;
        }
    }
}
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
                                        <?php $homeSectionTarget = $key === 'hero' ? 'collection:hero_content' : ($key === 'partners' ? 'collection:partner' : ($key === 'about' ? 'collection:homepage_about' : 'registry:' . $key)); ?>
                                        <a class="cms-link <?= $selectedSection === $homeSectionTarget ? 'active' : '' ?>" href="?section=<?= rawurlencode($homeSectionTarget) ?>">
                                            <span class="cms-ico"><i class="bi bi-dot fs-5"></i></span><?= e($homeSectionLabel) ?>
                                            <?php if ($key === 'hero'): ?><span class="cms-count"><?= (int) ($itemCountByType['hero_content'] ?? 0) ?></span><?php endif; ?>
                                            <?php if ($key === 'partners'): ?><span class="cms-count"><?= (int) ($itemCountByType['partner'] ?? 0) ?></span><?php endif; ?>
                                            <?php if ($key === 'about'): ?><span class="cms-count"><?= (int) ($itemCountByType['homepage_about'] ?? 0) ?></span><?php endif; ?>
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
                                    || ($pageFile === 'about.php' && $selectedSection === 'collection:about_page')
                                    || ($pageFile === 'blog.php' && $selectedSection === 'collection:blog')
                                    || ($pageFile === 'pricing.php' && $selectedSection === 'collection:pricing')
                                    || ($pageFile === 'services.php' && $selectedSection === 'collection:services_page')
                                    || ($pageFile === 'packages.php' && $selectedSection === 'collection:packages_page');
                                ?>
                                <button class="cms-group-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#<?= e($groupId) ?>" aria-expanded="<?= $isSelectedPage ? 'true' : 'false' ?>" aria-controls="<?= e($groupId) ?>">
                                    <span class="cms-ico"><i class="bi bi-file-earmark-text"></i></span><?= e($pageLabel) ?>
                                    <i class="bi bi-chevron-down"></i>
                                </button>
                                <div class="collapse <?= $isSelectedPage ? 'show' : '' ?>" id="<?= e($groupId) ?>">
                                    <div class="cms-children">
                                        <?php if ($pageFile === 'about.php'): ?>
                                            <a class="cms-link <?= $selectedSection === 'collection:about_page' ? 'active' : '' ?>" href="?section=collection%3Aabout_page">
                                                <span class="cms-ico"><i class="bi bi-pencil-square"></i></span>About page content
                                                <span class="cms-count"><?= (int) ($itemCountByType['about_page'] ?? 0) ?></span>
                                            </a>
                                        <?php elseif ($pageFile === 'blog.php'): ?>
                                            <a class="cms-link <?= $selectedSection === 'collection:blog' ? 'active' : '' ?>" href="?section=collection%3Ablog">
                                                <span class="cms-ico"><i class="bi bi-journal-text"></i></span>Articles
                                                <span class="cms-count"><?= (int) ($itemCountByType['blog'] ?? 0) ?></span>
                                            </a>
                                        <?php elseif ($pageFile === 'pricing.php'): ?>
                                            <a class="cms-link <?= $selectedSection === 'collection:pricing' ? 'active' : '' ?>" href="?section=collection%3Apricing">
                                                <span class="cms-ico"><i class="bi bi-currency-rupee"></i></span>Pricing plans
                                                <span class="cms-count"><?= (int) ($itemCountByType['pricing'] ?? 0) ?></span>
                                            </a>
                                        <?php elseif ($pageFile === 'services.php'): ?>
                                            <a class="cms-link <?= $selectedSection === 'collection:services_page' ? 'active' : '' ?>" href="?section=collection%3Aservices_page">
                                                <span class="cms-ico"><i class="bi bi-pencil-square"></i></span>What We Do page content
                                                <span class="cms-count"><?= (int) ($itemCountByType['services_page'] ?? 0) ?></span>
                                            </a>
                                        <?php elseif ($pageFile === 'packages.php'): ?>
                                            <a class="cms-link <?= $selectedSection === 'collection:packages_page' ? 'active' : '' ?>" href="?section=collection%3Apackages_page">
                                                <span class="cms-ico"><i class="bi bi-pencil-square"></i></span>Packages page content
                                                <span class="cms-count"><?= (int) ($itemCountByType['packages_page'] ?? 0) ?></span>
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
                        <?php if (!$isRegistry && !in_array($sectionType, ['hero_content', 'about_page', 'homepage_about', 'services_page', 'packages_page'], true)): ?>
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

                        <?php if ($sectionType === 'partner'): ?>
                            <form method="POST" class="p-3 p-md-4 border-bottom" aria-labelledby="trustedPartnersSettingsTitle">
                                <input type="hidden" name="csrf_token" value="<?= e($_SESSION['cms_csrf_token']) ?>">
                                <input type="hidden" name="section" value="<?= e($selectedSection) ?>">
                                <input type="hidden" name="action" value="save_partner_settings">
                                <h2 class="h5 fw-bold mb-3" id="trustedPartnersSettingsTitle">Section text</h2>
                                <div class="row g-3">
                                    <?php foreach ([
                                        'badge' => 'Badge',
                                        'heading_prefix' => 'Heading — first part',
                                        'heading_highlight' => 'Heading — highlighted part',
                                        'heading_suffix' => 'Heading — final part',
                                    ] as $field => $label): ?>
                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold" for="partner-setting-<?= e($field) ?>"><?= e($label) ?></label>
                                            <input type="text" class="form-control" id="partner-setting-<?= e($field) ?>" name="<?= e($field) ?>" maxlength="250" value="<?= e($trustedPartnersSection[$field] ?? '') ?>">
                                        </div>
                                    <?php endforeach; ?>
                                    <div class="col-12">
                                        <label class="form-label fw-semibold" for="partner-setting-summary">Subtitle</label>
                                        <textarea class="form-control" id="partner-setting-summary" name="summary" rows="2"><?= e($trustedPartnersSection['summary'] ?? '') ?></textarea>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary"><i class="bi bi-check-lg me-1"></i>Save section text</button>
                                    </div>
                                </div>
                            </form>
                        <?php endif; ?>

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
                                <?php if ($search === '' && !in_array($sectionType, ['hero_content', 'about_page', 'homepage_about', 'services_page', 'packages_page'], true)): ?>
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
                                                <i class="bi bi-pencil me-1"></i><?= $sectionType === 'hero_content' ? 'Edit Hero Content' : (in_array($sectionType, ['about_page', 'homepage_about'], true) ? 'Edit About Content' : ($sectionType === 'services_page' ? 'Edit What We Do Content' : ($sectionType === 'packages_page' ? 'Edit Packages Page Content' : 'Edit'))) ?>
                                            </a>
                                            <?php if (!in_array($sectionType, ['hero_content', 'about_page', 'homepage_about', 'services_page', 'packages_page'], true)): ?>
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
                                            <?php endif; ?>
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
                            <?php if (!in_array($sectionType, ['hero_content', 'about_page', 'homepage_about', 'services_page', 'packages_page'], true)): ?>
                                <div class="col-12">
                                    <label class="form-label fw-semibold" for="f-title">Title / name</label>
                                    <input type="text" class="form-control" id="f-title" name="title" required maxlength="250" value="<?= e($editingItem['title'] ?? '') ?>">
                                </div>
                            <?php endif; ?>

                            <div class="col-12">
                                <label class="form-label fw-semibold" for="f-summary"><?= in_array($sectionType, ['hero_content', 'about_page', 'homepage_about'], true) ? ($sectionType === 'about_page' ? 'About page introduction' : ($sectionType === 'homepage_about' ? 'Section subtitle' : 'Hero subtitle')) : ($sectionType === 'services_page' ? 'Hero description' : ($sectionType === 'partner' ? 'Logo alt text' : ($sectionType === 'testimonial' ? 'Testimonial description' : ($sectionType === 'success_story' ? 'Project description' : ($sectionType === 'blog' ? 'Excerpt' : ($sectionType === 'pricing' ? 'Plan description' : 'Short description')))))) ?></label>
                                <textarea class="form-control" id="f-summary" name="summary" rows="3" <?= in_array($sectionType, ['testimonial', 'partner'], true) ? 'required' : '' ?>><?= e($editingItem['summary'] ?? '') ?></textarea>
                            </div>

                            <?php if (in_array($sectionType, ['blog', 'page', 'hero_content'], true)): ?>
                                <div class="col-12">
                                    <label class="form-label fw-semibold" for="f-body"><?= $sectionType === 'blog' ? 'Article content' : ($sectionType === 'hero_content' ? 'Main hero description' : 'Additional details') ?></label>
                                    <textarea class="form-control" id="f-body" name="body" rows="<?= $sectionType === 'hero_content' ? '5' : '6' ?>"><?= e($sectionType === 'blog' ? ($formMeta['body'] ?? $editingItem['body'] ?? '') : ($editingItem['body'] ?? '')) ?></textarea>
                                    <?php if ($sectionType === 'blog'): ?><div class="form-text">Use # Heading, ## Subheading, ### Small heading, blank lines between paragraphs, and - before list items.</div><?php endif; ?>
                                </div>
                            <?php endif; ?>

                            <?php if ($sectionType === 'hero_content'): ?>
                                <?php
                                $heroFields = [
                                    'heading_prefix' => 'Heading — first part',
                                    'heading_underline' => 'Heading — underlined part',
                                    'heading_highlight' => 'Heading — highlighted part',
                                    'heading_suffix' => 'Heading — final part',
                                    'badge' => 'Badge above heading',
                                    'description_secondary' => 'Second description',
                                    'benefits' => 'Checklist items — one per line',
                                    'form_title' => 'Lead form heading',
                                    'form_subtitle' => 'Lead form description',
                                    'contact_for_label' => 'Contact-for label',
                                    'contact_for' => 'Contact-for text',
                                    'name_placeholder' => 'Name field placeholder',
                                    'email_placeholder' => 'Email field placeholder',
                                    'phone_placeholder' => 'Phone field placeholder',
                                    'company_placeholder' => 'Company field placeholder',
                                    'service_placeholder' => 'Service selector prompt',
                                    'service_options' => 'Service choices — one per line',
                                    'message_placeholder' => 'Message field placeholder',
                                    'consent_text' => 'Consent checkbox text',
                                    'robot_text' => 'Robot checkbox text',
                                    'recaptcha_text' => 'reCAPTCHA text',
                                    'submit_label' => 'Form submit button text',
                                    'phone_label' => 'Phone call prompt',
                                    'phone_number' => 'Phone number',
                                    'trust_first' => 'First trust message',
                                    'trust_second' => 'Second trust message',
                                    'trust_third' => 'Third trust message',
                                ];
                                ?>
                                <?php foreach ($heroFields as $field => $label): ?>
                                    <div class="<?= in_array($field, ['description_secondary', 'benefits', 'form_subtitle', 'contact_for', 'service_options'], true) ? 'col-12' : 'col-md-6' ?>">
                                        <label class="form-label fw-semibold" for="f-hero-<?= e($field) ?>"><?= e($label) ?></label>
                                        <?php if (in_array($field, ['description_secondary', 'benefits', 'form_subtitle', 'service_options'], true)): ?>
                                            <textarea class="form-control" id="f-hero-<?= e($field) ?>" name="<?= e($field) ?>" rows="<?= in_array($field, ['benefits', 'service_options'], true) ? '5' : '2' ?>"><?= e($formMeta[$field] ?? '') ?></textarea>
                                            <?php if ($field === 'benefits' || $field === 'service_options'): ?><div class="form-text">One item per line. Remove a line to remove that item from the hero.</div><?php endif; ?>
                                        <?php else: ?>
                                            <input type="text" class="form-control" id="f-hero-<?= e($field) ?>" name="<?= e($field) ?>" value="<?= e($formMeta[$field] ?? '') ?>" maxlength="250" <?= $field === 'phone_number' ? 'inputmode="tel"' : '' ?>>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                                <div class="col-12"><div class="form-text">The four heading fields keep the original underlined and highlighted heading design.</div></div>

                            <?php elseif ($sectionType === 'about_page'): ?>
                                <?php
                                $aboutRowsText = static function (array $rows, array $columns): string {
                                    return implode("\n", array_map(static function (array $row) use ($columns): string {
                                        return implode(' | ', array_map(static function (string $column) use ($row): string {
                                            return (string) ($row[$column] ?? '');
                                        }, $columns));
                                    }, $rows));
                                };
                                $aboutTextFields = [
                                    'badge' => 'Badge above heading',
                                    'hero_prefix' => 'Main heading — first part',
                                    'hero_highlight' => 'Main heading — highlighted part',
                                    'hero_suffix' => 'Main heading — final part',
                                    'story_heading_prefix' => 'Story heading — first part',
                                    'story_heading_highlight' => 'Story heading — highlighted part',
                                    'story_visual_brand' => 'Story visual brand name',
                                    'story_visual_tagline' => 'Story visual tagline',
                                    'values_heading_prefix' => 'Core values heading — first part',
                                    'values_heading_highlight' => 'Core values heading — highlighted part',
                                    'values_subtitle' => 'Core values description',
                                    'journey_heading_prefix' => 'Journey heading — first part',
                                    'journey_heading_highlight' => 'Journey heading — highlighted part',
                                    'journey_subtitle' => 'Journey description',
                                    'cta_title' => 'Bottom call-to-action heading',
                                    'cta_description' => 'Bottom call-to-action description',
                                    'cta_primary_label' => 'Primary button text',
                                    'cta_primary_href' => 'Primary button link',
                                    'cta_secondary_label' => 'Secondary button text',
                                    'cta_secondary_href' => 'Secondary button link',
                                    'page_meta_title' => 'Browser / SEO page title',
                                    'page_meta_description' => 'SEO meta description',
                                ];
                                ?>
                                <div class="col-12"><div class="form-text">You can change all the public About page text and lists below. The page layout and styling stay unchanged.</div></div>
                                <?php foreach ($aboutTextFields as $field => $label): ?>
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold" for="f-about-<?= e($field) ?>"><?= e($label) ?></label>
                                        <input type="text" class="form-control" id="f-about-<?= e($field) ?>" name="<?= e($field) ?>" maxlength="250" value="<?= e($formMeta[$field] ?? '') ?>" <?= strpos($field, '_href') !== false ? 'placeholder="/contact.php"' : '' ?>>
                                    </div>
                                <?php endforeach; ?>
                                <div class="col-12">
                                    <label class="form-label fw-semibold" for="f-about-story">Our Story paragraphs</label>
                                    <textarea class="form-control" id="f-about-story" name="story_paragraphs" rows="5"><?= e(implode("\n", $formMeta['story_paragraphs'] ?? [])) ?></textarea>
                                    <div class="form-text">One paragraph per line.</div>
                                </div>
                                <?php foreach ([
                                    'stats' => ['Stats', ['icon', 'value', 'label', 'description'], 'One stat per line: icon | value | label | description. Icons: award, users, briefcase, trending, shield, target, lightbulb, handshake, rocket, zap.'],
                                    'core_values' => ['Core values', ['icon', 'title', 'description'], 'One value per line: icon | title | description. Use the icon names listed above.'],
                                    'milestones' => ['Journey milestones', ['year', 'title', 'description'], 'One milestone per line: year | title | description.'],
                                    'usp_items' => ['Highlights', ['icon', 'title', 'description'], 'One highlight per line: icon | title | description.'],
                                ] as $field => [$label, $columns, $help]): ?>
                                    <div class="col-12">
                                        <label class="form-label fw-semibold" for="f-about-<?= e($field) ?>"><?= e($label) ?></label>
                                        <textarea class="form-control" id="f-about-<?= e($field) ?>" name="<?= e($field) ?>" rows="<?= $field === 'milestones' ? '6' : '4' ?>"><?= e($aboutRowsText($formMeta[$field] ?? [], $columns)) ?></textarea>
                                        <div class="form-text"><?= e($help) ?></div>
                                    </div>
                                <?php endforeach; ?>

                            <?php elseif ($sectionType === 'homepage_about'): ?>
                                <?php
                                $homepageAboutRowsText = static function (array $rows, array $columns): string {
                                    return implode("\n", array_map(static function (array $row) use ($columns): string {
                                        return implode(' | ', array_map(static function (string $column) use ($row): string {
                                            return (string) ($row[$column] ?? '');
                                        }, $columns));
                                    }, $rows));
                                };
                                $homepageAboutTextFields = [
                                    'badge' => 'Badge above heading',
                                    'heading_prefix' => 'Heading — first part',
                                    'heading_highlight' => 'Heading — highlighted part',
                                    'heading_suffix' => 'Heading — final part',
                                    'image_src' => 'Image URL / site path',
                                    'image_alt' => 'Image alt text',
                                    'brand_name' => 'Image badge brand name',
                                    'brand_tagline' => 'Image badge tagline',
                                    'why_heading' => 'Checklist heading',
                                    'trust_prefix' => 'Trust message — prefix',
                                    'trust_highlight' => 'Trust message — highlighted text',
                                    'trust_suffix' => 'Trust message — ending',
                                    'content_heading_prefix' => 'Right heading — first part',
                                    'content_heading_highlight' => 'Right heading — highlighted part',
                                    'usp_title' => 'USP heading',
                                    'usp_description' => 'USP description',
                                    'cta_label' => 'Button text',
                                    'cta_href' => 'Button link',
                                    'excellence_text' => 'Years/excellence message',
                                ];
                                ?>
                                <div class="col-12"><div class="form-text">Edit the complete homepage About section. Existing layout, styles, icons, and animations remain unchanged. Lists use one item per line; card fields are separated with |.</div></div>
                                <?php foreach ($homepageAboutTextFields as $field => $label): ?>
                                    <div class="<?= in_array($field, ['image_src', 'usp_description'], true) ? 'col-12' : 'col-md-6' ?>">
                                        <label class="form-label fw-semibold" for="f-home-about-<?= e($field) ?>"><?= e($label) ?></label>
                                        <?php if ($field === 'usp_description'): ?>
                                            <textarea class="form-control" id="f-home-about-<?= e($field) ?>" name="<?= e($field) ?>" rows="3"><?= e($formMeta[$field] ?? '') ?></textarea>
                                        <?php else: ?>
                                            <input type="text" class="form-control" id="f-home-about-<?= e($field) ?>" name="<?= e($field) ?>" maxlength="1000" value="<?= e($formMeta[$field] ?? '') ?>" <?= $field === 'cta_href' ? 'placeholder="/about.php"' : '' ?>>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                                <div class="col-12">
                                    <label class="form-label fw-semibold" for="f-home-about-image">Upload section image <span class="text-body-secondary fw-normal small">· JPG, PNG, WEBP or GIF, max 5 MB</span></label>
                                    <input type="file" class="form-control" id="f-home-about-image" name="image" accept="image/jpeg,image/png,image/webp,image/gif">
                                    <div class="form-text">Or change the image URL / site path above.</div>
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-semibold" for="f-home-about-paragraphs">Main description paragraphs</label>
                                    <textarea class="form-control" id="f-home-about-paragraphs" name="paragraphs" rows="5"><?= e(implode("\n", $formMeta['paragraphs'] ?? [])) ?></textarea>
                                    <div class="form-text">One paragraph per line.</div>
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-semibold" for="f-home-about-why">Why choose us checklist</label>
                                    <textarea class="form-control" id="f-home-about-why" name="why_points" rows="4"><?= e(implode("\n", $formMeta['why_points'] ?? [])) ?></textarea>
                                    <div class="form-text">One checklist item per line.</div>
                                </div>
                                <?php foreach ([
                                    'stats' => ['Stats cards', ['icon', 'value', 'label'], 'One card per line: icon | value | label.'],
                                    'features' => ['Feature cards', ['icon', 'title', 'description'], 'One card per line: icon | title | description. Feature descriptions must not contain |.'],
                                ] as $field => [$label, $columns, $help]): ?>
                                    <div class="col-12">
                                        <label class="form-label fw-semibold" for="f-home-about-<?= e($field) ?>"><?= e($label) ?></label>
                                        <textarea class="form-control" id="f-home-about-<?= e($field) ?>" name="<?= e($field) ?>" rows="<?= $field === 'features' ? '6' : '4' ?>"><?= e($homepageAboutRowsText($formMeta[$field] ?? [], $columns)) ?></textarea>
                                        <div class="form-text"><?= e($help) ?> Icons: award, shield, dollar, users2, rocket, target, brain, handshake.</div>
                                    </div>
                                <?php endforeach; ?>

                            <?php elseif ($sectionType === 'services_page'): ?>
                                <?php
                                $serviceRowsText = static function (array $rows, array $columns): string {
                                    return implode("\n", array_map(static function (array $row) use ($columns): string {
                                        return implode(' | ', array_map(static function (string $column) use ($row): string {
                                            return (string) ($row[$column] ?? '');
                                        }, $columns));
                                    }, $rows));
                                };
                                $servicePageFields = [
                                    'page_meta_title' => 'Browser / SEO page title',
                                    'page_meta_description' => 'SEO meta description',
                                    'hero_badge' => 'Hero badge',
                                    'hero_heading_prefix' => 'Hero heading — first part',
                                    'hero_heading_highlight' => 'Hero heading — highlighted part',
                                    'hero_primary_label' => 'Hero button text',
                                    'hero_primary_href' => 'Hero button link',
                                    'button_separator_label' => 'Button separator text',
                                    'hero_phone' => 'Hero phone number',
                                    'hero_phone_label' => 'Hero phone button text',
                                    'quote_title' => 'Quote form heading',
                                    'quote_name_placeholder' => 'Quote form — name placeholder',
                                    'quote_phone_placeholder' => 'Quote form — phone placeholder',
                                    'quote_email_placeholder' => 'Quote form — email placeholder',
                                    'quote_message_placeholder' => 'Quote form — message placeholder',
                                    'robot_label' => 'Quote form — robot checkbox',
                                    'recaptcha_label' => 'Quote form — reCAPTCHA label',
                                    'quote_submit_label' => 'Quote form — submit button',
                                    'intro_eyebrow' => 'Introduction eyebrow',
                                    'intro_heading_prefix' => 'Introduction heading — first part',
                                    'intro_heading_highlight' => 'Introduction heading — highlighted part',
                                    'website_pre' => 'Website CTA eyebrow',
                                    'website_heading' => 'Website CTA heading',
                                    'website_description' => 'Website CTA description',
                                    'website_primary_label' => 'Website CTA button text',
                                    'website_primary_href' => 'Website CTA button link',
                                    'website_phone' => 'Website CTA phone number',
                                    'website_phone_label' => 'Website CTA phone button text',
                                    'website_image' => 'Website CTA image URL / path',
                                    'website_image_alt' => 'Website CTA image alt text',
                                    'services_eyebrow' => 'Services section eyebrow',
                                    'services_heading_prefix' => 'Services heading — first part',
                                    'services_heading_highlight' => 'Services heading — highlighted part',
                                    'services_subtitle' => 'Services section subtitle',
                                    'main_service_link_label' => 'Core service link text',
                                    'main_service_link_href' => 'Core service link destination',
                                    'seo_badge' => 'SEO section badge',
                                    'seo_heading_prefix' => 'SEO heading — first part',
                                    'seo_heading_highlight' => 'SEO heading — highlighted part',
                                    'seo_subtitle' => 'SEO section subtitle',
                                    'seo_quote_label' => 'SEO quote button text',
                                    'seo_quote_href' => 'SEO quote button link',
                                    'results_heading_prefix' => 'Results heading — first part',
                                    'results_heading_highlight' => 'Results heading — highlighted part',
                                    'process_heading_prefix' => 'Process heading — first part',
                                    'process_heading_highlight' => 'Process heading — highlighted part',
                                    'process_subtitle' => 'Process subtitle',
                                    'faq_heading_prefix' => 'FAQ heading — first part',
                                    'faq_heading_highlight' => 'FAQ heading — highlighted part',
                                    'cta_title' => 'Bottom CTA heading',
                                    'cta_description' => 'Bottom CTA description',
                                    'cta_primary_label' => 'Bottom CTA primary button',
                                    'cta_primary_href' => 'Bottom CTA primary link',
                                    'cta_secondary_label' => 'Bottom CTA secondary button',
                                    'cta_secondary_href' => 'Bottom CTA secondary link',
                                    'proposal_pre' => 'Proposal form eyebrow',
                                    'proposal_heading_prefix' => 'Proposal heading — first part',
                                    'proposal_heading_highlight' => 'Proposal heading — highlighted part',
                                    'proposal_heading_suffix' => 'Proposal heading — final part',
                                    'proposal_name_placeholder' => 'Proposal form — name placeholder',
                                    'proposal_phone_placeholder' => 'Proposal form — phone placeholder',
                                    'proposal_email_placeholder' => 'Proposal form — email placeholder',
                                    'proposal_message_placeholder' => 'Proposal form — message placeholder',
                                    'proposal_robot_label' => 'Proposal form — robot checkbox',
                                    'proposal_recaptcha_label' => 'Proposal form — reCAPTCHA label',
                                    'proposal_submit_label' => 'Proposal form — submit button',
                                ];
                                ?>
                                <div class="col-12"><div class="form-text">Edit the complete What We Do page here. Its public layout and styling stay unchanged. Use one item per line for lists and separate structured fields with |.</div></div>
                                <?php foreach ($servicePageFields as $field => $label): ?>
                                    <div class="<?= in_array($field, ['page_meta_description', 'website_description', 'website_image'], true) ? 'col-12' : 'col-md-6' ?>">
                                        <label class="form-label fw-semibold" for="f-services-<?= e($field) ?>"><?= e($label) ?></label>
                                        <?php if (in_array($field, ['page_meta_description', 'website_description'], true)): ?>
                                            <textarea class="form-control" id="f-services-<?= e($field) ?>" name="<?= e($field) ?>" rows="3"><?= e($formMeta[$field] ?? '') ?></textarea>
                                        <?php else: ?>
                                            <input type="text" class="form-control" id="f-services-<?= e($field) ?>" name="<?= e($field) ?>" maxlength="1000" value="<?= e($formMeta[$field] ?? '') ?>" <?= strpos($field, '_href') !== false ? 'placeholder="/contact.php"' : '' ?>>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                                <div class="col-12">
                                    <label class="form-label fw-semibold" for="f-services-intro">Introduction paragraphs</label>
                                    <textarea class="form-control" id="f-services-intro" name="intro_paragraphs" rows="5"><?= e(implode("\n", $formMeta['intro_paragraphs'] ?? [])) ?></textarea>
                                    <div class="form-text">One paragraph per line.</div>
                                </div>
                                <?php foreach ([
                                    'stats' => ['Statistics', ['icon', 'value', 'label'], 'One per line: icon | value | label.'],
                                    'main_services' => ['Core services', ['icon', 'title', 'description', 'features'], 'One per line: icon | title | description | feature 1; feature 2; feature 3.'],
                                    'seo_services' => ['SEO services', ['icon', 'title', 'description', 'benefits'], 'One per line: icon | title | description | benefit 1; benefit 2; benefit 3.'],
                                    'results' => ['Results highlights', ['title', 'description'], 'One per line: title | description.'],
                                    'process' => ['Process steps', ['step', 'title', 'description'], 'One per line: step | title | description.'],
                                    'faqs' => ['Frequently asked questions', ['q', 'a'], 'One per line: question | answer.'],
                                ] as $field => [$label, $columns, $help]): ?>
                                    <div class="col-12">
                                        <label class="form-label fw-semibold" for="f-services-<?= e($field) ?>"><?= e($label) ?></label>
                                        <?php if ($field === 'main_services' || $field === 'seo_services'): ?>
                                            <?php $rows = $formMeta[$field] ?? []; ?>
                                            <textarea class="form-control" id="f-services-<?= e($field) ?>" name="<?= e($field) ?>" rows="<?= $field === 'main_services' ? 8 : 5 ?>"><?php $mappedRows = array_map(static function (array $row) use ($field): array { $row[$field === 'main_services' ? 'features' : 'benefits'] = implode('; ', $row[$field === 'main_services' ? 'features' : 'benefits'] ?? []); return $row; }, $rows); ?><?= e($serviceRowsText($mappedRows, $columns)) ?></textarea>
                                        <?php else: ?>
                                            <textarea class="form-control" id="f-services-<?= e($field) ?>" name="<?= e($field) ?>" rows="<?= $field === 'faqs' || $field === 'results' ? 6 : 4 ?>"><?= e($serviceRowsText($formMeta[$field] ?? [], $columns)) ?></textarea>
                                        <?php endif; ?>
                                        <div class="form-text"><?= e($help) ?> Icon names: <?= $field === 'stats' || $field === 'main_services' || $field === 'seo_services' ? 'award, users, trending, clock, paintbrush, code, search, share, megaphone, smartphone, mappin, globe, earth.' : '' ?></div>
                                    </div>
                                <?php endforeach; ?>

                            <?php elseif ($sectionType === 'packages_page'): ?>
                                <?php
                                $packageRowsText = static function (array $rows, array $columns): string {
                                    return implode("\n", array_map(static function (array $row) use ($columns): string {
                                        return implode(' | ', array_map(static function (string $column) use ($row): string {
                                            return (string) ($row[$column] ?? '');
                                        }, $columns));
                                    }, $rows));
                                };
                                $packagePageFields = [
                                    'page_meta_title' => 'Browser / SEO page title',
                                    'page_meta_description' => 'SEO meta description',
                                    'hero_badge' => 'Hero badge',
                                    'heading_prefix' => 'Main heading — first part',
                                    'heading_highlight' => 'Main heading — highlighted part',
                                    'monthly_label' => 'Monthly billing label',
                                    'yearly_label' => 'Yearly billing label',
                                    'save_badge' => 'Yearly savings badge',
                                    'popular_badge' => 'Popular plan badge',
                                    'monthly_period_label' => 'Monthly price suffix',
                                    'yearly_period_label' => 'Yearly price suffix',
                                    'addons_heading_prefix' => 'Add-ons heading — first part',
                                    'addons_heading_highlight' => 'Add-ons heading — highlighted part',
                                    'addons_subtitle' => 'Add-ons subtitle',
                                    'faq_heading_prefix' => 'FAQ heading — first part',
                                    'faq_heading_highlight' => 'FAQ heading — highlighted part',
                                    'faq_subtitle' => 'FAQ subtitle',
                                    'cta_title' => 'Bottom CTA heading',
                                    'cta_description' => 'Bottom CTA description',
                                    'cta_primary_label' => 'Bottom CTA button text',
                                    'cta_primary_href' => 'Bottom CTA button link',
                                    'cta_phone' => 'Bottom CTA phone number',
                                    'cta_phone_label' => 'Bottom CTA phone display text',
                                ];
                                ?>
                                <div class="col-12"><div class="form-text">Edit the complete Packages page. The existing design stays unchanged. Edit plan lines with the format below; separate plan features with semicolons.</div></div>
                                <?php foreach ($packagePageFields as $field => $label): ?>
                                    <div class="<?= in_array($field, ['page_meta_description', 'addons_subtitle', 'faq_subtitle', 'cta_description'], true) ? 'col-12' : 'col-md-6' ?>">
                                        <label class="form-label fw-semibold" for="f-packages-<?= e($field) ?>"><?= e($label) ?></label>
                                        <?php if (in_array($field, ['page_meta_description', 'addons_subtitle', 'faq_subtitle', 'cta_description'], true)): ?>
                                            <textarea class="form-control" id="f-packages-<?= e($field) ?>" name="<?= e($field) ?>" rows="2"><?= e($formMeta[$field] ?? '') ?></textarea>
                                        <?php else: ?>
                                            <input type="text" class="form-control" id="f-packages-<?= e($field) ?>" name="<?= e($field) ?>" maxlength="1000" value="<?= e((string) ($formMeta[$field] ?? '')) ?>" <?= $field === 'cta_primary_href' ? 'placeholder="/contact.php"' : '' ?>>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                                <div class="col-12">
                                    <label class="form-label fw-semibold" for="f-packages-plans">Package plans</label>
                                    <?php
                                    $packageRows = array_map(static function (array $package): array {
                                        $package['features'] = implode('; ', $package['features'] ?? []);
                                        $package['popular'] = !empty($package['popular']) ? 'yes' : 'no';
                                        return $package;
                                    }, $formMeta['packages'] ?? []);
                                    ?>
                                    <textarea class="form-control" id="f-packages-plans" name="packages" rows="10"><?= e($packageRowsText($packageRows, ['id', 'name', 'icon', 'monthly', 'yearly', 'description', 'features', 'popular', 'buttonText', 'buttonHref'])) ?></textarea>
                                    <div class="form-text">One plan per line: id | name | icon (zap/rocket/crown) | monthly price | yearly price | description | feature 1; feature 2 | popular (yes/no) | button text | button link.</div>
                                </div>
                                <?php foreach ([
                                    'addons' => ['Add-ons', ['name', 'price'], 'One add-on per line: name | price.'],
                                    'trust_badges' => ['Trust badges', ['icon', 'title', 'subtitle'], 'One badge per line: icon (award/users/shield/clock) | title | subtitle.'],
                                    'faqs' => ['Frequently asked questions', ['question', 'answer'], 'One FAQ per line: question | answer.'],
                                ] as $field => [$label, $columns, $help]): ?>
                                    <div class="col-12">
                                        <label class="form-label fw-semibold" for="f-packages-<?= e($field) ?>"><?= e($label) ?></label>
                                        <textarea class="form-control" id="f-packages-<?= e($field) ?>" name="<?= e($field) ?>" rows="<?= $field === 'faqs' ? '6' : '4' ?>"><?= e($packageRowsText($formMeta[$field] ?? [], $columns)) ?></textarea>
                                        <div class="form-text"><?= e($help) ?></div>
                                    </div>
                                <?php endforeach; ?>

                            <?php elseif ($sectionType === 'service'): ?>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold" for="f-icon">Icon or emoji</label>
                                    <input type="text" class="form-control" id="f-icon" name="icon" value="<?= e($formMeta['icon'] ?? '') ?>" maxlength="80">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold" for="f-href">Destination URL</label>
                                    <!-- type=text: browser ka type=url "/services.php" jaisa path reject kar deta tha -->
                                    <input type="text" class="form-control" id="f-href" name="href" value="<?= e($formMeta['href'] ?? '') ?>" placeholder="/services.php">
                                </div>

                            <?php elseif ($sectionType === 'blog'): ?>
                                <?php foreach ([
                                    'category' => 'Category',
                                    'author' => 'Author name',
                                    'date' => 'Published date',
                                    'read_time' => 'Reading time',
                                    'likes' => 'Initial likes',
                                ] as $field => $label): ?>
                                    <?php $value = $field === 'read_time' ? ($formMeta['readTime'] ?? '') : ($formMeta[$field] ?? ''); ?>
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold" for="f-blog-<?= e($field) ?>"><?= e($label) ?></label>
                                        <input type="<?= $field === 'likes' ? 'number' : 'text' ?>" class="form-control" id="f-blog-<?= e($field) ?>" name="<?= e($field) ?>" value="<?= e((string) $value) ?>" <?= $field === 'likes' ? 'min="0" step="1"' : '' ?>>
                                    </div>
                                <?php endforeach; ?>
                                <div class="col-12">
                                    <label class="form-label fw-semibold" for="f-blog-image-url">Blog image URL / site path</label>
                                    <input type="text" class="form-control" id="f-blog-image-url" name="image_url" value="<?= e($formMeta['image'] ?? '') ?>" placeholder="/assets/images/your-blog-image.jpg or https://...">
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

                            <?php if (in_array($sectionType, ['page', 'success_story', 'testimonial', 'partner', 'blog'], true)): ?>
                                <div class="col-12">
                                    <label class="form-label fw-semibold" for="f-image"><?= $sectionType === 'testimonial' ? 'Client photo' : ($sectionType === 'partner' ? 'Partner logo' : ($sectionType === 'blog' ? 'Upload blog image' : 'Image')) ?> <span class="text-body-secondary fw-normal small">· JPG, PNG, WEBP or GIF, max 5 MB</span></label>
                                    <input type="file" class="form-control" id="f-image" name="image" accept="image/jpeg,image/png,image/webp,image/gif" <?= $sectionType === 'partner' && empty($formMeta['image']) ? 'required' : '' ?>>
                                    <div class="d-flex align-items-center gap-3 mt-2" id="cmsImagePreviewWrap" <?= empty($formMeta['image']) ? 'hidden' : '' ?>>
                                        <img id="cmsImagePreview" class="rounded-3 border" style="width:64px;height:64px;object-fit:cover" src="<?= e($formMeta['image'] ?? '') ?>" alt="">
                                        <span class="small text-body-secondary"><?= !empty($formMeta['image']) ? 'Current image is retained unless you upload a replacement.' : 'Image preview.' ?></span>
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