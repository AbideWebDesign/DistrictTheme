<?php 
/**
 * Template Name: eFriday Folder
 *
 * @package WordPress
 * @subpackage CSD
 * @since CSD 1.0
 */
get_header(); 

$tz = new DateTimeZone('America/Los_Angeles');
$date_now = new DateTime();
$date_now->setTimezone($tz);

$folder = get_field('efriday_folder');

$args = array(
	'post_type'  => 'efriday',
	'posts_per_page' => -1,
	'post_status' => 'publish',
	'tax_query' => array(
		array(
			'taxonomy' => 'efriday-category',
			'field'    => 'name',
			'terms'    => $folder->name,
		),
	),
    'meta_query' => array(
        array(
            'key' => 'start_date',
            'value' => $date_now->format('Y-m-d H:i:s'),
            'type' => 'DATE',
            'compare' => '<=',
        ),
        array(
            'key' => 'end_date',
            'value' => $date_now->format('Y-m-d H:i:s'),
            'type' => 'DATE',
            'compare' => '>=',
        ),
    ),
    'meta_key' => 'start_date',
	'order' => 'DESC',
);

?>

<div id="primary" class="content-area padding-vertical-two">
	<div class="container">
		<div class="row">
			<div class="col-sm-3 col-xs-12">
				<?php get_sidebar(); ?>
			</div>
			<div class="col-main col-sm-9 col-xs-12 pull-right">
				<main id="main" class="site-main" role="main">
					<?php
					
					if ( function_exists('yoast_breadcrumb') ):
						
						yoast_breadcrumb('<p class="small padding-bottom-two" id="breadcrumbs">','</p>');
						
					endif;
					 
					?>
					
					<h1 class="padding-bottom-one"><?php the_title(); ?></h1>
					
					<?php
					
					$the_query = new WP_Query( $args );			
					
					if ( $the_query->have_posts() ) :

					?>
					
					<ul class="list list-bordered list-unstyled">
										
						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>						
							<li>
								<div class="row">
									<div class="col-sm-8">
										<h3><?php the_field('event_name'); ?></h3>
										<h4><small>Organization: </small><?php the_field('name_of_organization'); ?></h4>
										<?php if(get_field('targeted_age_group')): ?>
											<h4><small>Age Group: </small> <?php the_field('targeted_age_group');  ?></h4>
										<?php endif; ?>
										<?php the_field('event_description'); ?>
									</div>
									<div class="col-sm-4">
										<div class="well margin-bottom-none">
											<div class="meta-content">
												<div class="padding-bottom-quarter"><strong>Contact Info</strong><br>
												<?php the_field('contact_person'); ?><br><?php the_field('contact_phone_number'); ?> <br>
												<a href="mailto:<?php the_field('contact_email'); ?>">Email Contact</a>
												</div>
												<?php if ( get_field('attach_pdf') ): ?>
													<a href="<?php the_field('attach_pdf'); ?>" class="btn btn-primary btn-block" target="_blank"><i class="fa fa-file"></i> View Flyer</a>
												<?php endif; ?>
												<?php if ( get_field('attach_pdf_spanish') ): ?>
													<a href="<?php the_field('attach_pdf_spanish'); ?>" class="btn btn-secondary btn-block padding-top-one" target="_blank"><i class="fa fa-file"></i> View Flyer (Spanish)</a>
												<?php endif; ?>
												<?php if ( get_field('ticket_url') ): ?>
													<a href="<?php the_field('ticket_url'); ?>" class="btn btn-dark-gray btn-block padding-top-one" target="_blank"><i class="fa fa-external-link"></i> Website</a>
												<?php endif; ?>											
											</div>
										</div>
									</div>
								</div>
							</li>							 			
			
						<?php endwhile; ?>
						
						<?php wp_reset_postdata(); ?>
						
					</ul>
				
					<?php else: ?>
					
						<p><?php _e( 'Sorry, there are no current events in this category.' ); ?></p>
					
					<?php endif; ?>
					<div class="well well-small">
						<p>The Corvallis School District does not necessarily sponsor this organization or its activities. The District assumes no liability for its contents or events arising out of this distribution. </p>
					</div>
				</main><!-- .site-main -->
			</div>
			<div class="col-sm-3 col-xs-12 pull-left">
				<?php get_template_part( 'template-parts/content', 'callouts' ); ?>
				<?php get_template_part( 'template-parts/content', 'calendar' ); ?>
				<?php get_template_part( 'template-parts/content', 'contacts' ); ?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>