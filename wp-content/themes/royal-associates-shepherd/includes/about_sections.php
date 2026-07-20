<?php
/**
 * Render helpers for the About page sections.
 */

function about_heading_icon(string $color = '#00ADEF'): string
{
    return '<div class="heading-icon"><svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 17 34" fill="none"><path d="M16.9706 16.9705L2.07015e-05 -0.00010423L1.85557e-05 16.9705L1.641e-05 33.941L16.9706 16.9705Z" fill="' . htmlspecialchars($color, ENT_QUOTES, 'UTF-8') . '"></path></svg></div>';
}

/**
 * Thin-line (Lucide-equivalent) SVG path sets for the circle-badge icons.
 * Each value is the inner markup of a 24x24 viewBox SVG (stroke-based, fill:none).
 */
function about_icon_paths(): array
{
    return [
        'eye' => '<circle cx="12" cy="12" r="9"/><path d="M2 12s3.5-6 10-6 10 6 10 6-3.5 6-10 6-10-6-10-6Z"/>',
        'target' => '<circle cx="12" cy="12" r="9"/><circle cx="12" cy="12" r="5"/><circle cx="12" cy="12" r="1.4"/>',
        'heart' => '<path d="M12 20s-7-4.5-9.5-9C1 8 3 4.5 6.5 4.5 9 4.5 12 7 12 7s3-2.5 5.5-2.5C21 4.5 23 8 21.5 11 19 15.5 12 20 12 20Z"/>',
        'handshake' => '<path d="M11 17.5 5 12l2-2 3 3 3-3 4 4"/><path d="M14 9.5 16 7.5l3 3"/><path d="M3 9.5 6 6.5l3.5 3"/>',
        'sparkles' => '<path d="M12 3l1.6 4.4L18 9l-4.4 1.6L12 15l-1.6-4.4L6 9l4.4-1.6L12 3Z"/><path d="M18 14l.8 2.2L21 17l-2.2.8L18 20l-.8-2.2L15 17l2.2-.8L18 14Z"/>',
        'lightbulb' => '<path d="M9 18h6"/><path d="M10 21h4"/><path d="M12 3a6 6 0 0 0-4 10.5c.7.7 1 1.5 1 2.5h6c0-1 .3-1.8 1-2.5A6 6 0 0 0 12 3Z"/>',
        'award' => '<circle cx="12" cy="9" r="5"/><path d="M8.5 13.5 7 22l5-3 5 3-1.5-8.5"/>',
        'users' => '<circle cx="9" cy="8" r="3.2"/><path d="M3.5 19c0-3 2.5-5 5.5-5s5.5 2 5.5 5"/><path d="M16 5.5a3 3 0 0 1 0 5.6"/><path d="M17.5 14c2.2.4 4 2.2 4 5"/>',
    ];
}

/**
 * Circular line-icon badge — PDF "icon-in-circle" motif.
 * $name must be a key from about_icon_paths().
 */
function about_icon_badge(string $name, int $size = 64): string
{
    $paths = about_icon_paths();
    $inner = $paths[$name] ?? $paths['eye'];
    $svg = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="28" height="28" '
        . 'fill="none" stroke="#00ADEF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">'
        . $inner . '</svg>';
    return '<span class="about-icon-badge" style="--badge-size:' . $size . 'px" aria-hidden="true">' . $svg . '</span>';
}

function about_button(string $href, string $label, string $variant = 'primary'): string
{
    $href = htmlspecialchars($href, ENT_QUOTES, 'UTF-8');
    $label = htmlspecialchars($label, ENT_QUOTES, 'UTF-8');
    $sr = htmlspecialchars($label, ENT_QUOTES, 'UTF-8');
    $variantAttr = $variant === 'secondary' ? ' data-wf--button-main--variant="secondary"' : ($variant === 'primary' ? ' data-wf--button-main--variant="primary"' : '');

    return <<<HTML
<div class="button_main_wrap"{$variantAttr} data-button=" " data-trigger="hover focus">
  <div class="clickable_wrap u-cover-absolute">
    <a href="{$href}" class="clickable_link w-inline-block"><span class="clickable_text u-sr-only">{$sr}</span></a>
    <button type="button" class="clickable_btn"><span class="clickable_text u-sr-only">{$sr}</span></button>
  </div>
  <div class="button_main_element">
    <svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 12 16" fill="none" class="video-play"><path d="M11.25 7.79443L2.19575e-07 15.5887L9.00968e-07 0.000204548L11.25 7.79443Z" fill="black"></path></svg>
    <div aria-hidden="true" class="button_main_text u-text-style-small">{$label}</div>
    <div class="button_main_icon u-hide-if-empty"></div>
  </div>
</div>
HTML;
}

function about_starts_with(string $haystack, string $needle): bool
{
    return $needle === '' || strpos($haystack, $needle) === 0;
}

function about_get_partner_logos(): array
{
    $dir = __DIR__ . '/../assets/images/partners/royal_partners_logos_transparent';
    if (!is_dir($dir)) {
        return [];
    }
    $files = glob($dir . '/logo_*.webp') ?: [];
    sort($files, SORT_NATURAL);
    return array_map(static fn(string $path): string => '/assets/images/partners/royal_partners_logos_transparent/' . basename($path), $files);
}

function about_parse_team_filename(string $filename): array
{
    $base = pathinfo($filename, PATHINFO_FILENAME);
    $isGroup = stripos($base, 'group_photo') !== false;

    $known = [
        'Clifford_Mbae' => ['Clifford Mbae', 'Chief Executive Officer'],
        'Lillian_Kwimba' => ['Lillian Kwimba', 'Executive Director'],
        'Christopher_Kasema' => ['Christopher Kasema', 'Director Strategy and Change'],
        'Linda_Gladys_Langat' => ['Linda Gladys Langat', 'Head of Finance'],
        'Pheneahs_Kinyua' => ['Pheneahs Kinyua', 'Operations Manager'],
        'Rachael_Mueni_Mwangangi' => ['Rachael Mueni Mwangangi', 'HR, Administration & Healthcare Executive'],

        'Dr_Omar_Farouk_Sherman' => ['Dr. Omar (Farouk) Sherman HSC', 'Director, Chairman Kipini Wildlife & Botanical Conservancy'],
        'Jay_Kothari' => ['Jay Kothari', 'Strategy and Operations Advisor'],
        'Peter_Gichana' => ['Peter Gichana', 'Director, Strategic Management'],
        'Catherine_Kariuki' => ['Catherine Kariuki', 'Underwriting Medical'],
        'Farhiya_Yussuf' => ['Farhiya Yussuf', 'Underwriting and Claims'],
        'Gift_Mwaka' => ['Gift Mwaka', 'Human Resource and Administration'],
        'Prestone_Sikuku' => ['Prestone Sikuku', 'Underwriting and Claims'],
        'Samantha_Kagendo' => ['Samantha Kagendo', 'Underwriting and Claims'],
        'Samson_Maingi' => ['Samson Maingi', 'Underwriting and Claims'],
        'Daniel_Kahindi' => ['Daniel Kahindi', 'Business Development'],
        'Elizabeth_Odero' => ['Elizabeth Odero', 'Administration'],
        'Joseph_Kaanywa' => ['Joseph Kaanywa', 'Finance'],
        'Njeri_Maureen_Mutuku' => ['Njeri Maureen Mutuku', 'Office Administration'],
        'Sandra_Kwimba' => ['Sandra Kwimba', 'Finance Executive'],
        'Victor_Kisanya' => ['Victor Kisanya', 'Administration'],
        'Bruce_Kioko' => ['Bruce Kioko', 'Business Development Executive'],
        'Magdalene_Watetu' => ['Magdalene Watetu', 'Underwriting and Claims'],
        'Agnes_Murekatete' => ['Agnes Murekatete', 'Customer Care Executive'],
        'Alice_Uwase' => ['Alice Uwase', 'Customer Care Executive'],
        'Giselle_Uwase_Byusa' => ['Giselle Uwase Byusa', 'Business Development and Broking'],
        'Renson_Gatsinzi' => ['Renson Gatsinzi', 'Business Development and Broking'],
        'Tamara_Kabuye' => ['Tamara Kabuye', 'Business Development and Broking'],
        'Vivine_Umutoni' => ['Vivine Umutoni', 'Business Development and Broking'],
        'Mombasa_Team' => ['Mombasa Team', ''],
        'Rwanda_Team' => ['Rwanda Team', ''],
    ];

    if ($isGroup) {
        foreach ($known as $prefix => [$name, $role]) {
            if (about_starts_with($base, $prefix)) {
                return ['name' => $name, 'role' => $role, 'is_group' => true];
            }
        }
        $name = str_replace('_', ' ', preg_replace('/_group_photo$/i', '', $base));
        return ['name' => $name, 'role' => '', 'is_group' => true];
    }

    foreach ($known as $prefix => [$name, $role]) {
        if (about_starts_with($base, $prefix)) {
            return ['name' => $name, 'role' => $role, 'is_group' => false];
        }
    }

    $parts = explode('_', $base);
    if (count($parts) >= 3) {
        return [
            'name' => implode(' ', array_slice($parts, 0, 2)),
            'role' => implode(' ', array_slice($parts, 2)),
            'is_group' => false,
        ];
    }

    return ['name' => str_replace('_', ' ', $base), 'role' => '', 'is_group' => false];
}

function about_get_team_group_members(string $folder): array
{
    $dir = __DIR__ . '/../assets/images/royal_team_photos/' . $folder;
    if (!is_dir($dir)) {
        return [];
    }
    $files = array_merge(
        glob($dir . '/*.webp') ?: [],
        glob($dir . '/*.jpg') ?: [],
        glob($dir . '/*.jpeg') ?: []
    );
    sort($files, SORT_NATURAL);
    $members = [];
    foreach ($files as $path) {
        $parsed = about_parse_team_filename(basename($path));
        $members[] = [
            'name' => $parsed['name'],
            'role' => $parsed['role'],
            'image' => '/assets/images/royal_team_photos/' . $folder . '/' . basename($path),
            'is_group' => $parsed['is_group'],
        ];
    }
    return $members;
}

function about_render_logo_ticker(array $logos, string $itemClass = 'solutions-logos'): void
{
    if (empty($logos)) {
        return;
    }
    $renderSet = function () use ($logos, $itemClass) {
        foreach ($logos as $src) {
            $img = htmlspecialchars($src, ENT_QUOTES, 'UTF-8');
            echo '<div class="ticker-coll-item is-offices"><img src="' . $img . '" loading="lazy" alt="" class="' . $itemClass . '"></div>';
        }
    };
    ?>
<div class="ticker-gradient is-left"></div>
<div class="ticker-gradient is-right"></div>
<div data-speed="50s" class="ticker-wrap is-offices">
  <div class="ticker-contain"><div class="ticker-coll-wrap is-offices"><div class="ticker-coll-list is-offices"><?php $renderSet(); ?></div></div></div>
  <div class="ticker-contain"><div class="ticker-coll-wrap is-offices"><div class="ticker-coll-list is-offices"><?php $renderSet(); ?></div></div></div>
</div>
    <?php
}

function about_render_hero(array $hero): void
{
    $heading = htmlspecialchars($hero['heading'], ENT_QUOTES, 'UTF-8');
    $intro = htmlspecialchars($hero['intro'], ENT_QUOTES, 'UTF-8');
    $img = htmlspecialchars($hero['image'], ENT_QUOTES, 'UTF-8');
    $alt = htmlspecialchars($hero['image_alt'], ENT_QUOTES, 'UTF-8');
    $btn = about_button($hero['cta_href'], $hero['cta_label']);
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
                  <p class="u-text-style-small" style="opacity:0.85;text-transform:uppercase;letter-spacing:0.12em;margin-bottom:0.5rem">Because We Care</p>
                  <h1 class="pages-hero-heading u-text-style-h2">Insurance solutions built around you.</h1>
                  <div class="hero-p u-text-style-main" style="color:rgba(255,255,255,0.9)"><?= $intro ?></div>
                </div>
                <div class="u-button-wrapper u-margin-top-0"><div class="u-display-contents"><?= $btn ?></div></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="hero-grid-visual">
      <div class="u-visual">
        <img src="<?= $img ?>" loading="lazy" alt="<?= $alt ?>" class="u-visual-image" style="width:100%;height:100%;object-fit:cover">
        <div class="u-visual-bk"></div>
        <div class="img-overlay"></div>
      </div>
    </div>
  </div>
</section>
    <?php
}

function about_render_vision_mission(array $data): void
{
    $vision = htmlspecialchars($data['vision'], ENT_QUOTES, 'UTF-8');
    $mission = htmlspecialchars($data['mission'], ENT_QUOTES, 'UTF-8');
    ?>
<section class="u-section u-theme-light" style="background-color:#f4f8fc">
  <div class="section_spacer">
    <div class="u-container">
      <div class="u-content v-flex-8">
        <div class="about-vm-grid">
          <div class="about-vm-block">
            <div class="about-vm-head">
              <?= about_icon_badge('eye') ?>
              <p class="about-vm-label u-text-style-small" style="color:#00ADEF;text-transform:uppercase;letter-spacing:0.08em;font-weight:700;font-size:1.6rem;margin:0">Our Vision</p>
            </div>
            <p class="about-vm-text" style="color:#2A2D8A;font-size:1.5rem;line-height:1.6;max-width:34ch;margin:0.75rem 0 0"><?= $vision ?></p>
          </div>
          <div class="about-vm-block">
            <div class="about-vm-head">
              <?= about_icon_badge('target') ?>
              <p class="about-vm-label u-text-style-small" style="color:#00ADEF;text-transform:uppercase;letter-spacing:0.08em;font-weight:700;font-size:1.6rem;margin:0">Our Mission</p>
            </div>
            <p class="about-vm-text" style="color:#2A2D8A;font-size:1.5rem;line-height:1.6;max-width:34ch;margin:0.75rem 0 0"><?= $mission ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<style>
.about-vm-grid{display:grid;grid-template-columns:1fr 1fr;gap:clamp(1.75rem,4vw,3.5rem);align-items:stretch}
.about-vm-block{height:100%;padding:clamp(1.5rem,3vw,2.25rem);background:#ffffff;border:1px solid #e3e8f0;border-left:5px solid #00ADEF;border-radius:8px}
.about-vm-head{display:flex;align-items:center;gap:clamp(0.75rem,1.5vw,1.1rem)}
@media (max-width:720px){
  .about-vm-grid{grid-template-columns:1fr}
}
</style>
    <?php
}

function about_render_underwriters(array $data): void
{
    $heading = htmlspecialchars($data['partners_heading'], ENT_QUOTES, 'UTF-8');
    $logos = about_get_partner_logos();
    ?>
<section class="u-section u-theme-light about-partners-section">
  <div class="section_spacer">
    <div class="u-container">
      <div class="u-content v-flex-8">
        <div class="content-flex v-flex-6">
          <div class="centered-title-wrap">
            <h2 class="section-heading u-text-style-h3" style="color:#2A2D8A;text-align:center"><?= $heading ?></h2>
          </div>
          <?php about_render_logo_ticker($logos); ?>
        </div>
      </div>
    </div>
  </div>
</section>
    <?php
}

function about_render_ceo_narrative(array $data): void
{
    $icon = about_heading_icon();
    $chair = $data['founding_chair'];
    $ceo = $data['ceo'];
    $chairImg = htmlspecialchars($chair['image'], ENT_QUOTES, 'UTF-8');
    $ceoImg = htmlspecialchars($ceo['image'], ENT_QUOTES, 'UTF-8');
    ?>
<section class="u-section u-theme-dark about-leadership-messages" style="background-color:#2A2D8A;color:#ffffff">
  <div class="section_spacer">
    <div class="u-container">
      <div class="u-content v-flex-8">
        <div class="section-header-grid u-grid-custom" style="margin-bottom:2rem">
          <div class="section-header-title-col u-column-span-2">
            <?= $icon ?>
            <h2 class="section-heading u-text-style-h3" style="color:#ffffff">A brokerage measured by the peace of mind we deliver.</h2>
          </div>
          <div><div class="u-text-style-main" style="color:rgba(255,255,255,0.85)">Messages from our founding chair and chief executive on what drives Royal Associates forward.</div></div>
        </div>

        <div class="about-message-card about-message-card--chair">
          <div class="about-message-card__content">
            <p class="u-text-style-small about-message-card__eyebrow"><?= htmlspecialchars($chair['title'], ENT_QUOTES, 'UTF-8') ?></p>
            <?php foreach ($chair['paragraphs'] as $p): ?>
            <p class="u-text-style-main" style="color:rgba(255,255,255,0.9)"><?= htmlspecialchars($p, ENT_QUOTES, 'UTF-8') ?></p>
            <?php endforeach; ?>
            <p class="u-text-style-small" style="margin-top:1.25rem;opacity:0.75">— <?= htmlspecialchars($chair['name'], ENT_QUOTES, 'UTF-8') ?></p>
          </div>
          <div class="about-message-card__visual">
            <img src="<?= $chairImg ?>" loading="lazy" alt="<?= htmlspecialchars($chair['name'], ENT_QUOTES, 'UTF-8') ?>" class="about-message-card__photo">
          </div>
        </div>

        <div class="about-message-card about-message-card--ceo" style="background:rgba(0,0,0,0.1)">
          <div class="about-message-card__visual">
            <img src="<?= $ceoImg ?>" loading="lazy" alt="<?= htmlspecialchars($ceo['name'], ENT_QUOTES, 'UTF-8') ?>" class="about-message-card__photo">
          </div>
          <div class="about-message-card__content">
            <p class="u-text-style-small about-message-card__eyebrow"><?= htmlspecialchars($ceo['title'], ENT_QUOTES, 'UTF-8') ?></p>
            <?php foreach ($ceo['paragraphs'] as $p): ?>
            <p class="u-text-style-main" style="color:rgba(255,255,255,0.9)"><?= htmlspecialchars($p, ENT_QUOTES, 'UTF-8') ?></p>
            <?php endforeach; ?>
            <p class="u-text-style-main" style="color:#00ADEF;font-weight:500"><?= htmlspecialchars($ceo['closing'], ENT_QUOTES, 'UTF-8') ?></p>
            <p class="u-text-style-small" style="opacity:0.75;margin-top:1.5rem">— <?= htmlspecialchars($ceo['name'], ENT_QUOTES, 'UTF-8') ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
    <?php
}

function about_render_values(array $data): void
{
    $intro = htmlspecialchars($data['values_intro'], ENT_QUOTES, 'UTF-8');
    $icon = about_heading_icon('#00ADEF');
    $strength = htmlspecialchars($data['strength'], ENT_QUOTES, 'UTF-8');

    // Map each core value to its circle-badge icon (PDF "icon-in-circle" motif).
    $valueIcons = [
        'Passion' => 'heart',
        'Trust' => 'handshake',
        'WOW Service' => 'sparkles',
        'Learning & Innovation' => 'lightbulb',
        'Excellence' => 'award',
    ];
    ?>
<section class="u-section u-theme-light about-wwa-values" style="background:#f8f6f2">
  <div class="section_spacer">
    <div class="u-container">
      <div class="u-content v-flex-8">
        <div class="section-header-grid u-grid-custom">
          <div class="section-header-title-col u-column-span-2">
            <?= $icon ?>
            <h2 class="section-heading u-text-style-h3" style="color:#2A2D8A">Our core values.</h2>
          </div>
          <div><div class="u-text-style-main" style="color:#2A2D8A"><?= $intro ?></div></div>
        </div>

        <ul class="about-values-list">
          <?php foreach ($data['values'] as $value):
            $title = htmlspecialchars($value['title'], ENT_QUOTES, 'UTF-8');
            $body = htmlspecialchars($value['body'], ENT_QUOTES, 'UTF-8');
            $badge = $valueIcons[$value['title']] ?? 'sparkles';
          ?>
          <li class="about-value-row">
            <div class="about-value-content">
              <span class="about-value-name"><?= $title ?>:</span>
              <span class="about-value-body"><?= $body ?></span>
            </div>
          </li>
          <?php endforeach; ?>
        </ul>

        <div class="about-strength">
          <?= about_icon_badge('users', 56) ?>
          <h3 class="about-strength-heading u-text-style-h3" style="color:#2A2D8A">Our Strength</h3>
          <p class="about-strength-text u-text-style-main" style="color:#2A2D8A"><?= $strength ?></p>
        </div>
      </div>
    </div>
  </div>
</section>
    <?php
}

function about_render_kpis(array $kpis): void
{
    ?>
<section class="u-section u-theme-light about-kpis-section">
  <div class="section_spacer">
    <div class="u-container">
      <div class="abs-video-stats-grid u-grid-custom about-kpi-grid">
        <?php foreach ($kpis as $kpi): ?>
        <div class="video-stats" style="text-align:center;padding:1.5rem;background:#f4f8fc;border-radius:0.5rem">
          <div class="video-stat-text u-text-style-display" style="color:#00ADEF"><?= htmlspecialchars($kpi['value'], ENT_QUOTES, 'UTF-8') ?></div>
          <div class="video-stat-p u-text-style-large" style="color:#2A2D8A"><?= htmlspecialchars($kpi['label'], ENT_QUOTES, 'UTF-8') ?></div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>
    <?php
}

function about_render_team(array $data): void
{
    $icon = about_heading_icon();
    $groups = $data['team_groups'] ?? [];
    ?>
<section class="u-section u-theme-light about-team-section">
  <div class="section_spacer">
    <div class="u-container">
      <div class="u-content v-flex-8">
        <div style="text-align:center">
          <div style="display:flex;flex-direction:column;align-items:center">
            <h2 class="section-heading u-text-style-h3" style="color:#2A2D8A">Leadership &amp; governance</h2>
          </div>
          <div class="u-text-style-main" style="color:#2A2D8A;max-width:45rem;margin:1rem auto 0">Led by industry veterans committed to partnership, expertise, and excellent customer experience.</div>
        </div>

        <?php foreach ($groups as $group):
            $isBoard = ($group['folder'] ?? '') === 'board_of_directors';
            if ($isBoard) {
                // Board directors are shown as bios below; skip the redundant photo marquee.
                about_render_board($data['board'] ?? []);
                continue;
            }
            $members = array_values(array_filter(
                about_get_team_group_members($group['folder']),
                static fn(array $person): bool => empty($person['is_group'])
            ));
            if (empty($members)) {
                continue;
            }
            $label = htmlspecialchars($group['label'], ENT_QUOTES, 'UTF-8');
        ?>
        <div class="about-team-group">
          <h3 class="about-team-group-title u-text-style-large"><?= $label ?></h3>
          <div class="about-team-marquee" data-team-marquee>
            <div class="about-team-marquee__fade about-team-marquee__fade--left" aria-hidden="true"></div>
            <div class="about-team-marquee__fade about-team-marquee__fade--right" aria-hidden="true"></div>
            <div class="about-team-marquee__viewport">
              <div class="about-team-marquee__track">
                <?php foreach ($members as $person):
                  $name = htmlspecialchars($person['name'], ENT_QUOTES, 'UTF-8');
                  $role = htmlspecialchars($person['role'], ENT_QUOTES, 'UTF-8');
                  $img = htmlspecialchars($person['image'], ENT_QUOTES, 'UTF-8');
                ?>
                <article class="about-team-member">
                  <div class="about-team-member__photo">
                    <img src="<?= $img ?>" loading="lazy" alt="<?= $name ?>">
                  </div>
                  <div class="about-team-member__meta">
                    <div class="about-team-member__name"><?= $name ?></div>
                    <?php if ($role !== ''): ?>
                    <div class="about-team-member__role"><?= $role ?></div>
                    <?php endif; ?>
                  </div>
                </article>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>
    <?php
}

function about_render_director(array $member): void
{
    $name = htmlspecialchars($member['name'], ENT_QUOTES, 'UTF-8');
    $title = htmlspecialchars($member['title'], ENT_QUOTES, 'UTF-8');
    $img = htmlspecialchars($member['image'], ENT_QUOTES, 'UTF-8');
    $bios = $member['bio'] ?? [];
    ?>
<article class="director">
  <img class="director-photo" src="<?= $img ?>" loading="lazy" alt="<?= $name ?>">
  <div class="director-body">
    <div class="director-head">
      <h3 class="director-name"><?= $name ?></h3>
      <p class="director-title"><?= $title ?></p>
    </div>
    <?php foreach ($bios as $para): ?>
    <p class="director-bio"><?= htmlspecialchars($para, ENT_QUOTES, 'UTF-8') ?></p>
    <?php endforeach; ?>
  </div>
</article>
    <?php
}

function about_render_board(array $board): void
{
    if (empty($board)) {
        return;
    }
    $icon = about_heading_icon();
    // Distribute across two independent columns so both fill (no orphaned row):
    // left = Lillian + Peter, right = Dr. Omar + Jay.
    $left = [];
    $right = [];
    foreach ($board as $member) {
        $n = $member['name'] ?? '';
        if (strpos($n, 'Omar') !== false || strpos($n, 'Jay') === 0) {
            $right[] = $member;
        } else {
            $left[] = $member;
        }
    }
    ?>
<div class="about-board-bios">
  <div class="section-header-grid u-grid-custom" style="margin-bottom:clamp(1.5rem,3vw,2.5rem)">
    <div class="section-header-title-col u-column-span-2">
      <?= $icon ?>
      <h2 class="section-heading u-text-style-h3" style="color:#2A2D8A">Board of Directors</h2>
    </div>
    <div><div class="u-text-style-main" style="color:#2A2D8A">The leadership guiding Royal Associates Insurance Brokers Limited — for all your insurance solutions, because we care.</div></div>
  </div>

  <div class="directors-flow">
    <div class="directors-col directors-col--left">
      <?php foreach ($left as $member): about_render_director($member); endforeach; ?>
    </div>
    <div class="directors-col directors-col--right">
      <?php foreach ($right as $member): about_render_director($member); endforeach; ?>
    </div>
  </div>
</div>
    <?php
}

function about_render_service_standards(array $standards): void
{
    $first = $standards[0] ?? ['title' => '', 'body' => ''];
    ?>
<section class="u-section u-theme-light about-charter-section">
  <div class="section_spacer">
    <div class="u-container">
      <div class="u-content v-flex-8">
        <div class="section-header-grid u-grid-custom">
          <div class="section-header-title-col u-column-span-2">
            <?= about_heading_icon() ?>
            <h2 class="section-heading u-text-style-h3" style="color:#2A2D8A">Our customer service charter</h2>
          </div>
          <div><div class="u-text-style-main" style="color:#2A2D8A">Clear commitments you can hold us to — responsive, reliable, and transparent at every touchpoint.</div></div>
        </div>

        <div class="about-charter-layout">
          <div class="about-charter-spotlight" aria-live="polite">
            <p class="about-charter-spotlight__label u-text-style-small">Our promise to you</p>
            <?php $firstShort = htmlspecialchars($standards[0]['short'] ?? $standards[0]['title'], ENT_QUOTES, 'UTF-8'); ?>
            <div class="about-charter-short-item is-active" data-charter-short><?= $firstShort ?></div>
          </div>

          <div class="about-charter-list" role="list">
            <?php foreach ($standards as $i => $std): ?>
            <button type="button"
              class="about-charter-item<?= $i === 0 ? ' is-active' : '' ?>"
              role="listitem"
              data-charter-item="<?= $i ?>"
              data-short="<?= htmlspecialchars($std['short'] ?? $std['title'], ENT_QUOTES, 'UTF-8') ?>"
              aria-pressed="<?= $i === 0 ? 'true' : 'false' ?>">
              <span class="about-charter-item__title u-text-style-large"><?= htmlspecialchars($std['title'], ENT_QUOTES, 'UTF-8') ?></span>
              <span class="about-charter-item__body"><?= htmlspecialchars($std['body'], ENT_QUOTES, 'UTF-8') ?></span>
            </button>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
    <?php
}

function about_render_esp(array $services, string $image): void
{
    $img = htmlspecialchars($image, ENT_QUOTES, 'UTF-8');
    ?>
<section class="u-section u-theme-light about-esp-section">
  <div class="section_spacer">
    <div class="u-container">
      <div class="u-content v-flex-8">
        <div class="section-header-grid u-grid-custom">
          <div class="section-header-title-col u-column-span-2">
            <?= about_heading_icon() ?>
            <h2 class="section-heading u-text-style-h3" style="color:#2A2D8A">Enhanced Service Plan</h2>
          </div>
          <div><div class="u-text-style-main" style="color:#2A2D8A">Every Royal Partner agrees to an ESP that defines what we deliver and how we deliver it — with proactive planning so nothing is left to chance.</div></div>
        </div>
        <div class="about-esp-split">
          <div class="about-esp-split__visual" hov-img>
            <img src="<?= $img ?>" loading="lazy" alt="Enhanced Service Plan diagram" class="about-esp-split__image">
          </div>
          <div class="about-esp-split__content">
            <ul class="about-esp-list">
              <?php foreach ($services as $item): ?>
              <li class="u-text-style-main" style="color:#2A2D8A"><?= htmlspecialchars($item, ENT_QUOTES, 'UTF-8') ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
    <?php
}

function about_render_offices(array $offices): void
{
    ?>
<section class="u-section u-theme-light" style="background:#f4f8fc">
  <div class="section_spacer">
    <div class="u-container">
      <div class="u-content v-flex-8">
        <div class="section-header-grid u-grid-custom">
          <div class="section-header-title-col u-column-span-2">
            <?= about_heading_icon() ?>
            <h2 class="section-heading u-text-style-h3" style="color:#2A2D8A">Royal reach across East Africa</h2>
          </div>
          <div><div class="u-text-style-main" style="color:#2A2D8A">Four offices bringing responsive brokerage services closer to our clients.</div></div>
        </div>
        <div class="about-offices-grid">
          <?php foreach ($offices as $office): ?>
          <div class="about-office-card">
            <h3 class="u-text-style-large" style="color:#00ADEF;margin:0 0 0.5rem"><?= htmlspecialchars($office['name'], ENT_QUOTES, 'UTF-8') ?></h3>
            <p class="u-text-style-main" style="color:#2A2D8A;margin:0"><?= htmlspecialchars($office['address'], ENT_QUOTES, 'UTF-8') ?></p>
            <?php if (!empty($office['email'])): ?><p class="u-text-style-small" style="margin-top:0.5rem"><a href="mailto:<?= htmlspecialchars($office['email'], ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars($office['email'], ENT_QUOTES, 'UTF-8') ?></a></p><?php endif; ?>
            <?php if (!empty($office['phone'])): ?><p class="u-text-style-small" style="margin-top:0.25rem"><?= htmlspecialchars($office['phone'], ENT_QUOTES, 'UTF-8') ?></p><?php endif; ?>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>
    <?php
}

function about_render_experience(array $projects): void
{
    ?>
<section class="u-section u-theme-light about-experience-section" style="background:#f4f8fc">
  <div class="section_spacer">
    <div class="u-container">
      <div class="u-content v-flex-8">
        <div class="section-header-grid u-grid-custom">
          <div class="section-header-title-col u-column-span-2">
            <?= about_heading_icon() ?>
            <h2 class="section-heading u-text-style-h3" style="color:#2A2D8A">Insurance experience you can trust</h2>
          </div>
          <div><div class="u-text-style-main" style="color:#2A2D8A">Innovative risk solutions for some of Kenya&rsquo;s most ambitious construction and infrastructure projects.</div></div>
        </div>

        <div class="about-projects-collage">
          <?php foreach ($projects as $project):
            $name = htmlspecialchars($project['name'], ENT_QUOTES, 'UTF-8');
            $img = htmlspecialchars($project['image'], ENT_QUOTES, 'UTF-8');
            $layout = htmlspecialchars($project['layout'] ?? 'default', ENT_QUOTES, 'UTF-8');
          ?>
          <figure class="about-project-tile about-project-tile--<?= $layout ?>">
            <img src="<?= $img ?>" loading="lazy" alt="<?= $name ?>" class="about-project-tile__image">
            <figcaption class="about-project-tile__caption">
              <span class="about-project-tile__name u-text-style-large"><?= $name ?></span>
            </figcaption>
          </figure>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>
    <?php
}

function about_render_philosophy_cta(array $philosophy): void
{
    $heading = htmlspecialchars($philosophy['heading'], ENT_QUOTES, 'UTF-8');
    $btn = about_button($philosophy['cta_href'], $philosophy['cta_label']);
    ?>
<section class="u-section u-theme-light">
  <div class="section_spacer">
    <div class="u-container">
      <div class="u-content v-flex-8">
        <div class="card-wrap" style="background-color:#00ADEF;color:#202267">
          <svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 60 60" fill="none" class="corner-svg"><path d="M60 60L60 -2.14577e-06L30 30L-2.14577e-06 60L60 60Z" fill="#ffffff"></path></svg>
          <div class="card-padding">
            <div class="split-card-content-flex is-large">
              <div>
                <div class="v-flex-3">
                  <h2 class="split-card-title u-text-style-h3" style="color:#202267"><?= $heading ?></h2>
                  <div class="u-text-style-main" style="color:#202267"><?= $philosophy['body'] ?></div>
                </div>
              </div>
              <div class="split-card-content-btn-flex v-flex-6"><div><?= $btn ?></div></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
    <?php
}

function about_render_styles(): void
{
    ?>
<div class="hide w-embed"><style>
/* Circle-badge line icons — PDF "icon-in-circle" motif */
.about-icon-badge {
  flex: 0 0 auto;
  width: var(--badge-size, 64px);
  height: var(--badge-size, 64px);
  border-radius: 50%;
  border: 1.5px solid #00ADEF;
  background: rgba(0, 173, 239, 0.06);
  display: inline-flex;
  align-items: center;
  justify-content: center;
}
.about-icon-badge svg { width: 28px; height: 28px; display: block; }

/* Vision/Mission: icon and title sit on the same row */
.about-vm-block .about-icon-badge { flex: 0 0 auto; }
.about-vm-head .about-vm-label { line-height: 1.2; }

/* Core Values as a vertical list (brand-document feel, not a card grid) */
.about-wwa-values .about-values-list {
  list-style: none;
  margin: 2.5rem auto 0;
  padding: 0;
  max-width: 60rem;
  display: flex;
  flex-direction: column;
  gap: clamp(1.5rem, 3vw, 2.25rem);
}
.about-value-row {
  display: flex;
  justify-content: center;
}
/* Fixed-width name column (right-aligned) + body column → all colons align,
   regardless of how long each value name is. Body lines wrap at the colon level. */
.about-value-content {
  min-width: 0;
  display: grid;
  grid-template-columns: 15rem 1fr;
  column-gap: 0.6em;
  align-items: baseline;
  max-width: 52rem;
  width: 100%;
}
.about-value-name {
  color: #2A2D8A;
  font-weight: 700;
  font-size: clamp(1.4rem, 2vw, 1.65rem);
  line-height: 1.6;
  white-space: nowrap;
  text-align: right;
}
.about-value-body {
  margin: 0;
  color: #4A4A4A;
  font-size: clamp(1.4rem, 2vw, 1.65rem);
  line-height: 1.6;
}

/* Strength — centered block beneath the values list */
.about-strength {
  margin-top: clamp(2.5rem, 5vw, 4rem);
  padding: clamp(1.75rem, 4vw, 2.75rem);
  text-align: center;
  background: rgba(0, 173, 239, 0.04);
  border-radius: 0.75rem;
  display: flex;
  flex-direction: column;
  align-items: center;
}
.about-strength .about-icon-badge { margin-bottom: 1rem; }
.about-strength-heading {
  margin: 0 0 0.75rem;
  text-transform: uppercase;
  letter-spacing: 0.04em;
}
.about-strength-text {
  max-width: 60ch;
  margin: 0 auto;
  font-size: clamp(1.1rem, 1.5vw, 1.3rem);
  line-height: 1.6;
}

@media (max-width: 720px) {
  .about-icon-badge { --badge-size: 48px !important; }
  .about-icon-badge svg { width: 22px !important; height: 22px !important; }
  .about-value-row { gap: 0.85rem; }
}

@keyframes about-scroll {
  from { transform: translateX(0); }
  to { transform: translateX(calc(-100% - 4rem)); }
}

.about-partners-section .ticker-wrap { position: relative; overflow: hidden; }
.ticker-wrap.is-offices .ticker-coll-wrap { animation: about-scroll 50s linear infinite; }
.ticker-wrap.is-offices:hover .ticker-coll-wrap { animation-play-state: paused; }

.about-partners-section .solutions-logos {
  height: 3.5rem; width: auto; max-width: 9rem; object-fit: contain;
  opacity: 0.9; transition: opacity 0.3s ease, transform 0.3s ease;
}
.about-partners-section .ticker-coll-item:hover .solutions-logos {
  opacity: 1; transform: scale(1.05);
}

.about-kpis-section { margin-top: clamp(3rem, 6vw, 5rem); }
.about-kpi-grid { --_column-count---value: 4; gap: 1.5rem; }

.about-message-card {
  display: grid; grid-template-columns: 1.05fr 0.95fr; gap: 0;
  align-items: stretch; padding: 0;
  background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.12);
  border-radius: 0; margin-bottom: 1.5rem;
}
.about-message-card--ceo { grid-template-columns: 0.95fr 1.05fr; }
.about-message-card__content { display: flex; flex-direction: column; justify-content: center; gap: 0.85rem; padding: clamp(1.5rem, 3vw, 2.5rem); }
.about-message-card__eyebrow { opacity: 0.8; margin: 0; color: #00ADEF; }
.about-message-card__visual {
  position: relative; overflow: hidden; min-height: 22rem;
}
.about-message-card__photo {
  position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; object-position: center top;
}

.about-team-section { padding-bottom: 1rem; overflow: hidden; }
.about-team-section > .u-container > .u-content > div > .u-text-style-main { font-size: 1.15rem; }

.about-board-bios { margin-top: clamp(2.5rem, 5vw, 4rem); }
.directors-flow {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 0 clamp(2rem, 5vw, 4rem);
  align-items: start;            /* independent columns = no whitespace */
}
.director { display: flex; align-items: flex-start; gap: clamp(1rem, 2vw, 1.5rem); margin-bottom: clamp(2rem, 4vw, 3rem); }
.director-photo {
  flex: 0 0 auto;
  width: clamp(7.5rem, 13vw, 10.5rem);   /* matches team-image size */
  height: clamp(7.5rem, 13vw, 10.5rem);
  border-radius: 50%;
  overflow: hidden;
  background: transparent;       /* matches team-image style */
  object-fit: cover;
  object-position: center top;
}
.director-body { flex: 1 1 auto; min-width: 0; }   /* fills beside the photo, no float gap */
.director-head { margin-top: 0.2rem; }
.director-name { color: #2A2D8A; font-weight: 700; font-size: 1.5rem; line-height: 1.25; margin: 0; }
.director-title { color: #00ADEF; font-weight: 500; font-size: 1.1rem; line-height: 1.35; margin: 0.35rem 0 0; }
.director-bio { color: #4A4A4A; font-size: 1.1rem; line-height: 1.6; margin: 0.6rem 0 0.75rem; }
.director-bio:last-child { margin-bottom: 0; }

@media (max-width: 768px) {
  .directors-flow { grid-template-columns: 1fr; gap: 0; }
}
@media (max-width: 360px) {
  .director { flex-direction: column; align-items: center; text-align: center; }
  .director-photo { margin: 0 0 1rem; }
}
.about-team-group { margin-top: 3.25rem; }
.about-team-group-title { color: #00ADEF; margin: 0 0 1.5rem; text-align: center; font-size: 1.5rem; }

.about-team-marquee { position: relative; }
.about-team-marquee__viewport { display: flex; justify-content: center; padding: 1rem 0 0.5rem; }
.about-team-marquee__track {
  display: flex; flex-wrap: wrap; justify-content: center; align-items: flex-start; gap: clamp(1.25rem, 3vw, 2.5rem);
}

.about-team-member {
  flex: 0 0 auto; width: clamp(9rem, 14vw, 12rem);
  text-align: center;
}
.about-team-member__photo {
  width: clamp(7.5rem, 13vw, 10.5rem); height: clamp(7.5rem, 13vw, 10.5rem);
  margin: 0 auto 0.85rem; border-radius: 50%; overflow: hidden;
  background: transparent;
}
.about-team-member__photo img {
  width: 100%; height: 100%; object-fit: cover; object-position: center top; display: block;
}
.about-team-member__name {
  color: #2A2D8A; font-weight: 600; font-size: 1.02rem; line-height: 1.35;
}
.about-team-member__role {
  color: #00ADEF; font-size: 0.82rem; margin-top: 0.25rem; line-height: 1.4;
}

.about-charter-section { background: #fff; }
.about-charter-layout {
  display: grid; grid-template-columns: minmax(0, 0.95fr) minmax(0, 1.05fr);
  gap: clamp(1.5rem, 4vw, 3.5rem); margin-top: 2rem; align-items: start;
}
.about-charter-spotlight {
  position: sticky; top: 6rem; padding: clamp(1.5rem, 3vw, 2.25rem);
  background: #f4f8fc; border-radius: 1rem;
}
.about-charter-spotlight__label { color: #2A2D8A; margin: 0 0 0.75rem; font-weight: 600; }
.about-charter-short-item {
  padding: 2rem 1.5rem; border: 2px solid #00ADEF; border-radius: 0;
  background: rgba(0,173,239,0.06); color: #2A2D8A; font-weight: 700; font-size: 1.25rem;
  text-align: center; text-transform: uppercase; transition: background 0.25s ease, border-color 0.25s ease;
}
.about-charter-short-item.is-active {
  border-color: #00ADEF; background: rgba(0,173,239,0.08); color: #2A2D8A;
}

.about-charter-list { display: flex; flex-direction: column; gap: 0.65rem; }
.about-charter-item {
  display: grid; gap: 0.35rem; width: 100%; text-align: left;
  padding: 1rem 1.15rem; border-radius: 0.75rem;
  border: 1px solid #e0e6ef; background: #fff; cursor: pointer;
  transition: background 0.25s ease, border-color 0.25s ease, box-shadow 0.25s ease;
}
.about-charter-item:hover {
  border-color: rgba(0,173,239,0.45); background: #f8fcff;
}
.about-charter-item.is-active {
  border-color: #00ADEF; background: rgba(0,173,239,0.08);
  box-shadow: 0 0.5rem 1.25rem rgba(42,45,138,0.06);
}
.about-charter-item__title { color: #2A2D8A; font-weight: 700; font-size: 1.25rem; text-transform: uppercase; margin: 0; }
.about-charter-item__body {
  color: #4a5568; font-size: 0.88rem; line-height: 1.45; display: none;
}
.about-charter-item.is-active .about-charter-item__body { display: block; }

.about-projects-collage {
  display: grid; grid-template-columns: repeat(12, 1fr);
  grid-auto-rows: minmax(11rem, auto); gap: 0.85rem; margin-top: 2rem;
}
.about-project-tile {
  position: relative; margin: 0; overflow: hidden; border-radius: 0.85rem;
  min-height: 11rem; background: #dce6f0;
}
.about-project-tile__image {
  width: 100%; height: 100%; object-fit: cover; display: block;
  transition: transform 0.6s cubic-bezier(0.22, 1, 0.36, 1);
}
.about-project-tile:hover .about-project-tile__image { transform: scale(1.04); }
.about-project-tile__caption {
  position: absolute; inset: auto 0 0 0; margin: 0; padding: 2.5rem 1rem 1rem;
  background: linear-gradient(180deg, transparent, rgba(15,23,42,0.82));
}
.about-project-tile__name { color: #fff; display: block; text-wrap: balance; }

.about-project-tile--greenfield { grid-column: span 7; grid-row: span 2; min-height: 22rem; }
.about-project-tile--t4 { grid-column: span 5; min-height: 14rem; }
.about-project-tile--uap-juba { grid-column: span 5; min-height: 14rem; }
.about-project-tile--two-rivers { grid-column: span 6; min-height: 13rem; }
.about-project-tile--uap-upper { grid-column: span 6; min-height: 13rem; }

@media (max-width: 900px) {
  .about-kpi-grid { --_column-count---value: 2; }
  .pages-hero-grid.u-grid-custom { grid-template-columns: 1fr !important; }
  .about-message-card,
  .about-message-card--ceo { grid-template-columns: 1fr; }
  .about-message-card__visual { order: -1; min-height: 14rem; }
  .about-charter-layout { grid-template-columns: 1fr; }
  .about-charter-spotlight { position: static; }
  .about-charter-item__body { display: block; }
  .about-projects-collage { grid-template-columns: 1fr; }
  .about-project-tile,
  .about-project-tile--greenfield,
  .about-project-tile--t4,
  .about-project-tile--uap-juba,
  .about-project-tile--two-rivers,
  .about-project-tile--uap-upper {
    grid-column: span 1; grid-row: span 1; min-height: 14rem;
  }
}

@media (prefers-reduced-motion: reduce) {
  .ticker-wrap.is-offices .ticker-coll-wrap { animation: none; }
  .about-project-tile__image,
  .about-charter-spotlight__title,
  .about-charter-spotlight__body,
  .about-team-member { transition: none; }
}
</style></div>
    <?php
}

function about_render_scripts(): void
{
    ?>
<script src="/assets/js/about.js" defer></script>
    <?php
}
