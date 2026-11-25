<?php
function renderContactFormSection(): void
{
    $contactInfo = [
        ['icon' => 'mail',       'label' => 'Email',              'value' => 'info@webtecmart.com',  'href' => 'mailto:info@webtecmart.com', 'external' => false],
        ['icon' => 'phone',      'label' => 'Phone / WhatsApp',   'value' => '+91-9999674255',       'href' => 'tel:+919999674255',          'external' => false],
        ['icon' => 'headphones', 'label' => 'Technical Support',  'value' => '+91-9511012625',       'href' => 'tel:+919511012625',          'external' => false],
        ['icon' => 'globe',      'label' => 'Website',            'value' => 'www.webtecmart.com',   'href' => 'https://www.webtecmart.com', 'external' => true],
    ];

    if (!function_exists('cfsIcon')) {
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
                'service'    => '<path d="M20 7h-9"/><path d="M14 17H5"/><circle cx="17" cy="17" r="3"/><circle cx="7" cy="7" r="3"/>',
            ];
            $path = $icons[$name] ?? '';
            return '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">' . $path . '</svg>';
        }
    }
    ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,600;12..96,800&display=swap" rel="stylesheet">

    <style>
        /* ============================================================
           CONTACT — "Expo Floor" colour edition (matches portfolio)
           ============================================================ */
        .xpc {
            --pink:#C4007A; --pink2:#E0398F; --pink3:#FF7BC0;
            --deep:#7E004E; --head:#5E0B45;
            --blush:#FBEAF3; --soft:#FFF4FA;
            --gold:#FFB547; --mint:#0E9F6E;
            --text:#4A3342; --mute:#7A6574;
            --line:rgba(126,0,78,.14);
            --disp:'Bricolage Grotesque','Plus Jakarta Sans',system-ui,sans-serif;
            position:relative; width:100%; padding:76px 0; overflow-x:clip; color:var(--text);
            font-family:'Plus Jakarta Sans',system-ui,-apple-system,sans-serif;
            background:var(--soft) radial-gradient(rgba(126,0,78,.07) 1px,transparent 1.2px) 0 0/24px 24px;
        }
        .xpc *, .xpc *::before, .xpc *::after { box-sizing:border-box; }
        .xpc h2, .xpc h3 { font-family:var(--disp); letter-spacing:-.02em; }
        /* pink/gold awning scallop */
        .xpc::before {
            content:''; position:absolute; top:0; left:0; right:0; height:18px; pointer-events:none;
            background:
                radial-gradient(circle at 18px 0, var(--pink) 17px, transparent 18px) 0 0/36px 18px repeat-x,
                radial-gradient(circle at 18px 0, var(--gold) 17px, transparent 18px) 18px 0/36px 18px repeat-x;
        }
        .xpc a:focus-visible,.xpc button:focus-visible,.xpc input:focus-visible,.xpc select:focus-visible,.xpc textarea:focus-visible { outline:3px solid var(--gold); outline-offset:2px; }
        .xpc-wrap { position:relative; max-width:1200px; margin:0 auto; padding:0 22px; }
        @media (min-width:1440px){ .xpc-wrap { max-width:1320px; } }

        /* Header */
        .xpc-head { max-width:760px; margin:0 auto 40px; text-align:center; }
        .xpc-kicker {
            display:inline-block; margin-bottom:12px; padding-left:14px; border-left:4px solid var(--pink);
            font-size:.82rem; font-weight:800; color:var(--pink); text-align:left;
            text-transform:uppercase; letter-spacing:.06em;
        }
        .xpc-head h2 {
            margin:0 0 14px; font-family:var(--disp); font-size:clamp(1.85rem,3.5vw,2.8rem);
            font-weight:800; line-height:1.1; letter-spacing:-.02em; color:var(--head);
        }
        .xpc-head h2 span { color:var(--pink); }
        .xpc-bar { display:block; width:84px; height:7px; margin:0 auto 16px; background:repeating-linear-gradient(90deg,var(--pink) 0 12px,var(--gold) 12px 24px); }
        .xpc-head p { margin:0; color:var(--mute); line-height:1.65; font-size:1.02rem; }

        /* Grid */
        .xpc-grid { display:grid; gap:28px; grid-template-columns:minmax(0,1fr); align-items:stretch; }
        .xpc-grid > * { min-width:0; display:flex; }
        @media (min-width:1024px){ .xpc-grid { grid-template-columns:2fr 3fr; gap:40px; } }

        /* LEFT — info (deep-pink hall) */
        .xpc-info {
            position:relative; width:100%; display:flex; flex-direction:column; padding:34px 28px; overflow:hidden;
            color:#fff; border:2px solid var(--deep); border-radius:22px; box-shadow:8px 8px 0 var(--gold);
            background:
                radial-gradient(60% 70% at 85% 10%, rgba(255,255,255,.18), transparent 65%),
                radial-gradient(40% 50% at 0% 100%, rgba(255,181,71,.3), transparent 70%),
                linear-gradient(135deg, #A8006A 0%, #C4007A 45%, #E0398F 100%);
        }
        .xpc-info::before {
            content:''; position:absolute; inset:0; background-image:radial-gradient(rgba(255,255,255,.15) 1px,transparent 1.2px); background-size:26px 26px;
            -webkit-mask-image:linear-gradient(180deg,#000 20%,transparent 95%); mask-image:linear-gradient(180deg,#000 20%,transparent 95%);
            pointer-events:none;
        }
        .xpc-info > * { position:relative; }
        .xpc-tag {
            align-self:flex-start; display:inline-flex; align-items:center; gap:8px; padding:6px 14px 6px 10px; margin-bottom:16px;
            border-radius:999px; background:rgba(255,255,255,.18); border:1px solid rgba(255,255,255,.45);
            font-size:.78rem; font-weight:700; color:#fff;
        }
        .xpc-tag i { width:8px; height:8px; border-radius:50%; background:var(--gold); box-shadow:0 0 0 4px rgba(255,181,71,.3); }
        .xpc-info h3 { margin:0 0 8px; font-family:var(--disp); font-size:clamp(1.5rem,2.6vw,2rem); font-weight:800; line-height:1.12; letter-spacing:-.02em; color:#fff; text-shadow:0 3px 0 var(--deep), 0 6px 18px rgba(126,0,78,.4); }
        .xpc-info h3 span { color:var(--gold); }
        .xpc-info-desc { margin:0 0 20px; font-size:.94rem; line-height:1.65; color:rgba(255,255,255,.88); }
        .xpc-for { margin-bottom:16px; padding:12px 14px; border-radius:14px; background:rgba(255,255,255,.12); border:1px dashed rgba(255,181,71,.65); }
        .xpc-for b { display:block; margin-bottom:3px; font-size:.72rem; font-weight:800; color:var(--gold); text-transform:uppercase; letter-spacing:.06em; }
        .xpc-for span { font-size:.9rem; font-weight:700; color:#fff; }
        .xpc-lines { display:grid; gap:10px; flex:1; align-content:start; }
        .xpc-line {
            display:flex; align-items:center; gap:12px; padding:11px 12px; border-radius:14px;
            background:rgba(255,255,255,.12); border:1px solid rgba(255,255,255,.25);
            color:#fff; text-decoration:none; transition:translate .2s, background .2s, border-color .2s;
        }
        .xpc-line:hover { translate:4px 0; background:rgba(255,255,255,.2); border-color:var(--gold); color:#fff; }
        .xpc-ico {
            display:grid; place-items:center; flex-shrink:0; width:40px; height:40px; border-radius:11px;
            background:var(--gold); color:var(--deep); border:2px solid var(--deep); box-shadow:3px 3px 0 var(--deep);
        }
        .xpc-ico svg { width:18px; height:18px; }
        .xpc-line div { min-width:0; }
        .xpc-line small { display:block; font-size:.72rem; font-weight:700; color:rgba(255,255,255,.72); }
        .xpc-line strong { display:block; font-size:.92rem; font-weight:800; overflow:hidden; text-overflow:ellipsis; white-space:nowrap; }
        .xpc-hours { display:flex; align-items:center; gap:12px; margin-top:20px; padding-top:18px; border-top:2px dashed rgba(255,255,255,.35); }
        .xpc-hours svg { width:22px; height:22px; flex-shrink:0; color:var(--gold); }
        .xpc-hours small { display:block; font-size:.72rem; font-weight:700; color:rgba(255,255,255,.72); }
        .xpc-hours strong { font-size:.92rem; font-weight:800; }

        /* RIGHT — form (white badge card) */
        .xpc-form-card {
            position:relative; width:100%; display:flex; flex-direction:column; padding:36px 30px 28px;
            background:#fff; border:2px solid var(--deep); border-radius:22px; box-shadow:8px 8px 0 var(--gold);
        }
        .xpc-form-card::before {
            content:''; position:absolute; top:12px; left:50%; width:52px; height:9px; margin-left:-26px;
            border-radius:99px; background:var(--pink);
        }
        .xpc-note { margin:0 0 16px; font-size:.8rem; font-weight:700; color:var(--mute); }
        .xpc-note span { color:var(--pink); }
        .xpc-row { display:grid; gap:14px; grid-template-columns:minmax(0,1fr); margin-bottom:14px; }
        .xpc-row > * { min-width:0; }
        @media (min-width:640px){ .xpc-row--2 { grid-template-columns:repeat(2,minmax(0,1fr)); } }
        .xpc-label { display:block; margin-bottom:6px; font-size:.82rem; font-weight:800; color:var(--head); }
        .xpc-label span { color:var(--pink); }
        .xpc-wrapi { position:relative; }
        .xpc-wrapi > svg { position:absolute; left:13px; top:50%; translate:0 -50%; width:16px; height:16px; color:var(--pink); pointer-events:none; }
        .xpc-wrapi--ta > svg { top:15px; translate:none; }
        .xpc-input,.xpc-select,.xpc-textarea {
            width:100%; min-width:0; padding:13px 14px 13px 38px; border-radius:10px; border:2px solid #E4DCE6;
            background:#FCFAFD; font:inherit; font-size:.92rem; color:var(--deep); transition:border-color .2s, box-shadow .2s, background .2s;
        }
        .xpc-input::placeholder,.xpc-textarea::placeholder { color:#9A91A1; }
        .xpc-input:focus,.xpc-select:focus,.xpc-textarea:focus { border-color:var(--pink); background:#fff; outline:none; box-shadow:0 0 0 4px rgba(196,0,122,.14); }
        .xpc-select {
            appearance:none; -webkit-appearance:none; -moz-appearance:none; cursor:pointer; padding-right:36px;
            color-scheme:light; accent-color:var(--pink);
            background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23C4007A' stroke-width='2.5' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='m6 9 6 6 6-6'/%3E%3C/svg%3E");
            background-repeat:no-repeat; background-position:right 12px center; background-size:14px 14px;
        }
        .xpc-select:invalid { color:#9A91A1; }
        .xpc-select option { color:var(--deep); background:#fff; }
        .xpc-textarea { resize:vertical; min-height:110px; height:100%; }
        .xpc-msg { display:flex; flex-direction:column; flex:1; margin-bottom:14px; }
        .xpc-msg .xpc-wrapi { flex:1; display:flex; }
        .xpc-consent { display:flex; align-items:flex-start; gap:9px; margin-bottom:16px; font-size:.84rem; color:var(--text); cursor:pointer; }
        .xpc-consent input { margin-top:3px; width:15px; height:15px; accent-color:var(--pink); flex-shrink:0; cursor:pointer; }
        .xpc-submit {
            display:flex; align-items:center; justify-content:center; gap:10px; width:100%; padding:15px 24px;
            border:2px solid var(--deep); border-radius:12px; background:var(--pink); color:#fff;
            font:800 .98rem/1.2 inherit; font-family:inherit; cursor:pointer;
            box-shadow:0 6px 0 var(--deep); transition:translate .2s, box-shadow .2s;
        }
        .xpc-submit:hover:not(:disabled) { translate:0 2px; box-shadow:0 4px 0 var(--deep); }
        .xpc-submit:active:not(:disabled) { translate:0 6px; box-shadow:0 0 0 var(--deep); }
        .xpc-submit:disabled { opacity:.7; cursor:wait; }
        .xpc-submit svg { width:17px; height:17px; flex-shrink:0; }
        .xpc-trust {
            display:flex; flex-wrap:wrap; align-items:center; justify-content:center; gap:8px 14px;
            margin-top:18px; padding:12px 14px; margin-inline:-30px; margin-bottom:-28px;
            background:var(--blush); border-top:2px dashed rgba(196,0,122,.35);
            border-radius:0 0 20px 20px; font-size:.78rem; font-weight:700; color:var(--deep);
        }
        .xpc-trust span { display:inline-flex; align-items:center; gap:5px; }
        .xpc-trust svg { width:14px; height:14px; color:var(--mint); }

        /* Success */
        .xpc-success { display:none; flex-direction:column; align-items:center; justify-content:center; flex:1; text-align:center; padding:36px 0; }
        .xpc-success-ico {
            display:grid; place-items:center; width:64px; height:64px; margin-bottom:16px; border-radius:16px;
            background:#E6F8F0; color:var(--mint); border:2px solid var(--deep); box-shadow:4px 4px 0 var(--gold);
        }
        .xpc-success-ico svg { width:30px; height:30px; }
        .xpc-success h3 { margin:0 0 8px; font-family:var(--disp); font-size:1.5rem; font-weight:800; color:var(--head); }
        .xpc-success p { margin:0; max-width:360px; font-size:.94rem; line-height:1.6; color:var(--mute); }

        @keyframes cfs-spin { to { transform:rotate(360deg); } }

        @media (max-width:575px){
            .xpc { padding:56px 0; } .xpc-wrap { padding:0 16px; }
            .xpc-info { padding:28px 20px; box-shadow:5px 5px 0 var(--gold); }
            .xpc-form-card { padding:34px 18px 24px; box-shadow:5px 5px 0 var(--gold); }
            .xpc-trust { margin-inline:-18px; margin-bottom:-24px; }
            .xpc-input,.xpc-select,.xpc-textarea { font-size:16px; }
        }
        @media (hover:none){ .xpc-line:hover { translate:none; } }
        @media (prefers-reduced-motion:reduce){ .xpc-line,.xpc-submit { transition:none; } }
    </style>

    <section class="xpc" id="contactSection">
        <div class="xpc-wrap">

            <div class="xpc-head" data-wtm-reveal="fade-up">
                <span class="xpc-kicker">Get in touch</span>
                <h2>Let's <span>Work Together</span></h2>
                <i class="xpc-bar"></i>
                <p>Creating digital experiences that help you grow is what we do best. Tell us about your needs, we would love to help.</p>
            </div>

            <div class="xpc-grid">

                <!-- LEFT — Info -->
                <div data-wtm-reveal="fade-right">
                    <div class="xpc-info">
                        <div class="xpc-tag"><i></i><span>Let's connect</span></div>
                        <h3>Let's work <span>together</span></h3>
                        <p class="xpc-info-desc">We'd love to hear about your project and how we can help.</p>

                        <div class="xpc-for">
                            <b>Contact for</b>
                            <span>Digital, Ecommerce, Creative, PR &amp; Websites</span>
                        </div>

                        <div class="xpc-lines">
                            <?php foreach ($contactInfo as $item): ?>
                                <a
                                    href="<?= htmlspecialchars($item['href']) ?>"
                                    class="xpc-line"
                                    <?= $item['external'] ? 'target="_blank" rel="noopener noreferrer"' : '' ?>
                                >
                                    <span class="xpc-ico"><?= cfsIcon($item['icon']) ?></span>
                                    <div>
                                        <small><?= htmlspecialchars($item['label']) ?></small>
                                        <strong><?= htmlspecialchars($item['value']) ?></strong>
                                    </div>
                                </a>
                            <?php endforeach; ?>
                        </div>

                        <div class="xpc-hours">
                            <?= cfsIcon('clock') ?>
                            <div>
                                <small>Working Hours</small>
                                <strong>Mon - Sat: 9:00 AM - 7:00 PM</strong>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- RIGHT — Form -->
                <div data-wtm-reveal="fade-left">
                    <div class="xpc-form-card">

                        <div class="xpc-success" id="cfsSuccess">
                            <div class="xpc-success-ico"><?= cfsIcon('check') ?></div>
                            <h3>Message Sent!</h3>
                            <p>Thank you for reaching out. We'll get back to you within 24 hours.</p>
                        </div>

                        <form class="cfs-form" id="cfsForm" method="POST" action="/contact.php" style="display:flex; flex-direction:column; flex:1;">

                            <p class="xpc-note"><span>*</span> required fields</p>

                            <div class="xpc-row xpc-row--2">
                                <div>
                                    <label class="xpc-label">Full Name <span>*</span></label>
                                    <div class="xpc-wrapi">
                                        <?= cfsIcon('user') ?>
                                        <input type="text" name="name" class="xpc-input" placeholder="Your full name" required>
                                    </div>
                                </div>
                                <div>
                                    <label class="xpc-label">Email Address <span>*</span></label>
                                    <div class="xpc-wrapi">
                                        <?= cfsIcon('mail') ?>
                                        <input type="email" name="email" class="xpc-input" placeholder="you@example.com" required>
                                    </div>
                                </div>
                            </div>

                            <div class="xpc-row xpc-row--2">
                                <div>
                                    <label class="xpc-label">Phone Number <span>*</span></label>
                                    <div class="xpc-wrapi">
                                        <?= cfsIcon('phone') ?>
                                        <input type="tel" name="phone" class="xpc-input" placeholder="+91 XXXXX XXXXX" required>
                                    </div>
                                </div>
                                <div>
                                    <label class="xpc-label">Company Name</label>
                                    <div class="xpc-wrapi">
                                        <?= cfsIcon('globe') ?>
                                        <input type="text" name="company" class="xpc-input" placeholder="Your company name">
                                    </div>
                                </div>
                            </div>

                            <div class="xpc-row">
                                <div>
                                    <label class="xpc-label">Service Required <span>*</span></label>
                                    <div class="xpc-wrapi">
                                        <?= cfsIcon('service') ?>
                                        <select name="service" class="xpc-select" required>
                                            <option value="" disabled selected>Select a service</option>
                                            <option value="digital-business-branding">Digital Business Branding</option>
                                            <option value="website-design-development">Website Design &amp; Development</option>
                                            <option value="seo-services-delhi">SEO Services in Delhi</option>
                                            <option value="meta-google-ads">Meta / Google Ads</option>
                                            <option value="social-media-advertising">Social Media Advertising</option>
                                            <option value="social-media-optimization">Social Media Optimization</option>
                                            <option value="search-engine-marketing">Search Engine Marketing</option>
                                            <option value="mobile-app-development">Mobile App Development</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="xpc-msg">
                                <label class="xpc-label">Your Message <span>*</span></label>
                                <div class="xpc-wrapi xpc-wrapi--ta">
                                    <?= cfsIcon('message') ?>
                                    <textarea name="message" class="xpc-textarea" placeholder="Tell us about your needs..." required></textarea>
                                </div>
                            </div>

                            <label class="xpc-consent">
                                <input type="checkbox" name="consent" checked required>
                                <span>Yes, I'm happy for you to use my information.</span>
                            </label>

                            <button type="submit" class="xpc-submit" id="cfsSubmit">
                                <span class="cfs-submit-text">Send Message</span>
                                <?= cfsIcon('send') ?>
                            </button>

                            <div class="xpc-trust">
                                <span><?= cfsIcon('check') ?>Secure Form</span>
                                <span><?= cfsIcon('check') ?>24/7 Support</span>
                                <span><?= cfsIcon('check') ?>Fast Response</span>
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
                e.preventDefault();
                if (!form.checkValidity()) {
                    form.reportValidity();
                    return;
                }

                submitBtn.disabled = true;
                const originalHTML = submitBtn.innerHTML;
                submitBtn.innerHTML = '<span style="display:inline-block;width:16px;height:16px;border:2px solid #fff;border-right-color:transparent;border-radius:50%;animation:cfs-spin .6s linear infinite;margin-right:8px;vertical-align:middle;"></span> Sending...';

                const formData = new FormData(form);
                formData.append('ajax', '1');

                const oldErr = form.querySelector('.cfs-ajax-error');
                if (oldErr) oldErr.remove();

                fetch('/contact.php', {
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    },
                    body: formData
                })
                .then(r => r.json())
                .then(data => {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalHTML;
                    if (data.success) {
                        form.reset();
                        form.style.display = 'none';
                        if (successBox) {
                            successBox.style.display = 'flex';
                            const p = successBox.querySelector('p');
                            if (p && data.message) p.textContent = data.message;
                            successBox.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        }
                    } else {
                        const err = document.createElement('div');
                        err.className = 'cfs-ajax-error';
                        err.style.cssText = 'background:#ffe6ea;border:2px solid #9e0034;color:#9e0034;padding:12px 16px;border-radius:12px;margin-bottom:16px;font-weight:700;font-size:0.92rem;';
                        err.textContent = data.message || 'Please check your inputs.';
                        form.insertBefore(err, form.firstChild);
                        err.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }
                })
                .catch(() => {
                    form.submit();
                });
            });
        })();

        function cfsResetForm() {
            const form = document.getElementById('cfsForm');
            const successBox = document.getElementById('cfsSuccess');
            if (form) {
                form.reset();
                form.style.display = 'flex';
            }
            if (successBox) {
                successBox.style.display = 'none';
            }
        }
    </script>
    <?php
}