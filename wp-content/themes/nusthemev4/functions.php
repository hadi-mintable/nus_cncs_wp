<?php
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}

/**
 * NUS Theme v4 Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package NUS Theme v4
 * @since 1.0.0
 */

/**
 * Define Constants
 */
define( 'CHILD_THEME_NUS_THEME_V4_VERSION', '1.0.0' );


/**
	* Include important files for basic NUS theme to work.
	*/
require_once( get_stylesheet_directory() . '/nus-hooks.php');
require_once( get_stylesheet_directory() . '/includes/news/news.php');

/**
 * Enqueue styles
 */
function child_enqueue_styles() {

	//wp_enqueue_style( 'fontawesome-css', get_stylesheet_directory_uri() . '/assets/css/fontawesome.all.min.css', array('astra-theme-css'), CHILD_THEME_NUS_THEME_V4_VERSION, 'all' );
	wp_enqueue_style( 'font-awesome-css', 'https://pro.fontawesome.com/releases/v5.12.0/css/all.css' );
	wp_enqueue_script( 'fontawesome-js', get_stylesheet_directory_uri() . '/assets/js/fontawesome.all.min.js', array('jquery'), '20191007', true );

	//wp_enqueue_style( 'bootstrap-css', get_stylesheet_directory_uri() . '/assets/css/bootstrap.min.css', array('astra-theme-css'), CHILD_THEME_NUS_THEME_V4_VERSION, 'all' );
	//wp_enqueue_script( 'bootstrap-js', get_stylesheet_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '20191007', true );

	wp_enqueue_style( 'nus-astra-base-desktop-css', get_stylesheet_directory_uri() . '/assets/css/main.desktop.css', array('astra-theme-css'), CHILD_THEME_NUS_THEME_V4_VERSION, 'all' );
	wp_enqueue_style( 'nus-astra-base-mobile-css', get_stylesheet_directory_uri() . '/assets/css/main.mobile.css', array('astra-theme-css'), CHILD_THEME_NUS_THEME_V4_VERSION, 'all' );
	wp_enqueue_style( 'nus-astra-base-css', get_stylesheet_directory_uri() . '/assets/css/main.css', array('astra-theme-css'), CHILD_THEME_NUS_THEME_V4_VERSION, 'all' );

	wp_enqueue_style( 'offcanvas-css', get_stylesheet_directory_uri() . '/assets/css/offcanvas.css', array('astra-theme-css'), CHILD_THEME_NUS_THEME_V4_VERSION, 'all' );
	wp_enqueue_script( 'offcanvas-js', get_stylesheet_directory_uri() . '/assets/js/offcanvas.js', array('jquery'), '20191007', true );

	wp_enqueue_style( 'nus-theme-v4-theme-css', get_stylesheet_directory_uri() . '/style.css', array('astra-theme-css'), CHILD_THEME_NUS_THEME_V4_VERSION, 'all' );
	wp_enqueue_script( 'nus-astra-js', get_stylesheet_directory_uri() . '/assets/js/main.js', array('jquery'), '20191007', true );

}
add_action( 'wp_enqueue_scripts', 'child_enqueue_styles', 15 );

/* Update jquery version */
function replace_jquery_version() {
    wp_deregister_script( 'jquery-core' );
    // Change the URL if you want to load a local copy of jQuery from your own server.
    wp_register_script( 'jquery-core', "https://code.jquery.com/jquery-3.5.1.min.js", array(), '3.5.1' );
	wp_deregister_script( 'jquery-migrate' );
   	wp_register_script( 'jquery-migrate', "https://code.jquery.com/jquery-migrate-3.3.1.min.js", array(), '3.3.1' );
	wp_deregister_script( 'jquery-ui-core' );
    wp_register_script( 'jquery-ui-core', "https://code.jquery.com/ui/1.12.1/jquery-ui.min.js", array(), '1.12.1' );
}
add_action( 'wp_enqueue_scripts', 'replace_jquery_version' );
add_action( 'admin_enqueue_scripts', 'replace_jquery_version' );

/* Add bootstrap support to the Wordpress theme*/
function theme_add_bootstrap() {
	wp_enqueue_script( 'popper_js', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js', array('jquery'), NULL, true );
	wp_enqueue_script( 'bootstrap_js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js', array('jquery'), NULL, true );
	wp_enqueue_style( 'bootstrap_css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css', false, NULL, 'all' );
}
add_action( 'wp_enqueue_scripts', 'theme_add_bootstrap' );

function nus_redirect_page() {
	if(is_page() && get_field( 'redirect_url' )){
   		wp_redirect( get_field( 'redirect_url' ) );
		exit;
	}

	if ( (get_post_type() == 'news') && get_field( 'news_redirect_url' ) ) {
		wp_redirect( get_field( 'news_redirect_url' ) );
		exit;
	}
}
add_action('wp', 'nus_redirect_page');

/* VAPT */
function my_custom_disable_author_page() {
    global $wp_query;

    if ( is_author() ) {
        // Redirect to homepage, set status to 301 permenant redirect.
        // Function defaults to 302 temporary redirect.
        wp_redirect(get_option('home'), 301);
        exit;
    }
}
add_action('template_redirect', 'my_custom_disable_author_page');

function remove_remember_me()
{
    echo '<style type="text/css">.forgetmenot { display:none; }</style>';
}
add_action('login_head', 'remove_remember_me');

function remove_wordpress_errors(){
  return 'Login error. Please try again.';
}
add_filter( 'login_errors', 'remove_wordpress_errors' );

add_filter( 'rest_authentication_errors', function( $result ) {
    if ( ! empty( $result ) ) {
        return $result;
    }
    if ( ! is_user_logged_in() ) {
        return new WP_Error( 'rest_not_logged_in', 'You are not currently logged in.', array( 'status' => 401 ) );
    }
    return $result;
});

//remove username from showing on frontend
function remove_author_display_name( $display_name ) {
    if ( ! is_admin() ) {
        return '';
    }
    return $display_name;
}
add_filter( 'the_author', 'remove_author_display_name' );

/* For change password
redirect to "/wp-login.php?checkemail=confirm" 
even the username/email was wrong
*/
function change_password_wrong_email_redirect() {
    global $errors;
    if ( $error = $errors->get_error_code() ) {
    	if($error=='invalidcombo' || $error=='invalid_email'){
    		wp_safe_redirect( home_url().'/wp-login.php?checkemail=confirm' );
    	}
    }  
}
add_action( 'lost_password', 'change_password_wrong_email_redirect' );
/* VAPT - END */

function my_filter_func($filter) {
	echo $filter;
}

add_filter('my_filter_tag', 'my_filter_func');