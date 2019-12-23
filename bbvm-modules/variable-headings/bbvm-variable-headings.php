<?php // phpcs:ignore
class BBVapor_Variable_Headings_Module extends FLBuilderModule {
	/**
	 * Class Constructor.
	 */
	public function __construct() {
		parent::__construct(
			array(
				'name'            => __( 'Variable Headings', 'bb-vapor-modules-pro' ),
				'description'     => __( 'Variable Headings for Beaver Builder', 'bb-vapor-modules-pro' ),
				'category'        => __( 'Text Effects', 'bb-vapor-modules-pro' ),
				'group'           => apply_filters( 'bbvm_whitelabel_category', __( 'Vapor', 'bb-vapor-modules-pro' ) ),
				'dir'             => BBVAPOR_PRO_BEAVER_BUILDER_DIR . 'bbvm-modules/variable-headings/',
				'url'             => BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/variable-headings/',
				'editor_export'   => true, // Defaults to true and can be omitted.
				'enabled'         => true, // Defaults to true and can be omitted.
				'partial_refresh' => false, // Defaults to false and can be omitted.
			)
		);
	}
}
FLBuilder::register_settings_form(
	'bbvm_variable_headlines',
	array(
		'title' => __( 'Add Headline Text', 'bb-vapor-modules-pro' ),
		'tabs'  => array(
			'general' => array(
				'title'    => __( 'General', 'bb-vapor-modules-pro' ),
				'sections' => array(
					'general' => array(
						'title'  => __( 'Add Headline Text', 'bb-vapor-modules-pro' ),
						'fields' => array(
							'headline'            => array(
								'type'    => 'text',
								'label'   => __( 'Headline Text', 'bb-vapor-modules-pro' ),
								'default' => '',
							),
							'headline_color'      => array(
								'type'       => 'color',
								'label'      => __( 'Headline Color', 'bb-vapor-modules-pro' ),
								'show_reset' => true,
							),
							'headline_display'    => array(
								'type'    => 'select',
								'label'   => __( 'Headline Display', 'bb-vapor-modules-pro' ),
								'default' => 'inline',
								'options' => array(
									'inline' => __( 'Inline', 'bb-vapor-modules-pro' ),
									'block'  => __( 'Block', 'bb-vapor-modules-pro' ),
								),
							),
							'headline_typography' => array(
								'type'       => 'typography',
								'label'      => __( 'Headline Typography', 'bb-vapor-modules-pro' ),
								'responsive' => true,
							),
						),
					),
				),
			),
		),
	)
);
FLBuilder::register_module(
	'BBVapor_Variable_Headings_Module',
	array(
		'general' => array(
			'title'    => __( 'General', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'general' => array(
					'title'  => __( 'Headings', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'headline_tag'       => array(
							'type'    => 'select',
							'label'   => __( 'Heading Tag', 'bb-vapor-modules-pro' ),
							'options' => array(
								'h1' => 'H1',
								'h2' => 'H2',
								'h3' => 'H3',
								'h4' => 'H4',
								'h5' => 'H5',
								'h6' => 'H6',
							),
							'default' => 'h2',
						),
						'headlines'          => array(
							'type'         => 'form',
							'form'         => 'bbvm_variable_headlines',
							'label'        => __( 'Heading', 'bb-vapor-modules-pro' ),
							'multiple'     => true,
							'preview_text' => 'headline',
						),
						'headline_padding'   => array(
							'type'       => 'dimension',
							'label'      => __( 'Headline Padding', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'headline_margin'    => array(
							'type'       => 'dimension',
							'label'      => __( 'Headline Margin', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'headline_alignment' => array(
							'type'    => 'align',
							'label'   => 'Headline Alignment',
							'default' => 'left',
						),
					),
				),
			),
		),
	)
);
