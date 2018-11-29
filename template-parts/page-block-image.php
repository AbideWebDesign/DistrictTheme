<div class="pb-2">

<?php

$image = get_sub_field('image');
echo wp_get_attachment_image($image['id'], 'Page Builder Image', 0, array('class' => 'img img-fluid'));

if ( get_sub_field('image_caption') ) : ?>
			
	<p class="post-image-caption"><?php the_sub_field('image_caption'); ?></p>
	
<?php 

endif; 

?>

</div>