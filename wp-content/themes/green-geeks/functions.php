<?php
/**
 * Enter your custom functions here
 *
 * @package klein
 *
 */

add_action( 'load-post.php', 'gg_post_meta_boxes_setup' );
add_action( 'load-post-new.php', 'gg_post_meta_boxes_setup' );

function gg_post_meta_boxes_setup() {

	/* Add meta boxes on the 'add_meta_boxes' hook. */
	add_action( 'add_meta_boxes', 'gg_remove_post_meta_boxes', 99 );
}

function gg_remove_post_meta_boxes() {
	// remove appearance meta box on posts
	remove_meta_box(
		'klein-appearance-meta-box',
		'post',
		'side'
	);
}


add_filter( 'comment_form_defaults', 'gg_remove_comment_form_allowed_tags' );
function gg_remove_comment_form_allowed_tags( $defaults ) {

	$defaults['comment_notes_after'] = '';
	return $defaults;

}

/**
 * Displays user updates in a dropdown
 */
if( !function_exists( 'klein_user_nav') ){
	function klein_user_nav(){
		global $current_user;
		
		// replaced deprecated tempalte tag 'bp_core_get_notifications_for_user'
		// @since 1/16/2014
		
		if( function_exists( 'bp_notifications_get_notifications_for_user' ) ){
		?>
		<?php $notifications = bp_notifications_get_notifications_for_user( get_current_user_id() ); ?>
	
			<section id="klein-top-updates">
				<a id="klein-top-updates-btn" class="btn btn-primary" href="#" title="<?php _e('Updates','klein'); ?>">
					<i class="glyphicon glyphicon-chevron-down"></i> 
					<?php if( !empty( $notifications ) ){ ?>
						<span id="klein-top-updates-badge"><?php echo count( $notifications ); ?></span>
					<?php } ?>	
				</a>
				<nav id="klein-top-updates-nav">
					<ul class="pull-right bp-klein-dropdown-menu" role="menu" aria-labelledby="global-updates">
						<?php do_action( 'klein_before_user_nav' ); ?>
						<li id="klein-user-nav-user-profile">
							<a href="<?php echo bp_core_get_user_domain( $current_user->ID );?>">
								<?php echo get_avatar( $current_user->ID, 32 ); ?>
								<span>
									<?php echo $current_user->display_name; ?>
								</span>
							</a>
						</li>
						<?php if( !empty( $notifications ) ){ ?>
							<?php foreach( $notifications as $notification ){ ?> 
								<li role="presentation">
									<?php
										// check if the format of notification is array
										// assume array has [text] and [link] element
										//
										// @patch 1/16/2014
										// @fix bp update
									?>
									<?php if( is_array( $notification ) ){ ?>
									
										<?php $notification_text = !empty( $notification['text'] ) ? $notification['text'] : ''; ?>
										<?php $notification_link = !empty( $notification['link'] ) ? $notification['link'] : ''; ?>
										
										<a title="<?php echo esc_attr( $notification_text ); ?>" href="<?php echo esc_url( $notification_link ); ?>">
											<?php echo esc_attr( $notification_text ); ?>
										</a>
										
									<?php }else{ ?>
											<?php echo $notification; ?>
									<?php } ?>
								</li>
							<?php } ?>
						<?php } // !empty( $notifications )?>
						<li role="presentation">
							<a href="<?php echo admin_url(); ?>" title="<?php _e( 'Write Posts','klein' ); ?>">
								<span class="glyphicon glyphicon-edit"></span>
								<?php _e( 'Write Posts', 'klein' ); ?>
							</a>
						</li>
						<?php if( function_exists('bp_loggedin_user_domain') ){ ?>
							<?php if( bp_is_active( 'settings' ) ){ ?>
								<li role="presentation">
									<a href="<?php echo bp_loggedin_user_domain(); ?>profile/edit" title="<?php _e( 'Edit Profile','klein' ); ?>">
										<span class="glyphicon glyphicon-user"></span>
										<?php _e( 'Edit Profile', 'klein' ); ?>
									</a>
								</li>
								<li role="presentation">
									<a href="<?php echo bp_loggedin_user_domain(); ?>profile/change-avatar/" title="<?php _e( 'Change Avatar','klein' ); ?>">
										<span class="fa fa-user-secret"></span>
										<?php _e( 'Change Photo', 'klein' ); ?>
									</a>
								</li>
								<li role="presentation">
									<a href="<?php echo bp_loggedin_user_domain(); ?>settings" title="<?php _e( 'Settings','klein' ); ?>">
										<span class="glyphicon glyphicon-cog"></span>
										<?php _e( 'Settings', 'klein' ); ?>
									</a>
								</li>
							<?php } ?>
						<?php } ?>	
							<li role="presentation">
								<a href="<?php echo wp_logout_url( get_permalink() ); ?>" title="<?php _e( 'Logout','klein' ); ?>">
									<i class="glyphicon glyphicon-log-out"></i> <?php _e( 'Logout','klein' ); ?>
								</a>
							</li>
						<?php do_action( 'klein_after_user_nav' ); ?>
					</ul>	
				</nav>
			</section>
			
		
		<?php 
		} // end function_exists('bp_core_get_notifications_for_user')
	} // end function klein_user_updates()
} // end !function_exists( 'klein_user_updates')