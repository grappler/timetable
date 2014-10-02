<?php
$grouped_posts = timetable_get_grouped_sessions();

// split them into 7 arrays
foreach ( $grouped_posts as $day => $day_posts ) { ?>
	<div title="<?php echo $day; ?>" class="timetable-mobile-day column timetable-column">
		<?php foreach( $grouped_posts[ $day ] as $day_post ) {
			print_session_template( $day_post );
		} ?>
	</div><!-- hourly column -->
<?php }
