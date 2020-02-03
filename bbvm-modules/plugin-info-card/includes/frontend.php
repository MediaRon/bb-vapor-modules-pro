<?php
/**
 * Plugin Info Card Module.
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 2.1.1
 */

?>
<div class="bbvm-plugin-info-card">
	<?php
		echo wppic_shortcode_function( // phpcs:ignore
			array(
				'type'   => $settings->asset_type,
				'slug'   => $settings->slug,
				'scheme' => $settings->appearance,
				'layout' => $settings->layout,
				'align'  => $settings->align,
				'multi'  => $settings->multi,
			)
		);
		?>
</div>

