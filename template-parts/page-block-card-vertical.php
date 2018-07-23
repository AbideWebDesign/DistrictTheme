<div class="padding-bottom-one">
	<ul class="list list-unstyled list-inline list-inline-lg">
	
	<?php 
	
	if( have_rows('card_vertical_blocks') ): 
		
		while ( have_rows('card_vertical_blocks') ) : the_row(); 
		
			if ( get_sub_field('card_vertical_link_type') == 'Page' ):
				
				$link = get_sub_field('page_link');
			
			elseif ( get_sub_field('card_vertical_link_type') == 'News Post' ):
				
				$post_object = get_sub_field('news_post_link');
				
				if( $post_object ): 

					$post = $post_object;
					setup_postdata( $post ); 
					$link = get_the_permalink();
					wp_reset_postdata();
				
				endif;
			
			elseif ( get_sub_field('card_vertical_link_type') == 'Event Category' ):
			
				$tax_object = get_sub_field('event_category_link');
				$link = home_url('/events/list?tribe_eventcategory=') . $tax_object->term_taxonomy_id;
			
			elseif ( get_sub_field('card_vertical_link_type') == 'Media File' ):
				
				$link = get_sub_field('media_link');
								
			endif;
	?>
		<li class="col-sm-4 card-vertical-block-wrap">
			<div class="card-vertical-block">
					
			<?php $image = get_sub_field('card_vertical_image'); ?>
			
				<div class="card-vertical-img">
					<a href="<?php echo $link; ?>" <?php if ( get_sub_field('card_vertical_link_type') == 'Media File' ): ?>target="_blank"<?php endif; ?>><?php echo wp_get_attachment_image($image['id'], 'full', 0, array('class' => 'img img-responsive')); ?></a>
				</div>
					
				<div class="card-vertical-content">
					<a href="<?php echo $link; ?>" <?php if ( get_sub_field('card_vertical_link_type') == 'Media File' ): ?>target="_blank"<?php endif; ?>><h4><?php the_sub_field('card_vertical_title'); ?></h4></a>
				</div>
										
			</div>
		</li>
	
	<?php endwhile; endif; ?>
	 
	</ul>
</div>