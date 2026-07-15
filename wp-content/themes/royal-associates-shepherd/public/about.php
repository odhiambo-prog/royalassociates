<?php
$pageTitle = 'About | Royal Associates Insurance Brokers';
$about = require __DIR__ . '/../includes/about_data.php';
require __DIR__ . '/../includes/about_sections.php';
$navActive = 'about';
include __DIR__ . '/../includes/header.php';
include __DIR__ . '/../includes/nav_tail.php';
?>
<div class="page_content">
<?php
about_render_hero($about['hero']);
about_render_vision_mission($about);
about_render_underwriters($about);
about_render_ceo_narrative($about);
about_render_values($about);
about_render_kpis($about['kpis']);
about_render_team($about);
about_render_service_standards($about['service_standards']);
about_render_experience($about['experience_projects']);
about_render_styles();
about_render_scripts();
?>
</div>
<?php include __DIR__ . '/../includes/footer.php'; ?>
