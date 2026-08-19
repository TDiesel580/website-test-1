<?php
/**
 * Homepage hero.
 *
 * Stage 4 establishes the homepage hierarchy and CTA structure.
 * Final imagery can be refined later without changing this markup.
 *
 * @package TrueDiesel
 */

defined( 'ABSPATH' ) || exit;
?>
<section class="hero" aria-labelledby="hero-title">
        <div class="wrap hero__inner">

                <div class="hero__content">

                        <p class="hero__eyebrow">
                                <?php esc_html_e( 'Advanced diagnostics. Heavy‑duty repair.', 'truediesel' ); ?>
                        </p>

                        <h1 class="hero__title" id="hero-title">
                                <?php esc_html_e( 'Advanced diagnostics. Heavy‑duty repair.', 'truediesel' ); ?>
                        </h1>

                        <p class="hero__lede">
                                <?php esc_html_e( 'Diagnostics, electrical, emissions, drivetrain and mechanical service for commercial trucks.', 'truediesel' ); ?>
                        </p>

                        <div class="hero__actions">
                                <a class="button button--primary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">
                                        <?php esc_html_e( 'Book a service', 'truediesel' ); ?>
                                </a>

                                <a class="button button--ghost" href="#explorer">
                                        <?php esc_html_e( 'Explore truck systems', 'truediesel' ); ?>
                                </a>
                        </div>

                </div>

                <div class="hero__visual" aria-hidden="true">
                        <div class="hero__visual-placeholder"></div>
                </div>

        </div>
</section>
