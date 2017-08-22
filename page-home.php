<?php
/*
Template Name: Home Page
*/
get_header(); ?>

<!-- WRAP SITE -->
<div id="site_wrap">

    <!-- WRAP CONTENT -->
		<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
		<div class="container">
		  <div class="row">
		    <div class="col-md-12">
  				<p><?php the_content(); ?></p>
		    </div>
		  </div>
			<div class="row">
				<div class="col-md-6">
					<a class="btn reg-button" href="<?php echo site_url('/wp-login.php?action=register');?>">Signup</a>
				</div>
				<div class="col-md-6">
					<a class="btn login-button" href="<?php echo wp_login_url(); ?>" title="Login">Login</a>
				</div>
			</div>
		</div>


		<?php endwhile; ?>

		<?php endif; ?>

    <!-- END WRAP CONTENT -->


<?php get_footer(); ?>
