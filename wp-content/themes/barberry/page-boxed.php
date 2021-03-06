<?php
/*
Template Name: Boxed Layout
*/

get_header(); ?>


<!-- begin content-area -->
<div id="primary" class="content-area page-boxed">
	<!-- begin site-content -->
	<div id="content" class="site-content" role="main">
		<!-- begin grid-container -->
		<div class="grid-container content-page-wrapper">
			<!-- begin grid-x -->
			<div class="grid-x grid-margin-x">
				<!-- begin cell -->
				<div class="cell medium-offset-1 large-offset-2 medium-10 large-8">
					
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
			</div><!-- end grid-x -->
		</div><!-- end grid-container -->
	</div><!-- end site-content -->
</div><!-- end content-area -->


<?php get_footer(); ?>
