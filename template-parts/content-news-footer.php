<div class="row pd-2">
	<div class="col-12">
		<div class="headline">
			<h3>Featured News</h3>
		</div>
	</div>
</div>
<div class="row">

	<?php 
	$id = get_the_ID();
	$args = array( 'post_type' => 'news', 'posts_per_page' => '3', 'category_name' => 'Featured', 'post__not_in' => array($id)  );
	$loop = new WP_Query( $args );
	
	while ( $loop->have_posts() ) : $loop->the_post();
		
		$image = get_field('featured_image', $post->ID); ?>
			
			<div class="col-sm-4">
				<div class="row">
					<div class="col-5 col-sm-12 pb-1 news-img">
						<a href="<?php the_permalink(); ?>">
							<?php echo wp_get_attachment_image($image['id'], 'News Image Small', 0, array('class' => 'img img-fluid')); ?>
						</a>
					</div>
					<div class="col-7 col-sm-12 news-content">
						<h4>
							<a href="<?php the_permalink(); ?>">
								<?php the_title(); ?>
							</a>
						</h4>
					</div> 
				</div>
			</div>
			
	<?php endwhile; wp_reset_query(); ?>		
	
</div>
