<?php
$pageTitle = 'Home | Royal Associates Insurance Brokers';
$navActive = 'home';
$config = require __DIR__ . '/../includes/config.php';
$heroVideoUrl = $config['hero_video_url'] ?? '';
$products = require __DIR__ . '/../includes/products_data.php';
include __DIR__ . '/../includes/header.php';
include __DIR__ . '/../includes/nav_tail.php';
?>
<div class="page_content"><div class="hide w-embed"><style>
.button_main_wrap[data-wf--button-main--variant="primary"] .button_main_element:not(.w-variant-e85564cd-af30-a478-692b-71732aefb3ab):not(.w-variant-625d5df4-ad91-f7dc-9e2f-2e69f3fd7400):not(.w-variant-f3411d48-6319-fd1f-022f-07d76f9c73e0):not(.w-variant-28dbea6b-1838-df17-d642-59092f70edf3){
  background-color:#00ADEF !important;
  border-color:#ffffff !important;
  color:#ffffff !important;
  border-radius:0;
}
.button_main_wrap[data-wf--button-main--variant="primary"] .button_main_element:not(.w-variant-e85564cd-af30-a478-692b-71732aefb3ab):not(.w-variant-625d5df4-ad91-f7dc-9e2f-2e69f3fd7400):not(.w-variant-f3411d48-6319-fd1f-022f-07d76f9c73e0):not(.w-variant-28dbea6b-1838-df17-d642-59092f70edf3):hover{
  background-color:#2A2D8A !important;
  border-color:#ffffff !important;
}
body .nav_component.is-solid .nav_buttons_item:not(.is-main) .button_main_element{
  background-color:#00ADEF !important;
  border-color:#ffffff !important;
  color:#ffffff !important;
  border-radius:0 !important;
}
</style></div><section class="u-section is-hero-section">
<div class="hero-slider-bgs" style="position:absolute;inset:0;z-index:0">
  <div class="hero-slide-bg is-active hero-slide-bg--1" style="position:absolute;inset:0;background-size:cover;background-position:center;background-repeat:no-repeat;opacity:1;transition:opacity 0.8s ease"></div>
  <div class="hero-slide-bg hero-slide-bg--2" style="position:absolute;inset:0;background-size:cover;background-position:center;background-repeat:no-repeat;opacity:0;transition:opacity 0.8s ease"></div>
  <div class="hero-slide-bg hero-slide-bg--3" style="position:absolute;inset:0;background-size:cover;background-position:center;background-repeat:no-repeat;opacity:0;transition:opacity 0.8s ease"></div>
  <div class="hero-slide-bg hero-slide-bg--4" style="position:absolute;inset:0;background-size:cover;background-position:center;background-repeat:no-repeat;opacity:0;transition:opacity 0.8s ease"></div>
  <div class="hero-slide-overlay" aria-hidden="true"></div>
</div>
<div class="section_spacer is-hero">
  <div class="u-container">
    <div class="u-content v-flex-8">
<div class="hero-slide-content is-active" style="transition:opacity 0.5s ease">
  <div class="content-flex v-flex-8">
    <p class="hero-eyebrow">Individual <span class="txt-icon-arrow is-square"> </span> Insurance</p>
    <p class="hero-sub">Motor Risks Insurance: <em>coverage for vehicles against accidents, theft, fire, and third-party liability.</em></p>
    <div class="u-button-wrapper u-margin-top-0"><div class="button_main_wrap"><div class="clickable_wrap u-cover-absolute"><a href="/products#product-18" class="clickable_link w-inline-block"><span class="clickable_text u-sr-only">Learn More</span></a></div><div class="button_main_element"><div aria-hidden="true" class="button_main_text u-text-style-small">Learn More</div><div class="button_main_icon u-hide-if-empty"></div></div></div></div>
  </div>
</div>
<div class="hero-slide-content" style="transition:opacity 0.5s ease;display:none">
  <div class="content-flex v-flex-8">
    <p class="hero-eyebrow">Corporate <span class="txt-icon-arrow is-square"> </span> Insurance</p>
    <p class="hero-sub">Marine Insurance: <em>coverage for marine vessels, cargo, and maritime operations.</em></p>
    <div class="u-button-wrapper u-margin-top-0"><div class="button_main_wrap"><div class="clickable_wrap u-cover-absolute"><a href="/products#product-26" class="clickable_link w-inline-block"><span class="clickable_text u-sr-only">Learn More</span></a></div><div class="button_main_element"><div aria-hidden="true" class="button_main_text u-text-style-small">Learn More</div><div class="button_main_icon u-hide-if-empty"></div></div></div></div>
  </div>
</div>
<div class="hero-slide-content" style="transition:opacity 0.5s ease;display:none">
  <div class="content-flex v-flex-8">
    <p class="hero-eyebrow">Corporate <span class="txt-icon-arrow is-square"> </span> Insurance</p>
    <p class="hero-sub">Property Insurance: <em>coverage for commercial and residential properties against damage.</em></p>
    <div class="u-button-wrapper u-margin-top-0"><div class="button_main_wrap"><div class="clickable_wrap u-cover-absolute"><a href="/products#product-22" class="clickable_link w-inline-block"><span class="clickable_text u-sr-only">Learn More</span></a></div><div class="button_main_element"><div aria-hidden="true" class="button_main_text u-text-style-small">Learn More</div><div class="button_main_icon u-hide-if-empty"></div></div></div></div>
  </div>
</div>
<div class="hero-slide-content" style="transition:opacity 0.5s ease;display:none">
  <div class="content-flex v-flex-8">
    <p class="hero-eyebrow">Corporate <span class="txt-icon-arrow is-square"> </span> Insurance</p>
    <p class="hero-sub">Crop Insurance: <em>protection for farmers against weather, pests, and disease losses.</em></p>
    <div class="u-button-wrapper u-margin-top-0"><div class="button_main_wrap"><div class="clickable_wrap u-cover-absolute"><a href="/products#product-6" class="clickable_link w-inline-block"><span class="clickable_text u-sr-only">Learn More</span></a></div><div class="button_main_element"><div aria-hidden="true" class="button_main_text u-text-style-small">Learn More</div><div class="button_main_icon u-hide-if-empty"></div></div></div></div>
  </div>
</div>
<div class="hero-slider-dots" style="position:absolute;bottom:12rem;left:50%;transform:translateX(-50%);z-index:5;display:flex;gap:0.5rem">
</div>
<div class="hide w-embed"><style>
/* Hero theme -- sky blue buttons, white text */
.is-hero-section {
  --swatch--dark: #00ADEF;
  --swatch--light: #ffffff;
  color: #ffffff;
  min-height: 80vh;
  display: flex;
  align-items: stretch;
}

/* Hero slider */
.is-hero-section { overflow: hidden; }
.is-hero-section .section_spacer.is-hero { flex: 1; display: flex; align-items: center; }
.is-hero-section .hero-slider-dots { bottom: 3rem; }
.hero-slide-content { position:relative; z-index:2; }
/* Guard: keep slide text clear of the absolutely-positioned slider dots so the
   caption/subtext never overlaps the pagination on either slide (esp. slide 2). */
.hero-slide-content { max-width: 40rem; padding-bottom: 4.5rem; }
.hero-slider-arrow:hover { background:rgba(255,255,255,0.3) !important; }

/* Scrim overlay — boosts legibility of hero text over photography */
.hero-slide-overlay {
  position: absolute;
  inset: 0;
  z-index: 1;
  pointer-events: none;
  background:
    linear-gradient(90deg, rgba(12,16,32,0.78) 0%, rgba(12,16,32,0.55) 38%, rgba(12,16,32,0.15) 100%),
    linear-gradient(0deg, rgba(12,16,32,0.65) 0%, rgba(12,16,32,0.10) 45%, rgba(12,16,32,0.30) 100%);
}

/* Tint animated GIF icons to sky blue */
.centered-card-slide .img-abs[src*=".gif"] {
  filter: hue-rotate(260deg) saturate(1.3);
}

/* Shared hero caption + subtext — identical across all slides, with high contrast */
.is-hero-section .hero-eyebrow {
  color: #ffffff;
  opacity: 1;
  margin: 0 0 0.65rem;
  text-transform: uppercase;
  letter-spacing: 0.12em;
  font-size: clamp(0.9rem, 1.4vw, 1.2rem);
  font-weight: 700;
  line-height: 1.35;
  text-shadow: 0 1px 6px rgba(0,0,0,0.55);
}
.is-hero-section .hero-sub {
  color: #ffffff;
  max-width: 36rem;
  margin: 0 0 1.5rem;
  text-transform: none;
  letter-spacing: -0.01em;
  font-size: clamp(1.4rem, 2.6vw, 2rem);
  font-weight: 700;
  line-height: 1.4;
  text-shadow: 0 2px 10px rgba(0,0,0,0.6);
}
.is-hero-section .hero-sub em {
  font-style: italic;
  font-weight: 600;
  color: #eaf6fd;
  text-shadow: 0 2px 10px rgba(0,0,0,0.6);
}

/* Responsive hero backgrounds — serve smaller variants on small screens */
.hero-slide-bg--1 {
  background-image: url(/assets/images/hero-images/raib-hero-private-motor.jpg);
}
.hero-slide-bg--2 {
  background-image: url(/assets/images/hero-images/raib-hero-marine-cargo.jpg);
}
.hero-slide-bg--3 {
  background-image: url(/assets/images/hero-images/raib-hero-industrial-all-risk.jpg);
}
.hero-slide-bg--4 {
  background-image: url(/assets/images/hero-images/raib-hero-agri-weather.jpg);
}
@media (min-width: 768px) {
  .hero-slide-bg--personal {
    background-image: url(/assets/images/hero-images/personal-insurance-p-1080.jpg);
  }
  .hero-slide-bg--corporate {
    background-image: url(/assets/images/hero-images/corporate1-p-1080.jpg);
  }
}
@media (min-width: 1366px) {
  .hero-slide-bg--personal {
    background-image: url(/assets/images/hero-images/personal-insurance-p-1600.jpg);
  }
  .hero-slide-bg--corporate {
    background-image: url(/assets/images/hero-images/corporate1-p-1600.jpg);
  }
}
@media (min-width: 1920px) {
  .hero-slide-bg--personal {
    background-image: url(/assets/images/hero-images/personal-insurance.jpg);
  }
  .hero-slide-bg--corporate {
    background-image: url(/assets/images/hero-images/corporate1.jpg);
  }
}

</style></div></div></div></div></section><section class="u-section u-theme-light"><div class="section_spacer"><div class="u-container"><div class="u-content v-flex-8"><div class="content-flex v-flex-8"><div class="section-content-flex v-flex-5"><div class="section-header-grid u-grid-custom"><div class="section-header-title-col u-column-span-2"><div class="heading-icon"><svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 17 34" fill="none"><path d="M16.9706 16.9705L2.07015e-05 -0.00010423L1.85557e-05 16.9705L1.641e-05 33.941L16.9706 16.9705Z" fill="#DA43E7"></path></svg></div><h1 max="ch25" class="section-heading u-text-style-h3">Healthcare Cover You Can Trust</h1></div><div><div class="u-text-style-main">Comprehensive in-patient medical cover plans designed to protect you and your loved ones — <em>because your health comes first</em>.</div></div></div><div class="split-card u-grid-custom" style="background-color:#2A2D8A;color:#ffffff"><div class="split-card-img-wrap u-visual-wrap"><div id="careers-video" class="u-visual"><img src="/assets/images/royal_med_plans_stack.webp" loading="lazy" alt="Royal Med plan options" class="u-visual-image"></div></div><div class="split-card-content"><div class="split-card-content-flex"><div><div class="section-header-title-flex"><div class="heading-icon is-big"><svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 27 40" fill="none"><path d="M0.134108 13.2377L-2.86156e-05 39.5788L13.2376 26.3412L26.3411 39.4447L26.4752 13.1036L13.3717 9.46626e-05L0.134108 13.2377Z" fill="#DA43E7"></path></svg></div><h2 class="split-card-title u-text-style-h3" style="color:#ffffff;text-transform:uppercase">ROYAL MED</h2></div></div><div class="split-card-content-btn-flex v-flex-6"><h5 class="split-card-title u-text-style-h3 is-h4-t">Introducing the new Royal Associates Insurance Brokers in-patient medical cover plans with amazing perks for you and your loved ones.</h5><div><div data-wf--button-main--variant="primary" class="button_main_wrap" data-button=" " data-trigger="hover focus"><div class="clickable_wrap u-cover-absolute"><a target="" href="/contact/" class="clickable_link w-inline-block"><span class="clickable_text u-sr-only">Learn More</span></a><button type="button" class="clickable_btn"><span class="clickable_text u-sr-only">Learn More</span></button></div><div class="button_main_element"><svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 12 16" fill="none" class="video-play"><path d="M11.25 7.79443L2.19575e-07 15.5887L9.00968e-07 0.000204548L11.25 7.79443Z" fill="black"></path></svg><div aria-hidden="true" class="button_main_text u-text-style-small">Learn More</div><div class="button_main_icon u-hide-if-empty"></div></div></div></div></div></div></div></div></div></div><div class="section-content-flex v-flex-5"><div class="section-header-grid u-grid-custom"><div class="section-header-title-col u-column-span-2"><div class="heading-icon"><svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 17 34" fill="none"><path d="M16.9706 16.9705L2.07015e-05 -0.00010423L1.85557e-05 16.9705L1.641e-05 33.941L16.9706 16.9705Z" fill="#DA43E7"></path></svg></div><h1 max="ch25" class="section-heading u-text-style-h3">Insurance solutions built for a  changing world.</h1></div><div><div class="u-text-style-main">We're modernizing insurance from the ground up to get faster decisions and clearer risk insights.</div></div></div><div class="card-grid-3 u-grid-custom"><div data-wf--centered-card--variant="base" class="centered-card-slide"><div class="centered-card-wrap"><div class="centered-card-content-abs"><div class="div-block"><div class="div-block-2"><img src="/assets/images/696fcef56a3dcace0c796868_Speed%20that%20keeps%20pace.gif" loading="lazy" alt="" class="img-abs"></div></div><div class="u-text-style-large">Speed that keeps pace</div><div>Underwriting decisions in hours, not weeks. Automation and AI streamline complexity.</div></div><svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 60 60" fill="none" class="corner-svg"><path d="M60 60L60 -2.14577e-06L30 30L-2.14577e-06 60L60 60Z" fill="white"></path></svg></div><div class="div-block-21"><svg xmlns="http://www.w3.org/2000/svg" width="0px" height="0px" viewBox="0 0 440 440" fill="none" class="clip-svg"><defs><clipPath id="Subtract" clipPathUnits="objectBoundingBox"><path d="M0.8636363636363636,-3.775068181818181e-8l0.13636363636363635,0.13636363636363635l0,0.8636363636363636l-1,0l0,-1l0.8636363636363636,0z" fill="black"></path></clipPath></defs></svg></div></div><div data-wf--centered-card--variant="base" class="centered-card-slide"><div class="centered-card-wrap"><div class="centered-card-content-abs"><div class="div-block"><div class="div-block-2"><img src="/assets/images/696fcef568e96e22921af758_Intelligence%20that%20rewards.gif" loading="lazy" alt="" class="img-abs"></div></div><div class="u-text-style-large">Intelligence that rewards</div><div>Pricing which proactively rewards the behaviors that drive better outcomes.</div></div><svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 60 60" fill="none" class="corner-svg"><path d="M60 60L60 -2.14577e-06L30 30L-2.14577e-06 60L60 60Z" fill="white"></path></svg></div><div class="div-block-21"><svg xmlns="http://www.w3.org/2000/svg" width="0px" height="0px" viewBox="0 0 440 440" fill="none" class="clip-svg"><defs><clipPath id="Subtract" clipPathUnits="objectBoundingBox"><path d="M0.8636363636363636,-3.775068181818181e-8l0.13636363636363635,0.13636363636363635l0,0.8636363636363636l-1,0l0,-1l0.8636363636363636,0z" fill="black"></path></clipPath></defs></svg></div></div><div data-wf--centered-card--variant="base" class="centered-card-slide"><div class="centered-card-wrap"><div class="centered-card-content-abs"><div class="div-block"><div class="div-block-2"><img src="/assets/images/696fcef5cfacc948b12220a0_Single%20conected%20system.gif" loading="lazy" alt="" class="img-abs"></div></div><div class="u-text-style-large">A single connected system</div><div>Unified product suite designed to provide a one-stop solution for clients.</div></div><svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 60 60" fill="none" class="corner-svg"><path d="M60 60L60 -2.14577e-06L30 30L-2.14577e-06 60L60 60Z" fill="white"></path></svg></div><div class="div-block-21"><svg xmlns="http://www.w3.org/2000/svg" width="0px" height="0px" viewBox="0 0 440 440" fill="none" class="clip-svg"><defs><clipPath id="Subtract" clipPathUnits="objectBoundingBox"><path d="M0.8636363636363636,-3.775068181818181e-8l0.13636363636363635,0.13636363636363635l0,0.8636363636363636l-1,0l0,-1l0.8636363636363636,0z" fill="black"></path></clipPath></defs></svg></div></div></div></div></div></div></div></div></section><section class="u-section" style="background-color:#2A2D8A;color:#ffffff"><div class="section_spacer"><div class="u-container"><div class="u-content v-flex-8"><div class="content-flex v-flex-8"><div class="section-content-flex v-flex-5"><div class="section-header-grid u-grid-custom"><div class="section-header-title-col u-column-span-2"><div class="heading-icon"><svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 17 34" fill="none"><path d="M16.9706 16.9705L2.07015e-05 -0.00010423L1.85557e-05 16.9705L1.641e-05 33.941L16.9706 16.9705Z" fill="#00ADEF"></path></svg></div><h1 max="ch25" class="section-heading u-text-style-h3" style="color:#ffffff">Accelerating the world's most important commercial industries.</h1></div><div><div class="u-text-style-main" style="color:rgba(255,255,255,0.85)">Our technology, underwriting, and partnerships work together in tandem to help businesses move faster, safer, and with greater confidence.</div></div></div><div video-parent="" class="full-video-section-wrap"><div id="careers-video" class="u-visual"><img src="/assets/images/695acdd5ec64ef30d0795208_Rectangle%2062.webp" loading="lazy" alt="" sizes="(max-width: 1360px) 100vw, 1360px" srcset="/assets/images/695acdd5ec64ef30d0795208_Rectangle%2062-p-500.webp 500w, /assets/images/695acdd5ec64ef30d0795208_Rectangle%2062-p-800.webp 800w, /assets/images/695acdd5ec64ef30d0795208_Rectangle%2062-p-1080.webp 1080w, /assets/images/695acdd5ec64ef30d0795208_Rectangle%2062.webp 1360w" class="u-visual-image"><video src="<?= htmlspecialchars($heroVideoUrl, ENT_QUOTES) ?>" loop="" playsinline="" muted="" preload="metadata" poster="/assets/images/695acdd5ec64ef30d0795208_Rectangle%2062.webp" class="u-visual-video" id="royal-industries-video"></video><div class="u-visual-bk"></div><div style="opacity: 0.2;" class="u-visual-overlay"></div><div class="img-overlay"></div></div><div class="abs-video-btn" style="display:flex;pointer-events:none"><div data-wf--button-main--variant="video" style="pointer-events:auto" data-barba-prevent="" class="button_main_wrap u-pointer-on" data-button=" " data-trigger="hover focus"><div class="button_main_element w-variant-f3411d48-6319-fd1f-022f-07d76f9c73e0"><svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 12 16" fill="none" class="video-play w-variant-f3411d48-6319-fd1f-022f-07d76f9c73e0"><path d="M11.25 7.79443L2.19575e-07 15.5887L9.00968e-07 0.000204548L11.25 7.79443Z" fill="black"></path></svg><div aria-hidden="true" class="button_main_text u-text-style-small">PLAY VIDEO</div><div class="button_main_icon u-hide-if-empty"></div></div></div></div><div class="abs-video-stats"><div class="abs-video-stats-grid u-grid-custom"><div class="video-stats"><div class="video-stat-text u-text-style-display">1,<span count-from="450">450</span>+</div><div class="video-stat-p u-text-style-large">Policies iSSUED</div></div><div class="video-stats"><div class="video-stat-text u-text-style-display"><span count-from="75">75</span>%</div><div class="video-stat-p u-text-style-large">Faster indication times</div></div><div class="video-stats"><div class="video-stat-text u-text-style-display">$<span count-from="350">350</span>B+</div><div class="video-stat-p u-text-style-large">Insured volume</div></div></div></div></div></div></div></div></div></div></section><section class="u-section u-theme-light"><div class="section_spacer"><div class="u-container"><div class="u-content v-flex-8"><div class="content-flex v-flex-8"><div class="card-wrap" style="background-color:#00ADEF;color:#ffffff"><svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 60 60" fill="none" class="corner-svg"><path d="M60 60L60 -2.14577e-06L30 30L-2.14577e-06 60L60 60Z" fill="white"></path></svg><div class="card-padding"><div class="split-card-content-flex is-large"><div><div class="div-block-3"><h2 max="ch30" class="split-card-title u-text-style-h3" style="color:#ffffff">Turn risk management into a competitive advantage.</h2><div class="div-block-4"><div data-wf--button-main--variant="primary" class="button_main_wrap" data-button=" " data-trigger="hover focus"><div class="clickable_wrap u-cover-absolute"><a target="" href="/contact/" class="clickable_link w-inline-block"><span class="clickable_text u-sr-only">CONTACT US</span></a><button type="button" class="clickable_btn"><span class="clickable_text u-sr-only">CONTACT US</span></button></div><div class="button_main_element"><svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 12 16" fill="none" class="video-play"><path d="M11.25 7.79443L2.19575e-07 15.5887L9.00968e-07 0.000204548L11.25 7.79443Z" fill="black"></path></svg><div aria-hidden="true" class="button_main_text u-text-style-small">CONTACT US</div><div class="button_main_icon u-hide-if-empty"></div></div></div></div></div></div><div class="split-card-content-btn-flex v-flex-6"><div max="ch50" class="u-text-style-main">Join the hundreds of businesses protecting what matters with Royal Associates.</div></div></div></div></div></div></div></div></div></section><?php
/* Wider cards: 2 featured only (was 4) */
$homeFeatured = [
  ['id' => 2,  'tab' => 'individual'],
  ['id' => 5,  'tab' => 'corporate'],
];
?><section class="u-section u-theme-light home-products">
  <div class="hide w-embed"><style>
    @keyframes pd-float{0%,100%{transform:translateY(0)}50%{transform:translateY(-8px)}}
    .home-products .section_spacer { padding-top: var(--_spacing---space--7, 3rem); padding-bottom: var(--_spacing---space--7, 3rem); }
    .home-products .home-products-intro { max-width: 68ch; color: #1d2130; }
    .home-products .home-products-grid {
      display: grid;
      grid-template-columns: repeat(2, minmax(0, 1fr));
      gap: 2rem;
      margin-top: 2.5rem;
    }
    @media (max-width: 767px) {
      .home-products .home-products-grid { grid-template-columns: 1fr; }
    }

    /* Card shell: border follows cutout via matching outer/inner polygons */
    .home-pd-card {
      --pd-cut: 32px;
      --pd-stroke: 1.5px;
      position: relative;
      background: #9ec9e8;
      clip-path: polygon(
        0 0,
        100% 0,
        100% calc(100% - var(--pd-cut)),
        calc(100% - var(--pd-cut)) 100%,
        0 100%
      );
      padding: var(--pd-stroke);
      filter: drop-shadow(0 14px 28px rgba(42,45,138,0.10)) drop-shadow(0 4px 8px rgba(42,45,138,0.06));
      transition: transform 350ms cubic-bezier(0.34,1.56,0.64,1), filter 350ms cubic-bezier(0.34,1.56,0.64,1);
      animation: pd-float 3.5s ease-in-out infinite;
      isolation: isolate;
    }
    .home-pd-inner {
      display: flex;
      flex-direction: column;
      background: #EAF7FE;
      text-decoration: none;
      height: 100%;
      min-height: 100%;
      /* Inset clip so the stroke follows the same cut angle */
      clip-path: polygon(
        var(--pd-stroke) var(--pd-stroke),
        calc(100% - var(--pd-stroke)) var(--pd-stroke),
        calc(100% - var(--pd-stroke)) calc(100% - var(--pd-cut) + 0.35px),
        calc(100% - var(--pd-cut) + 0.35px) calc(100% - var(--pd-stroke)),
        var(--pd-stroke) calc(100% - var(--pd-stroke))
      );
    }
    .home-pd-card:hover {
      animation: none;
      transform: translateY(-12px) scale(1.02);
      filter: drop-shadow(0 24px 36px rgba(42,45,138,0.16)) drop-shadow(0 6px 12px rgba(42,45,138,0.10));
    }
    .home-pd-card:focus-within { outline: 3px solid #DA43E7; outline-offset: 3px; }
    .home-pd-card:nth-child(2){animation-delay:0.5s}
    .home-pd-card:nth-child(3){animation-delay:1s}
    .home-pd-card:nth-child(4){animation-delay:0.25s}
    .home-pd-card:nth-child(5){animation-delay:0.75s}
    .home-pd-card:nth-child(6){animation-delay:1.25s}
    .home-pd-card-link {
      display: flex;
      flex-direction: column;
      text-decoration: none;
      color: inherit;
      flex: 1 1 auto;
      min-height: 0;
    }

    /* Image: full bleed, crop white photo borders */
    .home-pd-card .cta-card-wrap {
      overflow: hidden;
      background: #d7ebf7;
      aspect-ratio: 16 / 10;
      width: 100%;
      margin: 0;
      padding: 0;
      flex: 0 0 auto;
    }
    .home-pd-card .cta-card-wrap img {
      display: block;
      width: 100%;
      height: 100%;
      object-fit: cover;
      object-position: center 40%;
      transform: scale(1.08);
      transition: transform 300ms cubic-bezier(0.22,1,0.36,1);
    }
    .home-pd-card:hover .cta-card-wrap img { transform: scale(1.22); }

    /* Clear vertical sections: name / description / actions */
    .home-pd-body {
      padding: 1.35rem 1.4rem 1.1rem;
      display: flex;
      flex-direction: column;
      gap: 0.75rem;
      flex: 1 1 auto;
      min-height: 7.5rem;
    }
    .home-pd-name {
      color: #2A2D8A;
      margin: 0;
      font-size: clamp(1.25rem, 1.6vw, 1.45rem);
      line-height: 1.25;
      font-weight: 600;
      letter-spacing: -0.015em;
    }
    .home-pd-card .solution-top-txt {
      color: #1d2130;
      margin: 0;
      max-width: 48ch;
      font-size: 0.98rem;
      line-height: 1.55;
      flex: 1 1 auto;
    }
    .home-pd-actions {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 0.75rem;
      margin-top: 0;
      padding: 1rem 1.4rem 1.15rem;
      border-top: 1px solid #c5dff0;
      background: rgba(255,255,255,0.35);
      flex: 0 0 auto;
    }
    .home-pd-quote {
      background: #2A2D8A;
      color: #fff;
      border: none;
      padding: 0.6rem 1.3rem;
      font: inherit;
      font-weight: 600;
      font-size: 0.8rem;
      letter-spacing: 0.02em;
      cursor: pointer;
      white-space: nowrap;
      transition: background-color 200ms ease;
    }
    .home-pd-quote:hover { background: #1f2168; }
    .home-pd-quote:focus-visible { outline: 3px solid #00ADEF; outline-offset: 2px; }
    .home-pd-link {
      display: inline-flex;
      align-items: center;
      gap: 0.4rem;
      color: #00ADEF;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.04em;
      font-size: 0.8rem;
      transition: color 200ms cubic-bezier(0.22,1,0.36,1);
    }
    .home-pd-link:hover { color: #DA43E7; }
    .home-pd-corner {
      position: absolute;
      right: 0;
      bottom: 0;
      width: var(--pd-cut, 32px);
      height: var(--pd-cut, 32px);
      pointer-events: none;
      z-index: 2;
    }
    .home-pd-corner svg { display: block; width: 100%; height: 100%; }
    .home-products-cta { margin-top: 2.5rem; }
    @media (prefers-reduced-motion: reduce) {
      .home-pd-card { animation: none; }
      .home-pd-card,
      .home-pd-card .cta-card-wrap img,
      .home-pd-link { transition: none; }
      .home-pd-card:hover { animation: none; transform: translateY(-4px); }
      .home-pd-card:hover .cta-card-wrap img { transform: scale(1.08); }
    }
  </style></div>
  <div class="section_spacer">
    <div class="u-container">
      <div class="u-content v-flex-8">
        <div class="content-flex v-flex-8">
          <div class="section-content-flex v-flex-5">
            <div class="section-header-grid u-grid-custom">
              <div class="section-header-title-col u-column-span-2">
                <div class="heading-icon"><svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 17 34" fill="none"><path d="M16.9706 16.9705L2.07015e-05 -0.00010423L1.85557e-05 16.9705L1.641e-05 33.941L16.9706 16.9705Z" fill="#DA43E7"></path></svg></div>
                <h2 class="section-heading u-text-style-h3">Cover for every stage of life and business</h2>
              </div>
              <div>
                <p class="u-text-style-main home-products-intro">From your family's health to your company's biggest risks, we broker protection that fits — <em>because we care</em>.</p>
              </div>
            </div>
          </div>
          <div class="home-products-grid">
            <?php foreach ($homeFeatured as $feat):
              $p = $products[$feat['tab']][$feat['id']] ?? null;
              if (!$p) { continue; }
              $name = htmlspecialchars($p['name'], ENT_QUOTES);
              $short = htmlspecialchars($p['short'], ENT_QUOTES);
              $img = htmlspecialchars($p['img'], ENT_QUOTES);
              $href = $feat['tab'] === 'individual' ? '/products#individual' : '/products#corporate';
              $qfn = "showQuoteModal('" . str_replace("'", "\\'", $p['name']) . "')";
            ?>
            <div class="home-pd-card">
              <div class="home-pd-inner">
              <a href="<?= $href ?>" class="home-pd-card-link">
                <div class="cta-card-wrap">
                  <img src="/assets/images/royal_product_photos/<?= $img ?>" loading="lazy" alt="<?= $name ?>">
                </div>
                <div class="home-pd-body">
                  <h3 class="home-pd-name u-text-style-h4"><?= $name ?></h3>
                  <p class="solution-top-txt"><?= $short ?></p>
                </div>
              </a>
              <div class="home-pd-actions">
                <a href="<?= $href ?>" class="home-pd-link">Learn more</a>
                <button type="button" class="home-pd-quote" onclick="<?= $qfn ?>">Get a quote</button>
              </div>
              <span class="home-pd-corner" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 60 60" fill="none" class="corner-svg"><path d="M60 60L60 -2.14577e-06L30 30L-2.14577e-06 60L60 60Z" fill="#ffffff"></path></svg></span>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
          <div class="home-products-cta">
            <div class="u-button-wrapper u-margin-top-0">
              <div data-wf--button-main--variant="primary" class="button_main_wrap">
                <div class="clickable_wrap u-cover-absolute"><a href="/products/" class="clickable_link w-inline-block"><span class="clickable_text u-sr-only">View all solutions</span></a></div>
                <div class="button_main_element"><div aria-hidden="true" class="button_main_text u-text-style-small">View all solutions</div><div class="button_main_icon u-hide-if-empty"></div></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="hide w-embed"><style>
.cta-card-wrap { aspect-ratio: 3/2; }
.cta-cards-grid.u-grid-custom { --_column-count---value: 2; grid-row-gap: var(--_spacing---space--7); }
.solution-top-txt { font-size: 0.95rem; line-height: 1.55; word-break: normal; }
.modal-overlay { position:fixed; z-index:9999; inset:0; background:rgba(0,0,0,0.5); display:flex; align-items:center; justify-content:center; opacity:0; pointer-events:none; transition:opacity 0.3s; }
.modal-overlay.active { opacity:1; pointer-events:auto; }
.modal-box { background:#fff; color:#1d2130; border-radius:1rem; max-width:38rem; width:90vw; max-height:90vh; padding:2rem; position:relative; overflow-y:auto; transform:scale(0.9); transition:transform 0.3s; }
.modal-overlay.active .modal-box { transform:scale(1); }
.modal-close { position:absolute; top:1rem; right:1rem; background:none; border:none; font-size:1.5rem; cursor:pointer; color:#666; padding:0.25rem; line-height:1; }
.modal-box h2 { font-size:1.5rem; margin:0 0 0.25rem; font-weight:600; }
.modal-box .modal-sub { color:#666; margin-bottom:1.5rem; }
.modal-box label { display:block; font-size:0.85rem; font-weight:500; margin-bottom:0.25rem; color:#333; }
.modal-box input, .modal-box select, .modal-box textarea { width:100%; padding:0.6rem 0.75rem; border:1px solid #ddd; border-radius:0.5rem; font-size:0.95rem; font-family:inherit; margin-bottom:1rem; box-sizing:border-box; }
.modal-box input:focus, .modal-box select:focus { outline:none; border-color:#00ADEF; box-shadow:0 0 0 2px rgba(0,173,239,0.15); }
.modal-box .btn-submit { background:#1d2130; color:#fff; border:none; border-radius:4px; padding:0.6rem 2rem; font-size:0.9rem; cursor:pointer; font-family:inherit; font-weight:500; letter-spacing:0.03em; }
.modal-box .btn-submit:hover { opacity:0.85; }
</style></div>
<script>
document.addEventListener("DOMContentLoaded", function() {
  var toggles = document.querySelectorAll("[data-expand], [data-collapse]");
  function getCardBody(el) {
    var card = el.closest(".cta-card-flex");
    if (!card) return null;
    return { card: card, short: card.querySelector("[data-product-short]"), full: card.querySelector("[data-product-full]"), expand: card.querySelector("[data-expand]"), collapse: card.querySelector("[data-collapse]"), quote: card.querySelector("[data-quote]") };
  }
  document.addEventListener("click", function(e) {
    var btn = e.target.closest("[data-expand]");
    if (btn) {
      var b = getCardBody(btn);
      if (b) { b.short.style.display = "none"; b.full.style.display = ""; b.expand.style.display = "none"; b.collapse.style.display = "inline-flex"; b.quote.style.display = ""; }
      return;
    }
    btn = e.target.closest("[data-collapse]");
    if (btn) {
      var b = getCardBody(btn);
      if (b) { b.short.style.display = ""; b.full.style.display = "none"; b.expand.style.display = "inline-flex"; b.collapse.style.display = "none"; b.quote.style.display = "none"; }
      return;
    }
    btn = e.target.closest("[data-quote]");
    if (btn) {
      var id = btn.getAttribute("data-quote");
      var nameEl = btn.closest(".cta-card-flex").querySelector(".solution-top-txt");
      var name = nameEl ? nameEl.textContent.trim() : "";
      showQuoteModal(name);
      return;
    }
    if (e.target.closest(".modal-overlay") && !e.target.closest(".modal-box")) {
      closeQuoteModal();
    }
  });
  window.showQuoteModal = function(product) {
    var overlay = document.getElementById("quote-modal");
    if (!overlay) return;
    var pf = overlay.querySelector(".gf-product-field input");
    if (pf) { pf.value = product; pf.readOnly = true; }
    overlay.classList.add("active");
  };
  window.closeQuoteModal = function() {
    var overlay = document.getElementById("quote-modal");
    if (overlay) overlay.classList.remove("active");
  };
  document.addEventListener("keydown", function(e) {
    if (e.key === "Escape") closeQuoteModal();
  });
});
</script>
<script>
(function () {
  var bgs = Array.prototype.slice.call(document.querySelectorAll('.hero-slide-bg'));
  var contents = Array.prototype.slice.call(document.querySelectorAll('.hero-slide-content'));
  var dotsWrap = document.querySelector('.hero-slider-dots');
  if (!bgs.length) return;
  var current = 0;
  var timer = null;
  var DELAY = 6000;

  // Build pagination dots to match the number of slides
  var dots = [];
  if (dotsWrap) {
    bgs.forEach(function (el, idx) {
      var dot = document.createElement('button');
      dot.className = 'hero-slider-dot' + (idx === 0 ? ' is-active' : '');
      dot.setAttribute('data-slide', idx);
      dot.setAttribute('aria-label', 'Slide ' + (idx + 1));
      dot.style.width = '12px';
      dot.style.height = '12px';
      dot.style.borderRadius = '50%';
      dot.style.border = '2px solid #fff';
      dot.style.background = idx === 0 ? '#fff' : 'transparent';
      dot.style.cursor = 'pointer';
      dot.style.padding = '0';
      dot.style.transition = 'all 0.2s';
      dot.addEventListener('click', function () { goSlide(idx); });
      dotsWrap.appendChild(dot);
      dots.push(dot);
    });
  } else {
    dots = Array.prototype.slice.call(document.querySelectorAll('.hero-slider-dot'));
  }

  function goSlide(i) {
    current = (i % bgs.length + bgs.length) % bgs.length;
    bgs.forEach(function (el, idx) {
      var on = idx === current;
      el.classList.toggle('is-active', on);
      el.style.opacity = on ? '1' : '0';
    });
    contents.forEach(function (el, idx) {
      var on = idx === current;
      el.classList.toggle('is-active', on);
      el.style.display = on ? '' : 'none';
    });
    dots.forEach(function (el, idx) {
      var on = idx === current;
      el.classList.toggle('is-active', on);
      el.style.background = on ? '#fff' : 'transparent';
    });
  }
  window.goSlide = goSlide;

  function next() { goSlide(current + 1); }
  function start() { stop(); timer = setInterval(next, DELAY); }
  function stop() { if (timer) { clearInterval(timer); timer = null; } }

  goSlide(0);
  start();

  var section = document.querySelector('.is-hero-section');
  if (section) {
    section.addEventListener('mouseenter', stop);
    section.addEventListener('mouseleave', start);
  }
})();
</script><div id="quote-modal" class="modal-overlay"><div class="modal-box"><button class="modal-close" onclick="closeQuoteModal()">&times;</button><h2>Get a Quote</h2><p class="modal-sub">Fill in your details and we will get back to you.</p><?php gravity_form('Get a Quote', false, false, false, null, false); ?></div></div>
<style>
#quote-modal .gf-product-field input { background: #f0f4f8 !important; border: 1px solid #cbd5e1 !important; cursor: default !important; opacity: 0.8 !important; }
#quote-modal input:not([type=submit]):not([type=checkbox]), #quote-modal textarea { border: 1px solid #cbd5e1 !important; border-radius: 0.375rem !important; padding: 0.625rem 0.75rem !important; font-size: 0.95rem !important; width: 100% !important; }
#quote-modal .gfield_label { font-weight: 600 !important; font-size: 0.85rem !important; margin-bottom: 0.25rem !important; }
#quote-modal .gfield { margin-bottom: 0.75rem !important; }
#quote-modal .gform_footer input[type=submit] { background: #00ADEF !important; color: #fff !important; border: none !important; padding: 0.7rem 2rem !important; border-radius: 0.375rem !important; cursor: pointer !important; font-weight: 600 !important; font-size: 0.95rem !important; }
#quote-modal .gform_footer input[type=submit]:hover { background: #0095d4 !important; }
</style>
<?php include __DIR__ . '/../includes/footer.php'; ?>