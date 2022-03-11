(function( $ ) {
	'use strict';

	/**
	 * All of the code for your public-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */

	$(document).ready(function(){


		// to enable and disable add to cart button //

		if($(document).find('.variation_id').val() != '' && $(document).find('.variation_id').val() > -1 )
		{
			$(document).find('.single_add_to_cart_button').attr('disabled', false);			
		}
		else{
			$(document).find('.single_add_to_cart_button').attr('disabled', 'disabled');			
		}


		 $(document).on('click','.pv_attr_available_attr',function(){

			
			var pv_attr_type = $(this).attr('data-attr-type');
			var pv_attr_val = $(this).attr('data-attr-slug');
			$(document).find('#'+pv_attr_type).val(pv_attr_val);
			$(document).find('#'+pv_attr_type).trigger('change');

			var active_class = "pv_attr_available_slug_"+pv_attr_type;


			$(this).parents('li').find('.'+active_class).each(function(){
					$(this).removeClass('active');

			});
	
			$(this).addClass('active');

		});


	});
})( jQuery );