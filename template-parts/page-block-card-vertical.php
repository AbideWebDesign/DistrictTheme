<div class="pb-1">
	<div class="row">
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
							
				elseif ( get_sub_field('card_vertical_link_type') == 'Media File' ):
					
					$link = get_sub_field('media_link');
									
				endif;
			?>
			<div class="col-sm-6 col-md-4 align-items-stretch mb-2 mb-md-0">
				<div class="card-vertical-block bg-gray h-100">
					<?php 
					
						if ( get_sub_field('card_vertical_img') ) {
							
							$image = get_sub_field('card_vertical_img');
							
						} else {
							
							// For legacy images add by ACF-Crop
							$image = get_sub_field('card_vertical_image');
							
						}
						
					?>
					<div class="card-vertical-img">
						<a href="<?php echo $link; ?>" <?php if ( get_sub_field('card_vertical_link_type') == 'Media File' ): ?>target="_blank"<?php endif; ?>><?php echo wp_get_attachment_image($image['id'], 'Square Column 4', 0, array('class' => 'img-fluid w-100')); ?></a>
					</div>
					<div class="card-vertical-content px-1 py-2 p-lg-2">
						<a href="<?php echo $link; ?>" <?php if ( get_sub_field('card_vertical_link_type') == 'Media File' ): ?>target="_blank"<?php endif; ?>><h4 class="mb-0"><?php the_sub_field('card_vertical_title'); ?></h4></a>
					</div>
				</div>
			</div>
		<?php endwhile; endif; ?>	 
	</div>
</div>