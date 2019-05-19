<?php
class BBVapor_Alerts_Module extends FLBuilderModule {
	public function __construct()
	{
		parent::__construct(array(
			'name'            => __( 'Alerts', 'bb-vapor-modules' ),
			'description'     => __( 'Alerts for Beaver Builder', 'bb-vapor-modules' ),
			'category'        => __( 'Base', 'bb-vapor-modules' ),
			'group'           => __( 'Vapor', 'mediarion-bb-modules' ),
			'dir'             => BBVAPOR_BEAVER_BUILDER_DIR . 'bbvm-modules/alerts/',
			'url'             => BBVAPOR_BEAVER_BUILDER_URL . 'bbvm-modules/alerts/',
			'editor_export'   => true, // Defaults to true and can be omitted.
			'enabled'         => true, // Defaults to true and can be omitted.
			'partial_refresh' => false, // Defaults to false and can be omitted.
		));
	}
}
/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('BBVapor_Alerts_Module', array(
	'general'       => array( // Tab
		'title'         => __('General', 'bb-vapor-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'general'       => array( // Section
				'title'         => __('Alerts', 'bb-vapor-modules'), // Section Title
				'fields'        => array( // Section Fields
					'alert_text' => array(
						'type' => 'textarea',
						'label' => __( 'Alert Text', 'bb-vapor-modules' ),
						'rows' => 5
					),
					'alert_style' => array(
						'type'          => 'select',
						'label'         => __( 'Alert Style', 'bb-vapor-modules' ),
						'options' => array(
							'primary' => __( 'Primary', 'bb-vapor-modules' ),
							'secondary' => __( 'Secondary', 'bb-vapor-modules' ),
							'success' => __( 'Success', 'bb-vapor-modules' ),
							'danger' => __( 'Danger', 'bb-vapor-modules' ),
							'warning' => __( 'Warning', 'bb-vapor-modules' ),
							'info' => __( 'Info', 'bb-vapor-modules' ),
							'light' => __( 'Light', 'bb-vapor-modules' ),
							'dark' => __( 'Dark', 'bb-vapor-modules' ),
							'custom' => __( 'Design Your Own', 'bb-vapor-modules' )
						),
						'default' => 'primary',
						'toggle' => array( 'custom' => array( 'fields' => array( 'background_color', 'text_color', 'alert_padding', 'border_radius' ) ) )
					),
					'alert_padding' => array(
						'type' => 'dimension',
						'label' => __( 'Alert Padding', 'bb-vapor-modules' ),
					),
					'border_radius' => array(
						'type' => 'unit',
						'label' => __( 'Border Radius', 'bb-vapor-modules' ),
						'default' => '0'
					),
					'background_color' => array(
						'type' => 'color',
						'label' => __( 'Background Color', 'bb-vapor-modules' ),
						'default' => 'FFFFFF'
					),
					'text_color' => array(
						'type' => 'color',
						'label' => __( 'Text Color', 'bb-vapor-modules' ),
						'default' => '000000'
					),
				)
			)
		)
	),
	'typography'       => array( // Tab
		'title'         => __('Typography', 'bb-vapor-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'styles'       => array( // Section
				'title'         => __('Typography', 'bb-vapor-modules'), // Section Title
				'fields'        => array( // Section Fields
					'alert_typography' => array(
						'type' => 'typography',
						'label' => __( 'Select a Typography', 'bb-vapor-modules' ),
						'responsive' => true
					),
					'alert_alignment' => array(
						'type' => 'align',
						'label' => __( 'Alert Alignment', 'bb-vapor-modules' ),
						'default' => 'center',
					)
				)
			)
		)
	),
	'icon'       => array( // Tab
		'title'         => __('Icon', 'bb-vapor-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'styles'       => array( // Section
				'title'         => __('Icon', 'bb-vapor-modules'), // Section Title
				'fields'        => array( // Section Fields
					'show_icon' => array(
						'type' => 'select',
						'label' => __( 'Show an Icon?', 'bb-vapor-modules' ),
						'options' => array(
							'yes' => __( 'Yes', 'bb-vapor-modules' ),
							'no' => __( 'No', 'bb-vapor-modules' )
						),
						'toggle' => array(
							'yes' => array( 'fields' => array( 'icon', 'icon_size' ) )
						),
						'default' => 'no'
					),
					'icon' => array(
						'type' => 'icon',
						'label' => __( 'Select an Icon', 'bb-vapor-modules' ),
						'show_remove' => true
					),
					'icon_size' => array(
						'type' => 'unit',
						'label' => __( 'Select an Icon Size', 'bb-vapor-modules' ),
						'default' => '32'
					),
				)
			)
		),
	),
	'button'       => array( // Tab
		'title'         => __('Button', 'bb-vapor-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'styles'       => array( // Section
				'title'         => __('Button', 'bb-vapor-modules'), // Section Title
				'fields'        => array( // Section Fields
					'show_button' => array(
						'type' => 'select',
						'label' => __( 'Show a Button?', 'bb-vapor-modules' ),
						'options' => array(
							'yes' => __( 'Yes', 'bb-vapor-modules' ),
							'no' => __( 'No', 'bb-vapor-modules' )
						),
						'toggle' => array(
							'yes' => array( 'fields' => array( 'button_theme', 'button_location', 'button_text', 'button_typography' ) )
						),
						'default' => 'no'
					),
					'button_text' => array(
						'type' => 'text',
						'label' => __( 'Button Text', 'bb-vapor-modules' ),
					),
					'button_typography' => array(
						'type' => 'typography',
						'label' => __( 'Button Typography', 'bb-vapor-modules' )
					),
					'button_theme' => array(
						'type' => 'select',
						'label' => __( 'Button Theme', 'bb-vapor-modules' ),
						'options' => array(
							'inherit' => __( 'Inherit From Theme', 'bb-vapor-modules' ),
							'custom' => __( 'Design Your Own', 'bb-vapor-modules' )
						),
						'default' => 'inherit',
						'toggle' => array(
							'custom' => array( 'fields' => array( 'button_text_color', 'button_background_color', 'button_background_color_hover', 'button_border_color', 'button_border_radius', 'button_padding' ) )
						)
					),
					'button_text_color' => array(
						'type' => 'color',
						'label' => __( 'Button Text Color', 'bb-vapor-modules' )
					),
					'button_background_color' => array(
						'type' => 'color',
						'label' => __( 'Button Background Color', 'bb-vapor-modules' )
					),
					'button_background_color_hover' => array(
						'type' => 'color',
						'label' => __( 'Button Background Color on Hover', 'bb-vapor-modules' )
					),
					'button_border_radius' => array(
						'type' => 'unit',
						'label' => __( 'Button Border Radius', 'bb-vapor-modules' ),
						'default' => '5',
						'description' => 'px',
					),
					'button_padding' => array(
						'type' => 'dimension',
						'label' => __( 'Button Padding', 'bb-vapor-modules' ),
					),
					'button_border_color' => array(
						'type' => 'color',
						'label' => __( 'Button Border Color', 'bb-vapor-modules' )
					),
					'button_location' => array(
						'type' => 'link',
						'label' => __( 'Button Location', 'bb-vapor-modules' )
					),
				)
			)
		)
	)
) );
