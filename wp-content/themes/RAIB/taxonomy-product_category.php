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
						<div class="Fly">
							<div class="wrapper">
							<h1 class="entry-title animate one fadeInUp"><?php the_archive_title();?></h1>
			</div>
				</div>
				<div class="Overlay TwofourFeatured">
								<img src="<?php echo z_taxonomy_image_url(NULL, 'Inner-Hero'); ?>" alt="<?php the_archive_title();?>" class="attachment-Inner-Hero size-Inner-Hero"/>	</div>
					</header>
					<div class="wrapper"><?php if ( function_exists('yoast_breadcrumb') ) {
				yoast_breadcrumb('<p class="breadcrumbs">','</p>');
			} ?>


			<?php
if (is_tax('product_category', 'corporate-insurance'))
{?>
			<div class="ToggleContentBtn">
				View Full Product List
</div>
<div class="ToggleContent">
			<?php
	$my_query = new WP_Query('post_type=product&product_category=corporate-insurance&posts_per_page=-1');
	if ($my_query->have_posts()){

				while ($my_query->have_posts()) : $my_query->the_post(); ?>

	<li <?php post_class( $classes ); ?>>
<a href="<?php the_permalink();?>"><?php the_title();?></a>
	</li>

	<?php endwhile;
	}
	else
	{
	 echo '<h3 class="No-Ops text-center">No Active Slider Found</h3>';
	}
	wp_reset_query(); ?>
</div>
<?php } ?>



			<?php
if (is_tax('product_category', 'individual-insurance'))
{?>
			<div class="ToggleContentBtn">
				View Full Product List
</div>
<div class="ToggleContent">
			<?php
	$my_query = new WP_Query('post_type=product&product_category=individual-insurance&posts_per_page=-1');
	if ($my_query->have_posts()){

				while ($my_query->have_posts()) : $my_query->the_post(); ?>

	<li <?php post_class( $classes ); ?>>
<a href="<?php the_permalink();?>"><?php the_title();?></a>
	</li>

	<?php endwhile;
	}
	else
	{
	 echo '<h3 class="No-Ops text-center">No Active Slider Found</h3>';
	}
	wp_reset_query(); ?>
</div>
<?php } ?>


		</div>
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
				<div class="col c8 Omega"><?php the_post_thumbnail('FeaturedThumb'); ?>
				</div>
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
