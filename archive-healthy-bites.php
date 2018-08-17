<?php
/**
 * The template for displaying Healthy Bites archive page
 *
 * @package WordPress
 * @subpackage CSD
 * @since CSD 1.0
 */

get_header(); ?>

<div id="primary" class="content-area padding-vertical-two">
	<div class="container">
		<div class="row">
			<div class="col-main col-xs-12 col-sm-10 col-sm-offset-1">
				<main id="main" class="site-main" role="main">
					
					<?php
					if(!is_paged()):			
						get_template_part( 'template-parts/content', 'healthy-bites-archive-header' ); 
					else:
						echo "<h2 class='padding-bottom-one'>Healthy Bites</h2>";
					endif;
					
					if ( have_posts() ) : 
						// Start the Loop.
						while ( have_posts() ) : the_post(); 
			
							get_template_part( 'template-parts/content', 'healthy-bites-archive' ); 			
			
						// End the loop.
						endwhile;
					?>
					<div class="row">
						<div class="col-sm-12 text-center">
								<?php // Previous/next page navigation.
								// next_posts_link() usage with max_num_pages
								next_posts_link( '<span class="btn btn-primary">More Healthy Bites</span>', $the_query->max_num_pages );
							
								?>
						</div>
					</div>
									
					<?php endif; ?>
					
				</main>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
