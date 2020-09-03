<?php
/**
 * Share template
 *
 * @author Your Inspiration Themes
 * @package YITH WooCommerce Wishlist
 * @version 3.0.0
 */

/**
 * Template variables:
 *
 * @var $share_title string Title for share section
 * @var $share_facebook_enabled bool Whether to enable FB sharing button
 * @var $share_twitter_enabled bool Whether to enable Twitter sharing button
 * @var $share_pinterest_enabled bool Whether to enable Pintereset sharing button
 * @var $share_email_enabled bool Whether to enable Email sharing button
 * @var $share_whatsapp_enabled bool Whether to enable WhatsApp sharing button (mobile online)
 * @var $share_url_enabled bool Whether to enable share via url
 * @var $share_link_title string Title to use for post (where applicable)
 * @var $share_link_url string Url to share
 * @var $share_summary string Summary to use for sharing on social media
 * @var $share_image_url string Image to use for sharing on social media
 * @var $share_twitter_summary string Summary to use for sharing on Twitter
 * @var $share_facebook_icon string Icon for facebook sharing button
 * @var $share_twitter_icon string Icon for twitter sharing button
 * @var $share_pinterest_icon string Icon for pinterest sharing button
 * @var $share_email_icon string Icon for email sharing button
 * @var $share_whatsapp_icon string Icon for whatsapp sharing button
 * @var $share_whatsapp_url string Sharing url on whatsapp
 */

if ( ! defined( 'YITH_WCWL' ) ) {
    exit;
} // Exit if accessed directly
?>

<?php do_action( 'yith_wcwl_before_wishlist_share', $wishlist); ?>

<div class="yith-wcwl-share">
    <h4 class="yith-wcwl-share-title"><?php echo esc_attr($share_title) ?></h4>
    <ul class="social-icons">
        <?php if( $share_facebook_enabled ): ?>
            <li class="facebook" style="list-style-type: none; display: inline-block;">
                <a target="_blank" class="facebook" href="https://www.facebook.com/sharer.php?s=100&amp;p%5Btitle%5D=<?php echo esc_attr($share_link_title) ?>&amp;p%5Burl%5D=<?php echo urlencode( $share_link_url ) ?>" title="<?php esc_attr_e( 'Facebook', 'barberry' ) ?>">
                    <svg class="svg-icon" viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve">
                      <use x="0" y="0" xlink:href="#i-facebook"></use>
                    </svg> 
                    <span class="s-circle_bg"></span>                    

                </a>
            </li>
        <?php endif; ?>

        <?php if( $share_twitter_enabled ): ?>
            <li class="twitter" style="list-style-type: none; display: inline-block;">
                <a target="_blank" class="twitter" href="https://twitter.com/share?url=<?php echo urlencode( $share_link_url ) ?>&amp;text=<?php echo esc_attr($share_twitter_summary) ?>" title="<?php esc_attr_e( 'Twitter', 'barberry' ) ?>">
                      <svg class="svg-icon" viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve">
                        <use x="0" y="0" xlink:href="#i-twitter"></use>
                      </svg> 
                    <span class="s-circle_bg"></span>                                    </a>
            </li>
        <?php endif; ?>

        <?php if( $share_pinterest_enabled ): ?>
            <li class="pinterest" style="list-style-type: none; display: inline-block;">
                <a target="_blank" class="pinterest" href="http://pinterest.com/pin/create/button/?url=<?php echo urlencode( $share_link_url ) ?>&amp;description=<?php echo esc_attr($share_summary) ?>&amp;media=<?php echo urlencode($share_image_url) ?>" title="<?php esc_attr_e( 'Pinterest', 'barberry' ) ?>" onclick="window.open(this.href); return false;">
                      <svg class="svg-icon" viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve">
                        <use x="0" y="0" xlink:href="#i-pinterest"></use>
                      </svg> 
                    <span class="s-circle_bg"></span>                       
                </a>
            </li>
        <?php endif; ?>


        <?php if( $share_email_enabled ): ?>
            <li class="mail" style="list-style-type: none; display: inline-block;">
                <a class="email" href="mailto:?subject=<?php echo urlencode( apply_filters( 'yith_wcwl_email_share_subject', $share_link_title ) )?>&amp;body=<?php echo apply_filters( 'yith_wcwl_email_share_body', urlencode( $share_link_url ) ) ?>&amp;title=<?php echo esc_attr($share_link_title) ?>" title="<?php esc_attr_e( 'Email', 'barberry' ) ?>">
                       <svg class="svg-icon" viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve">
                        <use x="0" y="0" xlink:href="#i-mail"></use>
                      </svg> 
                    <span class="s-circle_bg"></span>                   
                </a>
            </li>
        <?php endif; ?>

        <?php if( $share_whatsapp_enabled ): ?>
            <li class="whatsapp" style="list-style-type: none; display: inline-block;">
                <a class="whatsapp" href="<?php echo esc_attr($share_whatsapp_url) ?>" data-action="share/whatsapp/share" target="_blank" title="<?php esc_attr_e( 'WhatsApp', 'barberry' ) ?>">
                       <svg class="svg-icon" viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve">
                        <use x="0" y="0" xlink:href="#i-whatsapp"></use>
                      </svg> 
                    <span class="s-circle_bg"></span>                   
                </a>
            </li>
        <?php endif; ?>

        <?php if( $share_url_enabled ): ?>
            <div class="yith-wcwl-after-share-section">
                <input class="copy-target" readonly="readonly" type="url" name="yith_wcwl_share_url" id="yith_wcwl_share_url" value="<?php echo esc_attr($share_link_url) ?>"/>
                <?php echo ( ! empty( $share_link_url ) ) ? sprintf( '<small>%s <span class="copy-trigger">%s</span> %s</small>', __( '(Now', 'barberry' ), __( 'copy', 'barberry' ), __( 'this wishlist link and share it anywhere)', 'barberry' ) ) : '' ?>
            </div>
        <?php endif; ?>

    </ul>
</div>

<?php do_action( 'yith_wcwl_after_wishlist_share', $wishlist ); ?>