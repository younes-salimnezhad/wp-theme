<?php
// Theme functions will be added here.

function persian_store_theme_setup() {
    // Register a navigation menu.
    register_nav_menus( array(
        'primary' => esc_html__( 'Primary Menu', 'persian-store-theme' ),
    ) );
}
add_action( 'after_setup_theme', 'persian_store_theme_setup' );

/**
 * WooCommerce Support
 */

// Theme setup function
function persian_store_theme_setup_enhancements() {
    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    // Let WordPress manage the document title.
    add_theme_support( 'title-tag' );

    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support( 'post-thumbnails' );

    // Switch default core markup for search form, comment form, and comments to output valid HTML5.
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );

    // Add theme support for WooCommerce.
    add_theme_support( 'woocommerce' );
    // Add gallery zoom, lightbox and slider support
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'persian_store_theme_setup_enhancements' );


// Original WooCommerce support function might be redundant now or can be merged.
// For now, let's ensure the new setup function handles WC support.
// function persian_store_add_woocommerce_support() {
// add_theme_support( 'woocommerce' );
// }
// add_action( 'after_setup_theme', 'persian_store_add_woocommerce_support' );
// It's better to have one setup function for all add_theme_support calls.
// Removing the specific WC support action if it's now covered in persian_store_theme_setup_enhancements.
remove_action('after_setup_theme', 'persian_store_add_woocommerce_support');
add_action('after_setup_theme', 'persian_store_theme_setup'); // Ensure original setup for nav menu is still called.

// Helper functions for image schema (moved from single.php)
if (!function_exists('get_image_width_for_schema')) {
    function get_image_width_for_schema($image_id, $size = 'thumbnail') {
        $image_data = wp_get_attachment_image_src($image_id, $size);
        return $image_data ? $image_data[1] : 'unknown';
    }
}
if (!function_exists('get_image_height_for_schema')) {
    function get_image_height_for_schema($image_id, $size = 'thumbnail') {
        $image_data = wp_get_attachment_image_src($image_id, $size);
        return $image_data ? $image_data[2] : 'unknown';
    }
}

// Remove default WooCommerce wrappers
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

// Add theme's WooCommerce wrappers
function persian_store_woocommerce_wrapper_start() {
    echo '<div id="primary" class="content-area">'; // Added a div with class content-area to match theme structure
    echo '<main id="main" class="site-main" role="main">';
}
add_action( 'woocommerce_before_main_content', 'persian_store_woocommerce_wrapper_start', 10 );

function persian_store_woocommerce_wrapper_end() {
    echo '</main><!-- #main -->';
    echo '</div><!-- #primary -->'; // Close the content-area div
}
add_action( 'woocommerce_after_main_content', 'persian_store_woocommerce_wrapper_end', 10 );
