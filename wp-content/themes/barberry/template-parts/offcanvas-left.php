<div class="offcanvas_mainmenu">

	<div class="close-icon">
		<span class="close-icon_top"></span>
		<span class="close-icon_bottom"></span>
	</div>



	<!-- begin offcanvas-navs -->
	<div class="offcanvas-navs">
		<div class="header-mobiles-primary-menu">
			<?php 

				$items_wrap = '<ul id="%1$s" class="%2$s" data-drilldown data-close-on-click="true" data-auto-height="true" data-animate-height="true" data-parent-link="true" data-back-button="&lt;li class&#x3D;&quot;js-drilldown-back&quot;&gt;&lt;a tabindex&#x3D;&quot;0&quot;&gt;'.esc_html__( 'Back', 'barberry' ).'&lt;/a&gt;&lt;/li&gt;">%3$s</ul>';

				$theme_location = 'primary';

				if ( has_nav_menu( 'mobile-menu' ) ) {
					$theme_location = 'mobile-menu';
				} else {
					$theme_location = 'primary';
				}

				wp_nav_menu(array(
					'theme_location'    => $theme_location,
					'container'         => false,
					'menu_class'        => 'vertical menu drilldown mobile-menu',
					'menu_class2'        => 'vertical2',
					'items_wrap'        => $items_wrap,
					'link_before'       => '<span>',
					'link_after'        => '</span>',
					'fallback_cb'     	=> '',
					'walker'            => new Barberry_Drilldown_Menu_Walker(),
				));
			?>	
		</div>

		<div class="header-mobiles-account-menu">
			<?php echo barberry_mob_account(); ?>
		</div>		
	</div>
	<!-- end offcanvas-navs -->


	<?php $offcanvas_bottom = get_theme_mod( 'offcanvas_bottom', array( 'socials', 'contact', 'wpml' ) ); ?>

	<?php if ( in_array('socials', $offcanvas_bottom) || in_array('contact', $offcanvas_bottom) || in_array('wpml', $offcanvas_bottom)  ) : ?>
	<div class="offcanvas-bottom">
		<hr class="menu-horizontal-rule">

		<?php if ( in_array('socials', $offcanvas_bottom)  ) : ?>
			<?php barberry_socials(); ?>
		<?php endif; ?>

		<!-- begin offcanvas-contact-section -->
			<div class="offcanvas-contact-section">
				<?php if ( in_array('contact', $offcanvas_bottom) ) : ?>
					<div class="offcanvas-contact">				        		                            
				        <?php echo TDL_Opt::getOption('offcanvas_contact'); ?>				        
					</div>
				<?php endif; ?>	

				<?php if ( in_array('wpml', $offcanvas_bottom) ) : ?>
					<div class="offcanvas-wpml">
						<?php barberry_language_currency_offcanvas(); ?>
					</div>
				<?php endif; ?>					
			</div>
			<!-- end offcanvas-contact-section -->	

				

	</div>
	<?php endif; ?>	



</div>

<?php if ( TDL_Opt::getOption('shop_sidebar') && barberry_is_shop_archive() ) { ?>

<div class="offcanvas_sidebars">

	<div class="close-icon">
		<span class="close-icon_top"></span>
		<span class="close-icon_bottom"></span>
	</div>	

	<?php 
	  // Is this a woocommerce page?
	    if ( is_active_sidebar( 'widgets-product-listing' ) ) : ?>
	      <div class="offcanvas_shop_sidebar">
		      	<div class="woocommerce-sidebar-inside">
		            <div class="widget-area">
		                <?php dynamic_sidebar( 'widgets-product-listing' ); ?>
		            </div>
		        </div>
	        </div>
	    <?php endif;          
	?>	
</div>

<?php } ?>

<?php if ( TDL_Opt::getOption('product_sidebar') && is_singular( "product" ) ) { ?>

<div class="offcanvas_sidebars">

	<div class="close-icon">
		<span class="close-icon_top"></span>
		<span class="close-icon_bottom"></span>
	</div>	

	<?php 
	  // Is this a woocommerce page?
	    if ( is_active_sidebar( 'widgets-single-product' ) ) : ?>
	      <div class="offcanvas_shop_sidebar">
		      	<div class="woocommerce-sidebar-inside">
		            <div class="widget-area">
		                <?php dynamic_sidebar( 'widgets-single-product' ); ?>
		            </div>
		        </div>
	        </div>
	    <?php endif;          
	?>	
</div>

<?php } ?>
