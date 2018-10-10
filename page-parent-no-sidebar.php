<?php
/**
 * Template Name: Parent - No Sidebar
 *
 * @package WordPress
 * @subpackage CSD
 * @since CSD 1.0
 */

get_header(); 
$banner_image = get_field('banner_image');
$lead_image = get_field('lead_image');
?>
<div class="inner-page-banner clearfix">
	<div class="content-top">
		<div class="content">
			<?php echo wp_get_attachment_image($banner_image['id'], 'Parent Header', false, ''); ?>
		</div>
	</div>
</div>
<div class="inner-page-banner-gradient-left"></div>
<div class="inner-page-banner-gradient-right"></div>
<div class="inner-page-banner-overlay"></div>
<div class="container">
	<div class="row">
		<div class="col-sm-3">
			<div class="block-page-title">
				<h2 class="hidden-xs">
					<span class="sidebar-parent-title"><?php the_title(); ?></span>
				</h2>
			</div>
		</div>
	</div>
</div>
<div id="primary" class="content-area">
	<div id="text-with-image-block" class="bg-gray padding-vertical-four">
		<div class="container">
			<div class="row">
				<div class="col-sm-8">
					<h1 class="d-lg-none margin-bottom-one"><?php the_title(); ?></h1>
					<div class="entry-lead">
						<div class="lead">
							<?php the_field('lead_text'); ?>
						</div>
					</div>
				</div>
				<div class="col-sm-3 col-sm-offset-1 hidden-xs">
					<?php echo wp_get_attachment_image($lead_image['id'], 'full', false, array('class' => 'img img-responsive')); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="content-area-overlap">
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();
	
			// Include the page content template.
			get_template_part( 'template-parts/content', 'page' );
	
			// End of the loop.
		endwhile;
		?>
	</div>
</div>
<?php get_footer(); ?>