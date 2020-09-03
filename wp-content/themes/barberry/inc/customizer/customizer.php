<?php



	/**
	 * This function adds some styles to the WordPress Customizer
	 */
	function barberry_customizer_styles() { ?>
		<style>
			#customize-control-social_sharing_title .customize-control-title,
			#customize-control-social_network_info .customize-control-title,
			#customize-control-social_login_title .customize-control-title {
			    font-size: 18px;
			    line-height: 1.6;
			    padding: 7px 0;
			    border-bottom: 3px solid #000;
			}			

			#customize-theme-controls #sub-accordion-panel-panel_mega_dropdown {
				display:flex;
				flex-direction: column;
				flex-grow:1;
			}

			#customize-theme-controls #sub-accordion-panel-panel_mega_dropdown > li {
				width: 100%;
			}

			#customize-theme-controls #sub-accordion-panel-panel_mega_dropdown #accordion-panel-panel_mega_dropdown_megamenu {
				order:2;
				border: none;
			}

			#customize-theme-controls #sub-accordion-panel-panel_mega_dropdown #accordion-panel-panel_mega_dropdown_settings {
				border-top: 1px solid #ddd;
			} 

			#customize-control-woocommerce_catalog_columns, #customize-control-woocommerce_catalog_rows {
			    display: none !important;
			}			
		</style>
		<?php

	}
	add_action( 'customize_controls_print_styles',  'barberry_customizer_styles', 999 );
