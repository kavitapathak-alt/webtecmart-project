<?php
require_once __DIR__ . '/../components/sections/FooterSection.php';
renderFooterSection();
?>

<div class="floating-contact">
    <style>
        .floating-contact {
            position: fixed;
            right: 22px;
            bottom: 22px;
            z-index: 1100;
        }

        .whatsapp-float {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            min-height: 52px;
            padding: 0 18px 0 14px;
            border-radius: 999px;
            background: #25d366;
            color: #fff;
            font: 700 0.9rem/1 'Plus Jakarta Sans', Arial, sans-serif;
            text-decoration: none;
            box-shadow: 0 8px 24px rgba(37, 211, 102, 0.35);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .whatsapp-float::before {
            content: '◔';
            display: grid;
            place-items: center;
            width: 28px;
            height: 28px;
            border: 2px solid #fff;
            border-radius: 50%;
            font-size: 1.15rem;
            line-height: 1;
            transform: rotate(-35deg);
        }

        .whatsapp-float:hover {
            color: #fff;
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(37, 211, 102, 0.45);
        }

        @media (max-width: 575px) {
            .floating-contact { right: 16px; bottom: 16px; }
            .whatsapp-float { min-height: 48px; padding-right: 15px; font-size: 0.82rem; }
        }
    </style>
    <a class="whatsapp-float" href="https://wa.me/919999674255" target="_blank" rel="noopener" aria-label="Chat with WebTecMart on WhatsApp">WhatsApp</a>
</div>

</body>
</html>
