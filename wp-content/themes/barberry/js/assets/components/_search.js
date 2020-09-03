// =============================================================================
// Search Init
// =============================================================================

barberry.searchInit = function() {

  $(".header-search").on("click", function() {

    $('form.barberry-ajax-search').find('[type="text"]').devbridgeAutocomplete('hide');

    window.offcanvas_top();

    var tl = gsap.timeline(),
        search_header = $(".search-header");
        tl.fromTo(search_header, 1, {opacity:0}, {ease: Power4.easeIn, opacity:1}, 0);

      $(".offcanvas_aside .woocommerce-product-search .search-field, .offcanvas_aside .widget_search .search-field").focus();


      $(".offcanvas_aside .woocommerce-product-search .search_label").on("click", function() {
        $(".offcanvas_aside .woocommerce-product-search .search_label").fadeOut(200),
        $(".offcanvas_aside .woocommerce-product-search .search-field").focus()
      });

      $(":text").on("input", function() {
        $(".offcanvas_aside .woocommerce-product-search .search_label").fadeOut(200),
        $(".offcanvas_aside .woocommerce-product-search .search-field").focus()
      });


      if (typeof ($.fn.devbridgeAutocomplete) == 'undefined') return;

      var escapeRegExChars = function (value) {
        return value.replace(/[\-\[\]\/\{\}\(\)\*\+\?\.\\\^\$\|]/g, "\\$&");
      };


      $('form.barberry-ajax-search').each(function () {
          var $this = $(this),
            number = parseInt($this.data('count')),
            thumbnail = parseInt($this.data('thumbnail')),
            $results = $this.parent().find('.search-results-wrapp'),
            postType = $this.data('post_type'),
            url = barberry_scripts_vars.ajaxurl + '?action=barberry_ajax_search',
            price = parseInt($this.data('price'));  

          if (number > 0) url += '&number=' + number;
          url += '&post_type=' + postType;

          $results.on('click', '.view-all-results', function () {
            $this.submit();
          });



          $this.find('[type="text"]').devbridgeAutocomplete({
            minChars: 3,
            // showNoSuggestionNotice: true,
            // autoSelectFirst: false,
            // triggerSelectOnValidInput: false,
            serviceUrl: url,
            appendTo: $results,

            onSelect: function (suggestion) {
              if (suggestion.permalink.length > 0)
                window.location.href = suggestion.permalink;
            },
            onSearchStart: function (query) {
              $this.addClass('search-loading');
            },

            onSearchComplete: function (query, suggestions) {
              $this.removeClass('search-loading');
            },

            beforeRender: function (container) {

              // $('.search-results').addClass("products columns-6 product-grid-layout-1");
              // $('.autocomplete-suggestion').addClass("column product");

              if (container[0].childElementCount > 2)
                jQuery(container).append('<div class="view-all-results"><div class="view-all-button button btn--border"><span>' + barberry_scripts_vars.all_results + '</span></div></div>');

            },


            formatResult: function (suggestion, currentValue) {
              if (currentValue == '&') currentValue = "&#038;";
              var pattern = '(' + escapeRegExChars(currentValue) + ')',
                returnValue = '';

              returnValue += '<div class="suggestion-inner-wrapper"><div class="suggestion-inner">';

              if (thumbnail && suggestion.thumbnail) {
                returnValue += ' <div class="suggestion-image">' + suggestion.thumbnail + '</div>';
              }

              returnValue += '<div class="suggestion-details-wrapper">';

              returnValue += '<h4 class="suggestion-title result-title">' + suggestion.value
                .replace(new RegExp(pattern, 'gi'), '<strong>$1<\/strong>')
                // .replace(/&/g, '&amp;')
                .replace(/</g, '&lt;')
                .replace(/>/g, '&gt;')
                .replace(/"/g, '&quot;')
                .replace(/&lt;(\/?strong)&gt;/g, '<$1>') + '</h4>';

              if (suggestion.no_found) returnValue = '<div class="suggestion-title no-found-msg">' + suggestion.value + '</div>';

              if (price && suggestion.price) {
                returnValue += ' <div class="suggestion-price price">' + suggestion.price + '</div>';
              }

              returnValue += '</div>';

              returnValue += '</div></div>';

              return returnValue;
            }           


          });


        $(".offcanvas_aside .woocommerce-product-search .search-clear").on("click", function() {
          $('.search-field').val(""),
          $(".search-field").focus(),
          $this.find('[type="text"]').devbridgeAutocomplete('hide');
        }); 


      });



  });



  var md = new MobileDetect(window.navigator.userAgent);
  var ismobile = md.mobile();

  if (!ismobile && barberry_scripts_vars.typewriter_effect === '1') {
      var typedtext = '^800 ' + barberry_scripts_vars.typewriter_text,
          typedtext_2 = barberry_scripts_vars.typewriter_text_2;

      $(document).one('click', '.header-search', function() {
        var typed = new Typed('.offcanvas_aside .woocommerce-product-search .search_label-text', {
            strings: [typedtext, typedtext_2],
            typeSpeed: 30,
            backSpeed: 20,
        }); 
      });
  }




}
