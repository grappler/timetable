<?php $custom_fields  = get_post_custom( $post->ID ); ?>
<div class="day">
	<?php echo $custom_fields[ 'session-day' ][0]; ?>
</div>
<div class="time">
	<?php echo $custom_fields[ 'session-start' ][0]; ?> - <?php echo $custom_fields[ 'session-end' ][0]; ?>
</div>
<div class="contact">
	<?php echo get_the_author(); ?>
	<?php echo get_the_author_meta( 'telephone' ); ?>
</div>
<div class="location">
	<?php echo get_the_term_list( $post->ID, 'location' ); ?>
</div>

