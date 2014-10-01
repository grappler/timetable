<?php

$grouped_posts = timetable_get_grouped_sessions();
//$start_of_week = get_option( 'start_of_week' );
//wp_locale->get_weekday( $weekday_number );
//$dateweekday_abbrev = $wp_locale->get_weekday_abbrev( $weekday_number );

// split them into 7 arrays
foreach ( $grouped_posts as $day => $day_posts ) { ?>
	<div title="<?php echo $day; ?>" class="timetable-mobile-day column timetable-column">
		<?php foreach( $grouped_posts[ $day ] as $day_post ) {
			print_session_template( $day_post );
		} ?>
	</div><!-- hourly column -->
<?php }
