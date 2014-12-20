<?php
/*
Template Name: Blog and News
*/
?>

<?php get_header(); ?>

<div id="post-entry">

<?php
global $more; $more = 0;
$max_num_post = get_option('posts_per_page');
$page = (get_query_var('paged')) ? get_query_var('paged') : 1; query_posts("cat=&showposts=$max_num_post&paged=$page"); while ( have_posts() ) : the_post(); ?>

<div <?php if(function_exists("post_class")) : ?><?php post_class(); ?><?php else: ?>class="post"<?php endif; ?> id="post-<?php the_ID(); ?>">

<h1 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>

<?php $post_meta_status = get_option('tn_buddycom_post_meta_status'); if($post_meta_status != 'disable') { ?>
<div class="post-author"><?php the_time('jS F Y') ?> <?php _e('by', TEMPLATE_DOMAIN) ?> <?php if( $bp_existed == 'true' ) { ?><?php printf( __( '%s',TEMPLATE_DOMAIN), bp_core_get_userlink( $post->post_author ) ) ?><?php } else { ?> <?php the_author_posts_link(); ?><?php } ?> <?php _e('under', TEMPLATE_DOMAIN) ?> <?php the_category(', ') ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php edit_post_link(__('edit', TEMPLATE_DOMAIN)); ?></div>
<?php } ?>

<div class="post-content">
<?php
$post_style = get_option('tn_buddycom_blog_post_style');
$post_meta_status = get_option('tn_buddycom_post_meta_status');
if($post_style == '' || $post_style == 'full post') { ?>
<?php the_content(__('...click here to read more', TEMPLATE_DOMAIN)); ?>
<?php } elseif($post_style == 'excerpt post') { ?>
<?php echo custom_the_content(70); ?>
<?php } elseif($post_style == 'featured thumbnail with excerpt post') { ?>
<?php wp_custom_post_thumbnail($the_post_id=get_the_ID(), $with_wrap='', $wrap_w='', $wrap_h='', $title=get_the_title(), $fetch_size='medium', $fetch_w='200', $fetch_h='200', $alt_class='alignleft feat-thumb'); ?>
<?php echo the_excerpt(); ?>
<?php } ?>

<?php $facebook_like_status = get_option('tn_buddycom_facebook_like_status'); if ($facebook_like_status == 'enable') { ?>
<div class="fb-like" data-href="<?php echo urlencode(get_permalink($post->ID)); ?>" data-send="false" data-width="450" data-show-faces="false" style="margin-top: 10mpx; margin-bottom: 6px;"></div>
<?php } ?>
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
<?php if ( comments_open() ) { ?>
<p class="com"><?php comments_popup_link(__('Leave Comments &rarr;', TEMPLATE_DOMAIN), __('One Comment &rarr;', TEMPLATE_DOMAIN), __('% Comments &rarr;', TEMPLATE_DOMAIN)); ?></p>
<?php } ?>
</div>
<?php } ?>

</div>


<?php endwhile; ?>

<div id="post-navigator">
<div class="alignright"><?php next_posts_link( __( '&laquo; Previous Entries', TEMPLATE_DOMAIN ) ) ?></div>
<div class="alignleft"><?php previous_posts_link( __( 'Next Entries &raquo;', TEMPLATE_DOMAIN ) ) ?></div>
</div>

</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>