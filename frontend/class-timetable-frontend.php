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
		//$this->plugin_version = $plugin->get_plugin_version();
		// Call $plugin_slug from public plugin class.
		//$this->plugin_slug = $plugin->get_plugin_slug();

		// Load public-facing style sheet and JavaScript.
		//add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ) );
		//add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );

		// Filter video output to video post
		//add_filter( 'the_content', array( $this, 'timetable_single_session_content' ) );
		add_shortcode( 'timetable', array( $this, 'timetable_shortcode' ) );

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

		global $post;

		$suffix  = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

		if( $cdn ) {
			$Timetable_directory = '//releases.flowplayer.org/' . $this->player_version . '/skin/';
		} else {
			$Timetable_directory = plugins_url( '/assets/flowplayer/skin/', __FILE__ );
		}

		// Register stylesheets
		if( function_exists( 'has_shortcode' ) ) {
			$post_content = isset( $post->post_content ) ? $post->post_content : '';
			$has_shortcode = '';
			if( has_shortcode( $post_content, 'flowplayer' ) || 'Timetable' == get_post_type() || is_active_widget( false, false, 'Timetable-video-widget', true ) || apply_filters( 'fp5_filter_has_shortcode', $has_shortcode ) ) {
				wp_enqueue_style( $this->plugin_slug .'-skins' , trailingslashit( $Timetable_directory ) . 'all-skins.css', array(), $this->player_version );
				wp_enqueue_style( $this->plugin_slug .'-logo-origin', plugins_url( '/assets/css/public' . $suffix . '.css', __FILE__ ), array(), $this->plugin_version );
			}
		} else {
			wp_enqueue_style( $this->plugin_slug .'-skins' , trailingslashit( $Timetable_directory ) . 'all-skins.css', array(), $this->player_version );
			wp_enqueue_style( $this->plugin_slug .'-logo-origin', plugins_url( '/assets/css/public' . $suffix . '.css', __FILE__ ), array(), $this->plugin_version );
		}

	}

	/**
	 * Register and enqueues public-facing JavaScript files.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		global $post;

		// Pull options
		$suffix  = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

		$Timetable_commercial = trailingslashit( WP_CONTENT_DIR ) . 'flowplayer-commercial/flowplayer' . $suffix . '.js';

		if( is_file( $Timetable_commercial ) && !$cdn && $key ) {
			$Timetable_directory = trailingslashit( WP_CONTENT_URL ) . 'flowplayer-commercial';
		} elseif ( !$cdn && !$key ) {
			$Timetable_directory = plugins_url( '/assets/flowplayer', __FILE__  );
		} else {
			$Timetable_directory = '//releases.flowplayer.org/' . $this->player_version . '/'. ( $key ? 'commercial' : '' );
		}

		// Register JavaScript
		if( function_exists( 'has_shortcode' ) ) {
			$post_content = isset( $post->post_content ) ? $post->post_content : '';
			$has_shortcode = '';
			if( has_shortcode( $post_content, 'flowplayer' ) || 'Timetable' == get_post_type() || is_active_widget( false, false, 'Timetable-video-widget', true ) || apply_filters( 'fp5_filter_has_shortcode', $has_shortcode ) ) {
				wp_enqueue_script( $this->plugin_slug . '-script', trailingslashit( $Timetable_directory ) . 'flowplayer' . $suffix . '.js', array( 'jquery' ), $this->player_version, false );
			}
		} else {
			wp_enqueue_script( $this->plugin_slug . '-script', trailingslashit( $Timetable_directory ) . 'flowplayer' . $suffix . '.js', array( 'jquery' ), $this->player_version, false );
		}

	}

	public function timetable_get_template_part( $slug, $name = null, $load = true ) {
		global $timetable_template_loader;
		$timetable_template_loader->get_template_part( $slug, $name, $load );
	}

	/**
	 * Add video to post
	 *
	 * Add video html to flowplayer video posts
	 *
	 * @since    1.3.0
	 */
	public function timetable_single_session_content( $content ) {
		if( is_singular( 'flowplayer5') || is_post_type_archive( 'flowplayer5') && is_main_query() ) {
			timetable_get_template_part( 'sesions', 'type' );
			timetable_get_template_part( 'sesions', 'contact' );
		}
		return $content;
	}

	public function timetable_shortcode() {

			$templates = new Timetable_Template_Loader;

			ob_start();
			$templates->get_template_part( 'timetable', 'session' );
			return ob_get_clean();

	}


}
