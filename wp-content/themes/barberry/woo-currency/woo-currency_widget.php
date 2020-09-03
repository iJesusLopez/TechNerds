<?php
/**
 * Show widget
 *
 * This template can be overridden by copying it to yourtheme/woo-currency/woo-currency_widget.php.
 *
 * @author        Cuong Nguyen
 * @package       Woo-currency/Templates
 * @version       1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$currencies       = $settings->get_list_currencies();
$current_currency = $settings->get_current_currency();
$links            = $settings->get_links();
$currency_name    = get_woocommerce_currencies();

?>
<nav class="navigation-foundation barberry-switcher barberry-barberry-currency-switcher product wcml_currency_switcher">
  <ul class="dropdown menu" data-close-on-click="false" data-close-on-click-inside="false" data-click-open="true" data-dropdown-menu data-hover-delay="0" data-closing-time="0">
    <li tabindex="0" class="wcml-cs-active-currency">

    <?php
			foreach ( $links as $code => $link ) {
				$value = $settings->enable_switch_currency_by_js() ? esc_html( $code ) : esc_url( $link );
        $name  = $shortcode == 'default' ? $currency_name[ $code ] : ( $shortcode == 'listbox_code' ? $code : '' );
        if ( $current_currency == $code ) {
				?>
          <a rel="<?php echo esc_attr($name) ?>" ><span><?php echo esc_html( $name ) ?></span></a>
			<?php }} ?>

      <ul class="menu">
      <?php
			foreach ( $links as $code => $link ) {
				$value = $settings->enable_switch_currency_by_js() ? esc_html( $code ) : esc_url( $link );
				$name  = $shortcode == 'default' ? $currency_name[ $code ] : ( $shortcode == 'listbox_code' ? $code : '' );
				?>

          <li>
            <a href="<?php echo esc_attr($value) ?>" ><?php echo esc_html( $name ) ?></a>
          </li>

			<?php } ?>      
      </ul>
    </li>
  </ul>
</nav>
