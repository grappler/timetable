<?php
$data = timetable_get_static_data();
$time_row = timetable_get_day_times( $data['time']['lower'], $data['time']['upper'] - 60, $data['time']['step'], $data['time']['format'] );

// split them into 7 arrays
foreach ( $time_row as $time => $formated_time ) { ?>
	<div class="timetable-week-grid-block" data-hour="<?php echo $time; ?>">
		<div></div>
	</div>
<?php }
