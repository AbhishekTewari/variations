<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       
 * @since      1.0.0
 *
 * @package    Pv__Wp_Product_Variation
 * @subpackage Pv__Wp_Product_Variation/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Pv__Wp_Product_Variation
 * @subpackage Pv__Wp_Product_Variation/includes
 * @author      <>
 */
class Pv__Wp_Product_Variation_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function pv__load_plugin_textdomain() {

		load_plugin_textdomain(
			'pv--wp-product-variation',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}
}
