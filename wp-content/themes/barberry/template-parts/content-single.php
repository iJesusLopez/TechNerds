<?php
	$size = 'barberry-blog-normal';

	if ( 0 == TDL_Opt::getOption('blog_single_sidebar') ) {
		$size = 'barberry-blog-large';
	}
	$author = get_the_author();
	$author_meta_desc = get_the_author_meta( 'description' )
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">

		<?php if( TDL_Opt::getOption('blog_single_featured') && has_post_thumbnail() ): ?>
			<div class="entry-thumbnail">
				<!-- begin image-holder -->
				<div class="image-holder">
					<?php the_post_thumbnail( $size ); ?>
				</div>
				<!-- end image-holder -->			
			</div>
		<?php endif; ?>

	</header><!-- .entry-header -->

	<div class="grid-x align-center">

		<div class="small-12 medium-12 large-10 cell">

			<div class="entry-content">

				<?php the_content(); ?>

				<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( '<span class="pages">Pages:</span>', 'barberry' ),
					'after'  => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
				) );
				?>


			</div><!-- .entry-content -->

			<div class="clear"></div>

			<footer class="entry-meta">
				
				<div class="post_tags"><?php barberry_entry_tags(); ?></div>
				
			</footer><!-- .entry-meta -->			

		</div>

	</div>

</article><!-- #post-## -->