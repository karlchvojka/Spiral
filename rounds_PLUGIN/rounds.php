<?php
/* Plugin Name: Rounds
  Description: Adds rounds functionality to Buddypress groups
  Author: Karl Chvojka
  Version: 1.0
*/
/**
 * The bp_is_active( 'groups' ) check is recommended, to prevent problems
 * during upgrade or when the Groups component is disabled
 */

 /*
    REFERENCES:

    Buddypress Group Extension API:
    https://codex.buddypress.org/developer/group-extension-api/

    Advanced Custom Forms: acf_form()
    https://www.advancedcustomfields.com/resources/acf_form/

    POST FROM FRONTEND

    wwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww
    w     GRENVILLE!!!!!!!!!!!!!!!!
    w
    w     HERE!! RIGHT HERE!!!
    w
    w http://webexplorar.com/wordpress-publish-a-post-frontend-without-plugin/
    wwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww

    THOUGHTS:
    1. Run this on button click inside of rounds_group_extension()
    2. Get the slug and name from the form
      2.a
 */
  function rounds_group_extension() {

  if ( class_exists( 'BP_Group_Extension' ) ) :
    // Start Class Extension :  Group_Extension_Rounds
  class Group_Extension_Rounds extends BP_Group_Extension {

    /* ***********
         NOTE Constructor allow initialization of an objects properties
         NOTE Called automatically.

       *********** */


    // Start __construct() function
    function __construct() {

      // *************************
      //    DO NOT TOUCH. AFTER DISPLAY() CALL
      // *************************
      // Apply argument array to a variable.

      // QUESTION Is this not working multiple times because this is only done once?
      // QUESTION Does this run every time a round is created?

      $args = array(
        // Creates Slug
        'slug' => 'rounds',
        // Creates the Name
        'name' => 'Reflect',
        'tax_input' => array( 'category' => 21 ),
        // Adds round to the Main nav in a specific position.
        'nav_item_position' => 1

      );

      // QUESTION WHAT DOES THIS DO?!
      parent::init( $args );
    }

    // Display is what the tab that is created by the constructor above will hold.
    function display($group_id = NULL) {
      // Assign post ID to variable
      $post_ID = get_the_ID();
      // Assign buddypress group ID to a variable
      $group_id = bp_get_group_id();
     ?>

      <!-- standard wordpress hooks for this part -->
      <?php
      $postTitleError = '';

   if( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) &&  $_POST['action'] == "frontnewPost") {

   if ( trim( $_POST['postTitle'] ) === '' ) {
   $postTitleError = 'Please enter a title.';
   $hasError = true;
   }


   if (isset ($_POST['postTitle'])) {
           $postTitle =  $_POST['postTitle'];
       }


   if ( isset($_POST['postTitle'])) {
   global $wpdb;

       	$new_post = array(
       'post_title'    =>   $postTitle,
       	'post_category' =>   array(21),//array($_POST['cat']), // if specific category, then set it's id like: array(4),
       	'post_status'   =>   'publish',
       'post_type' =>   'inquiry',
       'meta_input' => array(
         'GroupID' => $group_id
       )
       );

       	$post_id = wp_insert_post($new_post);

        // Learning from the last round
        update_field('field_59c13b0056713', $_POST["field_59c13b0056713"], $post_id);
        update_field('field_59c13b1d56714', $_POST["field_59c13b1d56714"], $post_id);
        update_field('field_59c13b3856715', $_POST["field_59c13b3856715"], $post_id);

        // Learning from the last round - Surprise
        update_field('field_59c13b4d56716', $_POST["field_59c13b4d56716"], $post_id);
        update_field('field_59c13b7156717', $_POST["field_59c13b7156717"], $post_id);
        update_field('field_59c13b7a56718', $_POST["field_59c13b7a56718"], $post_id);

        // Learning from the last round - Evidence
        update_field('field_59c13b8956719', $_POST["field_59c13b8956719"], $post_id);
        update_field('field_59c13ba05671a', $_POST["field_59c13ba05671a"], $post_id);
        update_field('field_59c13bad5671b', $_POST["field_59c13bad5671b"], $post_id);

        // Process
        update_field('field_59c13bb95671c', $_POST["field_59c13bb95671c"], $post_id);
        update_field('field_59c13bc65671d', $_POST["field_59c13bc65671d"], $post_id);

        //Closing inquiry
        update_field('field_59c13bd15671e', $_POST["field_59c13bd15671e"], $post_id);
        update_field('field_59c13be65671f', $_POST["field_59c13be65671f"], $post_id);
        update_field('field_59c13bf056720', $_POST["field_59c13bf056720"], $post_id);

   }
   }

  ?>
  <div class="row">
    <div class="col-md-12">
      <h1><?php the_title(); ?></h1>
    </div>
  </div>
  <div class="row">
    <?php the_content(); ?>
    <!-- Advanced custom fields call for a front end form -->
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
            </ul>
          </div>
        </div>
      </div>
      <!-- END WIZIARD TABS -->

      <!-- START PROGRESS BAR -->
    <div class="form_wrap"> </div>
        <div id="bar" class="progress">
        <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
      </div>
   <form id="new_post" name="new_post" method="post" action="" class="wpcf7-form form-horizontal" enctype="multipart/form-data" role="form">

   <div class="required">
   <?php if ( $postTitleError != '' ) { ?>
   <span class="error"><?php echo $postTitleError; ?></span>
   <div class="clearfix"></div>
   <?php } ?>
   </div>
   <br/>


       <!-- END PROGRESS BAR -->
     	<!-- STAGE START -->
     	  <div class="tab-content">
     	    <!-- START TAB ONE -->

     	    <div class="tab-pane row" id="tab1">
     	      <div class="panel_title col-md-12">
     	        <h2><?php the_field('reflectTitle', 53); ?></h2>
     	      </div>

     	      <div class="left_panel col-md-12">
               <input type="text" name="postTitle" id="postTitle" class="string span6" value="<?php if ( isset( $_POST['postTitle'] ) ) echo $_POST['postTitle']; ?>">

     	        <div class="video-responsive">
     	        <?php the_field('reflectVideo1', 53); ?>

     	        </div>
     	      </div>

     	      <div class="ask_moses col-md-12">

     	      </div>
     	    </div>
     	    <!-- END TAB ONE -->

     	    <!-- START TAB TWO -->
     	    <div class="tab-pane row" id="tab2">
     	      <div class="panel_title col-md-12">
     	        <h2><?php the_field('learningFromLastRoundTitle', 53); ?></h2>
     	      </div>
     	      	<div class="left_panel col-md-6">
                 <div class="video-responsive">
                <?php the_field('learningFromLastRoundVideo1', 53); ?>
                </div>
     	        </div>
                <input id="checkbox1" type="checkbox"  />
               <div class="right_panel col-md-6">
                 <?php the_field('learningfromlastroundques1', 53); ?>

                 <div class="ifYes">
                   <?php the_field('learningFromLastRoundQues1Yes', 53); ?>
                  <textarea type="text" name="field_59c13b0056713" id="field_59c13b0056713" class="string span6" value="<?php if ( isset( $_POST['acf']['field_59c13b0056713'] ) ) echo $_POST['field_59c13b0056713']; ?>"></textarea>

                 </div>
                 <div class="ifNo">
                   <?php the_field('learningFromLastRoundQues1No1', 53); ?>
                   <textarea type="text" name="field_59c13b1d56714" id="field_59c13b1d56714" class="string span6" value="<?php if ( isset( $_POST['acf']['field_59c13b1d56714'] ) ) echo $_POST['field_59c13b1d56714']; ?>"></textarea>


                   <?php the_field('learningFromLastRoundQues1No2', 53); ?>
                   <textarea type="text" name="field_59c13b3856715" id="field_59c13b3856715" class="string span6" value="<?php if ( isset( $_POST['acf']['field_59c13b3856715'] ) ) echo $_POST['field_59c13b3856715']; ?>"></textarea>


                 </div>

       	      </div>

     	    </div>
     	    <!-- END TAB TWO -->

     	    <!-- START TAB THREE -->
     	    <div class="tab-pane row" id="tab3">
     	      <div class="panel_title col-md-12">
     	        <h2><?php the_field('learningFromRoundSurpriseLearningSectionTitle', 53); ?></h2>
     	      </div>
     	      	<div class="left_panel col-md-6">

     	        </div>
     	        <div class="right_panel col-md-6">
     	          <p><?php the_field('learningFromRoundSurpriseLearningSectionQues1', 53); ?></p>
                <textarea type="text" name="field_59c13b4d56716" id="field_59c13b4d56716" class="string span6" value="<?php if ( isset( $_POST['acf']['field_59c13b4d56716'] ) ) echo $_POST['field_59c13b4d56716']; ?>"></textarea>

                 <p><?php the_field('learningFromRoundSurpriseLearningSectionQues2', 53); ?></p>
                 <textarea type="text" name="field_59c13b7156717" id="field_59c13b7156717" class="string span6" value="<?php if ( isset( $_POST['acf']['field_59c13b7156717'] ) ) echo $_POST['field_59c13b7156717']; ?>"></textarea>

                 <p><?php the_field('learningFromRoundSurpriseLearningSectionQues3', 53); ?></p>
                 <textarea type="text" name="field_59c13b7a56718" id="field_59c13b7a56718" class="string span6" value="<?php if ( isset( $_POST['acf']['field_59c13b7a56718'] ) ) echo $_POST['field_59c13b7a56718']; ?>"></textarea>


     	        </div>
     	    </div>
     	    <!-- END TAB THREE -->

     	    <!-- START TAB FOUR -->
     	    <div class="tab-pane row" id="tab4">
     	      <div class="panel_title col-md-12">
     	        <h2><?php the_field('learningFromRoundEvidenceSectionTitle', 53); ?></h2>
     	      </div>
     	      	<div class="left_panel col-md-6">

     	        </div>
     	        <div class="right_panel col-md-6">
     						<p><?php the_field('learningFromRoundEvidenceQues1', 53); ?></p>
                <textarea type="text" name="field_59c13b8956719" id="field_59c13b8956719" class="string span6" value="<?php if ( isset( $_POST['acf']['field_59c13b8956719'] ) ) echo $_POST['field_59c13b8956719']; ?>"></textarea>

     	        </div>
     	    </div>
     	    <!-- END TAB FOUR -->

     	    <!-- START TAB FIVE -->
     	    <div class="tab-pane row" id="tab5">
     	      <div class="panel_title col-md-12">
     	        <h2><?php the_field('learningFromRoundEvidenceSectionTitle', 53); ?></h2>
     	      </div>
     	      	<div class="left_panel col-md-6">

     	        </div>
     	        <div class="right_panel col-md-6">
     						<p><?php the_field('learningFromRoundEvidenceMess1', 53); ?></p>
                 <p><?php the_field('learningFromRoundEvidenceQues2', 53); ?></p>
                 <textarea type="text" name="field_59c13ba05671a" id="field_59c13ba05671a" class="string span6" value="<?php if ( isset( $_POST['acf']['field_59c13ba05671a'] ) ) echo $_POST['field_59c13ba05671a']; ?>"></textarea>

     	        </div>
     	    </div>
     	    <!-- END TAB FIVE -->

     	    <!-- START TAB SIX -->
     	    <div class="tab-pane row" id="tab6">
     	      <div class="panel_title col-md-12">
     	        <h2><?php the_field('learningFromRoundEvidenceSectionTitle', 53); ?></h2>
     	      </div>
     	      	<div class="left_panel col-md-6">

     	        </div>
     	        <div class="right_panel col-md-6">
     						<p><?php the_field('learningFromRoundEvidenceQues3', 53); ?></p>
                <textarea type="text" name="field_59c13bad5671b" id="field_59c13bad5671b" class="string span6" value="<?php if ( isset( $_POST['acf']['field_59c13bad5671b'] ) ) echo $_POST['field_59c13bad5671b']; ?>"></textarea>


     	        </div>
     	    </div>
     	    <!-- END TAB SIX -->

     	    <!-- START TAB SEVEN -->
     	    <div class="tab-pane row" id="tab7">
     	      <div class="panel_title col-md-12">
     	        <h2><?php the_field('nextInqRoundSectionTitle', 53); ?></h2>
     	      </div>
     	      	<div class="left_panel col-md-6">

     	        </div>
     	        <div class="right_panel col-md-6">
     						<p><?php the_field('nextInqRoundSectionQues1', 53); ?></p>
     	           <p><?php the_field('nextInqRoundSectionQues1Opt1', 53); ?></p>
                  <p><?php the_field('nextInqRoundSectionQues1Opt2', 53); ?></p>
     	        </div>
     	    </div>
     	    <!-- END TAB SEVEN -->

     	    <!-- START TAB EIGHT -->
     	    <div class="tab-pane row" id="tab8">
     	      <div class="panel_title col-md-12">
     	        <h2><?php the_field('nextInqRoundSectionTitle', 53); ?></h2>
     	      </div>
     	      	<div class="left_panel col-md-6">

     	        </div>
     	        <div class="right_panel col-md-6">
     						<p><?php the_field('nextInqRoundSectionQues2', 53); ?></p>
                 <p><?php the_field('nextInqRoundSectionQues2Opt1', 53); ?></p>
                 <p><?php the_field('nextInqRoundSectionQues2Opt2', 53); ?></p>

     	        </div>
     	    </div>
     	    <!-- END TAB EIGHT -->

     	    <!-- START TAB NINE -->
     	    <div class="tab-pane row" id="tab9">
     	      <div class="panel_title col-md-12">
     	        <h2><?php the_field('processSectionTitle', 53); ?></h2>
     	      </div>
     	      	<div class="left_panel col-md-6">

     	              <div class="video-responsive">
     	              <?php the_field('processVideo1', 53); ?>
     	              </div>

     	        </div>
     	        <div class="right_panel col-md-6">
     	          <p><?php the_field('processQues1', 53); ?></p>
                <textarea type="text" name="field_59c13bb95671c" id="field_59c13bb95671c" class="string span6" value="<?php if ( isset( $_POST['acf']['field_59c13bb95671c'] ) ) echo $_POST['field_59c13bb95671c']; ?>"></textarea>

                 <p><?php the_field('processQues2', 53); ?></p>
                 <textarea type="text" name="field_59c13bc65671d" id="field_59c13bc65671d" class="string span6" value="<?php if ( isset( $_POST['acf']['field_59c13bc65671d'] ) ) echo $_POST['field_59c13bc65671d']; ?>"></textarea>


     	        </div>
     	    </div>
     	    <!-- END TAB NINE -->

     	    <!-- START TAB TEN -->
     	    <div class="tab-pane row" id="tab10">
     	      <div class="panel_title col-md-12">
     	        <h2><?php the_field('closingInquirySectionTitle', 53); ?></h2>
     	      </div>
     	      	<div class="left_panel col-md-6">
                 <div class="video-responsive">
                 <?php the_field('closingInquiryVideo1', 53); ?>
                 </div>
     	        </div>
     	        <div class="right_panel col-md-6">
     						<p><?php the_field('closingInquiryQues1', 53); ?></p>
                <textarea type="text" name="field_59c13bd15671e" id="field_59c13bd15671e" class="string span6" value="<?php if ( isset( $_POST['acf']['field_59c13bd15671e'] ) ) echo $_POST['field_59c13bd15671e']; ?>"></textarea>

     					 <p><?php the_field('closingInquiryQues2', 53); ?></p>
               <textarea type="text" name="field_59c13be65671f" id="field_59c13be65671f" class="string span6" value="<?php if ( isset( $_POST['acf']['field_59c13be65671f'] ) ) echo $_POST['field_59c13be65671f']; ?>"></textarea>

     	        </div>
     	    </div>
     	    <!-- END TAB TEN -->

     	    <!-- START TAB ELEVEN -->
     	    <div class="tab-pane row" id="tab11">
     	        <div class="panel_title col-md-12">
     	         <h2><?php the_field('closingInquirySectionTitle', 53); ?></h2>
     	        </div>
     	      	<div class="left_panel col-md-6">
     						<div class="video-responsive">
     	            <?php the_field('closingInquiryVideo2', 53); ?>
     						</div>
     	        </div>
     	        <div class="right_panel col-md-6">
                 <p><?php the_field('closingInquiryQues3', 53); ?></p>
                 <textarea type="text" name="field_59c13bf056720" id="field_59c13bf056720" class="string span6" value="<?php if ( isset( $_POST['acf']['field_59c13bf056720'] ) ) echo $_POST['field_59c13bf056720']; ?>"></textarea>


     	        </div>
     	    </div>
     	    <!-- END TAB ELEVEN -->

     	    <!-- START TAB TWELVE -->
     	    <div class="tab-pane row"  id="tab12">
     	      <div class="panel_title col-md-12">
     	       <h2><?php the_field('closingInquirySectionTitle', 53); ?></h2>
     	      </div>
     	      	<div class="left_panel col-md-6">
                 <div class="video-responsive">
     	            <?php the_field('closingInquiryVideo3', 53); ?>
     						</div>
     	        </div>
     	        <div class="right_panel col-md-6">
     						<p><?php the_field('closingInquiryMess1', 53); ?></p>
     	        </div>
     	    </div>
     	    <!-- END TAB TWELVE -->

           <ul class="pager wizard col-width-12">
             <li class="previous first" style="display:none;"><a class="btn" href="#">First</a></li>
             <li class="previous"><a class="btn" href="#">Previous</a></li>
             <li class="next last" style="display:none;"><a class="btn" href="#">Last</a></li>
             <li class="next"><a class="btn" href="#">Next</a></li>
             <li class="submit"><input type="submit" value="Post Review" tabindex="40" id="submit" name="submit" class="btn-sm" /></li>
           </ul>
     	  </div>
     	  <!-- END TAB WRAP -->
     	</div>
     	<!-- WIZARD WRAP -->
     <input type="hidden" name="action" value="frontnewPost" />

   </form>
   </div>
   <!-- END WPCF7 -->

       <!-- END OF FORM -->
       </div>
       <style>
       h2.prevEntries {
         font-size:28px;
       }
       div.inq_wrap {
         background-color: #ffffff;
         padding: 20px;
         border-radius: 3px;
         border: 1px solid #e2e2e2;
         margin-bottom: 15px;
         }
         .inq_wrap h3 {
           margin-top:0px;
           margin-bottom:0px;
         }
       .date_wrap {
         text-align:right;
         margin-bottom:0px;
       }
       </style>
        <div class="row">
          <div class="container">
            <h2 class="prevEntries">Previous Entries</h2>


          <?php
          $args2 = array(
          'post_type' => 'inquiry',
          'post_category' => array(21, 20),
        	'meta_key' => 'GroupID',
        	'meta_value' => $group_id
        );
        $rd_query = new WP_Query( $args2 );?>

        <?php if ( $rd_query->have_posts() ) : ?>
          <?php while ( $rd_query->have_posts() ) : $rd_query->the_post(); ?>
                <div class="inq_wrap row">
                  <div class="col-md-6">
                    <a target="_blank" href="<?php the_permalink();?>"><h3><?php the_title();?></h3></a>
                  </div>
                  <div class="col-md-6">

                    <p class="date_wrap"><span class="cat_name"><?php _e( '', 'themename' ); the_category(', ');  ?></span> <?php echo get_the_date(); ?></p>
                  </div>
                </div>
            <?php endwhile; ?>
          <?php endif; ?>

      </div>
        </div>
  </div>
      <?php  // Close Display
}
    // Settings_screen sets if you want to have a tab added to the manage section of the group.
    //function settings_screen( $group_id = NULL ) { } //THIS ADDS TAB TO CREATE AS WELL

    // Called after changes are made via the create/edit/admin screens.
    // This methods should contain the logic necessary to catch settings form submits, validate submitted settings, and save them to the database.
    //function settings_screen_save( $group_id = NULL ) {}

    // Close Screen Save
  } // Class Extension
 // End Class Extension Group_Extension_Rounds

 bp_register_group_extension( 'Group_Extension_Rounds' );
 //bp_register_group_extension( 'MySecondClass' );


 endif; // if ( class_exists( 'BP_Group_Extension' ) )
 }
 add_action('bp_init', 'rounds_group_extension');

 /* BUILD FUNCTION FOR INQ NAV
  *
  *   THIS IS THE PLAN FORM
  *
  *

 */

 function bob_add_group_extension() {
 if ( class_exists( 'BP_Group_Extension' ) ) :
 class Group_Extension_Ville extends BP_Group_Extension {

 function __construct() {
 $args = array(
 'slug' => 'add-inq-form',
 'name' => 'Plan',
 'nav_item_position' => 0,
 'screens' => array (
   'create' => array (
   'enabled' => false
   )
 )

 );
 parent::init( $args );
 }
 function display($group_id = NULL) {
   // Assign post ID to variable
   $post_ID = get_the_ID();
   // Assign buddypress group ID to a variable
   $group_id = bp_get_group_id();
  ?>

  <?php
 $postTitleError = '';

 if( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) &&  $_POST['action'] == "frontnewPost") {

 if ( trim( $_POST['postTitle'] ) === '' ) {
 $postTitleError = 'Please enter a title.';
 $hasError = true;
 }


 if (isset ($_POST['postTitle'])) {
         $postTitle =  $_POST['postTitle'];
     }


 if ( isset($_POST['postTitle'])) {
 global $wpdb;

     	$new_post = array(
        'post_title'    =>   $postTitle,
        'post_status'   =>   'publish',
        'post_type' =>   'inquiry',
        'tax_input' => array( 'category' => 20 ),
        'meta_input' => array(
          'GroupID' => $group_id
        )
      );

     	$post_id = wp_insert_post($new_post);
      groups_update_groupmeta($group_id, 'planFin', 'complete', true);

  // THIS SECTION RUNS ON SUBMIT. UPDATES THE STUFF IN THE SELECTED FIELD INTO THE COORISPONDING FIELD IN THE DB
  //DETERMINE A FOCUS FIELDS
  update_field('field_59bfe890327d6', $_POST["field_59bfe890327d6"], $post_id);
  update_field('field_59bfe8afedf62', $_POST["field_59bfe8afedf62"], $post_id);

  //INQUIRY QUESTIONS FIELDS
  update_field('field_59bfe8bbedf63', $_POST["field_59bfe8bbedf63"], $post_id);
  update_field('field_59bfe8ece7aba', $_POST["field_59bfe8ece7aba"], $post_id);

  // DIFFERENCE YOU WANT TO MAKE
  update_field('field_59bfe8fae7abb', $_POST["field_59bfe8fae7abb"], $post_id);

  // ACTION PLANNING
  update_field('field_59bfe914e7abc', $_POST["field_59bfe914e7abc"], $post_id);
  update_field('field_59bfe942e7abd', $_POST["field_59bfe942e7abd"], $post_id);
  update_field('field_59bfe94fe7abe', $_POST["field_59bfe94fe7abe"], $post_id);
  update_field('field_59bfe95ae7abf', $_POST["field_59bfe95ae7abf"], $post_id);

  // PROFESSIONAL LEARNING RESOURCES FIELDS
  update_field('field_59bfe964e7ac0', $_POST["field_59bfe964e7ac0"], $post_id);
  update_field('field_59bfe97de7ac1', $_POST["field_59bfe97de7ac1"], $post_id);

  // PLAN FOR COLLECTING DATA FIELDS
  update_field('field_59bfe988e7ac2', $_POST["field_59bfe988e7ac2"], $post_id);
  update_field('field_59bfe9d5e7ac3', $_POST["field_59bfe9d5e7ac3"], $post_id);
  update_field('field_59bfe9dce7ac4', $_POST["field_59bfe9dce7ac4"], $post_id);

  // EVIDENCE FORMATTING FIELDS
  update_field('field_59bfea02e7ac5', $_POST["field_59bfea02e7ac5"], $post_id);
  update_field('field_59bfea72e7ac6', $_POST["field_59bfea72e7ac6"], $post_id);
  update_field('field_59bfea7be7ac7', $_POST["field_59bfea7be7ac7"], $post_id);

  //INST CHANGE FIELDS
  update_field('field_59bfea85e7ac8', $_POST["field_59bfea85e7ac8"], $post_id);

  //LOGISTICS FIELDS
  update_field('field_59bfea9fe7ac9', $_POST["field_59bfea9fe7ac9"], $post_id);
  update_field('field_59bfeab2e7aca', $_POST["field_59bfeab2e7aca"], $post_id);

 //echo "<meta http-equiv='refresh' content='0;url=$link' />"; exit;
 }
 }

// THIS SETS THE REFERENCE ID FOR THE FIELDS. CHANGE THIS IF NEEDED
 $acf_ref = 53;
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

<form id="new_post" name="new_post" method="post" action="" class="wpcf7-form form-horizontal" enctype="multipart/form-data" role="form">

  <div class="required">
<?php if ( $postTitleError != '' ) { ?>
<span class="error"><?php echo $postTitleError; ?></span>
<div class="clearfix"></div>
<?php } ?>
</div>
<br/>
<div class="tab-content">
<!-- First tab -->
<div class="tab-pane row" id="tab1">
  <div class="panel_title col-md-12">
    <h2><?php the_field('plan_stage_title', $acf_ref); ?></h2>
  </div>

  <div class="left_panel col-md-12">
    <!-- START PLAYLIST ITEM -->
    <div class="playlist_item row">
      <div class="video col-md-5">
        <div class="video-responsive">

        <?php the_field('plan_video_1', $acf_ref); ?>
        </div>
      </div>
      <div class="desc col-md-7">
        <h3><?php the_field('plan_video_1_title', $acf_ref);?></h3>
      </div>
    </div>
    <!-- END PLAYLIST ITEM -->
    <!-- START PLAYLIST ITEM -->
    <div class="playlist_item row">
      <div class="video col-md-5">
        <div class="video-responsive">
        <?php the_field('plan_video_2', $acf_ref); ?>
        </div>
      </div>
      <div class="desc col-md-7">
        <h3><?php the_field('plan_video_2_title', $acf_ref);?></h3>
      </div>
    </div>
    <!-- END PLAYLIST ITEM -->
  </div>
  <div class="ask_moses col-md-12">

  </div>
</div>
<!-- END TAB ONE -->

<!-- START TAB TWO -->
<div class="tab-pane row" id="tab2">
  <div class="panel_title col-md-12">
    <h2><?php the_field('determine_stage_title', $acf_ref); ?></h2>
  </div>
    <div class="left_panel col-md-6">
      <div class="video-responsive">
      <?php the_field('determine_a_focus_video', $acf_ref); ?>
      </div>
    </div>
    <div class="right_panel col-md-6">
      <p>
        Inquiry Title
      </p>
      <input type="text" name="postTitle" id="postTitle" class="string span6" value="<?php if ( isset( $_POST['postTitle'] ) ) echo $_POST['postTitle']; ?>">

      <p><?php the_field('detFocusQues1', $acf_ref); ?></p>
      <textarea type="text" name="field_59bfe890327d6" id="field_59bfe890327d6" class="string span6" value="<?php if ( isset( $_POST['acf']['field_59bfe890327d6'] ) ) echo $_POST['field_59bfe890327d6']; ?>"></textarea>


      <p><?php the_field('detFocusQues2', $acf_ref); ?></p>
      <textarea type="text" name="field_59bfe8afedf62" id="field_59bfe8afedf62" class="string span6" value="<?php if ( isset( $_POST['acf']['field_59bfe8afedf62'] ) ) echo $_POST['field_59bfe8afedf62']; ?>"></textarea>

    </div>
</div>
<!-- END TAB TWO -->

<!-- START TAB THREE -->
<div class="tab-pane row" id="tab3">
  <div class="panel_title col-md-12">
    <h2><?php the_field('inqQuesTitle', $acf_ref); ?></h2>
  </div>
    <div class="left_panel col-md-6">
      <!-- START PLAYLIST ITEM -->
      <div class="playlist_item row">
        <div class="video col-md-5">
          <div class="video-responsive">
          <?php the_field('inqQuesVideo1', $acf_ref); ?>
          </div>
        </div>
        <div class="desc col-md-7">
          <h3><?php the_field('inqQuesVideo1Title', $acf_ref);?></h3>
        </div>
      </div>
      <!-- END PLAYLIST ITEM -->
      <!-- START PLAYLIST ITEM -->
      <div class="playlist_item row">
        <div class="video col-md-5">
          <div class="video-responsive">
          <?php the_field('inqQuesVideo2', $acf_ref); ?>
          </div>
        </div>
        <div class="desc col-md-7">
          <h3><?php the_field('inqQuesVideo2Title', $acf_ref);?></h3>
        </div>
      </div>
      <!-- END PLAYLIST ITEM -->
      <!-- START PLAYLIST ITEM -->
      <div class="playlist_item row">
        <div class="video col-md-5">
          <div class="video-responsive">
          <?php the_field('inqQuesVideo3', $acf_ref); ?>
          </div>
        </div>
        <div class="desc col-md-7">
          <h3><?php the_field('inqQuesVideo3Title', $acf_ref);?></h3>
        </div>
      </div>
      <!-- END PLAYLIST ITEM -->
      <!-- START PLAYLIST ITEM -->
      <div class="playlist_item row">
        <div class="video col-md-5">
          <div class="video-responsive">
          <?php the_field('inqQuesVideo4', $acf_ref); ?>
          </div>
        </div>
        <div class="desc col-md-7">
          <h3><?php the_field('inqQuesVideo4Title', $acf_ref);?></h3>
        </div>
      </div>
      <!-- END PLAYLIST ITEM -->

    </div>
    <div class="right_panel col-md-6">
      <p><?php the_field('inqQuesQues1', $acf_ref); ?></p>
      <textarea type="text" name="field_59bfe8bbedf63" id="field_59bfe8bbedf63" class="string span6" value="<?php if ( isset( $_POST['acf']['field_59bfe8bbedf63'] ) ) echo $_POST['field_59bfe8bbedf63']; ?>"></textarea>


      <p><?php the_field('inqQuesQues2', $acf_ref); ?></p>
      <textarea type="text" name="field_59bfe8ece7aba" id="field_59bfe8ece7aba" class="string span6" value="<?php if ( isset( $_POST['acf']['field_59bfe8ece7aba'] ) ) echo $_POST['field_59bfe8ece7aba']; ?>"></textarea>

    </div>
</div>
<!-- END TAB THREE -->

<!-- START TAB FOUR -->
<div class="tab-pane row" id="tab4">
  <div class="panel_title col-md-12">
    <h2><?php the_field('inqQuesTitle', $acf_ref); ?></h2>
  </div>
    <div class="left_panel col-md-6">
      <?php the_field('inqQuesMess1', $acf_ref); ?>
    </div>
    <div class="right_panel col-md-6">

    </div>
</div>
<!-- END TAB FOUR -->

<!-- START TAB FIVE -->
<div class="tab-pane row" id="tab5">
  <div class="panel_title col-md-12">
    <h2><?php the_field('diffYouWantToMakeTitle', $acf_ref); ?></h2>
  </div>
    <div class="left_panel col-md-6">

    </div>
    <div class="right_panel col-md-6">
      <p><?php the_field('diffYouWantToMakeQues1', $acf_ref); ?></p>
      <textarea type="text" name="field_59bfe8fae7abb" id="field_59bfe8fae7abb" class="string span6" value="<?php if ( isset( $_POST['acf']['field_59bfe8fae7abb'] ) ) echo $_POST['field_59bfe8fae7abb']; ?>"></textarea>
    </div>
</div>
<!-- END TAB FIVE -->

<!-- START TAB SIX -->
<div class="tab-pane row" id="tab6">
  <div class="panel_title col-md-12">
    <h2><?php the_field('actionPlanningTitle', $acf_ref); ?></h2>
  </div>
    <div class="left_panel col-md-6">
      <!-- START PLAYLIST ITEM -->
      <div class="playlist_item row">
        <div class="video col-md-5">
          <div class="video-responsive">
          <?php the_field('actionPlanningVideo1', $acf_ref); ?>
          </div>
        </div>
        <div class="desc col-md-7">
          <h3><?php the_field('actionPlanningVideo1Title', $acf_ref);?></h3>
        </div>
      </div>
      <!-- END PLAYLIST ITEM -->
      <!-- START PLAYLIST ITEM -->
      <div class="playlist_item row">
        <div class="video col-md-5">
          <div class="video-responsive">
          <?php the_field('actionPlanningVideo2', $acf_ref); ?>
          </div>
        </div>
        <div class="desc col-md-7">
          <h3><?php the_field('actionPlanningVideo2Title', $acf_ref);?></h3>
        </div>
      </div>
      <!-- END PLAYLIST ITEM -->
    </div>
    <div class="right_panel col-md-6">
      <p><?php the_field('actionPlanningQues1', $acf_ref); ?></p>
      <textarea type="text" name="field_59bfe914e7abc" id="field_59bfe914e7abc" class="string span6" value="<?php if ( isset( $_POST['acf']['field_59bfe914e7abc'] ) ) echo $_POST['field_59bfe914e7abc']; ?>"></textarea>
     <p><?php the_field('actionPlanningQues2', $acf_ref); ?></p>
     <textarea type="text" name="field_59bfe942e7abd" id="field_59bfe942e7abd" class="string span6" value="<?php if ( isset( $_POST['acf']['field_59bfe942e7abd'] ) ) echo $_POST['field_59bfe942e7abd']; ?>"></textarea>

    </div>
</div>
<!-- END TAB SIX -->

<!-- START TAB SEVEN -->
<div class="tab-pane row" id="tab7">
  <div class="panel_title col-md-12">
    <h2><?php the_field('actionPlanningTitle', $acf_ref); ?></h2>
  </div>
    <div class="left_panel col-md-6">
      <!-- START PLAYLIST ITEM -->
      <div class="playlist_item row">
        <div class="video col-md-5">
          <div class="video-responsive">
          <?php the_field('actionPlanningVideo3', $acf_ref); ?>
          </div>
        </div>
        <div class="desc col-md-7">
          <h3><?php the_field('actionPlanningVideo3Title', $acf_ref);?></h3>
        </div>
      </div>
      <!-- END PLAYLIST ITEM -->
      <!-- START PLAYLIST ITEM -->
      <div class="playlist_item row">
        <div class="video col-md-5">
          <div class="video-responsive">
          <?php the_field('actionPlanningVideo4', $acf_ref); ?>
          </div>
        </div>
        <div class="desc col-md-7">
          <h3><?php the_field('actionPlanningVideo4Title', $acf_ref);?></h3>
        </div>
      </div>
      <!-- END PLAYLIST ITEM -->
    </div>
    <div class="right_panel col-md-6">
      <p><?php the_field('actionPlanningQues3', $acf_ref); ?></p>
      <textarea type="text" name="field_59bfe94fe7abe" id="field_59bfe94fe7abe" class="string span6" value="<?php if ( isset( $_POST['acf']['field_59bfe94fe7abe'] ) ) echo $_POST['field_59bfe94fe7abe']; ?>"></textarea>
      <p><?php the_field('actionPlanningMess1', $acf_ref);?></p>
      <p><?php the_field('actionPlanningMess2', $acf_ref);?></p>
      <p><?php the_field('actionPlanningQues4', $acf_ref); ?></p>
      <textarea type="text" name="field_59bfe95ae7abf" id="field_59bfe95ae7abf" class="string span6" value="<?php if ( isset( $_POST['acf']['field_59bfe95ae7abf'] ) ) echo $_POST['field_59bfe95ae7abf']; ?>"></textarea>

    </div>
</div>
<!-- END TAB SEVEN -->

<!-- START TAB EIGHT -->
<div class="tab-pane row" id="tab8">
  <div class="panel_title col-md-12">
    <h2><?php the_field('profLearnResTitle', $acf_ref); ?></h2>
  </div>
    <div class="left_panel col-md-6">
      <div class="video-responsive">
      <?php the_field('profLearnResVideo1', $acf_ref); ?>
      </div>
    </div>
    <div class="right_panel col-md-6">
      <p><?php the_field('profLearnResQues1', $acf_ref); ?></p>
      <textarea type="text" name="field_59bfe964e7ac0" id="field_59bfe964e7ac0" class="string span6" value="<?php if ( isset( $_POST['acf']['field_59bfe964e7ac0'] ) ) echo $_POST['field_59bfe964e7ac0']; ?>"></textarea>
     <p><?php the_field('profLearnResQues2', $acf_ref); ?></p>
     <textarea type="text" name="field_59bfe97de7ac1" id="field_59bfe97de7ac1" class="string span6" value="<?php if ( isset( $_POST['acf']['field_59bfe97de7ac1'] ) ) echo $_POST['field_59bfe97de7ac1']; ?>"></textarea>
    </div>
</div>
<!-- END TAB EIGHT -->

<!-- START TAB NINE -->
<div class="tab-pane row" id="tab9">
  <div class="panel_title col-md-12">
    <h2><?php the_field('planForCollectingDataTitle', $acf_ref); ?></h2>
  </div>
    <div class="left_panel col-md-6">
      <!-- START PLAYLIST ITEM -->
      <div class="playlist_item row">
        <div class="video col-md-5">
          <div class="video-responsive">
          <?php the_field('planForCollectingDataVideo1', $acf_ref); ?>
          </div>
        </div>
        <div class="desc col-md-7">
          <h3><?php the_field('planForCollectingDataVideo1Title', $acf_ref);?></h3>
          <p>
            NOTE: Add more content about these videos?
          </p>
        </div>
      </div>
      <!-- END PLAYLIST ITEM -->
      <!-- START PLAYLIST ITEM -->
      <div class="playlist_item row">
        <div class="video col-md-5">
          <div class="video-responsive">
          <?php the_field('planForCollectingDataVideo2', $acf_ref); ?>
          </div>
        </div>
        <div class="desc col-md-7">
          <h3><?php the_field('planForCollectingDataVideo2Title', $acf_ref);?></h3>
          <p>
            NOTE: Add more content about these videos?
          </p>
        </div>
      </div>
      <!-- END PLAYLIST ITEM -->
    </div>
    <div class="right_panel col-md-6">
      <p><?php the_field('planForCollectingDataQues1', $acf_ref); ?></p>
      <textarea type="text" name="field_59bfe988e7ac2" id="field_59bfe988e7ac2" class="string span6" value="<?php if ( isset( $_POST['acf']['field_59bfe988e7ac2'] ) ) echo $_POST['field_59bfe988e7ac2']; ?>"></textarea>
      <p><?php the_field('planForCollectingDataQues2', $acf_ref); ?></p>
      <textarea type="text" name="field_59bfe9d5e7ac3" id="field_59bfe9d5e7ac3" class="string span6" value="<?php if ( isset( $_POST['acf']['field_59bfe9d5e7ac3'] ) ) echo $_POST['field_59bfe9d5e7ac3']; ?>"></textarea>
      <p><?php the_field('planForCollectingDataQues3', $acf_ref); ?></p>
      <textarea type="text" name="field_59bfe9dce7ac4" id="field_59bfe9dce7ac4" class="string span6" value="<?php if ( isset( $_POST['acf']['field_59bfe9dce7ac4'] ) ) echo $_POST['field_59bfe9dce7ac4']; ?>"></textarea>
    </div>
</div>
<!-- END TAB NINE -->

<!-- START TAB TEN -->
<div class="tab-pane row" id="tab10">
  <div class="panel_title col-md-12">
    <h2><?php the_field('evidenceFormatTitle', $acf_ref); ?></h2>
  </div>
    <div class="left_panel col-md-6">

    </div>
    <div class="right_panel col-md-6">
    <p><?php the_field('evidenceFormatQues1', $acf_ref); ?></p>
    <textarea type="text" name="field_59bfea02e7ac5" id="field_59bfea02e7ac5" class="string span6" value="<?php if ( isset( $_POST['acf']['field_59bfea02e7ac5'] ) ) echo $_POST['field_59bfea02e7ac5']; ?>"></textarea>

    <p><?php the_field('evidenceFormatQues2', $acf_ref); ?></p>
    <textarea type="text" name="field_59bfea72e7ac6" id="field_59bfea72e7ac6" class="string span6" value="<?php if ( isset( $_POST['acf']['field_59bfea72e7ac6'] ) ) echo $_POST['field_59bfea72e7ac6']; ?>"></textarea>

    <p><?php the_field('evidenceFormatQues3', $acf_ref); ?></p>
    <textarea type="text" name="field_59bfea7be7ac7" id="field_59bfea7be7ac7" class="string span6" value="<?php if ( isset( $_POST['acf']['field_59bfea7be7ac7'] ) ) echo $_POST['field_59bfea7be7ac7']; ?>"></textarea>

    </div>
</div>
<!-- END TAB TEN -->

<!-- START TAB ELEVEN -->
<div class="tab-pane row" id="tab11">
    <div class="panel_title col-md-12">
      <h2><?php the_field('instChangeTitle', $acf_ref); ?></h2>
    </div>
    <div class="left_panel col-md-6">
      <div class="video-responsive">
        <?php the_field('instChangeVideo1', $acf_ref); ?>
      </div>
    </div>
    <div class="right_panel col-md-6">
      <p><?php the_field('instChangeQues1', $acf_ref); ?></p>
      <textarea type="text" name="field_59bfea85e7ac8" id="field_59bfea85e7ac8" class="string span6" value="<?php if ( isset( $_POST['acf']['field_59bfea85e7ac8'] ) ) echo $_POST['field_59bfea85e7ac8']; ?>"></textarea>

    </div>
</div>
<!-- END TAB ELEVEN -->

<!-- START TAB TWELVE -->
<div class="tab-pane row"  id="tab12">
  <div class="panel_title col-md-12">
    <h2><?php the_field('logisticsTitle', $acf_ref); ?></h2>
  </div>
    <div class="left_panel col-md-6">
      <div class="video-responsive">
        <?php the_field('logisticsVideo1', $acf_ref); ?>
      </div>
    </div>
    <div class="right_panel col-md-6">
      <p><?php the_field('logisticsQues1', $acf_ref); ?></p>
      <textarea type="text" name="field_59bfea9fe7ac9" id="field_59bfea9fe7ac9" class="string span6" value="<?php if ( isset( $_POST['acf']['field_59bfea9fe7ac9'] ) ) echo $_POST['field_59bfea9fe7ac9']; ?>"></textarea>
      <p><?php the_field('logisticsQues2', $acf_ref); ?></p>
      <textarea type="text" name="field_59bfeab2e7aca" id="field_59bfeab2e7aca" class="string span6" value="<?php if ( isset( $_POST['acf']['field_59bfeab2e7aca'] ) ) echo $_POST['field_59bfeab2e7aca']; ?>"></textarea>

    </div>
</div>
<!-- END TAB TWELVE -->

<ul class="pager wizard col-width-12">
  <li class="previous first" style="display:none;"><a class="btn" href="#">First</a></li>
  <li class="previous"><a class="btn" href="#">Previous</a></li>
  <li class="next last" style="display:none;"><a class="btn" href="#">Last</a></li>
  <li class="next"><a class="btn" href="#">Next</a></li>
  <li class="submit"><input type="submit" value="Post Review" tabindex="40" id="submit" name="submit" class="btn-sm" /></li>
</ul>
</div>
<!-- END TAB WRAP -->

</div>

<input type="hidden" name="action" value="frontnewPost" />
</form>
</div>
<!-- END WPCF7 -->

  <!-- END OF FORM -->
  </div>

 <?php
 }
 function settings_screen_save( $group_id = NULL ) {
 }
 }
 bp_register_group_extension( 'Group_Extension_Ville' );
 endif; // if ( class_exists( 'BP_Group_Extension' ) )
 }
 add_action('bp_init', 'bob_add_group_extension');


// END BOB
function logs_group_extension() {
if ( class_exists( 'BP_Group_Extension' ) ) :
class Group_Extension_Logs extends BP_Group_Extension {

function __construct() {
$args = array(
'slug' => 'add-logs-form',
'name' => 'Logs',
'nav_item_position' => 3,
'screens' => array (
  'create' => array (
  'enabled' => false
  )
)

);
parent::init( $args );
}
function display($group_id = NULL) {
  // Assign post ID to variable
  $post_ID = get_the_ID();
  // Assign buddypress group ID to a variable
  $group_id = bp_get_group_id();
 ?>

 <?php
 $postTitleError = '';
 $postContentError = '';

 if( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) &&  $_POST['action'] == "frontnewPost") {

 if ( trim( $_POST['postTitle'] ) === '' ) {
 $postTitleError = 'Please enter a title.';
 $hasError = true;
 }
 if ( trim( $_POST['postContent'] ) === '' ) {
 $postContentError = 'Please enter the post content.';
 $hasError = true;
 }

 if (isset ($_POST['postTitle'])) {
         $postTitle =  $_POST['postTitle'];
     }

     if (isset ($_POST['postContent'])) {
         $postContent = $_POST['postContent'];
     }

 if ( isset($_POST['postTitle']) && isset($_POST['postContent']) && ( $hasError==false )) {
 global $wpdb;

     	$new_post = array(
     'post_title'    =>   $postTitle,
     'post_content'  =>   $postContent,
     'tax_input' => array( 'category' => 22 ),
     	'post_status'   =>   'publish',
     'post_type' =>   'inquiry',
     'meta_input' => array(
       'GroupID' => $group_id
     )
     );


     	$post_id = wp_insert_post($new_post);


     	$link = get_permalink( $post_id );
 echo "<meta http-equiv='refresh' content='0;url=$link' />"; exit;
 }


 }

?>
<style>
.title_wrap h1 {
  text-align:center;
}
div.log_wrap {
  padding:20px;
  background-color:#ffffff;
  border-radius:5px;
  border:1px solid #e2e2e2;
  }
  div.log_wrap h3 {
    margin-top:0px;

  }
div.rounds_wrap {
  margin-bottom:5px;
}
a.rounds_title {
  display:block;
  font-size:14px;
}
p.date_wrap {
  font-size:12px;
  margin-bottom:0px;
}
input#postTitle, textarea {
  width:100%;
  margin-top:10px;
  border-radius:5px;
  border:1px solid #e2e2e2;
  padding:10px;
}
</style>

 <div class="form-content container">
  <div class="row">
    <div class="title_wrap col-md-12">
      <h1>What if we make a CI tool that helps people understand CI?</h1>
    </div>
  </div>
  <div class="row">
    <div class="theory_wrap col-md-12">
      <h2>Theory of Action</h2>
      <ol>
        <li>If we make the thing and throw it out there into the sector, it will improve math scores. </li>
        <li>If we watch various stand up comedians while we make this, then it will make it a more entertaining service for the users.</li>
      </ol>
    </div>
  </div>
  <div class="wpcf7 row">
 <form id="new_post" name="new_post" method="post" action="" class="wpcf7-form form-horizontal" enctype="multipart/form-data" role="form">

   <div class="required">
     <?php if ( $postTitleError != '' ) { ?>
     <span class="error"><?php echo $postTitleError; ?></span>
     <div class="clearfix"></div>
     <?php } ?>
     <?php if ( $postContentError != '' ) { ?>
     <span class="error"><?php echo $postContentError; ?></span>
     <div class="clearfix"></div>
     <?php } ?>
   </div>

   <!-- post name -->
   <div class="control-group string postTitle col-md-8">
     <label for="postTitle" class="string control-label">Log Title</label>
     <div class="controls">
     <input type="text" name="postTitle" id="postTitle" class="string span6" value="<?php if ( isset( $_POST['postTitle'] ) ) echo $_POST['postTitle']; ?>">
     </div>

     <label for="postContent" class="string control-label">Contents</label>
     <div class="controls">
     <textarea id="postContent" tabindex="15" name="postContent" cols="80" rows="10"><?php if ( isset( $_POST['postContent'] ) ) { if ( function_exists( 'stripslashes' ) ) { echo stripslashes( $_POST['postContent'] );} else { echo $_POST['postContent'];}} ?></textarea>
   </div>
   </div>
   <div class="log_wrap col-md-4">
     <!-- PUT LOOP FOR OTHER LOGS HERE -->
      <h3>Past Logs</h3>
       <?php
       $args2 = array(
       'post_type' => 'inquiry',
       'cat' => '22',
     	'meta_key' => 'GroupID',
     	'meta_value' => $group_id
     );
     $rd_query = new WP_Query( $args2 );?>

     <?php if ( $rd_query->have_posts() ) : ?>
       <?php while ( $rd_query->have_posts() ) : $rd_query->the_post(); ?>
      <div class="rounds_wrap">
        <a class="rounds_title" target="_blank" href="<?php the_permalink();?>"><?php the_title();?></a>
        <p class="date_wrap"><?php echo get_the_date(); ?></p>
      </div>
         <?php endwhile; ?>
       <?php endif; ?>
   </div>
   <!-- post Content -->
   <div class="control-group string postContent">

     </div>
   </div>
   <br/>

   <br/>
   <fieldset class="submit">
   <input type="submit" value="Post Review" tabindex="40" id="submit" name="submit" class="btn-sm" />
   </fieldset>

   <input type="hidden" name="action" value="frontnewPost" />
 </form>

 <?php
  if ( bp_current_user_can( 'bp_moderate' ) ) {
  echo '<form>
    <button id="finishStage2" class="btn">Finish Act/Observe Stage</button>
  </form>';
} else {
  echo '';
}

 ?>

 <script>
 jQuery(document).ready(function($) {
    $('button#finishStage2').click(function qwe4_tracker(){

        var data = { action: 'my_action' };

        $.post(ajaxurl, data, function(response) {
            //alert('Got this from the server: ' + response);  // Uncomment to use for testing
        });
    });
});
</script>
<?php add_action('wp_ajax_my_action', 'my_action_callback');
function my_action_callback() {

  $group_id = bp_get_group_id();

    groups_update_groupmeta($group_id, 'actObs', 'complete', true);

    die(); // this is required to return a proper result
} ?>

 </div>
 <!-- END WPCF7 -->

 <!-- END OF FORM -->
 </div>

 <?php
}
function settings_screen_save( $group_id = NULL ) {
}
}
bp_register_group_extension( 'Group_Extension_Logs' );
endif; // if ( class_exists( 'BP_Group_Extension' ) )
}
add_action('bp_init', 'logs_group_extension');
?>
