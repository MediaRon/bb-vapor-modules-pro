<?php
/**
 * Render the Loop Settings for LearnDash LessonsModule..
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 2.0.0
 */

FLBuilderModel::default_settings(
	$settings,
	array(
		'post_type' => 'sfwd-topic',
	)
);
?>
<div id="fl-builder-settings-section-source" class="fl-loop-data-source-select fl-builder-settings-section">
	<table class="fl-form-table">
	<?php
	$taxonomies = get_object_taxonomies( 'sfwd-topic', 'objects' );
	FLBuilder::render_settings_field(
		'num_courses',
		array(
			'type'    => 'unit',
			'label'   => __( 'Number of Topics to Display', 'bb-vapor-modules-pro' ),
			'default' => 10,
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
				'none'     => __( 'None', 'bb-vapor-modules-pro' ),
				'id'       => __( 'ID', 'bb-vapor-modules-pro' ),
				'author'   => __( 'Author', 'bb-vapor-modules-pro' ),
				'title'    => __( 'Title', 'bb-vapor-modules-pro' ),
				'name'     => __( 'Name', 'bb-vapor-modules-pro' ),
				'date'     => __( 'Date', 'bb-vapor-modules-pro' ),
				'modified' => __( 'Modified', 'bb-vapor-modules-pro' ),

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
	foreach ( $taxonomies as $bbvm_tax ) {
		FLBuilder::render_settings_field(
			'include_term_tax_' . $bbvm_tax->name,
			array(
				'type'   => 'suggest',
				'action' => 'fl_as_terms',
				'data'   => $bbvm_tax->name,
				'label'  => __( 'Select a term to include:', 'bb-vapor-modules-pro' ) . ' ' . $bbvm_tax->label,
				'limit'  => 1,
			),
			$settings
		);
	}
	?>
	</table>
</div>
