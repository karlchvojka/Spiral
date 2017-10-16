<?php
if ( ( is_user_logged_in() && $current_user->ID == $post->post_author ) ) { // Execute code if user is logged in or user is the author
    acf_form_head();
    wp_deregister_style( 'wp-admin' );
}
get_header();
$projID = get_page_by_path('project-setup');
$acf_ref = $projID;
?>

<style>
#member-list {
  padding-left:0px;
}

input[type=checkbox] {
  visibility: hidden;
}
.acf-label {
  display:none;
}
.updated {
  display:none;
}
.edit_field_1, .edit_field_2, .edit_field_3, .edit_field_4, .edit_field_5, .edit_field_6, .edit_field_7, .edit_field_8, .edit_field_9 {
  display:none;
}
.edit_field {
  margin-bottom:20px;
}

.check_wrap {
  margin-top:20px;
}
div.acf-form-submit input {
  border-radius: 3px;
  background-color:#fd5842;
  color:#ffffff;
  padding:10px 16px;
  font-size:16px;
  font-weight:bold;
  -webkit-appearance: button-bevel;
  outline:none;
}
</style>

<script>
  $(document).ready(function() {
    $('#edit_tab_1').click(function(event) {
      event.preventDefault();
      $('.edit_field_1').toggle();
    });
    $('#edit_tab_2').click(function(event) {
      event.preventDefault();
      $('.edit_field_2').toggle();
    });
    $('#edit_tab_3').click(function(event) {
      event.preventDefault();
      $('.edit_field_3').toggle();
    });
    $('#edit_tab_4').click(function(event) {
      event.preventDefault();
      $('.edit_field_4').toggle();
    });
    $('#edit_tab_5').click(function(event) {
      event.preventDefault();
      $('.edit_field_5').toggle();
    });
    $('#edit_tab_6').click(function(event) {
      event.preventDefault();
      $('.edit_field_6').toggle();
    });
    $('#edit_tab_7').click(function(event) {
      event.preventDefault();
      $('.edit_field_7').toggle();
    });
    $('#edit_tab_8').click(function(event) {
      event.preventDefault();
      $('.edit_field_8').toggle();
    });
    $('#edit_tab_9').click(function(event) {
      event.preventDefault();
      $('.edit_field_9').toggle();
    });

  });
</script>
<div class="container">
    <?php if (have_posts()) : ?>
      <?php while (have_posts()) : the_post(); ?>
        <?php
        // ARGS FOR FOLLOWING LOOPS
        $post_id = get_the_ID();
        $parent_id = get_post_meta($post_id, $meta_key = 'GroupID');
          ?>
        <div class="row inquiry_header">
      		<div class="col-md-6">
      			<h2 id="inq_page">Planning Stage: <?php the_title(); ?></h2>
            <?php
            //ARGS FOR THE GROUP LOOP
            $args = array(
            'include' => $parent_id,
            'max' => 1
            );

            $bpmargs = array (
              'group_id' => $parent_id
            );

            // START OF GROUP LOOP
            if ( bp_has_groups( $args) ) : while ( bp_groups() ) : bp_the_group();
            // GROUP AVATAR AND NAME PULL
            ?>
            <h3><?php bp_group_avatar( 'type=thumb&width=50&height=50' ) ?><?php bp_group_name() ?></h3>
            <?php
            // GROUP DESCRIPTION PULL
            bp_group_description_excerpt() ?>
            <div class="col-md-6">
            <h3>Inquiry Members:</h3>

              <?php
              // START OF THE MEMEBERS LOOP
              if ( bp_group_has_members($bpmargs) ) : ?>
                <ul id="member-list" class="item-list">
                <?php while ( bp_group_members() ) : bp_group_the_member(); ?>
                  <li>
                    <?php bp_group_member_name() ?>
                  </li>
                <?php endwhile; ?>
                </ul>
                <?php endif;
              // END GROUP MEMBERS LOOP
              ?>

            </div>
            <div class="col-md-6">
              <h3>Creation Date:</h3>
              <?php bp_group_date_created(); ?>
            </div>
          <?php endwhile; ?>
          <?php do_action( 'bp_after_groups_loop' ) ?>
          <?php endif;
          // END GROUPS LOOP
          ?>
      		</div>
      		<div class="col-md-6">
            <button onclick="javascript:window.open('','_self').close();" class="print_button pull-right" />Go Back</button>
            <button class="print_button pull-right" onclick="printreportbutton()"><i class="fa fa-print" aria-hidden="true"></i> Print Report</button>

      		</div>

      	</div>

        <div class="row">

          <div id="accordion" role="tablist" aria-multiselectable="true" class="col-md-12">
            <!-- CARD ONE -->
            <div class="check_wrap row">
              <div class="col-md-2">
                <div class="slide_wrap">
                  <input type="checkbox" value="None" id="slideOne" name="check" />
                  <label for="slideOne"></label>
                </div>
              </div>
              <div class="edit_button col-md-10">
                <a href="#" id="edit_tab_1" class="pull-right"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>
              </div>
            </div>

            <div class="card" id="card_one">
              <div class="card-header" role="tab" id="headingOne"  data-toggle="collapse" data-parent="#accordion" data-target="#collapseOne">
                <h3 class="mb-0">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                    Determine A Focus
                  </a>
                  <a class="add_cross pull-right">+</a>
                </h3>
              </div>

              <div id="collapseOne" class="collapse in" role="tabpanel" aria-labelledby="headingOne">
                <div class="card-block">
                  <h4><?php the_field('detFocusQues1', $acf_ref);?></h4>
                  <p><?php the_field('detFocusAnsw1');?></p>
                  <div class="edit_field_1 edit_field">
                  <?php acf_form(array(
                      'fields' => array('detFocusAnsw1'),
                  )); ?>
                  </div>
                  <h4><?php the_field('detFocusQues2', $acf_ref);?></h4>
                  <p><?php the_field('detFocusAnsw2');?></p>
                  <div class="edit_field_1 edit_field">
                  <?php acf_form(array(
                      'fields' => array('detFocusAnsw2'),
                  )); ?>
                  </div>
                </div>
              </div>
            </div>
            <!-- END CARD ONE -->

            <!-- START CARD TWO -->
            <div class="check_wrap row">
              <div class="col-md-2">
                <div class="slide_wrap">
                  <input type="checkbox" value="None" id="slideTwo" name="check" />
                  <label for="slideTwo"></label>
                </div>
              </div>
              <div class="edit_button col-md-10">
                <a href="#" id="edit_tab_2" class="pull-right"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>
              </div>
            </div>

            <div class="card" id="card_two">
              <div class="card-header" role="tab" id="headingTwo">
                <h3 class="mb-0">
                  <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Inquiry Questions
                  </a>
                  <a class="add_cross pull-right">+</a>
                </h3>
              </div>
              <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                <div class="card-block">
                  <h4><?php the_field('inqQuesQues1', $acf_ref);?></h4>
                  <p><?php the_field('inqQuesAnsw1');?></p>
                  <div class="edit_field_2 edit_field">
                  <?php acf_form(array(
                      'fields' => array('inqQuesAnsw1'),
                  )); ?>
                  </div>
                  <h4><?php the_field('inqQuesQues2', $acf_ref);?></h4>
                  <p><?php the_field('inqQuesAnsw2');?></p>
                  <div class="edit_field_2 edit_field">
                  <?php acf_form(array(
                      'fields' => array('inqQuesAnsw2'),
                  )); ?>
                  </div>
                </div>
              </div>
            </div>
            <!-- END CARD TWO -->

            <!-- START CARD THREE -->
            <div class="check_wrap row">
              <div class="col-md-2">
                <div class="slide_wrap">
                  <input type="checkbox" value="None" id="slideThree" name="check" />
                  <label for="slideThree"></label>
                </div>
              </div>
              <div class="edit_button col-md-10">
                <a href="#" id="edit_tab_3" class="pull-right"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>
              </div>
            </div>

            <div class="card" id="card_three">
              <div class="card-header" role="tab" id="headingThree">
                <h3 class="mb-0">
                  <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Difference You Want To Make

                  </a>
                  <a class="add_cross pull-right">+</a>
                </h3>
              </div>
              <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
                <div class="card-block">
                  <h4><?php the_field('diffYouWantToMakeQues1', $acf_ref);?></h4>
                  <p><?php the_field('diffYouWantToMakeAnsw1');?></p>
                  <div class="edit_field_3 edit_field">
                  <?php acf_form(array(
                      'fields' => array('diffYouWantToMakeAnsw1'),
                  )); ?>
                  </div>
                </div>
              </div>
            </div>
            <!-- END CARD THREE -->

            <!-- START CARD FOUR -->
            <div class="check_wrap row">
              <div class="col-md-2">
                <div class="slide_wrap">
                  <input type="checkbox" value="None" id="slideFour" name="check" />
                  <label for="slideFour"></label>
                </div>
              </div>
              <div class="edit_button col-md-10">
                <a href="#" id="edit_tab_4" class="pull-right"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>
              </div>
            </div>

            <div class="card" id="card_four">
              <div class="card-header" role="tab" id="headingFour">
                <h3 class="mb-0">
                  <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    Action Planning

                  </a>
                  <a class="add_cross pull-right">+</a>
                </h3>
              </div>
              <div id="collapseFour" class="collapse" role="tabpanel" aria-labelledby="headingFour">
                <div class="card-block">
                  <h4><?php the_field('actionPlanningQues1', $acf_ref);?></h4>
                  <p><?php the_field('actionPlanningAnsw1');?></p>
                  <div class="edit_field_4 edit_field">
                  <?php acf_form(array(
                      'fields' => array('actionPlanningAnsw1'),
                  )); ?>
                  </div>
                  <h4><?php the_field('actionPlanningQues2', $acf_ref);?></h4>
                  <p><?php the_field('actionPlanningAnsw2');?></p>
                  <div class="edit_field_4 edit_field">
                  <?php acf_form(array(
                      'fields' => array('actionPlanningAnsw2'),
                  )); ?>
                  </div>
                  <h4><?php the_field('actionPlanningQues3', $acf_ref);?></h4>
                  <p><?php the_field('actionPlanningAnsw3');?></p>
                  <div class="edit_field_4 edit_field">
                  <?php acf_form(array(
                      'fields' => array('actionPlanningAnsw3'),
                  )); ?>
                  </div>
                  <h4><?php the_field('actionPlanningQues4', $acf_ref);?></h4>
                  <p><?php the_field('actionPlanningAnsw4');?></p>
                  <div class="edit_field_4 edit_field">
                  <?php acf_form(array(
                      'fields' => array('actionPlanningAnsw4'),
                  )); ?>
                  </div>
                </div>
              </div>
            </div>
            <!-- END CARD FOUR -->

            <!-- START CARD FIVE -->
            <div class="check_wrap row">
              <div class="col-md-2">
                <div class="slide_wrap">
                  <input type="checkbox" value="None" id="slideFive" name="check" />
                  <label for="slideFive"></label>
                </div>
              </div>
              <div class="edit_button col-md-10">
                <a href="#" id="edit_tab_5" class="pull-right"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>
              </div>
            </div>
            <div class="card" id="card_five">
              <div class="card-header" role="tab" id="headingFive">
                <h3 class="mb-0">
                  <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                  Professional Learning and Resources

                  </a>
                  <a class="add_cross pull-right">+</a>
                </h3>
              </div>
              <div id="collapseFive" class="collapse" role="tabpanel" aria-labelledby="headingFive">
                <div class="card-block">
                  <h4><?php the_field('profLearnResQues1', $acf_ref);?></h4>
                  <p><?php the_field('profLearnResAnsw1');?></p>
                  <div class="edit_field_5 edit_field">
                  <?php acf_form(array(
                      'fields' => array('profLearnResAnsw1'),
                  )); ?>
                  </div>
                  <h4><?php the_field('profLearnResQues2', $acf_ref);?></h4>
                  <p><?php the_field('profLearnResAnsw2');?></p>
                  <div class="edit_field_5 edit_field">
                  <?php acf_form(array(
                      'fields' => array('profLearnResAnsw2'),
                  )); ?>
                  </div>

                </div>
              </div>
            </div>
            <!-- END CARD FIVE -->

            <!-- START CARD SIX -->
            <div class="check_wrap row">
              <div class="col-md-2">
                <div class="slide_wrap">
                  <input type="checkbox" value="None" id="slideSix" name="check" />
                  <label for="slideSix"></label>
                </div>
              </div>
              <div class="edit_button col-md-10">
                <a href="#" id="edit_tab_6" class="pull-right"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>
              </div>
            </div>
            <div class="card" id="card_six">
              <div class="card-header" role="tab" id="headingSix">
                <h3 class="mb-0">
                  <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                    Plan For Collecting Data and Looking For Evidence
                  </a>
                  <a class="add_cross pull-right">+</a>
                </h3>
              </div>
              <div id="collapseSix" class="collapse" role="tabpanel" aria-labelledby="headingSix">
                <div class="card-block">
                  <h4><?php the_field('planForCollectingDataQues1', $acf_ref);?></h4>
                  <p><?php the_field('planForCollectingDataAnsw1');?></p>
                  <div class="edit_field_6 edit_field">
                  <?php acf_form(array(
                      'fields' => array('planForCollectingDataAnsw1'),
                  )); ?>
                  </div>
                  <h4><?php the_field('planForCollectingDataQues2', $acf_ref);?></h4>
                  <p><?php the_field('planForCollectingDataAnsw2');?></p>
                  <div class="edit_field_6 edit_field">
                  <?php acf_form(array(
                      'fields' => array('planForCollectingDataAnsw2'),
                  )); ?>
                  </div>
                  <h4><?php the_field('planForCollectingDataQues3', $acf_ref);?></h4>
                  <p><?php the_field('planForCollectingDataAnsw3');?></p>
                  <div class="edit_field_6 edit_field">
                  <?php acf_form(array(
                      'fields' => array('planForCollectingDataAnsw3'),
                  )); ?>
                  </div>

                </div>
              </div>
            </div>
            <!-- END CARD SIX -->

            <!-- START CARD Seven -->
            <div class="check_wrap row">
              <div class="col-md-2">
                <div class="slide_wrap">
                  <input type="checkbox" value="None" id="slideSeven" name="check" />
                  <label for="slideSeven"></label>
                </div>
              </div>
              <div class="edit_button col-md-10">
                <a href="#" id="edit_tab_7" class="pull-right"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>
              </div>
            </div>

            <div class="card" id="card_seven">
              <div class="card-header" role="tab" id="headingSeven">
                <h3 class="mb-0">
                  <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                  Evidence Format

                  </a>
                  <a class="add_cross pull-right">+</a>
                </h3>
              </div>
              <div id="collapseSeven" class="collapse" role="tabpanel" aria-labelledby="headingSeven">
                <div class="card-block">
                  <h4><?php the_field('evidenceFormatQues1', $acf_ref);?></h4>
                  <p><?php the_field('evidenceFormatAnsw1');?></p>
                  <div class="edit_field_7 edit_field">
                  <?php acf_form(array(
                      'fields' => array('evidenceFormatAnsw1'),
                  )); ?>
                  </div>
                  <h4><?php the_field('evidenceFormatQues2', $acf_ref);?></h4>
                  <p><?php the_field('evidenceFormatAnsw2');?></p>
                  <div class="edit_field_7 edit_field">
                  <?php acf_form(array(
                      'fields' => array('evidenceFormatAnsw2'),
                  )); ?>
                  </div>
                  <h4><?php the_field('evidenceFormatQues3', $acf_ref);?></h4>
                  <p><?php the_field('evidenceFormatAnsw3');?></p>
                  <div class="edit_field_7 edit_field">
                  <?php acf_form(array(
                      'fields' => array('evidenceFormatAnsw3'),
                  )); ?>
                  </div>
                </div>
              </div>
            </div>
            <!-- END CARD SEVEN -->

            <!-- START CARD EIGHT -->
            <div class="check_wrap row">
              <div class="col-md-2">
                <div class="slide_wrap">
                  <input type="checkbox" value="None" id="slideEight" name="check" />
                  <label for="slideEight"></label>
                </div>
              </div>
              <div class="edit_button col-md-10">
                <a href="#" id="edit_tab_8" class="pull-right"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>
              </div>
            </div>
            <div class="card" id="card_eight">
              <div class="card-header" role="tab" id="headingEight">
                <h3 class="mb-0">
                  <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                    Instructional Change
                  </a>
                  <a class="add_cross pull-right">+</a>
                </h3>
              </div>
              <div id="collapseEight" class="collapse" role="tabpanel" aria-labelledby="headingEight">
                <div class="card-block">

                  <h4><?php the_field('instChangeQues1', $acf_ref);?></h4>
                  <p><?php the_field('instChangeAnsw1');?></p>
                  <div class="edit_field_8 edit_field">
                  <?php acf_form(array(
                      'fields' => array('instChangeAnsw1'),
                  )); ?>
                  </div>
                </div>
              </div>
            </div>
            <!-- END CARD EIGHT -->
            <!-- START CARD NINE -->

            <div class="check_wrap row">
              <div class="col-md-2">
                <div class="slide_wrap">
                  <input type="checkbox" value="None" id="slideNine" name="check" />
                  <label for="slideNine"></label>
                </div>
              </div>
              <div class="edit_button col-md-10">
                <a href="#" id="edit_tab_9" class="pull-right"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>
              </div>
            </div>
            <div class="card" id="card_nine">
              <div class="card-header" role="tab" id="headingNine">
                <h3 class="mb-0">
                  <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                    Logistics
                  </a>
                  <a class="add_cross pull-right">+</a>
                </h3>
              </div>
              <div id="collapseNine" class="collapse" role="tabpanel" aria-labelledby="headingNine">
                <div class="card-block">

                  <h4><?php the_field('logisticsQues1', $acf_ref);?></h4>
                  <p><?php the_field('logisticsAnsw1');?></p>
                  <div class="edit_field_9 edit_field">
                  <?php acf_form(array(
                      'fields' => array('logisticsAnsw1'),
                  )); ?>
                  </div>
                  <h4><?php the_field('logisticsQues2', $acf_ref);?></h4>
                  <p><?php the_field('logisticsAnsw2');?></p>
                  <div class="edit_field_9 edit_field">
                  <?php acf_form(array(
                      'fields' => array('logisticsAnsw2'),
                  )); ?>
                  </div>
                </div>
              </div>
            </div>
            <!-- END CARD Nine -->

          </div>
          <!-- END ACCORDION -->
        <?php endwhile; ?>
  <?php endif; ?>

	<!-- END ROW -->

</div> <!-- END CONTAINER -->


</div>
<?php get_footer(); ?>
