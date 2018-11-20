<div id="tabs-block-header">
	<div class="container">		
		<div class="row">
			<div class="col-xs-12 margin-top-two">
				<h2 class="headline"><?php the_sub_field('tab_section_heading'); ?></h2>
			</div>
		</div>
	</div>
</div>
<div id="tabs-block" class="padding-bottom-two">
	<div class="container">
		<div id="tabs-list-header" class="margin-bottom-one">
			<div class="tab-header-color">
				<div class="row">
					<div class="col-sm-12">
						<ul class="nav nav-tabs" role="tablist">
							<?php if(get_sub_field('tabs')): ?>
								<?php $counter = 0; ?>
								<?php while(have_rows('tabs')): the_row(); ?>
									<li role="presentation" <?php echo ($counter == 0 ? 'class="active"' : ''); ?>>
										<?php if(get_sub_field('tab_type') == 'Link'): ?>
											<a href="<?php the_sub_field('tab_external_link'); ?>"><?php the_sub_field('tab_label'); ?></a>
										<?php else: ?>
											<a href="#<?php the_sub_field('tab_name'); ?>" aria-controls="<?php the_sub_field('tab_name'); ?>" role="tab" data-toggle="tab"><?php the_sub_field('tab_label'); ?></a>
										<?php endif; ?>
									</li>
									<?php $counter ++; ?>
								<?php endwhile; ?>
							<?php endif; ?>
							<li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="full-width-block">
			<div class="row">
				<div class="col-sm-12">
					<div class="tab-content bg-white">
						<?php if(get_sub_field('tabs')): ?>
							<?php $counter = 0; ?>
							<?php while(have_rows('tabs')): the_row(); ?>
								<div role="tabpanel" class="tab-pane fade <?php echo ($counter == 0 ? 'in active' : ''); ?>" id="<?php the_sub_field('tab_name'); ?>">
									<h2 class="d-lg-none margin-top-two"><?php the_sub_field('tab_label'); ?></h2>								
									<?php if(get_sub_field('tab_type') == 'Default'): ?>
										<?php if(get_sub_field('tab_image')): ?>
											<?php $img_id = get_sub_field('tab_image'); ?>
											<div class="margin-bottom-two">
												<?php echo wp_get_attachment_image($img_id, 'Full Width', false, array('class'=>'img img-responsive')); ?>
											</div>
										<?php endif; ?>
										<?php the_sub_field('tab_content'); ?>
									<?php elseif (get_sub_field('tab_type') == 'List'): ?>
										<?php while(have_rows('tab_list_content')): the_row(); ?>
											<div class="tab-list-item">
												<h3><?php the_sub_field('list_item_title'); ?></h3>
												<?php the_sub_field('list_item_text'); ?>
											</div>
										<?php endwhile; ?>
									<?php endif; ?>
									<?php if(get_sub_field('buttons')): ?>
										<div class="margin-top-four">
											<?php if(get_sub_field('button_heading')): ?>
												<div class="row">
													<div class="col-xs-12">
														<h2 class="margin-bottom-one"><?php the_sub_field('button_group_heading'); ?></h2>
													</div>
												</div>
											<?php endif; ?>
											<div class="row">
												<?php while(have_rows('buttons')): the_row(); ?>
													<div class="col-xs-12 col-sm-4 margin-bottom-two margin-bottom-one-xs">
														<div class="button-group">
															<div class="button-group-title">
																<?php the_sub_field('button_heading'); ?>
															</div>
															<div class="button-group-content">
																<a href="<?php the_sub_field('button_link'); ?>" class="btn btn-primary"><?php the_sub_field('button_label'); ?></a>
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