	// =============================================================================
	// Mobile Detect
	// =============================================================================

	barberry.mobileDetect = function() {

		var md = new MobileDetect(window.navigator.userAgent);
		var ismobile = md.mobile();

		if (ismobile) {

			$('body').addClass('is-mobile');
		}

	}