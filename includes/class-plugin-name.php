<?php

/**
 * Define a short description for what this class does (no period)
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes
 * @author     Your Name <email@example.com>
 * @license    GPL-2.0+
 * @link       http://example.com
 * @copyright  2014 Your Name or Company Name
 * @since      1.0.0
 */

/**
 * Define a short description for what this class does.
 *
 * Define a longer description for the purpose of this class.
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes
 * @author     Your Name <email@example.com>
 */
class Plugin_Name {

	/**
	 * Short description. (use period)
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      type    $var    Description.
	 */
	protected $loader;

	/**
	 * Short description. (use period)
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      type    $var    Description.
	 */
	protected $plugin_slug;

	/**
	 * Short description. (use period)
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      type    $var    Description.
	 */
	protected $version;

	/**
	 * Short description. (use period)
	 *
	 * @since    1.0.0
	 */
	public function __construct() {

		$this->plugin_slug = 'plugin-name-slug';
		$this->version = '1.0.0';

		$this->load_dependencies();
		$this->set_locale();

		if( is_admin() ) {
			$this->define_admin_hooks();
			$this->define_metabox_hooks();
		} else {
			$this->define_public_hooks();
		}

		$this->register_post_type();
		$this->register_taxonomy();

	}

	/**
	 * Short description. (use period)
	 *
	 * Long description.
	 *
	 * @since    1.0.0
	 * @access   (for functions: only use if private)
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-plugin-name-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-plugin-name-i18n.php';

		/**
		 * @TODO The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		if ( ! class_exists( 'Gamajo_Registerable' ) ) {
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/vendor/interface-gamajo-registerable.php';
		}

		/**
		 * @TODO The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		if ( ! class_exists( 'Gamajo_Post_Type' ) ) {
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/vendor/class-gamajo-post-type.php';
		}

		/**
		 * @TODO The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		if ( ! class_exists( 'Gamajo_Taxonomy' ) ) {
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/vendor/class-gamajo-taxonomy.php';
		}

		/**
		 * @TODO The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		if ( ! class_exists( 'Gamajo_Template_Loader' ) ) {
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/vendor/class-gamajo-template-loader.php';
		}

		/**
		 * @TODO The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-timetable-post-type-session.php';

		/**
		 * @TODO The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-timetable-taxonomy-location.php';

		if ( is_admin() ) {

			/**
			 * The class responsible for defining all actions that occur in the Dashboard.
			 */
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-plugin-name-admin.php';

			/**
			 * The class responsible for defining all actions that occur in the Dashboard.
			 */
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-timetable-meta-box.php';

		} else {

			/**
			 * The class responsible for defining all actions that occur in the public-facing
			 * side of the site.
			 */
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-plugin-name-public.php';

			/**
			 * @TODO The class responsible for defining internationalization functionality
			 * of the plugin.
			 */
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-timetable-template-loader.php';
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-timetable-shortcodes.php';
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/functions.php';

		}

		$this->loader = new Plugin_Name_Loader();

	}

	/**
	 * Short description. (use period)
	 *
	 * Long description.
	 *
	 * @since    1.0.0
	 * @access   (for functions: only use if private)
	 */
	private function set_locale() {

		$plugin_i18n = new Plugin_Name_i18n();
		$plugin_i18n->set_domain( $this->get_slug() );
		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Short description. (use period)
	 *
	 * Long description.
	 *
	 * @since    1.0.0
	 * @access   (for functions: only use if private)
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Plugin_Name_Admin( $this->get_version() );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

	}

	/**
	 * Short description. (use period)
	 *
	 * Long description.
	 *
	 * @since    1.0.0
	 * @access   (for functions: only use if private)
	 */
	private function define_metabox_hooks() {

		$timetable_meta_mox = new Timetable_Meta_Box( $this->get_version() );
		$this->loader->add_action( 'add_meta_boxes', $timetable_meta_mox, 'add_session_meta_box' );
		$this->loader->add_action( 'save_post', $timetable_meta_mox, 'save_session_details' );

	}

	/**
	 * Short description. (use period)
	 *
	 * Long description.
	 *
	 * @since    1.0.0
	 * @access   (for functions: only use if private)
	 */
	private function define_public_hooks() {

		$plugin_public = new Plugin_Name_Public( $this->get_version() );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

	}

	/**
	 * Short description. (use period)
	 *
	 * Long description.
	 *
	 * @since    1.0.0
	 * @access   (for functions: only use if private)
	 */
	private function register_post_type() {

		$timetable_post_type_session = new Timetable_Post_Type_Session;
		$timetable_post_type_session->register();

	}

	/**
	 * Short description. (use period)
	 *
	 * Long description.
	 *
	 * @since    1.0.0
	 * @access   (for functions: only use if private)
	 */
	private function register_taxonomy() {

		$timetable_taxonomy_location_type = new Timetable_Taxonomy_Location_Type;
		$timetable_taxonomy_location_type->register();

	}

	/**
	 * Short description. (use period)
	 *
	 * Long description.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * Short description. (use period)
	 *
	 * Long description.
	 *
	 * @since     1.0.0
	 * @return    type    Description
	 */
	public function get_slug() {
		return $this->plugin_slug;
	}

	/**
	 * Short description. (use period)
	 *
	 * Long description.
	 *
	 * @since     1.0.0
	 * @return    type    Description
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Short description. (use period)
	 *
	 * Long description.
	 *
	 * @since     1.0.0
	 * @return    type    Description
	 */
	public function get_version() {
		return $this->version;
	}

}
