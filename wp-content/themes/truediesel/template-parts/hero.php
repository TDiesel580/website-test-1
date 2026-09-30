<?php
/**
 * Homepage hero.
 *
 * @package TrueDiesel
 */

defined( 'ABSPATH' ) || exit;
?>

<section class="hero" aria-labelledby="hero-title">

        <div class="hero__slides" aria-hidden="true">

                <div class="hero__slide is-active" data-hero-slide>
                        <img
                                src="<?php echo esc_url( get_template_directory_uri() . '/assets/media/hero/cover_1.png' ); ?>"
                                alt=""
                                decoding="async"
                                fetchpriority="high"
                        >
                </div>



                <div class="hero__slide" data-hero-slide>
                        <img
                                src="<?php echo esc_url( get_template_directory_uri() . '/assets/media/hero/cover_2.png' ); ?>"
                                alt=""
                                loading="lazy"
                                decoding="async"
                        >
                </div>

                <div class="hero__slide" data-hero-slide>
                        <video muted playsinline preload="metadata">
                                <source src="<?php echo esc_url( get_template_directory_uri() . '/assets/media/hero/cover_vid_2.mp4' ); ?>" type="video/mp4">
                        </video>
                </div>

                <div class="hero__slide" data-hero-slide>
                        <img
                                src="<?php echo esc_url( get_template_directory_uri() . '/assets/media/hero/cover_3.png' ); ?>"
                                alt=""
                                loading="lazy"
                                decoding="async"
                        >
                </div>

                <div class="hero__slide" data-hero-slide>
                        <video muted playsinline preload="metadata">
                                <source src="<?php echo esc_url( get_template_directory_uri() . '/assets/media/hero/cover_vid_3.mp4' ); ?>" type="video/mp4">
                        </video>
                </div>

                <div class="hero__slide" data-hero-slide>
                        <img
                                src="<?php echo esc_url( get_template_directory_uri() . '/assets/media/hero/cover_4.png' ); ?>"
                                alt=""
                                loading="lazy"
                                decoding="async"
                        >
                </div>

                <div class="hero__slide" data-hero-slide>
                        <video muted playsinline preload="metadata">
                                <source src="<?php echo esc_url( get_template_directory_uri() . '/assets/media/hero/cover_vid_4.mp4' ); ?>" type="video/mp4">
                        </video>
                </div>

                <div class="hero__slide" data-hero-slide>
                        <img
                                src="<?php echo esc_url( get_template_directory_uri() . '/assets/media/hero/cover_5.png' ); ?>"
                                alt=""
                                loading="lazy"
                                decoding="async"
                        >
                </div>

        </div>

        <div class="hero__dots" aria-label="Choose hero slide">
                <button class="hero__dot is-active" type="button" data-hero-dot="0" aria-label="Show slide 1" aria-current="true"></button>
                <button class="hero__dot" type="button" data-hero-dot="1" aria-label="Show slide 2"></button>
                <button class="hero__dot" type="button" data-hero-dot="2" aria-label="Show slide 3"></button>
                <button class="hero__dot" type="button" data-hero-dot="3" aria-label="Show slide 4"></button>
                <button class="hero__dot" type="button" data-hero-dot="4" aria-label="Show slide 5"></button>
                <button class="hero__dot" type="button" data-hero-dot="5" aria-label="Show slide 6"></button>
                <button class="hero__dot" type="button" data-hero-dot="6" aria-label="Show slide 7"></button>
                <button class="hero__dot" type="button" data-hero-dot="7" aria-label="Show slide 8"></button>
        </div>

        <div class="wrap hero__inner">

                <div class="hero__content">

                        <p class="hero__eyebrow">
                                <?php esc_html_e( 'True Service. Only at True Diesel | Lethbridge, AB', 'truediesel' ); ?>
                        </p>

                        <h1 class="hero__title" id="hero-title">
                                Advanced diagnostics.<br>
    				Heavy-duty repair.
                        </h1>

                        <p class="hero__lede">
                                <?php esc_html_e( 'Engine, electrical, emissions and drivetrain repairs, diagnostics and CVIP inspections for trucks, trailers and buses.', 'truediesel' ); ?>
                        </p>

                        <div class="hero__actions">

                                <a
                                        class="button button--primary"
                                        href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"
                                >
                                        <?php esc_html_e( 'Book a service', 'truediesel' ); ?>
                                </a>

                                <a class="button button--ghost" href="#explorer">
                                        <?php esc_html_e( 'Explore truck systems', 'truediesel' ); ?>
                                </a>

                        </div>

                </div>

        </div>

</section>
