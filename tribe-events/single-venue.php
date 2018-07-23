<?php
/**
 * Single Venue Template
 * The template for a venue. By default it displays venue information and lists
 * events that occur at the specified venue.
 *
 * This view contains the filters required to create an effective single venue view.
 *
 * You can recreate an ENTIRELY new single venue view by doing a template override, and placing
 * a single-venue.php file in a tribe-events/pro/ directory within your theme directory, which
 * will override the /views/pro/single-venue.php.
 *
 * You can use any or all filters included in this file or create your own filters in
 * your functions.php. In order to modify or extend a single filter, please see our
 * readme on templates hooks and filters (TO-DO)
 *
 * @package TribeEventsCalendarPro
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$venue_id = get_the_ID();
$venue_name = tribe_get_venue( $venue_id );
?>
<?php while ( have_posts() ) : the_post(); ?>
<div class="row tribe-events-venue">
	<div class="col-main col-sm-9 pull-right">
		<div class="tribe-clearfix">
			<!-- Venue Title -->
			<?php do_action( 'tribe_events_single_venue_before_title' ) ?>
			<h1 class="tribe-venue-name"><?php echo tribe_get_venue( $venue_id ); ?> Events</h1>
			<?php do_action( 'tribe_events_single_venue_after_title' ) ?>
	
	
			<div class="tribe-events-event-meta tribe-single-meta">
				<div class="row">
					<div class="col-sm-6">
						<!-- Venue Meta -->
						<?php do_action( 'tribe_events_single_venue_before_the_meta' ) ?>
						<?php echo tribe_get_meta_group( 'tribe_event_venue' ) ?>
						<?php do_action( 'tribe_events_single_venue_after_the_meta' ) ?>
						<?php if ( tribe_show_google_map_link() && tribe_address_exists() ) : ?>
							<!-- Google Map Link -->
							<?php echo tribe_get_meta( 'tribe_event_venue_gmap_link' ); ?>
						<?php endif; ?>
					</div>
					<div class="col-sm-6 text-right">
						<div class="addthis_sharing_toolbox"></div>
					</div>
				</div>
			</div><!-- .tribe-events-event-meta -->
	
			<!-- Venue Description -->
			<?php if ( get_the_content() ) : ?>
			<div class="tribe-venue-description tribe-events-content">
				<?php the_content(); ?>
			</div>
			<?php endif; ?>
	
			<!-- Venue Featured Image -->
			<?php echo tribe_event_featured_image( null, 'full' ) ?>
	
		</div><!-- .tribe-events-event-meta -->
	
		<!-- Upcoming event list -->
		<?php do_action( 'tribe_events_single_venue_before_upcoming_events' ) ?>
	
		<?php
		// Use the tribe_events_single_venuer_posts_per_page to filter the number of events to get here.
		echo tribe_venue_upcoming_events( $venue_id ); ?>
	
		<?php do_action( 'tribe_events_single_venue_after_upcoming_events' ) ?>
	</div>
	<div class="col-sm-3 col-xs-12 pull-left">
		<?php echo do_shortcode("[tribe_mini_calendar venue='$venue_name' limit='3']"); ?>
		<p class="tribe-events-back">
			<a href="<?php echo esc_url( tribe_get_events_link() ); ?>"> <?php printf( '&laquo; ' . esc_html__( 'View All Events %s', 'the-events-calendar' ), $events_label_plural ); ?></a>
		</p>
		<!-- Event meta -->
	</div>
</div><!-- .tribe-events-venue -->
<?php
endwhile;
