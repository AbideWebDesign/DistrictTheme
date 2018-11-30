<?php
/**
 * Template Name: Default Template - Full Width
 *
 * @package WordPress
 * @subpackage CSD
 * @since CSD 1.0
 */

get_header(); 
$pages = get_full_width_children_pages($post);
?>
<div id="primary" class="content-area">
	<div id="full-width-header" class="<?php the_field('banner_background_color'); ?> <?php echo (get_field('banner_type') == 'Arrow' ? 'header-arrow' : ''); ?>">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 <?php echo (get_field('banner_type') == 'Arrow' ? 'col-xl-7' : 'col-xl-9'); ?> py-3 align-self-center">
					<h1 class="mb-0"><?php the_title(); ?></h1>
					<?php if(get_field('banner_text')): ?>
						<p class="lead mt-1 mb-0"><?php the_field('banner_text'); ?></p>
					<?php endif; ?>
				</div>
				<?php if(get_field('banner_image') && get_field('banner_text') && get_field('banner_type') == 'Arrow'): ?>
					<div id="header-right" class="col-xl-3 offset-xl-1 d-none d-xl-block">
						<div class="d-flex h-100 align-self-center">	
							<?php $img_id = get_field('banner_image'); ?>
							<?php echo wp_get_attachment_image($img_id, 'square', false, array('class'=>'img img-fluid', 'style'=>'align-self:center')); ?>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<?php if($pages): ?>
		<div id="full-width-nav" class="py-1 bg-orange d-none d-xl-block">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<ul class="list-inline m-0">
							<li <?php echo (is_page($pages['parent']) ? 'class="current_page_item"' : ''); ?>><a href="<?php the_permalink($pages['parent']); ?>"><?php echo get_the_title($pages['parent']); ?></a></li>
							<?php echo $pages['children']; ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>
	<?php
	// Start the loop.
	while ( have_posts() ) : the_post();

		// Include the page content template.
		get_template_part( 'template-parts/content', 'page-full' );

		// End of the loop.
	endwhile;
	?>
</div>
<?php get_template_part( 'template-parts/content', 'page-full-footer'); ?>
<?php get_footer(); ?>