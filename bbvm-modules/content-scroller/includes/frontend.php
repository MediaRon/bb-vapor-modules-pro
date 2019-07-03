<div class="fl-bbvm-variable-headings-for-beaverbuilder">
	<?php
	$bbvm_count = 0;
	echo sprintf( '<%s>', esc_html( $settings->headline_tag ) );
	foreach ( $settings->headlines as $headline ) {
		printf( '<span class="bbvm-variable-headline-%d">', absint( $bbvm_count ) );
		echo esc_html( $headline->headline ) . ' ';
		echo '</span>';
		$bbvm_count++;
	}
	echo sprintf( '</%s>', esc_html( $settings->headline_tag ) );
	?>
</div>
