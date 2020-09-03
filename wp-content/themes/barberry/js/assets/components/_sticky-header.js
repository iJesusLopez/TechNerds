
  // =============================================================================
  // Sticky Header
  // =============================================================================

  barberry.stickyHeader = function() {

    if ( barberry_scripts_vars.sticky_header == '0' ) {
      return;
    }

    // Options
    var options = {
        offset: 300,
        throttle: 50,
        classes: {
            clone:   'header--clone',
            stick:   'header--stick',
            unstick: 'header--unstick'
        },
    }

    // Create a new instance of Headhesive.js and pass in some options
    var header = new Headhesive('.site-header', options);

    

  }


