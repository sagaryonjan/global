<?php
/**
 * global functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package global
 */

if ( ! function_exists( 'global_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function global_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on global, use a find and replace
	 * to change 'global' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'global', get_template_directory() . '/languages' );

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

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'global' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'global_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Adds Support for Custom Logo Introduced in WordPress 4.5
	add_theme_support( 'custom-logo',
			array(
					'flex-width' => true,
					'flex-height' => true,
			)
	);	

	// Declare WooCommerce Support
	add_theme_support( 'woocommerce' );
}
endif;
add_action( 'after_setup_theme', 'global_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function global_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'global_content_width', 640 );
}
add_action( 'after_setup_theme', 'global_content_width', 0 );



/**
 * Enqueue scripts and styles.
 */
function global_scripts() {
	wp_enqueue_style( 'global-style', get_stylesheet_uri() );

	//Register font-awesome style
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css' );

	//Register responsive style
	wp_enqueue_style( 'global-responsive', get_template_directory_uri() . '/css/responsive.css' );

	//Register swiper
	wp_enqueue_style( 'swiper', get_template_directory_uri() . '/css/swiper.css' );  
	
	wp_enqueue_script( 'masonry', get_template_directory_uri() . '/js/masonry.pkgd.js', array( 'jquery' ) );

	wp_enqueue_script( 'news-ticker', get_template_directory_uri() . '/js/newsTicker.js', array( 'jquery' ) );

	wp_enqueue_script( 'swiper', get_template_directory_uri() . '/js/swiper.js', array( 'jquery' ) );

	//Register main.js
	wp_enqueue_script( 'global-main', get_template_directory_uri() . '/js/main.js', array( 'jquery' ) );


	wp_enqueue_script( 'global-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'global-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'global_scripts' );


/**
 * Add admin scripts and styles.
 */

function global_admin_scripts( $hook ) {
	global $post_type;
	if( $hook == 'widgets.php') {
		//For color
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'wp-color-picker' );

		wp_enqueue_style( 'global-admin-css', get_template_directory_uri() . '/css/admin/global-admin.css', false, '1.0.0' );

		wp_enqueue_script( 'global-admin-scripts', get_template_directory_uri() . '/js/admin/global-admin.js', array( 'jquery' ), '1.0.0', true );

		//image upload script
		wp_enqueue_media();
		wp_enqueue_script( 'global-image-uploader', get_template_directory_uri() . '/js/image-uploader.js', array( 'jquery' ), '1.0.0', true );

		wp_enqueue_script( 'global-color-picker', get_template_directory_uri() . '/js/color-picker.js', array( 'jquery' ), '1.0.0', true );

	}
}
add_action('admin_enqueue_scripts', 'global_admin_scripts');

function custom_excerpt_more( $more ) {
    return '';//you can change this to whatever you want
}
add_filter( 'excerpt_more', 'custom_excerpt_more' );

define( 'global_MAIN_URL', get_template_directory_uri() );
define( 'global_IMAGES_ADMIN_URL', global_MAIN_URL. '/images/admin' );

/**
 * Filter the except length to 20 characters.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function global_custom_excerpt_length( $length  ) {
	return 30;
}
add_filter( 'excerpt_length', 'global_custom_excerpt_length', 999 );


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
/**
 * Load Global Page widget.
 */
require get_template_directory() . '/inc/global-functions.php';

require get_template_directory() . '/inc/global-customizer-functions.php';

require get_template_directory() . '/inc/global-widget.php';

/**
 * Custome metabox.
 */
require get_template_directory() . '/inc/admin/meta-boxes.php';
