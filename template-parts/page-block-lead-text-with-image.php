<?php $image = get_sub_field('text_image'); ?>
<div id="text-with-image-block" class="<?php echo(get_sub_field('background_color') == 'Gray' ? 'bg-gray py-3' : 'mb-2'); ?>">
	<?php echo (is_page_template('page-parent-no-sidebar.php') ? '<div class="container">' : ''); ?>
		<div class="row">
			<div class="col-sm-8">
				<div class="page-lead">
					<div class="lead">
						<?php the_sub_field('text_content'); ?>
					</div>
				</div>
			</div>
			<div class="col-sm-4 d-none d-md-block">
				<?php echo wp_get_attachment_image($image['id'], 'News Image Medium', false, array('class' => 'img img-fluid')); ?>
			</div>
		</div>
	<?php echo (is_page_template('page-parent-no-sidebar.php') ? '</div>' : ''); ?>
</div>
