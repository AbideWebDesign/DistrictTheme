<?php get_header(); ?>
<div id="primary" class="content-area">
	<div id="section-efriday-top" class="bg-orange padding-vertical-four">
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<h1><?php the_field('efriday_header_title', 'options'); ?></h1>
					<p class="margin-none"><?php the_field('efriday_header_text', 'options'); ?></p>
				</div>
				<div class="col-sm-6">
					<div class="header-box margin-top-one">
						<div class="small text-center"><?php the_field('efriday_disclaimer', 'options'); ?></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="section-efriday-bottom" class="padding-vertical-two">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<?php echo do_shortcode('[facetwp facet="efriday_search"]'); ?>
					<h3>Search by Category</h3>
					<div class="small">
						<?php echo do_shortcode('[facetwp facet="efriday_checkboxes"]'); ?>
					</div>
					<h3>Search by Age</h3>
					<div class="small">
						<?php echo do_shortcode('[facetwp facet="efriday_age_group"]'); ?>
					</div>
					<div class="margin-bottom-one-xs">
						<button class="btn btn-secondary btn-sm" onclick="FWP.reset()">Clear</button>
					</div>
				</div>
				<div class="col-md-9">
					<div class="row">
						<div class="col-sm-12">
							<div class="search-heading bg-dark-blue padding-one margin-bottom-one">
								<h3 class="margin-none text-white">Upcoming Events</h3>
							</div>
						</div>
					</div>
					<?php if(have_posts()): ?>
						<?php while(have_posts()): the_post(); ?>
							<?php $image = get_field('flyer_image'); ?>
							<div class="box-search-item margin-bottom-two padding-one bg-gray">
								<div class="row">
									<div class="col-sm-4">
										<div>
											<a href="<?php the_field('attach_pdf'); ?>" target="_blank"><?php echo wp_get_attachment_image($image['id'], 'eFriday Folder Image', 0, array('class' => 'img-responsive img-center-xs')); ?></a>
											<?php if(get_field('attach_pdf_spanish')): ?>
												<div class="margin-top-one text-center">
													<a href="<?php the_field('attach_pdf_spanish'); ?>" target="_blank" class="btn-sm btn-green">Español</a>
												</div>
											<?php endif; ?>
										</div>
									</div>
									<div class="col-sm-8">
										<div class="box-search-item-content padding-vertical-one">
											<h4><?php the_field('event_name'); ?></h4>
											<div class="small"><?php the_field('event_description'); ?></div>
											<hr>
											<div class="row">
												<div class="col-md-12">
													<div class="margin-bottom-quarter small"><strong>Organizer:</strong> <?php the_field('name_of_organization'); ?></div>
													<div class="margin-bottom-quarter small"><strong>Age Group:</strong> <?php the_field('targeted_age_group'); ?></div>
													<div class="small"><strong>Contact:</strong> <?php the_field('contact_person'); ?>, <?php the_field('contact_phone_number'); ?>, <a href="mailto:<?php the_field('contact_email'); ?>"><?php the_field('contact_email'); ?></a></div>
													<?php if(get_field('ticket_url')): ?>
														<div class="margin-top-quarter small"><strong>Website:</strong> <a href="<?php the_field('ticket_url'); ?>" target="_blank" rel="nofollow">View Website</a></div>
													<?php endif; ?>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php endwhile; ?>
						<?php show_pagination_links(); ?>
					<?php else: ?>
						<strong>No Results Returned</strong>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>