<?php get_header(); ?>
<div id="post-wrapper">
	<div id="content">

		<?php do_action( 'bp_before_blog_single_post' ) ?>

		<div class="page" id="blog-single">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<?php locate_template( array( '/elements/blog-headers.php' ), true ); ?>
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<?php do_action( 'bp_before_blog_post' ) ?>

					<h4><a href="<?php echo get_permalink() ?>" rel="bookmark" title="<?php _e( 'Permanent link to', 'bp_magazine' ) ?> <?php the_title(); ?>"><?php the_title(); ?></a></h4>

					<div class="entry">

						<?php the_content( __( '<p class="serif">Read the rest of this entry &raquo;</p>', 'bp_magazine' ) ); ?>

						<?php wp_link_pages(array('before' => __( '<p><strong>Pages:</strong> ', 'bp_magazine' ), 'after' => '</p>', 'next_or_number' => 'number')); ?>
							<?php if( $bp_existed == 'true' ) { //check if bp existed ?>
					<p class="meta"><?php the_time() ?> <?php _e( 'in', 'bp_magazine' ) ?> <?php the_category(', ') ?> <?php printf( __( 'by %s', 'bp_magazine' ), bp_core_get_userlink($post->post_author) ) ?><span class="tags"><?php the_tags( __( 'Tags: ', 'bp_magazine' ), ', ', '<br />'); ?></span> <span class="comments"><?php comments_popup_link( __( 'No Comments &#187;', 'bp_magazine' ), __( '1 Comment &#187;', 'bp_magazine' ), __( '% Comments &#187;', 'bp_magazine' ) ); ?></span></p>
							<?php } else { // if not bp detected..let go normal ?>
						<p class="meta"><?php the_time('M j Y') ?> <?php _e( 'in', 'bp_magazine' ) ?> <?php the_category(', ') ?> <?php the_author_link(); ?><span class="tags"><?php the_tags( __( 'Tags: ', 'bp_magazine' ), ', ', '<br />'); ?></span> <span class="comments"><?php comments_popup_link( __( 'No Comments &#187;', 'bp_magazine' ), __( '1 Comment &#187;', 'bp_magazine' ), __( '% Comments &#187;', 'bp_magazine' ) ); ?></span></p>
							<?php } ?>
					</div>

					<?php do_action( 'bp_after_blog_post' ) ?>

				</div>

			<?php comments_template(); ?>

			<?php endwhile;?>

			<?php locate_template( array( '/elements/pagination.php' ), true ); ?>

			<?php else: ?>

			<?php locate_template( array( '/elements/messages.php' ), true ); ?>

			<?php endif; ?>

		</div>

		<?php do_action( 'bp_after_blog_single_post' ) ?>

	</div>
	<?php get_sidebar('blog'); ?>
<div class="clear"></div>
</div>
<?php get_footer(); ?>