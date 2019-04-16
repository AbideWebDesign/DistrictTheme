<?php 
/**
 * The template for displaying news posts
 *
 * @package WordPress
 * @subpackage CSD Schools
 * @since CSD Schools 1.0
 */
get_header(); ?>
<div id="news-header" class="bg-primary py-2">
	<div class="container">
		<?php the_title( '<h1 class="text-white mb-0">', '</h1>' ); ?>
		<?php get_template_part('template-parts/content', 'breadcrumbs'); ?>
	</div>
</div>
<div id="primary" class="content-area my-2">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<?php
				// Start the loop.
				while ( have_posts() ) : the_post();
		
					// Include the page content template.
					get_template_part( 'template-parts/content', 'news' );
					// End of the loop.
				endwhile;
				?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>