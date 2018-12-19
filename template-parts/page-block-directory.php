<div class="py-1">

<?php

$args = array( 
	'post_type' => 'directory', 
	'tax_query' => array(
		array(
			'taxonomy' => 'directory-category',
			'field' => 'term_id',
			'terms' => get_sub_field( 'directory_category' ),
		),
	), 
	'posts_per_page' => -1, 
	'orderby'=>'meta_value', 
	'meta_key'  => 'sort_by_name', 
	'order' => 'ASC' 
);

$loop = new WP_Query( $args );

// Setup bootstrap grid
$i = 0;

while ( $loop->have_posts() ) : $loop->the_post();
	
	$directory_type = get_field( 'directory_type', get_the_ID() );

	if ( get_field( 'profile_img', get_the_ID() ) ):
		
		$image = get_field( 'profile_img', get_the_ID() );
		$col = "col-8";
	
	elseif ( get_field( 'profile_image', get_the_ID() ) ):

		// Check if image added via ACF-Crop
		$image = get_field( 'profile_image', get_the_ID() );
		$col = "col-8";
	
	else:
	
		$image = "";
		$col = "col-12";
		
	endif;
	
	if ( $directory_type == 'Board Member' ):
				
		$meta = "Board Member";
			
		if ( get_field( 'board_role', get_the_ID() ) != 'None' ): 					
			
			$meta .= " | " . get_field( 'board_role', get_the_ID() );
		
		endif;

		$meta .= "<br>Elected in " . get_field( 'elected_year', get_the_ID() ) . " | Term Expires " . get_field( 'term_expiration_date', get_the_ID() ); 
		$contact = '<i class="fas fa-envelope"></i> <a href="mailto:' . get_field( 'email', get_the_ID() ) . '">' . get_field( 'email', get_the_ID() ) . '</a><br><i class="fas fa-phone"></i> <a href="tel:' . get_field( 'phone', get_the_ID() ) . '">' . get_field( 'phone', get_the_ID() ) . '</a>';
		$bio = get_field ( 'bio', get_the_ID() );
		
	elseif ( $directory_type == 'School Administration' ):

		$meta = get_field( 'title', get_the_ID() ) . ", " . get_field( 'school', get_the_ID() );
		$contact = '<i class="fas fa-envelope"></i> <a href="mailto:' . get_field( 'email', get_the_ID() ) . '">' . get_field( 'email', get_the_ID() ) . '</a><br><i class="fas fa-phone"></i> <a href="tel:' . get_field( 'phone', get_the_ID() ) . '">' . get_field( 'phone', get_the_ID() ) . '</a>';

	elseif ( $directory_type == 'School or Program' ):
		
		$meta = get_field( 'title_type', get_the_ID() ) . ": " . get_field( 'principal', get_the_ID() );
		$contact = '<i class="fas fa-map-marker"></i> ' . get_field( 'address', get_the_ID() ) . ", Corvallis, OR " . get_field( 'zip', get_the_ID() );
		$contact .= '<br><i class="fa fa-phone"></i> <a href="tel:' . get_field( 'office_phone', get_the_ID() ) . '">' . get_field( 'office_phone', get_the_ID() ) .'</a><br><i class="fas fa-globe"></i> <a href="' . get_field( 'website', get_the_ID() ) . '" target="_blank">' . get_field( 'website', get_the_ID() ) . '</a>';
	
	else:
			
		$meta = get_field( 'title', get_the_ID() );
		$contact = '<i class="fas fa-envelope"></i> <a href="mailto:' . get_field( 'email', get_the_ID() ) . '">' . get_field( 'email', get_the_ID() ) . '</a><br><i class="fas fa-phone"></i> <a href="tel:' . get_field( 'phone', get_the_ID() ) . '">' . get_field( 'phone', get_the_ID() ) . '</a>';

	endif;
	
	if($i % 2 == 0) : ?>
	
	<div class="row">
	
	<?php endif; ?>

		<div class="col-sm-6 pb-2">
			<div class="row">
			
				<?php if ($image): ?>
				
					<div class="col-4 profile-image">
						<?php echo wp_get_attachment_image($image['id'], 'Staff Directory', 0, array('class' => 'img img-fluid')); ?>
					</div>
					
				<?php endif; ?>
				
				<div class="<?php echo $col; ?> profile-content">
					<div class="subhead">
						<?php if ( $directory_type == 'Board Member' ): ?>
							<a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
						<?php elseif ( $directory_type == 'School or Program'): ?>
							<h4><?php the_title(); ?></h4>
						<?php else: ?>
							<h4><?php the_title(); ?></h4>
						<?php endif; ?>
					</div>
					<div class="subsection">
					
						<?php echo $meta; ?>
						
					</div>
					<div class="submeta">
					
						<?php echo $contact; ?>
						
					</div>
				</div>
			</div>
		</div>
	
	<?php
		
	$i++;
	
	if($i != 0 && $i % 2 == 0): ?>
        
		</div> 
		 
	<?php endif; ?>

<?php 

endwhile;

// close the row if it did not get closed in the loop
if($i != 0 && $i % 2 != 0) :  ?>

	</div><!--/.row-->
    
<?php 

endif; 
wp_reset_postdata(); 

?>

</div>