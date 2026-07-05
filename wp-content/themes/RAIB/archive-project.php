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
		<main id="main" class="site-main group" role="main">

		<?php if ( have_posts() ) : ?>

	<header class="entry-header group">

	<div class="wrapper text-center one animate fadeIn">
		<h1 class="entry-title"><?php post_type_archive_title(); ?></h1>
  <?php if ( function_exists('yoast_breadcrumb') ) {
yoast_breadcrumb('<p class="breadcrumbs">','</p>');
} ?></div>

	</header><!-- .page-header -->
	<div class="Projects group" id="Projects">
	  <div class="wrapper">
<ul class="group NoMargin nostyle">

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
				$classes = array(
				'group'
				);
				?>
				<li <?php post_class( $classes ); ?>>
				<div class="col c5 Omega">
				<div class="Buffer Hype"><h2 class="one animate fadeIn"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
					<ul class="nostyle service-list one animate fadeIn">
					<?php
					$posttags = get_the_tags();
					if ($posttags) {
					foreach($posttags as $tag) {
					echo '<li><h4>' .$tag->name. '</h4></li>';
					}
					}
					?>
					</ul>				</div></div>
				<div class="col c7">
				<?php if ( has_post_thumbnail()) { ?>
				<a href="<?php the_permalink();?>" class="Overlay"><?php the_post_thumbnail('FeaturedProjects'); ?></a>
				<?php } ?>
				</div>
				</li>

			<?php endwhile; ?>
</ul>
</div>
</div>
			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->

<?php get_sidebar(); ?>
	</div><!-- #primary -->

<?php get_footer(); ?>
