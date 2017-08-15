<?php

function theme_styles() {

	wp_enqueue_style( 'bootstrap_css', get_template_directory_uri() . '/css/bootstrap.css' );
	wp_enqueue_style( 'main_css', get_template_directory_uri() . '/style.css' );

}

add_action( 'wp_enqueue_scripts', 'theme_styles');

function theme_js() {

	global $wp_scripts;

	wp_enqueue_script( 'bootstrap_js', get_template_directory_uri() . '/js/bootstrap.min.js' );
	wp_enqueue_script( 'my_custom_js', get_template_directory_uri() . '/js/scripts.js');

}

add_action( 'wp_enqueue_scripts', 'theme_js');
// POST THUMBNAIL SUPPORT
add_theme_support( 'post-thumbnails', array( 'post' ) ); // Add it for posts
set_post_thumbnail_size( 352, 462 ); // 50 pixels wide by 50 pixels tall, box resize mode


// Navigation menu Registration
if ( function_exists( 'register_nav_menus' ) ) {
	register_nav_menus(
		array(
		  'main_navigation' => 'Main Navigation',  //main navigation registration
		  'sub_menu_navigation' => 'Sidebar navigation',  //side navigation registration

		)
	);
}

// DELETE ADMIN BAR!!!!!!!!!
function my_function_admin_bar(){
return false;
}
add_filter( 'show_admin_bar' , 'my_function_admin_bar');

 // Register custom navigation walker
require_once('wp_bootstrap_navwalker.php');

?>
