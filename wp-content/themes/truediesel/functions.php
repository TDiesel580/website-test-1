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
