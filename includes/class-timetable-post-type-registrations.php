<?php
/**
 * Timetable Post Type
 *
 * @package   Timetable_Post_Type
 * @author    Ulrich Pogson
 * @license   GPL-2.0+
 * @copyright 2013 Ulrich Pogson
 */

/**
 * Register post types and taxonomies.
 *
 * @package Timetable_Post_Type
 * @author  Devin Price
 * @author  Gary Jones
 */
class Timetable_Post_Type_Registrations {

	public $post_type = 'session';

	public $taxonomies = array( 'type', 'contact' );

	public function init() {

		// Add the timetable post type and taxonomies
		add_action( 'init', array( $this, 'register' ) );

		// Add taxonomy terms as body classes
		add_filter( 'body_class', array( $this, 'add_body_classes' ) );
	}

	/**
	 * Initiate registrations of post type and taxonomies.
	 *
	 * @uses Timetable_Post_Type_Registrations::register_post_type()
	 * @uses Timetable_Post_Type_Registrations::register_taxonomy_tag()
	 * @uses Timetable_Post_Type_Registrations::register_taxonomy_category()
	 */
	public function register() {
		$this->register_post_type();
		$this->register_taxonomy_category();
		$this->register_taxonomy_tag();
	}

	/**
	 * Register the custom post type.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_post_type
	 */
	protected function register_post_type() {

		$labels = apply_filters( 'timetable_post_type_labels', array(
			'name'                => _x( 'Sessions', 'Post Type General Name', 'timetable' ),
			'singular_name'       => _x( 'Session', 'Post Type Singular Name', 'timetable' ),
			'menu_name'           => __( 'Timetable', 'timetable' ),
			'parent_item_colon'   => __( 'Parent Session:', 'timetable' ),
			'all_items'           => __( 'All Sessions', 'timetable' ),
			'view_item'           => __( 'View Session', 'timetable' ),
			'add_new_item'        => __( 'Add New Session', 'timetable' ),
			'add_new'             => __( 'New Session', 'timetable' ),
			'edit_item'           => __( 'Edit Session', 'timetable' ),
			'update_item'         => __( 'Update Session', 'timetable' ),
			'search_items'        => __( 'Search sessions', 'timetable' ),
			'not_found'           => __( 'No sessions found', 'timetable' ),
			'not_found_in_trash'  => __( 'No sessions found in Trash', 'timetable' ),
		) );

		$supports = array(
			'title',
			'editor',
			'author',
			'revisions',
		);

		$args = apply_filters( 'timetable_post_type_args', array(
			'label'               => __( 'session', 'timetable' ),
			'description'         => __( 'Sessions', 'timetable' ),
			'labels'              => $labels,
			'supports'            => $supports,
			'taxonomies'          => $this->taxonomies,
			'hierarchical'        => true,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 20,
			'menu_icon'           => 'dashicons-list-view',
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'page',
		) );

		$args = apply_filters( 'timetableposttype_args', $args );

		register_post_type( $this->post_type, $args );
	}

	/**
	 * Register a taxonomy for Timetable Categories.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_taxonomy
	 */
	protected function register_taxonomy_category() {

		$labels = array(
			'name'                       => _x( 'Types', 'Taxonomy General Name', 'timetable' ),
			'singular_name'              => _x( 'Type', 'Taxonomy Singular Name', 'timetable' ),
			'menu_name'                  => __( 'Types', 'timetable' ),
			'all_items'                  => __( 'All Types', 'timetable' ),
			'parent_item'                => __( 'Parent Type', 'timetable' ),
			'parent_item_colon'          => __( 'Parent Type:', 'timetable' ),
			'new_item_name'              => __( 'New Type Name', 'timetable' ),
			'add_new_item'               => __( 'Add New Type', 'timetable' ),
			'edit_item'                  => __( 'Edit Type', 'timetable' ),
			'update_item'                => __( 'Update Type', 'timetable' ),
			'separate_items_with_commas' => __( 'Separate types with commas', 'timetable' ),
			'search_items'               => __( 'Search types', 'timetable' ),
			'add_or_remove_items'        => __( 'Add or remove types', 'timetable' ),
			'choose_from_most_used'      => __( 'Choose from the most used types', 'timetable' ),
		);

		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => false,
		);

		$args = apply_filters( 'timetable_filter_' . $this->taxonomies[0] . '_args', $args );

		register_taxonomy( $this->taxonomies[0], $this->post_type, $args );
	}

	/**
	 * Register a taxonomy for Timetable Tags.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_taxonomy
	 */
	protected function register_taxonomy_tag() {

		$labels = array(
			'name'                       => _x( 'Contacts', 'Taxonomy General Name', 'timetable' ),
			'singular_name'              => _x( 'Contact', 'Taxonomy Singular Name', 'timetable' ),
			'menu_name'                  => __( 'Contacts', 'timetable' ),
			'all_items'                  => __( 'All Contacts', 'timetable' ),
			'parent_item'                => __( 'Parent Contact', 'timetable' ),
			'parent_item_colon'          => __( 'Parent Contact:', 'timetable' ),
			'new_item_name'              => __( 'New Contact Name', 'timetable' ),
			'add_new_item'               => __( 'Add New Contact', 'timetable' ),
			'edit_item'                  => __( 'Edit Contact', 'timetable' ),
			'update_item'                => __( 'Update Contact', 'timetable' ),
			'separate_items_with_commas' => __( 'Separate contacts with commas', 'timetable' ),
			'search_items'               => __( 'Search contacts', 'timetable' ),
			'add_or_remove_items'        => __( 'Add or remove contacts', 'timetable' ),
			'choose_from_most_used'      => __( 'Choose from the most used contacts', 'timetable' ),
		);

		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => false,
		);

		$args = apply_filters( 'timetable_filter_' . $this->taxonomies[1] . '_args', $args );

		register_taxonomy( $this->taxonomies[1], $this->post_type, $args );

	}

	/**
	 * Add taxonomy terms as body classes.
	 *
	 * If the taxonomy doesn't exist (has been unregistered), then get_the_terms() returns WP_Error, which is checked
	 * for before adding classes.
	 *
	 * @param array $classes Existing body classes.
	 *
	 * @return array Amended body classes.
	 */
	public function add_body_classes( $classes ) {

		// Only single posts should have the taxonomy body classes
		if ( ! is_single() ) {
			return;
		}

		$taxonomies = $this->taxonomies;
		foreach( $taxonomies as $taxonomy ) {
			$terms = get_the_terms( get_the_ID(), $taxonomy );
			if ( $terms && ! is_wp_error( $terms ) ) {
				foreach( $terms as $term ) {
					$classes[] = sanitize_html_class( str_replace( '_', '-', $taxonomy ) . '-' . $term->slug );
				}
			}
		}

		return $classes;
	}

}