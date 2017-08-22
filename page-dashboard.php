<?php
/*
Template Name: Dashboard Page
*/
get_header(); ?>

<!-- WRAP SITE -->
<div id="site_wrap">

    <!-- WRAP CONTENT -->
		<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
		<div class="container">
		  <div class="row">
		    <div class="col-md-8">
					<?php
						$current_user = wp_get_current_user();
						if (0 == $current_user->ID) {
							//not logged in
						} else {
							echo '<h1>Welcome ' . $current_user->user_firstname . '</h1>';
						}
					?>
  				<p><?php the_content(); ?></p>
					<?php the_field('video_link'); ?>
		    </div>
			<div class="col-md-4">
				<?php get_sidebar('sidebar-1'); ?>
			</div>
		</div>


		<?php endwhile; ?>

		<?php endif; ?>

    <!-- END WRAP CONTENT -->


<?php get_footer(); ?>
