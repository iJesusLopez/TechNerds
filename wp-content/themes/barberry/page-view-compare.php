<?php

/*
  Template name: Barberry View Compare
  This templates View products in compare.
 */

 global $yith_woocompare;
if (!$yith_woocompare) :
    wp_redirect(esc_url(home_url('/')));
endif;

get_header(); ?>


<!-- begin content-area -->
<div id="primary" class="default-width-page content-area">
	<!-- begin site-content -->
	<div id="content" class="site-content" role="main">
		<!-- begin grid-container -->
		<div class="grid-container content-page-wrapper">
			<!-- begin grid-x -->
			<div class="grid-x grid-margin-x">
				<!-- begin cell -->
				<div class="cell large-12">
					
					<?php
					// Compare products
					barberry_products_compare_content(true);

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
	<div class="prefooter"></div>
</div><!-- end content-area -->


<?php get_footer(); ?>
