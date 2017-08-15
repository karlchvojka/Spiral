<?php get_header(); ?>

<!-- WRAP SITE -->
<div id="site_wrap">

	<!-- WRAP HEADER -->
	<div id="header_wrap">
    </div>
    <!-- END WRAP HEADER -->

    <!-- WRAP CONTENT -->
    <div id="content_wrap">
			<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
				<div class="post">
					<h1><?php the_title(); ?></h1>
					<p><?php the_content(); ?></p>
				</div>

			<?php endwhile; ?>

			<?php endif; ?>

    </div>

    <!-- END WRAP CONTENT -->

    <!-- WRAP FOOTER -->
    <div id="footer_wrap">
    </div>
    <!-- END WRAP FOOTER -->

</div>
<!-- END WRAP SITE -->

<?php get_footer(); ?>
