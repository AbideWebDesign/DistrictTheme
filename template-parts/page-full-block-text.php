<div class="padding-top-one padding-bottom-two">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="text-block-wrap" <?php echo (get_sub_field('text_block_image_side') == 'Right' ? 'style="flex-direction: row-reverse;"' : ''); ?>>
					<?php if(get_sub_field('include_text_block_image')): ?>
						<div class="text-block-image">
							<?php $image = get_sub_field('text_block_image'); ?>
							<?php echo wp_get_attachment_image($image, 'Text Block', false); ?>
						</div>
					<?php endif; ?>
					<div class="text-block-content">
						<h2 class="margin-bottom-one"><?php the_sub_field('text_block_heading'); ?></h2>
						<?php the_sub_field('text_block_content'); ?>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</div>
