<?php
/**
 * Template Name: Home
 *
 * @package WordPress
 * @subpackage CSD
 * @since CSD 1.0
 */

get_header(); ?>
<div id="content" role="main" tabindex="0">
	<!-- Carousel Section Start -->
	<section class="carousel-wrap mb-0">
		<div id="carousel" class="carousel slide" data-ride="carousel">
		
		<?php $images = get_field('carousel_images'); ?>

			<?php if ( $images ): ?>
			
				<!-- Indicators -->
				<ol class="carousel-indicators">
					
					<?php for ( $i = 0; $i < count($images); ++$i ): ?>
					
							<li data-target="#carousel" data-slide-to="<?php echo $i; ?>" <?php if ($i == 0): ?>class="active"<?php endif; ?>></li>
					
					<?php endfor; ?>
				
				</ol>
				
				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">
					
					<?php $x = 0; ?>
					
					<?php foreach( $images as $image ): ?>
						
						<div class="carousel-item <?php if ($x == 0): ?>active<?php endif; ?>">
							
							<?php if ( get_field('link', $image['id']) ): ?>
							
								<?php $link = get_field('link', $image['id']); ?>
							
								<a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>" class="headline-link">
							
							<?php endif; ?>
					  		
					  		<?php echo wp_get_attachment_image( $image['id'], 'Home Slider', false, array('class'=>'d-block w-100 img-fluid') ); ?>
					  		
					  		<?php if ( $image['title'] || $image['caption'] ): ?>
						  	
						  		<div class="carousel-caption">
							  		<div class="carousel-title">
							  			<h3><?php echo $image['title']; ?></h3>
							  		</div>
							
							  		<?php if ( $image['caption'] ): ?>
							
								  		<div class="carousel-caption-bg">
						  					<p><?php echo $image['caption']; ?></p>
						  				</div>
						  			
						  			<?php endif; ?>
						  	
						  		</div>
						  	
						  	<?php endif; ?>
					  		
					  		<?php if ( get_field('link', $image['id']) ): ?>
								
								</a>
							
							<?php endif; ?>
						
						</div>
					
						<?php $x ++; ?>
					
					<?php endforeach; ?>
					
				</div>
				<a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only"><?php _e('Previous'); ?></span>
				</a>
				<a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only"><?php _e('Next'); ?></span>
				</a>
								
			<?php endif; ?>
			
		</div>
	</section>
	<!-- Carousel Section End -->
	<!-- Quick Links Start -->
	<section class="py-2 border-bottom bg-light">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12 col-md-3 col-xl-auto mb-1 mb-md-0">
					<?php $link = get_field('quick_link_1', 'options'); ?>
					<a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>" class="btn-quick btn-quick-1"><?php echo wp_get_attachment_image( get_field('quick_link_icon_1', 'options'), 'thumbnail', false, array('class'=>'img-quick-icon img-fluid') ); ?> <?php echo $link['title']; ?></a>
				</div>
				<div class="col-12 col-md-3 col-xl-auto mb-1 mb-md-0">
					<?php $link = get_field('quick_link_2', 'options'); ?>
					<a href="<?php echo $link['url']; ?>" target="<?php echo $link2['target']; ?>" class="btn-quick btn-quick-2"><?php echo wp_get_attachment_image( get_field('quick_link_icon_2', 'options'), 'thumbnail', false, array('class'=>'img-quick-icon img-fluid') ); ?> <?php echo $link['title']; ?></a>
				</div>
				<div class="col-12 col-md-3 col-xl-auto mb-1 mb-md-0">
					<?php $link = get_field('quick_link_3', 'options'); ?>
					<a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>" class="btn-quick btn-quick-3"><?php echo wp_get_attachment_image( get_field('quick_link_icon_3', 'options'), 'thumbnail', false, array('class'=>'img-quick-icon img-fluid') ); ?> <?php echo $link['title']; ?></a>
				</div>
				<div class="col-12 col-md-3 col-xl-auto">
					<?php $link = get_field('quick_link_4', 'options'); ?>
					<a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>" class="btn-quick btn-quick-4"><?php echo wp_get_attachment_image( get_field('quick_link_icon_4', 'options'), 'thumbnail', false, array('class'=>'img-quick-icon img-fluid') ); ?> <?php echo $link['title']; ?></a>
				</div>
			</div>
		</div>
	</section>
	<!-- Quick Links End -->
	<!-- News Section Start -->
	<section id="news" class="container py-3">
		<div class="row">
			<div class="col-12 col-lg-8">
				<div class="headline">
					<h2><?php _e('Latest News'); ?></h2>
				</div>
				<div class="row">
				
				<?php 
				
				$args = array( 
					'post_type' => 'news', 
					'posts_per_page' => '2', 
					'tax_query' => array(
						array(
							'taxonomy' => 'news-category',
							'field'    => 'slug',
							'terms'    => 'featured',
						),
					), 
				);

				$loop = new WP_Query( $args );
				
				$featured_ids = array();

 				while ( $loop->have_posts() ) : $loop->the_post();
					
					$featured_ids[] = $post->ID;
					
					if ( get_field('featured_img', $post->ID) ) {
						
						$image = get_field('featured_img', $post->ID);
						
					} else {
						
						// For legacy images add with ACF-Crop
						$crop = get_field('featured_image', $post->ID);
						$image = $crop['original_image'];
					}
					
				?>
				
					<div class="col-12 col-md-6 col-xl-4 news-item">
						<div class="row">
							<div class="col-3 col-md-12 pb-1 news-img">
								<a href="<?php the_permalink(); ?>">
									<?php echo wp_get_attachment_image($image['id'], 'News Image Medium', 0, array('class' => 'img-fluid w-100')); ?>
								</a>
							</div>
							<div class="col-9 col-md-12 news-content">
								<h4>
									<a href="<?php the_permalink(); ?>">
										<?php the_title(); ?>
									</a>
								</h4>
								
								<?php the_field('featured_text', $post->ID); ?>
								
							</div>
						</div>
					</div> 
					
		 			<?php 
		 			
		 			endwhile; 
		 			
		 			wp_reset_query(); 
		 			
		 			?>
	 				
	 				<div id="news-more" class="col-12 col-xl-4 mt-2 mt-xl-0">
	 					<div class="subhead">
	 						<h5><?php _e('More Headlines'); ?></h5>
	 					</div>
	 					<ul class="fa-ul">
	 					
	 					<?php 

						$args = array(
							'post_type' => 'news', 
							'posts_per_page' => 5,  
							'post__not_in' => $featured_ids
						);
						
						$loop = new WP_Query( $args );

						while ( $loop->have_posts() ) : $loop->the_post();
							if ( get_field('news_post_source', $post->ID ) == 'External' ):
								$link = get_field('external_news_link', $post->ID );
							else: 
								$link = get_permalink();
							endif;
						?>
							<li><span class="fa-li" ><i class="fas fa-chevron-right fa-xs"></i></span>
								<a href="<?php echo $link; ?>" <?php if ( get_field('news_post_source', $post->ID) == 'External' ): ?> target="_blank" <?php endif; ?>><?php the_title(); ?></a>
							</li>
						
						<?php endwhile; wp_reset_query();?>
						
						</ul>
						<small><a href="<?php home_url(); ?>/news"><?php _e('More News'); ?></a></small>	
	 				</div>
	 			</div>
 			</div>
 			<div class="col-12 col-lg-4">
 				<div class="calendar">
 					<div class="headline">
 						<h2><?php _e('Calendar'); ?></h2>
 					</div>
					
					<?php render_list_view_district(); ?>
					<div class="mt-1">
						<small><a href="<?php home_url(); ?>/calendar"><?php _e('More Events'); ?></a></small>
					</div>
				</div>
 			</div>			
		</div>
	</section>
	<!-- News Section End -->
	<!-- Social Section Start -->
	<section id="social" class="bg-gray py-2">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-12 col-lg-9 col-xl-10">
					<div class="row">
						<div class="col-md-3 col-lg-3 order-2 order-md-1 mt-2 mt-md-0 align-self-center">
							<a href="https://twitter.com/intent/user?screen_name=SuptNoss" target="_blank" id="twitter-id-link" >
								<div class="well d-flex justify-content-center">
									<div class="d-flex align-self-stretch align-items-center"><i class="fab fa-twitter fa-1x"></i></div>
									<div id="twitter-id" class="d-flex">@SuptNoss</div>
								</div>
							</a>
							<div id="socialbtns" class="d-block d-lg-none mt-1 text-center text-md-left">
								<a href="https://www.twitter.com/SuptNoss" target="_blank" class="social">
									<i class="fab fa-twitter-square fa-2x social"></i> 
								</a>
								<a href="https://www.facebook.com/csd509j" target="_blank" class="social">
									<i class="fab fa-facebook-square fa-2x"></i>
								</a> 
								<a href="https://www.linkedin.com/company/corvallis-school-district-509j" target="_blank" class="social">
									<i class="fab fa-linkedin-square fa-2x social"></i>
								</a>
							</div>
						</div>
						<div class="col-md-9 col-lg-9">
							
							<?php $tweets = getTweets(1); ?>
							
							<div id="tweet">
								
								<?php echo $tweets[0]['text']; ?>
								
								<div id="tweet-meta">
									<a href="https://twitter.com/SuptNoss/status/<?php echo $tweets[0]['id'] ?>" target="_blank">
										<?php echo '<span>'.humanTiming(strtotime($tweets[0]['created_at'])) . ' ago</span>'; ?>
									</a> /
									<a href="https://twitter.com/intent/retweet?tweet_id=<?php echo $tweets[0]['id'] ?>"><?php _e('Retweet'); ?></a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div id="socialbtns" class="col-lg-3 col-xl-2 d-none d-lg-block">
					<a href="https://www.twitter.com/SuptNoss" target="_blank" class="social">
						<i class="fab fa-twitter-square fa-3x social"></i> 
					</a>
					<a href="https://www.facebook.com/csd509j" target="_blank" class="social">
						<i class="fab fa-facebook-square fa-3x"></i>
					</a> 
					<a href="https://www.linkedin.com/company/corvallis-school-district-509j" target="_blank" class="social">
						<i class="fab fa-linkedin-square fa-3x social"></i>
					</a>
				</div>
			</div>
		</div>
	</section>
	<!-- Social Section End -->
	<!-- Quick Links Section Start -->
	<section class="py-3">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-lg-4 mb-2 mb-lg-0">
					<?php $link = get_field('link_1'); ?>
					<?php $image = wp_get_attachment_image_src( get_field('link_image_1'), 'Large', false ); ?>
					<a href="<?php echo $link['url']; ?>" class="stretched-link" target="<?php echo $link['target']; ?>">
						<div class="bg-light-blue">
							<div class="row">
								<div class="col-lg-12 align-self-center d-md-none d-lg-block">
									<?php echo wp_get_attachment_image( get_field('link_image_1'), 'News Image Medium', false, array('class' => 'img-fluid w-100') ); ?>
								</div>
								<div class="col-sm-6 d-lg-none">
									<div class="h-100 w-100" style="background: url(<?php echo $image[0]; ?>) center center no-repeat; background-size: cover"></div>
								</div>
								<div class="col-sm-6 col-lg-12">
									<div class="p-2 text-lg-center text-white">
										<h2 class="small text-white mb-1"><?php echo $link['title']; ?></h2>
										<p class="mb-0 text-xs"><?php the_field('link_1_text'); ?></p>
									</div>
								</div>
							</div>
						</div>
					</a>
				</div>
				<div class="col-sm-6 col-lg-4 align-self-stretch mb-2 mb-md-0">
					<?php $link = get_field('link_2'); ?>
					<?php $image = wp_get_attachment_image_src( get_field('link_image_2'), 'Large', false ); ?>
					<a href="<?php echo $link['url']; ?>" class="stretched-link" target="<?php echo $link['target']; ?>">
						<div class="d-flex h-100 quick-link-wrap" style="background: url(<?php echo $image[0]; ?>) center center no-repeat; background-size: cover">
							<div class="p-2 text-center text-white d-flex justify-content-center align-self-end bg-green w-100">
								<h2 class="small text-white mb-0"><?php echo $link['title']; ?></h2>
							</div>
						</div>
					</a>
				</div>
				<div class="col-sm-6 col-lg-4 align-self-stretch">
					<?php $link = get_field('link_3'); ?>
					<?php $image = wp_get_attachment_image_src( get_field('link_image_3'), 'Large', false ); ?>
					<a href="<?php echo $link['url']; ?>" class="stretched-link" target="<?php echo $link['target']; ?>">
						<div class="d-flex h-100 quick-link-wrap" style="background: url(<?php echo $image[0]; ?>) center center no-repeat; background-size: cover">
							<div class="p-2 text-center text-white d-flex justify-content-center align-self-end bg-dark-gray w-100">
								<h2 class="small text-white mb-0"><?php echo $link['title']; ?></h2>
							</div>
						</div>
					</a>
				</div>
			</div>
		</div>
	</section>
	<!-- Quick Links Section End -->
	<!-- CTA Section Start -->
	<section id="cta" class="bg-orange text-white py-3 py-md-0">
		<div class="container">
			<div class="row">
				<div class="col-md-7">
					<div id="cta-text" class="py-md-3 mb-2 mb-md-0">
						<h1 class="text-white strong mb-1"><?php the_field('cta_title'); ?></h1>
						<?php the_field('cta_text'); ?>
					</div>
				</div>
				<div id="cta-form-wrap" class="col-md-5">
					<div id="cta-form" class="d-flex h-100">
						<div class="embed-responsive embed-responsive-16by9 d-flex align-self-center">
							<iframe class="embed-responsive-item" src="<?php the_field('cta_video'); ?>"></iframe>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- CTA Section End -->
	<!-- Community Section Start -->
	<?php 
		
		if (get_field('community_events_img')) {
			
			$events_image = get_field('community_events_img');
			
		} else {
			
			// For legacy images add by ACF-Crop
			$crop = get_field('community_events_image');
			$events_image = $crop['original_image'];
			
		}
			
	?>
	<section id="community" class="py-3">
		<div class="container">
			<div class="row align-items-center">
				<div class="d-none d-lg-block col-lg-3">
					<?php echo wp_get_attachment_image($events_image['id'], 'Square Column 4', false, array('class'=>'img-fluid mb-1 mb-md-0')); ?>
				</div>
				<div class="col-lg-9">
					<div class="headline">
						<h2><?php the_field('community_events_title'); ?></h2>
					</div>
					<p><?php the_field('community_events_text'); ?></p>
					<a href="<?php the_field('community_events_link'); ?>" class="btn btn-primary"><i class="fas fa-calendar-alt"></i> <?php the_field('community_events_link_text'); ?></a>
				</div>
			</div>
		</div>
	</section>
	<!-- Community Section End -->
</div>
<?php get_footer(); ?>