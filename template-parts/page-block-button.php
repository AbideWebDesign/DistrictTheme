<?php if( have_rows('button') ): ?>

	<div class="row mb-2">
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
		<div class="col-12 col-sm-6 col-lg-4 d-flex align-items-center mb-1 mb-lg-0">
			<a <?php if ( get_sub_field('external_link') || get_sub_field('internal_media') ): ?> target="_blank" <?php endif; ?> href="<?php echo $link; ?>" class="btn <?php echo $class; ?> d-flex w-100 align-items-center align-self-stretch"><div class="w-100 text-center"><?php the_sub_field('button_text'); ?></div></a>
		</div>
		<?php endwhile; ?>
	</div>

<?php endif; ?>