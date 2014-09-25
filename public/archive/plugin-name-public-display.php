<?php

/**
 * Define a short description for what this file does (no period)
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/public/partials
 * @author     Your Name <email@example.com>
 * @license    GPL-2.0+
 * @link       http://example.com
 * @copyright  2014 Your Name or Company Name
 * @since      1.0.0
 */

/**
 * Define a short description for what this file does.
 *
 * Define a longer description for the purpose of this file.
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/public/partials
 * @author     Your Name <email@example.com>
 */
?>

<!-- This file is used to markup the public-facing aspects of the plugin. -->

tribe-events-grid
	tribe-grid-header
		column-first
		tribe-grid-content-wrap (column headers)
	tribe-week-grid-wrapper
		tribe-week-grid-outer-wrap
			tribe-week-grid-inner-wrap
				tribe-week-grid-block (rows/blocks)
		tribe-grid-body
			tribe-week-grid-hours (row headers)
			tribe-grid-content-wrap (columns)
				tribe-events-column (column)
					tribe-week-event (single session)

<div class="tribe-events-grid clearfix">

<div class="tribe-grid-header clearfix">
	<div class="column first">
		<span class="tribe-events-visuallyhidden">Hours</span>
	</div>
	<div class="tribe-grid-content-wrap">
		<div title="Monday" class="column ">
			<a href=""><span data-full-date="Mon">Mon</span></a>
		</div><!-- header column -->
		<div title="Tuesday" class="column ">
			<a href=""><span data-full-date="Tue">Tue</span></a>
		</div><!-- header column -->
		<div title="Wednesday" class="column ">
			<a href=""><span data-full-date="Wed">Wed</span></a>
		</div><!-- header column -->
		<div title="Thursday" class="column ">
			<a href=""><span data-full-date="Thu">Thu</span></a>
		</div><!-- header column -->
		<div title="Friday" class="column ">
			<a href=""><span data-full-date="Fri">Fri</span></a>
		</div><!-- header column -->
		<div title="Saturday" class="column ">
			<a href=""><span data-full-date="Sat">Sat</span></a>
		</div><!-- header column -->
		<div title="Sunday" class="column ">
			<a href=""><span data-full-date="Sun">Sun</span></a>
		</div><!-- column -->
	</div><!-- .tribe-grid-content-wrap -->
</div><!-- .tribe-grid-header -->

<div class="tribe-week-grid-wrapper">

	<div class="tribe-week-grid-outer-wrap tribe-clearfix">
		<div class="tribe-week-grid-inner-wrap">
			<div class="tribe-week-grid-block" data-hour="0">
				<div></div>
			</div>
			<div class="tribe-week-grid-block" data-hour="1">
				<div></div>
			</div>
			<div class="tribe-week-grid-block" data-hour="2">
				<div></div>
			</div>
			<div class="tribe-week-grid-block" data-hour="3">
				<div></div>
			</div>
			<div class="tribe-week-grid-block" data-hour="4">
				<div></div>
			</div>
			<div class="tribe-week-grid-block" data-hour="5">
				<div></div>
			</div>
			<div class="tribe-week-grid-block" data-hour="6">
				<div></div>
			</div>
			<div class="tribe-week-grid-block" data-hour="7">
				<div></div>
			</div>
			<div class="tribe-week-grid-block" data-hour="8">
				<div></div>
			</div>
			<div class="tribe-week-grid-block" data-hour="9">
				<div></div>
			</div>
			<div class="tribe-week-grid-block" data-hour="10">
				<div></div>
			</div>
			<div class="tribe-week-grid-block" data-hour="11">
				<div></div>
			</div>
			<div class="tribe-week-grid-block" data-hour="12">
				<div></div>
			</div>
			<div class="tribe-week-grid-block" data-hour="13">
				<div></div>
			</div>
			<div class="tribe-week-grid-block" data-hour="14">
				<div></div>
			</div>
			<div class="tribe-week-grid-block" data-hour="15">
				<div></div>
			</div>
			<div class="tribe-week-grid-block" data-hour="16">
				<div></div>
			</div>
			<div class="tribe-week-grid-block" data-hour="17">
				<div></div>
			</div>
			<div class="tribe-week-grid-block" data-hour="18">
				<div></div>
			</div>
			<div class="tribe-week-grid-block" data-hour="19">
				<div></div>
			</div>
			<div class="tribe-week-grid-block" data-hour="20">
				<div></div>
			</div>
			<div class="tribe-week-grid-block" data-hour="21">
				<div></div>
			</div>
			<div class="tribe-week-grid-block" data-hour="22">
				<div></div>
			</div>
			<div class="tribe-week-grid-block" data-hour="23">
				<div></div>
			</div>
		</div><!-- .tribe-week-grid-inner-wrap -->
	</div><!-- .tribe-week-grid-outer-wrap -->

	<!-- Days of the week & hours & events -->
	<div class="tribe-grid-body clearfix">

		<div class="column tribe-week-grid-hours">
			<div class="time-row-12AM">12:00 am</div>
			<div class="time-row-1AM">1:00 am</div>
			<div class="time-row-2AM">2:00 am</div>
			<div class="time-row-3AM">3:00 am</div>
			<div class="time-row-4AM">4:00 am</div>
			<div class="time-row-5AM">5:00 am</div>
			<div class="time-row-6AM">6:00 am</div>
			<div class="time-row-7AM">7:00 am</div>
			<div class="time-row-8AM">8:00 am</div>
			<div class="time-row-9AM">9:00 am</div>
			<div class="time-row-10AM">10:00 am</div>
			<div class="time-row-11AM">11:00 am</div>
			<div class="time-row-12PM">12:00 pm</div>
			<div class="time-row-1PM">1:00 pm</div>
			<div class="time-row-2PM">2:00 pm</div>
			<div class="time-row-3PM">3:00 pm</div>
			<div class="time-row-4PM">4:00 pm</div>
			<div class="time-row-5PM">5:00 pm</div>
			<div class="time-row-6PM">6:00 pm</div>
			<div class="time-row-7PM">7:00 pm</div>
			<div class="time-row-8PM">8:00 pm</div>
			<div class="time-row-9PM">9:00 pm</div>
			<div class="time-row-10PM">10:00 pm</div>
			<div class="time-row-11PM">11:00 pm</div>
		</div><!-- tribe-week-grid-hours -->

		<div class="tribe-grid-content-wrap">
			<div title="Monday" class="tribe-events-mobile-day column tribe-events-column">
			</div><!-- hourly column -->
			<div title="Tuesday" class="tribe-events-mobile-day column tribe-events-column">
			</div><!-- hourly column -->
			<div title="Wednesday" class="tribe-events-mobile-day column tribe-events-column">
			</div><!-- hourly column -->
			<div title="Thursday" class="tribe-events-mobile-day column tribe-events-column">
			</div><!-- hourly column -->
			<div title="Friday" class="tribe-events-mobile-day column tribe-events-column">
			</div><!-- hourly column -->
			<div title="Saturday" class="tribe-events-mobile-day column tribe-events-column tribe-events-has-events">
				<div id='tribe-events-event-1856' data-day="5" data-duration="535" data-hour="8" data-min="20" class='type-tribe_events tribe-clearfix tribe-dayspan1 tribe-event-overlap tribe-week-event' style="display: block; height: 535px; top: 500px;">
					<div class="hentry vevent">
						<h3 class="entry-title summary"><a href="">Test Session</a></h3>
					</div>
				</div>
			</div><!-- hourly column -->
			<div title="Sunday" class="tribe-events-mobile-day column tribe-events-column">
			</div><!-- hourly column -->
		</div><!-- .tribe-grid-content-wrap -->

	</div><!-- .tribe-grid-body -->
</div><!-- .tribe-week-grid-wrapper -->
</div><!-- .tribe-events-grid -->
