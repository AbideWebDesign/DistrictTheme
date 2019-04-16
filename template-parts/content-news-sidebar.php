<?php 
	$id = get_the_ID();
	$args = array( 'post_type' => 'news', 'posts_per_page' => '5', 'post__not_in' => array($id) );
	$loop = new WP_Query( $args );
?>
<div class="bg-gray p-1">
	<h3 class="mb-1">Featured News</h3>
	<div class="news-sidebar-content">
		<ul class="list-unstyled">
		<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
			<?php $image = get_field('featured_image', $post->ID); ?>
				
				<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
			
		<?php endwhile; ?>
		<?php wp_reset_query(); ?>		
		</ul>
	</div>
</div>

