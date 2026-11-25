<?php
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/functions.php';

$requestedSlug = trim((string) ($_GET['slug'] ?? ''));
$service = null;
if ($requestedSlug !== '' && preg_match('/^[a-z0-9]+(?:-[a-z0-9]+)*$/', $requestedSlug)) {
    foreach (serviceDetailPages() as $servicePage) {
        if (($servicePage['slug'] ?? '') === $requestedSlug) {
            $service = $servicePage;
            break;
        }
    }
}

if ($service === null) {
    http_response_code(404);
    $packagesPageMeta = [
        'page_meta_title' => 'Service not found | ' . APP_NAME,
        'page_meta_description' => 'The requested service page is unavailable.',
    ];
    require_once __DIR__ . '/app/templates/header.php';

    // Suggest a few live services so the visitor is never stuck on a dead end (safe: never breaks the 404 page)
    $nfSuggestions = [];
    try {
        foreach (serviceDetailPages() as $sp) {
            if (!empty($sp['slug']) && !empty($sp['title'])) {
                $nfSuggestions[] = ['slug' => (string) $sp['slug'], 'title' => (string) $sp['title']];
            }
            if (count($nfSuggestions) >= 6) {
                break;
            }
        }
    } catch (Throwable $e) {
        $nfSuggestions = [];
    }
    $nfSelf = strtok((string) ($_SERVER['SCRIPT_NAME'] ?? ''), '?') ?: '';
    ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,600;12..96,800&display=swap" rel="stylesheet">

    <style>
        .nf {
            --ink: #1A0613; --pink: #C4007A; --pink2: #E0398F; --gold: #FFB547; --blush: #FBEAF3;
            --disp: 'Bricolage Grotesque', 'Plus Jakarta Sans', system-ui, sans-serif;
            position: relative; overflow: hidden; display: grid; place-items: center; min-height: 78vh; padding: 72px 22px 84px;
            text-align: center; color: #fff;
            font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
            background: radial-gradient(60% 70% at 85% 0%, rgba(196,0,122,.55), transparent 65%), radial-gradient(40% 50% at 0% 100%, rgba(255,181,71,.16), transparent 70%), var(--ink);
        }
        .nf *, .nf *::before, .nf *::after { box-sizing: border-box; }
        .nf::before { content: ''; position: absolute; inset: 0; pointer-events: none; background-image: radial-gradient(rgba(255,255,255,.14) 1px, transparent 1.2px); background-size: 26px 26px; -webkit-mask-image: linear-gradient(180deg, #000 30%, transparent 95%); mask-image: linear-gradient(180deg, #000 30%, transparent 95%); }
        .nf-aurora { position: absolute; inset: 0; overflow: hidden; pointer-events: none; }
        .nf-aurora i { position: absolute; border-radius: 50%; filter: blur(80px); opacity: .5; animation: nfDrift 14s ease-in-out infinite alternate; }
        .nf-aurora i:nth-child(1) { width: 420px; height: 420px; left: -8%; top: 4%; background: var(--pink); }
        .nf-aurora i:nth-child(2) { width: 340px; height: 340px; right: 8%; bottom: -12%; background: var(--gold); opacity: .26; animation-duration: 18s; }
        @keyframes nfDrift { to { transform: translate(60px, 40px) scale(1.2); } }
        .nf-in { position: relative; z-index: 2; width: 100%; max-width: 720px; }

        /* empty stall illustration */
        .nf-stall { position: relative; width: 190px; margin: 0 auto 8px; animation: nfFloat 5s ease-in-out infinite alternate; filter: drop-shadow(0 18px 24px rgba(0,0,0,.4)); }
        .nf-stall svg { display: block; width: 100%; height: auto; }
        .nf-sign { transform-origin: 95px 112px; animation: nfSwing 3.4s ease-in-out infinite alternate; }
        @keyframes nfFloat { from { translate: 0 0; } to { translate: 0 -10px; } }
        @keyframes nfSwing { from { rotate: -6deg; } to { rotate: 6deg; } }

        .nf-code { margin: 0; font: 800 clamp(5rem, 18vw, 9.5rem)/.9 var(--disp); letter-spacing: -.05em; color: transparent; -webkit-text-stroke: 2px var(--gold); }
        .nf h1 { margin: 10px 0 0; font: 800 clamp(1.9rem, 4.4vw, 3rem)/1.1 var(--disp); letter-spacing: -.03em; color: #fff; }
        .nf-text { max-width: 520px; margin: 16px auto 0; font-size: 1.05rem; line-height: 1.7; color: rgba(255,255,255,.78); }
        .nf-actions { display: flex; flex-wrap: wrap; justify-content: center; gap: 14px; margin-top: 30px; }
        .nf-btn { position: relative; overflow: hidden; display: inline-flex; align-items: center; justify-content: center; gap: 10px; padding: 14px 26px; border-radius: 12px; border: 2px solid transparent; font: 700 .95rem/1.2 'Plus Jakarta Sans', sans-serif; text-decoration: none; text-align: center; transition: translate .2s ease, box-shadow .2s ease, background .2s ease; }
        .nf-btn svg { width: 16px; height: 16px; flex-shrink: 0; transition: translate .2s ease; }
        .nf-btn:hover svg { translate: 4px 0; }
        .nf-btn--pink { background: var(--pink); color: #fff; box-shadow: 0 6px 0 #7E004E; }
        .nf-btn--pink:hover { translate: 0 2px; box-shadow: 0 4px 0 #7E004E; color: #fff; }
        .nf-btn--pink:active { translate: 0 6px; box-shadow: 0 0 0 #7E004E; }
        .nf-btn--ghost { background: transparent; color: #fff; border-color: rgba(255,255,255,.4); }
        .nf-btn--ghost:hover { background: rgba(255,255,255,.1); border-color: #fff; color: #fff; }
        .nf :is(a):focus-visible { outline: 3px solid var(--gold); outline-offset: 3px; }

        .nf-try { margin-top: 44px; padding-top: 28px; border-top: 1px dashed rgba(255,255,255,.25); }
        .nf-try small { display: block; margin-bottom: 14px; font-size: .74rem; font-weight: 800; letter-spacing: .14em; text-transform: uppercase; color: var(--gold); }
        .nf-chips { display: flex; flex-wrap: wrap; justify-content: center; gap: 10px; }
        .nf-chip { padding: 9px 16px; border-radius: 999px; border: 2px solid var(--ink); background: var(--gold); color: var(--ink); font-size: .86rem; font-weight: 800; text-decoration: none; box-shadow: 3px 3px 0 var(--ink); transition: translate .2s ease, box-shadow .2s ease, background .2s ease; }
        .nf-chip:hover { translate: -2px -2px; box-shadow: 5px 5px 0 var(--pink); background: #fff; color: var(--ink); }
        .nf-chip:nth-child(even) { background: #fff; }
        .nf-chip:nth-child(even):hover { background: var(--gold); }

        @media (max-width: 575px) {
            .nf { padding: 52px 16px 64px; min-height: 70vh; }
            .nf-stall { width: 150px; }
            .nf-actions .nf-btn { width: 100%; }
            .nf-aurora i { filter: blur(50px); }
        }
        @media (prefers-reduced-motion: reduce) {
            .nf-aurora i, .nf-stall, .nf-sign { animation: none; }
        }
    </style>

    <main class="nf">
        <div class="nf-aurora" aria-hidden="true"><i></i><i></i></div>
        <div class="nf-in">
            <div class="nf-stall" aria-hidden="true">
                <svg viewBox="0 0 190 170" fill="none">
                    <!-- awning -->
                    <defs>
                        <pattern id="nfStripe" width="28" height="30" patternUnits="userSpaceOnUse">
                            <rect width="14" height="30" fill="#C4007A"/><rect x="14" width="14" height="30" fill="#FFFFFF"/>
                        </pattern>
                    </defs>
                    <rect x="14" y="18" width="162" height="34" rx="6" fill="url(#nfStripe)" stroke="#1A0613" stroke-width="3"/>
                    <path d="M14 52h162" stroke="#1A0613" stroke-width="3"/>
                    <!-- posts + counter -->
                    <path d="M26 52v100M164 52v100" stroke="#FFB547" stroke-width="6" stroke-linecap="round"/>
                    <rect x="20" y="118" width="150" height="38" rx="6" fill="#2B0B20" stroke="#FFB547" stroke-width="3"/>
                    <!-- swinging CLOSED sign -->
                    <g class="nf-sign">
                        <path d="M95 52v14" stroke="#FFB547" stroke-width="3"/>
                        <rect x="62" y="66" width="66" height="30" rx="6" fill="#FFB547" stroke="#1A0613" stroke-width="3"/>
                        <text x="95" y="86" text-anchor="middle" font-family="Arial, sans-serif" font-size="12" font-weight="800" fill="#1A0613" letter-spacing="1.2">CLOSED</text>
                    </g>
                </svg>
            </div>

            <p class="nf-code">404</p>
            <h1>Service not found</h1>
            <p class="nf-text">This service may have been unpublished or removed.</p>

            <div class="nf-actions">
                <a class="nf-btn nf-btn--pink" href="/services.php">
                    <span>View all services</span>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                </a>
                <a class="nf-btn nf-btn--ghost" href="/contact.php"><span>Talk to our team</span></a>
            </div>

            <?php if ($nfSuggestions !== [] && $nfSelf !== ''): ?>
                <div class="nf-try">
                    <small>Or explore these</small>
                    <div class="nf-chips">
                        <?php foreach ($nfSuggestions as $sg): ?>
                            <a class="nf-chip" href="<?= htmlspecialchars($nfSelf . '?slug=' . rawurlencode($sg['slug']), ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars($sg['title'], ENT_QUOTES, 'UTF-8') ?></a>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </main>
    <?php
    require_once __DIR__ . '/app/templates/footer.php';
    exit;
}

$packagesPageMeta = [
    'page_meta_title' => $service['title'] . ' | ' . APP_NAME,
    'page_meta_description' => $service['summary'] ?? '',
];
require_once __DIR__ . '/app/templates/header.php';
require_once __DIR__ . '/app/templates/service-page-layout.php';

renderServicePageLayout(array_merge($service, [
    'icon' => $service['icon'] ?? 'sparkles',
    'title' => $service['title'] ?? 'Service',
    'tagline' => $service['tagline'] ?? '',
    'heroDescription' => $service['hero_description'] ?? ($service['summary'] ?? ''),
    'overview' => $service['body'] ?? '',
    'features' => $service['features'] ?? [],
    'process' => $service['process'] ?? [],
    'faqs' => $service['faqs'] ?? [],
]));

require_once __DIR__ . '/app/templates/footer.php';