<?php get_header(); ?>

<div id="post-entry">

<?php if (have_posts()) : ?>

<?php locate_template( array( 'lib/templates/wp-template/headline.php'), true ); ?>

<?php while (have_posts()) : the_post(); ?>

<div <?php if(function_exists("post_class")) : ?><?php post_class('post-single'); ?><?php else: ?>class="post"<?php endif; ?> id="post-<?php the_ID(); ?>">

<h1 class="post-title"><?php the_title(); ?></h1>

<div class="post-author"><?php the_time('jS F Y') ?> <?php _e('by', TEMPLATE_DOMAIN) ?> <?php if( $bp_existed == 'true' ) { ?><?php printf( __( '%s',TEMPLATE_DOMAIN), bp_core_get_userlink( $post->post_author ) ) ?><?php } else { ?> <?php the_author_posts_link(); ?><?php } ?> <?php _e('under', TEMPLATE_DOMAIN) ?> <?php the_category(', ') ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php edit_post_link(__('edit', TEMPLATE_DOMAIN)); ?></div>

<div class="post-content">
<?php $facebook_like_status = get_option('tn_buddycom_facebook_like_status'); if ($facebook_like_status == 'enable') { ?>
<div class="fb-like" data-href="<?php echo urlencode(get_permalink($post->ID)); ?>" data-send="false" data-width="450" data-show-faces="false" style="margin-bottom: 6px;"></div>
<?php } ?>
<?php the_content(__('...click here to read more', TEMPLATE_DOMAIN)); ?>
</div>

<?php $post_meta_status = get_option('tn_buddycom_post_meta_status'); if($post_meta_status != 'disable') { ?>
<div class="post-tagged">
<?php if(has_tag()) { ?>
<p class="tags">
<?php if(function_exists("the_tags")) : ?>
<?php the_tags(__('tags:&nbsp;', TEMPLATE_DOMAIN), ', ', ''); ?>
<?php endif; ?>
</p>
<?php } ?>
</div>
<?php } ?>

</div>


<?php endwhile; ?>

<?php if ( comments_open() ) { ?><?php comments_template('', true); ?><?php } ?>

<?php locate_template( array( 'lib/templates/wp-template/paginate.php'), true ); ?>

<?php else: ?>

<?php locate_template( array( 'lib/templates/wp-template/result.php'), true ); ?>

<?php endif; ?>

</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>