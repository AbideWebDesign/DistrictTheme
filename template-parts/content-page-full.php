<?php
/**
 * The template used for displaying page content for full width pages
 *
 * @package WordPress
 * @subpackage CSD
 * @since CSD 1.7.0
 */
?>
<div class="full-width-container">		
	<div class="page-content entry-content">
		<?php
		// check for rows (parent repeater)
		if( have_rows('page_content_blocks') ):
			
			while( have_rows('page_content_blocks') ): the_row(); 
			
				if ( get_row_layout() == "text_box" ): 

					get_template_part( 'template-parts/page-full-block', 'text' );
					
				endif;	
												
				if ( get_row_layout() == "tabbed_content" ): 
					
					get_template_part( 'template-parts/page-full-block', 'tabs' );
					
				endif;
				
				if ( get_row_layout() == "blog_posts" ): 
					
					get_template_part( 'template-parts/page-full-block', 'blog-posts' );
					
				endif;	
				
				if ( get_row_layout() == "call_to_action" ): 

					get_template_part( 'template-parts/page-full-block', 'cta' );
					
				endif;
				
				if ( get_row_layout() == "table" ): 

					get_template_part( 'template-parts/page-full-block', 'table' );
					
				endif;
				
				if ( get_row_layout() == "contact" ): 

					get_template_part( 'template-parts/page-full-block', 'contact' );
					
				endif;		
				
				if ( get_row_layout() == "notification" ): 

					get_template_part( 'template-parts/page-full-block', 'notification' );
					
				endif;					
				
			endwhile;
			
		endif; ?>
		
	</div><!-- .entry-content -->
</div>