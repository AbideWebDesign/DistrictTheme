<?php

if ( get_field('featured_img', $post->ID) ) {
	
	$image = get_field('featured_img', $post->ID);
	
} else {
	
	// For legacy images added by ACF-Crop
	$crop = get_field('featured_image', $post->ID);
	$image = $crop['original_image'];
	
}

if ( get_field('news_post_source') == 'External' ) {
	
	$link = get_field('external_news_link');

} else {
	 
	$link = get_permalink();
	
}

?>
<div class="news-item-list mb-1">
	<div class="row news-item pb-1">
		<div class="col-3 news-img">
			<a href="<?php echo $link; ?>" <?php if ( get_field('news_post_source') == 'External' ): ?> target="_blank" <?php endif; ?>>
				<?php echo wp_get_attachment_image($image, 'News Image Small', 0, array('class' => 'img-fluid')); ?>	
			</a>
		</div>
		<div class="col-7">
			<a href="<?php echo $link; ?>" <?php if ( get_field('news_post_source') == 'External' ): ?> target="_blank" <?php endif; ?>>
				<h3 class="news-item-title"><?php the_title(); ?></h3>
			</a>
			<div class="post-meta post-meta-sm">
				<span id="post-date"><?php the_time('F j, Y'); ?>,</span>
				<?php if ( get_field('news_post_source') != 'External' ): ?><span id="post-author"> by <?php the_author(); ?></span><?php endif; ?>
				<div class="post-social pull-right d-none d-md-block">
					<div class="addthis_sharing_toolbox"></div>
				</div>
			</div>
			<p><?php the_field('featured_text', $post->ID); ?></p>
		</div>
	</div>
</div>