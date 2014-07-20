<?php
/**
 * Timetable
 *
 * @package   Timetable
 * @author    Ulrich Pogson
 * @link      http://gamajo.com/timetable
 * @copyright 2013 Ulrich Pogson
 * @license   GPL-2.0+
 */

/**
 * Session post type.
 *
 * @package Timetable
 * @author  Ulrich Pogson
 */
class Timetable_Post_Type_Session extends Gamajo_Post_Type {
	/**
	 * Post type ID.
	 *
	 * @since 1.0.0
	 *
	 * @type string
	 */
	protected $post_type = 'session';

	/**
	 * Return post type default arguments.
	 *
	 * @since 1.0.0
	 *
	 * @return array Post type default arguments.
	 */
	protected function default_args() {
		$labels = array(
			'name'                => _x( 'Sessions', 'Post Type General Name', 'timetable' ),
			'singular_name'       => _x( 'Session', 'Post Type Singular Name', 'timetable' ),
			'menu_name'           => __( 'Sessions', 'timetable' ),
			'parent_item_colon'   => __( 'Parent Item:', 'timetable' ),
			'all_items'           => __( 'All Items', 'timetable' ),
			'view_item'           => __( 'View Item', 'timetable' ),
			'add_new_item'        => __( 'Add New Item', 'timetable' ),
			'add_new'             => __( 'Add New', 'timetable' ),
			'edit_item'           => __( 'Edit Item', 'timetable' ),
			'update_item'         => __( 'Update Item', 'timetable' ),
			'search_items'        => __( 'Search Item', 'timetable' ),
			'not_found'           => __( 'Not found', 'timetable' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'timetable' ),
		);

		$rewrite = array(
			'slug'                => 'session',
			'with_front'          => true,
			'pages'               => true,
			'feeds'               => true,
		);

		$args = array(
			'label'               => __( 'post_type', 'timetable' ),
			'description'         => __( 'Post Type Description', 'timetable' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'author', ),
			'taxonomies'          => array( 'location' ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 20,
			'menu_icon'           => 'dashicons-schedule',
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'query_var'           => 'session',
			'rewrite'             => false,
			'capability_type'     => 'post',
		);

		return apply_filters( 'timetable_post_type_session_args', $args );
	}

	/**
	 * Return post type updated messages.
	 *
	 * @since 1.0.0
	 *
	 * @return array Post type updated messages.
	 */
	public function messages() {
		$post             = get_post();
		$post_type        = get_post_type( $post );
		$post_type_object = get_post_type_object( $post_type );

		$messages = array(
			0  => '', // Unused. Messages start at index 1.
			1  => __( 'Session updated.', 'timetable' ),
			2  => __( 'Custom field updated.', 'timetable' ),
			3  => __( 'Custom field deleted.', 'timetable' ),
			4  => __( 'Session updated.', 'timetable' ),
			/* translators: %s: date and time of the revision */
			5  => isset( $_GET['revision'] ) ? sprintf( __( 'Session restored to revision from %s', 'timetable' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
			6  => __( 'Session published.', 'timetable' ),
			7  => __( 'Session saved.', 'timetable' ),
			8  => __( 'Session submitted.', 'timetable' ),
			9  => sprintf(
				__( 'Session scheduled for: <strong>%1$s</strong>.', 'timetable' ),
				/* translators: Publish box date format, see http://php.net/date */
				date_i18n( __( 'M j, Y @ G:i', 'timetable' ), strtotime( $post->post_date ) )
			),
			10 => __( 'Session draft updated.', 'timetable' ),
		);

		if ( $post_type_object->publicly_queryable ) {
			$permalink         = get_permalink( $post->ID );
			$preview_permalink = add_query_arg( 'preview', 'true', $permalink );

			$view_link    = sprintf( ' <a href="%s">%s</a>', esc_url( $permalink ), __( 'View session', 'timetable' ) );
			$preview_link = sprintf( ' <a target="_blank" href="%s">%s</a>', esc_url( $preview_permalink ), __( 'Preview session', 'timetable' ) );

			$messages[1]  .= $view_link;
			$messages[6]  .= $view_link;
			$messages[9]  .= $view_link;
			$messages[8]  .= $preview_link;
			$messages[10] .= $preview_link;
		}

		return apply_filters( 'timetable_post_type_session_messages', $messages );
	}
}
