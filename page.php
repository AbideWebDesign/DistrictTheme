<?php 
/**
 * The template for displaying all pages
 *
 * @package WordPress
 * @subpackage CSD
 * @since CSD 1.0
 */
get_header(); ?>

<div id="primary" class="content-area py-2">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<?php get_sidebar(); ?>
				<div class="d-none d-md-block">
					<?php get_template_part( 'template-parts/content', 'callouts' ); ?>
					<?php get_template_part( 'template-parts/content', 'calendar' ); ?>
					<?php get_template_part( 'template-parts/content', 'contacts' ); ?>
				</div>
			</div>
			<div class="col-md-9">
				<?php
				if ( function_exists('yoast_breadcrumb') ) {
					
					yoast_breadcrumb('<p class="small pb-2" id="breadcrumbs">','</p>');
				} 
				// Start the loop.
				while ( have_posts() ) : the_post();
		
					// Include the page content template.
					get_template_part( 'template-parts/content', 'page' );
		
					// End of the loop.
				endwhile;
				?>	
				<div class="d-block d-md-none">
					<?php get_template_part( 'template-parts/content', 'callouts' ); ?>
					<?php get_template_part( 'template-parts/content', 'calendar' ); ?>
					<?php get_template_part( 'template-parts/content', 'contacts' ); ?>
				</div>		
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>