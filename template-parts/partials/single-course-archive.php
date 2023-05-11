<?php
/**
 * Post rendering content according to caller of get_template_part
 *
 * @package msd_schools
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>

<div class="bg-white p-2 shadow-sm mb-2">

	<header id="course-header">
				
		<h2 class="text-body"><?php the_title(); ?></h2>
				
		<div><?php the_field('course_description'); ?></div>
		
		<div class="d-flex mt-1">
			
			<div class="badge badge-secondary"><?php _e('Grades:'); ?> <?php echo get_course_grades( get_field('grades') ); ?></div>
			
			<div class="badge badge-secondary"><?php _e('Credits:'); ?> <?php the_field('credit'); ?></div>

			<?php if ( get_field('credit_type') ): ?>
			
				<div class="badge badge-secondary"><?php _e('Credit Type: '); ?> <?php the_field('credit_type'); ?></div>
			
			<?php endif; ?>
			
			<?php if ( get_field('opu_credit_type') ): ?>
			
				<div class="badge badge-secondary"><?php _e('OPU Credit Type: '); ?> <?php the_field('opu_credit_type'); ?></div>
			
			<?php endif; ?>

			<?php if ( get_field('cte_course') ): ?>
			
				<div class="badge badge-secondary"><?php _e('CTE: Yes'); ?></div>
			
			<?php endif; ?>
			
			<?php if ( get_field('extended_application') ): ?>
			
				<div class="badge badge-secondary"><?php _e('Extended Application'); ?></div>
			
			<?php endif; ?>
						
		</div>

		<?php if ( get_field('prerequisite') ): ?>
				
			<div class="mt-1 prereqs">
				
				<div class="d-flex">
					
				<div class="mr-1"><em><?php _e('Prerequisites:'); ?></em></div>
									
				<div class="prereq"><?php the_field('prerequisite'); ?></div>
		
			</div>
		
		<?php endif; ?>
		
	</header>

</div>