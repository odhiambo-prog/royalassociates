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
						<h1 class="entry-title animate one fadeInUp">Videos</h1>
						<div class="Fly">
							<a href="https://www.youtube.com/watch?v=I4bHI16j_SE" class="Play animate two fadeInUp Video-Link"><img src="<?php bloginfo('template_url'); ?>/images/play.png" alt="Play" title="Play the company profile video"><span>Play All Videos</span></a>
						</div>
		</div>
			</div>
			<div class="Overlay TwofourFeatured">
				<img src="<?php bloginfo('template_url'); ?>/images/videos.jpg" alt="Videos" class="attachment-Inner-Hero size-Inner-Hero wp-post-image"></div>
				</header>
			</div>

	  <div class="wrapper">
			<?php if ( function_exists('yoast_breadcrumb') ) {
		yoast_breadcrumb('<p class="breadcrumbs">','</p>');
		} ?>

			<div class="entry-content group ListView">

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php
					$classes = array(
						'col',
						'c4',
						'Hype'
					);
				?>
				<div <?php post_class( $classes ); ?>>
					<a href="https://www.youtube.com/watch?v=<?php echo get_post_meta(get_the_id(), 'youtube_video_id', true);?>" class="Video-Link Overlay">
					<img src="https://i1.ytimg.com/vi/<?php echo get_post_meta(get_the_id(), 'youtube_video_id', true);?>/hqdefault.jpg" alt="<?php the_title();?>"/>
					<img src="<?php bloginfo('template_url'); ?>/images/play.png" alt="Play <?php the_title();?> Video" title="Play <?php the_title();?> Video" class="Play">
					</a>
					<h2><?php the_title();?></h2>

					</div>

			<?php endwhile; ?>
</div>
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

	</div><!-- #primary -->
	<link rel='stylesheet' href="<?php bloginfo('template_url'); ?>/css/magnific-popup.css"  type='text/css' media='all' />
	<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/js/jquery.magnific-popup.min.js'></script>
	<script type="text/javascript">
	jQuery('.Video-Link').magnificPopup({
	  type: 'iframe',
	  mainClass: 'mfp-fade',
	  removalDelay: 300,
	  preloader: true,
	  fixedContentPos: false,
	  gallery: {
	    enabled: true
	  },
	    iframe: {
	    markup:
	    '<div class="mfp-iframe-scaler">'+
	      '<div class="mfp-close"></div>'+
	        '<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>'+
	        '<div class="mfp-bottom-bar">'+
	        '<div class="mfp-counter"></div>'+
	      '</div>'+
	    '</div>'
	  }
	});
	</script>
<?php get_footer(); ?>
