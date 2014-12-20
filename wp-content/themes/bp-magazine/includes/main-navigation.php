<?php if ( !has_nav_menu('primary') ): ?>
	<div class="navigation">
				<ul class="sf-menu">
							<li<?php if ( is_front_page() ) : ?> class="selected"<?php endif; ?>>
								<a href="<?php echo site_url() ?>" title="<?php _e( 'Home', 'bp_magazine' ) ?>"><?php _e( 'Home', 'bp_magazine' ) ?></a>
							</li>
					<?php wp_list_pages('title_li='); ?>
								<!-- Magazine Drop Down -->
								<li><a href="#"><?php _e( 'Magazine', 'bp_magazine' ) ?></a>
								<ul>
								<?php wp_list_categories('orderby=name&title_li=');
								$this_category = get_category($cat);
								if (isset($this_category->cat_ID) && get_categories($this_category->cat_ID) != "") {

								wp_list_categories('orderby=id&show_count=0&title_li=
								&use_desc_for_title=1&child_of='.$this_category->cat_ID);

								}
								?>
								</ul>

			</li>
							<!-- End magazine drop down -->
			<li><a href="#"><?php _e( 'Community', 'bp_magazine' ) ?></a>
				<ul>
						<li<?php if ( bp_is_page( BP_ACTIVITY_SLUG ) ) : ?> class="current"<?php endif; ?>>
							<a href="<?php echo site_url() ?>/<?php echo BP_ACTIVITY_SLUG ?>/" title="<?php _e( 'Activity', 'bp_magazine' ) ?>"><?php _e( 'Activity', 'bp_magazine' ) ?></a>
						</li>
						<li<?php if (  bp_is_page( BP_MEMBERS_SLUG ) || bp_is_user() ) : ?> class="current"<?php endif; ?>>
							<a href="<?php echo site_url() ?>/<?php echo BP_MEMBERS_SLUG ?>/" title="<?php _e( 'Members', 'bp_magazine' ) ?>"><?php _e( 'Members', 'bp_magazine' ) ?></a>
						</li>

						<?php if ( bp_is_active( 'groups' ) ) : ?>
							<li<?php if ( bp_is_page( BP_GROUPS_SLUG ) || bp_is_group() ) : ?> class="current"<?php endif; ?>>
								<a href="<?php echo site_url() ?>/<?php echo BP_GROUPS_SLUG ?>/" title="<?php _e( 'Groups', 'bp_magazine' ) ?>"><?php _e( 'Groups', 'bp_magazine' ) ?></a>
							</li>
						<?php endif; ?>

						<?php if ( bp_is_active( 'forums' ) && ( function_exists( 'bp_forums_is_installed_correctly' ) && !(int) get_site_option( 'bp-disable-forum-directory' ) ) && bp_forums_is_installed_correctly() ) : ?>
							<li<?php if ( bp_is_page( BP_FORUMS_SLUG ) ) : ?> class="current"<?php endif; ?>>
								<a href="<?php echo site_url() ?>/<?php echo BP_FORUMS_SLUG ?>/" title="<?php _e( 'Forums', 'bp_magazine' ) ?>"><?php _e( 'Forums', 'bp_magazine' ) ?></a>
							</li>
						<?php endif; ?>

						<?php if ( bp_is_active( 'blogs' ) && is_multisite() ) : ?>
							<li<?php if ( bp_is_page( BP_BLOGS_SLUG ) ) : ?> class="current"<?php endif; ?>>
								<a href="<?php echo site_url() ?>/<?php echo BP_BLOGS_SLUG ?>/" title="<?php _e( 'Blogs', 'bp_magazine' ) ?>"><?php _e( 'Blogs', 'bp_magazine' ) ?></a>
							</li>
						<?php endif; ?>
				</ul>
		</li>


		<?php do_action( 'bp_nav_items' ); ?>

		</ul>

					<div class="clear"></div>
		</div>
<?php else: ?>
	<?php wp_nav_menu(array(
		'theme_location' => 'primary',
		'container_class' => 'navigation',
		'menu_class' => 'sf-menu',
		'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul><div class="clear"></div>',
		'depth' => 2
	)); ?>
<?php endif ?>
<div class="clear"></div>