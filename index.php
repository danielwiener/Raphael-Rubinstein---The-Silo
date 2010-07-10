<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query. 
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>

		<div id="container">
			<div id="content" role="main">
			<?php
			/* Run the loop to output the posts.
			 * If you want to overload this in a child theme then include a file
			 * called loop-index.php and that will be used instead.
			 */
			 if(is_front_page()) : ?>
			 <?php query_posts(array('orderby' => 'title',
			 'order' => 'ASC',
			 'posts_per_page' => -1)); ?>
			 <?php while ( have_posts() ) : the_post(); ?>
			 
			 <?php $get_firstname =  get_post_meta($post->ID, 'First Name', true); 
			?>
			 <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php echo $get_firstname . ' ' . $post->post_title;  ?></a></h2>
			</div> <!-- end post id div -->
			<?php endwhile; ?>
			<?php else: 
			 
			 get_template_part( 'loop', 'index' );
			?>
			<?php endif; ?>
			</div><!-- #content -->
		</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
