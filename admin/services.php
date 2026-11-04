<?php
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../functions.php';
ensureAdmin();

// CSRF token initialization
if (!isset($_SESSION['cms_csrf_token'])) {
    $_SESSION['cms_csrf_token'] = bin2hex(random_bytes(32));
}

$flashSuccess = $_SESSION['admin_flash_success'] ?? null;
$flashError   = $_SESSION['admin_flash_error'] ?? null;
unset($_SESSION['admin_flash_success'], $_SESSION['admin_flash_error']);

// ============================================================
// ACTION HANDLERS (POST)
// ============================================================
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = $_POST['csrf_token'] ?? '';
    if (!is_string($token) || !hash_equals($_SESSION['cms_csrf_token'], $token)) {
        $_SESSION['admin_flash_error'] = 'Security validation failed (invalid CSRF token). Please try again.';
        redirect('/admin/services.php');
    }

    $action = $_POST['action'] ?? '';

    // 1. Quick Toggle Status (Active / Draft)
    if ($action === 'toggle_status') {
        $id = (int) ($_POST['id'] ?? 0);
        $stmt = db()->prepare('SELECT is_active FROM content_items WHERE id = :id AND content_type = "service_detail" LIMIT 1');
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch();
        if ($row) {
            $newStatus = (int) $row['is_active'] === 1 ? 0 : 1;
            $up = db()->prepare('UPDATE content_items SET is_active = :status, updated_at = CURRENT_TIMESTAMP WHERE id = :id');
            $up->execute([':status' => $newStatus, ':id' => $id]);
            $_SESSION['admin_flash_success'] = 'Service status updated to ' . ($newStatus === 1 ? 'Published' : 'Draft') . '.';
        } else {
            $_SESSION['admin_flash_error'] = 'Service not found.';
        }
        redirect('/admin/services.php');
    }

    // 2. Delete Service
    if ($action === 'delete') {
        $id = (int) ($_POST['id'] ?? 0);
        $del = db()->prepare('DELETE FROM content_items WHERE id = :id AND content_type = "service_detail"');
        $del->execute([':id' => $id]);
        $_SESSION['admin_flash_success'] = 'Service deleted successfully.';
        redirect('/admin/services.php');
    }

    // 3. Save Service (Create or Update)
    if ($action === 'save') {
        $id              = !empty($_POST['id']) ? (int) $_POST['id'] : null;
        $title           = trim($_POST['title'] ?? '');
        $category        = trim($_POST['category'] ?? 'SEO');
        $slug            = trim($_POST['slug'] ?? '');
        $icon            = trim($_POST['icon'] ?? 'sparkles');
        $tagline         = trim($_POST['tagline'] ?? '');
        $heroDescription = trim($_POST['hero_description'] ?? '');
        $summary         = trim($_POST['summary'] ?? '');
        $body            = trim($_POST['body'] ?? '');
        $isActive        = isset($_POST['is_active']) ? 1 : 0;

        if ($title === '') {
            $_SESSION['admin_flash_error'] = 'Service title is required.';
            redirect('/admin/services.php' . ($id ? '?edit=' . $id : '?action=new'));
        }

        // Auto-slugify if empty
        if ($slug === '') {
            $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title), '-'));
        } else {
            $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $slug), '-'));
        }

        // Parse Dynamic Features
        $features = [];
        if (!empty($_POST['feature_titles']) && is_array($_POST['feature_titles'])) {
            foreach ($_POST['feature_titles'] as $idx => $fTitle) {
                $fTitle = trim($fTitle);
                $fDesc  = trim($_POST['feature_descs'][$idx] ?? '');
                if ($fTitle !== '') {
                    $features[] = [
                        'title' => $fTitle,
                        'description' => $fDesc
                    ];
                }
            }
        }

        // Parse Dynamic Process Steps
        $process = [];
        if (!empty($_POST['process_titles']) && is_array($_POST['process_titles'])) {
            foreach ($_POST['process_titles'] as $idx => $pTitle) {
                $pTitle = trim($pTitle);
                $pStep  = trim($_POST['process_steps'][$idx] ?? sprintf('%02d', $idx + 1));
                $pDesc  = trim($_POST['process_descs'][$idx] ?? '');
                if ($pTitle !== '') {
                    $process[] = [
                        'step' => $pStep,
                        'title' => $pTitle,
                        'description' => $pDesc
                    ];
                }
            }
        }

        // Parse Dynamic FAQs
        $faqs = [];
        if (!empty($_POST['faq_questions']) && is_array($_POST['faq_questions'])) {
            foreach ($_POST['faq_questions'] as $idx => $q) {
                $q = trim($q);
                $a = trim($_POST['faq_answers'][$idx] ?? '');
                if ($q !== '') {
                    $faqs[] = [
                        'q' => $q,
                        'a' => $a
                    ];
                }
            }
        }

        // Parse Strategic Benefits
        $benefits = [];
        if (!empty($_POST['benefit_titles']) && is_array($_POST['benefit_titles'])) {
            foreach ($_POST['benefit_titles'] as $idx => $bTitle) {
                $bTitle  = trim($bTitle);
                $bDesc   = trim($_POST['benefit_descs'][$idx] ?? '');
                $bMetric = trim($_POST['benefit_metrics'][$idx] ?? '');
                $bIcon   = trim($_POST['benefit_icons'][$idx] ?? 'trending');
                if ($bTitle !== '') {
                    $benefits[] = [
                        'icon'   => $bIcon,
                        'title'  => $bTitle,
                        'desc'   => $bDesc,
                        'metric' => $bMetric
                    ];
                }
            }
        }

        // Preserve existing metadata (e.g. custom rankings, case_results, etc.)
        $existingMeta = [];
        if ($id !== null) {
            $prev = db()->prepare('SELECT metadata FROM content_items WHERE id = :id');
            $prev->execute([':id' => $id]);
            $prevRow = $prev->fetch();
            if ($prevRow && !empty($prevRow['metadata'])) {
                $existingMeta = json_decode($prevRow['metadata'], true) ?: [];
            }
        }

        // Handle image file uploads
        $founderImage = trim($_POST['founder_image'] ?? ($existingMeta['founder_image'] ?? '/assets/images/jitin-madaan.png'));
        if (!empty($_FILES['founder_image_file']['tmp_name']) && is_uploaded_file($_FILES['founder_image_file']['tmp_name'])) {
            try {
                $up = uploadCmsImage($_FILES['founder_image_file']);
                if ($up) $founderImage = $up;
            } catch (Throwable $e) {}
        }

        $founderAvatar = trim($_POST['founder_avatar'] ?? ($existingMeta['founder_avatar'] ?? '/assets/images/jitin-madaan-avatar.png'));
        if (!empty($_FILES['founder_avatar_file']['tmp_name']) && is_uploaded_file($_FILES['founder_avatar_file']['tmp_name'])) {
            try {
                $up = uploadCmsImage($_FILES['founder_avatar_file']);
                if ($up) $founderAvatar = $up;
            } catch (Throwable $e) {}
        }

        $serpImage = trim($_POST['serp_image'] ?? ($existingMeta['serp_image'] ?? '/assets/images/seo-takeaways-preview.png'));
        if (!empty($_FILES['serp_image_file']['tmp_name']) && is_uploaded_file($_FILES['serp_image_file']['tmp_name'])) {
            try {
                $up = uploadCmsImage($_FILES['serp_image_file']);
                if ($up) $serpImage = $up;
            } catch (Throwable $e) {}
        }

        // Build Metadata payload
        $metadata = array_merge($existingMeta, [
            'title'            => $title,
            'summary'          => $summary,
            'body'             => $body,
            'slug'             => $slug,
            'category'         => $category,
            'icon'             => $icon,
            'tagline'          => $tagline,
            'hero_description' => $heroDescription,
            'features'         => $features,
            'process'          => $process,
            'faqs'             => $faqs,
            'benefits'         => $benefits,
            'founder_name'     => trim($_POST['founder_name'] ?? ($existingMeta['founder_name'] ?? 'Jitin Madaan')),
            'founder_role'     => trim($_POST['founder_role'] ?? ($existingMeta['founder_role'] ?? 'Performance Marketing Strategist')),
            'founder_image'    => $founderImage,
            'founder_avatar'   => $founderAvatar,
            'serp_image'       => $serpImage,
            'page_meta_title'  => trim($_POST['page_meta_title'] ?? ($title . ' | WebTecMart')),
            'page_meta_desc'   => trim($_POST['page_meta_desc'] ?? $summary),
        ]);

        // Process Advance UI & Growth Sections if submitted
        if (isset($_POST['gq_m1'])) {
            $metadata['growth_quadrants'] = [
                'center_label' => trim($_POST['gq_center_label'] ?? 'Clicks from Search'),
                'center_sub'   => trim($_POST['gq_center_sub'] ?? 'Increases measured over 90-day active sprint vs prior period'),
                'quadrants' => [
                    ['label' => trim($_POST['gq_l1'] ?? 'B2B Trade Show & Global Expo'), 'metric' => trim($_POST['gq_m1'] ?? '400%'), 'sub' => trim($_POST['gq_s1'] ?? 'Bharat Tex / Global Textile Expo')],
                    ['label' => trim($_POST['gq_l2'] ?? 'International Sourcing Fair'), 'metric' => trim($_POST['gq_m2'] ?? '300%'), 'sub' => trim($_POST['gq_s2'] ?? 'IHGF Delhi Autumn Fair 2027')],
                    ['label' => trim($_POST['gq_l3'] ?? 'B2B Industrial & Manufacturing'), 'metric' => trim($_POST['gq_m3'] ?? '85%'), 'sub' => trim($_POST['gq_s3'] ?? 'Commercial Inbound Lead Volume')],
                    ['label' => trim($_POST['gq_l4'] ?? 'Delhi NCR Commercial SEO'), 'metric' => trim($_POST['gq_m4'] ?? '1,393%'), 'sub' => trim($_POST['gq_s4'] ?? 'Organic Inbound Search Leap')],
                ],
                'cards' => [
                    [
                        'icon' => '🎯',
                        'title' => trim($_POST['gq_c1_title'] ?? 'Attract High-Intent Commercial Buyers'),
                        'desc'  => trim($_POST['gq_c1_desc'] ?? 'Targeting specific transactional & commercial search queries with engineered landing pages that capture buyers ready to transact.')
                    ],
                    [
                        'icon' => '📢',
                        'title' => trim($_POST['gq_c2_title'] ?? 'Enhance Brand Entity Authority & Legacy'),
                        'desc'  => trim($_POST['gq_c2_desc'] ?? 'Ensuring your executive thought leadership, brand knowledge graph, and service catalogue are indexable, permanent, and recommended by AI engines.')
                    ]
                ]
            ];
        }

        if (isset($_POST['mc_title'])) {
            $skillsRaw = trim($_POST['mc_skills'] ?? '');
            $skillsArr = array_filter(array_map('trim', explode("\n", $skillsRaw)));
            $mcVideoImg = trim($_POST['mc_video_image'] ?? ($existingMeta['masterclass']['video_image'] ?? '/assets/images/case-study-1.jpg'));
            if (!empty($_FILES['mc_image_file']['tmp_name']) && is_uploaded_file($_FILES['mc_image_file']['tmp_name'])) {
                try {
                    $up = uploadCmsImage($_FILES['mc_image_file']);
                    if ($up) $mcVideoImg = $up;
                } catch (Throwable $e) {}
            }
            $metadata['masterclass'] = [
                'title'          => trim($_POST['mc_title'] ?? 'SEO Masterclass & In-House Blueprint.'),
                'subtitle'       => trim($_POST['mc_subtitle'] ?? ''),
                'headline'       => trim($_POST['mc_headline'] ?? 'Designed for Enterprise Teams, Marketers & Founders'),
                'description'    => trim($_POST['mc_description'] ?? ''),
                'skills'         => !empty($skillsArr) ? array_values($skillsArr) : ($existingMeta['masterclass']['skills'] ?? []),
                'video_duration' => trim($_POST['mc_video_duration'] ?? '15 min executive training'),
                'instructor'     => trim($_POST['mc_instructor'] ?? 'Jitin Madaan • Performance Marketing Strategist'),
                'video_image'    => $mcVideoImg,
                'reviews'        => $existingMeta['masterclass']['reviews'] ?? []
            ];
        }

        // Process Brand Logos Showcase if submitted
        if (!empty($_POST['brand_names']) && is_array($_POST['brand_names'])) {
            $bLogos = [];
            foreach ($_POST['brand_names'] as $bIdx => $bName) {
                $bName = trim($bName);
                if ($bName === '') continue;
                $bLogoUrl = trim($_POST['brand_urls'][$bIdx] ?? '');
                $fileKey = 'brand_logo_file_' . $bIdx;
                if (!empty($_FILES[$fileKey]['tmp_name']) && is_uploaded_file($_FILES[$fileKey]['tmp_name'])) {
                    try {
                        $up = uploadCmsImage($_FILES[$fileKey]);
                        if ($up) $bLogoUrl = $up;
                    } catch (Throwable $e) {}
                }
                $bLogos[] = [
                    'name'     => $bName,
                    'logo'     => $bLogoUrl,
                    'category' => trim($_POST['brand_cats'][$bIdx] ?? 'Enterprise Brand'),
                ];
            }
            if (!empty($bLogos)) {
                $metadata['brand_logos'] = $bLogos;
            }
        }

        if (!empty($_POST['cf_quotes']) && is_array($_POST['cf_quotes'])) {
            $cFeed = [];
            foreach ($_POST['cf_quotes'] as $i => $qText) {
                $qText = trim($qText);
                if ($qText === '') continue;
                $cFeed[] = [
                    'quote'   => $qText,
                    'author'  => trim($_POST['cf_authors'][$i] ?? 'Client'),
                    'role'    => trim($_POST['cf_roles'][$i] ?? 'Director'),
                    'company' => trim($_POST['cf_companies'][$i] ?? 'Enterprise'),
                    'rating'  => 5
                ];
            }
            if (!empty($cFeed)) {
                $metadata['client_feedback'] = $cFeed;
            }
        }

        $payloadJson = json_encode($metadata, JSON_UNESCAPED_UNICODE);

        if ($id !== null) {
            // Update existing
            $stmt = db()->prepare('UPDATE content_items SET title = :title, summary = :summary, body = :body, metadata = :metadata, is_active = :active, updated_at = CURRENT_TIMESTAMP WHERE id = :id AND content_type = "service_detail"');
            $stmt->execute([
                ':title'    => $title,
                ':summary'  => $summary,
                ':body'     => $body,
                ':metadata' => $payloadJson,
                ':active'   => $isActive,
                ':id'       => $id,
            ]);
            $_SESSION['admin_flash_success'] = 'Service "' . htmlspecialchars($title) . '" updated successfully!';
        } else {
            // Create new
            $nextOrder = (int) db()->query("SELECT COALESCE(MAX(sort_order), -1) + 1 FROM content_items WHERE content_type = 'service_detail'")->fetchColumn();
            $stmt = db()->prepare('INSERT INTO content_items (content_type, title, summary, body, metadata, sort_order, is_active) VALUES ("service_detail", :title, :summary, :body, :metadata, :sort_order, :active)');
            $stmt->execute([
                ':title'      => $title,
                ':summary'    => $summary,
                ':body'       => $body,
                ':metadata'   => $payloadJson,
                ':sort_order' => $nextOrder,
                ':active'     => $isActive,
            ]);
            $_SESSION['admin_flash_success'] = 'New service "' . htmlspecialchars($title) . '" published successfully!';
        }

        redirect('/admin/services.php');
    }
}

// ============================================================
// FETCH DATA FOR DASHBOARD & LISTING
// ============================================================
$totalServices = (int) db()->query("SELECT COUNT(*) FROM content_items WHERE content_type = 'service_detail'")->fetchColumn();
$publishedServices = (int) db()->query("SELECT COUNT(*) FROM content_items WHERE content_type = 'service_detail' AND is_active = 1")->fetchColumn();
$draftServices = (int) db()->query("SELECT COUNT(*) FROM content_items WHERE content_type = 'service_detail' AND is_active = 0")->fetchColumn();

// Fetch all services
$servicesList = db()->query("SELECT * FROM content_items WHERE content_type = 'service_detail' ORDER BY sort_order ASC, id ASC")->fetchAll(PDO::FETCH_ASSOC);

// Decode metadata on each
foreach ($servicesList as &$svc) {
    $meta = json_decode($svc['metadata'] ?: '', true);
    if (is_array($meta)) {
        if (isset($meta['metadata']) && is_array($meta['metadata'])) {
            $meta = array_merge($meta, $meta['metadata']);
        }
        $svc = array_merge($svc, $meta);
    }
}
unset($svc);

// Collect distinct categories
$categories = ['All', 'SEO', 'Web Development', 'Paid Advertising', 'Social Media', 'Branding', 'Digital Strategy'];

// Check if currently editing a specific service
$editingId = isset($_GET['edit']) ? (int) $_GET['edit'] : null;
$editingService = null;
if ($editingId) {
    foreach ($servicesList as $s) {
        if ((int) $s['id'] === $editingId) {
            $editingService = $s;
            break;
        }
    }
}
$isNew = isset($_GET['action']) && $_GET['action'] === 'new';

function getSvcPublicUrl(string $slug): string {
    $slug = trim($slug);
    if ($slug === '') return '/services.php';
    if ($slug === 'b2b-exhibition-seo') return '/b2b-exhibition-seo.php';
    if (file_exists(dirname(__DIR__) . '/' . $slug . '.php')) {
        return '/' . $slug . '.php';
    }
    return '/service.php?slug=' . urlencode($slug);
}

require_once __DIR__ . '/templates/header.php';
?>

<style>
    /* ===== SERVICES CMS DASHBOARD STYLES ===== */
    .scms-header-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 16px;
        margin-bottom: 24px;
    }
    .scms-title-wrap h1 {
        font-size: clamp(1.4rem, 2.5vw, 1.85rem) !important;
        font-weight: 800 !important;
        color: #0F172A;
        margin: 0 0 4px !important;
        letter-spacing: -0.02em;
    }
    .scms-title-wrap p {
        font-size: 0.92rem !important;
        color: #64748B;
        margin: 0 !important;
    }

    /* Stat Cards */
    .scms-stats-grid {
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        gap: 18px;
        margin-bottom: 28px;
    }
    @media (min-width: 576px) {
        .scms-stats-grid { grid-template-columns: repeat(2, 1fr); }
    }
    @media (min-width: 992px) {
        .scms-stats-grid { grid-template-columns: repeat(4, 1fr); }
    }
    .scms-stat-card {
        background: #FFFFFF;
        border: 1px solid #E2E8F0;
        border-radius: 16px;
        padding: 20px 22px;
        display: flex;
        align-items: center;
        gap: 16px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.03);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .scms-stat-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
    }
    .scms-stat-icon {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        display: grid;
        place-items: center;
        font-size: 1.35rem;
        flex-shrink: 0;
    }
    .scms-stat-icon.pink { background: #FFF0F7; color: #C4007A; }
    .scms-stat-icon.green { background: #ECFDF5; color: #059669; }
    .scms-stat-icon.amber { background: #FFFBEB; color: #D97706; }
    .scms-stat-icon.blue { background: #EFF6FF; color: #2563EB; }
    .scms-stat-num {
        font-size: 1.6rem;
        font-weight: 800;
        color: #0F172A;
        line-height: 1.1;
    }
    .scms-stat-lbl {
        font-size: 0.8rem;
        font-weight: 600;
        color: #64748B;
        margin-top: 2px;
    }

    /* Actions Bar */
    .scms-bar {
        background: #FFFFFF;
        border: 1px solid #E2E8F0;
        border-radius: 16px;
        padding: 16px 20px;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 14px;
    }
    .scms-search-wrap {
        position: relative;
        flex: 1;
        min-width: 240px;
        max-width: 400px;
    }
    .scms-search-wrap i {
        position: absolute;
        left: 14px;
        top: 50%;
        transform: translateY(-50%);
        color: #94A3B8;
        font-size: 0.95rem;
    }
    .scms-search-input {
        width: 100%;
        padding: 9px 14px 9px 38px;
        border: 1.5px solid #E2E8F0;
        border-radius: 10px;
        font-size: 0.88rem;
        font-family: inherit;
        outline: none;
        transition: border-color 0.2s ease;
    }
    .scms-search-input:focus {
        border-color: #C4007A;
    }

    .scms-cat-pills {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
    }
    .scms-cat-pill {
        background: #F1F5F9;
        border: 1px solid #E2E8F0;
        color: #475569;
        font-size: 0.78rem;
        font-weight: 700;
        padding: 6px 14px;
        border-radius: 9999px;
        cursor: pointer;
        text-decoration: none;
        transition: all 0.2s ease;
    }
    .scms-cat-pill:hover,
    .scms-cat-pill.active {
        background: #FFF0F7;
        color: #C4007A;
        border-color: rgba(196, 0, 122, 0.3);
    }

    /* Table */
    .scms-table-card {
        background: #FFFFFF;
        border: 1px solid #E2E8F0;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.03);
    }
    .scms-table {
        width: 100%;
        border-collapse: collapse;
        text-align: left;
    }
    .scms-table th {
        background: #F8FAFC;
        padding: 14px 18px;
        font-size: 0.75rem;
        font-weight: 800;
        color: #64748B;
        text-transform: uppercase;
        letter-spacing: 0.06em;
        border-bottom: 1px solid #E2E8F0;
    }
    .scms-table td {
        padding: 16px 18px;
        font-size: 0.88rem;
        color: #1E293B;
        border-bottom: 1px solid #F1F5F9;
        vertical-align: middle;
    }
    .scms-table tr:last-child td {
        border-bottom: none;
    }
    .scms-table tr:hover td {
        background: #FCFDFE;
    }

    .scms-svc-cell {
        display: flex;
        align-items: center;
        gap: 14px;
    }
    .scms-svc-icon-box {
        width: 42px;
        height: 42px;
        border-radius: 10px;
        background: #FFF0F7;
        color: #C4007A;
        display: grid;
        place-items: center;
        font-size: 1.15rem;
        flex-shrink: 0;
    }
    .scms-svc-name {
        font-weight: 800;
        color: #0F172A;
        font-size: 0.94rem;
        margin-bottom: 2px;
    }
    .scms-svc-tagline {
        font-size: 0.78rem;
        color: #64748B;
    }
    .scms-svc-slug {
        font-size: 0.72rem;
        color: #94A3B8;
        font-family: monospace;
    }

    .scms-badge-cat {
        display: inline-block;
        padding: 4px 10px;
        border-radius: 6px;
        font-size: 0.72rem;
        font-weight: 700;
        background: #EFF6FF;
        color: #2563EB;
        border: 1px solid rgba(37, 99, 235, 0.15);
    }

    .scms-status-btn {
        border: none;
        background: none;
        padding: 0;
        cursor: pointer;
    }
    .scms-status-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 4px 12px;
        border-radius: 9999px;
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.04em;
    }
    .scms-status-badge.published {
        background: #ECFDF5;
        color: #059669;
        border: 1px solid rgba(5, 150, 105, 0.25);
    }
    .scms-status-badge.draft {
        background: #FFFBEB;
        color: #D97706;
        border: 1px solid rgba(217, 119, 6, 0.25);
    }
    .scms-status-badge .dot {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: currentColor;
    }

    .scms-actions-cell {
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .scms-btn-action {
        width: 32px;
        height: 32px;
        border-radius: 8px;
        display: grid;
        place-items: center;
        font-size: 0.85rem;
        border: 1px solid #E2E8F0;
        background: #FFFFFF;
        color: #475569;
        text-decoration: none;
        cursor: pointer;
        transition: all 0.2s ease;
    }
    .scms-btn-action:hover {
        background: #F8FAFC;
        color: #0F172A;
        border-color: #CBD5E1;
    }
    .scms-btn-action.edit:hover {
        background: #FFF0F7;
        color: #C4007A;
        border-color: #C4007A;
    }
    .scms-btn-action.del:hover {
        background: #FEF2F2;
        color: #DC2626;
        border-color: #F87171;
    }

    /* ===== EDITOR STYLES ===== */
    .scms-editor-card {
        background: #FFFFFF;
        border: 1px solid #E2E8F0;
        border-radius: 20px;
        padding: 28px;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.04);
        margin-bottom: 32px;
    }
    .scms-editor-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding-bottom: 20px;
        border-bottom: 1px solid #E2E8F0;
        margin-bottom: 24px;
    }
    .scms-editor-title {
        font-size: 1.35rem;
        font-weight: 800;
        color: #0F172A;
        margin: 0;
    }

    .scms-form-group {
        margin-bottom: 20px;
    }
    .scms-form-group label {
        display: block;
        font-size: 0.82rem;
        font-weight: 700;
        color: #334155;
        margin-bottom: 6px;
        text-transform: uppercase;
        letter-spacing: 0.04em;
    }
    .scms-form-control {
        width: 100%;
        padding: 10px 14px;
        border: 1.5px solid #E2E8F0;
        border-radius: 10px;
        font-size: 0.92rem;
        font-family: inherit;
        outline: none;
        transition: border-color 0.2s ease;
    }
    .scms-form-control:focus {
        border-color: #C4007A;
        box-shadow: 0 0 0 3px rgba(196, 0, 122, 0.08);
    }
    textarea.scms-form-control {
        min-height: 90px;
        resize: vertical;
    }

    .scms-tabs {
        display: flex;
        gap: 8px;
        border-bottom: 2px solid #E2E8F0;
        margin-bottom: 24px;
        overflow-x: auto;
    }
    .scms-tab-btn {
        padding: 10px 18px;
        border: none;
        background: none;
        font-family: inherit;
        font-size: 0.88rem;
        font-weight: 700;
        color: #64748B;
        cursor: pointer;
        position: relative;
        white-space: nowrap;
        transition: color 0.2s ease;
    }
    .scms-tab-btn:hover {
        color: #C4007A;
    }
    .scms-tab-btn.active {
        color: #C4007A;
    }
    .scms-tab-btn.active::after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        right: 0;
        height: 2px;
        background: #C4007A;
    }

    .scms-repeater-box {
        background: #F8FAFC;
        border: 1px solid #E2E8F0;
        border-radius: 14px;
        padding: 16px;
        margin-bottom: 12px;
        position: relative;
    }
    .scms-repeater-box .del-btn {
        position: absolute;
        top: 12px;
        right: 12px;
        background: #FEE2E2;
        color: #DC2626;
        border: none;
        width: 26px;
        height: 26px;
        border-radius: 6px;
        font-size: 0.8rem;
        cursor: pointer;
        display: grid;
        place-items: center;
    }
    .scms-btn-add {
        background: #FFF0F7;
        color: #C4007A;
        border: 1.5px dashed #C4007A;
        font-weight: 700;
        font-size: 0.84rem;
        padding: 9px 18px;
        border-radius: 10px;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: all 0.2s ease;
    }
    .scms-btn-add:hover {
        background: #C4007A;
        color: #FFFFFF;
    }

    .scms-primary-btn {
        background: linear-gradient(135deg, #C4007A 0%, #E0398F 100%);
        color: #FFFFFF;
        border: none;
        padding: 12px 28px;
        border-radius: 10px;
        font-weight: 700;
        font-size: 0.94rem;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        box-shadow: 0 4px 14px rgba(196, 0, 122, 0.25);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .scms-primary-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(196, 0, 122, 0.35);
        color: #FFFFFF;
    }
</style>

<div class="scms-main-wrap">

    <!-- Flash Notifications -->
    <?php if ($flashSuccess): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i> <?= htmlspecialchars($flashSuccess) ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <?php if ($flashError): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-triangle-fill me-2"></i> <?= htmlspecialchars($flashError) ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <!-- Title & Top CTA -->
    <div class="scms-header-row">
        <div class="scms-title-wrap">
            <h1>Services CMS &amp; Page Engine</h1>
            <p>Manage, customize, and publish high-converting public service pages for WebTecMart.</p>
        </div>
        <div>
            <?php if ($editingService || $isNew): ?>
                <a href="/admin/services.php" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left me-1"></i> Back to All Services
                </a>
            <?php else: ?>
                <a href="/admin/services.php?action=new" class="scms-primary-btn">
                    <i class="bi bi-plus-circle-fill"></i> Add New Service
                </a>
            <?php endif; ?>
        </div>
    </div>

    <!-- Live Statistics Dashboard -->
    <div class="scms-stats-grid">
        <div class="scms-stat-card">
            <div class="scms-stat-icon pink"><i class="bi bi-boxes"></i></div>
            <div>
                <div class="scms-stat-num"><?= $totalServices ?></div>
                <div class="scms-stat-lbl">Total Services</div>
            </div>
        </div>
        <div class="scms-stat-card">
            <div class="scms-stat-icon green"><i class="bi bi-check2-circle"></i></div>
            <div>
                <div class="scms-stat-num"><?= $publishedServices ?></div>
                <div class="scms-stat-lbl">Published &amp; Live</div>
            </div>
        </div>
        <div class="scms-stat-card">
            <div class="scms-stat-icon amber"><i class="bi bi-pencil-square"></i></div>
            <div>
                <div class="scms-stat-num"><?= $draftServices ?></div>
                <div class="scms-stat-lbl">Drafts / Inactive</div>
            </div>
        </div>
        <div class="scms-stat-card">
            <div class="scms-stat-icon blue"><i class="bi bi-tag-fill"></i></div>
            <div>
                <div class="scms-stat-num">6</div>
                <div class="scms-stat-lbl">Active Categories</div>
            </div>
        </div>
    </div>

    <?php if ($editingService || $isNew):
        // ============================================================
        // EDIT / CREATE FORM
        // ============================================================
        $item = $editingService ?: [];
        $features = $item['features'] ?? [];
        $process  = $item['process'] ?? [];
        $faqs     = $item['faqs'] ?? [];
        $benefits = $item['benefits'] ?? [];
        $growthQuadrants = $item['growth_quadrants'] ?? [];
        $masterclass     = $item['masterclass'] ?? [];
        $clientFeedback  = $item['client_feedback'] ?? [];
        $brandLogos      = $item['brand_logos'] ?? [];
    ?>

        <div class="scms-editor-card">
            <div class="scms-editor-header">
                <h2 class="scms-editor-title">
                    <?= $isNew ? '<i class="bi bi-plus-circle text-primary me-2"></i> Create New Service Page' : '<i class="bi bi-pencil-square text-primary me-2"></i> Edit Service: ' . htmlspecialchars($item['title'] ?? '') ?>
                </h2>
                <div>
                    <?php if (!empty($item['slug'])): ?>
                        <a href="<?= getSvcPublicUrl($item['slug'] ?? '') ?>" target="_blank" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-box-arrow-up-right me-1"></i> Preview Live Page
                        </a>
                    <?php endif; ?>
                </div>
            </div>

            <form method="POST" action="/admin/services.php" id="scmsServiceForm" enctype="multipart/form-data">
                <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['cms_csrf_token']) ?>">
                <input type="hidden" name="action" value="save">
                <?php if (!empty($item['id'])): ?>
                    <input type="hidden" name="id" value="<?= (int) $item['id'] ?>">
                <?php endif; ?>

                <!-- Tab Navigation -->
                <div class="scms-tabs">
                    <button type="button" class="scms-tab-btn active" onclick="scmsSwitchTab('tab-basic', this)">1. Basic &amp; Hero</button>
                    <button type="button" class="scms-tab-btn" onclick="scmsSwitchTab('tab-overview', this)">2. Overview &amp; Benefits</button>
                    <button type="button" class="scms-tab-btn" onclick="scmsSwitchTab('tab-features', this)">3. Features &amp; Deliverables (<?= count($features) ?>)</button>
                    <button type="button" class="scms-tab-btn" onclick="scmsSwitchTab('tab-process', this)">4. Working Process (<?= count($process) ?>)</button>
                    <button type="button" class="scms-tab-btn" onclick="scmsSwitchTab('tab-faqs', this)">5. FAQs (<?= count($faqs) ?>)</button>
                    <button type="button" class="scms-tab-btn" onclick="scmsSwitchTab('tab-advance-ui', this)" style="background: #FFF0F7; color: #C4007A; border-color: rgba(196, 0, 122, 0.4); font-weight: 700;"><i class="bi bi-stars me-1"></i> 6. Advance UI &amp; Growth</button>
                    <button type="button" class="scms-tab-btn" onclick="scmsSwitchTab('tab-seo', this)">7. SEO &amp; Meta</button>
                </div>

                <!-- TAB 1: BASIC & HERO -->
                <div id="tab-basic" class="scms-tab-pane">
                    <div class="row">
                        <div class="col-md-6 scms-form-group">
                            <label>Service Title *</label>
                            <input type="text" name="title" class="scms-form-control" value="<?= htmlspecialchars($item['title'] ?? '') ?>" required placeholder="e.g. Search Engine Optimization">
                        </div>
                        <div class="col-md-6 scms-form-group">
                            <label>URL Slug</label>
                            <input type="text" name="slug" class="scms-form-control" value="<?= htmlspecialchars($item['slug'] ?? '') ?>" placeholder="e.g. search-engine-optimization">
                            <small class="text-muted">Live URL: <code>/service.php?slug=<?= htmlspecialchars($item['slug'] ?? 'your-slug') ?></code></small>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 scms-form-group">
                            <label>Category</label>
                            <select name="category" class="scms-form-control">
                                <?php
                                $currentCat = $item['category'] ?? 'SEO';
                                foreach (['SEO', 'Web Development', 'Paid Advertising', 'Social Media', 'Branding', 'Digital Strategy'] as $c): ?>
                                    <option value="<?= $c ?>" <?= $currentCat === $c ? 'selected' : '' ?>><?= $c ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-4 scms-form-group">
                            <label>Icon</label>
                            <select name="icon" class="scms-form-control">
                                <?php
                                $currentIcon = $item['icon'] ?? 'sparkles';
                                foreach (['sparkles', 'trending', 'layout', 'search', 'megaphone', 'share', 'target', 'globe', 'smartphone', 'award', 'shield'] as $ic): ?>
                                    <option value="<?= $ic ?>" <?= $currentIcon === $ic ? 'selected' : '' ?>><?= ucfirst($ic) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-4 scms-form-group">
                            <label>Publish Status</label>
                            <div class="form-check form-switch mt-2">
                                <input class="form-check-input" type="checkbox" name="is_active" id="scmsActiveCheck" value="1" <?= (!isset($item['is_active']) || (int) $item['is_active'] === 1) ? 'checked' : '' ?>>
                                <label class="form-check-label text-dark fw-bold ms-2" for="scmsActiveCheck">Published &amp; Live on Site</label>
                            </div>
                        </div>
                    </div>

                    <div class="scms-form-group">
                        <label>Tagline / Eyebrow Badge</label>
                        <input type="text" name="tagline" class="scms-form-control" value="<?= htmlspecialchars($item['tagline'] ?? '') ?>" placeholder="e.g. Rank Higher. Convert Better. Scale Organically.">
                    </div>

                    <div class="scms-form-group">
                        <label>Hero Description</label>
                        <textarea name="hero_description" class="scms-form-control" placeholder="Short impactful summary appearing directly below the hero headline..."><?= htmlspecialchars($item['hero_description'] ?? '') ?></textarea>
                    </div>

                    <div class="scms-form-group">
                        <label>Short Excerpt / Card Summary</label>
                        <textarea name="summary" class="scms-form-control" placeholder="Brief summary used in cards and search engine snippets..."><?= htmlspecialchars($item['summary'] ?? '') ?></textarea>
                    </div>

                    <div class="scms-form-group" style="background: #FFF5FA; border: 1.5px solid rgba(196, 0, 122, 0.2); border-radius: 12px; padding: 18px; margin-top: 18px;">
                        <label class="fw-bold text-dark mb-2" style="color: #C4007A !important; font-size: 0.95rem;">Lead Strategist / Executive Spotlight</label>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="small text-muted mb-1">Strategist Name</label>
                                <input type="text" name="founder_name" class="scms-form-control" value="<?= htmlspecialchars($item['founder_name'] ?? 'Jitin Madaan') ?>" placeholder="e.g. Jitin Madaan">
                            </div>
                            <div class="col-md-6">
                                <label class="small text-muted mb-1">Strategist Role / Title</label>
                                <input type="text" name="founder_role" class="scms-form-control" value="<?= htmlspecialchars($item['founder_role'] ?? 'Performance Marketing Strategist') ?>" placeholder="e.g. Performance Marketing Strategist">
                            </div>
                            <div class="col-md-6">
                                <label class="small fw-bold text-dark mb-1"><i class="bi bi-image text-primary me-1"></i> Strategist Photo (High-Res Portrait)</label>
                                <?php if (!empty($item['founder_image'])): ?>
                                    <div class="d-flex align-items-center gap-2 mb-2 p-2 bg-white rounded border">
                                        <img src="<?= htmlspecialchars($item['founder_image']) ?>" alt="Current Photo" style="width: 48px; height: 48px; object-fit: cover; border-radius: 8px; border: 1.5px solid #C4007A;">
                                        <div class="small text-truncate" style="max-width: 250px; color: #4B5563;">Current: <code><?= htmlspecialchars($item['founder_image']) ?></code></div>
                                    </div>
                                <?php endif; ?>
                                <label class="small text-muted mb-1">Upload New Photo File (JPG, PNG, WEBP):</label>
                                <input type="file" name="founder_image_file" accept="image/*" class="form-control form-control-sm mb-2">
                                <label class="small text-muted mb-1">Or Direct Photo URL / Path:</label>
                                <input type="text" name="founder_image" class="scms-form-control form-control-sm" value="<?= htmlspecialchars($item['founder_image'] ?? '/assets/images/jitin-madaan.png') ?>" placeholder="/assets/images/jitin-madaan.png">
                            </div>
                            <div class="col-md-6">
                                <label class="small fw-bold text-dark mb-1"><i class="bi bi-person-badge text-primary me-1"></i> Strategist Avatar (Hero Circular Avatar)</label>
                                <?php if (!empty($item['founder_avatar'])): ?>
                                    <div class="d-flex align-items-center gap-2 mb-2 p-2 bg-white rounded border">
                                        <img src="<?= htmlspecialchars($item['founder_avatar']) ?>" alt="Current Avatar" style="width: 44px; height: 44px; object-fit: cover; border-radius: 50%; border: 2px solid #C4007A;">
                                        <div class="small text-truncate" style="max-width: 250px; color: #4B5563;">Current: <code><?= htmlspecialchars($item['founder_avatar']) ?></code></div>
                                    </div>
                                <?php endif; ?>
                                <label class="small text-muted mb-1">Upload New Avatar File (JPG, PNG, WEBP):</label>
                                <input type="file" name="founder_avatar_file" accept="image/*" class="form-control form-control-sm mb-2">
                                <label class="small text-muted mb-1">Or Direct Avatar URL / Path:</label>
                                <input type="text" name="founder_avatar" class="scms-form-control form-control-sm" value="<?= htmlspecialchars($item['founder_avatar'] ?? '/assets/images/jitin-madaan-avatar.png') ?>" placeholder="/assets/images/jitin-madaan-avatar.png">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- TAB 2: OVERVIEW & BENEFITS -->
                <div id="tab-overview" class="scms-tab-pane d-none">
                    <div class="scms-form-group">
                        <label>Full Service Overview (Body Copy)</label>
                        <textarea name="body" class="scms-form-control" style="min-height: 160px;" placeholder="Comprehensive explanation of what this service offers, why customers need it, and agency results..."><?= htmlspecialchars($item['body'] ?? '') ?></textarea>
                    </div>

                    <h5 class="fw-bold mt-4 mb-3 text-dark">Strategic Benefits (Why Businesses Need This)</h5>
                    <div id="scmsBenefitsContainer">
                        <?php
                        $defaultBenefits = !empty($benefits) ? $benefits : [
                            ['title' => 'High-Intent Customer Acquisition', 'desc' => 'Capture qualified prospects actively searching for solutions.', 'metric' => '3x Average Lead Lift', 'icon' => 'trending'],
                            ['title' => 'Durable Market Authority', 'desc' => 'Build a resilient digital footprint that outranks competitors.', 'metric' => 'Top 3 Search Dominance', 'icon' => 'shield'],
                            ['title' => 'Optimized ROI & Lower CAC', 'desc' => 'Maximize conversion rates while lowering customer acquisition cost.', 'metric' => '99.8% Satisfaction', 'icon' => 'target']
                        ];
                        foreach ($defaultBenefits as $bIdx => $ben):
                        ?>
                            <div class="scms-repeater-box">
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <input type="text" name="benefit_titles[]" class="scms-form-control fw-bold" value="<?= htmlspecialchars($ben['title'] ?? '') ?>" placeholder="Benefit Title">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <input type="text" name="benefit_metrics[]" class="scms-form-control" value="<?= htmlspecialchars($ben['metric'] ?? '') ?>" placeholder="Metric chip (e.g. +340% Growth)">
                                    </div>
                                    <div class="col-12">
                                        <textarea name="benefit_descs[]" class="scms-form-control" rows="2" placeholder="Benefit description..."><?= htmlspecialchars($ben['desc'] ?? '') ?></textarea>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- TAB 3: FEATURES & DELIVERABLES -->
                <div id="tab-features" class="scms-tab-pane d-none">
                    <p class="text-muted small mb-3">Add or edit specific features, deliverables, and capabilities included in this service.</p>
                    <div id="scmsFeaturesContainer">
                        <?php foreach ($features as $fIdx => $feat): ?>
                            <div class="scms-repeater-box">
                                <button type="button" class="del-btn" onclick="this.closest('.scms-repeater-box').remove()"><i class="bi bi-x"></i></button>
                                <div class="row">
                                    <div class="col-12 mb-2 pe-5">
                                        <input type="text" name="feature_titles[]" class="scms-form-control fw-bold" value="<?= htmlspecialchars($feat['title'] ?? '') ?>" placeholder="Deliverable Title">
                                    </div>
                                    <div class="col-12">
                                        <textarea name="feature_descs[]" class="scms-form-control" rows="2" placeholder="Description of what is included..."><?= htmlspecialchars($feat['description'] ?? '') ?></textarea>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <button type="button" class="scms-btn-add" onclick="scmsAddFeature()">
                        <i class="bi bi-plus-circle"></i> Add Deliverable Item
                    </button>
                </div>

                <!-- TAB 4: WORKING PROCESS -->
                <div id="tab-process" class="scms-tab-pane d-none">
                    <p class="text-muted small mb-3">Define the 3 to 5 step delivery roadmap shown to prospects.</p>
                    <div id="scmsProcessContainer">
                        <?php foreach ($process as $pIdx => $st): ?>
                            <div class="scms-repeater-box">
                                <button type="button" class="del-btn" onclick="this.closest('.scms-repeater-box').remove()"><i class="bi bi-x"></i></button>
                                <div class="row">
                                    <div class="col-md-2 mb-2">
                                        <input type="text" name="process_steps[]" class="scms-form-control text-center fw-bold" value="<?= htmlspecialchars($st['step'] ?? sprintf('%02d', $pIdx + 1)) ?>" placeholder="01">
                                    </div>
                                    <div class="col-md-10 mb-2 pe-5">
                                        <input type="text" name="process_titles[]" class="scms-form-control fw-bold" value="<?= htmlspecialchars($st['title'] ?? '') ?>" placeholder="Step Title (e.g. Audit & Strategy)">
                                    </div>
                                    <div class="col-12">
                                        <textarea name="process_descs[]" class="scms-form-control" rows="2" placeholder="Explanation of what happens in this stage..."><?= htmlspecialchars($st['description'] ?? '') ?></textarea>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <button type="button" class="scms-btn-add" onclick="scmsAddProcess()">
                        <i class="bi bi-plus-circle"></i> Add Process Step
                    </button>
                </div>

                <!-- TAB 5: FAQS -->
                <div id="tab-faqs" class="scms-tab-pane d-none">
                    <p class="text-muted small mb-3">Service-specific frequently asked questions with accordion answers.</p>
                    <div id="scmsFaqsContainer">
                        <?php foreach ($faqs as $fq): ?>
                            <div class="scms-repeater-box">
                                <button type="button" class="del-btn" onclick="this.closest('.scms-repeater-box').remove()"><i class="bi bi-x"></i></button>
                                <div class="row">
                                    <div class="col-12 mb-2 pe-5">
                                        <input type="text" name="faq_questions[]" class="scms-form-control fw-bold" value="<?= htmlspecialchars($fq['q'] ?? $fq['question'] ?? '') ?>" placeholder="Question (e.g. How long does SEO take to produce results?)">
                                    </div>
                                    <div class="col-12">
                                        <textarea name="faq_answers[]" class="scms-form-control" rows="3" placeholder="Clear, authoritative answer..."><?= htmlspecialchars($fq['a'] ?? $fq['answer'] ?? '') ?></textarea>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <button type="button" class="scms-btn-add" onclick="scmsAddFaq()">
                        <i class="bi bi-plus-circle"></i> Add Question &amp; Answer
                    </button>
                </div>

                <!-- TAB 6: ADVANCE UI & GROWTH SECTIONS -->
                <div id="tab-advance-ui" class="scms-tab-pane d-none">
                    <div class="alert alert-light border d-flex align-items-center mb-4" style="background: #FFF5FA; border-color: rgba(196, 0, 122, 0.25) !important;">
                        <i class="bi bi-stars fs-3 text-primary me-3"></i>
                        <div>
                            <strong style="color: #C4007A;">Advance UI, Framer Animations &amp; Growth Sections</strong>
                            <div class="small text-muted">Manage the interactive 4-Quadrant Growth Wheel, SEO Masterclass, Client Feedback Slider, and Brand Logos showcase.</div>
                        </div>
                    </div>

                    <!-- 1. 4-QUADRANT GROWTH WHEEL (Image 2) -->
                    <div class="p-3 mb-4 rounded border bg-white shadow-sm" style="border-left: 4px solid #C4007A !important;">
                        <h5 class="fw-bold text-dark mb-1"><i class="bi bi-pie-chart-fill text-primary me-2"></i> 1. 4-Quadrant Growth Wheel &amp; Organic Impact (Image 2)</h5>
                        <p class="small text-muted mb-3">Controls the interactive 4-quadrant diagram with central circular badge and high-impact metrics.</p>

                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="small fw-bold">Center Badge Main Label</label>
                                <input type="text" name="gq_center_label" class="scms-form-control" value="<?= htmlspecialchars($growthQuadrants['center_label'] ?? 'Clicks from Search') ?>">
                            </div>
                            <div class="col-md-6">
                                <label class="small fw-bold">Center Badge Subtitle</label>
                                <input type="text" name="gq_center_sub" class="scms-form-control" value="<?= htmlspecialchars($growthQuadrants['center_sub'] ?? 'Increases measured over 90-day active sprint vs prior period') ?>">
                            </div>
                        </div>

                        <div class="row g-3">
                            <?php 
                            $qList = $growthQuadrants['quadrants'] ?? [
                                ['label' => 'B2B Trade Show & Global Expo', 'metric' => '400%', 'sub' => 'Bharat Tex / Global Textile Expo'],
                                ['label' => 'International Sourcing Fair', 'metric' => '300%', 'sub' => 'IHGF Delhi Autumn Fair 2027'],
                                ['label' => 'B2B Industrial & Manufacturing', 'metric' => '85%', 'sub' => 'Commercial Inbound Lead Volume'],
                                ['label' => 'Delhi NCR Commercial SEO', 'metric' => '1,393%', 'sub' => 'Organic Inbound Search Leap'],
                            ];
                            ?>
                            <div class="col-md-6 p-2">
                                <div class="p-3 rounded bg-light border">
                                    <div class="fw-bold text-primary small mb-2">Quadrant 1 (Top-Left)</div>
                                    <input type="text" name="gq_m1" class="scms-form-control mb-2 fw-bold" value="<?= htmlspecialchars($qList[0]['metric'] ?? '400%') ?>" placeholder="Metric e.g. 400%">
                                    <input type="text" name="gq_l1" class="scms-form-control mb-2" value="<?= htmlspecialchars($qList[0]['label'] ?? 'B2B Trade Show & Global Expo') ?>" placeholder="Label">
                                    <input type="text" name="gq_s1" class="scms-form-control" value="<?= htmlspecialchars($qList[0]['sub'] ?? 'Bharat Tex / Global Textile Expo') ?>" placeholder="Subtitle">
                                </div>
                            </div>
                            <div class="col-md-6 p-2">
                                <div class="p-3 rounded bg-light border">
                                    <div class="fw-bold text-primary small mb-2">Quadrant 2 (Top-Right)</div>
                                    <input type="text" name="gq_m2" class="scms-form-control mb-2 fw-bold" value="<?= htmlspecialchars($qList[1]['metric'] ?? '300%') ?>" placeholder="Metric e.g. 300%">
                                    <input type="text" name="gq_l2" class="scms-form-control mb-2" value="<?= htmlspecialchars($qList[1]['label'] ?? 'International Sourcing Fair') ?>" placeholder="Label">
                                    <input type="text" name="gq_s2" class="scms-form-control" value="<?= htmlspecialchars($qList[1]['sub'] ?? 'IHGF Delhi Autumn Fair 2027') ?>" placeholder="Subtitle">
                                </div>
                            </div>
                            <div class="col-md-6 p-2">
                                <div class="p-3 rounded bg-light border">
                                    <div class="fw-bold text-primary small mb-2">Quadrant 3 (Bottom-Left)</div>
                                    <input type="text" name="gq_m3" class="scms-form-control mb-2 fw-bold" value="<?= htmlspecialchars($qList[2]['metric'] ?? '85%') ?>" placeholder="Metric e.g. 85%">
                                    <input type="text" name="gq_l3" class="scms-form-control mb-2" value="<?= htmlspecialchars($qList[2]['label'] ?? 'B2B Industrial & Manufacturing') ?>" placeholder="Label">
                                    <input type="text" name="gq_s3" class="scms-form-control" value="<?= htmlspecialchars($qList[2]['sub'] ?? 'Commercial Inbound Lead Volume') ?>" placeholder="Subtitle">
                                </div>
                            </div>
                            <div class="col-md-6 p-2">
                                <div class="p-3 rounded bg-light border">
                                    <div class="fw-bold text-primary small mb-2">Quadrant 4 (Bottom-Right)</div>
                                    <input type="text" name="gq_m4" class="scms-form-control mb-2 fw-bold" value="<?= htmlspecialchars($qList[3]['metric'] ?? '1,393%') ?>" placeholder="Metric e.g. 1,393%">
                                    <input type="text" name="gq_l4" class="scms-form-control mb-2" value="<?= htmlspecialchars($qList[3]['label'] ?? 'Delhi NCR Commercial SEO') ?>" placeholder="Label">
                                    <input type="text" name="gq_s4" class="scms-form-control" value="<?= htmlspecialchars($qList[3]['sub'] ?? 'Organic Inbound Search Leap') ?>" placeholder="Subtitle">
                                </div>
                            </div>
                        </div>

                        <!-- 2 Sub Feature Cards -->
                        <div class="row g-3 mt-2">
                            <div class="col-md-6">
                                <label class="small fw-bold">Bottom Card 1 Title</label>
                                <input type="text" name="gq_c1_title" class="scms-form-control mb-1" value="<?= htmlspecialchars($growthQuadrants['cards'][0]['title'] ?? 'Attract High-Intent Commercial Buyers') ?>">
                                <label class="small text-muted">Card 1 Description</label>
                                <textarea name="gq_c1_desc" class="scms-form-control" rows="2"><?= htmlspecialchars($growthQuadrants['cards'][0]['desc'] ?? 'Targeting specific transactional & commercial search queries with engineered landing pages that capture buyers ready to transact.') ?></textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="small fw-bold">Bottom Card 2 Title</label>
                                <input type="text" name="gq_c2_title" class="scms-form-control mb-1" value="<?= htmlspecialchars($growthQuadrants['cards'][1]['title'] ?? 'Enhance Brand Entity Authority & Legacy') ?>">
                                <label class="small text-muted">Card 2 Description</label>
                                <textarea name="gq_c2_desc" class="scms-form-control" rows="2"><?= htmlspecialchars($growthQuadrants['cards'][1]['desc'] ?? 'Ensuring your executive thought leadership, brand knowledge graph, and service catalogue are indexable, permanent, and recommended by AI engines.') ?></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- 2. SEO MASTERCLASS (Image 5) -->
                    <div class="p-3 mb-4 rounded border bg-white shadow-sm" style="border-left: 4px solid #C4007A !important;">
                        <h5 class="fw-bold text-dark mb-1"><i class="bi bi-mortarboard-fill text-primary me-2"></i> 2. SEO Masterclass &amp; Strategy Blueprint (Image 5)</h5>
                        <p class="small text-muted mb-3">Customise the in-house team training curriculum, instructor credentials, and video masterclass preview.</p>

                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="small fw-bold">Masterclass Main Title</label>
                                <input type="text" name="mc_title" class="scms-form-control" value="<?= htmlspecialchars($masterclass['title'] ?? 'SEO Masterclass & In-House Blueprint.') ?>">
                            </div>
                            <div class="col-md-6">
                                <label class="small fw-bold">Lead Instructor</label>
                                <input type="text" name="mc_instructor" class="scms-form-control" value="<?= htmlspecialchars($masterclass['instructor'] ?? 'Jitin Madaan • Performance Marketing Strategist') ?>">
                            </div>
                            <div class="col-md-12">
                                <label class="small fw-bold">Masterclass Subtitle</label>
                                <input type="text" name="mc_subtitle" class="scms-form-control" value="<?= htmlspecialchars($masterclass['subtitle'] ?? 'Maximise your commercial marketing with our bespoke SEO Masterclass, designed to equip your team with the practical skills to implement modern SEO effectively in-house.') ?>">
                            </div>
                            <div class="col-md-6">
                                <label class="small fw-bold">Curriculum Target Headline</label>
                                <input type="text" name="mc_headline" class="scms-form-control" value="<?= htmlspecialchars($masterclass['headline'] ?? 'Designed for Enterprise Teams, Marketers & Founders') ?>">
                            </div>
                            <div class="col-md-6">
                                <label class="small fw-bold">Video Duration Pill</label>
                                <input type="text" name="mc_video_duration" class="scms-form-control" value="<?= htmlspecialchars($masterclass['video_duration'] ?? '15 min executive training') ?>">
                            </div>
                            <div class="col-md-6">
                                <label class="small fw-bold">Course Overview / Description</label>
                                <textarea name="mc_description" class="scms-form-control" rows="4"><?= htmlspecialchars($masterclass['description'] ?? 'This four-week intensive blueprint demystifies search algorithms, AI search overviews (AEO/GEO), and ranking mechanics. Led by industry expert Jitin Madaan, you will be equipped with the exact frameworks powering 5,000+ top Google rankings.') ?></textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="small fw-bold">Skills Learned (One Per Line)</label>
                                <textarea name="mc_skills" class="scms-form-control" rows="4" placeholder="One skill per line..."><?= htmlspecialchars(implode("\n", $masterclass['skills'] ?? [
                                    'Commercial Keyword Research & Search Intent Mapping',
                                    'Reverse-Engineering Competitor Authority & Backlink Profiles',
                                    'High-Impact Content Strategy & Semantic Topical Clusters',
                                    'Technical SEO, Crawl Health & Core Web Vitals Optimization',
                                    'Conversion Rate Optimization (CRO) & UX Engagement Signals',
                                    'GA4 Analytics, Google Search Console & AI Search Tracking',
                                    'and much more...'
                                ])) ?></textarea>
                            </div>
                            <div class="col-md-12 mt-2">
                                <label class="small fw-bold text-dark mb-1"><i class="bi bi-camera-video-fill text-primary me-1"></i> Masterclass Video Cover / Thumbnail Image</label>
                                <?php $mcImg = $masterclass['video_image'] ?? $item['masterclass_image'] ?? '/assets/images/case-study-1.jpg'; ?>
                                <div class="d-flex align-items-center gap-3 p-2 bg-light rounded border mb-2">
                                    <img src="<?= htmlspecialchars($mcImg) ?>" alt="Cover" style="width: 80px; height: 50px; object-fit: cover; border-radius: 6px; border: 1.5px solid #C4007A;">
                                    <div class="small text-truncate" style="max-width: 320px; color: #4B5563;">Current: <code><?= htmlspecialchars($mcImg) ?></code></div>
                                </div>
                                <div class="row g-2">
                                    <div class="col-md-6">
                                        <label class="small text-muted mb-1">Upload New Video Cover File (JPG, PNG, WEBP):</label>
                                        <input type="file" name="mc_image_file" accept="image/*" class="form-control form-control-sm">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="small text-muted mb-1">Or Direct Cover URL / Path:</label>
                                        <input type="text" name="mc_video_image" class="scms-form-control form-control-sm" value="<?= htmlspecialchars($mcImg) ?>" placeholder="/assets/images/case-study-1.jpg">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 3. CLIENT FEEDBACK TESTIMONIALS SLIDER (Image 4) -->
                    <div class="p-3 mb-4 rounded border bg-white shadow-sm" style="border-left: 4px solid #C4007A !important;">
                        <h5 class="fw-bold text-dark mb-1"><i class="bi bi-chat-quote-fill text-primary me-2"></i> 3. Client Feedback Touch Slider (Image 4)</h5>
                        <p class="small text-muted mb-3">Verified client testimonials displayed in the interactive touch carousel.</p>

                        <div id="scmsClientFeedbackContainer">
                            <?php 
                            $cFeedList = !empty($clientFeedback) ? $clientFeedback : [
                                [
                                    'quote' => "Thank you so much WebTecMart. We've noticed a phenomenal improvement in commercial search visibility, keyword engagement, and subsequently a large proportion of our verified customer enquiries are coming directly through the website...",
                                    'author' => 'Libby Powell',
                                    'role' => 'Marketing Director',
                                    'company' => 'Innovation Zero'
                                ],
                                [
                                    'quote' => "WebTecMart has completely evolved our strategic thinking when it comes to enterprise websites. One of our greatest success stories was converting our legacy domain to an optimized search architecture which led to a 731% increase in website users and a 164% uplift in organic search conversions...",
                                    'author' => 'Louise Smith',
                                    'role' => 'Associate Director',
                                    'company' => 'Society of Petroleum Engineers'
                                ],
                                [
                                    'quote' => "Their support, keyword clustering, and best practice guidance helped ensure we now have a user friendly, SEO efficient, creative, and high performing landing site for our target audience across Delhi NCR and international markets...",
                                    'author' => 'Ali McQueen',
                                    'role' => 'Head of Marketing',
                                    'company' => 'RoarB2B'
                                ]
                            ];
                            foreach ($cFeedList as $cf): ?>
                                <div class="scms-repeater-box mb-3 p-3 bg-light rounded border">
                                    <div class="row g-2">
                                        <div class="col-md-4">
                                            <label class="small text-muted">Author Name</label>
                                            <input type="text" name="cf_authors[]" class="scms-form-control fw-bold" value="<?= htmlspecialchars($cf['author'] ?? '') ?>" placeholder="e.g. Libby Powell">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="small text-muted">Role / Title</label>
                                            <input type="text" name="cf_roles[]" class="scms-form-control" value="<?= htmlspecialchars($cf['role'] ?? '') ?>" placeholder="e.g. Marketing Director">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="small text-muted">Company</label>
                                            <input type="text" name="cf_companies[]" class="scms-form-control" value="<?= htmlspecialchars($cf['company'] ?? '') ?>" placeholder="e.g. Innovation Zero">
                                        </div>
                                        <div class="col-12 mt-2">
                                            <label class="small text-muted">Testimonial Quote</label>
                                            <textarea name="cf_quotes[]" class="scms-form-control" rows="2" placeholder="Detailed client testimonial..."><?= htmlspecialchars($cf['quote'] ?? '') ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- 4. GOOGLE SERP & AI OVERVIEW IMAGE (Image 2 Takeaways) -->
                    <div class="p-3 mb-4 rounded border bg-white shadow-sm" style="border-left: 4px solid #C4007A !important;">
                        <h5 class="fw-bold text-dark mb-1"><i class="bi bi-google text-primary me-2"></i> 4. Google SERP AI Overview Mockup Image (Key Takeaways Section)</h5>
                        <p class="small text-muted mb-3">Upload or replace the high-resolution Google SERP / AI search overview graphic shown on the right side of the Key Takeaways section.</p>

                        <?php $serpImgVal = $item['serp_image'] ?? '/assets/images/seo-takeaways-preview.png'; ?>
                        <div class="row g-3 align-items-center">
                            <div class="col-md-3">
                                <div class="p-2 border rounded bg-light text-center">
                                    <img src="<?= htmlspecialchars($serpImgVal) ?>" alt="SERP Preview" style="max-width: 100%; max-height: 120px; object-fit: contain; border-radius: 6px;">
                                </div>
                            </div>
                            <div class="col-md-9">
                                <label class="small fw-bold text-dark mb-1"><i class="bi bi-upload text-primary me-1"></i> Upload New SERP Image File (PNG, JPG, WEBP)</label>
                                <input type="file" name="serp_image_file" accept="image/*" class="form-control form-control-sm mb-2">
                                <label class="small text-muted mb-1">Or Direct Image URL / Path:</label>
                                <input type="text" name="serp_image" class="scms-form-control form-control-sm" value="<?= htmlspecialchars($serpImgVal) ?>" placeholder="/assets/images/seo-takeaways-preview.png">
                            </div>
                        </div>
                    </div>

                    <!-- 5. TOP EVENT BRAND LOGOS SHOWCASE (Image 1 Marquee) -->
                    <div class="p-3 mb-4 rounded border bg-white shadow-sm" style="border-left: 4px solid #C4007A !important;">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <h5 class="fw-bold text-dark mb-0"><i class="bi bi-collection-fill text-primary me-2"></i> 5. Top Event Brand Logos Showcase (Image 1 Marquee)</h5>
                            <button type="button" class="btn btn-sm btn-outline-primary" onclick="scmsAddBrandLogoRow()"><i class="bi bi-plus-lg me-1"></i> Add Brand Logo</button>
                        </div>
                        <p class="small text-muted mb-3">Upload logos and edit brand names and category tags for all event organisers featured in the marquee.</p>

                        <div id="scmsBrandLogosContainer">
                            <?php 
                            $bList = !empty($brandLogos) ? $brandLogos : [
                                ['name' => 'Informa Global', 'logo' => '/assets/images/logo-1.png', 'category' => 'Trade Events'],
                                ['name' => 'Bharat Tex Fair', 'logo' => '/assets/images/logos-10.jpeg', 'category' => 'Ministry of Textiles'],
                                ['name' => 'IHGF Delhi Autumn Fair 2027', 'logo' => '/assets/images/logos-11.jpeg', 'category' => 'Global Sourcing Fair'],
                                ['name' => 'Clarion Events', 'logo' => '/assets/images/logos-2.png', 'category' => 'Exhibition Leader'],
                                ['name' => 'London Tech Week', 'logo' => '/assets/images/logos-3.jpeg', 'category' => 'Tech Expo'],
                                ['name' => 'Media 10', 'logo' => '/assets/images/logos-4.jpeg', 'category' => 'Design & Media'],
                                ['name' => 'The AI Summit', 'logo' => '/assets/images/logos-5.jpeg', 'category' => 'Enterprise AI'],
                                ['name' => 'Northstar Travel Group', 'logo' => '/assets/images/logos-6.jpeg', 'category' => 'Travel Group'],
                                ['name' => 'BMJ Future Health', 'logo' => '/assets/images/logos-7.jpeg', 'category' => 'Healthcare Publishing'],
                                ['name' => 'Stonex Jewellers', 'logo' => '/assets/images/stonex-jewellers-logo.png', 'category' => 'Luxury Retail'],
                                ['name' => 'Innovation Zero', 'logo' => '/assets/images/logos-8.jpeg', 'category' => 'CleanTech Congress'],
                                ['name' => 'Premier Logistics', 'logo' => '/assets/images/logos-9.jpeg', 'category' => 'Industrial Logistics']
                            ];
                            foreach ($bList as $bIdx => $b): ?>
                                <div class="scms-repeater-box mb-3 p-3 bg-light rounded border">
                                    <div class="row g-2 align-items-center">
                                        <div class="col-md-2 text-center">
                                            <?php if (!empty($b['logo'])): ?>
                                                <img src="<?= htmlspecialchars($b['logo']) ?>" alt="Logo" style="max-height: 44px; max-width: 90px; object-fit: contain; background: #fff; padding: 4px; border-radius: 6px; border: 1px solid #E5E7EB;">
                                            <?php else: ?>
                                                <div class="badge bg-secondary p-2">No Logo</div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="small text-muted mb-0">Brand Name</label>
                                            <input type="text" name="brand_names[<?= $bIdx ?>]" class="scms-form-control form-control-sm fw-bold" value="<?= htmlspecialchars($b['name']) ?>" placeholder="e.g. Informa Global">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="small text-muted mb-0">Category / Subtitle</label>
                                            <input type="text" name="brand_cats[<?= $bIdx ?>]" class="scms-form-control form-control-sm" value="<?= htmlspecialchars($b['category'] ?? 'Enterprise Brand') ?>" placeholder="e.g. Trade Events">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="small text-muted mb-0"><i class="bi bi-upload text-primary me-1"></i> Upload Logo File</label>
                                            <input type="file" name="brand_logo_file_<?= $bIdx ?>" accept="image/*" class="form-control form-control-sm mb-1">
                                            <input type="text" name="brand_urls[<?= $bIdx ?>]" class="scms-form-control form-control-sm small" value="<?= htmlspecialchars($b['logo']) ?>" placeholder="/assets/images/logo-1.png">
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <!-- TAB 7: SEO & META -->
                <div id="tab-seo" class="scms-tab-pane d-none">
                    <div class="scms-form-group">
                        <label>Page Meta Title</label>
                        <input type="text" name="page_meta_title" class="scms-form-control" value="<?= htmlspecialchars($item['page_meta_title'] ?? '') ?>" placeholder="e.g. Search Engine Optimization (SEO) Services | WebTecMart">
                    </div>
                    <div class="scms-form-group">
                        <label>Page Meta Description</label>
                        <textarea name="page_meta_desc" class="scms-form-control" rows="3" placeholder="Target 150-160 characters for high SERP click-through rates..."><?= htmlspecialchars($item['page_meta_desc'] ?? '') ?></textarea>
                    </div>
                </div>

                <!-- Submit Bar -->
                <div class="d-flex align-items-center justify-content-between pt-4 mt-4 border-top">
                    <a href="/admin/services.php" class="btn btn-outline-secondary">Cancel</a>
                    <button type="submit" class="scms-primary-btn">
                        <i class="bi bi-check-lg"></i> <?= $isNew ? 'Publish New Service' : 'Save Changes &amp; Update Live Page' ?>
                    </button>
                </div>
            </form>
        </div>

    <?php else:
        // ============================================================
        // MANAGE ALL SERVICES TABLE
        // ============================================================
    ?>

        <!-- Filter & Search Controls -->
        <div class="scms-bar">
            <div class="scms-search-wrap">
                <i class="bi bi-search"></i>
                <input type="text" id="scmsSearch" class="scms-search-input" placeholder="Search services by title, slug, category..." onkeyup="scmsFilterTable()">
            </div>
            <div class="scms-cat-pills">
                <span class="scms-cat-pill active" onclick="scmsFilterCategory('all', this)">All (<?= count($servicesList) ?>)</span>
                <?php foreach (['SEO', 'Web Development', 'Paid Advertising', 'Social Media', 'Branding'] as $cat): ?>
                    <span class="scms-cat-pill" onclick="scmsFilterCategory('<?= htmlspecialchars($cat) ?>', this)"><?= htmlspecialchars($cat) ?></span>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Services Listing Table -->
        <div class="scms-table-card">
            <div class="table-responsive">
                <table class="scms-table" id="scmsTable">
                    <thead>
                        <tr>
                            <th>Service</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Last Updated</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($servicesList as $svc):
                            $isPub = (int) ($svc['is_active'] ?? 1) === 1;
                            $slug = $svc['slug'] ?? '';
                        ?>
                            <tr class="scms-row" data-category="<?= htmlspecialchars($svc['category'] ?? 'SEO') ?>" data-search="<?= strtolower(htmlspecialchars(($svc['title'] ?? '') . ' ' . ($svc['slug'] ?? '') . ' ' . ($svc['category'] ?? ''))) ?>">
                                <td>
                                    <div class="scms-svc-cell">
                                        <div class="scms-svc-icon-box">
                                            <i class="bi bi-<?= htmlspecialchars($svc['icon'] ?? 'sparkles') === 'sparkles' ? 'stars' : ($svc['icon'] ?? 'box') ?>"></i>
                                        </div>
                                        <div>
                                            <div class="scms-svc-name">
                                                <?= htmlspecialchars($svc['title'] ?? '') ?>
                                                <?php if (($svc['slug'] ?? '') === 'b2b-exhibition-seo'): ?>
                                                    <span class="badge" style="background: linear-gradient(135deg, #C4007A, #E0398F); font-size: 0.65rem; margin-left: 6px; vertical-align: middle;">★ FLAGSHIP</span>
                                                <?php endif; ?>
                                            </div>
                                            <div class="scms-svc-tagline"><?= htmlspecialchars($svc['tagline'] ?? '') ?></div>
                                            <div class="scms-svc-slug"><?= htmlspecialchars(getSvcPublicUrl($slug)) ?></div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="scms-badge-cat"><?= htmlspecialchars($svc['category'] ?? 'SEO') ?></span>
                                </td>
                                <td>
                                    <form method="POST" action="/admin/services.php" style="display:inline;">
                                        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['cms_csrf_token']) ?>">
                                        <input type="hidden" name="action" value="toggle_status">
                                        <input type="hidden" name="id" value="<?= (int) $svc['id'] ?>">
                                        <button type="submit" class="scms-status-btn" title="Click to toggle status">
                                            <span class="scms-status-badge <?= $isPub ? 'published' : 'draft' ?>">
                                                <span class="dot"></span>
                                                <?= $isPub ? 'Published' : 'Draft' ?>
                                            </span>
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <small class="text-muted"><?= htmlspecialchars(date('M d, Y', strtotime($svc['updated_at'] ?? $svc['created_at'] ?? 'now'))) ?></small>
                                </td>
                                <td>
                                    <div class="scms-actions-cell justify-content-end">
                                        <a href="<?= htmlspecialchars(getSvcPublicUrl($slug)) ?>" target="_blank" class="scms-btn-action" title="Preview Public Page">
                                            <i class="bi bi-box-arrow-up-right"></i>
                                        </a>
                                        <a href="/admin/services.php?edit=<?= (int) $svc['id'] ?>" class="scms-btn-action edit" title="Edit Service">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <button type="button" class="scms-btn-action del" onclick="scmsConfirmDelete(<?= (int) $svc['id'] ?>, '<?= htmlspecialchars(addslashes($svc['title'] ?? '')) ?>')" title="Delete Service">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    <?php endif; ?>

</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="scmsDeleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header border-bottom">
                <h5 class="modal-title text-danger fw-bold"><i class="bi bi-exclamation-triangle-fill me-2"></i> Confirm Service Deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body py-4">
                <p>Are you sure you want to permanently delete the service <strong id="scmsDeleteServiceName"></strong>?</p>
                <p class="text-muted small mb-0">This will remove the page from the website. This action cannot be undone.</p>
            </div>
            <div class="modal-footer border-top">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <form method="POST" action="/admin/services.php" id="scmsDeleteForm">
                    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['cms_csrf_token']) ?>">
                    <input type="hidden" name="action" value="delete">
                    <input type="hidden" name="id" id="scmsDeleteId" value="">
                    <button type="submit" class="btn btn-danger fw-bold">Delete Permanently</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Tab switcher
    function scmsSwitchTab(tabId, btn) {
        document.querySelectorAll('.scms-tab-pane').forEach(el => el.classList.add('d-none'));
        document.querySelectorAll('.scms-tab-btn').forEach(el => el.classList.remove('active'));
        const target = document.getElementById(tabId);
        if (target) target.classList.remove('d-none');
        if (btn) btn.classList.add('active');
    }

    // Live search filter
    function scmsFilterTable() {
        const query = (document.getElementById('scmsSearch').value || '').toLowerCase().trim();
        document.querySelectorAll('.scms-row').forEach(row => {
            const text = row.getAttribute('data-search') || '';
            row.style.display = text.includes(query) ? '' : 'none';
        });
    }

    // Category filter
    function scmsFilterCategory(cat, btn) {
        document.querySelectorAll('.scms-cat-pill').forEach(el => el.classList.remove('active'));
        btn.classList.add('active');
        const catLower = cat.toLowerCase();
        document.querySelectorAll('.scms-row').forEach(row => {
            const rowCat = (row.getAttribute('data-category') || '').toLowerCase();
            if (catLower === 'all' || rowCat === catLower) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }

    // Delete modal trigger
    function scmsConfirmDelete(id, name) {
        document.getElementById('scmsDeleteId').value = id;
        document.getElementById('scmsDeleteServiceName').textContent = name;
        const modal = new bootstrap.Modal(document.getElementById('scmsDeleteModal'));
        modal.show();
    }

    // Add Dynamic Feature Repeater Box
    function scmsAddFeature() {
        const container = document.getElementById('scmsFeaturesContainer');
        const div = document.createElement('div');
        div.className = 'scms-repeater-box';
        div.innerHTML = `
            <button type="button" class="del-btn" onclick="this.closest('.scms-repeater-box').remove()"><i class="bi bi-x"></i></button>
            <div class="row">
                <div class="col-12 mb-2 pe-5">
                    <input type="text" name="feature_titles[]" class="scms-form-control fw-bold" placeholder="Deliverable Title">
                </div>
                <div class="col-12">
                    <textarea name="feature_descs[]" class="scms-form-control" rows="2" placeholder="Description of what is included..."></textarea>
                </div>
            </div>
        `;
        container.appendChild(div);
    }

    // Add Dynamic Process Repeater Box
    function scmsAddProcess() {
        const container = document.getElementById('scmsProcessContainer');
        const count = container.querySelectorAll('.scms-repeater-box').length + 1;
        const stepNum = count < 10 ? '0' + count : '' + count;
        const div = document.createElement('div');
        div.className = 'scms-repeater-box';
        div.innerHTML = `
            <button type="button" class="del-btn" onclick="this.closest('.scms-repeater-box').remove()"><i class="bi bi-x"></i></button>
            <div class="row">
                <div class="col-md-2 mb-2">
                    <input type="text" name="process_steps[]" class="scms-form-control text-center fw-bold" value="${stepNum}" placeholder="01">
                </div>
                <div class="col-md-10 mb-2 pe-5">
                    <input type="text" name="process_titles[]" class="scms-form-control fw-bold" placeholder="Step Title">
                </div>
                <div class="col-12">
                    <textarea name="process_descs[]" class="scms-form-control" rows="2" placeholder="Stage description..."></textarea>
                </div>
            </div>
        `;
        container.appendChild(div);
    }

    // Add Dynamic FAQ Repeater Box
    function scmsAddFaq() {
        const container = document.getElementById('scmsFaqsContainer');
        const div = document.createElement('div');
        div.className = 'scms-repeater-box';
        div.innerHTML = `
            <button type="button" class="del-btn" onclick="this.closest('.scms-repeater-box').remove()"><i class="bi bi-x"></i></button>
            <div class="row">
                <div class="col-12 mb-2 pe-5">
                    <input type="text" name="faq_questions[]" class="scms-form-control fw-bold" placeholder="Question">
                </div>
                <div class="col-12">
                    <textarea name="faq_answers[]" class="scms-form-control" rows="3" placeholder="Authoritative answer..."></textarea>
                </div>
            </div>
        `;
        container.appendChild(div);
    }

    // Add Dynamic Brand Logo Row
    function scmsAddBrandLogoRow() {
        const container = document.getElementById('scmsBrandLogosContainer');
        if (!container) return;
        const count = container.querySelectorAll('.scms-repeater-box').length;
        const div = document.createElement('div');
        div.className = 'scms-repeater-box mb-3 p-3 bg-light rounded border';
        div.innerHTML = `
            <button type="button" class="del-btn" onclick="this.closest('.scms-repeater-box').remove()"><i class="bi bi-x"></i></button>
            <div class="row g-2 align-items-center">
                <div class="col-md-2 text-center">
                    <div class="badge bg-secondary p-2">New Brand</div>
                </div>
                <div class="col-md-3">
                    <label class="small text-muted mb-0">Brand Name</label>
                    <input type="text" name="brand_names[${count}]" class="scms-form-control form-control-sm fw-bold" placeholder="Brand Name">
                </div>
                <div class="col-md-3">
                    <label class="small text-muted mb-0">Category / Subtitle</label>
                    <input type="text" name="brand_cats[${count}]" class="scms-form-control form-control-sm" placeholder="e.g. Trade Expo" value="Enterprise Brand">
                </div>
                <div class="col-md-4">
                    <label class="small text-muted mb-0"><i class="bi bi-upload text-primary me-1"></i> Upload Logo File</label>
                    <input type="file" name="brand_logo_file_${count}" accept="image/*" class="form-control form-control-sm mb-1">
                    <input type="text" name="brand_urls[${count}]" class="scms-form-control form-control-sm small" placeholder="/assets/images/logo-1.png">
                </div>
            </div>
        `;
        container.appendChild(div);
    }
</script>

<?php require_once __DIR__ . '/templates/footer.php'; ?>
