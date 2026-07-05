<?php
/**
 *Template Name: Contact
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package RAIB
 */

get_header(); ?>

	<div id="primary" class="content-area group">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

						<header class="entry-header group">

						<div class="wrapper one animate fadeIn">
							<h1 class="entry-title-2"><?php the_title(); ?></h1>
					  <?php if ( function_exists('yoast_breadcrumb') ) {
					yoast_breadcrumb('<p class="breadcrumbs">','</p>');
					} ?></div>

						</header><!-- .page-header -->
				<div class="wrapper">
					<div class="mapWrap">
<div class="group" id="gmap" style="width:100%;height:400px;"></div>
</div>
					<div class="entry-content">
						<?php the_content(); ?>
						<?php
							wp_link_pages( array(
								'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'RAIB' ),
								'after'  => '</div>',
							) );
						?>
					</div><!-- .entry-content -->

					<footer class="entry-footer">
						<?php
							edit_post_link(
								sprintf(
									/* translators: %s: Name of current post */
									esc_html__( 'Edit %s', 'RAIB' ),
									the_title( '<span class="screen-reader-text">"', '"</span>', false )
								),
								'<span class="edit-link">',
								'</span>'
							);
						?>
					</footer><!-- .entry-footer -->
					</div>
				</article><!-- #post-## -->

			<?php endwhile; // End of the loop. ?>


		</main><!-- #main -->

	</div><!-- #primary -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDqVbChUC7hHJjZIZ0ju4KemVCLg18l6as"
	 type="text/javascript"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/maplace.min.js"></script>
	<script>

	jQuery(function() {
			new Maplace({
					locations: [
							{
									lat:-1.29706,
									lon: 36.792674,
									title: 'Royal Associates Insurance Brokers Ltd',
								html: '<h3>Royal Associates Insurance Brokers Ltd - Nairobi Office</h3><p>Blue Violet Plaza, 2nd Floor, Kamburu Drive, Off Ngong Road</p>'
							},{
										lat:-1.518682,
										lon:37.265075,
										title: 'Royal Associates Insurance Brokers Ltd - Machakos Office',
									html: '<h3>Royal Associates Insurance Brokers Ltd - Machakos Office</h3><p>First Floor ABC Place, Waiyaki Way, Nairobi, Kenya</p>'
								},
								{
											lat:-4.060883,
											lon:39.664493,
											title: 'Royal Associates Insurance Brokers Ltd - Mombasa Office',
										html: '<h3>Royal Associates Insurance Brokers Ltd - Mombasa Office</h3><p> Ground Floor, Jubilee Insurance House, Moi Avenue, Mombasa, Kenya</p>'
									},


					],
					controls_on_map: false
			}).Load();
	});
</script>
<?php get_footer(); ?>
