<?php
/*
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 * @author a very stripped down child theme of Twenty Ten by Daniel Wiener http:danielwiener.com
 * @attribution drop down panel based on panel on http://themehybrid.com/ by Justin Tadlock. 
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	

	// Add the blog name.
	bloginfo( 'name' );
	echo ' by Raphael Rubinstein ';
	wp_title( '|', true, 'left' );
	

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<?php wp_enqueue_script('jquery'); ?> 
<?php wp_head(); ?>
<!-- @attribution - drop down panel based on panel on http://themehybrid.com/ by Justin Tadlock. -->


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

		
			<div class="column column-1"><ul class="xoxo">
				<li id="recent_additions" class="widget-container widget_archive"><h3 class="widget-title">Recent Additions</h3>				
					<ul>
					
						<?php 
						$query = New WP_Query(array('showposts' => 7,
						'nopaging' => 0,
						'post_status' => 'publish',
						'caller_get_posts' => 1,
						'orderby' => 'modified'
						));
						
						if( $query->have_posts() ) :
							while ( $query->have_posts() ) : $query->the_post() ?>
							<li><a href="<?php the_permalink() ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>"><?php
								if (get_post_meta($post->ID, "First Name", $single = true) != "") : ?>
													<?php echo get_post_meta($post->ID, "First Name", $single = true) . ' ' ;?><?php endif; ?>
								<?php the_title();  	?></a></li>
					<?php endwhile;
					endif;
					wp_reset_query();
					?>
					</ul>
					</ul>
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
	
	<div id="main">
