<?php
/*
Template Name: Page with Right Sidebar
*/

get_header(); ?>


<!-- begin content-area -->
<div id="primary" class="content-area page-right-sidebar">
	<!-- begin site-content -->
	<div id="content" class="site-content" role="main">
		<!-- begin grid-container -->
		<div class="grid-container content-page-wrapper">
			<!-- begin grid-x -->
			<div class="grid-x grid-margin-x">

				<!-- begin cell -->
				<div class="cell large-9">
					
					<?php
					// Start the loop.
					while ( have_posts() ) :
						the_post();

						// Include the page content template.
						get_template_part( 'template-parts/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) {
							comments_template();
						}

						// End of the loop.
					endwhile;
					?>
					
				</div><!-- end cell large-12 -->	

				<div class="sidebar-container small-12 large-3 cell">
                    <?php if ( is_active_sidebar( 'sidebar' ) ) { ?>
                        <div id="secondary" class="widget-area" role="complementary">
                            <?php dynamic_sidebar( 'sidebar' ); ?>
                        </div>
                    <?php } ?>					
				</div>
					
			</div><!-- end grid-x -->
		</div><!-- end grid-container -->
	</div><!-- end site-content -->
</div><!-- end content-area -->


<?php get_footer(); ?>
