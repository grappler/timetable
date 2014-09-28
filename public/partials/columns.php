<?php

$grouped_posts = timetable_get_grouped_sessions();

// split them into 7 arrays ?>
<div title="Monday" class="timetable-events-mobile-day column timetable-events-column">
	<?php foreach( $grouped_posts['monday'] as $day_post ) {
		print_session_template( $day_post );
	} ?>
</div><!-- hourly column -->

<div title="Tuesday" class="timetable-events-mobile-day column timetable-events-column">
	<?php foreach( $grouped_posts['tuesday'] as $day_post ) {
		print_session_template( $day_post );
	} ?>
</div><!-- hourly column -->

<div title="Wednesday" class="timetable-events-mobile-day column timetable-events-column">
	<?php foreach( $grouped_posts['wednesday'] as $day_post ) {
		print_session_template( $day_post );
	} ?>
</div><!-- hourly column -->

<div title="Thursday" class="timetable-events-mobile-day column timetable-events-column">
	<?php foreach( $grouped_posts['thursday'] as $day_post ) {
		print_session_template( $day_post );
	} ?>
</div><!-- hourly column -->

<div title="Friday" class="timetable-events-mobile-day column timetable-events-column">
	<?php foreach( $grouped_posts['friday'] as $day_post ) {
		print_session_template( $day_post );
	} ?>
</div><!-- hourly column -->

<div title="Saturday" class="timetable-events-mobile-day column timetable-events-column timetable-events-has-events">
	<?php foreach( $grouped_posts['saturday'] as $day_post ) {
		print_session_template( $day_post );
	} ?>
</div><!-- hourly column -->

<div title="Sunday" class="timetable-events-mobile-day column timetable-events-column">
	<?php foreach( $grouped_posts['sunday'] as $day_post ) {
		print_session_template( $day_post );
	} ?>
</div><!-- hourly column -->
