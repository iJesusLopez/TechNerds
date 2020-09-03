
	// =============================================================================
	// Sticky Sidebar
	// =============================================================================

	barberry.stickyShopSidebar = function() {

        if ( barberry_scripts_vars.shop_sticky_sidebar == '0' || $("body").hasClass("single-product")) {
            return;
        }

        var $headerHeight = 40;

        if ($(".header--clone").length > 0) {
            $headerHeight = 100;
        }

        $('.shop-sidebar-container').stickySidebar({
            topSpacing: $headerHeight,
            bottomSpacing: 40,
            resizeSensor: true,
            minWidth: 1024,
            containerSelector: '.main-shop-container',
            innerWrapperSelector: '.woocommerce-sidebar-inside'
        });

	}

    // =============================================================================
    // Sticky Sidebar
    // =============================================================================

    barberry.stickySidebarBtn = function() {


        var $trigger = $('.barberry-show-sidebar-btn');
        var $stickyBtn = $('.shop-sidebar-btn');

        if ($stickyBtn.length <= 0 || $trigger.length <= 0 || $(window).width() >= 1024) return;

        var stickySidebarBtnToggle = function () {
            var btnOffset = $trigger.offset().top + $trigger.outerHeight();
            var windowScroll = $(window).scrollTop();

            if (btnOffset < windowScroll) {
                $stickyBtn.addClass('barberry-sidebar-btn-shown');
            } else {
                $stickyBtn.removeClass('barberry-sidebar-btn-shown');
            }
        };

        stickySidebarBtnToggle();

        $(window).scroll(stickySidebarBtnToggle);
        $(window).resize(stickySidebarBtnToggle);

    }