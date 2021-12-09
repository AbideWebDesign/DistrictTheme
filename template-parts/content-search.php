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

			<a href="<?php the_permalink(); ?>" <?php echo ( 'attachment' === get_post_type( $post ) ? 'target="_blank"' : '' ); ?>><?php echo ( 'attachment' === get_post_type( $post ) ? '<i class="fas fa-download fa-xs"></i> ' : '' ); ?><?php echo $title; ?></a>

		</h4>

	</header>

	<?php the_excerpt(); ?>

</div>