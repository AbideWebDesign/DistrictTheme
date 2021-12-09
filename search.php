<?php
/**
 * The template for displaying search results pages
 *
 * @package WordPress
 * @subpackage CSD
 * @since CSD 1.0
 */

get_header(); 

global $wp_query;

$total_results = $wp_query->found_posts;

?>

<div id="primary" class="content-area py-2">

	<div class="container">

		<div class="row mb-1">

			<div class="col-12">

				<h1 class="entry-title mb-1">Search</h1>

				<div class="bg-gray p-1">

					<div id="search-form">

						<form role="search" id="sites-search" class="form-inline" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">

							<div class="form-row w-100">

								<div class="col-sm-10">

									<label class="sr-only" for="search-text">Search</label>

									<input type="text" class="search-field form-control form-control-lg w-100" id="search-text" placeholder="Search..." value="<?php echo get_search_query(); ?>" name="s">

								</div>

								<div class="col-sm-2">	

									<button type="submit" class="btn btn-primary btn-block h-100">Search</button>

								</div>

							</div>

						</form>

					</div>	

				</div>

			</div>

		</div>

		<div class="row">

			<div class="col-md-8">

				<?php 

				if ( have_posts() ) : 

					while ( have_posts() ) : the_post();
		
						get_template_part( 'template-parts/content', 'search' );
		
					endwhile;
		
					show_pagination_links( );

				else :

					echo "No results returned.";
		
				endif;

				?>

			</div>

			<div class="col-md-4">

				<div class="bg-gray p-1 mb-2">

					<h3>Popular Pages</h3>
			
					<?php $links = get_field('popular_pages_list', 'option'); ?>
					
					<ul class="fa-ul ml-2 mb-2">
			
						<?php foreach( $links as $link ): ?>
			
							<li><span class="fa-li"><i class="fas fa-chevron-right fa-xs"></i></span><a href="<?php echo $link->guid; ?>"><?php echo $link->post_title; ?></a></li>
			
						<?php endforeach; ?>
			
					</ul>

					<h3>Popular Search Results</h3>

					<?php $links = get_field('popular_resources_list', 'options'); ?>

					<ul class="fa-ul ml-2 mb-0">

					<?php foreach ( $links as $link ): ?>

						 <li><span class="fa-li"><i class="fas fa-chevron-right fa-xs"></i></span><a href="<?php echo $link->guid; ?>"><?php echo $link->post_title; ?></a></li>

					<?php endforeach; ?>

					</ul>

				</div>

				<div class="bg-gray p-1 text-center">

					<h2 class="mb-1">Need Help?</h2>

					<p class="mb-1"><?php the_field('contact_us_text', 'options'); ?></p>

					<a class="btn btn-primary btn-block" href="<?php echo home_url(); ?>/contact">Contact Us</a>

				</div>

			</div>

		</div>

	</div>

</div><!-- .content-area -->

<?php get_footer(); ?>