<?php
// footer-exhibition.php  —  matches the B2B & Exhibition SEO "Expo Floor" design
// Place before </main> or include at the bottom of the page.
$arrowF = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>';
$phoneF = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>';
$mailF  = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>';
$pinF   = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"/><circle cx="12" cy="10" r="3"/></svg>';
$clockF = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>';
?>

<style>
/* ============================================================
   FOOTER — "Expo Floor" theme (matches .xp page tokens)
   ============================================================ */
.xpf {
    --ink: #1A0613;
    --ink2: #2B0B20;
    --pink: #C4007A;
    --pink2: #E0398F;
    --blush: #FBEAF3;
    --gold: #FFB547;
    --mint: #0E9F6E;
    --text: #2A2430;
    --mute: #6C6474;
    --line: rgba(255,255,255,.12);
    --disp: 'Bricolage Grotesque', 'Plus Jakarta Sans', system-ui, sans-serif;
    position: relative;
    background: var(--ink);
    color: #fff;
    font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
    overflow: clip;
}
.xpf *, .xpf *::before, .xpf *::after { box-sizing: border-box; }
.xpf h2, .xpf h3, .xpf h4, .xpf b, .xpf strong { font-family: var(--disp); margin: 0; letter-spacing: -.02em; }
.xpf p, .xpf ul, .xpf li, .xpf a { margin: 0; }
.xpf a { color: inherit; text-decoration: none; }
.xpf a:focus-visible, .xpf button:focus-visible, .xpf input:focus-visible {
    outline: 3px solid var(--gold);
    outline-offset: 3px;
}

/* dotted floor-plan backdrop, same as hero */
.xpf::before {
    content: '';
    position: absolute;
    inset: 0;
    background-image: radial-gradient(rgba(255,255,255,.1) 1px, transparent 1.2px);
    background-size: 26px 26px;
    -webkit-mask-image: linear-gradient(180deg, transparent 0%, #000 35%, #000 100%);
            mask-image: linear-gradient(180deg, transparent 0%, #000 35%, #000 100%);
    pointer-events: none;
}
.xpf::after {
    content: '';
    position: absolute;
    inset: 0;
    pointer-events: none;
    background:
        radial-gradient(55% 70% at 0% 0%, rgba(196,0,122,.35), transparent 65%),
        radial-gradient(45% 60% at 100% 10%, rgba(255,181,71,.14), transparent 70%);
}
.xpf-wrap { position: relative; z-index: 1; max-width: 1200px; margin: 0 auto; padding: 0 22px; }

/* awning strip along the very top of the footer */
.xpf-awning {
    position: relative;
    z-index: 2;
    height: 20px;
    background: repeating-linear-gradient(90deg, var(--pink) 0 26px, var(--ink) 26px 52px);
    border-bottom: 2px solid var(--gold);
}

/* ---- top band: mini CTA ticket stub ---- */
.xpf-band {
    position: relative;
    z-index: 1;
    display: grid;
    gap: 20px;
    align-items: center;
    padding: 34px 0;
    border-bottom: 1px dashed var(--line);
}
@media (min-width: 900px) {
    .xpf-band { grid-template-columns: 1.3fr .7fr; }
}
.xpf-band h2 {
    font-size: clamp(1.5rem, 2.8vw, 2.15rem);
    font-weight: 800;
    line-height: 1.12;
    margin-bottom: 8px;
}
.xpf-band h2 span { color: var(--gold); }
.xpf-band p { color: rgba(255,255,255,.66); line-height: 1.6; font-size: .95rem; }
.xpf-band-actions { display: flex; flex-wrap: wrap; gap: 12px; }

.xpf-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 9px;
    padding: 13px 22px;
    border-radius: 11px;
    font-weight: 700;
    font-size: .9rem;
    line-height: 1;
    border: 2px solid transparent;
    white-space: nowrap;
    transition: transform .2s ease, box-shadow .2s ease, background .2s ease;
}
.xpf-btn svg { flex-shrink: 0; }
.xpf-btn--pink {
    background: var(--pink);
    color: #fff !important;
    box-shadow: 0 5px 0 #7E004E;
}
.xpf-btn--pink:hover { translate: 0 2px; box-shadow: 0 3px 0 #7E004E; }
.xpf-btn--pink:active { translate: 0 5px; box-shadow: 0 0 0 #7E004E; }
.xpf-btn--gold {
    background: var(--gold);
    color: var(--ink) !important;
    box-shadow: 0 5px 0 #B77400;
}
.xpf-btn--gold:hover { translate: 0 2px; box-shadow: 0 3px 0 #B77400; }

/* ---- main columns ---- */
.xpf-main {
    position: relative;
    z-index: 1;
    display: grid;
    gap: 40px;
    padding: 52px 0 44px;
    grid-template-columns: minmax(0, 1fr);
}
@media (min-width: 640px) {
    .xpf-main { grid-template-columns: repeat(2, minmax(0, 1fr)); }
}
@media (min-width: 992px) {
    .xpf-main { grid-template-columns: 1.35fr .8fr .8fr 1.15fr; gap: 48px; }
}

.xpf-brand-badge {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 18px;
}
.xpf-logo {
    display: grid;
    place-items: center;
    width: 44px;
    height: 44px;
    border-radius: 11px;
    background: var(--pink);
    color: #fff;
    font-family: var(--disp);
    font-weight: 800;
    font-size: 1.2rem;
    border: 2px solid var(--gold);
    box-shadow: 3px 3px 0 var(--gold);
    flex-shrink: 0;
}
.xpf-brand-badge b {
    font-size: 1.3rem;
    font-weight: 800;
    line-height: 1.1;
}
.xpf-brand-badge small {
    display: block;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: .7rem;
    font-weight: 600;
    letter-spacing: .12em;
    text-transform: uppercase;
    color: var(--gold);
    margin-top: 3px;
}
.xpf-about {
    color: rgba(255,255,255,.66);
    line-height: 1.7;
    font-size: .92rem;
    margin-bottom: 22px;
    max-width: 340px;
}

/* ticket-stub contact card */
.xpf-stub {
    position: relative;
    background: var(--ink2);
    border: 2px solid var(--gold);
    border-radius: 14px;
    padding: 18px 18px 16px;
    max-width: 360px;
}
.xpf-stub::before, .xpf-stub::after {
    content: '';
    position: absolute;
    top: 50%;
    width: 14px;
    height: 14px;
    margin-top: -7px;
    border-radius: 50%;
    background: var(--ink);
    border: 2px solid var(--gold);
}
.xpf-stub::before { left: -9px; }
.xpf-stub::after { right: -9px; }
.xpf-stub small {
    display: block;
    font-size: .68rem;
    font-weight: 800;
    letter-spacing: .14em;
    text-transform: uppercase;
    color: var(--gold);
    margin-bottom: 10px;
}
.xpf-stub-row {
    display: flex;
    gap: 10px;
    align-items: flex-start;
    font-size: .88rem;
    line-height: 1.5;
    color: rgba(255,255,255,.85);
    padding: 7px 0;
    border-top: 1px dashed rgba(255,255,255,.14);
}
.xpf-stub-row:first-of-type { border-top: 0; }
.xpf-stub-row svg { color: var(--pink2); flex-shrink: 0; margin-top: 2px; }
.xpf-stub-row a { color: #fff; font-weight: 700; }
.xpf-stub-row a:hover { color: var(--gold); }
.xpf-stub-row span { display: block; font-size: .76rem; color: rgba(255,255,255,.5); font-weight: 500; }

/* link columns */
.xpf-col h3 {
    font-size: .8rem;
    font-weight: 800;
    letter-spacing: .13em;
    text-transform: uppercase;
    color: var(--gold);
    padding-bottom: 12px;
    margin-bottom: 16px;
    border-bottom: 2px solid rgba(255,255,255,.1);
    position: relative;
}
.xpf-col h3::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: -2px;
    width: 38px;
    height: 2px;
    background: var(--pink);
}
.xpf-links { list-style: none; padding: 0; display: grid; gap: 9px; }
.xpf-links a {
    display: inline-flex;
    align-items: center;
    gap: 9px;
    font-size: .9rem;
    color: rgba(255,255,255,.7);
    line-height: 1.45;
    transition: color .2s ease, translate .2s ease;
}
.xpf-links a::before {
    content: '';
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background: var(--pink);
    flex-shrink: 0;
    transition: background .2s ease, scale .2s ease;
}
.xpf-links a:hover { color: #fff; translate: 4px 0; }
.xpf-links a:hover::before { background: var(--gold); scale: 1.3; }

/* newsletter — "register your badge" */
.xpf-news h3 { margin-bottom: 14px; }
.xpf-news p {
    font-size: .88rem;
    line-height: 1.6;
    color: rgba(255,255,255,.62);
    margin-bottom: 16px;
}
.xpf-form { display: grid; gap: 10px; }
.xpf-form-row {
    display: grid;
    grid-template-columns: minmax(0, 1fr);
    gap: 10px;
}
.xpf-input {
    width: 100%;
    min-width: 0;
    padding: 13px 14px;
    border-radius: 10px;
    border: 2px solid rgba(255,255,255,.16);
    background: rgba(255,255,255,.06);
    color: #fff;
    font-family: inherit;
    font-size: .9rem;
    transition: border-color .2s, background .2s, box-shadow .2s;
}
.xpf-input::placeholder { color: rgba(255,255,255,.4); }
.xpf-input:focus {
    outline: none;
    border-color: var(--gold);
    background: rgba(255,255,255,.1);
    box-shadow: 0 0 0 4px rgba(255,181,71,.16);
}
.xpf-form .xpf-btn { width: 100%; }
.xpf-form-note {
    font-size: .72rem;
    color: rgba(255,255,255,.4);
    line-height: 1.5;
    margin-top: 2px;
}
.xpf-msg {
    display: none;
    margin-top: 10px;
    padding: 11px 13px;
    border-radius: 9px;
    font-size: .82rem;
    font-weight: 600;
    background: rgba(14,159,110,.16);
    border: 1px solid rgba(14,159,110,.5);
    color: #7BF0C4;
}
.xpf-msg.on { display: block; }

/* social chips — lanyard-badge look */
.xpf-social { display: flex; gap: 9px; margin-top: 18px; flex-wrap: wrap; }
.xpf-social a {
    display: grid;
    place-items: center;
    width: 40px;
    height: 40px;
    border-radius: 10px;
    background: rgba(255,255,255,.07);
    border: 2px solid rgba(255,255,255,.14);
    color: rgba(255,255,255,.8);
    transition: background .2s, border-color .2s, color .2s, translate .2s, box-shadow .2s;
}
.xpf-social a:hover {
    background: var(--gold);
    border-color: var(--gold);
    color: var(--ink);
    translate: 0 -3px;
    box-shadow: 0 4px 0 #B77400;
}

/* ---- stat ribbon (reuses the marquee idea) ---- */
.xpf-ribbon {
    position: relative;
    z-index: 1;
    overflow: hidden;
    border-top: 2px solid rgba(255,255,255,.1);
    border-bottom: 2px solid rgba(255,255,255,.1);
    background: rgba(255,255,255,.03);
}
.xpf-ribbon-track {
    display: flex;
    width: max-content;
    animation: xpfRun 40s linear infinite;
}
.xpf-ribbon:hover .xpf-ribbon-track { animation-play-state: paused; }
.xpf-ribbon span {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    padding: 13px 30px;
    font-family: var(--disp);
    font-weight: 700;
    font-size: .88rem;
    color: rgba(255,255,255,.75);
    white-space: nowrap;
}
.xpf-ribbon span b { color: var(--gold); }
.xpf-ribbon span::after { content: '✦'; color: var(--pink); margin-left: 20px; }
@keyframes xpfRun { to { transform: translateX(-50%); } }

/* ---- bottom bar ---- */
.xpf-bottom {
    position: relative;
    z-index: 1;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: space-between;
    gap: 12px 24px;
    padding: 22px 0 26px;
    font-size: .82rem;
    color: rgba(255,255,255,.5);
}
.xpf-bottom p { line-height: 1.6; }
.xpf-bottom p b { color: rgba(255,255,255,.8); }
.xpf-legal { display: flex; flex-wrap: wrap; gap: 6px 18px; }
.xpf-legal a {
    color: rgba(255,255,255,.6);
    transition: color .2s;
    position: relative;
}
.xpf-legal a:hover { color: var(--gold); }
.xpf-legal a + a::before {
    content: '';
    position: absolute;
    left: -10px;
    top: 50%;
    width: 3px;
    height: 3px;
    margin-top: -1.5px;
    border-radius: 50%;
    background: rgba(255,255,255,.3);
}
.xpf-top {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 9px 14px;
    border-radius: 9px;
    border: 2px solid rgba(255,255,255,.16);
    background: transparent;
    color: #fff;
    font-family: var(--disp);
    font-weight: 700;
    font-size: .8rem;
    cursor: pointer;
    transition: background .2s, border-color .2s, color .2s;
}
.xpf-top:hover { background: var(--gold); border-color: var(--gold); color: var(--ink); }
.xpf-top svg { transition: translate .2s; }
.xpf-top:hover svg { translate: 0 -2px; }

/* reduce motion */
@media (prefers-reduced-motion: reduce) {
    .xpf-ribbon-track { animation: none; }
    .xpf-btn, .xpf-links a, .xpf-social a, .xpf-top { transition: none; }
}
/* mobile hardening */
@media (max-width: 575px) {
    .xpf-wrap { padding: 0 16px; }
    .xpf-band { padding: 26px 0; }
    .xpf-band-actions .xpf-btn { width: 100%; }
    .xpf-main { gap: 34px; padding: 40px 0 34px; }
    .xpf-input { font-size: 16px; }
    .xpf-bottom { flex-direction: column; align-items: flex-start; }
}
</style>

<footer class="xpf" role="contentinfo">
    <div class="xpf-awning" aria-hidden="true"></div>

    <div class="xpf-wrap">

        <!-- mini CTA band -->
        <div class="xpf-band">
            <div>
                <h2>Your next edition deserves a <span>fuller hall.</span></h2>
                <p>Event website, exhibition SEO and trade-buyer acquisition — planned around your show dates, not after them.</p>
            </div>
            <div class="xpf-band-actions">
                <a href="#event-audit-form" class="xpf-btn xpf-btn--pink"><span>Free Event SEO Audit</span><?= $arrowF ?></a>
                <a href="tel:+919999674255" class="xpf-btn xpf-btn--gold"><?= $phoneF ?><span>Call Now</span></a>
            </div>
        </div>

        <!-- main columns -->
        <div class="xpf-main">

            <!-- brand + contact stub -->
            <div>
                <div class="xpf-brand-badge">
                    <span class="xpf-logo" aria-hidden="true">W</span>
                    <div>
                        <b>WebTecMart</b>
                        <small>Event &amp; Exhibition SEO</small>
                    </div>
                </div>
                <p class="xpf-about">
                    High-performance websites and deadline-driven SEO for B2B trade fairs, exhibitions and international business events. We help organisers fill halls with qualified trade buyers — and help exhibitors get found before the doors open.
                </p>

                <div class="xpf-stub">
                    <small>Visitor Info Desk</small>
                    <div class="xpf-stub-row">
                        <?= $pinF ?>
                        <div>New Delhi NCR, India<span>Serving organisers worldwide</span></div>
                    </div>
                    <div class="xpf-stub-row">
                        <?= $phoneF ?>
                        <div><a href="tel:+919999674255">+91-9999674255</a><span>Mon–Sat, 10:00–19:00 IST</span></div>
                    </div>
                    <div class="xpf-stub-row">
                        <?= $mailF ?>
                        <div><a href="mailto:hello@webtecmart.com">hello@webtecmart.com</a><span>Replies within 24 hours</span></div>
                    </div>
                </div>

                <div class="xpf-social" aria-label="Social profiles">
                    <a href="#" aria-label="LinkedIn"><svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor"><path d="M4.98 3.5a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5zM3 9h4v12H3zM9 9h3.8v1.7h.05c.53-1 1.83-2.05 3.77-2.05 4.03 0 4.78 2.65 4.78 6.1V21h-4v-5.4c0-1.29-.02-2.95-1.8-2.95-1.8 0-2.07 1.4-2.07 2.85V21H9z"/></svg></a>
                    <a href="#" aria-label="X (Twitter)"><svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor"><path d="M18.24 2H21l-6.56 7.5L22 22h-6.9l-4.6-6.02L5.2 22H2.44l7.02-8.02L2 2h6.92l4.16 5.5zm-1.2 18h1.53L7.02 3.9H5.38z"/></svg></a>
                    <a href="#" aria-label="Instagram"><svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none"/></svg></a>
                    <a href="#" aria-label="YouTube"><svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor"><path d="M23 12s0-3.4-.43-5.02a2.6 2.6 0 0 0-1.83-1.84C19.13 4.7 12 4.7 12 4.7s-7.13 0-8.74.44a2.6 2.6 0 0 0-1.83 1.84C1 8.6 1 12 1 12s0 3.4.43 5.02a2.6 2.6 0 0 0 1.83 1.84c1.61.44 8.74.44 8.74.44s7.13 0 8.74-.44a2.6 2.6 0 0 0 1.83-1.84C23 15.4 23 12 23 12zM9.9 15.4V8.6l5.9 3.4z"/></svg></a>
                </div>
            </div>

            <!-- services -->
            <nav class="xpf-col" aria-label="Services">
                <h3>Exhibition Services</h3>
                <ul class="xpf-links">
                    <li><a href="/b2b-exhibition-seo.php">B2B &amp; Exhibition SEO</a></li>
                    <li><a href="/event-website-demo.php">Event Website Design</a></li>
                    <li><a href="/seo-services-delhi.php">Enterprise SEO</a></li>
                    <li><a href="/technical-seo.php">Technical SEO</a></li>
                    <li><a href="/local-seo.php">Local SEO</a></li>
                    <li><a href="/portfolio.php">Case Studies</a></li>
                </ul>
            </nav>

            <!-- company -->
            <nav class="xpf-col" aria-label="Company">
                <h3>Company</h3>
                <ul class="xpf-links">
                    <li><a href="/about.php">About WebTecMart</a></li>
                    <li><a href="/blog.php">Insights &amp; Blog</a></li>
                    <li><a href="/contact.php">Contact Us</a></li>
                    <li><a href="/careers.php">Careers</a></li>
                    <li><a href="#event-audit-form">Request an Audit</a></li>
                    <li><a href="tel:+919999674255">Talk to an Expert</a></li>
                </ul>
            </nav>

            <!-- newsletter -->
            <div class="xpf-news">
                <h3 class="xpf-col" style="margin:0 0 14px;">Event Growth Briefing</h3>
                <p>One email a month: ranking shifts in the exhibition space, trade-show SEO plays and registration benchmarks. No filler.</p>
                <form class="xpf-form" id="xpfNews" onsubmit="return xpfNewsSubmit(event)">
                    <div class="xpf-form-row">
                        <input class="xpf-input" type="email" name="email" placeholder="you@yourexpo.com" aria-label="Email address" required>
                    </div>
                    <button type="submit" class="xpf-btn xpf-btn--pink">
                        <span>Register for the briefing</span><?= $arrowF ?>
                    </button>
                    <p class="xpf-form-note">* For organisers and exhibitors only. Unsubscribe anytime.</p>
                    <div class="xpf-msg" id="xpfNewsMsg">You're on the list — check your inbox for a confirmation.</div>
                </form>
            </div>

        </div>
    </div>

    <!-- stat ribbon -->
    <div class="xpf-ribbon" aria-hidden="true">
        <div class="xpf-ribbon-track">
            <?php for ($i = 0; $i < 4; $i++): ?>
                <span><b>400%</b> organic growth</span>
                <span><b>200+</b> keywords ranked</span>
                <span><b>80+</b> top 3 worldwide</span>
                <span><b>10,000+</b> buyer registrations</span>
                <span><b>6–9 mo</b> ideal lead time</span>
                <span><b>100%</b> white-hat</span>
            <?php endfor; ?>
        </div>
    </div>

    <div class="xpf-wrap">
        <div class="xpf-bottom">
            <p>&copy; <?= date('Y') ?> <b>WebTecMart</b>. All rights reserved. Event SEO &amp; B2B exhibition website specialists.</p>
            <div class="xpf-legal">
                <a href="/privacy-policy.php">Privacy Policy</a>
                <a href="/terms.php">Terms of Service</a>
                <a href="/sitemap.xml">Sitemap</a>
            </div>
            <button type="button" class="xpf-top" onclick="xpfToTop()">
                <?= $clockF ?><span>Back to top</span>
            </button>
        </div>
    </div>
</footer>

<script>
function xpfToTop() {
    if (window.xpLenis) {
        window.xpLenis.scrollTo(0, { duration: 1.1 });
    } else {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }
}
function xpfNewsSubmit(e) {
    e.preventDefault();
    var form = document.getElementById('xpfNews');
    var msg  = document.getElementById('xpfNewsMsg');
    var btn  = form.querySelector('button');
    var email = form.querySelector('input[name="email"]').value;
    if (!email) return false;

    var span = btn.querySelector('span');
    var original = span.textContent;
    btn.disabled = true;
    span.textContent = 'Registering…';

    var data = new FormData();
    data.set('email', email);
    data.set('service', 'Event Growth Briefing — Newsletter');
    data.set('ajax', '1');

    fetch('/contact.php', {
        method: 'POST',
        body: data,
        headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' }
    })
    .then(function () {
        msg.classList.add('on');
        form.reset();
    })
    .catch(function () {
        msg.textContent = "Couldn't subscribe right now — please email hello@webtecmart.com.";
        msg.classList.add('on');
    })
    .finally(function () {
        btn.disabled = false;
        span.textContent = original;
    });
    return false;
}
</script>