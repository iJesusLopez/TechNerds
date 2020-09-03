
  // =============================================================================
  // Footer Init
  // =============================================================================

  barberry.footerInit = function() {

    if ( barberry_scripts_vars.footer_hover == '1' ) {
		window.sr = ScrollReveal();

		function addAminationClass (el) {
			setTimeout(function() {
	    		$('#site-footer, .progress-page').addClass('is-animating');
	    	}, 300);
		}

		function removeAminationClass (el) {
	    	$('#site-footer, .progress-page').removeClass('is-animating');
		}	

		sr.reveal('#site-footer .site-footer-inner', { delay: 1000, opacity:1, reset: true, mobile: true, beforeReveal: addAminationClass, afterReset: removeAminationClass });
    } else {
		window.sr = ScrollReveal();

		function addAminationClass (el) {
			setTimeout(function() {
	    		$('.progress-page').addClass('is-animating');
	    	}, 300);
		}

		function removeAminationClass (el) {
	    	$('.progress-page').removeClass('is-animating');
		}

		if( $(window).width() > 1024 ) {
			sr.reveal('.prefooter', { delay: 1000, opacity:1, reset: true, mobile: true, beforeReveal: addAminationClass, afterReset: removeAminationClass });
		} else {
			sr.reveal('#site-footer .site-footer-inner', { delay: 1000, opacity:1, reset: true, mobile: true, beforeReveal: addAminationClass, afterReset: removeAminationClass });			
		}	


    }





	function footerRevealCalcs() {
		var $headerNavSpace = $('.page-header').outerHeight();

		if($(window).height() - $('#wpadminbar').height() - $headerNavSpace - $('#site-footer').height()  > 0) {

			$('body[data-footer-reveal="1"] #primary').css({'margin-bottom': $('#site-footer').height()-1 });
			//let even non reveal footer have min height set when using material ocm
			$('#primary').css({'min-height': $(window).height() - $('#wpadminbar').height() - $headerNavSpace - $('#site-footer').height() -1 });
		} else {
			$('#primary').css({'margin-bottom': $('#site-footer').height()-1 });
		}		
	}

	if ($('body[data-footer-reveal="1"]').length > 0) {
		footerRevealCalcs();
		$(window).resize(function() {
			footerRevealCalcs();
		});		
	}

  }


