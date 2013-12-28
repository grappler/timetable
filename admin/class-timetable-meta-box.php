<?php
/**
 * Meta boxes for custom post type
 *
 * @package   Flowplayer 5 for WordPress
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
 * Video Meta box class.
 *
 * @package Timetable
 * @author  Ulrich Pogson <ulrich@pogson.ch>
 */
class Timetable_Meta_Box {

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
	protected $plugin_slug;

	/**
	 * Instance of this class.
	 *
	 * @since    1.0.0
	 *
	 * @var      object
	 */
	protected static $instance = null;

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
	 * Initializes the plugin by setting localization, filters, and administration functions.
	 *
	 * @since     1.0.0
	 */
	public function __construct() {

		$Timetable = Timetable::get_instance();
		$this->plugin_slug = $Timetable->get_plugin_slug();

		// Setup the meta boxes for the video and shortcode
		add_action( 'add_meta_boxes', array( $this, 'add_session_meta_box' ) );

		// Setup the function responsible for saving
		add_action( 'save_post', array( $this, 'save_session_details' ) );

	}

	/**
	 * Registers the meta box for displaying the 'Flowplayer Video' in the post editor.
	 *
	 * @since      1.0.0
	 */
	public function add_session_meta_box() {

		add_meta_box(
			'session_details',
			__( 'Day & Time', $this->plugin_slug ),
			array( $this, 'display_video_meta_box' ),
			'session',
			'side',
			'default'
		);

	}

	/**
	 * Displays the meta box for displaying the 'Flowplayer Video'
	 *
	 * @since      1.0.0
	 */
	public function display_video_meta_box( $post ) {

		wp_nonce_field( plugin_basename( __FILE__ ), 'fp5-nonce' );
		$fp5_stored_meta = get_post_meta( $post->ID );

		include_once( plugin_dir_path( __FILE__ ) . 'views/display-meta-box.php' );

	}

	/**
	 * When the post is saved or updated, generates a short URL to the existing post.
	 *
	 * @param    int     $post_id    The ID of the post being save
	 * @since    1.0.0
	 */
	public function save_session_details( $post_id ) {

		if ( $this->user_can_save( $post_id, 'fp5-nonce' ) ) {

			// Checks for input and saves
			if( isset( $_POST[ 'timetable-day' ] ) ) {
				update_post_meta(
					$post_id,
					'timetable-day',
					$_POST[ 'timetable-day' ]
				);
			}

			// Checks for input and saves if needed
			if( isset( $_POST[ 'timetable-start' ] ) ) {
				update_post_meta(
					$post_id,
					'timetable-start',
					$_POST[ 'timetable-start' ]
				);
			}

			// Checks for input and saves if needed
			if( isset( $_POST[ 'timetable-end' ] ) ) {
				update_post_meta(
					$post_id,
					'timetable-end',
					$_POST[ 'timetable-end' ]
				);
			}

		}

	}

	/**
	 * Determines whether or not the current user has the ability to save meta data associated with this post.
	 *
	 * @param    int     $post_id    The ID of the post being save
	 * @param    string  $nonce      The nonce identifier associated with the value being saved
	 * @return   bool                Whether or not the user has the ability to save this post.
	 * @since    1.0.0
	 */
	private function user_can_save( $post_id, $nonce ) {

		$is_autosave = wp_is_post_autosave( $post_id );
		$is_revision = wp_is_post_revision( $post_id );
		$is_valid_nonce = ( isset( $_POST[ $nonce ] ) && wp_verify_nonce( $_POST[ $nonce ], plugin_basename( __FILE__ ) ) ) ? true : false;

		// Return true if the user is able to save; otherwise, false.
		return ! ( $is_autosave || $is_revision) && $is_valid_nonce;

	}

}