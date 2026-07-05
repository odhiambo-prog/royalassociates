<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package RAIB
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header group">
			<div class="Fly">
				<div class="wrapper">
				<h1 class="entry-title animate one fadeInUp"><?php the_title();?></h1>
</div>
	</div>
	<div class="Overlay TwofourFeatured">
		<?php if ( has_post_thumbnail()) { ?>
		<?php the_post_thumbnail( 'Inner-Hero' ); ?>
		<?php } ?></div>
		</header>
	<!-- .entry-header -->
<div class="group">
	<div class="main-content wrapper">
	<div class="entry-content">
		<div class="group PostMeta">
		<div class="col c4"><?php if ( function_exists('yoast_breadcrumb') ) {
	yoast_breadcrumb('<p class="breadcrumbs">','</p>');
} ?></div>
<div class="col Omega c8 text-right">
	By <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'first_nicename' ) ); ?>"><?php echo get_the_author_meta( 'first_name' ); ?></a>
</div>
</div>
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

	<div class="Share col c4">
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
			<div class="col Omega c4"><span class="DateWrap Omega"><?php echo get_the_date();?></span>
		</div>
	</div>

	<footer class="entry-footer">
		<?php twofourcarats_entry_footer(); ?>
	</footer><!-- .entry-footer -->
	<?php
		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
	?>
</div>

</div>
</article><!-- #post-## -->
