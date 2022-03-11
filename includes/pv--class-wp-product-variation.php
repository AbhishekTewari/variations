<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       
 * @since      1.0.0
 *
 * @package    Pv__Wp_Product_Variation
 * @subpackage Pv__Wp_Product_Variation/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Pv__Wp_Product_Variation
 * @subpackage Pv__Wp_Product_Variation/includes
 * @author      <>
 */
class Pv__Wp_Product_Variation {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Pv__Wp_Product_Variation_Loader    $pv__loader    Maintains and registers all hooks for the plugin.
	 */
	protected $pv__loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $pv__plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $pv__plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $pv__version    The current version of the plugin.
	 */
	protected $pv__version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		if ( defined( 'PV__WP_PRODUCT_VARIATION_VERSION' ) ) {
			$this->pv__version = PV__WP_PRODUCT_VARIATION_VERSION;
		} else {
			$this->pv__version = '1.0.0';
		}
		$this->pv__plugin_name = 'wp-product-variation';

		$this->pv__load_dependencies();
		$this->pv__set_locale();
		$this->pv__define_admin_hooks();
		$this->pv__define_public_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Pv__Wp_Product_Variation_Loader. Orchestrates the hooks of the plugin.
	 * - Pv__Wp_Product_Variation_i18n. Defines internationalization functionality.
	 * - Pv__Wp_Product_Variation_Admin. Defines all hooks for the admin area.
	 * - Pv__Wp_Product_Variation_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function pv__load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/pv--class-wp-product-variation-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/pv--class-wp-product-variation-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/pv--class-wp-product-variation-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/pv--class-wp-product-variation-public.php';

		$this->pv__loader = new Pv__Wp_Product_Variation_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Pv__Wp_Product_Variation_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function pv__set_locale() {

		$pv__plugin_i18n = new Pv__Wp_Product_Variation_i18n();

		$this->pv__loader->pv__add_action( 'plugins_loaded', $pv__plugin_i18n, 'pv__load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function pv__define_admin_hooks() {

		$pv__plugin_admin = new Pv__Wp_Product_Variation_Admin( $this->pv__get_plugin_name(), $this->pv__get_version() );

		$this->pv__loader->pv__add_action( 'admin_enqueue_scripts', $pv__plugin_admin, 'pv__enqueue_styles' );
		$this->pv__loader->pv__add_action( 'admin_enqueue_scripts', $pv__plugin_admin, 'pv__enqueue_scripts' );

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function pv__define_public_hooks() {

		$pv__plugin_public = new Pv__Wp_Product_Variation_Public( $this->pv__get_plugin_name(), $this->pv__get_version() );

		$this->pv__loader->pv__add_action( 'wp_enqueue_scripts', $pv__plugin_public, 'pv__enqueue_styles' );
		$this->pv__loader->pv__add_action( 'wp_enqueue_scripts', $pv__plugin_public, 'pv__enqueue_scripts' );
		$this->pv__loader->pv__add_action( 'woocommerce_before_add_to_cart_form', $pv__plugin_public, 'pv_variation_on_single_product' );
	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function pv__run() {
		$this->pv__loader->pv__run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function pv__get_plugin_name() {
		return $this->pv__plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Wp_Product_Variation_Loader    Orchestrates the hooks of the plugin.
	 */
	public function pv__get_loader() {
		return $this->pv__loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function pv__get_version() {
		return $this->pv__version;
	}

}
