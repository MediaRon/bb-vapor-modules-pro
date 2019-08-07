<?php
/**
 * Button Module.
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 1.3.0
 */

?>
<div class="fl-bbvm-button-for-beaverbuilder-wrapper">
<a class="fl-bbvm-button-for-beaverbuilder bbvm-button" id="<?php echo esc_attr( $settings->button_id ); ?>" href="<?php echo esc_url( $settings->button_link ); ?>"><span><?php echo ! empty( $settings->button_icon ) ? sprintf( '<i class="%s" /></i>&nbsp;', esc_attr( $settings->button_icon ) ) : ''; ?><?php echo esc_html( $settings->button_text ); ?></span></a>
</div>
