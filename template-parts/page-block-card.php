<?php 
	
if ( get_sub_field('card_img') ) {
	
	$image = get_sub_field('card_img');
	
} else {
	
	// For legacy images add by ACF-Crop
	$image = get_sub_field('card_image');
	
}
	
?>
<div class="row pb-2">
					
	<?php if ( $image ): ?>
	
		<div class="col-sm-3 d-none d-md-block">
			<?php echo wp_get_attachment_image($image['id'], 'Square Column 3', 0, array('class' => 'img-fluid')); ?>
		</div>
		
	<?php endif; ?>
	
	<div class="card-text col-sm-9">
		<div class="subhead">
			<h3><?php the_sub_field('card_title'); ?></h3>
		</div>
		
		<?php the_sub_field('card_text'); ?>	
		
		<?php 
			
		if ( get_sub_field('card_links_col_1') ): ?>
			
			<div class="card-links">
			
			<?php 
				
				the_sub_field('card_links_col_1'); ?>
				
			</div>
			
		<?php
		
		endif; 
			
		if ( get_sub_field('card_links_col_2') ): ?>
			
			<div class="card-links">
			
			<?php 
				
				the_sub_field('card_links_col_2'); ?>
				
			</div>
			
		<?php
		
		endif; ?>
	
	</div>
							
</div>