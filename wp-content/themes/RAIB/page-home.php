<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package RAIB
 */
get_header(); ?>


	<div class="TheBanner owl-carousel Twofour">
	    <?php
	$my_query = new WP_Query('post_type=slider&slider_position=Home&posts_per_page=4');
	if ($my_query->have_posts()){

	      while ($my_query->have_posts()) : $my_query->the_post(); ?>
	<?php
	  $classes = array(
			'item'
	  );
	?>
	<div <?php post_class( $classes ); ?>>
		<?php the_post_thumbnail('Hero'); ?>

	<div class="Fly">
		<div class="wrapper">
	<div class="SliderCaption animate one fadeInUp">
		<h2 class="BannerTitle"><?php the_title();?></h2>
	<p><?php echo get_post_meta(get_the_id(), 'slider_description', true);?></p>
		 <a href="<?php echo get_post_meta(get_the_id(), 'slider_link', true);?>" class="btn">Learn More</a>
	</div>
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

	<span class="scroll-btn scroll-down">
	<a href="#About-Us">
		<span class="mouse">
			<span>
			</span>
		</span>
	</a>
  <p>Scroll Down</p>

</span>




		<main id="main" class="site-main" role="main">

<div class="group About" id="About-Us">
<?php
$my_query = new WP_Query('post_type=page&posts_per_page=1');
if ($my_query->have_posts()){

  while ($my_query->have_posts()) : $my_query->the_post(); ?>
<?php
$classes = array(
'group'
);
?>
<div <?php post_class( $classes ); ?>>
<div class="Buffer text-center">
	<div class="wrapper">
<h2 class="Heading text-center">About Us</h2>
<?php the_excerpt();?>
<a href="<?php the_permalink();?>" class="btn">Learn More</a>
</div>
</div>

<?php endwhile;
}
else
{
echo '<h3 class="No-Ops text-center">No Active Pages were found</h3>';
}
wp_reset_query(); ?>
</div>
</div>


<div class="Iwant Buffer">
<h2 class="text-center">I want..</h2>
<div class="wrapper group Box">
<div class="col c4 Hype">
	<a href="/p/individual-insurance/"><img src="<?php bloginfo('template_url'); ?>/images/individual.png" alt="Individual Insurance"></a>
	<h3><a href="p/individual-insurance/">Individual Insurance</a></h3>
</div>
<div class="col c4 Hype">
		<a href="/p/corporate-insurance/"><img src="<?php bloginfo('template_url'); ?>/images/corporate.png" alt="Corporate Insurance"></a>
		<h3><a href="/p/corporate-insurance/">Corporate Insurance</a></h3>
</div>

<div class="col c4 Omega Hype">
		<a href="/contacts"><img src="<?php bloginfo('template_url'); ?>/images/talk.png" alt="Let's Talk"></a>
		<h3><a href="/RAIB/contacts">To ask a Question</a></h3>
</div>
</div>
</div>


<div class="wrapper TheProducts">
	<div  class="FeaturedTitle">
	<h2>Featured Products</h2>
</div>
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
	<a href="<?php the_permalink();?>" class="btn">Learn More</a>
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


<div class="wrapper TheBlog">
	<div  class="FeaturedTitle">
		<h2>Latest Articles</h2>
</div>
<div class="FeaturedItems owl-carousel">
		<?php
$my_query = new WP_Query('post_type=post&posts_per_page=4');
if ($my_query->have_posts()){

			while ($my_query->have_posts()) : $my_query->the_post(); ?>
<?php
	$classes = array(
		'item'
	);
?>
<div <?php post_class( $classes ); ?>>
<div class="col c8 Omega"><?php the_post_thumbnail('FeaturedThumb'); ?>
	<span class="Date"><?php echo get_the_date();?>
	</span>
</div>
<div class="col c4">
	<div class="Buffer">
<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
<?php the_excerpt();?>
	<a href="<?php the_permalink();?>" class="btn">Read More</a>
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


<div class="wrapper TheClients">
	<h2>Featured Clients</h2>
<div class="FeaturedClients owl-carousel">
		<?php
$my_query = new WP_Query('post_type=clients&posts_per_page=20');
if ($my_query->have_posts()){

			while ($my_query->have_posts()) : $my_query->the_post(); ?>
<?php
	$classes = array(
		'item'
	);
?>
<div <?php post_class( $classes ); ?>>
<?php the_post_thumbnail('Logos'); ?>
	</div>

<?php endwhile;
}
else
{
 echo '<h3 class="No-Ops text-center">No Clients were Found</h3>';
}
wp_reset_query(); ?>

</div>
</div>
		</main><!-- #main -->

<?php get_footer(); ?>
