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
	foreach ( FLBuilderLoop::post_types() as $slug => $bbvm_post_type ) {
		$taxonomies = FLBuilderLoop::taxonomies( $slug );
		foreach ( $taxonomies as $tax_slug => $bbvm_tax ) {
			$tax_types[]                   = 'custom_tax_' . $slug . '_' . $tax_slug;
			$taxonomies_array[ $tax_slug ] = $bbvm_tax->label;
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
					'fields' => array(
						'taxonomy_select',
						'term_orderby',
						'term_order',
						'term_number',
					),
				),
				'custom'   => array(
					'fields' => $tax_types,
				),
			),
		),
		$settings
	);

	// Data Source.
	FLBuilder::render_settings_field(
		'taxonomy_select',
		array(
			'type'    => 'select',
			'label'   => __( 'Select a Taxonomy', 'bb-vapor-modules-pro' ),
			'default' => 'taxonomy',
			'options' => $taxonomies_array,
		),
		$settings
	);

	FLBuilder::render_settings_field(
		'term_orderby',
		array(
			'type'    => 'select',
			'label'   => __( 'Order By', 'bb-vapor-modules-pro' ),
			'default' => 'name',
			'options' => array(
				'name' => __( 'Term Name', 'bb-vapor-modules-pro' ),
				'slug' => __( 'Term Slug', 'bb-vapor-modules-pro' ),
			),
		),
		$settings
	);

	FLBuilder::render_settings_field(
		'term_order',
		array(
			'type'    => 'select',
			'label'   => __( 'Order', 'bb-vapor-modules-pro' ),
			'default' => 'ASC',
			'options' => array(
				'ASC'  => __( 'A-Z', 'bb-vapor-modules-pro' ),
				'DESC' => __( 'Z-A', 'bb-vapor-modules-pro' ),
			),
		),
		$settings
	);

	FLBuilder::render_settings_field(
		'term_number',
		array(
			'type'    => 'unit',
			'label'   => __( 'Number of Terms to Retrieve', 'bb-vapor-modules-pro' ),
			'default' => '3',
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
					'custom_term_' . $slug . '_tax_' . $tax_slug,
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
