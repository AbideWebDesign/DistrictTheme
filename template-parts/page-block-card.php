<div class="card-left row padding-bottom-two">
					
	<?php
	
	if( get_sub_field('card_image') ): $image = get_sub_field('card_image'); ?>
	
	<div class="card-image col-sm-3 hidden-xs">
		<?php echo wp_get_attachment_image($image['id'], 'full', 0, array('class' => 'img img-responsive')); ?>
	</div>
		
	<?php endif; ?>
	
	<div class="card-text col-sm-9 col-xs-12">
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