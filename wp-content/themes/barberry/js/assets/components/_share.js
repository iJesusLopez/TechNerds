
  // =============================================================================
  // Share Init
  // =============================================================================

  barberry.shareInit = function() {

    if ( barberry_scripts_vars.product_share == '0' && barberry_scripts_vars.blog_single_share == '0' ) {
      return;
    }   
    
    var $share_elements = $('.box-share-master-container, .post-share-container').attr("data-share-elem");

    $('.social-sharing').socialShare({
        social: $share_elements,
        animation:'launchpadReverse',
        blur:true
    }); 

  }
