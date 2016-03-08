<?php
$data = timetable_get_static_data();
$grouped_posts = timetable_get_grouped_sessions();
$number_minutes = $data['time']['minutes'];
$number_days = count( $data['days'] );

if ( ! is_array( $grouped_posts ) ) {
	return;
}
// split them into 7 arrays
foreach ( $grouped_posts as $day => $day_posts ) {
?>
	<div class="timetable-mobile-day column timetable-column minutes-<?php echo $number_minutes; ?> days-<?php echo $number_days; ?>">
		<?php foreach( $grouped_posts[ $day ] as $day_post ) {
			timetable_print_session_template( $day_post->ID );
		} ?>
	</div><!-- hourly column -->
<?php }
