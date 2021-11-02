<div id="tabs-block-header">
	
	<div class="container">		
		
		<div class="row">
		
			<div class="col-12 mt-2">
			
				<h2 class="headline"><?php the_sub_field('tab_section_heading'); ?></h2>
			</div>
			
		</div>
		
	</div>
	
</div>

<div id="tabs-block" class="pb-2">
	
	<div class="container">
		
		<div id="tabs-list-header" class="mb-1">
			
			<div class="tab-header-color">
			
				<div class="row">
				
					<div class="col-12">
				
						<?php if ( get_sub_field('tabs') ): ?>
					
							<ul class="nav nav-tabs justify-content-center" role="tablist">
								
								<?php $counter = 0; ?>
								
								<?php while ( have_rows('tabs') ): the_row(); ?>
								
									<li class="nav-item">
								
										<?php if ( get_sub_field('tab_type') == 'Link' ): ?>
									
											<a class="nav-link d-flex <?php echo ( $counter == 0 ? 'active' : '' ); ?>" href="<?php the_sub_field('tab_external_link'); ?>"><?php the_sub_field('tab_label'); ?></a>
									
										<?php else: ?>
									
											<a id="<?php the_sub_field('tab_name'); ?>-tab" class="d-flex <?php echo ( $counter == 0 ? 'active' : '' ); ?>" href="#<?php the_sub_field('tab_name'); ?>" aria-controls="<?php the_sub_field('tab_name'); ?>" role="tab" data-toggle="tab"><?php the_sub_field('tab_label'); ?></a>
									
										<?php endif; ?>
								
									</li>
									
									<?php $counter ++; ?>
									
								<?php endwhile; ?>
								
							</ul>
							
						<?php endif; ?>
						
					</div>
					
				</div>
				
			</div>
			
		</div>
		
	</div>
	
	<div class="container">
		
		<div class="full-width-block">
			
			<div class="row">
				
				<div class="col-12">
				
					<div class="tab-content bg-white">
					
						<?php if ( get_sub_field('tabs') ): ?>
							
							<?php $counter = 0; ?>
							
							<?php while ( have_rows('tabs') ): the_row(); ?>
								
								<div role="tabpanel" class="tab-pane fade <?php echo ( $counter == 0 ? 'in active show' : '' ); ?>" id="<?php the_sub_field('tab_name'); ?>">
								
									<h2 class="d-lg-none mt-2"><?php the_sub_field('tab_label'); ?></h2>								
										
									<?php if ( get_sub_field('tab_image') && get_sub_field('tab_type') == 'Default' ): ?>
									
										<?php $img_id = get_sub_field('tab_image'); ?>
									
										<div class="mb-2">
									
											<?php echo wp_get_attachment_image( $img_id, 'Full Width', false, array( 'class'=>'img-fluid' ) ); ?>
									
										</div>
									
									<?php endif; ?>
										
									<?php if ( get_sub_field('tab_content') ): ?>
									
										<?php the_sub_field('tab_content'); ?>
									
									<?php endif; ?>
																		
									<?php if ( get_sub_field('include_table') ): ?>
										
										<div class="my-2">
											
										<?php echo get_template_part( 'template-parts/page-block', 'table' ); ?>
										
										</div>
									
									<?php endif; ?>
																			
									<?php if ( get_sub_field('tab_type') == 'List' ): ?>
																			
										<?php while ( have_rows('tab_list_content') ): the_row(); ?>
										
											<div class="tab-list-item">
												
												<h3><?php the_sub_field('list_item_title'); ?></h3>
												
												<?php the_sub_field('list_item_text'); ?>
											
											</div>
										
										<?php endwhile; ?>
									
									<?php endif; ?>
									
									<?php if ( get_sub_field('tab_type') == 'Collapsible' ): ?>
									
										<?php echo get_template_part( 'template-parts/page-block', 'collapsible' ); ?>
									
									<?php endif; ?>
									
									<?php if ( get_sub_field('add_buttons') ): ?>
									
										<div class="mt-3">
											
											<?php if ( get_sub_field('button_heading') ): ?>
											
												<div class="row">
												
													<div class="col-12">
												
														<h2 class="mb-1"><?php the_sub_field('button_group_heading'); ?></h2>
												
													</div>
												
												</div>
											
											<?php endif; ?>
											
											<div class="row">
											
												<?php while ( have_rows('buttons') ): the_row(); ?>
											
													<div class="col-md-6 col-lg-4 mb-1 mb-lg-2">
											
														<div class="button-group">
											
															<div class="button-group-title">
											
																<?php the_sub_field('button_heading'); ?>
											
															</div>
											
															<div class="button-group-content">
											
																<a href="<?php echo ( (get_sub_field('button_link_type') != 'Tab') ? get_sub_field('button_link') : '#' . get_sub_field('tab_name') ); ?>" <?php echo ( ( get_sub_field('button_link_type') == 'External' ) ? 'target="blank"' : ''); ?> class="btn btn-primary <?php echo ( (get_sub_field('button_link_type') == 'Tab') ? 'btn-tab' : '' ); ?>" <?php echo ( (get_sub_field('button_link_type') == 'Tab') ? 'aria-controls="' . get_sub_field('tab_name') . '"'  : ''); ?>><?php the_sub_field('button_label'); ?></a>
											
															</div>
											
														</div>
											
													</div>
											
												<?php endwhile; ?>									
			
											</div>
			
										</div>
			
									<?php endif; ?>
			
								</div>
			
								<?php $counter ++; ?>
			
							<?php endwhile; ?>
			
						<?php endif; ?>
			
					</div>
			
				</div>

			</div>

		</div>

	</div>

</div>	