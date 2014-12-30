<?php

/**
 * Define a short description for what this class does (no period)
 *
 * @package    Timetable
 * @subpackage Timetable/admin
 * @author     Ulrich Pogson <ulrich@pogson.ch>
 * @license    GPL-2.0+
 * @link       http://example.com
 * @copyright  2014 Ulrich Pogson
 * @since      1.0.0
 */

/**
 * Define a short description for what this class does.
 *
 * Define a longer description for the purpose of this class.
 *
 * @package    Timetable
 * @subpackage Timetable/admin
 * @author     Ulrich Pogson <ulrich@pogson.ch>
 */
class Timetable_Admin {

	/**
	 * Short description. (use period)
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      type    $var    Description.
	 */
	private $version;

	/**
	 * Short description. (use period)
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      type    $var    Description.
	 */
	public function __construct( $version ) {
		$this->version = $version;

		// Add the options page and menu item.
		//add_action( 'admin_menu', array( $this, 'add_plugin_settings_menu' ) );

		// Add an action link pointing to the options page.
		$plugin_basename = plugin_basename( plugin_dir_path( __DIR__ ) . 'timetable.php' );
		add_filter( 'plugin_action_links_' . $plugin_basename, array( $this, 'add_action_links' ) );
	}

	/**
	 * Short description. (use period)
	 *
	 * Long description.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Timetable_Admin_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Timetable_Admin_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		$suffix  = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
		// @TODO - Load only on those pages where needed
		 wp_enqueue_style( 'timetable-admin', plugin_dir_url( __FILE__ ) . 'css/timetable-admin' . $suffix . '.css', array(), $this->version, 'all' );
		 wp_enqueue_style( 'jquery-timepicker', plugin_dir_url( __FILE__ ) . 'css/jquery.timepicker' . $suffix . '.css', array(), '1.4.13', 'all' );

	}

	/**
	 * Short description. (use period)
	 *
	 * Long description.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Timetable_Admin_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Timetable_Admin_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		$suffix  = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
		// @TODO - Load only on those pages where needed
		wp_enqueue_script( 'timetable-admin', plugin_dir_url( __FILE__ ) . 'js/timetable-admin' . $suffix . '.js', array(), $this->version, false );
		wp_enqueue_script( 'jquery-timepicker', plugin_dir_url( __FILE__ ) . 'js/jquery.timepicker' . $suffix . '.js', array( 'jquery' ), '1.4.13', false );

	}

	/**
	 * Register the administration menu for this plugin into the WordPress Dashboard menu.
	 *
	 * @since    1.0.0
	 */
	public function add_plugin_settings_menu() {

		/*
		 * Add a settings page for this plugin to the Settings menu.
		 *
		 * NOTE:  Alternative menu locations are available via WordPress administration menu functions.
		 *
		 *        Administration Menus: http://codex.wordpress.org/Administration_Menus
		 *
		 * @TODO:
		 *
		 * - Change 'Page Title' to the title of your plugin admin page
		 * - Change 'Menu Text' to the text for menu item for the plugin settings page
		 * - Change 'manage_options' to the capability you see fit
		 *   For reference: http://codex.wordpress.org/Roles_and_Capabilities
		 */
		$this->plugin_screen_hook_suffix = add_options_page(
			__( 'Settings', 'timetable' ),
			__( 'Settings', 'timetable' ),
			'manage_options',
			'timetable',
			array( $this, 'display_plugin_settings_page' )
		);

	}

	/**
	 * Render the settings page for this plugin.
	 *
	 * @since    1.0.0
	 */
	public function display_plugin_settings_page() {
		include_once( 'partial/settings-display.php' );
	}

	/**
	 * Add settings action link to the plugins page.
	 *
	 * @since    1.0.0
	 */
	public function add_action_links( $links ) {

		return array_merge(
			array(
				'settings' => '<a href="' . admin_url( 'options-general.php?page=timetable' ) . '">' . __( 'Settings', 'timetable' ) . '</a>'
			),
			$links
		);

	}

}
