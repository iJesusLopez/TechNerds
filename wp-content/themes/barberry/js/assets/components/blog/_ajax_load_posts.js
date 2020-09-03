
  // =============================================================================
  // Ajax Posts Loading
  // =============================================================================

  barberry.loadingPostsAjax = function() {

	var listing_class 		= ".blog-articles";
	var item_class 			= ".blog-articles article";
	var pagination_class 	= ".posts-navigation";
	var next_page_class 	= ".posts-navigation a.next";
	var ajax_button_class 	= ".posts_ajax_button";
	var ajax_loader_class 	= ".posts_ajax_loader";
	
	var ajax_load_items = {
	    
	    init: function() {

	        if (barberry_scripts_vars.blog_pagination_type == 'load_more_button' || barberry_scripts_vars.blog_pagination_type == 'infinite_scroll') {
	        
		        $(document).ready(function() {
		            
		            if ($(pagination_class).length) {
		                
		                $(pagination_class).before('<div class="pagination-container"><div class="'+ajax_button_class.replace('.', '')+'" data-processing="0"><div class="loadmore"><span>'+barberry_scripts_vars.ajax_loading_locale+'</span><div class="container"><div class="dot"></div><div class="dot"></div><div class="dot"></div></div></div></div>');

		            }		            		            

		        });
		        
		        $('body').on('click', ajax_button_class, function(e) {

		        	e.preventDefault();
		            
		            if ($(next_page_class).length) {
		                
		                $(ajax_button_class).attr('data-processing', 1).addClass('loading');  	                
		                
		                var href = $(next_page_class).attr('href');


		                ajax_load_items.onstart();		            
		                
		                $.get(href, function(response) {
		                    
		                    $(pagination_class).html($(response).find(pagination_class).html());

		                    $(response).find(item_class).each(function() {

		                    	$($(this)).addClass('new');
		                    	$('.blog-articles > article:last').after($(this));	

		                    	if ( barberry_scripts_vars.blog_posts_parallax == '1' ) {
		                    		window.initPrllx();
		                    	}

		                    	if ( barberry_scripts_vars.load_animation == '1' ) {
		                    		barberry.postsNewInview();
		                    	}
		                    	
		                    	
  
		                        $($(this)).removeClass('new');                        

		                    });

		                    $(ajax_button_class).attr('data-processing', 0).removeClass('loading');
		                    
		                    ajax_load_items.onfinish();

		                    if ($(next_page_class).length == 0) {
		                        $(ajax_button_class).addClass('disabled').show();
		                    } else {
		                    	$(ajax_button_class).show();
		                    }

		                });

		            } else {
		                		                
		                $(ajax_button_class).addClass('disabled').show();

		            }

		        });

	        }
	        
	        if (barberry_scripts_vars.blog_pagination_type == 'infinite_scroll') {

		        var buffer_pixels = Math.abs(0);
		        
		        $(window).scroll(function() {
		           
		            if ($(listing_class).length) {
		                
		                var a = $(listing_class).offset().top + $(listing_class).outerHeight();
		                var b = a - $(window).scrollTop();
		                
		                if ((b - buffer_pixels) < $(window).height()) {
		                    if ($(ajax_button_class).attr('data-processing') == 0) {
		                        $(ajax_button_class).trigger('click');
		                    }
		                }

		            }

		        });
	        }
	    },

	    onstart: function() {
	    },

	    onfinish: function() {
	    },

	};

	ajax_load_items.init();

  }