
	// =============================================================================
	// Product Quantity
	// =============================================================================

	barberry.productQuantity = function() {

		$('body').on('click', '.plus-btn, .minus-btn', function(e) {
			e.preventDefault();
		    // Get values
		    var $qty = $(this).parents('.quantity').find('.qty'),
		        button_add = $(this).parent().parent().find('.single_add_to_cart_button'),
		        currentVal = parseFloat($qty.val()),
		        max = parseFloat($qty.attr('max')),
		        min = parseFloat($qty.attr('min')),
		        step = $qty.attr('step');
		        
		    // Format values
		    currentVal = !currentVal ? 0 : currentVal;
		    max = !max ? '' : max;
		    min = !min ? 1 : min;
		    if (step === 'any' || step === '' || typeof step === 'undefined' || parseFloat(step) === 'NaN') step = 1;
		    // Change the value
		    if ($(this).is('.plus-btn')) {
		        if (max && (max == currentVal || currentVal > max)) {
		            $qty.val(max);
		            if (button_add.length){
		                button_add.attr('data-quantity', max);
		            }
		        } else {
		            $qty.val(currentVal + parseFloat(step));
		            if (button_add.length){
		                button_add.attr('data-quantity', currentVal + parseFloat(step));
		            }
		        }
		    } else {
		        if (min && (min == currentVal || currentVal < min)) {
		            $qty.val(min);
		            if (button_add.length){
		                button_add.attr('data-quantity', min);
		            }
		        } else if (currentVal > 0) {
		            $qty.val(currentVal - parseFloat(step));
		            if (button_add.length){
		                button_add.attr('data-quantity', currentVal - parseFloat(step));
		            }
		        }
		    }
		    // Trigger change event
		    $qty.trigger('change');
		});

	}