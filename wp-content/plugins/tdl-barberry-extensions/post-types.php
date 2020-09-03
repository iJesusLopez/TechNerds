<?php 
class BARBERRY_Post_Types {

	public $domain = 'barberry_starter';

	protected static $_instance = null;

	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	public function __clone() {
		_doing_it_wrong( __FUNCTION__, esc_html__( 'Cheatin&#8217; huh?', 'barberry' ), '2.1' );
	}

	public function __wakeup() {
		_doing_it_wrong( __FUNCTION__, esc_html__( 'Cheatin&#8217; huh?', 'barberry' ), '2.1' );
	}

	public function __construct() {
		
		// Hook into the 'init' action
		add_action( 'init', array($this, 'size_guide'), 1 );

	}

	// **********************************************************************// 
	// ! Register Custom Post Type for Size Guide
	// **********************************************************************// 
	public function size_guide() {
	
		if ( ! TDL_Opt::getOption('size_guides') ) {
			return;
		}

		$labels = array(
			'name'                => esc_html__( 'Size Guides', 'barberry' ),
			'singular_name'       => esc_html__( 'Size Guide', 'barberry' ),
			'menu_name'           => esc_html__( 'Size Guides', 'barberry' ),
			'add_new'             => esc_html__( 'Add new', 'barberry' ),
			'add_new_item'        => esc_html__( 'Add new size guide', 'barberry' ),
			'new_item'            => esc_html__( 'New size guide', 'barberry' ),
			'edit_item'           => esc_html__( 'Edit size guide', 'barberry' ),
			'view_item'           => esc_html__( 'View size guide', 'barberry' ),
			'all_items'           => esc_html__( 'All size guides', 'barberry' ),
			'search_items'        => esc_html__( 'Search size guides', 'barberry' ),
			'not_found'           => esc_html__( 'No size guides found.', 'barberry' ),
			'not_found_in_trash'  => esc_html__( 'No size guides found in trash.', 'barberry' )
		);

		$args = array(
			'label'               => esc_html__( 'barberry_size_guide', 'barberry' ),
			'description'         => esc_html__( 'Size guide to place in your products', 'barberry' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor' ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 29,
			'menu_icon'           => 'dashicons-editor-kitchensink',
			'can_export'          => true,
			'has_archive'         => false,
			'exclude_from_search' => true,
			'publicly_queryable'  => false,
			'rewrite'             => false,
			'capability_type'     => 'page',
		);

		register_post_type( 'barberry_size_guide', $args );
	}
	


	/**
	 * Get the plugin url.
	 * @return string
	 */
	public function plugin_url() {
		return untrailingslashit( plugins_url( '/', __FILE__ ) );
	}

	/**
	 * Get the plugin path.
	 * @return string
	 */
	public function plugin_path() {
		return untrailingslashit( plugin_dir_path( __FILE__ ) );
	}


}

function BARBERRY_Theme_Plugin() {
	return BARBERRY_Post_Types::instance();
}

$GLOBALS['barberry_theme_plugin'] = BARBERRY_Theme_Plugin();

if ( ! function_exists( 'barberry_compress' ) ) {
	function barberry_compress($variable){
		return base64_encode($variable);
	}
}

if ( ! function_exists( 'barberry_decompress' ) ) {
	function barberry_decompress($variable){
		return base64_decode($variable);
	}
}

if ( ! function_exists( 'barberry_get_svg' ) ) {
	function barberry_get_svg( $file ){
		if ( ! apply_filters( 'barberry_svg_cache', true ) ) {
			return file_get_contents( $file );
		} 

		$file_path = array_reverse( explode( '/', $file ) );
		$slug = 'wdm-svg-' . $file_path[2] . '-' . $file_path[1] . '-' . $file_path[0];
		$content = get_transient( $slug );

		if ( ! $content ) {
			$content = barberry_compress( file_get_contents( $file ) );
			set_transient( $slug, $content, apply_filters( 'barberry_svg_cache_time', 60 * 60 * 24 * 7 ) );
		}

		return barberry_decompress( $content );
	}
}

// **********************************************************************// 
// ! Support shortcodes in text widget
// **********************************************************************// 

add_filter('widget_text', 'do_shortcode');
?>
