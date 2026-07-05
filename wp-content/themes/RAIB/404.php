<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package RAIB
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">

					<header class="entry-header group">
					<div class="wrapper text-center">
						<h1 class="entry-title">Page not Found</h1>

				  <?php if ( function_exists('yoast_breadcrumb') ) {
				yoast_breadcrumb('<p class="breadcrumbs">','</p>');
				} ?>
				</div>

					</header><!-- .page-header -->

				<div class="page-content wrapper text-center">
					<p><?php esc_html_e( 'Unfortunately we could not find the page you are looking for.', 'RAIB' ); ?></p>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
