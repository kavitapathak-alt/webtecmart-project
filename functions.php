<?php
require_once __DIR__ . '/config.php';

function serviceCards(): array
{
    $defaults = [
        [
            'title' => 'SEO Growth',
            'summary' => 'Rank higher on Google and bring ready-to-buy traffic that converts.',
            'icon' => '📈',
            'href' => '/search-engine-optimization.php',
        ],
        [
            'title' => 'Paid Ads',
            'summary' => 'Scale leads with strategic Google, Meta, and YouTube ad campaigns.',
            'icon' => '🎯',
            'href' => '/search-engine-marketing.php',
        ],
        [
            'title' => 'Social Media',
            'summary' => 'Build a consistent brand presence with creative content and engagement.',
            'icon' => '📱',
            'href' => '/social-media-optimization.php',
        ],
        [
            'title' => 'Web Design',
            'summary' => 'Turn visitors into leads with conversion-focused, mobile-first websites.',
            'icon' => '💻',
            'href' => '/website-design-development.php',
        ],
    ];

    return cmsContent('service', $defaults);
}

function pricingPlans(): array
{
    $defaults = [
        [
            'name' => 'Starter',
            'price' => '₹18,999',
            'description' => 'Perfect for small businesses ready to build initial digital demand.',
            'features' => ['SEO setup', 'Landing page', 'Monthly reporting', '1 campaign strategy'],
            'popular' => false,
        ],
        [
            'name' => 'Growth',
            'price' => '₹39,999',
            'description' => 'Built for brands that want faster growth and consistent lead flow.',
            'features' => ['Paid ads management', 'SEO + content plan', 'CRM setup', 'Weekly optimization'],
            'popular' => true,
        ],
        [
            'name' => 'Scale',
            'price' => '₹79,999',
            'description' => 'High-touch marketing systems for large-volume leads and sales pipeline.',
            'features' => ['Multi-channel campaigns', 'Analytics dashboard', 'Conversion tracking', 'Dedicated strategist'],
            'popular' => false,
        ],
    ];

    return cmsContent('pricing', $defaults);
}

function testimonials(): array
{
    $defaults = [
        [
            'name' => 'Aarav Mehta',
            'role' => 'Founder, UrbanNest Realty',
            'quote' => 'We doubled our lead count in 90 days, and the reporting was crystal clear.',
        ],
        [
            'name' => 'Riya Shah',
            'role' => 'Director, FreshCart',
            'quote' => 'The team understood our market and built campaigns that actually converted.',
        ],
        [
            'name' => 'Vikram S.',
            'role' => 'Owner, BrightCare Clinic',
            'quote' => 'From strategy to creatives to funnels, everything felt aligned and results-driven.',
        ],
    ];

    return cmsContent('testimonial', $defaults);
}

function successStories(): array
{
    $defaults = [
        [
            'id' => 1,
            'title' => 'Bharat Tex Fair 2026',
            'industry' => 'Global Textile Event',
            'flag' => '🇮🇳',
            'country' => 'India',
            'duration' => '9 Months',
            'result' => '400% Organic Growth',
            'description' => 'Global textile event supported by the Ministry of Textiles, Government of India. Transformed organic visibility and established dominance in global textile search space.',
            'image' => '/assets/images/case-study-1.jpg',
            'imageFit' => 'cover',
            'website' => 'https://bharat-tex.com/',
            'accentFrom' => '#C4007A',
            'accentTo' => '#E0398F',
            'metrics' => [
                ['icon' => 'trending', 'value' => 400, 'suffix' => '%', 'label' => 'Organic Growth'],
                ['icon' => 'search', 'value' => 200, 'suffix' => '+', 'label' => 'Keywords Ranked'],
                ['icon' => 'trophy', 'value' => 80, 'suffix' => '+', 'label' => 'Top 3 Rankings'],
                ['icon' => 'chart', 'value' => 180, 'suffix' => '+', 'label' => 'Leads / Month'],
            ],
            'keywords' => [
                ['text' => 'World largest textile fair 2026', 'top' => true],
                ['text' => 'Global textile Fair', 'top' => true],
                ['text' => 'Global textile sourcing fair 2026', 'top' => true],
                ['text' => 'Website Development'],
                ['text' => 'Digital Marketing Agency'],
            ],
        ],
        [
            'id' => 2,
            'title' => 'Autumn fair 2026',
            'industry' => 'Local Business',
            'flag' => '🇦🇪',
            'country' => 'UAE',
            'duration' => '4 Months',
            'result' => 'Top 3 Rankings',
            'description' => 'India is a trusted global sourcing partner, with the 62nd IHGF Delhi Autumn Fair 2026 serving as a one-stop sourcing destination.',
            'image' => '/assets/images/case-study-2.jpg',
            'imageFit' => 'contain',
            'website' => 'https://ihgfdelhifair.in/',
            'accentFrom' => '#C4007A',
            'accentTo' => '#E0398F',
            'metrics' => [
                ['icon' => 'trending', 'value' => 300, 'suffix' => '%', 'label' => 'Footfall Increase'],
                ['icon' => 'search', 'value' => 85, 'suffix' => '+', 'label' => 'Keywords Ranked'],
                ['icon' => 'trophy', 'value' => 22, 'suffix' => '', 'label' => 'Top 3 Rankings'],
                ['icon' => 'chart', 'value' => 10, 'suffix' => '', 'label' => 'Locations Ranked #1'],
            ],
            'keywords' => [
                ['text' => 'Autumn Fair', 'top' => true],
                ['text' => 'Autumn Fair 2026', 'top' => true],
                ['text' => 'Autumn Fair Dates 2026', 'top' => true],
                ['text' => 'Autumn Fair Asia 2026'],
                ['text' => 'Autumn Sourcing Fair 2026'],
            ],
        ],
    ];

    return cmsContent('success_story', $defaults);
}

function blogPosts(): array
{
    $defaults = [
        ['title' => 'SEO wins that actually move revenue', 'summary' => 'Focus on intent, content depth, and technical clarity to attract higher-value visitors.'],
        ['title' => 'How PPC campaigns scale without wasting budget', 'summary' => 'Use tighter audience targeting and landing page alignment to improve efficiency.'],
        ['title' => 'Content systems for consistent lead flow', 'summary' => 'Build an editorial calendar that powers organic reach and steady customer demand.'],
    ];

    return cmsContent('blog', $defaults);
}

function homepageSections(): array
{
    $defaults = [
        ['title' => 'Hero Section', 'summary' => 'Main homepage headline, description and consultation form.'],
        ['title' => 'Trusted Partners', 'summary' => 'Trusted brands and partner logos section.'],
        ['title' => 'About WebTecMart', 'summary' => 'Agency introduction, metrics and growth promise.'],
        ['title' => 'What We Do', 'summary' => 'Services overview cards shown on the homepage.'],
        ['title' => 'Search Visibility', 'summary' => 'SEO service cards and free quote CTA.'],
        ['title' => 'SEO Portfolio', 'summary' => 'SEO success story and case study section.'],
        ['title' => 'Testimonials', 'summary' => 'Client testimonials and reviews.'],
        ['title' => 'Contact Form', 'summary' => 'Homepage enquiry form and contact information.'],
    ];

    return cmsContent('homepage', $defaults);
}

function renderPageAddons(string $page): void
{
    $stmt = db()->prepare('SELECT title, summary, body, metadata FROM content_items WHERE content_type = :type AND is_active = 1 ORDER BY sort_order ASC, id ASC');
    $stmt->execute([':type' => 'page']);

    $addons = [];
    foreach ($stmt->fetchAll() as $row) {
        $metadata = json_decode($row['metadata'] ?? '', true);
        if (is_array($metadata) && ($metadata['page'] ?? '') === $page) {
            $addons[] = [$row, $metadata];
        }
    }

    if (!$addons) {
        return;
    }
    ?>
    <style>
        .cms-page-addons { background:#fff7fa; padding:34px 0; border-bottom:1px solid rgba(196,0,122,.1); }
        .cms-page-addon { max-width:900px; margin:0 auto 16px; padding:22px; border:1px solid rgba(196,0,122,.14); border-radius:18px; background:#fff; }
        .cms-page-addon:last-child { margin-bottom:0; }
        .cms-page-addon h2 { margin:0 0 8px; color:#1a1425; font-size:1.6rem; }
        .cms-page-addon p { margin:8px 0 0; color:#6b6478; line-height:1.7; }
        .cms-page-addon img { display:block; width:100%; max-height:320px; object-fit:cover; border-radius:13px; margin-bottom:16px; }
    </style>
    <section class="cms-page-addons">
        <div class="container">
            <?php foreach ($addons as [$row, $metadata]): ?>
                <article class="cms-page-addon">
                    <?php if (!empty($metadata['image'])): ?><img src="<?= e($metadata['image']) ?>" alt="<?= e($row['title']) ?>"><?php endif; ?>
                    <h2><?= e($row['title']) ?></h2>
                    <?php if ($row['summary'] !== ''): ?><p><?= e($row['summary']) ?></p><?php endif; ?>
                    <?php if ($row['body'] !== ''): ?><p><?= e($row['body']) ?></p><?php endif; ?>
                </article>
            <?php endforeach; ?>
        </div>
    </section>
    <?php
}

function cmsContent(string $type, array $defaults): array
{
    $stmt = db()->prepare('SELECT title, summary, body, metadata FROM content_items WHERE content_type = :type AND is_active = 1 ORDER BY sort_order ASC, id ASC');
    $stmt->execute([':type' => $type]);
    $rows = $stmt->fetchAll();

    if (!$rows) {
        $insert = db()->prepare('INSERT INTO content_items (content_type, title, summary, body, metadata, sort_order) VALUES (:type, :title, :summary, :body, :metadata, :sort_order)');
        foreach ($defaults as $index => $item) {
            $insert->execute([
                ':type' => $type,
                ':title' => $item['title'] ?? $item['name'] ?? 'Untitled',
                ':summary' => $item['summary'] ?? $item['quote'] ?? $item['description'] ?? '',
                ':body' => $item['body'] ?? '',
                ':metadata' => json_encode($item, JSON_UNESCAPED_UNICODE),
                ':sort_order' => $index,
            ]);
        }
        return $defaults;
    }

    return array_map(function (array $row) use ($type): array {
        $item = json_decode($row['metadata'] ?? '', true);
        if (!is_array($item)) {
            $item = [];
        }
        $item['title'] = $row['title'];
        $item['summary'] = $row['summary'] ?? '';
        if ($row['body'] !== '') {
            $item['body'] = $row['body'];
        }
        if ($type === 'pricing') {
            $item = [
                'name' => $row['title'],
                'price' => $item['price'] ?? 'Contact us',
                'description' => $row['summary'] ?? '',
                'features' => $row['body'] !== '' ? preg_split('/\r\n|\r|\n/', $row['body']) : [],
                'popular' => (bool) ($item['popular'] ?? false),
            ];
        }
        return $item;
    }, $rows);
}

function cmsAllContent(): array
{
    return db()->query('SELECT * FROM content_items ORDER BY content_type ASC, sort_order ASC, id ASC')->fetchAll();
}

function cmsGetById(int $id): ?array
{
    $stmt = db()->prepare('SELECT * FROM content_items WHERE id = :id LIMIT 1');
    $stmt->execute([':id' => $id]);
    $row = $stmt->fetch();
    return $row ?: null;
}

function cmsSave(string $type, string $title, string $summary, string $body, array $metadata = [], ?int $id = null): void
{
    $payload = json_encode($metadata, JSON_UNESCAPED_UNICODE);

    if ($id !== null) {
        $stmt = db()->prepare('UPDATE content_items SET content_type = :type, title = :title, summary = :summary, body = :body, metadata = :metadata, updated_at = CURRENT_TIMESTAMP WHERE id = :id');
        $stmt->execute([
            ':type' => $type,
            ':title' => $title,
            ':summary' => $summary,
            ':body' => $body,
            ':metadata' => $payload,
            ':id' => $id,
        ]);
        return;
    }

    $stmt = db()->prepare('INSERT INTO content_items (content_type, title, summary, body, metadata, sort_order) VALUES (:type, :title, :summary, :body, :metadata, :sort_order)');
    $stmt->execute([
        ':type' => $type,
        ':title' => $title,
        ':summary' => $summary,
        ':body' => $body,
        ':metadata' => $payload,
        ':sort_order' => 999,
    ]);
}

function cmsDelete(int $id): void
{
    $stmt = db()->prepare('DELETE FROM content_items WHERE id = :id');
    $stmt->execute([':id' => $id]);
}

function uploadCmsImage(array $file): string
{
    if (($file['error'] ?? UPLOAD_ERR_NO_FILE) === UPLOAD_ERR_NO_FILE) {
        return '';
    }

    if (($file['error'] ?? UPLOAD_ERR_OK) !== UPLOAD_ERR_OK || ($file['size'] ?? 0) > 5 * 1024 * 1024) {
        return '';
    }

    $mime = (new finfo(FILEINFO_MIME_TYPE))->file($file['tmp_name']);
    $extensions = [
        'image/jpeg' => 'jpg',
        'image/png' => 'png',
        'image/webp' => 'webp',
        'image/gif' => 'gif',
    ];
    if (!isset($extensions[$mime])) {
        return '';
    }

    $directory = __DIR__ . '/public/assets/uploads/content';
    if (!is_dir($directory)) {
        mkdir($directory, 0777, true);
    }

    $filename = bin2hex(random_bytes(12)) . '.' . $extensions[$mime];
    if (!move_uploaded_file($file['tmp_name'], $directory . '/' . $filename)) {
        return '';
    }

    return '/public/assets/uploads/content/' . $filename;
}

function latestLeads(): array
{
    $stmt = db()->query('SELECT * FROM leads ORDER BY created_at DESC LIMIT 5');
    return $stmt->fetchAll();
}
