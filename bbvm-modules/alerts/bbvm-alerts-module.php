<?php
class BBVapor_Alerts_Module extends FLBuilderModule {
	public function __construct()
	{
		parent::__construct(array(
			'name'            => __( 'Alerts', 'bb-vapor-modules-pro' ),
			'description'     => __( 'Alerts for Beaver Builder', 'bb-vapor-modules-pro' ),
			'category'        => __( 'Base', 'bb-vapor-modules-pro' ),
			'group'           => __( 'Vapor', 'bb-vapor-modules-pro' ),
			'dir'             => BBVAPOR_PRO_BEAVER_BUILDER_DIR . 'bbvm-modules/alerts/',
			'url'             => BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/alerts/',
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
		'title'         => __('General', 'bb-vapor-modules-pro'), // Tab title
		'sections'      => array( // Tab Sections
			'general'       => array( // Section
				'title'         => __('Alerts', 'bb-vapor-modules-pro'), // Section Title
				'fields'        => array( // Section Fields
					'alert_text' => array(
						'type' => 'textarea',
						'label' => __( 'Alert Text', 'bb-vapor-modules-pro' ),
						'rows' => 5
					),
					'alert_style' => array(
						'type'          => 'select',
						'label'         => __( 'Alert Style', 'bb-vapor-modules-pro' ),
						'options' => array(
							'primary' => __( 'Primary', 'bb-vapor-modules-pro' ),
							'secondary' => __( 'Secondary', 'bb-vapor-modules-pro' ),
							'success' => __( 'Success', 'bb-vapor-modules-pro' ),
							'danger' => __( 'Danger', 'bb-vapor-modules-pro' ),
							'warning' => __( 'Warning', 'bb-vapor-modules-pro' ),
							'info' => __( 'Info', 'bb-vapor-modules-pro' ),
							'light' => __( 'Light', 'bb-vapor-modules-pro' ),
							'dark' => __( 'Dark', 'bb-vapor-modules-pro' ),
							'custom' => __( 'Design Your Own', 'bb-vapor-modules-pro' )
						),
						'default' => 'primary',
						'toggle' => array( 'custom' => array( 'fields' => array( 'background_color', 'text_color', 'alert_padding', 'border_radius' ) ) )
					),
					'alert_padding' => array(
						'type' => 'dimension',
						'label' => __( 'Alert Padding', 'bb-vapor-modules-pro' ),
					),
					'border_radius' => array(
						'type' => 'unit',
						'label' => __( 'Border Radius', 'bb-vapor-modules-pro' ),
						'default' => '0'
					),
					'background_color' => array(
						'type' => 'color',
						'label' => __( 'Background Color', 'bb-vapor-modules-pro' ),
						'default' => 'FFFFFF'
					),
					'text_color' => array(
						'type' => 'color',
						'label' => __( 'Text Color', 'bb-vapor-modules-pro' ),
						'default' => '000000'
					),
				)
			)
		)
	),
	'typography'       => array( // Tab
		'title'         => __('Typography', 'bb-vapor-modules-pro'), // Tab title
		'sections'      => array( // Tab Sections
			'styles'       => array( // Section
				'title'         => __('Typography', 'bb-vapor-modules-pro'), // Section Title
				'fields'        => array( // Section Fields
					'alert_typography' => array(
						'type' => 'typography',
						'label' => __( 'Select a Typography', 'bb-vapor-modules-pro' ),
						'responsive' => true
					),
					'alert_alignment' => array(
						'type' => 'align',
						'label' => __( 'Alert Alignment', 'bb-vapor-modules-pro' ),
						'default' => 'center',
					)
				)
			)
		)
	),
	'icon'       => array( // Tab
		'title'         => __('Icon', 'bb-vapor-modules-pro'), // Tab title
		'sections'      => array( // Tab Sections
			'styles'       => array( // Section
				'title'         => __('Icon', 'bb-vapor-modules-pro'), // Section Title
				'fields'        => array( // Section Fields
					'show_icon' => array(
						'type' => 'select',
						'label' => __( 'Show an Icon?', 'bb-vapor-modules-pro' ),
						'options' => array(
							'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
							'no' => __( 'No', 'bb-vapor-modules-pro' )
						),
						'toggle' => array(
							'yes' => array( 'fields' => array( 'icon', 'icon_size' ) )
						),
						'default' => 'no'
					),
					'icon' => array(
						'type' => 'icon',
						'label' => __( 'Select an Icon', 'bb-vapor-modules-pro' ),
						'show_remove' => true
					),
					'icon_size' => array(
						'type' => 'unit',
						'label' => __( 'Select an Icon Size', 'bb-vapor-modules-pro' ),
						'default' => '32'
					),
				)
			)
		),
	),
	'button'       => array( // Tab
		'title'         => __('Button', 'bb-vapor-modules-pro'), // Tab title
		'sections'      => array( // Tab Sections
			'styles'       => array( // Section
				'title'         => __('Button', 'bb-vapor-modules-pro'), // Section Title
				'fields'        => array( // Section Fields
					'show_button' => array(
						'type' => 'select',
						'label' => __( 'Show a Button?', 'bb-vapor-modules-pro' ),
						'options' => array(
							'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
							'no' => __( 'No', 'bb-vapor-modules-pro' )
						),
						'toggle' => array(
							'yes' => array( 'fields' => array( 'button_theme', 'button_location', 'button_text', 'button_typography' ) )
						),
						'default' => 'no'
					),
					'button_text' => array(
						'type' => 'text',
						'label' => __( 'Button Text', 'bb-vapor-modules-pro' ),
					),
					'button_typography' => array(
						'type' => 'typography',
						'label' => __( 'Button Typography', 'bb-vapor-modules-pro' )
					),
					'button_theme' => array(
						'type' => 'select',
						'label' => __( 'Button Theme', 'bb-vapor-modules-pro' ),
						'options' => array(
							'inherit' => __( 'Inherit From Theme', 'bb-vapor-modules-pro' ),
							'custom' => __( 'Design Your Own', 'bb-vapor-modules-pro' )
						),
						'default' => 'inherit',
						'toggle' => array(
							'custom' => array( 'fields' => array( 'button_text_color', 'button_background_color', 'button_background_color_hover', 'button_border_color', 'button_border_radius', 'button_padding' ) )
						)
					),
					'button_text_color' => array(
						'type' => 'color',
						'label' => __( 'Button Text Color', 'bb-vapor-modules-pro' )
					),
					'button_background_color' => array(
						'type' => 'color',
						'label' => __( 'Button Background Color', 'bb-vapor-modules-pro' )
					),
					'button_background_color_hover' => array(
						'type' => 'color',
						'label' => __( 'Button Background Color on Hover', 'bb-vapor-modules-pro' )
					),
					'button_border_radius' => array(
						'type' => 'unit',
						'label' => __( 'Button Border Radius', 'bb-vapor-modules-pro' ),
						'default' => '5',
						'description' => 'px',
					),
					'button_padding' => array(
						'type' => 'dimension',
						'label' => __( 'Button Padding', 'bb-vapor-modules-pro' ),
					),
					'button_border_color' => array(
						'type' => 'color',
						'label' => __( 'Button Border Color', 'bb-vapor-modules-pro' )
					),
					'button_location' => array(
						'type' => 'link',
						'label' => __( 'Button Location', 'bb-vapor-modules-pro' )
					),
				)
			)
		)
	)
) );
