<?php
	
if ( get_field('sidebar_contact_block') ): 

	$values = get_field('sidebar_contact_block');	
	
	if ($values):
		
		foreach ($values as $value):
	
			if( have_rows('contact_blocks', 'option') ):	
			
				while( have_rows('contact_blocks', 'option') ): the_row();
					
					if( get_sub_field('contact_name') == $value ): ?>
					
					<div class="sidebar-contact">
						<div class="sidebar-contact-department">
							<h4>Contact Information</h4>
							<p class="small subhead"><strong><?php the_sub_field('contact_name'); ?></strong></p>
							<p class="small">
								<?php 
								
								if( get_sub_field('contact_email') ): ?>
								
									<i class="fas fa-envelope"></i> <a href="mailto:<?php the_sub_field('contact_email'); ?>" target="_blank"><?php the_sub_field('contact_email'); ?></a>
									<br>
								
								<?php 
								
								endif; 
								
								if ( get_sub_field('contact_phone') ): ?>
								
									<i class="fas fa-phone"></i> <?php the_sub_field('contact_phone'); ?>
									<br>
								
								<?php 
								
								endif;
								
								if( get_sub_field('contact_fax') ): ?>
								
									<i class="fas fa-fax"></i> <?php the_sub_field('contact_fax'); ?>
									<br>
								
								<?php 
								
								endif; 
								
								if ( get_sub_field('contact_address') ): ?>
								
									<i class="fas fa-map-marker"></i> <?php the_sub_field('contact_address'); ?>
									<br>
								
								<?php 
								
								endif;
								
								if ( get_sub_field('contact_mailing_address') ): ?>
									
									Mailing Address: <?php the_sub_field('contact_address'); ?>
								
								<?php endif; ?>
								
							</p>
						</div>
						
						<?php 
						
						// Check to see if staff contact is available
						if( have_rows('contact_staff') ): ?>
						
							<div class="sidebar-contact-staff">
								<p class="small subhead"><strong><?php the_sub_field('contact_name'); ?> Staff</strong></p>
		
								<?php while( have_rows('contact_staff') ): the_row(); ?>
									
									<p class="small">
										<a href="mailto:<?php the_sub_field('contact_staff_email'); ?>" target="_blank"><?php the_sub_field('contact_staff_name'); ?></a>, <?php the_sub_field('contact_staff_title'); ?>
										<br>
								
										<?php
										
										if ( get_sub_field('contact_staff_phone') ): ?>
										
											<?php the_sub_field('contact_staff_phone'); ?>
											<br>
									
										<?php
										
										endif;
										
										?>
										
									</p>
									
								<?php endwhile; ?> 
								
							</div>
							
						<?php endif; ?>	
						
					</div>
					
					<?php
						
					endif;
				
				endwhile;
			
			endif;
			
		endforeach; 
	
	endif;

endif; ?>