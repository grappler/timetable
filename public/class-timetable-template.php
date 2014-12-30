<?php

class Timetable_Template {

//	public $minutes_day = 1440; // 24h = 1440 min
//	public $seconds_day = 86400; // 24h = 1440 min = 86400 sec

	public function __construct() {

	}


	public function duration_time( $id, $measurement = 'minutes' ) {

		$session_stored_meta = get_post_meta( $id );

		$session_day   = $session_stored_meta['session-day'][0];
		$session_start = $session_stored_meta['session-start'][0];
		$session_end   = $session_stored_meta['session-end'][0];


		if ( 'minutes' === $measurement ) {
			$duration = $this->time_to_minutes( $session_end ) - $this->time_to_minutes( $session_start );
		} elseif ( 'seconds' === $measurement ) {
			$duration = $this->time_to_seconds( $session_end ) - $this->time_to_seconds( $session_start );
		}

		return $duration;

	}


	public function start_time( $id, $measurement = 'minutes' ) {

		$session_stored_meta = get_post_meta( $id );
		$data = timetable_get_static_data();

		$session_start = $session_stored_meta['session-start'][0];

		$start_day   = $data['time']['lower'];

		if ( 'minutes' === $measurement ) {
			$duration = $this->time_to_minutes( $session_start ) - ( $start_day / 60 );
		} elseif ( 'seconds' === $measurement ) {
			$duration = $this->time_to_seconds( $session_start ) - ( $start_day );
		}

		return $duration;

	}

	public function duration_percentage( $id, $measurement = 'minutes' ) {

		$duration = $this->duration_time( $id, $measurement );
		$data = timetable_get_static_data();
		$minutes_day = $data['time']['minutes']; // 24h = 1440min
		$seconds_day = $data['time']['seconds']; // 24h = 1440 min = 86400 sec

		if ( 'minutes' === $measurement ) {
			$percentage =  100 / $this->minutes_day * $duration;
		} elseif ( 'seconds' === $measurement ) {
			$percentage =  100 / $this->seconds_day * $duration;
		}

		return $percentage;

	}

	public function start_percentage( $id, $measurement = 'minutes' ) {

		$duration = $this->start_time( $id, $measurement );
		$data = timetable_get_static_data();
		$minutes_day = $data['time']['minutes']; // 24h = 1440min
		$seconds_day = $data['time']['seconds']; // 24h = 1440 min = 86400 sec

		if ( 'minutes' === $measurement ) {
			$percentage =  100 / $this->minutes_day * $duration;
		} elseif ( 'seconds' === $measurement ) {
			$percentage =  100 / $this->seconds_day * $duration;
		}

		return $percentage;

	}

	public function time_to_minutes( $time ) {
		list( $h, $m ) = explode( ':', $time );
		$minutes = ( $h * 60 ) + ( $m );
		return $minutes;
	}

	public function time_to_seconds( $time ) {
		list( $h, $m ) = explode( ':', $time );
		$seconds = ( $h * 3600 ) + ( $m * 60 );
		return $seconds;
	}


}
