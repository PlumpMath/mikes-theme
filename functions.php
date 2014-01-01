<?php
/**
 * Mike\'s Theme functions and definitions
 *
 * @package Mike\'s Theme
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue() {
    wp_deregister_script('jquery');
    wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js", false, null);
    wp_enqueue_script('jquery');
}

if ( ! function_exists( 'mikes_theme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function mikes_theme_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Mike\'s Theme, use a find and replace
	 * to change 'mikes-theme' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'mikes-theme', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'mikes-theme' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'mikes_theme_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // mikes_theme_setup
add_action( 'after_setup_theme', 'mikes_theme_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function mikes_theme_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'mikes-theme' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'mikes_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function mikes_theme_scripts() {
	wp_enqueue_style( 'mikes-theme-style', get_stylesheet_uri() );

	wp_enqueue_script( 'mikes-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

    wp_enqueue_script( 'mikes-theme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true ); 

    wp_enqueue_script( 'mixitup', get_template_directory_uri() . '/js/jquery.mixitup.min.js', array( 'jquery' ), '1.5.5', true );

    wp_enqueue_script( 'portfolio', get_template_directory_uri() . '/js/portfolio.js', array( 'mixitup'), '20131231', true );        

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'mikes_theme_scripts' );

function get_image_directory( $img_dir ) {
    return get_stylesheet_directory_uri() . '/img/';
}

add_filter( 'jpeg_quality', 'best_quality' );
function best_quality() {
    return 100;
}

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

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
