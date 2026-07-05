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

			<?php
			/**
			 * Template part for displaying single posts.
			 *
			 * @link https://codex.wordpress.org/Template_Hierarchy
			 *
			 * @package RAIB
			 */

			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header group">
						<div class="Fly">
							<div class="wrapper">
							<h1 class="entry-title animate one fadeInUp"><?php the_title();?></h1>
			</div>
				</div>
				<div class="Overlay TwofourFeatured">
					<?php if ( has_post_thumbnail()) { ?>
					<?php the_post_thumbnail( 'Inner-Hero' ); ?>
					<?php } ?></div>
					</header>

				<!-- .entry-header -->
				<div class="wrapper">
				<div class="entry-content group NoMargin TheProduct">
					<div class="col c8">
						<?php if ( function_exists('yoast_breadcrumb') ) {
					yoast_breadcrumb('<p class="breadcrumbs">','</p>');
					} ?>
					<div class="Buffer">
					<?php the_content(); ?>
					<?php
						wp_link_pages( array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'RAIB' ),
							'after'  => '</div>',
						) );
					?>
				</div>
				</div>
				<div class="col c4 Omega">
					<h2>Get a quick Quote</h2>
					<div class="Buffer">
				<?php echo do_shortcode('[gravityform id="1" title="false" description="false" ajax="true"]');?>
			</div>
			</div>
				</div><!-- .entry-content -->
</div>

				<footer class="entry-footer">
					<?php twofourcarats_entry_footer(); ?>
				</footer><!-- .entry-footer -->

			</div>

			</div>
			</article><!-- #post-## -->



			<div class="wrapper TheProducts">
				<h2>You may also be interested in</h2>
			<div class="FeaturedItems owl-carousel">
					<?php
			$my_query = new WP_Query('post_type=product&featured=Yes&posts_per_page=4');
			if ($my_query->have_posts()){

						while ($my_query->have_posts()) : $my_query->the_post(); ?>
			<?php
				$classes = array(
					'item'
				);
			?>
			<div <?php post_class( $classes ); ?>>
			<div class="col c8"><?php the_post_thumbnail('FeaturedThumb'); ?></div>
			<div class="col c4 Omega">
				<div class="Buffer">
			<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
			<?php the_excerpt();?>
				<a href="<?php the_permalink();?>" class="btn">Get A Quote</a>
			</div>
			</div>

				</div>

			<?php endwhile;
			}
			else
			{
			 echo '<h3 class="No-Ops text-center">No Active Slider Found</h3>';
			}
			wp_reset_query(); ?>

			</div>
			</div>


		<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
<?php get_sidebar(); ?>
	</div><!-- #primary -->

<?php get_footer(); ?>
