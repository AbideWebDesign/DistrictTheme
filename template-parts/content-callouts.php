<?php
	
if ( get_field('sidebar_callout_blocks') ): 
	
	$values = get_field('sidebar_callout_blocks');
	
	if ( $values ):
		
		// Loop through callout block heading names
		foreach ( $values as $value ):
			
			if( have_rows('callout_blocks', 'option') ):
							
				// Loop through all available callout_blocks
				while( have_rows('callout_blocks', 'option') ): the_row();	
				
					if( get_sub_field('callout_block_heading') == $value ):
					
						$valid = true;
	
						if ( get_sub_field('add_date') ):
							
							$date_now = new DateTime();
							$tz = new DateTimeZone('America/Los_Angeles');
							$date_now->setTimeZone($tz);
							
							$start = new DateTime(get_sub_field('start_date'));
							$end = new DateTime(get_sub_field('end_date'));
							
							if ( $date_now->format('mdY') > $end->format('mdY') || $date_now->format('mdY') < $start->format('mdY')):
								$valid = false;								
							endif;
	
						endif;
						
						if ( $valid == true ):
						
						?>
					
							<div class="sidebar-callouts">
								
								<?php 
								
								if ( get_sub_field('callout_block_link_type') != 'None' ):
									
									if ( get_sub_field('callout_block_link_type') == 'Internal' ):
									
										$link = get_sub_field('callout_block_link_internal');
								
									else:
										
										$link = get_sub_field('callout_block_link_external');
									
									endif;
								
								endif;
								
								if ( get_sub_field('callout_block_img') ):

									$image = get_sub_field('callout_block_img');
								
								else:
		
									// For legacy images added with ACF-Crop
									$image = get_sub_field('callout_block_image');

								endif;

								?>
								
								<div class="row">
								
								<?php
								if ( !empty($image) ):
									if (is_array($image)):
										
										// Image added after legacy
										$image_id = $image['id'];
								
									else:
										
										// Image added by ACF-Crop
										$image_id = $image;
									
									endif; 
									
									$image_file = wp_get_attachment_image_src($image_id, 'Callout Block');
								?>
								
									<div class="col-12 col-sm-4 col-md-5 col-lg-12">
										<div class="sidebar-callout-image-bg d-none d-sm-flex d-md-flex d-lg-none h-100" style="background-image:url(<?php echo $image_file[0]; ?>);"></div>
										<div class="sidebar-callout-image d-block d-sm-none d-md-none d-lg-block">
										
											<?php if ($link): ?>
											
												<a <?php if ( get_sub_field('callout_block_link_type') == 'External' ): ?> target="_blank" <?php endif; ?> href="<?php echo $link; ?>"><?php echo wp_get_attachment_image($image_id, 'Callout Block', 0, array('class' => 'img-fluid')); ?></a>
											
											<?php else: ?>
											
												<?php echo wp_get_attachment_image($image_id, 'Callout Block', 0, array('class' => 'img-fluid w-100')); ?>
											
											<?php endif; ?>
											
										</div>
									</div>
								
								<?php endif; ?>
								
									<div class="col-12 col-sm-8 col-md-7 col-lg-12">
										<div class="sidebar-callout-inner">
											
											<?php if ($link): ?>
											
												<a <?php if ( get_sub_field('callout_block_link_type') == 'External' ): ?> target="_blank" <?php endif; ?> href="<?php echo $link; ?>"><h4><?php the_sub_field('callout_block_heading'); ?></h4></a>
											
											<?php else: ?>
												
												<h4><?php the_sub_field('callout_block_heading'); ?></h4>
												
											<?php endif; ?>
											
											<?php the_sub_field('callout_block_text'); ?>
											
											<?php if (get_sub_field('add_a_button')): ?>
												
												<a class="btn btn-block btn-primary mt-1" <?php if ( get_sub_field('callout_block_link_type') == 'External' ): ?> target="_blank" <?php endif; ?> href="<?php echo $link; ?>"><?php the_sub_field('button_label'); ?></a>
												
											<?php endif; ?>
										</div>
									</div>
								</div>
							</div>
							
							<?php
						
						endif;
					
					endif;
				
				endwhile;
				
			endif;
			
		endforeach;
	
	endif;

endif; 

?>