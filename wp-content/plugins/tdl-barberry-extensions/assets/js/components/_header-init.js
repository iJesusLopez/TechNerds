jQuery(function($) {

	"use strict";

	var barberryExt = barberryExt || {};
	barberryExt.init = function() {
		barberryExt.$body = $(document.body),
			barberryExt.$window = $(window),
			barberryExt.$header = $('.site-header'),

			this.sliderInit();
			this.CollectionsSliderInit();
			this.vcProductSlider();
			// this.loadingAjaxExt();
			
		};