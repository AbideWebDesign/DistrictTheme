<?php 
/**
 * The template for displaying news posts
 *
 * @package WordPress
 * @subpackage CSD
 * @since CSD 1.0
 */
get_header(); ?>

<div id="primary" class="content-area py-2">
	<div class="container">
		<div class="row">
			<div class="col-sm-10 offset-sm-1">
				<?php
				if ( function_exists('yoast_breadcrumb') ) {
					
					yoast_breadcrumb('<p class="small padding-bottom-two" id="breadcrumbs">','</p>');
				} 
				// Start the loop.
				while ( have_posts() ) : the_post();
		
					// Include the page content template.
					get_template_part( 'template-parts/content', 'news' );
					// End of the loop.
				endwhile;
				?>
				<?php get_template_part( 'template-parts/content', 'news-footer' ); ?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>