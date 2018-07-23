<?php
/**
 * Single Event Template
 * A single event. This displays the event title, description, meta, and
 * optionally, the Google map for the event.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/single-event.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$events_label_singular = tribe_get_event_label_singular();
$events_label_plural = tribe_get_event_label_plural();

$event_id = get_the_ID();

?>
<?php while ( have_posts() ) :  the_post(); ?>
<div class="tribe-events-single row">
	<div class="col-main col-sm-9 pull-right">
		<!-- Notices -->
		<?php tribe_the_notices() ?>
		<div class="row tribe-clearfix">
			<div class="col-sm-12">
				<div class="tribe-single-meta">
					<div class="row">
						<div class="col-sm-12 col-xs-12">
							<div class="single-events-header">
								<h4>Corvallis School District Calendar</h4>
								<h2>Upcoming Events</h2>
							</div>
						</div>						
					</div>
				</div>
			</div>
		</div>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
			<!-- Event featured image, but exclude link -->
			<?php echo tribe_event_featured_image( $event_id, 'full', false ); ?>

			<!-- Event content -->
			<?php do_action( 'tribe_events_single_event_before_the_content' ) ?>
			<div class="tribe-events-single-event-description tribe-events-content">
				<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
				<?php echo tribe_events_event_schedule_details( $event_id, '<h3>', '</h3>' ); ?>
				<?php if ( tribe_get_cost() ) : ?>
					<span class="tribe-events-divider">|</span>
					<span class="tribe-events-cost"><?php echo tribe_get_cost( null, true ) ?></span>
				<?php endif; ?>
							
				<?php the_content(); ?>
			</div>
		</div> <!-- #post-x -->
		<?php if ( get_post_type() == Tribe__Events__Main::POSTTYPE && tribe_get_option( 'showComments', false ) ) comments_template() ?>
		<?php if ( tribe_has_organizer() || tribe_has_venue() ): ?>
			<?php do_action( 'tribe_events_single_event_before_the_meta' ) ?>
			<?php tribe_get_template_part( 'modules/meta' ); ?>
			<?php //do_action( 'tribe_events_single_event_after_the_meta' ) ?> 
			<!-- .tribe-events-single-event-description -->
			<?php do_action( 'tribe_events_single_event_after_the_content' ) ?>
		<?php endif; ?>
		<div class="row">
			<div class="col-sm-6">
				<p class="tribe-events-back">
					<a href="<?php echo esc_url( tribe_get_events_link() ); ?>"> <?php printf( '&laquo; ' . esc_html__( 'All %s', 'the-events-calendar' ), $events_label_plural ); ?></a>
				</p>
			</div>
			<div class="col-sm-6 text-right">
				<div class="addthis_sharing_toolbox"></div>
			</div>
		</div>
	</div>
	<div class="col-sm-3 col-xs-12 pull-left">
		<?php echo do_shortcode("[tribe_mini_calendar count='3']"); ?>
		<p class="tribe-events-back">
			<a href="<?php echo esc_url( tribe_get_events_link() ); ?>"> <?php printf( '&laquo; ' . esc_html__( 'All %s', 'the-events-calendar' ), $events_label_plural ); ?></a>
		</p>
		<!-- Event meta -->
	</div>
</div><!-- #tribe-events-content -->
<?php endwhile; ?>
