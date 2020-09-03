<?php
	get_header();
	global $wp_query;
 ?>

 <!-- begin content-area -->
 <div id="primary" class="blog-content-area">

	<div class="grid-container">
		<div class="grid-x align-center">
			<div class="small-12 large-10 blog-list-cells cell">

				<div class="site-content">

					<div class="blog-listing">

						<div class="grid-x grid-margin-x">

							<div class="small-12 <?php echo ( 1 == TDL_Opt::getOption('blog_sidebar') ) ? 'large-9' : 'large-12' ?> cell site-main-content-wrapper">
								<div class="site-main-content">

									<div class="blog-articles">
										<?php
										if (	
											! (( TDL_Opt::getOption('blog_highlighted_posts')==1)  &&
											( ($wp_query->found_posts <= 3) || get_option('posts_per_page') <= 3 ))

										):
											if ( have_posts() ) :
												while ( have_posts() ) : the_post();
													get_template_part( 'template-parts/content', get_post_format() );
												endwhile;
											else :
												get_template_part( 'template-parts/content', 'none' );
											endif;
										endif;
										?>
									</div>

									<?php 
									barberry_the_posts_navigation();
									?> 
									
								</div>
							</div>

							<?php if ( 1 == TDL_Opt::getOption('blog_sidebar') ) : ?>
								<div class="small-12 large-3 cell">
									<div class="right-sidebar-wrapper">
										<?php if (is_active_sidebar( 'sidebar' )) : ?>
											<?php get_sidebar(); ?>
										<?php endif; ?>
									</div>
								</div>		
							<?php endif; ?>
						</div>

					</div>

				</div>

			</div>
		</div>
	</div>

</div>
<!-- end content-area -->
<?php get_footer();
