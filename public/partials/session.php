<?php
// WP_Query arguments
$args = array (
	'post_type'              => 'session',
	'post_status'            => 'publish'
);


// The Query
$query = new WP_Query( $args );

// The Loop
if ( $query->have_posts() ) {
	while ( $query->have_posts() ) {
		$query->the_post();
		$custom_fields  = get_post_custom( $post->ID );
		$diff = $custom_fields[ 'session-end' ][0] - $custom_fields[ 'session-start' ][0];
		?>
		<div id='tribe-events-event-1856' data-day="<?php echo $custom_fields[ 'session-day' ][0]; ?>" data-duration="<?php echo timetable_duration_time( $post->ID ); ?>" data-time="<?php echo timetable_duration_time( $post->ID ); ?>" class='type-tribe_events tribe-clearfix tribe-dayspan1 tribe-event-overlap tribe-week-event' style="display: block; height: <?php echo timetable_duration_time( $post->ID ); ?>px; top: <?php echo timetable_start_time( $post->ID ); ?>px;">
			<div class="hentry vevent">
				<h3 class="entry-title summary"><a href=""><?php the_title( ); ?></a></h3>
					<?php echo $custom_fields[ 'session-day' ][0]; ?>
					<?php echo $custom_fields[ 'session-start' ][0]; ?>
					<?php echo $custom_fields[ 'session-end' ][0]; ?>
					<?php echo timetable_duration_percentage( $post->ID ); ?>
					<?php echo timetable_start_percentage( $post->ID ); ?>
					<?php echo get_the_term_list( $post->ID, 'location' ); ?>
			</div>
		</div>
		<?php
	}
} else {
	// no posts found
}

// Restore original Post Data
wp_reset_postdata();