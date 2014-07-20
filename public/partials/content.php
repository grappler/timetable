<?php
/**
 * Week View Content
 * The content template for the week view. This template is also used for
 * the response that is returned on week view ajax requests.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/week/content.php
 *
 * @package TribeEventsTimetable
 * @since   1.0.0
 * @author  Modern Tribe Inc.
 *
 */

if ( !defined('ABSPATH') ) { die('-1'); } ?>

<div id="tribe-events-content" class="tribe-events-week-grid tribe-clearfix">

	<!-- Timetable Title -->
	<?php do_action( 'timetable_before_the_title') ?>
	<h2 class="tribe-events-page-title"><?php timetable_title() ?></h2>
	<?php do_action( 'timetable_after_the_title') ?>

	<!-- Notices -->
	<?php timetable_the_notices() ?>

	<!-- Timetable Header -->
	<?php do_action( 'timetable_before_header') ?>
	<div id="tribe-events-header" <?php timetable_the_header_attributes('week-header') ?>>

		<!-- Header -->
		<?php do_action( 'timetable_header' ); ?>


	</div><!-- #tribe-events-header -->
	<?php do_action( 'timetable_after_header') ?>

	<!-- Timetable Grid -->
	<?php timetable_get_template_part( 'public/partials/loop', 'grid' ) ?>

	<!-- Timetable Footer -->
	<?php do_action( 'timetable_before_footer') ?>
	<div id="tribe-events-footer" <?php timetable_the_footer_attributes('week-foter') ?>>

		<!-- Footer -->
		<?php do_action( 'timetable_footer' ); ?>

	</div><!-- #tribe-events-footer -->
	<?php do_action( 'timetable_after_footer') ?>

</div><!-- #tribe-events-content -->
