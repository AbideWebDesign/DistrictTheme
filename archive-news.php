<?php
/**
 * The template for displaying news archive page
 *
 * @package WordPress
 * @subpackage CSD
 * @since CSD 1.0
 */

get_header(); 

$args = array( 
	'post_type' => 'news', 
	'posts_per_page' => '3', 
	'tax_query' => array(
		array(
			'taxonomy' => 'news-category',
			'field'    => 'slug',
			'terms'    => 'featured',
		),
	),
);

$excluded_post_ids = array();

?>

<div class="bg-primary py-3">
	<div class="container">
		<div class="row justify-content-between">
			<div class="col-12 col-lg-auto text-center text-lg-left mb-1 mb-lg-0">
				<h1 class='mb-0 text-white'>District News</h1>
			</div>
			<div class="col text-center text-lg-right">
				<a href="https://csd509j.us2.list-manage.com/subscribe?u=018348dc6e5df65c071cb232d&id=e96b4b4c88" target="_blank" class="btn btn-light btn-sm"><i class="fas fa-rss"></i> Subscribe</a>
			</div>
		</div>
	</div>
</div>
<div id="primary" class="content-area py-2">
	<div class="container">
		<div class="row no-gutters">
			<div class="col-lg-6">
				<div class="headline mb-2">
					<h2>Featured News</h2>
				</div>
				<div class="news-list-featured bg-gray p-1 mb-2 mb-lg-0">
					
					<?php 
					
					$the_query = new WP_Query( $args ); 
					
					if ( $the_query->have_posts() ): 
					
					?>
						
						<div class="row">
							
							<?php 
								
							while ( $the_query->have_posts() ) : $the_query->the_post(); 
						
								$excluded_post_ids[] = $post->ID;
								
								if ( get_field('featured_img', $post->ID) ):
									
									$imageID = get_field('featured_img', $post->ID);
									$imageURL = wp_get_attachment_url($imageID);
								
								else:
									
									// For legacy images added by ACF-Crop
									if ( is_array( get_field('featured_image') ) ):
										
										$image = get_field('featured_image');
										$imageID = $image['id'];
										$imageURL = $image['url'];
									
									else: 
									
										$imageID = get_string_between(get_field('featured_image', $post->ID), '"cropped_image":', '}');
										$imageURL = wp_get_attachment_url($imageID);
									
									endif;					
								
								endif;

								?>
								
								<div class="col-12 mb-1">
									<div class="bg-white">
										<div class="row">
											<div class="col-md-4 col-lg-12">
												<div class="d-none d-md-flex d-lg-none h-100" style="background-image:url(<?php echo $imageURL; ?>); background-size: cover"></div>
												<div class="d-block d-md-none d-lg-block">
													<a href="<?php the_permalink(); ?>">
														<?php echo wp_get_attachment_image($imageID, 'News Image Featured', 0, array('class' => 'img-fluid w-100')); ?>
													</a>
												</div>
											</div>
											<div class="col-md-8 col-lg-12">
												<div class="p-2 p-md-0 py-md-2 p-lg-2">
													<small class="text-primary"><strong>Featured</strong></small>
													<h2 class="mb-1"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
													<p class="mb-0"><?php the_field('featured_text', $post->ID); ?></p>
												</div>
											</div>
										</div>
									</div>
								</div>
							
							<?php endwhile; ?>
							
						</div>
						
						<?php wp_reset_postdata(); ?>
						
					<?php endif; ?>
					
				</div>
			</div>
			<div class="col-lg-6">		
				<div class="news-list h-100 pl-lg-2">	
					<div class="headline mb-2">
						<h2>More News</h2>
					</div>

					<?php 

					if ( have_posts() ):
						
						// Start the Loop.
						while ( have_posts() ): 
							
							the_post(); 

							if ( !in_array($post->ID, $excluded_post_ids) ):
								
								get_template_part( 'template-parts/content', 'news-archive' ); 		
							
							endif;
								
						endwhile;
						// End the loop.
					
					?>
					
					<div class="btn-container">
						
						<?php next_posts_link( '<span class="btn btn-primary d-block d-sm-inline">More News</span>', $the_query->max_num_pages ); ?>
					
					</div>
					
					<?php wp_reset_postdata(); ?>
				
				</div>
			</div>
		</div>		
			
		<?php endif; ?>
		
	</div>
</div>

<?php get_footer(); ?>