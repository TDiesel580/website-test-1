<?php
/**
 * Shop page template.
 *
 * @package TrueDiesel
 */

get_header();
?>

<main id="primary" class="site-main shop-page">

    <section class="shop-hero">
        <div class="site-container shop-hero__inner">
            <span class="shop-eyebrow">True Diesel Gear</span>

            <h1>Shop</h1>

            <p>
                Gear made for the people who keep things moving.
                Official True Diesel merchandise available locally.
            </p>
        </div>
    </section>

    <section class="shop-products">
        <div class="site-container">

            <div class="shop-grid">

                <article class="shop-product">
                    <div class="shop-product__image">
                        <img
                            src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/shop/shirt.jpeg' ); ?>"
                            alt="Black True Diesel T-shirt"
                            loading="lazy"
                        >
                    </div>

                    <div class="shop-product__content">
                        <span class="shop-product__type">Apparel</span>

                        <h2>True Diesel T-Shirt</h2>

                        <p class="shop-product__details">
                            One Size &bull; Unisex
                        </p>

                        <div class="shop-product__footer">

                            <a class="button button--outline" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">
                                Contact Us
                            </a>
                        </div>
                    </div>
                </article>


                <article class="shop-product">
                    <div class="shop-product__image">
                        <img
                            src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/shop/cap.jpg' ); ?>"
                            alt="Black True Diesel logo cap"
                            loading="lazy"
                        >
                    </div>

                    <div class="shop-product__content">
                        <span class="shop-product__type">Headwear</span>

                        <h2>True Diesel Cap</h2>

                        <p class="shop-product__details">
                            Black &bull; True Diesel Logo
                        </p>

                        <div class="shop-product__footer">

                            <a class="button button--outline" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">
                                Contact Us
                            </a>
                        </div>
                    </div>
                </article>

            </div>

            <div class="shop-availability">
                <span>Official True Diesel Merchandise</span>
                <strong>Available In-Store</strong>
            </div>

        </div>
    </section>

</main>

<?php
get_footer();
