<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Persian_Store_Theme
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php if ( is_home() && is_front_page() ) : // Display homepage sections only on the static front page or main blog page. ?>
				<div class="homepage-slider">
					<div class="slide active-slide">
						<div class="slide-content">
							<h2><?php esc_html_e( 'Slide 1 - Special Offer!', 'persian-store-theme' ); ?></h2>
							<p><?php esc_html_e( 'Check out our latest products.', 'persian-store-theme' ); ?></p>
							<a href="#" class="slider-button"><?php esc_html_e( 'Shop Now', 'persian-store-theme' ); ?></a>
						</div>
					</div>
					<div class="slide">
						<div class="slide-content">
							<h2><?php esc_html_e( 'Slide 2 - New Arrivals', 'persian-store-theme' ); ?></h2>
							<p><?php esc_html_e( 'Fresh items in stock.', 'persian-store-theme' ); ?></p>
							<a href="#" class="slider-button"><?php esc_html_e( 'Discover More', 'persian-store-theme' ); ?></a>
						</div>
					</div>
					<div class="slide">
						<div class="slide-content">
							<h2><?php esc_html_e( 'Slide 3 - Seasonal Sale', 'persian-store-theme' ); ?></h2>
							<p><?php esc_html_e( 'Don\'t miss out on great deals.', 'persian-store-theme' ); ?></p>
							<a href="#" class="slider-button"><?php esc_html_e( 'View Sale', 'persian-store-theme' ); ?></a>
						</div>
					</div>
					<a href="#" class="slider-prev" aria-label="<?php esc_attr_e( 'Previous slide', 'persian-store-theme' ); ?>">&#10094;</a>
					<a href="#" class="slider-next" aria-label="<?php esc_attr_e( 'Next slide', 'persian-store-theme' ); ?>">&#10095;</a>
				</div>

				<section class="product-categories-section">
					<h2 class="section-title"><?php esc_html_e( 'Shop by Category', 'persian-store-theme' ); ?></h2>
					<div class="categories-container">
						<?php
						// Placeholder categories - In a real theme, these would likely be dynamic.
						$placeholder_categories = array(
							esc_html__( 'Detergents', 'persian-store-theme' ),
							esc_html__( 'Skin Care', 'persian-store-theme' ),
							esc_html__( 'Hair Care', 'persian-store-theme' ),
							esc_html__( 'Home Essentials', 'persian-store-theme' ),
							esc_html__( 'Baby Products', 'persian-store-theme' ),
							esc_html__( 'Pet Supplies', 'persian-store-theme' ),
						);
						foreach ( $placeholder_categories as $category_name ) :
							?>
						<div class="category-item">
							<div class="category-image-placeholder"></div>
							<h3><?php echo esc_html( $category_name ); ?></h3>
						</div>
						<?php endforeach; ?>
					</div>
				</section>

				<!-- Featured Products Section -->
				<section class="featured-products-section product-section">
					<h2 class="section-title"><?php esc_html_e( 'Featured Products', 'persian-store-theme' ); ?></h2>
					<div class="products-container">
						<?php for ( $i = 1; $i <= 4; $i++ ) : ?>
						<div class="product-item">
							<div class="product-image-placeholder"><span><?php esc_html_e( 'Image', 'persian-store-theme' ); ?></span></div>
							<h3><?php printf( esc_html__( 'Product Name %d', 'persian-store-theme' ), absint( $i ) ); ?></h3>
							<p class="product-price">$<?php echo esc_html( number_format( wp_rand( 10, 100 ), 2 ) ); ?></p>
							<a href="#" class="button add-to-cart-button"><?php esc_html_e( 'Add to Cart', 'persian-store-theme' ); ?></a>
						</div>
						<?php endfor; ?>
					</div>
				</section>

				<!-- Bestsellers Section -->
				<section class="bestsellers-section product-section">
					<h2 class="section-title"><?php esc_html_e( 'Bestsellers', 'persian-store-theme' ); ?></h2>
					<div class="products-container">
						<?php for ( $i = 1; $i <= 4; $i++ ) : ?>
						<div class="product-item">
							<div class="product-image-placeholder"><span><?php esc_html_e( 'Image', 'persian-store-theme' ); ?></span></div>
							<h3><?php printf( esc_html__( 'Bestseller %d', 'persian-store-theme' ), absint( $i ) ); ?></h3>
							<p class="product-price">$<?php echo esc_html( number_format( wp_rand( 15, 150 ), 2 ) ); ?></p>
							<a href="#" class="button add-to-cart-button"><?php esc_html_e( 'Add to Cart', 'persian-store-theme' ); ?></a>
						</div>
						<?php endfor; ?>
					</div>
				</section>

				<!-- Newest Products Section -->
				<section class="newest-products-section product-section">
					<h2 class="section-title"><?php esc_html_e( 'Newest Products', 'persian-store-theme' ); ?></h2>
					<div class="products-container">
						<?php for ( $i = 1; $i <= 4; $i++ ) : ?>
						<div class="product-item">
							<div class="product-image-placeholder"><span><?php esc_html_e( 'Image', 'persian-store-theme' ); ?></span></div>
							<h3><?php printf( esc_html__( 'New Arrival %d', 'persian-store-theme' ), absint( $i ) ); ?></h3>
							<p class="product-price">$<?php echo esc_html( number_format( wp_rand( 20, 200 ), 2 ) ); ?></p>
							<a href="#" class="button add-to-cart-button"><?php esc_html_e( 'Add to Cart', 'persian-store-theme' ); ?></a>
						</div>
						<?php endfor; ?>
					</div>
				</section>

			<?php endif; // End homepage sections. ?>

			<?php
			if ( have_posts() ) :

				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 * For now, we'll use a simplified article structure directly, as done in previous steps.
					 */
					?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<header class="entry-header">
							<?php
							if ( is_singular() ) :
								the_title( '<h1 class="entry-title">', '</h1>' );
							else :
								the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
							endif;

							if ( 'post' === get_post_type() ) : // Show meta only for posts
								?>
								<div class="entry-meta">
									<?php
									// Example: persian_store_posted_on(); - You would define this function in functions.php
									// For now, keeping it simple.
									?>
								</div><!-- .entry-meta -->
							<?php endif; ?>
						</header><!-- .entry-header -->

						<?php if ( has_post_thumbnail() && ! is_singular() ) : // Show thumbnail on archive pages, not on single posts here. ?>
							<div class="post-thumbnail">
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail( 'medium_large' ); // Or another appropriate size. ?>
								</a>
							</div><!-- .post-thumbnail -->
						<?php endif; ?>

						<div class="entry-summary">
							<?php the_excerpt(); // Or the_content() for full content on archives. ?>
						</div><!-- .entry-summary -->

						<footer class="entry-footer">
							<?php // You can add post meta here like categories, tags, comments link etc. ?>
						</footer><!-- .entry-footer -->
					</article><!-- #post-<?php the_ID(); ?> -->
					<?php
				endwhile;

				the_posts_navigation();

			else : // If no content, include the "No posts found" template.
				?>
				<section class="no-results not-found">
					<header class="page-header">
						<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'persian-store-theme' ); ?></h1>
					</header><!-- .page-header -->
					<div class="page-content">
						<?php
						if ( is_home() && current_user_can( 'publish_posts' ) ) :
							printf(
								'<p>' . wp_kses(
									/* translators: 1: link to WP admin new post page. */
									__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'persian-store-theme' ),
									array(
										'a' => array(
											'href' => array(),
										),
									)
								) . '</p>',
								esc_url( admin_url( 'post-new.php' ) )
							);
						elseif ( is_search() ) :
							?>
							<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'persian-store-theme' ); ?></p>
							<?php
							get_search_form();
						else :
							?>
							<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'persian-store-theme' ); ?></p>
							<?php
							get_search_form();
						endif;
						?>
					</div><!-- .page-content -->
				</section><!-- .no-results -->
				<?php
			endif;
			?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
// Ensure single blank line at end of file
?>
