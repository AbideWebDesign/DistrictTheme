<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage CSD
 * @since CSD 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if(!is_page_template('page-parent-no-sidebar.php')): ?>
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header><!-- .entry-header -->
	<?php endif; ?>
	
	<div class="entry-content">
		<?php
		// check for rows (parent repeater)
		if( have_rows('page_content_blocks') ):
			
			while( have_rows('page_content_blocks') ): the_row(); 
								
				if( get_sub_field('lead_text_block') ): ?>
					
					<div class="entry-lead">
						<p class="lead"><?php the_sub_field('lead_text_block'); ?></p>
					</div>			
				
				<?php 
				
				endif;
				
				if( get_row_layout() == 'text_block' ):
					
					if( get_sub_field('heading') ): ?>
			
						<h2><?php the_sub_field('heading'); ?></h2>
			
					<?php 
					
					endif;
			
					if( get_sub_field('text') ):
					
						the_sub_field('text'); 
						
					endif; 
					
				endif; 
				
				if( get_row_layout() == 'image' ): 
				
					get_template_part( 'template-parts/page-block', 'image' );	
							
				endif;

				if( get_row_layout() == 'button_group' ):
					
					get_template_part( 'template-parts/page-block', 'button' );
					
				endif; 
				
				if ( get_row_layout() == 'page_links' ): 
					
					get_template_part( 'template-parts/page-block', 'links' );
									
				endif;
				
				if( get_row_layout() == 'card' ):
				
					get_template_part( 'template-parts/page-block', 'card' );
				
				endif;
				
				if( get_row_layout() == 'card_vertical' ):
				
					get_template_part( 'template-parts/page-block', 'card-vertical' );
				
				endif;
				
				if( get_sub_field( 'form_select' ) ): 
				
    				$form_object = get_sub_field('form_select');
    				echo do_shortcode('[gravityform id="' . $form_object['id'] . '" title="true" description="true" ajax="true"]');
				
				endif;
				
				if ( get_sub_field ( 'directory_category' ) ): 
					
					get_template_part( 'template-parts/page-block', 'directory' );
				
				endif;
				
				if ( get_row_layout() == "video_embed" ): 
					
					get_template_part( 'template-parts/page-block', 'video' );
					
				endif;
								
				if ( get_row_layout() == "table" ): 
					
					get_template_part( 'template-parts/page-block', 'table' );
					
				endif;
				
				if ( get_row_layout() == "tabbed_content" ): 
					
					get_template_part( 'template-parts/page-block', 'tabs' );
					
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
				
			endwhile;
			
		endif; ?>
	
	</div><!-- .entry-content -->

</article><!-- #post-## -->