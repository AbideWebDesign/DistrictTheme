<?php 
/**
 * Template Name: Events
 *
 * @package WordPress
 * @subpackage CSD
 * @since CSD 1.0
 */
global $adams;
if ( tribe_event_in_category( 'adams-elementary' ) ):
	get_header('calendar');
	$id = $adams;
	$cat = true;
else:
	get_header(); 
endif;

?>

<div id="primary" class="content-area padding-vertical-two">
	<div class="container">
	<?php if ($cat): ?>
		<div class="row">
			<div class="col-sm-10">
				<h1><?php echo get_the_title($id); ?> School Calendar</h1>
				<div class="meta-content  padding-bottom-one"><?php the_field('address', $id); ?>, Corvallis, OR <?php the_field('zip_code', $id); ?> | Office Phone:  <?php the_field('office_phone', $id); ?></div>
			</div>
			<div class="col-sm-2 text-right">
				<a href="<?php the_field('website', $id); ?>" class="btn btn-primary btn-lg btn-block">Website</a>
			</div>
		</div>
	<?php endif; ?>
		<?php 
		// Start the loop.
		while ( have_posts() ) : the_post();
			
			the_content();
		
		// End of the loop.
		endwhile;
		?>	
	</div>		
</div>

<?php 

if ( tribe_event_in_category( 'adams-elementary' ) ):
	get_footer('calendar');
else:
	get_footer(); 
endif;

?>