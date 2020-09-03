<?php get_header();

$blog_single_sidebar = TDL_Opt::getOption('blog_single_sidebar');
if (isset($_GET["blog_single_sidebar"])) {
	$blog_single_sidebar = $_GET["blog_single_sidebar"];
}
 ?>

 <!-- begin post-content-area -->
 <div id="primary" class="post-content-area">

	<!-- begin grid-container -->
	<div class="grid-container">

		<!-- begin grid-x align-center -->
		<div class="grid-x align-center">

			<!-- begin post-cells -->
			<div class="small-12 large-10 post-cells cell">

				<!-- begin site-content -->
				<div class="site-content">

					<!-- begin grid-x grid-margin-x -->
					<div class="grid-x grid-margin-x">
						
						<div class="small-12 <?php echo ( 1 == $blog_single_sidebar ) ? 'large-9' : 'large-12' ?> cell site-main-content-wrapper">

							<div class="site-main-content">

								<?php
								while ( have_posts() ) : the_post();

									get_template_part( 'template-parts/content', 'single' );

								endwhile; // End of the loop.
								?>

							</div>	

						</div>


						<?php if ( 1 == $blog_single_sidebar ) : ?>

							<div class="small-12 large-3 cell">
								<div class="right-sidebar-wrapper">
									<?php if (is_active_sidebar( 'sidebar' )) : ?>
										<?php get_sidebar(); ?>
									<?php endif; ?>
								</div>
							</div>

						<?php endif; ?>						

					</div>
					<!-- end grid-x grid-margin-x -->
					
				</div>
				<!-- end site-content -->				
				
			</div>
			<!-- end post-cells -->
			
		</div>
		<!-- end grid-x align-center -->
		
	</div>
	<!-- end grid-container -->

<?php if( get_next_post() || get_previous_post() ) : ?>

	<!-- begin single_navigation_container -->
	<div class="single_navigation_container">

		<!-- begin grid-container -->
		<div class="grid-container">

			<!-- begin single_navigation -->
			<div class="single_navigation">

				<!-- begin grid-x -->
				<div class="grid-x">

					<?php if( get_previous_post() ) : ?>
					    <div class="small-12 <?php echo get_next_post() ? 'medium-6 large-6' : 'medium-12 large-12'; ?> cell">
					    	<div class="nav-previous"><?php previous_post_link( '%link', '<div class="nav-previous-title">'.__( "Previous Reading", "barberry" ).'</div> <span> %title </span>' ); ?></div>
					    </div>
				    <?php endif; ?>
				    
				    <?php if( get_next_post() ) : ?>
					    <div class="small-12 <?php echo get_previous_post() ? 'medium-6 large-6' : 'medium-12 large-12'; ?> cell">
					    	<div class="nav-next"><?php next_post_link( '%link', '<div class="nav-next-title">'.__( "Next Reading", "barberry" ).'</div> <span> %title </span>' ); ?></div>
					    </div>
					<?php endif; ?>
					
				</div>
				<!-- end grid-x -->
				
			</div>
			<!-- end single_navigation -->
			
		</div>
		<!-- end grid-container -->
		
	</div>
	<!-- end single_navigation_container -->

<?php endif; ?>

<?php if( TDL_Opt::getOption('blog_single_related') ) : ?>
	<?php do_action( 'barberry_related_posts'); ?>
<?php endif; ?>

<?php if ( comments_open() || get_comments_number() ) : ?>
<!-- begin single-comments-container -->
<div class="single-comments-container">
	<!-- begin grid-container -->
	<div class="grid-container">
		<!-- begin grid-x align-center -->
		<div class="grid-x align-center">
			<!-- begin small-12 medium-12 large-10 cell -->
			<div class="small-12 medium-10 large-8 cell">
				<?php comments_template(); ?>
			</div>
			<!-- end small-12 medium-12 large-10 cell -->
		</div>
		<!-- end grid-x align-center -->
	</div>
	<!-- end grid-container -->
</div>
<!-- end single-comments-container -->
<?php endif; ?>


</div>
<!-- end #primary -->

<?php
get_footer();