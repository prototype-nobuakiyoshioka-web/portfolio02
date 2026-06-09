<?php
/**
 * Site footer.
 *
 * @package Portfolio_Theme
 */
?>

<footer class="footer">
	<div class="wrap">
		<div class="footer__inner">
			<p class="footer__copy">&copy; <?php echo esc_html( date_i18n( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?></p>
			<nav class="footer__nav" aria-label="<?php esc_attr_e( 'Footer navigation', 'portfolio-theme' ); ?>">
				<ul>
					<li><a href="<?php echo esc_url( home_url( '/works/' ) ); ?>"><?php esc_html_e( 'Works', 'portfolio-theme' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>"><?php esc_html_e( 'About', 'portfolio-theme' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Contact', 'portfolio-theme' ); ?></a></li>
				</ul>
			</nav>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
