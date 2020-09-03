<?php

function barberry_socials_shortcode($atts, $content = null) {	
    $randomid = rand();  

	extract(shortcode_atts(array(
		"items_align" => 'left',
        "color"       => '',
        "color_hover"  => '',
	), $atts));
    ob_start();

    ?>


    <style>
    <?php if ($color != '') { ?>
        .site-social-icons-shortcode.social-id-<?php echo $randomid ?> .social-icons li svg {        
            fill: <?php echo $color; ?>;
        } 
        .site-social-icons-shortcode.social-id-<?php echo $randomid ?> .social-icons li a:hover svg {        
            fill: <?php echo $color_hover; ?>;
        } 
        .site-social-icons-shortcode.social-id-<?php echo $randomid ?> .social-icons li a {        
            background: transparent;
        } 

        .site-social-icons-shortcode.social-id-<?php echo $randomid ?> .social-icons li a:after {        
            background: <?php echo $color_hover; ?>;
            transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
            transition-delay: 0.4s;
        }                  
        .site-social-icons-shortcode.social-id-<?php echo $randomid ?> .social-icons li .s-circle_bg {        
            background: <?php echo $color; ?>;
        }   
    <?php } ?>  
    </style>



    <div class="site-social-icons-shortcode social-id-<?php echo $randomid ?>">

    <ul class="social-icons <?php echo $items_align; ?>">

        <?php if ( !empty(TDL_Opt::getOption('facebook_link')) && (trim(TDL_Opt::getOption('facebook_link'))) != "" ) { ?>
            <li class="facebook">
                <a target="_blank" title="Facebook" href="<?php echo esc_url(TDL_Opt::getOption('facebook_link')); ?>">
                    <svg class="svg-icon" viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve">
                      <use x="0" y="0" xlink:href="#i-facebook"></use>
                    </svg> 
                    <span class="s-circle_bg"></span>
                </a>
            </li>
        <?php } ?>  

        <?php if ( !empty(TDL_Opt::getOption('twitter_link')) && (trim(TDL_Opt::getOption('twitter_link'))) != "" ) { ?>
            <li class="twitter">
                <a target="_blank" title="Twitter" href="<?php echo esc_url(TDL_Opt::getOption('twitter_link')); ?>">
                      <svg class="svg-icon" viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve">
                        <use x="0" y="0" xlink:href="#i-twitter"></use>
                      </svg> 
                    <span class="s-circle_bg"></span>
                </a>
            </li>
        <?php } ?>

        <?php if ( !empty(TDL_Opt::getOption('pinterest_link')) && (trim(TDL_Opt::getOption('pinterest_link'))) != "" ) { ?>
            <li class="pinterest">
                <a target="_blank" title="Pinterest" href="<?php echo esc_url(TDL_Opt::getOption('pinterest_link')); ?>">
                      <svg class="svg-icon" viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve">
                        <use x="0" y="0" xlink:href="#i-pinterest"></use>
                      </svg> 
                    <span class="s-circle_bg"></span>
                </a>
            </li>
        <?php } ?>

        <?php if ( !empty(TDL_Opt::getOption('googleplus_link')) && (trim(TDL_Opt::getOption('googleplus_link'))) != "" ) { ?>
            <li class="googleplus">
                <a target="_blank" title="Google Plus" href="<?php echo esc_url(TDL_Opt::getOption('googleplus_link')); ?>">
                      <svg class="svg-icon" viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve">
                        <use x="0" y="0" xlink:href="#i-googleplus"></use>
                      </svg> 
                    <span class="s-circle_bg"></span>
                </a>
            </li>
        <?php } ?>  
        
        <?php if ( !empty(TDL_Opt::getOption('telegram_link')) && (trim(TDL_Opt::getOption('telegram_link'))) != "" ) { ?>
            <li class="telegram">
                <a target="_blank" title="Telegram" href="<?php echo esc_url(TDL_Opt::getOption('telegram_link')); ?>">
                      <svg class="svg-icon" viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve">
                        <use x="0" y="0" xlink:href="#i-telegram"></use>
                      </svg> 
                    <span class="s-circle_bg"></span>
                </a>
            </li>
        <?php } ?>

        <?php if ( !empty(TDL_Opt::getOption('vkontakte_link')) && (trim(TDL_Opt::getOption('vkontakte_link'))) != "" ) { ?>
            <li class="vkontakte">
                <a target="_blank" title="VKontakte" href="<?php echo esc_url(TDL_Opt::getOption('vkontakte_link')); ?>">
                      <svg class="svg-icon" viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve">
                        <use x="0" y="0" xlink:href="#i-vkontakte"></use>
                      </svg> 
                    <span class="s-circle_bg"></span>
                </a>
            </li>
        <?php } ?>              

        <?php if ( !empty(TDL_Opt::getOption('linkedin_link')) && (trim(TDL_Opt::getOption('linkedin_link'))) != "" ) { ?>
            <li class="linkedin">
                <a target="_blank" title="Linkedin" href="<?php echo esc_url(TDL_Opt::getOption('linkedin_link')); ?>">
                      <svg class="svg-icon" viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve">
                        <use x="0" y="0" xlink:href="#i-linkedin"></use>
                      </svg> 
                    <span class="s-circle_bg"></span>
                </a>
            </li>
        <?php } ?>

        <?php if ( !empty(TDL_Opt::getOption('rss_link')) && (trim(TDL_Opt::getOption('rss_link'))) != "" ) { ?>
            <li class="rss">
                <a target="_blank" title="RSS" href="<?php echo esc_url(TDL_Opt::getOption('rss_link')); ?>">
                      <svg class="svg-icon" viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve">
                        <use x="0" y="0" xlink:href="#i-rss"></use>
                      </svg> 
                    <span class="s-circle_bg"></span>
                </a>
            </li>
        <?php } ?>

        <?php if ( !empty(TDL_Opt::getOption('tumblr_link')) && (trim(TDL_Opt::getOption('tumblr_link'))) != "" ) { ?>
            <li class="tumblr">
                <a target="_blank" title="Tumblr" href="<?php echo esc_url(TDL_Opt::getOption('tumblr_link')); ?>">
                      <svg class="svg-icon" viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve">
                        <use x="0" y="0" xlink:href="#i-tumblr"></use>
                      </svg> 
                    <span class="s-circle_bg"></span>
                </a>
            </li>
        <?php } ?>

        <?php if ( !empty(TDL_Opt::getOption('instagram_link')) && (trim(TDL_Opt::getOption('instagram_link'))) != "" ) { ?>
            <li class="instagram">
                <a target="_blank" title="Instagram" href="<?php echo esc_url(TDL_Opt::getOption('instagram_link')); ?>">
                      <svg class="svg-icon" viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve">
                        <use x="0" y="0" xlink:href="#i-instagram"></use>
                      </svg> 
                    <span class="s-circle_bg"></span>
                </a>
            </li>
        <?php } ?>


        <?php if ( !empty(TDL_Opt::getOption('youtube_link')) && (trim(TDL_Opt::getOption('youtube_link'))) != "" ) { ?>
            <li class="youtube">
                <a target="_blank" title="YouTube" href="<?php echo esc_url(TDL_Opt::getOption('youtube_link')); ?>">
                      <svg class="svg-icon" viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve">
                        <use x="0" y="0" xlink:href="#i-youtube"></use>
                      </svg> 
                    <span class="s-circle_bg"></span>
                </a>
            </li>
        <?php } ?>

        <?php if ( !empty(TDL_Opt::getOption('vimeo_link')) && (trim(TDL_Opt::getOption('vimeo_link'))) != "" ) { ?>
            <li class="vimeo">
                <a target="_blank" title="Vimeo" href="<?php echo esc_url(TDL_Opt::getOption('vimeo_link')); ?>">
                      <svg class="svg-icon" viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve">
                        <use x="0" y="0" xlink:href="#i-vimeo"></use>
                      </svg> 
                    <span class="s-circle_bg"></span>
                </a>
            </li>
        <?php } ?>

        <?php if ( !empty(TDL_Opt::getOption('behance_link')) && (trim(TDL_Opt::getOption('behance_link'))) != "" ) { ?>
            <li class="behance">
                <a target="_blank" title="Behance" href="<?php echo esc_url(TDL_Opt::getOption('behance_link')); ?>">
                      <svg class="svg-icon" viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve">
                        <use x="0" y="0" xlink:href="#i-behance"></use>
                      </svg> 
                    <span class="s-circle_bg"></span>
                </a>
            </li>
        <?php } ?>

        <?php if ( !empty(TDL_Opt::getOption('dribbble_link')) && (trim(TDL_Opt::getOption('dribbble_link'))) != "" ) { ?>
            <li class="dribbble">
                <a target="_blank" title="Dribbble" href="<?php echo esc_url(TDL_Opt::getOption('dribbble_link')); ?>">
                      <svg class="svg-icon" viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve">
                        <use x="0" y="0" xlink:href="#i-dribbble"></use>
                      </svg> 
                    <span class="s-circle_bg"></span>
                </a>
            </li>
        <?php } ?>

        <?php if ( !empty(TDL_Opt::getOption('flickr_link')) && (trim(TDL_Opt::getOption('flickr_link'))) != "" ) { ?>
            <li class="flickr">
                <a target="_blank" title="Flickr" href="<?php echo esc_url(TDL_Opt::getOption('flickr_link')); ?>">
                      <svg class="svg-icon" viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve">
                        <use x="0" y="0" xlink:href="#i-flickr"></use>
                      </svg> 
                    <span class="s-circle_bg"></span>
                </a>
            </li>
        <?php } ?>

        <?php if ( !empty(TDL_Opt::getOption('git_link')) && (trim(TDL_Opt::getOption('git_link'))) != "" ) { ?>
            <li class="git">
                <a target="_blank" title="Git" href="<?php echo esc_url(TDL_Opt::getOption('git_link')); ?>">
                      <svg class="svg-icon" viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve">
                        <use x="0" y="0" xlink:href="#i-git"></use>
                      </svg> 
                    <span class="s-circle_bg"></span>
                </a>
            </li>
        <?php } ?>

        <?php if ( !empty(TDL_Opt::getOption('skype_link')) && (trim(TDL_Opt::getOption('skype_link'))) != "" ) { ?>
            <li class="skype">
                <a target="_blank" title="Skype" href="<?php echo esc_url(TDL_Opt::getOption('skype_link')); ?>">
                      <svg class="svg-icon" viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve">
                        <use x="0" y="0" xlink:href="#i-skype"></use>
                      </svg> 
                    <span class="s-circle_bg"></span>
                </a>
            </li>
        <?php } ?>

        <?php if ( !empty(TDL_Opt::getOption('weibo_link')) && (trim(TDL_Opt::getOption('weibo_link'))) != "" ) { ?>
            <li class="weibo">
                <a target="_blank" title="Weibo" href="<?php echo esc_url(TDL_Opt::getOption('weibo_link')); ?>">
                      <svg class="svg-icon" viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve">
                        <use x="0" y="0" xlink:href="#i-weibo"></use>
                      </svg> 
                    <span class="s-circle_bg"></span>
                </a>
            </li>
        <?php } ?>

        <?php if ( !empty(TDL_Opt::getOption('envato_link')) && (trim(TDL_Opt::getOption('envato_link'))) != "" ) { ?>
            <li class="envato">
                <a target="_blank" title="Envato" href="<?php echo esc_url(TDL_Opt::getOption('envato_link')); ?>">
                      <svg class="svg-icon" viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve">
                        <use x="0" y="0" xlink:href="#i-envato"></use>
                      </svg> 
                    <span class="s-circle_bg"></span>
                </a>
            </li>
        <?php } ?>

        <?php if ( !empty(TDL_Opt::getOption('soundcloud_link')) && (trim(TDL_Opt::getOption('soundcloud_link'))) != "" ) { ?>
            <li class="soundcloud">
                <a target="_blank" title="Soundcloud" href="<?php echo esc_url(TDL_Opt::getOption('soundcloud_link')); ?>">
                      <svg class="svg-icon" viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve">
                        <use x="0" y="0" xlink:href="#i-soundcloud"></use>
                      </svg> 
                    <span class="s-circle_bg"></span>
                </a>
            </li>
        <?php } ?>

        <?php if ( !empty(TDL_Opt::getOption('blogger_link')) && (trim(TDL_Opt::getOption('blogger_link'))) != "" ) { ?>
            <li class="blogger">
                <a target="_blank" title="Blogger" href="<?php echo esc_url(TDL_Opt::getOption('blogger_link')); ?>">
                      <svg class="svg-icon" viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve">
                        <use x="0" y="0" xlink:href="#i-blogger"></use>
                      </svg> 
                    <span class="s-circle_bg"></span>
                </a>
            </li>
        <?php } ?>

        <?php if ( !empty(TDL_Opt::getOption('whatsapp_link')) && (trim(TDL_Opt::getOption('whatsapp_link'))) != "" ) { ?>
            <li class="whatsapp">
                <a target="_blank" title="WhatsApp" href="<?php echo esc_url(TDL_Opt::getOption('whatsapp_link')); ?>">
                      <svg class="svg-icon" viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve">
                        <use x="0" y="0" xlink:href="#i-whatsapp"></use>
                      </svg> 
                    <span class="s-circle_bg"></span>
                </a>
            </li>
        <?php } ?>

        <?php if ( !empty(TDL_Opt::getOption('viber_link')) && (trim(TDL_Opt::getOption('viber_link'))) != "" ) { ?>
            <li class="viber">
                <a target="_blank" title="Viber" href="<?php echo esc_url(TDL_Opt::getOption('viber_link')); ?>">
                      <svg class="svg-icon" viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve">
                        <use x="0" y="0" xlink:href="#i-viber"></use>
                      </svg> 
                    <span class="s-circle_bg"></span>
                </a>
            </li>
        <?php } ?>

        <?php if ( !empty(TDL_Opt::getOption('spotify_link')) && (trim(TDL_Opt::getOption('spotify_link'))) != "" ) { ?>
            <li class="spotify">
                <a target="_blank" title="Spotify" href="<?php echo esc_url(TDL_Opt::getOption('spotify_link')); ?>">
                      <svg class="svg-icon" viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve">
                        <use x="0" y="0" xlink:href="#i-spotify"></use>
                      </svg> 
                    <span class="s-circle_bg"></span>
                </a>
            </li>
        <?php } ?>
        
        <?php if ( !empty(TDL_Opt::getOption('discord_link')) && (trim(TDL_Opt::getOption('discord_link'))) != "" ) { ?>
            <li class="discord">
                <a target="_blank" title="Spotify" href="<?php echo esc_url(TDL_Opt::getOption('discord_link')); ?>">
                      <svg class="svg-icon" viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve">
                        <use x="0" y="0" xlink:href="#i-discord"></use>
                      </svg> 
                    <span class="s-circle_bg"></span>
                </a>
            </li>
        <?php } ?> 
    </ul>
    </div>
    
    <?php
    $content = ob_get_contents();
	ob_end_clean();
	return $content;
}

add_shortcode("social-media", "barberry_socials_shortcode");