<?php
/**
 * This file provides a complete
 * reference to our shortcodes and
 * how to use theme.
 *
 * @since  1.0
 */
?>
<style type="text/css">
	h3.shortcode-ref-title {
		color: #9fbf50!important;
		font-weight: bold;
		font-size: 14px!important;
	}

	.shortcode-context .widefat th{
		border-bottom: 1px solid #e0e0e0;
		background: #eee;
	}
</style>
<h1>
	<?php _e('Shortcode Reference', 'news_hub'); ?>
</h1>
<h3 class="ref-description">
	<?php _e('All Klein Shortcodes are listed here. So if you forgot how to use a shortcode, you can reference here. Other shortcodes that generated by a 3rd party plugin are unfortunately not displayed here. Have fun!', 'news_hub'); ?>
</h3>
<p>
	<em>
		<?php _e('Please make sure to install and activate Gears plugin that comes along with this theme.', 'klein'); ?>
	</em>
</p>


<div class="shortcode-context">



<h3 class="shortcode-ref-title">1.) Members Carousel</h3>
<p><code>Usage: [gears_bp_members_carousel type="active" max_item="10" max_slides="7" min_slides="1" slide_margin="0" item_width="228"]</code></p>
<h5>Shortcode Options:</h5>
<table class="wp-list-table widefat fixed posts">
	<tr>
		<th>ID</th>
		<th>Description</th>
		<th>Default Value</th>
	</tr>
	<tr>
		<td><em>type</em></td>
		<td>The type of activity stream you want to display ('active, newest, popular, online, alphabetical, random').</td>
		<td>active</td>
	</tr>
	<tr>
		<td><em>max_item</em></td>
		<td>The number of maximum items to show (10, 20, 30).</td>
		<td>10</td>
	</tr>
	<tr>
		<td><em>max_slides</em></td>
		<td>The number of maximum items per slide</td>
		<td>7</td>
	</tr>
	<tr>
		<td><em>min_slides</em></td>
		<td>The number of minimum items per slide (applies when a user is viewing a smaller device).</td>
		<td>1</td>
	</tr>
	<tr>
		<td><em>slide_margin</em></td>
		<td>The amount of margin per item inside the slide (10)</td>
		<td>0</td>
	</tr>
	<tr>
		<td><em>item_width</em></td>
		<td>The width of each items inside the slide (125)</td>
		<td>228</td>
	</tr>

</table><p></p>

<h3 class="shortcode-ref-title">2.) Members Carousel (version 2)</h3>
<p><code>Usage: [gears_bp_members_carousel_2 type="active" max_item="10" max_slides="7" min_slides="1" slide_margin="20" item_width="320"]</code></p>
<h5>Details:</h5>
<p class="klein-info">
	This shortcode accepts the same arguments or options as the 'Members Carousel'. The difference is that this shortcode shows the cover photo of the member and has a different styling.
</p>
<p></p>


<h3 class="shortcode-ref-title">3.) Members Grid</h3>
<p><code>Usage: [gears_bp_members_grid type="active" max_item="10" columns="2"]</code></p>
<h5>Shortcode Options:</h5>
<table class="wp-list-table widefat fixed posts">
	<tr>
		<th>ID</th>
		<th>Description</th>
		<th>Default Value</th>
	</tr>
	<tr>
		<td><em>type</em></td>
		<td>The type of members you want to show (active, newest, popular, online, alphabetical, random)</td>
		<td>active</td>
	</tr>
	<tr>
		<td><em>max_item</em></td>
		<td>Any numbers (e.g. 10). The maximum number of items to show.</td>
		<td>10</td>
	</tr>
	<tr>
		<td><em>columns</em></td>
		<td>The number of columns (3, 2, or 1).</td>
		<td>2</td>
	</tr>
</table><p></p>

<h3 class="shortcode-ref-title">4.) Members List</h3>
<p><code>Usage: [gears_bp_members_list type="active" max_item="10"]</code></p>
<h5>Shortcode Options:</h5>
<table class="wp-list-table widefat fixed posts">
	<tr>
		<th>ID</th>
		<th>Description</th>
		<th>Default Value</th>
	</tr>
	<tr>
		<td><em>type</em></td>
		<td>What type of members you want to display (active, newest, popular, online, alphabetical, random).</td>
		<td>5</td>
	</tr>
	<tr>
		<td><em>max_item</em></td>
		<td>The maximum number of items.</td>
		<td>10</td>
	</tr>
</table><p></p>

<h3 class="shortcode-ref-title">5.) Groups Carousel</h3>
<p><code>Usage: [gears_bp_groups_carousel type="active" max_item="12" max_slides="7" min_slides="1" slide_margin="0" item_width="223"]</code></p>
<h5>Shortcode Options:</h5>
<table class="wp-list-table widefat fixed posts">
	<tr>
		<th>ID</th>
		<th>Description</th>
		<th>Default Value</th>
	</tr>
	<tr>
		<td><em>type</em></td>
		<td>The type of group to show (active, newest, popular, random, alphabetical, most-forum-topics, most-forum-posts).</td>
		<td>5</td>
	</tr>
	<tr>
		<td><em>max_item</em></td>
		<td>The maximum number of groups you want to display (10, 12, 14, 20).</td>
		<td>12</td>
	</tr>
	<tr>
		<td><em>max_slides</em></td>
		<td>The maximum number of groups per slide (7, 3, 5).</td>
		<td>7</td>
	</tr>
	<tr>
		<td><em>min_slides</em></td>
		<td>The minimum number of groups per slide (1, 2, 3) (applies on smaller screen devices).</td>
		<td>1</td>
	</tr>
	<tr>
		<td><em>slide_margin</em></td>
		<td>The number of margins per slide (10, 20, 30)</td>
		<td>0</td>
	</tr>
	<tr>
		<td><em>item_width</em></td>
		<td>The with of the item inside the slide (189, 165).</td>
		<td>223</td>
	</tr>
</table><p></p>

<h3 class="shortcode-ref-title">6.) Groups Carousel 2</h3>
<p><code>Usage: [gears_bp_groups_carousel_2 type="active" max_item="12" max_slides="7" min_slides="1" slide_margin="20" item_width="223"]</code></p>
<h5>Details: </h5>
<p class="klein-info">
	<?php _e("This shortcode accepts the same arguments or options as the 'Groups Carousel'. The difference is that this shortcode shows the cover photo of the group and has a different styling.", 'klein'); ?>
</p>

<h3 class="shortcode-ref-title">7.) Groups Grid</h3>
<p><code>Usage: [gears_bp_groups_grid type="active" max_item="12" columns="2"]</code></p>
<h5>Shortcode Options:</h5>
<table class="wp-list-table widefat fixed posts">
	<tr>
		<th>ID</th>
		<th>Description</th>
		<th>Default Value</th>
	</tr>
	<tr>
		<td><em>type</em></td>
		<td>What type of groups you want to display (active, newest, popular, random, alphabetical, most-forum-topics, most-forum-posts).</td>
		<td>active</td>
	</tr>
	<tr>
		<td><em>max_item</em></td>
		<td>The maximum numbers of groups (6, 12, 18).</td>
		<td>12</td>
	</tr>
	<tr>
		<td><em>columns</em></td>
		<td>The number of columns (2,3,4,5).</td>
		<td>2</td>
	</tr>
</table><p></p>

<h3 class="shortcode-ref-title">8.) Groups List</h3>
<p><code>Usage: [gears_bp_groups_list type="active" max_item="12"]</code></p>

<h5>Shortcode Options: </h5>
<table class="wp-list-table widefat fixed posts">
	<tr>
		<th>ID</th>
		<th>Description</th>
		<th>Default Value</th>
	</tr>
	<tr>
		<td><em>type</em></td>
		<td>The type of groups to show (active, newest, popular, random, alphabetical, most-forum-topics, most-forum-posts)</td>
		<td>square</td>
	</tr>
	<tr>
		<td><em>max_item</em></td>
		<td>The maximum number of groups (2, 4, 5)</td>
		<td>12</td>
	</tr>
</table><p></p>


<h3 class="shortcode-ref-title">9.) Activity Stream</h3>
<p><code>Usage: [gears_bp_activity_stream title="Members Activity Stream"]</code></p>
<h5>Shortcode Options:</h5>
<table class="wp-list-table widefat fixed posts">
	<tr>
		<th>ID</th>
		<th>Description</th>
		<th>Default Value</th>
	</tr>
	<tr>
		<td><em>title</em></td>
		<td>The widget title ('Latest Activities')</td>
		<td>"Members Activity Stream"</td>
	</tr>
</table><p></p>

<h3 class="shortcode-ref-title">10.) Pricing Table</h3>
<p><code>Usage: [gears_pricing_table title="Pricing" price_label="$0.00" features="Service1, Service2, !Not Available Service" popular=""]</code></p>
<h5>Shortcode Options:</h5>
<table class="wp-list-table widefat fixed posts">
	<tr>
		<th>ID</th>
		<th>Description</th>
		<th>Default Value</th>
	</tr>
	<tr>
		<td><em>title</em></td>
		<td>The title of the pricing</td>
		<td>'Pricing'</td>
	</tr>
	<tr>
		<td><em>price_label</em></td>
		<td>The price (e.g. $12.00<sub>USD</sub>/Month)</td>
		<td>$0.00</td>
	</tr>
	<tr>
		<td><em>features</em></td>
		<td>Comma separated list of features (Feature1, Feature2, !Feature3)</td>
		<td>"Service1, Service2, !Not Available Service"</td>
	</tr>
	<tr>
		<td><em>popular</em></td>
		<td>Make the pricing popular. 'True' or 'False'.</td>
		<td>False</td>
	</tr>
</table><p></p>
</div>