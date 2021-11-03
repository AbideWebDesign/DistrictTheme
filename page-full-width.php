<?php
/**
 * Template Name: Default Template - Full Width
 *
 * @package WordPress
 * @subpackage CSD
 * @since CSD 1.0
 */

get_header(); 
?>

<div id="primary" class="content-area">

	<div id="full-width-header" class="<?php the_field('banner_background_color'); ?> <?php echo ( get_field('banner_type') == 'Arrow' ? 'header-arrow' : '' ); ?>">

		<div class="container">

			<div class="row">

				<div class="col-lg-12 <?php echo ( get_field('banner_type') == 'Arrow' ? 'col-xl-7' : 'col-xl-9' ); ?> py-4 align-self-center">

					<h1 class="mb-0"><?php the_title(); ?></h1>

					<?php if ( get_field('banner_text') ): ?>

						<p class="lead mt-1 mb-0"><?php the_field('banner_text'); ?></p>

					<?php endif; ?>

				</div>

				<?php if ( get_field('banner_image') && get_field('banner_text') && get_field('banner_type') == 'Arrow' ): ?>

					<div id="header-right" class="col-xl-3 offset-xl-1 d-none d-xl-block">

						<div class="d-flex h-100 align-self-center">	

							<?php $img_id = get_field('banner_image'); ?>

							<?php echo wp_get_attachment_image( $img_id, 'square', false, array( 'class'=>'img img-fluid', 'style'=>'align-self:center' ) ); ?>

						</div>

					</div>

				<?php endif; ?>

			</div>

		</div>

	</div>

	<?php if ( get_field('menu_type') != 'None' ): ?>

		<?php if ( get_field('menu_type') == 'Custom' ): ?>

			<?php $pages = get_field('pages'); ?>

		<?php else: ?>

			<?php $pages = get_full_width_children_pages( $post );  ?>

		<?php endif; ?>

		<div id="full-width-nav" class="py-lg-1 bg-orange shadow-bottom-sm">

			<div class="container">

				<div class="row">

					<div class="col-12">

						<nav class="navbar navbar-expand-lg navbar-light justify-content-center">

							<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#subpage-nav-mobile" aria-controls="subpage-nav-mobile" aria-expanded="false" aria-label="Toggle navigation">

								<i class="fas fa-chevron-down"></i> <?php _e('Menu'); ?>

							</button>

							<div class="collapse navbar-collapse d-none d-lg-block" id="subpage-nav">

								<ul class="navbar-nav m-0">

									<?php if ( get_field('menu_type') == 'Custom' ): ?>

										<?php while ( have_rows('sub_menu_pages') ): the_row(); ?>

											<?php $page = get_sub_field('page'); ?>

											<li class="page_item"><a href="<?php echo get_the_permalink( $page ); ?>"><?php echo get_the_title( $page ); ?></a></li>

										<?php endwhile; ?>									

									<?php else: ?>

										<li class=<?php echo ( is_page( $pages['parent'] ) ? '"nav-item active current_page_item"' : '"nav-item"' ); ?>><a href="<?php the_permalink( $pages['parent'] ); ?>"><?php echo get_the_title( $pages['parent'] ); ?></a></li>

										<?php echo $pages['children']; ?>

									<?php endif; ?>

								</ul>

							</div>

						</nav>

					</div>

				</div>

			</div>

			<div class="collapse navbar-collapse bg-white py-1 d-lg-none" id="subpage-nav-mobile">

				<ul class="navbar-nav m-0">

					<?php if ( get_field('menu_type') == 'Custom' ): ?>

						<?php while ( have_rows('sub_menu_pages') ): the_row(); ?>

							<?php $page = get_sub_field('page'); ?>

							<li class="page_item"><a href="<?php echo get_the_permalink( $page ); ?>"><?php echo get_the_title( $page ); ?></a></li>

						<?php endwhile; ?>

					<?php else: ?>

						<li <?php echo ( is_page( $pages['parent'] ) ? 'class="nav-item active current_page_item"' : 'class="nav-item"'); ?>><a href="<?php the_permalink( $pages['parent'] ); ?>"><?php echo get_the_title( $pages['parent'] ); ?></a></li>

						<?php echo $pages['children']; ?>

					<?php endif; ?>

				</ul>

			</div>

		</div>

	<?php endif; ?>

	<?php

	while ( have_posts() ) { 
		
		the_post();

		get_template_part( 'template-parts/content', 'page-full' );

	}

	?>

</div>

<?php get_template_part( 'template-parts/content', 'page-full-footer'); ?>

<?php get_footer(); ?>