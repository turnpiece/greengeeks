
<div id="header-search-section">
	<div id="header-search-form">

<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
	<input type="text" id="s" name="s" value="<?php the_search_query(); ?>" class="form-field" size="32"/>
	<input type="submit" name="search-submit" id="search-submit" value="<?php _e( 'Search', 'bp_magazine' ) ?>" class="form-submit"/>
</form>


	</div>
</div>