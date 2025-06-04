<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'persian-store-theme' ); ?></a>

    <header id="masthead" class="site-header">
        <div class="header-container">
            <div class="site-branding">
                <?php
                if ( is_front_page() || is_home() ) : ?>
                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <?php else : ?>
                    <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                <?php endif;
                $persian_store_description = get_bloginfo( 'description', 'display' );
                if ( $persian_store_description || is_customize_preview() ) : ?>
                    <p class="site-description"><?php echo $persian_store_description; /* WPCS: xss ok. */ ?></p>
                <?php endif; ?>
            </div><!-- .site-branding -->

            <nav id="site-navigation" class="main-navigation">
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'menu_id'        => 'primary-menu',
                    'container'      => false, // Avoids wrapping menu in an extra div
                    'depth'          => 2,     // Support for one level of dropdown
                ) );
                ?>
            </nav><!-- #site-navigation -->
             <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'persian-store-theme' ); ?></button>

            <div class="header-search">
                <?php get_search_form(); ?>
            </div>

            <div class="header-cart">
                <a href="#">Cart</a> <!-- Placeholder link -->
            </div>

            <div class="header-auth">
                <a href="#">Login</a> <!-- Placeholder link -->
                <a href="#">Register</a> <!-- Placeholder link -->
            </div>
        </div><!-- .header-container -->
    </header><!-- #masthead -->

    <div id="content" class="site-content">
