<?php
$week = timetable_get_week();

foreach( $week as $day ) { ?>
	<div title="<?php echo $day['weekday_whole']; ?>" class="column ">
		<span data-full-date="<?php echo $day['weekday_abbrev']; ?>"><?php echo $day['weekday_abbrev']; ?></span>
	</div><!-- header column -->
<?php }
