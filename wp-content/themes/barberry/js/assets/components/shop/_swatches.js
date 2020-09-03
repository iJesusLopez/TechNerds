
	// =============================================================================
	// Attribute Swatches
	// =============================================================================

	barberry.productSwatches = function() {

		$('body').on('tawcvs_initialized', function () {
			$('.variations_form').unbind('tawcvs_no_matching_variations');
			$('.variations_form').on('tawcvs_no_matching_variations', function (event, $el) {
				event.preventDefault();
				$el.addClass('selected');

				$('.variations_form').find('.woocommerce-variation.single_variation').show();
				if (typeof wc_add_to_cart_variation_params !== 'undefined') {
					$('.variations_form').find('.single_variation').slideDown(200).html('<p>' + wc_add_to_cart_variation_params.i18n_no_matching_variations_text + '</p>');
				}
			});
		});


		$('body').on('click', '.br-swatch-variation-image', function (e) {
			e.preventDefault();
			$(this).siblings('.br-swatch-variation-image').removeClass('selected');
			$(this).addClass('selected');
			var imgSrc = $(this).data('src'),
				imgSrcSet = $(this).data('src-set'),
				$mainImages = $(this).parents('li.product').find('.product-image > a'),
				$image = $mainImages.find('img').first(),
				imgWidth = $image.first().width(),
				imgHeight = $image.first().height();

			$mainImages.addClass('image-loading');
			$mainImages.css({
				width  : imgWidth,
				height : imgHeight,
				display: 'block'
			});

			$image.attr('src', imgSrc);

			if (imgSrcSet) {
				$image.attr('srcset', imgSrcSet);
			}

			$image.load(function () {
				$mainImages.removeClass('image-loading');
				$mainImages.removeAttr('style');
			});
		});

	}