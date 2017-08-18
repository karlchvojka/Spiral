<?php
/* Template Name: Project Setup */
$postTitleError = '';

if ( isset( $_POST['submit'] ) ) {

    if ( trim( $_POST['title'] ) === '' ) {
        $postTitleError = 'Please enter a title.';
        $hasError = true;
    }

}
get_header();
?>

<!-- WIZARD WRAP -->
<div id="rootwizard" class="container">
  <?php /* The loop */ ?>
  <?php while ( have_posts() ) : the_post(); ?>
    <h1><?php the_title(); ?></h1>
  <?php endwhile; ?>
  <?php wp_reset_query(); ?>
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
        </div>
        <div class="right_panel col-md-6">
          <p><?php the_field('step_13_ques_1'); ?></p>
          <input type="text" id="step_13_answ_1" value="" tabindex="1" size="20" name="step_13_answ_1" />
          <p><?php the_field('step_13_ques_2'); ?></p>
          <input type="text" id="step_13_answ_2" value="" tabindex="1" size="20" name="step_13_answ_2" />
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

				if( isset($_POST['submit']) ){

				    // Do some minor form validation to make sure there is content
				    if (isset ($_POST['title'])) {
				        $title =  $_POST['title'];
				    } else {
				        echo 'Please enter a project title';
				    }

				    // Add the content of the form to $post as an array
				    $new_post = array(
				        'post_title'    => $title,
				        'post_status'   => 'publish',           // Choose: publish, preview, future, draft, etc.
				        'post_type' => 'inquiry'  //'post',page' or use a custom post type if you want to
				    );

						$project_name = $_POST['project_name'];

				    //save the new post
				    $pid = wp_insert_post($new_post);
				    //insert taxonomies
						// save a basic text value
							$field_key = "field_597b64527a95a";
							$value = "some new string";
							update_field( $field_key, $project_name, $pid );

							$link = get_permalink( $pid );
	    				wp_redirect( $link );
					}
				 ?>


</div>

<!-- FORM JS STUFFS -->
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="<?php bloginfo('template_url');?>/js/bootstrap.min.js"></script>
<script src="<?php bloginfo('template_url');?>/js/jquery.bootstrap.wizard.js"></script>
<script src="<?php bloginfo('template_url');?>/js/prettify.js"></script>
<script>
$(document).ready(function() {
  	$('#rootwizard').bootstrapWizard({onNext: function(tab, navigation, index) {
			if(index==1) {
				// Make sure we entered the name
				if(!$('#step_1_answ_1').val()) {
					alert('You must enter your name');
					$('#step_1_answ_1').focus();
					return false;
				}
			}


		}, onTabShow: function(tab, navigation, index) {
			var $total = navigation.find('li').length;
			var $current = index+1;
			var $percent = ($current/$total) * 100;
			$('#rootwizard .progress-bar').css({width:$percent+'%'});
		}});
});</script>


<?php get_footer(); ?>
