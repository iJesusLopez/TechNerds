<style>

	/*============================================*/
	/* Product Page Custom Styles ================*/
	/*============================================*/

<?php if (get_field('tdl_full_description')) : ?>

	.single-product .woocommerce-tabs #tab-description {
		padding-bottom: 0;
	}

	.single-product .woocommerce-tabs #tab-description .vc_row.vc_row-flex {
		padding: 0 !important;
	}
	

	.woocommerce #tab-description .grid-container {
		padding-left: 0;
		padding-right: 0;
	}

	.woocommerce #tab-description .cell {
	    width: 100%;
	}	
<?php endif; ?>


</style>