<?php


#-----------------------------------------------------------------#
# Get Header Menu
#-----------------------------------------------------------------#

if ( ! function_exists( 'barberry_header_menu' ) ) :
    function barberry_header_menu() {
        if ( has_nav_menu( 'primary' ) ) {
            wp_nav_menu(
                array(
                    'theme_location' => 'primary',
                    'container'      => false,
                    'menu_class'        => 'dropdown menu',
                    'items_wrap'        => '<ul id="%1$s" class="%2$s" data-dropdown-menu data-hover-delay="150" data-closing-time="0">%3$s</ul>',
                    'link_before'       => '<span>',
                    'link_after'        => '</span>',
                    'fallback_cb'       => 'Barberry_Mega_Menu_Fallback',               
                    'walker'         => new Barberry_Mega_Menu_Walker(),
                )
            );
        }
    }
endif;



#-----------------------------------------------------------------#
# SVG Defs
#-----------------------------------------------------------------#

if ( ! function_exists( 'barberry_favicon' ) ) {
    function barberry_favicon() {

        if (has_site_icon() == false)
            echo '<link rel="icon" href="' . get_stylesheet_directory_uri() . '/images/favicon.png" />';
        
    }
    add_action('wp_head', 'barberry_favicon');
}

/**
 * Hide ACF Menu
 */

if ( TDL_Opt::getOption('hide_acf') ) {
    add_filter( 'acf/settings/show_admin', '__return_false' );
}



#-----------------------------------------------------------------#
# SVG Defs
#-----------------------------------------------------------------#

if ( ! function_exists( 'barberry_svg_defs' ) ) :
    function barberry_svg_defs() {
?>

  <!-- begin .svg-defs -->
  <div id="svg-defs" class="svg-defs">
    <svg viewBox="0 0 40 40">
      <defs>

        <g id="i-search" class="nc-icon-wrapper" fill="none" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10">
            <path data-color="color-2" d="M22 22l-5.6-5.6"/>
            <circle cx="10" cy="10" r="9"/>
        </g>

        <g id="i-wishlist" class="nc-icon-wrapper" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10">
            <path fill="none" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" d="M21.243 3.757c-2.343-2.343-6.142-2.343-8.485 0-.289.289-.54.6-.757.927-.217-.327-.469-.639-.757-.927-2.343-2.343-6.142-2.343-8.485 0-2.343 2.343-2.343 6.142 0 8.485L12 21.485l9.243-9.243c2.343-2.343 2.343-6.142 0-8.485z"/>
        </g> 

        <g id="i-compare" fill="none" stroke-width="2" class="nc-icon-wrapper" stroke-linecap="square" stroke-linejoin="miter" stroke-miterlimit="10">
            <path d="M2,12C2,6.5,6.5,2,12,2 c3.9,0,7.3,2.2,8.9,5.5" stroke-linecap="butt"/>
            <path d="m22 12c0 5.5-4.5 10-10 10-3.9 0-7.3-2.2-8.9-5.5" stroke-linecap="butt"/>
            <polyline points="21.8 1.7 21 7.6 15 6.8"/>
            <polyline points="2.2 22.3 3 16.4 9 17.2"/>
        </g> 

        <g id="i-facebook" class="nc-icon-wrapper">
            <path d="M9.032 23L9 13H5V9h4V6.5C9 2.789 11.298 1 14.61 1c1.585 0 2.948.118 3.345.17v3.88H15.66c-1.8 0-2.15.856-2.15 2.112V9h5.241l-2 4h-3.24v10H9.032z"/>
        </g> 

        <g id="i-back" class="nc-icon-wrapper" stroke-linecap="square" stroke-width="2" fill="none" stroke-miterlimit="10">
            <path data-cap="butt" data-color="color-2" stroke-linecap="butt" d="M30 16H2"/>
            <path d="M11 25l-9-9 9-9"/>
        </g>    

        <g id="i-twitter" class="nc-icon-wrapper">
            <path d="M24 4.6c-.9.4-1.8.7-2.8.8 1-.6 1.8-1.6 2.2-2.7-1 .6-2 1-3.1 1.2-.9-1-2.2-1.6-3.6-1.6-2.7 0-4.9 2.2-4.9 4.9 0 .4 0 .8.1 1.1-4.2-.2-7.8-2.2-10.2-5.2-.5.8-.7 1.6-.7 2.5 0 1.7.9 3.2 2.2 4.1-.8 0-1.6-.2-2.2-.6v.1c0 2.4 1.7 4.4 3.9 4.8-.4.1-.8.2-1.3.2-.3 0-.6 0-.9-.1.6 2 2.4 3.4 4.6 3.4-1.7 1.3-3.8 2.1-6.1 2.1-.4 0-.8 0-1.2-.1 2.2 1.4 4.8 2.2 7.5 2.2 9.1 0 14-7.5 14-14v-.6c1-.7 1.8-1.6 2.5-2.5z"/>
        </g> 

        <g id="i-pinterest" class="nc-icon-wrapper">
            <path d="M12 0C5.4 0 0 5.4 0 12c0 5.1 3.2 9.4 7.6 11.2-.1-.9-.2-2.4 0-3.4.2-.9 1.4-6 1.4-6s-.3-.8-.3-1.8c0-1.7 1-2.9 2.2-2.9 1 0 1.5.8 1.5 1.7 0 1-.7 2.6-1 4-.3 1.2.6 2.2 1.8 2.2 2.1 0 3.8-2.2 3.8-5.5 0-2.9-2.1-4.9-5-4.9-3.4 0-5.4 2.6-5.4 5.2 0 1 .4 2.1.9 2.7.1.1.1.2.1.3-.1.4-.3 1.2-.3 1.4-.1.2-.2.3-.4.2-1.5-.7-2.4-2.9-2.4-4.6 0-3.8 2.8-7.3 7.9-7.3 4.2 0 7.4 3 7.4 6.9 0 4.1-2.6 7.5-6.2 7.5-1.2 0-2.4-.6-2.8-1.4 0 0-.6 2.3-.7 2.9-.3 1-1 2.3-1.5 3.1 1 .3 2.2.5 3.4.5 6.6 0 12-5.4 12-12S18.6 0 12 0z"/>
        </g> 

        <g id="i-linkedin" class="nc-icon-wrapper">
            <path d="M23 0H1C.4 0 0 .4 0 1v22c0 .6.4 1 1 1h22c.6 0 1-.4 1-1V1c0-.6-.4-1-1-1zM7.1 20.5H3.6V9h3.6v11.5zM5.3 7.4c-1.1 0-2.1-.9-2.1-2.1 0-1.1.9-2.1 2.1-2.1 1.1 0 2.1.9 2.1 2.1 0 1.2-.9 2.1-2.1 2.1zm15.2 13.1h-3.6v-5.6c0-1.3 0-3-1.8-3-1.9 0-2.1 1.4-2.1 2.9v5.7H9.4V9h3.4v1.6c.5-.9 1.6-1.8 3.4-1.8 3.6 0 4.3 2.4 4.3 5.5v6.2z"/>
        </g> 

        <g id="i-googleplus" class="nc-icon-wrapper">
            <path d="M23.507,9.818H12.052v4.909h6.492C17.507,18,14.944,19.091,12,19.091a7.091,7.091,0,1,1,4.553-12.52l3.567-3.4A12,12,0,1,0,12,24C18.617,24,24.6,19.636,23.507,9.818Z"></path>
        </g> 

        <g id="i-rss" class="nc-icon-wrapper">
            <circle cx="4" cy="19" r="3"/><path d="M22 22h-4c0-9.374-7.626-17-17-17V1c11.58 0 21 9.42 21 21z"/><path data-color="color-2" d="M15 22h-4c0-5.514-4.486-10-10-10V8c7.72 0 14 6.28 14 14z"/>
        </g> 

        <g id="i-tumblr" class="nc-icon-wrapper">
            <path d="M17.7 19.2c-.4.2-1.3.4-1.9.4-1.9.1-2.3-1.3-2.3-2.4V9.7h4.8V6.1h-4.8V0H10c-.1 0-.2.1-.2.2-.2 1.9-1.1 5.1-4.7 6.4v3.1h2.4v7.8c0 2.7 2 6.5 7.2 6.4 1.8 0 3.7-.8 4.2-1.4l-1.2-3.3z"/>
        </g> 

        <g id="i-instagram" class="nc-icon-wrapper">
            <path d="M12 2.162c3.204 0 3.584.012 4.849.07 1.366.062 2.633.336 3.608 1.311.975.975 1.249 2.242 1.311 3.608.058 1.265.07 1.645.07 4.849s-.012 3.584-.07 4.849c-.062 1.366-.336 2.633-1.311 3.608-.975.975-2.242 1.249-3.608 1.311-1.265.058-1.645.07-4.849.07s-3.584-.012-4.849-.07c-1.366-.062-2.633-.336-3.608-1.311-.975-.975-1.249-2.242-1.311-3.608-.058-1.265-.07-1.645-.07-4.849s.012-3.584.07-4.849c.062-1.366.336-2.633 1.311-3.608.975-.975 2.242-1.249 3.608-1.311 1.265-.058 1.645-.07 4.849-.07M12 0C8.741 0 8.332.014 7.052.072c-1.95.089-3.663.567-5.038 1.942C.639 3.389.161 5.102.072 7.052.014 8.332 0 8.741 0 12c0 3.259.014 3.668.072 4.948.089 1.95.567 3.663 1.942 5.038 1.375 1.375 3.088 1.853 5.038 1.942C8.332 23.986 8.741 24 12 24s3.668-.014 4.948-.072c1.95-.089 3.663-.567 5.038-1.942 1.375-1.375 1.853-3.088 1.942-5.038.058-1.28.072-1.689.072-4.948s-.014-3.668-.072-4.948c-.089-1.95-.567-3.663-1.942-5.038C20.611.639 18.898.161 16.948.072 15.668.014 15.259 0 12 0z"/><path data-color="color-2" d="M12 5.838a6.162 6.162 0 1 0 0 12.324 6.162 6.162 0 0 0 0-12.324zM12 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8z"/><circle data-color="color-2" cx="18.406" cy="5.594" r="1.44"/>
        </g> 

        <g id="i-youtube" class="nc-icon-wrapper">
            <path d="M23.8 7.2s-.2-1.7-1-2.4c-.9-1-1.9-1-2.4-1-3.4-.2-8.4-.2-8.4-.2s-5 0-8.4.2c-.5.1-1.5.1-2.4 1-.7.7-1 2.4-1 2.4S0 9.1 0 11.1v1.8c0 1.9.2 3.9.2 3.9s.2 1.7 1 2.4c.9 1 2.1.9 2.6 1 1.9.2 8.2.2 8.2.2s5 0 8.4-.3c.5-.1 1.5-.1 2.4-1 .7-.7 1-2.4 1-2.4s.2-1.9.2-3.9V11c0-1.9-.2-3.8-.2-3.8zM9.5 15.1V8.4l6.5 3.4-6.5 3.3z"/>      
        </g> 

        <g id="i-vimeo" class="nc-icon-wrapper">
            <path d="M24 6.4c-.1 2.3-1.7 5.5-4.9 9.6-3.3 4.2-6 6.4-8.3 6.4-1.4 0-2.6-1.3-3.6-3.9-.6-2.4-1.3-4.7-1.9-7.1C4.6 8.8 3.8 7.5 3 7.5c-.2 0-.8.4-1.9 1.1L0 7.2c1.2-1 2.4-2.1 3.5-3.1C5.1 2.7 6.3 2 7.1 1.9c1.9-.2 3 1.1 3.4 3.8.5 2.9.8 4.8 1 5.5.5 2.4 1.1 3.7 1.8 3.7.5 0 1.3-.8 2.3-2.4 1-1.6 1.5-2.8 1.6-3.6.1-1.4-.4-2.1-1.6-2.1-.6 0-1.2.1-1.8.4 1.2-3.9 3.4-5.7 6.8-5.6 2.4.1 3.5 1.7 3.4 4.8z"/>        
        </g> 

        <g id="i-behance" class="nc-icon-wrapper">
            <path d="M9.686 11.196s2.271-.17 2.271-2.833c0-2.663-1.858-3.963-4.212-3.963H0v14.885h7.745s4.728.149 4.728-4.394c0 0 .207-3.695-2.787-3.695zm-6.273-4.15h4.332s1.053 0 1.053 1.548-.62 1.773-1.321 1.773H3.413V7.046zm4.132 9.593H3.413v-3.978h4.332s1.57-.02 1.57 2.044c0 1.722-1.149 1.917-1.77 1.934zM18.78 8.187c-5.725 0-5.72 5.719-5.72 5.719s-.392 5.69 5.72 5.69c0 0 5.092.29 5.092-3.959h-2.619s.087 1.6-2.386 1.6c0 0-2.62.176-2.62-2.589h7.713s.843-6.46-5.18-6.46zm2.327 4.474h-4.89s.321-2.294 2.62-2.294c2.3 0 2.27 2.294 2.27 2.294z"/><path data-color="color-2" d="M16 5h6v2h-6z"/>   
        </g> 

        <g id="i-dribbble" class="nc-icon-wrapper">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M12 24C5.4 24 0 18.6 0 12S5.4 0 12 0s12 5.4 12 12-5.4 12-12 12zm10.1-10.4c-.4-.1-3.2-1-6.4-.4 1.3 3.7 1.9 6.7 2 7.3 2.3-1.5 4-4 4.4-6.9zM16 21.5c-.2-.9-.7-4-2.2-7.8h-.1c-5.8 2-7.9 6-8 6.4 1.7 1.4 3.9 2.2 6.3 2.2 1.4 0 2.8-.3 4-.8zM4.4 18.9c.2-.4 3-5.1 8.3-6.8.1 0 .3-.1.4-.1-.3-.6-.5-1.2-.8-1.7-5.1 1.5-10.1 1.5-10.5 1.5v.3c0 2.5.9 5 2.6 6.8zM2 9.9c.5 0 4.7 0 9.5-1.2-1.7-3-3.5-5.6-3.8-5.9C4.8 4.1 2.6 6.7 2 9.9zm7.6-7.8c.3.4 2.1 2.9 3.8 6 3.6-1.4 5.2-3.4 5.4-3.7C17 2.7 14.6 1.8 12 1.8c-.8 0-1.6.1-2.4.3zm10.3 3.4c-.2.3-1.9 2.5-5.7 4 .2.5.5 1 .7 1.5.1.2.1.4.2.5 3.4-.4 6.8.3 7.1.3 0-2.3-.8-4.5-2.3-6.3z"/> 
        </g>    
        
        <g id="i-flickr" class="nc-icon-wrapper">
            <path d="M23 0H1C.4 0 0 .4 0 1v22c0 .6.4 1 1 1h22c.6 0 1-.4 1-1V1c0-.6-.4-1-1-1zM7 16c-2.2 0-4-1.8-4-4s1.8-4 4-4 4 1.8 4 4-1.8 4-4 4zm10 0c-2.2 0-4-1.8-4-4s1.8-4 4-4 4 1.8 4 4-1.8 4-4 4z"/>       
        </g>                     

        <g id="i-git" class="nc-icon-wrapper">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M12 .3C5.4.3 0 5.7 0 12.3c0 5.3 3.4 9.8 8.2 11.4.6.1.8-.3.8-.6v-2c-3.3.7-4-1.6-4-1.6-.5-1.4-1.3-1.8-1.3-1.8-1.2-.7 0-.7 0-.7 1.2.1 1.8 1.2 1.8 1.2 1.1 1.8 2.8 1.3 3.5 1 .1-.8.4-1.3.8-1.6-2.7-.3-5.5-1.3-5.5-5.9 0-1.3.5-2.4 1.2-3.2 0-.4-.5-1.6.2-3.2 0 0 1-.3 3.3 1.2 1-.3 2-.4 3-.4s2 .1 3 .4c2.3-1.6 3.3-1.2 3.3-1.2.7 1.7.2 2.9.1 3.2.8.8 1.2 1.9 1.2 3.2 0 4.6-2.8 5.6-5.5 5.9.4.4.8 1.1.8 2.2v3.3c0 .3.2.7.8.6 4.8-1.6 8.2-6.1 8.2-11.4C24 5.7 18.6.3 12 .3z"/>    
        </g>    

        <g id="i-skype" class="nc-icon-wrapper">
            <g class="nc-icon-wrapper"><path d="M10 .9s-.1 0-.1-.1h-.1l.2.1zM.9 9.9v.1s0 .1.1.1l-.1-.2zM23.1 14.1V14s0-.1-.1-.1l.1.2zM13.9 23s.1 0 .1.1h.1l-.2-.1z"/><path d="M23.2 14v.1-.2c-.1 0-.1.1 0 .1.1-.7.2-1.4.2-2.1 0-1.5-.3-3-.9-4.4-.6-1.3-1.4-2.5-2.5-3.6-1-1-2.3-1.9-3.6-2.4C15 .9 13.5.6 12 .6c-.7 0-1.4.1-2.1.2 0 0 .1 0 .1.1h-.2.1C8.9.3 7.8 0 6.7 0 4.9 0 3.2.7 2 2 .7 3.3 0 5 0 6.7 0 7.9.3 9 .8 10v-.1.2s0-.1-.1-.1c-.1.6-.2 1.3-.2 2 0 1.5.3 3 .9 4.4C2.1 17.7 3 18.9 4 20c1 1 2.3 1.9 3.6 2.4 1.4.6 2.9.9 4.4.9.7 0 1.3-.1 2-.2 0 0-.1 0-.1-.1h.1c1 .6 2.1.9 3.3.9 1.8 0 3.5-.7 4.7-2 1.3-1.3 2-3 2-4.7 0-1.1-.3-2.2-.8-3.2zm-11.1 4.9c-4 0-5.8-2-5.8-3.5 0-.8.6-1.3 1.3-1.3 1.7 0 1.3 2.5 4.5 2.5 1.6 0 2.6-.9 2.6-1.8 0-.5-.3-1.2-1.4-1.4l-3.6-.9c-2.9-.7-3.4-2.3-3.4-3.7 0-3 2.9-4.2 5.6-4.2 2.5 0 5.4 1.4 5.4 3.2 0 .8-.7 1.2-1.5 1.2-1.5 0-1.2-2-4.2-2-1.5 0-2.3.7-2.3 1.6 0 1 1.2 1.3 2.2 1.5l2.7.6c2.9.6 3.6 2.3 3.6 3.9 0 2.4-1.9 4.3-5.7 4.3z"/></g>     
        </g>    

        <g id="i-weibo" class="nc-icon-wrapper">
            <g class="nc-icon-wrapper"><path d="M10.082 20.298c-3.973.392-7.403-1.404-7.661-4.012-.258-2.608 2.755-5.041 6.727-5.433 3.973-.393 7.403 1.403 7.661 4.01.258 2.609-2.754 5.043-6.727 5.435m7.947-8.659c-.338-.101-.57-.17-.393-.614.383-.964.423-1.796.007-2.39-.779-1.113-2.911-1.053-5.354-.03 0-.001-.767.336-.571-.273.376-1.208.319-2.22-.266-2.805-1.325-1.326-4.85.051-7.874 3.073C1.315 10.864 0 13.264 0 15.339c0 3.969 5.09 6.382 10.069 6.382 6.527 0 10.869-3.792 10.869-6.803 0-1.82-1.532-2.852-2.909-3.279"/><path data-color="color-2" d="M22.363 4.376a6.353 6.353 0 0 0-6.047-1.957h-.001a.918.918 0 1 0 .384 1.797 4.52 4.52 0 0 1 5.244 5.81v.001a.92.92 0 0 0 1.749.567v-.003a6.35 6.35 0 0 0-1.329-6.215"/><path data-color="color-2" d="M19.942 6.56a3.093 3.093 0 0 0-2.945-.952.79.79 0 1 0 .33 1.547v.001a1.518 1.518 0 0 1 1.441.464c.375.416.476.984.315 1.481h.001a.791.791 0 0 0 1.505.486 3.09 3.09 0 0 0-.647-3.027"/><path d="M10.301 15.574c-.139.238-.446.352-.687.253-.237-.097-.311-.363-.177-.597.139-.232.434-.346.67-.252.241.088.327.357.194.596m-1.266 1.625c-.384.613-1.207.882-1.827.599-.611-.278-.791-.991-.407-1.588.38-.595 1.175-.861 1.79-.603.623.265.822.973.444 1.592m1.444-4.339c-1.891-.492-4.028.45-4.849 2.116-.836 1.699-.028 3.585 1.882 4.202 1.979.638 4.311-.34 5.122-2.174.8-1.793-.198-3.639-2.155-4.144"/></g>       
        </g>    

        <g id="i-envato" class="nc-icon-wrapper">
            <path d="M19.4.1c1.1.5 5.5 10 1.7 18.2-3 6.6-10.7 6.6-14.6 4.3-3.3-2-8.4-8.2-2.8-15.9.2-.3.8-.3.7.6-.1.6-.9 5.1.6 7 .7 1 .9.3.9.3s0-6.5 5-11.4c3.2-3 7.7-3.5 8.5-3.1z"/>            
        </g>

        <g id="i-apple" class="nc-icon-wrapper">
            <path d="M21.354,16.487c-1.338-0.506-2.233-1.721-2.334-3.17c-0.099-1.412,0.593-2.666,1.851-3.355l1.046-0.573 l-0.747-0.93c-1.255-1.563-3.051-2.497-4.804-2.497c-1.215,0-2.058,0.318-2.735,0.574c-0.478,0.181-0.855,0.323-1.269,0.323 c-0.472,0-0.938-0.166-1.478-0.358c-0.708-0.252-1.51-0.538-2.54-0.538c-1.99,0-3.997,1.188-5.237,3.098 c-1.851,2.849-1.343,7.734,1.208,11.616C5.326,22.215,6.743,23.982,8.75,24c0.013,0,0.026,0,0.039,0 c1.643,0,2.003-0.876,3.598-0.886c1.742,0.082,1.962,0.893,3.589,0.882c1.961-0.018,3.375-1.771,4.499-3.484 c0.664-1.007,0.921-1.534,1.438-2.678l0.438-0.97L21.354,16.487z"></path> <path data-color="color-2" d="M15.1,3.45c0.65-0.834,1.143-2.011,0.964-3.214c-1.062,0.073-2.302,0.748-3.027,1.628 c-0.658,0.799-1.201,1.983-0.99,3.135C13.205,5.035,14.404,4.343,15.1,3.45L15.1,3.45z"></path>           
        </g>


        <g id="i-soundcloud" class="nc-icon-wrapper">
            <g class="nc-icon-wrapper"><path data-color="color-2" d="M.451 12.304c-.008-.059-.05-.1-.103-.1-.053 0-.096.042-.104.1L0 14.536l.244 2.183c.007.058.05.1.104.1.052 0 .094-.04.103-.1l.278-2.183-.278-2.232zM4.301 10.245c-.1 0-.183.083-.188.187l-.195 4.106.195 2.654a.192.192 0 0 0 .188.185c.1 0 .182-.082.188-.186v.001l.22-2.654-.22-4.106a.193.193 0 0 0-.188-.187zM2.308 11.673c-.077 0-.14.061-.145.143l-.22 2.721.22 2.632a.15.15 0 0 0 .145.143c.077 0 .14-.061.146-.143l.25-2.632-.25-2.721c-.007-.082-.07-.143-.146-.143zM6.326 17.377c.124 0 .225-.1.23-.228l.191-2.61-.19-5.467a.233.233 0 0 0-.23-.228c-.126 0-.228.1-.232.229l-.169 5.466.17 2.61a.232.232 0 0 0 .23.228zM10.471 17.39c.171 0 .312-.141.316-.315v.002-.002l.133-2.534-.133-6.314a.319.319 0 0 0-.316-.314.319.319 0 0 0-.315.314l-.12 6.312.12 2.538a.318.318 0 0 0 .315.312zM8.383 17.38c.149 0 .269-.12.273-.272v.002l.162-2.57-.163-5.507a.274.274 0 0 0-.273-.271c-.15 0-.27.12-.273.271l-.144 5.507.145 2.57c.003.15.123.27.273.27z"/><path d="M20.943 11.282c-.418 0-.818.085-1.182.238a5.394 5.394 0 0 0-7.327-4.551c-.23.089-.292.18-.294.36v9.701a.37.37 0 0 0 .33.362l8.473.005a3.057 3.057 0 0 0 0-6.115z"/></g>         
        </g>

        <g id="i-telegram" class="nc-icon-wrapper">
            <path d="M22.2 1c-.3 0-.6.1-.9.2-.3.1-1.5.6-3.4 1.4-1.9.8-4.3 1.8-6.7 2.8l-9.6 4h.1s-.3.1-.7.3c-.2.1-.4.3-.5.5-.2.2-.3.6-.3 1 .1.7.5 1.1.8 1.3.3.2.6.3.6.3l4.5 1.5c.2.6 1.4 4.4 1.6 5.3.2.5.3.9.5 1.1l.3.3c.1 0 .1.1.2.1h.2c.7.2 1.3-.2 1.3-.2l2.6-2.4 4.4 3.4h.1c.9.4 1.9.2 2.3-.2.5-.4.7-.9.7-.9v-.1l3.4-17.5c.3-.2.3-.6.2-1-.1-.4-.4-.8-.7-1-.3-.2-.6-.2-1-.2zm0 1.9v.2l-3.4 17.3s0 .1-.1.1c-.1.1-.1.1-.4 0l-5.4-4.1-3.3 3 .7-4.4s8.4-7.9 8.8-8.2c.4-.3.2-.4.2-.4 0-.4-.5-.1-.5-.1L7.7 13l-5.3-1.8 9.6-4c2.4-1 4.9-2 6.7-2.8 1.9-.9 3.3-1.5 3.5-1.5-.1 0-.1 0 0 0z"/>
        </g>

        <g id="i-vkontakte" class="nc-icon-wrapper">
            <path d="M20.302 0H3.698A3.698 3.698 0 0 0 0 3.698v16.604A3.698 3.698 0 0 0 3.698 24h16.604A3.698 3.698 0 0 0 24 20.302V3.698A3.698 3.698 0 0 0 20.302 0zm-.599 16.897h-2.019c-.659 0-.742-.481-1.95-1.634-1.019-1.006-1.456-1.085-1.703-1.085-.22 0-.371.165-.371.549v1.538c0 .453-.261.632-1.332.632-1.758 0-3.708-1.085-5.191-3.09-2.211-2.98-2.774-5.205-2.774-5.686 0-.261.192-.439.453-.439h1.799c.467 0 .645.137.81.632.824 2.417 2.294 4.546 2.912 4.546.233 0 .261-.192.261-.687V9.714c0-1.192-.673-1.291-.673-1.731 0-.174.137-.302.357-.302h2.884c.385 0 .439.137.439.604v3.337c0 .381.078.522.247.522.21 0 .403-.127.783-.549 1.184-1.306 2.156-3.379 2.156-3.379.124-.261.275-.44.687-.44h1.799c.357 0 .508.192.44.536-.206.961-2.28 3.887-2.28 3.887-.192.302-.275.467 0 .755.192.247.797.783 1.167 1.277.906.961 1.497 1.772 1.497 2.225 0 .345-.192.441-.398.441z"/>
        </g>

        <g id="i-blogger" class="nc-icon-wrapper">
            <path d="M23.3 9.3c-.5-.2-2.7 0-3.3-.5-.4-.4-.5-1.1-.6-2.1-.3-1.6-.4-1.9-.7-2.6-1-2.2-3.5-4.1-5.8-4.1H7.6C3.5 0 0 3.4 0 7.6v8.8C0 20.6 3.5 24 7.6 24h8.7c4.2 0 7.6-3.4 7.6-7.6v-6.1c.1 0 .1-.8-.6-1zM7.5 6h4c.8 0 1.5.7 1.5 1.5S12.3 9 11.5 9h-4C6.7 9 6 8.3 6 7.5S6.7 6 7.5 6zm9 12h-9c-.8 0-1.5-.7-1.5-1.5S6.7 15 7.5 15h9c.8 0 1.5.7 1.5 1.5s-.7 1.5-1.5 1.5z"/>
        </g>

        <g id="i-whatsapp" class="nc-icon-wrapper">

          <g>
            <path d="M.054 24l1.687-6.163a11.869 11.869 0 0 1-1.588-5.945C.156 5.335 5.493 0 12.05 0c3.182.001 6.17 1.24 8.415 3.488a11.819 11.819 0 0 1 3.481 8.413c-.002 6.557-5.34 11.893-11.896 11.893h-.005c-1.99-.001-3.947-.5-5.685-1.448L.054 24zm6.598-3.807l.361.214a9.875 9.875 0 0 0 5.033 1.378h.004c5.45 0 9.886-4.434 9.888-9.884a9.824 9.824 0 0 0-2.894-6.994 9.823 9.823 0 0 0-6.99-2.898c-5.454 0-9.89 4.434-9.892 9.884a9.86 9.86 0 0 0 1.512 5.26l.235.374-.999 3.648 3.742-.982z"/>
            <path d="M9.077 6.92c-.242-.579-.487-.5-.67-.51-.172-.008-.37-.01-.569-.01s-.52.074-.792.372c-.273.297-1.04 1.016-1.04 2.479 0 1.462 1.064 2.875 1.213 3.074.149.198 2.096 3.2 5.078 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.873.117.57-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.174.199-.347.223-.644.075-.298-.15-1.256-.463-2.39-1.475-.885-.788-1.481-1.761-1.655-2.059-.173-.297-.018-.458.13-.606.135-.133.298-.347.447-.52.148-.174.198-.298.297-.497.099-.198.05-.372-.025-.52-.074-.149-.669-1.612-.916-2.207z"/>
          </g>

        </g>


        <g id="i-viber" class="nc-icon-wrapper">
            <path d="M12.892 13.745s.427.038.656-.247l.448-.563c.216-.28.738-.458 1.249-.174.676.382 1.55.982 2.149 1.541.33.278.407.688.182 1.121l-.002.009c-.232.408-.541.791-.932 1.148l-.009.006c-.44.367-.946.58-1.487.404l-.01-.014c-.972-.275-3.304-1.464-4.79-2.649-2.431-1.918-4.159-5.082-4.637-6.778l-.015-.01c-.176-.543.039-1.049.404-1.488l.007-.008c.357-.391.739-.701 1.148-.932l.009-.002c.432-.225.842-.149 1.121.182.367.379 1.056 1.291 1.54 2.149.284.51.106 1.033-.173 1.248l-.564.448c-.284.23-.247.657-.247.657s.834 3.156 3.953 3.952zm4.907-2.616c-.167 0-.303-.135-.304-.302-.014-1.83-.564-3.288-1.634-4.332-1.072-1.045-2.427-1.581-4.027-1.592-.168-.001-.303-.138-.301-.306.001-.167.136-.301.303-.301h.002c1.762.012 3.258.606 4.447 1.764 1.19 1.162 1.802 2.765 1.817 4.763.001.167-.133.304-.301.306h-.002zm-1.595-.624h-.007c-.168-.004-.301-.143-.297-.31.024-1.038-.273-1.878-.906-2.569-.63-.689-1.495-1.065-2.645-1.149-.167-.013-.293-.158-.281-.325.013-.167.158-.293.325-.281 1.294.095 2.32.548 3.049 1.345.733.8 1.092 1.807 1.065 2.992-.004.165-.139.297-.303.297zm-1.558-.522c-.161 0-.295-.126-.303-.289-.051-1.03-.537-1.534-1.527-1.588-.168-.009-.296-.152-.287-.319.009-.168.151-.296.319-.287 1.308.07 2.034.819 2.101 2.164.009.167-.12.31-.288.318l-.015.001zm6.817 3.469c-.605 4.877-4.172 5.185-4.83 5.396-.28.09-2.882.737-6.152.524 0 0-2.438 2.94-3.199 3.705-.119.119-.258.167-.352.145-.131-.032-.167-.188-.165-.414l.02-4.016v-.001c-4.762-1.323-4.485-6.295-4.431-8.898.054-2.603.543-4.736 1.996-6.17 2.61-2.364 7.987-2.011 7.987-2.011 4.541.02 6.717 1.387 7.222 1.845 1.675 1.434 2.528 4.867 1.904 9.895zm-.652-11.113c-.597-.548-3.007-2.298-8.375-2.322 0 0-6.33-.382-9.416 2.45-1.718 1.718-2.322 4.231-2.386 7.348-.063 3.118-.146 8.958 5.484 10.542l.006.002-.004 2.416s-.035.979.609 1.179c.779.241 1.236-.502 1.981-1.304.408-.44.971-1.086 1.397-1.58 3.851.322 6.812-.417 7.149-.526.777-.253 5.177-.816 5.893-6.657.738-6.022-.358-9.83-2.338-11.548z"/>
        </g>  

        <g id="i-spotify" class="nc-icon-wrapper">
            <path d="M12,0C5.4,0,0,5.4,0,12s5.4,12,12,12s12-5.4,12-12S18.7,0,12,0z M17.5,17.3c-0.2,0.4-0.7,0.5-1,0.2 c-2.8-1.7-6.4-2.1-10.6-1.1c-0.4,0.1-0.8-0.2-0.9-0.5c-0.1-0.4,0.2-0.8,0.5-0.9c4.6-1,8.5-0.6,11.6,1.3C17.6,16.5,17.7,17,17.5,17.3 z M19,14c-0.3,0.4-0.8,0.6-1.3,0.3c-3.2-2-8.2-2.6-11.9-1.4c-0.5,0.1-1-0.1-1.1-0.6c-0.1-0.5,0.1-1,0.6-1.1 c4.4-1.3,9.8-0.7,13.5,1.6C19.1,13,19.3,13.6,19,14z M19.1,10.7C15.2,8.4,8.8,8.2,5.2,9.3C4.6,9.5,4,9.1,3.8,8.6 C3.6,8,4,7.4,4.5,7.2c4.3-1.3,11.3-1,15.7,1.6c0.5,0.3,0.7,1,0.4,1.6C20.3,10.8,19.6,11,19.1,10.7z"></path>           
        </g>         

        <g id="i-discord" class="nc-icon-wrapper">
            <path d="M9.328,10.068a1.337,1.337,0,0,0,0,2.664A1.278,1.278,0,0,0,10.552,11.4,1.271,1.271,0,0,0,9.328,10.068Zm4.38,0A1.337,1.337,0,1,0,14.932,11.4,1.278,1.278,0,0,0,13.708,10.068Z"></path> <path d="M19.54,0H3.46A2.466,2.466,0,0,0,1,2.472V18.7a2.466,2.466,0,0,0,2.46,2.472H17.068l-.636-2.22,1.536,1.428L19.42,21.72,22,24V2.472A2.466,2.466,0,0,0,19.54,0ZM14.908,15.672s-.432-.516-.792-.972a3.787,3.787,0,0,0,2.172-1.428,6.867,6.867,0,0,1-1.38.708,7.9,7.9,0,0,1-1.74.516,8.406,8.406,0,0,1-3.108-.012A10.073,10.073,0,0,1,8.3,13.968a6.846,6.846,0,0,1-1.368-.708,3.732,3.732,0,0,0,2.1,1.416c-.36.456-.8,1-.8,1a4.351,4.351,0,0,1-3.66-1.824,16.07,16.07,0,0,1,1.728-7,5.934,5.934,0,0,1,3.372-1.26l.12.144A8.1,8.1,0,0,0,6.628,7.308s.264-.144.708-.348A9.012,9.012,0,0,1,10.06,6.2a1.182,1.182,0,0,1,.2-.024,10.153,10.153,0,0,1,2.424-.024A9.782,9.782,0,0,1,16.3,7.308a7.986,7.986,0,0,0-2.988-1.524l.168-.192a5.934,5.934,0,0,1,3.372,1.26,16.07,16.07,0,0,1,1.728,7A4.386,4.386,0,0,1,14.908,15.672Z"></path>   
        </g>   

        <g id="i-mail" class="nc-icon-wrapper">
            <path d="M13.4 14.6a2.3 2.3 0 0 1-1.4.4 2.3 2.3 0 0 1-1.4-.4L0 8.9V19a3 3 0 0 0 3 3h18a3 3 0 0 0 3-3V8.9z"/>
            <path data-color="color-2" d="M21 2H3a3 3 0 0 0-3 3v1a1.05 1.05 0 0 0 .5.9l11 6a.9.9 0 0 0 .5.1.9.9 0 0 0 .5-.1l11-6A1.05 1.05 0 0 0 24 6V5a3 3 0 0 0-3-3z"/>
        </g>  

      </defs>
    </svg>
  </div>
  <!-- end .svg-defs -->

<?php
    }
endif;

#-----------------------------------------------------------------#
# Social Icons
#-----------------------------------------------------------------#

if ( ! function_exists( 'barberry_socials' ) ) :
    function barberry_socials() {
?>

    <ul class="social-icons">

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

        <?php if ( !empty(TDL_Opt::getOption('apple_link')) && (trim(TDL_Opt::getOption('apple_link'))) != "" ) { ?>
            <li class="apple">
                <a target="_blank" title="Apple" href="<?php echo esc_url(TDL_Opt::getOption('apple_link')); ?>">
                      <svg class="svg-icon" viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve">
                        <use x="0" y="0" xlink:href="#i-apple"></use>
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
                <a target="_blank" title="Discord" href="<?php echo esc_url(TDL_Opt::getOption('discord_link')); ?>">
                      <svg class="svg-icon" viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve">
                        <use x="0" y="0" xlink:href="#i-discord"></use>
                      </svg> 
                    <span class="s-circle_bg"></span>
                </a>
            </li>
        <?php } ?>          
    </ul>

<?php
    }
endif;



#-----------------------------------------------------------------#
# String to Slug
#-----------------------------------------------------------------#

if ( ! function_exists( 'barberry_string_to_slug' ) ) :
function barberry_string_to_slug($str) {
    $str = strtolower(trim($str));
    $str = preg_replace('/[^a-z0-9-]/', '_', $str);
    $str = preg_replace('/-+/', "_", $str);
    return $str;
}
endif;


#-----------------------------------------------------------------#
# Theme Name
#-----------------------------------------------------------------#

if ( ! function_exists( 'barberry_theme_name' ) ) :
function barberry_theme_name() {
    $barberry_theme = wp_get_theme();
    return $barberry_theme->get('Name');
}
endif;


#-----------------------------------------------------------------#
# Parent Theme Name
#-----------------------------------------------------------------#

if ( ! function_exists( 'barberry_parent_theme_name' ) ) :
function barberry_parent_theme_name()
{
    $theme = wp_get_theme();
    if ($theme->parent()):
        $theme_name = $theme->parent()->get('Name');
    else:
        $theme_name = $theme->get('Name');
    endif;

    return $theme_name;
}
endif;


#-----------------------------------------------------------------#
# Theme Slug
#-----------------------------------------------------------------#

if ( ! function_exists( 'barberry_theme_slug' ) ) :
function barberry_theme_slug() {
    $barberry_theme = wp_get_theme();
    return barberry_string_to_slug( $barberry_theme->get('Name') );
}
endif;

#-----------------------------------------------------------------#
# Theme Author
#-----------------------------------------------------------------#

if ( ! function_exists( 'barberry_theme_author' ) ) :
function barberry_theme_author() {
    $barberry_theme = wp_get_theme();
    return $barberry_theme->get('Author');
}
endif;


#-----------------------------------------------------------------#
# Theme Description
#-----------------------------------------------------------------#

if ( ! function_exists( 'barberry_theme_description' ) ) :
function barberry_theme_description() {
    $barberry_theme = wp_get_theme();
    return $barberry_theme->get('Description');
}
endif;


#-----------------------------------------------------------------#
# Theme Version
#-----------------------------------------------------------------#

if ( ! function_exists( 'barberry_theme_version' ) ) :
function barberry_theme_version() {
    $barberry_theme = wp_get_theme();
    return $barberry_theme->get('Version');
}
endif;


#-----------------------------------------------------------------#
# Convert hex to rgb
#-----------------------------------------------------------------#

function barberry_hex2rgb($hex) {
    $hex = str_replace("#", "", $hex);
    
    if(strlen($hex) == 3) {
        $r = hexdec(substr($hex,0,1).substr($hex,0,1));
        $g = hexdec(substr($hex,1,1).substr($hex,1,1));
        $b = hexdec(substr($hex,2,1).substr($hex,2,1));
    } else {
        $r = hexdec(substr($hex,0,2));
        $g = hexdec(substr($hex,2,2));
        $b = hexdec(substr($hex,4,2));
    }
    $rgb = array($r, $g, $b);
    return implode(",", $rgb); // returns the rgb values separated by commas
    //return $rgb; // returns an array with the rgb values
}

#-----------------------------------------------------------------#
# Page ID
#-----------------------------------------------------------------#

function barberry_page_id() {   
    $page_id = "";
    if ( is_single() || is_page() ) {
        $page_id = get_the_ID();

    } else {
        $page_id = get_option('page_for_posts');
    }
    return $page_id;
}


#-----------------------------------------------------------------#
# File Contents
#-----------------------------------------------------------------#

function barberry_get_local_file_contents($file_path) {
    
    $url_get_contents_data = false;

    if (function_exists('ob_start') && function_exists('ob_get_clean') && ($url_get_contents_data == false))
    {
        ob_start();
        include $file_path;
        $url_get_contents_data = ob_get_clean();
    }

    return $url_get_contents_data;
    
}



#--------------------------------------------------------------------------------------#
# Remove WooCommerce product and WordPress page results from the search form widget
#--------------------------------------------------------------------------------------#

function barberry_modify_search_query( $query ) {
  // Make sure this isn't the admin or is the main query
  if( is_admin() || ! $query->is_main_query() ) {
    return;
  }

  // Make sure this isn't the WooCommerce product search form
  if( isset($_GET['post_type']) && ($_GET['post_type'] == 'product') ) {
    return;
  }

  if( $query->is_search() ) {
    $in_search_post_types = get_post_types( array( 'exclude_from_search' => false ) );

    // The post types you're removing (example: 'product' and 'page')
    $post_types_to_remove = array( 'product' );

    foreach( $post_types_to_remove as $post_type_to_remove ) {
      if( is_array( $in_search_post_types ) && in_array( $post_type_to_remove, $in_search_post_types ) ) {
        unset( $in_search_post_types[ $post_type_to_remove ] );
        $query->set( 'post_type', $in_search_post_types );
      }
    }
  }

}
add_action( 'pre_get_posts', 'barberry_modify_search_query' );


#-----------------------------------------------------------------#
# Conditional tags
#-----------------------------------------------------------------#

if( ! function_exists( 'barberry_is_shop_archive' ) ) {
    function barberry_is_shop_archive() {
        return ( barberry_woocommerce_installed() && ( is_shop() || is_tax( 'product_brand' ) || is_product_category() || is_product_tag() || barberry_is_product_attribute_archieve() ) );
    }
}

if( ! function_exists( 'barberry_is_blog_archive' ) ) {
    function barberry_is_blog_archive() {
        return ( is_home() || is_search() || is_tag() || is_category() || is_date() || is_author() );
    }
}

if( ! function_exists( 'barberry_is_portfolio_archive' ) ) {
    function barberry_is_portfolio_archive() {
        return ( is_post_type_archive( 'portfolio' ) || is_tax( 'project-cat' ) );
    }
}


#-----------------------------------------------------------------#
# Get product image use lazyload
#-----------------------------------------------------------------#

function barberry_get_image_html( $post_thumbnail_id, $image_size, $css_class = '', $attributes = false ) {
    global $post;
    $output = '';
    if ( intval( TDL_Opt::getOption('lazyload') ) ) {

        $props = wc_get_product_attachment_props( $post_thumbnail_id, $post );
        $image = wp_get_attachment_image_src( $post_thumbnail_id, $image_size );

        if ( $image ) {
            $image_trans = get_template_directory_uri() . '/images/transparent.png';

            if ( $attributes ) {
                $output = sprintf(
                    '<img src="%s" data-original="%s" data-lazy="%s" data-flickity-lazyload="%s" alt="%s" class="lazy %s" width="%s" height="%s" data-large_image_width="%s" data-large_image_height="%s">',
                    esc_url( $image_trans ),
                    esc_url( $image[0] ),
                    esc_url( $image[0] ),
                    esc_url( $image[0] ),
                    esc_attr( $props['alt'] ),
                    esc_attr( $css_class ),
                    esc_attr( $image[1] ),
                    esc_attr( $image[2] ),
                    esc_attr( $attributes['data-large_image_width'] ),
                    esc_attr( $attributes['data-large_image_height'] )
                );
            } else {
                $output = sprintf(
                    '<img src="%s" data-original="%s" data-lazy="%s" data-flickity-lazyload="%s" alt="%s" class="lazy %s" width="%s" height="%s">',
                    esc_url( $image_trans ),
                    esc_url( $image[0] ),
                    esc_url( $image[0] ),
                    esc_url( $image[0] ),
                    esc_attr( $props['alt'] ),
                    esc_attr( $css_class ),
                    esc_attr( $image[1] ),
                    esc_attr( $image[2] )
                );
            }

        }
    } else {
        $attributes['class'] = $css_class;
        $output              = wp_get_attachment_image( $post_thumbnail_id, $image_size, false, $attributes );
    }

    return $output;
}


#-----------------------------------------------------------------#
# Items per page
#-----------------------------------------------------------------#


function barberry_pre_get_posts( $query ) {
    if ( is_admin() ) {
        return;
    }

    if ( ! $query->is_main_query() ) {
        return;
    }

    if ( $query->get( 'page_id' ) ) {
        if ( ( $query->get( 'page_id' ) == get_option( 'page_on_front' ) || is_front_page() )
            && ( get_option( 'woocommerce_shop_page_id' ) != get_option( 'page_on_front' ) )
        ) {
            return;
        }
    }

    $default = intval( TDL_Opt::getOption('products_per_page') );
    $default = $default ? $default : 12;
    $number  = isset( $_GET['showposts'] ) ? absint( $_GET['showposts'] ) : $default;

    if ( $query->is_search() ) {
        $query->set( 'orderby', 'post_type' );
        $query->set( 'order', 'desc' );

        if ( $_GET && isset( $_GET['post_type'] ) && $_GET['post_type'] == 'product' ) {
            $query->set( 'posts_per_page', $number );
        }
    } elseif ( $query->is_archive() ) {
        if ( function_exists( 'is_shop' ) && ( is_shop() || is_product_taxonomy() ) ) {
            $query->set( 'posts_per_page', $number );
        }

    }
}

add_action( 'pre_get_posts', 'barberry_pre_get_posts' );


#-----------------------------------------------------------------#
# Enable Youtube JS API 
#-----------------------------------------------------------------#


if ( !function_exists( 'barberry_enable_youtube_js_api') ) :
add_filter( 'oembed_result', 'barberry_enable_youtube_js_api', 10, 3 );
function barberry_enable_youtube_js_api( $html, $url, $args ) {
 
    if ( strstr( $html,'youtube.com/embed/' ) ) {
        $html = str_replace( '?feature=oembed', '?feature=oembed&enablejsapi=1&rel=0&showinfo=0&color=white', $html );
    }
    
    return $html;
}
endif;

#-----------------------------------------------------------------#
# Share Post
#-----------------------------------------------------------------#
if ( !function_exists('barberry_post_share')):
    function barberry_post_share() {
        global $post, $product;
        $src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false, '');
    ?>

    <div class="post-share-container" data-name="<?php esc_attr_e( 'Share', 'barberry' )?>" data-share-elem="<?php echo implode(',', TDL_Opt::getOption('social_sharing'));?>">
        <a href="javascript:;" class="social-sharing" data-shareimg="<?php echo esc_url($src[0]) ?>" data-name="<?php echo get_the_title(); ?>">
            <span><?php esc_attr_e( 'Share', 'barberry' )?></span>
        </a>
    </div>
<?php } 
endif; 


#-----------------------------------------------------------------#
# Share Button
#-----------------------------------------------------------------#
if ( !function_exists('barberry_share')):
    function barberry_share() {
        global $post, $product;
        $src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false, '');

        if ( ! TDL_Opt::getOption('product_share') ) {
            return;
        }
    ?>

    <div class="box-share-master-container" data-name="<?php esc_attr_e( 'Share', 'woocommerce' )?>" data-share-elem="<?php echo implode(',', TDL_Opt::getOption('social_sharing'));?>">
        <a href="javascript:;" class="social-sharing" data-shareimg="<?php echo esc_url($src[0]) ?>" data-name="<?php echo get_the_title(); ?>">
            <span class="tooltip"><?php esc_attr_e( 'Share', 'woocommerce' )?></span>
        </a>
    </div>
<?php } 
endif; 

#-----------------------------------------------------------------#
# <nocsript>
#-----------------------------------------------------------------#

if ( ! function_exists('barberry_register_js') ) :

    function barberry_addnoscript() {
        echo '<noscript>';
        echo '<style type="text/css">';
        echo ' header.site-header .header-wrapper .header-sections,
.topbar,
.page-header .title-section .title-section-wrapper .title-wrapper .page-title-wrapper .page-title,
.page-header .title-section .title-section-wrapper .title-wrapper .term-description,
.single-product .product_layout .product-info-cell .product_summary_top .page-title-wrapper h1,
.product_layout.product_layout_style_3 .product-title-section-wrapper .product-title-section-wrapper-inner .title-wrapper h1,
.breadcrumbs-wrapper .breadcrumbs,
.page-header .title-section .title-section-wrapper .shop-categories-wrapper .shop-categories,
.page-header .title-section .title-section-wrapper .blog-categories-wrapper .blog-categories,
.page-header .title-section .title-section-wrapper .title-wrapper .page-title-wrapper .back-btn svg,
.content-area,
.blog-content-area,
.post-content-area,
.woocommerce-pagination,
.products_ajax_button,
.single-product .product-images-wrapper .product-labels,
.box-share-master-container,
.product_layout #product-images,
.product_layout .product-images-inner .product_tool_buttons_placeholder,
.product_layout.product_layout_style_3 .product-title-section-wrapper .product-title-section-right,
.products-nav,
footer#site-footer,
body.single-product .product_layout_default .sidebar-container,
.single-product .product_layout.product_layout_default .product-info-cell .product_summary_middle,
.single-product .product_layout.product_layout_style_2 .product-info-cell .product_summary_middle,
.product_layout.product_layout_style_3 .product-title-section-wrapper .product-title-section-wrapper-inner .product_summary_middle,
.single-product .product_layout.product_layout_default .product-info-cell .product_summary_bottom,
.single-product .product_layout.product_layout_style_2 .product-info-cell .product_summary_bottom,
.single-product .single-bottom-inview,
.product_layout .product-thumbnails,
.product_layout .product-vr-thumbnails,
body.single .page-header .barberry-entry-meta ul.entry-meta-list,
.page-title-delimiter { opacity: 1; }';
        echo ' ul.products li.product,
    .blog-listing .blog-articles article { visibility: visible; }';
        echo '</style>';
        echo '</noscript>';
    }

    add_action('wp_footer', 'barberry_addnoscript' );

endif;


#-----------------------------------------------------------------#
# Custom Footer Script
#-----------------------------------------------------------------#

if ( ! function_exists('barberry_footer_js') ) :

    function barberry_footer_js() {
        if (!empty(TDL_Opt::getOption('footer_js'))):
          echo TDL_Opt::getOption('footer_js');
        endif;
    }

endif;

/*-----------------------------------------------------------------------------------*/
/*  WPML/Polylang/Currency topbar dropdown
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'barberry_language_currency' ) ) {
    function barberry_language_currency() { 

            $barberry_theme = wp_get_theme();
            $dir_name  = sanitize_title( $barberry_theme->get( 'Name' ) );            
            $language_switcher = ( ! empty( TDL_Opt::getOption('topbar_wpml_languages') ) ) ? true : false;
            $currency_switcher = ( ! empty( TDL_Opt::getOption('topbar_wpml_currency') ) ) ? true : false;
        ?>

        <div class="language_currency_switcher" >

            <?php if ( $language_switcher ) { ?>
                <div class="language_switcher <?php echo ( 1 == TDL_Opt::getOption('topbar_wpml_lang_intro') ) ? 'intro-text-on' : 'intro-text-off' ?>">
                    <span class="intro-text"><?php echo esc_html__( 'I speak', 'barberry' )?></span>  
                    <?php 

                        $template = $dir_name . '-barberry-language-switcher';

                        $native = ( empty( TDL_Opt::getOption('topbar_wpml_native') ) ) ? 0 : 1;
                        $flags  = ( empty( TDL_Opt::getOption('topbar_wpml_flags') ) ) ? 0 : 1;



                        if ( defined( 'ICL_SITEPRESS_VERSION' ) ) {

                            $args = array(
                                'type'         => 'custom',
                                'flags'        => $flags,
                                'link_current' => 1,
                                'native'       => $native,
                                'template'     => $template
                            );

                            do_action( 'wpml_language_switcher', $args, null ); 
                        }

                        if ( function_exists( 'pll_the_languages' ) ) {
                            $native = ( empty( TDL_Opt::getOption('topbar_wpml_native') ) ) ? 'slug' : 'name';
                            $flags  = ( empty( TDL_Opt::getOption('topbar_wpml_flags') ) ) ? 0 : 1;

                            // Gets the pll_the_languages() raw code
                            $languages = pll_the_languages( array(
                            'show_flags'             =>1,
                            'display_names_as'       => $native,
                            'hide_if_no_translation' => 1,
                            'raw'                    => true
                            ) ); 

                            if ( ! empty( $languages ) ) { ?>

                                <nav class="navigation-foundation barberry-switcher">
                                    <ul class="dropdown menu" data-close-on-click="false" data-close-on-click-inside="false" data-click-open="true" data-dropdown-menu data-hover-delay="0" data-closing-time="0" >
                                        <li tabindex="0">
                                            <a href="#">
                                                <?php foreach ( $languages as $language ) { 
                                                    // Variables containing language data
                                                    $name           = $language['name'];
                                                    $flag           =  $language['flag'];
                                                    $current        = $language['current_lang'] ? ' languages__item--current' : '';
                                                    $no_translation = $language['no_translation'];

                                                    if ( ! $no_translation ) {
                                                ?>
                                                <?php if ( $current ) { ?>
                                                    <?php if ( $flags ) { echo ($flag); } ?>
                                                    <span><?php echo esc_attr($name); ?></span>
                                                <?php } ?>
                                                <?php }} ?>
                                            </a>

                                            <ul class="menu">
                                                <?php foreach ( $languages as $language ) { 
                                                    // Variables containing language data
                                                    $name           = $language['name'];
                                                    $url            = $language['url'];
                                                    $flag            = $language['flag'];
                                                    $current        = $language['current_lang'] ? ' languages__item--current' : '';
                                                    $no_translation = $language['no_translation'];

                                                    if ( ! $no_translation ) {
                                                ?>
                                                <?php if ( ! $current ) { ?>
                                                    <li>
                                                        <a href="<?php echo esc_attr($url); ?>">
                                                            <?php if ( $flags ) { echo ($flag); } ?>
                                                            <span><?php echo esc_attr($name); ?></span>
                                                        </a>
                                                    </li>                                                    
                                                <?php } ?>
                                                <?php }} ?>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>

                           <?php }
                        }
                    ?>  
                </div>                
            <?php } ?>

            <?php if ( $currency_switcher ) { ?>
                <div class="currency_switcher <?php echo ( 1 == TDL_Opt::getOption('topbar_wpml_cur_intro') ) ? 'intro-text-on' : 'intro-text-off' ?>">
                    <span class="intro-text"><?php echo esc_html__( 'and my currency is', 'barberry' )?></span>  
                    <?php 

                    $format = '%name% (%symbol%)';
                    if ( ! empty( TDL_Opt::getOption('topbar_wpml_code') ) ) {
                        $format = '(%symbol%) %code%';
                    }                    
                    $template = $dir_name . '-barberry-currency-switcher';

                    $currency_args = array(
                        'format'         => $format,
                        'switcher_style' => $template
                    );

                    do_action('wcml_currency_switcher', $currency_args );
                    echo barberry_topbar_woomulti_switcher(); ?> 
                </div> 

                <?php 
                
                
                ?>



                              
            <?php } ?>

        </div><!--.language_currency-->

    <?php }
    
}

if ( ! function_exists( 'barberry_topbar_woomulti_switcher' ) ) {
    function barberry_topbar_woomulti_switcher() {
        if ( ! class_exists( 'WOOMULTI_CURRENCY' ) ) {
            return;
        }        
        $shortcode = ( empty( TDL_Opt::getOption('topbar_wpml_code') ) ) ? 'default' : 'listbox_code';
        $args = array( 'settings' => WOOMULTI_CURRENCY_Data::get_ins(), 'shortcode' => $shortcode );
        ob_start();
        wmc_get_template( '/woo-currency/woo-currency_widget.php', $args );
        return ob_get_clean();      
    ?>
    <?php }
} 
/*-----------------------------------------------------------------------------------*/
/*  WPML/Polylang/Currency off-canvas dropdown
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'barberry_language_currency_offcanvas' ) ) {
    function barberry_language_currency_offcanvas() { 

            $barberry_theme = wp_get_theme();
            $dir_name  = sanitize_title( $barberry_theme->get( 'Name' ) );             
            $language_switcher = ( ! empty( TDL_Opt::getOption('offcanvas_wpml_languages') ) ) ? true : false;
            $currency_switcher = ( ! empty( TDL_Opt::getOption('offcanvas_wpml_currency') ) ) ? true : false;
        ?>

        <div class="language_currency_switcher" >

            <?php if ( $language_switcher ) { ?>
                <div class="language_switcher <?php echo ( 1 == TDL_Opt::getOption('offcanvas_wpml_lang_intro') ) ? 'intro-text-on' : 'intro-text-off' ?>">
                    <span class="intro-text"><?php echo esc_html__( 'I speak', 'barberry' )?></span>  
                    <?php 

                        $template = $dir_name . '-barberry-language-switcher';

                        $native = ( empty( TDL_Opt::getOption('offcanvas_wpml_native') ) ) ? 0 : 1;
                        $flags  = ( empty( TDL_Opt::getOption('offcanvas_wpml_flags') ) ) ? 0 : 1;

                        if ( defined( 'ICL_SITEPRESS_VERSION' ) ) {

                            $args = array(
                                'type'         => 'custom',
                                'flags'        => $flags,
                                'link_current' => 1,
                                'native'       => $native,
                                'template'     => $template
                            );

                            do_action( 'wpml_language_switcher', $args, null ); 
                        }

                        if ( function_exists( 'pll_the_languages' ) ) {
                            $native = ( empty( TDL_Opt::getOption('offcanvas_wpml_native') ) ) ? 'slug' : 'name';
                            $flags  = ( empty( TDL_Opt::getOption('offcanvas_wpml_flags') ) ) ? 0 : 1;

                            // Gets the pll_the_languages() raw code
                            $languages = pll_the_languages( array(
                            'show_flags'             =>1,
                            'display_names_as'       => $native,
                            'hide_if_no_translation' => 1,
                            'raw'                    => true
                            ) ); 

                            if ( ! empty( $languages ) ) { ?>

                                <nav class="navigation-foundation barberry-switcher">
                                    <ul class="dropdown menu" data-close-on-click="false" data-close-on-click-inside="false" data-click-open="true" data-dropdown-menu data-hover-delay="0" data-closing-time="0" >
                                        <li tabindex="0">
                                            <a href="#">
                                                <?php foreach ( $languages as $language ) { 
                                                    // Variables containing language data
                                                    $name           = $language['name'];
                                                    $flag            = $language['flag'];
                                                    $current        = $language['current_lang'] ? ' languages__item--current' : '';
                                                    $no_translation = $language['no_translation'];

                                                    if ( ! $no_translation ) {
                                                ?>
                                                <?php if ( $current ) { ?>
                                                    <?php if ( $flags ) { echo esc_attr($flag); } ?>
                                                    <span><?php echo esc_attr($name); ?></span>
                                                <?php } ?>
                                                <?php }} ?>
                                            </a>
                                            <ul class="menu">
                                                <?php foreach ( $languages as $language ) { 
                                                    // Variables containing language data
                                                    $name           = $language['name'];
                                                    $url            = $language['url'];
                                                    $flag            = $language['flag'];
                                                    $current        = $language['current_lang'] ? ' languages__item--current' : '';
                                                    $no_translation = $language['no_translation'];

                                                    if ( ! $no_translation ) {
                                                ?>
                                                <?php if ( ! $current ) { ?>
                                                    <li>
                                                        <a href="<?php echo esc_attr($url); ?>">
                                                            <?php if ( $flags ) { echo esc_attr($flag); } ?>
                                                            <span><?php echo esc_attr($name); ?></span>
                                                        </a>
                                                    </li>                                                    
                                                <?php } ?>
                                                <?php }} ?>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>

                           <?php }
                        }                       

                    ?>  
                </div>                
            <?php } ?>

            <?php if ( $currency_switcher ) { ?>
                <div class="currency_switcher <?php echo ( 1 == TDL_Opt::getOption('offcanvas_wpml_cur_intro') ) ? 'intro-text-on' : 'intro-text-off' ?>">
                    <span class="intro-text"><?php echo esc_html__( 'and my currency is', 'barberry' )?></span>  
                    <?php 

                    $format = '%name% (%symbol%)';
                    if ( ! empty( TDL_Opt::getOption('offcanvas_wpml_code') ) ) {
                        $format = '(%symbol%) %code%';
                    }                    
                    $template = $dir_name . '-barberry-currency-switcher';

                    $currency_args = array(
                        'format'         => $format,
                        'switcher_style' => $template
                    );

                    do_action('wcml_currency_switcher', $currency_args );
                    echo barberry_offcanvas_woomulti_switcher(); ?> 
                </div>  
                            
            <?php } ?>

        </div><!--.language_currency-->

    <?php }

}

if ( ! function_exists( 'barberry_offcanvas_woomulti_switcher' ) ) {
    function barberry_offcanvas_woomulti_switcher() {
        if ( ! class_exists( 'WOOMULTI_CURRENCY' ) ) {
            return;
        }
        $shortcode = ( empty( TDL_Opt::getOption('offcanvas_wpml_code') ) ) ? 'default' : 'listbox_code';
        $args = array( 'settings' => WOOMULTI_CURRENCY_Data::get_ins(), 'shortcode' => $shortcode );
        ob_start();
        wmc_get_template( '/woo-currency/woo-currency_widget.php', $args );
        return ob_get_clean();      
    ?>
    <?php }
} 

/*-----------------------------------------------------------------------------------*/
/*  Translation strings
/*-----------------------------------------------------------------------------------*/

$barberry_core_translations = array(
    esc_html__( 'Title', 'barberry' ),
    esc_html__( 'Subtitle', 'barberry' ),
    esc_html__( 'Description', 'barberry' ),
    esc_html__( 'Number of Products', 'barberry' ),
    esc_html__( 'Columns', 'barberry' ),
    esc_html__( 'Layout Style', 'barberry' ),
    esc_html__( 'Blog Posts', 'barberry' ),
    esc_html__( 'Display the latest posts in the blog', 'barberry' ),
    esc_html__( 'Number of Posts', 'barberry' ),
    esc_html__( 'Number of posts to be displayed in the slider.', 'barberry' ),
    esc_html__( 'Category', 'barberry' ),
    esc_html__( 'Collections Slider', 'barberry' ),
    esc_html__( 'Display Collections Slider', 'barberry' ),
    esc_html__( 'Custom Desktop Height', 'barberry' ),
    esc_html__( 'Custom Tablet Height', 'barberry' ),
    esc_html__( 'Custom Mobile Height', 'barberry' ),
    esc_html__( 'Slider AutoPlay', 'barberry' ),
    esc_html__( 'AutoPlay Speed (milliseconds)', 'barberry' ),
    esc_html__( 'Color Slide Navigation', 'barberry' ),
    esc_html__( 'Slides', 'barberry' ),
    esc_html__( 'Title Text Color', 'barberry' ),
    esc_html__( 'Subtitle Text Color', 'barberry' ),
    esc_html__( 'Button URL', 'barberry' ),
    esc_html__( 'Slide Background Color', 'barberry' ),
    esc_html__( 'Background Image', 'barberry' ),
    esc_html__( 'Extra class name', 'barberry' ),
    esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'barberry' ),
    esc_html__( 'Barberry Button', 'barberry' ),
    esc_html__( 'Display Barberry button', 'barberry' ),
    esc_html__( 'URL', 'barberry' ),
    esc_html__( 'Open in new window', 'barberry' ),
    esc_html__( 'Background color', 'barberry' ),
    esc_html__( 'Button Size', 'barberry' ),
    esc_html__( 'Alignment', 'barberry' ),
    esc_html__( 'Simple Link', 'barberry' ),
    esc_html__( 'Display Simple Link', 'barberry' ),
    esc_html__( 'Color', 'barberry' ),
    esc_html__( 'Google Map', 'barberry' ),
    esc_html__( 'Display Google Map', 'barberry' ),
    esc_html__( 'Map height', 'barberry' ),
    esc_html__( 'Enter map height in pixels. Example: 200. <span>As of June 2016, a Google map API key is needed to allow this element to display. Please enter key here <strong>Appearance > Customize > Global > Google map API key</strong>.</span>', 'barberry' ),
    esc_html__( 'Latitude', 'barberry' ),
    esc_html__( 'Please enter the latitude for the maps center point. You can use <a href="http://universimmedia.pagesperso-orange.fr/geo/loc.htm" target="_blank">this service</a> to get coordinates of your location', 'barberry' ),
    esc_html__( 'Longitude', 'barberry' ),
    esc_html__( 'Please enter the longitude for the maps center point.', 'barberry' ),
    esc_html__( 'Map Zoom', 'barberry' ),
    esc_html__( 'Zoom level when focus the marker. 1-20', 'barberry' ),
    esc_html__( 'Enable Zoom In/Out', 'barberry' ),
    esc_html__( 'Do you want users to be able to zoom in/out on the map?', 'barberry' ),
    esc_html__( 'Marker Style', 'barberry' ),
    esc_html__( 'Please select the marker style you would like <br/> <b>Default Google Style</b> <i> - Will display the Google standard map marker and also allow you to optionally override it with an image</i> <br/> <b>Marker Animated</b> <i>- Will use a custom CSS based marker (the modern option).</i>', 'barberry' ),
    esc_html__( 'Marker Color', 'barberry' ),
    esc_html__( 'Please select the color for your marker.', 'barberry' ),
    esc_html__( 'Marker Image', 'barberry' ),
    esc_html__( 'Select image from media library.', 'barberry' ),
    esc_html__( 'Marker Animation', 'barberry' ),
    esc_html__( 'This will cause your markers to do a quick bounce as they load in.', 'barberry' ),
    esc_html__( 'Greyscale Color', 'barberry' ),
    esc_html__( 'Toggle a greyscale color scheme (will also unlock further custom options)', 'barberry' ),
    esc_html__( 'Map Extra Color', 'barberry' ),
    esc_html__( 'Use this to define a main color that will be used in combination with the greyscale option for your map', 'barberry' ),
    esc_html__( 'Ultra Flat Map', 'barberry' ),
    esc_html__( 'This removes street/landmark text & some extra details for a clean look', 'barberry' ),
    esc_html__( 'Dark Color Scheme', 'barberry' ),
    esc_html__( 'Enable this option for a dark colored map (This will override the extra color choice)', 'barberry' ),
    esc_html__( 'Map Marker Locations', 'barberry' ),
    esc_html__( 'Please enter the the list of locations you would like with a latitude|longitude|description format. <br/> Divide values with linebreaks (Enter). Example: <br/> 40.692784|-73.978763|Our Location <br/> 39.946814|-75.143038|Our Location #2', 'barberry' ),
    esc_html__( 'Slider', 'barberry' ),
    esc_html__( 'Display Slider', 'barberry' ),
    esc_html__( 'Height', 'barberry' ),
    esc_html__( 'Slider Navigation', 'barberry' ),
    esc_html__( 'Color Slide Navigation', 'barberry' ),
    esc_html__( 'Text Align', 'barberry' ),
    esc_html__( 'Link on whole slide?', 'barberry' ),
    esc_html__( 'Choose an option', 'barberry' ),
    esc_html__( 'Clear', 'barberry' ),
    esc_html__( 'Size Guide', 'barberry' ),
    esc_html__( 'Size Guides', 'barberry' ),
    esc_html__( 'Add new', 'barberry' ),
    esc_html__( 'Add new size guide', 'barberry' ),
    esc_html__( 'New size guide', 'barberry' ),
    esc_html__( 'Edit size guide', 'barberry' ),
    esc_html__( 'View size guide', 'barberry' ),
    esc_html__( 'All size guides', 'barberry' ),
    esc_html__( 'Search size guides', 'barberry' ),
    esc_html__( 'No size guides found.', 'barberry' ),
    esc_html__( 'No size guides found in trash.', 'barberry' ),
    esc_html__( 'barberry_size_guide', 'barberry' ),
    esc_html__( 'Size guide to place in your products', 'barberry' ),
    esc_html__( 'Days', 'barberry' ),
    esc_html__( 'Hours', 'barberry' ),
    esc_html__( 'Min', 'barberry' ),
    esc_html__( 'Sec', 'barberry' ),
    esc_html__( 'View all results', 'barberry' ),
    esc_html__( 'No products found', 'barberry' ),
    esc_html__( 'Unable to find any products that match the currenty query', 'barberry' ),
);