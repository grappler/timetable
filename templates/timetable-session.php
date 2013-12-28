<?php $id = get_the_ID(); ?>
<div class="day">
	<?php echo get_post_meta( $id, 'timetable-day', true ); ?>
</div>
<div class="time">
	<?php echo get_post_meta( $id, 'timetable-start', true ); ?>
	<?php echo get_post_meta( $id, 'timetable-end', true ); ?>
</div>
<div class="type">
	<?php echo get_the_term_list( $id, 'type' ); ?>
</div>
<div class="title">
	<a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title( ); ?></a>
</div>
<div class="contact">
	<?php echo get_the_author(); ?>
	<?php echo get_the_author_meta( 'user_email' ); ?>
	<?php echo get_the_author_meta( 'telephone' ); ?>
</div>