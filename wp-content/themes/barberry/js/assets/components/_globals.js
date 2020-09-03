
  // =============================================================================
  // Global Debounce
  // =============================================================================

  barberry.globalDebounce = function() {

	//===============================================================
	// Scroll Detection
	//===============================================================

	window.scroll_position = $(window).scrollTop();
	window.scroll_direction = 'fixed';

	function scroll_detection() {
		var scroll = $(window).scrollTop();
	    if (scroll > window.scroll_position) {
	        window.scroll_direction = 'down';
	    } else {
	        window.scroll_direction = 'up';
	    }
	    window.scroll_position = scroll;
	}

	$(window).scroll(function() {        
        scroll_detection();
    });

	gsap.config({
	  nullTargetWarn: false,
	});


  }


  