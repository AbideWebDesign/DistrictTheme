<?php $type = get_sub_field('call_to_action_type'); ?>

<div id="cta-block" class="padding-two margin-vertical-two">
	<div class="row">
		<?php if($type == "Form"): ?>
			<div id="cta-block-heading" class="<?php echo (get_sub_field('call_to_action_form_type') == 'Horizontal' ? 'col-lg-4 text-right' : 'col-xs-12 margin-bottom-half'); ?>">
				<h2><?php the_sub_field('call_to_action_heading'); ?></h2>
			</div>
			<div class="<?php echo (get_sub_field('call_to_action_form_type') == 'Horizontal' ? 'col-lg-8' : 'col-xs-12'); ?>">
				<?php $form_object = get_sub_field('call_to_action_form'); ?>
				<?php echo do_shortcode('[gravityform id="' . $form_object['id'] . '" title="false" description="false" ajax="true"]'); ?>
			</div>
		<?php elseif ($type == "Button"): ?>
				<div id="cta-block-button" class="<?php echo (get_sub_field('call_to_action_button_type') == 'Horizontal' ? 'col-lg-12' : 'col-xs-12 margin-bottom-half text-center'); ?>">
					<ul class="list-unstyled <?php echo (get_sub_field('call_to_action_button_type') == 'Horizontal' ? 'list-inline' : ''); ?>">
						<li><h2 class="<?php echo (get_sub_field('call_to_action_button_type') == 'Vertical' ? 'margin-bottom-half' : 'margin-bottom-none'); ?>"><?php the_sub_field('call_to_action_heading'); ?></h2></li>
						<li><a href="<?php the_sub_field('call_to_action_button_link'); ?>" class="btn btn-white"><?php the_sub_field('call_to_action_button_label'); ?></a></li>
					</ul>
				</div>
		<?php endif; ?>
	</div>
</div>