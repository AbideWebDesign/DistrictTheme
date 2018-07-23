<?php if( have_rows('button') ): ?>

<div class="padding-bottom-one">
	<ul class="list list-unstyled list-inline">

		<?php
	
		while ( have_rows('button') ) : the_row();	
		
			if ( get_sub_field('internal_page') ) {
		
				$link = get_sub_field('internal_page');
		
			} else if ( get_sub_field('internal_media') ) {
		
				$link = get_sub_field('internal_media');
		
			} else if ( get_sub_field('external_link') ) {
		
				$link = get_sub_field('external_link');
		
			}
			
			if ( get_sub_field('button_type') == "Primary" ) {
				
				$class = "btn-primary";
				
			} else {
				
				$class = "btn-secondary";
				
			}
		
		?>	
		
		<li class="padding-bottom-one">
			<a <?php if ( get_sub_field('external_link') || get_sub_field('internal_media') ): ?> target="_blank" <?php endif; ?> href="<?php echo $link; ?>" class="btn <?php echo $class; ?>"><?php the_sub_field('button_text'); ?></a>
		</li>	 			
		
		<?php endwhile; ?>
	
	</ul>
</div>

<?php endif; ?>