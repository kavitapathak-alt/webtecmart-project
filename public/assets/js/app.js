document.addEventListener('DOMContentLoaded', function () {
  const cards = document.querySelectorAll('.info-card, .pricing-card, .quote-card');

  cards.forEach((card) => {
    card.addEventListener('mouseenter', function () {
      this.style.transform = 'translateY(-4px)';
      this.style.transition = 'transform 0.2s ease';
    });

    card.addEventListener('mouseleave', function () {
      this.style.transform = 'translateY(0)';
    });
  });
});
