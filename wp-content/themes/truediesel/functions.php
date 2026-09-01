<?php
/**
 * True Diesel theme bootstrap.
 *
 * Deliberately thin. Everything real lives in inc/ so this file stays a
 * readable table of contents rather than a dumping ground.
 *
 * @package TrueDiesel
 */

defined( 'ABSPATH' ) || exit;

/**
 * Theme version. Bumped by hand at release points.
 *
 * Note: this is NOT what busts asset caches — see td_asset_version() in
 * inc/enqueue.php, which uses each file's mtime so edits go live immediately
 * without a manual bump.
 */
define( 'TD_VERSION', '0.1.0' );

/** Absolute filesystem path to the theme, no trailing slash. */
define( 'TD_DIR', get_template_directory() );

/**
 * Public URL to the theme, no trailing slash.
 *
 * Always derived at runtime — never hardcoded — so the theme survives the
 * move from truediesel.test to the production hostname (D3).
 */
define( 'TD_URI', get_template_directory_uri() );

require_once TD_DIR . '/inc/setup.php';
require_once TD_DIR . '/inc/enqueue.php';
require_once TD_DIR . '/inc/cleanup.php';
require_once TD_DIR . '/inc/services.php';
require_once TD_DIR . '/inc/template-tags.php';

/* =========================================================
 * TRUE DIESEL CONTACT FORM
 * ========================================================= */

function truediesel_handle_contact_form() {

    /*
     * Verify security nonce.
     */
    if (
        ! isset( $_POST['truediesel_contact_nonce'] ) ||
        ! wp_verify_nonce(
            sanitize_text_field(
                wp_unslash( $_POST['truediesel_contact_nonce'] )
            ),
            'truediesel_contact_submit'
        )
    ) {
        wp_die( 'Security check failed.' );
    }


    /*
     * Honeypot spam protection.
     * Real visitors never see or fill this field.
     */
    if (
        ! empty( $_POST['contact_company'] )
    ) {
        wp_safe_redirect(
            add_query_arg(
                'contact_status',
                'sent',
                home_url( '/contact/' )
            )
        );

        exit;
    }


    /*
     * Sanitize form values.
     */
    $name = isset( $_POST['contact_name'] )
        ? sanitize_text_field(
            wp_unslash( $_POST['contact_name'] )
        )
        : '';

    $phone = isset( $_POST['contact_phone'] )
        ? sanitize_text_field(
            wp_unslash( $_POST['contact_phone'] )
        )
        : '';

    $email = isset( $_POST['contact_email'] )
        ? sanitize_email(
            wp_unslash( $_POST['contact_email'] )
        )
        : '';

    $service = isset( $_POST['contact_service'] )
        ? sanitize_text_field(
            wp_unslash( $_POST['contact_service'] )
        )
        : '';

    $message = isset( $_POST['contact_message'] )
        ? sanitize_textarea_field(
            wp_unslash( $_POST['contact_message'] )
        )
        : '';


    /*
     * Required fields.
     */
    if ( empty( $name ) || empty( $phone ) || empty( $message ) ) {

        wp_safe_redirect(
            add_query_arg(
                'contact_status',
                'failed',
                home_url( '/contact/' )
            )
        );

        exit;
    }


    /*
     * CHANGE THIS TO YOUR GMAIL ADDRESS.
     */
    $recipient = 'admin@truediesel.ca';


    /*
     * Email subject.
     */
    $subject = 'True Diesel Website Inquiry';

    if ( ! empty( $service ) ) {
        $subject .= ' - ' . $service;
    }


    /*
     * Email content.
     */
    $body  = "New message from the True Diesel website\n\n";
    $body .= "Name: {$name}\n";
    $body .= "Phone: {$phone}\n";
    $body .= "Email: ";

    if ( ! empty( $email ) ) {
        $body .= $email;
    } else {
        $body .= "Not provided";
    }

    $body .= "\n";

    $body .= "Service: ";

    if ( ! empty( $service ) ) {
        $body .= $service;
    } else {
        $body .= "Not specified";
    }

    $body .= "\n\n";

    $body .= "Message:\n";
    $body .= $message;
    $body .= "\n";


    /*
     * Email headers.
     */
    $headers = array(
        'Content-Type: text/plain; charset=UTF-8',
    );

    /*
     * Allows you to press Reply in Gmail and reply
     * directly to the customer.
     */
    if ( ! empty( $email ) && is_email( $email ) ) {
        $headers[] = 'Reply-To: ' . $name . ' <' . $email . '>';
    }


    /*
     * Send through WordPress.
     */
    $sent = wp_mail(
        $recipient,
        $subject,
        $body,
        $headers
    );


    /*
     * Return visitor to Contact page.
     */
    $status = $sent ? 'sent' : 'failed';

    wp_safe_redirect(
        add_query_arg(
            'contact_status',
            $status,
            home_url( '/contact/' )
        )
    );

    exit;
}


/*
 * Logged-in visitors.
 */
add_action(
    'admin_post_truediesel_contact',
    'truediesel_handle_contact_form'
);


/*
 * Normal website visitors.
 */
add_action(
    'admin_post_nopriv_truediesel_contact',
    'truediesel_handle_contact_form'
);
