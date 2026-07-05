<?php
/**
 * RAIB functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package RAIB
 */

if ( ! function_exists( 'twofourcarats_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function twofourcarats_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on RAIB, use a find and replace
	 * to change 'RAIB' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'RAIB', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'RAIB' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'twofourcarats_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // twofourcarats_setup
add_action( 'after_setup_theme', 'twofourcarats_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function twofourcarats_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'twofourcarats_content_width', 640 );
}
add_action( 'after_setup_theme', 'twofourcarats_content_width', 0 );

// Enable thumbnails
add_theme_support( 'post-thumbnails' );
add_image_size( 'Inner-Hero', 1920, 684, true );
add_image_size( 'FeaturedThumb', 900, 480, true );
add_image_size( 'Hero', 1920, 923, true );
add_image_size( 'Logos',264,100, true );
add_image_size( 'Profile',333,333, true );
add_image_size( 'GallleryThumb',453,302, true );
add_image_size( 'GallleryFull',800,533, true );



/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function twofourcarats_widgets_init() {

		register_sidebar( array(
		'name'          => esc_html__( 'FooterColumn1', 'RAIB' ),
		'id'            => 'FooterColumn1',
		'description'   => 'The First Footer Column',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

		register_sidebar( array(
		'name'          => esc_html__( 'FooterColumn2', 'RAIB' ),
		'id'            => 'FooterColumn2',
		'description'   => 'The Second Footer Column',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
	'name'          => esc_html__( 'FooterColumn3', 'RAIB' ),
	'id'            => 'FooterColumn3',
	'description'   => 'The Last Footer Column',
	'before_widget' => '',
	'after_widget'  => '',
	'before_title'  => '<h3 class="widget-title">',
	'after_title'   => '</h3>',
) );

}
add_action( 'widgets_init', 'twofourcarats_widgets_init' );



function my_init() {
	if (!is_admin()) {
		wp_enqueue_script('jquery');
	}
}
add_action('init', 'my_init');


add_filter( 'wp_default_scripts', 'remove_jquery_migrate' );

function remove_jquery_migrate( &$scripts)
{
    if(!is_admin())
    {
        $scripts->remove( 'jquery');
        $scripts->add( 'jquery', false, array( 'jquery-core' ), '1.10.3' );
    }

}

// Remove jQuery Migrate Script from header and Load jQuery from Google API
function crunchify_stop_loading_wp_embed_and_jquery() {
	if (!is_admin()) {
		wp_deregister_script('wp-embed');
	}
}
add_action('init', 'crunchify_stop_loading_wp_embed_and_jquery');

// REMOVE EMOJI ICONS
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
/**
 * Enqueue scripts and styles.
 */
function twofourcarats_scripts() {

wp_enqueue_style( 'RAIB-style', get_stylesheet_uri() );
	wp_enqueue_script( 'RAIB-Carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array(), '20170115', true );
	wp_enqueue_script( 'RAIB-scroll', get_template_directory_uri() . '/js/jquery.mCustomScrollbar.min.js', array(), '20170115', true );
			wp_enqueue_script( 'RAIB-all', get_template_directory_uri() . '/js/all.js', array(), '20160115', true );

				if (wp_is_mobile()){

				// wp_enqueue_script( 'lariak-main-js', get_template_directory_uri() . '/js/main-mobile.js', array(), '20130115', true );

			 } else {

			wp_enqueue_script( '24C-video', get_template_directory_uri() . '/js/youtubebackground.js', array(), '2015', true );
		// wp_enqueue_script( '24C-main-js', get_template_directory_uri() . '/js/main.min.js', array(), '20160115', true );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}

add_action( 'wp_enqueue_scripts', 'twofourcarats_scripts' );

// Load Gravity scripts in footer
add_filter('gform_init_scripts_footer', '__return_true');

add_filter( 'gform_cdata_open', 'wrap_gform_cdata_open' );
function wrap_gform_cdata_open( $content = '' ) {
	$content = 'document.addEventListener( "DOMContentLoaded", function() { ';
	return $content;
}
add_filter( 'gform_cdata_close', 'wrap_gform_cdata_close' );
function wrap_gform_cdata_close( $content = '' ) {
	$content = ' }, false );';
	return $content;
}
//Replace Gravity forms ajax spinner
add_filter( 'gform_ajax_spinner_url', 'spinner_url', 10, 2 );
function spinner_url( $image_src, $form ) {
	return get_stylesheet_directory_uri() . '/images/formloading.gif';
}
// Remove the admin bar from the front end
add_filter( 'show_admin_bar', '__return_false' );


// Put post thumbnails into rss feed
function wpfme_feed_post_thumbnail($content) {
	global $post;
	if(has_post_thumbnail($post->ID)) {
		$content = '' . $content;
	}
	return $content;
}
add_filter('the_excerpt_rss', 'wpfme_feed_post_thumbnail');
add_filter('the_content_feed', 'wpfme_feed_post_thumbnail');

function add_page_excerpt_support(){
   add_post_type_support( 'page', 'excerpt' );
}

add_action('admin_init', 'add_page_excerpt_support');

// Stop images getting wrapped up in p tags when they get dumped out with the_content() for easier theme styling
function wpfme_remove_img_ptags($content){
	return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}
add_filter('the_content', 'wpfme_remove_img_ptags');

add_filter ( 'post_class' , 'butter_odd_or_even' );
if( !function_exists( 'butter_odd_or_even' ) ) {
  global $current_class;
  $current_class = 'odd';

  function butter_odd_or_even ( $classes ) {
    global $current_class;
    $classes[] = $current_class;
		$current_class = ($current_class == 'odd') ? 'even' : 'odd';

return $classes;
}
}


// Remove the version number of WP
// Warning - this info is also available in the readme.html file in your root directory - delete this file!
remove_action('wp_head', 'wp_generator');

/* Add Placehoder in comment Form Fields */

add_filter( 'comment_form_default_fields', 'digitalsky_comment_placeholders' );
function digitalsky_comment_placeholders( $fields )
{
    $fields['author'] = str_replace(
        '<input',
        '<input placeholder="Your Name"',
        $fields['author']
    );
    $fields['email'] = str_replace(
        '<input',
        '<input placeholder="Your Email"',
        $fields['email']
    );
    $fields['url'] = str_replace(
        '<input',
        '<input placeholder="Website..."',
        $fields['url']
    );
    return $fields;
}

/* Add Placehoder in comment Form Field (Comment) */
add_filter( 'comment_form_defaults', 'digitalsky_textarea_placeholder' );

function digitalsky_textarea_placeholder( $fields )
{

        $fields['comment_field'] = str_replace(
            '<textarea',
            '<textarea placeholder="Your thoughts"',
            $fields['comment_field']
        );


    return $fields;
}

function crunchify_disable_comment_url($fields) {
    unset($fields['url']);
    return $fields;
}
add_filter('comment_form_default_fields','crunchify_disable_comment_url');

function wpb_move_comment_field_to_bottom( $fields ) {
$comment_field = $fields['comment'];
unset( $fields['comment'] );
$fields['comment'] = $comment_field;
return $fields;
}

add_filter( 'comment_form_fields', 'wpb_move_comment_field_to_bottom' );


	add_filter( 'avatar_defaults', 'crunchifygravatar' );

function crunchifygravatar ($avatar_defaults) {
    $myavatar = get_bloginfo('template_directory') . '/images/avatar.png';
    // OR --> $myavatar = "http://crunchify.com/Crunchify.png";
    $avatar_defaults[$myavatar] = "twofourcarats";
    return $avatar_defaults;
}

function my_theme_archive_title( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    }

    return $title;
}

add_filter( 'get_the_archive_title', 'my_theme_archive_title' );

/**Post Counter*/
add_filter( 'post_class', function( Array $classes ) {
    static $number = 1;
    $classes[] = 'post-number-' . $number++;
    if ( 4 === $number )
        $number = 1;
    return $classes;
});


/**Post Counter*/
/**
 * Implement the Custom Header feature.
 */
// require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */

require get_template_directory() . '/inc/extras.php';
