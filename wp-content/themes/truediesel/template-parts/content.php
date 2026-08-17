<?php
/**
 * Single-entry content, used inside loops.
 *
 * Branches on context: full content on a singular view, trimmed excerpt in an
 * archive listing. One file, two jobs — avoids a near-duplicate
 * content-excerpt.php drifting out of sync.
 *
 * @package TrueDiesel
 */

defined( 'ABSPATH' ) || exit;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>

	<header class="entry__header">
		<?php
		if ( is_singular() ) {
			the_title( '<h1 class="entry__title">', '</h1>' );
		} else {
			the_title(
				'<h2 class="entry__title"><a href="' . esc_url( get_permalink() ) . '">',
				'</a></h2>'
			);
		}
		td_entry_meta();
		?>
	</header>

	<?php if ( has_post_thumbnail() ) : ?>
		<figure class="entry__media">
			<?php the_post_thumbnail( is_singular() ? 'td-wide' : 'td-card' ); ?>
		</figure>
	<?php endif; ?>

	<div class="entry__content">
		<?php
		if ( is_singular() ) {
			the_content();

			wp_link_pages(
				array(
					'before' => '<nav class="entry__pagination">',
					'after'  => '</nav>',
				)
			);
		} else {
			the_excerpt();
			td_read_more_link();
		}
		?>
	</div>

</article>
