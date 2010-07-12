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
 * this is for testing git
 */

get_header(); ?>

		<div id="container">
			<div id="content_fullpage" role="main">
			<?php
			/* Run the loop to output the posts.
			 * If you want to overload this in a child theme then include a file
			 * called loop-index.php and that will be used instead.
			 * DW for the front names get the names (title) and first names of the artists, and put them in columns.
			 */
			 if(is_front_page()) : ?>
			 <?php
			 $count_posts = wp_count_posts();
			 $published_posts = $count_posts->publish;
			 $columns = 3;
			 $real_posts_per_column = $published_posts/$columns;
			 $posts_per_column = round($published_posts/$columns); 
			 $total_posts_divisible_by_columns = $columns * $posts_per_column;
			 query_posts(array('orderby' => 'title',
			 'order' => 'ASC',
			 'posts_per_page' => -1)); ?>
			 <?php $count = 1; ?>
			 <div class="column">
			 <?php while ( have_posts() ) : the_post(); ?>
			 
			 <?php $get_firstname =  get_post_meta($post->ID, 'First Name', true); ?>
			 <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			 
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php echo $get_firstname . ' ' . $post->post_title; ?></a></h2>
			</div> <!-- end post id div -->
			<?php if ($count % $posts_per_column == 0 && $count < $total_posts_divisible_by_columns) { 
			 echo '</div><div class="column">';
			 } ?>
			<?php $count++; ?>
			<?php endwhile; ?>
			</div>
			<?php else: 
			 
			 get_template_part( 'loop', 'index' );
			?>
			<?php endif; ?>
			</div><!-- #content -->
		</div><!-- #container -->

<?php /* get_sidebar(); */ ?>
<?php get_footer(); ?>
