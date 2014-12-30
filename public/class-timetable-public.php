<?php

/**
 * Define a short description for what this class does (no period)
 *
 * @package    Timetable
 * @subpackage Timetable/public
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
 * @subpackage Timetable/public
 * @author     Ulrich Pogson <ulrich@pogson.ch>
 */
class Timetable_Public {

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
	 * Long description.
	 *
	 * @since    1.0.0
	 * @param    float    $version    TODO
	 */
	public function __construct( $version ) {
		$this->version = $version;
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
		 * defined in Timetable_Public_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Timetable_Public_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		 wp_enqueue_style( 'timetable-public', plugin_dir_url( __FILE__ ) . 'css/timetable-public.css', array(), $this->version, 'all' );

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
		 * defined in Timetable_Public_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Timetable_Public_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( 'timetable-public', plugin_dir_url( __FILE__ ) . 'js/timetable-public.js', array( 'jquery' ), $this->version, FALSE );

	}

}
