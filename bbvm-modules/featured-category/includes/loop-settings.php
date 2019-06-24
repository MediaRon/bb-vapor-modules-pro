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
	$tax_types        = array();
	$taxonomies_array = array();
	$toggle_types     = array();
	foreach ( FLBuilderLoop::post_types() as $slug => $bbvm_post_type ) {
		$taxonomies = FLBuilderLoop::taxonomies( $slug );
		foreach ( $taxonomies as $tax_slug => $bbvm_tax ) {
			$tax_types[]                   = 'custom_term_' . $slug . '_tax_' . $tax_slug;
			$taxonomies_array[ $tax_slug ] = $bbvm_tax->label;

			$toggle_types[ $tax_slug ] = array(
				'fields' => array(
					'custom_term_tax_' . $tax_slug,
				),
			);
		}
	}

	// Data Source.
	FLBuilder::render_settings_field(
		'taxonomy_select',
		array(
			'type'    => 'select',
			'label'   => __( 'Select a Taxonomy', 'bb-vapor-modules-pro' ),
			'default' => 'taxonomy',
			'options' => $taxonomies_array,
			'toggle'  => $toggle_types,
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
					'custom_term_tax_' . $tax_slug,
					array(
						'type'   => 'suggest',
						'action' => 'fl_as_terms',
						'data'   => $tax_slug,
						'label'  => __( 'Select a term:', 'bb-vapor-modules-pro' ) . ' ' . $bbvm_tax->label,
						'limit'  => 1,
					),
					$settings
				);
			}

			?>
		</table>
		<?php
	endforeach;
	?>
</div>
