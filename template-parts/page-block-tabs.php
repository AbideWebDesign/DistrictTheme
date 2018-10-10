<div id="tabs-block">
	<?php echo (is_page_template('page-parent-no-sidebar.php') ? '<div class="padding-vertical-two"><div class="container">' : ''); ?>
		<div class="row">
			<div class="col-sm-12">
				<ul class="nav nav-tabs" role="tablist">
					<?php if(get_sub_field('tabs')): ?>
						<?php $counter = 0; ?>
						<?php while(have_rows('tabs')): the_row(); ?>
							<li role="presentation" <?php echo ($counter == 0 ? 'class="active"' : ''); ?>>
								<a href="#<?php the_sub_field('tab_name'); ?>" aria-controls="<?php the_sub_field('tab_name'); ?>" role="tab" data-toggle="tab"><?php the_sub_field('tab_label'); ?></a>
							</li>
							<?php $counter ++; ?>
						<?php endwhile; ?>
					<?php endif; ?>
					<li>
				</ul>
			</div>
		</div>
	<?php echo (is_page_template('page-parent-no-sidebar.php') ? '</div></div>' : ''); ?>
	<?php echo (is_page_template('page-parent-no-sidebar.php') ? '<div class="padding-vertical-two"><div class="container">' : '<div class="padding-top-two margin-bottom-two">'); ?>
		<div class="row">
			<div class="col-sm-12">
				<div class="tab-content">
					<?php if(get_sub_field('tabs')): ?>
						<?php $counter = 0; ?>
						<?php while(have_rows('tabs')): the_row(); ?>
							<div role="tabpanel" class="tab-pane fade <?php echo ($counter == 0 ? 'in active' : ''); ?>" id="<?php the_sub_field('tab_name'); ?>">
								<h2 class="d-lg-none margin-top-two"><?php the_sub_field('tab_label'); ?></h2>
								<div class="margin-bottom-four">
									<?php the_sub_field('tab_content'); ?>
								</div>
								<?php if(get_sub_field('buttons')): ?>
									<div class="row">
										<?php while(have_rows('buttons')): the_row(); ?>
											<div class="col-xs-12 col-sm-4 margin-bottom-two margin-bottom-one-xs">
												<div class="button-group">
													<div class="button-group-title">
														<?php the_sub_field('button_heading'); ?>
													</div>
													<div class="button-group-content">
														<a href="<?php the_sub_field('button_link'); ?>" class="btn btn-primary btn-block"><?php the_sub_field('button_label'); ?></a>
													</div>
												</div>
											</div>
										<?php endwhile; ?>
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
<?php echo (is_page_template('page-parent-no-sidebar.php') ? '</div></div>' : '</div>'); ?>