<?php
/** Header styling for the main True Diesel site. */
defined( 'ABSPATH' ) || exit;

function td_nav_polish_icons( $title, $item, $args, $depth ) {
    if ( 0 !== (int) $depth || ! isset( $args->theme_location ) || 'primary' !== $args->theme_location ) {
        return $title;
    }

    $key = strtolower( trim( wp_strip_all_tags( $title ) ) );
    $icons = array(
        'home' => '<path d="m3 10 9-7 9 7v10a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1z"/><path d="M9 21v-8h6v8"/>',
        'services' => '<path d="M14.7 6.3a5 5 0 0 0-6.4 6.4l-5.8 5.8a2.12 2.12 0 0 0 3 3l5.8-5.8a5 5 0 0 0 6.4-6.4L14 13l-3-3z"/>',
        'technology' => '<rect x="5" y="5" width="14" height="14" rx="2"/><path d="M9 9h6v6H9zM9 1v4m6-4v4M9 19v4m6-4v4M1 9h4m-4 6h4m14-6h4m-4 6h4"/>',
        'technology solutions' => '<rect x="5" y="5" width="14" height="14" rx="2"/><path d="M9 9h6v6H9zM9 1v4m6-4v4M9 19v4m6-4v4M1 9h4m-4 6h4m14-6h4m-4 6h4"/>',
        'contact' => '<rect x="2" y="4" width="20" height="16" rx="2"/><circle cx="8" cy="10" r="2"/><path d="M5 16c0-2 6-2 6 0M14 9h5M14 13h5"/>',
        'contact us' => '<rect x="2" y="4" width="20" height="16" rx="2"/><circle cx="8" cy="10" r="2"/><path d="M5 16c0-2 6-2 6 0M14 9h5M14 13h5"/>',
        'about us' => '<circle cx="12" cy="12" r="10"/><path d="M12 11v6M12 7h.01"/>',
        'about' => '<circle cx="12" cy="12" r="10"/><path d="M12 11v6M12 7h.01"/>',
        'shop' => '<path d="M4 9h16l-1 12H5L4 9Z"/><path d="M9 10V6a3 3 0 0 1 6 0v4"/>',
    );

    if ( ! isset( $icons[ $key ] ) ) {
        return $title; // Also leaves the flashing TRUCK SALES tab untouched.
    }

    return '<svg class="td-nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">'
        . $icons[ $key ] . '</svg>' . $title;
}
add_filter( 'nav_menu_item_title', 'td_nav_polish_icons', 10, 4 );

function td_nav_polish_enqueue() {
    $rel = 'assets/css/nav-polish.css';
    wp_enqueue_style(
        'td-nav-polish',
        TD_URI . '/' . $rel,
        array( 'td-about' ),
        td_asset_version( $rel )
    );
}
add_action( 'wp_enqueue_scripts', 'td_nav_polish_enqueue', 30 );
