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
      <div class="hero-grid-left-max" style="margin-left:0;padding:0 4rem;justify-content:center;display:flex;min-height:auto">
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
      <div id="cs-hero" class="u-visual" style="background-color:#2A2D8A">
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
 * Static video testimonials grid — replaces the old Webflow forced-scroll
 * accordion. A featured spotlight tile on top, then the stories in a 2-per-row
 * grid. Each video keeps its YouTube thumbnail, a play-overlay button, and a
 * caption (company + role + tag) beneath it. Styled to match the Royal brand.
 */
function cs_render_forced_scroll(array $featured, array $stories): void
{
    $all = array_merge([$featured], $stories);
?>
<section class="u-section cs-stories-section" style="background:#fff">
  <div class="section_spacer">
    <div class="u-container">
      <div class="u-content v-flex-8">
        <div class="section-header-grid u-grid-custom" style="margin-bottom:clamp(1.5rem,3vw,2.5rem)">
          <div class="section-header-title-col u-column-span-2">
            <div class="heading-icon"><svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 17 34" fill="none"><path d="M16.9706 16.9705L2.07015e-05 -0.00010423L1.85557e-05 16.9705L1.641e-05 33.941L16.9706 16.9705Z" fill="#00ADEF"></path></svg></div>
            <h2 max="ch25" class="section-heading u-text-style-h3" style="color:#2A2D8A">Real stories. Proven in the field.</h2>
          </div>
          <div>
            <div class="u-text-style-main" style="color:#2A2D8A">Hear directly from the businesses and families across Kenya and the region who trust Royal Associates.</div>
          </div>
        </div>

        <div class="cs-grid">
          <?php foreach ($all as $story):
            $ytid = cs_escape($story['youtube_id']);
            $thumb = cs_escape(cs_youtube_thumb($ytid));
            $company = cs_escape($story['subtitle']);
            $role = cs_escape($story['title']);
            $tag = cs_escape($story['tag'] ?? 'Client');
          ?>
          <div class="cs-card">
            <div class="cs-video-wrap" data-yt="<?= $ytid ?>">
              <img src="<?= $thumb ?>" loading="lazy" alt="<?= $company ?> testimonial video" style="width:100%;height:100%;object-fit:cover;display:block">
              <div class="cs-video-overlay">
                <div data-wf--button-main--variant="video" class="button_main_wrap u-pointer-on cs-video-cta">
                  <div class="clickable_wrap u-cover-absolute"><button type="button" class="cs-play-trigger clickable_btn" aria-label="Play video: <?= $company ?>"><span class="clickable_text u-sr-only">PLAY VIDEO</span></button></div>
                  <div class="button_main_element cs-video-cta-el" style="background-color:#00ADEF!important;color:#fff!important;border:none!important;border-radius:0!important"><svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 12 16" fill="none" class="video-play"><path d="M11.25 7.79443L2.19575e-07 15.5887L9.00968e-07 0.000204548L11.25 7.79443Z" fill="black"></path></svg><div aria-hidden="true" class="button_main_text u-text-style-small">PLAY VIDEO</div><div class="button_main_icon u-hide-if-empty"></div></div>
                </div>
              </div>
            </div>
            <div class="cs-caption">
              <div class="cs-caption-name"><?= $company ?></div>
              <div class="cs-caption-role"><?= $role ?></div>
              <span class="cs-tag"><?= $tag ?></span>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
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
.cs-stories-section{background:#fff}
.cs-grid{display:grid;grid-template-columns:1fr 1fr;gap:clamp(1.25rem,2.5vw,2.25rem)}
.cs-card{display:flex;flex-direction:column;background:#fff;border:1px solid #e3e8f0;border-radius:8px;overflow:hidden;box-shadow:0 1px 2px rgba(26,32,53,0.04)}
.cs-video-wrap{position:relative;aspect-ratio:16/9;overflow:hidden;background:#1d2130;border-radius:0;cursor:pointer;border-bottom:3px solid #00ADEF}
.cs-video-wrap img{width:100%;height:100%;object-fit:cover;display:block}
.cs-video-overlay{position:absolute;inset:0;display:flex;align-items:flex-start;justify-content:flex-start;padding:0.9rem;background:rgba(26,32,53,0.18);pointer-events:none}
.cs-video-cta{pointer-events:auto;cursor:pointer}
.cs-video-cta .button_main_element{background-color:#00ADEF !important;color:#fff !important;border:none !important;border-radius:0 !important;display:inline-flex;align-items:center;gap:0.55rem;padding:0.7rem 1.15rem;box-shadow:0 6px 18px rgba(26,32,53,0.28);transition:transform .28s cubic-bezier(0.22,1,0.36,1),background-color .2s ease}
.cs-video-cta:hover .button_main_element{background-color:#2A2D8A !important}
.cs-video-cta:active .button_main_element{transform:scale(0.97)}
.cs-video-cta .video-play{width:0.95rem;height:auto;fill:#fff}
.cs-video-cta .button_main_text{color:#fff;font-weight:700;letter-spacing:0.04em}
.cs-caption{display:flex;flex-direction:column;gap:0.2rem;padding:1.1rem 1.25rem 1.25rem}
.cs-caption-name{color:#2A2D8A;font-weight:700;font-size:1.05rem;line-height:1.3}
.cs-caption-role{color:#5c6275;font-size:0.95rem}
.cs-tag{display:inline-block;align-self:flex-start;margin-top:0.6rem;background:#00ADEF;color:#fff;font-size:0.72rem;font-weight:700;letter-spacing:0.04em;text-transform:uppercase;padding:0.25rem 0.6rem;border-radius:4px}
.cs-cta{margin-top:2rem}
@media (max-width:720px){
  .cs-grid{grid-template-columns:1fr}
}
@media (prefers-reduced-motion: reduce){
  .cs-video-cta .button_main_element{transition:none}
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function(){
  function playVideo(wrap){
    if(!wrap) return;
    var yt = wrap.getAttribute('data-yt');
    if(!yt || wrap.querySelector('iframe')) return;
    wrap.innerHTML = '<iframe src="https://www.youtube-nocookie.com/embed/' + yt + '?autoplay=1&rel=0&enablejsapi=1" frameborder="0" allow="autoplay; encrypted-media; picture-in-picture" allowfullscreen style="position:absolute;inset:0;width:100%;height:100%"></iframe>';
  }

  document.querySelectorAll('.cs-video-wrap').forEach(function(wrap){
    wrap.addEventListener('click', function(){ playVideo(wrap); });
  });
  document.querySelectorAll('.cs-play-trigger').forEach(function(btn){
    btn.addEventListener('click', function(e){
      e.stopPropagation();
      playVideo(btn.closest('.cs-video-wrap'));
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
