<?php $tax = get_sub_field('post_list_category'); ?>
<?php 
	global $post;
	$args = array( 
		'post_type' => 'news', 
		'posts_per_page' => 3, 
		'tax_query' => array(
			array(
				'taxonomy' => 'news-category',
				'field'    => 'slug',
				'terms'    => $tax->slug,
			),
		), 
	);
	$query = new WP_Query($args);
?>
<div id="posts-block" class="padding-vertical-two <?php echo (is_page_template('page-parent-no-sidebar.php') ? 'bg-gray' : ''); ?>">
	<?php echo (is_page_template('page-parent-no-sidebar.php') ? '<div class="container">' : ''); ?>
	<div class="row">
		<div class="col-xs-12">
			<h2 class="margin-bottom-one"><?php the_sub_field('post_list_heading'); ?></h2>
		</div>
	</div>
	<div class="row">
		<?php while($query->have_posts()): $query->the_post(); ?>
			<?php $image = get_field('featured_image'); ?>
			<div class="col-xs-12 col-lg-4 margin-bottom-one-xs">
				<div class="posts-image">
					<a href="<?php the_permalink(); ?>"><?php echo wp_get_attachment_image($image['id'], 'News Image Medium', false, array('class' => 'img-responsive')); ?></a>
				</div>
				<div class="posts-content">
					<div class="posts-content-heading">
						<?php the_title(); ?>
						<div class="small"><?php the_date(); ?></div>
					</div>
					<?php the_excerpt(); ?>
				</div>
			</div>
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
	</div>
	<?php echo (is_page_template('page-parent-no-sidebar.php') ? '</div>' : ''); ?>
</div>