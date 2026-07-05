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

			<header class="entry-header group">
						<div class="wrapper">
						<h1 class="entry-title animate one fadeInUp"><?php the_archive_title();?></h1>
		</div>

				</header><!-- .page-header -->
				<div class="wrapper">
					<?php if ( function_exists('yoast_breadcrumb') ) {
				yoast_breadcrumb('<p class="breadcrumbs">','</p>');
				} ?>
	  <div class="group entry-content">
			<ul class="Gallery group noMargin TheAlbum" id="TheAlbum">
						<?php /* Start the Loop */ ?>
						<?php while ( have_posts() ) : the_post(); ?>
			<?php
			  $classes = array(
			    'col',
			    'c4',
					'Hype'
			  );
			?>
			 <li data-src="<?php $image_id = get_post_thumbnail_id();
			$image_url = wp_get_attachment_image_src($image_id,'GallleryFull', true);
			echo $image_url[0];  ?>" <?php post_class( $classes ); ?>>
			  <?php if ( has_post_thumbnail()) { ?>
			<?php the_post_thumbnail( 'GallleryThumb' ); ?>


			  <?php } ?>
	<div class="Fly">
	<img src="<?php bloginfo('template_url'); ?>/images/zoom.png" alt="zoom" class="Zoom"/>
</div>
			       </li>

						<?php endwhile; ?>


					</ul>
</div>
</div>

<?php

the_posts_pagination( array(
	'mid_size'  => 2,
	'prev_text' => __( '<<', 'textdomain' ),
	'next_text' => __( '>>', 'textdomain' ),
) );
 ?>

		</main><!-- #main -->

	</div><!-- #primary -->
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/lightgallery.min.js"></script>
	<link type="text/css" rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/lightgallery.css" />
	    <script>
			jQuery('#TheAlbum').lightGallery({
        mode: 'lg-slide-skew-ver-rev',
        cssEasing : 'ease',
        hash:true,
				preload:1,
				download:false,
				share:true,
				facebook:true,
    });</script>
<?php get_footer(); ?>
