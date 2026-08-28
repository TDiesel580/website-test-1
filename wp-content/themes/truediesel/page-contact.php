<?php
/**
 * Template Name: Contact
 *
 * True Diesel contact page.
 */

get_header();
?>

<main id="primary" class="site-main contact-page">

    <!-- CONTACT HERO -->
    <section class="contact-hero">
        <div class="site-shell contact-hero__inner">

            <p class="contact-eyebrow">
                TRUE DIESEL | LETHBRIDGE, AB
            </p>

            <h1>Talk to the shop.</h1>

            <p class="contact-hero__lede">
                Need diagnostics, repairs or a CVIP inspection?
                Get in touch with the True Diesel team.
            </p>

        </div>
    </section>


    <!-- QUICK CONTACT -->
    <section class="contact-quick">
        <div class="site-shell contact-quick__grid">

            <a class="contact-card" href="tel:+14033942253">
                <span class="contact-card__icon" aria-hidden="true">☎</span>

                <div>
                    <span class="contact-card__label">CALL US</span>
                    <strong>403-394-2253</strong>
                    <span class="contact-card__action">Call the shop →</span>
                </div>
            </a>


            <a
                class="contact-card"
                href="https://www.google.com/maps/search/?api=1&query=2250+39+St+N+Lethbridge+AB+T1H+5J2"
                target="_blank"
                rel="noopener noreferrer"
            >
                <span class="contact-card__icon" aria-hidden="true">⌖</span>

                <div>
                    <span class="contact-card__label">VISIT THE SHOP</span>
                    <strong>2250 39 St N</strong>
                    <span>Lethbridge, AB T1H 5J2</span>
                    <span class="contact-card__action">Get directions →</span>
                </div>
            </a>


            <div class="contact-card contact-card--static">
                <span class="contact-card__icon" aria-hidden="true">◷</span>

                <div>
                    <span class="contact-card__label">SHOP HOURS</span>
                    <strong>Monday – Friday</strong>
                    <span>8:00 AM – 5:00 PM</span>
                </div>
            </div>

        </div>
    </section>


    <!-- FORM + MAP -->
    <section class="contact-main">
        <div class="site-shell contact-main__grid">

            <div class="contact-form-panel">

                <p class="section-eyebrow">CONTACT US</p>

                <h2>How can we help?</h2>

                <p class="contact-intro">
                    Tell us what your truck, trailer or bus needs and our team
                    will get back to you.
                </p>

                <form class="contact-form" method="post" action="">

                    <div class="contact-form__row">

                        <div class="contact-field">
                            <label for="contact-name">Name *</label>
                            <input
                                id="contact-name"
                                name="contact_name"
                                type="text"
                                autocomplete="name"
                                required
                            >
                        </div>

                        <div class="contact-field">
                            <label for="contact-phone">Phone *</label>
                            <input
                                id="contact-phone"
                                name="contact_phone"
                                type="tel"
                                autocomplete="tel"
                                required
                            >
                        </div>

                    </div>


                    <div class="contact-field">
                        <label for="contact-email">Email</label>

                        <input
                            id="contact-email"
                            name="contact_email"
                            type="email"
                            autocomplete="email"
                        >
                    </div>


                    <div class="contact-field">
                        <label for="contact-service">Service needed</label>

                        <select id="contact-service" name="contact_service">
                            <option value="">Select a service</option>
                            <option>Diagnostics</option>
                            <option>Engine</option>
                            <option>Electrical</option>
                            <option>Emissions / Aftertreatment</option>
                            <option>Transmission / Drivetrain</option>
                            <option>ABS & Brakes</option>
                            <option>Cooling & HVAC</option>
                            <option>Truck & Trailer Repair</option>
                            <option>CVIP Inspection</option>
                            <option>Other</option>
                        </select>
                    </div>


                    <div class="contact-field">
                        <label for="contact-message">Message *</label>

                        <textarea
                            id="contact-message"
                            name="contact_message"
                            rows="6"
                            required
                        ></textarea>
                    </div>


                    <button class="contact-submit" type="submit">
                        Send message
                    </button>

                </form>

            </div>


            <div class="contact-location">

                <div class="contact-location__heading">
                    <div>
                        <p class="section-eyebrow">FIND US</p>
                        <h2>True Diesel, Lethbridge</h2>
                    </div>

                    <a
                        href="https://www.google.com/maps/search/?api=1&query=2250+39+St+N+Lethbridge+AB+T1H+5J2"
                        target="_blank"
                        rel="noopener noreferrer"
                    >
                        Get directions ↗
                    </a>
                </div>


                <div class="contact-map">

                    <iframe
                        title="True Diesel location in Lethbridge"
                        src="https://www.google.com/maps?q=2250%2039%20St%20N%2C%20Lethbridge%2C%20AB%20T1H%205J2&output=embed"
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        allowfullscreen
                    ></iframe>

                </div>


                <div class="contact-address">
                    <strong>True Diesel Ltd.</strong>

                    <span>
                        2250 39 St N<br>
                        Lethbridge, Alberta T1H 5J2
                    </span>
                </div>

            </div>

        </div>
    </section>


    <!-- FINAL CTA -->
    <section class="contact-cta">

        <div class="site-shell contact-cta__inner">

            <div>
                <p class="section-eyebrow">NEED SERVICE?</p>
                <h2>Get your truck back on the road.</h2>
            </div>

            <a class="contact-cta__button" href="tel:+14033942253">
                Call True Diesel
            </a>

        </div>

    </section>

</main>

<?php
get_footer();
