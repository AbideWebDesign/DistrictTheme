<?php

$post_objects = get_sub_field('parent');
										
foreach ($post_objects as $post): 

	setup_postdata( $post ); 

	?>

<ul id="page-links">
	
	<?php 
		
	wp_list_pages( array(
		'title_li' => '',
		'depth' => 2,
		'child_of' => $post->ID,
		'sort_column' => 'post_title',
	));
	
	?>
	
</ul>

<?php endforeach; ?>

