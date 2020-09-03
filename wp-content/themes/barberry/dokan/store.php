<?php
/**
 * The Template for displaying all single posts.
 *
 * @package dokan
 * @package dokan - 2014 1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$store_user   = dokan()->vendor->get( get_query_var( 'author' ) );
$store_info   = $store_user->get_shop_info();
$map_location = $store_user->get_location();

get_header( 'shop' );

$sidebar = dokan_get_option( 'enable_theme_store_sidebar', 'dokan_appearance', 'off' );

if ( function_exists( 'yoast_breadcrumb' ) ) {
    yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' );
}
?>
    <?php do_action( 'woocommerce_before_main_content' ); ?>

    <!-- begin site-content -->
    <div id="content" class="site-content woocommerce-sidebar-active" role="main">
        <!-- begin grid-container -->
        <div class="grid-container content-page-wrapper">
            <!-- begin grid-x -->
            <div class="grid-x grid-margin-x main-shop-container">

                <?php if ( dokan_get_option( 'enable_theme_store_sidebar', 'dokan_appearance', 'off' ) == 'off' ) : ?>

                    <div class="sidebar-container shop-sidebar-container small-12 large-3 cell">
                        <div class="woocommerce-sidebar-inside">                        
                            <?php if ( is_active_sidebar( 'widgets-product-listing' ) ) { ?>
                                <div id="secondary" class="widget-area" role="complementary">
                                    <?php do_action( 'dokan_sidebar_store_before', $store_user->data, $store_info ); ?>
                                    <?php
                                    if ( ! dynamic_sidebar( 'sidebar-store' ) ) {
                                        $args = array(
                                            'before_widget' => '<aside class="widget dokan-store-widget %s">',
                                            'after_widget'  => '</aside>',
                                            'before_title'  => '<h4 class="widget-title">',
                                            'after_title'   => '</h4>',
                                        );

                                        if ( class_exists( 'Dokan_Store_Location' ) ) {
                                            the_widget( 'Dokan_Store_Category_Menu', array( 'title' => __( 'Store Product Category', 'barberry' ) ), $args );

                                            if ( dokan_get_option( 'store_map', 'dokan_appearance', 'on' ) == 'on'  && !empty( $map_location ) ) {
                                                the_widget( 'Dokan_Store_Location', array( 'title' => __( 'Store Location', 'barberry' ) ), $args );
                                            }

                                            if ( dokan_get_option( 'store_open_close', 'dokan_appearance', 'on' ) == 'on' ) {
                                                the_widget( 'Dokan_Store_Open_Close', array( 'title' => __( 'Store Time', 'barberry' ) ), $args );
                                            }

                                            if ( dokan_get_option( 'contact_seller', 'dokan_appearance', 'on' ) == 'on' ) {
                                                the_widget( 'Dokan_Store_Contact_Form', array( 'title' => __( 'Contact Vendor', 'barberry' ) ), $args );
                                            }
                                        }
                                    }
                                    ?>

                                    <?php do_action( 'dokan_sidebar_store_after', $store_user->data, $store_info ); ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>

                <?php else: ?>
                    <div class="sidebar-container shop-sidebar-container small-12 large-3 cell">
                        <div class="woocommerce-sidebar-inside">                        
                            <?php if ( is_active_sidebar( 'widgets-product-listing' ) ) { ?>
                                <div id="secondary" class="widget-area" role="complementary">
                                    <?php dynamic_sidebar( 'widgets-product-listing' ); ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>                    
                <?php endif; ?>


                <div class="small-12 large-9 cell " id="content-section" >

                    <div id="dokan-primary" class="dokan-single-store dokan-w8 shop-content">
                        <div id="dokan-content" class="store-page-wrap woocommerce " role="main">

                            <?php dokan_get_template_part( 'store-header' ); ?>

                            <?php do_action( 'dokan_store_profile_frame_after', $store_user->data, $store_info ); ?>

                            <?php if ( have_posts() ) { ?>

                                <div class="seller-items shop-content-inner">

                                    <?php woocommerce_product_loop_start(); ?>

                                        <?php while ( have_posts() ) : the_post(); ?>

                                            <?php wc_get_template_part( 'content', 'product' ); ?>

                                        <?php endwhile; // end of the loop. ?>

                                    <?php woocommerce_product_loop_end(); ?>

                                </div>

                                <?php dokan_content_nav( 'nav-below' ); ?>

                            <?php } else { ?>

                                <p class="dokan-info"><?php esc_html_e( 'No products were found of this vendor!', 'barberry' ); ?></p>

                            <?php } ?>
                        </div>

                    </div><!-- .dokan-single-store -->

                <div class="dokan-clearfix"></div>

                </div><!-- end cell large-12 -->


            </div><!-- end grid-x -->

        </div><!-- end grid-container -->   

    </div><!-- end site-content -->

    <div id="content-section-bottom"></div>
    <div class="prefooter"></div>


    <?php do_action( 'woocommerce_after_main_content' ); ?>

<?php get_footer( 'shop' ); ?>
