<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="post-title">', '</h1>' ); ?>
	</header>
	<div class="row">
		<div class="col-sm-9">
			<div class="entry-content">	
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
							
							<div class="padding-bottom-two">
							
							<?php
							
								while ( have_rows('button') ) : the_row();	
								
									if ( get_sub_field('internal_link') ) {
								
										$link = get_sub_field('internal_link');
								
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
								 	 			
								<a <?php if ( get_sub_field('external_link') ): ?> target="_blank" <?php endif; ?> href="<?php echo $link; ?>" class="btn <?php echo $class; ?>"><?php the_sub_field('button_text'); ?></a>
					
							<?php 
								
								endwhile; ?>
								
							</div>
							
							<?php
								
							endif;
							
						endif; 
						
						
						if( get_row_layout() == 'image' ): $image = get_sub_field('image'); ?>
						
							<div class="post-image">
							
								<?php 
								
								echo wp_get_attachment_image($image['id'], 'News Image Large', 0, array('class' => 'img img-responsive')); 
								
								if ( get_sub_field('image_caption') ) : ?>
								
									<p class="post-image-caption"><?php the_sub_field('image_caption'); ?></p>
									
								<?php 
								
								endif;
								
								?>
								
							</div>
							
						<?php
						
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
						
					endwhile;
					
				endif; ?>
				<div class="padding-top-four">
					<div class="post-meta">
						<span id="post-date"><?php the_time( get_option( 'date_format' ) ); ?>,</span>
						<span id="post-author"> by <?php the_author(); ?></span>
					</div>
				</div>
				
			</div><!-- .entry-content -->
		</div>
		<div class="col-sm-3 hidden-xs">
			<div class="post-meta">
				<span id="post-date"><?php the_date(); ?></span><br>
				<span id="post-author">By <?php the_author(); ?></span>
			</div>
			<div class="post-social">
				<div class="addthis_sharing_toolbox"></div>			
			</div>
		</div>
	</div>
</article><!-- #post-## -->