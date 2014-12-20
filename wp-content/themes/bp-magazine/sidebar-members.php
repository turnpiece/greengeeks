<?php include (get_template_directory() . '/options.php'); ?>
<!-- member side bar -->
<?php if ( is_active_sidebar( 'member-sidebar' ) ) : ?>
		<?php dynamic_sidebar( 'member-sidebar' ); ?>
<?php endif; ?>