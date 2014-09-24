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
	'post_type' => 'session',
	'orderby'   => 'meta_value_num',
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
?>
<div class="tribe-events-grid hfeed vcalendar clearfix">
	<div class="tribe-grid-header clearfix">
		<div class="column first">
			<span class="tribe-events-visuallyhidden">Hours</span>
		</div>

		<div class="tribe-grid-content-wrap">
			<div class="column">
				<span>Mon</span>
			</div><!-- header column -->

			<div class="column">
				<span>Tue</span>
			</div><!-- header column -->

			<div class="column">
				<span>Wed</span>
			</div><!-- header column -->

			<div class="column">
				<span>Thu</span>
			</div><!-- header column -->

			<div class="column">
				<span>Fri</span>
			</div><!-- header column -->

			<div class="column">
				<span>Sat</span>
			</div><!-- header column -->

			<div class="column">
				<span>Sun</span>
			</div><!-- header column -->
		</div><!-- .tribe-grid-content-wrap -->
	</div><!-- .tribe-grid-header -->

	<div class="tribe-week-grid-wrapper">
		<div class="tribe-week-grid-outer-wrap tribe-clearfix">
			<div class="tribe-week-grid-inner-wrap">
				<div class="tribe-week-grid-block" data-hour="0"></div>

				<div class="tribe-week-grid-block" data-hour="1"></div>

				<div class="tribe-week-grid-block" data-hour="2"></div>

				<div class="tribe-week-grid-block" data-hour="3"></div>

				<div class="tribe-week-grid-block" data-hour="4"></div>

				<div class="tribe-week-grid-block" data-hour="5"></div>

				<div class="tribe-week-grid-block" data-hour="6"></div>

				<div class="tribe-week-grid-block" data-hour="7"></div>

				<div class="tribe-week-grid-block" data-hour="8"></div>

				<div class="tribe-week-grid-block" data-hour="9"></div>

				<div class="tribe-week-grid-block" data-hour="10"></div>

				<div class="tribe-week-grid-block" data-hour="11"></div>

				<div class="tribe-week-grid-block" data-hour="12"></div>

				<div class="tribe-week-grid-block" data-hour="13"></div>

				<div class="tribe-week-grid-block" data-hour="14"></div>

				<div class="tribe-week-grid-block" data-hour="15"></div>

				<div class="tribe-week-grid-block" data-hour="16"></div>

				<div class="tribe-week-grid-block" data-hour="17"></div>

				<div class="tribe-week-grid-block" data-hour="18"></div>

				<div class="tribe-week-grid-block" data-hour="19"></div>

				<div class="tribe-week-grid-block" data-hour="20"></div>

				<div class="tribe-week-grid-block" data-hour="21"></div>

				<div class="tribe-week-grid-block" data-hour="22"></div>

				<div class="tribe-week-grid-block" data-hour="23"></div>
			</div><!-- .tribe-week-grid-inner-wrap -->
		</div><!-- .tribe-week-grid-outer-wrap -->
		<!-- Days of the week & hours & events -->

		<div class="tribe-grid-body clearfix">
			<div class="column tribe-week-grid-hours">
				<div class="time-row-12AM">
					12:00 am
				</div>

				<div class="time-row-1AM">
					1:00 am
				</div>

				<div class="time-row-2AM">
					2:00 am
				</div>

				<div class="time-row-3AM">
					3:00 am
				</div>

				<div class="time-row-4AM">
					4:00 am
				</div>

				<div class="time-row-5AM">
					5:00 am
				</div>

				<div class="time-row-6AM">
					6:00 am
				</div>

				<div class="time-row-7AM">
					7:00 am
				</div>

				<div class="time-row-8AM">
					8:00 am
				</div>

				<div class="time-row-9AM">
					9:00 am
				</div>

				<div class="time-row-10AM">
					10:00 am
				</div>

				<div class="time-row-11AM">
					11:00 am
				</div>

				<div class="time-row-12PM">
					12:00 pm
				</div>

				<div class="time-row-1PM">
					1:00 pm
				</div>

				<div class="time-row-2PM">
					2:00 pm
				</div>

				<div class="time-row-3PM">
					3:00 pm
				</div>

				<div class="time-row-4PM">
					4:00 pm
				</div>

				<div class="time-row-5PM">
					5:00 pm
				</div>

				<div class="time-row-6PM">
					6:00 pm
				</div>

				<div class="time-row-7PM">
					7:00 pm
				</div>

				<div class="time-row-8PM">
					8:00 pm
				</div>

				<div class="time-row-9PM">
					9:00 pm
				</div>

				<div class="time-row-10PM">
					10:00 pm
				</div>

				<div class="time-row-11PM">
					11:00 pm
				</div>
			</div><!-- tribe-week-grid-hours -->

			<div class="tribe-grid-content-wrap">
				<div class="tribe-events-mobile-day column"></div><!-- hourly column -->

				<div class="tribe-events-mobile-day column"></div><!-- hourly column -->

				<div class="tribe-events-mobile-day column"></div><!-- hourly column -->

				<div class="tribe-events-mobile-day column"></div><!-- hourly column -->

				<div class="tribe-events-mobile-day column"></div><!-- hourly column -->

				<div class="tribe-events-mobile-day column tribe-events-has-events hentry vevent type-tribe_events post-1856 tribe-clearfix" data-duration="535" data-hour="8" data-min="20" id='tribe-events-event-1856'>
					<h3 class="entry-title summary"><a class="url" href="http://grapplerulrich.tk/event/test/" rel="bookmark">Test</a></h3>
				</div><!-- hourly column -->
			</div><!-- .tribe-grid-content-wrap -->
		</div><!-- .tribe-grid-body -->
	</div><!-- .tribe-week-grid-wrapper -->
</div><!-- .tribe-events-grid -->
