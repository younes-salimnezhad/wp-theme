<?php get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <?php if ( is_home() && is_front_page() ) : // Only on the main blog page / front page ?>
            <div class="homepage-slider">
                <div class="slide active-slide">
                    <div class="slide-content">
                        <h2>Slide 1 - Special Offer!</h2>
                        <p>Check out our latest products.</p>
                        <a href="#" class="slider-button">Shop Now</a>
                    </div>
                </div>
                <div class="slide">
                    <div class="slide-content">
                        <h2>Slide 2 - New Arrivals</h2>
                        <p>Fresh items in stock.</p>
                        <a href="#" class="slider-button">Discover More</a>
                    </div>
                </div>
                <div class="slide">
                    <div class="slide-content">
                        <h2>Slide 3 - Seasonal Sale</h2>
                        <p>Don't miss out on great deals.</p>
                        <a href="#" class="slider-button">View Sale</a>
                    </div>
                </div>
                <a href="#" class="slider-prev">&#10094;</a>
                <a href="#" class="slider-next">&#10095;</a>
            </div>

            <section class="product-categories-section">
                <h2 class="section-title">Shop by Category</h2>
                <div class="categories-container">
                    <div class="category-item">
                        <div class="category-image-placeholder"></div>
                        <h3>Category 1: Detergents</h3>
                    </div>
                    <div class="category-item">
                        <div class="category-image-placeholder"></div>
                        <h3>Category 2: Skin Care</h3>
                    </div>
                    <div class="category-item">
                        <div class="category-image-placeholder"></div>
                        <h3>Category 3: Hair Care</h3>
                    </div>
                    <div class="category-item">
                        <div class="category-image-placeholder"></div>
                        <h3>Category 4: Home Essentials</h3>
                    </div>
                     <div class="category-item">
                        <div class="category-image-placeholder"></div>
                        <h3>Category 5: Baby Products</h3>
                    </div>
                     <div class="category-item">
                        <div class="category-image-placeholder"></div>
                        <h3>Category 6: Pet Supplies</h3>
                    </div>
                </div>
            </section>

            <!-- Featured Products Section -->
            <section class="featured-products-section product-section">
                <h2 class="section-title">Featured Products</h2>
                <div class="products-container">
                    <?php for ($i = 1; $i <= 4; $i++): ?>
                    <div class="product-item">
                        <div class="product-image-placeholder"><span>Image</span></div>
                        <h3>Product Name <?php echo $i; ?></h3>
                        <p class="product-price">$<?php echo number_format(rand(10, 100), 2); ?></p>
                        <a href="#" class="button add-to-cart-button">Add to Cart</a>
                    </div>
                    <?php endfor; ?>
                </div>
            </section>

            <!-- Bestsellers Section -->
            <section class="bestsellers-section product-section">
                <h2 class="section-title">Bestsellers</h2>
                <div class="products-container">
                    <?php for ($i = 1; $i <= 4; $i++): ?>
                    <div class="product-item">
                        <div class="product-image-placeholder"><span>Image</span></div>
                        <h3>Bestseller <?php echo $i; ?></h3>
                        <p class="product-price">$<?php echo number_format(rand(15, 150), 2); ?></p>
                        <a href="#" class="button add-to-cart-button">Add to Cart</a>
                    </div>
                    <?php endfor; ?>
                </div>
            </section>

            <!-- Newest Products Section -->
            <section class="newest-products-section product-section">
                <h2 class="section-title">Newest Products</h2>
                <div class="products-container">
                    <?php for ($i = 1; $i <= 4; $i++): ?>
                    <div class="product-item">
                        <div class="product-image-placeholder"><span>Image</span></div>
                        <h3>New Arrival <?php echo $i; ?></h3>
                        <p class="product-price">$<?php echo number_format(rand(20, 200), 2); ?></p>
                        <a href="#" class="button add-to-cart-button">Add to Cart</a>
                    </div>
                    <?php endfor; ?>
                </div>
            </section>

        <?php endif; ?>

        <?php
        if ( have_posts() ) :
            /* Start the Loop */
            while ( have_posts() ) :
                the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <?php
                        if ( is_singular() ) :
                            the_title( '<h1 class="entry-title">', '</h1>' );
                        else :
                            the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
                        endif;
                        ?>
                    </header><!-- .entry-header -->

                    <?php if ( has_post_thumbnail() && !is_singular() ) : // Show thumbnail on archive pages ?>
                        <div class="post-thumbnail">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('medium_large'); // Or another appropriate size ?>
                            </a>
                        </div><!-- .post-thumbnail -->
                    <?php endif; ?>

                    <div class="entry-summary">
                        <?php the_excerpt(); // Or the_content() if you prefer full content ?>
                    </div><!-- .entry-summary -->

                    <footer class="entry-footer">
                        <?php // You can add post meta here like categories, tags, date etc. ?>
                    </footer><!-- .entry-footer -->
                </article><!-- #post-<?php the_ID(); ?> -->
                <?php
            endwhile;

            the_posts_navigation();

        else : // If no content, include the "No posts found" template.
            // Consider creating a template-parts/content-none.php if you haven't
            // For now, a simple message:
            ?>
            <section class="no-results not-found">
                <header class="page-header">
                    <h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'persian-store-theme' ); ?></h1>
                </header>
                <div class="page-content">
                    <p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'persian-store-theme' ); ?></p>
                    <?php get_search_form(); ?>
                </div><!-- .page-content -->
            </section>
            <?php
        endif;
        ?>
    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
