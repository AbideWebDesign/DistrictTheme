<?php 
$views   = tribe_events_get_views();

$current_url = tribe_events_get_current_filter_url();

if ( count( $views ) > 1 ) { ?>
<form id="tribe-bar-form" class="tribe-clearfix" name="tribe-bar-form" method="post" action="<?php echo esc_attr( $current_url ); ?>">
	<div id="tribe-bar-views">
		<div class="tribe-bar-views-inner tribe-clearfix">
			<h3 class="tribe-events-visuallyhidden"><?php esc_html_e( 'Event Views Navigation', 'the-events-calendar' ) ?></h3>
			<select class="tribe-bar-views-select tribe-no-param" name="tribe-bar-view">
				<?php foreach ( $views as $view ) : ?>
					<option <?php echo tribe_is_view( $view['displaying'] ) ? 'selected' : 'tribe-inactive' ?> value="<?php echo esc_attr( $view['url'] ); ?>" data-view="<?php echo esc_attr( $view['displaying'] ); ?>">
						<?php echo $view['anchor']; ?>
					</option>
				<?php endforeach; ?>
			</select>
		</div><!-- .tribe-bar-views-inner -->
	</div><!-- .tribe-bar-views -->
</form>
<?php } ?>