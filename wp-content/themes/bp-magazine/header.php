<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

	<head profile="http://gmpg.org/xfn/11">

		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
		<?php include (get_template_directory() . '/options.php'); ?>
		<title><?php wp_title( '|', true, 'right' ); bloginfo( 'name' ); ?></title>
		<?php if($bp_existed == 'true') : ?>
			<?php do_action( 'bp_head' ) ?>
		<?php endif; ?>
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
		<link rel="icon" href="<?php bloginfo('stylesheet_directory');?>/favicon.ico" type="images/x-icon" />
		<?php wp_head(); ?>

		<script type="text/javascript">
		    jQuery(document).ready(function() {
			   jQuery.noConflict();

			     // Put all your code in your document ready area
			     jQuery(document).ready(function(){
			       // Do jQuery stuff using $
				 	jQuery(function(){
						jQuery('ul.sf-menu').superfish();
					});
			    });
		    });
		</script>
	</head>
	<body <?php body_class() ?> id="custom">
		<div id="site-wrapper">
		<div id="header">
		<?php do_action( 'bp_before_search_login_bar' ) ?>
<?php include (get_template_directory() . '/includes/searchform.php'); ?>
	<?php if($bp_existed == 'true') { ?>
			<?php if ( !is_user_logged_in() ) : ?>
					<div id="header-login-section">
						<div id="section-marker">
							<?php _e('Login'); ?>
						</div>
						<div id="header-login-form">
				<form name="login-form" id="login-form" action="<?php echo site_url( 'wp-login.php' ) ?>" method="post">
					<input type="text" name="log" id="user_login" value="<?php if(isset($user_login))echo esc_attr(stripslashes($user_login)); ?>" onfocus="if (this.value == '<?php _e( 'Username', 'bp_magazine') ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e( 'Username', 'bp_magazine') ?>';}" class="form-field" tabindex="97" />
					<input type="password" name="pwd" id="user_pass" value="" class="form-field" tabindex="98" />

					<input type="checkbox" name="rememberme" id="rememberme" value="forever" title="<?php _e('Remember Me', 'bp_magazine') ?>" tabindex="99" />

					<input type="submit" name="wp-submit" id="wp-submit" value="<?php _e( 'Log In', 'bp_magazine') ?>" class="form-submit"/>

					<?php if ( 'none' != bp_get_signup_allowed() && 'blog' != bp_get_signup_allowed() ) : ?>
						<input type="button" name="signup-submit" id="signup-submit" value="<?php _e( 'Sign Up', 'bp_magazine') ?>" onclick="location.href='<?php echo bp_signup_page() ?>'" class="form-submit"/>
					<?php endif; ?>

					<input type="hidden" name="redirect_to" value="<?php echo bp_root_domain() ?>" />
					<input type="hidden" name="testcookie" value="1" />
							<?php if ( bp_get_signup_allowed() ) : ?>
								<?php printf( __( '<a href="%s" title="Create an account" class="button">Sign up</a>', 'bp_magazine' ), site_url( BP_REGISTER_SLUG . '/' ) ) ?>
							<?php endif; ?>

					<?php do_action( 'bp_login_bar_logged_out' ) ?>
				</form>

				</div>
				<div class="clear"></div>
			</div>
			<?php else : ?>
					<div id="header-login-section">
						<div id="section-marker">
							<?php _e( 'Hello', 'bp_magazine') ?>
						</div>
						<div id="header-login-form">
					<?php bp_loggedin_user_avatar( 'width=20&height=20' ) ?> &nbsp; <?php echo bp_core_get_userlink( bp_loggedin_user_id() ); ?> / <a class="button logout" href="<?php echo wp_logout_url( bp_get_root_domain() ) ?>"><?php _e( 'Log Out', 'bp_magazine' ) ?></a>


					<?php do_action( 'bp_login_bar_logged_in' ) ?>
						</div>
					<div class="clear"></div>

				</div>
			<?php endif; ?>

			<?php do_action( 'bp_search_login_bar' ) ?>
		</div>
			<?php } ?>
			<?php
				$site_title = get_option('ne_buddymagazine_site_title');
				$site_logo = get_option('ne_buddymagazine_logo');
				$site_slogan = get_option('ne_buddymagazine_site_slogan');

				$mag_show_title = get_option('ne_buddymagazine_mag_show_title');
				$mag_show_tagline = get_option('ne_buddymagazine_mag_show_tagline');
			?>

		<div id="site-description">
			<?php if ($site_logo != ""):?>
			<a href="<?php echo home_url(); ?>" title="<?php _e( 'Home', 'bp_magazine' ) ?>"><img src="<?php echo $site_logo ?>" alt="<?php bloginfo('name'); ?>"/></a>
			<?php endif; ?>
			<?php if($mag_show_tagline != 'no') { ?>
			<div id="site-strapline"><?php echo stripslashes(bloginfo( 'description' )); ?></div>
			<?php } ?>
			<?php if($mag_show_title != 'no') { ?>
			<a href="<?php echo home_url(); ?>" title="<?php _e( 'Home', 'bp_magazine' ) ?>"><h1><?php echo stripslashes(bloginfo( 'name' )); ?></h1></a>
			<?php } ?>
			<div class="clear"></div>
		</div>
			<?php if( $bp_existed == 'true' ) { //check if bp existed ?>
		<?php do_action( 'bp_after_search_login_bar' ) ?>
		<?php do_action( 'bp_before_header' ) ?>
				<?php } ?>
		<?php if( $bp_existed == 'true' ) { //check if bp existed ?>
		<?php
			locate_template( array( '/includes/main-navigation.php' ), true );
		?>
		<?php } else { // if not bp detected..let go normal ?>
			<?php if ( !has_nav_menu('primary') ): ?>
			<div class="navigation">
						<ul class="sf-menu">
								<li<?php if ( is_front_page()) : ?> class="selected"<?php endif; ?>>
						<a href="<?php echo site_url() ?>" title="<?php _e( 'Home', 'bp_magazine' ) ?>"><?php _e( 'Home', 'bp_magazine' ) ?></a></li>
										<?php wp_list_pages('title_li='); ?>

											<!-- Magazine Drop Down -->
											<li><a href="#"><?php _e( 'Magazine', 'bp_magazine' ) ?></a>
											<ul>
														<?php
														wp_list_categories('orderby=id&show_count=0&title_li=');
														?>
											</ul>

						</li>
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
				<?php endif; ?>
				<div class="clear"></div>

			<?php } ?>


			<?php if($bp_existed == 'true') { ?>
			<?php do_action( 'bp_header' ) ?>


		<?php do_action( 'bp_after_header' ) ?>
		<?php do_action( 'bp_before_container' ) ?>
	<?php } ?>
			<div id="content-wrapper">
	<?php if($bp_existed == 'true') { ?>
			<?php if ( !bp_is_blog_page() && !bp_is_directory() && !bp_is_register_page() && !bp_is_activation_page() ) : ?>
			<div id="member-wrapper">
				<div id="member-sidebar">
					<?php

						locate_template( array( 'userbar.php' ), true );

					?>

			<?php

				locate_template( array( 'optionsbar.php' ), true );

			?>
				</div>
				<div id="member-content" class="member-class">
			<?php endif; ?>

			<?php if ( bp_is_directory()): ?>
				<div id="directory-wrapper">
			<?php endif; ?>

					<?php if (bp_is_register_page() || bp_is_activation_page()) : ?>
						<div id="registration-wrapper">
					<?php endif; ?>
				<?php } ?>