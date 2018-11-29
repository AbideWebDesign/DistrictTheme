<?php 
/**
 * Template Name: eFriday Submit
 *
 * @package WordPress
 * @subpackage CSD
 * @since CSD 1.0
 */
acf_form_head();
get_header('simple'); 
?>

<div id="primary" class="content-area py-2">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<?php get_sidebar(); ?>
			</div>
			<div class="col-md-9">
				<header class="entry-header pb-1">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header><!-- .entry-header -->
				<?php the_field('content'); ?>
				<div class="acf-form mt-2">
					<?php
			
					// Start the loop.
					while ( have_posts() ) : the_post();
					
						$new_post = array(
							'post_id'            => 'new_post', // Create a new post
							'new_post'			 => array('post_type'=>'efriday', 'post_status'=>'draft'),
							'field_groups'       => array(2609), // Create post field group ID(s)
							'post_title'		 => false,
							'post_content' 		 => false,
							'form'               => true,
							'html_before_fields' => '',
							'html_after_fields'  => '',
							'label_placement' 	 => 'top',
							'instruction_placement' => 'label',
							'uploader' 			 => 'basic',
							'honeypot' 			 => true,
							'submit_value'       => 'Submit',
							'updated_message'    => '<div class="alert alert-info"><h4 class="text-center margin-bottom-none">Your submission has been received for review!</h4></div>'
						);
					?>
					
					<?php
					
					acf_form( $new_post );
				
					endwhile;
					
					?>
				</div>
	
			</div>
			<div class="col-12 col-md-3 float-left">
				<?php get_template_part( 'template-parts/content', 'callouts' ); ?>
				<?php get_template_part( 'template-parts/content', 'calendar' ); ?>
				<?php get_template_part( 'template-parts/content', 'contacts' ); ?>			
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>