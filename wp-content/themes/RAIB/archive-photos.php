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
						<h1 class="entry-title animate one fadeInUp">Photo Gallery</h1>
		</div>

				</header><!-- .page-header -->
				<div class="wrapper">
					<?php if ( function_exists('yoast_breadcrumb') ) {
				yoast_breadcrumb('<p class="breadcrumbs">','</p>');
				} ?>
	  <div class="group entry-content">
<h2>Albums</h2>
			<ul class="Gallery group noMargin TheAlbums">

		  <?php foreach (get_terms('albums','order=DESC') as $cat) : ?>

				<?php
				  $classes = array(
				    'col',
				    'c4',
						'Hype'
				  );
				?>
		  <li <?php post_class( $classes ); ?>>
		   <a href="<?php echo get_term_link($cat->slug, 'albums'); ?>">
		   <img src="<?php echo z_taxonomy_image_url($cat->term_id, 'GallleryThumb'); ?>" /></a>
		   <h3><a href="<?php echo get_term_link($cat->slug, 'albums'); ?>"><?php echo $cat->name; ?></a></h3>
		  </li>
		  <?php endforeach; ?>
		 </ul>
</div>
</div>
<div class="wrapper"><h2>Latest Photos</h2></div>
<ul class="Gallery group noMargin TheAlbum wrapper" id="TheAlbum">
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts('posts_per_page=35') ) : the_post(); ?>
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
