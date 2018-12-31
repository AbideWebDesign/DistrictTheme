<?php
/**
 * The template used for displaying directory profile content
 *
 * @package WordPress
 * @subpackage CSD
 * @since CSD 1.0
 */

if ( get_field('profile_img') ) {
	
	$image = get_field('profile_img');
	
} else {
	
	// For legacy images added with ACF-Crop
	$crop = get_field( 'profile_image' );
	$image = $crop['original_image'];
	
}



?>
<h1 class="entry-title pb-1">Board Profile</h1>
<div class="row">
	<div class="col-5 col-sm-3">
		<?php echo wp_get_attachment_image($image['id'], 'Staff Directory', 0, array('class' => 'img img-fluid')); ?>
		<div class="profile-meta pt-1">
			<div class="subsection d-none d-md-block">
				<h3><?php the_title(); ?></h3>
				<div class="sub-meta">
					Elected in <?php the_field( 'elected_year' ); ?><br />Term expires <?php the_field( 'term_expiration_date' ); ?>
				</div>
			</div>
			<div class="sub-meta d-none d-md-block">
				<p>
					<i class="fas fa-envelope"></i> <a href="mailto:<?php the_field( 'email' ); ?>">Email <?php the_title(); ?></a><br />
					<i class="fas fa-phone"></i> <?php the_field( 'phone' ) ; ?>
				</p>
			</div>
		</div>
	</div>
	<div class="col-7 d-md-none">
		<div class="subsection">
			<h3><?php the_title(); ?></h3>
			<div class="sub-meta">Elected in <?php the_field( 'elected_year' ); ?><br>Term expires <?php the_field( 'term_expiration_date' ); ?><br />
				<a class="btn btn-primary btn-block my-1" href="mailto:<?php the_field( 'email' ); ?>"><i class="fas fa-envelope"></i> Email</a> <a class="btn btn-secondary btn-block" href="tel:<?php the_field( 'phone' ) ; ?>"><i class="fas fa-phone"></i> Call</a>
			</div>
		</div>
	</div>
	<div class="col-sm-9 ">
		<div class="well"><?php the_field( 'bio' ); ?></div>	
	</div>
</div>