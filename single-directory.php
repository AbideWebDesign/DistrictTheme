<?php 
/**
 * The template for displaying directory profiles
 *
 * @package WordPress
 * @subpackage CSD
 * @since CSD 1.0
 */
get_header(); ?>

<div id="primary" class="content-area padding-vertical-two">
	<div class="container">
		<div class="row">
			<div class="col-sm-3 col-xs-12">
				<?php get_sidebar('directory'); ?>
			</div>
			<div class="col-main col-sm-9 pull-right">
				<main id="main" class="site-main" role="main">
					<?php
					if ( function_exists('yoast_breadcrumb') ) {
						
						yoast_breadcrumb('<p class="small padding-bottom-two" id="breadcrumbs">','</p>');
					} 
					// Start the loop.
					while ( have_posts() ) : the_post();
			
						// Include the page content template.
						get_template_part( 'template-parts/content', 'directory' );
						// End of the loop.
					endwhile;
					?>
			
				</main><!-- .site-main -->
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>