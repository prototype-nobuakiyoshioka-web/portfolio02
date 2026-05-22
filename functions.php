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
		'name'                  => __( '制作実績', 'portfolio-theme' ),
		'singular_name'         => __( '制作実績', 'portfolio-theme' ),
		'menu_name'             => __( '制作実績', 'portfolio-theme' ),
		'name_admin_bar'        => __( '制作実績', 'portfolio-theme' ),
		'add_new'               => __( '新規追加', 'portfolio-theme' ),
		'add_new_item'          => __( '制作実績を追加', 'portfolio-theme' ),
		'new_item'              => __( '新しい制作実績', 'portfolio-theme' ),
		'edit_item'             => __( '制作実績を編集', 'portfolio-theme' ),
		'view_item'             => __( '制作実績を表示', 'portfolio-theme' ),
		'all_items'             => __( '制作実績一覧', 'portfolio-theme' ),
		'search_items'          => __( '制作実績を検索', 'portfolio-theme' ),
		'not_found'             => __( '制作実績が見つかりません。', 'portfolio-theme' ),
		'not_found_in_trash'    => __( 'ゴミ箱に制作実績はありません。', 'portfolio-theme' ),
		'featured_image'        => __( 'メインビジュアル', 'portfolio-theme' ),
		'set_featured_image'    => __( 'メインビジュアルを設定', 'portfolio-theme' ),
		'remove_featured_image' => __( 'メインビジュアルを削除', 'portfolio-theme' ),
		'use_featured_image'    => __( 'メインビジュアルとして使用', 'portfolio-theme' ),
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
