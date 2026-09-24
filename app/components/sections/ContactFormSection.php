<?php
function renderContactFormSection(): void
{
    // ===== Contact Info Data =====
    $contactInfo = [
        [
            'icon' => 'mail',
            'label' => 'Email',
            'value' => 'info@webtecmart.com',
            'href' => 'mailto:info@webtecmart.com',
            'external' => false,
        ],
        [
            'icon' => 'phone',
            'label' => 'Phone / WhatsApp',
            'value' => '+91-9999674255',
            'href' => 'tel:+919999674255',
            'external' => false,
        ],
        [
            'icon' => 'headphones',
            'label' => 'Technical Support',
            'value' => '+91-9511012625',
            'href' => 'tel:+919511012625',
            'external' => false,
        ],
        [
            'icon' => 'globe',
            'label' => 'Website',
            'value' => 'www.webtecmart.com',
            'href' => 'https://www.webtecmart.com',
            'external' => true,
        ],
    ];

    // Icon helper
    function cfsIcon(string $name): string {
        $icons = [
            'sparkles'   => '<path d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z"/><path d="M20 3v4"/><path d="M22 5h-4"/><path d="M4 17v2"/><path d="M5 18H3"/>',
            'mail'       => '<rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>',
            'phone'      => '<path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>',
            'headphones' => '<path d="M3 14h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H4a1 1 0 0 1-1-1v-7a9 9 0 0 1 18 0v7a1 1 0 0 1-1 1h-2a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3"/>',
            'globe'      => '<circle cx="12" cy="12" r="10"/><path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"/><path d="M2 12h20"/>',
            'clock'      => '<circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>',
            'check'      => '<circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/>',
            'user'       => '<path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/>',
            'message'    => '<path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z"/>',
            'send'       => '<path d="m22 2-7 20-4-9-9-4Z"/><path d="M22 2 11 13"/>',
        ];
        $path = $icons[$name] ?? '';
        return '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">' . $path . '</svg>';
    }
    ?>
    <style>
        /* ============================================================
           CONTACT FORM SECTION — Pixel-perfect Next.js clone
        ============================================================ */
        .cfs-section {
            position: relative;
            width: 100%;
            padding: 24px 0;
            background: #FBF8F1;
            overflow: hidden;
        }

        /* Decorative Background */
        .cfs-bg {
            position: absolute;
            inset: 0;
            pointer-events: none;
        }
        .cfs-bg-blob-1 {
            position: absolute;
            top: 0; right: 0;
            width: 50%; height: 50%;
            background: linear-gradient(to bottom left, rgba(196, 0, 122, 0.05), transparent);
            border-radius: 9999px;
            filter: blur(64px);
        }
        .cfs-bg-blob-2 {
            position: absolute;
            bottom: 0; left: 0;
            width: 33.333%; height: 50%;
            background: linear-gradient(to top right, rgba(196, 0, 122, 0.05), transparent);
            border-radius: 9999px;
            filter: blur(64px);
        }

        /* Header */
        .cfs-header {
            position: relative;
            z-index: 10;
            text-align: center;
            margin-bottom: 32px;
        }
        .cfs-pill {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(196, 0, 122, 0.1);
            padding: 6px 10px;
            border-radius: 9999px;
            margin-bottom: 12px;
        }
        .cfs-pill svg { width: 12px; height: 12px; color: #C4007A; flex-shrink: 0; }
        .cfs-pill span {
            font-size: 10px;
            color: #C4007A;
            font-weight: 600;
            letter-spacing: 0.025em;
            text-transform: uppercase;
        }

        .cfs-heading {
            font-family: 'Plus Jakarta Sans', 'Poppins', sans-serif;
            font-size: 1.5rem;
            font-weight: 700;
            color: #111827;
            margin: 0;
            line-height: 1.2;
        }
        .cfs-heading .accent {
            color: #C4007A;
            position: relative;
            display: inline-block;
        }
        .cfs-heading .accent svg {
            position: absolute;
            left: 0;
            bottom: -4px;
            width: 100%;
            height: 6px;
        }

        .cfs-subtitle {
            font-size: 0.75rem;
            color: #6B7280;
            max-width: 640px;
            margin: 12px auto 0;
        }

        /* Grid */
        .cfs-grid {
            position: relative;
            z-index: 10;
            display: grid;
            grid-template-columns: 1fr;
            gap: 16px;
            align-items: stretch;
        }

        /* ===== LEFT — Info Card ===== */
        .cfs-info-wrap {
            display: flex;
        }
        .cfs-info-card {
            position: relative;
            width: 100%;
            background: linear-gradient(to bottom right, #1a1a1a, #111111, #2a1420);
            border: 1px solid rgba(196, 0, 122, 0.2);
            border-radius: 16px;
            padding: 16px;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

        .cfs-info-card::before {
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
        .cfs-info-card::after {
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

        .cfs-info-deco {
            position: absolute;
            bottom: 32px;
            right: 32px;
            width: 64px;
            height: 64px;
            opacity: 0.1;
            pointer-events: none;
        }
        .cfs-info-deco svg {
            width: 100%;
            height: 100%;
            fill: none;
            stroke: #F9A8D4;
            stroke-width: 2;
        }

        .cfs-info-content {
            position: relative;
            z-index: 10;
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        /* Info Header */
        .cfs-info-top {
            margin-bottom: 12px;
        }
        .cfs-connect {
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
        .cfs-connect .dot {
            width: 4px;
            height: 4px;
            border-radius: 9999px;
            background: #F9A8D4;
            display: inline-block;
        }

        .cfs-info-title {
            font-family: 'Plus Jakarta Sans', 'Poppins', sans-serif;
            font-size: 1.125rem;
            font-weight: 700;
            color: #fff;
            margin: 6px 0 0;
            line-height: 1.2;
        }
        .cfs-info-title .accent { color: #C4007A; }

        .cfs-info-desc {
            font-size: 0.75rem;
            color: rgba(255, 255, 255, 0.7);
            margin: 4px 0 0;
            line-height: 1.5;
        }

        /* Contact For Box */
        .cfs-contact-for {
            margin-bottom: 12px;
            padding: 8px 10px;
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .cfs-contact-for .label {
            font-size: 9px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: #F9A8D4;
            margin: 0 0 2px;
        }
        .cfs-contact-for .value {
            font-size: 0.75rem;
            color: rgba(255, 255, 255, 0.85);
            margin: 0;
        }

        /* Contact Lines */
        .cfs-contact-lines {
            display: flex;
            flex-direction: column;
            gap: 8px;
            flex: 1;
        }
        .cfs-contact-item {
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
        .cfs-contact-item:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: rgba(196, 0, 122, 0.3);
        }
        .cfs-contact-icon {
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
        .cfs-contact-item:hover .cfs-contact-icon {
            transform: scale(1.1);
        }
        .cfs-contact-icon svg {
            width: 14px;
            height: 14px;
        }
        .cfs-contact-text {
            min-width: 0;
            flex: 1;
        }
        .cfs-contact-text .label {
            font-size: 9px;
            color: rgba(255, 255, 255, 0.5);
            margin: 0;
        }
        .cfs-contact-text .value {
            font-size: 0.75rem;
            color: #fff;
            margin: 0;
            transition: color 0.3s ease;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        .cfs-contact-item:hover .cfs-contact-text .value {
            color: #F9A8D4;
        }

        /* Working Hours */
        .cfs-hours {
            margin-top: 12px;
            padding-top: 12px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .cfs-hours svg {
            width: 16px;
            height: 16px;
            color: #F9A8D4;
            flex-shrink: 0;
        }
        .cfs-hours .label {
            font-size: 9px;
            color: rgba(255, 255, 255, 0.5);
            margin: 0;
        }
        .cfs-hours .value {
            font-size: 0.75rem;
            color: rgba(255, 255, 255, 0.8);
            margin: 0;
        }

        /* ===== RIGHT — Form Card ===== */
        .cfs-form-wrap {
            display: flex;
        }
        .cfs-form-card {
            background: #fff;
            border-radius: 16px;
            padding: 16px;
            border: 1px solid rgba(196, 0, 122, 0.1);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            width: 100%;
            display: flex;
            flex-direction: column;
        }

        /* Success State */
        .cfs-success {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            flex: 1;
            text-align: center;
            padding: 24px 0;
        }
        .cfs-success-icon {
            width: 48px;
            height: 48px;
            border-radius: 9999px;
            background: #DCFCE7;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 12px;
        }
        .cfs-success-icon svg {
            width: 24px;
            height: 24px;
            color: #22C55E;
        }
        .cfs-success h3 {
            font-size: 1.125rem;
            font-weight: 700;
            color: #111827;
            margin: 0 0 6px;
        }
        .cfs-success p {
            font-size: 0.75rem;
            color: #4B5563;
            margin: 0;
        }

        /* Form */
        .cfs-form {
            display: flex;
            flex-direction: column;
            flex: 1;
        }
        .cfs-required-note {
            font-size: 10px;
            font-weight: 500;
            color: #9CA3AF;
            margin: 0 0 12px;
        }
        .cfs-required-note span { color: #C4007A; }

        .cfs-form-row {
            display: grid;
            grid-template-columns: 1fr;
            gap: 8px;
            margin-bottom: 8px;
        }

        .cfs-field-label {
            display: block;
            margin-bottom: 4px;
            font-size: 10px;
            font-weight: 600;
            color: #1F2937;
        }
        .cfs-field-label span { color: #C4007A; }

        .cfs-input-wrap {
            position: relative;
        }
        .cfs-input-wrap svg {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            width: 14px;
            height: 14px;
            color: #9CA3AF;
            pointer-events: none;
        }
        .cfs-input-wrap.textarea-wrap svg {
            top: 10px;
            transform: none;
        }

        .cfs-input,
        .cfs-textarea {
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
        .cfs-input::placeholder,
        .cfs-textarea::placeholder {
            color: #9CA3AF;
        }
        .cfs-input:focus,
        .cfs-textarea:focus {
            border-color: #C4007A;
            box-shadow: 0 0 0 3px rgba(196, 0, 122, 0.1);
        }
        .cfs-textarea {
            resize: none;
            min-height: 60px;
        }

        /* Message Field — grows */
        .cfs-message-field {
            margin-bottom: 12px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }
        .cfs-message-field .cfs-input-wrap {
            flex: 1;
            display: flex;
        }
        .cfs-textarea {
            height: 100%;
            min-height: 60px;
        }

        /* Consent */
        .cfs-consent {
            display: flex;
            cursor: pointer;
            align-items: flex-start;
            gap: 6px;
            font-size: 10px;
            color: #4B5563;
            margin-bottom: 10px;
        }
        .cfs-consent input[type="checkbox"] {
            margin-top: 2px;
            width: 12px;
            height: 12px;
            accent-color: #C4007A;
            flex-shrink: 0;
            cursor: pointer;
        }

        /* Submit */
        .cfs-submit {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            width: 100%;
            border-radius: 9999px;
            background: linear-gradient(to right, #C4007A, #E0398F);
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
        .cfs-submit:hover:not(:disabled) {
            transform: scale(1.02);
            box-shadow: 0 20px 25px -5px rgba(196, 0, 122, 0.4);
        }
        .cfs-submit:disabled {
            opacity: 0.7;
            cursor: not-allowed;
        }
        .cfs-submit svg {
            width: 14px;
            height: 14px;
            transition: transform 0.3s ease;
        }
        .cfs-submit:hover:not(:disabled) svg {
            transform: translateX(4px);
        }
        .cfs-submit .spinner {
            width: 14px;
            height: 14px;
            border: 2px solid #fff;
            border-top-color: transparent;
            border-radius: 9999px;
            animation: cfs-spin 0.8s linear infinite;
        }
        @keyframes cfs-spin {
            to { transform: rotate(360deg); }
        }

        /* Trust Badges */
        .cfs-trust {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            margin-top: 10px;
            font-size: 9px;
            color: #9CA3AF;
            flex-wrap: wrap;
        }
        .cfs-trust-item {
            display: flex;
            align-items: center;
            gap: 4px;
        }
        .cfs-trust-item svg {
            width: 10px;
            height: 10px;
            color: #C4007A;
        }
        .cfs-trust-divider {
            width: 1px;
            height: 10px;
            background: #E5E7EB;
        }

        /* ============================================================
           RESPONSIVE
        ============================================================ */

        /* Small phones ≥ 480px */
        @media (min-width: 480px) {
            .cfs-section { padding: 32px 0; }
            .cfs-pill { gap: 8px; padding: 8px 12px; }
            .cfs-pill svg { width: 14px; height: 14px; }
            .cfs-pill span { font-size: 11px; }
            .cfs-heading { font-size: 1.875rem; }
            .cfs-subtitle { font-size: 0.875rem; }
            .cfs-grid { gap: 20px; }
            .cfs-info-card { border-radius: 18px; padding: 20px; }
            .cfs-connect { font-size: 12px; gap: 8px; }
            .cfs-connect .dot { width: 6px; height: 6px; }
            .cfs-info-title { font-size: 1.25rem; margin-top: 8px; }
            .cfs-info-desc { font-size: 0.875rem; }
            .cfs-contact-for { padding: 10px 12px; margin-bottom: 14px; }
            .cfs-contact-for .label { font-size: 10px; }
            .cfs-contact-for .value { font-size: 0.875rem; }
            .cfs-contact-lines { gap: 10px; }
            .cfs-contact-item { padding: 10px; gap: 10px; border-radius: 14px; }
            .cfs-contact-icon { width: 32px; height: 32px; }
            .cfs-contact-icon svg { width: 16px; height: 16px; }
            .cfs-contact-text .label { font-size: 10px; }
            .cfs-contact-text .value { font-size: 0.875rem; }
            .cfs-hours { margin-top: 14px; padding-top: 14px; gap: 10px; }
            .cfs-hours svg { width: 18px; height: 18px; }
            .cfs-hours .label { font-size: 10px; }
            .cfs-hours .value { font-size: 0.875rem; }

            .cfs-form-card { border-radius: 18px; padding: 20px; }
            .cfs-success-icon { width: 56px; height: 56px; margin-bottom: 16px; }
            .cfs-success-icon svg { width: 28px; height: 28px; }
            .cfs-success h3 { font-size: 1.25rem; margin-bottom: 8px; }
            .cfs-success p { font-size: 0.875rem; }
            .cfs-required-note { font-size: 12px; margin-bottom: 16px; }
            .cfs-form-row { gap: 12px; margin-bottom: 12px; }
            .cfs-field-label { font-size: 12px; margin-bottom: 4px; }
            .cfs-input, .cfs-textarea { padding: 10px 12px 10px 36px; font-size: 0.875rem; }
            .cfs-input-wrap svg { width: 16px; height: 16px; left: 12px; }
            .cfs-input-wrap.textarea-wrap svg { top: 12px; }
            .cfs-textarea { min-height: 70px; }
            .cfs-consent { font-size: 12px; gap: 8px; margin-bottom: 12px; }
            .cfs-consent input[type="checkbox"] { width: 14px; height: 14px; }
            .cfs-submit { padding: 12px 24px; font-size: 0.875rem; gap: 8px; }
            .cfs-submit svg { width: 16px; height: 16px; }
            .cfs-trust { font-size: 12px; gap: 12px; margin-top: 12px; }
            .cfs-trust-item svg { width: 12px; height: 12px; }
            .cfs-trust-divider { height: 12px; }
        }

        /* Tablets ≥ 640px — 2 cols for form row */
        @media (min-width: 640px) {
            .cfs-form-row { grid-template-columns: repeat(2, minmax(0, 1fr)); }
        }

        /* Large tablets ≥ 768px */
        @media (min-width: 768px) {
            .cfs-section { padding: 40px 0; }
            .cfs-header { margin-bottom: 40px; }
            .cfs-heading { font-size: 1.875rem; }
            .cfs-subtitle { font-size: 1rem; margin-top: 12px; }
            .cfs-grid { gap: 24px; }
            .cfs-info-card { padding: 24px; }
            .cfs-contact-item { padding: 10px 12px; }
            .cfs-contact-icon { width: 36px; height: 36px; }
            .cfs-contact-icon svg { width: 16px; height: 16px; }
            .cfs-contact-text .label { font-size: 11px; }
            .cfs-contact-text .value { font-size: 0.875rem; }
            .cfs-form-card { padding: 24px; }
            .cfs-input, .cfs-textarea { padding: 10px 12px 10px 36px; font-size: 0.875rem; }
            .cfs-textarea { min-height: 80px; }
        }

        /* Desktop ≥ 1024px — 5-col grid (2 + 3) */
        @media (min-width: 1024px) {
            .cfs-section { padding: 48px 0; }
            .cfs-grid {
                grid-template-columns: repeat(5, minmax(0, 1fr));
                gap: 32px;
            }
            .cfs-info-wrap { grid-column: span 2 / span 2; }
            .cfs-form-wrap { grid-column: span 3 / span 3; }
            .cfs-info-card { border-radius: 16px; padding: 32px; }
            .cfs-info-title { font-size: 1.5rem; }
            .cfs-info-desc { font-size: 0.875rem; }
            .cfs-contact-item { padding: 10px 12px; }
            .cfs-contact-icon { width: 36px; height: 36px; }
            .cfs-form-card { padding: 32px; border-radius: 16px; }
            .cfs-input, .cfs-textarea { padding: 10px 12px 10px 36px; }
            .cfs-textarea { min-height: 80px; }
        }

        @media (min-width: 1280px) {
            .cfs-info-card { padding: 32px; }
        }
    </style>

    <section class="cfs-section" id="contactSection">

        <!-- Decorative Background -->
        <div class="cfs-bg">
            <div class="cfs-bg-blob-1"></div>
            <div class="cfs-bg-blob-2"></div>
        </div>

        <div class="container">

            <!-- Header -->
            <div class="cfs-header">
                <div class="cfs-pill">
                    <?= cfsIcon('sparkles') ?>
                    <span>Get In Touch</span>
                </div>

                <h2 class="cfs-heading">
                    Let's
                    <span class="accent">
                        Work Together
                        <svg viewBox="0 0 300 6" preserveAspectRatio="none">
                            <path d="M2 3C60 1 240 1 298 3" stroke="#C4007A" stroke-width="2" stroke-linecap="round" fill="none" opacity="0.3"/>
                        </svg>
                    </span>
                </h2>

                <p class="cfs-subtitle">
                    Creating digital experiences that help you grow is what we do best.
                    Tell us about your needs, we would love to help.
                </p>
            </div>

            <!-- Grid -->
            <div class="cfs-grid">

                <!-- LEFT — Info Card -->
                <div class="cfs-info-wrap">
                    <div class="cfs-info-card">

                        <!-- Decorative shapes -->
                        <div class="cfs-info-deco">
                            <svg viewBox="0 0 100 100">
                                <rect x="15" y="15" width="70" height="70" transform="rotate(45 50 50)" />
                            </svg>
                        </div>

                        <div class="cfs-info-content">

                            <!-- Header -->
                            <div class="cfs-info-top">
                                <p class="cfs-connect">
                                    <span class="dot"></span>
                                    Let's Connect
                                </p>
                                <h3 class="cfs-info-title">
                                    Let's work <span class="accent">together</span>
                                </h3>
                                <p class="cfs-info-desc">
                                    We'd love to hear about your project and how we can help.
                                </p>
                            </div>

                            <!-- Contact For -->
                            <div class="cfs-contact-for">
                                <p class="label">Contact For</p>
                                <p class="value">Digital, Ecommerce, Creative, PR &amp; Websites</p>
                            </div>

                            <!-- Contact Lines -->
                            <div class="cfs-contact-lines">
                                <?php foreach ($contactInfo as $item): ?>
                                    <a
                                        href="<?= htmlspecialchars($item['href']) ?>"
                                        class="cfs-contact-item"
                                        <?= $item['external'] ? 'target="_blank" rel="noopener noreferrer"' : '' ?>
                                    >
                                        <span class="cfs-contact-icon">
                                            <?= cfsIcon($item['icon']) ?>
                                        </span>
                                        <div class="cfs-contact-text">
                                            <p class="label"><?= htmlspecialchars($item['label']) ?></p>
                                            <p class="value"><?= htmlspecialchars($item['value']) ?></p>
                                        </div>
                                    </a>
                                <?php endforeach; ?>
                            </div>

                            <!-- Working Hours -->
                            <div class="cfs-hours">
                                <?= cfsIcon('clock') ?>
                                <div>
                                    <p class="label">Working Hours</p>
                                    <p class="value">Mon - Sat: 9:00 AM - 7:00 PM</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- RIGHT — Form Card -->
                <div class="cfs-form-wrap">
                    <div class="cfs-form-card">

                        <!-- Success State (hidden by default) -->
                        <div class="cfs-success" id="cfsSuccess" style="display: none;">
                            <div class="cfs-success-icon">
                                <?= cfsIcon('check') ?>
                            </div>
                            <h3>Message Sent!</h3>
                            <p>Thank you for reaching out. We'll get back to you within 24 hours.</p>
                        </div>

                        <!-- Form -->
                        <form class="cfs-form" id="cfsForm" method="POST" action="/contact.php">

                            <p class="cfs-required-note">
                                <span>*</span> required fields
                            </p>

                            <!-- Row 1: Name + Email -->
                            <div class="cfs-form-row">
                                <div>
                                    <label class="cfs-field-label">
                                        Full Name <span>*</span>
                                    </label>
                                    <div class="cfs-input-wrap">
                                        <?= cfsIcon('user') ?>
                                        <input type="text" name="name" class="cfs-input" placeholder="Your full name" required>
                                    </div>
                                </div>
                                <div>
                                    <label class="cfs-field-label">
                                        Email Address <span>*</span>
                                    </label>
                                    <div class="cfs-input-wrap">
                                        <?= cfsIcon('mail') ?>
                                        <input type="email" name="email" class="cfs-input" placeholder="you@example.com" required>
                                    </div>
                                </div>
                            </div>

                            <!-- Row 2: Phone + Company -->
                            <div class="cfs-form-row">
                                <div>
                                    <label class="cfs-field-label">
                                        Phone Number <span>*</span>
                                    </label>
                                    <div class="cfs-input-wrap">
                                        <?= cfsIcon('phone') ?>
                                        <input type="tel" name="phone" class="cfs-input" placeholder="+91 XXXXX XXXXX" required>
                                    </div>
                                </div>
                                <div>
                                    <label class="cfs-field-label">
                                        Company Name
                                    </label>
                                    <div class="cfs-input-wrap">
                                        <?= cfsIcon('globe') ?>
                                        <input type="text" name="company" class="cfs-input" placeholder="Your company name">
                                    </div>
                                </div>
                            </div>

                            <!-- Message -->
                            <div class="cfs-message-field">
                                <label class="cfs-field-label">
                                    Your Message <span>*</span>
                                </label>
                                <div class="cfs-input-wrap textarea-wrap">
                                    <?= cfsIcon('message') ?>
                                    <textarea name="message" class="cfs-textarea" placeholder="Tell us about your needs..." required></textarea>
                                </div>
                            </div>

                            <!-- Consent -->
                            <label class="cfs-consent">
                                <input type="checkbox" name="consent" checked required>
                                <span>Yes, I'm happy for you to use my information.</span>
                            </label>

                            <!-- Submit -->
                            <button type="submit" class="cfs-submit" id="cfsSubmit">
                                <span class="cfs-submit-text">Send Message</span>
                                <?= cfsIcon('send') ?>
                            </button>

                            <!-- Trust Badges -->
                            <div class="cfs-trust">
                                <span class="cfs-trust-item">
                                    <?= cfsIcon('check') ?>
                                    Secure Form
                                </span>
                                <span class="cfs-trust-divider"></span>
                                <span class="cfs-trust-item">
                                    <?= cfsIcon('check') ?>
                                    24/7 Support
                                </span>
                                <span class="cfs-trust-divider"></span>
                                <span class="cfs-trust-item">
                                    <?= cfsIcon('check') ?>
                                    Fast Response
                                </span>
                            </div>

                        </form>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <script>
        (function () {
            const form = document.getElementById('cfsForm');
            const submitBtn = document.getElementById('cfsSubmit');
            const successBox = document.getElementById('cfsSuccess');
            if (!form) return;

            form.addEventListener('submit', function (e) {
                // Let the native form submit for real backend handling
                // But show loading state briefly
                submitBtn.disabled = true;
                const textSpan = submitBtn.querySelector('.cfs-submit-text');
                const originalHTML = submitBtn.innerHTML;

                if (textSpan) {
                    submitBtn.innerHTML = '<span class="spinner"></span> Sending...';
                }

                // If you want AJAX submission, uncomment below and prevent default
                // Otherwise, this loading state will disappear on page reload

                // Optional: Re-enable after 5s in case of failed submission
                setTimeout(() => {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalHTML;
                }, 5000);
            });
        })();
    </script>
    <?php
}