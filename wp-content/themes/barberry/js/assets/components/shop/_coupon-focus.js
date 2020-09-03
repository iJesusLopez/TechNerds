
	// =============================================================================
	// Cart & Checkout Form Submit Arrow at Focus
	// =============================================================================

	barberry.couponFocus = function() {

		$(document).on('focus', '.woocommerce-cart #content .cart .actions .coupon #coupon_code', function() {
			$('.woocommerce-cart #content .cart .actions .coupon').addClass('focus');
		});

		$(document).on('focusout', '.woocommerce-cart #content .cart .actions .coupon #coupon_code', function() {
			$('.woocommerce-cart #content .cart .actions .coupon').removeClass('focus');
		});

		$(document).on('focus', 'body.woocommerce-checkout #couponModal .coupon #coupon_code', function() {
			$('body.woocommerce-checkout #couponModal .coupon').addClass('focus');
		});

		$(document).on('focusout', 'body.woocommerce-checkout #couponModal .coupon #coupon_code', function() {
			$('body.woocommerce-checkout #couponModal .coupon').removeClass('focus');
		});

		// Checkout Gift Card

		$(document).on('focus', '.woocommerce-cart .coupon #giftcard_code', function() {
			$('.woocommerce-cart .coupon').addClass('focus');
		});

		$(document).on('focusout', '.woocommerce-cart .coupon #giftcard_code', function() {
			$('.woocommerce-cart .coupon').removeClass('focus');
		});

		$(document).on('focus', 'body.woocommerce-checkout #giftModal .coupon #giftcard_code', function() {
			$('body.woocommerce-checkout #giftModal .coupon').addClass('focus');
		});

		$(document).on('focusout', 'body.woocommerce-checkout #giftModal .coupon #giftcard_code', function() {
			$('body.woocommerce-checkout #giftModal .coupon').removeClass('focus');
		});
	}