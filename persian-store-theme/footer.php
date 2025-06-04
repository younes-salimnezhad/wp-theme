	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="footer-widgets-container">
			<div class="footer-column">
				<h4><?php esc_html_e( 'Contact Information', 'persian-store-theme' ); ?></h4>
				<p>
					<?php esc_html_e( '123 Store Street, Suite 4B', 'persian-store-theme' ); ?><br>
					<?php esc_html_e( 'Commerce City, ST 54321', 'persian-store-theme' ); ?>
				</p>
				<p>
					<?php esc_html_e( 'Email:', 'persian-store-theme' ); ?> <a href="mailto:info@persianstoretheme.com"><?php esc_html_e( 'info@persianstoretheme.com', 'persian-store-theme' ); ?></a><br>
					<?php esc_html_e( 'Phone:', 'persian-store-theme' ); ?> <a href="tel:+11234567890"><?php esc_html_e( '(123) 456-7890', 'persian-store-theme' ); ?></a>
				</p>
			</div>
			<div class="footer-column">
				<h4><?php esc_html_e( 'Important Links', 'persian-store-theme' ); ?></h4>
				<ul>
					<li><a href="#"><?php esc_html_e( 'About Us', 'persian-store-theme' ); ?></a></li>
					<li><a href="#"><?php esc_html_e( 'Privacy Policy', 'persian-store-theme' ); ?></a></li>
					<li><a href="#"><?php esc_html_e( 'Terms & Conditions', 'persian-store-theme' ); ?></a></li>
					<li><a href="#"><?php esc_html_e( 'Shipping & Returns', 'persian-store-theme' ); ?></a></li>
					<li><a href="#"><?php esc_html_e( 'FAQ', 'persian-store-theme' ); ?></a></li>
				</ul>
			</div>
			<div class="footer-column">
				<h4><?php esc_html_e( 'Subscribe to our Newsletter', 'persian-store-theme' ); ?></h4>
				<form class="newsletter-form" method="post" action="#"> <?php // Replace # with actual form handler URL ?>
					<label for="footer-newsletter-email" class="screen-reader-text"><?php esc_html_e( 'Email address for newsletter', 'persian-store-theme' ); ?></label>
					<input type="email" name="email" id="footer-newsletter-email" placeholder="<?php esc_attr_e( 'Your email address', 'persian-store-theme' ); ?>" required>
					<button type="submit" class="button"><?php esc_html_e( 'Subscribe', 'persian-store-theme' ); ?></button>
				</form>
			</div>
			<div class="footer-column">
				<h4><?php esc_html_e( 'Follow Us', 'persian-store-theme' ); ?></h4>
				<div class="social-media-links">
					<a href="#" rel="noopener noreferrer"><?php esc_html_e( 'Facebook', 'persian-store-theme' ); ?></a>
					<a href="#" rel="noopener noreferrer"><?php esc_html_e( 'Instagram', 'persian-store-theme' ); ?></a>
					<a href="#" rel="noopener noreferrer"><?php esc_html_e( 'Twitter', 'persian-store-theme' ); ?></a>
					<a href="#" rel="noopener noreferrer"><?php esc_html_e( 'Pinterest', 'persian-store-theme' ); ?></a>
				</div>
			</div>
		</div><!-- .footer-widgets-container -->

		<div class="site-info">
			<?php
				/* translators: 1: Current year, 2: Site name. */
				printf( esc_html__( '&copy; %1$s %2$s. All rights reserved.', 'persian-store-theme' ), esc_html( date_i18n( 'Y' ) ), esc_html( get_bloginfo( 'name' ) ) );
			?>
			<span class="sep"> | </span>
			<?php
				/* translators: 1: Theme author link, 2: Theme author name. */
				printf( esc_html__( 'Theme by %1$s.', 'persian-store-theme' ), '<a href="https://example.com/" rel="designer">Your Name</a>' ); // Consider making "Your Name" dynamic or removing if not applicable
			?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
<?php // Ensure single blank line at end of file ?>
