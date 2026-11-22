<?php
require_once __DIR__ . '/functions.php';

$formStatus = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $field = static function (string $name): string {
        return is_string($_POST[$name] ?? null) ? trim($_POST[$name]) : '';
    };
    $lead = [
        'name' => $field('name'),
        'email' => $field('email'),
        'phone' => $field('phone'),
        'company' => $field('company'),
        'service' => $field('service'),
        'budget' => $field('budget'),
        'message' => $field('message'),
    ];

    $isAjax = (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest')
        || (strpos($_SERVER['HTTP_ACCEPT'] ?? '', 'application/json') !== false)
        || isset($_POST['ajax']);

    if ($lead['name'] === '' || $lead['phone'] === '' || !filter_var($lead['email'], FILTER_VALIDATE_EMAIL)) {
        if ($isAjax) {
            header('Content-Type: application/json; charset=UTF-8');
            echo json_encode([
                'success' => false,
                'status' => 'invalid',
                'message' => 'Please enter your name, phone number, and a valid email address.',
            ]);
            exit;
        }
        $_SESSION['contact_form_status'] = 'invalid';
    } else {
        try {
            $leadId = createLead($lead);
            $emailSent = sendLeadNotification($lead, $leadId);
            if ($isAjax) {
                header('Content-Type: application/json; charset=UTF-8');
                echo json_encode([
                    'success' => true,
                    'status' => 'success',
                    'lead_id' => $leadId,
                    'message' => 'Thank you! Your enquiry has been received successfully. Our team will contact you within 24 hours.',
                ]);
                exit;
            }
            $_SESSION['contact_form_status'] = $emailSent ? 'success' : 'email_failed';
        } catch (Throwable $error) {
            error_log('Lead could not be saved: ' . $error->getMessage());
            if ($isAjax) {
                header('Content-Type: application/json; charset=UTF-8');
                echo json_encode([
                    'success' => false,
                    'status' => 'error',
                    'message' => 'We could not save your enquiry. Please call us directly at +91-9999674255.',
                ]);
                exit;
            }
            $_SESSION['contact_form_status'] = 'error';
        }
    }

    $redirectTo = is_string($_POST['redirect_to'] ?? null) ? $_POST['redirect_to'] : '/contact.php';
    if (strpos($redirectTo, '/') !== 0) {
        $redirectTo = '/contact.php';
    }
    if (strpos($redirectTo, '#') === false) {
        $redirectTo .= '#contact';
    }
    redirect($redirectTo);
}

$formStatus = $_SESSION['contact_form_status'] ?? '';
unset($_SESSION['contact_form_status']);
$pageMeta = [
    'title' => 'Contact Us | WebTecMart Digital Growth Agency',
    'description' => 'Get in touch with WebTecMart for SEO, web design, PPC advertising, branding, and digital growth services. Request a free consultation.',
];
require_once __DIR__ . '/app/templates/header.php';
?>

<?php
// ===== Icon Helper =====
function cpIcon(string $name): string {
    $icons = [
        'sparkles'   => '<path d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z"/><path d="M20 3v4"/><path d="M22 5h-4"/><path d="M4 17v2"/><path d="M5 18H3"/>',
        'mail'       => '<rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>',
        'phone'      => '<path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>',
        'headphones' => '<path d="M3 14h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H4a1 1 0 0 1-1-1v-7a9 9 0 0 1 18 0v7a1 1 0 0 1-1 1h-2a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3"/>',
        'globe'      => '<circle cx="12" cy="12" r="10"/><path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"/><path d="M2 12h20"/>',
        'mappin'     => '<path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/>',
        'clock'      => '<circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>',
        'check'      => '<circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/>',
        'user'       => '<path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/>',
        'message'    => '<path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z"/>',
        'send'       => '<path d="m22 2-7 20-4-9-9-4Z"/><path d="M22 2 11 13"/>',
    ];
    $path = $icons[$name] ?? '';
    return '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">' . $path . '</svg>';
}

// ===== Contact Info =====
$contactInfo = [
    ['icon' => 'mail',       'label' => 'Email',              'value' => 'info@webtecmart.com',    'href' => 'mailto:info@webtecmart.com',         'external' => false],
    ['icon' => 'phone',      'label' => 'Phone / WhatsApp',   'value' => '+91-9999674255',         'href' => 'tel:+919999674255',                  'external' => false],
    ['icon' => 'headphones', 'label' => 'Technical Support',  'value' => '+91-9511012625',         'href' => 'tel:+919511012625',                  'external' => false],
    ['icon' => 'globe',      'label' => 'Website',            'value' => 'www.webtecmart.com',     'href' => 'https://www.webtecmart.com',         'external' => true],
    ['icon' => 'mappin',     'label' => 'Address',            'value' => 'India',                  'href' => '#',                                  'external' => false],
];
?>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,600;12..96,800&display=swap" rel="stylesheet">

<style>
    /* ============================================================
       CONTACT PAGE — "Expo Floor" design
       ============================================================ */
    .cp-main {
        --ink:#1A0613; --ink2:#2B0B20; --pink:#C4007A; --blush:#FBEAF3; --gold:#FFB547; --mint:#0E9F6E; --text:#2A2430; --mute:#6C6474; --line:rgba(26,6,19,.14);
        --disp:'Bricolage Grotesque','Plus Jakarta Sans',system-ui,sans-serif;
        font-family:'Plus Jakarta Sans',system-ui,-apple-system,sans-serif; color:var(--text); overflow-x:clip; min-height:100vh;
        background:#F7F4F8 radial-gradient(rgba(26,6,19,.06) 1px,transparent 1.2px) 0 0/24px 24px;
    }
    .cp-main *, .cp-main *::before, .cp-main *::after { box-sizing:border-box; }
    .cp-main a:focus-visible,.cp-main button:focus-visible,.cp-main input:focus-visible,.cp-main textarea:focus-visible { outline:3px solid var(--gold); outline-offset:2px; }
    .cp-container { position:relative; z-index:1; max-width:1200px; width:100%; margin:0 auto; padding:0 22px; }
    @media (min-width:1440px){ .cp-container { max-width:1320px; } }

    /* ===== Hero (the hall) ===== */
    .cp-hero { position:relative; overflow:hidden; text-align:center; color:#fff; padding:76px 0 120px;
        background:radial-gradient(60% 70% at 85% 10%,rgba(196,0,122,.55),transparent 65%),radial-gradient(40% 50% at 0% 100%,rgba(255,181,71,.16),transparent 70%),var(--ink); }
    .cp-hero::before { content:''; position:absolute; inset:0; background-image:radial-gradient(rgba(255,255,255,.14) 1px,transparent 1.2px); background-size:26px 26px; -webkit-mask-image:linear-gradient(180deg,#000 30%,transparent 95%); mask-image:linear-gradient(180deg,#000 30%,transparent 95%); pointer-events:none; }
    .cp-header { display:flex; flex-direction:column; align-items:center; text-align:center; }
    .cp-pill { display:inline-flex; align-items:center; gap:8px; margin-bottom:22px; padding:7px 14px 7px 10px; border-radius:999px; background:rgba(255,255,255,.09); border:1px solid rgba(255,255,255,.22); }
    .cp-pill svg { width:14px; height:14px; color:var(--gold); flex-shrink:0; }
    .cp-pill span { font-size:.8rem; font-weight:600; color:#FFE3F1; }
    .cp-h1 { margin:0 0 16px; max-width:860px; font-family:var(--disp); font-weight:800; font-size:clamp(2.4rem,5.4vw,4.4rem); line-height:1.04; letter-spacing:-.02em; color:#fff; }
    .cp-h1 .accent { background:linear-gradient(90deg,var(--gold),#FF7BC0,var(--gold)); background-size:200% 100%; -webkit-background-clip:text; background-clip:text; color:transparent; animation:cpShine 4s linear infinite; }
    .cp-h1 .accent svg { display:none; }
    @keyframes cpShine { to { background-position:200% 0; } }
    .cp-subtitle { max-width:640px; margin:0 auto; color:rgba(255,255,255,.78); font-size:1.05rem; line-height:1.7; }

    /* ===== Body ===== */
    .cp-body { position:relative; z-index:2; margin-top:-70px; padding-bottom:80px; }

    /* Grid */
    .cp-grid { display:grid; grid-template-columns:minmax(0,1fr); gap:28px; align-items:stretch; }
    .cp-grid > * { min-width:0; display:flex; }
    @media (min-width:1024px){ .cp-grid { grid-template-columns:2fr 3fr; gap:40px; } }

    /* Left info card (dark hall) */
    .cp-info-card { position:relative; width:100%; display:flex; flex-direction:column; padding:34px 28px; overflow:hidden; color:#fff; border:2px solid var(--ink); border-radius:22px; box-shadow:8px 8px 0 var(--gold);
        background:radial-gradient(70% 60% at 100% 0%,rgba(196,0,122,.5),transparent 65%),radial-gradient(50% 50% at 0% 100%,rgba(255,181,71,.14),transparent 70%),var(--ink); }
    .cp-info-card::before { content:''; position:absolute; inset:0; background-image:radial-gradient(rgba(255,255,255,.12) 1px,transparent 1.2px); background-size:26px 26px; -webkit-mask-image:linear-gradient(180deg,#000 20%,transparent 95%); mask-image:linear-gradient(180deg,#000 20%,transparent 95%); pointer-events:none; }
    .cp-info-deco { display:none; }
    .cp-info-content { position:relative; z-index:1; display:flex; flex-direction:column; flex:1; }
    .cp-info-top { margin-bottom:18px; }
    .cp-connect { display:inline-flex; align-items:center; gap:8px; margin:0 0 16px; padding:6px 14px 6px 10px; border-radius:999px; background:rgba(255,255,255,.09); border:1px solid rgba(255,255,255,.2); font-size:.78rem; font-weight:600; color:#FFE3F1; }
    .cp-connect .dot { width:8px; height:8px; border-radius:50%; background:var(--gold); box-shadow:0 0 0 4px rgba(255,181,71,.25); }
    .cp-info-title { margin:0 0 8px; font-family:var(--disp); font-size:clamp(1.5rem,2.6vw,2rem); font-weight:800; line-height:1.12; letter-spacing:-.02em; color:#fff; }
    .cp-info-title .accent { color:var(--gold); }
    .cp-info-desc { margin:0; font-size:.94rem; line-height:1.65; color:rgba(255,255,255,.75); }
    .cp-contact-for { margin-bottom:16px; padding:12px 14px; border-radius:14px; background:rgba(255,255,255,.07); border:1px dashed rgba(255,181,71,.55); }
    .cp-contact-for .label { margin:0 0 3px; font-size:.72rem; font-weight:800; color:var(--gold); }
    .cp-contact-for .value { margin:0; font-size:.9rem; font-weight:600; color:#fff; }
    .cp-contact-lines { display:grid; gap:10px; flex:1; align-content:start; }
    .cp-contact-item { display:flex; align-items:center; gap:12px; padding:11px 12px; border-radius:14px; background:rgba(255,255,255,.06); border:1px solid rgba(255,255,255,.14); color:#fff; text-decoration:none; transition:translate .2s, background .2s, border-color .2s; }
    .cp-contact-item:hover { translate:4px 0; background:rgba(255,255,255,.12); border-color:var(--gold); color:#fff; }
    .cp-contact-icon { display:grid; place-items:center; flex-shrink:0; width:40px; height:40px; border:2px solid var(--ink); border-radius:11px; background:var(--gold); color:var(--ink); box-shadow:3px 3px 0 var(--ink); }
    .cp-contact-icon svg { width:18px; height:18px; }
    .cp-contact-text { min-width:0; flex:1; }
    .cp-contact-text .label { margin:0; font-size:.72rem; font-weight:600; color:rgba(255,255,255,.6); }
    .cp-contact-text .value { margin:0; font-size:.92rem; font-weight:700; color:#fff; overflow:hidden; text-overflow:ellipsis; white-space:nowrap; }
    .cp-hours { display:flex; align-items:center; gap:12px; margin-top:20px; padding-top:18px; border-top:2px dashed rgba(255,255,255,.22); }
    .cp-hours svg { width:22px; height:22px; flex-shrink:0; color:var(--gold); }
    .cp-hours .label { margin:0; font-size:.72rem; font-weight:600; color:rgba(255,255,255,.6); }
    .cp-hours .value { margin:0; font-size:.92rem; font-weight:700; color:#fff; }

    /* Right form card (visitor badge) */
    .cp-form-card { position:relative; width:100%; display:flex; flex-direction:column; padding:38px 30px 28px; background:#fff; border:2px solid var(--ink); border-radius:22px; box-shadow:8px 8px 0 var(--ink); }
    .cp-form-card::before { content:''; position:absolute; top:12px; left:50%; width:52px; height:9px; margin-left:-26px; border-radius:99px; background:var(--ink); }

    .cp-success { flex-direction:column; align-items:center; justify-content:center; flex:1; text-align:center; padding:36px 0; }
    .cp-success-icon { display:grid; place-items:center; width:64px; height:64px; margin-bottom:16px; border:2px solid var(--ink); border-radius:16px; background:#E6F8F0; color:var(--mint); box-shadow:4px 4px 0 var(--gold); }
    .cp-success-icon svg { width:30px; height:30px; }
    .cp-success h3 { margin:0 0 8px; font-family:var(--disp); font-size:1.5rem; font-weight:800; color:var(--ink); }
    .cp-success p { margin:0; max-width:380px; font-size:.94rem; line-height:1.6; color:var(--mute); }
    .cp-success-again { margin-top:20px; padding:12px 22px; border:2px solid var(--pink); border-radius:12px; background:#fff; color:var(--pink); font:700 .9rem inherit; font-family:inherit; cursor:pointer; transition:background .2s; }
    .cp-success-again:hover { background:var(--blush); }

    .cp-form { display:flex; flex-direction:column; flex:1; }
    .cp-required-note { margin:0 0 16px; font-size:.8rem; font-weight:600; color:var(--mute); }
    .cp-required-note span { color:var(--pink); }
    .cp-form-error { margin:0 0 14px; padding:11px 14px; border:2px solid #9e0034; border-radius:12px; background:#ffe6ea; color:#9e0034; font-size:.88rem; font-weight:700; line-height:1.5; }

    .cp-form-row { display:grid; gap:14px; grid-template-columns:minmax(0,1fr); margin-bottom:14px; }
    .cp-form-row > * { min-width:0; }
    @media (min-width:560px){ .cp-form-row { grid-template-columns:repeat(2,minmax(0,1fr)); } }
    .cp-field-label { display:block; margin-bottom:6px; font-size:.82rem; font-weight:700; color:var(--ink); }
    .cp-field-label span { color:var(--pink); }
    .cp-input-wrap { position:relative; }
    .cp-input-wrap svg { position:absolute; left:13px; top:50%; translate:0 -50%; width:16px; height:16px; color:var(--pink); pointer-events:none; }
    .cp-input-wrap.textarea-wrap svg { top:15px; translate:none; }
    .cp-input,.cp-textarea { width:100%; min-width:0; padding:13px 14px 13px 38px; border-radius:10px; border:2px solid #E4DCE6; background:#FCFAFD; font:inherit; font-size:.92rem; color:var(--ink); transition:border-color .2s, box-shadow .2s; outline:none; }
    .cp-input::placeholder,.cp-textarea::placeholder { color:#9A91A1; }
    .cp-input:focus,.cp-textarea:focus { border-color:var(--pink); background:#fff; box-shadow:0 0 0 4px rgba(196,0,122,.14); }
    .cp-textarea { resize:vertical; min-height:120px; height:100%; }
    .cp-message-field { display:flex; flex-direction:column; flex:1; margin-bottom:14px; }
    .cp-message-field .cp-input-wrap { flex:1; display:flex; }
    .cp-consent { display:flex; align-items:flex-start; gap:9px; margin-bottom:16px; font-size:.84rem; color:#4D4452; cursor:pointer; }
    .cp-consent input[type="checkbox"] { margin-top:3px; width:15px; height:15px; accent-color:var(--pink); flex-shrink:0; cursor:pointer; }

    .cp-submit { display:flex; align-items:center; justify-content:center; gap:10px; width:100%; padding:15px 24px; border:2px solid transparent; border-radius:12px; background:var(--pink); color:#fff; font:700 .98rem/1.2 inherit; font-family:inherit; cursor:pointer; box-shadow:0 6px 0 #7E004E; transition:translate .2s, box-shadow .2s; }
    .cp-submit:hover:not(:disabled) { translate:0 2px; box-shadow:0 4px 0 #7E004E; }
    .cp-submit:active:not(:disabled) { translate:0 6px; box-shadow:0 0 0 #7E004E; }
    .cp-submit:disabled { opacity:.7; cursor:wait; }
    .cp-submit svg { width:17px; height:17px; flex-shrink:0; }
    .cp-submit .spinner { width:14px; height:14px; border:2px solid #fff; border-top-color:transparent; border-radius:9999px; animation:cp-spin .8s linear infinite; }
    @keyframes cp-spin { to { transform:rotate(360deg); } }
    @keyframes spin { to { transform:rotate(360deg); } }

    .cp-trust { display:flex; flex-wrap:wrap; align-items:center; justify-content:center; gap:8px 14px; margin:18px -30px -28px; padding:12px 14px; background:var(--blush); border-top:2px dashed rgba(196,0,122,.35); border-radius:0 0 20px 20px; font-size:.78rem; font-weight:600; color:#3A2733; }
    .cp-trust-item { display:inline-flex; align-items:center; gap:5px; }
    .cp-trust-item svg { width:14px; height:14px; color:var(--mint); }
    .cp-trust-divider { display:none; }

    /* Map */
    .cp-map-wrap { margin-top:48px; }
    .cp-map-card { padding:24px; background:#fff; border:2px solid var(--ink); border-radius:22px; box-shadow:8px 8px 0 var(--ink); overflow:hidden; }
    .cp-map-title { margin:0 0 16px; font-family:var(--disp); font-size:1.6rem; font-weight:800; letter-spacing:-.02em; color:var(--ink); }
    .cp-map-title .accent { color:var(--pink); }
    .cp-map-iframe { display:block; width:100%; height:340px; border:2px solid var(--ink); border-radius:14px; background:#F3F4F6; }

    @media (max-width:767px){ .cp-map-iframe { height:260px; } }
    @media (max-width:575px){
        .cp-container { padding:0 16px; } .cp-hero { padding:48px 0 100px; } .cp-body { margin-top:-60px; padding-bottom:60px; }
        .cp-h1 { font-size:clamp(2rem,9.5vw,2.6rem); }
        .cp-info-card { padding:28px 20px; box-shadow:5px 5px 0 var(--gold); }
        .cp-form-card { padding:36px 18px 24px; box-shadow:5px 5px 0 var(--ink); }
        .cp-trust { margin:18px -18px -24px; }
        .cp-input,.cp-textarea { font-size:16px; }
        .cp-map-card { padding:18px 16px; box-shadow:5px 5px 0 var(--ink); } .cp-map-title { font-size:1.35rem; }
    }
    @media (hover:none){ .cp-contact-item:hover { translate:none; } }
    @media (prefers-reduced-motion:reduce){ .cp-h1 .accent { animation:none; } .cp-contact-item,.cp-submit { transition:none; } }
</style>

<main class="cp-main">

    <!-- ===== Page Header (hero) ===== -->
    <section class="cp-hero">
        <div class="cp-container">
            <div class="cp-header">
                <div class="cp-pill">
                    <?= cpIcon('sparkles') ?>
                    <span>Get In Touch</span>
                </div>

                <h1 class="cp-h1">
                    Let's
                    <span class="accent">
                        Work Together
                        <svg viewBox="0 0 300 6" preserveAspectRatio="none">
                            <path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2" stroke-linecap="round" fill="none" opacity="0.3"/>
                        </svg>
                    </span>
                </h1>

                <p class="cp-subtitle">
                    Creating digital experiences that help you grow is what we do best.
                    Tell us about your needs, we would love to help.
                </p>
            </div>
        </div>
    </section>

    <div class="cp-body" id="contact">
        <div class="cp-container">

            <!-- ===== Contact Grid ===== -->
            <div class="cp-grid">

                <!-- LEFT — Info Card -->
                <div class="cp-info-wrap">
                    <div class="cp-info-card">

                        <!-- Decorative (hidden in this design) -->
                        <div class="cp-info-deco">
                            <svg viewBox="0 0 100 100">
                                <rect x="15" y="15" width="70" height="70" transform="rotate(45 50 50)"/>
                            </svg>
                        </div>

                        <div class="cp-info-content">

                            <!-- Header -->
                            <div class="cp-info-top">
                                <p class="cp-connect">
                                    <span class="dot"></span>
                                    Let's Connect
                                </p>
                                <h3 class="cp-info-title">
                                    Let's work <span class="accent">together</span>
                                </h3>
                                <p class="cp-info-desc">
                                    We'd love to hear about your project and how we can help.
                                </p>
                            </div>

                            <!-- Contact For -->
                            <div class="cp-contact-for">
                                <p class="label">Contact For</p>
                                <p class="value">Digital, Ecommerce, Creative, PR &amp; Websites</p>
                            </div>

                            <!-- Contact Lines -->
                            <div class="cp-contact-lines">
                                <?php foreach ($contactInfo as $item): ?>
                                    <a
                                        href="<?= htmlspecialchars($item['href']) ?>"
                                        class="cp-contact-item"
                                        <?= $item['external'] ? 'target="_blank" rel="noopener noreferrer"' : '' ?>
                                    >
                                        <span class="cp-contact-icon">
                                            <?= cpIcon($item['icon']) ?>
                                        </span>
                                        <div class="cp-contact-text">
                                            <p class="label"><?= htmlspecialchars($item['label']) ?></p>
                                            <p class="value"><?= htmlspecialchars($item['value']) ?></p>
                                        </div>
                                    </a>
                                <?php endforeach; ?>
                            </div>

                            <!-- Working Hours -->
                            <div class="cp-hours">
                                <?= cpIcon('clock') ?>
                                <div>
                                    <p class="label">Working Hours</p>
                                    <p class="value">Mon - Sat: 9:00 AM - 7:00 PM</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- RIGHT — Form Card -->
                <div class="cp-form-wrap">
                    <div class="cp-form-card">

                        <!-- Success State -->
                        <div class="cp-success" id="cpSuccess" style="display: <?= in_array($formStatus, ['success', 'email_failed'], true) ? 'flex' : 'none' ?>;">
                            <div class="cp-success-icon">
                                <?= cpIcon('check') ?>
                            </div>
                            <h3><?= $formStatus === 'success' ? 'Enquiry Received' : 'Enquiry Saved' ?></h3>
                            <p>
                                <?php if ($formStatus === 'success'): ?>
                                    Your enquiry was saved successfully. We'll get back to you within 24 hours.
                                <?php elseif ($formStatus === 'email_failed'): ?>
                                    Your enquiry was saved, but our email notification could not be sent. Please contact us by phone.
                                <?php endif; ?>
                            </p>
                            <button type="button" class="cp-success-again" onclick="cpResetForm()">
                                Send another message
                            </button>
                        </div>

                        <!-- Form -->
                        <form class="cp-form" id="cpForm" method="POST" action="/contact.php" style="display: <?= in_array($formStatus, ['success', 'email_failed'], true) ? 'none' : 'flex' ?>;">

                            <?php if (in_array($formStatus, ['invalid', 'error'], true)): ?>
                                <p class="cp-form-error" role="alert">
                                    <?= $formStatus === 'invalid'
                                        ? 'Please enter your name, phone number, and a valid email address.'
                                        : 'We could not save your enquiry. Please try again or contact us by phone.' ?>
                                </p>
                            <?php endif; ?>

                            <p class="cp-required-note">
                                <span>*</span> required fields
                            </p>

                            <!-- Row 1: Name + Email -->
                            <div class="cp-form-row">
                                <div>
                                    <label class="cp-field-label">
                                        Full Name <span>*</span>
                                    </label>
                                    <div class="cp-input-wrap">
                                        <?= cpIcon('user') ?>
                                        <input type="text" name="name" class="cp-input" placeholder="Your full name" required>
                                    </div>
                                </div>
                                <div>
                                    <label class="cp-field-label">
                                        Email Address <span>*</span>
                                    </label>
                                    <div class="cp-input-wrap">
                                        <?= cpIcon('mail') ?>
                                        <input type="email" name="email" class="cp-input" placeholder="you@example.com" required>
                                    </div>
                                </div>
                            </div>

                            <!-- Row 2: Phone + Company -->
                            <div class="cp-form-row">
                                <div>
                                    <label class="cp-field-label">
                                        Phone Number <span>*</span>
                                    </label>
                                    <div class="cp-input-wrap">
                                        <?= cpIcon('phone') ?>
                                        <input type="tel" name="phone" class="cp-input" placeholder="+91 XXXXX XXXXX" required>
                                    </div>
                                </div>
                                <div>
                                    <label class="cp-field-label">
                                        Company Name
                                    </label>
                                    <div class="cp-input-wrap">
                                        <?= cpIcon('globe') ?>
                                        <input type="text" name="company" class="cp-input" placeholder="Your company name">
                                    </div>
                                </div>
                            </div>

                            <!-- Message -->
                            <div class="cp-message-field">
                                <label class="cp-field-label">
                                    Your Message <span>*</span>
                                </label>
                                <div class="cp-input-wrap textarea-wrap">
                                    <?= cpIcon('message') ?>
                                    <textarea name="message" class="cp-textarea" placeholder="Tell us about your needs..." required></textarea>
                                </div>
                            </div>

                            <!-- Consent -->
                            <label class="cp-consent">
                                <input type="checkbox" name="consent" required>
                                <span>Yes, I'm happy for you to use my information.</span>
                            </label>

                            <!-- Submit -->
                            <button type="submit" class="cp-submit" id="cpSubmit">
                                <span class="cp-submit-text">Send Message</span>
                                <?= cpIcon('send') ?>
                            </button>

                            <!-- Trust Badges -->
                            <div class="cp-trust">
                                <span class="cp-trust-item"><?= cpIcon('check') ?>Secure Form</span>
                                <span class="cp-trust-divider"></span>
                                <span class="cp-trust-item"><?= cpIcon('check') ?>24/7 Support</span>
                                <span class="cp-trust-divider"></span>
                                <span class="cp-trust-item"><?= cpIcon('check') ?>Fast Response</span>
                            </div>

                        </form>
                    </div>
                </div>

            </div>

            <!-- ===== Map Section ===== -->
            <div class="cp-map-wrap">
                <div class="cp-map-card">
                    <h3 class="cp-map-title">
                        Find Us <span class="accent">Here</span>
                    </h3>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.8354345094197!2d144.9537353153167!3d-37.81627997975159!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d5df1f5a3f7%3A0x5045675218ce6e0!2sMelbourne%20VIC%2C%20Australia!5e0!3m2!1sen!2sin!4v1700000000000!5m2!1sen!2sin"
                        class="cp-map-iframe"
                        allowfullscreen
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        title="WebTecMart Location"
                    ></iframe>
                </div>
            </div>

        </div>
    </div>
</main>

<script>
    (function () {
        const form = document.getElementById('cpForm');
        const submitBtn = document.getElementById('cpSubmit');
        const successBox = document.getElementById('cpSuccess');
        if (!form) return;

        form.addEventListener('submit', function (e) {
            e.preventDefault();
            if (!form.checkValidity()) {
                form.reportValidity();
                return;
            }

            submitBtn.disabled = true;
            const originalHTML = submitBtn.innerHTML;
            submitBtn.innerHTML = '<span class="spinner" style="display:inline-block;width:16px;height:16px;border:2px solid #fff;border-right-color:transparent;border-radius:50%;animation:spin .6s linear infinite;margin-right:8px;vertical-align:middle;"></span> Sending...';

            const formData = new FormData(form);
            formData.append('ajax', '1');

            // Remove existing alert
            const oldAlert = form.querySelector('.cp-ajax-alert');
            if (oldAlert) oldAlert.remove();

            fetch('/contact.php', {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                },
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalHTML;
                if (data.success) {
                    form.reset();
                    form.style.display = 'none';
                    if (successBox) {
                        successBox.style.display = 'flex';
                        const p = successBox.querySelector('p');
                        if (p) p.textContent = data.message;
                        successBox.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }
                } else {
                    const alertDiv = document.createElement('div');
                    alertDiv.className = 'cp-ajax-alert cp-form-error alert alert-danger';
                    alertDiv.textContent = data.message || 'Please verify your information.';
                    form.insertBefore(alertDiv, form.firstChild);
                    alertDiv.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
            })
            .catch(() => {
                // If network/json fails, submit natively
                form.submit();
            });
        });
    })();

    function cpResetForm() {
        const form = document.getElementById('cpForm');
        const successBox = document.getElementById('cpSuccess');
        if (form) {
            form.reset();
            form.style.display = 'flex';
        }
        if (successBox) {
            successBox.style.display = 'none';
        }
    }
</script>

<?php require_once __DIR__ . '/app/templates/footer.php'; ?>