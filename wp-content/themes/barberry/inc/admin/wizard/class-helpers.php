<?php
/**
 * TDLHELPERS
 *
 * A helper class for the plugin
 *
 * @class 		TDLHELPERS
 * @version		2.0
 * @category	Class
 * @author 		TemashDesign
 */

if ( ! class_exists( 'TDLHELPERS' ) ) {
	class TDLHELPERS {

		/**
		 * Do not instance
		 */
		private function __construct(){}

		protected static $tdthemes = array( 'barberry' );

		/**
		 * Fetch the theme slug as tbe option domain
		 *
		 * @return string
		 */
		public static function theme_slug() {
			$theme = wp_get_theme();
			return $theme->template;
		}

		/**
		 * Fetch the theme name
		 *
		 * @return string
		 */
		public static function theme_name() {
			$theme = wp_get_theme();
			if ( $theme->parent() !== false ) {
				$theme_name = $theme->parent()->Name;
			} else {
				$theme_name = $theme->Name;
			}

			return $theme_name;
		}

		/**
		 * Returns the (parent) theme version
		 *
		 * @return version
		 */
		public static function theme_version() {
			$tdl_theme = wp_get_theme();
			if ( $tdl_theme->parent() ) :
				return $tdl_theme->parent()->get( 'Version' );
			else :
				return $tdl_theme->get( 'Version' );
			endif;
		}

		public static function path() {
			return 'tdl-tools/tdl-tools.php';
		}

		/**
		 * Returns the envato link for the active TemashDesign theme
		 *
		 * @return string url
		 */
		public static function envato_link() {
			switch ( self::theme_name() ) {
				default:
				return false;
			}
		}

		/**
		 * Returns the link for the theme options panel
		 *
		 * @return string url
		 */
		public static function customizer_link() {
			switch ( self::theme_name() ) {
				default:
					return esc_url( admin_url( 'customize.php' ) );
				break;
			}
		}

		/**
		 * Returns the link for the theme options panel
		 *
		 * @return string url
		 */
		public static function customizer_menu_link() {
			switch ( self::theme_name() ) {
				default:
					return 'customize.php';
				break;
			}
		}

		/**
		 * Returns the support center link for the active TemashDesign theme
		 *
		 * @return string url
		 */
		public static function support_link() {
			if ( in_array( self::theme_slug(), self::$tdthemes ) ) {
				return 'https://temashdesign.ticksy.com';
			}
		}

		/**
		 * True if there is a remote update available
		 *
		 * @return boolean
		 */
		public static function hasUpdate() {
			return version_compare( TDLHELPERS::theme_version(), get_option( 'tdl_' . TDLHELPERS::theme_slug() . '_remote_ver' ), '<' );
		}

		/**
		 * Returns the remote version of the theme
		 *
		 * @return string|bool version|false
		 */
		public static function remoteVersion() {
			return get_option( 'tdl_' . TDLHELPERS::theme_slug() . '_remote_ver' );
		}


		public static function is_required_plugins() {
			return ( BARBERRY_WOOCOMMERCE_IS_ACTIVE && BARBERRY_VISUAL_COMPOSER_IS_ACTIVE &&  class_exists(  'OCDI_Plugin' ));
		}
	}
}// End if().
