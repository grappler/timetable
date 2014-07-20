<?php
/**
 * Week View Template
 * The wrapper template for week view.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/week.php
 *
 * @package TribeEventsCalendar
 * @since  3.0
 * @author Modern Tribe Inc.
 *
 */

if ( !defined('ABSPATH') ) { die('-1'); } ?>

<?php do_action( 'timetable_before_template' ) ?>

<!-- Tribe Bar -->
<?php timetable_get_template_part( 'public/partials/bar' ); ?>

<!-- Main Events Content -->
<?php timetable_get_template_part( 'public/partials/content' ) ?>

<?php do_action( 'timetable_after_template' ) ?>

<?php

// WP_Query arguments
$args = array (
	'post_type'              => 'session',
	'orderby'                => 'meta_value_num',
	'meta_key' => array(
		array(
			'key' => 'session-day',
			'type' => 'NUMERIC',
		),
		array(
			'key' => 'session-start',
			'type' => 'TIME',
		),
	)
);

// The Query
$query = new WP_Query( $args );

// The Loop
if ( $query->have_posts() ) {
	while ( $query->have_posts() ) {
		$query->the_post();
		// do something
	}
} else {
	// no posts found
}

// Restore original Post Data
wp_reset_postdata();
