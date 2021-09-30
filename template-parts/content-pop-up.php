<?php

// find date time now
$tz = new DateTimeZone( 'America/Los_Angeles' );
$date_now = new DateTime();
$date_now->setTimezone( $tz );

// query events
$args = array(
	'posts_per_page'	=> 1,
	'post_type'			=> 'emergency-alert',
	'meta_query' 		=> array(
		'relation' 			=> 'AND',
		array(
	        'key'			=> 'start_time',
	        'compare'		=> '<=',
	        'value'			=> $date_now->format( 'Y-m-d H:i:s' ),
	        'type'			=> 'DATETIME'
	    ),
	    array(
	        'key'			=> 'end_time',
	        'compare'		=> '>=',
	        'value'			=> $date_now->format( 'Y-m-d H:i:s' ),
	        'type'			=> 'DATETIME'
	    ), 
	    array(
			'key'	 	=> 'alert_type',
			'value'	  	=> array( 'Both', 'Pop-up' ),
			'compare' 	=> 'IN',
		),
		array(
			'relation' => 'OR',
			array(
				'key'		=> 'pop_up_location', 
				'value'		=> 'all_pages',
			),
			array(
				'relation' => 'AND',
				array(
					'key' 	=> 'pop_up_location',
					'value' => 'select_page',					
				),
				array(
					'key' 		=> 'pop_up_pages',
					'value' 	=> get_the_id(),
					'compare'	=> 'LIKE',
				),
			),
		),
    ),
	'order'				=> 'ASC',
	'orderby'			=> 'meta_value',
	'meta_key'			=> 'start_time',
	'meta_type'			=> 'DATE'
);

$query = new WP_Query( $args );

    if ( $query->have_posts() ) :
    
    	while ( $query->have_posts() ) : $query->the_post(); ?>

	    	<script>
	    	
	    	$( document ).ready( function() {
			
				if ( typeof Cookies.get( 'csd_pop_up_visited_<?php echo get_the_id(); ?>' ) === 'undefined' ) {
				  
					const urlParams = new URLSearchParams( window.location.search );
					
					const myParam = urlParams.get('csd_pop');
					
					if ( myParam == <?php echo get_the_id(); ?> ) {
					  
					   Cookies.set( 'csd_pop_up_visited_<?php echo get_the_id(); ?>', 1, { expires: 365 } );
					  
					} else {
					  
					  Cookies.set( 'csd_pop_up_visited_<?php echo get_the_id(); ?>', 0, { expires: 365 } );
					  
					}
				
				}
				
				if ( parseInt( Cookies.get( 'csd_pop_up_visited_<?php echo get_the_id(); ?>' ) ) == 0 ) {
					
					setTimeout( function() {
						
						$( '#modalPopup' ).modal( 'show' );
					
					}, 500 );
				
				}
				
				$( '#modalPopup' ).on( 'hide.bs.modal', function ( e ) {
					
					Cookies.set( 'csd_pop_up_visited_<?php echo get_the_id(); ?>', 1, { expires: 365 } );
				
				} );
				
				$( '.btn-popup').on( 'click', function ( e ) {
				
					Cookies.set( 'csd_pop_up_visited_<?php echo get_the_id(); ?>', 1, { expires: 365 } );
					
				} );
		
		  } );
		  
		</script>
		
		<div class="modal fade" id="modalPopup" tabindex="-1" role="dialog" aria-labelledby="modalPopup" aria-hidden="true">

			<div class="modal-dialog" role="document">

				<div class="modal-content">

					<?php if ( get_field('pop_up_image', get_the_ID()) ): ?>

						<div class="modal-header p-0">

							<div class="d-flex w-100 h-100 justify-content-center">

								<?php echo wp_get_attachment_image( get_field('pop_up_image', get_the_ID()), 'News Image Medium', false, array('class'=>'img-fluid w-100') ); ?>

							</div>

						</div>		

					<?php else: ?>

						<div class="modal-header bg-dark py-3">

							<div class="d-flex w-100 h-100 justify-content-center">

								<i class="fas fa-comment-alt fa-3x text-white"></i>

							</div>

						</div>						

					<?php endif; ?>

					<div class="modal-body p-2 text-center">

						<h5 class="font-weight-bold text-uppercase text-primary"><?php the_field('alert_sub_title', get_the_ID()); ?></h5>

						<h2 class="small text-body mb-0"><?php the_title(); ?></h2>

					</div>

					<div class="modal-footer justify-content-center">

						<?php if ( get_field('link_to_post', get_the_id()) ): ?>

							<div class="mr-1">

								<a href="#" class="btn btn-dark btn-lg" data-dismiss="modal" aria-label="Close"><?php _e('Close','csd'); ?></a>

							</div>

							<div>

								<a href="<?php the_field('link', get_the_id()); ?>" class="btn-popup btn btn-primary btn-lg" <?php echo ( get_field('link_type', get_the_ID()) == 'External' ? 'target="_blank"' : '' ); ?>><?php _e('Details','csd'); ?></a>

							</div>

						<?php else: ?>

							<a href="#" class="btn btn-dark btn-lg btn-block" data-dismiss="modal" aria-label="Close"><?php _e('Close','csd'); ?></a>

						<?php endif; ?>

					</div>

				</div>

			</div>

		</div>
		
	<?php endwhile; ?>

<?php endif; ?>

<?php wp_reset_postdata(); ?>