(function () {
  function initCharter() {
    const section = document.querySelector('.about-charter-section');
    if (!section) return;

    const shortEl = section.querySelector('[data-charter-short]');
    const items = [...section.querySelectorAll('[data-charter-item]')];

    items.forEach((item) => {
      item.addEventListener('click', () => {
        items.forEach((el) => {
          el.classList.remove('is-active');
          el.setAttribute('aria-pressed', 'false');
        });
        item.classList.add('is-active');
        item.setAttribute('aria-pressed', 'true');

        const sht = item.getAttribute('data-short');
        if (shortEl && sht) shortEl.textContent = sht;
      });
    });
  }

  function boot() {
    initCharter();
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', boot);
  } else {
    boot();
  }
})();
