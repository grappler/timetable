<?php
/**
 * Plugin Name.
 *
 * @package   Timetable
 * @author    Your Name <email@example.com>
 * @license   GPL-2.0+
 * @link      http://example.com
 * @copyright 2013 Your Name or Company Name
 */

/**
 * Plugin class.
 *
 * TODO: Rename this class to a proper name for your plugin.
 *
 * @package Timetable
 * @author  Your Name <email@example.com>
 */
class Timetable{

	/**
	 * Plugin version, used for cache-busting of style and script file references.
	 *
	 * @since   1.0.0
	 *
	 * @const   string
	 */
	const VERSION = '1.0.0';

	/**
	 * Unique identifier for your plugin.
	 *
	 * Use this value (not the variable name) as the text domain when internationalizing strings of text. It should
	 * match the Text Domain file header in the main plugin file.
	 *
	 * @since    1.0.0
	 *
	 * @var      string
	 */
	protected $plugin_slug = 'plugin-name';

	/**
	 * Instance of this class.
	 *
	 * @since    1.0.0
	 *
	 * @var      object
	 */
	protected static $instance = null;

	/**
	 * Slug of the plugin screen.
	 *
	 * @since    1.0.0
	 *
	 * @var      string
	 */
	protected $plugin_screen_hook_suffix = null;

	/**
	 * Initialize the plugin by setting localization, filters, and administration functions.
	 *
	 * @since     1.0.0
	 */
	private function __construct() {

		// Load plugin text domain
		add_action( 'init', array( $this, 'load_plugin_textdomain' ) );

		// Define custom functionality. Read more about actions and filters: http://codex.wordpress.org/Plugin_API#Hooks.2C_Actions_and_Filters
		add_action( 'init', array( $this, 'add_post_type_timetable' ), 0 );
		add_action( 'init', array( $this, 'add_taxonomy_type' ), 0 );
		add_action( 'init', array( $this, 'add_taxonomy_contact' ), 0 );
		add_filter( 'user_contactmethods', array( $this, 'user_contactmethods' ) );

	}

	/**
	 * Return the plugin slug.
	 *
	 * @since    1.0.0
	 *
	 * @return    Plugin slug variable.
	 */
	public function get_plugin_slug() {
		return $this->plugin_slug;
	}

	/**
	 * Return an instance of this class.
	 *
	 * @since     1.0.0
	 *
	 * @return    object    A single instance of this class.
	 */
	public static function get_instance() {

		// If the single instance hasn't been set, set it now.
		if ( null == self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}

	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		$domain = $this->plugin_slug;
		$locale = apply_filters( 'plugin_locale', get_locale(), $domain );

		load_textdomain( $domain, WP_LANG_DIR . '/' . $domain . '/' . $domain . '-' . $locale . '.mo' );
		load_plugin_textdomain( $domain, FALSE, basename( dirname( __FILE__ ) ) . '/lang/' );
	}

	/**
	 * NOTE:  Actions are points in the execution of a page or process
	 *        lifecycle that WordPress fires.
	 *
	 *        WordPress Actions: http://codex.wordpress.org/Plugin_API#Actions
	 *        Action Reference:  http://codex.wordpress.org/Plugin_API/Action_Reference
	 *
	 * @since    1.0.0
	 */
	public function add_post_type_timetable() {

		$labels = apply_filters( 'timetable_post_type_labels', array(
			'name'                => _x( 'Sessions', 'Post Type General Name', 'timetable' ),
			'singular_name'       => _x( 'Session', 'Post Type Singular Name', 'timetable' ),
			'menu_name'           => __( 'Timetable', 'timetable' ),
			'parent_item_colon'   => __( 'Parent Session:', 'timetable' ),
			'all_items'           => __( 'All Sessions', 'timetable' ),
			'view_item'           => __( 'View Session', 'timetable' ),
			'add_new_item'        => __( 'Add New Session', 'timetable' ),
			'add_new'             => __( 'New Session', 'timetable' ),
			'edit_item'           => __( 'Edit Session', 'timetable' ),
			'update_item'         => __( 'Update Session', 'timetable' ),
			'search_items'        => __( 'Search sessions', 'timetable' ),
			'not_found'           => __( 'No sessions found', 'timetable' ),
			'not_found_in_trash'  => __( 'No sessions found in Trash', 'timetable' ),
		) );

		$args = apply_filters( 'timetable_post_type_args', array(
			'label'               => __( 'session', 'timetable' ),
			'description'         => __( 'Sessions', 'timetable' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'author', 'revisions' ),
			'taxonomies'          => array( 'type', 'contact' ),
			'hierarchical'        => true,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 20,
			'menu_icon'           => 'dashicons-list-view',
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'page',
		) );

		register_post_type( 'session', $args );

	}

	/**
	 * NOTE:  Actions are points in the execution of a page or process
	 *        lifecycle that WordPress fires.
	 *
	 *        WordPress Actions: http://codex.wordpress.org/Plugin_API#Actions
	 *        Action Reference:  http://codex.wordpress.org/Plugin_API/Action_Reference
	 *
	 * @since    1.0.0
	 */
	public function add_taxonomy_type() {

		$labels = apply_filters( 'type_taxonomy_labels', array(
			'name'                       => _x( 'Types', 'Taxonomy General Name', 'timetable' ),
			'singular_name'              => _x( 'Type', 'Taxonomy Singular Name', 'timetable' ),
			'menu_name'                  => __( 'Types', 'timetable' ),
			'all_items'                  => __( 'All Types', 'timetable' ),
			'parent_item'                => __( 'Parent Type', 'timetable' ),
			'parent_item_colon'          => __( 'Parent Type:', 'timetable' ),
			'new_item_name'              => __( 'New Type Name', 'timetable' ),
			'add_new_item'               => __( 'Add New Type', 'timetable' ),
			'edit_item'                  => __( 'Edit Type', 'timetable' ),
			'update_item'                => __( 'Update Type', 'timetable' ),
			'separate_items_with_commas' => __( 'Separate types with commas', 'timetable' ),
			'search_items'               => __( 'Search types', 'timetable' ),
			'add_or_remove_items'        => __( 'Add or remove types', 'timetable' ),
			'choose_from_most_used'      => __( 'Choose from the most used types', 'timetable' ),
		) );

		$args = apply_filters( 'type_taxonomy_args', array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => false,
		) );

		register_taxonomy( 'type', 'session', $args );

	}

	// Register Custom Taxonomy
	function add_taxonomy_contact()  {
	
		$labels = array(
			'name'                       => _x( 'Contacts', 'Taxonomy General Name', 'timetable' ),
			'singular_name'              => _x( 'Contact', 'Taxonomy Singular Name', 'timetable' ),
			'menu_name'                  => __( 'Contacts', 'timetable' ),
			'all_items'                  => __( 'All Contacts', 'timetable' ),
			'parent_item'                => __( 'Parent Contact', 'timetable' ),
			'parent_item_colon'          => __( 'Parent Contact:', 'timetable' ),
			'new_item_name'              => __( 'New Contact Name', 'timetable' ),
			'add_new_item'               => __( 'Add New Contact', 'timetable' ),
			'edit_item'                  => __( 'Edit Contact', 'timetable' ),
			'update_item'                => __( 'Update Contact', 'timetable' ),
			'separate_items_with_commas' => __( 'Separate contacts with commas', 'timetable' ),
			'search_items'               => __( 'Search contacts', 'timetable' ),
			'add_or_remove_items'        => __( 'Add or remove contacts', 'timetable' ),
			'choose_from_most_used'      => __( 'Choose from the most used contacts', 'timetable' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => false,
		);
		register_taxonomy( 'contact', 'session', $args );
	
	}

	/**
	 * NOTE:  Filters are points of execution in which WordPress modifies data
	 *        before saving it or sending it to the browser.
	 *
	 *        WordPress Filters: http://codex.wordpress.org/Plugin_API#Filters
	 *        Filter Reference:  http://codex.wordpress.org/Plugin_API/Filter_Reference
	 *
	 * @since    1.0.0
	 */
	public function user_contactmethods($user_contactmethods){

		$user_contactmethods['telephone'] = __( 'Telephone Number', 'timetable' );

	return $user_contactmethods;

	}

}
