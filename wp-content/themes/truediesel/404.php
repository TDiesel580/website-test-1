<?php
/**
 * 404.
 *
 * @package TrueDiesel
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<div class="wrap">
	<section class="error-404">
		<h1 class="error-404__title"><?php esc_html_e( 'Page not found', 'truediesel' ); ?></h1>
		<p><?php esc_html_e( 'That page does not exist. Try a search, or head back to the homepage.', 'truediesel' ); ?></p>
		<?php get_search_form(); ?>
		<p>
			<a class="button button--primary" href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<?php esc_html_e( 'Back to home', 'truediesel' ); ?>
			</a>
		</p>
	</section>
</div>

<?php
get_footer();
