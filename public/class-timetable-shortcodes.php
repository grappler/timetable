<?php

class Timetable_Shortcodes {

	public function __construct() {

		add_shortcode( 'timetable', array( $this, 'timetable' ) );
	}

	/**
	 *  Renders the affiliate area
	 *
	 *  @since 1.0
	 *  @return string
	 */
	public function timetable( $atts, $content = null ) {

		timetable_get_template_part( 'timetable' );

	}

}
new Timetable_Shortcodes;
