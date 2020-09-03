
// =============================================================================
// Product Lightbox Video
// =============================================================================

barberry.productVideo = function() {

    if ( !barberry.$body.hasClass('single-product') || !$('.single_product_video_trigger')[0] ) {
        return;
    }	

	$('.single_product_video_trigger').on('click', function() {
		
		$('.single_video_container').removeClass('stuck').addClass('active');
		$('.single_video_overlay').addClass('active');
		$("body").addClass('photoswipe-blur');

		setTimeout(function() {				
			$('.single_video_container iframe')[0].contentWindow.postMessage('{"event":"command","func":"","args":""}', '*');
		}, 500);

	});

	$('.close-icon').on('click', function() {
		
		$('.single_video_container').removeClass('active');
		$('.single_video_overlay').removeClass('active');	
		$("body").removeClass('photoswipe-blur');		
		
		setTimeout(function() {				
			$('.single_video_container iframe')[0].contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
		}, 500);

	});

	$('.single_video_overlay').on('click', function() {
		$('.close-icon').trigger('click');
	});

	var video_debounce = function() {
		
		if ($('.single_video_container').hasClass('active')) {

			if (window.scroll_position > 0) {

				$('.single_video_container').addClass('stuck');
				$('.single_video_overlay').removeClass('active');
				$("body").removeClass('photoswipe-blur');


			} else {

				$('.single_video_container').removeClass('stuck');
				$('.single_video_overlay').addClass('active');
				
				$("body").addClass('photoswipe-blur');
				
			}

		}

	}

	$(window).scroll(function() {
		video_debounce();
	});

}