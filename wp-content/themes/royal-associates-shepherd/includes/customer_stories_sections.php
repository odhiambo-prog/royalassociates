<?php
function cs_youtube_thumb(string $id): string
{
    return 'https://i.ytimg.com/vi/' . rawurlencode($id) . '/hqdefault.jpg';
}

function cs_escape(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function cs_play_icon(): string
{
    return '<svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 12 16" fill="none" class="video-play"><path d="M11.25 7.79443L2.19575e-07 15.5887L9.00968e-07 0.000204548L11.25 7.79443Z" fill="black"></path></svg>';
}

function cs_youtube_embed_html(string $id): string
{
    $src = 'https://www.youtube-nocookie.com/embed/' . rawurlencode($id) . '?autoplay=1&rel=0&enablejsapi=1';
    return '<iframe src="' . $src . '" frameborder="0" allow="autoplay; encrypted-media; picture-in-picture" allowfullscreen style="position:absolute;inset:0;width:100%;height:100%"></iframe>';
}

/**
 * Hero: image on the right, text on the left.
 * Keeps the exact copy requested.
 */
function cs_render_hero(): void
{
?>
<section class="u-section u-theme-brand" style="--swatch--dark:#00ADEF;--swatch--light:#fff">
  <div class="pages-hero-grid u-grid-custom" style="display:grid;grid-template-columns:1fr 1fr">
    <div class="hero-grid-left" style="background-color:#2A2D8A;color:#ffffff">
      <div class="hero-grid-left-max" style="margin-left:0;padding:0 4rem;justify-content:center;display:flex;min-height:min(90vh,65rem)">
        <div class="section_spacer is-pages-hero">
          <div class="u-container is-hero">
            <div class="u-content v-flex-8">
              <div class="content-flex v-flex-8 u-justify-content-between">
                <div class="pages-heading-flex v-flex-6">
                  <h1 class="pages-hero-heading u-text-style-h2">Real stories from the clients <span class="txt-icon-arrow"> </span> we serve</h1>
                  <div class="hero-p u-text-style-main">Hear from clients across Kenya and the region on how Royal Associates delivers responsive brokerage, tailored cover, and trusted partnership.</div>
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
      <div id="cs-hero" class="u-visual">
        <img src="/assets/images/hero-images/stories.jpg" alt="Royal Associates clients" loading="lazy" style="width:100%;height:100%;object-fit:cover" class="u-visual-image">
        <div class="u-visual-bk"></div>
        <div class="img-overlay"></div>
      </div>
    </div>
  </div>
</section>
<?php
}

/**
 * Forced-scroll section — exact copy of Shepherd's
 * "Powered by tech. Proven in the field." pattern from
 * shepherdinsurance.com/products, with YouTube testimonial
 * videos as the media.
 */
function cs_render_forced_scroll(array $featured, array $stories): void
{
    $all = array_merge([$featured], $stories);
?>
<section class="u-section" style="background:#EAF7FE">
  <div class="section_spacer">
    <div class="forced-scroll-section-height">
      <div class="forced-scroll-section">
        <div class="u-container">
          <div class="u-content v-flex-8">
            <div class="content-flex v-flex-6">
              <div class="section-content-flex v-flex-5">
                <div class="section-header-grid u-grid-custom">
                  <div class="section-header-title-col u-column-span-2">
                    <div class="heading-icon"><svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 17 34" fill="none"><path d="M16.9706 16.9705L2.07015e-05 -0.00010423L1.85557e-05 16.9705L1.641e-05 33.941L16.9706 16.9705Z" fill="#DA43E7"></path></svg></div>
                    <h1 max="ch25" class="section-heading u-text-style-h3">Real stories. Proven in the field.</h1>
                  </div>
                  <div>
                    <div class="u-text-style-main">Hear directly from the businesses and families across Kenya and the region who trust Royal Associates.</div>
                  </div>
                </div>
              </div>

              <div class="scroll-dropdown-flex">
                <?php foreach ($all as $i => $story):
                  $ytid = cs_escape($story['youtube_id']);
                  $thumb = cs_escape(cs_youtube_thumb($ytid));
                  $top = cs_escape($story['subtitle'] . ' — ' . $story['title']);
                ?>
                <div class="scroll-dropdown-item">
                  <div class="scroll-dropdown-top">
                    <div class="scroll-dropdown-top-text u-text-style-h4"><?= $top ?></div>
                  </div>
                  <div class="scroll-dropdown-bottom-wrap">
                    <div class="scroll-dropdown-bottom-grid u-grid-custom">
                      <div class="scroll-dropdown-bottom-video-col u-column-span-2">
                        <div class="scroll-dropdown-bottom-video-wrap cs-video-wrap" data-yt="<?= $ytid ?>">
                          <img src="<?= $thumb ?>" loading="lazy" alt="" style="width:100%;height:100%;object-fit:cover;display:block">
                          <button type="button" class="cs-play-btn" aria-label="Play video"><?= cs_play_icon() ?><span>PLAY VIDEO</span></button>
                        </div>
                      </div>
                      <div class="scroll-dropdown-bottom-content" style="background:#EAF7FE;padding:1.5rem">
                        <div class="cs-quote-text">"Hear directly from <?= cs_escape($story['title']) ?> about their experience working with Royal Associates Insurance Brokers."</div>
                        <div class="cs-quote-attribution">— <?= cs_escape($story['title']) ?>, <?= cs_escape($story['subtitle']) ?></div>
                      </div>
                    </div>
                  </div>
                </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="forced-scroll-section-triggers">
        <?php foreach ($all as $i => $story): ?>
        <div class="trigger"></div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<section class="u-section u-theme-light">
  <div class="section_spacer">
    <div class="u-container">
      <div class="cs-cta">
        <div class="card-wrap" style="background:#2A2D8A;color:#fff;padding:2.5rem;position:relative">
          <h2 max="ch30" class="u-text-style-h3" style="color:#fff">Because we care — insurance built around your needs.</h2>
          <p class="u-text-style-main" style="color:rgba(255,255,255,0.85);margin-top:0.75rem">Talk to our team about corporate or individual insurance solutions tailored for you.</p>
          <div style="margin-top:1.25rem">
            <div data-wf--button-main--variant="primary" class="button_main_wrap" data-button=" " data-trigger="hover focus">
              <div class="clickable_wrap u-cover-absolute"><a href="/contact/" class="clickable_link w-inline-block"><span class="clickable_text u-sr-only">Contact us</span></a></div>
              <div class="button_main_element" style="background:#00ADEF!important;color:#fff!important;border:none!important"><?= cs_play_icon() ?><div aria-hidden="true" class="button_main_text u-text-style-small">Contact us</div></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<style>
.scroll-dropdown-bottom-video-wrap.cs-video-wrap{position:relative;aspect-ratio:16/9;overflow:hidden;background:#1d2130}
.cs-play-btn{position:absolute;inset:0;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:0.5rem;background:rgba(0,0,0,0.35);border:none;color:#fff;cursor:pointer;font:inherit;font-weight:600;font-size:0.85rem;letter-spacing:0.04em;opacity:0;transition:opacity .3s ease,background .3s ease}
.cs-video-wrap:hover .cs-play-btn{opacity:1;background:rgba(0,0,0,0.5)}
.cs-play-btn svg{width:2.5rem;height:auto;fill:#fff}
.cs-play-btn svg path{fill:#fff}
.cs-quote-text{color:#1d2130;font-style:italic}
.cs-quote-attribution{color:#5c6275;margin-top:0.9rem;font-weight:600}
.cs-cta{margin-top:2rem}
</style>

<script>
document.addEventListener('DOMContentLoaded', function(){
  document.querySelectorAll('.cs-play-btn').forEach(function(btn){
    btn.addEventListener('click', function(e){
      e.stopPropagation();
      var wrap = btn.closest('.cs-video-wrap');
      var yt = wrap.getAttribute('data-yt');
      if(!yt) return;
      wrap.innerHTML = '<iframe src="https://www.youtube-nocookie.com/embed/' + yt + '?autoplay=1&rel=0&enablejsapi=1" frameborder="0" allow="autoplay; encrypted-media; picture-in-picture" allowfullscreen style="position:absolute;inset:0;width:100%;height:100%"></iframe>';
    });
  });

  var videoWraps = document.querySelectorAll('.cs-video-wrap');
  var observer = new IntersectionObserver(function(entries){
    entries.forEach(function(entry){
      if(!entry.isIntersecting){
        var iframe = entry.target.querySelector('iframe');
        if(iframe) iframe.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
      }
    });
  }, {threshold:0});
  videoWraps.forEach(function(w){ observer.observe(w); });
});
</script>
<?php
}
