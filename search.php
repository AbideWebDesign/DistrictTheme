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

<div id="primary" class="content-area padding-vertical-two">
	<div class="container">
		<div class="row">
			<div class="col-sm-8">
				<h1 class="entry-title padding-bottom-quarter">Search</h1>
				<div class="well">
					<div id="search-form">
						<form role="search" id="sites-search" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
							 <label class="sr-only" for="search-text">Search</label>
							 <input type="text" class="search-field input-lg" id="search-text" placeholder="Search..." value="<?php echo get_search_query(); ?>" name="s">
							 <button type="submit" class="btn btn-primary btn-lg">Search</button>
						</form>
					</div>	
				</div>
			</div>
		</div>
		<?php if ( have_posts() ) : ?>
		
		<div class="row">
			<div class="col-sm-8">
				<?php
				// Start the loop.
				while ( have_posts() ) : the_post();
	
					/**
					 * Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called content-search.php and that will be used instead.
					 */
					get_template_part( 'template-parts/content', 'search' );
	
				// End the loop.
				endwhile;
	
				// Previous/next page navigation.
				show_pagination_links( );
			// If no content, include the "No posts found" template.
			else :
				echo "No results returned.";
	
			endif;
			?>
			</div>
		</div>
	</div>
</div><!-- .content-area -->

<?php get_footer(); ?>
