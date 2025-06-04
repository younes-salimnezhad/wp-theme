<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Persian_Store_Theme
 */

get_header();
?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <?php
            while ( have_posts() ) :
                the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="http://schema.org/Article">
                    <header class="entry-header">
                        <?php the_title( '<h1 class="entry-title" itemprop="headline">', '</h1>' ); ?>
                        <meta itemprop="name" content="<?php echo esc_attr(get_the_title()); ?>">

                        <div class="entry-meta">
                            <?php
                            // Example of basic post meta
                            // You can customize this further
                            printf(
                                '<span class="posted-on"><time class="entry-date published updated" datetime="%1$s" itemprop="datePublished dateModified">%2$s</time></span><span class="byline"> by <span class="author vcard" itemprop="author" itemscope itemtype="http://schema.org/Person"><a class="url fn n" href="%3$s" itemprop="url"><span itemprop="name">%4$s</span></a></span></span>',
                                esc_attr( get_the_date( DATE_W3C ) ),
                                esc_html( get_the_date() ),
                                esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
                                esc_html( get_the_author() )
                            );
                            ?>
                        </div><!-- .entry-meta -->
                    </header><!-- .entry-header -->

                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="post-thumbnail" itemprop="image" itemscope itemtype="http://schema.org/ImageObject">
                            <?php the_post_thumbnail('large'); // Use an appropriate size ?>
                            <meta itemprop="url" content="<?php echo get_the_post_thumbnail_url(null, 'large'); ?>">
                            <meta itemprop="width" content="<?php echo get_image_width_for_schema(get_post_thumbnail_id(), 'large'); ?>">
                            <meta itemprop="height" content="<?php echo get_image_height_for_schema(get_post_thumbnail_id(), 'large'); ?>">
                        </div><!-- .post-thumbnail -->
                    <?php endif; ?>

                    <div class="entry-content" itemprop="articleBody">
                        <?php
                        the_content();

                        wp_link_pages(
                            array(
                                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'persian-store-theme' ),
                                'after'  => '</div>',
                            )
                        );
                        ?>
                    </div><!-- .entry-content -->

                    <footer class="entry-footer">
                        <?php
                        // Display categories and tags
                        $categories_list = get_the_category_list( esc_html__( ', ', 'persian-store-theme' ) );
                        if ( $categories_list ) {
                            printf( '<span class="cat-links" itemprop="articleSection">' . esc_html__( 'Posted in %1$s', 'persian-store-theme' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                        }
                        $tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'persian-store-theme' ) );
                        if ( $tags_list ) {
                            printf( '<span class="tags-links" itemprop="keywords">' . esc_html__( 'Tagged %1$s', 'persian-store-theme' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                        }
                        edit_post_link(
                            sprintf(
                                esc_html__( 'Edit %s', 'persian-store-theme' ),
                                the_title( '<span class="screen-reader-text">"', '"</span>', false )
                            ),
                            '<span class="edit-link">',
                            '</span>'
                        );
                        ?>
                    </footer><!-- .entry-footer -->
                </article><!-- #post-<?php the_ID(); ?> -->
                <?php

                the_post_navigation(
                    array(
                        'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'persian-store-theme' ) . '</span> <span class="nav-title">%title</span>',
                        'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'persian-store-theme' ) . '</span> <span class="nav-title">%title</span>',
                    )
                );

                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;

            endwhile; // End of the loop.
            ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
// Helper functions for image schema - consider adding these to functions.php if not already present
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

get_footer();
