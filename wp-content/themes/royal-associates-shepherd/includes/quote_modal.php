<?php
/**
 * Shared "Get a Quote" modal.
 *
 * Single source of truth for the quote modal used by BOTH the homepage and the
 * products page (product cards are just previews; the real quote form lives
 * here). Include this once per page, before the footer.
 *
 * The form is rendered with Gravity Forms AJAX enabled (last arg = true) so
 * submitting never triggers a full page reload. The confirmation is surfaced as
 * a styled toast on top of the page by the site-wide handler in functions.php
 * (royal_shepherd_toast_markup), which also closes this modal and restores an
 * empty form so another quote can be requested without a reload.
 *
 * Exposes on window:
 *   showQuoteModal(productName)  -> opens modal, pre-fills the product field
 *   closeQuoteModal()           -> closes modal
 */
if (!defined('ABSPATH')) { exit; }

// Guard against double inclusion on a single request.
if (defined('ROYAL_QUOTE_MODAL_RENDERED')) { return; }
define('ROYAL_QUOTE_MODAL_RENDERED', true);
?>
<div id="quote-modal" class="modal-overlay" role="dialog" aria-modal="true" aria-labelledby="quote-modal-title" style="display:none">
  <div class="modal-box">
    <button type="button" class="modal-close" aria-label="Close" onclick="window.closeQuoteModal()">&times;</button>
    <h2 id="quote-modal-title">Get a Quote</h2>
    <p class="modal-sub">Tell us about your needs and our brokers will get back to you.</p>
    <?php gravity_form('Get a Quote', false, false, false, null, true); ?>
  </div>
</div>

<style>
/* ---- Quote modal ---- */
.modal-overlay{position:fixed;z-index:9999;inset:0;background:rgba(29,33,48,0.55);display:none;align-items:center;justify-content:center;transition:opacity .3s cubic-bezier(0.22,1,0.36,1)}
.modal-overlay.active{display:flex;opacity:1;pointer-events:auto}
.modal-box{background:#fff;color:#1d2130;max-width:38rem;width:90vw;max-height:90vh;padding:2.5rem;position:relative;overflow-y:auto;transform:translateY(12px);transition:transform .3s cubic-bezier(0.22,1,0.36,1);border-top:4px solid #2A2D8A}
.modal-overlay.active .modal-box{transform:translateY(0)}
.modal-box h2{font-size:1.5rem;margin:0 0 0.25rem;font-weight:700;letter-spacing:-0.02em;color:#2A2D8A}
.modal-box .modal-sub{color:#5c6275;margin-bottom:1.5rem;line-height:1.5;font-size:0.9rem}
.modal-box label{display:block;font-size:0.8rem;font-weight:600;margin-bottom:0.25rem;color:#2A2D8A;text-transform:uppercase;letter-spacing:0.04em}
.modal-box input,.modal-box select,.modal-box textarea{width:100%;padding:0.7rem 0.75rem;border:1px solid #d3d8e3;font-size:0.95rem;font-family:inherit;margin-bottom:1rem;box-sizing:border-box;transition:border-color .2s ease,box-shadow .2s ease;background:#fafbfc}
.modal-box input:focus,.modal-box select:focus,.modal-box textarea:focus{outline:none;border-color:#2A2D8A;box-shadow:0 0 0 3px rgba(42,45,138,0.1);background:#fff}
#quote-modal .gf-product-field input { background: #f0f4f8 !important; border: 1px solid #cbd5e1 !important; cursor: default !important; opacity: 0.8 !important; }
#quote-modal input:not([type=submit]):not([type=checkbox]), #quote-modal textarea { border: 1px solid #cbd5e1 !important; border-radius: 0.375rem !important; padding: 0.625rem 0.75rem !important; font-size: 0.95rem !important; width: 100% !important; }
#quote-modal .gfield_label { font-weight: 600 !important; font-size: 0.85rem !important; margin-bottom: 0.25rem !important; }
#quote-modal .gfield { margin-bottom: 0.75rem !important; }
#quote-modal .gform_footer input[type=submit] { background: #00ADEF !important; color: #fff !important; border: none !important; padding: 0.7rem 2rem !important; border-radius: 0.375rem !important; cursor: pointer !important; font-weight: 600 !important; font-size: 0.95rem !important; }
#quote-modal .gform_footer input[type=submit]:hover { background: #0095d4 !important; }
.modal-close{position:absolute;top:0.75rem;right:1.25rem;background:none;border:none;font-size:1.75rem;cursor:pointer;color:#9aa0b3;padding:0;line-height:1;transition:color .2s ease}
.modal-close:hover{color:#2A2D8A}
.modal-close:focus-visible{outline:3px solid rgba(0,173,239,0.6);outline-offset:2px}
@media (prefers-reduced-motion: reduce){
  .modal-overlay,.modal-box{transition:none}
}
</style>

<script>
(function () {
  if (window.__royalQuoteModalInit) { return; }
  window.__royalQuoteModalInit = true;

  window.showQuoteModal = function (product) {
    var overlay = document.getElementById('quote-modal');
    if (!overlay) { return; }
    var pf = overlay.querySelector('.gf-product-field input');
    if (pf) { pf.value = product || ''; pf.readOnly = true; }
    overlay.style.display = 'flex';
    requestAnimationFrame(function () {
      overlay.classList.add('active');
    });
    document.body.style.overflow = 'hidden';
    var first = overlay.querySelector('.gform_body input:not([readonly])');
    if (first) { try { first.focus(); } catch (e) {} }
  };

  window.closeQuoteModal = function () {
    var overlay = document.getElementById('quote-modal');
    if (!overlay) { return; }
    overlay.classList.remove('active');
    setTimeout(function () {
      overlay.style.display = 'none';
    }, 300);
    document.body.style.overflow = '';
  };

  document.addEventListener('click', function (e) {
    if (e.target.closest && e.target.closest('.modal-overlay') && !e.target.closest('.modal-box')) {
      window.closeQuoteModal();
    }
  });
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') { window.closeQuoteModal(); }
  });
})();
</script>

