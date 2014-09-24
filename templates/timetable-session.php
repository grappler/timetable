<div class="row">
	<div class="day col">
		<?php echo get_post_meta( $id, 'timetable-day', true ); ?>
	</div>
	<div class="time col">
		<?php echo get_post_meta( $id, 'timetable-start', true ); ?> - <?php echo get_post_meta( $id, 'timetable-end', true ); ?>
	</div>
	<div class="type col">
		<?php echo get_the_term_list( $id, 'type' ); ?>
	</div>
	<div class="title col">
		<a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title( ); ?></a>
	</div>
	<div class="contact col">
		<?php echo get_the_author(); ?>
		<?php echo get_the_author_meta( 'user_email' ); ?>
		<?php echo get_the_author_meta( 'telephone' ); ?>
	</div>
</div>