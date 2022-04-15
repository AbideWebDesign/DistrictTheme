<?php
/**
 * The template used for displaying page content for full width pages
 *
 * @package WordPress
 * @subpackage CSD
 * @since CSD 1.7.0
 */
 
$blocks = get_field('page_content_blocks'); 

$count = count( $blocks );

?>

<div class="full-width-container <?php echo ( get_field('include_sidebar_links') ? 'full-width-with-sidebar' : '' ); ?>">		
	
	<div class="page-content entry-content">
		
		<?php if ( get_field('include_sidebar_links') ): ?>
		
			<?php if ( have_rows('page_content_blocks') ): ?>
				
				<?php while ( have_rows('page_content_blocks') ): the_row(); ?>
				
					<?php if ( get_row_layout() == "call_to_action" && $blocks[0]['acf_fc_layout'] == 'call_to_action' ): ?>

						<?php get_template_part( 'template-parts/page-full-block', 'cta' ); ?>
					
					<?php endif; ?>
					
					<?php if ( get_row_layout() == "notification" ): ?>
	
						<?php get_template_part( 'template-parts/page-full-block', 'notification' ); ?>
						
					<?php endif; ?>
	
				<?php endwhile; ?>
				
			<?php endif; ?>
		
			<div class="container">
				
				<div class="row">
					
					<div class="col-xl-9">
		
		<?php endif; ?>
		
		<?php
		
		if ( have_rows('page_content_blocks') ) {
			
			while ( have_rows('page_content_blocks') ) {
				
				the_row(); 
				
				if ( ! get_field('include_sidebar_links') && get_row_layout() == "call_to_action" || ( get_row_layout() == "call_to_action" && get_field('include_sidebar_links') && $blocks[0]['acf_fc_layout'] != 'call_to_action' && $blocks[$count-1]['acf_fc_layout'] != 'call_to_action' ) ) {

					get_template_part( 'template-parts/page-full-block', 'cta' );
					
				}	
			
				if ( get_row_layout() == "text_box" ) { 

					get_template_part( 'template-parts/page-full-block', 'text' );
					
				}
												
				if ( get_row_layout() == "tabbed_content" ) {
					
					get_template_part( 'template-parts/page-full-block', 'tabs' );
					
				}
				
				if ( get_row_layout() == "blog_posts" ) {
					
					get_template_part( 'template-parts/page-full-block', 'blog-posts' );
					
				}	
				
				if ( get_row_layout() == "table" ) {

					get_template_part( 'template-parts/page-full-block', 'table' );
					
				}
				
				if ( get_row_layout() == "contact" ) {

					get_template_part( 'template-parts/page-full-block', 'contact' );
					
				}		
				
				if ( get_row_layout() == "notification" && ! get_field('include_sidebar_links') ) {

					get_template_part( 'template-parts/page-full-block', 'notification' );
					
				}	
				
				if ( get_row_layout() == "parentsquare_feed" ) {

					get_template_part( 'template-parts/page-full-block', 'parentsquare' );
					
				}					
				
			}
			
		} 
		
		?>
		
		<?php if ( get_field('include_sidebar_links') ): ?>
		
				</div>
				
				<div class="col-xl-3">
					
					<h2 class="text-body headline-plain mt-xl-2"><?php _e('See also', 'csd'); ?></h2>
					
					<div class="pb-3">
						
						<div id="sidebar-link-wrap" class="bg-white shadow-sm rounded border-top border-primary border-top-lg">
							
							<?php while ( have_rows( 'sidebar_icons' ) ): the_row(); ?>
							
								<?php $link = get_sub_field('sidebar_icon_link'); ?>
										
								<div class="sidebar-link">
									
									<div class="d-flex">
										
										<div class="mr-1 text-blue">
											
											<span class="fa-stack fa-2x">
													
												<i class="fas fa-square fa-stack-2x"></i>
												
												<i class="fas fa-<?php the_sub_field('sidebar_icon'); ?> fa-stack-1x fa-inverse"></i>
											
											</span>		
											
										</div>
										
										<div class="align-self-center">
										
											<div><a class="plain-link font-weight-bold text-body" href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a></div>
																									
											<?php if ( get_sub_field('sidebar_icon_spanish_version') ): ?>
											
												<?php $sp_link = get_sub_field('sidebar_icon_spanish_link'); ?>
												
												<div class="sp text-xs"><a class="plain-link font-weight-bold" href="<?php echo $sp_link; ?>" target="_blank"><?php _e('Spanish'); ?> <i class="fa fa-external-link-alt fa-xs"></i></a></div>

											<?php endif; ?>
																							
										</div>
										
									</div>									
									
								</div>
							
							<?php endwhile; ?>
															
						</div>
						
					</div>
					
				</div>
				
			</div>
				
		</div>
		
		<?php endif; ?>
		
	</div>

</div>

<?php if ( get_field('include_sidebar_links') && $blocks[$count-1]['acf_fc_layout'] == 'call_to_action' ): ?>

	<?php while ( have_rows('page_content_blocks') ): ?>
				
		<?php the_row(); ?>

		<?php if ( get_row_layout() == "call_to_action" ): ?>

			<?php get_template_part( 'template-parts/page-full-block', 'cta' ); ?>
					
		<?php endif; ?>	
		
	<?php endwhile; ?>

<?php endif; ?>