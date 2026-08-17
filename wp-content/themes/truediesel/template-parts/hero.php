<?php
/**
 * Homepage hero — STAGE 4 PLACEHOLDER.
 *
 * Copy and imagery come from D4 (real brand assets and service copy). The
 * markup shape is here so Stage 3's tokens have something to style against.
 *
 * @package TrueDiesel
 */

defined( 'ABSPATH' ) || exit;
?>
<section class="hero" aria-labelledby="hero-title">
	<div class="wrap hero__inner">

		<h1 class="hero__title" id="hero-title">
			<?php
			// Placeholder headline — replace at Stage 4 with real brand copy.
			echo esc_html( get_bloginfo( 'name' ) );
			?>
		</h1>

		<p class="hero__lede">
			<?php echo esc_html( get_bloginfo( 'description' ) ); ?>
		</p>

		<p class="hero__actions">
			<a class="button button--primary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">
				<?php esc_html_e( 'Book a service', 'truediesel' ); ?>
			</a>
			<a class="button button--ghost" href="#explorer">
				<?php esc_html_e( 'What we service', 'truediesel' ); ?>
			</a>
		</p>

	</div>
</section>
