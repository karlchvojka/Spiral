<?php
/*
Template Name: Home Page
*/
?>

<?php
$postTitleError = '';

if ( isset( $_POST['submit'] ) ) {

    if ( trim( $_POST['title'] ) === '' ) {
        $postTitleError = 'Please enter a title.';
        $hasError = true;
    }

}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title><?php bloginfo('name');?></title>
<!-- CSS INCLUDES -->

<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/bootstrap-theme.css" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/buddypress.min.css" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="<?php bloginfo('template_url')?>/js/bootstrap.min.js" type="text/javascript"></script>
<script src="https://use.fontawesome.com/c674cc7c17.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/form.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>

<!-- FORM JS STUFFS -->
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

<script src="<?php bloginfo('template_url');?>/js/bootstrap.min.js"></script>
<script src="<?php bloginfo('template_url');?>/js/jquery.bootstrap.wizard.js"></script>
<script src="<?php bloginfo('template_url');?>/js/prettify.js"></script>
<script>
$(document).ready(function() {
  	$('#rootwizard').bootstrapWizard({onNext: function(tab, navigation, index) {
			if(index==1) {
				// Make sure we entered the name
				if(!$('#step_1_answ_1').val()) {
					alert('You must enter a Project name');
					$('#step_1_answ_1').focus();
					return false;
				}
			}


		}, onTabShow: function(tab, navigation, index) {
			var $total = navigation.find('li').length;
			var $current = index+1;
			var $percent = ($current/$total) * 100;
			$('#rootwizard .progress-bar').css({width:$percent+'%'});
		}});
});</script>
<style type="text/css">
    /* show the move cursor as the user moves the mouse over the panel header.*/
    #draggablePanelList .panel-heading {
        cursor: move;
    }
</style>
<script>
jQuery(function($) {
        var panelList = $('#accordion');
        panelList.sortable({
            // Only make the .panel-heading child elements support dragging.
            // Omit this to make then entire <li>...</li> draggable.
            handle: '.card-header',
            update: function() {
                $('.card', panelList).each(function(index, elem) {
                     var $listItem = $(elem),
                         newIndex = $listItem.index();

                     // Persist the new indices.
                });
            }
        });
    });
</script>

<!-- END CSS INCLUDES -->

<!-- JS INCLUDES -->
<!-- END JS INCLUDES -->

<!-- JQ INCLUDES -->
<!-- END JQ INCLUDES -->

</head>

<body>
	<div class="container header_wrap">
		<div class="row">
        <div class="col-sm-10 col-sm-offset-1 hid">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-4 text-center">
									<a class="home_logo pull-center" href="<?php echo home_url(); ?>">
						          <img src="<?php bloginfo('template_url'); ?>/images/logo.jpg" />
						      </a>
                </div>
            </div>
        </div>
    </div>
	</div>




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
