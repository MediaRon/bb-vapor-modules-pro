<?php
/**
 * Reusable Block Module.
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 3.0.0
 */

FLBuilderModel::default_settings(
	$settings,
	array(
		'post_type' => 'wp_block',
	)
);
?>
<div id="fl-builder-settings-section-source" class="fl-loop-data-source-select fl-builder-settings-section">
	<table class="fl-form-table">
	<?php

	// Data Source.
	FLBuilder::render_settings_field(
		'gutenberg_reusable_block',
		array(
			'type'   => 'suggest',
			'action' => 'fl_as_posts',
			'data'   => 'wp_block',
			'label'  => __( 'Select a Reusable Block:', 'bb-vapor-modules-pro' ),
			'limit'  => 1,
		),
		$settings
	);

	?>
	</table>
</div>

