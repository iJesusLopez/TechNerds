<?php 

$footer_copy = TDL_Opt::getOption('footer_copy_section'); 

?>



      <footer id="site-footer" data-footer-copy="<?php echo esc_attr($footer_copy); ?>">
        <?php get_template_part( 'template-parts/footer/footer', 'content' ) ?> 
        <div class="footer__wrapper"></div>  
          
      </footer>

		</div>
		<!-- end offcanvas_main_content -->

    <!-- Off-Canvas Aside Content Left -->
    <div class="offcanvas_aside offcanvas_aside_left">
      <div class="nano">
        <div class="nano-content">
          <div class="offcanvas_aside_content">
            <?php get_template_part( 'template-parts/offcanvas', 'left' ); ?>
          </div>
        </div>
      </div>
    </div> 
    <!-- end offcanvas_aside_left -->

    <?php if (class_exists('WooCommerce')) { ?>
      <!-- Off-Canvas Aside Content Right -->
      <div class="offcanvas_aside offcanvas_aside_right">
        <div class="offcanvas_aside_content">
          <?php get_template_part( 'template-parts/offcanvas', 'right' ); ?>
        </div>
      </div> 
      <!-- end offcanvas_aside_right -->
    <?php } ?>

    <?php if ( ! empty( TDL_Opt::getOption('header_search')) ) { ?>
      <!-- Off-Canvas Aside Content Top -->
      <div class="offcanvas_aside offcanvas_aside_top site-search">
         <div class="nano">
          <div class="nano-content">     
            <div class="offcanvas_aside_content">
              <?php get_template_part( 'template-parts/offcanvas', 'top' ); ?>
            </div>
          </div>
        </div>
      </div> 
      <!-- end offcanvas_aside_top -->
    <?php } ?>

    <div class="offcanvas_overlay"></div> 
    <div class="navigation_overlay"></div>
    <div class="topbar_overlay"></div>

         

    </div>
    <!-- end offcanvas_container -->
    <div class="rellax"></div>

    </div>


    <?php 
    /**
     * Footer run static content
     */
    add_action('wp_footer', 'barberry_run_static_content', 9);
    if (!function_exists('barberry_run_static_content')) :
        function barberry_run_static_content() {
            do_action('barberry_static_content');
        }
    endif;

    // barberry_static_content_before

    add_action('barberry_static_content', 'barberry_static_content_before', 10);
    if (!function_exists('barberry_static_content_before')) :
        function barberry_static_content_before() {
            
            echo '<!-- Start static content -->' .
                '<div class="static-content-position">' .
                '<div class="transparent-window"></div>';
        }
    endif;

    // barberry_static_content_after

    add_action('barberry_static_content', 'barberry_static_content_after', 999);
    if (!function_exists('barberry_static_content_after')) :
        function barberry_static_content_after() {
            echo '</div><!-- End static content -->';
        }
    endif;

    // barberry_static_config_info

    add_action('barberry_static_content', 'barberry_static_config_info', 21);
    if (!function_exists('barberry_static_config_info')) :

        function barberry_static_config_info() {
        ?>

        <!-- Less Total Count items Wishlist - Compare - (9+) -->
        <input type="hidden" name="barberry_less_total_items" value="<?php echo apply_filters('barberry_less_total_items', '1'); ?>" />

        <?php
        }

    endif;

    // Quick View

    add_action('barberry_static_content', 'barberry_product_quick_view', 21);
    if (!function_exists('barberry_product_quick_view')) :

        function barberry_product_quick_view() {

          if ( ! empty( TDL_Opt::getOption('product_quick_view')) ) {
              echo '<div class="site-content" id="barberry_woocommerce_quickview">';
              echo '<div class="barberry_qv_content site-content"></div>';
              echo '</div>';
          }

        }

    endif; 


    // Sticky Add to Cart

    add_action('barberry_static_content', 'barberry_static_addtocart', 21);
    if (!function_exists('barberry_static_addtocart')) :

        function barberry_static_addtocart() {

          if ( ! empty( TDL_Opt::getOption('product_sticky_addtocart')) && TDL_Opt::getOption('catalog_mode') != 1 ) {
              echo '<!-- Enable Fixed add to cart single product -->';
              echo '<input type="hidden" name="barberry_fixed_single_add_to_cart" value="1" />';
          }

        }

    endif;   

    add_action('barberry_static_content', 'barberry_static_compare_sidebar', 17);
    if (!function_exists('barberry_static_compare_sidebar')) :

        function barberry_static_compare_sidebar() {
            global $yith_woocompare;
            
            if ($yith_woocompare) {
                $barberry_compare = isset($yith_woocompare->obj) ?
                    $yith_woocompare->obj : $yith_woocompare;
                
                if (isset($barberry_compare->cookie_name)) {
                    echo '<input type="hidden" name="barberry_woocompare_cookie_name" value="' . $barberry_compare->cookie_name . '" />';
                }
            }
            ?>
            <div class="barberry-compare-list-bottom">
                <div id="barberry-compare-sidebar-content">
                    <div class="barberry-loader"></div>
                </div>
                <p class="barberry-compare-mess barberry-compare-success"><span></span></p>
                <p class="barberry-compare-mess barberry-compare-exists"><span></span></p>
            </div>
            <?php
        }

    endif;

    ?>

    <?php wp_footer(); ?>

    <!-- ******************************************************************** -->
    <!-- * Custom Footer JavaScript Code ************************************ -->
    <!-- ******************************************************************** -->

    <?php barberry_footer_js(); ?>
    
	</body>
</html>