<?php
$pageMeta = [
    'title' => 'Terms & Conditions | WebTecMart Digital',
    'description' => 'Read WebTecMart Digital Terms & Conditions governing our digital marketing, web design, SEO, and paid advertising services.',
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
        <h1 style="font-size:clamp(2rem, 4vw, 3rem);font-weight:800;margin:0 0 10px;">Terms &amp; Conditions</h1>
        <p class="legal-meta">Effective Date: October 2026 &bull; WebTecMart Digital Growth Agency</p>
    </div>
</section>

<main class="container">
    <div class="legal-container legal-content">
        <p>Welcome to <strong>WebTecMart Digital</strong>. By accessing this website (<a href="https://webtecmart.com">webtecmart.com</a>) or contracting with us for digital marketing, search engine optimization (SEO), web design, social media marketing, or mobile application development services, you agree to be bound by these Terms and Conditions.</p>

        <h2>1. Scope of Services</h2>
        <p>WebTecMart provides strategic digital marketing solutions, including but not limited to:</p>
        <ul>
            <li>Search Engine Optimization (Local, National, E-Commerce, International).</li>
            <li>Paid Search & Performance Marketing (Google Ads, Meta Ads, YouTube campaigns).</li>
            <li>Website Design, UI/UX Prototyping, and Web Application Development.</li>
            <li>Digital Business Branding, Corporate Identity, and Graphic Design.</li>
            <li>Social Media Optimization (SMO) and Content Marketing Strategy.</li>
        </ul>
        <p>Specific deliverables, timelines, and commercial parameters for individual client engagements are detailed in individual Service Proposals, Statements of Work (SOW), or Retainer Agreements agreed upon by both parties.</p>

        <h2>2. Client Responsibilities</h2>
        <p>To ensure successful project delivery, the client agrees to:</p>
        <ul>
            <li>Provide timely access to necessary accounts, hosting environments, CMS logins, analytics, and brand assets.</li>
            <li>Provide prompt feedback, reviews, and approvals on deliverables within agreed turnaround times.</li>
            <li>Ensure that all materials, logos, images, and text supplied to WebTecMart do not infringe upon any third-party intellectual property rights.</li>
        </ul>

        <h2>3. Search Engine Rankings & Results Disclaimer</h2>
        <p>While WebTecMart adheres strictly to industry best practices and white-hat guidelines established by Google and other search engines, <strong>we do not guarantee specific #1 positions or predetermined search volume</strong>. Search engines continuously update algorithms, and rankings are subject to competitive market dynamics, existing domain history, and search engine technical variables outside our direct control.</p>

        <h2>4. Fees, Billing, and Retainers</h2>
        <p>All service fees, package prices, and payment schedules are governed by the specific service package or invoice issued. Invoices must be cleared according to the payment schedule outlined. Monthly marketing retainers are billed in advance of each monthly service cycle. Ad spend budgets for Google Ads and Meta Ads are payable directly to the respective ad networks by the client.</p>

        <h2>5. Intellectual Property Rights</h2>
        <p>Upon receipt of full payment for completed projects (such as custom websites, logos, and custom creatives), all ownership rights to the final delivered assets transfer to the client. WebTecMart retains the right to display completed non-confidential design work, anonymized growth metrics, and case studies in our agency portfolio and marketing materials.</p>

        <h2>6. Confidentiality</h2>
        <p>Both parties agree to treat all commercial, technical, and proprietary information shared during the course of the engagement as strictly confidential and will not disclose it to any third party without prior written consent.</p>

        <h2>7. Limitation of Liability</h2>
        <p>To the maximum extent permitted by applicable Indian law, WebTecMart Digital shall not be liable for any indirect, incidental, special, or consequential damages (including loss of business profits, data loss, or server downtime) arising from the use of our services or website.</p>

        <h2>8. Governing Law & Jurisdiction</h2>
        <p>These Terms and Conditions shall be governed by and construed in accordance with the laws of the Republic of India. Any disputes arising out of or related to these terms shall be subject to the exclusive jurisdiction of the competent courts in Delhi, India.</p>

        <h2>9. Contact Information</h2>
        <p>For questions or formal notices regarding these Terms &amp; Conditions, please reach out to us:</p>
        <ul>
            <li><strong>Email:</strong> <a href="mailto:info@webtecmart.com">info@webtecmart.com</a></li>
            <li><strong>Phone:</strong> <a href="tel:+919999674255">+91-9999674255</a></li>
            <li><strong>Website:</strong> <a href="https://webtecmart.com">www.webtecmart.com</a></li>
        </ul>
    </div>
</main>

<?php require_once __DIR__ . '/app/templates/footer.php'; ?>
