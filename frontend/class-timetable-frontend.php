<?php
/**
 * Flowplayer 5 for WordPress
 *
 * @package   Timetable_Frontend
 * @author    Ulrich Pogson <ulrich@pogson.ch>
 * @license   GPL-2.0+
 * @link      http://flowplayer.org/
 * @copyright 2013 Flowplayer Ltd
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Initial Flowplayer Frontend class
 *
 * @package Timetable_Frontend
 * @author  Ulrich Pogson <ulrich@pogson.ch>
 *
 * @since 1.0.0
 */
class Timetable_Frontend {

	/**
	 * Instance of this class.
	 *
	 * @since    1.0.0
	 *
	 * @var      object
	 */
	protected static $instance = null;

	/**
	 * Initialize the plugin by setting localization, filters, and administration functions.
	 *
	 * @since    1.0.0
	 */
	private function __construct() {

		$plugin = Timetable::get_instance();
		// Call $plugin_version from public plugin class.
		$this->plugin_version = Timetable::VERSION;
		// Call $plugin_slug from public plugin class.
		$this->plugin_slug = $plugin->get_plugin_slug();

		// Load public-facing style sheet and JavaScript.
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ) );
		//add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );

		// Filter video output to video post
		add_filter( 'the_content', array( $this, 'single_session_content' ) );
		add_filter( 'template_include', array( $this, 'template_include' ) );

	}

	/**
	 * Return an instance of this class.
	 *
	 * @since    1.0.0
	 *
	 * @return   object    A single instance of this class.
	 */
	public static function get_instance() {

		// If the single instance hasn't been set, set it now.
		if ( null == self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;

	}

	/**
	 * Register and enqueue public-facing style sheet.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		$suffix  = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

		// Register stylesheets
		//if( 'session' == get_post_type() ) {
			wp_enqueue_style( $this->plugin_slug , plugins_url( '/assets/css/timetable.css', __FILE__ ), array(), $this->plugin_version );
		//}

	}

	/**
	 * Register and enqueues public-facing JavaScript files.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		// Pull options
		$suffix  = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

		// Register JavaScript
		//if( 'session' == get_post_type() ) {
			wp_enqueue_script( $this->plugin_slug . '-script', plugins_url( '/assets/js/', __FILE__ ) . 'flowplayer' . $suffix . '.js', array( 'jquery' ), $this->plugin_version, false );
		//}

	}

	public function timetable_get_template_part( $slug, $name = null, $load = true ) {
		$timetable_template_loader = new Timetable_Template_Loader;
		$timetable_template_loader->get_template_part( $slug, $name, $load );
	}

	/**
	 * Add video to post
	 *
	 * Add video html to flowplayer video posts
	 *
	 * @since    1.3.0
	 */
	public function single_session_content( $content ) {
		if( is_singular( 'session') && is_main_query() ) {
			$this->timetable_get_template_part( 'timetable', 'session' );
		} elseif( is_post_type_archive( 'session') && is_main_query() ) {
			$this->timetable_get_template_part( 'archive', 'session' );
		} else {
			return $content;
		}
	}

	/**
	 * Apply a template to all subcategories of a certain parent category.
	 *
	 * @author Jared Atchison
	 * @link http://www.jaredatchison.com/2011/10/02/taking-advantage-of-the-template_include-filter/
	 *
	 * @param  string $template Existing path to template file
	 * @return string           Potentially amended path to template file
	 */
	public function template_include( $template ) {

		if( is_post_type_archive( 'session') && is_main_query() ) {
			$this->timetable_get_template_part( 'archive', 'session' );
		} else {
			return $template;
		}

	}

}
