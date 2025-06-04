<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Persian_Store_Theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); // Hook for plugins, recommended since WP 5.2 ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'persian-store-theme' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="header-container">
			<div class="site-branding">
				<?php
				if ( is_front_page() || is_home() ) :
					?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
				else :
					?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php
				endif;
				$persian_store_description = get_bloginfo( 'description', 'display' );
				if ( $persian_store_description || is_customize_preview() ) :
					?>
					<p class="site-description"><?php echo esc_html( $persian_store_description ); // Escaped description ?></p>
				<?php endif; ?>
			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation" role="navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
					<?php esc_html_e( 'Menu', 'persian-store-theme' ); ?>
				</button>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'menu_id'        => 'primary-menu',
						'container'      => false, // Avoids wrapping menu in an extra div.
						'depth'          => 2,     // Support for one level of dropdown.
					)
				);
				?>
			</nav><!-- #site-navigation -->

			<div class="header-search">
				<?php get_search_form(); ?>
			</div>

			<div class="header-cart">
				<a href="<?php echo esc_url( wc_get_cart_url() ); // Use WooCommerce function if available, else '#' ?>">
					<?php esc_html_e( 'Cart', 'persian-store-theme' ); ?>
					<?php // You could add a cart count here if desired ?>
				</a>
			</div>

			<div class="header-auth">
				<?php if ( is_user_logged_in() ) : ?>
					<a href="<?php echo esc_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ); ?>">
						<?php esc_html_e( 'My Account', 'persian-store-theme' ); ?>
					</a>
					<a href="<?php echo esc_url( wp_logout_url( home_url() ) ); ?>">
						<?php esc_html_e( 'Logout', 'persian-store-theme' ); ?>
					</a>
				<?php else : ?>
					<a href="<?php echo esc_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ); // Link to WC my-account page for login ?>">
						<?php esc_html_e( 'Login', 'persian-store-theme' ); ?>
					</a>
					<a href="<?php echo esc_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) . '?action=register' ); // Link to WC my-account page for registration - might need custom handling or a plugin for separate registration page ?>">
						<?php esc_html_e( 'Register', 'persian-store-theme' ); ?>
					</a>
				<?php endif; ?>
			</div>
		</div><!-- .header-container -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
