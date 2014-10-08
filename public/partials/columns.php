<?php
$data = timetable_get_static_data();
$grouped_posts = timetable_get_grouped_sessions();
$number_minutes = $data['time']['minutes'];
$number_days = count( $data['days'] );

// split them into 7 arrays
foreach ( $grouped_posts as $day => $day_posts ) {
?>
	<div class="timetable-mobile-day column timetable-column minutes-<?php echo $number_minutes; ?> days-<?php echo $number_days; ?>">
		<?php foreach( $grouped_posts[ $day ] as $day_post ) {
			print_session_template( $day_post );
		} ?>
	</div><!-- hourly column -->
<?php }
