<?php
/**
 * Search & Filter Pro
 *
 * @package   Search_Filter_Post_Cache
 * @author    Ross Morsali
 * @link      http://www.designsandcode.com/
 * @copyright 2015 Designs & Code
 */

class Search_Filter_Shared { 

	private $plugin_slug = "search-filter";
	public function __construct() {

		global $wpdb;
		add_action( 'init', array( $this, 'create_custom_post_types' ) );
        add_action('widgets_init', array($this, 'init_widget'));
	}
	public function create_custom_post_types()
	{
		// @TODO: Define your action hook callback here
		
		$labels = array(
		    'name'					=>	__( 'Search &amp; Filter', $this->plugin_slug ),
			'singular_name'			=>	__( 'Search Form', $this->plugin_slug ),
		    'add_new'				=>	__( 'Add New Search Form', $this->plugin_slug ),
		    'add_new_item'			=>	__( 'Add New Search Form', $this->plugin_slug ),
		    'edit_item'				=>	__( 'Edit Search Form', $this->plugin_slug ),
		    'new_item'				=>	__( 'New Search Form', $this->plugin_slug ),
		    'view_item'				=>	__( 'View Search Form', $this->plugin_slug ),
		    'search_items'			=>	__( 'Search \'Search Forms\'', $this->plugin_slug ),
		    'not_found'				=>	__( 'No Search Forms found', $this->plugin_slug ),
		    'not_found_in_trash'	=>	__( 'No Search Forms found in Trash', $this->plugin_slug ),
		);
		
		register_post_type($this->plugin_slug.'-widget' , array(
			'labels'			=> $labels,
			'public'			=> false,
			'show_ui'			=> true,
			'_builtin'			=> false,
			'capability_type'	=> 'page',
			'hierarchical'		=> true,
			'rewrite'			=> false,
			'supports'			=> array('title'),
			'show_in_menu'		=> false
			/*'has_archive' => true,*/
		));		
	}


    public function init_widget()
    {
        register_widget( 'Search_Filter_Register_Widget' );
    }

}
