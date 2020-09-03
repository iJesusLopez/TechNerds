<?php

// [gbt_custom_button]

function barberry_shortcode_button($atts, $content = null) {
    $button_randomid = rand();	

	extract(shortcode_atts(array(
		"title" => "",
        "bg_color" => "",
        "url"   => "",
        "target"   => 'false',
        "button_size" => "normal",
        "button_align" => "inline"
	), $atts));

    ob_start();

    $target_link = "";

    if ($target == 'true') {
        $target_link = "target='_blank'";
    }

    ?>

    <style>
        body:not(.is-mobile) .b-button-<?php echo $button_randomid ?> a.button:hover {
            border-color: <?php echo esc_html($bg_color); ?>;
            color: <?php echo esc_html($bg_color); ?>;
        }       
    </style>

    <div class="barberry-button-container b-button_<?php echo esc_html($button_align); ?> b-button-<?php echo esc_html($button_randomid); ?>">
        <a href="<?php echo esc_html($url); ?>" style="background-color: <?php echo esc_html($bg_color); ?>; border-color: <?php echo esc_html($bg_color); ?>;" <?php echo esc_html($target_link); ?> class="b-button_<?php echo esc_html($button_size); ?> button"><?php printf(__( '%s', 'barberry' ), $title); ?></a>
    </div>
    
    
    <?php
    $content = ob_get_contents();
	ob_end_clean();
	return $content;
}

add_shortcode("tdl_custom_button", "barberry_shortcode_button");