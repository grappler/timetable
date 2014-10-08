<?php
$time_row = timetable_get_day_times();

// split them into 7 arrays
foreach ( $time_row as $time => $formated_time ) { ?>
	<div class="time-row time-row-<?php echo $time; ?>"><?php echo $formated_time; ?></div>
<?php }
