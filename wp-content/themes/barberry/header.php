<!DOCTYPE html>

<html <?php language_attributes(); ?> class="no-js">

<head>
	<meta charset="<?php esc_html(bloginfo( 'charset' )); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php esc_html(bloginfo( 'pingback_url' )); ?>">


	<?php
		if (is_singular() && get_option('thread_comments'))
			wp_enqueue_script('comment-reply');

		wp_head();
	?>

</head>

<?php 
$footer_reveal = (!empty(TDL_Opt::getOption('footer_reveal'))) ? TDL_Opt::getOption('footer_reveal') : 0; 
$topbar_toggle = (!empty(TDL_Opt::getOption('topbar_toggle'))) ? TDL_Opt::getOption('topbar_toggle') : 0; 
$page_loader = (!empty(TDL_Opt::getOption('page_loader'))) ? TDL_Opt::getOption('page_loader') : 0; 

if (isset($_GET["topbar_toggle"])) {
	$topbar_toggle = $_GET["topbar_toggle"];
}
$header_layout = TDL_Opt::getOption('header_layout');
if (isset($_GET["header_layout"])) {
	$header_layout = $_GET["header_layout"];
}
?>

<body <?php body_class(); ?> data-footer-reveal="<?php echo esc_attr($footer_reveal); ?>"><?php wp_body_open(); ?>

	<?php if ( 1 == $page_loader ) : ?>
		<?php get_template_part( 'template-parts/headers/header-loader' ) ?>
	<?php endif; ?>	

	<?php barberry_svg_defs(); ?>

	<div id="bb-container" class="bb-container">

	<?php if ( 1 == $topbar_toggle ) : ?>
		<?php get_template_part( 'template-parts/headers/header-topbar' ) ?>
	<?php endif; ?>	

    <?php get_template_part( 'template-parts/headers/header', $header_layout ) ?>

    <!-- begin offcanvas_container -->
    <div class="offcanvas_container">
    	
		<!-- begin offcanvas_main_content -->
		<div class="offcanvas_main_content">

			<?php barberry_page_header(); ?>
			
