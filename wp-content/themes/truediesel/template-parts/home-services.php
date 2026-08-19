<?php
/**
 * Homepage service overview.
 *
 * Stage 4 establishes the layout shell.
 * Stage 6 connects this section to the final WordPress content model.
 *
 * @package TrueDiesel
 */

defined( 'ABSPATH' ) || exit;
?>
<section class="home-services section surface--default" aria-labelledby="services-title">
        <div class="wrap">

                <header class="section-heading">
                        <p class="section-heading__eyebrow">
                                <?php esc_html_e( 'Heavy-duty truck repair & diagnostics', 'truediesel' ); ?>
                        </p>

                        <h2 class="section-heading__title" id="services-title">
                                <?php esc_html_e( 'Systems we diagnose and service', 'truediesel' ); ?>
                        </h2>
                </header>

                <div class="home-services__grid">

                        <article class="service-card">
                                <h3 class="service-card__title">
                                        <?php esc_html_e( 'Engine & ECU', 'truediesel' ); ?>
                                </h3>
                        </article>

                        <article class="service-card">
                                <h3 class="service-card__title">
                                        <?php esc_html_e( 'Emissions & Aftertreatment', 'truediesel' ); ?>
                                </h3>
                        </article>

                        <article class="service-card">
                                <h3 class="service-card__title">
                                        <?php esc_html_e( 'Transmission & Driveline', 'truediesel' ); ?>
                                </h3>
                        </article>

                        <article class="service-card">
                                <h3 class="service-card__title">
                                        <?php esc_html_e( 'ABS & Brakes', 'truediesel' ); ?>
                                </h3>
                        </article>

                        <article class="service-card">
                                <h3 class="service-card__title">
                                        <?php esc_html_e( 'Electrical', 'truediesel' ); ?>
                                </h3>
                        </article>

                        <article class="service-card">
                                <h3 class="service-card__title">
                                        <?php esc_html_e( 'Cooling & HVAC', 'truediesel' ); ?>
                                </h3>
                        </article>

                </div>
        </div>
</section>
