<?php
/**
 * The Template for displaying all single posts.
 *
 * @package klein
 *
 */

get_header(); ?>
<?php global $post; ?>
<?php 
	get_template_part( 'layout', 'full-content' );
?>
<?php get_footer(); ?>