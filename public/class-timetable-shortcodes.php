<?php

class Timetable_Shortcodes {

	public function __construct() {

		add_shortcode( 'timetable', array( $this, 'timetable' ) );
		// Filter video output to video post
		add_filter( 'the_content',  array( $this, 'get_single_session_output' ) );

	}

	/**
	 *  Renders the affiliate area
	 *
	 *  @since 1.0
	 *  @return string
	 */
	public function timetable( $atts, $content = null ) {

		ob_start();

		timetable_get_template_part( 'timetable' );

		return ob_get_clean();

	}

	/**
	 * Add video to Video post
	 *
	 * Add video html to flowplayer video posts
	 *
	 * @since    1.3.0
	 */
	public function get_single_session_output( $content ) {

		if ( is_singular( 'session' ) || is_post_type_archive( 'session' ) || is_tax( 'location' ) && is_main_query() ) {
			$content .= timetable_get_template_part( 'single-session' );
		}
		return $content;
	}

}

new Timetable_Shortcodes;
