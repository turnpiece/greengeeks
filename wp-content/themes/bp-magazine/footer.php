	<?php include (get_template_directory() . '/options.php'); ?>
		<?php if($bp_existed == 'true') { ?>
<?php if ( !bp_is_blog_page() && !bp_is_directory() && !bp_is_register_page() && !bp_is_activation_page() ) : ?>
	<div class="clear"></div>
	</div>
<?php endif; ?>
	<?php if ( bp_is_directory()) : ?>
		<div class="clear"></div>
		</div>
	<?php endif; ?>
			<?php if (bp_is_register_page() || bp_is_activation_page()) : ?>
				<div class="clear"></div>
				</div>
			<?php endif; ?>
			<?php if($bp_existed == 'true') : ?>
				<?php do_action( 'bp_after_container' ) ?>
				<?php do_action( 'bp_before_footer' ) ?>
			<?php endif; ?>
			<?php } ?>
		<div class="clear"></div>
		</div>
		<div id="footer">
				<div class="navigation">
				<ul class="sf-menu">
				<li><a href="<?php echo home_url(); ?>"><?php _e( 'Copyright', 'bp_magazine' ) ?> &copy;<?php echo gmdate(__('Y')); ?> <?php get_bloginfo( 'name' ) ?></a></li>
				<li><a href="#header"><?php _e('Go back to top &uarr;', 'bp_magazine'); ?></a></li>
				</ul><div class="clear"></div>
				</div>
					<?php if($bp_existed == 'true') : ?>
						<?php do_action( 'bp_footer' ) ?>
					<?php endif; ?>
		</div>

				<?php if($bp_existed == 'true') : ?>
					<?php do_action( 'bp_after_footer' ) ?>
				<?php endif; ?>
		<?php wp_footer(); ?>
		</div>
	</body>

</html>