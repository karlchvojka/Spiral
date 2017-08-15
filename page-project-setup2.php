<?php
/* Template Name: Project Setup 2*/
function my_kses_post( $value ) {
	// is array
	if( is_array($value) ) {
		return array_map('my_kses_post', $value);
	}
	// return
	return wp_kses_post( $value );
}
add_filter('acf/update_value', 'my_kses_post', 10, 1);
if ( is_user_logged_in() || current_user_can('publish_posts') ) { // Execute code if user is logged in
    acf_form_head();
    wp_deregister_style( 'wp-admin' );
}
get_header();
?>

<div class="row">

	<div class="col-md-6">

		<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<h1><?php the_title(); ?></h1>



			<?php endwhile; ?>


	</div>

	<div class="col-md-12">
		<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

			<?php endwhile; ?>

			<form id="test-form" action="">
			  <input type="text" name="input-test" value="<?php the_field('project_name'); ?>">
			  <input type="submit" value="Update">
			</form>

	</div>

</div>




<?php get_footer(); ?>
