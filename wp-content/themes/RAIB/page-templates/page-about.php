<?php
/**
 * Template Name: About
 *
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
							<div class="Fly">
								<div class="wrapper">

								<h1 class="entry-title animate one fadeInUp"><?php the_title();?></h1>
								<div class="Fly">
									<a href="https://www.youtube.com/watch?v=IG2ohsTn4V4" class="Play animate two fadeInUp"><img src="<?php bloginfo('template_url'); ?>/images/play.png" alt="Play" title="Play the company profile video"><span>Play Video</span></a>
								</div>
				</div>
					</div>
					<div class="Overlay">
						<?php if ( has_post_thumbnail()) { ?>
						<?php the_post_thumbnail( 'Inner-Hero' ); ?>
						<?php } ?></div>
						</header>
				<div class="wrapper">
					<div class="entry-content">
						<?php if ( function_exists('yoast_breadcrumb') ) {
					yoast_breadcrumb('<p class="breadcrumbs">','</p>');
					} ?>
						<?php the_content(); ?>
						<?php
							wp_link_pages( array(
								'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'RAIB' ),
								'after'  => '</div>',
							) );
						?>
					</div><!-- .entry-content -->
</div>
<div class="BranD1">
	<div class="group wrapper">
<div class="col c6 Hype">
<h2 class="text-center">Our Vision</h2>
We leverage on technology and provide unique insurance risk solutions. We are committed to becoming Africa’s leading insurance risk solutions & finanicial services provider.
</div>
<div class="col c6 Omega Hype">
<h2 class="text-center">Our Mission</h2>
We are dedicated to providing the best advice, and to delivering first class care and support, to ensure that our clients always realize first-class coverage.
</div>
</div>
</div>

<div class="BranD">
<div class="wrapper group">
<div class="col c6">
<h2 class="text-center">Our Strength</h2>
Our strength lies in our people. Our team is a partnership of highly qualified and talented professionals who are committed to providing clients with expert advice, and to serving them with purpose and dedication.
</div>
<div class="col c6 Omega">
<h2 class="text-center">Our Philosophy</h2>
We venture into unknown waters and embrace new ideas. Through creativity and innovation, we design and structure unique risk and financial solutions that offer the best coverage possible for our clients.
We are a truly listening partner, endeavoring to understand our clients’ unique insurance needs, and seeking to come up with practical and innovative solutions to meet those needs.
</div>
</div>
</div>

<div class="CoreValuesWrap text-center">
	<div class="wrapper"><h2>Our Core Values</h2></div>
	<ul class="OurCoreValues group wrapper">
	<li class="Passion Hype">
	<img src="http://twofourcarats.com/RAIB/wp-content/uploads/2016/09/Passion.png" alt="Passion" width="512" height="512" class="alignnone size-full wp-image-503" />
	<h3>Passion</h3>
	<p class="PassionContent">We love what we do and we are deeply passionate about it. We have fun doing it.</p>
	</li>
	<li class="Trust Hype">
	<img src="http://twofourcarats.com/RAIB/wp-content/uploads/2016/09/Trust.png" alt="Trust" width="512" height="512" class="alignnone size-full wp-image-505" />
	<h3>Trust</h3>
	<p class="TrustContent">We will build meaningful win-win relationships with our staff and our partners. We will relate with people in a way that is authentic and true.</p>
	</li>
	<li class="Wow Hype">
	<img src="http://twofourcarats.com/RAIB/wp-content/uploads/2016/09/Wow.png" alt="Wow" width="512" height="512" class="alignnone size-full wp-image-506" />
	<h3>Wow Service</h3>
	<p class="WowContent">We will delight our customers by always listening to them and giving them the best advice, care, and support.</p>
	</li>
	<li class="Innovation Hype">
	<img src="http://twofourcarats.com/RAIB/wp-content/uploads/2016/09/Innovation.png" alt="Innovation" width="512" height="512" class="alignnone size-full wp-image-507" />
	<h3>Learning & Innovation</h3>
	<p class="InnovationContent">We are a learning organisation. We will challenge prevailing assumptions and commit to the search and discovery of better and practical solutions.</p>
	</li>
	<li class="Excellence Hype">
	<img src="http://twofourcarats.com/RAIB/wp-content/uploads/2016/09/excellence.png" alt="excellence" width="512" height="512" class="alignnone size-full wp-image-504" />
	<h3>Excellence</h3>

	<p class="ExcellenceContent">We are committed to being the best we can be. We will create better ways of doing things and set new standards in our industry.</p></li>
	</ul></div>
<!-- <div class="wrapper TheClients">
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
</div> -->

					</div>
				</article><!-- #post-## -->
			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->

		<link rel='stylesheet' href="<?php bloginfo('template_url'); ?>/css/magnific-popup.css"  type='text/css' media='all' />
		<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/js/jquery.magnific-popup.min.js'></script>
<script type="text/javascript">jQuery('.Play').magnificPopup({type:'iframe',mainClass:'mfp-fade',removalDelay:300,preloader:true,fixedContentPos:false,gallery:{enabled:true},iframe:{markup:'<div class="mfp-iframe-scaler">'+'<div class="mfp-close"></div>'+'<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>'+'<div class="mfp-bottom-bar">'+'<div class="mfp-counter"></div>'+'</div>'+'</div>'}});</script>
<?php get_footer(); ?>
