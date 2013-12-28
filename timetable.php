<?php
/**
 * The WordPress Plugin Boilerplate.
 *
 * A foundation off of which to build well-documented WordPress plugins that also follow
 * WordPress coding standards and PHP best practices.
 *
 * @package   Plugin_Name
 * @author    Your Name <email@example.com>
 * @license   GPL-2.0+
 * @link      http://example.com
 * @copyright 2013 Your Name or Company Name
 *
 * @wordpress-plugin
 * Plugin Name: Timetable
 * Plugin URI:  TODO
 * Description: TODO
 * Version:     1.0.0
 * Author:      Ulrich Pogson
 * Author URI:  ulrich.pogson.ch
 * Text Domain: plugin-name-locale
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path: /lang
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Plugin Root File
if ( ! defined( 'TIMETABLE_PLUGIN_FILE' ) ) {
	define( 'TIMETABLE_PLUGIN_FILE', __FILE__ );
}
// Plugin Root Directory
if ( ! defined( 'TIMETABLE_PLUGIN_DIR' ) ) {
	define( 'TIMETABLE_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
}

// TODO: replace `class-plugin-name.php` with the name of the actual plugin's class file
require_once( plugin_dir_path( __FILE__ ) . 'includes/class-timetable.php' );
require_once( plugin_dir_path( __FILE__ ) . 'admin/class-timetable-meta-box.php' );
require_once( plugin_dir_path( __FILE__ ) . 'admin/class-timetable-admin.php' );
require_once( plugin_dir_path( __FILE__ ) . 'frontend/class-timetable-template-loader.php' );
require_once( plugin_dir_path( __FILE__ ) . 'frontend/class-timetable-frontend.php' );

// Register hooks that are fired when the plugin is activated, deactivated, and uninstalled, respectively.
// TODO: replace Plugin_Name with the name of the plugin defined in `class-plugin-name.php`
register_activation_hook( __FILE__, array( 'Timetable', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'Timetable', 'deactivate' ) );

// TODO: replace Plugin_Name with the name of the plugin defined in `class-plugin-name.php`
Timetable::get_instance();
Timetable_Meta_Box::get_instance();
Timetable_Admin::get_instance();

//$timetable_template_loader = new Timetable_Template_Loader;