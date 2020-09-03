<header <?php barberry_header_classes() ?>>
	<!-- begin header-inner -->
	<div class="header-inner">
		<!-- begin header-wrapper -->
		<div class="header-wrapper grid-container">
			<!-- begin header-sections -->
			<div class="header-sections grid-x align-middle">

				<!-- begin left-nav -->
				<div class="left-nav barberry-navigation cell auto">
					<nav class="navigation-foundation">
						<?php barberry_header_menu(); ?>

						<div class="menu-trigger grid-x align-middle">
							<div class="nav_burger cell shrink">
								<span class="burger_top"></span>
								<span class="burger_middle"></span>
								<span class="burger_bottom"></span>
							</div>
							<div class="menu-title cell auto">
								<span><?php esc_html_e( 'Menu', 'barberry' ); ?></span>
							</div>
						</div>
					</nav>
				</div>
				<!-- end left-nav -->
				
				<!-- begin site-branding -->
				<div class="site-branding cell shrink text-center">

					<?php
					if ( !empty( TDL_Opt::getOption('header_logo')) ) {

						if (is_ssl()) {
							$site_logo = str_replace("http://", "https://", TDL_Opt::getOption('header_logo'));
							$site_logo_light = str_replace("http://", "https://", TDL_Opt::getOption('header_logo_light'));
						} else {
							$site_logo = TDL_Opt::getOption('header_logo');
							$site_logo_light = TDL_Opt::getOption('header_logo_light');					
						}

						if ( ! empty( TDL_Opt::getOption('header_logo_sticky')) ) {
							if (is_ssl()) {
								$sticky_header_logo = str_replace("http://", "https://", TDL_Opt::getOption('header_logo_sticky'));		
							} else {
								$sticky_header_logo = TDL_Opt::getOption('header_logo_sticky');
							}
						}					

					?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<?php if ( ! empty( TDL_Opt::getOption('header_logo')) ) { ?>
								<img class="site-logo" src="<?php echo esc_url($site_logo); ?>" title="<?php bloginfo( 'description' ); ?>" alt="<?php bloginfo('name'); ?>">
							<?php } ?>
							
							<?php if ( ! empty( TDL_Opt::getOption('header_logo_light')) ) { ?>
								<img class="site-logo-light" src="<?php echo esc_url($site_logo_light); ?>" title="<?php bloginfo( 'description' ); ?>" alt="<?php bloginfo('name'); ?>">	
							<?php } ?>				

	                        <?php if ( ! empty( TDL_Opt::getOption('header_logo_sticky')) ) { ?>
	                        	<img class="sticky-logo" src="<?php echo esc_url($sticky_header_logo); ?>" title="<?php bloginfo( 'description' ); ?>" alt="<?php bloginfo( 'name' ); ?>" />
	                        <?php } ?>						
						</a>

					 <?php } else { ?>

					 	<div class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></div>

					 <?php } ?>

				</div>
				<!-- end site-branding -->

				<!-- begin tools -->
				<div class="tools cell auto text-right">

					<!-- begin header-expanded-view -->
					<div class="header-expanded-view">
						<div class="header-expanded-view-inner">
							<?php echo barberry_header_search(); ?>
							<?php echo barberry_header_wishlist(); ?>
							<?php echo barberry_header_compare(); ?>
				            <?php echo barberry_header_account(); ?>							
						</div>
					</div>
					<!-- end header-expanded-view -->

					<?php echo barberry_header_cart(); ?>

				</div>
				<!-- end tools -->

				
			</div>
			<!-- end header-sections -->
		</div>
		<!-- end header-wrapper -->
	</div>
	<!-- end header-inner -->
</header>