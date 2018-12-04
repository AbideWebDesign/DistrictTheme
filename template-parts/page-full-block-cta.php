<?php $type = get_sub_field('call_to_action_type'); ?>
<div id="cta-block" class="py-2 <?php the_sub_field('call_to_action_background_color'); ?>">
	<div class="container">
		<div class="row justify-content-center">
			<?php if($type == "Form"): ?>
				<div id="cta-block-heading" class="<?php echo (get_sub_field('call_to_action_form_type') == 'Horizontal' ? 'col-md-4 text-right' : 'col-12 mb-1'); ?>">
					<h2 class="mb-0"><?php the_sub_field('call_to_action_heading'); ?></h2>
				</div>
				<div class="<?php echo (get_sub_field('call_to_action_form_type') == 'Horizontal' ? 'col-md-8' : 'col-12'); ?>">
					<?php $form_object = get_sub_field('call_to_action_form'); ?>
					<?php echo do_shortcode('[gravityform id="' . $form_object['id'] . '" title="false" description="false" ajax="true"]'); ?>
				</div>
			<?php elseif ($type == "Button"): ?>
				<div id="cta-block-button" class="align-self-center <?php echo (get_sub_field('call_to_action_button_type') == 'Horizontal' ? 'col-12 col-md-auto mb-1 mb-md-0' : 'col-12 mb-1'); ?>">
					<h2 class="mb-0"><?php the_sub_field('call_to_action_heading'); ?></h2>
				</div>
				<div class="col-12 col-md-auto text-center text-md-left">		
					<a href="<?php the_sub_field('call_to_action_button_link'); ?>" class="btn btn-white"><?php the_sub_field('call_to_action_button_label'); ?></a>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>