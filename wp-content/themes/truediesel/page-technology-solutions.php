<?php
/**
 * Template Name: Technology Solutions
 * Description: Standalone technology department landing page for True Diesel Ltd.
 * Page URL: /technology-solutions/
 */

if (!defined('ABSPATH')) {
    exit;
}

$tdts_theme_url = get_stylesheet_directory_uri();
$tdts_theme_dir = get_stylesheet_directory();
$tdts_css_path  = $tdts_theme_dir . '/assets/css/technology-solutions.css';
$tdts_js_path   = $tdts_theme_dir . '/assets/js/technology-solutions.js';

wp_enqueue_style(
    'truediesel-technology-solutions',
    $tdts_theme_url . '/assets/css/technology-solutions.css',
    array(),
    file_exists($tdts_css_path) ? (string) filemtime($tdts_css_path) : '1.0'
);
wp_enqueue_script(
    'truediesel-technology-solutions',
    $tdts_theme_url . '/assets/js/technology-solutions.js',
    array(),
    file_exists($tdts_js_path) ? (string) filemtime($tdts_js_path) : '1.0',
    true
);

$tdts_img = static function ($name) use ($tdts_theme_url) {
    return esc_url($tdts_theme_url . '/assets/images/technology/' . $name);
};

// Labels are intentionally fixed to avoid echoing arbitrary submitted values.
$tdts_services = array(
    'Computer Systems Integration',
    'Technology Solutions',
    'ECU & Electronic Systems',
    'Technical Setup & Support',
    'On-Site Field Services',
    'Other Technical Inquiry',
);

$tdts_error = '';
$tdts_sent  = isset($_GET['tdts_sent']) && '1' === sanitize_text_field(wp_unslash($_GET['tdts_sent']));

// Standard POST handler: WordPress nonce, honeypot, whitelist and wp_mail().
// Configure WordPress SMTP and test delivery before publishing the page.
if ('POST' === ($_SERVER['REQUEST_METHOD'] ?? '') && isset($_POST['tdts_contact_submit'])) {
    $nonce = isset($_POST['tdts_nonce']) ? sanitize_text_field(wp_unslash($_POST['tdts_nonce'])) : '';
    $trap  = isset($_POST['tdts_website']) ? sanitize_text_field(wp_unslash($_POST['tdts_website'])) : '';

    if (!wp_verify_nonce($nonce, 'tdts_technology_inquiry')) {
        $tdts_error = 'The form expired. Please refresh this page and try again.';
    } elseif ('' !== $trap) {
        // Do not send mail for automated honeypot submissions.
        $tdts_error = 'Your message could not be submitted. Please try again.';
    } else {
        $name     = isset($_POST['tdts_name']) ? trim(sanitize_text_field(wp_unslash($_POST['tdts_name']))) : '';
        $email    = isset($_POST['tdts_email']) ? sanitize_email(wp_unslash($_POST['tdts_email'])) : '';
        $company  = isset($_POST['tdts_company']) ? trim(sanitize_text_field(wp_unslash($_POST['tdts_company']))) : '';
        $service  = isset($_POST['tdts_service']) ? sanitize_text_field(wp_unslash($_POST['tdts_service'])) : '';
        $location = isset($_POST['tdts_location']) ? trim(sanitize_text_field(wp_unslash($_POST['tdts_location']))) : '';
        $details  = isset($_POST['tdts_details']) ? trim(sanitize_textarea_field(wp_unslash($_POST['tdts_details']))) : '';

        if (
            '' === $name || strlen($name) > 120 ||
            !is_email($email) || strlen($email) > 200 ||
            strlen($company) > 150 ||
            !in_array($service, $tdts_services, true) ||
            '' === $location || strlen($location) > 150 ||
            strlen($details) < 10 || strlen($details) > 5000
        ) {
            $tdts_error = 'Please complete all required fields with valid information.';
        } else {
            $recipient = 'tech@truediesel.ca'; // Verify this departmental inbox before publishing.
            $subject   = 'Technology Solutions inquiry: ' . $service;
            $body      = "Technology Solutions website inquiry\n\n"
                . "Name: {$name}\n"
                . "Email: {$email}\n"
                . "Company: {$company}\n"
                . "Service: {$service}\n"
                . "Location: {$location}\n\n"
                . "Project / issue details:\n{$details}\n";
            $headers   = array('Reply-To: ' . $email);

            if (wp_mail($recipient, $subject, $body, $headers)) {
                wp_safe_redirect(add_query_arg('tdts_sent', '1', get_permalink()) . '#technology-contact');
                exit;
            }
            $tdts_error = 'The message could not be sent. Please email tech@truediesel.ca directly.';
        }
    }
}

get_header();
?>
<main id="tdts" class="tdts-page">
    <section class="tdts-hero" aria-labelledby="tdts-title">
        <div class="tdts-hero-grid" aria-hidden="true"></div>
        <div class="tdts-container tdts-hero-inner">
            <div class="tdts-hero-copy">
                <p class="tdts-eyebrow"><span class="tdts-eyebrow-dot"></span> TRUE DIESEL LTD. <span class="tdts-eyebrow-separator">/</span> TECHNOLOGY DEPARTMENT</p>
                <h1 id="tdts-title">Technology Solutions <span>for Heavy-Duty Industries.</span></h1>
                <ul class="tdts-hero-bullets">
    <li>Industrial Technology</li>
    <li>Computer Systems</li>
    <li>Automation</li>
</ul>
                <p class="tdts-hero-description">Specialized systems integration, industrial automation, electronic diagnostics and practical technical support for the industries that keep things moving.</p>
                <div class="tdts-actions">
                    <a class="tdts-btn tdts-btn-primary" href="#technology-contact">Contact Technology Department <span aria-hidden="true">↗</span></a>
                    <a class="tdts-btn tdts-btn-outline" href="#technology-capabilities">Explore our capabilities <span aria-hidden="true">↓</span></a>
                </div>
                <div class="tdts-hero-tags" aria-label="Areas of expertise">
                    <span>Systems Integration</span><span>Electronic Controls</span><span>Field Support</span>
                </div>
            </div>
            <div class="tdts-hero-visual">
                <div class="tdts-hero-image-shell">
                    <img class="tdts-hero-image" src="<?php echo $tdts_img('ecu-board.webp'); ?>" alt="Close-up of electronic control module testing probes on a circuit board" fetchpriority="high">
                    <div class="tdts-image-coordinate tdts-coordinate-top" aria-hidden="true">CONTROL SYSTEMS</div>
                    <div class="tdts-image-coordinate tdts-coordinate-bottom" aria-hidden="true">ELECTRONICS • DIAGNOSTICS • INTEGRATION</div>
                </div>
                
            </div>
        </div>
        <div class="tdts-hero-rule" aria-hidden="true"><div class="tdts-container"><span>CAPABILITIES</span><span>EXPLORE BELOW <b>↓</b></span></div></div>
    </section>

    <nav class="tdts-section-nav" aria-label="Technology page sections">
        <div class="tdts-container">
            <a href="#technology-overview">Overview</a>
            <a href="#technology-capabilities">Capabilities</a>
            <a href="#technology-field">Field Services</a>
            <a href="#technology-industries">Industries</a>
            <a href="#technology-contact">Contact <span aria-hidden="true">↗</span></a>
        </div>
    </nav>

    <section id="technology-overview" class="tdts-overview tdts-section">
        <div class="tdts-container tdts-overview-grid">
            <div class="tdts-overview-left tdts-reveal">
                <p class="tdts-kicker"><span></span> THE DEPARTMENT</p>
                <h2>Technology expertise.<br><em>Heavy-duty experience.</em></h2>
                <p class="tdts-overview-main">Modern industrial operations depend on reliable computer systems, electronics and connected equipment.</p>
            </div>
            <div class="tdts-overview-right tdts-reveal">
                <p>True Diesel Ltd.'s Technology Solutions Department provides specialized computer systems integration, industrial automation, electronic diagnostics and technical support for commercial transportation, agriculture and heavy-duty industries.</p>
                <p>Our dedicated team works with external businesses to configure, integrate, troubleshoot and maintain computer-based industrial systems and electronic equipment. We bring practical technology expertise into demanding real-world environments.</p>
                <div class="tdts-overview-process" aria-label="How we help"><span>Configure</span><span>Integrate</span><span>Troubleshoot</span></div>
            </div>
        </div>
    </section>

    <section id="technology-capabilities" class="tdts-services tdts-section">
        <div class="tdts-container">
            <div class="tdts-heading-row tdts-reveal">
                <div><p class="tdts-kicker"><span></span> OUR CAPABILITIES</p><h2>Built for complexity.<br><em>Focused on solutions.</em></h2></div>
                <p>From the computer system to the control module, technical problems need focused, practical solutions.</p>
            </div>
            <div class="tdts-services-grid">
                <article class="tdts-service-card tdts-reveal">
                    <div class="tdts-card-image"><img src="<?php echo $tdts_img('ecu-bench.webp'); ?>" alt="Circuit board connected to electronic testing equipment" loading="lazy"></div>
                    <div class="tdts-card-content"><div class="tdts-card-label">COMPUTER SYSTEMS</div><h3>Computer Systems Integration</h3><p>Hardware and software integration, system setup, configuration, troubleshooting and client-specific implementations.</p><a href="#technology-contact" aria-label="Inquire about computer systems integration">Discuss this service <span aria-hidden="true">↗</span></a></div>
                </article>
                <article class="tdts-service-card tdts-reveal">
                    <div class="tdts-card-image"><img src="<?php echo $tdts_img('calibration-workstation.webp'); ?>" alt="Technical software display showing multidimensional electronic control data" loading="lazy"></div>
                    <div class="tdts-card-content"><div class="tdts-card-label">INDUSTRIAL CONTROLS</div><h3>Technology Solutions</h3><p>Computer-controlled system configuration, integration, programming and troubleshooting for applicable industrial equipment.</p><a href="#technology-contact" aria-label="Inquire about Technology Solutions">Discuss this service <span aria-hidden="true">↗</span></a></div>
                </article>
                <article class="tdts-service-card tdts-reveal">
                    <div class="tdts-card-image"><img src="<?php echo $tdts_img('tech1.jpg'); ?>" alt="Close-up of electronic circuit board and precision probes" loading="lazy"></div>
                    <div class="tdts-card-content"><div class="tdts-card-label">ELECTRONIC CONTROL SYSTEMS</div><h3>ECU &amp; Electronic Systems</h3><p>Electronic control system diagnostics, module programming and configuration, and specialist electronic troubleshooting.</p><a href="#technology-contact" aria-label="Inquire about ECU and electronic systems">Discuss this service <span aria-hidden="true">↗</span></a></div>
                </article>
                <article class="tdts-service-card tdts-reveal">
                    <div class="tdts-card-image"><img src="<?php echo $tdts_img('vehicle-network-interface.webp'); ?>" alt="Diagnostic interface software identifying vehicle electronic modules" loading="lazy"></div>
                    <div class="tdts-card-content"><div class="tdts-card-label">DEPLOYMENT &amp; SUPPORT</div><h3>Technical Setup &amp; Support</h3><p>Software deployment, technical installation, configuration, commissioning support and technical issue resolution.</p><a href="#technology-contact" aria-label="Inquire about technical setup and support">Discuss this service <span aria-hidden="true">↗</span></a></div>
                </article>
            </div>
        </div>
    </section>

    <section class="tdts-showcase tdts-section" aria-label="Technology applications">
        <div class="tdts-container tdts-showcase-grid">
            <div class="tdts-showcase-copy tdts-reveal">
                <p class="tdts-kicker"><span></span> ELECTRONIC DIAGNOSTICS</p>
                <h2>Beyond the fault code.</h2>
                <p>Electronic systems need more than a generic scan. Understanding communication networks, control modules, software configuration and system behavior is essential to effective troubleshooting.</p>
                <a class="tdts-text-link" href="#technology-contact">Discuss your technical requirements <span aria-hidden="true">↗</span></a>
            </div>
            <div class="tdts-showcase-art tdts-reveal">
                <div class="tdts-showcase-large"><img src="<?php echo $tdts_img('calibration-3d.webp'); ?>" alt="Three-dimensional control system data visualization" loading="lazy"></div>
                <div class="tdts-showcase-small"><img src="<?php echo $tdts_img('engine-system-diagnostics.webp'); ?>" alt="Computer-based engine system diagnostic diagram" loading="lazy"></div>
                <span class="tdts-showcase-caption" aria-hidden="true">SYSTEM DATA / VISUALIZATION</span>
            </div>
        </div>
    </section>

    <section id="technology-field" class="tdts-field tdts-section">
        <div class="tdts-container tdts-field-grid">
            <div class="tdts-field-media tdts-reveal"><img src="<?php echo $tdts_img('tech2.jpg'); ?>" alt="Electronic systems testing hardware in a technical workshop" loading="lazy"><div class="tdts-field-media-label">TECHNICAL SERVICES / IN THE FIELD</div></div>
            <div class="tdts-field-copy tdts-reveal"><p class="tdts-kicker"><span></span> ON-SITE FIELD SERVICES</p><h2>Technical support.<br><em>Where it is needed.</em></h2><p>Not every system can be brought into a workshop. We offer on-site technical visits for farms, fleets, workshops and heavy-duty industrial customers, subject to equipment and service requirements.</p><ul><li>Equipment and electronic system troubleshooting</li><li>Technical configuration and setup assistance</li><li>Site-specific systems integration support</li></ul><a class="tdts-btn tdts-btn-primary" href="#technology-contact">Request field support <span aria-hidden="true">↗</span></a></div>
        </div>
    </section>

    <section id="technology-industries" class="tdts-industries tdts-section">
        <div class="tdts-container">
            <div class="tdts-heading-row tdts-heading-industries tdts-reveal"><div><p class="tdts-kicker"><span></span> INDUSTRIES WE SERVE</p><h2>Industrial knowledge.<br><em>Applied technology.</em></h2></div><p>Solutions grounded in the realities of transportation, agriculture and industrial operations.</p></div>
            <div class="tdts-industries-grid">
                <article class="tdts-industry tdts-reveal"><div class="tdts-industry-icon" aria-hidden="true"><svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.7"><path d="M4 15h27v20H4zM31 22h8l5 7v6H31zM11 35a4 4 0 1 0 8 0m17 0a4 4 0 1 0 8 0"/><path d="M8 9h19M39 29h-8"/></svg></div><h3>Transportation &amp; Fleets</h3><p>Commercial vehicles, fleet operations and workshop technologies.</p></article>
                <article class="tdts-industry tdts-reveal"><div class="tdts-industry-icon" aria-hidden="true"><svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.7"><path d="M8 34h31M15 33V18l9-7 9 7v15M12 24l-6 4v6M36 24l6 4v6M20 34V24h8v10"/><path d="M9 13c4 0 5-2 5-6 4 1 7 4 6 8"/></svg></div><h3>Agriculture</h3><p>Technical visits and computer-based equipment support for agricultural operations.</p></article>
                <article class="tdts-industry tdts-reveal"><div class="tdts-industry-icon" aria-hidden="true"><svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.7"><path d="M5 40V18l13 8V18l13 8V10h11v30zM5 40h39M12 31h4m8 0h4m8 0h4M12 36h4m8 0h4m8 0h4"/></svg></div><h3>Heavy Equipment &amp; Industry</h3><p>Electronic controls and related computer technologies in demanding environments.</p></article>
            </div>
        </div>
    </section>

    <section id="technology-contact" class="tdts-contact tdts-section">
        <div class="tdts-container tdts-contact-grid">
            <div class="tdts-contact-copy tdts-reveal"><p class="tdts-kicker"><span></span> LET'S TALK TECHNOLOGY</p><h2>Have a system<br>that needs <em>solving?</em></h2><p>Tell us what you are working with, where you are located and what kind of technical support you need. Our Technology Department can review your inquiry.</p><div class="tdts-contact-direct"><span>TECHNOLOGY DEPARTMENT EMAIL</span><a href="mailto:tech@truediesel.ca">tech@truediesel.ca <span aria-hidden="true">↗</span></a></div><p class="tdts-contact-company">Technology Solutions is a department of True Diesel Ltd.</p></div>
            <div class="tdts-form-card tdts-reveal">
                <div class="tdts-form-heading"><p>SEND AN INQUIRY</p></div>
                <?php if ($tdts_sent) : ?>
                    <div class="tdts-form-notice tdts-form-success" role="status">Your message has been submitted. Thank you for contacting Technology Solutions.</div>
                <?php elseif ('' !== $tdts_error) : ?>
                    <div class="tdts-form-notice tdts-form-error" role="alert"><?php echo esc_html($tdts_error); ?></div>
                <?php endif; ?>
                <form method="post" action="<?php echo esc_url(get_permalink()); ?>#technology-contact" class="tdts-form">
                    <?php wp_nonce_field('tdts_technology_inquiry', 'tdts_nonce'); ?>
                    <div class="tdts-honeypot" aria-hidden="true"><label>Leave this field empty <input type="text" name="tdts_website" value="" tabindex="-1" autocomplete="off"></label></div>
                    <div class="tdts-form-row"><label>Your name <span>*</span><input type="text" name="tdts_name" autocomplete="name" maxlength="120" required></label><label>Company / Organization<input type="text" name="tdts_company" autocomplete="organization" maxlength="150"></label></div>
                    <div class="tdts-form-row"><label>Email address <span>*</span><input type="email" name="tdts_email" autocomplete="email" maxlength="200" required></label><label>City / Service location <span>*</span><input type="text" name="tdts_location" autocomplete="address-level2" maxlength="150" required></label></div>
                    <label>Type of support <span>*</span><select name="tdts_service" required><option value="" selected disabled>Select a service</option><?php foreach ($tdts_services as $tdts_service) : ?><option value="<?php echo esc_attr($tdts_service); ?>"><?php echo esc_html($tdts_service); ?></option><?php endforeach; ?></select></label>
                    <label>Tell us about your system or issue <span>*</span><textarea name="tdts_details" rows="4" minlength="10" maxlength="5000" placeholder="Equipment, software, system details, location, and the support you need..." required></textarea></label>
                    <button type="submit" name="tdts_contact_submit" value="1" class="tdts-btn tdts-btn-primary tdts-form-submit">Send inquiry <span aria-hidden="true">↗</span></button>
                    <p class="tdts-form-note">* Required. We use the information you submit to respond to this inquiry.</p>
                </form>
            </div>
        </div>
    </section>
    <div class="tdts-endcap"><div class="tdts-container"><strong>TRUE DIESEL <span>/</span> TECHNOLOGY SOLUTIONS</strong><span>Technology Expertise. Heavy-Duty Experience.</span></div></div>
</main>
<?php get_footer(); ?>
