<?php
if ( ( is_user_logged_in() && $current_user->ID == $post->post_author ) ) { // Execute code if user is logged in or user is the author
    acf_form_head();
    wp_deregister_style( 'wp-admin' );
}
get_header();

?>

<div class="row">

  <div class="col-md-8">

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

        <?php //echo wp_get_post_parent_id( get_the_ID() ); ?>


        <?php
        echo "ID:".get_the_ID();
        $var = get_post_meta(get_the_ID(), "GroupID");

        echo "Group ID:" . $var;
        var_dump($var);

          /* Show the edit button to the post author only */
          if ( ( is_user_logged_in() && $current_user->ID == $post->post_author ) ) { ?>
          <a class='post-edit-button' href="<?php echo get_permalink() ?>?action=edit">Edit Post</a>
          <?php }
            if (isset($_GET['action'])) {
                if($_GET['action'] == 'edit') { ?>
                    <div class="acf-edit-post">
                      <?php
                          if ( ( is_user_logged_in() && $current_user->ID == $post->post_author ) ) {
                              echo "<div class='acf-edit-post'>";
                                  acf_form (array(
                                      'field_groups' => array(144), // Same ID(s) used before
                                      'form' => true,
                                      'return' => '%post_url%',
                                      'submit_value' => 'Save Changes',
                                      'post_title' => false,
                                      'post_content' => false,
                                  ));
                              echo "</div>";
                          }
                      ?>
                    </div>
                <?php }
            }
        ?>
  <h1><?php the_field('project_name'); ?></h1>

			<?php endwhile; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

</div>

<div class="col-md-4">

</div>

</div>
<?php get_footer(); ?>
