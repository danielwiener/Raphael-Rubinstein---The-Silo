<?php while ( have_posts() ) : the_post(); ?>
<div id="post-<?php the_ID(); ?>" <?php post_class() ?>>
<h2 class="toc_title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">	<?php 
		if	(get_post_meta($post->ID, "First Name", $single = true) != "") : ?>
		<?php echo get_post_meta($post->ID, "First Name", $single = true) . ' ' ;
		endif; ?><?php the_title(); ?></a></h2>


<div class="entry-summary">
<?php if(has_post_thumbnail()): ?>
<a href="<?php the_permalink(); ?>">
<?php the_post_thumbnail('thumbnail',  array('class' => 'alignleft', 'title' => trim(strip_tags($post->post_title)), 'alt' => trim(strip_tags($post->post_title))));?></a>
<?php endif; ?><?php the_excerpt(); ?>
	
</div><!-- .entry-summary -->


<div class="entry-utility">
</div><!-- .entry-utility -->
</div><!-- #post-## -->
<?php endwhile; ?>