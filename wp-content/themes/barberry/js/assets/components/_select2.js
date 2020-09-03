
  // =============================================================================
  // Select 2
  // =============================================================================

  barberry.select2 = function() {

	// =============================================================================
	// Shop Archive Orderby Select Options
	// =============================================================================
		
	if ( typeof $.fn.select2 === 'function' ) {

		var $layerednav = $(".woocommerce-widget-layered-nav-dropdown select, .widget_product_categories select, .wpcf7-select");

		$layerednav.select2({
			minimumResultsForSearch: 0,
			allowClear: false,
		});				

		var $orderby = $(".woocommerce-ordering .orderby");

		$orderby.select2({
			minimumResultsForSearch: -1,
			dropdownParent: $('.woocommerce-ordering'),
			allowClear: false,
		});	

		$('.variations_form select').select2({
			minimumResultsForSearch: -1,
			placeholder: barberry_scripts_vars.select_placeholder,
			allowClear: true,
		});				

	}


  }