<?php
/**
 * Render the Loop Settings for Category Grid Module.
 *
 */
FLBuilderModel::default_settings(
	$settings,
	array(
		'post_type' => 'post',
	)
);
?>
<div id="fl-builder-settings-section-source" class="fl-loop-data-source-select fl-builder-settings-section">
	<table class="fl-form-table">
	<?php
	$tax_types = array();
	foreach ( FLBuilderLoop::post_types() as $slug => $bbvm_post_type ) {
		$taxonomies = FLBuilderLoop::taxonomies( $slug );
		foreach ( $taxonomies as $tax_slug => $bbvm_tax ) {
			$tax_types[] = 'custom_tax_' . $slug . '_' . $tax_slug;
		}
	}

	// Data Source.
	FLBuilder::render_settings_field(
		'category_options',
		array(
			'type'    => 'select',
			'label'   => __( 'Category Options', 'bb-vapor-modules-pro' ),
			'default' => 'taxonomy',
			'options' => array(
				'taxonomy' => __( 'Select Categories by Taxonomy', 'bb-vapor-modules-pro' ),
				'custom'   => __( 'Select Categories Manually', 'bb-vapor-modules-pro' ),
			),
			'toggle'  => array(
				'taxonomy' => array(
					'fields' => array( 'taxonomy_select' ),
				),
				'custom' => array(
					'fields' => $tax_types,
				),
			),
		),
		$settings
	);

	?>
	</table>
</div>
<div id="fl-builder-settings-section-filter" class="bbvm-settings-section">
	<?php
	foreach ( FLBuilderLoop::post_types() as $slug => $bbvm_post_type ) :
		?>
		<table class="fl-form-table">
			<?php
			// Taxonomies.
			$taxonomies       = FLBuilderLoop::taxonomies( $slug );
			$taxonomies_array = array();

			foreach ( $taxonomies as $tax_slug => $bbvm_tax ) {
				FLBuilder::render_settings_field(
					'custom_tax_' . $slug . '_' . $tax_slug,
					array(
						'type'   => 'suggest',
						'action' => 'fl_as_terms',
						'data'   => $tax_slug,
						'label'  => __( 'Select a term:', 'bb-vapor-modules-pro' ) . ' ' . $bbvm_tax->label,
					),
					$settings
				);
				$taxonomies_array[ $tax_slug ] = $bbvm_tax->label;
			}

			?>
		</table>
		<?php
	endforeach;
	?>
</div>
