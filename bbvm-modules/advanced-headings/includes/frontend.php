<div class="fl-bbvm-advanced-headings-for-beaverbuilder">
	<?php
	echo sprintf( '<%s class="headline-normal">', esc_html( $settings->headline_tag ) );
	if ( 'normal' === $settings->headline_select ) {
		echo sprintf( '<span>%s</span>', esc_html( $settings->headline ) );
	} else {
		$bbvm_count = 0;
		foreach ( $settings->headlines as $headline ) {
			printf( '<span class="bbvm-variable-headline-%d">', absint( $bbvm_count ) );
			echo esc_html( $headline->headline ) . ' ';
			echo '</span>';
			$bbvm_count++;
		}
	}
	echo sprintf( '</%s>', esc_html( $settings->headline_tag ) );

	// Description.
	if ( 'yes' === $settings->headline_description ) {
		echo '<div class="description">';
		echo wp_kses_post( $settings->description );
		echo '</div>';
	}
	?>
</div>
