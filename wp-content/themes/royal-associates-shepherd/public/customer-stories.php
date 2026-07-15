<?php
$pageTitle = 'Customer Stories | Royal Associates Insurance Brokers';
$navActive = 'customer-stories';
$stories = require __DIR__ . '/../includes/customer_stories_data.php';
require __DIR__ . '/../includes/customer_stories_sections.php';
include __DIR__ . '/../includes/header.php';
include __DIR__ . '/../includes/nav_tail.php';
?>
<div class="page_content">
<?php
cs_render_hero();
cs_render_forced_scroll($stories['featured'], $stories['stories']);
?>
</div>
<?php include __DIR__ . '/../includes/footer.php'; ?>
