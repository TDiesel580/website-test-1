<?php
/**
 * Remove core output this site does not use.
 *
 * Everything here is reversible and none of it is security hardening — that
 * is Stage 10's job, at the server level. This is purely about not shipping
 * bytes nobody asked for.
 *
 * @package TrueDiesel
 */

defined( 'ABSPATH' ) || exit;

/**
 * Strip the emoji detection script and its inline CSS.
 *
 * Costs roughly 12 KB and a DNS-free but still parsed inline script on every
 * page load. Modern browsers render emoji natively; nothing is lost.
 */
function td_disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	add_filter( 'tiny_mce_plugins', 'td_remove_tinymce_emoji' );
}
add_action( 'init', 'td_disable_emojis' );

/**
 * Companion to the above — drops the emoji plugin from the classic editor.
 *
 * @param array $plugins TinyMCE plugin list.
 * @return array
 */
function td_remove_tinymce_emoji( $plugins ) {
	return is_array( $plugins ) ? array_diff( $plugins, array( 'wpemoji' ) ) : array();
}

/**
 * Tidy <head>.
 *
 * - wp_generator leaks the exact WordPress version to anyone reading source,
 *   which is free reconnaissance for automated scanners.
 * - RSD and wlwmanifest serve Windows Live Writer and XML-RPC discovery,
 *   neither of which this site uses.
 */
function td_clean_head() {
	remove_action( 'wp_head', 'wp_generator' );
	remove_action( 'wp_head', 'rsd_link' );
	remove_action( 'wp_head', 'wlwmanifest_link' );
	remove_action( 'wp_head', 'wp_shortlink_wp_head' );
}
add_action( 'init', 'td_clean_head' );

/**
 * Drop the oEmbed discovery/host JS.
 *
 * This is the script that lets OTHER sites embed this one. A repair shop does
 * not need it, and it is a request on every page.
 */
function td_disable_embeds() {
	remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
	remove_action( 'wp_head', 'wp_oembed_add_host_js' );
	add_filter( 'embed_oembed_discover', '__return_false' );
}
add_action( 'init', 'td_disable_embeds' );

/**
 * Dequeue the theme.json-derived global styles.
 *
 * This is a classic theme (D12) with no theme.json, so core generates a block
 * of CSS custom properties from its own defaults that nothing here consumes.
 *
 * IMPORTANT: this deliberately leaves `wp-block-library` alone. Service pages
 * at Stage 6 will be authored with core blocks, and removing that stylesheet
 * would break their layout.
 */
function td_dequeue_global_styles() {
	if ( is_admin() ) {
		return;
	}
	wp_dequeue_style( 'global-styles' );
	wp_dequeue_style( 'wp-block-library-theme' );
}
add_action( 'wp_enqueue_scripts', 'td_dequeue_global_styles', 100 );

/**
 * Add useful classes to <body> so CSS can branch without JS.
 *
 * @param array $classes Existing body classes.
 * @return array
 */
function td_body_classes( $classes ) {
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
	if ( ! has_nav_menu( 'primary' ) ) {
		$classes[] = 'no-primary-nav';
	}
	return $classes;
}
add_filter( 'body_class', 'td_body_classes' );
