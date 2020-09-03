<?php if ( ! defined( 'BARBERRY_THEME_DIR' ) ) exit( 'No direct script access allowed' );

/**
 * ------------------------------------------------------------------------------------------------
 * Add metaboxes
 * ------------------------------------------------------------------------------------------------
 */
if( ! function_exists( 'barberry_sguide_add_metaboxes' ) ) {
    function barberry_sguide_add_metaboxes() {
        //Add table metaboxes to size guide
    	add_meta_box( 'barberry_sguide_metaboxes', esc_html__( 'Create/modify size guide table', 'barberry' ), 'barberry_sguide_metaboxes', 'barberry_size_guide', 'normal', 'default' );
        //Add metaboxes to product
        add_meta_box( 'barberry_sguide_dropdown_template', esc_html__( 'Choose size guide', 'barberry' ), 'barberry_sguide_dropdown_template', 'product', 'side' );
        //Add category metaboxes to size guide
        add_meta_box( 'barberry_sguide_category_template', esc_html__( 'Choose product categories', 'barberry' ), 'barberry_sguide_category_template', 'barberry_size_guide', 'side' );
        //Add hide table checkbox to size guide
        add_meta_box( 'barberry_sguide_hide_table_template', esc_html__( 'Hide size guide table', 'barberry' ), 'barberry_sguide_hide_table_template', 'barberry_size_guide', 'side' );
    }
    add_action( 'add_meta_boxes', 'barberry_sguide_add_metaboxes' );
}

/**
 * ------------------------------------------------------------------------------------------------
 * Actions
 * ------------------------------------------------------------------------------------------------
 */
//Save Edit Table Action
add_action( 'save_post_barberry_size_guide', 'barberry_sguide_table_save' );
add_action( 'edit_post_barberry_size_guide', 'barberry_sguide_table_save' );

add_action( 'save_post_barberry_size_guide', 'barberry_sguide_hide_table_save' );
add_action( 'edit_post_barberry_size_guide', 'barberry_sguide_hide_table_save' );

//Save Edit Product Action
add_action( 'save_post', 'barberry_sguide_dropdown_save' );
add_action( 'edit_post', 'barberry_sguide_dropdown_save' );

//Add size guide to product page
add_action( 'woocommerce_single_product_summary', 'barberry_sguide_display', 38 );


//Metaboxes template
if( ! function_exists( 'barberry_sguide_metaboxes' ) ) {
    function barberry_sguide_metaboxes( $post ) {

        if ( get_current_screen()->action == 'add' ) {
            $tables = array(
                array( 'Size', 'UK', 'US', 'EU', 'Japan' ),
                array( 'XS', '6 - 8', '4', '34', '7' ),
                array( 'S', '8 -10', '6', '36', '9'  ),
                array( 'M', '10 - 12', '8', '38', '11'  ),
                array( 'L', '12 - 14', '10', '40', '13'  ),
                array( 'XL', '14 - 16', '12', '42', '15'  ),
                array( 'XXL', '16 - 28', '14', '44', '17'  )
            );
        } else {
            $tables = get_post_meta( $post->ID, 'barberry_sguide' );
            $tables = $tables[0];
        }

        barberry_sguide_table_template( $tables );
    }
}

/**
 * ------------------------------------------------------------------------------------------------
 * Table
 * ------------------------------------------------------------------------------------------------
 */
//Table template
if( ! function_exists( 'barberry_sguide_table_template' ) ) {
    function barberry_sguide_table_template( $tables ) {
        ?>
        <textarea class="barberry-sguide-table-edit" name="barberry-sguide-table" style="display:none;">
            <?php echo json_encode( $tables ); ?>
        </textarea>
        <?php
    }
}

//Save table action
if( ! function_exists( 'barberry_sguide_table_save' ) ) {
    function barberry_sguide_table_save( $post_id ){

        if ( !isset( $_POST['barberry-sguide-table'] ) ) return;

        $size_guide = json_decode( stripslashes ( $_POST['barberry-sguide-table'] ) );

        update_post_meta( $post_id, 'barberry_sguide', $size_guide );
        
        //Save product category
        barberry_sguide_save_category( $post_id );
    }
}

/**
 * ------------------------------------------------------------------------------------------------
 * Dropdown
 * ------------------------------------------------------------------------------------------------
 */
//Dropdown template
if( ! function_exists( 'barberry_sguide_dropdown_template' ) ) {
    function barberry_sguide_dropdown_template( $post ){
        $arg = array(
            'post_type' => 'barberry_size_guide',
            'numberposts' => -1
        );

        $sguide_list = get_posts( $arg );

        $sguide_post_id = get_post_meta( $post->ID, 'barberry_sguide_select' );

        $sguide_post_id = isset( $sguide_post_id[0] ) ? $sguide_post_id[0] : '';
        
        ?>
            <select name="barberry_sguide_select">
                <option value="">— None —</option>
                
                <?php foreach ( $sguide_list as $sguide_post ): ?>
                    <option value="<?php echo esc_attr($sguide_post->ID); ?>" <?php selected( $sguide_post_id, $sguide_post->ID ); ?>><?php echo esc_attr($sguide_post->post_title); ?></option>
                <?php endforeach; ?>
                
            </select><br><br>
            
            <label>
                <input type="checkbox" name="barberry_disable_sguide" id="barberry_disable_sguide" <?php checked( 'disable', $sguide_post_id, true ); ?>> 
                <?php esc_html_e( 'Hide size guide from this product', 'barberry' ) ?>
            </label>
        <?php
    }
}

//Dropdown Save
if( ! function_exists( 'barberry_sguide_dropdown_save' ) ) {
    function barberry_sguide_dropdown_save( $post_id ){
        if ( isset( $_POST['barberry_sguide_select'] ) ) {
            
            if ( isset( $_POST['barberry_disable_sguide'] ) && $_POST['barberry_disable_sguide'] == 'on' ) {
                update_post_meta( $post_id, 'barberry_sguide_select', 'disable' );
            } else {
                update_post_meta( $post_id, 'barberry_sguide_select', $_POST['barberry_sguide_select'] );
            }
            
        }
    }
}

/**
 * ------------------------------------------------------------------------------------------------
 * Display
 * ------------------------------------------------------------------------------------------------
 */
 
//Size guide display
if( ! function_exists( 'barberry_sguide_display' ) ) {
    function barberry_sguide_display( $post_id = false ){
        $post_id = ( $post_id ) ? $post_id : get_the_ID();
        
        $sguide_post_id = get_post_meta( $post_id, 'barberry_sguide_select' );
        
        if ( isset( $sguide_post_id[0] ) && $sguide_post_id[0] == 'disable' ) return; 
        
        if ( isset( $sguide_post_id[0] ) && !empty( $sguide_post_id[0] ) ){
            $sguide_post_id = $sguide_post_id[0];
        }else{
            $terms = wp_get_post_terms( $post_id, 'product_cat' );
            if ( $terms ) {
                foreach( $terms as $term ){
                    if ( get_term_meta( $term->term_id, 'barberry_chosen_sguide', true ) ) {
                        $sguide_post_id = get_term_meta( $term->term_id, 'barberry_chosen_sguide', true );
                    }else{
                        $sguide_post_id = false;
                    }
                }
            }
        }    
        if ( $sguide_post_id ) {
            $sguide_post = get_post( $sguide_post_id );
            $size_tables = get_post_meta( $sguide_post_id, 'barberry_sguide' );
                
            barberry_sguide_display_table_template( $sguide_post, $size_tables );
        }
    }
}

//Size guide display template
if( ! function_exists( 'barberry_sguide_display_table_template' ) ) {
    function barberry_sguide_display_table_template( $sguide_post, $size_tables ){

        if ( !TDL_Opt::getOption('size_guides') || !$size_tables || !$sguide_post ) return;
        
        $sguide_custom_css = get_post_meta( $sguide_post->ID, '_wpb_shortcodes_custom_css', true );
		$barberry_shortcodes_custom_css = get_post_meta( $sguide_post->ID, 'barberry_shortcodes_custom_css', true );
        $show_table = get_post_meta( $sguide_post->ID, 'barberry_sguide_hide_table' );
        $show_table = isset( $show_table[0] ) ? $show_table[0] : 'show';
        ?>
            <style type="text/css" data-type="vc_shortcodes-custom-css">
                <?php if ( ! empty( $sguide_custom_css ) ): ?>
                    <?php echo esc_attr($sguide_custom_css); ?>
                <?php endif ?>
                <?php if ( ! empty( $barberry_shortcodes_custom_css ) ): ?>
                    <?php echo esc_attr($barberry_shortcodes_custom_css); ?>
                <?php endif ?>
			/* */
            </style>
            
            <div class="sizeguide-link">
                <a data-open="sizeGuideModal" class="barberry-open-popup barberry-sizeguide-btn"><?php esc_html_e( 'Size Guide', 'barberry' ); ?></a>
            </div>

            <div class="reveal" id="sizeGuideModal" data-reveal data-close-on-click="true" data-animation-in="fade-in" data-animation-out="fade-out">
                  <div class="nano">
                    <div class="nano-content">                
                <h3 class="barberry-sizeguide-title"><?php echo esc_html( $sguide_post->post_title ); ?></h3>
                <div class="barberry-sizeguide-content"><?php echo do_shortcode( $sguide_post->post_content ); ?></div>
                <?php if ( $show_table == 'show' ): ?>
                    <div class="table-scroll">
                        <table class="barberry-sizeguide-table">
                            <?php foreach ( $size_tables as $table ): ?>
                                <?php foreach ( $table as $row ): ?>
                                    <tr>
                                        <?php foreach ( $row as $col ): ?>
                                            <td><?php echo esc_html( $col ); ?></td>
                                        <?php endforeach; ?>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        </table>
                    </div>
                <?php endif; ?>

                <div class="close-icon" data-close aria-label="Close modal">
                    <span class="close-icon_top"></span>
                    <span class="close-icon_bottom"></span>
                </div>
                </div>
                </div>                  
            </div>
        <?php
    }
}

/**
 * ------------------------------------------------------------------------------------------------
 * Category
 * ------------------------------------------------------------------------------------------------
 */
 
//Size guide save category
if( ! function_exists( 'barberry_sguide_save_category' ) ) {
    function barberry_sguide_save_category( $post_id ) {
        if ( isset( $_POST['barberry_sguide_category'] ) ) {
            $selected_sguide_category = $_POST['barberry_sguide_category'];
            update_post_meta( $post_id, 'barberry_chosen_cats', $selected_sguide_category );
            
            $terms = get_terms( 'product_cat' );
            foreach ( $selected_sguide_category as $selected_sguide_cat ) {
                update_woocommerce_term_meta( $selected_sguide_cat, 'barberry_chosen_sguide', $post_id );
            }

            foreach( $terms as $term ){
                if ( !in_array( $term->term_id, $selected_sguide_category ) ) {
                    if ( $post_id == get_term_meta( $term->term_id, 'barberry_chosen_sguide', true ) ) {
                        update_woocommerce_term_meta( $term->term_id, 'barberry_chosen_sguide', '' );
                    }
                }
            }
        }
        else{
            update_post_meta( $post_id, 'barberry_chosen_cats', '' );
        }
    }
}

//Size guide category template
if( ! function_exists( 'barberry_sguide_category_template' ) ) {
    function barberry_sguide_category_template( $post ) {
        $arg = array(
            'taxonomy'     => 'product_cat',
            'orderdby'     => 'name',
            'hierarchical' => 1
        );

        $chosen_cats = get_post_meta( $post->ID, 'barberry_chosen_cats' );
        
        if ( ! empty( $chosen_cats ) ) $chosen_cats = $chosen_cats[0];

        $sguide_cat_list = get_categories( $arg );
        
        ?>
        <ul>
            <?php foreach ( $sguide_cat_list as $sguide_cat ): ?>
                <?php $checked = false; ?>
                <?php if ( is_array( $chosen_cats ) && in_array( $sguide_cat->term_id, $chosen_cats ) ) $checked = 'checked'; ?>
                <li>
                    <input type="checkbox" name="barberry_sguide_category[]" value="<?php echo esc_attr($sguide_cat->term_id); ?>" <?php echo esc_attr($checked); ?>>
                    <?php echo esc_attr($sguide_cat->name); ?>
                </li>
            <?php endforeach; ?>
        </ul>
        <?php
    }
}

/**
 * ------------------------------------------------------------------------------------------------
 * Hide table
 * ------------------------------------------------------------------------------------------------
 */

//Size guide hide table template
if( ! function_exists( 'barberry_sguide_hide_table_template' ) ) {
    function barberry_sguide_hide_table_template( $post ) {
        $disable_table = get_post_meta( $post->ID, 'barberry_sguide_hide_table' );
        $disable_table = isset( $disable_table[0] ) ? $disable_table[0] : 'show';
        ?>
        <label>
            <input type="checkbox" name="barberry_sguide_hide_table" id="barberry_sguide_hide_table" <?php checked( 'hide', $disable_table, true ); ?> > 
            <?php esc_html_e( 'Hide size guide table', 'barberry' ) ?>
        </label>
        <?php
    }
}

//Size guide hide table save
if( ! function_exists( 'barberry_sguide_hide_table_save' ) ) {
    function barberry_sguide_hide_table_save( $post_id ){
        if ( isset( $_POST['barberry_sguide_hide_table'] ) && $_POST['barberry_sguide_hide_table'] == 'on' ) {
            update_post_meta( $post_id, 'barberry_sguide_hide_table', 'hide' );
        } else {
            update_post_meta( $post_id, 'barberry_sguide_hide_table', 'show' );
        }
    }
}
