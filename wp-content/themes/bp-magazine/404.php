<?php get_header(); ?>
<div id="post-wrapper">
	<div id="content">

		<?php do_action( 'bp_before_404' ) ?>

		<div class="page 404">

			<h4 class="pagetitle"><?php _e( 'Page Not Found', 'bp_magazine' ) ?></h4>

			<div id="message" class="info">

				<p><?php _e( 'The page you were looking for was not found.', 'bp_magazine' ) ?>

			</div>

			<?php do_action( 'bp_404' ) ?>

		</div>

		<?php do_action( 'bp_after_404' ) ?>

	</div>

	<?php get_sidebar('404'); ?>
	<div class="clear"></div>
	</div>
<?php get_footer(); ?>