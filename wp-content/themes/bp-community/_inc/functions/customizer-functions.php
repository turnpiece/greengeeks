<?php

// WP 3.4 Theme Customizer
global $buddycom_use_customizer_type, $buddycom_use_customizer_id;

$buddycom_use_customizer_type = array('colorpicker', 'colourpicker');
$buddycom_use_customizer_id = array(
	/*$shortname . $shortprefix  . "bg_image",
	$shortname . $shortprefix  . "bg_image_repeat",
	$shortname . $shortprefix  . "bg_image_attachment",
	$shortname . $shortprefix  . "bg_image_horizontal",
	$shortname . $shortprefix  . "bg_image_vertical",*/
	$shortname . $shortprefix  . "body_font",
	$shortname . $shortprefix  . "headline_font",
	$shortname . $shortprefix  . "font_size",
	$shortname . $shortprefix  . "call_signup_text",
	$shortname . $shortprefix  . "call_signup_button_text",
	$shortname . $shortprefix  . "call_signup_button_text_link",
	$shortname . $shortprefix  . "custom_style",
);
$buddycom_use_customizer_not_id = array(
	$shortname . $shortprefix  . "bg_color",
);

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
			case 'custom-radio':
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
					$screenshot_img = substr($value,0,-4);
					?>
					<label>
						<div class="theme-img">
							<img src="<?php echo get_template_directory_uri(); ?>/_inc/preset-styles/images/<?php echo $screenshot_img . '.png'; ?>" alt="<?php echo $screenshot_img ?>" />
						</div>
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

function buddycom_customize_register( $wp_customize ) {
	global $options, $shortname, $shortprefix, $bp_existed, $buddycom_use_customizer_type, $buddycom_use_customizer_id;
	$options_list = $options;
	$sections = array(
		array(
			'section' => 'css',
			'title' => __("CSS Settings", TEMPLATE_DOMAIN),
			'priority' => 31
		),
		array(
			'section' => 'bg',
			'title' => __("Background Settings", TEMPLATE_DOMAIN),
			'priority' => 32
		), array(
			'section' => 'searchbox',
			'title' => __("Searchbox Settings", TEMPLATE_DOMAIN),
			'priority' => 33
		), array(
			'section' => 'header',
			'title' => __("Header Settings", TEMPLATE_DOMAIN),
			'priority' => 34
		), array(
			'section' => 'post',
			'title' => __("Post Settings", TEMPLATE_DOMAIN),
			'priority' => 35
		), array(
			'section' => 'sidebar',
			'title' => __("Sidebar Settings", TEMPLATE_DOMAIN),
			'priority' => 36
		), array(
			'section' => 'footer',
			'title' => __("Footer Settings", TEMPLATE_DOMAIN),
			'priority' => 37
		), array(
			'section' => 'buddypress',
			'title' => __("BuddyPress Settings", TEMPLATE_DOMAIN),
			'priority' => 38
		), array(
			'section' => 'signup',
			'title' => __("Welcome Message Settings", TEMPLATE_DOMAIN),
			'priority' => 39
		), array(
			'section' => 'preset-style',
			'title' => __("Preset Styles", TEMPLATE_DOMAIN),
			'priority' => 30
		)
	);
	// Add sections
	foreach ( $sections as $section ) {
		if ( $bp_existed != "true" && $section['section'] == 'buddypress' )
			continue;
		$wp_customize->add_section( $shortname . $shortprefix . $section['section'], array(
			'title' => $section['title'],
			'priority' => $section['priority']
		) );
	}
	// Add settings and controls
	foreach ( $options_list as $o => $option ) {
		if ( ! buddycom_option_in_customize($option) )
			continue;
		$transport = 'postMessage';
		if ( in_array($option['id'], array( $shortname.$shortprefix.'custom_style' )) )
			$transport = 'refresh';
		$wp_customize->add_setting( $option['id'], array(
			'default' => $option['std'],
			'type' => 'option',
			'capability' => 'edit_theme_options',
			'transport' => $transport
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
		else if ( $option['type'] == 'custom-radio' ) {
			$control_param['type'] ='custom-radio';
			// @TODO choices might get removed in future
			$choices = array();
			foreach ( $option['options'] as $choice )
				$choices[$choice] = $choice;
			$control_param['choices'] = $choices;
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
		add_action('wp_footer', 'buddycom_customize_preview', 21);
}
add_action('customize_register', 'buddycom_customize_register');

function buddycom_customize_preview() {
	global $options, $shortname, $shortprefix;
	$options_list = $options;
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
		<?php foreach ( $options_list as $option ): ?>
			<?php if ( ! buddycom_option_in_customize($option) ) continue; ?>
			wp.customize( '<?php echo $option['id'] ?>', function(value) {
				value.bind(function(to){
					<?php if ( $option['type'] != 'text' && $option['type'] != 'textarea' ): ?>
					if ( !to ) return;
					<?php endif ?>
					<?php
					// Use printf for better readibility, place selector in argument
					switch ( str_replace($shortname . $shortprefix, '', $option['id']) ){
						case 'body_font':
							printf("theme_change_font_family('%s', to, '!important');", "body");
							break;
						case 'headline_font':
							printf("theme_change_font_family('%s', to, '!important');", "h1, h2, h3, h4, h5, h6");
							break;
						case 'font_size':
							printf("if ( to == 'small' ) var size = '0.6875em';");
							printf("else if ( to == 'medium' ) var size = '0.85em';");
							printf("else if ( to == 'bigger' ) var size = '0.9em';");
							printf("else if ( to == 'largest' ) var size = '1em';");
							printf("else var size = '0.785em';");
							printf("theme_change_style('%s', 'font-size', size); ", "#wrapper");
							printf("theme_change_style('%s', 'line-height', '1.6em', '!important'); ", "#wrapper");
							break;
						case 'global_links':
							printf("theme_change_style('%s', 'color', to, '!important'); ", "ul.wpnv li a:hover");
							printf("theme_change_style('%s', 'border-color', to, '!important'); ", "#post-navigator .current");
							printf("theme_change_style('%s', 'border-color', to, '!important'); ", ".wp-pagenavi .pages, #post-navigator a, #post-navigator a:hover");
							printf("theme_change_style('%s', 'color', to, '!important'); ", "#member-content li a, #member-content #activity-rss p a, #member-content form a, #main-column a, .bpside li a, #post-entry .textwidget a, #post-entry div.widget_tag_cloud a, .message-box a, .item-options a, .post-content a, h1 a, .post-author a, p.tags a, #post-navigator-single a, table a, .group-button a, .generic-button a, #activity-pag a, div.textwidget a, div.item-title a, div.pagination-links a, div.directory-listing a, #custom ul#options-nav li a");
							printf("theme_change_style('%s', 'color', to, '!important'); ", "#commentpost a, #cf a, #respond a");
							printf("theme_change_style('%s', 'background-color', to, '!important'); ", "div.create-account a, #rss-com p a, #rss-com p a:hover, ul#letter-list li a, #container ul.content-header-nav li a, div.reply a, .content-header-nav .current a");
							printf("theme_change_style('%s', 'color', '#fff', '!important'); ", "div.create-account a, #rss-com p a, #rss-com p a:hover, ul#letter-list li a, #container ul.content-header-nav li a, div.reply a, .content-header-nav .current a");
							printf("theme_change_style('%s', 'border-bottom-color', to, '!important'); ", "#post-entry .bpside h2");
							break;
						case 'sidebar_color':
							printf("theme_change_style('%s', 'background-color', to, '!important'); ", "#sidebar");
							break;
						case 'sidebar_border_color':
							printf("theme_change_style('%s', 'border-left-color', to, '!important'); ", "#sidebar");
							break;
						case 'sidebar_text_color':
							printf("theme_change_style('%s', 'color', to, '!important'); ", "#sidebar");
							printf("theme_change_style('%s', 'color', to, '!important'); ", "#sidebar, #sidebar h2, #sidebar h2 a, #sidebar .bpside .time-since");
							break;
						case 'sidebar_text_links_color':
							printf("theme_change_style('%s', 'color', to, '!important'); ", "#sidebar a, #sidebar .textwidget a, #sidebar .widget_tag_cloud a");
							break;
						case 'sidebar_header_color':
							printf("theme_change_style('%s', 'color', to, '!important'); ", "#sidebar h2.widgettitle");
							break;
						case 'sidebar_border_color':
							printf("theme_change_style('%s', 'border-bottom', '1px solid '+to, '!important'); ", "#sidebar .bpside h2");
							printf("theme_change_style('%s', 'border-left-color', to, '!important'); ", "#sidebar");
							break;
						case 'sidebar_memberbar_color':
							printf("theme_change_style('%s', 'background-color', to, '!important'); ", "#sidebar ul#bp-nav, #sidebar ul#options-nav");
							break;
						case 'sidebar_userbar_li_color':
							printf("theme_change_style('%s', 'color', to, '!important'); ", "ul#options-nav li a, ul#bp-nav li a");
							break;
						case 'sidebar_userbar_link_color':
							printf("theme_change_style('%s', 'color', to, '!important'); ", "#sidebar li.current a");
							break;
						case 'sidebar_userbar_current_color':
							printf("theme_change_style('%s', 'background-color', to, ''); ", "ul#options-nav li.current a");
							printf("theme_change_style('%s', 'background-color', to, ''); ", "ul#bp-nav .current #my-activity");
							printf("theme_change_style('%s', 'background-color', to, ''); ", "ul#bp-nav .current #my-profile");
							printf("theme_change_style('%s', 'background-color', to, ''); ", "ul#bp-nav .current #my-blogs");
							printf("theme_change_style('%s', 'background-color', to, ''); ", "ul#bp-nav .current #my-wire");
							printf("theme_change_style('%s', 'background-color', to, ''); ", "ul#bp-nav .current #my-messages");
							printf("theme_change_style('%s', 'background-color', to, ''); ", "ul#bp-nav .current #my-friends");
							printf("theme_change_style('%s', 'background-color', to, ''); ", "ul#bp-nav .current #my-groups");
							printf("theme_change_style('%s', 'background-color', to, ''); ", "ul#bp-nav .current #my-settings");
							printf("theme_change_style('%s', 'background-color', to, ''); ", "ul#bp-nav .current #wp-logout");
							break;
						case 'sidebar_memberbar_border_color':
							printf("theme_change_style('%s', 'border-bottom-color', to, '!important'); ", "#sidebar ul#bp-nav li a, #sidebar ul#options-nav li a");
							break;
						case 'sidebar_meta_color':
							printf("theme_change_style('%s', 'border-color', to, '!important'); ", ".post-tagged p.com a:hover");
							break;
						case 'post_meta_color':
							printf("theme_change_style('%s', 'background-color', to, '!important'); ", "#post-entry .bpside blockquote, #member-content blockquote");
							printf("theme_change_style('%s', 'border', 'none', '!important'); ", "#post-entry .bpside blockquote, #member-content blockquote");
							printf("theme_change_style('%s', 'border-color', to, '!important'); ", ".post-tagged p.com a");
							break;
						case 'member_header_color':
							printf("theme_change_style('%s', 'background-color', to, '!important'); ", "#member-content h4");
							printf("theme_change_style('%s', 'background-color', to, '!important'); ", "#signup-button a, div.create-account a");
							printf("theme_change_style('%s', 'color', '#fff', '!important'); ", "#signup-button a, div.create-account a");
							break;
						case 'member_header_bottom_line_color':
							printf("theme_change_style('%s', 'border-bottom-color', to, '!important'); ", "#member-content h4");
							break;
						case 'member_header_text_color':
							printf("theme_change_style('%s', 'color', to, '!important'); ", "#member-content h4");
							break;
						case 'footer_color':
							printf("theme_change_style('%s', 'background-color', to, '!important'); ", "#footer");
							break;
						case 'footer_bottom_border_color':
							printf("theme_change_style('%s', 'border-bottom-color', to, '!important'); ", "#footer");
							break;
						case 'footer_text_color':
							printf("theme_change_style('%s', 'color', to, '!important'); ", "#footer");
							break;
						case 'footer_text_link_color':
							printf("theme_change_style('%s', 'color', to, '!important'); ", "#footer a");
							printf("theme_change_style('%s', 'color', to, '!important'); ", "#footer a:hover");
							printf("theme_change_style('%s', 'text-decoration', 'underline', '!important'); ", "#footer a:hover");
							break;
						case 'searchbox_color':
							printf("theme_change_style('%s', 'background-color', to, '!important'); ", "#searchbox");
							printf("var bottom_border = wp.customize('{$shortname}{$shortprefix}searchbox_bottom_border_color').get();");
							printf("if ( bottom_border ) theme_change_style('%s', 'border-bottom-color', bottom_border, '!important'); ", "#searchbox");
							printf("else theme_change_style('%s', 'border-bottom-color', to, '!important'); ", "#searchbox");
							printf("theme_change_style('%s', 'background-color', to, '!important'); ", "#signup-button a");
							break;
						case 'searchbox_bottom_border_color':
							printf("theme_change_style('%s', 'border-bottom-color', to, '!important'); ", "#searchbox");
							printf("theme_change_style('%s', 'border', '3px solid '+to, '!important'); ", "#signup-button a");
							break;
						case 'header_color':
							printf("theme_change_style('%s', 'background-color', to, '!important'); ", "#header, #meprofile, #optionsbar h3, #optionsbar p.avatar");
							printf("var bottom_border = wp.customize('{$shortname}{$shortprefix}header_bottom_border_color').get();");
							printf("if ( bottom_border ) theme_change_style('%s', 'border-bottom-color', bottom_border, '!important'); ", "#header, #meprofile, #optionsbar h3, #optionsbar p.avatar");
							printf("else theme_change_style('%s', 'border-bottom-color', to, '!important'); ", "#header, #meprofile, #optionsbar h3, #optionsbar p.avatar");
							break;
						case 'header_bottom_border_color':
							printf("theme_change_style('%s', 'background-color', to, '!important'); ", "#signup-button a:hover");
							printf("theme_change_style('%s', 'border-color', to, '!important'); ", "#signup-button a:hover");
							printf("theme_change_style('%s', 'border-bottom-color', to, '!important'); ", "#header, #meprofile, #optionsbar h3, #optionsbar p.avatar");
							break;
						case 'header_text_color':
							printf("theme_change_style('%s', 'color', to, '!important'); ", "#header #intro-text h2, #header #intro-text span, #header a, div#meprofile, div#optionsbar h3");
							break;
						case 'header_links_color':
							printf("theme_change_style('%s', 'color', to, '!important'); ", "#member-content h4 a, ul#letter-list li a, #member-content ul.content-header-nav li a");
							break;
						case 'span_meta_color':
							printf("theme_change_style('%s', 'background-color', to, '!important'); ", ".activity-list .activity-header a:first-child, span.highlight");
							printf("theme_change_style('%s', 'background-color', to, '!important'); ", "span.activity");
							break;
						case 'span_meta_text_color':
							printf("theme_change_style('%s', 'color', to, '!important'); ", ".activity-list .activity-header a:first-child, span.highlight");
							printf("theme_change_style('%s', 'color', to, '!important'); ", "span.activity");
							break;
						case 'span_meta_border_color':
							printf("theme_change_style('%s', 'border-color', to, '!important'); ", ".activity-list .activity-header a:first-child, span.highlight");
							printf("theme_change_style('%s', 'border-color', to, '!important'); ", "span.activity");
							break;
						case 'span_meta_hover_color':
							printf("theme_change_style('%s', 'background-color', to, '!important'); ", ".activity-list .activity-header a:first-child:hover, span.highlight:hover");
							break;
						case 'span_meta_text_hover_color':
							printf("theme_change_style('%s', 'color', to, '!important'); ", ".activity-list .activity-header a:first-child:hover, span.highlight:hover");
							break;
						case 'span_meta_border_hover_color':
							printf("theme_change_style('%s', 'border-color', to, '!important'); ", ".activity-list .activity-header a:first-child:hover, span.highlight:hover");
							break;
						case 'call_signup_text':
							printf("if (! to) to = '<h2>%s</h2><span>%s</span>';", __('Welcome to the BuddyPress Community Theme', TEMPLATE_DOMAIN), __('Simply change this text in your theme options', TEMPLATE_DOMAIN));
							printf("jQuery('%s').html(to); ", "#intro-text");
							break;
						case 'call_signup_button_text':
							printf("if (! to) to = '%s';", __('Join Us Here', TEMPLATE_DOMAIN));
							printf("jQuery('%s').html(to); ", "#signup-button a");
							break;
						case 'call_signup_button_text_link':
							printf("jQuery('%s').attr('href', to); ", "#signup-button a");
							break;
					}
					?>
				});
			} );
		<?php endforeach ?>

			wp.customize( 'background_color', function(value) {
				value.bind(function(to){
					theme_change_style('body', 'background-color', to, '!important');
				})
			});
			wp.customize( 'background_image', function(value) {
				value.bind(function(to){
					theme_change_style('body', 'background-image', 'url('+to+')', '!important');
					theme_change_style('body', 'background-repeat', wp.customize('background_repeat').get(), '!important');
					theme_change_style('body', 'background-position', 'top '+wp.customize('background_position_x').get(), '!important');
					theme_change_style('body', 'background-attachment', wp.customize('background_attachment').get(), '!important');
				})
			});
			wp.customize( 'background_repeat', function(value) {
				value.bind(function(to){
					theme_change_style('body', 'background-repeat', to, '!important');
				})
			});
			wp.customize( 'background_position_x', function(value) {
				value.bind(function(to){
					theme_change_style('body', 'background-position', 'top '+to, '!important');
				})
			});
			wp.customize( 'background_attachment', function(value) {
				value.bind(function(to){
					theme_change_style('body', 'background-attachment', to, '!important');
				})
			});
			wp.customize( 'header_image', function(value) {
				value.bind(function(to){
					jQuery('#custom-img-header img').attr('src', to);
				})
			});
			wp.customize( 'blogname', function(value) {
				value.bind(function(to){
					jQuery('#top-header h1 a').text(to);
				})
			});
			wp.customize( 'blogdescription', function(value) {
				value.bind(function(to){
					jQuery('#top-header p').text(to);
				})
			});
		};
	</script>
	<?php
}

// Add additional styling to better fit on Customizer options
function buddycom_customize_controls_footer() {
	global $options, $shortname, $shortprefix;
	?>
	<style type="text/css">
		.customize-control-title { line-height: 18px; padding: 2px 0; }
		.customize-control-description { font-size: 11px; color: #666; margin: 0 0 3px; display: block; }
		.customize-control input[type="text"], .customize-control textarea { width: 98%; line-height: 18px; margin: 0; }
		.customize-control .theme-img {
			overflow: hidden;
			box-shadow: 1px 1px 2px #ccc;
			-moz-box-shadow: 1px 1px 2px #ccc;
			-webkit-box-shadow: 1px 1px 2px #ccc;
			-moz-border-radius: 6px;
			-khtml-border-radius: 6px;
			-webkit-border-radius: 6px;
			border-radius: 6px;
			border: 1px solid #ddd;
			background: #FFF;
			padding: 5px;
		    height: 130px;
		    margin-top: 16px;
			margin-bottom: 8px;
		}
		.customize-control .theme-img:hover {
			overflow: hidden;
			box-shadow: 3px 3px 7px #ccc;
			-moz-box-shadow: 3px 3px 7px #ccc;
			-webkit-box-shadow: 3px 3px 7px #ccc;
			-moz-border-radius: 6px;
			-khtml-border-radius: 6px;
			-webkit-border-radius: 6px;
			border-radius: 6px;
			border: 1px solid #ddd;
			background: #FFF;
			padding: 5px;
			margin-bottom: 8px;
		}
	</style>
	<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery.each({
				'<?php echo $shortname.$shortprefix ?>custom_style': {
					sections: <?php
						$sections = array();
						foreach ( array('searchbox', 'sidebar', 'header', 'footer') as $section )
							$sections[] = $shortname.$shortprefix.$section;
						echo json_encode($sections);
					?>,
					controls: <?php
						$controls = array();
						foreach ( array('global_links', 'global_hover_links') as $control )
							$controls[] = $shortname.$shortprefix.$control.'_control';
						echo json_encode($controls);
					?>,
					callback: function( to ) { return to == 'default.css' }
				}
			}, function( settingId, o ) {
				wp.customize( settingId, function( setting ) {
					jQuery.each({'control':o.controls, 'section':o.sections}, function( type, ob ){
						jQuery.each( ob, function( i, id ){
							var selector = '#customize-'+type+'-'+ id.replace( ']', '' ).replace( '[', '-' );
							var visibility = function( to ) {
								jQuery(selector).toggle( o.callback( to ) );
							};
							visibility( setting.get() );
							setting.bind( visibility );
						});
					});
				});
			});
		});
	</script>
	<?php
}
add_action('customize_controls_print_footer_scripts', 'buddycom_customize_controls_footer');

function buddycom_option_in_customize( $option ) {
	global $buddycom_use_customizer_type, $buddycom_use_customizer_id, $buddycom_use_customizer_not_id;
	if ( in_array($option['id'], $buddycom_use_customizer_not_id) )
		return false;
	if ( in_array($option['type'], $buddycom_use_customizer_type) || in_array($option['id'], $buddycom_use_customizer_id) || ( isset($option['custom']) && in_array($option['custom'], $buddycom_use_customizer_type) ) )
		return true;
	return false;
}

?>