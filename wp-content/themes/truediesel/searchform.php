<?php
/**
 * Search form.
 *
 * Overrides core's markup so the field gets a real, visually-hidden <label>
 * rather than a placeholder standing in for one.
 *
 * @package TrueDiesel
 */

defined( 'ABSPATH' ) || exit;

$td_search_id = 'search-' . wp_unique_id();
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="screen-reader-text" for="<?php echo esc_attr( $td_search_id ); ?>">
		<?php esc_html_e( 'Search', 'truediesel' ); ?>
	</label>
	<input
		type="search"
		id="<?php echo esc_attr( $td_search_id ); ?>"
		class="search-form__field"
		name="s"
		value="<?php echo esc_attr( get_search_query() ); ?>"
	>
	<button type="submit" class="search-form__submit button">
		<?php esc_html_e( 'Search', 'truediesel' ); ?>
	</button>
</form>
