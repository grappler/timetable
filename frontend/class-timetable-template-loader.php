<?php
/**
 * Timetable
 *
 * @package   Timetable
 * @author    Gary Jones
 * @link      http://example.com/timetable
 * @copyright 2013 Ulrich Pogson
 * @license   GPL-2.0+
 */

require plugin_dir_path( __FILE__ ) . 'class-gamajo-template-loader.php';

/**
 * Template loader for Timetable.
 *
 * Only need to specify class properties here.
 *
 * @package Timetable
 * @author  Gary Jones
 */
class Timetable_Template_Loader extends Gamajo_Template_Loader {

	/**
	 * Prefix for filter names.
	 *
	 * @since 1.0.0
	 * @type string
	 */
	protected $filter_prefix = 'Timetable';

	/**
	 * Directory name where custom templates for this plugin should be found in the theme.
	 *
	 * @since 1.0.0
	 * @type string
	 */
	protected $theme_template_directory = 'timetable';

	/**
	 * Reference to the root directory path of this plugin.
	 *
	 * @since 1.0.0
	 * @type string
	 */
	protected $plugin_directory = TIMETABLE_PLUGIN_DIR;

}
