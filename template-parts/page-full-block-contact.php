<div id="contact-block-header">
	<div class="container">		
		<div class="row">
			<div class="col-12 mt-2">
				<h2 class="headline"><?php the_sub_field('contact_section_heading'); ?></h2>
			</div>
		</div>
	</div>
</div>
<div id="contact-block" class="pt-1 pb-2 mb-3">
	<div class="container">
		<?php if( have_rows('contact') ): ?>
			<?php while( have_rows('contact') ): the_row(); ?>
				<div class="row justify-content-center">
					<div class="col-md-4">
						<div class="list-cards p-1 p-lg-2  h-100 text-center">
							<div class="mb-1">
								<i class="fas fa-phone-volume fa-2x"></i>
							</div>
							<h3>Contact</h3>
							<hr class="hr-sm hr-center">
							<strong><?php the_sub_field('contact_name'); ?></strong><br>
							<?php if( get_sub_field('contact_email') ): ?>
								<a href="mailto:<?php the_sub_field('contact_email'); ?>" target="_blank"><?php the_sub_field('contact_email'); ?></a>
								<br>
							<?php endif; ?>
							<?php if ( get_sub_field('contact_phone') ): ?>
								<strong>P:</strong> <?php the_sub_field('contact_phone'); ?>
								<br>
							<?php endif; ?>
							<?php if( get_sub_field('contact_fax') ): ?>
								<strong>F:</strong> <?php the_sub_field('contact_fax'); ?>
								<br>
							<?php endif; ?>
						</div>
					</div>
					<?php if ( get_sub_field('contact_address') ): ?>
						<div class="col-md-4">
							<div class="list-cards p-1 p-lg-2 h-100 text-center">
								<div class="mb-1">
									<i class="fas fa-map-marked-alt fa-2x"></i>
								</div>
								<h3>Address</h3>
								<hr class="hr-sm hr-center">
								<?php the_sub_field('contact_address'); ?> - <a href="https://www.google.com/maps/place/<?php the_sub_field('contact_address'); ?>" target="_blank">Google Map</a>
								<?php if ( get_sub_field('contact_mailing_address') ): ?>
									<hr class="hr-sm hr-center">
									<strong>Mailing Address:</strong><br>
									<?php the_sub_field('contact_mailing_address'); ?>
								<?php endif; ?>
							</div>	
						</div>
					<?php endif; ?>
					<?php if( have_rows('contact_staff') ): ?>
						<div class="col-md-4">
							<div class="list-cards p-1 p-lg-2 h-100 text-center">
								<div class="mb-1">
									<i class="fas fa-users fa-2x"></i>
								</div>
								<h3>Staff</h3>
								<hr class="hr-sm hr-center">
								<div class="mt-2">
									<ul class="list-unstyled">
									<?php while( have_rows('contact_staff') ): the_row(); ?>
										<li>
											<a href="mailto:<?php the_sub_field('contact_staff_email'); ?>" target="_blank"><?php the_sub_field('contact_staff_name'); ?></a>, <?php the_sub_field('contact_staff_title'); ?>
											<br>
											<?php if ( get_sub_field('contact_staff_phone') ): ?>
												<?php the_sub_field('contact_staff_phone'); ?>
												<br>
											<?php endif; ?>
										</li>
									<?php endwhile; ?> 
									</ul>
								</div>
							</div>
						</div>
					<?php endif; ?>	
				</div>
			<?php endwhile; ?>	
		<?php endif; ?>
	</div>
</div>