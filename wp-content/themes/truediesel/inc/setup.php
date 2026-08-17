<?php
/**
 * Theme supports, menus, and image sizes.
 *
 * @package TrueDiesel
 */

defined( 'ABSPATH' ) || exit;

/**
 * Declare what the theme supports.
 *
 * Runs on after_setup_theme, which is the only hook early enough for most of
 * these to take effect.
 */
function td_setup() {

	// Let WordPress own the <title> tag. Required for SEO plugins and for
	// wp_get_document_title() to behave. Stage 9 depends on this.
	add_theme_support( 'title-tag' );

	// Featured images — used for service pages and any future case studies.
	add_theme_support( 'post-thumbnails' );

	// Emit HTML5 markup instead of WordPress's legacy XHTML for these
	// subsystems. Without this, core prints markup that fails validation and
	// costs accessibility points at Stage 9.
	add_theme_support(
		'html5',
		array( 'search-form', 'gallery', 'caption', 'style', 'script', 'navigation-widgets' )
	);

	// Custom logo. Sized generously; the real logo is an SVG/PNG from D4.
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 120,
			'width'       => 480,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	// Embedded video/iframes shrink with their container instead of
	// overflowing on phones. Cheap insurance ahead of Stage 7.
	add_theme_support( 'responsive-embeds' );

	// Automatic feed links in <head>.
	add_theme_support( 'automatic-feed-links' );

	// Translation-ready from day one. Costs nothing now, expensive to retrofit.
	load_theme_textdomain( 'truediesel', TD_DIR . '/languages' );

	register_nav_menus(
		array(
			'primary' => __( 'Primary Navigation', 'truediesel' ),
			'footer'  => __( 'Footer Navigation', 'truediesel' ),
		)
	);

	/*
	 * Custom image sizes.
	 *
	 * The `true` third argument hard-crops to the exact dimensions so cards
	 * never have ragged edges. Existing uploads are NOT regenerated
	 * automatically — run `wp media regenerate` after adding a size if there
	 * are already images in the library.
	 */
	add_image_size( 'td-card', 720, 480, true );      // Service / feature cards.
	add_image_size( 'td-wide', 1600, 900, true );     // Hero and section banners.
}
add_action( 'after_setup_theme', 'td_setup' );

/**
 * Content width, used by WordPress to constrain oEmbeds and large images.
 */
function td_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'td_content_width', 1200 );
}
add_action( 'after_setup_theme', 'td_content_width', 0 );

/**
 * Register widget areas.
 *
 * One footer area for now. Add more only when a design calls for them —
 * unused sidebars are dead weight in the admin.
 */
function td_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Footer', 'truediesel' ),
			'id'            => 'footer-1',
			'description'   => __( 'Appears in the site footer.', 'truediesel' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget__title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'td_widgets_init' );
