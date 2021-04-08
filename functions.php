<?php
/**
 * Tema Jovens Protagonistas functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Tema_Jovens_Protagonistas
 */

if ( ! defined( 'JOVENSPROTAGONISTAS_WP_THEME_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'JOVENSPROTAGONISTAS_WP_THEME_VERSION', '1.0.0' );
}

if ( ! function_exists( 'tema_jovensprotagonistas_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function tema_jovensprotagonistas_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Tema Jovens Protagonistas, use a find and replace
		 * to change 'tema-jovensprotagonistas' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'tema-jovensprotagonistas', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// thumbnail
		// 195x172
		update_option( 'thumbnail_size_w', 150 );
		update_option( 'thumbnail_size_h', 150 );
		update_option( 'thumbnail_crop', 1 );

		// large
		// 768x422
		// img col-1 desktop
		update_option( 'large_size_w', 768 );
		update_option( 'large_size_h', 'auto' );


		// medium
		// 650x360
		// img col-2 desktop
		// img col-1 mobile
		update_option( 'medium_large_size_w', 650 );
		update_option( 'medium_large_size_h', 360 );

		// post-thumbnail
		// 312x172
		// img col-4 desktop
		// img col-2 mobile
		update_option( 'medium_size_w', 312 );
		update_option( 'medium_size_h', 172 );



		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-header' => esc_html__( 'Cabeçalho', 'tema-jovensprotagonistas' ),
				'menu-navigation' => esc_html__( 'Navegação', 'tema-jovensprotagonistas' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
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
				'tema_jovensprotagonistas_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
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
endif;
add_action( 'after_setup_theme', 'tema_jovensprotagonistas_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function tema_jovensprotagonistas_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'tema_jovensprotagonistas_content_width', 640 );
}
add_action( 'after_setup_theme', 'tema_jovensprotagonistas_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function tema_jovensprotagonistas_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'tema-jovensprotagonistas' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'tema-jovensprotagonistas' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'tema_jovensprotagonistas_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function tema_jovensprotagonistas_scripts() {
	wp_enqueue_style( 'tema-jovensprotagonistas-style', get_stylesheet_uri(), array(), JOVENSPROTAGONISTAS_WP_THEME_VERSION );
	wp_style_add_data( 'tema-jovensprotagonistas-style', 'rtl', 'replace' );

	wp_enqueue_script( 'tema-jovensprotagonistas-navigation', get_template_directory_uri() . '/js/navigation.js', array(), JOVENSPROTAGONISTAS_WP_THEME_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'tema_jovensprotagonistas_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


add_action('after_setup_theme', 'remove_admin_bar');
if ( ! function_exists( 'remove_admin_bar' ) ) :
function remove_admin_bar() {
	// if (!current_user_can('administrator') && !is_admin()) {
	  show_admin_bar(false);
	// }
}
endif;
