<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package RAIB
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

	<header class="entry-header group">

	<div class="wrapper one animate fadeIn">
		<h1 class="entry-title"><?php post_type_archive_title(); ?></h1>
  <?php if ( function_exists('yoast_breadcrumb') ) {
yoast_breadcrumb('<p class="breadcrumbs">','</p>');
} ?></div>

	</header><!-- .page-header -->
	  <div class="wrapper ListView">
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php
					$classes = array(
						'group',
						'NoMargin',
						'Hype'
					);
				?>
				<div <?php post_class( $classes ); ?>>
				<div class="col c8 Omega"><?php the_post_thumbnail('FeaturedThumb'); ?></div>
				<div class="col c4">
					<div class="Buffer">
				<h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
				<?php the_excerpt();?>
					<a href="<?php the_permalink();?>" class="btn">Read More</a>
				</div>
				</div>

					</div>

			<?php endwhile; ?>
</div>
			<?php

			the_posts_pagination( array(
				'mid_size'  => 2,
				'prev_text' => __( '<<', 'textdomain' ),
				'next_text' => __( '>>', 'textdomain' ),
			) );

			 ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->

<?php get_sidebar(); ?>
	</div><!-- #primary -->

<?php get_footer(); ?>
