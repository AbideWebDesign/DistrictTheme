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
	<div class="bg-gray py-2">
		<div class="container">
			<div class="row">
				<div class="col-md-7">
					<p class="lead"><?php the_field('calendar_text', 'options'); ?></p>
				</div>
				<div class="col-md-5">
					<?php get_template_part('template-parts/page-block', 'table-dates'); ?>
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