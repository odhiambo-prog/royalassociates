<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package RAIB
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header group">
		<?php if ( has_post_thumbnail()) { ?>

			<div class="wrapper">
				<div class="Fly">
				<h1 class="entry-title animate one fadeInUp"><?php the_title();?></h1>
			</div>
		</div>
		<div class="Overlay">
		<?php the_post_thumbnail( 'Inner-Hero' ); ?>
		</div>

			<?php } else { ?>

				<div class="wrapper one animate fadeIn">
							<h1 class="entry-title-2">Contact Us</h1>
	</div>

				<?php } ?>


	</header><!-- .entry-header -->
<div class="wrapper">
	<?php if ( function_exists('yoast_breadcrumb') ) {
yoast_breadcrumb('<p class="breadcrumbs">','</p>');
} ?>
	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'RAIB' ),
				'after'  => '</div>',
			) );
		?>
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
