<?php include (get_template_directory() . '/options.php'); ?>
<?php if($bp_existed == 'true') : ?>
<?php do_action( 'bp_before_sidebar' ) ?>
<?php endif; ?>
<div id="sidebar">
	<?php if ( is_active_sidebar( 'default-sidebar' ) ) : ?>
			<?php dynamic_sidebar( 'default-sidebar' ); ?>
		<?php else : ?>
				<div class="widget-error">
					<?php _e( 'Please log in and add widgets to this column.', 'bp_magazine' ) ?> <a href="<?php echo get_option('siteurl') ?>/wp-admin/widgets.php?s=&amp;show=&amp;sidebar=Default-Sidebar"><?php _e( 'Add Widgets', 'bp_magazine' ) ?></a>
				</div>
	<?php endif; ?>
		<?php if($bp_existed == 'true') : ?>
		<?php do_action( 'bp_inside_after_sidebar' ) ?>
		<?php endif; ?>

	<?php do_action( 'bp_inside_after_sidebar' ) ?>
</div>
<?php if($bp_existed == 'true') : ?>
<?php do_action( 'bp_after_sidebar' ) ?>
<?php endif; ?>