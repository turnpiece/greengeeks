<?php get_header() ?>

<?php do_action( 'bp_before_404' ); ?>

<div id="post-entry">
<div class="content-header">
	<h2 id="post-header"><?php _e( 'Permission Denied', TEMPLATE_DOMAIN) ?></h2>
</div>

<div class="vcard">
	<h2><?php _e( 'Not Found / No Access', TEMPLATE_DOMAIN) ?></h2>
	<p><?php _e( 'The page you are looking for either does not exist, or you do not have the permissions to access it.', TEMPLATE_DOMAIN ) ?></p>

	<?php do_action( 'bp_404' ); ?>
</div>
</div>

<?php do_action( 'bp_after_404' ); ?>

<?php get_sidebar() ?>

<?php get_footer() ?>