<?php 
$topbar_left = get_theme_mod( 'topbar_left', array( 'socials', 'contact' ) );
$topbar_right = get_theme_mod( 'topbar_right', array( 'wpml', 'socials' ) );
?>

<div class="topbar">
	<!-- begin grid-container -->
	<div class="grid-container">

		<!-- begin topbar-sections -->
		<div class="topbar-sections grid-x align-middle">

			<!-- begin topbar-left -->
			<div class="topbar-left cell auto">	

				<?php if ( in_array('socials', $topbar_left) ) : ?>
					<div class="topbar-socials">				        		                            
				        <?php barberry_socials(); ?>				        
					</div>
				<?php endif; ?>							

				<?php if ( in_array('contact', $topbar_left) ) : ?>
					<div class="topbar-contact">				        		                            
				        <?php echo TDL_Opt::getOption('topbar_contact'); ?>				        
					</div>
				<?php endif; ?>				
				
			</div>
			<!-- end topbar-left -->

			<!-- begin topbar-right -->
			<div class="topbar-right cell shrink">

				<?php if ( in_array('wpml', $topbar_right) ) : ?>
					<div class="topbar-wpml">				        		                            
						<?php barberry_language_currency(); ?>		        
					</div>
				<?php endif; ?>					

				<?php if ( in_array('socials', $topbar_right) ) : ?>
					<div class="topbar-socials">				        		                            
				        <?php barberry_socials(); ?>				        
					</div>
				<?php endif; ?>	

			</div>
			<!-- end topbar-right -->		

		</div>
		<!-- end topbar-sections -->

	</div>
	<!-- end grid-container -->
</div>