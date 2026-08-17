<?php
/**
 * Site header.
 *
 * Layout is intentionally minimal — Stage 4 replaces the inner structure.
 * The nav toggle button is here from the start because Stage 7's mobile
 * behaviour hangs off it and main.js already wires it up.
 *
 * @package TrueDiesel
 */

defined( 'ABSPATH' ) || exit;
?>
<header class="site-header" role="banner">
	<div class="site-header__inner wrap">

		<?php td_site_branding(); ?>

		<button
			class="nav-toggle"
			type="button"
			aria-expanded="false"
			aria-controls="primary-nav"
			data-nav-toggle
		>
			<span class="nav-toggle__bars" aria-hidden="true"></span>
			<span class="screen-reader-text"><?php esc_html_e( 'Menu', 'truediesel' ); ?></span>
		</button>

		<div class="site-header__nav" id="primary-nav" data-nav-panel>
			<?php td_primary_nav(); ?>
		</div>

	</div>
</header>
