
  // =============================================================================
  // Parallax Init
  // =============================================================================

  barberry.parallaxInit = function() {

	var md = new MobileDetect(window.navigator.userAgent);
	var ismobile = md.mobile();

    if (!ismobile) {

        ParallaxScroll.init();

    }

	var rellax = new Rellax('.rellax', {});
  }



