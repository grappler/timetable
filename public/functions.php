<?php

// This function can live wherever is suitable in your plugin
function timetable_get_template_part( $slug, $name = null, $load = true ) {
	$timetable_template_loader = new Timetable_Template_Loader;
	return $timetable_template_loader->get_template_part( $slug, $name, $load );
}

function timetable_start_time( $id, $measurement = 'minutes' ) {
	$timetable_template = new Timetable_Template;
	return $timetable_template->start_time( $id, $measurement );
}

function timetable_start_percentage( $id, $measurement = 'minutes' ) {
	$timetable_template = new Timetable_Template;
	return $timetable_template->start_percentage( $id, $measurement );
}

function timetable_duration_time( $id, $measurement = 'minutes' ) {
	$timetable_template = new Timetable_Template;
	return $timetable_template->duration_time( $id, $measurement );
}

function timetable_duration_percentage( $id, $measurement = 'minutes' ) {
	$timetable_template = new Timetable_Template;
	return $timetable_template->duration_percentage( $id, $measurement );
}

function timetable_get_grouped_sessions() {

	// WP_Query arguments
	$args = array (
		'post_type'      => 'session',
		'post_status'    => 'publish',
		'posts_per_page' => -1,
		'meta_key'       => 'session-start',
		'orderby'        => 'meta_value_num',
		'order'          => 'ASC'
	);

	// The Query
	$sessions = get_posts( $args );

	// The Loop
	if ( ! empty( $sessions ) ) {

		$week = timetable_get_week();

		foreach ( $week as $key => $value ) {
			$grouped_posts[ $key ] = array();
		}

		foreach ( $sessions as $session_post ) {

			$session_day = get_post_meta( $session_post->ID, 'session-day', true );

			foreach( $week as $key => $value ) {
				if ( $value['weekday_number'] == $session_day) {
					$grouped_posts[ $key ][] = $session_post;
				}
			}

		}
	} else {
		return;
	}

	return $grouped_posts;

}

function timetable_print_session_template( $id ) {
	$data                 = timetable_get_static_data();
	$custom_fields        = get_post_custom( $id );
	$duration_time        = timetable_duration_time( $id );
	$start_time           = timetable_start_time( $id );
	$timetable_start_time = timetable_start_time( $id, 'seconds' ) + $data['time']['lower'];
	$timetable_end_time   = timetable_start_time( $id, 'seconds' ) + timetable_duration_time( $id, 'seconds' ) + $data['time']['lower'];
	if ( $data['time']['lower'] >= $timetable_start_time || $data['time']['upper'] <= $timetable_end_time ) {
		return;
	} ?>
	<div id="timetable-events-event-<?php echo $id; ?>" data-day="<?php echo $custom_fields[ 'session-day' ][0]; ?>" data-duration="<?php echo $duration_time; ?>" data-time="<?php echo $duration_time; ?>" class='timetable-clearfix timetable-week-event' style="display: block; height: <?php echo $duration_time; ?>px; top: <?php echo $start_time; ?>px;">
		<div class="hentry vevent">
			<h3 class="entry-title summary">
				<a href="<?php echo get_permalink( $id ); ?>"><?php echo get_the_title( $id ); ?></a>
			</h3>
			<span>
				<?php echo $custom_fields['session-start'][0]; ?> - <?php echo $custom_fields['session-end'][0]; ?>
				<?php echo get_the_term_list( $id, 'location' ); ?>
			</span>
		</div>
	</div>
	<?php
}
