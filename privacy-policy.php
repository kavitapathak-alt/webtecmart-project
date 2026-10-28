<?php
$pageMeta = [
    'title' => 'Privacy Policy | WebTecMart Digital',
    'description' => 'Read WebTecMart Digital Privacy Policy. Learn how we collect, use, and protect your personal information when using our website and services.',
];
require_once __DIR__ . '/app/templates/header.php';
?>

<style>
.legal-hero {
    background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary) 50%, var(--primary-light) 100%);
    color: #fff;
    padding: 70px 0 80px;
    text-align: center;
    position: relative;
}
.legal-container {
    max-width: 960px;
    margin: -40px auto 80px;
    background: #fff;
    border-radius: 24px;
    padding: 48px;
    box-shadow: 0 20px 50px rgba(196, 0, 122, 0.08);
    border: 1px solid var(--border-soft);
    position: relative;
    z-index: 2;
}
.legal-content h2 {
    font-size: 1.5rem;
    font-weight: 800;
    color: var(--deep);
    margin: 32px 0 14px;
    border-left: 4px solid var(--primary);
    padding-left: 14px;
}
.legal-content h3 {
    font-size: 1.2rem;
    font-weight: 700;
    color: var(--primary-dark);
    margin: 20px 0 10px;
}
.legal-content p, .legal-content li {
    color: #4B5563;
    line-height: 1.8;
    font-size: 1.02rem;
}
.legal-content ul {
    padding-left: 24px;
    margin-bottom: 20px;
}
.legal-meta {
    font-size: 0.9rem;
    color: var(--primary-light);
    font-weight: 600;
    margin-top: 10px;
}
@media (max-width: 768px) {
    .legal-container { padding: 28px 20px; margin-top: -24px; }
}
</style>

<section class="legal-hero">
    <div class="container">
        <h1 style="font-size:clamp(2rem, 4vw, 3rem);font-weight:800;margin:0 0 10px;">Privacy Policy</h1>
        <p class="legal-meta">Last Updated: October 2026 &bull; WebTecMart Digital Growth Agency</p>
    </div>
</section>

<main class="container">
    <div class="legal-container legal-content">
        <p>At <strong>WebTecMart Digital</strong> ("we", "our", or "us"), we value your privacy and are committed to protecting your personal information. This Privacy Policy explains our practices regarding the collection, use, and disclosure of information that you provide when visiting our website (<a href="https://webtecmart.com">webtecmart.com</a>) or engaging our digital marketing, SEO, web design, and branding services.</p>

        <h2>1. Information We Collect</h2>
        <p>We collect information to provide better services and communicate with you effectively:</p>
        <ul>
            <li><strong>Personal Information:</strong> Full name, email address, telephone number, company name, website URL, and details submitted through our contact and consultation forms.</li>
            <li><strong>Technical & Usage Data:</strong> Internet Protocol (IP) address, browser type and version, operating system, referral source, pages visited, time spent, and other diagnostic data collected via cookies and Google Analytics 4.</li>
            <li><strong>Communication Data:</strong> Inquiries, feedback, support messages, or emails sent directly to our staff or official mailboxes.</li>
        </ul>

        <h2>2. How We Use Your Information</h2>
        <p>We use the collected information for legitimate business purposes, including:</p>
        <ul>
            <li>Responding to your inquiries and providing customized digital marketing proposals.</li>
            <li>Delivering, managing, and improving our SEO, PPC, web design, and digital branding services.</li>
            <li>Sending project updates, invoices, analytical performance reports, and customer service notices.</li>
            <li>Monitoring website traffic patterns, security threats, and optimizing user experience.</li>
            <li>Complying with applicable legal obligations under the Information Technology Act, 2000 and related rules.</li>
        </ul>

        <h2>3. Data Protection and Security</h2>
        <p>We implement robust physical, technical, and administrative safeguards to protect your personal information against unauthorized access, loss, misuse, or alteration. All web communications are encrypted via SSL/HTTPS protocols. We store lead records on secure, access-restricted database servers.</p>

        <h2>4. Disclosure of Information to Third Parties</h2>
        <p><strong>We do not sell, rent, or trade your personal information to third parties.</strong> We may share data strictly with trusted service providers who assist us in operating our website, conducting our business, or serving our clients (such as email delivery infrastructure like PHPMailer/SMTP, cloud hosting providers, and Google Analytics), provided those parties agree to keep this information confidential.</p>

        <h2>5. Cookies and Tracking Technologies</h2>
        <p>Our website uses cookies and similar tracking technologies to analyze trends, administer the website, track users' movements around the site, and gather demographic information. You can configure your browser to reject all cookies or notify you when a cookie is set. However, some website features may not function properly without cookies.</p>

        <h2>6. Third-Party Links</h2>
        <p>Our website may contain links to external third-party sites (such as client websites, partner tools, or social media platforms). We have no control over and assume no responsibility for the content, privacy policies, or practices of any third-party websites.</p>

        <h2>7. Your Privacy Rights</h2>
        <p>You have the right to request access to the personal data we hold about you, request corrections to inaccurate information, or request the deletion of your contact data from our marketing databases. To exercise these rights, please contact us at <a href="mailto:info@webtecmart.com">info@webtecmart.com</a>.</p>

        <h2>8. Contact Us Regarding Privacy</h2>
        <p>If you have any questions, concerns, or grievances regarding this Privacy Policy or our data handling practices, please contact us:</p>
        <ul>
            <li><strong>Agency:</strong> WebTecMart Digital</li>
            <li><strong>Email:</strong> <a href="mailto:info@webtecmart.com">info@webtecmart.com</a></li>
            <li><strong>Phone:</strong> <a href="tel:+919999674255">+91-9999674255</a> / <a href="tel:+919511012625">+91-9511012625</a></li>
            <li><strong>Location:</strong> Delhi NCR, India</li>
        </ul>
    </div>
</main>

<?php require_once __DIR__ . '/app/templates/footer.php'; ?>
