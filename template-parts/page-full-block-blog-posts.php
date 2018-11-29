<?php $tax = get_sub_field('post_list_category'); ?>
<?php 
	global $post;
	$args = array( 
		'post_type' => 'news', 
		'posts_per_page' => 3, 
		'tax_query' => array(
			array(
				'taxonomy' => 'news-category',
				'field'    => 'slug',
				'terms'    => $tax->slug,
			),
		), 
	);
	$query = new WP_Query($args);
?>
<div class="container">
	<div class="row">
		<div class="col-12 mt-2">
			<h2 class="headline"><?php the_sub_field('post_list_heading'); ?></h2>
		</div>
	</div>
</div>
<div class="py-1">
	<div class="container">
		<div id="posts-block">
			<div class="row">
				<?php while($query->have_posts()): $query->the_post(); ?>
					<?php $image = get_field('featured_image'); ?>
					<div class="col-sm-4 mb-xs-1">
						<div class="posts-image">
							<a href="<?php the_permalink(); ?>"><?php echo wp_get_attachment_image($image['id'], 'News Image Medium', false, array('class' => 'img-fluid img-block')); ?></a>
						</div>
						<div class="posts-content">
							<div class="posts-content-heading">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								<div class="small"><?php the_date(); ?></div>
							</div>
							<?php the_excerpt(); ?>
						</div>
					</div>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			</div>
		</div>
	</div>
</div>
