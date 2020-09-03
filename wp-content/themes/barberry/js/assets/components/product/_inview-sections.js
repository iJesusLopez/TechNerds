
// =============================================================================
// Product Section InView Animations
// =============================================================================

barberry.productInview = function() {

    if ( barberry_scripts_vars.load_animation == '0' ) {
      return;
    }

	window.sr = ScrollReveal();

    sr.reveal('.single-product .single-bottom-inview', {
        mobile: false,
        beforeReveal: function (domEl) {
            domEl.visuelRevealTL = gsap.timeline(),
            domEl.visuelRevealTL.fromTo(domEl, {y:40, autoAlpha:0}, {ease: "power4.InOut",y:0, autoAlpha:1, duration: 2},0); 
        } 
    }); 

}