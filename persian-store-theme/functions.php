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

	// Enqueue slider script for homepage.
	if ( is_front_page() && is_home() ) { // Or a more specific check if slider can be disabled via options
		wp_enqueue_script(
			'persian-store-slider',
			get_template_directory_uri() . '/js/slider.js',
			array(), // No dependencies for this vanilla JS script
			wp_get_theme()->get( 'Version' ), // Theme version for cache busting
			true // Load in footer
		);
	}
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

/**
 * Theme Admin Menu for Slider Settings.
 */
if ( ! function_exists( 'persian_store_add_slider_options_page' ) ) {
	/**
	 * Adds a menu page for Theme Slider Settings.
	 */
	function persian_store_add_slider_options_page() {
		add_menu_page(
			'دیجی زاب',     // Page Title
			'دیجی زاب',     // Menu Title
			'manage_options', // Capability - changed to manage_options
			'digizaab',     // Menu Slug - changed to be more specific
			'persian_store_render_slider_options_page',           // Callback function
			'dashicons-store',                                    // Icon URL
			2               // Position - changed to appear near the top
		);
	}
}

// Make sure to run this after WordPress has initialized
function init_admin_menu() {
    persian_store_add_slider_options_page();
}
add_action( 'admin_menu', 'init_admin_menu' );

if ( ! function_exists( 'persian_store_render_slider_options_page' ) ) {
	/**
	 * Renders the HTML for the Theme Slider Settings page.
	 */
	function persian_store_render_slider_options_page() {
		// Check user capabilities
		if ( ! current_user_can( 'edit_theme_options' ) ) {
			return;
		}
		?>
		<div class="wrap">
			<h1><?php esc_html_e( 'Theme Slider Settings', 'persian-store-theme' ); ?></h1>
			<form method="post" action="options.php">
				<?php
				settings_fields( 'persian_store_slider_options_group' ); // Output nonce, action, and option_page fields for the group.
				do_settings_sections( 'persian_store_slider_options' );  // Print out all settings sections and fields for the page slug.
				submit_button( esc_html__( 'Save Slider Settings', 'persian-store-theme' ) ); // Default submit button.
				?>
			</form>
		</div>
		<?php
	}
}

if ( ! function_exists( 'persian_store_register_slider_settings' ) ) {
	/**
	 * Registers the theme's slider settings group and option name.
	 */
	function persian_store_register_slider_settings() {
		register_setting(
			'persian_store_slider_options_group', // Option group
			'persian_store_slider_settings',      // Option name (stores all slider settings as an array)
			array(
				'sanitize_callback' => 'persian_store_sanitize_slider_settings',
				'default'           => array(), // Default values for the settings array
			)
		);

		// Add settings section for slides
		add_settings_section(
			'persian_store_slider_section_main',               // ID
			esc_html__( 'Manage Slides', 'persian-store-theme' ), // Title
			'persian_store_slider_section_main_callback',    // Callback
			'persian_store_slider_options'                     // Page slug
		);

		// Register fields for up to 3 slides
		for ( $i = 0; $i < 3; $i++ ) {
			$slide_num = $i + 1;

			// Image URL
			add_settings_field(
				'slide_' . $i . '_image_url',
				sprintf( esc_html__( 'Slide %d Image URL', 'persian-store-theme' ), $slide_num ),
				'persian_store_render_slide_text_input_callback',
				'persian_store_slider_options',
				'persian_store_slider_section_main',
				array(
					'label_for'   => 'slide_' . $i . '_image_url_field',
					'option_name' => 'persian_store_slider_settings',
					'field_key'   => 'slide_' . $i . '_image_url',
					'type'        => 'url', // Specify input type for better semantics / browser validation
					'description' => esc_html__( 'Enter the full URL for the slide image (e.g., from Media Library).', 'persian-store-theme' ),
				)
			);

			// Heading
			add_settings_field(
				'slide_' . $i . '_heading',
				sprintf( esc_html__( 'Slide %d Heading', 'persian-store-theme' ), $slide_num ),
				'persian_store_render_slide_text_input_callback',
				'persian_store_slider_options',
				'persian_store_slider_section_main',
				array(
					'label_for'   => 'slide_' . $i . '_heading_field',
					'option_name' => 'persian_store_slider_settings',
					'field_key'   => 'slide_' . $i . '_heading',
					'description' => esc_html__( 'Enter the main heading text for the slide.', 'persian-store-theme' ),
				)
			);

			// Description
			add_settings_field(
				'slide_' . $i . '_description',
				sprintf( esc_html__( 'Slide %d Description', 'persian-store-theme' ), $slide_num ),
				'persian_store_render_slide_textarea_callback', // Use new textarea callback
				'persian_store_slider_options',
				'persian_store_slider_section_main',
				array(
					'label_for'   => 'slide_' . $i . '_description_field',
					'option_name' => 'persian_store_slider_settings',
					'field_key'   => 'slide_' . $i . '_description',
					'description' => esc_html__( 'Enter a short description or subtext for the slide.', 'persian-store-theme' ),
				)
			);

			// Link URL
			add_settings_field(
				'slide_' . $i . '_link_url',
				sprintf( esc_html__( 'Slide %d Link URL', 'persian-store-theme' ), $slide_num ),
				'persian_store_render_slide_text_input_callback',
				'persian_store_slider_options',
				'persian_store_slider_section_main',
				array(
					'label_for'   => 'slide_' . $i . '_link_url_field',
					'option_name' => 'persian_store_slider_settings',
					'field_key'   => 'slide_' . $i . '_link_url',
					'type'        => 'url',
					'description' => esc_html__( 'Enter the URL this slide should link to (e.g., a product or category page).', 'persian-store-theme' ),
				)
			);

			// Is Active (Checkbox)
			add_settings_field(
				'slide_' . $i . '_is_active',
				sprintf( esc_html__( 'Slide %d Active', 'persian-store-theme' ), $slide_num ),
				'persian_store_render_slide_checkbox_callback',
				'persian_store_slider_options',
				'persian_store_slider_section_main',
				array(
					'label_for'   => 'slide_' . $i . '_is_active_field',
					'option_name' => 'persian_store_slider_settings',
					'field_key'   => 'slide_' . $i . '_is_active',
					'label_text'  => esc_html__( 'Show this slide on the homepage', 'persian-store-theme' ),
					'description' => esc_html__( 'Check this box to make this slide active.', 'persian-store-theme' ),
				)
			);
		}
	}
}
add_action( 'admin_init', 'persian_store_register_slider_settings' );


if ( ! function_exists( 'persian_store_sanitize_slider_settings' ) ) {
	/**
	 * Sanitizes the slider settings input.
	 *
	 * @param array $input The input array from the settings form.
	 * @return array The sanitized input array.
	 */
	function persian_store_sanitize_slider_settings( array $input ) {
		$sanitized_input = array();

		for ( $i = 0; $i < 3; $i++ ) {
			$sanitized_input[ 'slide_' . $i . '_image_url' ] = isset( $input[ 'slide_' . $i . '_image_url' ] ) ? esc_url_raw( trim( $input[ 'slide_' . $i . '_image_url' ] ) ) : '';
			$sanitized_input[ 'slide_' . $i . '_heading' ]   = isset( $input[ 'slide_' . $i . '_heading' ] ) ? sanitize_text_field( $input[ 'slide_' . $i . '_heading' ] ) : '';
			$sanitized_input[ 'slide_' . $i . '_description' ] = isset( $input[ 'slide_' . $i . '_description' ] ) ? sanitize_textarea_field( $input[ 'slide_' . $i . '_description' ] ) : '';
			$sanitized_input[ 'slide_' . $i . '_link_url' ]  = isset( $input[ 'slide_' . $i . '_link_url' ] ) ? esc_url_raw( trim( $input[ 'slide_' . $i . '_link_url' ] ) ) : '';
			$sanitized_input[ 'slide_' . $i . '_is_active' ] = isset( $input[ 'slide_' . $i . '_is_active' ] ) && '1' === $input[ 'slide_' . $i . '_is_active' ] ? '1' : '0';
		}

		return $sanitized_input;
	}
}


if ( ! function_exists( 'persian_store_slider_section_main_callback' ) ) {
	/**
	 * Callback function for the main slider settings section.
	 * Outputs introductory text for the section.
	 */
	function persian_store_slider_section_main_callback() {
		echo '<p>' . esc_html__( 'Configure up to 3 slides for the homepage slider. Ensure you provide valid image URLs and link URLs.', 'persian-store-theme' ) . '</p>';
		echo '<hr/>'; // Add a horizontal rule for visual separation between slides
	}
}

if ( ! function_exists( 'persian_store_render_slide_text_input_callback' ) ) {
	/**
	 * Renders a text input field for slide settings.
	 *
	 * @param array $args Arguments passed from add_settings_field.
	 */
	function persian_store_render_slide_text_input_callback( array $args ) {
		if ( ! current_user_can( 'edit_theme_options' ) ) {
			return;
		}
		$options = get_option( $args['option_name'] );
		$value   = isset( $options[ $args['field_key'] ] ) ? esc_attr( $options[ $args['field_key'] ] ) : '';
		$type    = isset( $args['type'] ) ? esc_attr( $args['type'] ) : 'text';

		printf(
			'<input type="%1$s" id="%2$s" name="%3$s[%4$s]" value="%5$s" class="widefat" />',
			$type,
			esc_attr( $args['label_for'] ),
			esc_attr( $args['option_name'] ),
			esc_attr( $args['field_key'] ),
			$value
		);
		if ( ! empty( $args['description'] ) ) {
			printf( '<p class="description">%s</p>', esc_html( $args['description'] ) );
		}
	}
}

if ( ! function_exists( 'persian_store_render_slide_textarea_callback' ) ) {
	/**
	 * Renders a textarea field for slide settings.
	 *
	 * @param array $args Arguments passed from add_settings_field.
	 */
	function persian_store_render_slide_textarea_callback( array $args ) {
		if ( ! current_user_can( 'edit_theme_options' ) ) {
			return;
		}
		$options = get_option( $args['option_name'] );
		$value   = isset( $options[ $args['field_key'] ] ) ? esc_textarea( $options[ $args['field_key'] ] ) : '';

		printf(
			'<textarea id="%s" name="%s[%s]" rows="3" class="widefat">%s</textarea>', // Using 3 rows for description
			esc_attr( $args['label_for'] ),
			esc_attr( $args['option_name'] ),
			esc_attr( $args['field_key'] ),
			$value
		);
		if ( ! empty( $args['description'] ) ) {
			printf( '<p class="description">%s</p>', esc_html( $args['description'] ) );
		}
	}
}


if ( ! function_exists( 'persian_store_render_slide_checkbox_callback' ) ) {
	/**
	 * Renders a checkbox input field for slide settings.
	 *
	 * @param array $args Arguments passed from add_settings_field.
	 */
	function persian_store_render_slide_checkbox_callback( array $args ) {
		if ( ! current_user_can( 'edit_theme_options' ) ) {
			return;
		}
		$options = get_option( $args['option_name'] );
		$checked = isset( $options[ $args['field_key'] ] ) ? checked( $options[ $args['field_key'] ], '1', false ) : '';

		printf(
			'<input type="checkbox" id="%1$s" name="%2$s[%3$s]" value="1" %4$s />',
			esc_attr( $args['label_for'] ),
			esc_attr( $args['option_name'] ),
			esc_attr( $args['field_key'] ),
			$checked
		);
		printf(
			' <label for="%1$s">%2$s</label>',
			esc_attr( $args['label_for'] ),
			esc_html( $args['label_text'] )
		);
		if ( ! empty( $args['description'] ) ) {
			printf( '<p class="description" style="display:inline-block; margin-right:10px;">%s</p>', esc_html( $args['description'] ) ); // RTL style adjustment
		}
	}
}

/**
 * Enqueues admin-specific styles.
 *
 * @param string $hook_suffix The current admin page hook.
 */
function persian_store_enqueue_admin_styles( $hook_suffix ) {
	// Check if we are on our slider options page.
	// The hook_suffix for a page added by add_theme_page is 'appearance_page_{menu_slug}'.
	if ( 'appearance_page_persian_store_slider_options' === $hook_suffix ) {
		wp_enqueue_style(
			'persian-store-admin-style', // Handle for the stylesheet.
			get_template_directory_uri() . '/css/admin-style.css', // Path to the CSS file.
			array(), // No dependencies.
			wp_get_theme()->get( 'Version' ) // Theme version for cache busting.
		);
	}
}
add_action( 'admin_enqueue_scripts', 'persian_store_enqueue_admin_styles' );

// Ensure all files end with a single blank line.
