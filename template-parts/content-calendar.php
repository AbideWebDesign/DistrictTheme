<?php
global $post;

if ( get_field('sidebar_calendar_block') ): 
	
	$event_cat = get_field('sidebar_calendar_block');
	$events = tribe_get_events( array(
    	'eventDisplay'=>'upcoming',
    	'tax_query'=> array(
        	array(
                'taxonomy' => 'tribe_events_cat',
                'field' => 'slug',
                'terms' => $event_cat->slug
         	)
         )
	) );

	if ($events):
	?>	

		<div class="sidebar-calendar">
			<h4>Upcoming Events</h4>
			<?php echo do_shortcode('[tribe_events_list limit="3" category="' . $event_cat->slug . '"]'); ?>
		
		</div>
	
	<?php 

	endif;

endif; 

?>