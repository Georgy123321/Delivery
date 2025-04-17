<?php

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

function delivery_setup() {
	load_theme_textdomain( 'delivery', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'title-tag' );

	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-header-pc' => esc_html__( 'Menu Header PC', 'delivery' ),
			'menu-header-mobile' => esc_html__( 'Menu Header Mobile', 'delivery' ),
			'menu-footer' => esc_html__( 'Footer Menu', 'delivery' ),
		)
	);
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'delivery_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'delivery_setup' );

function delivery_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'delivery_content_width', 640 );
}
add_action( 'after_setup_theme', 'delivery_content_width', 0 );

function delivery_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'delivery' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'delivery' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'delivery_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function delivery_scripts() {
	wp_enqueue_style( 'delivery-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'delivery-style-reset', get_template_directory_uri() . '/assets/style/reset.css', array(), '1.0' );
	wp_enqueue_style( 'delivery-style-custom', get_template_directory_uri() . '/assets/style/style.css', array(), '1.0' );
	wp_enqueue_style( 'delivery-style-swiper', get_template_directory_uri() . '/assets/style/swiper-bundle.min.css', array(), '1.0' );

	wp_enqueue_script( 'delivery-bundle', get_template_directory_uri() . '/assets/js/swiper-bundle.min.js', array(), '1.0', true );
	wp_enqueue_script( 'delivery-custom', get_template_directory_uri() . '/assets/js/script.js', array(), '1.0', true );

}
add_action( 'wp_enqueue_scripts', 'delivery_scripts' );

/**
 * global options
 */
require get_template_directory() . '/inc/global-options.php';

// walker for header
require get_template_directory() . '/inc/walker-for-header.php';
// walker for mobile menu
require get_template_directory() . '/inc/walker-for-mobile_menu.php';
// walker for footer menu
require get_template_directory() . '/inc/wallker-for-footer.php';

// delete tags br and p in form
add_filter('wpcf7_autop_or_not', '__return_false');
