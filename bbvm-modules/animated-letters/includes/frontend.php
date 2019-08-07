<?php
/**
 * Animated Letters Module.
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 1.3.0
 */

?>
<div class="fl-bbvm-animated-letters-for-beaverbuilder <?php echo esc_attr( $settings->style ); ?>">
	<h2>
	<?php
	if ( 'thursday' === $settings->style || 'signal' === $settings->style || 'hello' === $settings->style || 'bottom' === $settings->style || 'find' === $settings->style ) :
		?>
		<span class="text-wrapper">
			<span class="line line1"></span>
		<?php
	endif;
	if ( 'beauty' === $settings->style || 'reality' === $settings->style || 'coffee' === $settings->style || 'domino' === $settings->style ) :
		?>
		<span class="text-wrapper">
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
	elseif ( 'out' === $settings->style ) :
		foreach ( $settings->text_form as $text_form ) {
			printf( '<span class="word">%s</span>&nbsp;', esc_html( $text_form->text ) );
		}
	else :
		$letters = $settings->text_animate;
		// Split into spans.
		$letters = preg_replace( '/([a-zA-Z0-9\"\'!@\#\$%\^&*()\.]|\w|\s)/i', '<span class="letter">$1</span>', $letters );
		echo wp_kses_post( '<span class="letters">' . str_replace( '<span class="letter"> </span>', '<span class="letter">&nbsp;</span>', $letters ) . '</span>' );
	endif;
	if ( 'beauty' === $settings->style || 'reality' === $settings->style || 'coffee' === $settings->style || 'domino' === $settings->style || 'hello' === $settings->style || 'bottom' === $settings->style || 'find' === $settings->style ) :
		?>
		</span>
		<?php
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
