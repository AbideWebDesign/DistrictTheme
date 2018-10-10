<?php $image = get_sub_field('text_image'); ?>
<div id="text-with-image-block" class="<?php echo(get_sub_field('background_color') == 'Gray' ? 'bg-gray padding-vertical-four' : 'margin-bottom-two'); ?>">
	<?php echo (is_page_template('page-parent-no-sidebar.php') ? '<div class="container">' : ''); ?>
		<div class="row">
			<div class="col-sm-8">
				<div class="entry-lead">
					<div class="lead">
						<?php the_sub_field('text_content'); ?>
					</div>
				</div>
			</div>
			<div class="col-sm-4 hidden-xs">
				<?php echo wp_get_attachment_image($image['id'], 'News Image Medium', false, array('class' => 'img img-responsive')); ?>
			</div>
		</div>
	<?php echo (is_page_template('page-parent-no-sidebar.php') ? '</div>' : ''); ?>
</div>
