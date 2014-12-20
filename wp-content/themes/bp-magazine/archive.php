<?php get_header(); ?>
<div id="post-wrapper">
	<div id="content">

		<?php do_action( 'bp_before_archive' ) ?>

		<div class="page" id="blog-archives">

			<?php if ( have_posts() ) : ?>
	<?php locate_template( array( '/elements/blog-headers.php' ), true ); ?>

				<?php while (have_posts()) : the_post(); ?>

					<?php do_action( 'bp_before_blog_post' ) ?>

					<div class="post">

							<h4><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Permanent Link to', 'bp_magazine' ) ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
			<span class="attach-post-image" style="height:100px;display:block;background:url('<?php the_post_image_url('large'); ?>') center center repeat">&nbsp;</span>
					<?php if( $bp_existed == 'true' ) { //check if bp existed ?>
									<p class="date"><?php the_time('M j Y') ?><?php _e( 'in', 'bp_magazine' ) ?> <?php the_category(', ') ?> <?php printf( __( 'by %s', 'bp_magazine' ), bp_core_get_userlink($post->post_author) ) ?><span class="tags"><?php the_tags( __( 'Tags: ', 'bp_magazine' ), ', ', '<br />'); ?></span> <span class="comments"><?php comments_popup_link( __( 'No Comments &#187;', 'bp_magazine' ), __( '1 Comment &#187;', 'bp_magazine' ), __( '% Comments &#187;', 'bp_magazine' ) ); ?></span></p>
											<?php } else { // if not bp detected..let go normal ?>
										<p class="date"><?php the_time('M j Y') ?><?php _e( 'in', 'bp_magazine' ) ?> <?php the_category(', ') ?> <?php the_author_link(); ?><span class="tags"><?php the_tags( __( 'Tags: ', 'bp_magazine' ), ', ', '<br />'); ?></span> <span class="comments"><?php comments_popup_link( __( 'No Comments &#187;', 'bp_magazine' ), __( '1 Comment &#187;', 'bp_magazine' ), __( '% Comments &#187;', 'bp_magazine' ) ); ?></span></p>
					<?php } ?>

							<div class="entry">
								<?php the_excerpt(); ?>
							</div>

							<p class="meta"><span class="tags"><?php the_tags( __( 'Tags: ', 'bp_magazine' ), ', ', '<br />'); ?></span> <span class="comments"><?php comments_popup_link( __( 'No Comments &#187;', 'bp_magazine' ), __( '1 Comment &#187;', 'bp_magazine' ), __( '% Comments &#187;', 'bp_magazine' ) ); ?></span></p>
					</div>

					<?php do_action( 'bp_after_blog_post' ) ?>

				<?php endwhile; ?>

			<?php locate_template( array( '/elements/pagination.php' ), true ); ?>

			<?php else : ?>

			<?php locate_template( array( '/elements/messages.php' ), true ); ?>

			<?php endif; ?>

		</div>

		<?php do_action( 'bp_after_archive' ) ?>

	</div>


		<?php get_sidebar('blog'); ?>
			<div class="clear"></div>
	</div>
<?php get_footer(); ?>