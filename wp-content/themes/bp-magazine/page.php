<?php get_header(); ?>
<div id="post-wrapper">
	<div id="content">

		<?php do_action( 'bp_before_blog_page' ) ?>

		<div class="page" id="blog-page">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<h4 class="pagetitle"><?php the_title(); ?></h4>

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<div class="entry">

						<?php the_content( __( '<p class="serif">Read the rest of this page &raquo;</p>', 'bp_magazine' ) ); ?>

						<?php wp_link_pages( array( 'before' => __( '<p><strong>Pages:</strong> ', 'bp_magazine' ), 'after' => '</p>', 'next_or_number' => 'number')); ?>
						<?php edit_post_link( __( 'Edit this entry.', 'bp_magazine' ), '<p>', '</p>'); ?>
<div class="clear"></div>
					</div>

				</div>

			<?php endwhile; ?>
					<?php locate_template( array( '/elements/pagination.php' ), true ); ?>
			<?php else: ?>

				<?php locate_template( array( '/elements/messages.php' ), true ); ?>

			<?php endif; ?>

		</div>

		<?php do_action( 'bp_after_blog_page' ) ?>

	</div>

	<?php get_sidebar('page'); ?>
	<div class="clear"></div>
</div>
<?php get_footer(); ?>