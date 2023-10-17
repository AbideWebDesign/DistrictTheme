<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage CSD
 * @since CSD 1.0
 */
?>

<?php the_title( '<h1>', '</h1>' ); ?>
<div class="page-content">
	
	<?php get_template_part( 'template-parts/page', 'blocks' ); ?>
	
</div><!-- .page-content -->