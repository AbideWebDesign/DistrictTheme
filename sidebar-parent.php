<?php
/**
 * The template for the sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage CSD
 * @since CSD 1.0
 */
?>

<?php if ( is_active_sidebar( 'sidebar' )  ) : ?>
	<aside id="secondary" class="sidebar widget-area" role="complementary">
		<?php get_template_part('template-parts/content','sidenav'); ?>
	</aside><!-- .sidebar .widget-area -->
<?php endif; ?>
