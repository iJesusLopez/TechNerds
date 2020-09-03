
  // =============================================================================
  // Page Loader
  // =============================================================================

  barberry.pageLoader = function() {

    if ( barberry_scripts_vars.page_loader == '0' ) {
      return;
    }

	$(window).on('pagehide', function (e) {

		if ( e.persisted) {
		    $('#bb-container').addClass('fade_out').removeClass('fade_in');
		    $('#header-loader-under-bar').removeClass('hidden');
		}
	})

	$(window).load(function(e) {
	    $('#bb-container').addClass('fade_in').removeClass('fade_out');
	    $('#header-loader-under-bar').addClass('hidden');
	    NProgress.done();
	})

  }