<?php
/**
 * Shown when a loop returns nothing.
 *
 * @package TrueDiesel
 */

defined( 'ABSPATH' ) || exit;
?>
<section class="no-results">
	<h1 class="no-results__title"><?php esc_html_e( 'Nothing found', 'truediesel' ); ?></h1>

	<div class="no-results__content">
		<?php if ( is_search() ) : ?>
			<p><?php esc_html_e( 'No results matched that search. Try a different term.', 'truediesel' ); ?></p>
			<?php get_search_form(); ?>
		<?php else : ?>
			<p><?php esc_html_e( 'There is nothing here yet.', 'truediesel' ); ?></p>
		<?php endif; ?>
	</div>
</section>
