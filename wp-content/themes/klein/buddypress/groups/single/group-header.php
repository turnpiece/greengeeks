<?php

do_action( 'bp_before_group_header' );

?>

<?php if ( bp_has_groups() ) : while ( bp_groups() ) : bp_the_group(); ?>
<div class="buddypress-head" <?php do_action('bcp_coverphoto_style'); ?>>
	<div class="container">
		<div class="content row">
			<div class="col-sm-7">
				<div class="row">
					<div class="col-sm-4">
						<div id="item-header-avatar">
							<a href="<?php bp_group_permalink(); ?>" title="<?php bp_group_name(); ?>">
								<?php bp_group_avatar(); ?>
							</a>
						</div><!-- #item-header-avatar -->
					</div>
					<div class="col-sm-8">
						<div id="item-header-content">
							<h1 class="fg-white">
								<?php bp_group_name(); ?>
							</h1>
							<p class="spacer"></p>
							<p>
								<em>
									<span class="fg-white mg-right-10">
										<?php bp_group_type(); ?>
									</span>
									<span class="activity fg-white">
										<i class="fa fa-clock-o"></i>
										<?php printf( __( '%s', 'buddypress' ), bp_get_group_last_active() ); ?>
									</span>
								</em>
							</p>
							<?php do_action( 'bp_before_group_header_meta' ); ?>
							<div class="fg-white" id="item-meta">
								<?php bp_group_description(); ?>
								<?php do_action( 'bp_group_header_meta' ); ?>
							</div>
						</div><!--#item-header-content-->
					</div>
				</div><!--.row-->
			</div><!--.col-sm-7-->
			<div class="col-sm-5">
				<div id="item-actions">
					<?php if ( bp_group_is_visible() ) : ?>
						<h5 class="fg-white mg-bottom-10"><?php _e( 'Group Admins', 'buddypress' ); ?></h5>
						<?php bp_group_list_admins();
						do_action( 'bp_after_group_menu_admins' );
						if ( bp_group_has_moderators() ) :
							do_action( 'bp_before_group_menu_mods' ); ?>
							<div class="clearfix"></div>
							<h5 class="fg-white mg-bottom-10"><?php _e( 'Group Mods' , 'buddypress' ); ?></h5>
							<?php bp_group_list_mods();
							do_action( 'bp_after_group_menu_mods' );
						endif;
						endif; ?>
					<div class="clearfix"></div>
					<div id="item-buttons">
						<?php do_action( 'bp_group_header_actions' ); ?>
					</div><!-- #item-buttons -->
				</div><!-- #item-actions -->
			</div><!-- .col-sm-5 -->
		</div><!--.row-->
	</div><!--.end container-->
	<div class="clearfix"></div>
</div><!--#buddypress-head-->
<?php endwhile; endif; ?>
<?php do_action( 'bp_after_group_header' ); ?>