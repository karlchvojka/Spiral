<?php
if ( ( is_user_logged_in() && $current_user->ID == $post->post_author ) ) { // Execute code if user is logged in or user is the author
    acf_form_head();
    wp_deregister_style( 'wp-admin' );
}
get_header();

?>


<div class="container">



    <?php if (have_posts()) : ?>
      <?php while (have_posts()) : the_post(); ?>

        <div class="row inquiry_header">
          <p>
            single_rounds.php
          </p>
      		<div class="col-md-6">
      			<h2 id="inq_page">Round Title: <?php the_title(); ?></h2>
      		</div>
      		<div class="col-md-6">

           <button class="print_button pull-right" onclick="printreportbutton()"><i class="fa fa-print" aria-hidden="true"></i> Print Report</button>

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
                <h5 class="mb-0">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                    Team Setup
                  </a>
                  <a class="pull-right">+</a>
                </h5>
              </div>

              <div id="collapseOne" class="collapse in" role="tabpanel" aria-labelledby="headingOne">
                <div class="card-block">
                  <h4><?php the_field('step_1_ques_1', 53);?></h4>
                  <p><?php the_field('step_1_answ_1');?></p>
                  <h4><?php the_field('step_1_ques_2', 53);?></h4>
                  <p><?php the_field('step_1_answ_2');?></p>
                  <h4><?php get_field('step_1_ques_3', 53);?></h4>
                  <p><?php the_field('step_1_answ_3'); ?></p>
                </div>
              </div>
            </div>
            <!-- END CARD ONE -->

            <!-- START CARD TWO -->
            <div class="card">
              <div class="card-header" role="tab" id="headingTwo">
                <h3 class="mb-0">
                  <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Plan : Determine a Focus
                  </a>
                  <a class="pull-right">+</a>
                </h3>
              </div>
              <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                <div class="card-block">
                  <h4><?php the_field('step_3_ques_1', 53);?></h4>
                  <p><?php the_field('step_3_answ_1');?></p>
                  <h4><?php the_field('step_3_ques_2', 53);?></h4>
                  <p><?php the_field('step_3_answ_2');?></p>
                  <h4><?php the_field('step_4_ques_1', 53);?></h4>
                  <p><?php the_field('step_4_answ_1');?></p>
                  <h4><?php the_field('step_4_ques_2', 53);?></h4>
                  <p><?php the_field('step_4_answ_2');?></p>
                </div>
              </div>
            </div>
            <!-- END CARD TWO -->

            <!-- START CARD THREE -->
            <div class="card">
              <div class="card-header" role="tab" id="headingThree">
                <h3 class="mb-0">
                  <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Plan: Action Planning

                  </a>
                  <a class="pull-right">+</a>
                </h3>
              </div>
              <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
                <div class="card-block">
                  <h4><?php the_field('step_5_ques_1', 53);?></h4>
                  <p><?php the_field('step_5_answ_1');?></p>
                  <h4><?php the_field('step_6_ques_1', 53);?></h4>
                  <p><?php the_field('step_6_answ_1');?></p>
                  <h4><?php the_field('step_6_ques_2', 53);?></h4>
                  <p><?php the_field('step_6_answ_2');?></p>
                  <h4><?php the_field('step_7_ques_1', 53);?></h4>
                  <p><?php the_field('step_7_answ_1');?></p>
                  <h4><?php the_field('step_7_ques_2', 53);?></h4>
                  <p><?php the_field('step_7_answ_2');?></p>
                </div>
              </div>
            </div>
            <!-- END CARD THREE -->

            <!-- START CARD FOUR -->
            <div class="card">
              <div class="card-header" role="tab" id="headingFour">
                <h3 class="mb-0">
                  <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    Plan: Professional Learning And Resources

                  </a>
                  <a class="pull-right">+</a>
                </h3>
              </div>
              <div id="collapseFour" class="collapse" role="tabpanel" aria-labelledby="headingFour">
                <div class="card-block">
                  <h4><?php the_field('step_8_ques_1', 53);?></h4>
                  <p><?php the_field('step_8_answ_1');?></p>
                  <h4><?php the_field('step_8_ques_2', 53);?></h4>
                  <p><?php the_field('step_8_answ_2');?></p>
                </div>
              </div>
            </div>
            <!-- END CARD FOUR -->

            <!-- START CARD FIVE -->
            <div class="card">
              <div class="card-header" role="tab" id="headingFive">
                <h3 class="mb-0">
                  <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                   Plan: Planning for collecting data and looking for evidence

                  </a>
                  <a class="pull-right">+</a>
                </h3>
              </div>
              <div id="collapseFive" class="collapse" role="tabpanel" aria-labelledby="headingFive">
                <div class="card-block">
                  <h4><?php the_field('step_9_ques_1', 53);?></h4>
                  <p><?php the_field('step_9_answ_1');?></p>
                  <h4><?php the_field('step_9_ques_2', 53);?></h4>
                  <p><?php the_field('step_9_answ_2');?></p>
                  <h4><?php the_field('step_9_ques_3', 53);?></h4>
                  <p><?php the_field('step_9_answ_3');?></p>
                </div>
              </div>
            </div>
            <!-- END CARD FIVE -->

            <!-- START CARD SIX -->
            <div class="card">
              <div class="card-header" role="tab" id="headingSix">
                <h3 class="mb-0">
                  <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                    Plan: Format

                  </a>
                  <a class="pull-right">+</a>
                </h3>
              </div>
              <div id="collapseSix" class="collapse" role="tabpanel" aria-labelledby="headingSix">
                <div class="card-block">
                  <h4><?php the_field('step_10_ques_1', 53);?></h4>
                  <p><?php the_field('step_10_answ_1');?></p>
                  <h4><?php the_field('step_10_ques_2', 53);?></h4>
                  <p><?php the_field('step_10_answ_2');?></p>
                  <h4><?php the_field('step_10_ques_3', 53);?></h4>
                  <p><?php the_field('step_10_answ_3');?></p>

                </div>
              </div>
            </div>
            <!-- END CARD SIX -->

            <!-- START CARD Seven -->
            <div class="card">
              <div class="card-header" role="tab" id="headingSeven">
                <h3 class="mb-0">
                  <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                    Plan: Instructional Change

                  </a>
                  <a class="pull-right">+</a>
                </h3>
              </div>
              <div id="collapseSeven" class="collapse" role="tabpanel" aria-labelledby="headingSeven">
                <div class="card-block">
                  <h4><?php the_field('step_12_ques_1', 53);?></h4>
                  <p><?php the_field('step_12_answ_1');?></p>
                </div>
              </div>
            </div>
            <!-- END CARD SEVEN -->
            <!-- START CARD EIGHT -->
            <div class="card">
              <div class="card-header" role="tab" id="headingEight">
                <h3 class="mb-0">
                  <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                    Plan: Logistics
                  </a>
                  <a class="pull-right">+</a>
                </h3>
              </div>
              <div id="collapseEight" class="collapse" role="tabpanel" aria-labelledby="headingEight">
                <div class="card-block">

                  <h4><?php the_field('step_13_ques_1', 53);?></h4>
                  <p><?php the_field('step_13_answ_1');?></p>
                  <h4><?php the_field('step_13_ques_2', 53);?></h4>
                  <p><?php the_field('step_13_answ_2');?></p>

                </div>
              </div>
            </div>
            <!-- END CARD EIGHT -->
          </div>
          <!-- END ACCORDION -->
        <?php endwhile; ?>
  <?php endif; ?>

	<!-- END ROW -->

</div> <!-- END CONTAINER -->


</div>
<?php get_footer(); ?>
