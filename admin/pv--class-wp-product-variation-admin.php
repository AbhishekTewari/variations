<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       
 * @since      1.0.0
 *
 * @package    Pv__Wp_Product_Variation
 * @subpackage Pv__Wp_Product_Variation/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Pv__Wp_Product_Variation
 * @subpackage Pv__Wp_Product_Variation/admin
 * @author      <>
 */
class Pv__Wp_Product_Variation_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $pv__plugin_name    The ID of this plugin.
	 */
	private $pv__plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $pv__version    The current version of this plugin.
	 */
	private $pv__version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $pv__plugin_name       The name of this plugin.
	 * @param      string    $pv__version    The version of this plugin.
	 */
	public function __construct( $pv__plugin_name, $pv__version ) {

		$this->pv__plugin_name = $pv__plugin_name;
		$this->pv__version = $pv__version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function pv__enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the pv__run() function
		 * defined in Wp_Product_Variation_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Product_Variation_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->pv__plugin_name, plugin_dir_url( __FILE__ ) . 'css/pv--wp-product-variation-admin.css', array(), $this->pv__version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function pv__enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the pv__run() function
		 * defined in Wp_Product_Variation_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Product_Variation_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->pv__plugin_name, plugin_dir_url( __FILE__ ) . 'js/pv--wp-product-variation-admin.js', array( 'jquery' ), $this->pv__version, false );

	}

}
