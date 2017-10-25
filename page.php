<?php

get_header(); ?>

<!-- WRAP SITE -->
<div id="site_wrap">

    <!-- WRAP CONTENT -->
		<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
		<div class="container">
		  <div class="row">
		    <div class="col-md-6">
					<h1><?php the_title(); ?></h1>
  				<p><?php the_content(); ?></p>
		    </div>
		    <div class="col-md-6"> </div>
		  </div>
		</div>


		<?php endwhile; ?>

		<?php endif; ?>

    <!-- END WRAP CONTENT -->


<?php get_footer(); ?>
