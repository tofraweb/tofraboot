<?php
/**
 * tofraboot functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package tofraboot
 */

if ( ! function_exists( 'tofraboot_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function tofraboot_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on tofraboot, use a find and replace
		 * to change 'tofraboot' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'tofraboot', get_template_directory() . '/languages' );

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
			// 'menu-1' => esc_html__( 'Primary', 'tofraboot' ),
			'MainMenu' => esc_html__( 'Primary', 'tofraboot' ),
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
		add_theme_support( 'custom-background', apply_filters( 'tofraboot_custom_background_args', array(
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
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'tofraboot_setup' );


// add_filter ( 'nav_menu_css_class', 'so_37823371_menu_item_class', 10, 4, 2 );

// function so_37823371_menu_item_class ( $classes, $item, $args, $depth ){
//   $classes[] = 's-header__nav-menu-item';
//   return $classes;
// }


// add_filter('nav_menu_css_class','arg_menu_classes',110,3);

// function arg_menu_classes($classes, $item, $args) {
//     if($args->menu == 'MainMenu') { // name need menu
//         $classes[] = 's-header__nav-menu-item'; // add classes
//     }
//     return $classes;
// }

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function tofraboot_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'tofraboot_content_width', 640 );
}
add_action( 'after_setup_theme', 'tofraboot_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function tofraboot_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'tofraboot' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'tofraboot' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'tofraboot_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function tofraboot_scripts() {


	wp_enqueue_style( 'tofra-boot-animate', get_template_directory_uri() . '/css/animate.css' ); 

	wp_enqueue_style( 'tofra-boot-bootstrap-min', get_template_directory_uri() . '/vendor/bootstrap/css/bootstrap.min.css' ); 

	wp_enqueue_style( 'tofra-boot-themify', get_template_directory_uri() . '/vendor/themify/themify.css' ); 

	wp_enqueue_style( 'tofra-boot-scrollbar', get_template_directory_uri() . '/vendor/scrollbar/scrollbar.min.css' ); 

	wp_enqueue_style( 'tofra-boot-magnific', get_template_directory_uri() . '/vendor/magnific-popup/magnific-popup.css' ); 

	wp_enqueue_style( 'tofra-boot-swiper', get_template_directory_uri() . '/vendor/swiper/swiper.min.css' ); 

	wp_enqueue_style( 'tofra-boot-cubeportfolio', get_template_directory_uri() . '/vendor/cubeportfolio/css/cubeportfolio.min.css' ); 

	wp_enqueue_style( 'tofraboot-style', get_stylesheet_uri() );

	wp_enqueue_style( 'tofra-boot-global', get_template_directory_uri() . '/css/global/global.css' ); 



	wp_enqueue_script( 'tofraboot-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true ); // _S

	wp_enqueue_script( 'tofraboot-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true ); // _s

		/* Vendor Js */

	wp_enqueue_script( 'tofra-boot-jquery-js', get_template_directory_uri() . '/vendor/jquery.min.js','','', TRUE ); //tofra

	wp_enqueue_script( 'tofra-boot-migrate-js', get_template_directory_uri() . '/vendor/jquery.migrate.min.js','','', TRUE  ); //tofra

	wp_enqueue_script( 'tofra-boot-bootstrap-min-js', get_template_directory_uri() . '/vendor/bootstrap/js/bootstrap.min.js','','', TRUE  ); //tofra

	wp_enqueue_script( 'tofra-boot-smooth-scroll-js', get_template_directory_uri() . '/vendor/jquery.smooth-scroll.min.js','','', TRUE  ); //tofra

	wp_enqueue_script( 'tofra-boot-back-to-top-js', get_template_directory_uri() . '/vendor/jquery.back-to-top.min.js','','', TRUE  ); //tofra

	wp_enqueue_script( 'tofra-boot-scrollbar-js', get_template_directory_uri() . '/vendor/scrollbar/jquery.scrollbar.min.js','','', TRUE  ); //tofra

	wp_enqueue_script( 'tofra-boot-magnific-js', get_template_directory_uri() . '/vendor/magnific-popup/jquery.magnific-popup.min.js','','', TRUE  ); //tofra

	wp_enqueue_script( 'tofra-boot-swiper-js', get_template_directory_uri() . '/vendor/swiper/swiper.jquery.min.js','','', TRUE  ); //tofra

	wp_enqueue_script( 'tofra-boot-waypoint-js', get_template_directory_uri() . '/vendor/waypoint.min.js','','', TRUE  ); //tofra

	wp_enqueue_script( 'tofra-boot-counterup', get_template_directory_uri() . '/vendor/counterup.min.js','','', TRUE  ); //tofra

	wp_enqueue_script( 'tofra-boot-cubeportfolio-js', get_template_directory_uri() . '/vendor/cubeportfolio/js/jquery.cubeportfolio.min.js','','', TRUE  ); //tofra

	wp_enqueue_script( 'tofra-boot-parallax-js', get_template_directory_uri() . '/vendor/jquery.parallax.min.js','','', TRUE  ); //tofra

	wp_enqueue_script( 'tofra-boot-maps-js', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBsXUGTFS09pLVdsYEE9YrO2y4IAncAO2U','','', TRUE  ); //tofra

	wp_enqueue_script( 'tofra-boot-wow-js', get_template_directory_uri() . '/vendor/jquery.wow.min.js','','', TRUE  ); //tofra

	/* General Components and Settings Js */

	wp_enqueue_script( 'tofra-boot-comp-global-js', get_template_directory_uri() . '/js/global.min.js','','', TRUE  ); //tofra

	wp_enqueue_script( 'tofra-boot-comp-sticky-js', get_template_directory_uri() . '/js/components/header-sticky.min.js','','', TRUE  ); //tofra

	wp_enqueue_script( 'tofra-boot-comp-scrollbar-js', get_template_directory_uri() . '/js/components/scrollbar.min.js','','', TRUE  ); //tofra

	wp_enqueue_script( 'tofra-boot-comp-swiper-js', get_template_directory_uri() . '/js/components/swiper.min.js','','', TRUE  ); //tofra

	wp_enqueue_script( 'tofra-boot-counter-js', get_template_directory_uri() . '/js/components/counter.min.js','','', TRUE  ); //tofra

	wp_enqueue_script( 'tofra-boot-comp-magnific-js', get_template_directory_uri() . 'js/components/magnific-popup.min.js','','', TRUE  ); //tofra

	wp_enqueue_script( 'tofra-boot-comp-portfolio-js', get_template_directory_uri() . '/js/components/portfolio-3-col.min.js','','', TRUE  ); //tofra

	wp_enqueue_script( 'tofra-boot-comp-parallax-js', get_template_directory_uri() . '/js/components/parallax.min.js','','', TRUE  ); //tofra

	wp_enqueue_script( 'tofra-boot-comp-map-js', get_template_directory_uri() . '/js/components/google-map.min.js','','', TRUE  ); //tofra

	wp_enqueue_script( 'tofra-boot-comp-wow-js', get_template_directory_uri() . '/js/components/wow.min.js','','', TRUE  ); //tofra


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}


add_action( 'wp_enqueue_scripts', 'tofraboot_scripts' );

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

