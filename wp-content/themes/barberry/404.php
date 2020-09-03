<?php
get_header(); ?>

<!-- begin content-area -->
<div id="primary" class="content-area">
	<!-- begin site-content -->
	<div id="content" class="site-content" role="main">
		<!-- begin grid-container -->
		<div class="grid-container content-page-wrapper">
			<!-- begin grid-x -->
			<div class="grid-x grid-margin-x  align-center">
				<!-- begin cell -->
				<div class="cell medium-8 large-9">
					
				<section class="error-404 not-found">

					<header class="page-header">
						<!-- begin page-title-wrapper -->
						<div class="page-title-wrapper">
							<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'barberry' ); ?></h1>
						</div>
						<!-- end page-title-wrapper -->
						
					</header>

					<div class="page-content">
						<div class="error-404-description"><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'barberry' ); ?></div>
						<div class="error-404-searchform"><?php get_search_form(); ?></div>
					</div>
				</section>
					
				</div><!-- end cell large-12 -->		
			</div><!-- end grid-x -->
		</div><!-- end grid-container -->
	</div><!-- end site-content -->
</div><!-- end content-area -->


<?php get_footer(); ?>
