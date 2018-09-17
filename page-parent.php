<?php
/**
 * Template Name: Parent
 *
 * @package WordPress
 * @subpackage CSD
 * @since CSD 1.0
 */

get_header(); 
$image = get_field('banner_image');
?>
<div class="inner-page-banner margin-bottom-two clearfix">
	<div class="content-top">
		<div class="content">
			<?php echo wp_get_attachment_image($image['id'], 'Parent Header', false); ?>
		</div>
	</div>
	<div class="inner-page-banner-gradient-left"></div>
	<div class="inner-page-banner-gradient-right"></div>
	<div class="inner-page-banner-overlay"></div>
</div>
<div id="primary" class="content-area padding-bottom-two">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-3">
				<?php get_sidebar("parent"); ?>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-9 pull-right">
				<main id="main" class="site-main" role="main">
					<?php 
					
					if ( function_exists('yoast_breadcrumb') ):
						
						yoast_breadcrumb('<p class="small padding-bottom-two" id="breadcrumbs">','</p>');
					
					endif; 
					
					// Start the loop.
					while ( have_posts() ) : the_post();
			
						// Include the page content template.
						get_template_part( 'template-parts/content', 'page' );
			
						// End of the loop.
					endwhile;
					?>
			
				</main><!-- .site-main -->
			</div>
			<div class="col-xs-12 col-sm-12 col-md-3 pull-left">
				<?php get_template_part( 'template-parts/content', 'calendar' ); ?>
				<?php get_template_part( 'template-parts/content', 'callouts' ); ?>
				<?php get_template_part( 'template-parts/content', 'contacts' ); ?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>