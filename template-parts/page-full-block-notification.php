<div class="py-2">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="notification d-flex flex-column flex-sm-row bg-white py-1 px-1 px-lg-2 w-100 align-items-center text-center">
					<div class="mb-1 mb-md-0"><i class="fa fa-bullhorn text-primary mr-1"></i> <?php the_sub_field('notification_text'); ?></div>
					<div class="ml-md-auto"><a class="btn btn-primary btn-sm" href="<?php the_sub_field('notification_button_link'); ?>"><?php the_sub_field('notification_button_label'); ?></a></div>
				</div>
			</div>
		</div>
	</div>
</div>
