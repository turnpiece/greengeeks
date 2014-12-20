<?php include (get_template_directory() . '/options.php'); ?>
	<!-- home page side bar -->
	<?php if($bp_existed == 'true') : ?>
	<?php do_action( 'bp_before_sidebar' ) ?>
	<?php endif; ?>
	<div id="sidebar">	<?php if($bp_existed == 'true') { ?>
		<?php include (get_template_directory() . '/elements/join.php'); ?>
		<div class="sidebar-section">
			<?php if ( function_exists( 'bp_message_get_notices' ) ) : ?>
				<?php bp_message_get_notices(); /* Site wide notices to all users */ ?>
			<?php endif; ?>
				<div class="clear"></div>
		</div>
		<div class="sidebar-section">

			<h4><?php _e( 'Search our magazine', 'bp_magazine' ) ?></h4>
			<?php //if ( bp_search_form_enabled() ) : ?>

				<form action="<?php echo bp_search_form_action() ?>" method="post" id="search-form">
					<input type="text" id="search-terms" name="search-terms" value="" />
					<?php echo bp_search_form_type_select() ?>

					<input type="submit" name="search-submit" id="search-submit" value="<?php _e( 'Search', 'bp_magazine' ) ?>" />
					<?php wp_nonce_field( 'bp_search_form' ) ?>
				</form><!-- #search-form -->

			<?php //endif; ?>
		</div>
			<?php } ?>
			<?php if ( is_active_sidebar( 'home-sidebar' ) ) : ?>
					<?php dynamic_sidebar( 'home-sidebar' ); ?>
			<?php endif; ?>
				<?php if($bp_existed == 'true') : ?>
				<?php do_action( 'bp_inside_after_sidebar' ) ?>
				<?php endif; ?>
	<div class="clear"></div>
</div>
<?php if($bp_existed == 'true') : ?>
<?php do_action( 'bp_after_sidebar' ) ?>
<?php endif; ?>