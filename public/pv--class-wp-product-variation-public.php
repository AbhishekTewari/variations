<?php

/**
 * The public-specific functionality of the plugin.
 *
 * @link       
 * @since      1.0.0
 *
 * @package    Pv__Wp_Product_Variation
 * @subpackage Pv__Wp_Product_Variation/public
 */

/**
 * The public-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-specific stylesheet and JavaScript.
 *
 * @package    Pv__Wp_Product_Variation
 * @subpackage Pv__Wp_Product_Variation/public
 * @author      <>
 */
class Pv__Wp_Product_Variation_Public {

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
	 * Register the stylesheets for the public area.
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

		wp_enqueue_style( $this->pv__plugin_name, plugin_dir_url( __FILE__ ) . 'css/pv--wp-product-variation-public.css', array(), $this->pv__version, 'all' );

	}

	/**
	 * Register the JavaScript for the public area.
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

		wp_enqueue_script( $this->pv__plugin_name, plugin_dir_url( __FILE__ ) . 'js/pv--wp-product-variation-public.js', array( 'jquery' ), $this->pv__version, false );

	}

	/**
	 * Creating html for variable products.
	 *
	 * @since    1.0.0
	 */
	public function pv_variation_on_single_product() {

		global $product;
		global $post;
		$pv_post_author = $post->post_author;
		
		if( $product->is_type( 'variable' ) || $product->is_type( 'variation' ) )
		{
			$pv_product_attributes = $product->get_attributes();
			$pv_prod_avail_variations = $product->get_available_variations();

					?>	
						<div  id="">
        					<div class="">
								<ul class="pv_attr_lists">
									<?php
									if( isset($pv_product_attributes) && is_array($pv_product_attributes) && !empty($pv_product_attributes) )
									{
										foreach( $pv_product_attributes as $pv_attr_key => $pv_attr_val )
										{ ?>
												<li>
													<?php
														echo "<label>".esc_html__(wc_attribute_label($pv_attr_key), 'pv--wp-product-variation')."</label>";
											
													?>
													<div class="pv_display_single_page <?php echo esc_attr('pv_display_attr_'.$pv_attr_key) ?>">
													<?php 
													$i = 0;
													$parent_attribute_id = $pv_attr_val->get_id();
											
													$pv_parent_term_meta = get_term_meta($parent_attribute_id, 'pv_attr_meta');
											
													$pv_parent_term_meta = isset($pv_parent_term_meta[0])? $pv_parent_term_meta[0] : array();
											
													foreach($pv_attr_val->get_options() as $pv_variation_key => $pv_variation_val)
													{

														global $wpdb;
														
														$pv_attr_term = get_term($pv_variation_val);
									
														if( isset($pv_attr_term) && isset($pv_attr_term->taxonomy) )
														{

															$pv_attr_term = get_term($pv_variation_val);
															$pv_attr_term_meta = get_term_meta($pv_variation_val,'order_'.$pv_attr_key)[0];
															if( isset($pv_attr_term) && isset($pv_attr_term_meta) && isset($pv_attr_term->slug) && isset($pv_attr_term->name) )
															{
																?>
																<div>
																	<input type="button" class = 'pv_attr_available_attr <?php echo esc_attr('pv_attr_available_slug_'.$pv_attr_term->taxonomy) ?>' data-attr-type="<?php echo esc_attr($pv_attr_key); ?>" data-attr-slug="<?php echo esc_attr($pv_attr_term->slug); ?>" value="<?php esc_html_e($pv_attr_term->name, 'pv--wp-product-variation'); ?>">
																</div>
																<?php
															}
														}
													}
													?>
													</div>
												</li>
											<?php 
										}
									}
									?>
								</ul>
						</div>
					</div>
				<?php
			
		}
	}


}
