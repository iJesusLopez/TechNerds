
  // =============================================================================
  // Navigation Init
  // =============================================================================

  barberry.navigationInit = function() {

    var overlay_triggers_list = [
        
        ".barberry-navigation .navigation-foundation > ul > .is-dropdown-submenu-parent",
        ".my-account-has-drop:not(.my-account-form)",

    ];

    var overlay_triggers = overlay_triggers_list.join(", ");

    $(overlay_triggers)

    .mouseenter(function(e) {
        $('.site-header').attr('data-sticky', 'visible');
        $('.navigation_overlay').addClass('visible').trigger("show.br.overlay_content");

    })

    .mouseleave(function(e) {
        $('.navigation_overlay').removeClass('visible').trigger("hide.br.overlay_content");
        $('.site-header').removeAttr('data-sticky', 'visible');
    });


    // Header Overlay

    var overlay_triggers_list = [
      
      ".topbar .navigation-foundation > ul"

    ];

    var overlay_triggers = overlay_triggers_list.join(", ");

    $(overlay_triggers)

    .mouseenter(function(e) {
      $('.topbar_overlay').addClass('visible');
    })

    .mouseleave(function(e) {
      $('.topbar_overlay').removeClass('visible');
    });

    // Megamenu Dropdown Offset

    var mainMenu = $('.navigation-foundation').find('ul.dropdown'),
        lis = mainMenu.find(' > li.is-mega-menu');

    mainMenu.on('hover', ' > li.is-mega-menu', function (e) {
      setOffset($(this));
    });

    var setOffset = function (li) {

      var dropdown = li.find(' > .dropdown-submenu'),
          styleID = 'arrow-offset',
          siteWrapper = $('.bb-container');

      dropdown.attr('style', '');

      var dropdownWidth = dropdown.outerWidth(),
        dropdownOffset = dropdown.offset(),
        screenWidth = $(window).width(),
        bodyRight = siteWrapper.outerWidth() + siteWrapper.offset().left,
        viewportWidth = screenWidth,
        extraSpace = 0;

        if (!dropdownWidth || !dropdownOffset) return;

      var dropdownOffsetRight = screenWidth - dropdownOffset.left - dropdownWidth;

        if ($('body').hasClass('rtl') && dropdownOffsetRight + dropdownWidth >= viewportWidth && (li.hasClass('is-mega-menu'))) {

          var toLeft = dropdownOffsetRight + dropdownWidth - viewportWidth;

          dropdown.css({
            right: - toLeft - extraSpace
          });

        } else if (dropdownOffset.left + dropdownWidth >= viewportWidth && (li.hasClass('is-mega-menu'))) {
          // If right point is not in the viewport
          var toRight = dropdownOffset.left + dropdownWidth - viewportWidth;

          dropdown.css({
            left: - toRight - extraSpace
          });
        }

    };

    lis.each(function () {
      setOffset($(this));
      $(this).addClass('with-offsets');
    });    

  }

