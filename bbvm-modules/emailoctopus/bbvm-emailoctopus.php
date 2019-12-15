<?php // phpcs:ignore
class BBVapor_EmailOctopus extends FLBuilderModule {
	/**
	 * Class Constructor.
	 */
	public function __construct() {
		parent::__construct(
			array(
				'name'            => __( 'EmailOctopus', 'bb-vapor-modules-pro' ),
				'description'     => __( 'EmailOctopus for Beaver Builder', 'bb-vapor-modules-pro' ),
				'category'        => __( 'External Plugins', 'bb-vapor-modules-pro' ),
				'group'           => apply_filters( 'bbvm_whitelabel_category', __( 'Vapor', 'bb-vapor-modules-pro' ) ),
				'dir'             => BBVAPOR_PRO_BEAVER_BUILDER_DIR . 'bbvm-modules/emailoctopus/',
				'url'             => BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/emailoctopus/',
				'editor_export'   => true, // Defaults to true and can be omitted.
				'enabled'         => true, // Defaults to true and can be omitted.
				'partial_refresh' => true, // Defaults to false and can be omitted.
			)
		);
	}
}
/**
 * Register the module and its form settings.
 */
$emailoctopus_forms_array = array( '0' => __( 'Select a form', 'bb-vapor-modules-pro' ) );
global $wpdb;
$emailoctopus_table        = $wpdb->prefix . 'emailoctopus_forms';
$emailoctopus_select       = "SELECT form_id, title, description, list FROM $emailoctopus_table";
$emailoctopus_form_results = $wpdb->get_results( $emailoctopus_select ); // phpcs:ignore
foreach ( $emailoctopus_form_results as $form_result ) {
	$emailoctopus_forms_array[ $form_result->form_id ] = $form_result->title;
}

FLBuilder::register_module(
	'BBVapor_EmailOctopus',
	array(
		'general'             => array(
			'title'    => __( 'General', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'general'  => array(
					'title'  => __( 'Form Select', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'form'        => array(
							'type'    => 'select',
							'label'   => __( 'Select a form', 'bb-vapor-modules-pro' ),
							'options' => $emailoctopus_forms_array,
						),
						'hide_credit' => array(
							'type'    => 'select',
							'label'   => __( 'Hide EmailOctopus Branding?', 'bb-vapor-modules-pro' ),
							'options' => array(
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
							),
							'default' => 'no',
						),
					),
				),
				'layout'   => array(
					'title'  => __( 'Layout', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'layout'    => array(
							'type'    => 'select',
							'label'   => __( 'Choose Layout', 'bb-vapor-modules-pro' ),
							'options' => array(
								'default'             => __( 'Default', 'bb-vapor-modules-pro' ),
								'full_width'          => __( 'Full Width', 'bb-vapor-modules-pro' ),
								'full_width_centered' => __( 'Full Width Centered', 'bb-vapor-modules-pro' ),
							),
							'default' => 'default',
						),
						'max_width' => array(
							'type'        => 'unit',
							'label'       => __( 'Select a maximum width for the form', 'bb-vapor-modules-pro' ),
							'default'     => '100',
							'description' => '%',
							'responsive'  => true,
						),
					),
				),
			),
		),
		'styles'              => array(
			'title'    => __( 'Styles', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'styles'       => array(
					'title'  => __( 'General Styles', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'overall_color'         => array(
							'type'       => 'color',
							'label'      => __( 'Overall Text Color', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
						),
						'padding'               => array(
							'type'       => 'dimension',
							'label'      => __( 'Select a form padding', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'form_margin'           => array(
							'type'       => 'dimension',
							'label'      => __( 'Select a form margin', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'form_background_color' => array(
							'type'       => 'color',
							'label'      => __( 'Select a background color for your form', 'bb-vapor-modules-pro' ),
							'default'    => '#FFFFFF',
							'show_reset' => true,
							'show_alpha' => true,
						),
						'form_radius'           => array(
							'type'  => 'dimension',
							'label' => __( 'Select a border radius for your form', 'bb-vapor-modules-pro' ),
						),
					),
				),
				'labels'       => array(
					'title'  => __( 'Labels', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'form_label_color'     => array(
							'type'    => 'color',
							'label'   => __( 'Label Color', 'bb-vapor-modules-pro' ),
							'default' => '000000',
						),
						'label_padding'        => array(
							'type'  => 'dimension',
							'label' => __( 'Label Padding', 'bb-vapor-modules-pro' ),
						),
						'label_margin'         => array(
							'type'  => 'dimension',
							'label' => __( 'Label Margin', 'bb-vapor-modules-pro' ),
						),
					),
				),
				'inputs'       => array(
					'title'  => __( 'Input styles', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'input_height'           => array(
							'type'        => 'unit',
							'label'       => __( 'Input Height', 'bb-vapor-modules-pro' ),
							'description' => 'px',
							'default'     => '50',
						),
						'input_general_padding'  => array(
							'type'       => 'dimension',
							'label'      => __( 'Input General Padding', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'input_general_margin'   => array(
							'type'       => 'dimension',
							'label'      => __( 'Input General Margin', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'input_background_color' => array(
							'type'       => 'color',
							'label'      => __( 'Input background color', 'bb-vapor-modules-pro' ),
							'default'    => 'FFFFFF',
							'show_alpha' => true,
						),
						'input_text_color'       => array(
							'type'    => 'color',
							'label'   => __( 'Input text color', 'bb-vapor-modules-pro' ),
							'default' => '000000',
						),
						'input_border'           => array(
							'type'        => 'unit',
							'label'       => __( 'Input border width', 'bb-vapor-modules-pro' ),
							'description' => 'px',
							'default'     => 0,
						),
						'input_border_color'     => array(
							'type'    => 'color',
							'label'   => __( 'Input border color', 'bb-vapor-modules-pro' ),
							'default' => 'e6e6e6',
						),
						'input_border_radius'    => array(
							'type'  => 'dimension',
							'label' => __( 'Input border_radius', 'bb-vapor-modules-pro' ),
						),
						'input_text_align'       => array(
							'type'    => 'align',
							'label'   => __( 'Input text align', 'bb-vapor-modules-pro' ),
							'default' => 'left',
						),
					),
				),
			),
		),
		'typography'          => array(
			'title'    => __( 'Typography', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'inputs' => array(
					'title'  => __( 'General typography', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'form_title_typography'       => array(
							'type'       => 'typography',
							'label'      => __( 'Select an form title typography', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'form_description_typography' => array(
							'type'       => 'typography',
							'label'      => __( 'Select a form description typography', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'label_typography'            => array(
							'type'       => 'typography',
							'label'      => __( 'Select an label typography', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'input_typography'            => array(
							'type'       => 'typography',
							'label'      => __( 'Select an input typography', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
					),
				),
			),
		),
		'buttons'             => array(
			'title'    => __( 'Buttons', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'inputs' => array(
					'title'  => __( 'Button styles', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'button_typography'       => array(
							'type'       => 'typography',
							'label'      => __( 'Select button typography', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'button_padding'          => array(
							'type'       => 'dimension',
							'label'      => __( 'Select button padding', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'button_border'           => array(
							'type'    => 'unit',
							'label'   => __( 'Select button border width', 'bb-vapor-modules-pro' ),
							'default' => '1',
						),
						'button_radius'           => array(
							'type'  => 'dimension',
							'label' => __( 'Select a button border radius', 'bb-vapor-modules-pro' ),
						),
						'button_background'       => array(
							'type'       => 'color',
							'label'      => __( 'Select button background color', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'default'    => '000000',
						),
						'button_background_hover' => array(
							'type'       => 'color',
							'label'      => __( 'Select button background hover color', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'default'    => '000000',
						),
						'button_color'            => array(
							'type'    => 'color',
							'label'   => __( 'Select button text color', 'bb-vapor-modules-pro' ),
							'default' => 'FFFFFF',
						),
						'button_color_hover'      => array(
							'type'    => 'color',
							'label'   => __( 'Select button text hover color', 'bb-vapor-modules-pro' ),
							'default' => 'FFFFFF',
						),
						'button_border'           => array(
							'type'  => 'unit',
							'label' => __( 'Select an button border width', 'bb-vapor-modules-pro' ),
						),
						'button_border_color'     => array(
							'type'  => 'color',
							'label' => __( 'Select an button border color', 'bb-vapor-modules-pro' ),
						),
					),
				),
			),
		),
	)
);
