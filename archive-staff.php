<?php
/**
 * The template for displaying staff directory page
 *
 * @package WordPress
 * @subpackage CSD
 * @since CSD 1.0
 */

get_header(); ?>

<div id="primary" class="content-area padding-vertical-two">
	<div class="container">
		<div class="row">
			<div class="col-main col-sm-12">
				<main id="main" class="site-main" role="main">
					
					<?php
					
					if ( function_exists('yoast_breadcrumb') ) {
						
						yoast_breadcrumb('<p class="small padding-bottom-two" id="breadcrumbs">','</p>');
					} 
								
					if ( have_posts() ) : 
						// Start the Loop.
						while ( have_posts() ) : the_post(); 
			
							get_template_part( 'template-parts/content', 'news-archive' ); 			
			
						// End the loop.
						endwhile;
			
						// Previous/next page navigation.
						the_posts_pagination( array(
							'prev_text'          => __( 'Previous page', 'csd' ),
							'next_text'          => __( 'Next page', 'csd' ),
							'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'csd' ) . ' </span>',
						) );
			
					// If no content, include the "No posts found" template.
					else :
						get_template_part( 'template-parts/content', 'none' );
			
					endif;
					
					?>
					
				</main>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
