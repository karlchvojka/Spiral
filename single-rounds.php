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
      			<h2 id="inq_page">Round Title: <?php the_title(); ?></h2>
      		</div>
      		<div class="col-md-6">
            <?php
						//$group_id = get_the_ID();
						//$meta = get_post_meta( $group_id, $meta_key = '');
						//print_r($meta);
							?>
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
                    Learning from Last round
                  </a>
                  <a class="add_cross pull-right">+</a>
                </h3>
              </div>

              <div id="collapseOne" class="collapse in" role="tabpanel" aria-labelledby="headingOne">
                <div class="card-block">
                  <h4><?php the_field('learningfromlastroundques1', 53);?></h4>
                  <p>If Yes:</p>
                  <h4><?php the_field('learningFromLastRoundQues1Yes', 53);?></h4>
                  <p><?php the_field('llearningFromLastRoundAnsw1Yes');?></p>
                  <p>If No:</p>
                  <h4><?php the_field('learningFromLastRoundQues1No1', 53);?></h4>
                  <p><?php the_field('learningFromLastRoundAnsw1No1');?></p>
                  <h4><?php get_field('learningFromLastRoundQues1No2', 53);?></h4>
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
                    Learning from Round {round #}: Surprise Learning
                  </a>
                  <a class="add_cross pull-right">+</a>
                </h3>
              </div>
              <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                <div class="card-block">
                  <h4><?php the_field('learningFromRoundSurpriseLearningSectionQues1', 53);?></h4>
                  <p><?php the_field('learningFromRoundSurpriseLearningSectionAnsw1');?></p>
                  <h4><?php the_field('learningFromRoundSurpriseLearningSectionQues2', 53);?></h4>
                  <p><?php the_field('learningFromRoundSurpriseLearningSectionAnsw2');?></p>
                  <h4><?php the_field('learningFromRoundSurpriseLearningSectionQues3', 53);?></h4>
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
                    Learning from Round {round #}: Evidence

                  </a>
                  <a class="add_cross pull-right">+</a>
                </h3>
              </div>
              <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
                <div class="card-block">
                  <h4><?php the_field('learningFromRoundEvidenceQues1', 53);?></h4>
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
                    Learning from Round {round #}
                  </a>
                  <a class="add_cross pull-right">+</a>
                </h3>
              </div>
              <div id="collapseFour" class="collapse" role="tabpanel" aria-labelledby="headingFour">
                <div class="card-block">
                  <h4><?php the_field('learningFromRoundEvidenceQues2', 53);?></h4>
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
                  Learning from Round {round #}

                  </a>
                  <a class="add_cross pull-right">+</a>
                </h3>
              </div>
              <div id="collapseFive" class="collapse" role="tabpanel" aria-labelledby="headingFive">
                <div class="card-block">
                  <h4><?php the_field('learningFromRoundEvidenceQues3', 53);?></h4>
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
                  <h4><?php the_field('processQues1', 53);?></h4>
                  <p><?php the_field('processAnsw1');?></p>
                  <h4><?php the_field('processQues2', 53);?></h4>
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
                  <h4><?php the_field('closingInquiryQues1', 53);?></h4>
                  <p><?php the_field('closingInquiryAnsw1');?></p>
                  <h4><?php the_field('closingInquiryQues2', 53);?></h4>
                  <p><?php the_field('closingInquiryAnsw2');?></p>
                  <h4><?php the_field('closingInquiryQues3', 53);?></h4>
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
