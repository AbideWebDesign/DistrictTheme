<div id="collapse-list" class="py-1">
	
	<?php if ( get_sub_field('tab_collapsible_content') ): ?>

		<div class="accordion" id="collapse">
			
			<?php $counter = 0; ?>
					
			<?php while ( have_rows('tab_collapsible_content') ): the_row(); ?>
	
				<div class="card">
	
					<div class="card-header" id="collapse-heading-<?php echo $counter; ?>">

						<button class="btn btn-link btn-lg collapsed d-flex justify-content-between align-content-center" type="button" data-toggle="collapse" data-target="#collapse-<?php echo $counter; ?>" aria-expanded="false" aria-controls="collapse-<?php echo $counter; ?>"><?php the_sub_field('collapsible_label'); ?><i class="fa" aria-hidden="true"></i></button>
														
					</div>
	
					<div id="collapse-<?php echo $counter; ?>" class="collapse" aria-labelledby="collapseheading-<?php echo $counter; ?>">
	
						<div class="card-body">
	
							<?php the_sub_field('collapsible_content'); ?>
	
						</div>
	
					</div>
	
				</div>
				
				<?php $counter ++; ?>
			
			<?php endwhile; ?>
		
		</div>
			
	<?php endif; ?>
	
</div>