<?php
/**
 * W2Z Theme functions and definitions
 */


if ( ! function_exists( 'w2ztheme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 */
	function w2ztheme_setup() {

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1568, 9999 );
		//add_image_size( 'name', 160, 160, true );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'nav-main'   => 'Menu Principal',
				'nav-footer' => 'Menu Rodapé',
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
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );
	}
endif;
add_action( 'after_setup_theme', 'w2ztheme_setup' );


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function w2ztheme_widgets_init() {
	register_sidebar(
		array(
			'id'            => 'sidebar-1',
			'name'          => 'Menu Lateral',
			'description'   => '',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widgettitle">',
			'after_title'   => '</h4>',
		)
	);
}
add_action( 'widgets_init', 'w2ztheme_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function w2ztheme_scripts() {

	wp_register_style( 'webfont', '//fonts.googleapis.com/css?family=Material+Icons' );

	wp_enqueue_style( 'w2ztheme-style', get_template_directory_uri() . '/dist/css/app.css', array( 'webfont' ), wp_get_theme()->get( 'Version' ) );
	wp_enqueue_style( 'w2ztheme-print-style', get_template_directory_uri() . '/print.css', array(), wp_get_theme()->get( 'Version' ), 'print' );

	wp_enqueue_script( 'w2ztheme-script', get_template_directory_uri() . '/dist/js/app.js', array( 'jquery' ), wp_get_theme()->get( 'Version' ), true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
}
add_action( 'wp_enqueue_scripts', 'w2ztheme_scripts' );



// ADMIN FUNCTIONS
require get_template_directory() . '/inc/wp-admin.php';
require get_template_directory() . '/inc/cpt-livro.php';
require get_template_directory() . '/inc/tax-genero.php';

// THEME FUNCTIONS
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/template-tags.php';
