a, a:link{
	color: <?php if($ne_buddymagazine_link_colour == ""){ ?><?php echo "#ff0099"; } else { ?><?php echo $ne_buddymagazine_link_colour; ?><?php } ?>;
}

a:visited{
	color: <?php if($ne_buddymagazine_link_visited_colour == ""){ ?><?php echo "#990055"; } else { ?><?php echo $ne_buddymagazine_link_visited_colour; ?><?php } ?>;
}

a:hover{
	color: <?php if($ne_buddymagazine_link_hover_colour == ""){ ?><?php echo "#ffffff"; } else { ?><?php echo $ne_buddymagazine_link_hover_colour; ?><?php } ?>;
}

a.current{
	color: <?php if($ne_buddymagazine_link_current_colour == ""){ ?><?php echo "#ff0099"; } else { ?><?php echo $ne_buddymagazine_link_current_colour; ?><?php } ?>;
}

blockquote {
	border-left: 4px solid <?php if($ne_buddymagazine_border_colour == ""){ ?><?php echo "#333333"; } else { ?><?php echo $ne_buddymagazine_border_colour; ?><?php } ?>;
	color: <?php if($ne_buddymagazine_blockquote_text_colour == ""){ ?><?php echo "#ff0099"; } else { ?><?php echo $ne_buddymagazine_blockquote_text_colour; ?><?php } ?>;
}

blockquote p{ 	color: <?php if($ne_buddymagazine_blockquote_text_colour == ""){ ?><?php echo "#ff0099"; } else { ?><?php echo $ne_buddymagazine_blockquote_text_colour; ?><?php } ?>;}

body, #custom{
	<?php if(($ne_buddymagazine_bg_image == "")&&($ne_buddymagazine_bg_colour != "")) { ?>
	background: <?php echo $ne_buddymagazine_bg_colour; ?>
	<?php } ?>

	<?php if(($ne_buddymagazine_bg_image != "")&&($ne_buddymagazine_bg_colour != "")) { ?>
	background: <?php echo $ne_buddymagazine_bg_colour; ?> url(<?php echo $ne_buddymagazine_bg_image; ?>) <?php echo $ne_buddymagazine_bg_image_repeat; ?> <?php echo $ne_buddymagazine_bg_image_vertical; ?> <?php echo $ne_buddymagazine_bg_image_horizontal; ?> <?php echo $ne_buddymagazine_bg_image_attachment; ?>
	<?php } ?>

	<?php if(($ne_buddymagazine_bg_image != "")&&($ne_buddymagazine_bg_colour == "")) { ?>
	background: #5A5A5A url(<?php echo $ne_buddymagazine_bg_image; ?>) <?php echo $ne_buddymagazine_bg_image_repeat; ?> <?php echo $ne_buddymagazine_bg_image_vertical; ?> <?php echo $ne_buddymagazine_bg_image_horizontal; ?> <?php echo $ne_buddymagazine_bg_image_attachment; ?>
	<?php } ?>

	<?php if(($ne_buddymagazine_bg_image == "")&&($ne_buddymagazine_bg_colour == "")) { ?>
	background: #000000 url('<?php bloginfo('template_directory'); ?>/_inc/styles/pink_images/pink_background.jpg') no-repeat top center
	<?php } ?>
	;
	color: <?php if($ne_buddymagazine_text_colour == ""){ ?><?php echo "#666666"; } else { ?><?php echo $ne_buddymagazine_text_colour; ?><?php } ?>;
	font-family: <?php if($ne_buddymagazine_body_font == ""){ ?><?php echo "Arial, Helvetica, Sans-serif"; } else { ?><?php echo $ne_buddymagazine_body_font; ?><?php } ?>;
	font-weight: normal;
}

.profile form{
	background: <?php if($ne_buddymagazine_bg_colour == ""){ ?><?php echo "#000000"; } else { ?><?php echo $ne_buddymagazine_bg_colour; ?><?php } ?>;
}

#bp-navcontainer a{
border-bottom: 1px solid <?php if($ne_buddymagazine_border_colour == ""){ ?><?php echo "#333333"; } else { ?><?php echo $ne_buddymagazine_border_colour; ?><?php } ?>;}
#bp-nav li.current{
	background: <?php if($ne_buddymagazine_user_hover_background_colour == ""){ ?><?php echo "#333333"; } else { ?><?php echo $ne_buddymagazine_user_hover_background_colour; ?><?php } ?>;
    color: <?php if($ne_buddymagazine_userbar_hover_text_colour == ""){ ?><?php echo "#666666"; } else { ?><?php echo $ne_buddymagazine_userbar_hover_text_colour; ?><?php } ?>;
}

.bp-widget .avatar{
	border: 5px solid <?php if($ne_buddymagazine_border_colour == ""){ ?><?php echo "#333333"; } else { ?><?php echo $ne_buddymagazine_border_colour; ?><?php } ?>;
}

.bp-widget table {	color: <?php if($ne_buddymagazine_text_colour == ""){ ?><?php echo "#666666"; } else { ?><?php echo $ne_buddymagazine_text_colour; ?><?php } ?>;}

code {
	color: <?php if($ne_buddymagazine_code_text_colour == ""){ ?><?php echo "#666666"; } else { ?><?php echo $ne_buddymagazine_code_text_colour; ?><?php } ?>;
}

#content-about-site{
	background-color: <?php if($ne_buddymagazine_about_background_colour == ""){ ?><?php echo "#222222"; } else { ?><?php echo $ne_buddymagazine_about_background_colour; ?><?php } ?>;
}

.date{
	color: <?php if($ne_buddymagazine_post_date_colour == ""){ ?><?php echo "#ff0099"; } else { ?><?php echo $ne_buddymagazine_post_date_colour; ?><?php } ?>;
	background-color: <?php if($ne_buddymagazine_post_date_background_colour == ""){ ?><?php echo "#222222"; } else { ?><?php echo $ne_buddymagazine_post_date_background_colour; ?><?php } ?>;
}

#directory-wrapper{
	background-color: <?php if($ne_buddymagazine_directory_wrapper_background_colour == ""){ ?><?php echo "#000000"; } else { ?><?php echo $ne_buddymagazine_directory_wrapper_background_colour; ?><?php } ?>;
}

#footer{ border-top: 1px solid <?php if($ne_buddymagazine_footer_border_colour == ""){ ?><?php echo "#ff0099"; } else { ?><?php echo $ne_buddymagazine_footer_border_colour; ?><?php } ?>;
	background-color: <?php if($ne_buddymagazine_footer_background_colour == ""){ ?><?php echo ""; } else { ?><?php echo $ne_buddymagazine_footer_background_colour; ?><?php } ?>;
}
.featured-image{  background-color: <?php if($ne_buddymagazine_featured_background_colour == ""){ ?><?php echo "#000000"; } else { ?><?php echo $ne_buddymagazine_featured_background_colour; ?><?php } ?>;}

#featured-post-section{	background-color: <?php if($ne_buddymagazine_featured_background_colour == ""){ ?><?php echo "#000000"; } else { ?><?php echo $ne_buddymagazine_featured_background_colour; ?><?php } ?>;}

.feature-title{ background-color: <?php if($ne_buddymagazine_featured_title_background_colour == ""){ ?><?php echo "#222222"; } else { ?><?php echo $ne_buddymagazine_featured_title_background_colour; ?><?php } ?>;}

#global-forum-topic-list th { border-bottom: 1px solid <?php if($ne_buddymagazine_border_colour == ""){ ?><?php echo "#333333"; } else { ?><?php echo $ne_buddymagazine_border_colour; ?><?php } ?>;}

#global-forum-topic-list {	border-bottom: 1px solid <?php if($ne_buddymagazine_border_colour == ""){ ?><?php echo "#333333"; } else { ?><?php echo $ne_buddymagazine_border_colour; ?><?php } ?>;}

h1{
	color: <?php if($ne_buddymagazine_h1_colour == ""){ ?><?php echo "#ff0099"; } else { ?><?php echo $ne_buddymagazine_h1_colour; ?><?php } ?>;
		font-family: <?php if($ne_buddymagazine_headline_font == ""){ ?><?php echo "#Arial, Helvetica, Sans-serif"; } else { ?><?php echo $ne_buddymagazine_headline_font; ?><?php } ?>;
}

h2{
	color: <?php if($ne_buddymagazine_h2_colour == ""){ ?><?php echo "#cccccc"; } else { ?><?php echo $ne_buddymagazine_h2_colour; ?><?php } ?>;
	font-family: <?php if($ne_buddymagazine_headline_font == ""){ ?><?php echo "#Arial, Helvetica, Sans-serif"; } else { ?><?php echo $ne_buddymagazine_headline_font; ?><?php } ?>;
}

h3{
color: <?php if($ne_buddymagazine_h3_colour == ""){ ?><?php echo "#ff0099"; } else { ?><?php echo $ne_buddymagazine_h3_colour; ?><?php } ?>;
	font-family: <?php if($ne_buddymagazine_headline_font == ""){ ?><?php echo "#Arial, Helvetica, Sans-serif"; } else { ?><?php echo $ne_buddymagazine_headline_font; ?><?php } ?>;
}

h4{
color: <?php if($ne_buddymagazine_h4_colour == ""){ ?><?php echo "#ff0099"; } else { ?><?php echo $ne_buddymagazine_h4_colour; ?><?php } ?>;
border-bottom: 1px solid <?php if($ne_buddymagazine_h4_border_colour == ""){ ?><?php echo "#ff0099"; } else { ?><?php echo $ne_buddymagazine_h4_border_colour; ?><?php } ?>;
	font-family: <?php if($ne_buddymagazine_headline_font == ""){ ?><?php echo "#Arial, Helvetica, Sans-serif"; } else { ?><?php echo $ne_buddymagazine_headline_font; ?><?php } ?>;
}
.post-image{
background-color: <?php if($ne_buddymagazine_featured_image_background_colour == ""){ ?><?php echo "#000000"; } else { ?><?php echo $ne_buddymagazine_featured_image_background_colour; ?><?php } ?>;
}
h5{
color: <?php if($ne_buddymagazine_h5_colour == ""){ ?><?php echo "#ff0099"; } else { ?><?php echo $ne_buddymagazine_h5_colour; ?><?php } ?>;
	font-family: <?php if($ne_buddymagazine_headline_font == ""){ ?><?php echo "#Arial, Helvetica, Sans-serif"; } else { ?><?php echo $ne_buddymagazine_headline_font; ?><?php } ?>;
}

h6{
color: <?php if($ne_buddymagazine_h6_colour == ""){ ?><?php echo "#ff0099"; } else { ?><?php echo $ne_buddymagazine_h6_colour; ?><?php } ?>;
	font-family: <?php if($ne_buddymagazine_headline_font == ""){ ?><?php echo "#Arial, Helvetica, Sans-serif"; } else { ?><?php echo $ne_buddymagazine_headline_font; ?><?php } ?>;
}

#header{
		background-color: <?php if($ne_buddymagazine_header_background_colour == ""){ ?><?php echo ""; } else { ?><?php echo $ne_buddymagazine_header_background_colour; ?><?php } ?>;
}

a.comment-reply-link, div#item-header h4 span.highlight span, .button, a.button, input[type="button"], input[type="reset"], input[type="submit"], #post-wrapper input[type="submit"], #post-wrapper input[type="reset"], #member-wrapper input[type="submit"], #registration-wrapper input[type="submit"]{
	background-color:<?php if($ne_buddymagazine_form_submit_background_colour == ""){ ?><?php echo "#222222"; } else { ?><?php echo $ne_buddymagazine_form_submit_background_colour; ?><?php } ?>;
	border: 1px solid <?php if($ne_buddymagazine_form_submit_border_colour == ""){ ?><?php echo "#333333"; } else { ?><?php echo $ne_buddymagazine_form_submit_border_colour; ?><?php } ?>;
	color: <?php if($ne_buddymagazine_form_submit_text_colour == ""){ ?><?php echo "#cccccc"; } else { ?><?php echo $ne_buddymagazine_form_submit_text_colour; ?><?php } ?>;
		text-decoration: none;
}

input[type="text"], #post-wrapper input[type="text"], #member-wrapper input[type="text"], #registration-wrapper input[type="text"]{
	background-color:<?php if($ne_buddymagazine_form_background_colour == ""){ ?><?php echo "#222222"; } else { ?><?php echo $ne_buddymagazine_form_background_colour; ?><?php } ?>;
	border: 1px solid <?php if($ne_buddymagazine_form_border_colour == ""){ ?><?php echo "#333333"; } else { ?><?php echo $ne_buddymagazine_form_border_colour; ?><?php } ?>;
	color: <?php if($ne_buddymagazine_form_text_colour == ""){ ?><?php echo "#cccccc"; } else { ?><?php echo $ne_buddymagazine_form_text_colour; ?><?php } ?>;
}

input[type="search"], #post-wrapper input[type="search"], #member-wrapper input[type="search"], #registration-wrapper input[type="search"]{
	background-color:<?php if($ne_buddymagazine_form_background_colour == ""){ ?><?php echo "#222222"; } else { ?><?php echo $ne_buddymagazine_form_background_colour; ?><?php } ?>;
	border: 1px solid <?php if($ne_buddymagazine_form_border_colour == ""){ ?><?php echo "#333333"; } else { ?><?php echo $ne_buddymagazine_form_border_colour; ?><?php } ?>;
	color: <?php if($ne_buddymagazine_form_text_colour == ""){ ?><?php echo "#cccccc"; } else { ?><?php echo $ne_buddymagazine_form_text_colour; ?><?php } ?>;
}

input[type="password"], #post-wrapper input[type="password"], #member-wrapper input[type="password"], #registration-wrapper input[type="password"]{
	background-color:<?php if($ne_buddymagazine_form_background_colour == ""){ ?><?php echo "#222222"; } else { ?><?php echo $ne_buddymagazine_form_background_colour; ?><?php } ?>;
	border: 1px solid <?php if($ne_buddymagazine_form_border_colour == ""){ ?><?php echo "#333333"; } else { ?><?php echo $ne_buddymagazine_form_border_colour; ?><?php } ?>;
	color: <?php if($ne_buddymagazine_form_text_colour == ""){ ?><?php echo "#cccccc"; } else { ?><?php echo $ne_buddymagazine_form_text_colour; ?><?php } ?>;
}

label, #post-wrapper label, #member-wrapper label, #registration-wrapper label{ 	color:<?php if($ne_buddymagazine_form_label_colour == ""){ ?><?php echo "#ff0099"; } else { ?><?php echo $ne_buddymagazine_form_label_colour; ?><?php } ?>;}

#member-content .error p {
	background-color: <?php if($ne_buddymagazine_member_error_background_colour == ""){ ?><?php echo "#222222"; } else { ?><?php echo $ne_buddymagazine_member_error_background_colour; ?><?php } ?>;
	color: <?php if($ne_buddymagazine_member_error_text_colour == ""){ ?><?php echo "#ff0099"; } else { ?><?php echo $ne_buddymagazine_member_error_text_colour; ?><?php } ?>;
	border-top: 3px solid <?php if($ne_buddymagazine_border_colour == ""){ ?><?php echo "#333333"; } else { ?><?php echo $ne_buddymagazine_border_colour; ?><?php } ?>;
	border-bottom: 3px solid <?php if($ne_buddymagazine_border_colour == ""){ ?><?php echo "#333333"; } else { ?><?php echo $ne_buddymagazine_border_colour; ?><?php } ?>;
}

#member-content .info p {
	background-color: <?php if($ne_buddymagazine_member_info_background_colour == ""){ ?><?php echo "#222222"; } else { ?><?php echo $ne_buddymagazine_member_info_background_colour; ?><?php } ?>;
    color: <?php if($ne_buddymagazine_member_info_text_colour == ""){ ?><?php echo "#222222"; } else { ?><?php echo $ne_buddymagazine_member_info_text_colour; ?><?php } ?>;
	border-top: 3px solid <?php if($ne_buddymagazine_border_colour == ""){ ?><?php echo "#333333"; } else { ?><?php echo $ne_buddymagazine_border_colour; ?><?php } ?>;
	border-bottom: 3px solid <?php if($ne_buddymagazine_border_colour == ""){ ?><?php echo "#333333"; } else { ?><?php echo $ne_buddymagazine_border_colour; ?><?php } ?>;
}

#member-content .profile-fields tr { 	border-bottom: 1px solid <?php if($ne_buddymagazine_border_colour == ""){ ?><?php echo "#333333"; } else { ?><?php echo $ne_buddymagazine_border_colour; ?><?php } ?>;}

#member-content .updated p {
	background-color: <?php if($ne_buddymagazine_member_updated_background_colour == ""){ ?><?php echo "#222222"; } else { ?><?php echo $ne_buddymagazine_member_updated_background_colour; ?><?php } ?>;
	color: <?php if($ne_buddymagazine_member_updated_text_colour == ""){ ?><?php echo "#ff0099"; } else { ?><?php echo $ne_buddymagazine_member_updated_text_colour; ?><?php } ?>;
	border-top: 3px solid <?php if($ne_buddymagazine_border_colour == ""){ ?><?php echo "#333333"; } else { ?><?php echo $ne_buddymagazine_border_colour; ?><?php } ?>;
	border-bottom: 3px solid <?php if($ne_buddymagazine_border_colour == ""){ ?><?php echo "#333333"; } else { ?><?php echo $ne_buddymagazine_border_colour; ?><?php } ?>;
}

#member-wrapper, #registration-wrapper{	background-color: <?php if($ne_buddymagazine_member_wrapper_background_colour == ""){ ?><?php echo "#000000"; } else { ?><?php echo $ne_buddymagazine_member_wrapper_background_colour; ?><?php } ?>;}

.meta{
	color: <?php if($ne_buddymagazine_post_meta_colour == ""){ ?><?php echo "#ff0099"; } else { ?><?php echo $ne_buddymagazine_post_meta_colour; ?><?php } ?>;
}

.navigation{
	<?php if(($ne_buddymagazine_navigation_background_image == "")&&($ne_buddymagazine_navigation_background_colour != "")) { ?>
	background: <?php echo $ne_buddymagazine_navigation_background_colour; ?>
	<?php } ?>

	<?php if(($ne_buddymagazine_navigation_background_image != "")&&($ne_buddymagazine_navigation_background_colour != "")) { ?>
	background: <?php echo $ne_buddymagazine_navigation_background_colour; ?> url(<?php echo $ne_buddymagazine_navigation_background_image; ?>) repeat-x
	<?php } ?>

	<?php if(($ne_buddymagazine_navigation_background_image != "")&&($ne_buddymagazine_navigation_background_colour == "")) { ?>
	background: url(<?php echo $ne_buddymagazine_navigation_background_image; ?>) repeat-x
	<?php } ?>

	<?php if(($ne_buddymagazine_navigation_background_image == "")&&($ne_buddymagazine_navigation_background_colour == "")) { ?>
	background: url('<?php bloginfo('template_directory'); ?>/_inc/styles/pink_images/navigation_background.jpg') repeat-x
	<?php } ?>
	;
}

ol.commentlist li, #commentpost { background:<?php if($ne_buddymagazine_comment_list_background_colour == ""){ ?><?php echo "#222222"; } else { ?><?php echo $ne_buddymagazine_comment_list_background_colour; ?><?php } ?>;
border: 5px solid <?php if($ne_buddymagazine_border_colour == ""){ ?><?php echo "#333333"; } else { ?><?php echo $ne_buddymagazine_border_colour; ?><?php } ?>;}

ol.commentlist ul.children li.alt { 	background: <?php if($ne_buddymagazine_comment_child_colour == ""){ ?><?php echo "#111111"; } else { ?><?php echo $ne_buddymagazine_comment_child_colour; ?><?php } ?>;}

#optionsbar img.avatar{	border: 5px solid <?php if($ne_buddymagazine_border_colour == ""){ ?><?php echo "#333333"; } else { ?><?php echo $ne_buddymagazine_border_colour; ?><?php } ?>;}

#options-nav li a{ border-bottom: 1px solid <?php if($ne_buddymagazine_border_colour == ""){ ?><?php echo "#333333"; } else { ?><?php echo $ne_buddymagazine_border_colour; ?><?php } ?>;}

#options-nav li.current a{
	background-color: <?php if($ne_buddymagazine_options_hover_background_colour == ""){ ?><?php echo "#111111"; } else { ?><?php echo $ne_buddymagazine_options_hover_background_colour; ?><?php } ?>;
	color: <?php if($ne_buddymagazine_options_hover_text_colour == ""){ ?><?php echo "#ff0099"; } else { ?><?php echo $ne_buddymagazine_options_hover_text_colour; ?><?php } ?>;
}

#post-wrapper{ 	background-color: <?php if($ne_buddymagazine_post_wrapper_background_colour == ""){ ?><?php echo "#000000"; } else { ?><?php echo $ne_buddymagazine_post_wrapper_background_colour; ?><?php } ?>;}

pre {
	background: <?php if($ne_buddymagazine_pre_background_colour == ""){ ?><?php echo "#222222"; } else { ?><?php echo $ne_buddymagazine_pre_background_colour; ?><?php } ?>;
	color: <?php if($ne_buddymagazine_pre_text_colour == ""){ ?><?php echo "#666666"; } else { ?><?php echo $ne_buddymagazine_pre_text_colour; ?><?php } ?>;
	border: 1px solid <?php if($ne_buddymagazine_border_colour == ""){ ?><?php echo "#333333"; } else { ?><?php echo $ne_buddymagazine_border_colour; ?><?php } ?>;
}

#section-marker{
	color: 	<?php if($ne_buddymagazine_section_text_colour == ""){ ?><?php echo "#ffffff"; } else { ?><?php echo $ne_buddymagazine_section_text_colour; ?><?php } ?>;
	background-color: <?php if($ne_buddymagazine_section_background_colour == ""){ ?><?php echo "#ff0099"; } else { ?><?php echo $ne_buddymagazine_section_background_colour; ?><?php } ?>;
}

select, #post-wrapper select, #member-wrapper select, #registration-wrapper select{
	background-color:<?php if($ne_buddymagazine_form_background_colour == ""){ ?><?php echo "#222222"; } else { ?><?php echo $ne_buddymagazine_form_background_colour; ?><?php } ?>;
	border: 1px solid <?php if($ne_buddymagazine_form_border_colour == ""){ ?><?php echo "#333333"; } else { ?><?php echo $ne_buddymagazine_form_border_colour; ?><?php } ?>;
	color: <?php if($ne_buddymagazine_form_text_colour == ""){ ?><?php echo "#cccccc"; } else { ?><?php echo $ne_buddymagazine_form_text_colour; ?><?php } ?>;
}

#site-wrapper{
		background-color:<?php if($ne_buddymagazine_wrapper_background_colour == ""){ ?><?php echo ""; } else { ?><?php echo $ne_buddymagazine_wrapper_background_colour; ?><?php } ?>;
}

.sf-menu a, .sf-menu a:visited  {  color:<?php if($ne_buddymagazine_navigation_link_colour == ""){ ?><?php echo "#ffffff"; } else { ?><?php echo $ne_buddymagazine_navigation_link_colour; ?><?php } ?>;}

.sf-menu li {
 background:<?php if($ne_buddymagazine_navigation_dropdown_background_colour == ""){ ?><?php echo ""; } else { ?><?php echo $ne_buddymagazine_navigation_dropdown_background_colour; ?><?php } ?>;
}

.sf-menu li li {
  background:<?php if($ne_buddymagazine_navigation_dropdown_background_colour == ""){ ?><?php echo "#222222"; } else { ?><?php echo $ne_buddymagazine_navigation_dropdown_background_colour; ?><?php } ?>;
}

.sf-menu li li li {
  background:<?php if($ne_buddymagazine_navigation_dropdown_background_colour == ""){ ?><?php echo "#222222"; } else { ?><?php echo $ne_buddymagazine_navigation_dropdown_background_colour; ?><?php } ?>;
}

.sf-menu li:hover, .sf-menu li.current, .sf-menu li.current a:visited, .sf-menu li.current_page_item, .sf-menu li.current_page_item a:visited, .sf-menu li.sfHover,
.sf-menu a:focus, .sf-menu a:hover, .sf-menu a:active {
  color:<?php if($ne_buddymagazine_navigation_link_hover_colour == ""){ ?><?php echo "#ff0099"; } else { ?><?php echo $ne_buddymagazine_navigation_link_hover_colour; ?><?php } ?>;
	background:<?php if($ne_buddymagazine_navigation_link_hover_background_colour == ""){ ?><?php echo "#333333"; } else { ?><?php echo $ne_buddymagazine_navigation_link_hover_background_colour; ?><?php } ?>;
}

textarea, #post-wrapper textarea, #member-wrapper textarea, #registration-wrapper textarea{
	background-color:<?php if($ne_buddymagazine_form_background_colour == ""){ ?><?php echo "#222222"; } else { ?><?php echo $ne_buddymagazine_form_background_colour; ?><?php } ?>;
	border: 1px solid <?php if($ne_buddymagazine_form_border_colour == ""){ ?><?php echo "#333333"; } else { ?><?php echo $ne_buddymagazine_form_border_colour; ?><?php } ?>;
	color: <?php if($ne_buddymagazine_form_text_colour == ""){ ?><?php echo "#cccccc"; } else { ?><?php echo $ne_buddymagazine_form_text_colour; ?><?php } ?>;
}

#userbar p.avatar, #optionsbar  p.avatar {
	background-color: <?php if($ne_buddymagazine_avatar_background_colour == ""){ ?><?php echo "#333333"; } else { ?><?php echo $ne_buddymagazine_avatar_background_colour; ?><?php } ?>;
	border: 1px solid <?php if($ne_buddymagazine_border_colour == ""){ ?><?php echo "#333333"; } else { ?><?php echo $ne_buddymagazine_border_colour; ?><?php } ?>;
}

.widget-error{
	background-color: <?php if($ne_buddymagazine_widget_background_colour == ""){ ?><?php echo "#222222"; } else { ?><?php echo $ne_buddymagazine_widget_background_colour; ?><?php } ?>;
	border-top: 1px solid <?php if($ne_buddymagazine_border_colour == ""){ ?><?php echo "#333333"; } else { ?><?php echo $ne_buddymagazine_border_colour; ?><?php } ?>;
	border-bottom: 1px solid <?php if($ne_buddymagazine_border_colour == ""){ ?><?php echo "#333333"; } else { ?><?php echo $ne_buddymagazine_border_colour; ?><?php } ?>;
	color: <?php if($ne_buddymagazine_widget_text_colour == ""){ ?><?php echo "#ff0099"; } else { ?><?php echo $ne_buddymagazine_widget_text_colour; ?><?php } ?>;
}

.wp-caption {
	border: 1px solid <?php if($ne_buddymagazine_border_colour == ""){ ?><?php echo "#333333"; } else { ?><?php echo $ne_buddymagazine_border_colour; ?><?php } ?>;
	background-color: <?php if($ne_buddymagazine_wpcaption_background_colour == ""){ ?><?php echo "#222222"; } else { ?><?php echo $ne_buddymagazine_wpcaption_background_colour; ?><?php } ?>;
}

.wp-caption p.wp-caption-text { 	color: <?php if($ne_buddymagazine_wpcaption_text_colour == ""){ ?><?php echo "#666666"; } else { ?><?php echo $ne_buddymagazine_wpcaption_text_colour; ?><?php } ?>;}