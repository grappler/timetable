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

<div id="content-archive" class="<?php echo implode( ' ', responsive_get_content_classes() ); ?>">

<?php if (have_posts()) : ?>

	<h1 class="post-title"><?php _e( 'Timetable', 'timetable' );  ?></h1>

	<?php while (have_posts()) : the_post(); ?>

		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php $id = get_the_ID(); ?>
			<div class="day">
				<?php echo get_post_meta( get_the_ID(), 'timetable-day', true ); ?>
			</div>
			<div class="time">
				<?php echo get_post_meta( get_the_ID(), 'timetable-start', true ); ?>
				<?php echo get_post_meta( get_the_ID(), 'timetable-end', true ); ?>
			</div>
			<div class="type">
				<?php echo get_the_term_list( $post->ID, 'type' ); ?>
			</div>
			<div class="title">
				<a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title( ); ?></a>
			</div>
			<div class="contact">
				<?php echo get_the_author(); ?>
				<?php echo get_the_author_meta( 'user_email' ); ?>
				<?php echo get_the_author_meta( 'telephone' ); ?>
			</div>

			<div class="post-entry">
				<?php wp_link_pages(array('before' => '<div class="pagination">' . __('Pages:', 'responsive'), 'after' => '</div>')); ?>
			</div><!-- end of .post-entry -->

			<?php get_template_part( 'post-data' ); ?>

			<?php responsive_entry_bottom(); ?>
		</div><!-- end of #post-<?php the_ID(); ?> -->
		<?php responsive_entry_after(); ?>

	<?php
	endwhile;

	get_template_part( 'loop-nav' );

else :

	get_template_part( 'loop-no-posts' );

endif;
?>

</div><!-- end of #content-archive -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
