<div class="mb-1 pb-1 border-bottom">
	
	<?php echo ( get_sub_field('table_of_contents_heading') ? '<h2 class="mb-1">' . get_sub_field('table_of_contents_heading') . '</h2>' : '' ); ?>
	
	<?php while ( have_rows('table_of_contents_links') ): the_row(); ?>
	
		<div><i class="fas fa-chevron-right text-sm text-muted"></i> <a class="anchor" href="#<?php the_sub_field('anchor'); ?>"><?php the_sub_field('label'); ?></a></div>
	
	<?php endwhile; ?>
	
</div>