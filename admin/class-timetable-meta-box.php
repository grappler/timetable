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
	 * Short description. (use period)
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      type    $var    Description.
	 */
	private $version;

	/**
	 * Short description. (use period)
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      type    $var    Description.
	 */
	public function __construct( $version ) {
		$this->version = $version;
	}

	/**
	 * Registers the meta box for displaying the 'Flowplayer Video' in the post editor.
	 *
	 * @since      1.0.0
	 */
	public function add_session_meta_box() {

		add_meta_box(
			'session_details',
			__( 'Day & Time', 'timetable' ),
			array( $this, 'display_session_meta_box' ),
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
	public function display_session_meta_box( $post ) {

		wp_nonce_field( plugin_basename( __FILE__ ), 'timetable-nonce' );
		$session_stored_meta = get_post_meta( $post->ID );

		include_once( plugin_dir_path( __FILE__ ) . 'partials/session-meta-box-display.php' );

	}

	/**
	 * When the post is saved or updated, generates a short URL to the existing post.
	 *
	 * @param    int     $post_id    The ID of the post being save
	 * @since    1.0.0
	 */
	public function save_session_details( $post_id ) {

		if ( $this->user_can_save( $post_id, 'timetable-nonce' ) ) {

			// Checks for input and saves
			if( isset( $_POST[ 'session-day' ] ) ) {
				update_post_meta(
					$post_id,
					'session-day',
					$_POST[ 'session-day' ]
				);
			}

			// Checks for input and saves if needed
			if( isset( $_POST[ 'session-start' ] ) ) {
				update_post_meta(
					$post_id,
					'session-start',
					date('H:i', strtotime( $_POST[ 'session-start' ] ) )
				);
			}

			// Checks for input and saves if needed
			if( isset( $_POST[ 'session-end' ] ) ) {
				update_post_meta(
					$post_id,
					'session-end',
					date('H:i', strtotime( $_POST[ 'session-end' ] ) )
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
