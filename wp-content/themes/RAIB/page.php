<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package RAIB
 */

get_header(); ?>

	<div id="primary" class="content-area group">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'page' ); ?>

			<?php endwhile; // End of the loop. ?>
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
		</main><!-- #main -->

	</div><!-- #primary -->

<?php get_footer(); ?>
