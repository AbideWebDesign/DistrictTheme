<div class="padding-top-one padding-bottom-two">

<?php

$image = get_sub_field('image');
echo wp_get_attachment_image($image['id'], 'Page Builder Image', 0, array('class' => 'img img-responsive'));

if ( get_sub_field('image_caption') ) : ?>
			
	<p class="post-image-caption"><?php the_sub_field('image_caption'); ?></p>
	
<?php 

endif; 

?>

</div>