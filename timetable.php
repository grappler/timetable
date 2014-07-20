<?php

/**
 * Short Description (no period for file headers)
 *
 * Long Description.
 *
 * @package   Plugin_Name
 * @author    Your Name or Company Name <email@domain.com>
 * @license   GPL-2.0+
 * @link      http://example.com/plugin-name
 * @copyright 2014 Your Name or Company Name
 *
 * @wordpress-plugin
 * Plugin Name:       Timetable
 * Plugin URI:        http://example.com/plugin-name-uri
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress dashboard.
 * Version:           1.0.0
 * Author:            Ulrich Pogson
 * Author URI:        http://example.com
 * Text Domain:       plugin-name-locale
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'TIMETABLE_DIR', plugin_dir_path( __FILE__ ) );

add_action('admin_menu', 'register_my_custom_submenu_page');

function register_my_custom_submenu_page() {

	add_submenu_page(
		'edit.php?post_type=session',
		'My Custom Submenu Page',
		'My Custom Submenu Page',
		'manage_options',
		'my-custom-submenu-page',
		'my_custom_submenu_page_callback',
	);

}

/**
 * The plugin activation class that runs during plugin activation.
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/class-plugin-name-activator.php';

/**
 * The plugin deactivation class that runs during plugin deactivation.
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/class-plugin-name-deactivator.php';

/** This action is documented in includes/class-plugin-name-activator.php */
register_activation_hook( __FILE__, array( 'Plugin_Name_Activator', 'activate' ) );

/** This action is documented in includes/class-plugin-name-deactivator.php */
register_activation_hook( __FILE__, array( 'Plugin_Name_Deactivator', 'deactivate' ) );

/**
 * The base class used to define certain functionality and attributes used among
 * the dashboard-specific and public-facing functionality.
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/class-plugin-name.php';

/**
 * Short description. (use period)
 *
 * Long description.
 *
 * @since    1.0.0
 */
function run_plugin_name() {

	$plugin = new Plugin_Name();
	$plugin->run();

}

run_plugin_name();
