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

	<div class="wrapper one animate fadeIn">
		<h1 class="entry-title">The <?php post_type_archive_title(); ?></h1>
<p class="breadcrumbs"><span xmlns:v="http://rdf.data-vocabulary.org/#"><span typeof="v:Breadcrumb"><a href="http://localhost/RAIB/" rel="v:url" property="v:title">Home</a> / <span rel="v:child" typeof="v:Breadcrumb"><a href="/about/" rel="v:url" property="v:title">About us</a> / <span class="breadcrumb_last">The Team</span></span></span></span></p>
</div>

	</header><!-- .page-header -->
	  <div class="wrapper ListView group">
			<p>Royal Associates strongly believes that any service is built on people, their expertise, and the way they team up to deliver a consistent approach and a partnership relationship with clients. Fundamental to Royal Associates is the concept of partnership, in which our client’s knowledge of their own business is combined with our risk management skills to deliver value. We believe that to be truly effective, a risk management process has to be a partnership.</p>
			<div class="group TheDirectors">
			<h2>Board of Directors</h2>
			<?php
			$my_query = new WP_Query('post_type=team&job_group=Directors&posts_per_page=-1');
			if ($my_query->have_posts()){

			  while ($my_query->have_posts()) : $my_query->the_post(); ?>
			<?php
			$classes = array(
			'col',
			'c4',
			'Hype'
			);
			?>
			<div <?php post_class( $classes ); ?>>
  <?php if ( has_post_thumbnail() ) { ?>
		<a href="#team-<?php the_ID(); ?>" class="pop" data-effect="mfp-newspaper">
		<?php the_post_thumbnail('Profile'); ?></a>
			<?php } else { ?>
				<a href="#team-<?php the_ID(); ?>" class="pop" data-effect="mfp-newspaper">
		<img src="<?php bloginfo('template_url'); ?>/images/no-profile.png" alt="<?php the_title()?>" class="attachment-Profile size-Profile wp-post-image"></a>
				<?php } ?>
					<div class="Buffer">
				<h3><a href="#team-<?php the_ID(); ?>" class="pop" data-effect="mfp-newspaper"><?php the_title();?></a></h3>
				<h4><?php echo get_post_meta(get_the_id(), 'job_title', true);?></h4>
				</div>
				<div class="popup-content mfp-hide text-center" id="team-<?php the_ID(); ?>">
					<?php if ( has_post_thumbnail() ) { ?>
						<?php the_post_thumbnail('Profile'); ?></a>
							<?php } else { ?>
						<img src="<?php bloginfo('template_url'); ?>/images/no-profile.png" alt="<?php the_title()?>" class="attachment-Profile size-Profile wp-post-image">
								<?php } ?>
								<div class="Buffer">
							<h3><?php the_title();?></h3>
							<h4><?php echo get_post_meta(get_the_id(), 'job_title', true);?></h4>
							</div>
								<?php the_content();?>
</div>
			</div>
			<?php endwhile;
			}
			else
			{
			echo '<h3 class="No-Ops text-center">No Active Diretors were found</h3>';
			}
			wp_reset_query(); ?>
		</div>
<div class="group TheStaff">
			<h2>Staff</h2>
			<?php
			$my_query = new WP_Query('post_type=team&job_group=Staff&posts_per_page=-1');
			if ($my_query->have_posts()){

				while ($my_query->have_posts()) : $my_query->the_post(); ?>
			<?php
			$classes = array(
			'col',
			'c4',
			'Hype'
			);
			?>
			<div <?php post_class( $classes ); ?>>
  <?php if ( has_post_thumbnail() ) { ?>
		<a href="#team-<?php the_ID(); ?>" class="pop" data-effect="mfp-newspaper">
		<?php the_post_thumbnail('Profile'); ?></a>
			<?php } else { ?>
				<a href="#team-<?php the_ID(); ?>" class="pop" data-effect="mfp-newspaper">
		<img src="<?php bloginfo('template_url'); ?>/images/no-profile.png" alt="<?php the_title()?>" class="attachment-Profile size-Profile wp-post-image"></a>
				<?php } ?>
					<div class="Buffer">
				<h3><a href="#team-<?php the_ID(); ?>" class="pop" data-effect="mfp-newspaper"><?php the_title();?></a></h3>
				<h4><?php echo get_post_meta(get_the_id(), 'job_title', true);?></h4>
				</div>
				<div class="popup-content mfp-hide text-center" id="team-<?php the_ID(); ?>">
					<?php if ( has_post_thumbnail() ) { ?>
						<?php the_post_thumbnail('Profile'); ?></a>
							<?php } else { ?>
						<img src="<?php bloginfo('template_url'); ?>/images/no-profile.png" alt="<?php the_title()?>" class="attachment-Profile size-Profile wp-post-image">
								<?php } ?>
								<div class="Buffer">
							<h3><?php the_title();?></h3>
							<h4><?php echo get_post_meta(get_the_id(), 'job_title', true);?></h4>
							</div>
								<?php the_content();?>
</div>
			</div>
			<?php endwhile;
			}
			else
			{
			echo '<h3 class="No-Ops text-center">No Active Staff members were found</h3>';
			}
			wp_reset_query(); ?>
					</div>
</div>

</div>
		</main><!-- #main -->

	</div><!-- #primary -->
	<link rel='stylesheet' href="<?php bloginfo('template_url'); ?>/css/magnific-popup.css"  type='text/css' media='all' />
	<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/js/jquery.magnific-popup.min.js'></script>
	<script type="text/javascript">
	jQuery('.pop').magnificPopup({
	  type: 'inline',
	  mainClass: 'mfp-fade',
	  removalDelay: 300,
	  preloader: true,
		closeBtnInside: true,
	  fixedContentPos: true,
	  gallery: {
	    enabled: true
	  }
	});
	</script>
<?php get_footer(); ?>
