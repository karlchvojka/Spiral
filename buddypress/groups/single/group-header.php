<?php
/**
 * BuddyPress - Groups Header
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 */

/**
 * Fires before the display of a group's header.
 *
 * @since 1.2.0
 */
do_action( 'bp_before_group_header' );

?>
<div class="container">
<div id="item-actions" class="row">

		<?php if ( ! bp_disable_group_avatar_uploads() ) : ?>
			<div id="item-header-avatar">
				<a href="<?php echo esc_url( bp_get_group_permalink() ); ?>" class="bp-tooltip" data-bp-tooltip="<?php echo esc_attr( bp_get_group_name() ); ?>">

					<?php bp_group_avatar(); ?>

				</a>
			</div><!-- #item-header-avatar -->
		<?php endif; ?>
	<div class="col-md-10">
		<div id="item-header-content" class="vcenter">
			<h1 class="page-title"><?php the_title();?></h1>
			<span class="highlight"><?php bp_group_type(); ?></span><br/>

			<span class="activity" data-livestamp="<?php bp_core_iso8601_date( bp_get_group_last_active( 0, array( 'relative' => false ) ) ); ?>"><?php printf( __( 'active %s', 'buddypress' ), bp_get_group_last_active() ); ?></span>

						<?php
						//$group_id = bp_get_group_id();
						//$meta = groups_get_groupmeta( $group_id, $meta_key = '');
						//print_r($meta);
							?>
			<?php

			/**
			 * Fires before the display of the group's header meta.
			 *
			 * @since 1.2.0
			 */
			do_action( 'bp_before_group_header_meta' ); ?>

			<div id="item-meta">




			</div>
		</div><!-- #item-header-content -->
	</div>
	<div class="col-md-2" id="header_admin">

		<div class="titles">
			<div class="left">
				<p>Reflect</p>
			</div>
			<div class="right">
				<p>Plan</p>
			</div>
		</div>
		<div class="status_wrap">

		  <div class="top_row clear">
				<?php
				 $group_id = bp_get_group_id();
				if ( metadata_exists('group', $group_id, 'planFin' ) ) {
					echo '<style type="text/css">
						#plan_prog {
								display: block;
						}
						</style>';
					} else {
						echo '<script>
						    console.log("FALSE");
						</script>';
					}
					if ( metadata_exists('group', $group_id, 'actObs' ) ) {
						echo'<script>
						console.log("TRUE 2")
						</script>';
					} else {
						echo'<script>
						console.log("FALSE 2")
						</script>';
					}

				 ?>
		    <div id="top_left" class="sector">
		      <img id="reflect_prog" src="<?php bloginfo('template_url');?>/images/reflext.png" />
		    </div>
		    <div id="top_right" class="sector">
		        <img id="plan_prog" src="<?php bloginfo('template_url');?>/images/plan.png" />
		    </div>
		  </div>
		  <div class="bottom_row clear">
		    <div  id="bottom_left" class="sector">
		        <img id="observe_prog" src="<?php bloginfo('template_url');?>/images/observe.png" />
		    </div>
		    <div id="bottom_right" class="sector">
		        <img id="act_prog" src="<?php bloginfo('template_url');?>/images/act.png" />
		    </div>
		  </div>
		</div>
		<div class="titles titlesbottom">
			<div class="left">
				<p>Observe</p>
			</div>
			<div class="right">
				<p>Act</p>
			</div>
		</div>
	</div>



</div><!-- #item-actions -->

</div>



<?php

/**
 * Fires after the display of a group's header.
 *
 * @since 1.2.0
 */
do_action( 'bp_after_group_header' );  ?>

<div id="template-notices" role="alert" aria-atomic="true">
	<?php

	/** This action is documented in bp-templates/bp-legacy/buddypress/activity/index.php */
	do_action( 'template_notices' ); ?>

</div>
