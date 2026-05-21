<?php
/**
 * Portfolio Theme functions and definitions.
 *
 * @package Portfolio_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function portfolio_theme_setup(): void {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'responsive-embeds' );

	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'portfolio-theme' ),
		)
	);
}
add_action( 'after_setup_theme', 'portfolio_theme_setup' );

function portfolio_theme_enqueue_assets(): void {
	wp_enqueue_style(
		'portfolio-theme-style',
		get_template_directory_uri() . '/assets/css/main.css',
		array(),
		wp_get_theme()->get( 'Version' )
	);

	wp_enqueue_script(
		'portfolio-theme-script',
		get_template_directory_uri() . '/assets/js/main.js',
		array(),
		wp_get_theme()->get( 'Version' ),
		true
	);
}
add_action( 'wp_enqueue_scripts', 'portfolio_theme_enqueue_assets' );

