<?php

// [tdl_custom_button]

function barberry_shortcode_link($atts, $content = null) {	

	extract(shortcode_atts(array(
		"title" => "",
        "color" => "",
        "url"   => ""
	), $atts));

    ob_start();
    ?>

    <a class="shortcode_tdl barberry_custom_link" href="<?php echo esc_html($url); ?>" style="color: <?php echo esc_html($color); ?>; border-color: <?php echo esc_html($color); ?>;"><?php printf(__( '%s', 'barberry' ), $title); ?></a>
    
    <?php
    $content = ob_get_contents();
	ob_end_clean();
	return $content;
}

add_shortcode("tdl_custom_link", "barberry_shortcode_link");