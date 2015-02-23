<?php
/**
 * Standard Post Layout
 *
 * @package klein.
 */ 
?>


<article id="post-<?php the_ID(); ?>" <?php post_class( array( 'blog-list' ) ); ?>>
	
	<div class="entry-content">
			<!-- blog author -->
			<div class="blog-author">
				<?php klein_author() ?>
			</div>
			<!-- end blog author -->
			<!-- blog content -->
			<div class="blog-content">
				<div class="blog-pad blog-content-title">
					<h2>
						<a href="<?php echo esc_url( the_permalink() ) ?>" title="<?php echo esc_attr( the_title() ); ?>">
							<?php the_title(); ?>
						</a>
					</h2>
				</div>	
				<div class="blog-content-thumbnail">
					<?php if( has_post_thumbnail() ){ ?>
						<?php the_post_thumbnail( 'klein-post-thumbnail', array( 'class' => 'scale-to-grid' ) ); ?>
					<?php }?>
				</div>	
				<div class="blog-pad blog-content-excerpt">
					<?php the_excerpt(); ?>
				</div>
				<div class="blog-pad blog-content-date-readmore">
					<div class="blog-content-comment">
						<i class="icon-comment "></i> 
						<?php if( comments_open() ){ ?>
							<?php comments_number( 'No Responses', 'One Response', '% Responses' ); ?> /
							<?php echo get_post_reply_link(); ?>
						<?php }else{ ?>
							<?php _e( 'Comments are closed.','klein' ); ?>
						<?php }?>
					</div>
					<div class="blog-content-readmore">
						<a class="btn btn-primary" href="<?php echo esc_url( the_permalink() ) ?>" title="<?php echo esc_attr( the_title() ); ?>">
							<?php _e( 'Continue Reading','klein' ); ?>
						</a>
					</div>
					<div class="clear"></div>
				</div>	
				<div class="blog-pad blog-content-meta">
					<?php klein_entry_meta(); ?>
				</div>	
			</div>
			<!-- blog content end -->
	</div><!-- .entry-content -->
</article><!-- #post-## -->