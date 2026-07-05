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
		<div class="group PostMeta">
		<div class="text-center"><?php if ( function_exists('yoast_breadcrumb') ) {
	yoast_breadcrumb('<p class="breadcrumbs">','</p>');
} ?></div>
</div>
		<?php while ( have_posts() ) : the_post(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header group">

	<div class="Overlay TwofourFeatured">
		<?php if ( has_post_thumbnail()) { ?>
		<?php the_post_thumbnail( 'Inner-Hero' ); ?>
		<?php } ?></div>
		<h1 class="entry-title animate one fadeInUp"><?php the_title();?></h1>
								<h2 class="JobTitle"><?php echo get_post_meta(get_the_id(), 'job_title', true);?></h2>
		</header>
	<!-- .entry-header -->
<div class="group">
	<div class="main-content wrapper">
	<div class="entry-content">
<div class="Buffer">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'RAIB' ),
				'after'  => '</div>',
			) );
		?>
	</div>
	</div><!-- .entry-content -->
	<div class="group ShareWrap">

	<div class="Share text-center">
	<p>SHARE</p>
				<ul class="nostyle">
				<!-- Facebook -->
				<li class="Facebook"><a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>" target="_blank">Share on Facebook</a></li>
				<!-- Twitter -->
				<li class="Twitter"><a href="https://twitter.com/share?url= <?php echo wp_get_shortlink();?> &amp;text=<?php the_title();?>&amp;hashtags=twofourcarats" target="_blank">
					Tweet this</a></li>
					<!-- LinkedIn -->
					<li class="LinkedIn"><a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink();?>" target="_blank">
					Share on LinkedIn</a></li>
				<!-- Google+ -->
				<li class="Gplus"><a href="https://plus.google.com/share?url=<?php the_permalink();?>" target="_blank">
				Share on Google+</a></li>
				</ul>
			</div>

	</div>

</div>

</div>
</article><!-- #post-## -->
			<?php	the_post_navigation( array(

				          'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'twentysixteen' ) . '</span> ' .

				            '<span class="screen-reader-text">' . __( 'Next Team Member:', 'twentysixteen' ) . '</span> ' .

				            '<span class="post-title">Team Member →</span>',

				          'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( ' ← Previous', 'twentysixteen' ) . '</span> ' .

				            '<span class="screen-reader-text">' . __( 'Previous Team Member:', 'twentysixteen' ) . '</span> ' .

				            '<span class="post-title">Team Member</span>',

				        ) );

				?>


		<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
