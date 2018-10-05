<?php
/**
 * Sandalwood functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Sandalwood
 */

if ( ! function_exists( 'sandalwood_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function sandalwood_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Sandalwood, use a find and replace
		 * to change 'sandalwood' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'sandalwood', get_template_directory() . '/languages' );

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
                add_image_size( 'sandalwood-fullbleed', 2000, 1200, array ( 'center', 'top' ) );
                add_image_size( 'sandalwood-archive-img', 1440, 600, array ( 'center', 'top' ) );

                
		// This theme uses wp_nav_menu() in header & footer location.
		register_nav_menus( array(
			'header' => esc_html__( 'Header', 'sandalwood' ),
                        'footer' => esc_html__( 'Footer', 'sandalwood' ),
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
		add_theme_support( 'custom-background', apply_filters( 'sandalwood_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 90,
			'width'       => 90,
			'flex-width'  => true,
		) );
        
                /*
                    ====================
                    Editor Styles
                    ====================
                */

                add_editor_style( array('editor-style.css', sandalwood_fonts_url() ) );

	}
endif;
add_action( 'after_setup_theme', 'sandalwood_setup' );

/**
 * Register custom fonts.
 */
function sandalwood_fonts_url() {
	$fonts_url = '';

	/*
	 * Translators: If there are characters in your language that are not
	 * supported by Merriweather Sans, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$merriweather_sans = _x( 'on', 'Merriweather Sans font: on or off', 'sandalwood' );

	if ( 'off' !== $merriweather_sans ) {
		$font_families = array();

		$font_families[] = 'Merriweather Sans:300,300i,400,400i,700';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function sandalwood_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound.
	$GLOBALS['content_width'] = apply_filters( 'sandalwood_content_width', 640 );
}
add_action( 'after_setup_theme', 'sandalwood_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function sandalwood_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'sandalwood' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'sandalwood' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'sandalwood_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function sandalwood_scripts() {


        wp_enqueue_style( 'sandalwood-fonts', sandalwood_fonts_url() );
        
        wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/bootstrap/bootstrap.min.css', array(), true );
        
        wp_enqueue_style( 'load-fa-solid', get_template_directory_uri() . '/assets/fontawesome/solid.css');
        
        wp_enqueue_style( 'load-fa', get_template_directory_uri() . '/assets/fontawesome/fontawesome.css');
        
        wp_enqueue_style( 'sandalwood-style', get_stylesheet_uri() );
        
        wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/bootstrap/bootstrap.min.js', array('jquery'), '20180701', true );

        wp_enqueue_script( 'sandalwood-functions', get_template_directory_uri() . '/js/functions.js', array('jquery'), '20180706', true );
        
	wp_enqueue_script( 'sandalwood-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'sandalwood_scripts' );

/**
 * Import Bootstrap NavWalker Class.
 */
require get_template_directory() . '/assets/bootstrap/bootstrap-navwalker.php';

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