var barberryAdminModule, barberry_media_init;

(function($) {
    "use strict";


    barberryAdminModule = (function() {

        var barberryAdmin = {
            
            sizeGuideInit : function(){
                if ( $.fn.editTable ) {
                    $( '.barberry-sguide-table-edit' ).each( function() {
                        $( this ).editTable(); 
                    } );
                }
            },

            variationGallery: function () {

                $('#woocommerce-product-data').on('woocommerce_variations_loaded', function () {

                    $('.barberry-variation-gallery-wrapper').each(function () {

                        var $this = $(this);
                        var $galleryImages = $this.find('.barberry-variation-gallery-images');
                        var $imageGalleryIds = $this.find('.variation-gallery-ids');
                        var galleryFrame;

                        $this.find('.barberry-add-variation-gallery-image').on('click', function (event) {
                            event.preventDefault();

                            // If the media frame already exists, reopen it.
                            if (galleryFrame) {
                                galleryFrame.open();
                                return;
                            }

                            // Create the media frame.
                            galleryFrame = wp.media.frames.product_gallery = wp.media({
                                states: [
                                    new wp.media.controller.Library({
                                        filterable: 'all',
                                        multiple: true
                                    })
                                ]
                            });

                            // When an image is selected, run a callback.
                            galleryFrame.on('select', function () {
                                var selection = galleryFrame.state().get('selection');
                                var attachment_ids = $imageGalleryIds.val();

                                selection.map(function (attachment) {
                                    attachment = attachment.toJSON();

                                    if (attachment.id) {
                                        var attachment_image = attachment.sizes && attachment.sizes.thumbnail ? attachment.sizes.thumbnail.url : attachment.url;
                                        attachment_ids = attachment_ids ? attachment_ids + ',' + attachment.id : attachment.id;

                                        $galleryImages.append('<li class="image" data-attachment_id="' + attachment.id + '"><img src="' + attachment_image + '"><a href="#" class="delete barberry-remove-variation-gallery-image"><span class="dashicons dashicons-dismiss"></span></a></li>');

                                        $this.trigger('barberry_variation_gallery_image_added');
                                    }
                                });

                                $imageGalleryIds.val(attachment_ids);

                                $this.parents('.woocommerce_variation').eq(0).addClass('variation-needs-update');
                                $('#variable_product_options').find('input').eq(0).change();

                            });

                            // Finally, open the modal.
                            galleryFrame.open();
                        });

                        // Image ordering.
                        if (typeof $galleryImages.sortable !== 'undefined') {
                            $galleryImages.sortable({
                                items: 'li.image',
                                cursor: 'move',
                                scrollSensitivity: 40,
                                forcePlaceholderSize: true,
                                forceHelperSize: false,
                                helper: 'clone',
                                opacity: 0.65,
                                placeholder: 'wc-metabox-sortable-placeholder',
                                start: function (event, ui) {
                                    ui.item.css('background-color', '#f6f6f6');
                                },
                                stop: function (event, ui) {
                                    ui.item.removeAttr('style');
                                },
                                update: function () {
                                    var attachment_ids = '';

                                    $galleryImages.find('li.image').each(function () {
                                        var attachment_id = $(this).attr('data-attachment_id');
                                        attachment_ids = attachment_ids + attachment_id + ',';
                                    });

                                    $imageGalleryIds.val(attachment_ids);

                                    $this.parents('.woocommerce_variation').eq(0).addClass('variation-needs-update');
                                    $('#variable_product_options').find('input').eq(0).change();
                                }
                            });
                        }

                        // Remove images.
                        $(document).on('click', '.barberry-remove-variation-gallery-image', function (event) {
                            event.preventDefault();
                            $(this).parent().remove();

                            var attachment_ids = '';

                            $galleryImages.find('li.image').each(function () {
                                var attachment_id = $(this).attr('data-attachment_id');
                                attachment_ids = attachment_ids + attachment_id + ',';
                            });

                            $imageGalleryIds.val(attachment_ids);

                            $this.parents('.woocommerce_variation').eq(0).addClass('variation-needs-update');
                            $('#variable_product_options').find('input').eq(0).change();
                        });

                    });

                });
            },


        };

        return {
            init: function() {

                $(document).ready(function() {
                    barberryAdmin.sizeGuideInit();
                    barberryAdmin.variationGallery();
                });

            },

            mediaInit: function(selector, button_selector, image_selector)  {
                var clicked_button = false;
                $(selector).each(function (i, input) {
                    var button = $(input).next(button_selector);
                    button.click(function (event) {
                        event.preventDefault();
                        var selected_img;
                        clicked_button = $(this);
             
                        // check for media manager instance
                        // if(wp.media.frames.gk_frame) {
                        //     wp.media.frames.gk_frame.open();
                        //     return;
                        // }
                        // configuration of the media manager new instance
                        wp.media.frames.gk_frame = wp.media({
                            title: 'Select image',
                            multiple: false,
                            library: {
                                type: 'image'
                            },
                            button: {
                                text: 'Use selected image'
                            }
                        });
             
                        // Function used for the image selection and media manager closing
                        var gk_media_set_image = function() {
                            var selection = wp.media.frames.gk_frame.state().get('selection');
             
                            // no selection
                            if (!selection) {
                                return;
                            }
             
                            // iterate through selected elements
                            selection.each(function(attachment) {
                                var url = attachment.attributes.url;
                                clicked_button.prev(selector).val(attachment.attributes.id);
                                $(image_selector).attr('src', url).show();
                            });
                        };
             
                        // closing event for media manger
                        wp.media.frames.gk_frame.on('close', gk_media_set_image);
                        // image selection event
                        wp.media.frames.gk_frame.on('select', gk_media_set_image);
                        // showing media manager
                        wp.media.frames.gk_frame.open();
                    });
               });
            }

        }

    }());

})(jQuery);

barberry_media_init = barberryAdminModule.mediaInit;

jQuery(document).ready(function() {
    barberryAdminModule.init();
});
