
// =============================================================================
// Posts  InView Animations
// =============================================================================

barberry.postsInview = function() {

	window.sr = ScrollReveal();

    sr.reveal('.blog-articles article', {
        opacity: 0,
        duration: 1600,
        mobile: true,
        viewFactor: 0,
    }); 

}

barberry.postsNewInview = function() {

    window.sr = ScrollReveal();

    sr.reveal('.blog-articles article.new', {
        opacity: 0,
        duration: 1600,
        mobile: true,
        viewFactor: 0,
    }); 

}