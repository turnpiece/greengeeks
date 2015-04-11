<?php
/**
 * Enter your custom functions here
 *
 * @package klein
 *
 */

if (!function_exists('klein_setup')):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function klein_setup() {

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on klein, use a find and replace
	 * to change 'klein' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'klein', get_template_directory() . '/languages' );
	
	// add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// WordPress 4.1 and above
	add_theme_support('title-tag');
	
	// add featured-image theme support
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'klein-thumbnail-large', 750, 350, true ); 
	add_image_size( 'klein-thumbnail-slider', 580, 277, true ); 
	add_image_size( 'klein-thumbnail-highlights', 325, 325, true ); 
	add_image_size( 'klein-thumbnail', 255, 185, true );
	
	// register the nav emnu
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'klein' ),
		'top-links' => __( 'Top Links Menu', 'klein' ),
	));
	
	// add post formats
	add_theme_support( 'post-formats', array( 'video', 'gallery', 'quote', 'audio' ) );

	if (is_admin()) {
		// remove siebar settings
		remove_action('admin_menu', 'klein_register_sidebar_settings');

		// relabel posts
		//add_action( 'admin_menu', 'gg_change_post_label' );
		//add_action( 'init', 'gg_change_post_object' );
	}
	
}
endif; // klein_setup

add_action( 'after_setup_theme', 'klein_setup' );

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

add_action( 'bp_member_options_nav', 'gg_users_admin_link' );
function gg_users_admin_link() {
	// check if this is a user's own profile page
	if (bp_loggedin_user_domain() == bp_displayed_user_domain()) : ?>
	<li id="logout-li" class="generic-button">
		<a href="<?php echo wp_logout_url( home_url() ) ?>" class="btn">
			<?php _e('Logout', 'klein') ?>
			<div class="glyphicon glyphicon-log-out"></div>
		</a>
	</li>
	<li id="admin-personal-li" class="generic-button">
		<a href="<?php echo admin_url() ?>" class="btn">
			<?php _e('Admin', 'klein') ?>
			<div class="glyphicon glyphicon-edit"></div>
		</a>
	</li>
	<?php endif;
}

function gg_change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Thought';
    $submenu['edit.php'][5][0] = 'Thoughts';
    $submenu['edit.php'][10][0] = 'Add Thought';
    $submenu['edit.php'][16][0] = 'Tags';
    echo '';
}
function gg_change_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Thoughts';
    $labels->singular_name = 'Thought';
    $labels->add_new = 'Add Thought';
    $labels->add_new_item = 'Add Thought';
    $labels->edit_item = 'Edit Thought';
    $labels->new_item = 'Thought';
    $labels->view_item = 'View Thought';
    $labels->search_items = 'Search Thoughts';
    $labels->not_found = 'No Thoughts found';
    $labels->not_found_in_trash = 'No Thoughts found in Trash';
    $labels->all_items = 'All Thoughts';
    $labels->menu_name = 'Thought';
    $labels->name_admin_bar = 'Thought';
}

if( !function_exists('klein_login_logo') ){ ?>
<?php function klein_login_logo() { ?>
	<?php
		// get the logo
		$logo = get_stylesheet_directory_uri() . '/login-logo.png';
	?>
    <style type="text/css">
	
	 @import url('http://fonts.googleapis.com/css?family=Roboto:400,700,400italic,700italic');
       	
       	body.login form .forgetmenot label,
		body.login label {
			color: #34495E;
			font-size: 16px;
		}

		body.login form .forgetmenot label
		{
			line-height: 1;
			padding-top: 9px;
			font-style: italic;
			font-weight: 400;
			display: block;
		}

		body.login #login,
		body.login div#login form {width: 375px; margin: 0 auto;}

		body.login { 
			background: #081000;
		}
		body.login div#login h1 a {
			background-image: url(<?php echo $logo ?>);
            padding-bottom: 30px;
			background-position: center center;
			background-size: auto;
			width: 181px;
			height: 154px;
		}
		body.login div#login form {
			background: #f6ffed;
			-webkit-box-shadow: none;
			box-shadow: none;
			font-family: "Roboto", Arial, sans-serif;
			border-radius: 4px;
			-moz-border-radius: 4px;
			-webkit-border-radius: 4px;
			box-sizing: border-box;
			-moz-box-sizing: border-box;
			-webkit-box-sizing: border-box;
			padding: 35px 40px 35px 40px;
			
		}
		
		body.login form .input, 
		.login input[type="text"] {
			-webkit-box-shadow: none;
			box-shadow: none;
			border-radius: 0;
			font-family: "Roboto", Arial, sans-serif;
		}

		body.login input[type="text"],
		body.login input[type="password"] {
			padding: 8px 12px;
			display: inline-block;
			-webkit-border-radius: 4px;
			-moz-border-radius: 4px;
			border-radius: 4px;
			border: 1px solid #bdc3c7;
			outline: 0;
			margin-bottom: 20px;
			height: 42px;
			display: block;
			width: 100%;
			max-width: 100%;
			-webkit-transition: border .25s linear,color .25s linear,background-color .25s linear;
			transition: border .25s linear,color .25s linear,background-color .25s linear;
			background: #d4ffa9;
		}


		body.login a{
				color: #d4ffa9;
		}
		body.login .message,
		body.login #login_error{

			-webkit-border-radius: 4px;
			-moz-border-radius: 4px;
			border-radius: 4px;

			border: 1px solid #E74C3C;
			color: #C0392B;
			
			background: transparent;
			padding: 15px 35px;
			margin-bottom: 35px;
			box-shadow: none;
		}

		body.login .message a,
		body.login #login_error a{
			color: #E74C3C;
		}

		body.login .button,
		body.login div#login form#loginform p.submit input#wp-submit {
			background: none;
			background-color: transparent;
			box-shadow: none;
			-moz-box-shadow: none;
			-webkit-box-shadow: none;
			border: 0;

			/*start*/

			color: #f6ffed;
			-moz-border-radius: 20px;
			-webkit-border-radius: 20px;
			border-radius: 20px;

			background: #438700;
			display: block;
			
			padding: 10px 20px;
			line-height: 1;
			height: auto;
			font-size: 15px;
		}
		
		body.login .button:active,
		body.login div#login form#loginform p.submit input#wp-submit:active
		{
			background-image: none;
			background-color: #3071a9;
			border-color: #2d6ca2;
		}
		
		body.login div#login p#backtoblog,
		body.login div#login p#nav {
			text-shadow: none;
			font-style: italic;
			margin-top: 20px;
			padding-top: 0;
			line-height: 1;
		}
		 
		body.login div#login p#backtoblog {
			text-shadow: none;
		}
		body.login div#login p#nav,
		body.login div#login p#nav a,
		body.login div#login p#backtoblog a {
			color: #65cb00 !important;
			font-size: 16px;
			text-decoration: none;
			font-family: "Roboto", Arial, sans-serif;
		}
		
		 body.login #ce-facebook-connect-link a {
			background: #3B5A9B;
			padding: 10px 0px;
			display: block;
			margin-bottom: 20px;
			text-align: center;
			color: #d4ffa9;
			font-size: 16px;
			font-weight: bold;
			text-decoration: none;
			border-radius: 3px;
			text-transform: uppercase;
        }
		
		body.login #ce-facebook-connect-link a:active {
			position: relative;
			background: #426ABE;
		}
    </style>
<?php } 
} // end func!klein_login_logo