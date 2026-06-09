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
	<meta name="theme-color" content="#f8f7f4">
	<link rel="preload" href="<?php echo esc_url( get_template_directory_uri() . '/assets/css/fonts/hanken-grotesk.woff2' ); ?>" as="font" type="font/woff2" crossorigin="anonymous">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link" href="#primary"><?php esc_html_e( 'Skip to content', 'portfolio-theme' ); ?></a>

<header class="nav" id="site-header">
	<div class="wrap">
		<div class="nav__bar">
			<a class="nav__brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<?php bloginfo( 'name' ); ?>
			</a>

			<nav class="nav__links" aria-label="<?php esc_attr_e( 'Primary navigation', 'portfolio-theme' ); ?>">
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
						<li><a href="<?php echo esc_url( home_url( '/works/' ) ); ?>"<?php echo is_post_type_archive( 'works' ) ? ' aria-current="page"' : ''; ?>><?php esc_html_e( 'Works', 'portfolio-theme' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>"<?php echo is_page( 'about' ) ? ' aria-current="page"' : ''; ?>><?php esc_html_e( 'About', 'portfolio-theme' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/service/' ) ); ?>"<?php echo is_page( 'service' ) ? ' aria-current="page"' : ''; ?>><?php esc_html_e( 'Service', 'portfolio-theme' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"<?php echo is_page( 'contact' ) ? ' aria-current="page"' : ''; ?>><?php esc_html_e( 'Contact', 'portfolio-theme' ); ?></a></li>
					</ul>
				<?php endif; ?>
			</nav>
		</div>
	</div>
</header>
