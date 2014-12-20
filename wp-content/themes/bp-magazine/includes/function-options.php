<?php

function _g($str)
{
return __($str, 'option-page');
}

/* set up basic settings for Buddypress magazine*/
$themename = "Buddypress Magazine";
$themeversion = "1.0";
$shortname = "ne";
$shortprefix = "_buddymagazine_";
/* get categories so can set them */
$ne_categories_obj = get_categories('hide_empty=0');
$ne_categories = array();
foreach ($ne_categories_obj as $ne_cat) {
	$ne_categories[$ne_cat->cat_ID] = $ne_cat->category_nicename;
}
$categories_tmp = array_unshift($ne_categories, "Select a category:");
/* end of get categories */
/* set up options array*/
$options = array (

	array( 	"name" => __("Select a category for your main image", "bp_magazine"),
			"id" => $shortname . $shortprefix . "feature_cat",
			"box"=> "1",
			"inblock" => "homepage",
			"type" => "select",
			"std" => "Select a category:",
			"options" => $ne_categories),

	array( 	"name" => __("Select a category for your home posts", "bp_magazine"),
			"id" => $shortname . $shortprefix . "home_cat",
			"box"=> "1",
			"inblock" => "homepage",
			"type" => "select",
			"std" => "Select a category:",
			"options" => $ne_categories),

	array("name" => __("Select number of home posts (2 per row)", "bp_magazine"),
			"id" => $shortname . $shortprefix . "home_number",
			"box"=> "1",
			"inblock" => "homepage",
			"type" => "select",
			"std" => "Pick a number",
			"options" => array("2", "4", "6", "8")),

	array("name" => __("Enter a title about your magazine", "bp_magazine"),
            "id" => $shortname . $shortprefix . "about_title",
			"box"=> "1",
			"inblock" => "homepage",
            "type" => "textarea",
			"std" => "About magazine title"),

	array("name" => __("Enter some text for about your magazine", "bp_magazine"),
            "id" => $shortname . $shortprefix . "about_description",
			"box"=> "1",
			"inblock" => "homepage",
            "type" => "textarea",
			"std" => "Something about my magazine"),

	array("name" => __("Enter a title for non members", "bp_magazine"),
		     "id" => $shortname . $shortprefix . "join_title",
			"box"=> "1",
			"inblock" => "homepage",
		     "type" => "textarea",
			"std" => "Join us now"),

	array("name" => __("Enter some text for non members", "bp_magazine"),
		       "id" => $shortname . $shortprefix . "join_message",
					"box"=> "1",
					"inblock" => "homepage",
		            "type" => "textarea",
					"std" => "Why not join us we're great"),

	array("name" => __("Select a title for members", "bp_magazine"),
				            "id" => $shortname . $shortprefix . "members_title",
							"box"=> "1",
							"inblock" => "homepage",
				            "type" => "text",
							"std" => "Great to see you again"),

		array("name" => __("Enter some text for your members", "bp_magazine"),
				            "id" => $shortname . $shortprefix . "members_message",
							"box"=> "1",
							"inblock" => "homepage",
				            "type" => "textarea",
							"std" => "We love our members"),

	array("name" => __("Select display of featured image (if above size it will center and show a portion)", "bp_magazine"),
			"id" => $shortname . $shortprefix . "feature_image",
			"box"=> "1",
			"inblock" => "homepage",
		    "type" => "select",
			"std" => "Pick a size",
			"options" => array("medium", "large")),

	array("name" => __("Select display of post images (if above size it will center and show a portion)", "bp_magazine"),
			"id" => $shortname . $shortprefix . "style_post_image",
			"box"=> "1",
			"inblock" => "homepage",
		    "type" => "select",
			"std" => "Pick a size",
			"options" => array("thumbnail", "medium", "large")),


			array("name" => __("Do you want to use the slideshow on the front?", "bp_magazine"),
					"id" => $shortname . $shortprefix . "slideshowon",
					"box"=> "1",
					"inblock" => "homepage",
				    "type" => "select",
					"std" => "Select yes or no",
					"options" => array("yes", "no")),

					array("name" => __("Select your slideshow speed in milliseconds? *(default is 3000 ms)", "bp_magazine"),
							"id" => $shortname . $shortprefix . "slideshow_speed",
							"box"=> "1",
							"inblock" => "homepage",
						    "type" => "select",
							"std" => "Select yes or no",
							"options" => array("1000", "3000", "5000", "7000", "9000")),

									array("name" => __("Select number of posts to show in slideshow", "bp_magazine"),
											"id" => $shortname . $shortprefix . "slideshow_number",
											"box"=> "1",
											"inblock" => "homepage",
										    "type" => "select",
											"std" => "Select yes or no",
											"options" => array("2", "4", "6", "8", "10", "Unlimited")),


	array("name" => __("Enter a title for your magazine", "bp_magazine"),
	        "id" => $shortname . $shortprefix . "site_title",
			"box"=> "3",
			"inblock" => "sitesettings",
			"type" => "textarea",
			"std" => "Magazine title"),

	array("name" => __("Enter a slogan for your magazine", "bp_magazine"),
			        "id" => $shortname . $shortprefix . "site_slogan",
					"box"=> "3",
					"inblock" => "sitesettings",
					"type" => "textarea",
					"std" => "Site slogan goes here"),

		array(
					"name" => __("Insert your <strong>background image</strong> full url here<br /><em>*you can upload your image in <a href='media-new.php'>media panel</a> and paste the url here.</em>", "bp_magazine"),
					"box" => "3",
					"inblock" => "styling",
					"id" => $shortname . $shortprefix . "bg_image",
					"std" => "",
					"type" => "text"),

					array(
					"name" => __("Background Images Repeat", "bp_magazine"),
					"id" => $shortname . $shortprefix . "bg_image_repeat",
					"box" => "3",
					"inblock" => "styling",
					"type" => "select",
					"std" => "no-repeat",
					"options" => array("no-repeat", "repeat", "repeat-x", "repeat-y")),

					array(
					"name" => __("Background Images Attachment", "bp_magazine"),
					"box" => "3",
					"id" => $shortname . $shortprefix . "bg_image_attachment",
					"inblock" => "styling",
					"type" => "select",
					"std" => "fixed",
					"options" => array("fixed", "scroll")),

					array(
					"name" => __("Background Images Horizontal Position", "bp_magazine"),
					"box" => "3",
					"id" => $shortname . $shortprefix . "bg_image_horizontal",
					"inblock" => "styling",
					"type" => "select",
					"std" => "left",
					"options" => array("left", "center", "right")),


					array(
					"name" => __("Background Images Vertical Position", "bp_magazine"),
					"box" => "3",
					"id" => $shortname . $shortprefix . "bg_image_vertical",
					"inblock" => "styling",
					"type" => "select",
					"std" => "top",
					"options" => array("top", "center", "bottom")),

							array(
							"name" => __("Insert your <strong>logo</strong> full url here<br /><em>*you can upload your image in <a href='media-new.php'>media panel</a> and paste the url here.</em>", "bp_magazine"),
							"box" => "3",
							"inblock" => "styling",
							"id" => $shortname . $shortprefix . "logo",
							"std" => "",
							"type" => "text"),

						array(
						"name" => __("Choose your body font", "bp_magazine"),
							"box" => "3",
						"id" => $shortname . $shortprefix . "body_font",
						"type" => "select",
						"inblock" => "styling",
						"std" => "Arial, sans-serif",
									"options" => array(
						            "Lucida Grande, Lucida Sans, sans-serif",
						            "Arial, sans-serif",
						            "Verdana, sans-serif",
						            "Trebuchet MS, sans-serif",
						            "Fertigo, serif",
						            "Georgia, serif",
						            "Cambria, Georgia, serif",
						            "Tahoma, sans-serif",
						            "Helvetica, Arial, sans-serif",
						            "Corpid, Corpid Bold, sans-serif",
						            "Century Gothic, Century, sans-serif",
						            "Palatino Linotype, Times New Roman, serif",
						            "Garamond, Georgia, serif",
						            "Caslon Book BE, Caslon, Arial Narrow",
						            "Arial Rounded Bold, Arial",
						            "Arial Narrow, Arial",
						            "Myriad Pro, Calibri, sans-serif",
						            "Candara, Calibri, Lucida Grande",
						            "Univers LT 55, Univers LT Std 55, Univers, sans-serif",
						            "Ronda, Ronda Light, Century Gothic",
						            "Century, Times New Roman, serif",
						            "Courier New, Courier, monospace",
						            "Walbaum LT Roman, Walbaum, Times New Roman",
						            "Dax, Dax-Regular, Dax-Bold, Trebuchet MS",
						            "VAG Round, Arial Rounded Bold, sans-serif",
						            "Humana Sans ITC, Humana Sans Md ITC, Lucida Grande",
						            "Qlassik Medium, Qlassik Bold, Lucida Grande",
						            "TradeGothic LT, Lucida Sans, Lucida Grande",
						            "Cocon, Cocon-Light, sans-serif",
						            "Frutiger, Frutiger LT Std 55 Roman, tahoma",
						            "Futura LT Book, Century Gothic, sans-serif",
						            "Steinem, Cocon, Cambria",
						            "Delicious, Trebuchet MS, sans-serif",
						            "Helvetica 65 Medium, Helvetica Neue, Helvetica Bold, sans-serif",
						            "Helvetica Neue, Helvetica, Helvetica-Normal, sans-serif",
						            "Helvetica Rounded, Arial Rounded Bold, VAGRounded BT, sans-serif",
						            "Decker, sans-serif",
						            "Mrs Eaves OT, Georgia, Cambria, serif",
						            "Anivers, Lucida Sans, Lucida Grande",
						            "Geneva, sans-serif",
						            "Trajan, Trajan Pro, serif",
						            "FagoCo, Calibri, Lucida Grande",
						            "Meta, Meta Bold , Meta Medium, sans-serif",
						            "Chocolate, Segoe UI, Seips",
						            "Ronda, Ronda Light, Century Gothic",
						            "DIN, DINPro-Regular, DINPro-Medium, sans-serif",
						            "Gotham, Georgia, serif"
						            )
						            ),

								array(
								"name" => __("Choose your headline font", "bp_magazine"),
									"box" => "3",
								"id" => $shortname . $shortprefix . "headline_font",
								"type" => "select",
								"inblock" => "styling",
								"std" => "Arial, sans-serif",
											"options" => array(
								            "Lucida Grande, Lucida Sans, sans-serif",
								            "Arial, sans-serif",
								            "Verdana, sans-serif",
								            "Trebuchet MS, sans-serif",
								            "Fertigo, serif",
								            "Georgia, serif",
								            "Cambria, Georgia, serif",
								            "Tahoma, sans-serif",
								            "Helvetica, Arial, sans-serif",
								            "Corpid, Corpid Bold, sans-serif",
								            "Century Gothic, Century, sans-serif",
								            "Palatino Linotype, Times New Roman, serif",
								            "Garamond, Georgia, serif",
								            "Caslon Book BE, Caslon, Arial Narrow",
								            "Arial Rounded Bold, Arial",
								            "Arial Narrow, Arial",
								            "Myriad Pro, Calibri, sans-serif",
								            "Candara, Calibri, Lucida Grande",
								            "Univers LT 55, Univers LT Std 55, Univers, sans-serif",
								            "Ronda, Ronda Light, Century Gothic",
								            "Century, Times New Roman, serif",
								            "Courier New, Courier, monospace",
								            "Walbaum LT Roman, Walbaum, Times New Roman",
								            "Dax, Dax-Regular, Dax-Bold, Trebuchet MS",
								            "VAG Round, Arial Rounded Bold, sans-serif",
								            "Humana Sans ITC, Humana Sans Md ITC, Lucida Grande",
								            "Qlassik Medium, Qlassik Bold, Lucida Grande",
								            "TradeGothic LT, Lucida Sans, Lucida Grande",
								            "Cocon, Cocon-Light, sans-serif",
								            "Frutiger, Frutiger LT Std 55 Roman, tahoma",
								            "Futura LT Book, Century Gothic, sans-serif",
								            "Steinem, Cocon, Cambria",
								            "Delicious, Trebuchet MS, sans-serif",
								            "Helvetica 65 Medium, Helvetica Neue, Helvetica Bold, sans-serif",
								            "Helvetica Neue, Helvetica, Helvetica-Normal, sans-serif",
								            "Helvetica Rounded, Arial Rounded Bold, VAGRounded BT, sans-serif",
								            "Decker, sans-serif",
								            "Mrs Eaves OT, Georgia, Cambria, serif",
								            "Anivers, Lucida Sans, Lucida Grande",
								            "Geneva, sans-serif",
								            "Trajan, Trajan Pro, serif",
								            "FagoCo, Calibri, Lucida Grande",
								            "Meta, Meta Bold , Meta Medium, sans-serif",
								            "Chocolate, Segoe UI, Seips",
								            "Ronda, Ronda Light, Century Gothic",
								            "DIN, DINPro-Regular, DINPro-Medium, sans-serif",
								            "Gotham, Georgia, serif"
								            )
								            ),


					array(
					"name" => __("Show Site Title", "bp_magazine"),
					"box" => "2",
					"id" => $shortname . $shortprefix . "mag_show_title",
					"inblock" => "styling",
					"type" => "select",
					"std" => "top",
					"options" => array("yes", "no")),

					array(
					"name" => __("Show Tagline", "bp_magazine"),
					"box" => "2",
					"id" => $shortname . $shortprefix . "mag_show_tagline",
					"inblock" => "styling",
					"type" => "select",
					"std" => "top",
					"options" => array("yes", "no")),




					//site wide
					//background colour:
					array(
						"name" => __("Choose your background colour", "bp_magazine"),
						"id" => $shortname . $shortprefix . "bg_colour",
							"box" => "2",
						"inblock" => "colour",
						"std" => "",
						"type" => "colourpicker"),


					//h1-h6
					array(
						"name" => __("Choose your h1 colour", "bp_magazine"),
						"id" => $shortname . $shortprefix . "h1_colour",
							"box" => "2",
						"inblock" => "colour",
						"std" => "",
						"type" => "colourpicker"),

					array(
						"name" => __("Choose your h2 colour", "bp_magazine"),
						"id" => $shortname . $shortprefix . "h2_colour",
						"box" => "2",
						"inblock" => "colour",
						"std" => "",
						"type" => "colourpicker"),

					array(
						"name" => __("Choose your h3 colour", "bp_magazine"),
						"id" => $shortname . $shortprefix . "h3_colour",
						"box" => "2",
						"inblock" => "colour",
						"std" => "",
						"type" => "colourpicker"),

					array(
						"name" => __("Choose your h4 colour", "bp_magazine"),
						"id" => $shortname . $shortprefix . "h4_colour",
						"box" => "2",
						"inblock" => "colour",
						"std" => "",
						"type" => "colourpicker"),

					array(
						"name" => __("Choose your h4 border colour", "bp_magazine"),
						"id" => $shortname . $shortprefix . "h4_border_colour",
						"box" => "2",
						"inblock" => "colour",
						"std" => "",
						"type" => "colourpicker"),

					array(
						"name" => __("Choose your h5 colour", "bp_magazine"),
						"id" => $shortname . $shortprefix . "h5_colour",
						"box" => "2",
						"inblock" => "colour",
						"std" => "",
						"type" => "colourpicker"),

					array(
						"name" => __("Choose your h6 colour", "bp_magazine"),
						"id" => $shortname . $shortprefix . "h6_colour",
						"box" => "2",
						"inblock" => "colour",
						"std" => "",
						"type" => "colourpicker"),

					//links
					array(
						"name" => __("Link colour", "bp_magazine"),
						"id" => $shortname . $shortprefix . "link_colour",
							"box" => "2",
						"inblock" => "colour",
						"std" => "",
						"type" => "colourpicker"),

					//hover
					array(
						"name" => __("Link hover colour", "bp_magazine"),
						"id" => $shortname . $shortprefix . "link_hover_colour",
							"box" => "2",
						"inblock" => "colour",
						"std" => "",
						"type" => "colourpicker"),

					//visited
					array(
						"name" => __("Link visited colour", "bp_magazine"),
						"id" => $shortname . $shortprefix . "link_visited_colour",
							"box" => "2",
						"inblock" => "colour",
						"std" => "",
						"type" => "colourpicker"),

					//current
					array(
						"name" => __("Link current colour", "bp_magazine"),
						"id" => $shortname . $shortprefix . "link_current_colour",
						"box" => "2",
						"inblock" => "colour",
						"std" => "",
						"type" => "colourpicker"),

					//p (text colour)
					array(
						"name" => __("Text colour", "bp_magazine"),
						"id" => $shortname . $shortprefix . "text_colour",
							"box" => "2",
						"inblock" => "colour",
						"std" => "",
						"type" => "colourpicker"),

							array(
								"name" => __("Site wrapper background colour", "bp_magazine"),
								"id" => $shortname . $shortprefix . "wrapper_background_colour",
								"box" => "2",
								"inblock" => "colour",
								"std" => "",
								"type" => "colourpicker"),

					//layout
					//featured post background colour
					array(
						"name" => __("Featured image background colour", "bp_magazine"),
						"id" => $shortname . $shortprefix . "featured_image_background_colour",
						"box" => "2",
						"inblock" => "colour",
						"std" => "",
						"type" => "colourpicker"),

								array(
									"name" => __("Featured image post title background colour", "bp_magazine"),
									"id" => $shortname . $shortprefix . "featured_title_background_colour",
									"box" => "2",
									"inblock" => "colour",
									"std" => "",
									"type" => "colourpicker"),

						array(
										"name" => __("Featured posts background colour", "bp_magazine"),
										"id" => $shortname . $shortprefix . "featured_background_colour",
										"box" => "2",
										"inblock" => "colour",
										"std" => "",
										"type" => "colourpicker"),
					//about site background colour
					array(
						"name" => __("About site background colour", "bp_magazine"),
						"id" => $shortname . $shortprefix . "about_background_colour",
						"box" => "2",
						"inblock" => "colour",
						"std" => "",
						"type" => "colourpicker"),


					//footer border colour
					array(
						"name" => __("Footer border colour", "bp_magazine"),
						"id" => $shortname . $shortprefix . "footer_border_colour",
						"box" => "2",
						"inblock" => "colour",
						"std" => "",
						"type" => "colourpicker"),

						array(
							"name" => __("Footer background colour", "bp_magazine"),
							"id" => $shortname . $shortprefix . "footer_background_colour",
							"box" => "2",
							"inblock" => "colour",
							"std" => "",
							"type" => "colourpicker"),

						array(
							"name" => __("Header background colour", "bp_magazine"),
											"id" => $shortname . $shortprefix . "header_background_colour",
											"box" => "2",
											"inblock" => "colour",
											"std" => "",
											"type" => "colourpicker"),


					//post wrapper background colour
					array(
						"name" => __("Post wrapper background colour", "bp_magazine"),
						"id" => $shortname . $shortprefix . "post_wrapper_background_colour",
						"box" => "2",
						"inblock" => "colour",
						"std" => "",
						"type" => "colourpicker"),

					//directory wrapper background colour
					array(
						"name" => __("Directory wrapper background colour", "bp_magazine"),
						"id" => $shortname . $shortprefix . "directory_wrapper_background_colour",
						"box" => "2",
						"inblock" => "colour",
						"std" => "",
						"type" => "colourpicker"),

						array(
							"name" => __("Member wrapper background colour", "bp_magazine"),
							"id" => $shortname . $shortprefix . "member_wrapper_background_colour",
							"box" => "2",
							"inblock" => "colour",
							"std" => "",
							"type" => "colourpicker"),

					//post date text
					array(
						"name" => __("Post date text colour", "bp_magazine"),
						"id" => $shortname . $shortprefix . "post_date_colour",
						"box" => "2",
						"inblock" => "colour",
						"std" => "",
						"type" => "colourpicker"),

					//post date background colour
					array(
						"name" => __("Post date background colour", "bp_magazine"),
						"id" => $shortname . $shortprefix . "post_date_background_colour",
						"box" => "2",
						"inblock" => "colour",
						"std" => "",
						"type" => "colourpicker"),

					//meta text
					array(
						"name" => __("Post meta colour", "bp_magazine"),
						"id" => $shortname . $shortprefix . "post_meta_colour",
						"box" => "2",
						"inblock" => "colour",
						"std" => "",
						"type" => "colourpicker"),


					//options box hover/current background
					array(
						"name" => __("Options box current background", "bp_magazine"),
						"id" => $shortname . $shortprefix . "options_hover_background_colour",
						"box" => "2",
						"inblock" => "colour",
						"std" => "",
						"type" => "colourpicker"),

					//options box hover/current text
					array(
						"name" => __("Options box current text colour", "bp_magazine"),
						"id" => $shortname . $shortprefix . "options_hover_text_colour",
						"box" => "2",
						"inblock" => "colour",
						"std" => "",
						"type" => "colourpicker"),

					//user bar hover/current background
					array(
						"name" => __("User bar current background colour", "bp_magazine"),
						"id" => $shortname . $shortprefix . "user_hover_background_colour",
						"box" => "2",
						"inblock" => "colour",
						"std" => "",
						"type" => "colourpicker"),

					//user bar hover/current text
					array(
						"name" => __("User bar current text colour", "bp_magazine"),
						"id" => $shortname . $shortprefix . "userbar_hover_text_colour",
						"box" => "2",
						"inblock" => "colour",
						"std" => "",
						"type" => "colourpicker"),

					//avatar paragraph background colour
					array(
						"name" => __("Avatar paragraph background colour", "bp_magazine"),
						"id" => $shortname . $shortprefix . "avatar_background_colour",
						"box" => "2",
						"inblock" => "colour",
						"std" => "",
						"type" => "colourpicker"),


					// general
					//wp-caption background colour
					array(
						"name" => __("Wp-caption background colour", "bp_magazine"),
						"id" => $shortname . $shortprefix . "wpcaption_background_colour",
						"box" => "2",
						"inblock" => "colour",
						"std" => "",
						"type" => "colourpicker"),

					//wp-caption text
					array(
						"name" => __("Wp-caption text colour", "bp_magazine"),
						"id" => $shortname . $shortprefix . "wpcaption_text_colour",
						"box" => "2",
						"inblock" => "colour",
						"std" => "",
						"type" => "colourpicker"),

					//code
					array(
						"name" => __("Code text colour", "bp_magazine"),
						"id" => $shortname . $shortprefix . "code_text_colour",
						"box" => "2",
						"inblock" => "colour",
						"std" => "",
						"type" => "colourpicker"),

					//blockquote text
					array(
						"name" => __("Blockquote text colour", "bp_magazine"),
						"id" => $shortname . $shortprefix . "blockquote_text_colour",
						"box" => "2",
						"inblock" => "colour",
						"std" => "",
						"type" => "colourpicker"),

					//pre background colour
					array(
						"name" => __("Pre background colour", "bp_magazine"),
						"id" => $shortname . $shortprefix . "pre_background_colour",
						"box" => "2",
						"inblock" => "colour",
						"std" => "",
						"type" => "colourpicker"),

					//pre text
					array(
						"name" => __("Pre text colour", "bp_magazine"),
						"id" => $shortname . $shortprefix . "pre_text_colour",
						"box" => "2",
						"inblock" => "colour",
						"std" => "",
						"type" => "colourpicker"),

					/* comments */
					//comment list background colour
					array(
						"name" => __("Comment list background colour", "bp_magazine"),
						"id" => $shortname . $shortprefix . "comment_list_background_colour",
						"box" => "2",
						"inblock" => "colour",
						"std" => "",
						"type" => "colourpicker"),

					//comment list child background colour
					array(
						"name" => __("Comment list level alternate row colour", "bp_magazine"),
						"id" => $shortname . $shortprefix . "comment_child_colour",
						"box" => "2",
						"inblock" => "colour",
						"std" => "",
						"type" => "colourpicker"),

					/* navigation */
					//section marker background colour
					array(
						"name" => __("Section marker background colour", "bp_magazine"),
						"id" => $shortname . $shortprefix . "section_background_colour",
						"box" => "2",
						"inblock" => "colour",
						"std" => "",
						"type" => "colourpicker"),

					//section marker text
					array(
						"name" => __("Section marker text colour", "bp_magazine"),
						"id" => $shortname . $shortprefix . "section_text_colour",
						"box" => "2",
						"inblock" => "colour",
						"std" => "",
						"type" => "colourpicker"),

					//navigation background (pick image)
					array(
						"name" => __("Navigation background image.<br /><em>*you can upload your image in <a href='media-new.php'>media panel</a> and paste the url here.</em>", "bp_magazine"),
						"id" => $shortname . $shortprefix . "navigation_background_image",
						"box" => "2",
						"inblock" => "colour",
						"std" => "",
						"type" => "text"),

							array(
								"name" => __("Navigation background colour", "bp_magazine"),
								"id" => $shortname . $shortprefix . "navigation_background_colour",
								"box" => "2",
								"inblock" => "colour",
								"std" => "",
								"type" => "colourpicker"),


					//navigation link
					array(
						"name" => __("Navigation link colour", "bp_magazine"),
						"id" => $shortname . $shortprefix . "navigation_link_colour",
						"box" => "2",
						"inblock" => "colour",
						"std" => "",
						"type" => "colourpicker"),

					//navigation hover
					array(
						"name" => __("Navigation link hover/current text colour", "bp_magazine"),
						"id" => $shortname . $shortprefix . "navigation_link_hover_colour",
						"box" => "2",
						"inblock" => "colour",
						"std" => "",
						"type" => "colourpicker"),

					//navigation hover background colour
					array(
						"name" => __("Navigation link hover background colour", "bp_magazine"),
						"id" => $shortname . $shortprefix . "navigation_link_hover_background_colour",
						"box" => "2",
						"inblock" => "colour",
						"std" => "",
						"type" => "colourpicker"),

					//drop down background
					array(
						"name" => __("Navigation background colour", "bp_magazine"),
						"id" => $shortname . $shortprefix . "navigation_dropdown_background_colour",
						"box" => "2",
						"inblock" => "colour",
						"std" => "",
						"type" => "colourpicker"),

					/* border colours */
					//border colour
					array(
						"name" => __("Border colour", "bp_magazine"),
						"id" => $shortname . $shortprefix . "border_colour",
						"box" => "2",
						"inblock" => "colour",
						"std" => "",
						"type" => "colourpicker"),

					/* message and error boxes */
					//widget error background colour
					array(
						"name" => __("Widget error background colour", "bp_magazine"),
						"id" => $shortname . $shortprefix . "widget_background_colour",
						"box" => "2",
						"inblock" => "colour",
						"std" => "",
						"type" => "colourpicker"),


					//widget error text
					array(
						"name" => __("Widget error text colour", "bp_magazine"),
						"id" => $shortname . $shortprefix . "widget_text_colour",
						"box" => "2",
						"inblock" => "colour",
						"std" => "",
						"type" => "colourpicker"),

					//member info box background colour
					array(
						"name" => __("Member info box background colour", "bp_magazine"),
						"id" => $shortname . $shortprefix . "member_info_background_colour",
						"box" => "2",
						"inblock" => "colour",
						"std" => "",
						"type" => "colourpicker"),

					//member info box text
					array(
						"name" => __("Member info box text colour", "bp_magazine"),
						"id" => $shortname . $shortprefix . "member_info_text_colour",
						"box" => "2",
						"inblock" => "colour",
						"std" => "",
						"type" => "colourpicker"),

					//member error box background
					array(
						"name" => __("Member error box background colour", "bp_magazine"),
						"id" => $shortname . $shortprefix . "member_error_background_colour",
						"box" => "2",
						"inblock" => "colour",
						"std" => "",
						"type" => "colourpicker"),

					//member error box text
					array(
						"name" => __("Member error text colour", "bp_magazine"),
						"id" => $shortname . $shortprefix . "member_error_text_colour",
						"box" => "2",
						"inblock" => "colour",
						"std" => "",
						"type" => "colourpicker"),

					//member updated background
					array(
						"name" => __("Member updated background colour", "bp_magazine"),
						"id" => $shortname . $shortprefix . "member_updated_background_colour",
						"box" => "2",
						"inblock" => "colour",
						"std" => "",
						"type" => "colourpicker"),

					//member updated text
					array(
						"name" => __("Member updated text colour", "bp_magazine"),
						"id" => $shortname . $shortprefix . "member_updated_text_colour",
						"box" => "2",
						"inblock" => "colour",
						"std" => "",
						"type" => "colourpicker"),

						//form input
						array(
							"name" => __("Form input border colour", "bp_magazine"),
							"id" => $shortname . $shortprefix . "form_border_colour",
							"box" => "2",
							"inblock" => "colour",
							"std" => "",
							"type" => "colourpicker"),

								array(
									"name" => __("Form label colour", "bp_magazine"),
									"id" => $shortname . $shortprefix . "form_label_colour",
									"box" => "2",
									"inblock" => "colour",
									"std" => "",
									"type" => "colourpicker"),

						//form input
						array(
							"name" => __("Form input background colour", "bp_magazine"),
							"id" => $shortname . $shortprefix . "form_background_colour",
							"box" => "2",
							"inblock" => "colour",
							"std" => "",
							"type" => "colourpicker"),

						//form input
						array(
							"name" => __("Form input text colour", "bp_magazine"),
							"id" => $shortname . $shortprefix . "form_text_colour",
							"box" => "2",
							"inblock" => "colour",
							"std" => "",
							"type" => "colourpicker"),

							//form submit
							array(
								"name" => __("Form submit border colour", "bp_magazine"),
								"id" => $shortname . $shortprefix . "form_submit_border_colour",
								"box" => "2",
								"inblock" => "colour",
								"std" => "",
								"type" => "colourpicker"),

							//form input
							array(
								"name" => __("Form submit background colour", "bp_magazine"),
								"id" => $shortname . $shortprefix . "form_submit_background_colour",
								"box" => "2",
								"inblock" => "colour",
								"std" => "",
								"type" => "colourpicker"),

							//form input
							array(
								"name" => __("Form submit text colour", "bp_magazine"),
								"id" => $shortname . $shortprefix . "form_submit_text_colour",
								"box" => "2",
								"inblock" => "colour",
								"std" => "",
								"type" => "colourpicker"),


);

function buddymagazine_admin_panel() {
	echo "<div id=\"admin-options\">";
    global $themename, $shortname, $options;

    if ( isset($_REQUEST['saved'] )) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
    if ( isset($_REQUEST['reset'] )) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
?>


<!-- home page settings -->
<h4><?php echo "$themename"; ?> <?php _e('Theme Options','bp_magazine'); ?></h4>

<form action="" method="post">

<?php if( $value['box'] = '1' ) {  ?>

<div class="option-block">
<div class="get-option">
<h2><?php _e("Homepage settings", "bp_magazine") ?></h2>
<div class="option-save">

<?php foreach ($options as $value) { ?>

<!-- if text box -->
<?php if (($value['inblock'] == "homepage") && ($value['type'] == "text")) { ?>

<div class="description"><?php echo $value['name']; ?></div>
<p><input name="<?php echo $value['id']; ?>" class="myfield" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['std']; } ?>" /></p>

<!-- if text area -->
<?php } elseif (($value['inblock'] == "homepage") && ($value['type'] == "textarea")) { ?>

<?php
$valuex = $value['id'];
$valuey = stripslashes($valuex);
$value_code = get_option($valuey);
?>

<div class="description"><?php echo $value['name']; ?></div>
<p><textarea name="<?php echo $valuey; ?>" class="mytext" cols="40%" rows="8" /><?php if ( get_option($valuey) != "") { echo stripslashes($value_code); } else { echo $value['std']; } ?></textarea></p>

<!-- if colourpicker -->
<?php } elseif (($value['inblock'] == "homepage") && ($value['type'] == "colourpicker") ) {?>

<div class="description"><?php echo $value['name']; ?></div>
	<?php $i = ""; $i == $i++ ; ?>
<p><input class="color {required:false,hash:true}" name="<?php echo $value['id']; ?>" id="colorpickerField<?php echo $i; ?>" type="text" value="<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['std']; } ?>" />
</p>

<!-- if select -->
<?php } elseif (($value['inblock'] == "homepage") && ($value['type'] == "select") ) {  ?>
	<div class="description"><?php echo $value['name']; ?></div>
	<p><select name="<?php echo $value['id']; ?>" class="myselect" id="<?php echo $value['id']; ?>">
	<?php foreach ($value['options'] as $option) { ?>
	<option<?php if ( get_option( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option>
<?php } ?>
</select>
</p>

<?php } } ?>
</div>
</div>
</div>
<?php } ?>

<?php if( $value['box'] = '2' ) {  ?>
<div class="option-block">
    <div class="get-option">
    <h2><?php _e("Colour options", "bp_magazine") ?></h2>
    <div class="option-save">
    <p><?php _e('If you want to customise the theme options you MUST have default.css selected in the BuddyPress Magazine Preset Styles section.<br />'); ?></p>
    <?php foreach ($options as $value) { ?>

    <!-- if text box -->
    <?php if (($value['inblock'] == "colour") && ($value['type'] == "text")) { ?>
    <div class="description"><?php echo $value['name']; ?></div>
    <p><input name="<?php echo $value['id']; ?>" class="myfield" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['std']; } ?>" /></p>

    <!-- if text area -->
    <?php } elseif (($value['inblock'] == "colour") && ($value['type'] == "textarea")) { ?>

    <?php
    $valuex = $value['id'];
    $valuey = stripslashes($valuex);
    $value_code = get_option($valuey);
    ?>

    <div class="description"><?php echo $value['name']; ?></div>
    <p><textarea name="<?php echo $valuey; ?>" class="mytext" cols="40%" rows="8" /><?php if ( get_option($valuey) != "") { echo stripslashes($value_code); } else { echo $value['std']; } ?></textarea></p>

    <!-- if colourpicker -->
    <?php } elseif (($value['inblock'] == "colour") && ($value['type'] == "colourpicker") ) {  ?>

    <div class="description"><?php echo $value['name']; ?></div>
        <?php $i = ""; $i == $i++ ; ?>
    <p><input class="color {required:false,hash:true}" name="<?php echo $value['id']; ?>" id="colorpickerField<?php echo $i; ?>" type="text" value="<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['std']; } ?>" />
    </p>

    <?php } elseif (($value['inblock'] == "colour") && ($value['type'] == "select") ) {  ?>
    <!-- if select -->
    <div class="description"><?php echo $value['name']; ?></div>
    <p><select name="<?php echo $value['id']; ?>" class="myselect" id="<?php echo $value['id']; ?>">
    <?php foreach ($value['options'] as $option) { ?>
    <option<?php if ( get_option( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option>
    <?php } ?>
    </select>
    </p>

    <?php } } ?>

    </div>
    </div>
</div>
<?php } ?>


<?php if( $value['box'] = '3' ) {  ?>
<div class="option-block">
<div class="get-option">
<h2><?php _e("Site options", "bp_magazine") ?></h2>
<div class="option-save">

<?php foreach ($options as $value) { ?>
<!-- if text box -->
<?php if (($value['inblock'] == "sitesettings") && ($value['type'] == "text")) { ?>

<div class="description"><?php echo $value['name']; ?></div>
<p><input name="<?php echo $value['id']; ?>" class="myfield" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['std']; } ?>" /></p>

<!-- if text area -->
<?php } elseif (($value['inblock'] == "sitesettings") && ($value['type'] == "textarea")) {  ?>

<?php
$valuex = $value['id'];
$valuey = stripslashes($valuex);
$value_code = get_option($valuey);
?>

<div class="description"><?php echo $value['name']; ?></div>
<p><textarea name="<?php echo $valuey; ?>" class="mytext" cols="40%" rows="8" /><?php if ( get_option($valuey) != "") { echo stripslashes($value_code); } else { echo $value['std']; } ?></textarea></p>

<!-- if colourpicker -->
<?php } elseif (($value['inblock'] == "sitesettings") && ($value['type'] == "colorpicker") ) {  ?>

<div class="description"><?php echo $value['name']; ?></div>
	<?php $i = ""; $i == $i++ ; ?>
<p><input class="color {required:false,hash:true}" name="<?php echo $value['id']; ?>" id="colorpickerField<?php echo $i; ?>" type="text" value="<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['std']; } ?>" />
</p>

<!-- if select -->
<?php } elseif (($value['inblock'] == "sitesettings") && ($value['type'] == "select") ) {  ?>
<div class="description"><?php echo $value['name']; ?></div>
<p><select name="<?php echo $value['id']; ?>" class="myselect" id="<?php echo $value['id']; ?>">
<?php foreach ($value['options'] as $option) { ?>
<option<?php if ( get_option( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option>
<?php } ?>
</select>
</p>

<?php } } ?>

</div>
</div>
<div class="get-option">
<h2><?php _e("Styling settings", "bp_magazine") ?></h2>
<div class="option-save">

<?php foreach ($options as $value) { ?>
<!-- if text box -->
<?php if (($value['inblock'] == "styling") && ($value['type'] == "text")) { ?>

<div class="description"><?php echo $value['name']; ?></div>
<p><input name="<?php echo $value['id']; ?>" class="myfield" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['std']; } ?>" /></p>

<!-- if text area -->
<?php } elseif (($value['inblock'] == "styling") && ($value['type'] == "textarea")) {  ?>

<?php
$valuex = $value['id'];
$valuey = stripslashes($valuex);
$value_code = get_option($valuey);
?>

<div class="description"><?php echo $value['name']; ?></div>
<p><textarea name="<?php echo $valuey; ?>" class="mytext" cols="40%" rows="8" /><?php if ( get_option($valuey) != "") { echo stripslashes($value_code); } else { echo $value['std']; } ?></textarea></p>

<!-- if colourpicker -->
<?php } elseif (($value['inblock'] == "styling") && ($value['type'] == "colorpicker") ) {  ?>

<div class="description"><?php echo $value['name']; ?></div>
	<?php $i = ""; $i == $i++ ; ?>
<p><input class="color {required:false,hash:true}" name="<?php echo $value['id']; ?>" id="colorpickerField<?php echo $i; ?>" type="text" value="<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['std']; } ?>" />
</p>

<!-- if select -->
<?php } elseif (($value['inblock'] == "styling") && ($value['type'] == "select") ) {  ?>
<div class="description"><?php echo $value['name']; ?></div>
<p><select name="<?php echo $value['id']; ?>" class="myselect" id="<?php echo $value['id']; ?>">
<?php foreach ($value['options'] as $option) { ?>
<option<?php if ( get_option( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option>
<?php } ?>
</select>
</p>

<?php } } ?>

</div>
</div>
</div>
<?php } ?>


<p id="top-margin" class="save-p">
<input name="save" type="submit" class="sbutton" value="<?php echo esc_attr(__('Save Options', 'bp_magazine')); ?>" />
<input type="hidden" name="theme_action" value="save" />
</p>
</form>

<form method="post">
<p class="save-p">
<input name="reset" type="submit" class="sbutton" value="<?php echo esc_attr(__('Reset Options', 'bp_magazine')); ?>" />
<input type="hidden" name="theme_action" value="reset" />
</p>

</form>
</div>
<?php
}

function buddymagazine_admin_register() {
	global $themename, $shortname, $options;
		$action = isset($_REQUEST['theme_action']);
	if ( isset($_GET['page']) == 'functions.php' ) {
		if ( 'save' == $action ) {
			foreach ($options as $value) {
				update_option( $value['id'], isset($_REQUEST[ $value['id'] ] )); }
			foreach ($options as $value) {
				if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  );
				}
				else { delete_option( $value['id'] ); }
			}
			header("Location: themes.php?page=functions.php&saved=true");
			die;
			}
			else if( 'reset' == $action ) {
				foreach ($options as $value) {
					delete_option( $value['id'] );
				}
			header("Location: themes.php?page=functions.php&reset=true");
			die;
			}
		}
		add_theme_page(_g ($themename . __(' Theme Options', 'bp_magazine')),  _g (__('Theme Options', 'bp_magazine')),  'edit_theme_options', 'functions.php', 'buddymagazine_admin_panel');
}

add_action('admin_menu', 'buddymagazine_admin_register');

function buddymagazine_admin_head() { ?>

	<link href="<?php bloginfo('template_directory'); ?>/_inc/admin/custom-admin.css" rel="stylesheet" type="text/css" />
	<?php if(isset($_GET["page"]) == "functions.php") { ?>

		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/_inc/js/jscolor.js"></script>
<?php }
}


	/* stylesheet additiond */
	$alt_stylesheet_path = get_template_directory() .'/_inc/styles/';
	$alt_stylesheets = array();

	if ( is_dir($alt_stylesheet_path) ) {
		if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) {
			while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) {
				if(stristr($alt_stylesheet_file, ".css") !== false) {
					$alt_stylesheets[] = $alt_stylesheet_file;
				}
			}
		}
	}

	$category_bulk_list = array_unshift($alt_stylesheets, "default.css");

	$options2 = array (

	array(  "name" => __("Choose Your BuddyPress Magazine Preset Style:", "bp_magazine"),
		  	"id" => $shortname. $shortprefix . "custom_style",
			"std" => "default.css",
			"type" => "radio",
			"options" => $alt_stylesheets)
	);

function buddymagazine_ready_style_admin_panel() {
	echo "<div id=\"admin-options\">";

	global $themename, $shortname, $options2;

	if ( isset($_REQUEST['saved2'] )) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
	if ( isset($_REQUEST['reset2'] )) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
?>

<h4><?php echo "$themename"; ?> <?php _e('Preset Style', 'bp_magazine'); ?></h4>
<form action="" method="post">
<div class="get-listings">
<h2><?php _e("Style Select:", "bp_magazine") ?></h2>
<div class="option-save">
<ul>
<?php foreach ($options2 as $value) { ?>

<?php foreach ($value['options'] as $option2) {
$screenshot_img = substr($option2,0,-4);
$radio_setting = get_option($value['id']);
if($radio_setting != '') {
	if (get_option($value['id']) == $option2) {
		$checked = "checked=\"checked\""; } else { $checked = "";
	}
}
else {
	if(get_option($value['id']) == $value['std'] ){
		$checked = "checked=\"checked\"";
	}
	else {
		$checked = "";
	}
} ?>

<li>
<div class="theme-img">
	<img src="<?php bloginfo('template_directory'); ?>/_inc/styles/images/<?php echo $screenshot_img . '.png'; ?>" alt="<?php echo $screenshot_img; ?>" />
</div>
<input type="radio" name="<?php echo $value['id']; ?>" value="<?php echo $option2; ?>" <?php echo $checked; ?> /><?php echo $option2; ?>
</li>

<?php }
} ?>

</ul>
</div>
</div>
	<p id="top-margin" class="save-p">
		<input name="save2" type="submit" class="sbutton" value="<?php echo esc_attr(__('Save Options', 'bp_magazine')); ?>" />
		<input type="hidden" name="theme_action2" value="save2" />
	</p>
</form>

<form method="post">
	<p class="save-p">
		<input name="reset2" type="submit" class="sbutton" value="<?php echo esc_attr(__('Reset Options', 'bp_magazine')); ?>" />
		<input type="hidden" name="theme_action2" value="reset2" />
	</p>
</form>
</div>

<?php }

function buddymagazine_ready_style_admin_register() {
	global $themename, $shortname, $options2;
		$action2 = isset($_REQUEST['theme_action2']);
	if ( isset($_GET['page']) == 'buddymagazine-themes.php' ) {
		if ( 'save2' == $action2 ) {
			foreach ($options2 as $value) {
				update_option( $value['id'], isset($_REQUEST[ $value['id'] ] ));
			}
			foreach ($options2 as $value) {
				if( isset( $_REQUEST[ $value['id'] ] ) ) {
					update_option( $value['id'], $_REQUEST[ $value['id'] ]  );
				}
				else {
					delete_option( $value['id'] );
				}
			}
			header("Location: themes.php?page=buddymagazine-themes.php&saved2=true");
			die;
		}
		else if( 'reset2' == $action2 ) {
			foreach ($options2 as $value) {
				delete_option( $value['id'] );
			}
			header("Location: themes.php?page=buddymagazine-themes.php&reset2=true");
			die;
		}
	}
	add_theme_page(_g (__('BuddyPress Magazine Preset Style', 'bp_magazine')),  _g (__('Preset Style', 'bp_magazine')),  'edit_theme_options', 'buddymagazine-themes.php', 'buddymagazine_ready_style_admin_panel');
}


add_action('admin_menu', 'buddymagazine_ready_style_admin_register');
add_action('admin_head', 'buddymagazine_admin_head');


?>