<?php
// WP 3.4 Theme Customizer
global $daily_use_customizer_type, $daily_use_customizer_id;
$shortname = 'ne';
$shortprefix = '_buddymagazine_';
$short_prefix = 'buddymagazine_';

$daily_use_customizer_type = array('colorpicker', 'colourpicker');
$daily_use_customizer_id = array(
	$shortname . $shortprefix  . "feature_cat",
	$shortname . $shortprefix  . "home_cat",
	$shortname . $shortprefix  . "home_number",
	$shortname . $shortprefix  . "about_title",
	$shortname . $shortprefix  . "about_description",
	$shortname . $shortprefix  . "join_title",
	$shortname . $shortprefix  . "join_message",
	$shortname . $shortprefix  . "members_title",
	$shortname . $shortprefix  . "members_message",
	$shortname . $shortprefix  . "feature_image",
	$shortname . $shortprefix  . "style_post_image",
	$shortname . $shortprefix  . "slideshowon",
	$shortname . $shortprefix  . "slideshow_speed",
	$shortname . $shortprefix  . "slideshow_number",
	$shortname . $shortprefix  . "bg_image",
	$shortname . $shortprefix  . "bg_image_repeat",
	$shortname . $shortprefix  . "bg_image_attachment",
	$shortname . $shortprefix  . "bg_image_horizontal",
	$shortname . $shortprefix  . "bg_image_vertical",
	$shortname . $shortprefix  . "logo",
	$shortname . $shortprefix  . "body_font",
	$shortname . $shortprefix  . "headline_font",
	$shortname . $shortprefix  . "bg_colour",
	$shortname . $shortprefix  . "h1_colour",
	$shortname . $shortprefix  . "h2_colour",
	$shortname . $shortprefix  . "h3_colour",
	$shortname . $shortprefix  . "h4_colour",
	$shortname . $shortprefix  . "h4_border_colour",
	$shortname . $shortprefix  . "h5_colour",
	$shortname . $shortprefix  . "h6_colour",
	$shortname . $shortprefix  . "link_colour",
	$shortname . $shortprefix  . "link_hover_colour",
	$shortname . $shortprefix  . "link_visited_colour",
	$shortname . $shortprefix  . "link_current_colour",
	$shortname . $shortprefix  . "text_colour",
	$shortname . $shortprefix  . "wrapper_background_colour",
	$shortname . $shortprefix  . "featured_image_background_colour",
	$shortname . $shortprefix  . "featured_title_background_colour",
	$shortname . $shortprefix  . "featured_background_colour",
	$shortname . $shortprefix  . "about_background_colour",
	$shortname . $shortprefix  . "footer_border_colour",
	$shortname . $shortprefix  . "footer_background_colour",
	$shortname . $shortprefix  . "header_background_colour",
	$shortname . $shortprefix  . "post_wrapper_background_colour",
	$shortname . $shortprefix  . "directory_wrapper_background_colour",
	$shortname . $shortprefix  . "member_wrapper_background_colour",
	$shortname . $shortprefix  . "post_date_colour",
	$shortname . $shortprefix  . "post_date_background_colour",
	$shortname . $shortprefix  . "post_meta_colour",
	$shortname . $shortprefix  . "options_hover_background_colour",
	$shortname . $shortprefix  . "options_hover_text_colour",
	$shortname . $shortprefix  . "user_hover_background_colour",
	$shortname . $shortprefix  . "userbar_hover_text_colour",
	$shortname . $shortprefix  . "avatar_background_colour",
	$shortname . $shortprefix  . "wpcaption_text_colour",
	$shortname . $shortprefix  . "code_text_colour",
	$shortname . $shortprefix  . "blockquote_text_colour",
	$shortname . $shortprefix  . "pre_background_colour",
	$shortname . $shortprefix  . "pre_text_colour",
	$shortname . $shortprefix  . "comment_list_background_colour",
	$shortname . $shortprefix  . "comment_child_colour",
	$shortname . $shortprefix  . "section_background_colour",
	$shortname . $shortprefix  . "section_text_colour",
	$shortname . $shortprefix  . "navigation_background_image",
	$shortname . $shortprefix  . "navigation_background_colour",
	$shortname . $shortprefix  . "navigation_link_colour",
	$shortname . $shortprefix  . "navigation_link_hover_colour",
	$shortname . $shortprefix  . "navigation_link_hover_background_colour",
	$shortname . $shortprefix  . "navigation_dropdown_background_colour",
	$shortname . $shortprefix  . "border_colour",
	$shortname . $shortprefix  . "widget_background_colour",
	$shortname . $shortprefix  . "widget_text_colour",
	$shortname . $shortprefix  . "member_info_background_colour",
	$shortname . $shortprefix  . "member_info_text_colour",
	$shortname . $shortprefix  . "member_error_background_colour",
	$shortname . $shortprefix  . "member_error_text_colour",
	$shortname . $shortprefix  . "member_updated_background_colour",
	$shortname . $shortprefix  . "member_updated_text_colour",
	$shortname . $shortprefix  . "form_border_colour",
	$shortname . $shortprefix  . "form_label_colour",
	$shortname . $shortprefix  . "form_background_colour",
	$shortname . $shortprefix  . "form_text_colour",
	$shortname . $shortprefix  . "form_submit_border_colour",
	$shortname . $shortprefix  . "form_submit_background_colour",
	$shortname . $shortprefix  . "form_submit_text_colour",
);
$daily_use_customizer_not_id = array(
	//$shortname . $shortprefix  . "bg_colour",
);
$options1 = array ();

/*
 * Custom control class
 *
 * Add description on control
 * */
if ( class_exists('WP_Customize_Control') ) {
class WPMUDEV_Customize_Control extends WP_Customize_Control {

	public $description = '';

	protected function render_content() {
		switch( $this->type ) {
			default:
				return parent::render_content();
			case 'text':
				?>
				<label>
					<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
					<?php if ( isset($this->description) && !empty($this->description) ): ?>
					<span class="customize-control-description"><?php echo $this->description ?></span>
					<?php endif ?>
					<input type="text" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); ?> />
				</label>
				<?php
				break;
			case 'radio':
				if ( empty( $this->choices ) )
					return;

				$name = '_customize-radio-' . $this->id;

				?>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<?php if ( isset($this->description) && !empty($this->description) ): ?>
				<span class="customize-control-description"><?php echo $this->description ?></span>
				<?php endif ?>
				<?php
				foreach ( $this->choices as $value => $label ) :
					?>
					<label>
						<input type="radio" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?> />
						<?php echo esc_html( $label ); ?><br/>
					</label>
					<?php
				endforeach;
				break;
			case 'select':
				if ( empty( $this->choices ) )
					return;

				?>
				<label>
					<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
					<?php if ( isset($this->description) && !empty($this->description) ): ?>
					<span class="customize-control-description"><?php echo $this->description ?></span>
					<?php endif ?>
					<select <?php $this->link(); ?>>
						<?php
						foreach ( $this->choices as $value => $label )
							echo '<option value="' . esc_attr( $value ) . '"' . selected( $this->value(), $value, false ) . '>' . $label . '</option>';
						?>
					</select>
				</label>
				<?php
				break;
			// Handle textarea
			case 'textarea':
				?>
				<label>
					<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
					<?php if ( isset($this->description) && !empty($this->description) ): ?>
					<span class="customize-control-description"><?php echo $this->description ?></span>
					<?php endif ?>
					<textarea rows="10" cols="40" <?php $this->link(); ?>><?php echo esc_attr( $this->value() ); ?></textarea>
				</label>
				<?php
				break;
		}
	}

}
}

if ( class_exists('WP_Customize_Color_Control') ) {
class WPMUDEV_Customize_Color_Control extends WP_Customize_Color_Control {

	public $description = '';

	public function render_content() {
		?>
		<label>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<?php if ( isset($this->description) && !empty($this->description) ): ?>
			<span class="customize-control-description"><?php echo $this->description ?></span>
			<?php endif ?>
			<div class="customize-control-content">
				<div class="dropdown">
					<div class="dropdown-content">
						<div class="dropdown-status"></div>
					</div>
					<div class="dropdown-arrow"></div>
				</div>
				<input class="color-picker-hex" type="text" maxlength="7" placeholder="<?php esc_attr_e('Hex Value'); ?>" />
			</div>
			<div class="farbtastic-placeholder"></div>
		</label>
		<?php
	}
}
}
function daily_customize_register( $wp_customize ) {
	global $options, $options1, $shortname, $shortprefix, $bp_existed, $daily_use_customizer_type, $daily_use_customizer_id;
	$options_list = array_merge($options, $options1);
	$sections = array(
		array(
			'section' => 'homepage',
			'title' => __("Homepage settings", 'bp_magazine'),
			'priority' => 30
		),array(
			'section' => 'styling',
			'title' => __("Styling settings", 'bp_magazine'),
			'priority' => 31
		),array(
			'section' => 'colour',
			'title' => __("Colour options", 'bp_magazine'),
			'priority' => 32
		)
	);
	// Add sections
	foreach ( $sections as $section ) {
		$wp_customize->add_section( $shortname . $shortprefix . $section['section'], array(
			'title' => $section['title'],
			'priority' => $section['priority']
		) );
	}
	// Add settings and controls
	foreach ( $options_list as $o => $option ) {
		if ( ! daily_option_in_customize($option) )
			continue;
		if ( $option['inblock'] == 'content-layout' )
			$option['inblock'] = 'layout';
		$wp_customize->add_setting( $option['id'], array(
			'default' => $option['std'],
			'type' => 'option',
			'capability' => 'edit_theme_options',
			'transport' => 'postMessage'
		) );
		$control_param = array(
			'label' => strip_tags($option['name']),
			'description' => ( isset($option['description']) && !empty($option['description']) ? $option['description'] : '' ),
			'section' => $shortname . $shortprefix . $option['inblock'],
			'settings' => $option['id'],
			'priority' => $o // make sure we have the same order as theme options :)
		);
		if ( $option['type'] == 'colorpicker' || $option['type'] == 'colourpicker' || ( isset($option['custom']) && ( $option['custom'] == 'colorpicker' || $option['custom'] == 'colourpicker' ) ) ) {
			$wp_customize->add_control( new WPMUDEV_Customize_Color_Control( $wp_customize, $option['id'].'_control', $control_param ) );
		}
		else if ( $option['type'] == 'text' || $option['type'] == 'textarea' ) {
			$control_param['type'] = $option['type'];
			$wp_customize->add_control( new WPMUDEV_Customize_Control( $wp_customize, $option['id'].'_control', $control_param) );
		}
		else if ( $option['type'] == 'select' || $option['type'] == 'select-preview' ) {
			$control_param['type'] = 'select';
			// @TODO choices might get removed in future
			$choices = array();
			foreach ( $option['options'] as $choice )
				$choices[$choice] = $choice;
			$control_param['choices'] = $choices;
			$wp_customize->add_control( new WPMUDEV_Customize_Control( $wp_customize, $option['id'].'_control', $control_param) );
		}
	}

	// Support Wordpress custom background
	$wp_customize->get_setting('background_color')->transport = 'postMessage';
	$wp_customize->get_setting('background_image')->transport = 'postMessage';
	$wp_customize->get_setting('background_repeat')->transport = 'postMessage';
	$wp_customize->get_setting('background_position_x')->transport = 'postMessage';
	$wp_customize->get_setting('background_attachment')->transport = 'postMessage';
	$wp_customize->get_setting('header_image')->transport = 'postMessage';
	$wp_customize->get_setting('blogname')->transport = 'postMessage';
	$wp_customize->get_setting('blogdescription')->transport = 'postMessage';

	// Add transport script
	if ( $wp_customize->is_preview() && ! is_admin() )
		add_action('wp_footer', 'daily_customize_preview', 21);
}
add_action('customize_register', 'daily_customize_register');

function daily_customize_preview() {
	global $options, $options1, $shortname, $shortprefix;
	$options_list = array_merge($options, $options1);
	?>
	<div id="theme-customizer-css"></div>

	<script type="text/javascript">
		var theme_customizer_css = [];
		function theme_update_css(){
			var css = '';
			for ( s in theme_customizer_css ){
				css += theme_customizer_css[s].selector + '{';
				for ( p in theme_customizer_css[s].properties ){
					var property = theme_customizer_css[s].properties[p];
					for ( v in property ){
						if ( v == 0 || v == 1 ) continue;
						css += property[0] + ':' + property[v] + property[1] + ';';
					}
				}
				css += '}';
			}
			jQuery('#theme-customizer-css').html('<style type="text/css">'+css+'</style>');
		}
		function theme_change_style( selector_list, property, values, priority ){
			if ( !priority ) priority = '';
			var prop = [property, priority];
			if ( typeof values == 'string' ) prop.push(values);
			else {
				for ( v in values ) prop.push(values[v]);
			}
			var add_selector = true, add_property = true;
			for ( s in theme_customizer_css ){
				if ( theme_customizer_css[s].selector == selector_list ){
					add_selector = false;
					for ( p in theme_customizer_css[s].properties ){
						if ( theme_customizer_css[s].properties[p][0] == property ){
							theme_customizer_css[s].properties[p] = prop;
							add_property = false;
							break;
						}
					}
					if ( add_property ) theme_customizer_css[s].properties.push(prop)
				}
			}
			if ( add_selector ){
				theme_customizer_css.push({
					selector: selector_list,
					properties: [prop]
				});
			}
			theme_update_css();
		}
		function theme_change_font_family( selector, value, priority ){
			// load font from Google Fonts API
			var fonts = value.split(',');
			var font = fonts[0];
			var supported_fonts = ["Cantarell", "Cardo", "Crimson Text", "Droid Sans", "Droid Serif", "IM Fell DW Pica",
				"Josefin Sans Std Light", "Lobster", "Molengo", "Neuton", "Nobile", "OFL Sorts Mill Goudy TT",
				"Reenie Beanie", "Tangerine", "Old Standard TT", "Volkorn", "Yanone Kaffessatz", "Just Another Hand",
				"Terminal Dosis Light", "Ubuntu"];
			var load_external = false;
			for ( i in supported_fonts ){
				if ( font == supported_fonts[i] ){
					load_external = true;
					break;
				}
			}
			if ( load_external ){
				if ( font == 'Ubuntu' ) font += ":light,regular,bold";
				font = font.replace(' ', '+');
				jQuery('body').append("<link href='http://fonts.googleapis.com/css?family="+font+"' rel='stylesheet' type='text/css'/>");
			}
			theme_change_style(selector, 'font-family', value, priority);
		}
		function theme_color_creator(color, per){
			color = color.toString().substring(1);
			rgb = '';
			per = per/100*255;
			if  (per < 0 ){
		        per =  Math.abs(per);
		        for (x=0;x<=4;x+=2)
		        {
		        	c = parseInt(color.substring(x, x+2), 16) - per;
		        	c = Math.floor(c);
		            c = (c < 0) ? "0" : c.toString(16);
		            rgb += (c.length < 2) ? '0'+c : c;
		        }
		    }
		    else{
		        for (x=0;x<=4;x+=2)
		        {
		        	c = parseInt(color.substring(x, x+2), 16) + per;
		        	c = Math.floor(c);
		            c = (c > 255) ? 'ff' : c.toString(16);
		            rgb += (c.length < 2) ? '0'+c : c;
		        }
		    }
		    return '#'+rgb;
		}

		window.onload = function(){
			wp.customize( 'blogname', function(value) {
				value.bind(function(to){
					jQuery('#site-description a h1').text(to);
				})
			});
			wp.customize( 'blogdescription', function(value) {
				value.bind(function(to){
					jQuery('#site-strapline').text(to);
				})
			});
			wp.customize( 'ne_buddymagazine_about_title', function(value) {
				value.bind(function(to){
					jQuery('#content-about-site h3').text(to);
				})
			});
			wp.customize( 'ne_buddymagazine_about_description', function(value) {
				value.bind(function(to){
					jQuery('#content-about-site p').text(to);
				})
			});
			wp.customize( 'ne_buddymagazine_members_title', function(value) {
				value.bind(function(to){
					jQuery('#member_message h4').text(to);
				})
			});
			wp.customize( 'ne_buddymagazine_members_message', function(value) {
				value.bind(function(to){
					jQuery('#member_message li').text(to);
				})
			});
			wp.customize( 'ne_buddymagazine_bg_image', function(value) {
				value.bind(function(to){
					theme_change_style('body, #custom', 'background-image', 'url('+to+')', '!important');
					theme_change_style('body, #custom', 'background-repeat', wp.customize('ne_buddymagazine_bg_image_repeat').get(), '!important');
					theme_change_style('body, #custom', 'background-position', wp.customize('ne_buddymagazine_bg_image_horizontal').get(), '!important');
					theme_change_style('body, #custom', 'background-position', wp.customize('ne_buddymagazine_bg_image_vertical').get(), '!important');
					theme_change_style('body, #custom', 'background-attachment', wp.customize('ne_buddymagazine_bg_image_attachment').get(), '!important');
				})
			});
			wp.customize( 'ne_buddymagazine_bg_image_repeat', function(value) {
				value.bind(function(to){
					theme_change_style('body, #custom', 'background-repeat', to, '!important');
				})
			});
			wp.customize( 'ne_buddymagazine_bg_image_horizontal', function(value) {
				value.bind(function(to){
					theme_change_style('body, #custom', 'background-position', to, '!important');
				})
			});
			wp.customize( 'ne_buddymagazine_bg_image_vertical', function(value) {
				value.bind(function(to){
					theme_change_style('body, #custom', 'background-position', to, '!important');
				})
			});
			wp.customize( 'ne_buddymagazine_bg_image_attachment', function(value) {
				value.bind(function(to){
					theme_change_style('body, #custom', 'background-attachment', to, '!important');
				})
			});
			/*wp.customize( 'ne_buddymagazine_logo', function(value) {
				value.bind(function(to){
					jQuery('#site-description a').text('<img src="' + to + '" alt="' + wp.customize('blogname').get() + '" title="' + wp.customize('blogname').get() + '" />');
				})
			});*/
			wp.customize( 'ne_buddymagazine_body_font', function(value) {
				value.bind(function(to){
					theme_change_font_family('body, #custom', to, '!important');
				})
			});
			wp.customize( 'ne_buddymagazine_headline_font', function(value) {
				value.bind(function(to){
					theme_change_font_family('h1, h2, h3, h4, h5, h6', to, '!important');
				})
			});
			wp.customize( 'ne_buddymagazine_bg_colour', function(value) {
				value.bind(function(to){
					theme_change_style('body, #custom', 'background-color', to, '!important');
				})
			});
			wp.customize( 'ne_buddymagazine_h1_colour', function(value) {
				value.bind(function(to){
					theme_change_style('h1', 'color', to, '!important');
				})
			});
			wp.customize( 'ne_buddymagazine_h2_colour', function(value) {
				value.bind(function(to){
					theme_change_style('h2', 'color', to, '!important');
				})
			});
			wp.customize( 'ne_buddymagazine_h3_colour', function(value) {
				value.bind(function(to){
					theme_change_style('h3', 'color', to, '!important');
				})
			});
			wp.customize( 'ne_buddymagazine_h4_colour', function(value) {
				value.bind(function(to){
					theme_change_style('h4', 'color', to, '!important');
				})
			});
			wp.customize( 'ne_buddymagazine_h4_border_colour', function(value) {
				value.bind(function(to){
					theme_change_style('h4', 'border-bottom', '1px solid ' + to, '!important');
				})
			});
			wp.customize( 'ne_buddymagazine_h5_colour', function(value) {
				value.bind(function(to){
					theme_change_style('h5', 'color', to, '!important');
				})
			});
			wp.customize( 'ne_buddymagazine_h6_colour', function(value) {
				value.bind(function(to){
					theme_change_style('h6', 'color', to, '!important');
				})
			});
			wp.customize( 'ne_buddymagazine_link_colour', function(value) {
				value.bind(function(to){
					theme_change_style('a, a:link', 'color', to, '!important');
				})
			});
			wp.customize( 'ne_buddymagazine_link_hover_colour', function(value) {
				value.bind(function(to){
					theme_change_style('a:hover', 'color', to, '!important');
				})
			});
			wp.customize( 'ne_buddymagazine_link_visited_colour', function(value) {
				value.bind(function(to){
					theme_change_style('a:visited', 'color', to, '!important');
				})
			});
			wp.customize( 'ne_buddymagazine_link_current_colour', function(value) {
				value.bind(function(to){
					theme_change_style('a.current', 'color', to, '!important');
				})
			});
			wp.customize( 'ne_buddymagazine_text_colour', function(value) {
				value.bind(function(to){
					theme_change_style('body, #custom, .bp-widget table', 'color', to, '!important');
				})
			});
			wp.customize( 'ne_buddymagazine_wrapper_background_colour', function(value) {
				value.bind(function(to){
					theme_change_style('#site-wrapper', 'background-color', to, '!important');
				})
			});
			wp.customize( 'ne_buddymagazine_featured_image_background_colour', function(value) {
				value.bind(function(to){
					theme_change_style('.post-image', 'background-color', to, '!important');
				})
			});
			wp.customize( 'ne_buddymagazine_featured_title_background_colour', function(value) {
				value.bind(function(to){
					theme_change_style('.feature-title, #post-list h4', 'background-color', to, '!important');
				})
			});
			wp.customize( 'ne_buddymagazine_featured_background_colour', function(value) {
				value.bind(function(to){
					theme_change_style('.featured-image, #featured-post-section', 'background-color', to, '!important');
				})
			});
			wp.customize( 'ne_buddymagazine_about_background_colour', function(value) {
				value.bind(function(to){
					theme_change_style('#content-about-site', 'background-color', to, '!important');
				})
			});
			wp.customize( 'ne_buddymagazine_footer_border_colour', function(value) {
				value.bind(function(to){
					theme_change_style('#footer', 'border-top', '1px solid ' + to, '!important');
				})
			});
			wp.customize( 'ne_buddymagazine_footer_background_colour', function(value) {
				value.bind(function(to){
					theme_change_style('#footer', 'background-color', to, '!important');
				})
			});
			wp.customize( 'ne_buddymagazine_header_background_colour', function(value) {
				value.bind(function(to){
					theme_change_style('#header', 'background-color', to, '!important');
				})
			});
			wp.customize( 'ne_buddymagazine_post_wrapper_background_colour', function(value) {
				value.bind(function(to){
					theme_change_style('#post-wrapper', 'background-color', to, '!important');
				})
			});
			wp.customize( 'ne_buddymagazine_directory_wrapper_background_colour', function(value) {
				value.bind(function(to){
					theme_change_style('#directory-wrapper', 'background-color', to, '!important');
				})
			});
			wp.customize( 'ne_buddymagazine_member_wrapper_background_colour', function(value) {
				value.bind(function(to){
					theme_change_style('#member-wrapper, #registration-wrapper', 'background-color', to, '!important');
				})
			});
			wp.customize( 'ne_buddymagazine_post_date_colour', function(value) {
				value.bind(function(to){
					theme_change_style('.date', 'color', to, '!important');
				})
			});
			wp.customize( 'ne_buddymagazine_post_date_background_colour', function(value) {
				value.bind(function(to){
					theme_change_style('.date', 'background-color', to, '!important');
				})
			});
			wp.customize( 'ne_buddymagazine_post_meta_colour', function(value) {
				value.bind(function(to){
					theme_change_style('.meta', 'color', to, '!important');
				})
			});
			wp.customize( 'ne_buddymagazine_options_hover_background_colour', function(value) {
				value.bind(function(to){
					theme_change_style('#options-nav li.current a', 'background-color', to, '!important');
				})
			});
			wp.customize( 'ne_buddymagazine_options_hover_text_colour', function(value) {
				value.bind(function(to){
					theme_change_style('#options-nav li.current a', 'color', to, '!important');
				})
			});
			wp.customize( 'ne_buddymagazine_user_hover_background_colour', function(value) {
				value.bind(function(to){
					theme_change_style('#bp-nav li.current', 'background-color', to, '!important');
				})
			});
			wp.customize( 'ne_buddymagazine_userbar_hover_text_colour', function(value) {
				value.bind(function(to){
					theme_change_style('#bp-nav li.current', 'color', to, '!important');
				})
			});
			wp.customize( 'ne_buddymagazine_avatar_background_colour', function(value) {
				value.bind(function(to){
					theme_change_style('#userbar p.avatar, #optionsbar  p.avatar', 'background-color', to, '!important');
				})
			});
			wp.customize( 'ne_buddymagazine_wpcaption_background_colour', function(value) {
				value.bind(function(to){
					theme_change_style('.wp-caption', 'background-color', to, '!important');
				})
			});
			wp.customize( 'ne_buddymagazine_wpcaption_text_colour', function(value) {
				value.bind(function(to){
					theme_change_style('.wp-caption p.wp-caption-text', 'color', to, '!important');
				})
			});
			wp.customize( 'ne_buddymagazine_code_text_colour', function(value) {
				value.bind(function(to){
					theme_change_style('code', 'color', to, '!important');
				})
			});
			wp.customize( 'ne_buddymagazine_blockquote_text_colour', function(value) {
				value.bind(function(to){
					theme_change_style('blockquote, blockquote p', 'color', to, '!important');
				})
			});
			wp.customize( 'ne_buddymagazine_pre_background_colour', function(value) {
				value.bind(function(to){
					theme_change_style('pre', 'background-color', to, '!important');
				})
			});
			wp.customize( 'ne_buddymagazine_pre_text_colour', function(value) {
				value.bind(function(to){
					theme_change_style('pre', 'color', to, '!important');
				})
			});
			wp.customize( 'ne_buddymagazine_comment_list_background_colour', function(value) {
				value.bind(function(to){
					theme_change_style('ol.commentlist li, #commentpost', 'background-color', to, '!important');
				})
			});
			wp.customize( 'ne_buddymagazine_comment_child_colour', function(value) {
				value.bind(function(to){
					theme_change_style('ol.commentlist ul.children li.alt', 'background-color', to, '!important');
				})
			});
			wp.customize( 'ne_buddymagazine_section_background_colour', function(value) {
				value.bind(function(to){
					theme_change_style('#section-marker', 'background-color', to, '!important');
				})
			});
			wp.customize( 'ne_buddymagazine_section_text_colour', function(value) {
				value.bind(function(to){
					theme_change_style('#section-marker', 'color', to, '!important');
				})
			});
			wp.customize( 'ne_buddymagazine_navigation_background_image', function(value) {
				value.bind(function(to){
					theme_change_style('.navigation', 'background-image', 'url(' + to + ')', '!important');
				})
			});
			wp.customize( 'ne_buddymagazine_navigation_background_colour', function(value) {
				value.bind(function(to){
					theme_change_style('.navigation', 'background-color', to, '!important');
				})
			});
			wp.customize( 'ne_buddymagazine_navigation_link_colour', function(value) {
				value.bind(function(to){
					theme_change_style('.sf-menu a, .sf-menu a:visited', 'color', to, '!important');
				})
			});
			wp.customize( 'ne_buddymagazine_navigation_link_hover_colour', function(value) {
				value.bind(function(to){
					theme_change_style('.sf-menu li:hover, .sf-menu li.current, .sf-menu li.current a:visited, .sf-menu li.current_page_item, .sf-menu li.current_page_item a:visited, .sf-menu li.sfHover, .sf-menu a:focus, .sf-menu a:hover, .sf-menu a:active', 'color', to, '!important');
				})
			});
			wp.customize( 'ne_buddymagazine_navigation_link_hover_background_colour', function(value) {
				value.bind(function(to){
					theme_change_style('.sf-menu li:hover, .sf-menu li.current, .sf-menu li.current a:visited, .sf-menu li.current_page_item, .sf-menu li.current_page_item a:visited, .sf-menu li.sfHover, .sf-menu a:focus, .sf-menu a:hover, .sf-menu a:active', 'background-color', to, '!important');
				})
			});
			wp.customize( 'ne_buddymagazine_navigation_dropdown_background_colour', function(value) {
				value.bind(function(to){
					theme_change_style('.sf-menu li, .sf-menu li li, .sf-menu li li li', 'background-color', to, '!important');
				})
			});
			wp.customize( 'ne_buddymagazine_border_colour', function(value) {
				value.bind(function(to){
					theme_change_style('blockquote', 'border-left', '4px solid ' + to, '!important');
					theme_change_style('#bp-navcontainer a, #global-forum-topic-list th, #global-forum-topic-list, #member-content .profile-fields tr, #options-nav li a', 'border-bottom', '1px solid ' + to, '!important');
					theme_change_style('.bp-widget .avatar, ol.commentlist li, #commentpost, #optionsbar img.avatar', 'border', '5px solid ' + to, '!important');
					theme_change_style('pre, #userbar p.avatar, #optionsbar  p.avatar, .wp-caption', 'border', '1px solid ' + to, '!important');
					theme_change_style('#member-content .error p, #member-content .info p, #member-content .updated p', 'border-top', '3px solid ' + to, '!important');
					theme_change_style('#member-content .error p, #member-content .info p, #member-content .updated p', 'border-bottom', '3px solid ' + to, '!important');
					theme_change_style('.widget-error', 'border-top', '1px solid ' + to, '!important');
					theme_change_style('.widget-error', 'border-bottom', '1px solid ' + to, '!important');
				})
			});
			wp.customize( 'ne_buddymagazine_widget_background_colour', function(value) {
				value.bind(function(to){
					theme_change_style('.widget-error', 'background-color', to, '!important');
				})
			});
			wp.customize( 'ne_buddymagazine_widget_text_colour', function(value) {
				value.bind(function(to){
					theme_change_style('.widget-error', 'color', to, '!important');
				})
			});
			wp.customize( 'ne_buddymagazine_member_info_background_colour', function(value) {
				value.bind(function(to){
					theme_change_style('#member-content .info p', 'background-color', to, '!important');
				})
			});
			wp.customize( 'ne_buddymagazine_member_info_text_colour', function(value) {
				value.bind(function(to){
					theme_change_style('#member-content .info p', 'color', to, '!important');
				})
			});
			wp.customize( 'ne_buddymagazine_member_error_background_colour', function(value) {
				value.bind(function(to){
					theme_change_style('#member-content .error p', 'background-color', to, '!important');
				})
			});
			wp.customize( 'ne_buddymagazine_member_error_text_colour', function(value) {
				value.bind(function(to){
					theme_change_style('#member-content .error p', 'color', to, '!important');
				})
			});
			wp.customize( 'ne_buddymagazine_member_updated_background_colour', function(value) {
				value.bind(function(to){
					theme_change_style('#member-content .updated p', 'background-color', to, '!important');
				})
			});
			wp.customize( 'ne_buddymagazine_member_updated_text_colour', function(value) {
				value.bind(function(to){
					theme_change_style('#member-content .updated p', 'color', to, '!important');
				})
			});
			wp.customize( 'ne_buddymagazine_form_border_colour', function(value) {
				value.bind(function(to){
					theme_change_style('input[type="text"], #post-wrapper input[type="text"], #member-wrapper input[type="text"], #registration-wrapper input[type="text"], input[type="search"], #post-wrapper input[type="search"], #member-wrapper input[type="search"], #registration-wrapper input[type="search"], input[type="password"], #post-wrapper input[type="password"], #member-wrapper input[type="password"], #registration-wrapper input[type="password"], select, #post-wrapper select, #member-wrapper select, #registration-wrapper select, textarea, #post-wrapper textarea, #member-wrapper textarea, #registration-wrapper textarea', 'border', '1px solid ' + to, '!important');
				})
			});
			wp.customize( 'ne_buddymagazine_form_label_colour', function(value) {
				value.bind(function(to){
					theme_change_style('label, #post-wrapper label, #member-wrapper label, #registration-wrapper label', 'color', to, '!important');
				})
			});
			wp.customize( 'ne_buddymagazine_form_background_colour', function(value) {
				value.bind(function(to){
					theme_change_style('select, #post-wrapper select, #member-wrapper select, #registration-wrapper select, textarea, #post-wrapper textarea, #member-wrapper textarea, #registration-wrapper textarea, input[type="text"], #post-wrapper input[type="text"], #member-wrapper input[type="text"], #registration-wrapper input[type="text"], input[type="search"], #post-wrapper input[type="search"], #member-wrapper input[type="search"], #registration-wrapper input[type="search"], input[type="password"], #post-wrapper input[type="password"], #member-wrapper input[type="password"], #registration-wrapper input[type="password"]', 'background-color', to, '!important');
				})
			});
			wp.customize( 'ne_buddymagazine_form_text_colour', function(value) {
				value.bind(function(to){
					theme_change_style('select, #post-wrapper select, #member-wrapper select, #registration-wrapper select, textarea, #post-wrapper textarea, #member-wrapper textarea, #registration-wrapper textarea, input[type="text"], #post-wrapper input[type="text"], #member-wrapper input[type="text"], #registration-wrapper input[type="text"], input[type="search"], #post-wrapper input[type="search"], #member-wrapper input[type="search"], #registration-wrapper input[type="search"], input[type="password"], #post-wrapper input[type="password"], #member-wrapper input[type="password"], #registration-wrapper input[type="password"]', 'color', to, '!important');
				})
			});
			wp.customize( 'ne_buddymagazine_form_submit_border_colour', function(value) {
				value.bind(function(to){
					theme_change_style('a.comment-reply-link, div#item-header h4 span.highlight span, .button, a.button, input[type="button"], input[type="reset"], input[type="submit"], #post-wrapper input[type="submit"], #post-wrapper input[type="reset"], #member-wrapper input[type="submit"], #registration-wrapper input[type="submit"]', 'border', '1px solid ' + to, '!important');
				})
			});
			wp.customize( 'ne_buddymagazine_form_submit_background_colour', function(value) {
				value.bind(function(to){
					theme_change_style('a.comment-reply-link, div#item-header h4 span.highlight span, .button, a.button, input[type="button"], input[type="reset"], input[type="submit"], #post-wrapper input[type="submit"], #post-wrapper input[type="reset"], #member-wrapper input[type="submit"], #registration-wrapper input[type="submit"]', 'background-color', to, '!important');
				})
			});
			wp.customize( 'ne_buddymagazine_form_submit_text_colour', function(value) {
				value.bind(function(to){
					theme_change_style('a.comment-reply-link, div#item-header h4 span.highlight span, .button, a.button, input[type="button"], input[type="reset"], input[type="submit"], #post-wrapper input[type="submit"], #post-wrapper input[type="reset"], #member-wrapper input[type="submit"], #registration-wrapper input[type="submit"]', 'color', to, '!important');
				})
			});

			wp.customize( 'background_color', function(value) {
				value.bind(function(to){
					theme_change_style('body', 'background-color', to, '!important');
				})
			});

			wp.customize( 'header_image', function(value) {
				value.bind(function(to){
					jQuery('#custom-img-header img').attr('src', to);
				})
			});
		};
	</script>
	<?php
}

// Add additional styling to better fit on Customizer options
function daily_customize_controls_footer() {
	?>
	<style type="text/css">
		.customize-control-title { line-height: 18px; padding: 2px 0; }
		.customize-control-description { font-size: 11px; color: #666; margin: 0 0 3px; display: block; }
		.customize-control input[type="text"], .customize-control textarea { width: 98%; line-height: 18px; margin: 0; }
	</style>
	<?php
}
add_action('customize_controls_print_footer_scripts', 'daily_customize_controls_footer');

function daily_option_in_customize( $option ) {
	global $daily_use_customizer_type, $daily_use_customizer_id, $daily_use_customizer_not_id;
	if ( in_array($option['id'], $daily_use_customizer_not_id) )
		return false;
	if ( in_array($option['type'], $daily_use_customizer_type) || in_array($option['id'], $daily_use_customizer_id) || ( isset($option['custom']) && in_array($option['custom'], $daily_use_customizer_type) ) )
		return true;
	return false;
}

?>