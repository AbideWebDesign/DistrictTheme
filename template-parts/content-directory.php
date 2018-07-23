<?php
/**
 * The template used for displaying directory profile content
 *
 * @package WordPress
 * @subpackage CSD
 * @since CSD 1.0
 */
 
 $image = get_field( 'profile_image' );


?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title padding-bottom-one">Board Profile</h1>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<div class="row">
			<div class="col-sm-3 col-xs-5">
				<?php echo wp_get_attachment_image($image['id'], 'Staff Directory', 0, array('class' => 'img img-responsive')); ?>
				<div class="profile-meta padding-top-one">
					<div class="subsection hidden-xs">
						<h3><?php the_title(); ?></h3>
						Elected in <?php the_field( 'elected_year' ); ?><br>Term expires <?php the_field( 'term_expiration_date' ); ?>
					</div>
					<div class="sub-meta hidden-xs">
						<p>
							<i class="fa fa-envelope"></i> <a href="mailto:<?php the_field( 'email' ); ?>">Email <?php the_title(); ?></a><br>
							<i class="fa fa-phone"></i> <?php the_field( 'phone' ) ; ?>
						</p>
					</div>
					
				</div>
			</div>
			<div class="col-xs-7 visible-xs">
				<div class="subsection">
					<h3><?php the_title(); ?></h3>
					Elected in <?php the_field( 'elected_year' ); ?><br>Term expires <?php the_field( 'term_expiration_date' ); ?>
					<div class="sub-meta">
						<a class="btn btn-primary btn-block margin-vertical-one" href="mailto:<?php the_field( 'email' ); ?>"><i class="fa fa-envelope"></i> Email</a> <a class="btn btn-secondary btn-block" href="tel:<?php the_field( 'phone' ) ; ?>"><i class="fa fa-phone"></i> Call</a>
					</div>
				</div>
			</div>
			<div class="col-sm-9 col-xs-12">
				<div class="well"><?php the_field( 'bio' ); ?></div>	
			</div>
		</div>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
