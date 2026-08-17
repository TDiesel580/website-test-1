<?php
/**
 * Small output helpers used by the templates.
 *
 * Keeping these here rather than inline in templates means markup decisions
 * live in one place and the templates stay readable.
 *
 * @package TrueDiesel
 */

defined( 'ABSPATH' ) || exit;

/**
 * Print the site branding block — logo if one is set, site title otherwise.
 *
 * The h1/div swap matters for Stage 9: exactly one h1 per page, and on
 * interior pages that h1 belongs to the page title, not the site name.
 */
function td_site_branding() {
	$tag = is_front_page() ? 'h1' : 'div';

	echo '<' . esc_attr( $tag ) . ' class="site-branding">';

	if ( has_custom_logo() ) {
		the_custom_logo();
	} else {
		printf(
			'<a class="site-branding__text" href="%1$s" rel="home">%2$s</a>',
			esc_url( home_url( '/' ) ),
			esc_html( get_bloginfo( 'name' ) )
		);
	}

	echo '</' . esc_attr( $tag ) . '>';
}

/**
 * Render the primary navigation, or nothing if no menu is assigned.
 *
 * Guarding on has_nav_menu() avoids WordPress's fallback behaviour of dumping
 * a raw page list into the header, which looks broken on a fresh install.
 */
function td_primary_nav() {
	if ( ! has_nav_menu( 'primary' ) ) {
		return;
	}

	wp_nav_menu(
		array(
			'theme_location' => 'primary',
			'container'      => 'nav',
			'container_class' => 'nav nav--primary',
			'container_aria_label' => __( 'Primary', 'truediesel' ),
			'menu_class'     => 'nav__list',
			'depth'          => 2,
			'fallback_cb'    => false,
		)
	);
}

/**
 * Render the footer navigation, or nothing if no menu is assigned.
 */
function td_footer_nav() {
	if ( ! has_nav_menu( 'footer' ) ) {
		return;
	}

	wp_nav_menu(
		array(
			'theme_location' => 'footer',
			'container'      => 'nav',
			'container_class' => 'nav nav--footer',
			'container_aria_label' => __( 'Footer', 'truediesel' ),
			'menu_class'     => 'nav__list',
			'depth'          => 1,
			'fallback_cb'    => false,
		)
	);
}

/**
 * Entry meta for blog-style posts. Unused on pages.
 */
function td_entry_meta() {
	if ( 'post' !== get_post_type() ) {
		return;
	}

	printf(
		'<p class="entry__meta"><time datetime="%1$s">%2$s</time></p>',
		esc_attr( get_the_date( DATE_W3C ) ),
		esc_html( get_the_date() )
	);
}

/**
 * Escaped, translatable "read more" link that includes the post title for
 * screen readers — a bare "Read more" repeated down a page is an
 * accessibility failure Stage 9 would otherwise have to fix.
 */
function td_read_more_link() {
	printf(
		'<a class="entry__more" href="%1$s">%2$s<span class="screen-reader-text"> %3$s</span></a>',
		esc_url( get_permalink() ),
		esc_html__( 'Read more', 'truediesel' ),
		esc_html( get_the_title() )
	);
}
