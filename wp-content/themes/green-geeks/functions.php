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