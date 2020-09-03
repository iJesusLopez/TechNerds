<?php if ( ! defined('BARBERRY_THEME_DIR')) exit('No direct script access allowed');

/*-----------------------------------------------------------------------------------*/
/*	Custom Password Protected Form
/*-----------------------------------------------------------------------------------*/

add_filter( 'the_password_form', 'barberry_custom_password_form' );

function barberry_custom_password_form() {
	global $post;
	$label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
	$o = '<form class="post-password-form" action="' . get_option('siteurl') . '/wp-login.php?action=postpass" method="post"><div class="post-password-form-inner"><p>
	' . esc_attr__( 'This content is password protected. To view it please enter your password below:', 'barberry' ) . '</p>
	<p><label for="' . $label . '">' . esc_attr__( 'Password:', 'barberry' ) . ' </label><input name="post_password" id="' . $label . '" type="password" size="20" /><button class="button" type="submit" name="Submit" value="' . esc_attr__( 'Enter', 'barberry' ) . '" />' . esc_attr__( 'Enter', 'barberry' ) . '</button></p></div>
	</form>
	';
	return $o;
}


if ( ! function_exists( 'barberry_comment' ) ) :
function barberry_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;

	if ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
		<div class="comment-body">
			<?php esc_html_e( 'Pingback:', 'barberry' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( esc_attr__( 'Edit', 'barberry' ), '<span class="edit-link">', '</span>' ); ?>
		</div>

	<?php else : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>

		<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">

			<header class="comment-meta">
				<div class="comment-author vcard">
					<?php echo get_avatar( $comment, 140 ); ?>
					<?php printf( esc_html__( '%s', 'barberry' ), sprintf( '<h3 class="comment-author-title">%s</h3>', get_comment_author_link() ) ); ?>
				</div><!-- .comment-author-avatar -->	

                <div class="comment-metadata">
                    <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
                        <time datetime="<?php comment_time( 'c' ); ?>">
                            <?php printf( esc_html__( '%1$s at %2$s', 'barberry' ), get_comment_date(), get_comment_time() ); ?>
                        </time>
                    </a>
                </div><!-- .comment-metadata -->
			</header>

			<div class="comment-content">
				
				<?php if ( '0' == $comment->comment_approved ) : ?>
					<p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'barberry' ); ?></p>
				<?php endif; ?>
				


				<div class="comment-text"><?php comment_text(); ?></div><!-- .comment-text -->
                
                <?php
					comment_reply_link( array_merge( $args, array(
						'add_below' => 'div-comment',
						'depth'     => $depth,
						'max_depth' => $args['max_depth'],
						'before'    => '<span class="comment-reply">',
						'after'     => '</span>',
					) ) );
				?>
				
				<?php edit_comment_link( esc_html__( 'Edit', 'barberry' ) ); ?>
                
				<div class="comment-separator"></div>
				
			</div><!-- .comment-content -->
            
		</article><!-- .comment-body -->

	<?php
	endif;
}
endif; // ends check for barberry_comment()


/**
 * ------------------------------------------------------------------------------------------------
 * Product deal countdown
 * ------------------------------------------------------------------------------------------------
 */
if( ! function_exists( 'barberry_product_sale_countdown' ) ) {
	function barberry_product_sale_countdown() {
		global $product;
        $sale_date_end = get_post_meta( $product->get_id(), '_sale_price_dates_to', true );
		$sale_date_start = get_post_meta( $product->get_id(), '_sale_price_dates_from', true );

		if ( ( apply_filters( 'barberry_sale_countdown_variable', false ) || TDL_Opt::getOption('sale_countdown_variable') ) && $product->get_type() == 'variable' && $variations = $product->get_available_variations() ) {
			$sale_date_end = get_post_meta( $variations[0]['variation_id'], '_sale_price_dates_to', true );
			$sale_date_start = get_post_meta( $variations[0]['variation_id'], '_sale_price_dates_from', true );
		}

		$curent_date = strtotime( date( 'Y-m-d H:i:s' ) );

		if ( $sale_date_end < $curent_date || $curent_date < $sale_date_start ) return;

        $timezone = 'GMT';

        if ( apply_filters( 'barberry_wp_timezone', false ) ) $timezone = wc_timezone_string();
        
		barberry_enqueue_script( 'barberry-countdown' );
       
		echo '<div class="barberry-product-countdown barberry-timer" data-end-date="' . esc_attr( date( 'Y-m-d H:i:s', $sale_date_end ) ) . '" data-timezone="' . $timezone . '"></div>';
	}
}


//==============================================================================
// Add Lightbox to WP Gallery
//==============================================================================

if ( ! function_exists('barberry_lightbox_to_gallery') ) :
function barberry_lightbox_to_gallery ($content, $id, $size, $permalink, $icon, $text) {
    if ($permalink) {
    	return $content;
    }

    $rid = uniqid();


    $content = preg_replace('"<a href(.*?)>"', '<a>', $content);
    $content = preg_replace('/<a/', '<a data-open="modal-'.$rid.'"', $content, 1);
    $content .= '<div class="full reveal blog-gallery" id="modal-'.$rid.'" data-reveal>
                    <img src="'.wp_get_attachment_url($id).'" />
                      <button class="blog-gallery-btn close-button" data-close type="button">
                      </button>
                      <button class="blog-gallery-btn next"></button>
                      <button class="blog-gallery-btn prev"></button>
                    </div>';
    return $content;
}
add_filter( 'wp_get_attachment_link', 'barberry_lightbox_to_gallery', 10, 6);
add_filter( 'use_default_gallery_style', '__return_false' );
endif;

//==============================================================================
// Excerpt Lenght
//==============================================================================

if ( ! function_exists('barberry_excerpt_length') ) :
function barberry_excerpt_length($length) {
    return 20;
}
add_filter( 'excerpt_length', 'barberry_excerpt_length', 999 );
endif;


//==============================================================================
// Archives Excerpt More
//==============================================================================

if ( ! function_exists('barberry_excerpt_more') ) :
function barberry_excerpt_more($more) {
    global $post;
    return '…';
}
add_filter('excerpt_more', 'barberry_excerpt_more');
endif;

/*-----------------------------------------------------------------------------------*/
/*	Display meta information for a specific post
/*-----------------------------------------------------------------------------------*/

if( ! function_exists( 'barberry_post_meta' )) {
	function barberry_post_meta( $atts = array() ) {
		global $post;
		$author_id=$post->post_author;

		extract(shortcode_atts(array(
			'author'     => 1,
			'date'     => 1,
			'cats'     => 1,
			'tags'     => 0,
			'labels'   => 0,
			'short_labels' => false,
			'edit'     => 1,
			'share'    => 1,
			'comments' => 1,
			'limit_cats' => 0
		), $atts));		
		?>

		<ul class="entry-meta-list">
			<?php if( get_post_type() === 'post' ): ?>

				<?php // Author ?>
				<?php if ($author == 1): ?>
					<li class="meta-author">
						<?php if ( $labels == 1 && ! $short_labels ): ?>
							<?php esc_html_e('Posted by', 'barberry'); ?>
						<?php elseif($labels == 1 && $short_labels): ?>
							<?php esc_html_e('By', 'barberry'); ?>
						<?php endif; ?>
						<a href="<?php echo esc_url( get_author_posts_url($author_id) ); ?>" rel="author">
							<span class="vcard author author_name">
								<span class="fn"><?php echo the_author_meta('display_name', $author_id ); ?></span>
							</span>
						</a>
					</li>
				<?php endif ?>	

				<?php // Date ?>
				<?php if( $date == 1): ?>
					<li class="meta-date">
						<?php echo esc_html__( 'On' , 'barberry' ) . ' <span>' . get_the_date() . '</span>'; ?>
					</li>
				<?php endif ?>	

				<?php // Categories ?>
				<?php if(get_the_category_list( ', ' ) && $cats == 1): ?>
					<li class="meta-categories"><?php echo esc_html__( 'In ' , 'barberry' ); echo get_the_category_list( ', ' ); ?></li>
				<?php endif; ?>	

				<?php // Share ?>	
				<?php if( $share == 1 && TDL_Opt::getOption('blog_single_share')): ?>
					<li class="post-share"><?php barberry_post_share(); ?></li>
				<?php endif; ?>						
							
			<?php endif; ?>
		</ul>

		<?php
	}
}

/*-----------------------------------------------------------------------------------*/
/*	Archive Meta
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'barberry_posted_on' ) ) :

	function barberry_posted_on() {


		$time_string = '<time class="entry-date published" datetime="%1$s"><span>%2$s</span></time>';

		$time_string = sprintf( $time_string,
			get_the_date( DATE_W3C ),
			get_the_date()
		);

		return $time_string;

	}

endif;

/*-----------------------------------------------------------------------------------*/
/*	Post Navigation Archive
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'barberry_the_posts_navigation' ) ) :
function barberry_the_posts_navigation() {
    // Don't print empty markup if there's only one page.
    if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
        return;
    }
    ?>
		<nav class="posts-navigation" >
		    <?php  
		        $args = array(
				'base'  => esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) ),
				'format'       => '',
				'add_args'     => '',
				'current'      => max( 1, get_query_var( 'paged' ) ),
				'total'        => $GLOBALS['wp_query']->max_num_pages,
				'prev_text'    => '&larr;',
				'next_text'    => '&rarr;',
				'type'         => 'list',
				'end_size'     => 3,
				'mid_size'     => 3
				); 

		        echo paginate_links($args); 
		    ?>
		</nav><!-- .navigation -->
    <?php
}
endif;

/*-----------------------------------------------------------------------------------*/
/*	Post Navigation Archive
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'barberry_entry_tags' ) ) :
function barberry_entry_tags() {
    
    // Translators: used between list items, there is a space after the comma.
    $tag_list = get_the_tag_list( '', '' );
    if ( $tag_list ) {
     echo  wp_kses_post($tag_list);
    }
    
}
endif;

/*-----------------------------------------------------------------------------------*/
/*	Related Posts
/*-----------------------------------------------------------------------------------*/


if ( ! function_exists( 'barberry_related_posts' ) ) :
function barberry_related_posts($per_page) {

	if (!$per_page) $per_page= 4; // temp

	// Build the post category ids
	$post_cats= wp_get_post_categories(get_the_ID());

	// Build the post tag ids
	$tags= wp_get_post_tags(get_the_ID());
	$post_tags= array();
	foreach ($tags as $tag) {
		$post_tags[]= $tag->term_id;
	}    

	// Query posts that share the same category OR tag
	$args = array(
		'post_type' 		=> 'post',
		'posts_per_page'	=> $per_page,
		'post__not_in'		=> array(get_the_ID()),
		'tax_query' => array(
			'relation' => 'OR',
			array(
				'taxonomy' => 'category',
				'terms'    => $post_cats,
				'operator' => 'IN'
			),
			array(
				'taxonomy' => 'post_tag',
				'terms'    => $post_tags,
				'operator' => 'IN',
			),
		),
	);

	$posts = get_posts($args);
	if (!empty($posts) && is_array($posts)):
		echo '<div class="related_post_container site-content">';
			echo '<div class="grid-container">';
				echo '<div class="single_related_posts">';
					echo '<h3 class="entry-title">' . esc_html__('Related Posts', 'barberry') . '</h3>';
					echo '<div class="grid-x grid-margin-x align-center">';
						foreach ($posts as $post) :
							echo '<article class="small-12 medium-6 large-3 cell related-post ' . ( $class = has_post_thumbnail($post->ID) ? 'has-post-thumbnail' : '' ) . '">';
								
					            	if(has_post_thumbnail($post->ID)):
					            		echo '<div class="entry-thumbnail">';
					            			echo '<div class="entry-meta">';
					            			echo '<time class="entry-date published"><span>' . get_the_date('', $post->ID) .'</span></time>';
					            			echo '</div>';
					            			echo '<a class="related_post_image" href="' . get_the_permalink($post->ID) . '"> ';
					            				if( TDL_Opt::getOption('blog_posts_parallax') ):
						            				echo '<div class="image-holder prllx" data-prllx="35">';
						            			else:
						            				echo '<div class="image-holder">';
						            			endif;

						            				echo get_the_post_thumbnail($post->ID,'large');
						            			echo '</div>';
												echo get_the_post_thumbnail($post->ID,'thumbnail');
											echo '</a>';
										echo '</div>';
									endif;
					        	
								echo '<div class="related_post_content">';
									echo '<div class="entry-meta">';
									echo '<time class="entry-date published"><span>' . get_the_date('', $post->ID) .'</span></time>';
									echo '</div>';
							    	echo '<h2 class="related_post_title"><a href="' . get_permalink( $post->ID ) . '">' . $post->post_title . '</a></h2>';
							    echo '</div>';
						    echo '</article>';
						endforeach;
				    echo '</div>';
			    echo '</div>';
			echo '</div>';
		echo '</div>';
	endif;	
    
}
endif;

add_action('barberry_related_posts', 'barberry_related_posts');




/*-----------------------------------------------------------------------------------*/
/*	Display categories menu
/*-----------------------------------------------------------------------------------*/

if( ! function_exists( 'barberry_blog_categories_nav' ) ) {
	function barberry_blog_categories_nav() {
		global $wp_query, $post;

		?>
			<div class="blog-categories-wrapper">
				<div class="blog-categories">
					<div class="barberry-show-categories"><a href="#"><span><?php echo esc_html__('All Articles', 'barberry') ?></span></a></div>

					<div class="barberry-categories">
						<ul class="list_blog_categories list-centered">
							<?php $current_cat = is_home()? 'current-cat' : ''; ?>
				    		<li class="cat-item <?php echo esc_attr($current_cat); ?>">
								<a href="<?php if ( get_option( 'show_on_front' ) == 'page' ) echo get_permalink( get_option('page_for_posts' ) );
									else echo esc_url( home_url() );?>"><?php echo esc_html__( 'All Articles', 'barberry'); ?>
								</a>
							</li>							
							<?php wp_list_categories(array('title_li'=> '')); ?>
						</ul>								
					</div>

				</div>
			</div>

	<?php	

	}
}

// **********************************************************************// 
// Page Title Header
// **********************************************************************// 

if( ! function_exists( 'barberry_page_header' ) ) {
	function barberry_page_header() {
		?>

		<?php 

			/**
			 * barberry_after_header hook
			 *
			 * @hooked barberry_show_page_title - 10
			 */
			do_action( 'barberry_after_header' ); 
		?>


		<?php
	}
}



// **********************************************************************// 
// Page Title Function
// **********************************************************************// 

if( ! function_exists( 'barberry_after_header' ) ) {

	add_action( 'barberry_after_header', 'barberry_page_title', 10 );

	function barberry_page_title() {
        global $wp_query, $post;

        $page_id = 0;

		$disable     = false;
		$page_title  = true;

		  
		$image = '';
		$style = '';    

		$page_for_posts    = get_option( 'page_for_posts' );
		$page_for_shop     = get_option( 'woocommerce_shop_page_id' );

		$title_class = 'page-title-';
		$title_color = $title_type = $title_size = 'default';

		// Get default styles from Options Panel
		$title_design = TDL_Opt::getOption('page-title');
		$title_size = TDL_Opt::getOption('page-title-size');
		$title_color = TDL_Opt::getOption('page-title-color');
		$breadcrumbs = TDL_Opt::getOption('breadcrumbs');
		$shop_categories = TDL_Opt::getOption('shop_categories');


		// Set here page ID. Will be used to get custom value from metabox of specific PAGE | BLOG PAGE | SHOP PAGE.
		$page_id = barberry_page_ID();

		if ( barberry_is_shop_archive() ) {
			$title_design = TDL_Opt::getOption('shop-title');
			$breadcrumbs = TDL_Opt::getOption('shop_breadcrumbs');

			$page_id = wc_get_page_id('shop');
		} 

		if ( barberry_is_blog_archive() ) {
			$breadcrumbs = TDL_Opt::getOption('blog_breadcrumbs');
		}
	

		if( $page_id != 0 ) {

			if ( barberry_is_shop_archive() ) {
				if ( is_product_category() ) {
					$page_id = get_queried_object(); 
				}
			}

			$disable = get_field('tdl_page_header_title', $page_id);
			$image = get_field('tdl_page_title_image', $page_id);

			$page_subtitle = get_field('tdl_subtitle', $page_id);

			$custom_title_color = get_field('tdl_page_title_color_scheme', $page_id);
			$custom_title_bg_color = get_field('tdl_page_title_bg_color', $page_id);

			$custom_title_size = get_field('tdl_page_title_size', $page_id);

			if ( barberry_is_shop_archive() ) {
				if ( is_product_category() ) {

					$image = get_field('tdl_prodcat_image_header', $page_id);

					$custom_title_color = get_field('tdl_prodcat_title_color_scheme', $page_id);
					$custom_title_bg_color = get_field('tdl_prodcat_title_bg_color', $page_id);
					$custom_title_size = get_field('tdl_prodcat_title_size', $page_id);
				}
			}

			if( $image != '' ) {
				$style .= "background-image: url(" . $image['url'] . ");";
			}

			if( $custom_title_bg_color != '' ) {
				$style .= "background-color: " . $custom_title_bg_color . ";";
			}			
		

			if( $custom_title_color != '' && $custom_title_color != 'default' ) {
				$title_color = $custom_title_color;
			}	

			if( $custom_title_size != '' && $custom_title_size != '' ) {
				$title_size = $custom_title_size;
			}
		}

		if ( $title_design == 'disable' ) $page_title = false;
		if ( ! $page_title && ! $breadcrumbs ) $disable = true;


		if ( $disable ) return;

		$title_class .= $title_type;
		$title_class .= ' title-size-'  . $title_size;
		$title_class .= ' title-design-' . $title_design;	
		$title_class .= ' color-scheme-' . $title_color;			

		if ( is_singular( 'post' ) ) {
			$user_id = get_the_author_meta( 'ID' );
			$breadcrumbs = TDL_Opt::getOption('blog_post_breadcrumbs');
		?>

			<!-- begin page-header -->
			<div class="page-header page-title-default title-size-default title-design-default color-scheme-default">
				<!-- begin title-section -->
				<div class="title-section grid-container" data-parallax='{"y" : -40, "smoothness": 10}'>
					<!-- begin title-section-wrapper -->
					<div class="title-section-wrapper grid-x align-middle align-center">

						<!-- begin page-title-wrapper -->
						<div class="title-wrapper">
							<?php if( $breadcrumbs ) barberry_breadcrumbs(); ?>

							<!-- begin page-title-wrapper -->
							<div class="page-title-wrapper">
								<h1 class="page-title entry-title"><?php the_title(); ?></h1>
							</div>
							<!-- end .page-title-wrapper -->	

							<div class="entry-meta barberry-entry-meta">
								<span class="page-title-delimiter"></span>
								<?php barberry_post_meta(array(
									'labels' => 1,
									'author' => 1,
									'date' => 1,
									'edit' => 0,
									'comments' => 1,
									'share' => 1,
									'short_labels' => 0
								)); ?>
							</div>									
						</div>
						<!-- end .title-wrapper -->
					</div>
					<!-- end .title-section-wrapper -->
				</div>
				<!-- end .title-section -->
			</div>
			<!-- end page-header -->

			<?php
			return;
		}

		// Pages Heading

		if( is_singular( 'page' ) && ( ! $page_for_posts || ! is_page( $page_for_posts ) ) ):
			$title = get_the_title();
			?>

			<!-- begin page-header -->
			<div class="page-header <?php echo esc_attr( $title_class ); ?>">
				<!-- begin title-section -->
				<div class="title-section grid-container" data-parallax='{"y" : -40, "smoothness": 10}'>
					<!-- begin title-section-wrapper -->
					<div class="title-section-wrapper grid-x align-middle align-center">

						<!-- begin page-title-wrapper -->
						<div class="title-wrapper">
							<?php if( $page_title ): ?>
								<?php if( $breadcrumbs ) barberry_breadcrumbs(); ?>

								<!-- begin page-title-wrapper -->
								<div class="page-title-wrapper">
									<h1 class="page-title entry-title"><?php the_title();?> </h1>
								</div>
								<!-- end .page-title-wrapper -->
								<?php if( $page_subtitle ): ?>
									<div class="term-description"><p><?php echo esc_attr( $page_subtitle ); ?></p></div><?php endif; ?>
							<?php endif; ?>			
							
						</div>
						<!-- end .title-wrapper -->
					</div>
					<!-- end .title-section-wrapper -->
				</div>
				<!-- end .title-section -->

				<!-- begin page-title-wrapper -->
				<div class="page-header-bg-wrapper">
					<div class="page-header-bg rellax" data-rellax-speed="-1.5" style="<?php echo esc_attr( $style ); ?>"></div>
				</div>
				<!-- end .page-title-wrapper -->
			</div>
			<!-- end .page-header -->

			<?php
			return;
		endif;  


		// Heading for blog and archives
		if( is_singular( 'post' ) || barberry_is_blog_archive() ):

			$title = ( ! empty( $page_for_posts ) ) ? get_the_title( $page_for_posts ) : esc_html__( 'Blog', 'barberry' );
			$page_subtitle = '';

			if( is_tag() ) {
				$title = esc_html__( 'Tag Archives: ', 'barberry')  . single_tag_title( '', false ) ;
				$page_subtitle = '';
			}

			if( is_category() ) {
				$title = '<span>' . single_cat_title( '', false ) . '</span>'; 
				$page_subtitle = '';
			}

			if( is_date() ) {
				if ( is_day() ) :
					$title = esc_html__( 'Daily Archives: ', 'barberry') . get_the_date();
				elseif ( is_month() ) :
					$title = esc_html__( 'Monthly Archives: ', 'barberry') . get_the_date( _x( 'F Y', 'monthly archives date format', 'barberry' ) );
				elseif ( is_year() ) :
					$title = esc_html__( 'Yearly Archives: ', 'barberry') . get_the_date( _x( 'Y', 'yearly archives date format', 'barberry' ) );
				else :
					$title = esc_html__( 'Archives', 'barberry' );
				endif;
				$page_subtitle = '';
			}	

			if ( is_author() ) {
				/*
				 * Queue the first post, that way we know what author
				 * we're dealing with (if that is the case).
				 *
				 * We reset this later so we can run the loop
				 * properly with a call to rewind_posts().
				 */
				the_post();

				$title = esc_html__( 'Posts by ', 'barberry' ) . get_the_author();

				/*
				 * Since we called the_post() above, we need to
				 * rewind the loop back to the beginning that way
				 * we can run the loop properly, in full.
				 */
				rewind_posts();
				$page_subtitle = '';
			}

			if( is_search() ) {
				$title = esc_html__( 'Search Results for: ', 'barberry' ) . get_search_query();
				$page_subtitle = '';
			}	



			?>

			<!-- begin page-header -->
			<div class="page-header <?php echo esc_attr( $title_class ); ?>">
				<!-- begin title-section -->
				<div class="title-section grid-container" data-parallax='{"y" : -40, "smoothness": 10}'>
					<!-- begin title-section-wrapper -->
					<div class="title-section-wrapper grid-x align-middle align-center">

						<!-- begin page-title-wrapper -->
						<div class="title-wrapper">
							<?php if( $page_title ): ?>
								<?php if( $breadcrumbs ) barberry_breadcrumbs(); ?>

								<!-- begin page-title-wrapper -->
								<div class="page-title-wrapper">
									<h1 class="page-title entry-title"><?php echo esc_attr( $title ); ?></h1>
								</div>
								<!-- end .page-title-wrapper -->
								<?php if( $page_subtitle ): ?><div class="term-description"><p><?php echo esc_attr( $page_subtitle ); ?></p></div><?php endif; ?>
							<?php endif; ?>			
							
						</div>
						<!-- end .title-wrapper -->
						<?php if( !is_search() ) { ?>
							<?php if( TDL_Opt::getOption('blog_categories') ) barberry_blog_categories_nav(); ?>
						<?php } ?>
					</div>
					<!-- end .title-section-wrapper -->
				</div>
				<!-- end .title-section -->

				<!-- begin page-title-wrapper -->
				<div class="page-header-bg-wrapper">
					<div class="page-header-bg rellax" data-rellax-speed="-1.5" style="<?php echo esc_attr( $style ); ?>"></div>
				</div>
				<!-- end .page-title-wrapper -->
			</div>
			<!-- end .page-header -->

			<?php
			return;
		endif;



		// Page heading for shop page
		if( barberry_is_shop_archive()
		 ):


			if( is_product_category() || is_product_tag() || is_tax( 'product_brand' ) ) {
				$title_class .= ' with-back-btn';
			}


			?>

				<?php if ( apply_filters( 'woocommerce_show_page_title', true ) && ! is_singular( "product" ) ) : ?>
					<!-- begin page-header --> 
					<div class="page-header <?php echo esc_attr( $title_class ); ?>">
						<!-- begin title-section -->
						<div class="title-section grid-container" data-parallax='{"y" : -40, "smoothness": 10}'>
							<!-- begin title-section-wrapper -->
							<div class="title-section-wrapper grid-x align-middle align-center">
								<!-- begin page-title-wrapper -->
								<div class="title-wrapper">	
									<?php if( $page_title ): ?>
										<?php if( $breadcrumbs ) woocommerce_breadcrumb(); ?>
										<!-- begin page-title-wrapper -->
										<div class="page-title-wrapper">	
											<?php if ( is_product_category() || is_product_tag() || is_tax( 'product_brand' ) ): ?>
												<?php barberry_back_btn(); ?>
											<?php endif ?>																		
											<h1 class="page-title entry-title"><?php woocommerce_page_title(); ?></h1>
										</div>	
										<!-- end .page-title-wrapper -->
										<?php if( $page_subtitle ): ?>
											<div class="term-description"><p><?php echo esc_attr( $page_subtitle ); ?></p></div>
										<?php else: ?>
											<?php do_action( 'woocommerce_archive_description' ); ?>
										<?php endif; ?>
										
									<?php endif; ?>									
								</div>
								<!-- end .title-wrapper -->	
								<?php if( ! is_singular( "product" ) && $shop_categories ) barberry_product_categories_nav(); ?>														
							</div>
							<!-- end .title-section-wrapper -->											
						</div>
						<!-- end .title-section -->

						<!-- begin page-title-wrapper -->
						<div class="page-header-bg-wrapper">
							<div class="page-header-bg rellax" data-rellax-speed="-1.5" style="<?php echo esc_attr( $style ); ?>"></div>
						</div>
						<!-- end .page-title-wrapper -->
					</div>
					<!-- end .page-header -->
				<?php endif; ?>

			<?php
			
			return;
		endif;
	}
}

// **********************************************************************// 
// ! Recursive function to get page title image for the category or 
// ! take it from some parent term
// **********************************************************************// 

if( ! function_exists( 'barberry_back_btn' ) ) {
	function barberry_back_btn() {
		?>
            <a href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>" class="back-btn">
				<svg class="svg-icon" viewBox="0 0 32 32" enable-background="new 0 0 32 32" xml:space="preserve">
		            <use x="0" y="0" xlink:href="#i-back"></use>
		        </svg>         
            </a>

		<?php
	}
}

// **********************************************************************// 
// ! Recursive function to get page title image for the category or 
// ! take it from some parent term
// **********************************************************************// 

if( ! function_exists( 'barberry_get_category_page_title_image' ) ) {
	function barberry_get_category_page_title_image( $cat ) {
		$taxonomy = 'product_cat';
		$meta_key = 'tdl_prodcat_image_header';
		$cat_image = get_term_meta( $cat->term_id, $meta_key, true );
		if( $cat_image != '' ) {
			return $cat_image;
		} else if( ! empty( $cat->parent ) ) {
	    	$parent = get_term_by( 'term_id', $cat->parent, $taxonomy );
	    	return barberry_get_category_page_title_image( $parent );
		} else {
			return '';
		}
	}
}


// **********************************************************************// 
// Change several of the breadcrumb defaults
// **********************************************************************// 

add_filter( 'woocommerce_breadcrumb_defaults', 'barberry_woocommerce_breadcrumbs' );

function barberry_woocommerce_breadcrumbs() {
    return array(
            'delimiter'   => ' &#47; ',
            'wrap_before' => '<div class="breadcrumbs-wrapper"><div class="breadcrumbs" itemprop="breadcrumb">',
            'wrap_after'  => '</div></div>',
            'before'      => '<span>',
            'after'       => '</span>',
            'home'        => esc_html__( 'Home', 'barberry'),
        );
}

// **********************************************************************// 
// Breacdrumbs function
// Snippet from http://dimox.net/wordpress-breadcrumbs-without-a-plugin/
// **********************************************************************// 

if( ! function_exists( 'barberry_breadcrumbs' ) ) {
	function barberry_breadcrumbs() {

		/* === OPTIONS === */
		$text['home']     = esc_html__('Home', 'barberry'); // text for the 'Home' link
		$text['category'] = esc_html__('Archive by Category "%s"', 'barberry'); // text for a category page
		$text['search']   = esc_html__('Search Results for "%s" Query', 'barberry'); // text for a search results page
		$text['tag']      = esc_html__('Posts Tagged "%s"', 'barberry'); // text for a tag page
		$text['author']   = esc_html__('Articles Posted by %s', 'barberry'); // text for an author page
		$text['404']      = esc_html__('Error 404', 'barberry'); // text for the 404 page

		$show_current_post  = 0; // 1 - show current post
		$show_current   = 1; // 1 - show current post/page/category title in breadcrumbs, 0 - don't show
		$show_on_home   = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
		$show_home_link = 1; // 1 - show the 'Home' link, 0 - don't show
		$show_title     = 1; // 1 - show the title for the links, 0 - don't show
		$delimiter      = '<span class="delimiter">&#47;</span>'; // delimiter between crumbs
		$before         = '<span class="current">'; // tag before the current crumb
		$after          = '</span>'; // tag after the current crumb
		/* === END OF OPTIONS === */

		global $post;

		$home_link    = home_url('/');
		$link_before  = '<span typeof="v:Breadcrumb">';
		$link_after   = '</span>';
		$link_attr    = ' rel="v:url" property="v:title"';
		$link         = $link_before . '<a' . $link_attr . ' href="%1$s">%2$s</a>' . $link_after;
		$parent_id    = $parent_id_2 = ( ! empty($post) && is_a($post, 'WP_Post') ) ? $post->post_parent : 0;
		$frontpage_id = get_option('page_on_front');
		$projects_id  = barberry_tpl2id( 'portfolio.php' );

		if (is_home() || is_front_page()) {

			if ($show_on_home == 1) echo '<div class="breadcrumbs-wrapper"><div class="breadcrumbs"><span><a href="' . $home_link . '">' . $text['home'] . '</a></span></div></div>';

		} else {

			echo '<div class="breadcrumbs-wrapper"><div class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">';
			if ($show_home_link == 1) {
				echo '<span><a href="' . $home_link . '" rel="v:url" property="v:title">' . $text['home'] . '</a></span>';
				if ($frontpage_id == 0 || $parent_id != $frontpage_id) echo wp_kses_post($delimiter);
			}

			if ( is_category() ) {
				$this_cat = get_category(get_query_var('cat'), false);
				if ($this_cat->parent != 0) {
					$cats = get_category_parents($this_cat->parent, TRUE, $delimiter);
					if ($show_current == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
					$cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
					$cats = str_replace('</a>', '</a>' . $link_after, $cats);
					if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
					echo wp_kses_post($cats);
				}
				if ($show_current == 1) echo wp_kses_post($before) . sprintf($text['category'], single_cat_title('', false)) . wp_kses_post($after);

			} elseif( is_tax( 'project-cat' ) ) {
				printf($link, get_the_permalink( $projects_id ), get_the_title( $projects_id ));
			} elseif ( is_search() ) {
				echo wp_kses_post($before) . sprintf($text['search'], get_search_query()) . $after;

			} elseif ( is_day() ) {
				echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
				echo sprintf($link, get_month_link(get_the_time('Y'),get_the_time('m')), get_the_time('F')) . $delimiter;
				echo wp_kses_post($before) . get_the_time('d') . $after;

			} elseif ( is_month() ) {
				echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
				echo wp_kses_post($before) . get_the_time('F') . $after;

			} elseif ( is_year() ) {
				echo wp_kses_post($before) . get_the_time('Y') . $after;

			} elseif ( is_single() && !is_attachment() ) {
				if( get_post_type() == 'portfolio' ) {
					printf($link, get_the_permalink( $projects_id ), get_the_title( $projects_id ));
					if ($show_current == 1) echo wp_kses_post($delimiter) . wp_kses_post($before) . get_the_title() . wp_kses_post($after);

				} else if ( get_post_type() != 'post' ) {
					$post_type = get_post_type_object(get_post_type());
					$slug = $post_type->rewrite;
					printf($link, $home_link . $slug['slug'] . '/', $post_type->labels->singular_name);
					if ($show_current == 1) echo wp_kses_post($delimiter) . wp_kses_post($before) . get_the_title() . wp_kses_post($after);
				} else {
					$cat = get_the_category(); $cat = $cat[0];
					$cats = get_category_parents($cat, TRUE, $delimiter);
					if ($show_current == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
					$cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
					$cats = str_replace('</a>', '</a>' . $link_after, $cats);
					if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
					echo wp_kses_post($cats);
					if ($show_current_post == 1) echo wp_kses_post($before) . get_the_title() . wp_kses_post($after);
				}

			} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
				$post_type = get_post_type_object(get_post_type());
				if ( is_object( $post_type ) ) {
					echo wp_kses_post($before) . $post_type->labels->singular_name . $after;
				}
				
			} elseif ( is_attachment() ) {
				$parent = get_post($parent_id);
				$cat = get_the_category($parent->ID); $cat = $cat[0];
				if ($cat) {
					$cats = get_category_parents($cat, TRUE, $delimiter);
					$cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
					$cats = str_replace('</a>', '</a>' . $link_after, $cats);
					if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
					echo wp_kses_post($cats);
				}
				printf($link, get_permalink($parent), $parent->post_title);
				if ($show_current == 1) echo wp_kses_post($delimiter) . $before . get_the_title() . $after;

			} elseif ( is_page() && !$parent_id ) {
				if ($show_current == 1) echo wp_kses_post($before) . get_the_title() . $after;

			} elseif ( is_page() && $parent_id ) {
				if ($parent_id != $frontpage_id) {
					$breadcrumbs = array();
					while ($parent_id) {
						$page = get_page($parent_id);
						if ($parent_id != $frontpage_id) {
							$breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
						}
						$parent_id = $page->post_parent;
					}
					$breadcrumbs = array_reverse($breadcrumbs);
					for ($i = 0; $i < count($breadcrumbs); $i++) {
						echo wp_kses_post($breadcrumbs[$i]);
						if ($i != count($breadcrumbs)-1) echo wp_kses_post($delimiter);
					}
				}
				if ($show_current == 1) {
					if ($show_home_link == 1 || ($parent_id_2 != 0 && $parent_id_2 != $frontpage_id)) echo wp_kses_post($delimiter);
					echo wp_kses_post($before) . get_the_title() . $after;
				}

			} elseif ( is_tag() ) {
				echo wp_kses_post($before) . sprintf($text['tag'], single_tag_title('', false)) . $after;

			} elseif ( is_author() ) {
		 		global $author;
				$userdata = get_userdata($author);
				echo wp_kses_post($before) . sprintf($text['author'], $userdata->display_name) . $after;

			} elseif ( is_404() ) {
				echo wp_kses_post($before) . $text['404'] . $after;

			} elseif ( has_post_format() && !is_singular() ) {
				echo get_post_format_string( get_post_format() );
			}

			if ( get_query_var('paged') ) {
				if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
				echo esc_html__('Page', 'barberry' ) . ' ' . get_query_var('paged');
				if ( is_category() || is_day() ||
				 is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
			}

			echo '</div><!-- .breadcrumbs --></div><!-- .breadcrumbs-wrapper -->';

		}
	}
}

// **********************************************************************// 
// ! Header Search
// **********************************************************************// 

if( ! function_exists( 'barberry_header_search' ) ) {
	function barberry_header_search() {

		if( empty(TDL_Opt::getOption('header_search')) ) return;

		printf(
            '<span id="header-search" class="header-search">
              <svg class="svg-icon" viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve">
                <use x="0" y="0" xlink:href="#i-search"></use>
              </svg>
            </span>'	
		);		

	}
}

// **********************************************************************// 
// ! Header Wishlist
// **********************************************************************// 

if( ! function_exists( 'barberry_header_wishlist' ) ) {
	function barberry_header_wishlist() {

		if( empty(TDL_Opt::getOption('header_wishlist')) ) return;

		if ( ! function_exists( 'YITH_WCWL' ) ) {
			return '';
		}	

		$count = yith_wcwl_count_products();

		printf(
	        '<a href="%s" class="header-wishlist">
	          <svg class="svg-icon" viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve">
	            <use x="0" y="0" xlink:href="#i-wishlist"></use>
	          </svg> 
	          <sup class="wishlist_items_number">%s</sup>                      
	        </a>',			
				esc_url( YITH_WCWL()->get_wishlist_url() ),
				intval( $count )
		);

	}
}

// **********************************************************************// 
// ! Header Compare
// **********************************************************************//

if( ! function_exists( 'barberry_header_compare' ) ) {
	function barberry_header_compare() {

		if( empty(TDL_Opt::getOption('header_compare')) ) return;

		if ( !defined('YITH_WOOCOMPARE') ) {
			return '';
		}	

		global $yith_woocompare;

		if (TDL_Opt::getOption('compare_extends')) {
			$view_href = TDL_Opt::getOption('compare_page') && (int) TDL_Opt::getOption('compare_page') ? get_permalink((int)TDL_Opt::getOption('compare_page')) : home_url('/');
			$class = 'barberry-show-compare';
		} else {
			$view_href = add_query_arg(array('iframe' => 'true'), $yith_woocompare->obj->view_table_url());
			$class = 'compare';
		}

		printf(
	        '<a href="%s" class="header-compare %s">
	          <svg class="svg-icon" viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve">
	            <use x="0" y="0" xlink:href="#i-compare"></use>
	          </svg> 
	          <sup class="compare_items_number">0</sup>                      
	        </a>',			
			esc_url($view_href),
			esc_attr($class)
		);

	}
}

// Get Count Compare 

if (!function_exists('barberry_get_count_compare')):
    function barberry_get_count_compare($show = true) {

		if ( !defined('YITH_WOOCOMPARE') ) {
			return '';
		}
        
        global $yith_woocompare;
        
        $count = count($yith_woocompare->obj->products_list);
        $hasEmpty = (int) $count == 0 ? ' barberry-product-empty' : '';
        
        $sl = $show ? '' : ' hide';
        $barberrySl = (int) $count > 9 ? '9+' : (int) $count;

        return '<sup class="compare_items_number' . $hasEmpty . '' . $sl . '">' . apply_filters('barberry_mini_compare_total_items', $barberrySl) . '</sup>';
        
    }
endif;

// **********************************************************************// 
// ! Product Page Compare link
// **********************************************************************//

if ( class_exists( 'YITH_Woocompare' ) ) {
	global $yith_woocompare;

	// Add custom link to compare
	function add_compare_custom_link( $product_id = false, $args = array() ) {
		extract( $args );

		if ( ! $product_id ) {
			global $product;
			$product_id = ! is_null( $product ) ? yit_get_prop( $product, 'id', true ) : 0;
		}

		// return if product doesn't exist
		if ( empty( $product_id ) || apply_filters( 'yith_woocompare_remove_compare_link_by_cat', false, $product_id ) )
			return;

		if ( ! isset( $button_text ) || $button_text == 'default' ) {
			$button_text = get_option( 'yith_woocompare_button_text', __( 'Compare', 'yith-woocommerce-compare' ) );
			do_action ( 'wpml_register_single_string', 'Plugins', 'plugin_yit_compare_button_text', $button_text );
			$button_text = apply_filters( 'wpml_translate_single_string', $button_text, 'Plugins', 'plugin_yit_compare_button_text' );
		}


		if (TDL_Opt::getOption('compare_extends')) {
			$product_url = "javascript:void(0);";
			$class = 'compare-link barberry-compare';
		} else {
			$product_url = add_product_url( $product_id );
			$class = 'compare compare-link';
		}

		
		printf( '<div class="compare-btn"><a href="%s" class="%s" data-prod="%d" data-product_id="%d" rel="nofollow"><span>%s</span></a></div>', $product_url, $class, $product_id, $product_id, $button_text );

	}

	// The URL to add the product into the comparison table
	function add_product_url( $product_id ) {
		$action_add = 'yith-woocompare-add-product';

		$url_args = array(
			'action' => $action_add,
			'id' => $product_id
		);

		$lang = defined( 'ICL_LANGUAGE_CODE' ) ? ICL_LANGUAGE_CODE : false;
		if( $lang ) {
			$url_args['lang'] = $lang;
		}

		return apply_filters( 'yith_woocompare_add_product_url', esc_url_raw( add_query_arg( $url_args, site_url() ) ), $action_add );
	}

	// Check if Compare button is in Product page
	if ( get_option( 'yith_woocompare_compare_button_in_product_page' ) == 'yes' ) {
		// Remove Compare default link after Single Product page summary
		remove_action( 'woocommerce_single_product_summary', array( $yith_woocompare->obj, 'add_compare_link' ), 35 );

		// Add Compare custom link after Single Product page summary
		add_action( 'woocommerce_single_product_summary', 'add_compare_custom_link', 35 );
	}

}

// **********************************************************************// 
// ! Header Cart
// **********************************************************************// 

if( ! function_exists( 'barberry_header_cart' ) ) {
	function barberry_header_cart() {

	global $woocommerce;

	if( TDL_Opt::getOption('catalog_mode_button') ) return;

	if ( ! function_exists( 'woocommerce_mini_cart' ) ) {
		return '';
	}

	$carticon = '';

	if ( TDL_Opt::getOption('header_cart_icon') ) {
		$carticon = 'show-cart-icon';
	}

	printf(
		'<a href="%s" class="link header-cart %s">
			<span class="header-cart-title">%s</span>
			<span class="header-cart-count">
			  <span class="header-cart-count-background"></span>
			  <span class="header-cart-count-number">%s</span>
			</span>
		</a>',		
		esc_url( wc_get_cart_url() ),
		$carticon,
		esc_html__( 'Cart', 'woocommerce' ),
		intval( WC()->cart->get_cart_contents_count() )
	);

	}
}


// **********************************************************************// 
// ! Header Account Links
// **********************************************************************// 

if( ! function_exists( 'barberry_header_account' ) ) {
	function barberry_header_account() {

		if( empty(TDL_Opt::getOption('header_account')) ) return;

		$links = barberry_get_header_links();

		$login_dropdown_mod = TDL_Opt::getOption('header_account_dropdown');

		$login_dropdown = '';
		$login_dropdown_link = '';
		$account_icon ='';
		$account_icon = ( TDL_Opt::getOption('header_account_icon') ) ? ' my-account-icon' : '';

		if( !is_user_logged_in() ) {
			$login_dropdown = 'my-account-form';
			$login_dropdown_link = ( TDL_Opt::getOption('header_account_dropdown') ) ? ' my-account-has-drop' : 'my-account-no-drop';
		} else {
			$login_dropdown = 'my-account-has-drop';
		}

		$classes = 'item-level-0';
		$classes .= ( ! empty( $link['dropdown'] ) ) ? ' menu-item-has-children' : '';
		$classes .= ( TDL_Opt::getOption('header_account_with_username') ) ? ' my-account-with-username' : '';
		

		if( ! empty( $links ) ) {
		?>
		<div class="header-account navigation-foundation">
			<ul class="dropdown menu <?php echo esc_attr($login_dropdown); ?> <?php echo esc_attr($login_dropdown_link); ?> <?php echo esc_attr($account_icon); ?>" data-close-on-click="false" data-close-on-click-inside="false" data-click-open="false" data-dropdown-menu data-hover-delay="150" data-closing-time="0" data-alignment="right">
				<?php foreach ($links as $key => $link):
					$classes .= ' menu-item-'. $key;
				?>	
					<li>
						<?php if( !is_user_logged_in() && $login_dropdown_mod ) : ?>
							<a data-open="head_loginModal">
						<?php else: ?>
							<a href="<?php echo esc_url( $link['url'] ); ?>">
						<?php endif; ?>

						
							<span><?php echo wp_kses( $link['label'], 'default' ); ?></span></a>
						<?php if( ! empty( $link['dropdown'] ) ) {
							echo wp_kses_post($link['dropdown']);
						} ?></li>
				<?php endforeach; ?>			
			</ul>
		</div>

		<?php
		}		
	}
}

// **********************************************************************// 
// !Mobile Account
// **********************************************************************// 

if( ! function_exists( 'barberry_mob_account' ) ) {
	function barberry_mob_account() {

		$links = barberry_get_mob_links();

		$login_dropdown = '';

		if( !is_user_logged_in() ) {			
			$login_dropdown = 'my-account-form';
		}

		$classes = 'item-level-0';
		$classes .= ( ! empty( $link['dropdown'] ) ) ? ' menu-item-has-children' : '';
		$classes .= ( TDL_Opt::getOption('header_account_with_username') ) ? ' my-account-with-username' : '';		

		$out = '';
		$compare_out = '';

		if( ! empty( $links ) ) {
		?>

			<ul class="vertical menu drilldown mobile-menu" data-drilldown data-close-on-click="true" data-auto-height="true" data-animate-height="true" data-back-button="&lt;li class&#x3D;&quot;js-drilldown-back&quot;&gt;&lt;a tabindex&#x3D;&quot;0&quot;&gt;<?php esc_attr_e( 'Back', 'barberry' )?>&lt;/a&gt;&lt;/li&gt;">
				<?php foreach ($links as $key => $link):
					$classes .= ' menu-item-'. $key;
				?>	

					<?php if ( (TDL_Opt::getOption('header_account') == 1) ) : ?>
						<li class="offcanvas-my-account-link" ><a href="<?php echo esc_url( $link['url'] ); ?>"><span><?php echo wp_kses( $link['label'], 'default' ); ?></span></a>
							<?php if( ! empty( $link['dropdown'] ) ) {
								echo wp_kses_post($link['dropdown']);
							} ?></li>
					<?php endif; ?>

					<?php 
					if ( class_exists( 'YITH_WCWL' ) && !empty(TDL_Opt::getOption('header_wishlist')) ) {
						$wishlist_page_id = yith_wcwl_object_id( get_option( 'yith_wcwl_wishlist_page_id' ) );
						$wishlist_class = '';
						if( is_page( $wishlist_page_id ) ) $wishlist_class = ' is-active';
						echo wp_kses_post($out .= '<li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--wishlist ' . $wishlist_class . '">
			                <a href="' . YITH_WCWL()->get_wishlist_url() . '"><span>' . get_the_title( $wishlist_page_id ) . '</span></a>
			            </li>');
					}

					?>

					<?php 

					if ( defined('YITH_WOOCOMPARE') && !empty(TDL_Opt::getOption('compare_extends')) ) {

						global $yith_woocompare;

						$view_href = TDL_Opt::getOption('compare_page') && (int) TDL_Opt::getOption('compare_page') ? get_permalink((int)TDL_Opt::getOption('compare_page')) : home_url('/');
						$compare_class = 'barberry-show-compare-mob';

						if ( ! isset( $button_text ) || $button_text == 'default' ) {
							$button_text = get_option( 'yith_woocompare_button_text', __( 'Compare', 'yith-woocommerce-compare' ) );
							do_action ( 'wpml_register_single_string', 'Plugins', 'plugin_yit_compare_button_text', $button_text );
							$button_text = apply_filters( 'wpml_translate_single_string', $button_text, 'Plugins', 'plugin_yit_compare_button_text' );
						}						

						echo wp_kses_post($compare_out .= '<li class="compare-mob-link">
			                <a href="' . $view_href . '" class="' . $compare_class . '"><span>' . get_the_title( TDL_Opt::getOption('compare_page') ) . '</span></a>
			            </li>');
					}

					// return $out . '';
					 ?>

				<?php endforeach; ?>			
			</ul>

		<?php
		}		
	}
}



// **********************************************************************// 
// ! Get links for header menu dropdown
// **********************************************************************// 

if( ! function_exists( 'barberry_get_header_links' ) ) {
	function barberry_get_header_links() {
		$links = array();

		if( ! barberry_woocommerce_installed() ) return $links;

		$login_dropdown = TDL_Opt::getOption('header_account_dropdown');
		$links_with_username = TDL_Opt::getOption('header_account_with_username');

		$account_link = get_permalink( get_option('woocommerce_myaccount_page_id') );
		$current_user = wp_get_current_user();

		if( is_user_logged_in() ) {

			$links['my-account'] = array(
				'label' => esc_html__('My account', 'woocommerce'),
				'url' => $account_link,
				'dropdown' => '
					<ul class="menu nested vertical">
						' . barberry_get_my_account_menu() . '
					</ul>
				'
			);
			if ( $links_with_username ) {
				$links['my-account']['label'] = sprintf( esc_html__( 'Hello, %s', 'barberry' ), '<strong>' . esc_html( $current_user->display_name ) . '</strong>' );
			}

		} else {

			$links['register'] = array(
				'label' => esc_html__('My account', 'woocommerce'),
				'url' => $account_link
			);

		}


		return apply_filters( 'barberry_get_header_links',  $links );
	}
}

// **********************************************************************// 
// ! Header modal login form
// **********************************************************************// 

if( ! function_exists( 'barberry_modal_login_form' ) ) {
	function barberry_modal_login_form() {
		if( ! barberry_woocommerce_installed() ) return;
		
		$login_modal = TDL_Opt::getOption('header_account_dropdown');
		$account_link = get_permalink( get_option('woocommerce_myaccount_page_id') );

		$show_reg_link = ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) ? true : false;		
		
		if ( ! $login_modal || is_user_logged_in() ) return;
		?>

			<div class="reveal" id="head_loginModal" data-reveal data-close-on-click="true" data-animation-in="fade-in" data-animation-out="fade-out">
				<h3 class="login-title"><?php esc_html_e( 'Log in', 'woocommerce' ); ?></h3>

				<?php barberry_login_form( true, $account_link ); ?>

				<?php if ( $show_reg_link ) { ?>
					<div class="create-account-qs">
						<div class="bb-login-form-divider"><span><?php esc_html_e( 'Or', 'barberry' ); ?></span></div>
						<?php echo sprintf( '<a class="button btn--border" href="' . esc_url( $account_link ) . '#register">' . esc_html__('Create an Account', 'barberry') . '</a>' ); ?>
					</div>
				<?php } ?>

				<div class="close-icon" data-close aria-label="Close modal">
					<span class="close-icon_top"></span>
					<span class="close-icon_bottom"></span>
				</div>
			</div>

		<?php
	}

	add_action( 'wp_footer', 'barberry_modal_login_form', 160 );
}


// **********************************************************************// 
// ! Get links for mobile menu dropdown
// **********************************************************************// 

if( ! function_exists( 'barberry_get_mob_links' ) ) {
	function barberry_get_mob_links() {
		$links = array();

		if( ! barberry_woocommerce_installed() ) return $links;

		$login_dropdown = TDL_Opt::getOption('header_account_dropdown');
		$links_with_username = TDL_Opt::getOption('header_account_with_username');

		$account_link = get_permalink( get_option('woocommerce_myaccount_page_id') );
		$current_user = wp_get_current_user();

		if( is_user_logged_in() ) {

			$links['my-account'] = array(
				'label' => esc_html__('My account', 'woocommerce'),
				'url' => $account_link,
				'dropdown' => '
					<ul class="menu nested vertical">
						' . barberry_get_my_account_menu() . '
					</ul>
				'
			);
			if ( $links_with_username ) {
				$links['my-account']['label'] = sprintf( esc_html__( 'Hello, %s', 'barberry' ), '<strong>' . esc_html( $current_user->display_name ) . '</strong>' );
			}

		} else {

			$links['register'] = array(
				'label' => esc_html__('My account', 'woocommerce'),
				'url' => $account_link
			);

		}


		return apply_filters( 'barberry_get_mob_links',  $links );
	}
}

// **********************************************************************// 
// ! My account menu
// **********************************************************************// 

if( ! function_exists( 'barberry_get_my_account_menu' ) ) {
	function barberry_get_my_account_menu() {
		$user_info = get_userdata( get_current_user_id() );
		$user_roles = $user_info->roles;
		
		$out = '';
		
        foreach ( wc_get_account_menu_items() as $endpoint => $label ) {
            $out .= '<li class="' . wc_get_account_menu_item_classes( $endpoint ) . ' "><a href="' . esc_url( wc_get_account_endpoint_url( $endpoint ) ) . '"><span>' . esc_html( $label ) . '</span></a></li>';
        }
		
		return $out . '';
	}
}

//Fix mobile menu active class
add_filter( 'woocommerce_account_menu_item_classes', function( $classes, $endpoint ){
	if ( ! is_account_page() && $endpoint == 'dashboard' ) {
		$classes = array_diff( $classes, array( 'is-active' ) );
	}
	return $classes;
}, 10, 2 );

// **********************************************************************// 
// ! Add account links to the top bat menu
// **********************************************************************// 

if( ! function_exists( 'barberry_add_logout_link' ) ) {
	add_filter( 'wp_nav_menu_items', 'barberry_add_logout_link', 10, 2 );
	function barberry_add_logout_link ( $items = '', $args = array(), $return = false ) {
	    if ( ( ! empty( $args ) && $args->theme_location == 'header-account-menu' ) || $return ) {

			$links = array();

			$logout_link = wc_get_account_endpoint_url( 'customer-logout' );

			$links['logout'] = array(
				'label' => esc_html__( 'Logout', 'barberry' ),
				'url' => $logout_link
			);

			if( ! empty( $links )) {
				foreach ($links as $key => $link) {
					$items .= '<li id="menu-item-' . $key . '" class="menu-item item-event-hover menu-item-' . $key . '">';
					$items .= '<a href="' . esc_url( $link['url'] ) . '">' . esc_attr( $link['label'] ) . '</a>';
					$items .= '</li>';
				}
			}
	    }
	    return $items;
	}
}

/**
 * ------------------------------------------------------------------------------------------------
 * My account navigation
 * ------------------------------------------------------------------------------------------------
 */
if ( ! function_exists( 'barberry_my_account_navigation' ) ) {
	function barberry_my_account_navigation( $items ) {
		$user_info = get_userdata( get_current_user_id() );
		$user_roles = $user_info && property_exists( $user_info, 'roles' ) ? $user_info->roles : array();

		unset( $items['customer-logout'] );

		if ( class_exists( 'YITH_WCWL' ) && !empty(TDL_Opt::getOption('my_account_wishlist')) ) {
			$items['wishlist'] = get_the_title( yith_wcwl_object_id( get_option( 'yith_wcwl_wishlist_page_id' ) ) );
		}

		if ( class_exists( 'Pie_WCWL_Waitlist' ) ) {
            $items['waitlist'] = esc_html__( 'Your Waitlists', 'barberry' );
		}

		if ( class_exists( 'WeDevs_Dokan' ) && apply_filters( 'barberry_dokan_link', true ) && ( in_array( 'seller', $user_roles ) || in_array( 'administrator', $user_roles ) ) ) {
			$items['dokan'] = esc_html__( 'Vendor dashboard', 'barberry' );
		}

	
		$items['customer-logout'] = esc_html__( 'Logout', 'barberry' );

		return $items;
	}

	add_filter( 'woocommerce_account_menu_items', 'barberry_my_account_navigation', 15 );
}

if ( ! function_exists( 'barberry_my_account_navigation_endpoint_url' ) ) {
	function barberry_my_account_navigation_endpoint_url( $url, $endpoint, $value, $permalink ) {

		if ( 'wishlist' === $endpoint && class_exists( 'YITH_WCWL' ) ) {
			$url = YITH_WCWL()->get_wishlist_url();
		}

		if ( 'waitlist' === $endpoint && class_exists( 'Pie_WCWL_Waitlist' ) ) {
			$url = esc_url( wc_get_account_endpoint_url( apply_filters( 'wcwl_waitlist_endpoint', 'woocommerce-waitlist' ) ) );
		}

		if ( 'dokan' === $endpoint && class_exists( 'WeDevs_Dokan' ) ) {
			$url = dokan_get_navigation_url();
		}

		return $url;
	}

	add_filter( 'woocommerce_get_endpoint_url', 'barberry_my_account_navigation_endpoint_url', 15, 4 );
}

if ( ! function_exists( 'barberry_my_account_navigation_endpoint_classes' ) ) {
	function barberry_my_account_navigation_endpoint_classes( $classes, $endpoint ) {
		global $wp;

		if ( 'wishlist' == $endpoint && property_exists( $wp, 'query_vars' ) && isset( $wp->query_vars[ 'wishlist-action' ] ) ) {
			$classes[] = 'is-active';
		}

		return $classes;
	}

	add_filter( 'woocommerce_account_menu_item_classes', 'barberry_my_account_navigation_endpoint_classes', 15, 2 );
}

//==============================================================================
// Get Category Title Image
//==============================================================================


if( ! function_exists( 'barberry_get_category_page_title_image' ) ) {
	function barberry_get_category_page_title_image( $cat ) {
		$taxonomy = 'product_cat';
		$meta_key = 'title_image';
		$cat_image = get_term_meta( $cat->term_id, $meta_key, true );
		if( $cat_image != '' ) {
			return $cat_image;
		} else if( ! empty( $cat->parent ) ) {
	    	$parent = get_term_by( 'term_id', $cat->parent, $taxonomy );
	    	return barberry_get_category_page_title_image( $parent );
		} else {
			return '';
		}
	}
}

//==============================================================================
// Back to top button
//==============================================================================

if( ! function_exists( 'barberry_backtotop_button' ) ) {
	function barberry_backtotop_button() {

		if ( TDL_Opt::getOption('backtotop') ) {

			$progress_bar = '<svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/></svg>';

			echo sprintf( '<div class="progress-page"><div class="scrolltotop is-active is-visible"><div class="arrow-top"></div><div class="arrow-top-line"></div><span class="tooltip">%s</span></div>%s</div>', esc_html__( 'Back to Top', 'barberry' ), $progress_bar);

		}
	}
	add_action( 'wp_footer', 'barberry_backtotop_button', 200 );
}

//==============================================================================
// Adds photoSwipe dialog element
//==============================================================================

function barberry_product_images_lightbox() {

	if ( ! is_singular() ) {
		return;
	}


	if ( ! function_exists( 'is_woocommerce' ) ) {
		return;
	}

	?>

	<div id="pswp" class="pswp" tabindex="-1" role="dialog" aria-hidden="true">


		<div class="pswp__bg"><div class="pswp__bg_cover"></div></div>

		<div class="pswp__scroll-wrap">

			<div class="pswp__container">
				<div class="pswp__item"></div>
				<div class="pswp__item"></div>
				<div class="pswp__item"></div>
			</div>

			<div class="pswp__ui pswp__ui--hidden">

				<div class="pswp__top-bar">

					<div class="pswp__counter"></div>

	                <button class="pswp__button pswp__button--close" aria-label="<?php esc_attr_e( 'Close (Esc)', 'woocommerce' ); ?>"></button>
	                <button class="pswp__button pswp__button--share" aria-label="<?php esc_attr_e( 'Share', 'woocommerce' ); ?>"></button>
	                <button class="pswp__button pswp__button--fs" aria-label="<?php esc_attr_e( 'Toggle fullscreen', 'woocommerce' ); ?>"></button>
	                <button class="pswp__button pswp__button--zoom" aria-label="<?php esc_attr_e( 'Zoom in/out', 'woocommerce' ); ?>"></button>

					<div class="pswp__preloader">
						<div class="pswp__preloader__icn">
							<div class="pswp__preloader__cut">
								<div class="pswp__preloader__donut"></div>
							</div>
						</div>
					</div>
				</div>

				<div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
					<div class="pswp__share-tooltip"></div>
				</div>

            	<button class="pswp__button pswp__button--arrow--left" aria-label="<?php esc_attr_e( 'Previous (arrow left)', 'woocommerce' ); ?>"></button>

            	<button class="pswp__button pswp__button--arrow--right" aria-label="<?php esc_attr_e( 'Next (arrow right)', 'woocommerce' ); ?>"></button>

				<div class="pswp__caption">
					<div class="pswp__caption__center"></div>
				</div>

			</div>

		</div>

	</div>

	<?php
}

add_action( 'wp_footer', 'barberry_product_images_lightbox' );


// **********************************************************************// 
// ! Social Login
// **********************************************************************// 

add_action('woocommerce_login_form_end', 'barberry_social_login');

if (!function_exists('barberry_social_login')) :
    function barberry_social_login () {
    	if (shortcode_exists('nextend_social_login') && !is_user_logged_in()) :
            echo '<div class="bb-login-form-divider"><span>' . esc_html__('Or login with', 'barberry') . '</span></div>';
            echo '<div class="form-row row-submit-login-social text-center">';
            echo do_shortcode('[nextend_social_login]');
            echo '</div>';
        endif;
    }
endif;


// **********************************************************************// 
// ! Login form HTML for header menu dropdown
// **********************************************************************// 

if( ! function_exists( 'barberry_login_form' ) ) {
	function barberry_login_form( $echo = true, $action = false, $message = false, $hidden = false, $redirect = false ) {
		
		ob_start();
		
		?>
		
			<form method="post" class="login woocommerce-form woocommerce-form-login <?php if ( $hidden ) echo 'hidden-form'; ?>" <?php echo ( ! empty( $action ) ) ? 'action="' . esc_url( $action ) . '"' : ''; ?> <?php if ( $hidden ) echo 'style="display:none;"'; ?>>

				<?php do_action( 'woocommerce_login_form_start' ); ?>


					<?php echo esc_attr( $message ) ? wpautop( wptexturize( $message ) ) : ''; ?>
					
					<p class="form-row form-row-first">
						<label for="username"><?php esc_html_e( 'Username or email', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
						<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" autocomplete="username" value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( $_POST['username'] ); ?>" />
					</p>
					<p class="form-row form-row-last">
						<label for="password"><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
						<input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" autocomplete="current-password" />
					</p>

					<div class="clear"></div>

					<?php do_action( 'woocommerce_login_form' ); ?>

					<p class="form-row form-group login-form-footer">
					    <label class="woocommerce-form__label woocommerce-form__label-for-checkbox inline">
					        <input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php esc_html_e( 'Remember me', 'woocommerce' ); ?></span>
					    </label>
					    
					    <span class="woocommerce-LostPassword lost_password">
					        <a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost your password?', 'woocommerce' ); ?></a>
					    </span>
					</p>

				    <p class="form-actions">
				        <?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>                 
				        <button type="submit" class="woocommerce-Button button" name="login" value="<?php esc_attr_e( 'Log in', 'woocommerce' ); ?>"><?php esc_html_e( 'Log in', 'woocommerce' ); ?></button>
				    </p>								

				<?php do_action( 'woocommerce_login_form_end' ); ?>

			</form>

		<?php

		if( $echo ) {
			echo ob_get_clean();
		} else {
			return ob_get_clean();
		}
	}
}

