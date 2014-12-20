<?php
/**
 * BuddyPress Theme Compatability
 * Since 1.7 BuddyPress will use the_content to serve templates
 */

get_header( 'buddypress' );

do_action( 'bp_before_content' );

if (have_posts())

while (have_posts()) : the_post();

the_content();

endwhile;

do_action( 'bp_after_content' );

get_sidebar();
get_footer('buddypress');