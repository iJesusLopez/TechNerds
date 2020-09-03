<% if ( depth == 0 ) { %>
<a href="#" class="media-menu-item active" data-title="<?php esc_attr_e( 'Mega Menu Content', 'barberry' ) ?>" data-panel="mega"><?php esc_html_e( 'Mega Menu', 'barberry' ) ?></a>
<a href="#" class="media-menu-item" data-title="<?php esc_attr_e( 'Mega Menu Background', 'barberry' ) ?>" data-panel="background"><?php esc_html_e( 'Background', 'barberry' ) ?></a>
<div class="separator"></div>
<% } else if ( depth == 1 ) { %>
<a href="#" class="media-menu-item active" data-title="<?php esc_attr_e( 'Menu Content', 'barberry' ) ?>" data-panel="content"><?php esc_html_e( 'Menu Content', 'barberry' ) ?></a>
<a href="#" class="media-menu-item" data-title="<?php esc_attr_e( 'Menu General', 'barberry' ) ?>" data-panel="general"><?php esc_html_e( 'General', 'barberry' ) ?></a>
<% } else { %>
<a href="#" class="media-menu-item active" data-title="<?php esc_attr_e( 'Menu General', 'barberry' ) ?>" data-panel="general"><?php esc_html_e( 'General', 'barberry' ) ?></a>
<% } %>
