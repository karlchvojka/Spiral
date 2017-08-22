<?php get_header(); ?>

<!-- WRAP SITE -->
<div id="site_wrap">

    <!-- WRAP CONTENT -->
    <div id="content_wrap" class="container">


			<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
				<div class="post">
					<h1 class="page-title"><?php the_title(); ?></h1>
					<?php the_content(); ?>
				</div>

			<?php endwhile; ?>

			<?php endif; ?>

    </div>
	</div>
    <!-- END WRAP CONTENT -->

</div>
<!-- END WRAP SITE -->

<?php get_footer(); ?>
