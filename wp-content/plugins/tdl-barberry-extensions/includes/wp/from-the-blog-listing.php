<?php

// [from_the_blog]
function shortcode_from_the_blog_listing($atts, $content = null) {
	extract(shortcode_atts(array(
		"title" => '',
		"posts" => '9',
		"category" => ''
	), $atts));
	ob_start();
	?> 
    
	<div class="related_post_container related_posts_section">
		<?php 
			if ($title != '') {
				echo '<h2 class="shortcode_title">' . $title . '</h2>';
			}
		?>			

			<div class="single_related_posts">
				<div class="grid-x grid-margin-x">
					
				<?php 
	            $args = array(
	                'post_status' => 'publish',
	                'post_type' => 'post',
	                'category_name' => $category,
	                'posts_per_page' => $posts
	            );

	            $recentPosts = new WP_Query( $args );

	            if ( $recentPosts->have_posts() ) : ?>

	                <?php while ( $recentPosts->have_posts() ) : $recentPosts->the_post(); ?>

	                <?php $image_id = get_post_thumbnail_id(); ?>
	            
					<article class="small-12 medium-6 large-3 related-post cell <?php echo $class = has_post_thumbnail($recentPosts->ID) ? 'has-post-thumbnail' : ''; ?>">

						<?php if ( has_post_thumbnail()) : ?>
							<div class="entry-thumbnail">
								<div class="entry-meta">
									<?php echo barberry_posted_on(); ?>
								</div>
								<a class="related_post_image" href="<?php the_permalink(); ?>">
									<?php if ( TDL_Opt::getOption('blog_posts_parallax') ) : ?>
										<div class="image-holder prllx" data-prllx="35">
									<?php else: ?>
										<div class="image-holder">
									<?php endif; ?>
										<?php echo get_the_post_thumbnail($recentPosts->ID,'large') ?>
									</div>
									<?php echo get_the_post_thumbnail($recentPosts->ID,'thumbnail'); ?>
								</a>
								
							</div>
						<?php endif; ?>

						<div class="related_post_content">
							<div class="entry-meta"><?php echo barberry_posted_on(); ?></div>
							<h2 class="related_post_title"><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h2>
						</div>
						
					</article>

	                <?php endwhile; // end of the loop. ?>

	            <?php endif; ?>

				</div>
			</div>

    </div>
	
	<?php
	wp_reset_query();
	$content = ob_get_contents();
	ob_end_clean();
	return $content;
}

add_shortcode("from_the_blog_listing", "shortcode_from_the_blog_listing");