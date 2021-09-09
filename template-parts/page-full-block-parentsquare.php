<div class="py-3">
	
	<div class="container">
		
		<div class="row">
			
			<div class="col-12 mb-1">
					
				<div class="d-flex justify-content-between">
					<div class="align-self-center">
						<h2 class="mb-0"><?php the_sub_field('parentsquare_section_header'); ?></h2>
					</div>
					<div class="align-self-center">
						<small><a class="btn btn-primary" href="<?php the_sub_field('parentsquare_feed'); ?>"><?php _e('More Updates','csdschools'); ?></a></small>	
					</div>
				</div>
				
			</div>
			
			<div class="col-12">
			
				<iframe src="https://www.parentsquare.com/schools/<?php the_sub_field('parentsquare_feed_id', 'options'); ?>/rss_widget" title="New School Posts From ParentSquare" height="500px" scrolling="no" frameborder="0" width="100%" style="border:none;overflow:hidden;"></iframe>
	
			</div>
			
		</div>
		
	</div>
	
</div>