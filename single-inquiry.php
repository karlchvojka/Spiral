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
      		<div class="col-md-6">
      			<h2 id="inq_page">Planning Stage: <?php the_title(); ?></h2>
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
                <h3 class="mb-0">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                    Determine A Focus
                  </a>
                  <a class="add_cross pull-right">+</a>
                </h3>
              </div>

              <div id="collapseOne" class="collapse in" role="tabpanel" aria-labelledby="headingOne">
                <div class="card-block">
                  <h4><?php the_field('detFocusQues1', 53);?></h4>
                  <p><?php the_field('detFocusAnsw1');?></p>
                  <h4><?php the_field('detFocusQues2', 53);?></h4>
                  <p><?php the_field('detFocusAnsw2');?></p>
                </div>
              </div>
            </div>
            <!-- END CARD ONE -->

            <!-- START CARD TWO -->
            <div class="card">
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
                  <h4><?php the_field('inqQuesQues1', 53);?></h4>
                  <p><?php the_field('inqQuesAnsw1');?></p>
                  <h4><?php the_field('inqQuesQues2', 53);?></h4>
                  <p><?php the_field('inqQuesAnsw2');?></p>
                </div>
              </div>
            </div>
            <!-- END CARD TWO -->

            <!-- START CARD THREE -->
            <div class="card">
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
                  <h4><?php the_field('diffYouWantToMakeQues1', 53);?></h4>
                  <p><?php the_field('diffYouWantToMakeAnsw1');?></p>
                </div>
              </div>
            </div>
            <!-- END CARD THREE -->

            <!-- START CARD FOUR -->
            <div class="card">
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
                  <h4><?php the_field('actionPlanningQues1', 53);?></h4>
                  <p><?php the_field('actionPlanningAnsw1');?></p>
                  <h4><?php the_field('actionPlanningQues2', 53);?></h4>
                  <p><?php the_field('actionPlanningAnsw2');?></p>
                  <h4><?php the_field('actionPlanningQues3', 53);?></h4>
                  <p><?php the_field('actionPlanningAnsw3');?></p>
                  <h4><?php the_field('actionPlanningQues4', 53);?></h4>
                  <p><?php the_field('actionPlanningAnsw4');?></p>
                </div>
              </div>
            </div>
            <!-- END CARD FOUR -->

            <!-- START CARD FIVE -->
            <div class="card">
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
                  <h4><?php the_field('profLearnResQues1', 53);?></h4>
                  <p><?php the_field('profLearnResAnsw1');?></p>
                  <h4><?php the_field('profLearnResQues2', 53);?></h4>
                  <p><?php the_field('profLearnResAnsw2');?></p>

                </div>
              </div>
            </div>
            <!-- END CARD FIVE -->

            <!-- START CARD SIX -->
            <div class="card">
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
                  <h4><?php the_field('planForCollectingDataQues1', 53);?></h4>
                  <p><?php the_field('planForCollectingDataAnsw1');?></p>
                  <h4><?php the_field('planForCollectingDataQues2', 53);?></h4>
                  <p><?php the_field('planForCollectingDataAnsw2');?></p>
                  <h4><?php the_field('planForCollectingDataQues3', 53);?></h4>
                  <p><?php the_field('planForCollectingDataAnsw3');?></p>

                </div>
              </div>
            </div>
            <!-- END CARD SIX -->

            <!-- START CARD Seven -->
            <div class="card">
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
                  <h4><?php the_field('evidenceFormatQues1', 53);?></h4>
                  <p><?php the_field('evidenceFormatAnsw1');?></p>
                  <h4><?php the_field('evidenceFormatQues2', 53);?></h4>
                  <p><?php the_field('evidenceFormatAnsw2');?></p>
                  <h4><?php the_field('evidenceFormatQues3', 53);?></h4>
                  <p><?php the_field('evidenceFormatAnsw3');?></p>
                </div>
              </div>
            </div>
            <!-- END CARD SEVEN -->
            <!-- START CARD EIGHT -->
            <div class="card">
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

                  <h4><?php the_field('instChangeQues1', 53);?></h4>
                  <p><?php the_field('instChangeAnsw1');?></p>
                </div>
              </div>
            </div>
            <!-- END CARD EIGHT -->
            <!-- START CARD NINE -->
            <div class="card">
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

                  <h4><?php the_field('logisticsQues1', 53);?></h4>
                  <p><?php the_field('logisticsAnsw1');?></p>
                  <h4><?php the_field('logisticsQues2', 53);?></h4>
                  <p><?php the_field('logisticsAnsw2');?></p>
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
