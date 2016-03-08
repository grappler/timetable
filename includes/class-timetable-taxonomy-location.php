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
 * Location type taxonomy.
 *
 * @package Timetable
 * @author  Ulrich Pogson
 */
class Timetable_Taxonomy_Location_Type extends Gamajo_Taxonomy {

	/**
	 * Taxonomy ID.
	 *
	 * @since 1.0.0
	 *
	 * @type string
	 */
	protected $taxonomy = 'location';

	/**
	 * Return taxonomy default arguments.
	 *
	 * @since 1.0.0
	 *
	 * @return array Taxonomy default arguments.
	 */
	protected function default_args() {
		$labels = array(
			'name'                       => _x( 'Locations', 'Taxonomy General Name', 'timetable' ),
			'singular_name'              => _x( 'Location', 'Taxonomy Singular Name', 'timetable' ),
			'menu_name'                  => __( 'Location', 'timetable' ),
			'all_items'                  => __( 'All Items', 'timetable' ),
			'parent_item'                => __( 'Parent Item', 'timetable' ),
			'parent_item_colon'          => __( 'Parent Item:', 'timetable' ),
			'new_item_name'              => __( 'New Item Name', 'timetable' ),
			'add_new_item'               => __( 'Add New Item', 'timetable' ),
			'edit_item'                  => __( 'Edit Item', 'timetable' ),
			'update_item'                => __( 'Update Item', 'timetable' ),
			'separate_items_with_commas' => __( 'Separate items with commas', 'timetable' ),
			'search_items'               => __( 'Search Items', 'timetable' ),
			'add_or_remove_items'        => __( 'Add or remove items', 'timetable' ),
			'choose_from_most_used'      => __( 'Choose from the most used items', 'timetable' ),
			'not_found'                  => __( 'Not Found', 'timetable' ),
			'items_list_navigation'      => __( 'Location list navigation', 'timetable' ),
			'items_list'                 => __( 'Location list', 'timetable' ),
		);

		$rewrite = array(
			'slug'                       => 'location',
			'with_front'                 => true,
			'hierarchical'               => false,
		);

		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => false,
			'query_var'                  => 'location',
			'rewrite'                    => true,
		);

		return apply_filters( 'timetable_taxonomy_location_type_args', $args );
	}
}
