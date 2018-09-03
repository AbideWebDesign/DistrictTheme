<?php

// find date time now
$tz = new DateTimeZone('America/Los_Angeles');
$date_now = new DateTime();
$date_now->setTimezone($tz);

// query events
$args = array(
	'posts_per_page'	=> 1,
	'post_type'			=> 'emergency-alert',
	'meta_query' 		=> array(
		'relation' 			=> 'AND',
		array(
	        'key'			=> 'start_time',
	        'compare'		=> '<=',
	        'value'			=> $date_now->format('Y-m-d H:i:s'),
	        'type'			=> 'DATETIME'
	    ),
	    array(
	        'key'			=> 'end_time',
	        'compare'		=> '>=',
	        'value'			=> $date_now->format('Y-m-d H:i:s'),
	        'type'			=> 'DATETIME'
	    )
    ),
	'order'				=> 'ASC',
	'orderby'			=> 'meta_value',
	'meta_key'			=> 'start_time',
	'meta_type'			=> 'DATE'
);

$query = new WP_Query($args);
    if ($query->have_posts()) :
    	while ($query->have_posts()) : $query->the_post(); ?>
		<div class="alert-emergency-body" style="background-color: #<?php the_field('alert_color', get_the_ID()); ?>">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<h4><?php the_field('alert_sub_title', get_the_ID()); ?></h4>	
						<h3>
							<?php if ( get_field('link_to_post', get_the_id()) ): ?>
								<a href="<?php the_field('link', get_the_id()); ?>">
							<?php endif; ?>
							
							<?php the_title(); ?>
							
							<?php if ( get_field('link_to_post', get_the_id()) ): ?>
								</a>
							<?php endif; ?>
						</h3>
					</div>
				</div>				
			</div>
		</div>
	<?php endwhile; ?>
<?php endif; ?>
<?php wp_reset_postdata(); ?>