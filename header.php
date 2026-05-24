<?php
/**
 * Site header.
 *
 * @package Portfolio_Theme
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="theme-color" content="#0f1418">
	<link rel="preload" href="<?php echo esc_url( get_template_directory_uri() . '/dist/assets/fonts/hanken-grotesk.woff2' ); ?>" as="font" type="font/woff2" crossorigin>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link" href="#primary"><?php esc_html_e( 'Skip to content', 'portfolio-theme' ); ?></a>

<header class="site-header">
	<a class="site-header__brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
		<?php bloginfo( 'name' ); ?>
	</a>

	<nav class="site-header__nav" aria-label="<?php esc_attr_e( 'Primary navigation', 'portfolio-theme' ); ?>">
		<?php if ( has_nav_menu( 'primary' ) ) : ?>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'container'      => false,
					'fallback_cb'    => false,
				)
			);
			?>
		<?php else : ?>
			<ul>
				<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Top', 'portfolio-theme' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/works/' ) ); ?>"><?php esc_html_e( 'Works', 'portfolio-theme' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>"><?php esc_html_e( 'About', 'portfolio-theme' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/service/' ) ); ?>"><?php esc_html_e( 'Service', 'portfolio-theme' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Contact', 'portfolio-theme' ); ?></a></li>
			</ul>
		<?php endif; ?>
	</nav>
</header>
