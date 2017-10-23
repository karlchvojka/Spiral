<?php
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

// SIDEBAR REGISTRATION
add_action( 'widgets_init', 'theme_slug_widgets_init' );
function theme_slug_widgets_init() {
  register_sidebar( array(
    'name' => __( 'Main Sidebar', 'theme-slug' ),
    'id' => 'sidebar-1',
    'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'theme-slug' ),
    'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>',
  ) );
}
// custom jquery




// DELETE ADMIN BAR!!!!!!!!!
function my_function_admin_bar(){
return false;
}
add_filter( 'show_admin_bar' , 'my_function_admin_bar');

 // Register custom navigation walker
require_once('wp_bootstrap_navwalker.php');


/* --------------------------------------- */
/* -------- CUSTOMIZE LOGIN PAGE --------- */
/* --------------------------------------- */

function my_custom_login() {
echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('stylesheet_directory') . '/tlx_login/tlx_login.css" />';
}
add_action('login_head', 'my_custom_login');

function my_login_logo_url() {
return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
return 'Learning Exchange CI Tool';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );

/* END LOGIN PAGE FUNCTIONS */

function my_remove_em_nav() {
	global $bp;
      bp_core_remove_nav_item( 'events' );
      bp_core_remove_subnav_item( 'group-settings', 'profile' );

}
add_action( 'bp_init', 'my_remove_em_nav' );

function template_change( $template ){
    if( is_single() && in_category('planningstage') ){
        $templates = array("single-inquiry.php");
    } elseif( is_single() && in_category('inquiryrounds') ){
        $templates = array("single-rounds.php");
    } elseif( is_single() && in_category('logentries')) {
				$templates = array("single-logentries.php");
		}
    $template = locate_template( $templates );
    return $template;
}
add_filter( 'single_template', 'template_change' ); //'template_include'/'single_template'





?>
