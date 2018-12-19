<?php 
		
$args = array( 
	'post_type' => 'news', 
	'posts_per_page' => '3', 
	'tax_query' => array(
		array(
			'taxonomy' => 'news-category',
			'field'    => 'slug',
			'terms'    => 'featured',
		),
	), 
);

$the_query = new WP_Query( $args );

if ( $the_query->have_posts() ):	

?>

<div id="carousel-news" class="carousel-wrap mb-2">
	<div id="carousel" class="carousel slide" data-ride="carousel">
	<!-- Indicators -->
		<ol class="carousel-indicators">
		
			<?php for($i = 0; $i < $the_query->post_count; ++$i): ?>
			
					<li data-target="#carousel" data-slide-to="<?php echo $i; ?>" <?php if ($i == 0): ?>class="active"<?php endif; ?>></li>
			
			<?php endfor; ?>
		</ol>
		<div class="carousel-inner" role="listbox">
		
		<?php
		
		$x = 0;
		
		while ( $the_query->have_posts() ) : 
			
			$the_query->the_post();
			
			if ( get_field('featured_img_carousel', $post->ID) ) {
				
				$image = get_field('featured_img_carousel', $post->ID); 
				
			} else {
				
				// For legacy images add by ACF-Crop
				$image = get_field('featured_image_v2', $post->ID); 
		
			}
		
		?>
			
			<!-- Wrapper for slides -->
			<div class="carousel-item <?php if ($x == 0): ?>active<?php endif; ?>">
				<a href="<?php the_permalink(); ?>">
					<?php echo wp_get_attachment_image($image['id'], 'News Image Featured', 0, array('class' => 'img-fluid')); ?>
				</a>
				<a href="<?php the_permalink(); ?>">
			  		<div class="carousel-caption">
				  		<div class="carousel-title">
				  			<h3><?php the_title(); ?></h3>
				  		</div>
				  		<div class="carousel-caption-bg">
			  				<?php the_field('featured_text', $post->ID); ?>
			  			</div>
			  		</div>
			  	</a>
			</div>
			
			<?php $x++; ?>
				
		<?php endwhile; ?>
		
		</div>
	</div>
</div>

<?php endif; ?>