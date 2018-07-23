<?php get_header(); ?>
	<div id="content" role="main" tabindex="0">
		<div id="feature-banner" class="container padding-bottom-two">
			<div class="row">
				<div class="col-sm-12">
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
								<?php foreach( $images as $image ): ?>
									<div class="item active">
								  		<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
								  		<div class="carousel-caption">
									  		<div class="carousel-title">
									  			<h3><?php echo $image['title']; ?></h3>
									  		</div>
									  		<div class="carousel-caption-bg">
								  				<p><?php echo $image['caption']; ?></p>
								  			</div>
								  		</div>
									</div>
								<?php endforeach; ?>
								
							</div>
							
							<!-- Controls -->
							<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
								<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
								<span class="sr-only">Previous</span>
							</a>
							<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
								<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
								<span class="sr-only">Next</span>
							</a>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
		<!-- Featured Banner End -->
		<div id="news" class="container padding-bottom-two">
			<div class="row">
				<div class="col-sm-9 col-xs-12">
					<div class="headline">
						<h2>Latest News</h2>
					</div>
					<div class="row">
					<?php 
						$args = array( 'post_type' => 'news', 'posts_per_page' => '2', 'category_name' => 'Featured' );
						$loop = new WP_Query( $args );
						while ( $loop->have_posts() ) : $loop->the_post();
							$thumb_id = get_post_thumbnail_id();
							$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'large', true);
							$thumb_url = $thumb_url_array[0];
					?>
						<div class="col-sm-4 col-xs-12 news-item">
							<div class="row">
								<div class="col-sm-12 col-xs-3 padding-bottom-one news-img">
									<a href="<?php the_permalink(); ?>">
										<img src="<?php echo esc_url( $thumb_url ); ?>" class="img-responsive" />
									</a>
								</div>
								<div class="col-sm-12 col-xs-9 news-content">
									<h4>
										<a href="<?php the_permalink(); ?>">
											<?php the_title(); ?>
										</a>
									</h4>
									<?php the_excerpt(); ?>
								</div>
							</div>
						</div> 
		 			<?php endwhile; wp_reset_query(); ?>	
		 				<div id="news-more" class="col-sm-4 col-xs-12">
		 					<div class="subhead">
		 						<h5>More Headlines</h5>
		 					</div>
		 					<ul class="padding-bottom-one">
		 					<?php 
								$args = array( 'post_type' => 'news', 'posts_per_page' => 4, 'offset' => -2, );
								$loop = new WP_Query( $args );
								while ( $loop->have_posts() ) : $loop->the_post();
							?>
								<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
							<?php endwhile; wp_reset_query();?>
							</ul>
							<small><a href="#">More News</a></small>	
		 				</div>
		 			</div>
	 			</div>
	 			<div class="col-sm-3 col-xs-12">
	 				<div class="headline">
						<h2>Calendar</h2>
					</div>
	 			</div>			
			</div>
		</div>
		<!-- News/Calendar Section End -->
		<section class="bg-gray padding-vertical-two">
			<div id="social" class="container">
				<div class="row">
					<div class="col-sm-8 col-xs-12">
						<div class="row">
							<div class="col-sm-1">
								<i class="fa fa-twitter fa-2x"></i>
							</div>
							<div class="col-sm-11">
								
							</div>
						</div>
					</div>
					<div id="socialbtns" class="col-sm-4 col-xs-12">
						<i class="fa fa-twitter-square fa-3x social"></i> 
						<a href="https://www.facebook.com/csd509j" target="_blank">
							<i class="fa fa-facebook-square fa-3x social"></i>
						</a> 
						<a href="https://www.linkedin.com/company/corvallis-school-district-509j" target="_blank">
							<i class="fa fa-linkedin-square fa-3x social"></i>
						</a>
					</div>
				</div>
			</div>
		</section>
		<!-- Social Section End -->
		<section class="padding-vertical-two">
			<div class="container">
				<div class="row">
					<div id="quick-links" class="col-sm-3">
						<div class="headline">
							<h2>Quick Links</h2>
						</div>
						<div class="quick-link">
							<?php $type = get_field('quick_link_1_type'); ?>
								<a href="<?php the_field('quick_link_1_'.$type); ?>" class="btn-green">
								<h4><?php the_field('quick_link_1_text'); ?></h4>
							</a>
						</div>
						<div class="quick-link">
							<?php $type = get_field('quick_link_2_type'); ?>
								<a href="<?php the_field('quick_link_2_'.$type); ?>" class="btn-light-blue">
								<h4><?php the_field('quick_link_2_text'); ?></h4>
							</a>
						</div>
						<div class="quick-link">
							<?php $type = get_field('quick_link_3_type'); ?>
								<a href="<?php the_field('quick_link_3_'.$type); ?>" class="btn-orange">
								<h4><?php the_field('quick_link_3_text'); ?></h4>
							</a>
						</div>	
						<div class="quick-link">
							<?php $type = get_field('quick_link_4_type'); ?>
								<a href="<?php the_field('quick_link_4_'.$type); ?>" class="btn-dark-gray">
								<h4><?php the_field('quick_link_4_text'); ?></h4>
							</a>
						</div>					
					</div>
					<div id="message" class="col-sm-9">
						<div class="headline">
							<h2>Superintendent’s Message</h2>
						</div>
						<div class="row">
						<?php 
							$args = array( 'post_type' => 'news', 'posts_per_page' => '1', 'category_name' => 'Superintendent’s Message' );
							$loop = new WP_Query( $args );
							while ( $loop->have_posts() ) : $loop->the_post();
								$thumb_id = get_post_thumbnail_id();
								$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'square', true);
								$thumb_url = $thumb_url_array[0];
						?>
							<div class="col-sm-6">
								<a href="<?php the_permalink(); ?>">
									<img src="<?php echo esc_url( $thumb_url ); ?>" class="img-responsive" />
								</a>
							</div>
							<div class="col-sm-6">
								<div class="subhead">
		 							<h4><?php the_title(); ?></h4>
		 						</div>
								<?php the_excerpt(); ?>
								<small><a href="<?php the_permalink(); ?>">Read More</a></small>
							</div>
						<?php endwhile; wp_reset_query();?>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Message Section End -->
		<section class="bg-orange text-white">
			<div id="cta" class="container">
				<div class="row">
					<div class="col-sm-7">
						<div id="cta-text" class="padding-vertical-four">
							<h1 class="text-white strong margin-bottom-one"><?php the_field('home_cta_title', 'option'); ?></h1>
							<?php the_field('home_cta_text', 'option'); ?>
						</div>
					</div>
					<div id="cta-form-wrap" class="col-sm-5">
						<div id="cta-form" class="padding-vertical-two clearfix">
							<?php 
							    $form_object = get_field('cta_form');
							    echo do_shortcode('[gravityform id="' . $form_object['id'] . '" title="false" description="false" ajax="true"]');
							?>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
			
<?php get_footer(); ?>