<?php
/** shit
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 * We filter the output of wp_title() a bit -- see
	 * twentyten_filter_wp_title() in functions.php.
	 */
	wp_title( '|', true, 'right' );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<?php wp_enqueue_script('jquery'); ?> 
<?php wp_head(); ?>



<script type="text/javascript">
jQuery.noConflict();
jQuery(document).ready(function($)  {
    $(".tab").click(function(){
		$("#panel").slideToggle("slow");
	  
			if(  $('#open').is(":visible") ){
				$('#open').hide();
				$('#close').show();
				} 
	  
			else if(  $('#close').is(":visible") ){
				$('#close').hide();
				$('#open').show();
				}
		} );

	} );
          
</script> 

</head>

<body <?php body_class(); ?>>
	<div id="panel-container">
		<div id="panel">

		<div class="panel-content">

		
			<div class="column column-1">
				<?php if ( is_active_sidebar( 'first-footer-widget-area' ) ) : ?>
				
					<ul class="xoxo">
						<?php dynamic_sidebar( 'first-footer-widget-area' ); ?>
					</ul>
			
<?php endif; ?>
			</div>

			<div class="column column-2">
				<?php if ( is_active_sidebar( 'second-footer-widget-area' ) ) : ?>
				
					<ul class="xoxo">
						<?php dynamic_sidebar( 'second-footer-widget-area' ); ?>
					</ul>
			
<?php endif; ?>

			</div>
			<div class="column column-3">
				<h3  class="widget-title">More Info</h3>
				<?php wp_nav_menu(array('menu' => 'Info')); ?>
			</div>

		
		</div>
		</div>
		<div class="tab">
			<div id="toggle" class="slide">
				<a id="open" class="open" title="Open panel">Open &nbsp;<span class="arrow">&darr;</span></a> <a id="close" style="display: none;" class="close" title="Close panel">Close &nbsp;<span class="arrow">&uarr;</span></a>

			</div>
		</div>
	</div>
<div id="outer_wrapper">
<div id="wrapper" class="hfeed">
	<div id="header">
		<div id="masthead">
			<div id="branding" role="banner">
				<?php $heading_tag = ( is_home() || is_front_page() ) ? 'h1' : 'div'; ?>
				<<?php echo $heading_tag; ?> id="site-title">
					<!--
<span>
						<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
					</span>
-->
				</<?php echo $heading_tag; ?>>
				<div id="site-description"><?php bloginfo( 'description' ); ?></div>
			</div><!-- #branding -->

		<!--
	<div id="access" role="navigation">
			  <?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff */ ?>
				<div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentyten' ); ?>"><?php _e( 'Skip to content', 'twentyten' ); ?></a></div>
				<?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu.  The menu assiged to the primary position is the one used.  If none is assigned, the menu with the lowest ID is used.  */ ?>
				<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>
			</div><!-- #access -->
-->
		</div><!-- #masthead -->
	</div><!-- #header -->

	<div id="main">
