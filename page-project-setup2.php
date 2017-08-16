<?php
/* Template Name: Project Setup 2*/

get_header();
?>
<script>
$(document).ready(function() {
  	$('#rootwizard').bootstrapWizard({onNext: function(tab, navigation, index) {
			if(index==2) {
				// Make sure we entered the name
				if(!$('#name').val()) {
					alert('You must enter your name');
					$('#name').focus();
					return false;
				}
			}

			// Set the name for the next tab
			$('#tab3').html('Hello, ' + $('#name').val());

		}, onTabShow: function(tab, navigation, index) {
			var $total = navigation.find('li').length;
			var $current = index+1;
			var $percent = ($current/$total) * 100;
			$('#rootwizard .progress-bar').css({width:$percent+'%'});
		}});
});</script>
<div id="rootwizard">
	<div class="navbar">
	  <div class="navbar-inner">
	    <div class="container">
	<ul style="position:absolute; top:90000px;">
	  	<li><a href="#tab1" data-toggle="tab">First</a></li>
		<li><a href="#tab2" data-toggle="tab">Second</a></li>
		<li><a href="#tab3" data-toggle="tab">Third</a></li>
		<li><a href="#tab4" data-toggle="tab">Forth</a></li>
		<li><a href="#tab5" data-toggle="tab">Fifth</a></li>
		<li><a href="#tab6" data-toggle="tab">Sixth</a></li>
		<li><a href="#tab7" data-toggle="tab">Seventh</a></li>
	</ul>
	 </div>
	  </div>
	</div>
	<div id="bar" class="progress">
      <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
    </div>
	<div class="tab-content">
	    <div class="tab-pane" id="tab1">
	      1
	    </div>
	    <div class="tab-pane" id="tab2">
	      	<p>
		      	<input type='text' name='name' id='name' placeholder='Enter Your Name'>
		      </p>
	    </div>
		<div class="tab-pane" id="tab3">
			3
	    </div>
		<div class="tab-pane" id="tab4">
			4
	    </div>
		<div class="tab-pane" id="tab5">
			5
	    </div>
		<div class="tab-pane" id="tab6">
			6
	    </div>
		<div class="tab-pane" id="tab7">
			7
	    </div>
		<ul class="pager wizard">
			<li class="previous first" style="display:none;"><a href="#">First</a></li>
			<li class="previous"><a href="#">Previous</a></li>
			<li class="next last" style="display:none;"><a href="#">Last</a></li>
		  	<li class="next"><a href="#">Next</a></li>
		</ul>
	</div>
</div>

<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="<?php bloginfo('template_url');?>/js/bootstrap.min.js"></script>
<script src="<?php bloginfo('template_url');?>/js/jquery.bootstrap.wizard.js"></script>
<script src="<?php bloginfo('template_url');?>/js/prettify.js"></script>


<?php get_footer(); ?>
