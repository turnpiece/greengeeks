<?php do_action( 'bp_before_blog_search_form' ); ?>

<div class="widget widget_text">
<div class="textwidget">
<form action="<?php echo site_url(); ?>" method="get" id="search-form">
<input type="text" id="search-terms" name="s" onfocus="if (this.value == '<?php _e( 'Search Here', TEMPLATE_DOMAIN ) ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e( 'Search Here', TEMPLATE_DOMAIN ) ?>';}" />
&nbsp;<input type="submit" id="search-submit" value="<?php _e( 'Search', TEMPLATE_DOMAIN) ?>" />
<?php do_action( 'bp_blog_search_form' ); ?>
</form>
</div>
</div>

<?php do_action( 'bp_after_blog_search_form' ); ?>