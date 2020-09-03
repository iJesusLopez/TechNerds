<?php

defined('ABSPATH') or die(); // Exit if accessed directly

if (class_exists('WC_AJAX')) :
    class BARBERRY_WC_AJAX extends WC_AJAX {

        /**
         * Hook in ajax handlers.
         */
        public static function barberry_init() {
            add_action('init', array(__CLASS__, 'define_ajax'), 0);
            add_action('template_redirect', array(__CLASS__, 'do_wc_ajax'), 0);
            self::barberry_add_ajax_events();
        }

        /**
         * Hook in methods - uses WordPress ajax handlers (admin-ajax).
         */
        public static function barberry_add_ajax_events() {
            /**
             * Register ajax event
             */
            $ajax_events = array(
                'barberry_static_content',
                'barberry_load_compare',
                'barberry_add_compare_product',
                'barberry_remove_compare_product',
                'barberry_remove_all_compare',
                'barberry_reload_fragments'
            );

            foreach ($ajax_events as $ajax_event) {
                add_action('wp_ajax_woocommerce_' . $ajax_event, array(__CLASS__, $ajax_event));
                add_action('wp_ajax_nopriv_woocommerce_' . $ajax_event, array(__CLASS__, $ajax_event));

                // WC AJAX can be used for frontend ajax requests.
                add_action('wc_ajax_' . $ajax_event, array(__CLASS__, $ajax_event));
            }
        }
        
        /**
	 * Reload a refreshed cart fragment, including the mini cart HTML.
	 */
	public static function barberry_reload_fragments() {
            self::get_refreshed_fragments();
	}
        
        
        /**
         * Load compare in bottom
         */
        public static function barberry_load_compare() {
            $data = array('success' => '0', 'content' => '');
            
            ob_start();
            do_action('barberry_show_mini_compare');
            $data['content'] = ob_get_clean();
            
            if (!empty($data['content'])) {
                $data['success'] = '1';
            }
            
            wp_send_json($data);
        }

        /**
         * Add compare item
         */
        public static function barberry_add_compare_product() {
            $result = array(
                'result_compare' => 'error',
                'mess_compare' => esc_html__('Error !', 'barberry'),
                'mini_compare' => 'no-change',
                'count_compare' => 0
            );
            if (!isset($_REQUEST['pid']) || !(int) $_REQUEST['pid']) {
                wp_send_json($result);
                wp_die();
            }

            global $yith_woocompare;
            $barberry_compare = isset($yith_woocompare->obj) ? $yith_woocompare->obj : $yith_woocompare;
            if (!$barberry_compare) {
                wp_send_json($result);
                wp_die();
            }

            $max_compare = TDL_Opt::getOption('max_compare') ? (int) TDL_Opt::getOption('max_compare') : 4;
            if (!in_array((int) $_REQUEST['pid'], $barberry_compare->products_list)) {
                if (count($barberry_compare->products_list) >= $max_compare) {
                    while (count($barberry_compare->products_list) >= $max_compare) {
                        array_shift($barberry_compare->products_list);
                    }
                }

                $barberry_compare->add_product_to_compare((int) $_REQUEST['pid']);
                $result['mess_compare'] = esc_html__('Product added to compare !', 'barberry');

                ob_start();
                do_action('barberry_show_mini_compare');
                $result['mini_compare'] = ob_get_clean();

                if (isset($_REQUEST['compare_table']) && $_REQUEST['compare_table']) {
                    $result['result_table'] = barberry_products_compare_content();
                }
            } else {
                $result['mess_compare'] = esc_html__('Product already exists in Compare list !', 'barberry');
            }

            $result['count_compare'] = count($barberry_compare->products_list);
            $result['result_compare'] = 'success';

            wp_send_json($result);
        }
        
        /**
         * Remove compare item
         */
        public static function barberry_remove_compare_product() {
            $result = array(
                'result_compare' => 'error',
                'mess_compare' => esc_html__('Error !', 'barberry'),
                'mini_compare' => 'no-change',
                'count_compare' => 0
            );
            
            if (!isset($_REQUEST['pid']) || !(int) $_REQUEST['pid']) {
                wp_send_json($result);
                wp_die();
            }

            global $yith_woocompare;
            $barberry_compare = isset($yith_woocompare->obj) ? $yith_woocompare->obj : $yith_woocompare;
            if (!$barberry_compare) {
                wp_send_json($result);
                wp_die();
            }

            if (in_array((int) $_REQUEST['pid'], $barberry_compare->products_list)) {
                $barberry_compare->remove_product_from_compare((int) $_REQUEST['pid']);
                $result['mess_compare'] = esc_html__('Removed product from compare !', 'barberry');

                ob_start();
                do_action('barberry_show_mini_compare');
                $result['mini_compare'] = ob_get_clean();

                if (isset($_REQUEST['compare_table']) && $_REQUEST['compare_table']) {
                    $result['result_table'] = barberry_products_compare_content();
                }
            } else {
                $result['mess_compare'] = esc_html__('Product not already exists in Compare list !', 'barberry');
            }

            $result['count_compare'] = count($barberry_compare->products_list);
            $result['result_compare'] = 'success';

            wp_send_json($result);
        }
        
        /**
         * Remove all item compare
         */
        public static function barberry_remove_all_compare() {
            $result = array(
                'result_compare' => 'error',
                'mess_compare' => esc_html__('Error !', 'barberry'),
                'mini_compare' => 'no-change',
                'count_compare' => 0
            );

            global $yith_woocompare;
            $barberry_compare = isset($yith_woocompare->obj) ? $yith_woocompare->obj : $yith_woocompare;
            if (!$barberry_compare) {
                wp_send_json($result);
                wp_die();
            }

            if (!empty($barberry_compare->products_list)) {
                $barberry_compare->remove_product_from_compare('all');
                $result['mess_compare'] = esc_html__('Removed all products from compare !', 'barberry');
                ob_start();
                do_action('barberry_show_mini_compare');

                $result['mini_compare'] = ob_get_clean();
            } else {
                $result['mess_compare'] = esc_html__('Compare products were empty !', 'barberry');
            }

            $result['count_compare'] = count($barberry_compare->products_list);
            $result['result_compare'] = 'success';
            if (isset($_REQUEST['compare_table']) && $_REQUEST['compare_table']) {
                $result['result_table'] = barberry_products_compare_content();
            }

            wp_send_json($result);
        }
        
    }

    /**
     * Init Barberry WC AJAX
     */
    if (isset($_REQUEST['wc-ajax'])) {
        add_action('init', 'barberry_init_wc_ajax');
        if (!function_exists('barberry_init_wc_ajax')) :
            function barberry_init_wc_ajax() {
                BARBERRY_WC_AJAX::barberry_init();
            }
        endif;
    }

endif;
