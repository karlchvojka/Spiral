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
</style>


<div class="container">

    <?php if (have_posts()) : ?>
      <?php while (have_posts()) : the_post(); ?>
        <?php
        // ARGS FOR FOLLOWING LOOPS
        $post_id = get_the_ID();
        $parent_id = get_post_meta($post_id, $meta_key = 'GroupID');
        $asgs = array (
          'group_id' => $parent_id
        );
          ?>

        <div class="row inquiry_header">
          <div class="col-md-6">
            <h2 id="inq_page">Round Title: <?php the_title(); ?></h2>
            <?php
            //ARGS FOR THE GROUP LOOP
            $args = array(
            'include' => $parent_id,
            'max' => 1
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
              if ( bp_group_has_members($asgs) ) : ?>
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

           <button class="print_button pull-right" onclick="printreportbutton()"><i class="fa fa-print" aria-hidden="true"></i> Print Report</button>
           <button onclick="javascript:window.open('','_self').close();" class="print_button pull-right" />Go Back</button>
      		</div>

      	</div>

        <div class="row">

          <div id="accordion" role="tablist" aria-multiselectable="true" class="col-md-12">
            <!-- CARD ONE -->

            <!--<div class="card">
               <div class="card-header" role="tab" id="headingOne">
                <h5 class="mb-0">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Collapsible Group Item #1
                  </a>
                </h5>
              </div>

              <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                <div class="card-block">
                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
              </div>
            </div>-->
            <div class="card">
              <div class="card-header" role="tab" id="headingOne"  data-toggle="collapse" data-parent="#accordion" data-target="#collapseOne">
                <h3 class="mb-0">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                    Learning from This round
                  </a>
                  <a class="add_cross pull-right">+</a>
                </h3>
              </div>

              <div id="collapseOne" class="collapse in" role="tabpanel" aria-labelledby="headingOne">
                <div class="card-block">
                  <h4><?php the_field('learningfromlastroundques1', $acf_ref);?></h4>
                  <p>If Yes:</p>
                  <h4><?php the_field('learningFromLastRoundQues1Yes', $acf_ref);?></h4>
                  <p><?php the_field('llearningFromLastRoundAnsw1Yes');?></p>
                  <p>If No:</p>
                  <h4><?php the_field('learningFromLastRoundQues1No1', $acf_ref);?></h4>
                  <p><?php the_field('learningFromLastRoundAnsw1No1');?></p>
                  <h4><?php get_field('learningFromLastRoundQues1No2', $acf_ref);?></h4>
                  <p><?php the_field('learningFromLastRoundAnsw1No2'); ?></p>
                </div>
              </div>
            </div>
            <!-- END CARD ONE -->

            <!-- START CARD TWO -->
            <div class="card">
              <div class="card-header" role="tab" id="headingTwo">
                <h3 class="mb-0">
                  <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Learning from this Round: Surprise Learning
                  </a>
                  <a class="add_cross pull-right">+</a>
                </h3>
              </div>
              <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                <div class="card-block">
                  <h4><?php the_field('learningFromRoundSurpriseLearningSectionQues1', $acf_ref);?></h4>
                  <p><?php the_field('learningFromRoundSurpriseLearningSectionAnsw1');?></p>
                  <h4><?php the_field('learningFromRoundSurpriseLearningSectionQues2', $acf_ref);?></h4>
                  <p><?php the_field('learningFromRoundSurpriseLearningSectionAnsw2');?></p>
                  <h4><?php the_field('learningFromRoundSurpriseLearningSectionQues3', $acf_ref);?></h4>
                  <p><?php the_field('learningFromRoundSurpriseLearningSectionAnsw3');?></p>

                </div>
              </div>
            </div>
            <!-- END CARD TWO -->

            <!-- START CARD THREE -->
            <div class="card">
              <div class="card-header" role="tab" id="headingThree">
                <h3 class="mb-0">
                  <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Learning from this Round: Evidence

                  </a>
                  <a class="add_cross pull-right">+</a>
                </h3>
              </div>
              <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
                <div class="card-block">
                  <h4><?php the_field('learningFromRoundEvidenceQues1', $acf_ref);?></h4>
                  <p><?php the_field('learningFromRoundEvidenceAnsw1');?></p>
                </div>
              </div>
            </div>
            <!-- END CARD THREE -->

            <!-- START CARD FOUR -->
            <div class="card">
              <div class="card-header" role="tab" id="headingFour">
                <h3 class="mb-0">
                  <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    Learning from this Round: Evidence
                  </a>
                  <a class="add_cross pull-right">+</a>
                </h3>
              </div>
              <div id="collapseFour" class="collapse" role="tabpanel" aria-labelledby="headingFour">
                <div class="card-block">
                  <h4><?php the_field('learningFromRoundEvidenceQues2', $acf_ref);?></h4>
                  <p><?php the_field('learningFromRoundEvidenceAnsw2');?></p>
                </div>
              </div>
            </div>
            <!-- END CARD FOUR -->

            <!-- START CARD FIVE -->
            <div class="card">
              <div class="card-header" role="tab" id="headingFive">
                <h3 class="mb-0">
                  <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                  Learning from this Round: Evidence

                  </a>
                  <a class="add_cross pull-right">+</a>
                </h3>
              </div>
              <div id="collapseFive" class="collapse" role="tabpanel" aria-labelledby="headingFive">
                <div class="card-block">
                  <h4><?php the_field('learningFromRoundEvidenceQues3', $acf_ref);?></h4>
                  <p><?php the_field('learningFromRoundEvidenceAnsw3');?></p>
                </div>
              </div>
            </div>
            <!-- END CARD FIVE -->

            <!-- START CARD SIX -->
            <div class="card">
              <div class="card-header" role="tab" id="headingSix">
                <h3 class="mb-0">
                  <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                  Process

                  </a>
                  <a class="add_cross pull-right">+</a>
                </h3>
              </div>
              <div id="collapseSix" class="collapse" role="tabpanel" aria-labelledby="headingSix">
                <div class="card-block">
                  <h4><?php the_field('processQues1', $acf_ref);?></h4>
                  <p><?php the_field('processAnsw1');?></p>
                  <h4><?php the_field('processQues2', $acf_ref);?></h4>
                  <p><?php the_field('processAnsw2');?></p>

                </div>
              </div>
            </div>
            <!-- END CARD SIX -->

            <!-- START CARD Seven -->
            <div class="card">
              <div class="card-header" role="tab" id="headingSeven">
                <h3 class="mb-0">
                  <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                    Closing Inquiry

                  </a>
                  <a class="add_cross pull-right">+</a>
                </h3>
              </div>
              <div id="collapseSeven" class="collapse" role="tabpanel" aria-labelledby="headingSeven">
                <div class="card-block">
                  <h4><?php the_field('closingInquiryQues1', $acf_ref);?></h4>
                  <p><?php the_field('closingInquiryAnsw1');?></p>
                  <h4><?php the_field('closingInquiryQues2', $acf_ref);?></h4>
                  <p><?php the_field('closingInquiryAnsw2');?></p>
                  <h4><?php the_field('closingInquiryQues3', $acf_ref);?></h4>
                  <p><?php the_field('closingInquiryAnsw3');?></p>
                </div>
              </div>
            </div>
            <!-- END CARD SEVEN -->

          </div>
          <!-- END ACCORDION -->
        <?php endwhile; ?>
  <?php endif; ?>

	<!-- END ROW -->

</div> <!-- END CONTAINER -->


</div>
<?php get_footer(); ?>
