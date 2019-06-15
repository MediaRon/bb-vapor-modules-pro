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
<div id="fl-builder-settings-section-general" class="fl-loop-builder">
<h3 class="fl-builder-settings-title"><span class="fl-builder-settings-title-text-wrap"><?php esc_html_e( 'Post Type Select', 'bb-vapor-modules-pro' ); ?></span></h3>
	<table class="fl-form-table">
	<?php

	// Post type.
	FLBuilder::render_settings_field(
		'post_type',
		array(
			'type'  => 'post-type',
			'label' => __( 'Post Type', 'uabb' ),
			'help'  => __( 'Choose the post type to display in module.', 'uabb' ),
		),
		$settings
	);
	?>
	</table>
</div>
<div id="fl-builder-settings-section-masonary_filter" class="bbvm-settings-section">
	<h3 class="fl-builder-settings-title"><?php esc_html_e( 'Taxonomy Filter', 'bb-vapor-modules-pro' ); ?></h3>
	<?php foreach ( FLBuilderLoop::post_types() as $slug => $type ) : ?>
		<table class="fl-form-table fl-loop-builder-masonary_filter fl-loop-builder-<?php echo esc_attr( $slug ); ?>-masonary_filter"
			<?php
			if ( $slug === $settings->post_type ) {
				echo 'style="display:table;"';
			}
			?>
		>
		<?php

		// Taxonomies.
		$taxonomies       = FLBuilderLoop::taxonomies( $slug );
		$taxonomies_array = array();
		$toggleArray      = array();

		if ( count( $taxonomies ) > 0 ) {
			$taxonomies_array[-1] = esc_html__( 'No Filter', 'bb-vapor-modules-pro' );
		}

		foreach ( $taxonomies as $tax_slug => $tax ) {
			$taxonomies_array[ $tax_slug ] = $tax->label;
		}

		if ( count( $taxonomies_array ) > 0 ) {
			// Taxonomy Filter.
			FLBuilder::render_settings_field(
				'masonary_filter_' . $slug,
				array(
					'type'    => 'select',
					'label'   => __( 'Taxonomy Filter', 'uabb' ),
					'help'    => __( 'Select post filter criteria to display post filter at top of the module.', 'uabb' ),
					'options' => $taxonomies_array,
				),
				$settings
			);
		}
			FLBuilder::render_settings_field(
				'uabb_masonary_filter_type_' . $slug, array(
					'type'    => 'select',
					'label'   => __( 'Select Filter Layout', 'uabb' ),
					'options' => array(
						'buttons'   => __( 'Button', 'uabb' ),
						'drop-down' => __( 'Drop Down', 'uabb' ),
					),
				), $settings
			);

			FLBuilder::render_settings_field(
				'uabb_masonary_filter_all_edit_' . $slug, array(
					'type'        => 'text',
					'label'       => __( '"All" Filter Label', 'uabb' ),
					'default'     => __( 'All', 'uabb' ),
					'placeholder' => __( 'All', 'uabb' ),
					'connections' => array( 'string' ),
				), $settings
			);
		?>
		</table>
	<?php endforeach; ?>
</div>

<div id="fl-builder-settings-section-filter" class="uabb-settings-section">
<h3 class="fl-builder-settings-title"><span class="fl-builder-settings-title-text-wrap"><?php _e( 'Filter', 'uabb' ); ?></span></h3>

	<?php foreach ( FLBuilderLoop::post_types() as $slug => $type ) : ?>
		<table class="fl-form-table fl-loop-builder-filter fl-loop-builder-<?php echo $slug; ?>-filter"
			<?php
			if ( $slug == $settings->post_type ) {
				echo 'style="display:table;"';
			}
			?>
		>
		<?php

		FLBuilder::render_settings_field(
			'posts_' . $slug . '_matching', array(
				'type'    => 'select',
				'label'   => $type->label,
				'options' => array(
					'1' => sprintf( /* translators: %s: search term */ __( 'Match these %s', '%s is an object like posts or taxonomies.', 'uabb' ), $type->label, $type->label ),
					'0' => sprintf( /* translators: %s: search term */ __( 'Do not match these %s', '%s is an object like posts or taxonomies.', 'uabb' ), $type->label, $type->label ),

				),
				'help'    => sprintf( /* translators: %1$s: search term, translators: %2$s: search term */ __( 'Enter a comma separated list of %1$s. Only these %2$s will be shown.', 'uabb' ), $type->label, $type->label ),
			), $settings
		);
		// Posts.
		FLBuilder::render_settings_field(
			'posts_' . $slug, array(
				'type'   => 'suggest',
				'action' => 'fl_as_posts',
				'data'   => $slug,
				'label'  => '&nbsp',
			), $settings
		);

		// Taxonomies.
		$taxonomies       = FLBuilderLoop::taxonomies( $slug );
		$taxonomies_array = array();

		foreach ( $taxonomies as $tax_slug => $tax ) {

			FLBuilder::render_settings_field(
				'tax_' . $slug . '_' . $tax_slug . '_matching', array(
					'type'    => 'select',
					'label'   => $tax->label,
					'help'    => sprintf( /* translators: %1$s: search term, translators: %2$s: search term */ __( 'Enter a comma separated list of %1$s. Only posts with these %2$s will be shown.', 'uabb' ), $tax->label, $tax->label ),
					'options' => array(
						'1' => sprintf( /* translators: %s: search term */ __( 'Match these %s', '%s is an object like posts or taxonomies.', 'uabb' ), $tax->label, $tax->label ),
						'0' => sprintf( /* translators: %s: search term */ __( 'Do not match these %s', '%s is an object like posts or taxonomies.', 'uabb' ), $tax->label, $tax->label ),

					),
					'help'    => sprintf( /* translators: %1$s: search term, translators: %2$s: search term */ __( 'Enter a comma separated list of %1$s. Only posts with these %2$s will be shown.', 'uabb' ), $tax->label, $tax->label ),
				), $settings
			);
			FLBuilder::render_settings_field(
				'tax_' . $slug . '_' . $tax_slug, array(
					'type'   => 'suggest',
					'action' => 'fl_as_terms',
					'data'   => $tax_slug,
					'label'  => '&nbsp',
				), $settings
			);
			$taxonomies_array[ $tax_slug ] = $tax->label;
		}

		?>
		</table>
	<?php endforeach; ?>
</div>

</div>
