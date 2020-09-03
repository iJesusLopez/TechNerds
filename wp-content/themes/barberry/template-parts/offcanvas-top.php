<!-- begin offcanvas_search -->
<div class="offcanvas_search woocommerce">
	<!-- begin grid-container -->
	<div class="grid-container">

		<button class="close-icon">
			<span class="close-icon_top"></span>
			<span class="close-icon_bottom"></span>
		</button>

		<!-- begin search-header -->
		<div class="search-header">

			<p class="search-text"><?php esc_html_e('What are you looking for?', 'barberry'); ?></p>
			<?php
			barberry_search_form( array(
				'ajax' => TDL_Opt::getOption('predictive_search'),
				'count' => intval( TDL_Opt::getOption('predictive_search_no') ),
				'post_type' => TDL_Opt::getOption('post_type'),
				'type' => 'form',
			) );
			?>			
		</div>
		<!-- end search-header -->

	</div>
	<!-- end grid-container -->
</div>
<!-- end offcanvas_search -->