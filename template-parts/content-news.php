<div class="row">
	<div class="col-lg-9 entry-content">
		<?php
		// check for rows (parent repeater)
		if( have_rows('post_content_blocks') ):
			
			while( have_rows('post_content_blocks') ): the_row(); 
				
				if( get_sub_field('lead_text_block') ): ?>
					
					<div class="entry-lead">
						<p class="lead"><?php the_sub_field('lead_text_block'); ?></p>
					</div>			
				
				<?php 
				
				endif;
				
				if( get_row_layout() == 'text_block' ):
					
					if( get_sub_field('heading') ): ?>
			
						<h2><?php the_sub_field('heading'); ?></h2>
			
					<?php 
					
					endif;
			
					if( get_sub_field('text') ):
					
						the_sub_field('text'); 
						
					endif; 
					
				endif; 
				
				if( get_row_layout() == 'button_group' ):
					
					if( have_rows('button') ): ?>
					
						<div class="pb-1">
						
							<div class="row mb-2">
								<?php
									while ( have_rows('button') ) : the_row();	
									
										if ( get_sub_field('internal_page') ) {
									
											$link = get_sub_field('internal_page');
									
										} else if ( get_sub_field('internal_media') ) {
									
											$link = get_sub_field('internal_media');
									
										} else if ( get_sub_field('external_link') ) {
									
											$link = get_sub_field('external_link');
									
										}
										
										if ( get_sub_field('button_type') == "Primary" ) {
											
											$class = "btn-primary";
											
										} else {
											
											$class = "btn-secondary";
											
										}
								?>	
								<div class="col-12 col-sm-6 col-lg-4 d-flex align-items-center mb-1 mb-lg-0">
									<a <?php if ( get_sub_field('external_link') || get_sub_field('internal_media') ): ?> target="_blank" <?php endif; ?> href="<?php echo $link; ?>" class="btn <?php echo $class; ?> d-flex w-100 align-items-center align-self-stretch"><div class="w-100 text-center"><?php the_sub_field('button_text'); ?></div></a>
								</div>
								<?php endwhile; ?>
							</div>
						
						</div>
					
					<?php
						
					endif;
					
				endif; 
										
				if( get_row_layout() == 'blockquote' ): ?>
				
					<div class="blockquote">
						
						<p><?php the_sub_field('blockquote_text'); ?></p>
						
						<?php if ( get_sub_field('blockquote_source') ): ?>
						
							<div class="blockquote_source">
							
								<?php the_sub_field('blockquote_source'); ?>
								
							</div>
							
						<?php 
						
						endif;
						
						?>
						
					</div>
				
				<?php
				
				endif;
				
				if( get_row_layout() == 'table' ): ?>
				
					<?php get_template_part('template-parts/page-block', 'table'); ?>
									
				<?php
				
				endif;
				
			endwhile;
			
		endif; ?>
	</div>
	<div class="col-lg-3 mt-1 mt-lg-0">
		<div class="bg-gray p-1 mb-2">
			<div class="post-meta">
				<span id="post-date"><?php the_date(); ?></span><br>
				<span id="post-author">By <?php the_author(); ?></span>
			</div>
			<div class="post-social">
				<div class="addthis_sharing_toolbox"></div>			
			</div>
		</div>
		<?php get_template_part( 'template-parts/content', 'news-sidebar' ); ?>
	</div>
</div>