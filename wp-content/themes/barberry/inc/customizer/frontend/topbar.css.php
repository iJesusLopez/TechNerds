<style>

	<?php 
	$page_id = barberry_page_ID();
	$hide_topbar = get_field('tdl_page_topbar' , $page_id);
	?>

	<?php if( $hide_topbar ): ?>
		.topbar {
			display: none;
		}
	<?php endif; ?>

	.topbar {
		color: <?php echo esc_html(TDL_Opt::getOption('topbar_font_color')) ?>;
		background-color: <?php echo esc_html(TDL_Opt::getOption('topbar_bg_color')) ?>;
	}

	.topbar .navigation-foundation > ul > li > a,
	.topbar .navigation-foundation > ul > li > a:hover,
	.topbar .navigation-foundation > ul > li.is-active > a {
		color: <?php echo esc_html(TDL_Opt::getOption('topbar_font_color')) ?>;
	}

	.topbar {
		border-color:  <?php echo esc_html(TDL_Opt::getOption('topbar_ultra_light_gray')) ?>;
	}

	.topbar .social-icons li a {
		background: <?php echo esc_html(TDL_Opt::getOption('topbar_bg_color')) ?>;
	}

	.topbar .social-icons li a .s-circle_bg {
		background: <?php echo esc_html(TDL_Opt::getOption('topbar_font_color')) ?>;
	}

	.topbar .social-icons li svg {
		fill: <?php echo esc_html(TDL_Opt::getOption('topbar_font_color')) ?>;
	}

	.topbar .social-icons li a:hover svg {
		fill: <?php echo esc_html(TDL_Opt::getOption('topbar_bg_color')) ?>;
	}

	<?php if( TDL_Opt::getOption('topbar_mobile') ): ?>
		@media screen and (max-width: 64.06125em) {
			.topbar {
				display: block;
				text-align: center;
			}

			.topbar .topbar-sections {
			    height: auto;
			}			
			.topbar .topbar-sections .cell {
				flex: none;
			    width:100%;
			}

			.topbar .topbar-sections .topbar-right {
				text-align: center;
			}

			.topbar .topbar-sections .topbar-left .topbar-socials,
			.topbar .topbar-sections .topbar-right .topbar-socials {
				margin-right:0;
				margin-left:0;
			}

			.topbar .topbar-sections .topbar-left .topbar-socials .social-icons li:last-child {
				margin-right:0;
			}

			.topbar .topbar-sections .topbar-right .topbar-socials .social-icons li:first-child {
				margin-left:0;
			}


			.topbar .topbar-sections .topbar-left .topbar-wpml,
			.topbar .topbar-sections .topbar-right .topbar-wpml {
				display: none;
			}				
		}
	
	<?php endif; ?>

</style>