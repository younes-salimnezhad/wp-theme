<?php
/**
 * Persian Store Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Persian_Store_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'persian_store_theme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function persian_store_theme_setup() {
		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails' );

		// Register a navigation menu.
		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary Menu', 'persian-store-theme' ),
			)
		);

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
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
	}
endif;
add_action( 'after_setup_theme', 'persian_store_theme_setup' );

/**
 * Enqueue scripts and styles.
 */
function persian_store_enqueue_styles() {
	// Enqueue main stylesheet.
	wp_enqueue_style( 'persian-store-main-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );

	// Enqueue Vazirmatn font CSS.
	wp_enqueue_style( 'persian-store-fonts', get_template_directory_uri() . '/css/fonts.css', array(), wp_get_theme()->get( 'Version' ) );
}
add_action( 'wp_enqueue_scripts', 'persian_store_enqueue_styles' );

/**
 * WooCommerce specific setups.
 * Remove default wrappers and add theme's own.
 */
// Remove default WooCommerce wrappers.
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

if ( ! function_exists( 'persian_store_woocommerce_wrapper_start' ) ) :
	/**
	 * Outputs the opening tags for the theme's WooCommerce content wrapper.
	 */
	function persian_store_woocommerce_wrapper_start() {
		echo '<div id="primary" class="content-area">';
		echo '<main id="main" class="site-main" role="main">';
	}
endif;
add_action( 'woocommerce_before_main_content', 'persian_store_woocommerce_wrapper_start', 10 );

if ( ! function_exists( 'persian_store_woocommerce_wrapper_end' ) ) :
	/**
	 * Outputs the closing tags for the theme's WooCommerce content wrapper.
	 */
	function persian_store_woocommerce_wrapper_end() {
		echo '</main><!-- #main -->';
		echo '</div><!-- #primary -->';
	}
endif;
add_action( 'woocommerce_after_main_content', 'persian_store_woocommerce_wrapper_end', 10 );


if ( ! function_exists( 'get_image_width_for_schema' ) ) :
	/**
	 * Helper function to get image width for schema markup.
	 *
	 * @param int    $image_id The ID of the image.
	 * @param string $size     The image size to get dimensions for.
	 * @return string The image width or 'unknown'.
	 */
	function get_image_width_for_schema( $image_id, $size = 'thumbnail' ) {
		$image_data = wp_get_attachment_image_src( $image_id, $size );
		return $image_data ? (string) $image_data[1] : 'unknown';
	}
endif;

if ( ! function_exists( 'get_image_height_for_schema' ) ) :
	/**
	 * Helper function to get image height for schema markup.
	 *
	 * @param int    $image_id The ID of the image.
	 * @param string $size     The image size to get dimensions for.
	 * @return string The image height or 'unknown'.
	 */
	function get_image_height_for_schema( $image_id, $size = 'thumbnail' ) {
		$image_data = wp_get_attachment_image_src( $image_id, $size );
		return $image_data ? (string) $image_data[2] : 'unknown';
	}
endif;

// Ensure all files end with a single blank line.
