<?php do_action( 'bp_before_options_bar' ) ?>

<div id="optionsbar">

	<?php
	locate_template( array( '/sidebar-members.php' ), true ); ?>
</div>

<?php do_action( 'bp_after_options_bar' ) ?>