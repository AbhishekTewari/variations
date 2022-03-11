<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              
 * @since             1.0.0
 * @package           Pv__Wp_Product_Variation
 *
 * @wordpress-plugin
 * Plugin Name:       Product Variation
 * Plugin URI:        
 * Description:       This plugin replace the dropdown menu and Provide buttons for varibale products..
 * Version:           1.0.0
 * Author:            
 * Author URI:        
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       pv--wp-product-variation
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'PV__WP_PRODUCT_VARIATION_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/pv--class-wp-product-variation-activator.php
 */
function pv__activate_wp_product_variation() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/pv--class-wp-product-variation-activator.php';
	Pv__Wp_Product_Variation_Activator::pv__activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/pv--class-wp-product-variation-deactivator.php
 */
function pv__deactivate_wp_product_variation() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/pv--class-wp-product-variation-deactivator.php';
	Pv__Wp_Product_Variation_Deactivator::pv__deactivate();
}

register_activation_hook( __FILE__, 'pv__activate_wp_product_variation' );
register_deactivation_hook( __FILE__, 'pv__deactivate_wp_product_variation' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/pv--class-wp-product-variation.php';

//Plugin Constant
if ( !defined( 'PV__DIR' ) ) {
	define('PV__DIR', plugin_dir_path( __FILE__ ) );
}
if ( !defined( 'PV__URL' ) ) {
	define('PV__URL', plugin_dir_url( __FILE__ ) );
}
if ( !defined( 'PV__HOME' ) ) {
	define('PV__HOME', home_url() );
}

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function pv__run_wp_product_variation() {

	$plugin = new Pv__Wp_Product_Variation();
	$plugin->pv__run();

}
pv__run_wp_product_variation();
