<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package RAIB
 */

?>
	<footer id="colophon" class="site-footer" role="contentinfo">
<div class="wrapper group footerWrap">
	<div class="group">
<div class="col c4"><?php dynamic_sidebar('FooterColumn1');?></div>
<div class="col c4"><?php dynamic_sidebar('FooterColumn2');?></div>
<div class="col c3 Omega"><?php dynamic_sidebar('FooterColumn3');?></div>
</div>
<div class="group EmailWrap">
	<div class="col c4">
	<h3>Email us on</h3>
	<p class="Email">
	<a href="mailto:info@royalassociates.co.ke">info@royalassociates.co.ke</a>
	<!-- <a href="mailto:royal@royalassociates.co.ke">royal@royalassociates.co.ke</a> -->
	<a href="mailto:machakos_branch@royalassociates.co.ke">machakos_branch@royalassociates.co.ke</a>
	</p>
	</div>

<div class="col c8 Newsletter Omega">
<div class="NewsletterWrap">
<h3>Newsletter Subscription</h3>
<?php echo do_shortcode("[gravityform id=2 title=false description=false ajax=true]");?></div></div>
</div>

</div>

<div class="group Copyright">
	<div class="wrapper">
		<div class="col c8 Omega">
		<small class="text-right">&copy; Copyright <?php echo date("Y"); ?> - <?php echo get_bloginfo( 'name' ); ?> Ltd.</small></div>
		<div class="col c4">
		<small>By <a href="http://twofourcarats.com/" target="_blank">Twofour Carats Ltd</a></small></div>
</div>
		</div>
	</footer>
</div><!-- #content -->
</div><!-- #page -->
<div class="panel" id="mobile-menu">
<div class="SearchWrap"><?php get_search_form();?>
</div>
	<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
</div>
<button type="button" class="menu-link" aria-controls="primary-menu">
	<span></span>
	<span></span>
	<span></span>
	<span class="Last">Menu</span>
</button>
<?php wp_footer(); ?>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5894debe64544b46b6b51ae4/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
</body>
</html>
