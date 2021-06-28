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
	<div class="bg-gray py-3">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-12 mb-2">
					<div class="lead"><?php the_field('calendar_text', 'options'); ?></div>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-8">
					<?php get_template_part('template-parts/page-block', 'table-dates'); ?>
				</div>
				<div class="col-md-6 col-lg-4 mt-2 mt-md-0">
					<?php get_template_part('template-parts/page-block', 'table-calendar-downloads'); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="py-3">
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