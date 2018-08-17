<?php 
/**
 * The template for displaying all pages
 *
 * @package WordPress
 * @subpackage CSD
 * @since CSD 1.0
 */
get_header(); ?>

<div id="primary" class="content-area padding-vertical-two">
	<div class="container">
		<div class="row">
			<div class=" col-xs-12 col-sm-12 col-md-3">
				<?php get_sidebar(); ?>
			</div>
			<div class="col-main col-md-9 col-xs-12 pull-right">
				<main id="main" class="site-main" role="main">
					<?php
					if ( function_exists('yoast_breadcrumb') ) {
						
						yoast_breadcrumb('<p class="small padding-bottom-two" id="breadcrumbs">','</p>');
					} 
					// Start the loop.
					while ( have_posts() ) : the_post();
			
						// Include the page content template.
						get_template_part( 'template-parts/content', 'page' );
			
						// End of the loop.
					endwhile;
					?>
			
				</main><!-- .site-main -->
			</div>
			<div class="col-xs-12 col-sm-12 col-md-3  pull-left">
				<?php get_template_part( 'template-parts/content', 'callouts' ); ?>
				<?php get_template_part( 'template-parts/content', 'calendar' ); ?>
				<?php get_template_part( 'template-parts/content', 'contacts' ); ?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>