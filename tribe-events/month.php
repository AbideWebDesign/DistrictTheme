<?php
/**
 * Month View Template
 * The wrapper template for month view.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/month.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
?>
<div class="row">
	<div class="col-sm-8">
		<h1 class="margin-bottom-one"><?php the_field('calendar_title', 'options'); ?></h1>
		<?php the_field('calendar_text', 'options'); ?>
	</div>
	<div class="col-sm-3 col-sm-offset-1">
		<div class="well">
			<h4><i class="fa fa-download"></i> Downloadable Calendars</h4>
			<ul class="list list-unstyled margin-none">
				<li><a href="<?php the_field('elementary_middle_school_calendar', 'options'); ?>" target="_blank">Elementary/Middle School</a></li>
				<li><a href="<?php the_field('high_school_calendar', 'options'); ?>" target="_blank">High School</a></li>
				<li><a href="<?php the_field('elementary_middle_school_calendar_es', 'options'); ?>" target="_blank">Primaria y Secundaria</a></li>
				<li><a href="<?php the_field('high_school_calendar_es', 'options'); ?>" target="_blank"> Preparatoria</a></li>
			</ul>
		</div>

	</div>
</div>
<?php
do_action( 'tribe_events_before_template' );

// Main Events Content
tribe_get_template_part( 'month/content' );

do_action( 'tribe_events_after_template' );?>