<?php
/*
Template Name: Full Width Page
*/

get_header(); ?>

<!-- begin content-area -->
<div id="primary" class="full-width-page content-area">
	<!-- begin site-content -->
	<div id="content" class="site-content" role="main">
		<!-- begin grid-container -->
		<div class="grid-container content-page-wrapper">
			<!-- begin grid-x -->
			<div class="grid-x grid-margin-x">
				<!-- begin cell -->
				<div class="cell large-12">
					
					<?php while ( have_posts() ) : the_post(); ?>
        
                        <div class="entry-content">
                            <?php the_content(); ?>
                        </div><!-- end entry-content -->
                        
                        <?php
                    
							// If comments are open or we have at least one comment, load up the comment template
							if ( comments_open() || '0' != get_comments_number() ) comments_template();
							
						?>
        
                    <?php endwhile; // end of the loop. ?>
					
				</div><!-- end cell large-12 -->		
			</div><!-- end grid-x -->
		</div><!-- end grid-container -->
	</div><!-- end site-content -->
</div><!-- end content-area -->

<?php get_footer(); ?>
