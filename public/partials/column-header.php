<?php
$data = timetable_get_static_data();
$week = timetable_get_week();
$number_days = count( $data['days'] );

foreach( $week as $day ) { ?>
	<div title="<?php echo $day['weekday_whole']; ?>" class="column days-<?php echo $number_days; ?>">
		<span data-full-date="<?php echo $day['weekday_abbrev']; ?>"><?php echo $day['weekday_abbrev']; ?></span>
	</div><!-- header column -->
<?php }
