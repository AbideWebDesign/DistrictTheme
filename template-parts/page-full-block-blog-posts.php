<?php 
	
	$tax = get_sub_field('post_list_category'); 

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

	$query = new WP_Query( $args );

?>

<div class="container">

	<div class="row">

		<div class="col-12">
													
			<h2 class="headline"><?php _e('Latest News', 'csd'); ?></h2>
						
		</div>

	</div>

</div>

<div class="pb-2">

	<div class="container">

		<div id="posts-block" class="bg-white shadow-sm rounded p-1">

			<div class="row">

				<?php while( $query->have_posts() ): $query->the_post(); ?>

					<div class="col-lg-4 mb-1 mb-lg-0">

						<div class="row no-gutters h-100">

							<div class="col-12 h-100">
								
								<div class="h-100">
																													
									<div class="row h-100">
									
										<?php if ( get_field('featured_img') ): ?>
											
											<?php $image = get_field('featured_img'); ?>
											
											<div class="col-12 col-sm-4 col-lg-12">
				
												<div class="posts-image border">
				
													<a href="<?php the_permalink(); ?>"><?php echo wp_get_attachment_image( $image, 'News Image Medium', false, array( 'class' => 'img-fluid img-block' ) ); ?></a>
				
												</div>
				
											</div>
											
										<?php endif; ?>
			
										<div class="col-12 col-sm-8 col-lg-12">
											
											<a href="<?php the_permalink(); ?>" class="stretched-link">
												
												<div class="posts-content h-100 d-flex">
				
													<div class="posts-content-heading text-center">
				
														<?php the_title(); ?>
				
														<div class="small"><?php the_date(); ?></div>
				
													</div>
				
													<?php the_excerpt(); ?>
				
												</div>
												
											</a>
			
										</div>
										
									</div>
																													
								</div>
								
							</div>

						</div>

					</div>

				<?php endwhile; ?>

				<?php wp_reset_postdata(); ?>

			</div>

		</div>

	</div>

</div>