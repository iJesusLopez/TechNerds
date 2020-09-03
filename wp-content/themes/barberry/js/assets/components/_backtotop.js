
  // =============================================================================
  // Back to Top
  // =============================================================================

  barberry.backtoTop = function() {

    if ( barberry_scripts_vars.backtotop == '0' ) {
      return;
    }

	$('.scrolltotop').on('click', function() {
		$('html, body').animate({scrollTop : 0},800);
		return false;
	});

	if( $('.offcanvas_container').length > 0 ){
		$(window).scroll(function() {    
			var scroll = $(window).scrollTop();
		
			if (scroll >= 300) {					
				$(".progress-page").addClass('is-active');					
			} else {								
				$(".progress-page").removeClass('is-active');
			}
		});
	}
	
	var lastScroll = 0;

	$(window).scroll(function(){
		var scroll = $(window).scrollTop();
		if (scroll > lastScroll) {
			$(".progress-page").addClass("is-visible");
		} else if (scroll < lastScroll) {
			$(".progress-page").removeClass("is-visible");
		}
		lastScroll = scroll;
	});  	

	var progressPath = document.querySelector('.progress-page path');
	var pathLength = progressPath.getTotalLength();
	progressPath.style.transition = progressPath.style.WebkitTransition = 'none';
	progressPath.style.strokeDasharray = pathLength + ' ' + pathLength;
	progressPath.style.strokeDashoffset = pathLength;
	progressPath.getBoundingClientRect();
	progressPath.style.transition = progressPath.style.WebkitTransition = 'stroke-dashoffset 10ms linear';		
	var updateProgress = function () {
		var scroll = $(window).scrollTop();
		var height = $(document).height() - $(window).height();
		var progress = pathLength - (scroll * pathLength / height);
		progressPath.style.strokeDashoffset = progress;
	}
	updateProgress();
	$(window).scroll(updateProgress);

  }