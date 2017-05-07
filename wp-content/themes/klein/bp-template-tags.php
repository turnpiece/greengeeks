<?php
/**
 * BuddyPress Template Tags
 *
 * @package klein 3.0
 */

/**
 * Add cover photo
 * styling to member
 * header and groups
 */
add_action('bcp_coverphoto_style', 'klein_cover_photo');

function klein_cover_photo()
{
	if (!function_exists('bcp_get_cover_photo')) { return; }

	$item_id = bp_displayed_user_id();
	$item_type = 'user';

	if (bp_is_group()) {
		$item_id = bp_get_group_id();
		$item_type = 'group';
	}

	$args = array(
		'type' => $item_type,
		'object_id'=> $item_id,
	); 

	$cover_photo_url = esc_url(bcp_get_cover_photo($args));

	if (!empty($cover_photo_url)) {
		echo $cover_photo_url = sprintf('style="background-image: url(%s);"', $cover_photo_url); 
	} 

	return;
}

/**
 * Group Heading
 */
if(!function_exists('klein_bp_group_head')) { 
	function klein_bp_group_head() {
		?>
		<div id="item-header" role="complementary">
			<?php bp_get_template_part( 'groups/single/group-header' ) ?>
		</div><!-- #item-header -->

		<div id="item-nav">
			<div class="container">
				<div class="item-list-tabs no-ajax" id="object-nav" role="navigation">
					<ul>
						<?php bp_get_options_nav(); ?>
						<?php do_action( 'bp_group_options_nav' ); ?>
					</ul>
				</div>
			</div>
		</div><!-- #item-nav -->
		<?php
	}
}

/**
 * Members Heading
 */
if(!function_exists('klein_bp_member_head')) { 
	function klein_bp_member_head() {
		?>
		<div id="item-header" role="complementary">
			<?php bp_get_template_part( 'members/single/member-header' ) ?>
		</div><!-- #item-header -->

		<div id="item-nav">
			<div class="container">
				<div class="item-list-tabs no-ajax" id="object-nav" role="navigation">
					<ul>
						<?php bp_get_displayed_user_nav(); ?>
						<?php do_action( 'bp_member_options_nav' ); ?>
					</ul>
				</div>
			</div>
		</div><!-- #item-nav -->
		
		<?php
	}
}

/**
 * Overwrite Messages Template
 *
 * Originally from buddypress/bp-themes/_inc/ajax.php @line 818 v.2.1
 * 
 */
add_action('wp_ajax_klein_messages_send_reply', 'klein_bp_dtheme_ajax_messages_send_reply');
add_action('wp_ajax_nopriv_klein_messages_send_reply', 'klein_bp_dtheme_ajax_messages_send_reply');

function klein_bp_dtheme_ajax_messages_send_reply() {
// Bail if not a POST action
	if ( 'POST' !== strtoupper( $_SERVER['REQUEST_METHOD'] ) )
		return;

	check_ajax_referer( 'messages_send_message' );

	$result = messages_new_message( array( 'thread_id' => (int) $_REQUEST['thread_id'], 'content' => $_REQUEST['content'] ) );

	if ( $result ) { ?>
	<div class="message-box odd sent-by-1 sent-by-me">
		<div class="message-metadata">
			<?php do_action( 'bp_before_message_meta' ); ?>
			<?php echo bp_loggedin_user_avatar( 'type=full&width=60&height=60' ); ?>
		</div><!-- .message-metadata -->

		<div class="message-content">
			<div class="message-content-sender">
				
				<a href="<?php echo bp_loggedin_user_domain(); ?>">
					<?php bp_loggedin_user_fullname(); ?>
				</a>
			</div>
			<div class="message-content-body">
				<?php echo stripslashes( apply_filters( 'bp_get_the_thread_message_content', $_REQUEST['content'] ) ); ?>
				<span class="activity">
					<?php printf( __( 'Sent %s', 'buddypress' ), bp_core_time_since( bp_core_current_time() ) ); ?>
				</span>
			</div>
			
			<div class="cleafix"></div>
		
		</div><!-- .message-content -->

		<div class="clearfix"></div>
	</div>
	<?php
	} else {
		echo "-1<div id='message' class='error'><p>" . __( 'There was a problem sending that reply. Please try again.', 'buddypress' ) . '</p></div>';
	}

	exit;
}
?>