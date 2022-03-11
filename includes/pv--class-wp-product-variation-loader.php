<?php

/**
 * Register all actions and filters for the plugin
 *
 * @link       
 * @since      1.0.0
 *
 * @package    Pv__Wp_Product_Variation
 * @subpackage Pv__Wp_Product_Variation/includes
 */

/**
 * Register all actions and filters for the plugin.
 *
 * Maintain a list of all hooks that are registered throughout
 * the plugin, and register them with the WordPress API. Call the
 * run function to execute the list of actions and filters.
 *
 * @package    Pv__Wp_Product_Variation
 * @subpackage Pv__Wp_Product_Variation/includes
 * @author      <>
 */
class Pv__Wp_Product_Variation_Loader {

	/**
	 * The array of actions registered with WordPress.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      array    $pv__actions    The actions registered with WordPress to fire when the plugin loads.
	 */
	protected $pv__actions;

	/**
	 * The array of filters registered with WordPress.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      array    $pv__filters    The filters registered with WordPress to fire when the plugin loads.
	 */
	protected $pv__filters;

	/**
	 * Initialize the collections used to maintain the actions and filters.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {

		$this->pv__actions = array();
		$this->pv__filters = array();

	}

	/**
	 * Add a new action to the collection to be registered with WordPress.
	 *
	 * @since    1.0.0
	 * @param    string               $pv__hook             The name of the WordPress action that is being registered.
	 * @param    object               $pv__component        A reference to the instance of the object on which the action is defined.
	 * @param    string               $pv__callback         The name of the function definition on the $pv__component.
	 * @param    int                  $pv__priority         Optional. The priority at which the function should be fired. Default is 10.
	 * @param    int                  $pv__accepted_args    Optional. The number of arguments that should be passed to the $pv__callback. Default is 1.
	 */
	public function pv__add_action( $pv__hook, $pv__component, $pv__callback, $pv__priority = 10, $pv__accepted_args = 1 ) {
		$this->pv__actions = $this->pv__add( $this->pv__actions, $pv__hook, $pv__component, $pv__callback, $pv__priority, $pv__accepted_args );
	}

	/**
	 * Add a new filter to the collection to be registered with WordPress.
	 *
	 * @since    1.0.0
	 * @param    string               $pv__hook             The name of the WordPress filter that is being registered.
	 * @param    object               $pv__component        A reference to the instance of the object on which the filter is defined.
	 * @param    string               $pv__callback         The name of the function definition on the $pv__component.
	 * @param    int                  $pv__priority         Optional. The priority at which the function should be fired. Default is 10.
	 * @param    int                  $pv__accepted_args    Optional. The number of arguments that should be passed to the $pv__callback. Default is 1
	 */
	public function pv__add_filter( $pv__hook, $pv__component, $pv__callback, $pv__priority = 10, $pv__accepted_args = 1 ) {
		$this->pv__filters = $this->pv__add( $this->pv__filters, $pv__hook, $pv__component, $pv__callback, $pv__priority, $pv__accepted_args );
	}

	/**
	 * A utility function that is used to register the actions and hooks into a single
	 * collection.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @param    array                $pv__hooks            The collection of hooks that is being registered (that is, actions or filters).
	 * @param    string               $pv__hook             The name of the WordPress filter that is being registered.
	 * @param    object               $pv__component        A reference to the instance of the object on which the filter is defined.
	 * @param    string               $pv__callback         The name of the function definition on the $component.
	 * @param    int                  $pv__priority         The priority at which the function should be fired.
	 * @param    int                  $pv__accepted_args    The number of arguments that should be passed to the $pv__callback.
	 * @return   array                                  The collection of actions and filters registered with WordPress.
	 */
	private function pv__add( $pv__hooks, $pv__hook, $pv__component, $pv__callback, $pv__priority, $pv__accepted_args ) {

		$pv__hooks[] = array(
			'hook'          => $pv__hook,
			'component'     => $pv__component,
			'callback'      => $pv__callback,
			'priority'      => $pv__priority,
			'accepted_args' => $pv__accepted_args
		);

		return $pv__hooks;

	}

	/**
	 * Register the filters and actions with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function pv__run() {

		foreach ( $this->pv__filters as $pv__hook ) {
			add_filter( $pv__hook['hook'], array( $pv__hook['component'], $pv__hook['callback'] ), $pv__hook['priority'], $pv__hook['accepted_args'] );
		}

		foreach ( $this->pv__actions as $pv__hook ) {
			add_action( $pv__hook['hook'], array( $pv__hook['component'], $pv__hook['callback'] ), $pv__hook['priority'], $pv__hook['accepted_args'] );
		}

	}

}
