<?php
/**
 * Homepage final contact CTA.
 *
 * @package TrueDiesel
 */

defined( 'ABSPATH' ) || exit;
?>
<section class="home-cta section surface--inverse" aria-labelledby="home-cta-title">
        <div class="wrap home-cta__inner">

                <div>
                        <h2 class="home-cta__title" id="home-cta-title">
                                <?php esc_html_e( 'Need your truck diagnosed or repaired?', 'truediesel' ); ?>
                        </h2>

                        <p class="home-cta__text">
                                <?php esc_html_e( 'Talk to True Diesel about the problem and get the right service started.', 'truediesel' ); ?>
                        </p>
                </div>

                <a class="button button--primary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">
                        <?php esc_html_e( 'Contact True Diesel', 'truediesel' ); ?>
                </a>

        </div>
</section>
