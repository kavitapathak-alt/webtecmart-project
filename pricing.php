<?php require_once __DIR__ . '/app/templates/header.php'; ?>

<style>
    .pricing-page-wrap {
        background: #f6efe8;
        color: #1f1b2a;
    }

    .pricing-page-hero {
        padding: 60px 0 20px;
        text-align: center;
    }

    .pricing-page-eyebrow {
        display: inline-flex;
        background: rgba(236, 44, 122, 0.12);
        color: #c51c63;
        border-radius: 999px;
        padding: 10px 20px;
        font-size: 0.72rem;
        letter-spacing: 0.12em;
        font-weight: 700;
        margin-bottom: 18px;
    }

    .pricing-page-hero h1 {
        margin: 0;
        font-size: clamp(2.6rem, 4vw, 4rem);
        line-height: 1.08;
        letter-spacing: -0.06em;
    }

    .pricing-page-section {
        padding: 30px 0 80px;
    }

    .pricing-card-grid {
        display: grid;
        gap: 24px;
    }

    .pricing-three-col {
        grid-template-columns: repeat(3, minmax(0, 1fr));
    }

    .pricing-plan-card {
        background: rgba(255,255,255,0.5);
        border: 1px solid rgba(236, 44, 122, 0.12);
        border-radius: 22px;
        padding: 24px 20px;
        box-shadow: 0 12px 20px rgba(17, 24, 39, 0.03);
    }

    .pricing-plan-card.featured {
        background: linear-gradient(180deg, rgba(236, 44, 122, 0.08), rgba(255,255,255,0.78));
        border-color: rgba(236, 44, 122, 0.24);
    }

    .pricing-plan-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
        margin-bottom: 16px;
    }

    .pricing-plan-header h3 {
        margin: 0;
        font-size: 1.8rem;
        letter-spacing: -0.05em;
    }

    .pricing-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: #ec2c7a;
        color: white;
        border-radius: 999px;
        padding: 7px 12px;
        font-size: 0.7rem;
        font-weight: 700;
    }

    .pricing-price {
        font-size: 2.2rem;
        font-weight: 800;
        color: #1f1b2a;
        letter-spacing: -0.05em;
        margin-bottom: 12px;
    }

    .pricing-price small {
        font-size: 1rem;
        color: #5d5868;
    }

    .pricing-plan-card p {
        color: #5d5868;
        line-height: 1.7;
    }

    .pricing-plan-card ul {
        list-style: none;
        padding: 0;
        margin: 18px 0 20px;
        display: grid;
        gap: 10px;
        color: #1f1b2a;
    }

    .pricing-plan-card li::before {
        content: '✓';
        color: #ec2c7a;
        font-weight: 700;
        margin-right: 8px;
    }

    @media (max-width: 767px) {
        .pricing-page-hero { padding: 42px 0 16px; }
        .pricing-page-hero h1 { font-size: 2.35rem; }
        .pricing-page-section { padding: 24px 0 52px; }
        .pricing-three-col { grid-template-columns: 1fr; }
        .pricing-plan-header { align-items: flex-start; flex-direction: column; }
    }
</style>

<main class="pricing-page-wrap">
    <section class="pricing-page-hero">
        <div class="container narrow">
            <p class="pricing-page-eyebrow">Pricing</p>
            <h1>Choose the plan that matches your growth stage.</h1>
        </div>
    </section>

    <section class="pricing-page-section">
        <div class="container pricing-card-grid pricing-three-col">
            <?php foreach (pricingPlans() as $plan): ?>
                <article class="pricing-plan-card <?= $plan['popular'] ? 'featured' : '' ?>">
                    <div class="pricing-plan-header">
                        <h3><?= e($plan['name']) ?></h3>
                        <?php if ($plan['popular']): ?><span class="pricing-badge">Most Popular</span><?php endif; ?>
                    </div>
                    <div class="pricing-price"><?= e($plan['price']) ?><small>/mo</small></div>
                    <p><?= e($plan['description']) ?></p>
                    <ul>
                        <?php foreach ($plan['features'] as $feature): ?>
                            <li><?= e($feature) ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <a href="/contact.php" class="btn btn-primary">Choose Plan</a>
                </article>
            <?php endforeach; ?>
        </div>
    </section>
</main>

<?php require_once __DIR__ . '/app/templates/footer.php'; ?>
