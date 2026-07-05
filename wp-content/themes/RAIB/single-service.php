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


			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header group">

				<div class="wrapper">
					<div class="Fly">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</div>
			</div>
			<div class="Overlay">
						<?php if ( has_post_thumbnail()) { ?>
			<?php the_post_thumbnail( 'Inner-Hero' ); ?>
			  <?php } ?>
			</div>
				</header><!-- .entry-header -->
			<div class="wrapper">
				<div class="entry-content">
					<?php the_content(); ?>
					<?php
						wp_link_pages( array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'RAIB' ),
							'after'  => '</div>',
						) );
					?>
					<h2>Have any questions?</h2>
				<?php echo do_shortcode('[gravityform id="1" title="false" description="false" ajax="true"]');?>
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


			</div>

		<?php endwhile; // End of the loop. ?>
		</main><!-- #main -->

						<div class="Clients Overlay">
							<div class="wrapper">
							<h2 class="Heading text-center">
							<span>happy</span> Clients</h2>
															<ul class="nostyle group TheClients">
														<?php
														$my_query = new WP_Query('post_type=client&posts_per_page=-1');
														if ($my_query->have_posts()){
																while ($my_query->have_posts()) : $my_query->the_post(); ?>
															<?php
															$classes = array();
															?>
														<li <?php post_class( $classes ); ?>>
															<div class="Buffer">
														<?php the_content();?>
														<h3><?php the_title();?></h3>
													</div>
														</li>
														<?php endwhile;
														}
														else
														{
														echo '<h3 class="No-Ops text-center">No Active Clients were found</h3>';
														}
														wp_reset_query(); ?>
														</ul>
													</div>
													</div>

						<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/js/owl.carousel.min.js'></script>
						<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/js/carousel.js'></script>

<?php get_footer(); ?>
