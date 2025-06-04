<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="http://schema.org/WebPage">
					<header class="entry-header">
						<?php the_title( '<h1 class="entry-title" itemprop="headline">', '</h1>' ); ?>
						<meta itemprop="name" content="<?php echo esc_attr( get_the_title() ); ?>">
					</header><!-- .entry-header -->

					<?php if ( has_post_thumbnail() ) : ?>
						<div class="post-thumbnail">
							<?php the_post_thumbnail(); // Consider specifying a size, e.g., 'large' or 'full'. ?>
						</div><!-- .post-thumbnail -->
					<?php endif; ?>

					<div class="entry-content" itemprop="mainEntityOfPage">
						<?php
						the_content();

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

					<?php if ( get_edit_post_link() ) : ?>
						<footer class="entry-footer">
							<?php
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
					<?php endif; ?>
				</article><!-- #post-<?php the_ID(); ?> -->
				<?php
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
