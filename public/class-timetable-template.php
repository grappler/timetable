<?php

class Timetable_Template {

	public function __construct() {


	}


	public function duration_time( $id ) {

		$session_stored_meta = get_post_meta( $id );

		$session_day   = $session_stored_meta['session-day'][0];
		$session_start = $session_stored_meta['session-start'][0];
		$session_end   = $session_stored_meta['session-end'][0];

		$minutes_day = 1440; // 24h = 1440min

		$duration = $this->hm_to_m( $session_end ) - $this->hm_to_m( $session_start );

		echo $duration;

	}


	public function start_time( $id ) {

		$session_stored_meta = get_post_meta( $id );
		$data = timetable_get_static_data();

		$session_start = $session_stored_meta['session-start'][0];

		$start_day   = $data['time']['lower'];
		$minutes_day = $data['time']['minutes']; // 24h = 1440min

		$duration = $this->hm_to_m( $session_start ) - ( $start_day / 60 );

		echo $duration;

	}

	public function duration_percentage( $id ) {

		$session_stored_meta = get_post_meta( $id );

		$session_day   = $session_stored_meta['session-day'][0];
		$session_start = $session_stored_meta['session-start'][0];
		$session_end   = $session_stored_meta['session-end'][0];

		$minutes_day = 1440; // 24h = 1440min

		$duration = $this->hm_to_m( $session_end ) - $this->hm_to_m( $session_start );

		$percentage =  100 / $minutes_day * $duration;

		echo $percentage;

	}

	public function start_percentage( $id ) {

		$session_stored_meta = get_post_meta( $id );

		$session_start = $session_stored_meta['session-start'][0];

		$start_day   = '00:00';
		$minutes_day = 1440; // 24h = 1440min

		$duration = $this->hm_to_m( $session_start ) - $this->hm_to_m( $start_day );

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
