<?php
/**
 * SoftMe functions and definitions
 *
 * @link    https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package SoftMe
 */
 
if ( ! function_exists( 'softme_theme_setup' ) ) :
function softme_theme_setup() {
	
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on SoftMe, use a find and replace
	 * to change 'SoftMe' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'softme' );
	
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	
	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
	
	add_theme_support( 'custom-header' );
	
	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary_menu' => esc_html__( 'Primary Menu', 'softme' ),
	) );
	
	//Add selective refresh for sidebar widget
	add_theme_support( 'customize-selective-refresh-widgets' );
	
	// woocommerce support
	add_theme_support( 'woocommerce' );
	
	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support('custom-logo');
	
	/**
	 * Custom background support.
	 */
	add_theme_support( 'custom-background', apply_filters( 'softme_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
	
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
	
	/**
	 * Set default content width.
	 */
	if ( ! isset( $content_width ) ) {
		$content_width = 800;
	}	
}
endif;
add_action( 'after_setup_theme', 'softme_theme_setup' );


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

function softme_widgets_init() {	
	if ( class_exists( 'WooCommerce' ) ) {
		register_sidebar( array(
			'name' => __( 'WooCommerce Widget Area', 'softme' ),
			'id' => 'softme-woocommerce-sidebar',
			'description' => __( 'This Widget area for WooCommerce Widget', 'softme' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h5 class="widget-title">',
			'after_title' => '</h5>',
		) );
	}
	
	register_sidebar( array(
		'name' => __( 'Sidebar Widget Area', 'softme' ),
		'id' => 'softme-sidebar-primary',
		'description' => __( 'The Primary Widget Area', 'softme' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h5 class="widget-title"><span></span>',
		'after_title' => '</h5>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer  1', 'softme' ),
		'id' => 'softme-footer-widget-1',
		'description' => __( 'The Footer Widget Area 1', 'softme' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h5 data-animation-box class="widget-title"><span data-animation-text class="overlay-anim-white-bg" data-animation="overlay-animation">',
		'after_title' => '</h5>',
	) );
	
	
	register_sidebar( array(
		'name' => __( 'Footer  2', 'softme' ),
		'id' => 'softme-footer-widget-2',
		'description' => __( 'The Footer Widget Area 2', 'softme' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h5 data-animation-box class="widget-title"><span data-animation-text class="overlay-anim-white-bg" data-animation="overlay-animation">',
		'after_title' => '</h5>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer  3', 'softme' ),
		'id' => 'softme-footer-widget-3',
		'description' => __( 'The Footer Widget Area 3', 'softme' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h5 data-animation-box class="widget-title"><span data-animation-text class="overlay-anim-white-bg" data-animation="overlay-animation">',
		'after_title' => '</h5>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer  4', 'softme' ),
		'id' => 'softme-footer-widget-4',
		'description' => __( 'The Footer Widget Area 4', 'softme' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h5 data-animation-box class="widget-title"><span data-animation-text class="overlay-anim-white-bg" data-animation="overlay-animation">',
		'after_title' => '</h5>',
	) );
}
add_action( 'widgets_init', 'softme_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function softme_scripts() {
	
	/**
	 * Styles.
	 */
	// Owl Crousel	
	wp_enqueue_style('owl-carousel-min',get_template_directory_uri().'/assets/vendors/css/owl.carousel.min.css');
	
	// Font Awesome
	wp_enqueue_style('font-awesome',get_template_directory_uri().'/assets/vendors/css/all.css');
	
	// Animate
	wp_enqueue_style('animate',get_template_directory_uri().'/assets/vendors/css/animate.css');

	// Fancybox
	wp_enqueue_style('fancybox',get_template_directory_uri().'/assets/vendors/css/jquery.fancybox.min.css');
	
	// SoftMe Core
	wp_enqueue_style('softme-core',get_template_directory_uri().'/assets/css/core.css');

	// SoftMe Theme
	wp_enqueue_style('softme-theme', get_template_directory_uri() . '/assets/css/themes.css');
	
	// SoftMe WooCommerce
	wp_enqueue_style('softme-woocommerce',get_template_directory_uri().'/assets/css/woo-styles.css');
	
	// SoftMe Style
	wp_enqueue_style( 'softme-style', get_stylesheet_uri() );
	
	// Scripts
	wp_enqueue_script( 'jquery' );
	
	// Owl Crousel
	wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/assets/vendors/js/owl.carousel.js', array('jquery'), true);
	
	// Wow
	wp_enqueue_script('wow-min', get_template_directory_uri() . '/assets/vendors/js/wow.min.js', array('jquery'), false, true);
	
	// Appear
	wp_enqueue_script('appear', get_template_directory_uri() . '/assets/vendors/js/appear.js', array('jquery'), true);
	
	// fancybox
	wp_enqueue_script('fancybox', get_template_directory_uri() . '/assets/vendors/js/jquery.fancybox.js', array('jquery'), false, true);
	
	// paroller
	wp_enqueue_script('paroller', get_template_directory_uri() . '/assets/vendors/js/jquery.paroller.min.js', array('jquery'), false, true);
	
	// parallax
	wp_enqueue_script('parallax', get_template_directory_uri() . '/assets/vendors/js/parallax.min.js', array('jquery'), false, true);
	
	// SoftMe Theme
	wp_enqueue_script('softme-theme', get_template_directory_uri() . '/assets/js/theme.js', array('jquery'), false, true);

	// SoftMe custom
	wp_enqueue_script('softme-custom-js', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), false, true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'softme_scripts' );


/**
 * Enqueue admin scripts and styles.
 */
function softme_admin_enqueue_scripts(){
	wp_enqueue_style('softme-admin-style', get_template_directory_uri() . '/inc/admin/assets/css/admin.css');
	wp_enqueue_script( 'softme-admin-script', get_template_directory_uri() . '/inc/admin/assets/js/softme-admin-script.js', array( 'jquery' ), '', true );
    wp_localize_script( 'softme-admin-script', 'softme_ajax_object',
        array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
    );
}
add_action( 'admin_enqueue_scripts', 'softme_admin_enqueue_scripts' );

/**
 * Enqueue User Custom styles.
 */
 if( ! function_exists( 'softme_user_custom_style' ) ):
    function softme_user_custom_style() {

		$softme_print_style = '';
		
			
		 /*=========================================
		 SoftMe Page Title
		=========================================*/
		$softme_print_style   .= softme_customizer_value( 'softme_breadcrumb_height_option', '.dt_pagetitle', array( 'padding-top' ), array( 12, 12, 12 ), 'rem' );
		$softme_print_style   .= softme_customizer_value( 'softme_breadcrumb_height_option', '.dt_pagetitle', array( 'padding-bottom' ), array( 12, 12, 12 ), 'rem' );
		
		
		$softme_breadcrumb_img_opacity 	= get_theme_mod('softme_breadcrumb_img_opacity','0.5');
		$softme_breadcrumb_opacity_color 	= get_theme_mod('softme_breadcrumb_opacity_color','#000');
			$softme_print_style .=".dt_pagetitle .parallax-bg:after {
					    opacity: " .esc_attr($softme_breadcrumb_img_opacity). ";
						background: " .esc_attr($softme_breadcrumb_opacity_color). ";
				}\n";
		
	
		 /*=========================================
		 SoftMe Logo Size
		=========================================*/
		$softme_print_style   .= softme_customizer_value( 'hdr_logo_size', '.site--logo img', array( 'max-width' ), array( 150, 150, 150 ), 'px !important' );
		
		
			
		$softme_site_container_width 			 = get_theme_mod('softme_site_container_width','1252');
			if($softme_site_container_width >=768 && $softme_site_container_width <=2000){
				$softme_print_style .=".dt-container,.dt__slider-main .owl-dots {
						max-width: " .esc_attr($softme_site_container_width). "px;
					}.header--eight .dt-container {
						max-width: calc(" .esc_attr($softme_site_container_width). "px + 7.15rem);
					}\n";
			}
					
		/**
		 *  Sidebar Width
		 */
		$softme_sidebar_width = get_theme_mod('softme_sidebar_width',33);
		if($softme_sidebar_width !== '') { 
			$softme_primary_width   = absint( 100 - $softme_sidebar_width );
				$softme_print_style .="	@media (min-width: 992px) {#dt-main {
					max-width:" .esc_attr($softme_primary_width). "%;
					flex-basis:" .esc_attr($softme_primary_width). "%;
				}\n";
				$softme_print_style .="#dt-sidebar {
					max-width:" .esc_attr($softme_sidebar_width). "%;
					flex-basis:" .esc_attr($softme_sidebar_width). "%;
				}}\n";
        }
		
		/**
		 *  Typography Body
		 */
		
		 $softme_print_style   .= softme_customizer_value( 'softme_body_font_size_option', 'body', array( 'font-size' ), array( 16, 16, 16 ), 'px' );
		 $softme_print_style   .= softme_customizer_value( 'softme_body_line_height_option', 'body', array( 'line-height' ), array( 1.6, 1.6, 1.6 ) );
		 $softme_print_style   .= softme_customizer_value( 'softme_body_ltr_space_option', 'body', array( 'letter-spacing' ), array( 0, 0, 0 ), 'px' );		 
		
		/**
		 *  Typography Heading
		 */
		 for ( $i = 1; $i <= 6; $i++ ) {
			 $softme_print_style   .= softme_customizer_value( 'softme_h' . $i . '_font_size_option', 'h' . $i .'', array( 'font-size' ), array( 36, 36, 36 ), 'px' );
			 $softme_print_style   .= softme_customizer_value( 'softme_h' . $i . '_line_height_option', 'h' . $i . '', array( 'line-height' ), array( 1.2, 1.2, 1.2 ) );
			 $softme_print_style   .= softme_customizer_value( 'softme_h' . $i . '_ltr_space_option', 'h' . $i . '', array( 'letter-spacing' ), array( 0, 0, 0 ), 'px' );
		 }
		
		
		/*=========================================
		Footer 
		=========================================*/
		$softme_footer_bg_color			= get_theme_mod('softme_footer_bg_color','#0e1422');
		if(!empty($softme_footer_bg_color)):
			 $softme_print_style .=".dt_footer--one{ 
				    background-color: ".esc_attr($softme_footer_bg_color).";
			}\n";
		endif;
        wp_add_inline_style( 'softme-style', $softme_print_style );
    }
endif;
add_action( 'wp_enqueue_scripts', 'softme_user_custom_style' );


/**
 * Define Constants
 */
 
$softme_theme = wp_get_theme();
define( 'SOFTME_THEME_VERSION', $softme_theme->get( 'Version' ) );

// Root path/URI.
define( 'SOFTME_THEME_DIR', get_template_directory() );
define( 'SOFTME_THEME_URI', get_template_directory_uri() );

// Root path/URI.
define( 'SOFTME_THEME_INC_DIR', SOFTME_THEME_DIR . '/inc');
define( 'SOFTME_THEME_INC_URI', SOFTME_THEME_URI . '/inc');


/**
 * Implement the Custom Header feature.
 */
require_once get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require_once get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
 require_once get_template_directory() . '/inc/customizer/softme-customizer.php';
 require get_template_directory() . '/inc/customizer/controls/code/customizer-repeater/inc/customizer.php';
 
/**
 * Nav Walker for Bootstrap Dropdown Menu.
 */
require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

/**
 * Control Style
 */
require SOFTME_THEME_INC_DIR . '/customizer/controls/code/control-function/style-functions.php';

/**
 * Getting Started
 */
require SOFTME_THEME_INC_DIR . '/admin/getting-started.php';