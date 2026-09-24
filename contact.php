<?php require_once __DIR__ . '/app/templates/header.php'; ?>

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
    return '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">' . $path . '</svg>';
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

<style>
    /* ============================================================
       CONTACT PAGE — Pixel-perfect Next.js clone
       ============================================================ */
    .cp-main {
        min-height: 100vh;
        background: #FBF8F1;
        padding: 32px 0;
    }
    @media (min-width: 1024px) { .cp-main { padding: 48px 0; } }

    .cp-container {
        max-width: 1280px;
        padding-left: 16px;
        padding-right: 16px;
        margin: 0 auto;
        width: 100%;
    }

    /* ===== Header ===== */
    .cp-header-wrap {
        margin-bottom: 32px;
    }
    @media (min-width: 640px) { .cp-header-wrap { margin-bottom: 40px; } }
    @media (min-width: 768px) { .cp-header-wrap { margin-bottom: 48px; } }

    .cp-header {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .cp-pill {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: rgba(196, 0, 122, 0.1);
        padding: 6px 10px;
        border-radius: 9999px;
        margin-bottom: 12px;
    }
    @media (min-width: 640px) { .cp-pill { gap: 8px; padding: 8px 12px; margin-bottom: 16px; } }
    .cp-pill svg { width: 12px; height: 12px; color: #C4007A; flex-shrink: 0; }
    @media (min-width: 640px) { .cp-pill svg { width: 14px; height: 14px; } }
    @media (min-width: 768px) { .cp-pill svg { width: 16px; height: 16px; } }
    .cp-pill span {
        font-size: 10px;
        color: #C4007A;
        font-weight: 600;
        letter-spacing: 0.05em;
        text-transform: uppercase;
    }
    @media (min-width: 640px) { .cp-pill span { font-size: 11px; } }
    @media (min-width: 768px) { .cp-pill span { font-size: 14px; } }

    .cp-h1 {
        font-family: 'Plus Jakarta Sans', 'Poppins', sans-serif;
        font-size: 1.875rem;
        font-weight: 700;
        color: #111827;
        margin: 0;
        line-height: 1.15;
    }
    @media (min-width: 640px) { .cp-h1 { font-size: 2.25rem; } }
    @media (min-width: 1024px) { .cp-h1 { font-size: 2.25rem; } }
    .cp-h1 .accent {
        color: #C4007A;
        position: relative;
        display: inline-block;
    }
    .cp-h1 .accent svg {
        position: absolute;
        left: 0;
        bottom: -4px;
        width: 100%;
        height: 6px;
    }
    @media (min-width: 640px) {
        .cp-h1 .accent svg { bottom: -8px; }
    }

    .cp-subtitle {
        color: #6B7280;
        font-size: 0.875rem;
        max-width: 672px;
        margin: 8px auto 0;
        line-height: 1.625;
    }
    @media (min-width: 640px) { .cp-subtitle { font-size: 1rem; margin-top: 12px; } }
    @media (min-width: 768px) { .cp-subtitle { font-size: 1.125rem; } }

    /* ===== Contact Grid ===== */
    .cp-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 16px;
        align-items: stretch;
    }
    @media (min-width: 640px) { .cp-grid { gap: 20px; } }
    @media (min-width: 768px) { .cp-grid { gap: 24px; } }
    @media (min-width: 1024px) {
        .cp-grid { grid-template-columns: repeat(5, minmax(0, 1fr)); gap: 32px; }
    }

    /* ===== Left Info Card ===== */
    .cp-info-wrap {
        display: flex;
    }
    @media (min-width: 1024px) {
        .cp-info-wrap { grid-column: span 2 / span 2; }
    }

    .cp-info-card {
        position: relative;
        width: 100%;
        background: linear-gradient(to bottom right, #1a1a1a, #111111, #2a1420);
        border-radius: 16px;
        padding: 16px;
        border: 1px solid rgba(196, 0, 122, 0.2);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        display: flex;
        flex-direction: column;
    }
    @media (min-width: 640px) { .cp-info-card { padding: 20px; } }
    @media (min-width: 768px) { .cp-info-card { padding: 24px; } }
    @media (min-width: 1024px) { .cp-info-card { padding: 32px; } }

    .cp-info-card::before {
        content: '';
        position: absolute;
        top: -64px;
        right: -40px;
        width: 224px;
        height: 224px;
        border-radius: 9999px;
        background: rgba(196, 0, 122, 0.2);
        filter: blur(48px);
        pointer-events: none;
    }
    .cp-info-card::after {
        content: '';
        position: absolute;
        bottom: -80px;
        left: -80px;
        width: 192px;
        height: 192px;
        border-radius: 9999px;
        background: rgba(196, 0, 122, 0.1);
        filter: blur(48px);
        pointer-events: none;
    }

    .cp-info-deco {
        position: absolute;
        bottom: 32px;
        right: 32px;
        width: 64px;
        height: 64px;
        opacity: 0.1;
        pointer-events: none;
    }
    @media (min-width: 640px) { .cp-info-deco { width: 80px; height: 80px; } }
    @media (min-width: 768px) { .cp-info-deco { width: 96px; height: 96px; } }
    .cp-info-deco svg {
        width: 100%;
        height: 100%;
        fill: none;
        stroke: #F9A8D4;
        stroke-width: 2;
    }

    .cp-info-content {
        position: relative;
        z-index: 10;
        display: flex;
        flex-direction: column;
        flex: 1;
    }

    .cp-info-top {
        margin-bottom: 12px;
    }
    @media (min-width: 640px) { .cp-info-top { margin-bottom: 16px; } }

    .cp-connect {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 10px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.25em;
        color: #F9A8D4;
        margin: 0;
    }
    @media (min-width: 640px) { .cp-connect { gap: 8px; font-size: 12px; } }
    .cp-connect .dot {
        width: 4px;
        height: 4px;
        border-radius: 9999px;
        background: #F9A8D4;
        display: inline-block;
    }
    @media (min-width: 640px) { .cp-connect .dot { width: 6px; height: 6px; } }

    .cp-info-title {
        font-family: 'Plus Jakarta Sans', 'Poppins', sans-serif;
        font-size: 1.125rem;
        font-weight: 700;
        color: #fff;
        margin: 6px 0 0;
        line-height: 1.2;
    }
    @media (min-width: 640px) { .cp-info-title { font-size: 1.25rem; } }
    @media (min-width: 768px) { .cp-info-title { font-size: 1.5rem; } }
    .cp-info-title .accent { color: #C4007A; }

    .cp-info-desc {
        font-size: 0.75rem;
        color: rgba(255, 255, 255, 0.7);
        margin: 4px 0 0;
        line-height: 1.625;
    }
    @media (min-width: 640px) { .cp-info-desc { font-size: 0.875rem; } }

    /* Contact For */
    .cp-contact-for {
        margin-bottom: 12px;
        padding: 8px 10px;
        border-radius: 12px;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }
    @media (min-width: 640px) { .cp-contact-for { padding: 10px 12px; margin-bottom: 16px; } }
    .cp-contact-for .label {
        font-size: 9px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        color: #F9A8D4;
        margin: 0 0 2px;
    }
    @media (min-width: 640px) { .cp-contact-for .label { font-size: 10px; } }
    @media (min-width: 768px) { .cp-contact-for .label { font-size: 12px; } }
    .cp-contact-for .value {
        font-size: 0.75rem;
        color: rgba(255, 255, 255, 0.85);
        margin: 0;
    }
    @media (min-width: 640px) { .cp-contact-for .value { font-size: 0.875rem; } }

    /* Contact Lines */
    .cp-contact-lines {
        display: flex;
        flex-direction: column;
        gap: 8px;
        flex: 1;
    }
    @media (min-width: 640px) { .cp-contact-lines { gap: 10px; } }

    .cp-contact-item {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 8px 10px;
        border-radius: 12px;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.05);
        text-decoration: none;
        transition: all 0.3s ease;
    }
    @media (min-width: 640px) { .cp-contact-item { gap: 12px; padding: 10px; } }
    .cp-contact-item:hover {
        background: rgba(255, 255, 255, 0.1);
        border-color: rgba(196, 0, 122, 0.3);
    }

    .cp-contact-icon {
        width: 28px;
        height: 28px;
        border-radius: 9999px;
        background: rgba(196, 0, 122, 0.2);
        color: #C4007A;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        transition: transform 0.3s ease;
    }
    @media (min-width: 640px) { .cp-contact-icon { width: 32px; height: 32px; } }
    @media (min-width: 768px) { .cp-contact-icon { width: 36px; height: 36px; } }
    .cp-contact-item:hover .cp-contact-icon { transform: scale(1.1); }
    .cp-contact-icon svg { width: 14px; height: 14px; }
    @media (min-width: 640px) { .cp-contact-icon svg { width: 16px; height: 16px; } }

    .cp-contact-text {
        min-width: 0;
        flex: 1;
    }
    .cp-contact-text .label {
        font-size: 9px;
        color: rgba(255, 255, 255, 0.5);
        margin: 0;
    }
    @media (min-width: 640px) { .cp-contact-text .label { font-size: 10px; } }
    @media (min-width: 768px) { .cp-contact-text .label { font-size: 12px; } }
    .cp-contact-text .value {
        font-size: 10px;
        color: #fff;
        margin: 0;
        transition: color 0.3s ease;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
    @media (min-width: 640px) { .cp-contact-text .value { font-size: 12px; } }
    @media (min-width: 768px) { .cp-contact-text .value { font-size: 14px; } }
    .cp-contact-item:hover .cp-contact-text .value { color: #F9A8D4; }

    /* Working Hours */
    .cp-hours {
        margin-top: 12px;
        padding-top: 12px;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        display: flex;
        align-items: center;
        gap: 8px;
    }
    @media (min-width: 640px) { .cp-hours { margin-top: 16px; padding-top: 16px; gap: 12px; } }
    .cp-hours svg {
        width: 16px;
        height: 16px;
        color: #F9A8D4;
        flex-shrink: 0;
    }
    @media (min-width: 640px) { .cp-hours svg { width: 20px; height: 20px; } }
    .cp-hours .label {
        font-size: 9px;
        color: rgba(255, 255, 255, 0.5);
        margin: 0;
    }
    @media (min-width: 640px) { .cp-hours .label { font-size: 10px; } }
    @media (min-width: 768px) { .cp-hours .label { font-size: 12px; } }
    .cp-hours .value {
        font-size: 10px;
        color: rgba(255, 255, 255, 0.8);
        margin: 0;
    }
    @media (min-width: 640px) { .cp-hours .value { font-size: 12px; } }
    @media (min-width: 768px) { .cp-hours .value { font-size: 14px; } }

    /* ===== Right Form Card ===== */
    .cp-form-wrap {
        display: flex;
    }
    @media (min-width: 1024px) {
        .cp-form-wrap { grid-column: span 3 / span 3; }
    }

    .cp-form-card {
        background: #fff;
        border-radius: 16px;
        padding: 16px;
        border: 1px solid rgba(196, 0, 122, 0.1);
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        width: 100%;
        display: flex;
        flex-direction: column;
    }
    @media (min-width: 640px) { .cp-form-card { padding: 20px; } }
    @media (min-width: 768px) { .cp-form-card { padding: 24px; } }
    @media (min-width: 1024px) { .cp-form-card { padding: 32px; } }

    /* Success State */
    .cp-success {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        flex: 1;
        text-align: center;
        padding: 24px 0;
    }
    @media (min-width: 640px) { .cp-success { padding: 32px 0; } }

    .cp-success-icon {
        width: 48px;
        height: 48px;
        border-radius: 9999px;
        background: #DCFCE7;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 12px;
    }
    @media (min-width: 640px) { .cp-success-icon { width: 56px; height: 56px; margin-bottom: 16px; } }
    @media (min-width: 768px) { .cp-success-icon { width: 64px; height: 64px; } }
    .cp-success-icon svg { width: 24px; height: 24px; color: #22C55E; }
    @media (min-width: 640px) { .cp-success-icon svg { width: 28px; height: 28px; } }
    @media (min-width: 768px) { .cp-success-icon svg { width: 32px; height: 32px; } }

    .cp-success h3 {
        font-size: 1.125rem;
        font-weight: 700;
        color: #111827;
        margin: 0 0 6px;
    }
    @media (min-width: 640px) { .cp-success h3 { font-size: 1.25rem; margin-bottom: 8px; } }
    .cp-success p {
        font-size: 0.75rem;
        color: #4B5563;
        margin: 0;
    }
    @media (min-width: 640px) { .cp-success p { font-size: 0.875rem; } }

    .cp-success-again {
        margin-top: 16px;
        background: none;
        border: none;
        color: #C4007A;
        font-size: 0.875rem;
        font-weight: 600;
        cursor: pointer;
        font-family: inherit;
    }
    .cp-success-again:hover { text-decoration: underline; }

    /* Form */
    .cp-form { display: flex; flex-direction: column; flex: 1; }

    .cp-required-note {
        font-size: 10px;
        font-weight: 500;
        color: #9CA3AF;
        margin: 0 0 12px;
    }
    @media (min-width: 640px) { .cp-required-note { font-size: 12px; margin-bottom: 16px; } }
    .cp-required-note span { color: #C4007A; }

    .cp-form-row {
        display: grid;
        grid-template-columns: 1fr;
        gap: 8px;
        margin-bottom: 8px;
    }
    @media (min-width: 400px) { .cp-form-row { grid-template-columns: repeat(2, minmax(0, 1fr)); } }
    @media (min-width: 640px) { .cp-form-row { gap: 12px; margin-bottom: 12px; } }

    .cp-field-label {
        display: block;
        margin-bottom: 2px;
        font-size: 10px;
        font-weight: 600;
        color: #1F2937;
    }
    @media (min-width: 640px) { .cp-field-label { font-size: 12px; margin-bottom: 4px; } }
    .cp-field-label span { color: #C4007A; }

    .cp-input-wrap {
        position: relative;
    }
    .cp-input-wrap svg {
        position: absolute;
        left: 10px;
        top: 50%;
        transform: translateY(-50%);
        width: 14px;
        height: 14px;
        color: #9CA3AF;
        pointer-events: none;
    }
    @media (min-width: 640px) { .cp-input-wrap svg { width: 16px; height: 16px; left: 12px; } }
    .cp-input-wrap.textarea-wrap svg {
        top: 10px;
        transform: none;
    }
    @media (min-width: 640px) { .cp-input-wrap.textarea-wrap svg { top: 12px; } }

    .cp-input,
    .cp-textarea {
        width: 100%;
        border-radius: 8px;
        border: 1px solid #E5E7EB;
        background: #FBF8F1;
        padding: 8px 10px 8px 28px;
        font-size: 0.75rem;
        color: #111827;
        font-family: inherit;
        transition: all 0.2s ease;
        outline: none;
    }
    @media (min-width: 640px) {
        .cp-input, .cp-textarea { padding: 10px 12px 10px 36px; font-size: 0.875rem; }
    }
    .cp-input::placeholder,
    .cp-textarea::placeholder { color: #9CA3AF; }
    .cp-input:focus,
    .cp-textarea:focus {
        border-color: #C4007A;
        box-shadow: 0 0 0 3px rgba(196, 0, 122, 0.1);
    }
    .cp-textarea {
        resize: none;
        min-height: 100px;
    }
    @media (min-width: 640px) { .cp-textarea { min-height: 120px; } }

    /* Message field grows */
    .cp-message-field {
        margin-bottom: 12px;
        flex: 1;
        display: flex;
        flex-direction: column;
    }
    @media (min-width: 640px) { .cp-message-field { margin-bottom: 16px; } }
    .cp-message-field .cp-input-wrap {
        flex: 1;
        display: flex;
    }
    .cp-textarea {
        height: 100%;
    }

    /* Consent */
    .cp-consent {
        display: flex;
        cursor: pointer;
        align-items: flex-start;
        gap: 6px;
        font-size: 10px;
        color: #4B5563;
        margin-bottom: 10px;
    }
    @media (min-width: 640px) { .cp-consent { gap: 8px; font-size: 12px; margin-bottom: 12px; } }
    .cp-consent input[type="checkbox"] {
        margin-top: 2px;
        width: 12px;
        height: 12px;
        accent-color: #C4007A;
        flex-shrink: 0;
        cursor: pointer;
    }
    @media (min-width: 640px) { .cp-consent input[type="checkbox"] { width: 14px; height: 14px; } }

    /* Submit */
    .cp-submit {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        width: 100%;
        border-radius: 9999px;
        background: linear-gradient(90deg, #C4007A, #E0398F);
        padding: 10px 20px;
        font-weight: 600;
        color: #fff;
        box-shadow: 0 10px 15px -3px rgba(196, 0, 122, 0.25);
        transition: all 0.3s ease;
        font-size: 0.75rem;
        border: none;
        cursor: pointer;
        font-family: inherit;
    }
    @media (min-width: 640px) { .cp-submit { padding: 12px 24px; font-size: 0.875rem; gap: 8px; } }
    .cp-submit:hover:not(:disabled) {
        transform: scale(1.02);
        box-shadow: 0 20px 25px -5px rgba(196, 0, 122, 0.4);
    }
    .cp-submit:disabled {
        opacity: 0.7;
        cursor: not-allowed;
    }
    .cp-submit svg {
        width: 14px;
        height: 14px;
        transition: transform 0.3s ease;
    }
    @media (min-width: 640px) { .cp-submit svg { width: 16px; height: 16px; } }
    .cp-submit:hover:not(:disabled) svg { transform: translateX(4px); }
    .cp-submit .spinner {
        width: 14px;
        height: 14px;
        border: 2px solid #fff;
        border-top-color: transparent;
        border-radius: 9999px;
        animation: cp-spin 0.8s linear infinite;
    }
    @keyframes cp-spin {
        to { transform: rotate(360deg); }
    }

    /* Trust Badges */
    .cp-trust {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        margin-top: 10px;
        font-size: 9px;
        color: #9CA3AF;
        flex-wrap: wrap;
    }
    @media (min-width: 640px) { .cp-trust { gap: 12px; font-size: 12px; margin-top: 12px; } }
    .cp-trust-item {
        display: flex;
        align-items: center;
        gap: 4px;
    }
    .cp-trust-item svg {
        width: 10px;
        height: 10px;
        color: #C4007A;
    }
    @media (min-width: 640px) { .cp-trust-item svg { width: 12px; height: 12px; } }
    .cp-trust-divider {
        width: 1px;
        height: 10px;
        background: #E5E7EB;
    }
    @media (min-width: 640px) { .cp-trust-divider { height: 12px; } }

    /* ===== Map Section ===== */
    .cp-map-wrap {
        margin-top: 32px;
    }
    @media (min-width: 640px) { .cp-map-wrap { margin-top: 40px; } }
    @media (min-width: 768px) { .cp-map-wrap { margin-top: 48px; } }

    .cp-map-card {
        background: #fff;
        border-radius: 16px;
        padding: 16px;
        border: 1px solid rgba(196, 0, 122, 0.1);
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }
    @media (min-width: 640px) { .cp-map-card { padding: 20px; } }
    @media (min-width: 768px) { .cp-map-card { padding: 24px; } }

    .cp-map-title {
        font-family: 'Plus Jakarta Sans', 'Poppins', sans-serif;
        font-size: 1.125rem;
        font-weight: 700;
        color: #111827;
        margin: 0 0 12px;
    }
    @media (min-width: 640px) { .cp-map-title { font-size: 1.25rem; margin-bottom: 16px; } }
    .cp-map-title .accent { color: #C4007A; }

    .cp-map-iframe {
        width: 100%;
        height: 200px;
        border-radius: 12px;
        overflow: hidden;
        background: #F3F4F6;
        border: 0;
    }
    @media (min-width: 640px) { .cp-map-iframe { height: 250px; } }
    @media (min-width: 768px) { .cp-map-iframe { height: 300px; } }
</style>

<main class="cp-main">
    <div class="cp-container">

        <!-- ===== Page Header ===== -->
        <div class="cp-header-wrap">
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

        <!-- ===== Contact Grid ===== -->
        <div class="cp-grid">

            <!-- LEFT — Info Card -->
            <div class="cp-info-wrap">
                <div class="cp-info-card">

                    <!-- Decorative -->
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

                    <!-- Success State (hidden by default) -->
                    <div class="cp-success" id="cpSuccess" style="display: none;">
                        <div class="cp-success-icon">
                            <?= cpIcon('check') ?>
                        </div>
                        <h3>Message Sent!</h3>
                        <p>Thank you for reaching out. We'll get back to you within 24 hours.</p>
                        <button type="button" class="cp-success-again" onclick="cpResetForm()">
                            Send another message
                        </button>
                    </div>

                    <!-- Form -->
                    <form class="cp-form" id="cpForm" method="POST" action="/contact.php">

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
                            <span class="cp-trust-item">
                                <?= cpIcon('check') ?>
                                Secure Form
                            </span>
                            <span class="cp-trust-divider"></span>
                            <span class="cp-trust-item">
                                <?= cpIcon('check') ?>
                                24/7 Support
                            </span>
                            <span class="cp-trust-divider"></span>
                            <span class="cp-trust-item">
                                <?= cpIcon('check') ?>
                                Fast Response
                            </span>
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
</main>

<script>
    (function () {
        const form = document.getElementById('cpForm');
        const submitBtn = document.getElementById('cpSubmit');
        const successBox = document.getElementById('cpSuccess');
        if (!form) return;

        form.addEventListener('submit', function (e) {
            // Show loading state briefly
            submitBtn.disabled = true;
            const originalHTML = submitBtn.innerHTML;
            submitBtn.innerHTML = '<span class="spinner"></span> Sending...';

            // Restore after 5s in case of failed submission (form submits normally otherwise)
            setTimeout(() => {
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalHTML;
            }, 5000);
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