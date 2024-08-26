<?php 
/**
 * Template Name: Calendar
 *
 * @package WordPress
 * @subpackage Corvallis School District Theme
 * @since CSD 1.0.4
 */
 get_header();
?>
<div id="primary" class="content-area">
	<div class="bg-orange py-3">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h1 class="mb-0"><?php the_field('calendar_title', 'options'); ?></h1>
				</div>
			</div>
		</div>
	</div>
	<div class="page-content py-3">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<?php get_template_part( 'template-parts/page', 'blocks' ); ?>					
				</div>
			</div>
		</div>
	</div>
	<div class="py-3 bg-light">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<?php render_calendar(); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>