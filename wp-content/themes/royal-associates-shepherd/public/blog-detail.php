<?php
$dataFile = __DIR__ . '/../blog-posts.json';
$posts = [];
if (file_exists($dataFile)) {
    $decoded = json_decode(file_get_contents($dataFile), true);
    if (is_array($decoded)) {
        $posts = $decoded;
    }
}

$slug = isset($_GET['slug']) ? $_GET['slug'] : '';
if ($slug === '' && isset($_SERVER['REQUEST_URI'])) {
    $path = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
    $parts = explode('/', $path);
    $slug = end($parts);
}
$slug = basename($slug);

$post = null;
foreach ($posts as $p) {
    if (isset($p['slug']) && $p['slug'] === $slug) {
        $post = $p;
        break;
    }
}

if (!$post) {
    status_header(404);
    $pageTitle = 'Post not found | Royal Associates Insurance Brokers';
    $navActive = 'blog';
    include __DIR__ . '/../includes/header.php';
    include __DIR__ . '/../includes/nav_tail.php';
    echo '<div class="page_content"><section class="u-section u-theme-light"><div class="section_spacer is-pages-hero"><div class="u-container is-hero"><div class="u-content v-flex-4">';
    echo '<div class="u-text-style-h2">Post not found</div>';
    echo '<p class="u-text-style-main">We couldn\'t find that article. <a href="/blog/" style="color:#00ADEF;text-decoration:underline">Return to the blog</a>.</p>';
    echo '</div></div></div></section></div>';
    include __DIR__ . '/../includes/footer.php';
    exit;
}

status_header(200);
$pageTitle = ($post['title'] ?? 'Blog') . ' | Royal Associates Insurance Brokers';
$navActive = 'blog';
include __DIR__ . '/../includes/header.php';
include __DIR__ . '/../includes/nav_tail.php';

$title = htmlspecialchars($post['title'] ?? '', ENT_QUOTES, 'UTF-8');
$img = htmlspecialchars($post['image'] ?? '', ENT_QUOTES, 'UTF-8');
$date = '';
if (!empty($post['date'])) {
    $d = strtotime($post['date']);
    $date = $d ? date('F j, Y', $d) : htmlspecialchars($post['date'], ENT_QUOTES, 'UTF-8');
}
$catLabel = 'Insights';
if (!empty($post['categories']) && isset($post['categories'][0])) {
    $raw = $post['categories'][0];
    $catLabel = preg_match('/the blog/i', $raw) ? 'Insights' : htmlspecialchars($raw, ENT_QUOTES, 'UTF-8');
}
?>
<div class="page_content">
<section class="u-section u-theme-light"><div class="section_spacer is-pages-hero"><div class="u-container is-hero"><div class="u-content v-flex-4">
  <div class="blog-category-flex"><div class="category-icon"><svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 17 34" fill="none" class="svg"><path d="M16.9706 16.9705L2.07015e-05 -0.00010423L1.85557e-05 16.9705L1.641e-05 33.941L16.9706 16.9705Z" fill="#DA43E7"></path></svg></div><div class="w-dyn-list"><div role="list" class="tags-list w-dyn-items"><div role="listitem" class="tags-item w-dyn-item"><div class="u-text-style-small"><?= $catLabel ?></div></div></div></div></div>
  <div class="u-text-style-h2"><?= $title ?></div>
  <div class="blog-author"><div class="v-flex-1"><div class="u-text-style-small">Royal Associates</div><div class="u-text-style-small u-color-faded"><?= htmlspecialchars($date, ENT_QUOTES, 'UTF-8') ?></div></div></div>
</div></div></div></section>
<section class="u-section u-theme-light"><div class="section_spacer"><div class="u-container"><div class="blog-article">
  <?php if ($img): ?>
  <img src="<?= $img ?>" alt="<?= $title ?>" style="width:100%;height:auto;border-radius:1rem;margin-bottom:2rem">
  <?php endif; ?>
  <?= $post['content'] ?? '' ?>
  <div style="margin-top:2.5rem">
    <div data-wf--button-main--variant="link" data-button=" " data-trigger="hover focus" class="button_main_wrap"><div class="clickable_wrap u-cover-absolute"><a href="/blog/" class="clickable_link w-inline-block"><span class="clickable_text u-sr-only">Back to blog</span></a></div><div class="button_main_element" style="background:#00ADEF!important;border-color:#00ADEF!important"><svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 12 16" fill="none" class="video-play"><path d="M11.25 7.79443L2.19575e-07 15.5887L9.00968e-07 0.000204548L11.25 7.79443Z" fill="white"></path></svg><div aria-hidden="true" class="button_main_text u-text-style-small">Back to blog</div><div class="button_main_icon u-hide-if-empty"></div></div></div>
  </div>
</div></div></div></section>
<div class="hide w-embed"><style>
.blog-article { max-width: 46rem; margin: 0 auto; font-family: "Gt Planar Trial", Arial, Helvetica, sans-serif; font-size: 1rem; line-height: 1.7; color: #1d2130; }
.blog-article img { max-width: 100%; height: auto; border-radius: 1rem; margin: 2rem 0; }
.blog-article p { font-size: 1.125rem; line-height: 1.85; color: #1d2130; margin: 0 0 1.5rem; }
.blog-article h2 { font-family: Magistersttrial, "Times New Roman", serif; font-size: 1.75rem; font-weight: 700; color: #0f172a; margin: 2.5rem 0 1rem; line-height: 1.3; }
.blog-article h3 { font-family: Magistersttrial, "Times New Roman", serif; font-size: 1.375rem; font-weight: 600; color: #0f172a; margin: 2rem 0 0.75rem; line-height: 1.4; }
.blog-article h4 { font-family: Magistersttrial, "Times New Roman", serif; font-size: 1.125rem; font-weight: 600; color: #0f172a; margin: 1.75rem 0 0.5rem; }
.blog-article a { color: #00ADEF; text-decoration: underline; }
.blog-article a:hover { color: #2a2d8a; }
.blog-article ul, .blog-article ol { margin: 0 0 1.5rem 0; padding: 0; list-style-position: inside; line-height: 1.8; color: #1d2130; }
.blog-article li { margin-bottom: 0.5rem; }
.blog-article blockquote { border-left: 4px solid #DA43E7; margin: 1.5rem 0; padding: 0.5rem 0 0.5rem 1.5rem; color: #475569; font-style: italic; font-size: 1.125rem; }
.blog-article strong { font-weight: 700; color: #0f172a; }
.blog-article em { font-style: italic; }
</style></div>
</div>
<?php include __DIR__ . '/../includes/footer.php'; ?>
