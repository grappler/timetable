
<?php $event = tribe_events_week_get_event(); ?>
<div id='tribe-events-event-<?php echo $event->ID; ?>' <?php tribe_events_the_header_attributes( 'week-hourly' ); ?> class='<?php tribe_events_event_classes($event->ID) ?> tribe-week-event' data-tribejson='<?php echo tribe_events_template_data( $event ); ?>'>
	<div class="hentry vevent">
		<h3 class="entry-title summary"><a href="<?php tribe_event_link( $event ); ?>" class="url" rel="bookmark"><?php echo $event->post_title; ?></a></h3>
	</div>
</div>