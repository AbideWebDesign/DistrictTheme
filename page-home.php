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
	<section class="carousel-wrap margin-bottom-one">
		<div id="carousel" class="carousel slide" data-ride="carousel">
		
		<?php 

			$images = get_field('carousel_images');

			if( $images ): ?>
			
				<!-- Indicators -->
				<ol class="carousel-indicators">
					<?php for($i = 0; $i < count($images); ++$i){ ?>
							<li data-target="#carousel" data-slide-to="<?php echo $i; ?>" <?php if ($i == 0): ?>class="active"<?php endif; ?>></li>
					<?php } ?>
				</ol>
				
				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">
					<?php 
					
					$x = 0;	
					
					foreach( $images as $image ): ?>
						
						<div class="item <?php if ($x == 0): ?>active<?php endif; ?>">
							<?php if (get_field('link', $image['id'])): ?>
								<a href="<?php the_field('link', $image['id']); ?>" class="headline-link">
							<?php endif; ?>
					  		<?php echo wp_get_attachment_image($image['id'], 'Home Slider', false); ?>
					  		<div class="carousel-caption">
						  		<div class="carousel-title">
						  			<h3><?php echo $image['title']; ?></h3>
						  		</div>
						  		<?php if ($image['caption']): ?>
						  		<div class="carousel-caption-bg">
					  				<p><?php echo $image['caption']; ?></p>
					  			</div>
					  			<?php endif; ?>
					  		</div>
					  		<?php if (get_field('link', $image['id'])): ?>
								</a>
							<?php endif; ?>
						</div>
					<?php 
					
					$x ++;
					
					endforeach; ?>
					
				</div>
				<!-- Controls -->
				<a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#carousel" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
				
			<?php endif; ?>
		</div>
	</section>
	<!-- Carousel Section End -->
	<!-- News Section Start -->
	<section id="news" class="container padding-top-one padding-bottom-four">
		<div class="row">
			<div class="col-sm-8 col-xs-12">
				<div class="headline">
					<h2>Latest News</h2>
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
					$image = get_field('featured_image', $post->ID);
					
				?>
				
					<div class="col-md-4 col-sm-6 col-xs-12 news-item">
						<div class="row">
							<div class="col-sm-12 col-xs-3 padding-bottom-one news-img">
								<a href="<?php the_permalink(); ?>">
									<?php echo wp_get_attachment_image($image['id'], 'News Image Small', 0, array('class' => 'img img-responsive')); ?>
								</a>
							</div>
							<div class="col-sm-12 col-xs-9 news-content">
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
	 				
	 				<div id="news-more" class="col-md-4 col-sm-12">
	 					<div class="subhead">
	 						<h5>More Headlines</h5>
	 					</div>
	 					<ul>
	 					
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
							<li>
								<a href="<?php echo $link; ?>" <?php if ( get_field('news_post_source', $post->ID) == 'External' ): ?> target="_blank" <?php endif; ?>><?php the_title(); ?></a>
							</li>
						
						<?php endwhile; wp_reset_query();?>
						
						</ul>
						<small><a href="<?php home_url(); ?>/news">More News</a></small>	
	 				</div>
	 			</div>
 			</div>
 			<div class="col-md-4 col-sm-4 col-xs-12">
 				<div class="calendar">
 					<div class="headline">
 						<h2>Calendar</h2>
 					</div>
					
					<?php render_list_view_district(); ?>
					<div class="margin-top-one">
						<small><a href="<?php home_url(); ?>/calendar">More Events</a></small>
					</div>
				</div>
 			</div>			
		</div>
	</section>
	<!-- News Section End -->
	<!-- Social Section Start -->
	<section id="social" class="bg-gray padding-vertical-two">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-10">
					<div class="row">
						<div class="col-sm-4 col-md-2">
							<a href="https://twitter.com/intent/user?screen_name=SuptNoss" target="_blank" id="twitter-id-link" >
								<div class="well">
									<div class="pull-left"><i class="fa fa-twitter fa-1x"></i></div>
									<div id="twitter-id">@SuptNoss</div>
								</div>
							</a>
						</div>
						<div class="col-sm-8 col-md-10">
							<?php
								$tweets = getTweets(1);	
							?>
							<p id="tweet">
								<?php echo $tweets[0]['text']; ?>
								<span id="tweet-meta">
									<a href="https://twitter.com/SuptNoss/status/<?php echo $tweets[0]['id'] ?>" target="_blank">
										<?php echo '<span>'.humanTiming(strtotime($tweets[0]['created_at'])) . ' ago</span>'; ?>
									</a> /
									<a href="https://twitter.com/intent/retweet?tweet_id=<?php echo $tweets[0]['id'] ?>">Retweet</a>
								</span>
							</p>
						</div>
					</div>
				</div>
				<div id="socialbtns" class="col-sm-12 col-md-2">
					<a href="https://www.twitter.com/SuptNoss" target="_blank" class="social">
						<i class="fa fa-twitter-square fa-3x social"></i> 
					</a>
					<a href="https://www.facebook.com/csd509j" target="_blank" class="social">
						<i class="fa fa-facebook-square fa-3x"></i>
					</a> 
					<a href="https://www.linkedin.com/company/corvallis-school-district-509j" target="_blank" class="social">
						<i class="fa fa-linkedin-square fa-3x social"></i>
					</a>
				</div>
			</div>
		</div>
	</section>
	<!-- Social Section End -->
	<!-- Quick Links Section Start -->
	<section id="quick-links" class="padding-vertical-four">
		<div class="container">
			<div class="row">
				<div id="quick-links" class="col-sm-4 col-md-3">
					<div class="headline">
						<h2>Quick Links</h2>
					</div>
					<?php for( $x = 1; $x < 5; $x++ ): ?>
						<div class="quick-link"> 
							<?php if ( get_field('home_quick_link_' . $x . '_type') == "External Link" ): ?>
								<a href="<?php the_field('home_quick_link_' . $x . '_link'); ?>" target="_blank" class="btn-quick-<?php echo $x; ?>">
							<?php elseif ( get_field('home_quick_link_' . $x . '_type') == "Media File" ): ?>
								<a href="<?php the_field('home_quick_link_' . $x . '_media'); ?>" target="_blank" class="btn-quick-<?php echo $x; ?>">
							<?php elseif ( get_field('home_quick_link_' . $x . '_type') == "Page" ): ?>
								<a href="<?php the_field('home_quick_link_' . $x . '_page'); ?>" class="btn-quick-<?php echo $x; ?>">
							<?php endif; ?>
								<h4><?php the_field('home_quick_link_' . $x . '_text'); ?></h4>
							</a>
						</div>
					<?php endfor; ?>			
				</div>
				<div id="message" class="col-sm-8 col-md-9">
					<div class="headline">
						<h2>Superintendent’s Message</h2>
					</div>
					<div class="row">
					<?php 

					$args = array( 
						'post_type' => 'news', 
						'posts_per_page' => '1', 
						'tax_query' => array(
							array(
								'taxonomy' => 'news-category',
								'field'    => 'slug',
								'terms'    => 'superintendent-message',
							),
						),
					);
					
					$loop = new WP_Query( $args );
					
					while ( $loop->have_posts() ) : $loop->the_post();
						
						$image = get_field('featured_image', $post->ID);

					?>
						<div class="col-sm-4 col-md-6">
							<a href="<?php the_permalink(); ?>">
								<?php echo wp_get_attachment_image($image['id'], 'News Image Medium', 0, array('class' => 'img img-responsive')); ?>
							</a>
						</div>
						<div class="col-sm-8 col-md-6">
							<div class="subhead">
	 							<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
	 						</div>
							<?php the_field('featured_text_long', $post->ID); ?>
							<small><a href="<?php the_permalink(); ?>">Read More</a></small>
						</div>
					<?php endwhile; wp_reset_query();?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Quick Links Section End -->
	<!-- CTA Section Start -->
	<section id="cta" class="bg-orange text-white">
		<div class="container">
			<div class="row">
				<div class="col-sm-7">
					<div id="cta-text" class="padding-vertical-four">
						<h1 class="text-white strong margin-bottom-one"><?php the_field('cta_title'); ?></h1>
						<?php the_field('cta_text'); ?>
					</div>
				</div>
				<div id="cta-form-wrap" class="col-sm-5">
					<div id="cta-form" class="padding-vertical-four clearfix">
						<div class="embed-responsive embed-responsive-16by9">
							<iframe class="embed-responsive-item" src="<?php the_field('cta_video'); ?>"></iframe>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- CTA Section End -->
	<!-- Community Section Start -->
	<section id="commiunity" class="padding-vertical-four">
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
					<img src="<?php the_field('community_events_image'); ?>" class="img-responsive margin-bottom-xs-one" />
				</div>
				<div class="col-sm-8">
					<div class="headline">
						<h2><?php the_field('community_events_title'); ?></h2>
					</div>
					<p><?php the_field('community_events_text'); ?></p>
					<a href="<?php the_field('community_events_link'); ?>" class="btn btn-primary"><i class="fa fa-calendar"></i> <?php the_field('community_events_link_text'); ?></a>
				</div>
			</div>
		</div>
	</section>
	<!-- Community Section End -->
</div>
<?php get_footer(); ?>