<?php
	// check for rows (parent repeater)
	if( have_rows('page_content_blocks') ):
		
		while( have_rows('page_content_blocks') ): the_row(); 
			
			if( get_row_layout() == 'table_of_contents' ): ?>
				
				<?php get_template_part( 'template-parts/page-block', 'table-of-contents' ); ?>			
			
			<?php 
			
			endif;
			
			if( get_sub_field('lead_text_block') ): ?>
				
				<div <?php echo ( get_sub_field('anchor') ? 'id="'. get_sub_field('anchor') . '" ' : '' ); ?>class="page-lead">
					<div class="lead"><?php the_sub_field('lead_text_block'); ?></div>
				</div>			
			
			<?php 
			
			endif;
			
			if( get_row_layout() == 'text_block' ):
				
				if( get_sub_field('heading') ): ?>
		
					<h2><?php the_sub_field('heading'); ?></h2>
		
				<?php 
				
				endif;
		
				if( get_sub_field('text') ):
				
					echo ( get_sub_field('anchor') ? '<div id="'. get_sub_field('anchor') . '">' : '' ); 
					
					the_sub_field('text'); 
					
					echo ( get_sub_field('anchor') ? '</div>' : '' ); 
					
				endif; 
				
			endif; 
			
			if( get_row_layout() == 'image' ): 
				
				echo ( get_sub_field('anchor') ? '<div id="'. get_sub_field('anchor') . '">' : '' ); 
				
					get_template_part( 'template-parts/page-block', 'image' );	
					
				echo ( get_sub_field('anchor') ? '</div>' : '' ); 
						
			endif;

			if( get_row_layout() == 'button_group' ):
				
				echo ( get_sub_field('anchor') ? '<div id="'. get_sub_field('anchor') . '">' : '' ); 

					get_template_part( 'template-parts/page-block', 'button' );
					
				echo ( get_sub_field('anchor') ? '</div>' : '' ); 
				
			endif; 
			
			if ( get_row_layout() == 'page_links' ): 
				
				get_template_part( 'template-parts/page-block', 'links' );
								
			endif;
			
			if( get_row_layout() == 'card' ):
			
				echo ( get_sub_field('anchor') ? '<div id="'. get_sub_field('anchor') . '">' : '' );
			
					get_template_part( 'template-parts/page-block', 'card' );
					
				echo ( get_sub_field('anchor') ? '</div>' : '' ); 
			
			endif;
			
			if( get_row_layout() == 'card_vertical' ):
			
				get_template_part( 'template-parts/page-block', 'card-vertical' );
			
			endif;
			
			if( get_sub_field( 'form_select' ) ): 
				
				echo ( get_sub_field('anchor') ? '<div id="'. get_sub_field('anchor') . '">' : '' );
				
					$form_object = get_sub_field('form_select');
					echo do_shortcode('[gravityform id="' . $form_object['id'] . '" title="true" description="true" ajax="true"]');
					
				echo ( get_sub_field('anchor') ? '</div>' : '' ); 
			
			endif;
			
			if ( get_sub_field ( 'directory_category' ) ): 
				
				get_template_part( 'template-parts/page-block', 'directory' );
			
			endif;
			
			if ( get_row_layout() == "video_embed" ): 
				
				get_template_part( 'template-parts/page-block', 'video' );
				
			endif;
							
			if ( get_row_layout() == "table" ): 
				
				echo ( get_sub_field('anchor') ? '<div id="'. get_sub_field('anchor') . '">' : '' );
				
					get_template_part( 'template-parts/page-block', 'table' );
					
				echo ( get_sub_field('anchor') ? '</div>' : '' ); 
				
			endif;
			
			if ( get_row_layout() == "lead_text_with_image" ): 
				
				get_template_part( 'template-parts/page-block', 'lead-text-with-image' );
				
			endif;	

			if ( get_row_layout() == "blog_posts" ): 
				
				get_template_part( 'template-parts/page-block', 'blog-posts' );
				
			endif;	
			
			if ( get_row_layout() == "call_to_action" ): 

				get_template_part( 'template-parts/page-block', 'cta' );
				
			endif;	
			
			if ( get_row_layout() == "key_dates" ): 

				get_template_part( 'template-parts/content', 'calendar-dates' );
				
			endif;							

			if ( get_row_layout() == "tabbed_content" ): 

				get_template_part( 'template-parts/content', 'tabs' );
				
			endif;							
			
		endwhile;
		
	endif; ?>
