<?php

class Timetable_Template {

	public function __construct() {


	}


	public function duration_percentage() {

		$session_stored_meta = get_post_meta( $post->ID );

		$session_day   = $session_stored_meta['session-day'];
		$session_start = $session_stored_meta['session-start'];
		$session_end   = $session_stored_meta['session-end'];

		$minutes_day = 1440; // 24h = 1440min

		$duration = hm_to_m( $session_end ) - hm_to_m( $session_start );

		$percentage =  100 / $minutes_day * $duration;

		echo $percentage;

	}

	public function start_percentage() {

		$session_stored_meta = get_post_meta( $post->ID );

		$session_start = $session_stored_meta['session-start'];

		$start_day   = '00:00';
		$minutes_day = 1440; // 24h = 1440min

		$duration = hm_to_m( $session_start ) - hm_to_m( $start_day );

		$percentage =  100 / $minutes_day * $duration;

		echo $percentage;

	}

	public function hm_to_m( $hmin ) {
		if ( preg_match( '/^(\d+):(\d+)$/', $hmin, $matches ) ) {
			return $matches[1] * 60 + $matches[2];
		} else {
			trigger_error( "MinSecToSeconds: Bad time format $hmin", E_USER_ERROR );
			return 0;
		}
	}


}
new Timetable_Shortcodes;
