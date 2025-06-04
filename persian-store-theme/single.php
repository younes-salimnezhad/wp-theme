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
						<meta itemprop="name" content="<?php echo esc_attr( get_the_title() ); ?>">

						<div class="entry-meta">
							<?php
							// Example of basic post meta.
							// You can customize this further or create a template function in functions.php.
							printf(
								/* translators: 1: Date published/modified, 2: Date (human readable), 3: Author URL, 4: Author name. */
								'<span class="posted-on"><time class="entry-date published updated" datetime="%1$s" itemprop="datePublished dateModified">%2$s</time></span><span class="byline"> ' . esc_html_x( 'by', 'post author', 'persian-store-theme' ) . ' <span class="author vcard" itemprop="author" itemscope itemtype="http://schema.org/Person"><a class="url fn n" href="%3$s" itemprop="url"><span itemprop="name">%4$s</span></a></span></span>',
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
							<?php the_post_thumbnail( 'large' ); // Use an appropriate size e.g. 'large', 'medium_large', 'full'. ?>
							<meta itemprop="url" content="<?php echo esc_url( get_the_post_thumbnail_url( null, 'large' ) ); ?>">
							<?php
							// Ensure helper functions are available (they were moved to functions.php).
							if ( function_exists( 'get_image_width_for_schema' ) && function_exists( 'get_image_height_for_schema' ) ) :
								?>
							<meta itemprop="width" content="<?php echo esc_attr( get_image_width_for_schema( get_post_thumbnail_id(), 'large' ) ); ?>">
							<meta itemprop="height" content="<?php echo esc_attr( get_image_height_for_schema( get_post_thumbnail_id(), 'large' ) ); ?>">
							<?php endif; ?>
						</div><!-- .post-thumbnail -->
					<?php endif; ?>

					<div class="entry-content" itemprop="articleBody">
						<?php
						the_content(
							sprintf(
								wp_kses(
									/* translators: %s: Name of current post. Only visible to screen readers. */
									__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'persian-store-theme' ),
									array(
										'span' => array(
											'class' => array(),
										),
									)
								),
								get_the_title()
							)
						);

						wp_link_pages(
							array(
								'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'persian-store-theme' ),
								'after'       => '</div>',
								'link_before' => '<span class="page-number">', // Wrap page numbers for styling.
								'link_after'  => '</span>',
							)
						);
						?>
					</div><!-- .entry-content -->

					<footer class="entry-footer">
						<?php
						// Display categories and tags.
						$categories_list = get_the_category_list( esc_html_x( ', ', 'list item separator', 'persian-store-theme' ) );
						if ( $categories_list ) {
							/* translators: 1: list of categories. */
							printf( '<span class="cat-links" itemprop="articleSection">' . esc_html__( 'Posted in %1$s', 'persian-store-theme' ) . '</span>', wp_kses_post( $categories_list ) );
						}

						$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'persian-store-theme' ) );
						if ( $tags_list ) {
							/* translators: 1: list of tags. */
							printf( '<span class="tags-links" itemprop="keywords">' . esc_html__( 'Tagged %1$s', 'persian-store-theme' ) . '</span>', wp_kses_post( $tags_list ) );
						}

						edit_post_link(
							sprintf(
								wp_kses(
									/* translators: %s: Name of current post. Only visible to screen readers. */
									__( 'Edit <span class="screen-reader-text">%s</span>', 'persian-store-theme' ),
									array(
										'span' => array(
											'class' => array(),
										),
									)
								),
								get_the_title()
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
						'prev_text' => '<span class="screen-reader-text">' . esc_html__( 'Previous Post:', 'persian-store-theme' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . esc_html__( 'Previous:', 'persian-store-theme' ) . '</span> <span class="nav-title">%title</span>',
						'next_text' => '<span class="screen-reader-text">' . esc_html__( 'Next Post:', 'persian-store-theme' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . esc_html__( 'Next:', 'persian-store-theme' ) . '</span> <span class="nav-title">%title</span>',
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
get_footer();
// Ensure single blank line at end of file
?>
