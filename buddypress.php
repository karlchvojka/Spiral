<?php
acf_form_head();
get_header(); ?>

<!-- WRAP SITE -->
<div id="site_wrap">

			<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
					<?php the_content(); ?>

			<?php endwhile; ?>

			<?php endif; ?>
</div>
<!-- END WRAP SITE -->

<?php get_footer(); ?>
