<?php

/**
 * Short Description (no period for file headers)
 *
 * Long Description.
 *
 * @package   Timetable
 * @author    Ulrich Pogson <ulrich@pogson.ch>
 * @license   GPL-2.0+
 * @link      http://example.com/timetable
 * @copyright 2014 Ulrich Pogson
 *
 * @wordpress-plugin
 * Plugin Name:       Timetable
 * Plugin URI:        http://wpzoo.ch/plugins/timetable
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress dashboard.
 * Version:           1.0.0
 * Author:            Ulrich Pogson
 * Author URI:        http://ulrich.pogson.ch
 * Text Domain:       timetable
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'TIMETABLE_DIR', plugin_dir_path( __FILE__ ) );

/**
 * The plugin activation class that runs during plugin activation.
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/class-timetable-activator.php';

/**
 * The plugin deactivation class that runs during plugin deactivation.
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/class-timetable-deactivator.php';

/** This action is documented in includes/class-timetable-activator.php */
register_activation_hook( __FILE__, array( 'Timetable_Activator', 'activate' ) );

/** This action is documented in includes/class-timetable-deactivator.php */
register_activation_hook( __FILE__, array( 'Timetable_Deactivator', 'deactivate' ) );

/**
 * The base class used to define certain functionality and attributes used among
 * the dashboard-specific and public-facing functionality.
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/class-timetable.php';

/**
 * Short description. (use period)
 *
 * Long description.
 *
 * @since    1.0.0
 */
function run_timetable() {

	$plugin = new Timetable();
	$plugin->run();

}

run_timetable();
