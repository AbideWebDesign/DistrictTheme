<?php
/**
 * The template used for displaying event content
 *
 * @package WordPress
 * @subpackage CSD
 * @since CSD 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php the_content(); ?>
	</div>
</article>