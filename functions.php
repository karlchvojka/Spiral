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

/* ------------------------------------------------------------
:: ADD GROUPS EXTENSIONS
--------------------------------------------------------------- */
function bob_add_group_extension() {
if ( class_exists( 'BP_Group_Extension' ) ) :
class Group_Extension_Ville extends BP_Group_Extension {
function __construct() {
$args = array(
'slug' => 'add-contact-info',
'name' => 'Contact Info',
'nav_item_position' => 0,
  'screens' => array(
      'edit' => array(
          'name' => 'GE Example 2',
          // Changes the text of the Submit button
          // on the Edit page
          'submit_text' => 'Submit',
      ),
      'create' => array(
          'position' => 0,
      ),
  )
);
parent::init( $args );
}
function display() {
$group_id = bp_get_group_id();
// $st_address = groups_get_groupmeta( $group_id, 'group_ext_st_address' ); THIS IS AN EXAMPLE. EACH FIELD

//ADD ABOVE EXAMPLE EACH FIELD HERE>

//if($st_address)
//echo "<h5>$st_address<h5>";

//ADD ABOVE EXAMPLE EACH FIELD HERE

function settings_screen( $group_id = NULL ) {

//$st_address = groups_get_groupmeta( $group_id, 'group_ext_st_address' );
//ADD ABOVE EXAMPLE EACH FIELD HERE

// FORM LAYOUT BELOW
?>
<div id="rootwizard" class="container">
	<div id="pill_nav" class="navbar">
    <div class="navbar-inner">
      <div class="container">
        <ul>
					<li><a href="#tab1" data-toggle="tab"></a></a></li>
				 <li><a href="#tab2" data-toggle="tab"></a></li>
				 <li><a href="#tab3" data-toggle="tab"></a></li>
				 <li><a href="#tab4" data-toggle="tab"></a></li>
				 <li><a href="#tab5" data-toggle="tab"></a></li>
				 <li><a href="#tab6" data-toggle="tab"></a></li>
				 <li><a href="#tab7" data-toggle="tab"></a></li>
				 <li><a href="#tab8" data-toggle="tab"></a></li>
				 <li><a href="#tab9" data-toggle="tab"></a></li>
				 <li><a href="#tab10" data-toggle="tab"></a></li>
				 <li><a href="#tab11" data-toggle="tab"></a></li>
				 <li><a href="#tab12" data-toggle="tab"></a></li>
				 <li><a href="#tab13" data-toggle="tab"></a></a></li>

        </ul>
      </div>
    </div>
  </div>
	<div id="bar" class="progress">
    <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
  </div>
	<div class="tab-content">
		<div class="tab-pane row" id="tab1">
      <div class="panel_title col-md-12">
        <h2>tab1</h2>
      </div>
      	<div class="left_panel col-md-6">
					<p><?php the_field('step_1_ques_1'); ?></p>
					<input type="text" id="step_1_answ_1" value="" tabindex="1" size="20" name="step_1_answ_1" />
        </div>
        <div class="right_panel col-md-6">
					<div>
					Street Address:<br />
					<input type="text" name="group_ext_st_address" value="<?php echo $st_address; ?>">
					</div>
					<div>
					Country:<br />
					<input type="text" name="group_ext_country" value="<?php echo $country; ?>">
					</div>
					<div>
        </div>
    </div>
	</div>
		<div class="tab-pane row" id="tab2">
      <div class="panel_title col-md-12">
        <h2>tab2</h2>
      </div>
      	<div class="left_panel col-md-6">

        </div>
        <div class="right_panel col-md-6">
					<div>
					Mobile:<br />
					<input type="text" name="group_ext_mobile" value="<?php echo $mobile; ?>">
					</div>
					<div>
					Phone:<br />
					<input type="text" name="group_ext_phone" value="<?php echo $phone; ?>">
					</div>
					<div>
					Email:<br />
					<input type="text" name="group_ext_email" value="<?php echo $email; ?>">
					</div>
					<div>
					Website:<br />
					<input type="text" name="group_ext_website" value="<?php echo $website; ?>">
					</div>
        </div>
    </div>
		<ul class="pager wizard col-width-12">
  		<li class="previous first" style="display:none;"><a class="btn" href="#">First</a></li>
  		<li class="previous"><a class="btn" href="#">Previous</a></li>
  		<li class="next last" style="display:none;"><a class="btn" href="#">Last</a></li>
  	  <li class="next"><a class="btn" href="#">Next</a></li>
  	</ul>
</div>
</div>


<?php
}
function settings_screen_save( $group_id = NULL ) {
if ( isset( $_POST['group_ext_st_address'] ) ) {
groups_update_groupmeta( $group_id, 'group_ext_st_address', sanitize_text_field($_POST['group_ext_st_address']) );
}



}
}
bp_register_group_extension( 'Group_Extension_Ville' );
endif; // if ( class_exists( 'BP_Group_Extension' ) )
}
add_action('bp_init', 'bob_add_group_extension');
?>
