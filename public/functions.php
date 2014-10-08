<?php

// This function can live wherever is suitable in your plugin
function timetable_get_template_part( $slug, $name = null, $load = true ) {
	$timetable_template_loader = new Timetable_Template_Loader;
	$timetable_template_loader->get_template_part( $slug, $name, $load );
}

function timetable_duration_time( $id ) {
	$timetable_template = new Timetable_Template;
	$timetable_template->duration_time( $id );
}

function timetable_start_time( $id ) {
	$timetable_template = new Timetable_Template;
	$timetable_template->start_time( $id );
}

function timetable_duration_percentage( $id ) {
	$timetable_template = new Timetable_Template;
	$timetable_template->duration_percentage( $id );
}

function timetable_start_percentage( $id ) {
	$timetable_template = new Timetable_Template;
	$timetable_template->start_percentage( $id );
}


function timetable_get_grouped_sessions() {

	// WP_Query arguments
	$args = array (
		'post_type'      => 'session',
		'post_status'    => 'publish',
		'posts_per_page' => -1,
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
		// no posts found
	}

	//var_dump( $grouped_posts );

	return $grouped_posts;

	// Restore original Post Data
	// wp_reset_postdata();
}

function seconds_from_time( $time ) {
	list( $h, $m ) = explode(':', $time);
	return ($h * 3600) + ($m * 60);
}

function print_session_template( $session_post ) {
	$custom_fields = get_post_custom( $session_post->ID );
	$data = timetable_get_static_data();
	$session_start = seconds_from_time( $custom_fields['session-start'][0] );
	$session_end = seconds_from_time( $custom_fields['session-end'][0] );
	if ( ( $data['time']['lower'] - 1 ) > $session_start || ( $data['time']['upper'] + 1 ) < $session_end ) {
		return;
	}
	?>
	<div id="timetable-events-event-<?php echo $session_post->ID; ?>" data-day="<?php echo $custom_fields[ 'session-day' ][0]; ?>" data-duration="<?php echo timetable_duration_time( $session_post->ID ); ?>" data-time="<?php echo timetable_duration_time( $session_post->ID ); ?>" class='type-timetable_events timetable-clearfix timetable-event-overlap timetable-week-event' style="display: block; height: <?php echo timetable_duration_time( $session_post->ID ); ?>px; top: <?php echo timetable_start_time( $session_post->ID ); ?>px;">
	<div class="hentry vevent">
		<h3 class="entry-title summary"><a href=""><?php echo get_the_title( $session_post->ID ); ?></a></h3>
		<span>
			<?php //echo $custom_fields[ 'session-day' ][0];
			?>
			<?php echo $custom_fields['session-start'][0]; ?> - <?php echo $custom_fields['session-end'][0]; ?>
			<?php //echo timetable_duration_percentage( $session_post->ID );
			?>
			<?php //echo timetable_start_percentage( $session_post->ID );
			?>
			<?php echo get_the_term_list( $session_post->ID, 'location' ); ?>
		</span>
	</div>
</div>

	<?php
}
