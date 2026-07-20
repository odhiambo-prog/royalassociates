<?php
$pageTitle = 'Products | Royal Associates Insurance Brokers';
$navActive = 'products';
$products = require __DIR__ . '/../includes/products_data.php';
include __DIR__ . '/../includes/header.php';
include __DIR__ . '/../includes/nav_tail.php';

$tabs = [
  'corporate' => 'Corporate Insurance',
  'individual' => 'Individual Insurance',
];

function render_product_card(int $id, array $p, string $tab): void
{
    $name = htmlspecialchars($p['name'], ENT_QUOTES);
    $short = htmlspecialchars($p['short'], ENT_QUOTES);
    $desc = htmlspecialchars($p['desc'], ENT_QUOTES);
    $img = htmlspecialchars($p['img'], ENT_QUOTES);
    $imgSrc = '/assets/images/royal_product_photos/' . $img;
    $quoteFn = "window.showQuoteModal('" . str_replace("'", "\\'", $p['name']) . "')";
    $href = $tab === 'individual' ? '/products#individual' : '/products#corporate';
    echo <<<CARD
<article class="home-pd-card cta-card-flex" id="product-{$id}" data-pid="{$id}" data-tab="{$tab}">
  <div class="home-pd-inner">
    <a href="{$href}" class="home-pd-card-link cta-card-link">
      <div class="cta-card-wrap">
        <img src="{$imgSrc}" alt="{$name}" loading="lazy" class="u-visual-image">
      </div>
      <div class="home-pd-body cta-card-body">
        <h3 class="home-pd-name u-text-style-h4 cta-card-name">{$name}</h3>
        <p class="solution-top-txt cta-card-short">{$short}</p>
        <div class="cta-card-desc">{$desc}</div>
      </div>
    </a>
    <div class="home-pd-actions cta-card-actions">
      <button type="button" class="pd-toggle" aria-expanded="false">Read more</button>
      <button type="button" class="home-pd-quote cta-quote" onclick="{$quoteFn}">Get a quote</button>
    </div>
    <span class="home-pd-corner" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 60 60" fill="none" class="corner-svg"><path d="M60 60L60 -2.14577e-06L30 30L-2.14577e-06 60L60 60Z" fill="#ffffff"></path></svg></span>
  </div>
</article>
CARD;
}
?>
<div class="page_content">
  <section class="u-section u-theme-brand" style="--swatch--dark:#00ADEF;--swatch--light:#fff">
    <div class="pages-hero-grid u-grid-custom">
      <div class="hero-grid-left" style="background-color:#2A2D8A;color:#ffffff">
        <div class="hero-grid-left-max" style="margin-left:0;padding:0 4rem;justify-content:center;display:flex;min-height:auto">
          <div class="section_spacer is-pages-hero">
            <div class="u-container is-hero">
              <div class="u-content v-flex-8">
                <div class="content-flex v-flex-8 u-justify-content-between">
                  <div class="pages-heading-flex v-flex-6">
                    <h1 class="pages-hero-heading u-text-style-h2">Insurance solutions <span class="txt-icon-arrow"> </span> for every risk, <span class="txt-icon-arrow is-square"> </span> every stage.</h1>
                    <div class="hero-p u-text-style-main">From personal cover to complex corporate risk, Royal Associates brokers the protection you need across Kenya and East Africa. Because we care.</div>
                  </div>
                  <div class="u-button-wrapper u-margin-top-0">
                    <div class="button_main_wrap">
                      <div class="clickable_wrap u-cover-absolute"><a href="/contact/" class="clickable_link w-inline-block"><span class="clickable_text u-sr-only">Contact Us</span></a></div>
                      <div class="button_main_element"><div aria-hidden="true" class="button_main_text u-text-style-small">Contact Us</div><div class="button_main_icon u-hide-if-empty"></div></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="hero-grid-visual">
        <div id="products-hero" class="u-visual" style="background-color:#2A2D8A">
          <img src="/assets/images/hero-images/products-hero.webp" alt="Royal Associates insurance solutions" loading="lazy" style="width:100%;height:100%;object-fit:cover" class="u-visual-image">
          <div class="u-visual-bk"></div>
          <div class="img-overlay"></div>
        </div>
      </div>
    </div>
  </section>

  <section class="u-section u-theme-light">
    <div class="section_spacer">
      <div class="u-container">
        <div class="u-content v-flex-8">

          <div class="pd-tabs" role="tablist" aria-label="Insurance categories">
            <button type="button" class="tab_button_item is-active" role="tab" id="tab-corporate" data-tab-btn="corporate" aria-selected="true" aria-controls="panel-corporate">Corporate Insurance</button>
            <button type="button" class="tab_button_item" role="tab" id="tab-individual" data-tab-btn="individual" aria-selected="false" aria-controls="panel-individual">Individual Insurance</button>
          </div>

          <?php foreach ($tabs as $tabKey => $tabLabel): ?>
          <div class="pd-panel" id="panel-<?= $tabKey ?>" data-t="<?= $tabKey ?>" role="tabpanel" aria-labelledby="tab-<?= $tabKey ?>"<?= $tabKey === 'corporate' ? '' : ' hidden' ?>>
            <div class="pd-search-wrap">
              <label for="pd-search-<?= $tabKey ?>" class="pd-search-label">Search <?= htmlspecialchars($tabLabel, ENT_QUOTES) ?></label>
              <input type="text" id="pd-search-<?= $tabKey ?>" class="pd-search" data-target="<?= $tabKey ?>" placeholder="Type a product name to filter..." autocomplete="off">
              <div class="pd-results" data-results="<?= $tabKey ?>" hidden></div>
            </div>
            <div class="cta-cards-grid" data-grid="<?= $tabKey ?>">
              <?php
              $list = $products[$tabKey];
              ksort($list);
              foreach ($list as $id => $p):
                render_product_card((int) $id, $p, $tabKey);
              endforeach;
              ?>
            </div>
          </div>
          <?php endforeach; ?>

        </div>
      </div>
    </div>
  </section>
</div>

<style>
@keyframes pd-float{
  0%,100%{transform:translateY(0)}
  50%{transform:translateY(-8px)}
}
/* Chrome-style tabs — button-sized, top-left, sky-blue on white, panel flows from active tab */
.pd-tabs{
  display:flex !important;
  flex-direction:row !important;
  flex-wrap:wrap !important;
  align-items:flex-end !important;
  justify-content:flex-start !important;
  gap:0 !important;
  margin:0 0 0 !important;
  width:auto !important;
  max-width:100%;
}
button.tab_button_item,
.tab_button_item{
  appearance:none !important;
  -webkit-appearance:none !important;
  display:inline-flex !important;
  align-items:center !important;
  justify-content:center !important;
  width:auto !important;
  min-width:0 !important;
  max-width:none !important;
  flex:0 0 auto !important;
  border:2px solid #00ADEF !important;
  border-bottom:none !important;
  background:#fff !important;
  color:#00ADEF !important;
  font:inherit !important;
  font-weight:600 !important;
  font-size:0.9rem !important;
  letter-spacing:-0.01em !important;
  line-height:1.2 !important;
  padding:0.7rem 1.35rem !important;
  margin:0 0 0 -2px !important;
  cursor:pointer !important;
  border-radius:0 !important;
  position:relative;
  z-index:1;
  text-align:center;
  transition:background-color .2s ease,color .2s ease;
}
button.tab_button_item:first-child,
.tab_button_item:first-child{margin-left:0 !important}
button.tab_button_item.is-active,
.tab_button_item.is-active{
  background:#00ADEF !important;
  color:#fff !important;
  z-index:3;
  /* Bridge into panel so content reads as flowing from the tab */
  box-shadow:0 2px 0 0 #00ADEF;
}
button.tab_button_item:not(.is-active):hover,
.tab_button_item:not(.is-active):hover{background:#eaf6fd !important}
button.tab_button_item:focus-visible,
.tab_button_item:focus-visible{outline:3px solid rgba(0,173,239,0.45);outline-offset:2px}

.pd-panel{
  border:2px solid #00ADEF;
  padding:2rem 1.5rem;
  margin-top:0;
  position:relative;
  z-index:2;
  background:#fff;
}

.pd-search-wrap{margin-bottom:2rem;max-width:46rem}
.pd-search-label{display:block;font-weight:600;margin-bottom:0.5rem;color:#2A2D8A;font-size:0.85rem;letter-spacing:0.02em;text-transform:uppercase}
/* Single highlighted border on focus — no stacked outline/shadow */
.pd-search{
  width:100%;
  padding:0.75rem 1rem 0.75rem 2.5rem;
  border:2px solid #d3d8e3;
  font-size:0.95rem;
  font-family:inherit;
  outline:none !important;
  box-shadow:none !important;
  box-sizing:border-box;
  transition:border-color .2s ease;
  background:#fff url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%239aa0b3' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Ccircle cx='11' cy='11' r='8'/%3E%3Cpath d='m21 21-4.35-4.35'/%3E%3C/svg%3E") 0.75rem 50% no-repeat;
  background-size:1rem;
  border-radius:0;
}
.pd-search:focus,
.pd-search:focus-visible{
  border-color:#00ADEF !important;
  box-shadow:none !important;
  outline:none !important;
}
.pd-results{display:flex;flex-wrap:wrap;gap:0.4rem;margin-top:0.85rem}
.pd-item{display:inline-block;padding:0.35rem 0.9rem;background:#eaf6fd;border:1px solid #cfeafb;font-size:0.82rem;color:#2A2D8A;text-decoration:none;cursor:pointer;transition:background-color .15s ease,color .15s ease,border-color .15s ease}
.pd-item:hover,.pd-item.is-active{background:#00ADEF;color:#fff;border-color:#00ADEF}
.pd-item:focus-visible{outline:3px solid rgba(0,173,239,0.5);outline-offset:2px}

/* Exact match with homepage product cards */
.cta-cards-grid{
  display:grid;
  grid-template-columns:repeat(3,minmax(0,1fr));
  gap:1.5rem;
}
@media (max-width:1023px){
  .cta-cards-grid{grid-template-columns:repeat(2,minmax(0,1fr))}
}
@media (max-width:767px){
  .cta-cards-grid{grid-template-columns:1fr}
}
.home-pd-card,
.cta-card-flex{
  --pd-cut:32px;
  --pd-stroke:1.5px;
  position:relative;
  background:#9ec9e8;
  clip-path:polygon(0 0,100% 0,100% calc(100% - var(--pd-cut)),calc(100% - var(--pd-cut)) 100%,0 100%);
  padding:var(--pd-stroke);
  filter:drop-shadow(0 14px 28px rgba(42,45,138,0.10)) drop-shadow(0 4px 8px rgba(42,45,138,0.06));
  transition:transform 350ms cubic-bezier(0.34,1.56,0.64,1),filter 350ms cubic-bezier(0.34,1.56,0.64,1);
  animation:pd-float 3.5s ease-in-out infinite;
  isolation:isolate;
  overflow:visible;
}
.home-pd-card:hover,
.cta-card-flex:hover{
  animation:none;
  transform:translateY(-12px) scale(1.02);
  filter:drop-shadow(0 24px 36px rgba(42,45,138,0.16)) drop-shadow(0 6px 12px rgba(42,45,138,0.10));
}
.home-pd-card:focus-within,
.cta-card-flex:focus-within{outline:3px solid #DA43E7;outline-offset:3px}
.home-pd-card:nth-child(2){animation-delay:0.5s}
.home-pd-card:nth-child(3){animation-delay:1s}
.home-pd-card:nth-child(4){animation-delay:0.25s}
.home-pd-card:nth-child(5){animation-delay:0.75s}
.home-pd-card:nth-child(6){animation-delay:1.25s}
.home-pd-inner{
  display:flex;
  flex-direction:column;
  background:#EAF7FE;
  text-decoration:none;
  height:100%;
  min-height:100%;
  clip-path:polygon(
    var(--pd-stroke) var(--pd-stroke),
    calc(100% - var(--pd-stroke)) var(--pd-stroke),
    calc(100% - var(--pd-stroke)) calc(100% - var(--pd-cut) + 0.35px),
    calc(100% - var(--pd-cut) + 0.35px) calc(100% - var(--pd-stroke)),
    var(--pd-stroke) calc(100% - var(--pd-stroke))
  );
}
.home-pd-card-link,
.cta-card-link{
  display:flex;
  flex-direction:column;
  text-decoration:none;
  color:inherit;
  flex:1 1 auto;
  min-height:0;
}
.cta-card-wrap{
  position:relative;
  aspect-ratio:16/10;
  overflow:hidden;
  background:#d7ebf7;
  width:100%;
  margin:0;
  padding:0;
  flex:0 0 auto;
}
.cta-card-wrap .u-visual-image,
.cta-card-wrap img{
  width:100%;
  height:100%;
  object-fit:cover;
  object-position:center 40%;
  display:block;
  transform:scale(1.08);
  transition:transform 300ms cubic-bezier(0.22,1,0.36,1);
}
.home-pd-card:hover .cta-card-wrap img,
.cta-card-flex:hover .cta-card-wrap .u-visual-image{transform:scale(1.22)}
.home-pd-body,
.cta-card-body{
  padding:0.85rem 1rem 0.75rem;
  display:flex;
  flex-direction:column;
  gap:0.75rem;
  flex:1 1 auto;
  min-height:7.5rem;
}
.home-pd-name,
.cta-card-name{
  color:#2A2D8A;
  margin:0;
  font-size:clamp(1.25rem,1.6vw,1.45rem);
  line-height:1.25;
  font-weight:600;
  letter-spacing:-0.015em;
}
.solution-top-txt,
.cta-card-short{
  color:#1d2130;
  margin:0;
  max-width:48ch;
  font-size:0.98rem;
  line-height:1.55;
  flex:1 1 auto;
}
.home-pd-actions,
.cta-card-actions{
  display:flex;
  align-items:center;
  justify-content:space-between;
  gap:0.75rem;
  margin-top:0;
  padding:0.7rem 1rem 0.8rem;
  border-top:1px solid #c5dff0;
  background:rgba(255,255,255,0.35);
  flex:0 0 auto;
}
.cta-card-desc{
  display:none;
  margin-top:0.5rem;
  color:#1d2130;
  font-size:0.9rem;
  line-height:1.55;
}
.cta-card-desc.is-open{display:block}
.pd-toggle{
  background:none;
  border:none;
  color:#00ADEF;
  font-weight:600;
  text-transform:uppercase;
  letter-spacing:0.04em;
  font-size:0.8rem;
  cursor:pointer;
  padding:0;
  font-family:inherit;
  transition:color 200ms cubic-bezier(0.22,1,0.36,1);
}
.pd-toggle:hover{color:#DA43E7}
.home-pd-quote,
.cta-quote{
  background:#2A2D8A;
  color:#fff;
  border:none;
  padding:0.6rem 1.3rem;
  font:inherit;
  font-weight:600;
  font-size:0.8rem;
  letter-spacing:0.02em;
  cursor:pointer;
  white-space:nowrap;
  transition:background-color .2s ease;
}
.home-pd-quote:hover,
.cta-quote:hover{background:#1f2168}
.home-pd-quote:focus-visible,
.cta-quote:focus-visible{outline:3px solid #00ADEF;outline-offset:2px}
.home-pd-corner{
  position:absolute;
  right:0;
  bottom:0;
  width:var(--pd-cut,32px);
  height:var(--pd-cut,32px);
  pointer-events:none;
  z-index:2;
}
.home-pd-corner svg{display:block;width:100%;height:100%}

/* Quote modal + toast styles live in includes/quote_modal.php */

@media (prefers-reduced-motion: reduce){
  .home-pd-card,.cta-card-flex{animation:none}
  .home-pd-card,.cta-card-flex,.cta-card-wrap img,.modal-overlay,.modal-box{transition:none}
  .home-pd-card:hover,.cta-card-flex:hover{animation:none;transform:translateY(-4px)}
  .home-pd-card:hover .cta-card-wrap img,.cta-card-flex:hover .cta-card-wrap .u-visual-image{transform:scale(1.08)}
}
</style>

<script>
(function(){
  var tabBtns = document.querySelectorAll('[data-tab-btn]');
  var panels = document.querySelectorAll('.pd-panel');

  function activateTab(key){
    tabBtns.forEach(function(b){
      b.classList.toggle('is-active', b.getAttribute('data-tab-btn') === key);
      b.setAttribute('aria-selected', b.getAttribute('data-tab-btn') === key ? 'true' : 'false');
    });
    panels.forEach(function(p){
      p.hidden = p.getAttribute('data-t') !== key;
    });
  }

  function setExpanded(card, open){
    if(!card) return;
    var wrap = card.querySelector('.cta-card-desc');
    var toggle = card.querySelector('.pd-toggle');
    if(wrap) wrap.classList.toggle('is-open', open);
    if(toggle){
      toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
      toggle.textContent = open ? 'Show less' : 'Read more';
    }
  }

  tabBtns.forEach(function(b){
    b.addEventListener('click', function(){ activateTab(b.getAttribute('data-tab-btn')); });
  });

  document.querySelectorAll('.pd-search').forEach(function(input){
    var key = input.getAttribute('data-target');
    var results = document.querySelector('[data-results="'+key+'"]');
    var grid = document.querySelector('[data-grid="'+key+'"]');
    var cards = grid ? Array.prototype.slice.call(grid.querySelectorAll('.cta-card-flex')) : [];

    input.addEventListener('input', function(){
      var q = this.value.toLowerCase().trim();
      results.innerHTML = '';
      if(!q){ results.hidden = true; return; }
      var matches = cards.filter(function(c){
        return c.querySelector('.cta-card-name').textContent.toLowerCase().indexOf(q) !== -1;
      });
      if(!matches.length){
        results.hidden = false;
        var none = document.createElement('span');
        none.className = 'pd-item';
        none.style.background = 'transparent';
        none.style.borderStyle = 'dashed';
        none.textContent = 'No matches';
        results.appendChild(none);
        return;
      }
      matches.forEach(function(c){
        var id = c.getAttribute('data-pid');
        var tab = c.getAttribute('data-tab');
        var name = c.querySelector('.cta-card-name').textContent;
        var chip = document.createElement('a');
        chip.href = '#product-' + id;
        chip.className = 'pd-item';
        chip.textContent = name;
        chip.addEventListener('click', function(e){
          e.preventDefault();
          window.scrollToProduct(parseInt(id,10), tab);
        });
        results.appendChild(chip);
      });
      results.hidden = false;
    });
  });

  document.querySelectorAll('.pd-toggle').forEach(function(btn){
    btn.addEventListener('click', function(){
      var card = btn.closest('.cta-card-flex');
      var open = btn.getAttribute('aria-expanded') === 'true';
      setExpanded(card, !open);
    });
  });

  // showQuoteModal / closeQuoteModal (and modal overlay/escape handling) are
  // provided by the shared quote modal partial (includes/quote_modal.php).

  window.scrollToProduct = function(id, tab){
    activateTab(tab);
    var card = document.getElementById('product-' + id);
    if(card){
      setExpanded(card, true);
      card.scrollIntoView({behavior:'smooth', block:'center'});
    }
    return false;
  };

  function handleHash(){
    var hash = window.location.hash.replace(/^#/, '');
    if(hash === 'corporate' || hash === 'individual'){
      activateTab(hash);
      return;
    }
    var m = hash.match(/^product-(\d+)$/);
    if(m){
      var card = document.getElementById('product-' + m[1]);
      if(card){
        activateTab(card.getAttribute('data-tab'));
        setExpanded(card, true);
        card.scrollIntoView({behavior:'smooth', block:'center'});
      }
    }
  }
  handleHash();
  window.addEventListener('hashchange', handleHash);
})();
</script>

<?php include __DIR__ . '/../includes/quote_modal.php'; ?>
<?php include __DIR__ . '/../includes/footer.php'; ?>
