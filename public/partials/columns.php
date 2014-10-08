<?php
$data = timetable_get_static_data();
$grouped_posts = timetable_get_grouped_sessions();
$number_minutes = $data['time']['minutes'];
$number_days = '6';

// split them into 7 arrays
foreach ( $grouped_posts as $day => $day_posts ) {
?>
	<div class="timetable-mobile-day column timetable-column <?php echo $number_minutes; ?>-minutes <?php echo $number_minutes; ?>-days" style="height:<?php echo $number_minutes; ?>px;">
		<?php foreach( $grouped_posts[ $day ] as $day_post ) {
			print_session_template( $day_post );
		} ?>
	</div><!-- hourly column -->
<?php }
