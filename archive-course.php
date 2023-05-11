<?php
/**
 * The template for displaying courses
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package csd_schools
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$taxonomy_terms = get_catalog_terms( 'department' );

?>

<div class="bg-primary py-3">

	<div class="container">

		<div class="row">

			<div class="col-12">

				<h1 class="text-xl mb-0 text-white"><?php _e('Course Catalog'); ?></h1>

			</div>

		</div>

	</div>

</div>

<div class="bg-light">
	
	<div id="archive-wrapper" class="py-2">
	
		<div class="container" tabindex="-1">
			
			<div class="row">
				
				<div class="col-lg-4 col-xl-3 mb-2 mb-lg-0">
					
					<div class="d-lg-none">
					
						<?php if ( function_exists( 'yoast_breadcrumb' ) ) { yoast_breadcrumb( '<div class="wrapper-breadcrumbs mb-2">','</div>' ); } ?>
					
					</div>

					<div class="bg-white shadow-sm p-2 rounded">
						
						<?php get_template_part('template-parts/partials/catalog', 'search'); ?>
						
						<?php get_template_part('template-parts/partials/catalog', 'nav-info'); ?>
						
					</div>
					
				</div>
				
				<div class="col-lg-8 col-xl-9 facetwp-template">
								
					<div class="d-flex justify-content-between mb-1">
						
						<div><h2 class="mb-0"><?php _e('Courses'); ?></h2></div>
						
						<div class="d-flex align-self-center facet-mb-0">

							<div class="mr-1 align-self-center"><?php echo do_shortcode('[facetwp facet="catalog_result_count"]'); ?></div>

							<div class="align-self-center"><?php echo do_shortcode('[facetwp facet="catalog_per_page"]'); ?></div>
			
						</div>
						
					</div>
					
					<?php echo facetwp_display( 'selections' ); ?>
					
					<?php if ( have_posts() ): ?>
								
						<?php while ( have_posts() ): the_post(); ?>
						
							<?php get_template_part( 'template-parts/partials/single', 'course-archive' ); ?>								

						<?php endwhile; ?>
						
						<div class="d-flex justify-content-center w-100 bg-white shadow-sm p-1 rounded facet-mb-0">
							
							<?php echo do_shortcode('[facetwp facet="catalog_page_numbers"]'); ?>
							
						</div>
										
					<?php else: ?>
					
						<?php _e('No courses'); ?>
							
					<?php endif; ?>
					
				</div>
				
			</div>
		
		</div>
	
	</div>
	
</div>

<script>
(function($) {
  $(document).on('facetwp-refresh', function() {
    if (FWP.soft_refresh == true) {
      FWP.enable_scroll = true;
    } else {
      FWP.enable_scroll = false;
    }
  });
  $(document).on('facetwp-loaded', function() {
    if (FWP.enable_scroll == true) {
      $('html, body').animate({
        scrollTop: 0
      }, 500);
    }
  });
})(jQuery);
</script>
<?php get_footer();