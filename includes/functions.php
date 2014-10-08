<?php

function timetable_get_week(){

	global $wp_locale;

	// week_begins = 0 stands for Sunday
	$week_begins = intval( get_option( 'start_of_week' ) );
	$week_days = array();

	for ( $weekday_count = 0; $weekday_count <= 6; $weekday_count++ ) {

		$weekday_number = ( $weekday_count + $week_begins ) %7;
		$weekday_whole = $wp_locale->get_weekday( $weekday_number );
		$weekday_initial = $wp_locale->get_weekday_initial( $weekday_whole );
		$weekday_abbrev = $wp_locale->get_weekday_abbrev( $weekday_whole );

		// have only keys
		$weekday[ 'weekday_number' ]  = intval( $weekday_number );
		$weekday[ 'weekday_whole' ]   = esc_attr( $weekday_whole );
		$weekday[ 'weekday_initial' ] = esc_attr( $weekday_initial );
		$weekday[ 'weekday_abbrev' ]  = esc_attr( $weekday_abbrev );

		$week_days[ strtolower( $weekday_whole ) ] = $weekday;
	}

	return $week_days;

}

function timetable_get_day_times( $lower = 0, $upper = 86400, $step = 3600, $format = '' ) {
	$times = array();

	if ( empty( $format ) ) {
		$format = 'g:i a';
	}

	foreach ( range( $lower, $upper, $step ) as $increment ) {
		$increment = gmdate( 'H:i', $increment );

		list( $hour, $minutes ) = explode( ':', $increment );

		$date = new DateTime( $hour . ':' . $minutes );

		$times[(string) $increment] = $date->format( $format );
	}

	return $times;
}
