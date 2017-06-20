<?php
/**
 * Boutique engine room
 *
 * @package boutique
 */

/**
 * Set the theme version number as a global variable
 */
$theme				= wp_get_theme( 'booking-plus' );
$Booking_plus_version	= $theme['Version'];

$theme				= wp_get_theme( 'storefront' );
$storefront_version	= $theme['Version'];

require_once( 'inc/images-functions.php' );
require_once( 'inc/utility-functions.php' );
require_once( 'inc/class-at-os-products.php' );

require_once( 'inc/customizer/class-storefront-customizer.php' );



add_action("storefront_before_content", "slider_widget", 2, 69);

function slider_widget (){
 
    echo do_shortcode("[metaslider id=1963]"); 

}


if (!function_exists('axl_themesupport')):
	function axl_themesupport()
	{
		if (!isset($content_width)) $content_width = 770;
		global $wp_version;
		// Add theme support for Automatic Feed Links
		if (version_compare($wp_version, '3.0', '>=')):
			add_theme_support('automatic-feed-links');
		else:
			automatic_feed_links();
		endif;
		// Add theme support for Featured Images
		add_theme_support('post-thumbnails');
		// Add theme support for Semantic Markup
		$markup = array(
			'search-form',
			'comment-form',
			'comment-list',
		);
		add_theme_support('html5', $markup);
		$domain = 'at-os';
		load_theme_textdomain($domain, trailingslashit(WP_LANG_DIR) . $domain);
		load_theme_textdomain($domain, get_stylesheet_directory() . '/lang');
		load_theme_textdomain($domain, get_template_directory() . '/lang');
	}
endif;

add_action('after_setup_theme', 'axl_themesupport');


add_image_size( 'macchine-thumb', 150, 200 );
add_image_size( 'thumb-carosello', 73, 119 );
add_image_size( 'macchine-medium', 300, 400 );
add_image_size( 'macchine-high', 400, 600 );



function my_scripts_method() {
	if ( !is_admin() ) {
		
		wp_enqueue_script(
			'jcarousel',
			get_stylesheet_directory_uri() . '/assets/js/jquery.jcarousel.min.js',
			array( 'jquery' )
		);
		wp_enqueue_script(
			'jcarousel-control',
			get_stylesheet_directory_uri() . '/assets/js/jquery.jcarousel-control.min.js',
			array( 'jquery' )
		);
		

		
		
		
		
		wp_register_script( 'colorbox', '//cdn.jsdelivr.net/colorbox/1.5.6/jquery.colorbox-min.js', array('jquery') );
    	wp_enqueue_script( 'colorbox' );
		
		wp_register_script( 'scrollto', '//cdnjs.cloudflare.com/ajax/libs/jquery-scrollTo/1.4.11/jquery.scrollTo.min.js', array('jquery') );
		wp_enqueue_script( 'scrollto' );
		
		wp_register_script( 'localscroll', '//cdnjs.cloudflare.com/ajax/libs/jquery-localScroll/1.3.5/jquery.localScroll.min.js', array('jquery', 'scrollto') );
		wp_enqueue_script( 'localscroll' );
		
		wp_enqueue_script(
			'zoom',
			get_stylesheet_directory_uri() . '/assets/js/jquery.zoom.min.js',
			array( 'jquery' )
		);
	
	
        wp_deregister_script('historyjs');
		wp_register_script( 'historyjs', get_bloginfo( 'stylesheet_directory' ) . '/assets/js/jquery.history.js', array( 'jquery' ), '1.7.1' );
		wp_enqueue_script( 'historyjs' );
		
	
   

	
	
	wp_enqueue_script(
		'scripts',
		get_stylesheet_directory_uri() . '/assets/js/scripts.js',
		array( 'jquery', 'jcarousel',  'jcarousel-control', 'zoom', 'bootstrap', 'colorbox' ,  'scrollto' , 'localscroll')
	);
	
	
	
	
	}
}


add_action( 'wp_enqueue_scripts', 'my_scripts_method' );
