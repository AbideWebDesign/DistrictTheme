<?php $size = get_sub_field('full_block_image_size'); ?>

<div class="container">
	
	<div class="row">
		
		<div class="col-12">
			
			<div class="<?php the_sub_field('full_block_image_padding'); ?>">
				
				<div class="d-none d-md-block"><?php echo wp_get_attachment_image( get_sub_field('full_block_image'), $size, false, array('class'=>'img-fluid rounded w-100 shadow') ); ?></div>
			
				<div class="d-md-none"><?php echo wp_get_attachment_image( get_sub_field('full_block_mobile_image'), 'large', false, array('class'=>'img-fluid rounded w-100 shadow') ); ?></div>
			
			</div>
			
		</div>
		
	</div>
		
</div>
