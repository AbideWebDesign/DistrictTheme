<?php $image = get_field('featured_image', $post->ID); ?>

<div class="news-item-list mb-1">
	<div class="row news-item pb-1">
		<div class="col-3 news-img">
			<a href="<?php the_permalink(); ?>">
				<?php echo wp_get_attachment_image($image['id'], 'News Image Small', 0, array('class' => 'img img-fluid')); ?>	
			</a>
		</div>
		<div class="col-7">
			<a href="<?php the_permalink(); ?>">
				<h3 class="news-item-title"><?php the_title(); ?></h3>
			</a>
			<div class="post-meta post-meta-sm">
				<span id="post-date"><?php the_time('F j, Y'); ?>,</span>
				<span id="post-author"> by <?php the_author(); ?></span>
				<div class="post-social float-right  d-none d-md-block">
					<div class="addthis_sharing_toolbox"></div>
				</div>
			</div>
			<p><?php the_field('featured_text', $post->ID); ?></p>
		</div>
	</div>
</div>