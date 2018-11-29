<?php
/**
 * The template part for displaying results in search pages
 *
 * @package WordPress
 * @subpackage CSD
 * @since CSD 1.0
 */
if ( 'page' === get_post_type() || 'news' === get_post_type() ):
	$title = get_the_title();
elseif ( 'attachment' === get_post_type() ):
	$char = array('-', '_');
	$title = get_the_title();
	$title = str_replace($char, ' ', $title);
elseif ( 'tribe_events' === get_post_type() ):
	$title = get_the_title();
	$date = tribe_get_start_date();
endif;
?>

<div class="search-result-item">
	<header class="entry-header">
		<h4 class="mb-0">
			<a href="<?php the_permalink(); ?>" <?php if ('attachment' === get_post_type($post)): ?>target="_blank" <?php endif; ?>rel="bookmark"><?php echo $title; ?></a>
		</h4>
		<p class="search-link"><?php the_permalink(); ?></p>
		<?php if ('attachment' === get_post_type()): ?>
			<p class="search-meta"><a href="<?php the_permalink(); ?>" target="_blank"><i class="fas fa-download"></i> Media File</a></p>
		<?php endif; ?>
	</header><!-- .entry-header -->
	<?php the_excerpt(); ?>
</div><!-- #search-result-## -->