<?php
/**
 * Animated Headlines Module.
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 1.3.0
 */

?>
<div class="fl-bbvm-headlines-for-beaverbuilder">
	<<?php echo esc_html( $settings->headline_tag ); ?> class="bbvm-animated-headline <?php echo 'none' !== $settings->animation_type ? 'animated infinite ' . esc_attr( $settings->animation_type ) . '' : ''; ?>"><?php echo esc_html( $settings->headline_text ); ?></<?php echo esc_html( $settings->headline_tag ); ?>>
</div>
