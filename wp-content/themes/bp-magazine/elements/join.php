	<?php
		$join_title = get_option('ne_buddymagazine_join_title');
		$join_message = get_option('ne_buddymagazine_join_message');
		$members_title = get_option('ne_buddymagazine_members_title');
		$members_message = get_option('ne_buddymagazine_members_message');
	?>

	<?php if ( !is_user_logged_in() ) { ?>

	<div class="sidebar-section">
		<h4><?php echo stripslashes($join_title); ?></h4>
		<ol>
			<li><?php echo stripslashes($join_message); ?></li>
		</ol>
				<?php if ( bp_get_signup_allowed() ) : ?>
					<?php printf( __( '<a href="%s" title="Create an account" class="button">Sign up</a>', 'bp_magazine' ), site_url( BP_REGISTER_SLUG . '/' ) ) ?>
				<?php endif; ?>
	</div>
	<?php } else {?>
	<div class="sidebar-section" id="member_message">
		<h4><?php echo stripslashes($members_title); ?></h4>
		<ol>
			<li><?php echo stripslashes($members_message); ?></li>
		</ol>
	</div>

	<?php } ?>