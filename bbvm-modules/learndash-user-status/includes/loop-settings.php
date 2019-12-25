<?php
/**
 * Render the Loop Settings for LearnDash login.
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 2.0.0
 */

FLBuilderModel::default_settings(
	$settings,
	array(
		'post_type' => 'sfwd-courses',
	)
);
?>
<div id="fl-builder-settings-section-source" class="fl-loop-data-source-select fl-builder-settings-section">
	<table class="fl-form-table">
	<?php
	FLBuilder::render_settings_field(
		'user_id',
		array(
			'type'   => 'suggest',
			'label'  => __( 'User', 'bb-vapor-modules-pro' ),
			'action' => 'fl_as_users', // Search posts.
			'data'   => 'users',
			'limit'  => 1,
		),
		$settings
	);
	?>
	</table>
</div>
