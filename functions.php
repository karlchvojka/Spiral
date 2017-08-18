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
'nav_item_position' => 1,
 'screens' => array(
		 'edit' => array(
				 'name' => 'GE Example 2',
				 // Changes the text of the Submit button
				 // on the Edit page
				 'submit_text' => 'Submit, suckaz',
		 ),
		 'create' => array(
				 'position' => 1,
		 ),
 )
);
parent::init( $args );
}
function display() {
$group_id = bp_get_group_id();
$st_address = groups_get_groupmeta( $group_id, 'group_ext_st_address' );
$country = groups_get_groupmeta( $group_id, 'group_ext_country' );
$mobile = groups_get_groupmeta( $group_id, 'group_ext_mobile' );
$phone = groups_get_groupmeta( $group_id, 'group_ext_phone' );
$email = groups_get_groupmeta( $group_id, 'group_ext_email' );

$website = groups_get_groupmeta( $group_id, 'group_ext_website' );

if($st_address)
echo "<h5>$st_address<h5>";
if($country)
echo "<h5>$country<h5>";
if($mobile)
echo "<h5>$mobile<h5>";
if($phone)
echo "<h5>$phone<h5>";
if($email)
echo '<h5><a href="mailto:'.$email.'">'.$email.'<h5>';

if($website)
echo '<h5><a href="'.$website.'" target="_blank">'.$website.'<h5>';
}
function settings_screen( $group_id = NULL ) {
$st_address = groups_get_groupmeta( $group_id, 'group_ext_st_address' );
$country = groups_get_groupmeta( $group_id, 'group_ext_country' );
$mobile = groups_get_groupmeta( $group_id, 'group_ext_mobile' );
$phone = groups_get_groupmeta( $group_id, 'group_ext_phone' );
$email = groups_get_groupmeta( $group_id, 'group_ext_email' );
$website = groups_get_groupmeta( $group_id, 'group_ext_website' );
?>
<div id="rootwizard" class="container">
	<!-- WIZARD TABS -->
  <!-- NOTE: WIZARD TABS ARE POSITIONED ABSOLUTE OFF SCREEN FOR UI REASONS -->
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
  <!-- END WIZIARD TABS -->

  <!-- START PROGRESS BAR -->
  <div id="bar" class="progress">
    <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
  </div>
  <!-- END PROGRESS BAR -->
	<!-- STAGE START -->
	  <div class="tab-content">
	    <!-- START TAB ONE -->
	    <div class="tab-pane row" id="tab1">
	      <?php while ( have_posts() ) : the_post(); ?>
	      <div class="panel_title col-md-12">
	        <h2><?php the_field('step_1_title'); ?></h2>
	      </div>

	      <div class="left_panel col-md-6">

	        <div class="embed-container">
	        <?php the_field('step_1_video'); ?>
	        </div>
	      </div>
	      <div class="right_panel col-md-6">
	        <p><?php the_field('step_1_ques_1'); ?></p>
					<input type="text" id="step_1_answ_1" value="" tabindex="1" size="20" name="step_1_answ_1" />

	        <p><?php the_field('step_1_ques_2'); ?></p>
	        <input type="text" id="step_1_answ_2" value="" tabindex="1" size="20" name="step_1_answ_2" />

	        <p><?php the_field('step_1_ques_3'); ?></p>
	        <input type="text" id="step_1_answ_3" value="" tabindex="1" size="20" name="step_1_answ_3" />


	      </div>
	      <div class="ask_moses col-md-12">

	      </div>
	    </div>
	    <!-- END TAB ONE -->

	    <!-- START TAB TWO -->
	    <div class="tab-pane row" id="tab2">
	      <div class="panel_title col-md-12">
	        <h2><?php the_field('step_2_title'); ?></h2>
	      </div>
	      	<div class="left_panel col-md-12">
	          <!-- START PLAYLIST -->
	            <!-- START PLAYLIST ITEM -->
	            <div class="playlist_item row">
	              <div class="video col-md-5">
	                <div class="embed-container">
	                <?php the_field('step_2_video_1'); ?>
	                </div>
	              </div>
	              <div class="desc col-md-7">
	                <h3><?php the_field('step_2_vid_desc_1');?></h3>
	                <p>
	                  NOTE: Add more content about these videos?
	                </p>
	              </div>
	            </div>
	            <!-- END PLAYLIST ITEM -->

	            <!-- START PLAYLIST ITEM -->
	            <div class="playlist_item row">
	              <div class="video col-md-5">
	                <div class="embed-container">
	                <?php the_field('step_2_video_2'); ?>
	                </div>
	              </div>
	              <div class="desc col-md-7">
	                <h3><?php the_field('step_2_vid_desc_2');?></h3>
	                <p>
	                  NOTE: Add more content about these videos?
	                </p>
	              </div>
	            </div>
	            <!-- END PLAYLIST ITEM -->

	            <!-- START PLAYLIST ITEM -->
	            <div class="playlist_item row">
	              <div class="video col-md-5">
	                <div class="embed-container">
	                <?php the_field('step_2_video_3'); ?>
	                </div>
	              </div>
	              <div class="desc col-md-7">
	                <h3><?php the_field('step_2_vid_desc_3');?></h3>
	                <p>
	                  NOTE: Add more content about these videos?
	                </p>
	              </div>
	            </div>
	            <!-- END PLAYLIST ITEM -->

	          <!-- END PLAYLIST -->
	        </div>

	    </div>
	    <!-- END TAB TWO -->

	    <!-- START TAB THREE -->
	    <div class="tab-pane row" id="tab3">
	      <div class="panel_title col-md-12">
	        <h2><?php the_field('step_3_title'); ?></h2>
	      </div>
	      	<div class="left_panel col-md-6">
	          <div class="embed-container">
	          <?php the_field('step_3_video'); ?>
	          </div>
	        </div>
	        <div class="right_panel col-md-6">
	          <p><?php the_field('step_3_ques_1'); ?></p>
	          <input type="text" id="step_3_answ_1" value="" tabindex="1" size="20" name="step_1_answ_1" />

	          <p><?php the_field('step_3_ques_2'); ?></p>
	          <input type="text" id="step_3_answ_2" value="" tabindex="1" size="20" name="step_1_answ_2" />
	        </div>
	    </div>
	    <!-- END TAB THREE -->

	    <!-- START TAB FOUR -->
	    <div class="tab-pane row" id="tab4">
	      <div class="panel_title col-md-12">
	        <h2><?php the_field('step_4_title'); ?></h2>
	      </div>
	      	<div class="left_panel col-md-6">
	          <p><?php the_field('step_4_ques_1'); ?></p>
	          <input type="text" id="step_4_answ_1" value="" tabindex="1" size="20" name="step_4_answ_1" />
	          <p><?php the_field('step_4_ques_2'); ?></p>
	          <input type="text" id="step_4_answ_2" value="" tabindex="1" size="20" name="step_4_answ_2" />
	        </div>
	        <div class="right_panel col-md-6">

	        </div>
	    </div>
	    <!-- END TAB FOUR -->

	    <!-- START TAB FIVE -->
	    <div class="tab-pane row" id="tab5">
	      <div class="panel_title col-md-12">
	        <h2><?php the_field('step_5_title'); ?></h2>
	      </div>
	      	<div class="left_panel col-md-6">
	          <p><?php the_field('step_5_ques_1'); ?></p>
	          <input type="text" id="step_5_answ_1" value="" tabindex="1" size="20" name="step_5_answ_1" />
	        </div>
	        <div class="right_panel col-md-6">

	        </div>
	    </div>
	    <!-- END TAB FIVE -->

	    <!-- START TAB SIX -->
	    <div class="tab-pane row" id="tab6">
	      <div class="panel_title col-md-12">
	        <h2><?php the_field('step_6_title'); ?></h2>
	      </div>
	      	<div class="left_panel col-md-6">
	          <p><?php the_field('step_6_ques_1'); ?></p>
	          <input type="text" id="step_6_answ_1" value="" tabindex="1" size="20" name="step_6_answ_1" />
	          <p><?php the_field('step_6_ques_2'); ?></p>
	          <input type="text" id="step_6_answ_2" value="" tabindex="1" size="20" name="step_6_answ_2" />

	        </div>
	        <div class="right_panel col-md-6">

	        </div>
	    </div>
	    <!-- END TAB SIX -->

	    <!-- START TAB SEVEN -->
	    <div class="tab-pane row" id="tab7">
	      <div class="panel_title col-md-12">
	        <h2><?php the_field('step_7_title'); ?></h2>
	      </div>
	      	<div class="left_panel col-md-6">
	          <p><?php the_field('step_7_ques_1'); ?></p>
	          <input type="text" id="step_7_answ_1" value="" tabindex="1" size="20" name="step_7_answ_1" />
	          <p><?php the_field('step_7_ques_2'); ?></p>
	          <input type="text" id="step_7_answ_2" value="" tabindex="1" size="20" name="step_7_answ_2" />

	        </div>
	        <div class="right_panel col-md-6">

	        </div>
	    </div>
	    <!-- END TAB SEVEN -->

	    <!-- START TAB EIGHT -->
	    <div class="tab-pane row" id="tab8">
	      <div class="panel_title col-md-12">
	        <h2><?php the_field('step_8_title'); ?></h2>
	      </div>
	      	<div class="left_panel col-md-6">
	          <p><?php the_field('step_8_ques_1'); ?></p>
	          <input type="text" id="step_8_answ_1" value="" tabindex="1" size="20" name="step_8_answ_1" />
	          <p><?php the_field('step_8_ques_2'); ?></p>
	          <input type="text" id="step_8_answ_2" value="" tabindex="1" size="20" name="step_8_answ_2" />
	        </div>
	        <div class="right_panel col-md-6">

	        </div>
	    </div>
	    <!-- END TAB EIGHT -->

	    <!-- START TAB NINE -->
	    <div class="tab-pane row" id="tab9">
	      <div class="panel_title col-md-12">
	        <h2><?php the_field('step_9_title'); ?></h2>
	      </div>
	      	<div class="left_panel col-md-6">
	          <!-- START PLAYLIST ITEM -->
	          <div class="playlist_item row">
	            <div class="video col-md-5">
	              <div class="embed-container">
	              <?php the_field('step_9_video_1'); ?>
	              </div>
	            </div>
	            <div class="desc col-md-7">
	              <h3><?php the_field('step_9_vid_desc_1');?></h3>
	              <p>
	                NOTE: Add more content about these videos?
	              </p>
	            </div>
	          </div>
	          <!-- END PLAYLIST ITEM -->
	          <!-- START PLAYLIST ITEM -->
	          <div class="playlist_item row">
	            <div class="video col-md-5">
	              <div class="embed-container">
	              <?php the_field('step_9_video_2'); ?>
	              </div>
	            </div>
	            <div class="desc col-md-7">
	              <h3><?php the_field('step_9_vid_desc_2');?></h3>
	              <p>
	                NOTE: Add more content about these videos?
	              </p>
	            </div>
	          </div>
	          <!-- END PLAYLIST ITEM -->
	        </div>
	        <div class="right_panel col-md-6">
	          <p><?php the_field('step_9_ques_1'); ?></p>
	          <input type="text" id="step_9_answ_1" value="" tabindex="1" size="20" name="step_9_answ_1" />
	          <p><?php the_field('step_9_ques_2'); ?></p>
	          <input type="text" id="step_9_answ_2" value="" tabindex="1" size="20" name="step_9_answ_2" />
	          <p><?php the_field('step_9_ques_3'); ?></p>
	          <input type="text" id="step_9_answ_3" value="" tabindex="1" size="20" name="step_9_answ_3" />
	        </div>
	    </div>
	    <!-- END TAB NINE -->

	    <!-- START TAB TEN -->
	    <div class="tab-pane row" id="tab10">
	      <div class="panel_title col-md-12">
	        <h2><?php the_field('step_10_title'); ?></h2>
	      </div>
	      	<div class="left_panel col-md-6">
	          <p><?php the_field('step_10_ques_1'); ?></p>
	          <input type="text" id="step_10_answ_1" value="" tabindex="1" size="20" name="step_10_answ_1" />
	          <p><?php the_field('step_10_ques_2'); ?></p>
	          <input type="text" id="step_10_answ_2" value="" tabindex="1" size="20" name="step_10_answ_2" />
	          <p><?php the_field('step_10_ques_3'); ?></p>
	          <input type="text" id="step_10_answ_3" value="" tabindex="1" size="20" name="step_10_answ_3" />
	        </div>
	        <div class="right_panel col-md-6">

	        </div>
	    </div>
	    <!-- END TAB TEN -->

	    <!-- START TAB ELEVEN -->
	    <div class="tab-pane row" id="ta11">
	        <div class="panel_title col-md-12">
	          <h2><?php the_field('step_11_title'); ?></h2>
	        </div>
	      	<div class="left_panel col-md-6">
	            <?php the_field('step_11_video_1'); ?>
	        </div>
	        <div class="right_panel col-md-6">

	        </div>
	    </div>
	    <!-- END TAB ELEVEN -->

	    <!-- START TAB TWELVE -->
	    <div class="tab-pane row"  id="tab12">
	      <div class="panel_title col-md-12">
	        <h2><?php the_field('step_12_title'); ?></h2>
	      </div>
	      	<div class="left_panel col-md-6">
	          <p><?php the_field('step_12_ques_1'); ?></p>
	          <input type="text" id="step_12_answ_1" value="" tabindex="1" size="20" name="step_12_answ_1" />
	        </div>
	        <div class="right_panel col-md-6">

	        </div>
	    </div>
	    <!-- END TAB TWELVE -->

	    <!-- START TAB THIRTEEN -->
	    <div class="tab-pane row" id="tab13">
	      <div class="panel_title col-md-12">
	        <h2><?php the_field('step_13_title'); ?></h2>
	      </div>
	      	<div class="left_panel col-md-6">
	          <p><?php the_field('step_13_ques_1'); ?></p>
	          <input type="text" id="step_13_answ_1" value="" tabindex="1" size="20" name="step_13_answ_1" />
	          <p><?php the_field('step_13_ques_2'); ?></p>
	          <input type="text" id="step_13_answ_2" value="" tabindex="1" size="20" name="step_13_answ_2" />
	        </div>
	        <div class="right_panel col-md-6">

	        </div>
	    </div>
	    <!-- END TAB THIRTEEN -->

	  <?php endwhile; ?>
	  <?php wp_reset_query(); ?>
	  	<ul class="pager wizard col-width-12">
	  		<li class="previous first" style="display:none;"><a class="btn" href="#">First</a></li>
	  		<li class="previous"><a class="btn" href="#">Previous</a></li>
	  		<li class="next last" style="display:none;"><a class="btn" href="#">Last</a></li>
	  	  <li class="next"><a class="btn" href="#">Next</a></li>
	  	</ul>
	  </div>
	  <!-- END TAB WRAP -->
	</div>
	<!-- WIZARD WRAP -->
<?php
}
function settings_screen_save( $group_id = NULL ) {
if ( isset( $_POST['group_ext_st_address'] ) ) {
groups_update_groupmeta( $group_id, 'group_ext_st_address', sanitize_text_field($_POST['group_ext_st_address']) );
}
if ( isset( $_POST['group_ext_country'] ) ) {
groups_update_groupmeta( $group_id, 'group_ext_country', sanitize_text_field($_POST['group_ext_country']) );
}
if ( isset( $_POST['group_ext_mobile'] ) ) {
groups_update_groupmeta( $group_id, 'group_ext_mobile', sanitize_text_field($_POST['group_ext_mobile']) );
}
if ( isset( $_POST['group_ext_phone'] ) ) {
groups_update_groupmeta( $group_id, 'group_ext_phone', sanitize_text_field($_POST['group_ext_phone']) );
}
if ( isset( $_POST['group_ext_email'] ) ) {
groups_update_groupmeta( $group_id, 'group_ext_email', sanitize_text_field($_POST['group_ext_email']) );
}
if ( isset( $_POST['group_ext_website'] ) ) {
groups_update_groupmeta( $group_id, 'group_ext_website', sanitize_text_field($_POST['group_ext_website']) );
}
}
}
bp_register_group_extension( 'Group_Extension_Ville' );
endif; // if ( class_exists( 'BP_Group_Extension' ) )
}
add_action('bp_init', 'bob_add_group_extension');
?>
