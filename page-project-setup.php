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
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.js"></script>
<style type="text/css">
#new_post fieldset:not(:first-of-type) {
display: none;
}
</style>

<div class="container">


		<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<h1><?php the_title(); ?></h1>
			<?php endwhile; ?>
			<?php wp_reset_query(); ?>
					<div class="row">
						<div class="col-md-6">

						</div>
					  <div class="progress col-md-6">
					    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
					  </div>
				  <div class="alert alert-success hide"></div>
					</div>

				<form id="new_post" name="new_post" method="post" action="">
					<fieldset>
						<div class="col-md-6">
						</div>
						<div class="col-md-6">
							<input type="text" id="title" value="" tabindex="1" size="20" name="title" />
							<input type="text" id="project_name" value="" tabindex="1" size="20" name="project_name" />
							</p>
						</div>
							<input type="button" class="next-form btn btn-info" value="Next" />
			    </fieldset>
					<fieldset>
						part 2
						<input type="button" name="previous" class="previous-form btn btn-default" value="Previous" />
			      <input type="button" name="next" class="next-form btn btn-info" value="Next" />
			    </fieldset>
					<fieldset>
						part 2
						<input type="button" name="previous" class="previous-form btn btn-default" value="Previous" />
			      <input type="submit" name="submit" class="submit btn btn-success" value="Submit" />
			    </fieldset>


				<input type="hidden" name="action" value="new_post" />
				<?php wp_nonce_field( 'new-post' ); ?>
				</form>
				</div>
				<?php

				if( isset($_POST['submit']) ){

				    // Do some minor form validation to make sure there is content
				    if (isset ($_POST['title'])) {
				        $title =  $_POST['title'];
				    } else {
				        echo 'Please enter a  title';
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



<?php get_footer(); ?>
