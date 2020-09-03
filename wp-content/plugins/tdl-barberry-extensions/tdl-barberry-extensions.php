<?php
/**
 * Plugin Name: Barberry Theme Extensions
 * Plugin URI: http://barberry.temashdesign.com/
 * Description: Extends the functionality of Barberry with theme specific shortcodes and page builder elements.
 * Version: 1.8
 * Author: TemashDesign
 * Author URI: http://temashdesign.com
 *
 * @package  Barberry Theme Extensions
 * @author TemashDesign
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! defined( 'BARBERRY_ADDONS_DIR' ) ) {
	define( 'BARBERRY_ADDONS_DIR', plugin_dir_path( __FILE__ ) );
}

if ( ! defined( 'BARBERRY_ADDONS_URL' ) ) {
	define( 'BARBERRY_ADDONS_URL', plugin_dir_url( __FILE__ ) );
}

$theme = wp_get_theme();
if ( $theme->template != 'barberry') {
	return;
}

require_once BARBERRY_ADDONS_DIR . 'post-types.php';

require_once BARBERRY_ADDONS_DIR . '/includes/widgets/widgets.php';

function barberry_enqueue_script() {   
    wp_enqueue_script( 'barberry-shortcodes', BARBERRY_ADDONS_URL . 'assets/js/barberry-frontend.js', array( 'jquery' ), '1.4.1', true );
}
add_action('wp_enqueue_scripts', 'barberry_enqueue_script');


include_once 'includes/wp/blog-posts.php';
include_once 'includes/wp/from-the-blog-listing.php';
include_once 'includes/wp/custom-button.php';
include_once 'includes/wp/custom-link.php';
include_once 'includes/wp/google-map.php';
include_once 'includes/wp/social-media-profiles.php';
include_once 'includes/wp/slider.php';
include_once 'includes/wp/collections-slider.php';

include_once 'includes/wc/search-products.php';

//Mixed shortcodes
include_once 'includes/mixed/recent-products-mixed.php';
include_once 'includes/mixed/blog-posts-mixed.php';

//Sliders shortcodes
include_once 'includes/sliders/recent-products-slider.php';

//Listing shortcodes
// include_once 'includes/listing/recent-products-listing.php';

/******************************************************************************/
/* Add Shortcodes to VC *******************************************************/
/******************************************************************************/

if ( defined(  'WPB_VC_VERSION' ) ) {
	
	add_action( 'init', 'barberry_visual_composer_shortcodes' );
	function barberry_visual_composer_shortcodes() {
		
		// Add new WP shortcodes to VC

		if (class_exists('WooCommerce')) {
			include_once 'includes/vc/wc/recent-products.php';
			// include_once 'includes/vc/wc/featured-products.php';
		}
		
		include_once( 'includes/vc/wp/blog-posts.php' );
		include_once( 'includes/vc/wp/custom-button.php' );
		include_once( 'includes/vc/wp/custom-link.php' );
		include_once( 'includes/vc/wp/google-map.php' );
		include_once( 'includes/vc/wp/social-media-profiles.php' );
		include_once( 'includes/vc/wp/slider.php' );
		include_once( 'includes/vc/wp/collections-slider.php' );
	
	}

}
