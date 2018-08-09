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
	<div class="padding-vertical-four bg-secondary">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<h1 class="margin-bottom-none"><?php the_field('calendar_title', 'options'); ?></h1>
				</div>
			</div>
		</div>
	</div>
	<div class="padding-vertical-two bg-gray">
		<div class="container">
			<div class="row">
				<div class="col-sm-7">
					<p class="lead"><?php the_field('calendar_text', 'options'); ?></p>
				</div>
				<div class="col-sm-5">
					<?php get_template_part('template-parts/page-block', 'table-dates'); ?>
					<?php get_template_part('template-parts/page-block', 'table-calendar-downloads'); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="padding-vertical-four">
		<div class="container">
			<?php render_calendar(); ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>