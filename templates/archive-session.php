<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
* Archive Template
*
*
* @file           archive.php
* @package        Responsive
* @author         Emil Uzelac
* @copyright      2003 - 2013 ThemeID
* @license        license.txt
* @version        Release: 1.1
* @filesource     wp-content/themes/responsive/archive.php
* @link           http://codex.wordpress.org/Theme_Development#Archive_.28archive.php.29
* @since          available since Release 1.0
*/

get_header(); ?>

<div id="content-archive" class="grid col-940">

<?php if (have_posts()) : ?>

	<h1 class="post-title"><?php _e( 'Timetable', 'timetable' );  ?></h1>

	<?php while (have_posts()) : the_post(); ?>

// WP_Query arguments
$args = array (
	'post_type'              => 'session',
	'orderby'                => 'timetable-day timetable-start',
	'meta_query'             => array(
		array(
			'key'       => 'timetable-day',
		),
	),
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

		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<div class="row">
				<div class="day grid col-140">
					<?php echo get_day( get_post_meta( $id, 'timetable-day', true ) ); ?>
				</div>
				<div class="time grid col-140">
					<?php echo get_post_meta( $id, 'timetable-start', true ); ?> - <?php echo get_post_meta( $id, 'timetable-end', true ); ?>
				</div>
				<div class="type grid col-140">
					<?php echo get_the_term_list( $id, 'type' ); ?>
				</div>
				<div class="title grid col-220">
					<a href="<?php the_permalink() ?>"><?php the_title( ); ?></a>
				</div>
				<div class="contact grid col-220 fit">
					<?php if ( function_exists( 'coauthors_posts_links' ) ) : ?>
						<?php $coauthors = get_coauthors(); ?>
						<?php foreach( $coauthors as $coauthor ) : ?>
							<?php $id = $coauthor->ID; ?>
							<div class="name"><?php echo $coauthor->display_name; ?></div>
							<?php if ( $coauthor->user_email ) : ?>
								<div class="email">
									<?php echo $coauthor->user_email; ?>
								</div>
							<?php endif; ?>
							<?php if ( get_the_author_meta( 'telephone', $id ) ) : ?>
								<div class="phone">
									<?php echo get_the_author_meta( 'telephone', $id ); ?>
								</div>
							<?php endif; ?>
						<?php endforeach; ?>
					<?php else : ?>
						<div class="name"><a href="<?php get_author_posts_url( get_the_author_meta( 'ID' ) ) ?>"><?php echo get_the_author(); ?></a></div>
						<div class="email"><?php echo get_the_author_meta( 'user_email' ); ?></div>
						<div class="phone"><?php echo get_the_author_meta( 'telephone' ); ?></div>
					<?php endif; ?>
				</div>

			</div>

			<?php responsive_entry_bottom(); ?>
		</div><!-- end of #post-<?php the_ID(); ?> -->
		<?php responsive_entry_after(); ?>

	<?php endwhile; ?>

<?php else : ?>

	<?php get_template_part( 'loop-no-posts' ); ?>

<?php endif; ?>

</div><!-- end of #content-archive -->

<?php get_footer(); ?>
