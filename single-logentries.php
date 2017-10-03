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
      			<h2 id="inq_page">Inquiry Log Title: <?php the_title(); ?></h2>
      		</div>
          <div class="col-md-6">
            <button onclick="window.history.go(-1); return false;" class="print_button pull-right" />Go Back</button>
            <button class="print_button pull-right" onclick="printreportbutton()"><i class="fa fa-print" aria-hidden="true"></i> Print Report</button>

      		</div>

      	</div>


        <div class="log_wrapper row">
        <h3>Description:</h3>
        <?php the_content();?>
          <!-- END ACCORDION -->
        <?php endwhile; ?>
          <?php endif; ?>

        	<!-- END ROW -->

        </div> <!-- END CONTAINER -->


</div>
<?php get_footer(); ?>
