<div class="fl-bbvm-animated-letters-for-beaverbuilder <?php echo esc_attr( $settings->style ); ?>">
	<h2>
	<?php
	if ( 'thursday' === $settings->style || 'signal' === $settings->style ) :
		?>
		<span class="text-wrapper">
			<span class="line line1"></span>
		<?php
	endif;
	if ( 'go' === $settings->style ) :
		$count = 1;
		foreach ( $settings->text_form as $text_form ) {
			printf( '<span class="letter letters-%d">%s</span>', absint( $count ), esc_html( $text_form->text ) );
			$count++;
		}
	elseif ( 'signal' === $settings->style ) :
		?>
		<span class="letter letters-left"><?php echo esc_html( $settings->text_left ); ?></span>
		<span class="letter letters-center"><?php echo esc_html( $settings->text_center ); ?></span>
		<span class="letter letters-right"><?php echo esc_html( $settings->text_right ); ?></span>
		<?php
	else :
		$letters = $settings->text_animate;
		// Split into spans
		$letters = preg_replace( '/([a-zA-Z0-9\"\']|\w|\s)/i', '<span class="letter">$1</span>', $letters );
		echo wp_kses_post( str_replace( '<span class="letter"> </span>', '<span class="letter">&nbsp;</span>', $letters ) );
	endif;
	if ( 'thursday' === $settings->style || 'signal' === $settings->style ) :
		?>
			<span class="line line2"></span>
		</span>
		<?php
	endif;
	?>
	</h2>
</div>
