<?php
/**
 * Asset loading.
 *
 * No-build theme (D11): CSS and JS are hand-authored and served as-is. There
 * is no bundler, no dist/ directory, and nothing to compile before deploying.
 *
 * @package TrueDiesel
 */

defined( 'ABSPATH' ) || exit;

/**
 * Cache-busting version string for a theme-relative asset.
 *
 * Uses the file's modification time, so saving a file is enough to invalidate
 * every browser and CDN copy of it. This is the piece that replaces a build
 * step's content hashing.
 *
 * Falls back to TD_VERSION if the file is missing, so a typo in a path
 * degrades to a working (if stale-able) URL rather than a PHP warning.
 *
 * @param string $rel Path relative to the theme root, e.g. 'assets/css/base.css'.
 * @return string
 */
function td_asset_version( $rel ) {
	$path = TD_DIR . '/' . ltrim( $rel, '/' );
	return file_exists( $path ) ? (string) filemtime( $path ) : TD_VERSION;
}

/**
 * The stylesheet load order.
 *
 * Order matters: each layer assumes the previous one has already landed.
 * tokens -> reset -> base -> layout -> components -> explorer.
 *
 * These are separate handles rather than one concatenated file on purpose.
 * Over HTTP/2 the extra requests are close to free, and keeping the layers
 * separate makes Stage 3 (design system) and Stage 5 (explorer) far easier to
 * work on. Stage 8 can revisit and concatenate if Core Web Vitals ask for it.
 *
 * @return array<string,string> handle suffix => relative path
 */
function td_style_manifest() {
	return array(
		'tokens'     => 'assets/css/tokens.css',
		'reset'      => 'assets/css/reset.css',
		'base'       => 'assets/css/base.css',
		'layout'     => 'assets/css/layout.css',
		'components' => 'assets/css/components.css',
		'explorer'   => 'assets/css/explorer.css',
	);
}

/**
 * Enqueue front-end CSS and JS.
 */
function td_enqueue_assets() {

	$previous = '';

	foreach ( td_style_manifest() as $slug => $rel ) {
		$handle = 'td-' . $slug;

		// Each sheet depends on the one before it. That dependency chain is
		// what guarantees cascade order regardless of what else enqueues CSS.
		$deps = $previous ? array( $previous ) : array();

		wp_enqueue_style( $handle, TD_URI . '/' . $rel, $deps, td_asset_version( $rel ) );

		$previous = $handle;
	}

	// Main behaviour script. Loaded in the footer with `defer` so it never
	// blocks the first paint.
	wp_enqueue_script(
		'td-main',
		TD_URI . '/assets/js/main.js',
		array(),
		td_asset_version( 'assets/js/main.js' ),
		array(
			'in_footer' => true,
			'strategy'  => 'defer',
		)
	);

	// Truck system explorer (Stage 5). Only loaded where it actually renders,
	// so interior pages never pay for it.
	if ( is_front_page() ) {
		wp_enqueue_script(
			'td-explorer',
			TD_URI . '/assets/js/explorer.js',
			array( 'td-main' ),
			td_asset_version( 'assets/js/explorer.js' ),
			array(
				'in_footer' => true,
				'strategy'  => 'defer',
			)
		);
	}
}
add_action( 'wp_enqueue_scripts', 'td_enqueue_assets' );

/**
 * Preload the primary font file, if one is present.
 *
 * Left inert until Stage 3 picks the typeface. When it does, drop the file in
 * assets/fonts/ and set $font below — the preload hint plus a font-display
 * rule in tokens.css is what keeps the largest-contentful-paint text from
 * flashing.
 */
function td_preload_assets() {
	$font = 'assets/fonts/barlow-condensed/BarlowCondensed-SemiBold.ttf';

	if ( ! $font || ! file_exists( TD_DIR . '/' . $font ) ) {
		return;
	}

	printf(
		'<link rel="preload" href="%s" as="font" type="font/ttf" crossorigin>' . "\n",
		esc_url( TD_URI . '/' . $font )
	);
}
add_action( 'wp_head', 'td_preload_assets', 1 );
