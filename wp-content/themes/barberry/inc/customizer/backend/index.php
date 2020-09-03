<?php

// ==================================================================
// Remove Customize Pages
// ==================================================================

add_action('admin_menu', 'remove_customize_pages');
function remove_customize_pages(){
    global $submenu;
    //echo "<pre>";
    //print_r($submenu);
    //echo "</pre>";
    unset($submenu['themes.php'][15]); // remove Header link
    unset($submenu['themes.php'][20]); // remove Background link
}


// ==================================================================
// Custom Controls
// ==================================================================

add_action( 'customize_register', function( $wp_customize ) {

    class Kirki_Control_Separator extends WP_Customize_Control {
        public $type = 'separator';
        public function render_content() { ?>
            <hr />
            <?php
        }
    }

    add_filter( 'kirki/control_types', function( $controls ) {
        $controls['separator'] = 'Kirki_Control_Separator';
        return $controls;
    } );

} );

// ==================================================================
// Control Config
// ==================================================================

Kirki::add_config( 'barberry', array(
    'capability'    => 'edit_theme_options',
    'option_type'   => 'theme_mod',
) );


// ==================================================================
// Product Attributes
// ==================================================================

function barberry_product_attributes() {
    $output = array();
    if ( function_exists( 'wc_get_attribute_taxonomies' ) ) {
        $attributes_tax = wc_get_attribute_taxonomies();
        if ( $attributes_tax ) {
            $output['none'] = esc_html__( 'None', 'barberry' );

            foreach ( $attributes_tax as $attribute ) {
                $output[ $attribute->attribute_name ] = $attribute->attribute_label;
            }

        }
    }

    return $output;
}

//==============================================================================
//  Customizer css
//==============================================================================
function barberry_customizer_backend_styles() { ?>
    <style>
        #customize-controls .description {
            font-size: 12px;
            color: #777;
            font-style: normal;
            margin-bottom: 10px;
        }

        #customize-controls .big-separator {
            background: #555d66;
            display: block;
            font-size: 14px;
            line-height: 44px;
            font-weight: 600;
            margin-bottom: 10px;
            padding-left: 23px;
            color: #fff;
        }

        #customize-controls .big-separator.margin-top {
            margin-top: 40px;
        }
    </style>
    <?php

}
add_action( 'customize_controls_print_styles', 'barberry_customizer_backend_styles', 999 );

//==============================================================================
//  Remove Section
//==============================================================================
add_action( 'customize_register', 'barberry_remove_css_section', 15 );
/**
 * Remove the additional CSS section, introduced in 4.7, from the Customizer.
 * @param $wp_customize WP_Customize_Manager
 */
function barberry_remove_css_section( $wp_customize ) {
    $wp_customize->remove_section( 'custom_css' );
}