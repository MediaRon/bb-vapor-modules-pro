<?php
class BBVapor_Advanced_Headings_Module extends FLBuilderModule {
	public function __construct() {
		parent::__construct(
			array(
				'name'            => __( 'Advanced Headings', 'bb-vapor-modules-pro' ),
				'description'     => __( 'Advanced Headings for Beaver Builder', 'bb-vapor-modules-pro' ),
				'category'        => __( 'Base', 'bb-vapor-modules-pro' ),
				'group'           => __( 'Vapor', 'bb-vapor-modules-pro' ),
				'dir'             => BBVAPOR_PRO_BEAVER_BUILDER_DIR . 'bbvm-modules/advanced-headings/',
				'url'             => BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/advanced-headings/',
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
								'label'   => __( 'Headline Text', 'bb-vapor-modules' ),
								'default' => '',
							),
							'headline_color'      => array(
								'type'       => 'color',
								'label'      => __( 'Headline Color', 'bb-vapor-modules' ),
								'show_reset' => true,
							),
							'headline_typography' => array(
								'type'       => 'typography',
								'label'      => __( 'Headline Typography', 'bb-vapor-modules' ),
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
	'BBVapor_Advanced_Headings_Module',
	array(
		'general' => array( // Tab
			'title'    => __( 'General', 'bb-vapor-modules-pro' ), // Tab title
			'sections' => array( // Tab Sections
				'general' => array( // Section
					'title'  => __( 'Headings', 'bb-vapor-modules-pro' ), // Section Title
					'fields' => array( // Section Fields
						'headline_tag'     => array(
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
						'headline_select'  => array(
							'type'    => 'select',
							'label'   => __( 'Headline Style', 'bb-vapor-modules-pro' ),
							'options' => array(
								'normal'   => __( 'Normal', 'bb-vapor-modules-pro' ),
								'variable' => __( 'Variable', 'bb-vapor-modules-pro' ),
							),
							'toggle'  => array(
								'variable' => array(
									'fields' => array(
										'headlines',
									),
								),
								'normal'   => array(
									'fields' => array(
										'headline',
									),
								),
							),
							'default' => 'normal',
						),
						'headline'         => array(
							'type'  => 'text',
							'label' => __( 'Enter Your Headline', 'bb-vapor-modules-pro' ),
						),
						'headlines'        => array(
							'type'         => 'form',
							'form'         => 'bbvm_variable_headlines',
							'label'        => __( 'Heading', 'bb-vapor-modules-pro' ),
							'multiple'     => true,
							'preview_text' => 'headline',
						),
						'headline_padding' => array(
							'type'       => 'dimension',
							'label'      => __( 'Headline Padding', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'headline_margin'  => array(
							'type'       => 'dimension',
							'label'      => __( 'Headline Margin', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
					),
				),
			),
		),
	)
);
