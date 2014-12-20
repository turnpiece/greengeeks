<?php get_header(); ?>
<div id="content-feature">
		<?php
			$about_title = get_option('ne_buddymagazine_about_title');
			$about_text = get_option('ne_buddymagazine_about_description');
			$latest_category = get_option('ne_buddymagazine_home_cat');
			$image_display = get_option('ne_buddymagazine_style_post_image');
			$latest_amount = get_option('ne_buddymagazine_home_number');
		?>

	<?php 	locate_template( array( 'slideshow.php' ), true ); ?>
	<div id="content-about-site">
	<h3>
	<?php echo stripslashes($about_title); ?>
	</h3>
				<p>
			<?php echo stripslashes($about_text); ?>
				</p>
	</div>
	<div class="clear"></div>
</div>
<div id="featured-post-section">
	<div id="post-list">
			<?php query_posts('category_name='. $latest_category . '&showposts='. $latest_amount . ''); ?>
						  <?php while (have_posts()) : the_post(); ?>
		<div class="post-block">
			<div class="post">
				<h4><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('permalink to', 'bp_magazine');?><?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
				<div class="post-image">
					<span class="attach-post-image" style="height:110px;display:block;background:url('<?php the_post_image_url($image_display); ?>') center center no-repeat">&nbsp;</span>
				</div>
				<div class="date"><?php the_time('F j, Y') ?></div>

				<?php the_excerpt(); ?>

				<div class="meta"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('permalink to', 'bp_magazine');?> <?php the_title_attribute(); ?>"><?php _e('Read more', 'bp_magazine');?></a>  | <?php the_category(', ') ?></div>
			</div>
		</div>
		 <?php endwhile; ?>
		<div class="clear"></div>
	</div>
	<?php get_sidebar('home'); ?>
		<div class="clear"></div>
</div>
<?php get_footer(); ?>