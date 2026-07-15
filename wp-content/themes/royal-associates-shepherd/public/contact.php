<?php
$pageTitle = 'Contact | Royal Associates Insurance Brokers';
$navActive = 'contact';
include __DIR__ . '/../includes/header.php';
include __DIR__ . '/../includes/nav_tail.php';
?>
<div class="page_content"><section class="u-section"><div class="contact-page-hero" style="position:relative;overflow:hidden"><div class="hero-slide-bg is-active" style="background-image:url('/assets/images/hero-images/contact-us.jpg');background-size:cover;background-position:center;background-repeat:no-repeat;position:absolute;inset:0;z-index:0"></div><div style="position:absolute;inset:0;z-index:1;background-color:rgba(0,0,0,0.65)"></div><div class="u-container" style="position:relative;z-index:2"><div class="section_spacer is-pages-hero"><div class="contact-hero-grid u-grid-custom"><div class="hero-grid-left"><div><div class="content-flex v-flex-8 u-justify-content-between"><div class="pages-heading-flex v-flex-6"><h1 class="pages-hero-heading u-text-style-h2">Get in touch <span class="txt-icon-arrow"> </span> with Royal <span class="txt-icon-arrow is-up"> </span> Associates.</h1><div class="hero-p u-text-style-main">Have questions about insurance solutions for your business or family? Reach out and our team will respond within 48 hours.</div></div></div></div></div><div class="contact-content-right u-theme-light"><div class="form w-form"><?php gravity_form('Contact Form', false, false, false, null, false); ?></div></div></div></div></div></div></section>

<?php
$branches = [
  ['name'=>'Nairobi','tag'=>'Headquarters','img'=>'westlands.png','address'=>'Westlands Business Park, 3rd Floor','location'=>'Chiromo Lane, Westlands, Nairobi','phones'=>['(020) 513 5700 / +254 740 000 006'],'email'=>'info@royalassociates.co.ke'],
  ['name'=>'Machakos','tag'=>'Branch','img'=>'machakos.png','address'=>'Opposite Machakos Stadium','location'=>'','phones'=>['(020) 513 5700'],'email'=>''],
  ['name'=>'Mombasa','tag'=>'Branch','img'=>'mombasa.png','address'=>'Links Road, Nyali','location'=>'','phones'=>['(020) 513 5700'],'email'=>''],
  ['name'=>'Kigali','tag'=>'Branch','img'=>'','address'=>'Makuza Peace Plaza, 4th Floor','location'=>'P.O. Box 2554, Kigali','phones'=>['+250 788 601 449'],'email'=>''],
];
$cornerSvg = '<svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 60 60" fill="none" class="corner-svg"><path d="M60 60L60 -2.14577e-06L30 30L-2.14577e-06 60L60 60Z" fill="white"></path></svg>';
$solCorner = '<svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 60 60" fill="none" class="solution-corner"><path d="M60 60L60 -2.14577e-06L30 30L-2.14577e-06 60L60 60Z" fill="white"></path></svg>';
?>
<section class="u-section" style="background-color:#2A2D8A;color:#ffffff">
  <div class="section_spacer">
    <div class="u-container">
      <div class="u-content v-flex-8">
        <div class="content-flex v-flex-6">
          <div class="section-content-flex v-flex-5">
            <div class="section-header-grid u-grid-custom">
              <div class="section-header-title-col u-column-span-2">
                <div class="heading-icon"><svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 17 34" fill="none"><path d="M16.9706 16.9705L2.07015e-05 -0.00010423L1.85557e-05 16.9705L1.641e-05 33.941L16.9706 16.9705Z" fill="#DA43E7"></path></svg></div>
                <h1 max="ch25" class="section-heading u-text-style-h3">Visit one of our branches</h1>
              </div>
              <div>
                <div class="u-text-style-main">With four offices across East Africa, we're always within reach. Find the branch nearest to you.</div>
              </div>
            </div>
          </div>

          <div class="cta-cards-grid u-grid-custom">
            <?php foreach ($branches as $b):
              $img = $b['img'] ? '/assets/images/location-images/' . htmlspecialchars($b['img'], ENT_QUOTES) : '/assets/images/location-images/rwanda.jpg';
              $addr = trim(htmlspecialchars($b['address'] . ($b['location'] ? ' ' . $b['location'] : ''), ENT_QUOTES));
              $tel = htmlspecialchars(implode(' | ', $b['phones']), ENT_QUOTES);
              $mail = htmlspecialchars($b['email'], ENT_QUOTES);
              $mapsQ = urlencode($b['address'] . ' ' . $b['name']);
              $mapsUrl = 'https://www.google.com/maps/search/?api=1&query=' . $mapsQ;
            ?>
            <div data-wf--solution-card--variant="base" class="cta-card-flex v-flex-3">
              <div class="cta-card-wrap">
                <a hov-img="" href="<?= $mapsUrl ?>" class="card-wrap u-theme-dark w-inline-block">
                  <?= $cornerSvg ?>
                  <div class="solution-top-left">
                    <div class="split-card-content-flex is-large">
                      <div>
                        <div max="ch30" class="solution-top-txt u-text-style-large"><?= htmlspecialchars($b['name'], ENT_QUOTES) ?></div>
                      </div>
                    </div>
                    <?= $solCorner ?>
                  </div>
                  <div class="u-visual">
                    <img src="<?= $img ?>" alt="<?= htmlspecialchars($b['name'], ENT_QUOTES) ?>" loading="lazy" class="u-visual-image">
                    <div class="u-visual-bk"></div>
                    <div class="img-overlay"></div>
                  </div>
                </a>
              </div>
              <div>
                <div class="branch-details">
                  <span class="branch-detail-row"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg> <?= $addr ?></span>
                  <span class="branch-detail-row"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg> <?= $tel ?></span>
                  <?php if ($mail): ?>
                  <span class="branch-detail-row"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg> <?= $mail ?></span>
                  <?php endif; ?>
                </div>
                <div data-wf--button-main--variant="link" class="button_main_wrap" data-button=" " data-trigger="hover focus">
                  <div class="clickable_wrap u-cover-absolute">
                    <a href="<?= $mapsUrl ?>" class="clickable_link w-inline-block"><span class="clickable_text u-sr-only">View on map</span></a>
                    <button type="button" class="clickable_btn"><span class="clickable_text u-sr-only">View on map</span></button>
                  </div>
<div class="button_main_element w-variant-625d5df4-ad91-f7dc-9e2f-2e69f3fd7400">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 12 16" fill="none" class="video-play"><path d="M11.25 7.79443L2.19575e-07 15.5887L9.00968e-07 0.000204548L11.25 7.79443Z" fill="black"></path></svg>
                    <div aria-hidden="true" class="button_main_text u-text-style-small">View on map</div>
                    <div class="button_main_icon u-hide-if-empty"></div>
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
</section>

<style>
.hero-grid-left .pages-hero-heading,
.hero-grid-left .hero-p { color: #fff !important; }
.solution-top-left{background-color:#2A2D8A!important;color:#fff!important}
.solution-top-txt{color:#fff!important;text-shadow:none!important}
.cta-card-flex .button_main_element{background-color:#00ADEF!important;color:#fff!important;border:none!important;padding:18.4px 40px!important}
.cta-card-flex .button_main_element:hover{background-color:#0095d4!important}
.cta-card-flex .button_main_element svg path { fill: #fff !important; }
.cta-card-flex .button_main_wrap { margin-top: 1.25rem; display: inline-block; }
.corner-svg path,.solution-corner path{fill:#2A2D8A!important}
.branch-details{display:flex;flex-direction:column;gap:0.5rem}
.branch-detail-row{display:inline-flex;align-items:flex-start;gap:0.5rem}
.branch-detail-row svg{flex:none;margin-top:0.25em}
body .gform_wrapper .gfield_label { color: #1d2130 !important; margin-bottom: 0.5rem !important; }
.gform_wrapper input:not([type=submit]):not([type=checkbox]), .gform_wrapper textarea { background: #f0f4f8 !important; color: #1d2130 !important; border: 1px solid #cbd5e1 !important; border-radius: 0.5rem !important; padding: 0.75rem 1rem !important; width: 100% !important; box-sizing: border-box !important; }
.gform_wrapper textarea { height: 7rem !important; }
.gform_wrapper input::placeholder, .gform_wrapper textarea::placeholder { color: #94a3b8 !important; }
.gform_wrapper .gfield { margin-bottom: 1.25rem !important; }
.gform_wrapper .gfield_checkbox { margin: 0 !important; padding: 0 !important; list-style: none !important; }
.gform_wrapper .gfield_checkbox li label { color: #475569 !important; font-size: 0.8rem !important; line-height: 1.4 !important; }
.gform_wrapper .gfield_checkbox li input[type=checkbox] { margin-top: 0.15rem !important; width: auto !important; }
.gform_wrapper .gfield_required { color: #DA43E7 !important; }
.gform_wrapper .gform_footer { margin-top: 1.5rem !important; padding-top: 0.5rem !important; }
.gform_wrapper .gform_footer input[type=submit] { background: #00ADEF !important; color: #fff !important; border: none !important; padding: 0.75rem 2rem !important; border-radius: 0.5rem !important; cursor: pointer !important; font-weight: 600 !important; width: auto !important; }
.gform_wrapper .gform_footer input[type=submit]:hover { background: #0095d4 !important; }
.gform_confirmation_wrapper { color: #1d2130 !important; padding: 1rem !important; background: #f0f4f8 !important; border-radius: 0.5rem !important; }
</style>
</div>
<?php include __DIR__ . '/../includes/footer.php'; ?>
