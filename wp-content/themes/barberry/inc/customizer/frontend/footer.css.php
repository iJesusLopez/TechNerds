<style>

	<?php 
	$page_id = barberry_page_ID();
	$hide_footer = get_field('tdl_page_footer' , $page_id);
	?>

	<?php if( $hide_footer ): ?>
		footer#site-footer {
			display: none;
		}

		body[data-footer-reveal="1"] .content-area {
			border-bottom: 0;
			margin-bottom: 0 !important;
		}
	<?php endif; ?>

	<?php if( TDL_Opt::getOption('footer_layout') == '0' ): ?>
		footer#site-footer .copyright-section {
			padding-top: 0;
		}
	<?php endif; ?>

	.progress-page.is-animating .scrolltotop .arrow-top {
    	border-bottom: 2px solid <?php echo esc_html(TDL_Opt::getOption('footer_hover_font_color')) ?>;
    	border-left: 2px solid <?php echo esc_html(TDL_Opt::getOption('footer_hover_font_color')) ?>;
	}

	.progress-page.is-animating .scrolltotop .arrow-top-line {
		background-color: <?php echo esc_html(TDL_Opt::getOption('footer_hover_font_color')) ?>;
	}

	.progress-page.is-animating svg.progress-circle path {
		stroke: <?php echo esc_html(TDL_Opt::getOption('footer_hover_font_color')) ?>;
	}

	body:not(.is-mobile) .progress-page.is-animating:hover {
	    box-shadow: inset 0 0 0 1px <?php echo esc_html(TDL_Opt::getOption('footer_hover_light_gray')) ?>;
	}

	.progress-page.is-animating {
	    box-shadow: inset 0 0 0 1px <?php echo esc_html(TDL_Opt::getOption('footer_hover_light_gray')) ?>;
	}

	footer#site-footer {
		color: <?php echo esc_html(TDL_Opt::getOption('footer_font_color')) ?>;
		background-color: <?php echo esc_html(TDL_Opt::getOption('footer_background_color')) ?>;
	}

	footer#site-footer .footer__wrapper {
		background-color: <?php echo esc_html(TDL_Opt::getOption('footer_hover_background_color')) ?>;
	}

	footer#site-footer.is-animating {
		color: <?php echo esc_html(TDL_Opt::getOption('footer_hover_font_color')) ?>;
	}

	footer#site-footer .social-icons li a,
	footer#site-footer input[type='email'],
	footer#site-footer input[type='submit']:hover,
	footer#site-footer .widget_tag_cloud .tagcloud .tag-cloud-link,
	body.tag-cloud-equal footer#site-footer .widget_tag_cloud .tagcloud .tag-cloud-link:hover:before {
		background: <?php echo esc_html(TDL_Opt::getOption('footer_background_color')) ?>;
	}

	footer#site-footer.is-animating .social-icons li a,
	footer#site-footer.is-animating input[type='email'],
	footer#site-footer.is-animating input[type='submit']:hover,
	footer#site-footer.is-animating .widget_tag_cloud .tagcloud .tag-cloud-link,
	body.tag-cloud-equal footer#site-footer.is-animating .widget_tag_cloud .tagcloud .tag-cloud-link:hover:before {
		transition: background .3s cubic-bezier(.785,.135,.15,.86) .3s; 
		background: <?php echo esc_html(TDL_Opt::getOption('footer_hover_background_color')) ?>;
	}

	footer#site-footer input::placeholder, 
	footer#site-footer textarea::placeholder {
		color: <?php echo esc_html(TDL_Opt::getOption('footer_dark_gray')) ?>;
	}

	footer#site-footer.is-animating input::placeholder, 
	footer#site-footer.is-animating textarea::placeholder {
		color: <?php echo esc_html(TDL_Opt::getOption('footer_hover_dark_gray')) ?>;
	}

	footer#site-footer a,
	footer#site-footer input[type='email'],
	footer#site-footer input[type='submit']:hover,
	footer#site-footer .copyright-section .footer_text a,
	footer#site-footer .widget-area .widget p,
	footer#site-footer .widget .widget-title {
		/*transition-delay:.4s;*/
		transition: color .9s cubic-bezier(.785,.135,.15,.86) .1s, opacity .3s ease 0s; 
		color: <?php echo esc_html(TDL_Opt::getOption('footer_font_color')) ?>;
	}

	footer#site-footer.is-animating a,
	footer#site-footer.is-animating input[type='email'],
	footer#site-footer.is-animating input[type='submit']:hover,
	footer#site-footer.is-animating .copyright-section .footer_text a,
	footer#site-footer.is-animating .widget-area .widget p,
	footer#site-footer.is-animating .widget .widget-title {
		color: <?php echo esc_html(TDL_Opt::getOption('footer_hover_font_color')) ?>;
	}



	footer#site-footer .copyright-section .footer_text a {
		background-image: linear-gradient(to top, <?php echo esc_html(TDL_Opt::getOption('footer_font_color')) ?> 0px, <?php echo esc_html(TDL_Opt::getOption('footer_font_color')) ?> 0px), linear-gradient(to top, rgba(255, 255, 255, 0.1) 0px, rgba(255, 255, 255, 0.1) 0px);
	}

	footer#site-footer.is-animating .copyright-section .footer_text a {
		background-image: linear-gradient(to top, <?php echo esc_html(TDL_Opt::getOption('footer_hover_font_color')) ?> 0px, <?php echo esc_html(TDL_Opt::getOption('footer_hover_font_color')) ?> 0px), linear-gradient(to top, rgba(255, 255, 255, 0.1) 0px, rgba(255, 255, 255, 0.1) 0px);
	}

	footer#site-footer .copyright-section .footer_text a,
	footer#site-footer.is-animating .copyright-section .footer_text a {
            background-position: left bottom, left bottom;
            background-repeat: no-repeat, no-repeat;
            background-size: 0 1px, 100% 1px;
            transition: none 300ms ease-in-out;
            transition-property: background-size, color;
            word-wrap: break-word;
	}
	
	footer#site-footer .copyright-section .footer_text a:hover,
	footer#site-footer.is-animating .copyright-section .footer_text a:hover {
		    background-size: 100% 1px, 100% 1px;
	}


	footer#site-footer .copyright-section .social-icons li a .s-circle_bg,
	footer#site-footer input[type='submit'],
	body.tag-cloud-equal footer#site-footer .widget_tag_cloud .tagcloud .tag-cloud-link:hover {
		background: <?php echo esc_html(TDL_Opt::getOption('footer_font_color')) ?>;
	}

	footer#site-footer.is-animating .copyright-section .social-icons li a .s-circle_bg,
	footer#site-footer.is-animating input[type='submit'],
	body.tag-cloud-equal footer#site-footer.is-animating .widget_tag_cloud .tagcloud .tag-cloud-link:hover {
		background: <?php echo esc_html(TDL_Opt::getOption('footer_hover_font_color')) ?>;
	}

	footer#site-footer input[type='submit'],
	footer#site-footer input[type='email'] {
		border-color: <?php echo esc_html(TDL_Opt::getOption('footer_font_color')) ?>;
	}

	footer#site-footer.is-animating input[type='submit'],
	footer#site-footer.is-animating input[type='email'] {
		border-color: <?php echo esc_html(TDL_Opt::getOption('footer_hover_font_color')) ?>;
	}

	footer#site-footer input[type='submit'],
	body.tag-cloud-equal footer#site-footer .widget_tag_cloud .tagcloud .tag-cloud-link:hover {
		color: <?php echo esc_html(TDL_Opt::getOption('footer_background_color')) ?>;
	}

	footer#site-footer.is-animating input[type='submit'],
	body.tag-cloud-equal footer#site-footer.is-animating .widget_tag_cloud .tagcloud .tag-cloud-link:hover {
		color: <?php echo esc_html(TDL_Opt::getOption('footer_hover_background_color')) ?>;
	}

	footer#site-footer .copyright-section .social-icons li svg {
		fill: <?php echo esc_html(TDL_Opt::getOption('footer_font_color')) ?>;
	}

	footer#site-footer.is-animating .copyright-section .social-icons li svg {
		fill: <?php echo esc_html(TDL_Opt::getOption('footer_hover_font_color')) ?>;
	}

	footer#site-footer .copyright-section .social-icons li a:hover svg {
		fill: <?php echo esc_html(TDL_Opt::getOption('footer_background_color')) ?>;
	}

	footer#site-footer.is-animating .copyright-section .social-icons li a:hover svg {
		fill: <?php echo esc_html(TDL_Opt::getOption('footer_hover_background_color')) ?>;
	}

	.content-area, .blog-content-area, .post-content-area, .product-content-area,
	footer#site-footer .widget-area,
	footer#site-footer .widget_tag_cloud .tagcloud .tag-cloud-link {
		border-color:  <?php echo esc_html(TDL_Opt::getOption('footer_ultra_light_gray')) ?>;
	}

	footer#site-footer.is-animating .widget-area,
	footer#site-footer.is-animating .widget_tag_cloud .tagcloud .tag-cloud-link {
		border-color:  <?php echo esc_html(TDL_Opt::getOption('footer_hover_ultra_light_gray')) ?>;
	}

	footer#site-footer .widget_tag_cloud .tagcloud .tag-cloud-link:before {
		background:  <?php echo esc_html(TDL_Opt::getOption('footer_ultra_light_gray')) ?>;
	}

	footer#site-footer.is-animating .widget_tag_cloud .tagcloud .tag-cloud-link:before {
		background:  <?php echo esc_html(TDL_Opt::getOption('footer_hover_ultra_light_gray')) ?>;
	}

	<?php if( TDL_Opt::getOption('footer_reveal') == '1' || TDL_Opt::getOption('footer_hover') == '0' ): ?>
		.progress-page.is-animating .scrolltotop .arrow-top {
	    	border-bottom: 2px solid <?php echo esc_html(TDL_Opt::getOption('footer_font_color')) ?>;
	    	border-left: 2px solid <?php echo esc_html(TDL_Opt::getOption('footer_font_color')) ?>;
		}

		.progress-page.is-animating .scrolltotop .arrow-top-line {
			background-color: <?php echo esc_html(TDL_Opt::getOption('footer_font_color')) ?>;
		}

		.progress-page.is-animating svg.progress-circle path {
			stroke: <?php echo esc_html(TDL_Opt::getOption('footer_font_color')) ?>;
		}

		body:not(.is-mobile) .progress-page.is-animating:hover {
		    box-shadow: inset 0 0 0 1px <?php echo esc_html(TDL_Opt::getOption('footer_ultra_light_gray')) ?>;
		}

		.progress-page.is-animating {
		    box-shadow: inset 0 0 0 1px <?php echo esc_html(TDL_Opt::getOption('footer_ultra_light_gray')) ?>;
		}
	<?php endif; ?>	

	<?php if( TDL_Opt::getOption('footer_copy_section') == '0' ): ?>
		footer#site-footer .widget-area {
			border-bottom: none;
		}
	<?php endif; ?>

</style>