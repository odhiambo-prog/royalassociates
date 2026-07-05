<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package RAIB
 */

get_header(); ?>

	<div id="primary" class="content-area group">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content', 'single' ); ?>

			<?php	the_post_navigation( array(

				          'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'twentysixteen' ) . '</span> ' .

				            '<span class="screen-reader-text">' . __( 'Next Article:', 'twentysixteen' ) . '</span> ' .

				            '<span class="post-title">Article →</span>',

				          'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( ' ← Previous', 'twentysixteen' ) . '</span> ' .

				            '<span class="screen-reader-text">' . __( 'Previous Article:', 'twentysixteen' ) . '</span> ' .

				            '<span class="post-title">Article</span>',

				        ) );

				?>


		<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
<?php get_sidebar(); ?>
	</div><!-- #primary -->

<?php get_footer(); ?>
