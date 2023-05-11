<?php
/**
 * The template for displaying all single posts
 *
 * @package csd
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$department = get_the_terms( get_the_id(), 'department' );

$courses = get_courses( $department[0]->slug );

$taxonomy_terms = get_catalog_terms( 'department' );

?>

<div class="bg-primary py-3">

	<div class="container">

		<div class="row">

			<div class="col-12">

				<h1 class="text-xl mb-0 text-white"><?php echo $department[0]->name; ?> Department</h1>
				
			</div>

		</div>

	</div>

</div>

<div class="py-2 bg-light">

	<div class="container" tabindex="-1">

		<div class="row">
							
			<div class="col-12">
								
				<?php if ( function_exists( 'yoast_breadcrumb' ) ) { yoast_breadcrumb( '<div class="wrapper-breadcrumbs mb-2">','</div>' ); } ?>
					
				<?php while ( have_posts() ) : the_post(); ?>
	
					<?php get_template_part( 'template-parts/partials/single', 'course-archive' ); ?>
	
				<?php endwhile; ?>
				
			</div>

		</div>

	</div>

</div>

<?php get_footer();