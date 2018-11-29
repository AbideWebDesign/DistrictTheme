<?php $type = get_sub_field('call_to_action_type'); ?>

<div id="cta-block" class="p-2 my-2">
	<div class="row">
		<?php if($type == "Form"): ?>
			<div id="cta-block-heading" class="<?php echo (get_sub_field('call_to_action_form_type') == 'Horizontal' ? 'col-md-4 text-right' : 'col-12 mb-1'); ?>">
				<h2><?php the_sub_field('call_to_action_heading'); ?></h2>
			</div>
			<div class="<?php echo (get_sub_field('call_to_action_form_type') == 'Horizontal' ? 'col-md-8' : 'col-12'); ?>">
				<?php $form_object = get_sub_field('call_to_action_form'); ?>
				<?php echo do_shortcode('[gravityform id="' . $form_object['id'] . '" title="false" description="false" ajax="true"]'); ?>
			</div>
		<?php elseif ($type == "Button"): ?>
				<div id="cta-block-button" class="<?php echo (get_sub_field('call_to_action_button_type') == 'Horizontal' ? 'col-md-12' : 'col-12 mb-1 text-center'); ?>">
					<ul class="list-unstyled <?php echo (get_sub_field('call_to_action_button_type') == 'Horizontal' ? 'list-inline' : ''); ?>">
						<li><h2 class="<?php echo (get_sub_field('call_to_action_button_type') == 'Vertical' ? 'mb-1' : 'mb-0'); ?>"><?php the_sub_field('call_to_action_heading'); ?></h2></li>
						<li><a href="<?php the_sub_field('call_to_action_button_link'); ?>" class="btn btn-white"><?php the_sub_field('call_to_action_button_label'); ?></a></li>
					</ul>
				</div>
		<?php endif; ?>
	</div>
</div>