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
								
								$image = get_sub_field('callout_block_image');
								
								?>
								
								<div class="row">
								
								<?php
								
								if ( !empty($image) ):
								
								?>
								
									<div class="col-12">
										<div class="sidebar-callout-image">
										
											<?php if ($link): ?>
											
												<a <?php if ( get_sub_field('callout_block_link_type') == 'External' ): ?> target="_blank" <?php endif; ?> href="<?php echo $link; ?>"><?php echo wp_get_attachment_image($image['id'], 'full', 0, array('class' => 'img img-fluid')); ?></a>
											
											<?php else: ?>
												
												<?php echo wp_get_attachment_image($image['id'], 'Callout Block', 0, array('class' => 'img img-fluid w-100')); ?>
											
											<?php endif; ?>
											
										</div>
									</div>
								
								<?php endif; ?>
								
									<div class="col-12">
										<div class="sidebar-callout-inner">
											
											<?php if ($link): ?>
											
												<a <?php if ( get_sub_field('callout_block_link_type') == 'External' ): ?> target="_blank" <?php endif; ?> href="<?php echo $link; ?>"><h4><?php the_sub_field('callout_block_heading'); ?></h4></a>
											
											<?php else: ?>
												
												<h4><?php the_sub_field('callout_block_heading'); ?></h4>
												
											<?php endif; ?>
											
											<?php the_sub_field('callout_block_text'); ?>
											
											<?php if (get_sub_field('add_a_button')): ?>
												
												<a class="btn btn-block btn-primary" <?php if ( get_sub_field('callout_block_link_type') == 'External' ): ?> target="_blank" <?php endif; ?> href="<?php echo $link; ?>"><?php the_sub_field('button_label'); ?></a>
												
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