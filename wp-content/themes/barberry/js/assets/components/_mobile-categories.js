
	// =============================================================================
	// Mobile Categories
	// =============================================================================

	barberry.mobileCategories = function() {

		if( $(window).width() > 1024 ) return;

		var categories = $('.barberry-categories'),
		    subCategories = categories.find('li > ul'),
		    button = $('.barberry-show-categories'),
		    time = 200;

		$('body').on('click', '.barberry-show-categories', function(e) {
		    e.preventDefault();

		    if( isOpened() ) {
		        closeCats();
		    } else {
		            openCats();
		    }
		});

		$('body').on('click', '.list_shop_categories a, .list_blog_categories a', function(e) {
		    closeCats();
		    categories.stop().attr('style', '');
		});

		var isOpened = function() {
		    return $('.barberry-categories').hasClass('categories-opened');
		};

		var openCats = function() {


		    var tl = gsap.timeline(),
		        categories = $(".barberry-categories"),
		        categories_items = $(".barberry-categories li");

		        tl.fromTo(categories, {"max-height":0,autoAlpha: 0}, {"max-height":1000,autoAlpha: 1,ease: "power4.In", duration: 1}, 0);
		        
		        setTimeout(function() {
		            $('.barberry-categories').addClass('categories-opened');
		            $('.barberry-show-categories').addClass('button-open');
		        }, 100);
 
		};

		var closeCats = function() {


		    var tl = gsap.timeline(),
		        categories = $(".barberry-categories"),
		        categories_items = $(".barberry-categories li");

		        tl.fromTo(categories, {"max-height":1000,autoAlpha: 1}, {autoAlpha: 0, "max-height":0,ease: "power3.InOut", duration: 0.3}, 0);		        

		        setTimeout(function() {
			        $('.barberry-show-categories').removeClass('button-open');
			        $('.barberry-categories').removeClass('categories-opened');
		        }, 100);
		       
		};

	}