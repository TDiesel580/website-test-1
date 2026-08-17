<?php
/**
 * Site footer.
 *
 * @package TrueDiesel
 */

defined( 'ABSPATH' ) || exit;
?>
<footer class="site-footer" role="contentinfo">
	<div class="site-footer__inner wrap">

		<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
			<div class="site-footer__widgets">
				<?php dynamic_sidebar( 'footer-1' ); ?>
			</div>
		<?php endif; ?>

		<?php td_footer_nav(); ?>

		<p class="site-footer__copyright">
			<?php
			printf(
				/* translators: 1: current year, 2: site name */
				esc_html__( '&copy; %1$s %2$s. All rights reserved.', 'truediesel' ),
				esc_html( wp_date( 'Y' ) ),
				esc_html( get_bloginfo( 'name' ) )
			);
			?>
		</p>

	</div>
</footer>
