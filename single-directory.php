<?php 
/**
 * The template for displaying directory profiles
 *
 * @package WordPress
 * @subpackage CSD
 * @since CSD 1.0
 */
get_header(); ?>

<div id="primary" class="content-area py-2">
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				<?php get_sidebar('directory'); ?>
			</div>
			<div class="col-sm-9">
				<?php
				if ( function_exists('yoast_breadcrumb') ) {
					
					yoast_breadcrumb('<p class="small pb-2" id="breadcrumbs">','</p>');
				} 
				// Start the loop.
				while ( have_posts() ) : the_post();
		
					// Include the page content template.
					get_template_part( 'template-parts/content', 'directory' );
					// End of the loop.
				endwhile;
				?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>