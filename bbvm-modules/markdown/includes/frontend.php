<div class="fl-bbvm-markdown-for-beaverbuilder">
	<?php
	if ( ! class_exists( 'Parsedown' ) ) {
		require_once 'Parsedown.php';
	}
	$bbvm_parsedown = new Parsedown();
	echo $bbvm_parsedown->text( $settings->markdown );
	?>
</div>