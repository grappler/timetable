<?php
/**
 * Week View Grid Loop
 * This file sets up the structure for the week view grid loop
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/week/loop-grid.php
 *
 * @package TribeEventsCalendar
 * @since  3.0
 * @author Modern Tribe Inc.
 *
 */

if ( !defined('ABSPATH') ) { die('-1'); } ?>

<div class="tribe-events-grid hfeed vcalendar clearfix">
	<div class="tribe-grid-header clearfix">
		<div class="column first">
			<span class="tribe-events-visuallyhidden"><?php _e( 'Hours', 'timetable' ); ?></span>
		</div>
		<div class="tribe-grid-content-wrap">
			<?php while ( tribe_events_week_have_days() ) : tribe_events_week_the_day(); ?>
			<div title="<?php timetable_get_the_day(); ?>" class="column">
				<a href="<?php echo timetable_get_day_link(); ?>" rel="bookmark"><?php tribe_events_week_get_the_day_display(); ?></a>
			</div><!-- header column -->
			<?php endwhile; ?>
		</div><!-- .tribe-grid-content-wrap -->
	</div><!-- .tribe-grid-header -->
	<?php timetable_get_template_part( 'public/partials/loop', 'grid-hourly' ); ?>
</div><!-- .tribe-events-grid -->