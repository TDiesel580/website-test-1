<?php
/**
 * Services page template.
 *
 * @package TrueDiesel
 */

get_header();
?>

<main id="primary" class="site-main services-page">

	<section class="services-hero">
		<div class="container">
			<p class="services-hero__eyebrow">TRUE DIESEL SERVICES</p>

			<h1>Heavy Duty Service, Repair &amp; Inspections</h1>

			<p class="services-hero__lede">
				Diagnostics, repair, maintenance and commercial vehicle
				inspections for trucks, trailers and buses.
			</p>

			<nav class="services-jump" aria-label="Service categories">
				<a href="#cvip">CVIP Inspections</a>
				<a href="#truck">Truck Repair</a>
				<a href="#trailer">Trailer Repair</a>
				<a href="#bus">Bus &amp; Motor Coach</a>
			</nav>
		</div>
	</section>


	        <section id="cvip" class="service-section service-section--cvip">
                <div class="container service-photo-feature">

                        <figure class="service-photo-feature__media">
                                <img
                                        src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/services/cvip_inspection.png' ); ?>"
                                        alt="Commercial vehicle inspection at True Diesel"
                                        loading="lazy"
                                        decoding="async"
                                >
                        </figure>

                        <div class="service-photo-feature__body">
                                <p class="service-section__eyebrow">
                                        COMMERCIAL VEHICLE INSPECTIONS
                                </p>

                                <h2>Licensed CVIP Inspection Facility</h2>

                                <p>
                                        True Diesel is a licensed commercial vehicle inspection
                                        facility serving Lethbridge and Southern Alberta.
                                </p>

                                <p>
                                        Our facility is licensed to perform commercial vehicle
                                        inspections for multiple vehicle classes.
                                </p>

                                <div class="cvip-classes">
                                        <div class="cvip-classes__heading">
                                                <span class="cvip-classes__line"></span>
                                                <div>
                                                        <p class="cvip-classes__eyebrow">ALBERTA CVIP</p>
                                                        <h3>Licensed to inspect</h3>
                                                </div>
                                        </div>

                                        <ul>
                                                <li>Truck</li>
                                                <li>Trailer</li>
                                                <li>Light Truck</li>
                                                <li>Commercial Bus</li>
                                                <li>School Bus</li>
                                                <li>Motor Coach</li>
                                        </ul>
                                </div>
                        </div>

                </div>
        </section>


        <section id="truck" class="service-section">
                <div class="container service-photo-feature service-photo-feature--reverse">

                        <figure class="service-photo-feature__media">
                                <img
                                        src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/services/truck_repair.png' ); ?>"
                                        alt="Heavy duty truck repair at True Diesel"
                                        loading="lazy"
                                        decoding="async"
                                >
                        </figure>

                        <div class="service-photo-feature__body">
                                <p class="service-section__eyebrow">
                                        HEAVY DUTY REPAIR &amp; DIAGNOSTICS
                                </p>

                                <h2>Truck Repair</h2>

                                <p>
                                        Complete diagnostics, mechanical repair and electronic
                                        troubleshooting for commercial trucks. Our team works on
                                        major makes and engine platforms including Cat, Cummins,
                                        Detroit Diesel, Volvo and Mack.
                                </p>

                                <p class="service-systems__label">Systems we service</p>

                                <ul class="service-systems">
                                        <li>Engine &amp; ECU</li>
                                        <li>Emissions &amp; Aftertreatment</li>
                                        <li>Transmission &amp; Driveline</li>
                                        <li>ABS &amp; Brakes</li>
                                        <li>Electrical</li>
                                        <li>Cooling &amp; HVAC</li>
                                </ul>

                                <a class="services-text-link"
                                   href="<?php echo esc_url( home_url( '/#truck-explorer' ) ); ?>">
                                        Explore truck systems &rarr;
                                </a>
                        </div>

                </div>
        </section>


        <section id="trailer" class="service-section service-section--alternate">
                <div class="container service-photo-feature">

                        <figure class="service-photo-feature__media">
                                <img
                                        src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/services/trailer.png' ); ?>"
                                        alt="Commercial trailer repair at True Diesel"
                                        loading="lazy"
                                        decoding="async"
                                >
                        </figure>

                        <div class="service-photo-feature__body">
                                <p class="service-section__eyebrow">
                                        TRAILER SERVICE
                                </p>

                                <h2>Trailer Repair</h2>

                                <p>
                                        Complete trailer service including ABS diagnosis and
                                        repair, brake systems, electrical troubleshooting and
                                        general trailer maintenance and repairs.
                                </p>
                        </div>

                </div>
        </section>


        <section id="bus" class="service-section">
                <div class="container service-photo-feature service-photo-feature--reverse">

                        <figure class="service-photo-feature__media">
                                <img
                                        src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/services/motorcoach.png' ); ?>"
                                        alt="Commercial bus and motor coach service at True Diesel"
                                        loading="lazy"
                                        decoding="async"
                                >
                        </figure>

                        <div class="service-photo-feature__body">
                                <p class="service-section__eyebrow">
                                        COMMERCIAL &amp; SCHOOL BUS
                                </p>

                                <h2>Bus &amp; Motor Coach</h2>

                                <p>
                                        Commercial bus, school bus and motor coach inspections,
                                        maintenance, diagnostics and repair.
                                </p>

                                <p>
                                        Our commercial vehicle inspection facility is licensed
                                        to inspect these vehicle classes.
                                </p>
                        </div>

                </div>
        </section>


<section class="services-cta">
		<div class="container services-cta__inner">

			<div>
				<p class="service-section__eyebrow">TRUE DIESEL LTD.</p>

				<h2>Need your vehicle serviced?</h2>

				<p>
					Talk to our team about diagnostics, repairs,
					maintenance or commercial vehicle inspections.
				</p>
			</div>

			<div class="services-cta__actions">
				<a class="button button--primary" href="tel:+14033942253">
					Call (403) 394-2253
				</a>

				<a class="button button--secondary"
				   href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">
					Contact Us
				</a>
			</div>

		</div>
	</section>

</main>

<?php
get_footer();
