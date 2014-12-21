<?php
/**
 * Enter your custom functions here
 *
 * @package klein
 *
 */


/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function klein_setup() {

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on klein, use a find and replace
	 * to change 'klein' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'klein', get_template_directory() . '/languages' );
	
	// add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );
	
	// add featured-image theme support
	add_theme_support( 'post-thumbnails' );  
		add_image_size( 'klein-thumbnail-large', 650, 350, true ); 
		add_image_size( 'klein-thumbnail-slider', 580, 277, true ); 
		add_image_size( 'klein-thumbnail-highlights', 325, 325, true ); 
		add_image_size( 'klein-thumbnail', 225, 185, true );
	
	
	// add support for woocommerce
	//add_theme_support( 'woocommerce' );
	
	// register the nav emnu
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'klein' ),
	));
	
	// add post formats
	add_theme_support( 'post-formats', array( 'video', 'status' ) );

	//bbPress support 
	add_theme_support( 'bbpress' );
	
	//use Klein's stylesheet for woocommerce
	/*
	if (defined('WOOCOMMERCE_VERSION')) {
		if ( version_compare( WOOCOMMERCE_VERSION, "2.1" ) >= 0 ) {
			add_filter( 'woocommerce_enqueue_styles', '__return_false' );
		} else {
			define( 'WOOCOMMERCE_USE_CSS', false );
		}
	}
	*/

	// don't read in parent styles as well
	remove_action( 'wp_enqueue_scripts', 'klein_scripts', 10 );
}

function gg_scripts(){

	global $wp_version;
		
	// Global stylesheets
	wp_enqueue_style( 'gg-bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap.css', array(), KLEIN_VERSION );
	wp_enqueue_style( 'gg-bootstrap-theme', get_stylesheet_directory_uri() . '/css/bootstrap-theme.css', array(), KLEIN_VERSION );
	wp_enqueue_style( 'gg-base', get_stylesheet_uri(), array(), KLEIN_VERSION );
	wp_enqueue_style( 'gg-layout', get_stylesheet_directory_uri() . '/css/layout.css', array(), KLEIN_VERSION );
	wp_enqueue_style( 'klein-mobile-stylesheet', get_template_directory_uri() . '/css/mobile.css', array( 'klein-layout' ), KLEIN_VERSION );
	
	// Magnific Popup
	wp_enqueue_style( 'klein-magnific-popup', get_template_directory_uri() . '/css/magnific.popup.css', array(), KLEIN_VERSION );
	
	// Bx Slider
	wp_enqueue_style( 'klein-bx-slider', get_template_directory_uri() . '/css/bx-slider.css', array(), KLEIN_VERSION );
	
	// WooCommerce Active?
	if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ){
	
		// Enqueque WooCommerce Style 
		wp_enqueue_style( 'klein-woocommerce', get_template_directory_uri() . '/css/woocommerce.css', array(), KLEIN_VERSION );
	}
	
	// Presets
	//$preset = ot_get_option( 'base_preset', 'default' );
	$preset = 'geekgreen';
	if( 'default' != $preset )
	{
		wp_enqueue_style( 'gg-preset-layer', get_stylesheet_directory_uri() . '/css/presets/'.$preset.'.css', array(), KLEIN_VERSION );
	}
	
	// Visual Composer Support
	if( defined('WPB_VC_VERSION') )
	{
		wp_enqueue_style( 'klein-visual-composer-layer', get_template_directory_uri() . '/css/visual-composer.css', array( 'js_composer_front' ), KLEIN_VERSION  );
	}
	
	// Dark layout
	$is_dark_layout_enable = ot_get_option( 'dark_layout_enable', false );
		if( is_array( $is_dark_layout_enable ) )
		{
			wp_enqueue_style( 'klein-dark-layout', get_template_directory_uri() . '/css/dark.css', array(), KLEIN_VERSION  );
		}
	
	// Smooth Scroll Support
		// check if smooth scroll is enabled
		$smooth_scroll_enable = ot_get_option( 'smooth_scroll_enable' );
			if( $smooth_scroll_enable ){
				wp_enqueue_script( 'klein-jquery-smoothscroll', get_template_directory_uri() . '/js/jquery.smoothscroll.js', array( 'jquery' ), KLEIN_VERSION, true );
			}
			
	// Respond JS
	wp_enqueue_script( 'klein-html5-shiv', get_template_directory_uri() . '/js/respond.js', '', KLEIN_VERSION, true );
	
	// Modernizer
	wp_enqueue_script( 'klein-modernizr', get_template_directory_uri() . '/js/modernizr.js', array('jquery'), KLEIN_VERSION, true );
	
	// Polyfill on IE (Placeholder)
	wp_enqueue_script( 'klein-placeholder-polyfill', get_template_directory_uri() . '/js/placeholder-polyfill.js', array('jquery'), KLEIN_VERSION, true );

	// BX Slider
	wp_enqueue_script( 'klein-bx-slider', get_template_directory_uri() . '/js/bx-slider.js', array( 'jquery' ), KLEIN_VERSION, true );
	
	// Magnific Popup
	wp_enqueue_script( 'klein-magnific-popup', get_template_directory_uri() . '/js/jquery.magnific.popup.js', array( 'jquery' ), KLEIN_VERSION , true );
	
	// Tooltip
	wp_enqueue_script( 'klein-bootstrap-js', get_template_directory_uri() . '/js/bootstrap.js', array( 'jquery' ), KLEIN_VERSION , true );
	
	// Template JS
	wp_enqueue_script( 'green-geeks', get_stylesheet_directory_uri() . '/js/green-geeks.js', array('jquery'), KLEIN_VERSION, true );
		
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) 
	{
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) 
	{
		wp_enqueue_script( 'klein-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), KLEIN_VERSION );
	}

}

add_action( 'wp_enqueue_scripts', 'gg_scripts' );