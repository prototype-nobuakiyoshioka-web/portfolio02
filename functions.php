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
	add_theme_support( 'custom-logo' );

	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'portfolio-theme' ),
		)
	);
}
add_action( 'after_setup_theme', 'portfolio_theme_setup' );

function portfolio_theme_register_post_types(): void {
	$labels = array(
		'name'                  => __( 'Works', 'portfolio-theme' ),
		'singular_name'         => __( 'Work', 'portfolio-theme' ),
		'menu_name'             => __( 'Works', 'portfolio-theme' ),
		'name_admin_bar'        => __( 'Work', 'portfolio-theme' ),
		'add_new'               => __( 'Add New', 'portfolio-theme' ),
		'add_new_item'          => __( 'Add New Work', 'portfolio-theme' ),
		'new_item'              => __( 'New Work', 'portfolio-theme' ),
		'edit_item'             => __( 'Edit Work', 'portfolio-theme' ),
		'view_item'             => __( 'View Work', 'portfolio-theme' ),
		'all_items'             => __( 'All Works', 'portfolio-theme' ),
		'search_items'          => __( 'Search Works', 'portfolio-theme' ),
		'not_found'             => __( 'No works found.', 'portfolio-theme' ),
		'not_found_in_trash'    => __( 'No works found in Trash.', 'portfolio-theme' ),
		'featured_image'        => __( 'Work Thumbnail', 'portfolio-theme' ),
		'set_featured_image'    => __( 'Set work thumbnail', 'portfolio-theme' ),
		'remove_featured_image' => __( 'Remove work thumbnail', 'portfolio-theme' ),
		'use_featured_image'    => __( 'Use as work thumbnail', 'portfolio-theme' ),
	);

	register_post_type(
		'works',
		array(
			'labels'             => $labels,
			'public'             => true,
			'has_archive'        => true,
			'menu_icon'          => 'dashicons-portfolio',
			'menu_position'      => 5,
			'rewrite'            => array( 'slug' => 'works' ),
			'show_in_rest'       => true,
			'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'revisions' ),
			'publicly_queryable' => true,
		)
	);
}
add_action( 'init', 'portfolio_theme_register_post_types' );

function portfolio_theme_enqueue_assets(): void {
	wp_enqueue_style(
		'portfolio-theme-style',
		get_template_directory_uri() . '/assets/css/main.css',
		array(),
		wp_get_theme()->get( 'Version' )
	);

	wp_enqueue_script(
		'gsap',
		'https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js',
		array(),
		'3.12.5',
		true
	);

	wp_enqueue_script(
		'gsap-scrolltrigger',
		'https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js',
		array( 'gsap' ),
		'3.12.5',
		true
	);

	wp_enqueue_script(
		'portfolio-theme-script',
		get_template_directory_uri() . '/assets/js/main.js',
		array( 'gsap', 'gsap-scrolltrigger' ),
		wp_get_theme()->get( 'Version' ),
		true
	);
}
add_action( 'wp_enqueue_scripts', 'portfolio_theme_enqueue_assets' );
