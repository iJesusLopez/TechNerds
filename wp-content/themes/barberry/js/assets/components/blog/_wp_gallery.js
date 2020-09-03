
// =============================================================================
// Wordpress Gallery
// =============================================================================

barberry.postGallery = function() {

	$('.reveal').on('click', '.next', function(){
		var next = $(this).parent('.reveal').next('.reveal').attr('id');
		if (next) {
			next = '#' + next;
			$(next).foundation('open');
		}
	});

	$('.reveal').on('click', '.prev', function(){
		var prev = $(this).parent('.reveal').prev('.reveal').attr('id');
		if (prev) {
			prev = '#' + prev;
			$(prev).foundation('open');
		}
	});

	if ($('.reveal.blog-gallery').length) {
		$('.reveal.blog-gallery:first').find('.blog-gallery-btn.prev').hide();
		$('.reveal.blog-gallery:last').find('.blog-gallery-btn.next').hide();
	}

}