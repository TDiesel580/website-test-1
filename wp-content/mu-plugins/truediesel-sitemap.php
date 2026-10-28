<?php
/**
 * Plugin Name: True Diesel Sitemap Configuration
 * Description: Include only public WordPress pages in XML sitemaps.
 */

add_filter('wp_sitemaps_post_types', function ($post_types) {
    return isset($post_types['page'])
        ? array('page' => $post_types['page'])
        : array();
});

add_filter('wp_sitemaps_add_provider', function ($provider, $name) {
    if ($name === 'users' || $name === 'taxonomies') {
        return false;
    }

    return $provider;
}, 10, 2);
