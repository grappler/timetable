
<?php $event = tribe_events_week_get_event(); ?>
<div id='tribe-events-event-<?php echo $event->ID; ?>' <?php tribe_events_the_header_attributes( 'week-hourly' ); ?> class='<?php tribe_events_event_classes($event->ID) ?> tribe-week-event' data-tribejson='<?php echo tribe_events_template_data( $event ); ?>'>
	<div class="hentry vevent">
		<h3 class="entry-title summary"><a href="<?php tribe_event_link( $event ); ?>" class="url" rel="bookmark"><?php echo $event->post_title; ?></a></h3>
	</div>
</div>

<?php $custom_fields  = get_post_custom( $post->ID ); ?>
<div class="day">
	<?php echo $custom_fields[ 'session-day' ][0]; ?>
</div>
<div class="time">
	<?php echo $custom_fields[ 'session-start' ][0]; ?>
	<?php echo $custom_fields[ 'session-end' ][0]; ?>
</div>
<div class="location">
	<?php echo get_the_term_list( $post->ID, 'location' ); ?>
</div>
<div class="title">
	<a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title( ); ?></a>
</div>
<div class="contact">
	<?php echo get_the_author(); ?>
	<?php echo get_the_author_meta( 'user_email' ); ?>
	<?php echo get_the_author_meta( 'telephone' ); ?>
</div>
