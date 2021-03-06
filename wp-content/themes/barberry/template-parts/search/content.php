<?php 
$size = 'barberry-blog-normal';

if ( 0 == TDL_Opt::getOption('blog_sidebar') ) {
	$size = 'barberry-blog-large';
}

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if(has_post_thumbnail()): ?>
		<div class="entry-thumbnail">
			<div class="entry-meta">
				<?php echo barberry_posted_on(); ?>
			</div>		
			<a href="<?php echo esc_url( get_permalink() ); ?>">
				<!-- begin image-holder -->
				<?php if( TDL_Opt::getOption('blog_posts_parallax') ): ?>
					<div class="image-holder prllx" data-prllx="35">
				<?php else: ?>
					<div class="image-holder">
				<?php endif; ?>
					<?php the_post_thumbnail( $size ); ?>
				</div>
				<!-- end image-holder -->
				
			</a>
		</div>
	<?php endif; ?>


	<div class="entry-content-wrap">

		<header class="entry-header">

			<div class="entry-meta">
				<?php echo barberry_posted_on(); ?>
			</div>

			<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' ); ?>

		</header>

		<div class="entry-content">

			<div><?php the_excerpt(); ?></div>

		</div>

		<a class="entry-content-readmore" href="<?php echo(esc_url(get_permalink())); ?>"><?php echo esc_html_e( 'Read More', 'barberry') ?></a>

	</div>
	<div class="clear"></div>

</article>
