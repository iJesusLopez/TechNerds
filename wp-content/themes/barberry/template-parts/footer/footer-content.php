<?php 
$number_of_widgets = TDL_Opt::getOption('footer_layout');

$footer_align_1 = TDL_Opt::getOption('footer_1_align');
$footer_align_2 = TDL_Opt::getOption('footer_2_align');
$footer_align_3 = TDL_Opt::getOption('footer_3_align');
$footer_align_4 = TDL_Opt::getOption('footer_4_align');
$footer_align_5 = TDL_Opt::getOption('footer_5_align');

if ( $number_of_widgets == 5 ) {
  $grid_class = "small-up-1 medium-up-3 large-up-5";
} 
if ( $number_of_widgets == 4 ) {
  $grid_class = "small-up-1 large-up-4";
} 
else if ( $number_of_widgets == 3 ) {
  $grid_class = "small-up-1 large-up-3";
}
else if ( $number_of_widgets == 2 ) {
  $grid_class = "small-up-1 large-up-2";
}   
else if ( $number_of_widgets == 1 ) {
  $grid_class = "small-up-1 large-up-1";
}

$footer_copy = TDL_Opt::getOption('footer_copy_section'); 
?>


<!-- begin grid-container -->
<div class="grid-container">
	<div class="site-footer-inner">
<?php if( $number_of_widgets !== '0' ) { ?>
		<div class="widget-area">

			<?php if ( $number_of_widgets == 1 ): ?>
				<div class="grid-x grid-padding-x <?php echo esc_attr($grid_class);?>">
					<div class="cell <?php echo esc_attr($footer_align_1);?>"><?php if ( is_active_sidebar( 'footer-sidebar-1' ) ) { ?><?php dynamic_sidebar( 'footer-sidebar-1' ); ?><?php } ?></div> 									
		  		</div>
			<?php endif; ?> 

			<?php if ( $number_of_widgets == 2 ): ?>
				<div class="grid-x grid-padding-x <?php echo esc_attr($grid_class);?>">
					<div class="cell <?php echo esc_attr($footer_align_1);?>"><?php if ( is_active_sidebar( 'footer-sidebar-1' ) ) { ?><?php dynamic_sidebar( 'footer-sidebar-1' ); ?><?php } ?></div> 	
					<div class="cell <?php echo esc_attr($footer_align_2);?>"><?php if ( is_active_sidebar( 'footer-sidebar-2' ) ) { ?><?php dynamic_sidebar( 'footer-sidebar-2' ); ?><?php } ?></div> 							
		  		</div>
			<?php endif; ?> 			

			<?php if ( $number_of_widgets == 3 ): ?>
				<div class="grid-x grid-padding-x <?php echo esc_attr($grid_class);?>">
					<div class="cell <?php echo esc_attr($footer_align_1);?>"><?php if ( is_active_sidebar( 'footer-sidebar-1' ) ) { ?><?php dynamic_sidebar( 'footer-sidebar-1' ); ?><?php } ?></div> 	
					<div class="cell <?php echo esc_attr($footer_align_2);?>"><?php if ( is_active_sidebar( 'footer-sidebar-2' ) ) { ?><?php dynamic_sidebar( 'footer-sidebar-2' ); ?><?php } ?></div> 
					<div class="cell <?php echo esc_attr($footer_align_3);?>"><?php if ( is_active_sidebar( 'footer-sidebar-3' ) ) { ?><?php dynamic_sidebar( 'footer-sidebar-3' ); ?><?php } ?></div> 								
		  		</div>
			<?php endif; ?> 

			<?php if ( $number_of_widgets == 4 ): ?>
				<div class="grid-x grid-padding-x <?php echo esc_attr($grid_class);?>">
					<div class="cell <?php echo esc_attr($footer_align_1);?>"><?php if ( is_active_sidebar( 'footer-sidebar-1' ) ) { ?><?php dynamic_sidebar( 'footer-sidebar-1' ); ?><?php } ?></div> 	
					<div class="cell <?php echo esc_attr($footer_align_2);?>"><?php if ( is_active_sidebar( 'footer-sidebar-2' ) ) { ?><?php dynamic_sidebar( 'footer-sidebar-2' ); ?><?php } ?></div> 
					<div class="cell <?php echo esc_attr($footer_align_3);?>"><?php if ( is_active_sidebar( 'footer-sidebar-3' ) ) { ?><?php dynamic_sidebar( 'footer-sidebar-3' ); ?><?php } ?></div> 	
					<div class="cell <?php echo esc_attr($footer_align_4);?>"><?php if ( is_active_sidebar( 'footer-sidebar-4' ) ) { ?><?php dynamic_sidebar( 'footer-sidebar-4' ); ?><?php } ?></div> 													
		  		</div>
			<?php endif; ?> 

			<?php if ( $number_of_widgets == 5 ): ?>
				<div class="grid-x grid-padding-x <?php echo esc_attr($grid_class);?>">
					<div class="cell <?php echo esc_attr($footer_align_1);?>"><?php if ( is_active_sidebar( 'footer-sidebar-1' ) ) { ?><?php dynamic_sidebar( 'footer-sidebar-1' ); ?><?php } ?></div> 	
					<div class="cell <?php echo esc_attr($footer_align_2);?>"><?php if ( is_active_sidebar( 'footer-sidebar-2' ) ) { ?><?php dynamic_sidebar( 'footer-sidebar-2' ); ?><?php } ?></div> 
					<div class="cell <?php echo esc_attr($footer_align_3);?>"><?php if ( is_active_sidebar( 'footer-sidebar-3' ) ) { ?><?php dynamic_sidebar( 'footer-sidebar-3' ); ?><?php } ?></div> 	
					<div class="cell <?php echo esc_attr($footer_align_4);?>"><?php if ( is_active_sidebar( 'footer-sidebar-4' ) ) { ?><?php dynamic_sidebar( 'footer-sidebar-4' ); ?><?php } ?></div> 
					<div class="cell <?php echo esc_attr($footer_align_5);?>"><?php if ( is_active_sidebar( 'footer-sidebar-5' ) ) { ?><?php dynamic_sidebar( 'footer-sidebar-5' ); ?><?php } ?></div> 																
		  		</div>
			<?php endif; ?> 

			<?php if ( $number_of_widgets == 6 ): ?>
				<div class="grid-x grid-padding-x">
					<div class="cell large-2 medium-4 <?php echo esc_attr($footer_align_1);?>"><?php if ( is_active_sidebar( 'footer-sidebar-1' ) ) { ?><?php dynamic_sidebar( 'footer-sidebar-1' ); ?><?php } ?></div> 	
					<div class="cell large-2 medium-4 <?php echo esc_attr($footer_align_2);?>"><?php if ( is_active_sidebar( 'footer-sidebar-2' ) ) { ?><?php dynamic_sidebar( 'footer-sidebar-2' ); ?><?php } ?></div> 
					<div class="cell large-2 medium-4 <?php echo esc_attr($footer_align_3);?>"><?php if ( is_active_sidebar( 'footer-sidebar-3' ) ) { ?><?php dynamic_sidebar( 'footer-sidebar-3' ); ?><?php } ?></div> 	
					<div class="cell auto large-5 medium-12 medium-offset-0 large-offset-1 <?php echo esc_attr($footer_align_4);?>"><?php if ( is_active_sidebar( 'footer-sidebar-4' ) ) { ?><?php dynamic_sidebar( 'footer-sidebar-4' ); ?><?php } ?></div> 			
		  		</div>
			<?php endif; ?> 

			<?php if ( $number_of_widgets == 7 ): ?>
				<div class="grid-x grid-padding-x">
					<div class="cell large-3 medium-4 <?php echo esc_attr($footer_align_1);?>"><?php if ( is_active_sidebar( 'footer-sidebar-1' ) ) { ?><?php dynamic_sidebar( 'footer-sidebar-1' ); ?><?php } ?></div> 	
					<div class="cell large-3 medium-4 <?php echo esc_attr($footer_align_2);?>"><?php if ( is_active_sidebar( 'footer-sidebar-2' ) ) { ?><?php dynamic_sidebar( 'footer-sidebar-2' ); ?><?php } ?></div> 	
					<div class="cell large-6 medium-4 <?php echo esc_attr($footer_align_3);?>"><?php if ( is_active_sidebar( 'footer-sidebar-3' ) ) { ?><?php dynamic_sidebar( 'footer-sidebar-3' ); ?><?php } ?></div> 			
		  		</div>
			<?php endif; ?> 

			<?php if ( $number_of_widgets == 8 ): ?>
				<div class="grid-x grid-padding-x">
					<div class="cell large-3 medium-4 <?php echo esc_attr($footer_align_1);?>"><?php if ( is_active_sidebar( 'footer-sidebar-1' ) ) { ?><?php dynamic_sidebar( 'footer-sidebar-1' ); ?><?php } ?></div> 	
					<div class="cell large-6 medium-4 <?php echo esc_attr($footer_align_2);?>"><?php if ( is_active_sidebar( 'footer-sidebar-2' ) ) { ?><?php dynamic_sidebar( 'footer-sidebar-2' ); ?><?php } ?></div> 	
					<div class="cell large-3 medium-4 <?php echo esc_attr($footer_align_3);?>"><?php if ( is_active_sidebar( 'footer-sidebar-3' ) ) { ?><?php dynamic_sidebar( 'footer-sidebar-3' ); ?><?php } ?></div> 			
		  		</div>
			<?php endif; ?> 

			<?php if ( $number_of_widgets == 9 ): ?>
				<div class="grid-x grid-padding-x">
					<div class="cell large-6 medium-4 <?php echo esc_attr($footer_align_1);?>"><?php if ( is_active_sidebar( 'footer-sidebar-1' ) ) { ?><?php dynamic_sidebar( 'footer-sidebar-1' ); ?><?php } ?></div> 	
					<div class="cell large-3 medium-4 <?php echo esc_attr($footer_align_2);?>"><?php if ( is_active_sidebar( 'footer-sidebar-2' ) ) { ?><?php dynamic_sidebar( 'footer-sidebar-2' ); ?><?php } ?></div> 	
					<div class="cell large-3 medium-4 <?php echo esc_attr($footer_align_3);?>"><?php if ( is_active_sidebar( 'footer-sidebar-3' ) ) { ?><?php dynamic_sidebar( 'footer-sidebar-3' ); ?><?php } ?></div> 			
		  		</div>
			<?php endif; ?> 
		</div>
<?php } ?>

<?php if ( $footer_copy != 0 ): ?> 

	<!-- begin copyright-section -->
	<div class="copyright-section">
		<!-- begin grid-x -->
		<div class="grid-x grid-padding-x">

			<!-- begin cell -->
			<div class="cell large-4">
				<?php if ( TDL_Opt::getOption('footer_social') ) barberry_socials(); ?>
			</div>
			<!-- end cell -->
			<!-- begin cell -->
			<div class="cell large-4 footer_text">
				<?php echo TDL_Opt::getOption('footer_text') ?>
			</div>
			<!-- end cell -->
			<!-- begin cell -->
			<div class="cell large-4 footer-payment">

				<?php if ( TDL_Opt::getOption('footer_payment_options_on') ): ?>
					<div class="footer-credit-card-icons">						
						<?php	
							$payment_options = TDL_Opt::getOption('footer_payment_options');
							if(is_array($payment_options)) { 
								foreach($payment_options as $opt) {
									if (isset($opt['payment_option_image'])) {
										if (is_numeric($opt['payment_option_image'])) {
											$opt_img = wp_get_attachment_image_src($opt['payment_option_image']);
											if (isset($opt_img[0]))
											echo '<img src="'.$opt_img[0].'" alt="'.sprintf(__('%s', 'barberry'), $opt['payment_option_name']).'" title="'.sprintf(__('%s', 'barberry'), $opt['payment_option_name']).'"/>';
										} else {
											echo '<img src="'.$opt['payment_option_image'].'" alt="'.sprintf(__('%s', 'barberry'), $opt['payment_option_name']).'" title="'.sprintf(__('%s', 'barberry'), $opt['payment_option_name']).'"/>';
										}
									}
								}
							}
						?>
					</div>	
				<?php endif; ?> 
							
			</div>
			<!-- end cell -->			
		</div>
		<!-- end grid-x -->		
	</div>
	<!-- end copyright-section -->

<?php endif; ?>

</div> 

</div>  
<!-- end grid-container -->


