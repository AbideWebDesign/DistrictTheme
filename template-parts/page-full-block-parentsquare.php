<div class="pb-3">
	
	<div class="container">
		
		<div class="row">
			
			<div class="col-12">
									
				<h2 class="headline"><?php the_sub_field('parentsquare_section_header'); ?></h2>
												
			</div>
			
			<div class="col-12">
			
				<div class="shadow-sm bg-white rounded p-1">
					
					<iframe src="https://www.parentsquare.com/schools/<?php the_sub_field('parentsquare_feed_id', 'options'); ?>/rss_widget" title="New School Posts From ParentSquare" height="500px" scrolling="no" frameborder="0" width="100%" style="border:none;overflow:hidden;"></iframe>
	
					<div class="mt-2 mb-1 text-center">
						
						<h3><a href="<?php the_sub_field('parentsquare_feed'); ?>"><?php _e('More Updates','csd'); ?></a></h3>
						
					</div>
				
				</div>
					
			</div>
			
		</div>
		
	</div>
	
</div>