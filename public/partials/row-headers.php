<?php
$data = timetable_get_static_data();
$time_row = timetable_get_day_times( $data['time']['lower'], $data['time']['upper'] - 60, $data['time']['step'], $data['time']['format'] );

foreach ( $time_row as $time => $formated_time ) { ?>
	<div class="time-row time-row-<?php echo $time; ?>"><?php echo $formated_time; ?></div>
<?php }
