  barberry.splitText = function() {

    var md = new MobileDetect(window.navigator.userAgent);
    var ismobile = md.mobile();

    if ( $(window).width() > 1024 ) {
        if (!ismobile) {
            if ( $('.product-grid-layout-2').length > 0 && $('.product-grid-layout-2 .product').length > 0 ) {
                
                if ( $('.product-grid-layout-2 .product .product-title').length > 0 ) {
                    var $quote = $(".product-grid-layout-2 .product-title a");
                    mySplitText = new SplitText($quote, {type:"lines"}),
                    splitTextTimeline = gsap.timeline();
                    $(".product-grid-layout-2 .product-title a div").wrapInner( "<span></span>");                     
                }
               
            }  

            if ( $('.category-grid-layout-2').length > 0 && $('.category-grid-layout-2 .product-category').length > 0 ) {
                var $quote = $(".category-grid-layout-2 .category-title"),
                mySplitText = new SplitText($quote, {type:"lines"}),
                splitTextTimeline = gsap.timeline();
                $(".category-grid-layout-2 .category-title div").wrapInner( "<span></span>");                
            }                     
        }
    }
  }

  barberry.splitTextNew = function() {

    var md = new MobileDetect(window.navigator.userAgent);
    var ismobile = md.mobile();

    if ( $(window).width() > 1024 ) {
        if (!ismobile) {
            if ( $('.product-grid-layout-2').length > 0 ) {
                var $quote = $(".product-grid-layout-2 .product.new .product-title a"),
                mySplitText = new SplitText($quote, {type:"lines"}),
                splitTextTimeline = gsap.timeline();
                $(".product-grid-layout-2 .product.new .product-title a div").wrapInner( "<span></span>");                
            }                      
        }
    }
  }


  // =============================================================================
  // Product Animation
  // =============================================================================

  barberry.animationProduct = function() {

    var md = new MobileDetect(window.navigator.userAgent);
    var ismobile = md.mobile();

	window.sr = ScrollReveal();

    sr.reveal('ul.products .product', { 
        opacity: 0,
        viewFactor: 0.2,
        afterReveal: revealProductElements,
        beforeReveal: function (domEl) {
            domEl.classList.add('active');
            var product_img = domEl.querySelector('.product-inner .loop-thumbnail img, .category_wrapper .category_image img');
            if (product_img !== null) {
                domEl.visuelRevealTL = gsap.timeline(),
                domEl.visuelRevealTL.fromTo(product_img, {scale:1.1}, {ease: "power4.Out", scale:1, duration: 2},0); 
            }
        } 
    }, 150);


    function revealProductElements (domEl) {
        domEl.classList.add('active');
        var quote = domEl.querySelectorAll('.product-title a div span, .category-title div span'),
            elements = domEl.querySelector('.star-rating, .more-products'),
            price = domEl.querySelector('.price');

        domEl.visuelRevealTL = gsap.timeline();

        if ( $(window).width() > 1024 ) {
            if (!ismobile) {
                if ( $('.product-grid-layout-2').length > 0 ) {
                    domEl.visuelRevealTL.fromTo(quote, {ease: "power4.Out", x:30, y:100, skewX:60, autoAlpha:0}, {ease: "power4.Out", x:0, y:0, skewX:0,  autoAlpha:1, duration: 1}, 0);
                    if (elements !== null) {
                        domEl.visuelRevealTL.fromTo(elements, {y:10, autoAlpha:0}, {ease: "power4.Out", y:0, autoAlpha:1, duration: 2},.4);
                    }
                    if (price !== null) {
                        domEl.visuelRevealTL.fromTo(price, {y:10}, {ease: "power4.Out", y:0, autoAlpha:1, duration: 2},.2);
                    }
                }
                if ( $('.category-grid-layout-2').length > 0 && $('.category-grid-layout-2 .product-category').length > 0 ) {
                    domEl.visuelRevealTL.fromTo(quote, {ease: "power4.Out", x:30, y:100, skewX:60, autoAlpha:0}, {ease: "power4.Out", x:0, y:0, skewX:0,  autoAlpha:1, duration: 1}, 0);
                    if (elements !== null) {
                        domEl.visuelRevealTL.fromTo(elements, {y:10, autoAlpha:0}, {ease: "power4.Out", y:0, autoAlpha:1, duration: 2},.4);
                    }
                    if (price !== null) {
                        domEl.visuelRevealTL.fromTo(price, {y:10}, {ease: "power4.Out", y:0, autoAlpha:1, duration: 2},.2);
                    }
                }                
            }
        }
    }

  }

  // Ajax filter product animation


  barberry.animationNewProduct = function() {

    var md = new MobileDetect(window.navigator.userAgent);
    var ismobile = md.mobile();

    window.sr = ScrollReveal();

    sr.reveal('ul.products .product.new', { 
        opacity: 0,
        viewFactor: 0.2,
        afterReveal: revealProductElements,
        beforeReveal: function (domEl) {
            domEl.classList.add('active');
            var product_img = domEl.querySelector('.product-inner .loop-thumbnail img, .category_wrapper .category_image img');
            if (product_img !== null) {
                domEl.visuelRevealTL = gsap.timeline(),
                domEl.visuelRevealTL.fromTo(product_img, {scale:1.1}, {ease: "power4.Out", scale:1, duration: 2},0); 
            }
        } 
    }, 150);


    function revealProductElements (domEl) {
        domEl.classList.add('active');
        var quote = domEl.querySelectorAll('.product-title a div span, .category-title div span'),
            elements = domEl.querySelector('.star-rating, .more-products'),
            price = domEl.querySelector('.price');

        domEl.visuelRevealTL = gsap.timeline();

        if ( $(window).width() > 1024 ) {
            if (!ismobile) {
                if ( $('.product-grid-layout-2').length > 0 || $('.category-grid-layout-2').length > 0 ) {
                    domEl.visuelRevealTL.fromTo(quote, {ease: "power4.Out", x:30, y:100, skewX:60, autoAlpha:0}, {ease: "power4.Out", x:0, y:0, skewX:0,  autoAlpha:1, duration: 1}, 0);
                    if (elements !== null) {
                        domEl.visuelRevealTL.fromTo(elements, {y:10, autoAlpha:0}, {ease: "power4.Out", y:0, autoAlpha:1, duration: 2},.4);
                    }
                    if (price !== null) {
                        domEl.visuelRevealTL.fromTo(price, {y:10}, {ease: "power4.Out", y:0, autoAlpha:1, duration: 2},.2);
                    }
                }
            }
        }
    }

  }