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

        $springSerpImage = trim($_POST['spring_serp_image'] ?? ($existingMeta['spring_serp_image'] ?? '/assets/images/spring-sourcing-fair-serp-highlight.png'));
        if (!empty($_FILES['spring_serp_image_file']['tmp_name']) && is_uploaded_file($_FILES['spring_serp_image_file']['tmp_name'])) {
            try {
                $up = uploadCmsImage($_FILES['spring_serp_image_file']);
                if ($up) $springSerpImage = $up;
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
            'spring_serp_image'=> $springSerpImage,
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

        // ====================================================
        // DYNAMIC CONTENT ENGINE: SEO SERVICES IN DELHI
        // ====================================================
        if ($slug === 'seo-services-delhi' || (isset($id) && (int)$id === 69) || isset($_POST['is_delhi_seo'])) {
            $metadata['is_delhi_seo'] = 1;
            $metadata['hero_accent'] = trim($_POST['hero_accent'] ?? ($existingMeta['hero_accent'] ?? 'Result-Driven SEO to Grow Your Business'));
            $metadata['hero_readiness_badge'] = trim($_POST['hero_readiness_badge'] ?? ($existingMeta['hero_readiness_badge'] ?? '⚡ Ready for Google to find you?'));
            
            if (!empty($_POST['hero_bullets_text'])) {
                $bLines = array_filter(array_map('trim', explode("\n", $_POST['hero_bullets_text'])));
                if (!empty($bLines)) {
                    $metadata['hero_bullets'] = array_values($bLines);
                }
            }

            // Strategic Narrative
            if (isset($_POST['sn_title'])) {
                $metadata['strategic_narrative'] = [
                    'eyebrow' => trim($_POST['sn_eyebrow'] ?? 'BE FOUND BY THE CORRECT PEOPLE • GENERATE BETTER LEADS • GROW ORGANICALLY'),
                    'title'   => trim($_POST['sn_title'] ?? 'SEO Services in Delhi That Turn Search Visibility Into Business Growth!'),
                    'lead'    => trim($_POST['sn_lead'] ?? ''),
                    'p1'      => trim($_POST['sn_p1'] ?? ''),
                    'p2'      => trim($_POST['sn_p2'] ?? ''),
                    'callout' => trim($_POST['sn_callout'] ?? '💡 Getting better rankings is just the start. It\'s really about improving the business results.')
                ];
            }

            // Why Choose Us Cards
            if (!empty($_POST['why_titles']) && is_array($_POST['why_titles'])) {
                $wCards = [];
                foreach ($_POST['why_titles'] as $wIdx => $wTitle) {
                    $wTitle = trim($wTitle);
                    if ($wTitle === '') continue;
                    $wCards[] = [
                        'icon'  => trim($_POST['why_icons'][$wIdx] ?? '🎯'),
                        'title' => $wTitle,
                        'desc'  => trim($_POST['why_descs'][$wIdx] ?? '')
                    ];
                }
                if (!empty($wCards)) {
                    $metadata['why_cards'] = $wCards;
                }
            }

            // Key Takeaways & Approach
            if (isset($_POST['takeaway_title'])) {
                $tChecklist = [];
                if (!empty($_POST['takeaway_checklist_text'])) {
                    $tLines = array_filter(array_map('trim', explode("\n", $_POST['takeaway_checklist_text'])));
                    if (!empty($tLines)) {
                        $tChecklist = array_values($tLines);
                    }
                }
                $metadata['takeaways'] = [
                    'eyebrow'        => trim($_POST['takeaway_eyebrow'] ?? 'KEY TAKEAWAYS'),
                    'title'          => trim($_POST['takeaway_title'] ?? 'SEO Services in Delhi at a Glance'),
                    'lead'           => trim($_POST['takeaway_lead'] ?? ''),
                    'checklist'      => !empty($tChecklist) ? $tChecklist : ($existingMeta['takeaways']['checklist'] ?? []),
                    'approach_title' => trim($_POST['approach_title'] ?? 'Our SEO Approach: 7-Stage Strategic Growth Loop'),
                    'approach_steps' => !empty($_POST['approach_steps']) ? array_filter(array_map('trim', explode(',', $_POST['approach_steps']))) : ($existingMeta['takeaways']['approach_steps'] ?? ['Research', 'Strategy', 'Optimisation', 'Content', 'Authority', 'Measurement', 'Growth']),
                    'approach_desc'  => trim($_POST['approach_desc'] ?? '')
                ];
            }

            // What We Offer (6 Core Offerings)
            if (!empty($_POST['offer_titles']) && is_array($_POST['offer_titles'])) {
                $oList = [];
                foreach ($_POST['offer_titles'] as $oIdx => $oTitle) {
                    $oTitle = trim($oTitle);
                    if ($oTitle === '') continue;
                    $oList[] = [
                        'icon'      => trim($_POST['offer_icons'][$oIdx] ?? 'sparkles'),
                        'title'     => $oTitle,
                        'desc'      => trim($_POST['offer_descs'][$oIdx] ?? ''),
                        'link'      => trim($_POST['offer_links'][$oIdx] ?? '/contact.php'),
                        'link_text' => trim($_POST['offer_link_texts'][$oIdx] ?? 'Explore Service →')
                    ];
                }
                if (!empty($oList)) {
                    $metadata['offers'] = $oList;
                }
            }

            // SEO Challenges
            if (isset($_POST['chal_title'])) {
                $cItems = [];
                if (!empty($_POST['chal_item_titles']) && is_array($_POST['chal_item_titles'])) {
                    foreach ($_POST['chal_item_titles'] as $cIdx => $cTitle) {
                        $cTitle = trim($cTitle);
                        if ($cTitle === '') continue;
                        $cItems[] = [
                            'icon'  => trim($_POST['chal_item_icons'][$cIdx] ?? '⚡'),
                            'title' => $cTitle,
                            'desc'  => trim($_POST['chal_item_descs'][$cIdx] ?? '')
                        ];
                    }
                }
                $metadata['challenges'] = [
                    'eyebrow' => trim($_POST['chal_eyebrow'] ?? 'SEO CHALLENGES'),
                    'title'   => trim($_POST['chal_title'] ?? 'What is Holding Your Site Back in Google Search?'),
                    'lead'    => trim($_POST['chal_lead'] ?? ''),
                    'items'   => !empty($cItems) ? $cItems : ($existingMeta['challenges']['items'] ?? [])
                ];
            }

            // Meet the Experts (Jitin Madaan)
            if (isset($_POST['founder_sec_title'])) {
                $fStats = [];
                if (!empty($_POST['fstat_vals']) && is_array($_POST['fstat_vals'])) {
                    foreach ($_POST['fstat_vals'] as $sIdx => $sVal) {
                        $sVal = trim($sVal);
                        if ($sVal === '') continue;
                        $fStats[] = [
                            'val'   => $sVal,
                            'label' => trim($_POST['fstat_labels'][$sIdx] ?? '')
                        ];
                    }
                }
                $fPillars = [];
                if (!empty($_POST['pillar_titles']) && is_array($_POST['pillar_titles'])) {
                    foreach ($_POST['pillar_titles'] as $pIdx => $pTitle) {
                        $pTitle = trim($pTitle);
                        if ($pTitle === '') continue;
                        $fPillars[] = [
                            'icon'  => trim($_POST['pillar_icons'][$pIdx] ?? '⚙️'),
                            'title' => $pTitle,
                            'desc'  => trim($_POST['pillar_descs'][$pIdx] ?? '')
                        ];
                    }
                }
                $metadata['founder_section'] = [
                    'eyebrow' => trim($_POST['founder_sec_eyebrow'] ?? 'MEET THE EXPERTS'),
                    'title'   => trim($_POST['founder_sec_title'] ?? 'The People Behind Your SEO Growth'),
                    'lead'    => trim($_POST['founder_sec_lead'] ?? ''),
                    'name'    => trim($_POST['founder_name'] ?? 'Jitin Madaan'),
                    'role'    => trim($_POST['founder_role'] ?? 'Performance Marketing Strategist'),
                    'stats'   => !empty($fStats) ? $fStats : ($existingMeta['founder_section']['stats'] ?? []),
                    'pillars' => !empty($fPillars) ? $fPillars : ($existingMeta['founder_section']['pillars'] ?? [])
                ];
            }

            // Wrapping Up & Micro-Markets
            if (isset($_POST['wrap_title'])) {
                $marketsArr = !empty($_POST['wrap_markets']) ? array_filter(array_map('trim', explode(',', $_POST['wrap_markets']))) : ($existingMeta['wrapping_up']['micro_markets'] ?? []);
                $metadata['wrapping_up'] = [
                    'eyebrow'       => trim($_POST['wrap_eyebrow'] ?? 'DELHI NCR LOCAL REACH'),
                    'title'         => trim($_POST['wrap_title'] ?? 'Why SEO Services in Delhi Matter for Your Business'),
                    'sub'           => trim($_POST['wrap_sub'] ?? 'Build Visibility. Earn Trust. Generate Sustainable Growth.'),
                    'p1'            => trim($_POST['wrap_p1'] ?? ''),
                    'p2'            => trim($_POST['wrap_p2'] ?? ''),
                    'micro_markets' => array_values($marketsArr),
                    'goal'          => trim($_POST['wrap_goal'] ?? 'Our goal is simple: Make your business discoverable, build trust, and convert search visibility into growth.')
                ];
            }

            // CTA Box
            if (isset($_POST['cta_headline'])) {
                $metadata['cta_box'] = [
                    'headline'  => trim($_POST['cta_headline'] ?? 'So You\'re Ready to Take the Plunge and Grow Your Business With SEO?'),
                    'sub'       => trim($_POST['cta_sub'] ?? 'Let\'s Make Your Search Visibility Business Opportunities'),
                    'text'      => trim($_POST['cta_text'] ?? ''),
                    'btn_text'  => trim($_POST['cta_btn_text'] ?? 'Book Your Free SEO Consultation'),
                    'call_text' => trim($_POST['cta_call_text'] ?? 'Call: +91-9999674255')
                ];
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
        $isDelhiSeo      = (!empty($item['slug']) && $item['slug'] === 'seo-services-delhi') || (!empty($item['id']) && (int)$item['id'] === 69);
        $offers          = $item['offers'] ?? [];
        $challenges      = $item['challenges'] ?? [];
        $whyCards        = $item['why_cards'] ?? [];
        $takeaways       = $item['takeaways'] ?? [];
        $founderSection  = $item['founder_section'] ?? [];
        $wrappingUp      = $item['wrapping_up'] ?? [];
        $ctaBox          = $item['cta_box'] ?? [];
        $strategicNarrative = $item['strategic_narrative'] ?? [];
        $rankings        = $item['rankings'] ?? [];
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

                <?php
// Template holding both the Delhi SEO 12-tab CMS and the standard CMS
?>
                <input type="hidden" name="is_delhi_seo" value="<?= $isDelhiSeo ? '1' : '0' ?>">

                <?php if ($isDelhiSeo): ?>
                    <!-- ========================================================
                         DELHI SEO 12-TAB CMS NAVIGATION
                         ======================================================== -->
                    <div class="scms-tabs">
                        <button type="button" class="scms-tab-btn active" onclick="scmsSwitchTab('tab-hero', this)">1. Hero &amp; Author</button>
                        <button type="button" class="scms-tab-btn" onclick="scmsSwitchTab('tab-brands', this)">2. Event Brands Marquee</button>
                        <button type="button" class="scms-tab-btn" onclick="scmsSwitchTab('tab-narrative', this)">3. Narrative &amp; Proof</button>
                        <button type="button" class="scms-tab-btn" onclick="scmsSwitchTab('tab-takeaways', this)">4. Key Takeaways &amp; SERP</button>
                        <button type="button" class="scms-tab-btn" onclick="scmsSwitchTab('tab-offers', this)" style="background: #FFF0F7; color: #C4007A; border-color: rgba(196, 0, 122, 0.4); font-weight: 700;"><i class="bi bi-grid-fill me-1"></i> 5. What We Offer (<?= count($offers) ?>)</button>
                        <button type="button" class="scms-tab-btn" onclick="scmsSwitchTab('tab-challenges', this)">6. SEO Challenges</button>
                        <button type="button" class="scms-tab-btn" onclick="scmsSwitchTab('tab-founder', this)">7. Meet the Experts</button>
                        <button type="button" class="scms-tab-btn" onclick="scmsSwitchTab('tab-process', this)">8. Working Process</button>
                        <button type="button" class="scms-tab-btn" onclick="scmsSwitchTab('tab-feedback', this)">9. Testimonials &amp; Rankings</button>
                        <button type="button" class="scms-tab-btn" onclick="scmsSwitchTab('tab-wrap-cta', this)">10. Micro-Markets &amp; CTA</button>
                        <button type="button" class="scms-tab-btn" onclick="scmsSwitchTab('tab-faqs', this)">11. FAQs (<?= count($faqs) ?>)</button>
                        <button type="button" class="scms-tab-btn" onclick="scmsSwitchTab('tab-seo', this)">12. SEO Metadata</button>
                    </div>

                    <!-- TAB 1: HERO & AUTHOR -->
                    <div id="tab-hero" class="scms-tab-pane">
                        <div class="alert alert-light border mb-4" style="background:#FFF5FA; border-color:rgba(196,0,122,0.2) !important;">
                            <strong style="color:#C4007A;"><i class="bi bi-megaphone me-1"></i> Hero Section &amp; Strategist Author Badge</strong>
                            <div class="small text-muted">Controls the top screen headline, value bullets, author stamp, and quote form settings.</div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 scms-form-group">
                                <label>Main Page Title *</label>
                                <input type="text" name="title" class="scms-form-control" value="<?= htmlspecialchars($item['title'] ?? 'SEO Services in Delhi') ?>" required>
                            </div>
                            <div class="col-md-6 scms-form-group">
                                <label>Headline Highlight / Accent Text</label>
                                <input type="text" name="hero_accent" class="scms-form-control" value="<?= htmlspecialchars($item['hero_accent'] ?? 'Result-Driven SEO to Grow Your Business') ?>">
                            </div>
                        </div>

                        <div class="scms-form-group">
                            <label>Hero Description</label>
                            <textarea name="hero_description" class="scms-form-control" rows="3"><?= htmlspecialchars($item['hero_description'] ?? 'Get found when your customers are searching. WebTecMart offers strategic SEO solutions in Delhi to boost Google rankings, qualified organic traffic and lead to more enquiries, leads and sales.') ?></textarea>
                        </div>

                        <div class="scms-form-group">
                            <label>Hero Checkmark Bullets (One per line)</label>
                            <?php 
                            $bLines = !empty($item['hero_bullets']) && is_array($item['hero_bullets']) ? implode("\n", $item['hero_bullets']) : "Enhance Google Rankings for relevant, high-value keywords\nBring in Targeted Organic Traffic from ready-to-buy customers\nIncrease website leads and enquiries with search optimisation\nCreate Long-Term Visibility by following a sustainable organic strategy";
                            ?>
                            <textarea name="hero_bullets_text" class="scms-form-control" rows="4"><?= htmlspecialchars($bLines) ?></textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6 scms-form-group">
                                <label>Readiness Badge Pill</label>
                                <input type="text" name="hero_readiness_badge" class="scms-form-control" value="<?= htmlspecialchars($item['hero_readiness_badge'] ?? '⚡ Ready for Google to find you?') ?>">
                            </div>
                            <div class="col-md-6 scms-form-group">
                                <label>Publish Status</label>
                                <div class="form-check form-switch mt-2">
                                    <input class="form-check-input" type="checkbox" name="is_active" id="delActiveCheck" value="1" <?= (!isset($item['is_active']) || (int) $item['is_active'] === 1) ? 'checked' : '' ?>>
                                    <label class="form-check-label text-dark fw-bold ms-2" for="delActiveCheck">Published &amp; Live on Site</label>
                                </div>
                            </div>
                        </div>

                        <hr class="my-4">
                        <h5 class="fw-bold text-dark mb-3"><i class="bi bi-person-badge text-primary me-2"></i> Strategist / Author Stamp</h5>
                        <div class="row">
                            <div class="col-md-6 scms-form-group">
                                <label>Author Name</label>
                                <input type="text" name="founder_name" class="scms-form-control" value="<?= htmlspecialchars($item['founder_name'] ?? 'Jitin Madaan') ?>">
                            </div>
                            <div class="col-md-6 scms-form-group">
                                <label>Author Role / Designation</label>
                                <input type="text" name="founder_role" class="scms-form-control" value="<?= htmlspecialchars($item['founder_role'] ?? 'Performance Marketing Strategist') ?>">
                            </div>
                        </div>

                        <div class="scms-form-group">
                            <label>Author Avatar Image</label>
                            <div class="d-flex align-items-center gap-3">
                                <?php $avVal = $item['founder_avatar'] ?? '/assets/images/jitin-madaan-avatar.png'; ?>
                                <img src="<?= htmlspecialchars($avVal) ?>" alt="Avatar" style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover; border: 2px solid #C4007A;">
                                <div class="flex-grow-1">
                                    <input type="text" name="founder_avatar" class="scms-form-control mb-1" value="<?= htmlspecialchars($avVal) ?>">
                                    <input type="file" name="founder_avatar_file" class="form-control form-control-sm" accept="image/*">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- TAB 2: BRAND LOGOS MARQUEE -->
                    <div id="tab-brands" class="scms-tab-pane d-none">
                        <div class="alert alert-light border mb-4" style="background:#FFF5FA; border-color:rgba(196,0,122,0.2) !important;">
                            <strong style="color:#C4007A;"><i class="bi bi-award me-1"></i> Top Event Brands Embracing SEO (Single-Row Marquee)</strong>
                            <div class="small text-muted">Manage the infinite auto-scrolling brand logos displayed directly below the hero section.</div>
                        </div>

                        <?php foreach ($brandLogos as $bIdx => $b): ?>
                            <div class="p-3 mb-3 rounded border bg-white shadow-sm">
                                <div class="row g-2 align-items-center">
                                    <div class="col-md-3">
                                        <label class="small text-muted mb-0">Brand Name</label>
                                        <input type="text" name="brand_names[<?= $bIdx ?>]" class="scms-form-control form-control-sm fw-bold" value="<?= htmlspecialchars($b['name']) ?>">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="small text-muted mb-0">Category / Subtitle</label>
                                        <input type="text" name="brand_cats[<?= $bIdx ?>]" class="scms-form-control form-control-sm" value="<?= htmlspecialchars($b['category'] ?? 'Enterprise Brand') ?>">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="small text-muted mb-0">Logo Image File or URL</label>
                                        <input type="text" name="brand_urls[<?= $bIdx ?>]" class="scms-form-control form-control-sm mb-1" value="<?= htmlspecialchars($b['logo'] ?? '') ?>">
                                        <input type="file" name="brand_logo_file_<?= $bIdx ?>" class="form-control form-control-sm" accept="image/*">
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <?php if (!empty($b['logo'])): ?>
                                            <img src="<?= htmlspecialchars($b['logo']) ?>" alt="Preview" style="max-height: 34px; max-width: 80px; object-fit: contain;">
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- TAB 3: NARRATIVE & SPRING SOURCING FAIR PROOF -->
                    <div id="tab-narrative" class="scms-tab-pane d-none">
                        <div class="alert alert-light border mb-4" style="background:#FFF5FA; border-color:rgba(196,0,122,0.2) !important;">
                            <strong style="color:#C4007A;"><i class="bi bi-window me-1"></i> Strategic Narrative &amp; Google Proof Showcase</strong>
                            <div class="small text-muted">Controls the 2-column narrative section and the Spring Sourcing Fair 2027 SERP browser mockup.</div>
                        </div>

                        <div class="scms-form-group">
                            <label>Section Eyebrow</label>
                            <input type="text" name="sn_eyebrow" class="scms-form-control" value="<?= htmlspecialchars($strategicNarrative['eyebrow'] ?? 'BE FOUND BY THE CORRECT PEOPLE • GENERATE BETTER LEADS • GROW ORGANICALLY') ?>">
                        </div>

                        <div class="scms-form-group">
                            <label>Section Title</label>
                            <input type="text" name="sn_title" class="scms-form-control" value="<?= htmlspecialchars($strategicNarrative['title'] ?? 'SEO Services in Delhi That Turn Search Visibility Into Business Growth!') ?>">
                        </div>

                        <div class="scms-form-group">
                            <label>Lead Paragraph</label>
                            <textarea name="sn_lead" class="scms-form-control" rows="2"><?= htmlspecialchars($strategicNarrative['lead'] ?? 'Your customers are looking for your products and services. The challenge is to make sure that they find your business, not your competitors.') ?></textarea>
                        </div>

                        <div class="scms-form-group">
                            <label>Paragraph 1</label>
                            <textarea name="sn_p1" class="scms-form-control" rows="2"><?= htmlspecialchars($strategicNarrative['p1'] ?? '') ?></textarea>
                        </div>

                        <div class="scms-form-group">
                            <label>Paragraph 2</label>
                            <textarea name="sn_p2" class="scms-form-control" rows="2"><?= htmlspecialchars($strategicNarrative['p2'] ?? '') ?></textarea>
                        </div>

                        <div class="scms-form-group">
                            <label>Callout Highlight</label>
                            <input type="text" name="sn_callout" class="scms-form-control" value="<?= htmlspecialchars($strategicNarrative['callout'] ?? '💡 Getting better rankings is just the start. It\'s really about improving the business results.') ?>">
                        </div>

                        <hr class="my-4">
                        <h5 class="fw-bold text-dark mb-3"><i class="bi bi-image text-primary me-2"></i> Spring Sourcing Fair 2027 SERP Proof Screenshot</h5>
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <label class="small text-muted">Image Path</label>
                                <input type="text" name="spring_serp_image" class="scms-form-control mb-2" value="<?= htmlspecialchars($item['spring_serp_image'] ?? '/assets/images/spring-sourcing-fair-serp-highlight.png') ?>">
                                <input type="file" name="spring_serp_image_file" class="form-control form-control-sm" accept="image/*">
                            </div>
                            <div class="col-md-4 text-center">
                                <?php $spImg = $item['spring_serp_image'] ?? '/assets/images/spring-sourcing-fair-serp-highlight.png'; ?>
                                <img src="<?= htmlspecialchars($spImg) ?>" alt="Preview" style="max-height: 90px; border-radius: 8px; border: 1.5px solid #C4007A;">
                            </div>
                        </div>

                        <hr class="my-4">
                        <h5 class="fw-bold text-dark mb-3"><i class="bi bi-check-circle text-primary me-2"></i> What Makes WebTecMart the Perfect SEO Choice (6 Cards)</h5>
                        <?php foreach ($whyCards as $wIdx => $wc): ?>
                            <div class="p-3 mb-2 rounded border bg-light">
                                <div class="row g-2 align-items-center">
                                    <div class="col-md-2">
                                        <label class="small text-muted mb-0">Icon</label>
                                        <input type="text" name="why_icons[<?= $wIdx ?>]" class="scms-form-control form-control-sm text-center" value="<?= htmlspecialchars($wc['icon'] ?? '🎯') ?>">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="small text-muted mb-0">Title</label>
                                        <input type="text" name="why_titles[<?= $wIdx ?>]" class="scms-form-control form-control-sm fw-bold" value="<?= htmlspecialchars($wc['title'] ?? '') ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="small text-muted mb-0">Description</label>
                                        <input type="text" name="why_descs[<?= $wIdx ?>]" class="scms-form-control form-control-sm" value="<?= htmlspecialchars($wc['desc'] ?? '') ?>">
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- TAB 4: KEY TAKEAWAYS & SERP -->
                    <div id="tab-takeaways" class="scms-tab-pane d-none">
                        <div class="alert alert-light border mb-4" style="background:#FFF5FA; border-color:rgba(196,0,122,0.2) !important;">
                            <strong style="color:#C4007A;"><i class="bi bi-list-check me-1"></i> Key Takeaways &amp; SEO Services at a Glance</strong>
                            <div class="small text-muted">Controls the 10-point deliverables checklist, the Google SERP preview snapshot, and the 7-stage growth loop.</div>
                        </div>

                        <div class="scms-form-group">
                            <label>Eyebrow</label>
                            <input type="text" name="takeaway_eyebrow" class="scms-form-control" value="<?= htmlspecialchars($takeaways['eyebrow'] ?? 'KEY TAKEAWAYS') ?>">
                        </div>
                        <div class="scms-form-group">
                            <label>Title</label>
                            <input type="text" name="takeaway_title" class="scms-form-control" value="<?= htmlspecialchars($takeaways['title'] ?? 'SEO Services in Delhi at a Glance') ?>">
                        </div>
                        <div class="scms-form-group">
                            <label>Intro Description</label>
                            <textarea name="takeaway_lead" class="scms-form-control" rows="2"><?= htmlspecialchars($takeaways['lead'] ?? 'A good SEO approach ought to do greater than just ranking better. It should draw the intended audience to your business, gain trust and create measurable opportunities.') ?></textarea>
                        </div>

                        <div class="scms-form-group">
                            <label>10 Key Deliverables Checklist (One per line)</label>
                            <?php 
                            $tListText = !empty($takeaways['checklist']) && is_array($takeaways['checklist']) ? implode("\n", $takeaways['checklist']) : '';
                            ?>
                            <textarea name="takeaway_checklist_text" class="scms-form-control" rows="8"><?= htmlspecialchars($tListText) ?></textarea>
                        </div>

                        <hr class="my-4">
                        <h5 class="fw-bold text-dark mb-3"><i class="bi bi-arrow-repeat text-primary me-2"></i> Our SEO Approach: 7-Stage Strategic Growth Loop</h5>
                        <div class="scms-form-group">
                            <label>Approach Title</label>
                            <input type="text" name="approach_title" class="scms-form-control" value="<?= htmlspecialchars($takeaways['approach_title'] ?? 'Our SEO Approach: 7-Stage Strategic Growth Loop') ?>">
                        </div>
                        <div class="scms-form-group">
                            <label>7 Steps (Comma-separated)</label>
                            <?php 
                            $appSteps = !empty($takeaways['approach_steps']) && is_array($takeaways['approach_steps']) ? implode(', ', $takeaways['approach_steps']) : 'Research, Strategy, Optimisation, Content, Authority, Measurement, Growth';
                            ?>
                            <input type="text" name="approach_steps" class="scms-form-control" value="<?= htmlspecialchars($appSteps) ?>">
                        </div>
                        <div class="scms-form-group">
                            <label>Approach Description</label>
                            <textarea name="approach_desc" class="scms-form-control" rows="2"><?= htmlspecialchars($takeaways['approach_desc'] ?? 'SEO is an ongoing process. Performance is analysed on a regular basis and the strategy is continually improved and fine-tuned to ensure your website continues to go in the right direction.') ?></textarea>
                        </div>

                        <hr class="my-4">
                        <h5 class="fw-bold text-dark mb-3"><i class="bi bi-image text-primary me-2"></i> Google SERP Preview Snapshot (Right Column)</h5>
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <label class="small text-muted">Image Path</label>
                                <input type="text" name="serp_image" class="scms-form-control mb-2" value="<?= htmlspecialchars($item['serp_image'] ?? '/assets/images/seo-takeaways-preview.png') ?>">
                                <input type="file" name="serp_image_file" class="form-control form-control-sm" accept="image/*">
                            </div>
                            <div class="col-md-4 text-center">
                                <?php $sImg = $item['serp_image'] ?? '/assets/images/seo-takeaways-preview.png'; ?>
                                <img src="<?= htmlspecialchars($sImg) ?>" alt="Preview" style="max-height: 90px; border-radius: 8px; border: 1.5px solid #C4007A;">
                            </div>
                        </div>
                    </div>

                    <!-- TAB 5: WHAT WE OFFER (6 CORE OFFERINGS) -->
                    <div id="tab-offers" class="scms-tab-pane d-none">
                        <div class="alert alert-light border mb-4" style="background:#FFF5FA; border-color:rgba(196,0,122,0.2) !important;">
                            <strong style="color:#C4007A;"><i class="bi bi-grid-fill me-1"></i> What We Offer (6 Core SEO Offerings)</strong>
                            <div class="small text-muted">Manage the 6 service cards displayed in the "What We Offer" section. You can customize icons, titles, descriptions, and destination links.</div>
                        </div>

                        <?php foreach ($offers as $oIdx => $off): ?>
                            <div class="p-3 mb-3 rounded border bg-white shadow-sm" style="border-left: 4px solid #C4007A !important;">
                                <div class="row g-2 align-items-center mb-2">
                                    <div class="col-md-2">
                                        <label class="small fw-bold">Icon Type</label>
                                        <select name="offer_icons[<?= $oIdx ?>]" class="scms-form-control form-control-sm">
                                            <?php foreach (['code' => 'Code / Tech', 'layout' => 'Layout / On-Page', 'search' => 'Search / Keyword', 'map-pin' => 'Map / Local', 'link' => 'Link / Authority', 'sparkles' => 'Sparkles / AI'] as $ik => $il): ?>
                                                <option value="<?= $ik ?>" <?= ($off['icon'] ?? '') === $ik ? 'selected' : '' ?>><?= $il ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-md-5">
                                        <label class="small fw-bold">Offering Title</label>
                                        <input type="text" name="offer_titles[<?= $oIdx ?>]" class="scms-form-control form-control-sm fw-bold" value="<?= htmlspecialchars($off['title'] ?? '') ?>">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="small fw-bold">Destination URL</label>
                                        <input type="text" name="offer_links[<?= $oIdx ?>]" class="scms-form-control form-control-sm" value="<?= htmlspecialchars($off['link'] ?? '/contact.php') ?>">
                                    </div>
                                    <div class="col-md-2">
                                        <label class="small fw-bold">Link Text</label>
                                        <input type="text" name="offer_link_texts[<?= $oIdx ?>]" class="scms-form-control form-control-sm" value="<?= htmlspecialchars($off['link_text'] ?? 'Explore Service →') ?>">
                                    </div>
                                </div>
                                <div>
                                    <label class="small text-muted mb-1">Description</label>
                                    <textarea name="offer_descs[<?= $oIdx ?>]" class="scms-form-control form-control-sm" rows="2"><?= htmlspecialchars($off['desc'] ?? '') ?></textarea>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- TAB 6: SEO CHALLENGES -->
                    <div id="tab-challenges" class="scms-tab-pane d-none">
                        <div class="alert alert-light border mb-4" style="background:#FFF5FA; border-color:rgba(196,0,122,0.2) !important;">
                            <strong style="color:#C4007A;"><i class="bi bi-exclamation-triangle me-1"></i> SEO Challenges (What is Holding Your Site Back)</strong>
                            <div class="small text-muted">Controls the 6-card challenges grid highlighting common competitor pitfalls in Delhi.</div>
                        </div>

                        <div class="scms-form-group">
                            <label>Eyebrow</label>
                            <input type="text" name="chal_eyebrow" class="scms-form-control" value="<?= htmlspecialchars($challenges['eyebrow'] ?? 'SEO CHALLENGES') ?>">
                        </div>
                        <div class="scms-form-group">
                            <label>Title</label>
                            <input type="text" name="chal_title" class="scms-form-control" value="<?= htmlspecialchars($challenges['title'] ?? 'What is Holding Your Site Back in Google Search?') ?>">
                        </div>
                        <div class="scms-form-group">
                            <label>Intro Description</label>
                            <textarea name="chal_lead" class="scms-form-control" rows="3"><?= htmlspecialchars($challenges['lead'] ?? '') ?></textarea>
                        </div>

                        <hr class="my-4">
                        <h5 class="fw-bold text-dark mb-3">Challenge Cards</h5>
                        <?php foreach (($challenges['items'] ?? []) as $cIdx => $ch): ?>
                            <div class="p-3 mb-2 rounded border bg-light">
                                <div class="row g-2 align-items-center mb-1">
                                    <div class="col-md-2">
                                        <label class="small text-muted mb-0">Icon</label>
                                        <input type="text" name="chal_item_icons[<?= $cIdx ?>]" class="scms-form-control form-control-sm text-center" value="<?= htmlspecialchars($ch['icon'] ?? '⚡') ?>">
                                    </div>
                                    <div class="col-md-10">
                                        <label class="small text-muted mb-0">Title</label>
                                        <input type="text" name="chal_item_titles[<?= $cIdx ?>]" class="scms-form-control form-control-sm fw-bold" value="<?= htmlspecialchars($ch['title'] ?? '') ?>">
                                    </div>
                                </div>
                                <div>
                                    <label class="small text-muted mb-0">Description</label>
                                    <textarea name="chal_item_descs[<?= $cIdx ?>]" class="scms-form-control form-control-sm" rows="2"><?= htmlspecialchars($ch['desc'] ?? '') ?></textarea>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- TAB 7: MEET THE EXPERTS -->
                    <div id="tab-founder" class="scms-tab-pane d-none">
                        <div class="alert alert-light border mb-4" style="background:#FFF5FA; border-color:rgba(196,0,122,0.2) !important;">
                            <strong style="color:#C4007A;"><i class="bi bi-people me-1"></i> Meet the Experts (Jitin Madaan Spotlight &amp; Pillars)</strong>
                            <div class="small text-muted">Controls the founder spotlight, stats counters, high-resolution photo, and 3 expert pillars.</div>
                        </div>

                        <div class="scms-form-group">
                            <label>Eyebrow</label>
                            <input type="text" name="founder_sec_eyebrow" class="scms-form-control" value="<?= htmlspecialchars($founderSection['eyebrow'] ?? 'MEET THE EXPERTS') ?>">
                        </div>
                        <div class="scms-form-group">
                            <label>Title</label>
                            <input type="text" name="founder_sec_title" class="scms-form-control" value="<?= htmlspecialchars($founderSection['title'] ?? 'The People Behind Your SEO Growth') ?>">
                        </div>
                        <div class="scms-form-group">
                            <label>Lead Description</label>
                            <textarea name="founder_sec_lead" class="scms-form-control" rows="2"><?= htmlspecialchars($founderSection['lead'] ?? '') ?></textarea>
                        </div>

                        <div class="scms-form-group">
                            <label>Strategist High-Resolution Photo</label>
                            <div class="d-flex align-items-center gap-3">
                                <?php $fImg = $item['founder_image'] ?? '/assets/images/jitin-madaan.png'; ?>
                                <img src="<?= htmlspecialchars($fImg) ?>" alt="Photo" style="width: 70px; height: 70px; border-radius: 12px; object-fit: cover; border: 2px solid #C4007A;">
                                <div class="flex-grow-1">
                                    <input type="text" name="founder_image" class="scms-form-control mb-1" value="<?= htmlspecialchars($fImg) ?>">
                                    <input type="file" name="founder_image_file" class="form-control form-control-sm" accept="image/*">
                                </div>
                            </div>
                        </div>

                        <hr class="my-4">
                        <h5 class="fw-bold text-dark mb-3">Key Stats Counters</h5>
                        <div class="row g-2">
                            <?php foreach (($founderSection['stats'] ?? []) as $sIdx => $st): ?>
                                <div class="col-md-4">
                                    <div class="p-2 border rounded bg-white">
                                        <label class="small text-muted">Metric / Number</label>
                                        <input type="text" name="fstat_vals[<?= $sIdx ?>]" class="scms-form-control form-control-sm fw-bold text-primary" value="<?= htmlspecialchars($st['val']) ?>">
                                        <label class="small text-muted mt-1">Label</label>
                                        <input type="text" name="fstat_labels[<?= $sIdx ?>]" class="scms-form-control form-control-sm" value="<?= htmlspecialchars($st['label']) ?>">
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <hr class="my-4">
                        <h5 class="fw-bold text-dark mb-3">3 Core Expert Pillars</h5>
                        <?php foreach (($founderSection['pillars'] ?? []) as $pIdx => $plr): ?>
                            <div class="p-3 mb-2 rounded border bg-light">
                                <div class="row g-2 align-items-center mb-1">
                                    <div class="col-md-2">
                                        <label class="small text-muted mb-0">Icon</label>
                                        <input type="text" name="pillar_icons[<?= $pIdx ?>]" class="scms-form-control form-control-sm text-center" value="<?= htmlspecialchars($plr['icon'] ?? '⚙️') ?>">
                                    </div>
                                    <div class="col-md-10">
                                        <label class="small text-muted mb-0">Title</label>
                                        <input type="text" name="pillar_titles[<?= $pIdx ?>]" class="scms-form-control form-control-sm fw-bold" value="<?= htmlspecialchars($plr['title'] ?? '') ?>">
                                    </div>
                                </div>
                                <div>
                                    <label class="small text-muted mb-0">Description</label>
                                    <textarea name="pillar_descs[<?= $pIdx ?>]" class="scms-form-control form-control-sm" rows="2"><?= htmlspecialchars($plr['desc'] ?? '') ?></textarea>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- TAB 8: WORKING PROCESS -->
                    <div id="tab-process" class="scms-tab-pane d-none">
                        <div class="alert alert-light border mb-4" style="background:#FFF5FA; border-color:rgba(196,0,122,0.2) !important;">
                            <strong style="color:#C4007A;"><i class="bi bi-diagram-3 me-1"></i> Working Process (6-Step Grid)</strong>
                            <div class="small text-muted">Manage the 6 chronological stages of your SEO workflow in Delhi.</div>
                        </div>

                        <?php $processList = !empty($item['process']) && is_array($item['process']) ? $item['process'] : $process; foreach ($processList as $idx => $p): ?>
                            <div class="p-3 mb-3 rounded border bg-white shadow-sm">
                                <div class="row g-2 align-items-center mb-2">
                                    <div class="col-md-2">
                                        <label class="small fw-bold">Step Number</label>
                                        <input type="text" name="process_steps[<?= $idx ?>]" class="scms-form-control form-control-sm text-center fw-bold" value="<?= htmlspecialchars($p['step']) ?>">
                                    </div>
                                    <div class="col-md-10">
                                        <label class="small fw-bold">Step Title</label>
                                        <input type="text" name="process_titles[<?= $idx ?>]" class="scms-form-control form-control-sm fw-bold" value="<?= htmlspecialchars($p['title']) ?>">
                                    </div>
                                </div>
                                <div>
                                    <label class="small text-muted mb-1">Step Description</label>
                                    <textarea name="process_descs[<?= $idx ?>]" class="scms-form-control form-control-sm" rows="2"><?= htmlspecialchars($p['description']) ?></textarea>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- TAB 9: TESTIMONIALS & RANKINGS -->
                    <div id="tab-feedback" class="scms-tab-pane d-none">
                        <div class="alert alert-light border mb-4" style="background:#FFF5FA; border-color:rgba(196,0,122,0.2) !important;">
                            <strong style="color:#C4007A;"><i class="bi bi-chat-quote me-1"></i> Client Reviews &amp; Live Search Telemetry</strong>
                            <div class="small text-muted">Manage verified client reviews and verified Google search rank telemetry table.</div>
                        </div>

                        <h5 class="fw-bold text-dark mb-3">Client Reviews Slider</h5>
                        <?php foreach ($clientFeedback as $i => $fb): ?>
                            <div class="p-3 mb-3 rounded border bg-white shadow-sm">
                                <div class="row g-2 mb-2">
                                    <div class="col-md-4">
                                        <label class="small text-muted">Author Name</label>
                                        <input type="text" name="cf_authors[<?= $i ?>]" class="scms-form-control form-control-sm fw-bold" value="<?= htmlspecialchars($fb['author']) ?>">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="small text-muted">Designation</label>
                                        <input type="text" name="cf_roles[<?= $i ?>]" class="scms-form-control form-control-sm" value="<?= htmlspecialchars($fb['role']) ?>">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="small text-muted">Company</label>
                                        <input type="text" name="cf_companies[<?= $i ?>]" class="scms-form-control form-control-sm" value="<?= htmlspecialchars($fb['company']) ?>">
                                    </div>
                                </div>
                                <div>
                                    <label class="small text-muted">Review Quote</label>
                                    <textarea name="cf_quotes[<?= $i ?>]" class="scms-form-control form-control-sm" rows="2"><?= htmlspecialchars($fb['quote']) ?></textarea>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- TAB 10: MICRO-MARKETS & CTA -->
                    <div id="tab-wrap-cta" class="scms-tab-pane d-none">
                        <div class="alert alert-light border mb-4" style="background:#FFF5FA; border-color:rgba(196,0,122,0.2) !important;">
                            <strong style="color:#C4007A;"><i class="bi bi-geo me-1"></i> Wrapping Up (Delhi Micro-Markets) &amp; Final CTA Banner</strong>
                            <div class="small text-muted">Controls the localized Delhi NCR coverage area and the closing conversion callout.</div>
                        </div>

                        <h5 class="fw-bold text-dark mb-2">Wrapping Up Narrative</h5>
                        <div class="scms-form-group">
                            <label>Eyebrow</label>
                            <input type="text" name="wrap_eyebrow" class="scms-form-control" value="<?= htmlspecialchars($wrappingUp['eyebrow'] ?? 'DELHI NCR LOCAL REACH') ?>">
                        </div>
                        <div class="scms-form-group">
                            <label>Title</label>
                            <input type="text" name="wrap_title" class="scms-form-control" value="<?= htmlspecialchars($wrappingUp['title'] ?? 'Why SEO Services in Delhi Matter for Your Business') ?>">
                        </div>
                        <div class="scms-form-group">
                            <label>Subtitle</label>
                            <input type="text" name="wrap_sub" class="scms-form-control" value="<?= htmlspecialchars($wrappingUp['sub'] ?? 'Build Visibility. Earn Trust. Generate Sustainable Growth.') ?>">
                        </div>
                        <div class="scms-form-group">
                            <label>Paragraph 1</label>
                            <textarea name="wrap_p1" class="scms-form-control" rows="2"><?= htmlspecialchars($wrappingUp['p1'] ?? '') ?></textarea>
                        </div>
                        <div class="scms-form-group">
                            <label>Paragraph 2</label>
                            <textarea name="wrap_p2" class="scms-form-control" rows="2"><?= htmlspecialchars($wrappingUp['p2'] ?? '') ?></textarea>
                        </div>
                        <div class="scms-form-group">
                            <label>Target Micro-Markets (Comma-separated)</label>
                            <?php 
                            $mks = !empty($wrappingUp['micro_markets']) && is_array($wrappingUp['micro_markets']) ? implode(', ', $wrappingUp['micro_markets']) : 'Pitampura, Rohini, Dwarka, Janakpuri, South Delhi, Connaught Place, Saket, Punjabi Bagh, Noida, Gurgaon, Faridabad, Ghaziabad';
                            ?>
                            <input type="text" name="wrap_markets" class="scms-form-control" value="<?= htmlspecialchars($mks) ?>">
                        </div>
                        <div class="scms-form-group">
                            <label>Goal Statement</label>
                            <input type="text" name="wrap_goal" class="scms-form-control" value="<?= htmlspecialchars($wrappingUp['goal'] ?? 'Our goal is simple: Make your business discoverable, build trust, and convert search visibility into growth.') ?>">
                        </div>

                        <hr class="my-4">
                        <h5 class="fw-bold text-dark mb-2">Final Conversion CTA Box</h5>
                        <div class="scms-form-group">
                            <label>Headline</label>
                            <input type="text" name="cta_headline" class="scms-form-control" value="<?= htmlspecialchars($ctaBox['headline'] ?? 'So You\'re Ready to Take the Plunge and Grow Your Business With SEO?') ?>">
                        </div>
                        <div class="scms-form-group">
                            <label>Subtitle</label>
                            <input type="text" name="cta_sub" class="scms-form-control" value="<?= htmlspecialchars($ctaBox['sub'] ?? 'Let\'s Make Your Search Visibility Business Opportunities') ?>">
                        </div>
                        <div class="scms-form-group">
                            <label>Description Body</label>
                            <textarea name="cta_text" class="scms-form-control" rows="3"><?= htmlspecialchars($ctaBox['text'] ?? '') ?></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6 scms-form-group">
                                <label>Primary Button Label</label>
                                <input type="text" name="cta_btn_text" class="scms-form-control" value="<?= htmlspecialchars($ctaBox['btn_text'] ?? 'Book Your Free SEO Consultation') ?>">
                            </div>
                            <div class="col-md-6 scms-form-group">
                                <label>Phone Call Label</label>
                                <input type="text" name="cta_call_text" class="scms-form-control" value="<?= htmlspecialchars($ctaBox['call_text'] ?? 'Call: +91-9999674255') ?>">
                            </div>
                        </div>
                    </div>

                    <!-- TAB 11: FAQS (10 ACCORDIONS) -->
                    <div id="tab-faqs" class="scms-tab-pane d-none">
                        <div class="alert alert-light border mb-4" style="background:#FFF5FA; border-color:rgba(196,0,122,0.2) !important;">
                            <strong style="color:#C4007A;"><i class="bi bi-question-circle me-1"></i> Frequently Asked Questions (10 Items)</strong>
                            <div class="small text-muted">Questions &amp; answers displayed in the accordion and synchronized with Schema.org JSON-LD structured data.</div>
                        </div>

                        <div id="scmsFaqList">
                            <?php foreach ($faqs as $fIdx => $fq): ?>
                                <div class="scms-item-card p-3 mb-3 border rounded bg-white shadow-sm" id="scmsFaqRow_<?= $fIdx ?>">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <div class="fw-bold small text-primary"><i class="bi bi-patch-question me-1"></i> FAQ Question #<?= $fIdx + 1 ?></div>
                                    </div>
                                    <div class="mb-2">
                                        <label class="small text-muted">Question</label>
                                        <input type="text" name="faq_questions[<?= $fIdx ?>]" class="scms-form-control fw-bold" value="<?= htmlspecialchars($fq['q'] ?? ($fq['question'] ?? '')) ?>" required>
                                    </div>
                                    <div>
                                        <label class="small text-muted">Answer</label>
                                        <textarea name="faq_answers[<?= $fIdx ?>]" class="scms-form-control" rows="3" required><?= htmlspecialchars($fq['a'] ?? ($fq['answer'] ?? '')) ?></textarea>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- TAB 12: SEO METADATA -->
                    <div id="tab-seo" class="scms-tab-pane d-none">
                        <div class="alert alert-light border mb-4" style="background:#FFF5FA; border-color:rgba(196,0,122,0.2) !important;">
                            <strong style="color:#C4007A;"><i class="bi bi-search me-1"></i> SEO Metadata &amp; OpenGraph Settings</strong>
                            <div class="small text-muted">Fine-tune the search engine snippet and social preview tags.</div>
                        </div>

                        <div class="scms-form-group">
                            <label>Page Meta Title</label>
                            <input type="text" name="page_meta_title" class="scms-form-control" value="<?= htmlspecialchars($item['page_meta_title'] ?? 'SEO Services in Delhi – Result-Driven SEO to Grow Your Business | WebTecMart') ?>">
                        </div>
                        <div class="scms-form-group">
                            <label>Page Meta Description</label>
                            <textarea name="page_meta_desc" class="scms-form-control" rows="3"><?= htmlspecialchars($item['page_meta_desc'] ?? 'Build search visibility that drives real business growth. WebTecMart is the top-rated SEO agency in Delhi NCR providing AI-ready SEO, Google #1 rankings, and qualified organic leads.') ?></textarea>
                        </div>
                    </div>

                <?php else: ?>
                    <!-- ========================================================
                         STANDARD CMS NAVIGATION (For other services)
                         ======================================================== -->
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
                            <textarea name="summary" class="scms-form-control" rows="2" placeholder="Brief 1-2 sentence description shown in service grids across the website..."><?= htmlspecialchars($item['summary'] ?? '') ?></textarea>
                        </div>
                    </div>

                    <!-- TAB 2: OVERVIEW & BENEFITS -->
                    <div id="tab-overview" class="scms-tab-pane d-none">
                        <div class="scms-form-group">
                            <label>Detailed Overview &amp; Description</label>
                            <textarea name="body" class="scms-form-control" rows="6" placeholder="Comprehensive explanation of what this service delivers, methodologies used, and expected outcomes..."><?= htmlspecialchars($item['body'] ?? '') ?></textarea>
                        </div>
                    </div>

                    <!-- TAB 3: FEATURES -->
                    <div id="tab-features" class="scms-tab-pane d-none">
                        <div id="scmsFeatureList">
                            <?php foreach ($features as $idx => $f): ?>
                                <div class="scms-item-card" id="scmsFeatureRow_<?= $idx ?>">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <div class="fw-bold small text-primary"><i class="bi bi-check-circle me-1"></i> Feature #<?= $idx + 1 ?></div>
                                    </div>
                                    <div class="mb-2">
                                        <input type="text" name="feature_titles[<?= $idx ?>]" class="scms-form-control fw-bold" value="<?= htmlspecialchars($f['title']) ?>" placeholder="Feature Title">
                                    </div>
                                    <div>
                                        <textarea name="feature_descs[<?= $idx ?>]" class="scms-form-control" rows="2" placeholder="Description"><?= htmlspecialchars($f['description']) ?></textarea>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- TAB 4: PROCESS -->
                    <div id="tab-process" class="scms-tab-pane d-none">
                        <div id="scmsProcessList">
                            <?php foreach ($process as $idx => $p): ?>
                                <div class="scms-item-card" id="scmsProcessRow_<?= $idx ?>">
                                    <div class="row g-2 mb-2">
                                        <div class="col-md-2">
                                            <input type="text" name="process_steps[<?= $idx ?>]" class="scms-form-control text-center fw-bold" value="<?= htmlspecialchars($p['step']) ?>" placeholder="01">
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" name="process_titles[<?= $idx ?>]" class="scms-form-control fw-bold" value="<?= htmlspecialchars($p['title']) ?>" placeholder="Step Title">
                                        </div>
                                    </div>
                                    <div>
                                        <textarea name="process_descs[<?= $idx ?>]" class="scms-form-control" rows="2" placeholder="Description"><?= htmlspecialchars($p['description']) ?></textarea>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- TAB 5: FAQS -->
                    <div id="tab-faqs" class="scms-tab-pane d-none">
                        <div id="scmsFaqList">
                            <?php foreach ($faqs as $idx => $fq): ?>
                                <div class="scms-item-card" id="scmsFaqRow_<?= $idx ?>">
                                    <div class="mb-2">
                                        <input type="text" name="faq_questions[<?= $idx ?>]" class="scms-form-control fw-bold" value="<?= htmlspecialchars($fq['q'] ?? ($fq['question'] ?? '')) ?>" placeholder="Question">
                                    </div>
                                    <div>
                                        <textarea name="faq_answers[<?= $idx ?>]" class="scms-form-control" rows="2" placeholder="Answer"><?= htmlspecialchars($fq['a'] ?? ($fq['answer'] ?? '')) ?></textarea>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- TAB 6: ADVANCE UI -->
                    <div id="tab-advance-ui" class="scms-tab-pane d-none">
                        <div class="alert alert-light border mb-4">
                            <strong>Advance UI &amp; Growth Sections</strong>
                        </div>
                    </div>

                    <!-- TAB 7: SEO -->
                    <div id="tab-seo" class="scms-tab-pane d-none">
                        <div class="scms-form-group">
                            <label>Page Meta Title</label>
                            <input type="text" name="page_meta_title" class="scms-form-control" value="<?= htmlspecialchars($item['page_meta_title'] ?? '') ?>">
                        </div>
                        <div class="scms-form-group">
                            <label>Page Meta Description</label>
                            <textarea name="page_meta_desc" class="scms-form-control" rows="3"><?= htmlspecialchars($item['page_meta_desc'] ?? '') ?></textarea>
                        </div>
                    </div>
                <?php endif; ?>
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
