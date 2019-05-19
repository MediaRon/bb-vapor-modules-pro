<?php
class MediaRon_Gravityforms_Module extends FLBuilderModule {
	public function __construct()
	{
		parent::__construct(array(
			'name'            => __( 'Gravity Forms', 'mediaron-bb-modules' ),
			'description'     => __( 'Gravity Forms for Beaver Builder', 'mediaron-bb-modules' ),
			'category'        => __( 'External Plugins', 'mediaron-bb-modules' ),
			'group'           => __( 'MediaRon Modules', 'mediarion-bb-modules' ),
			'dir'             => MEDIARON_BEAVER_BUILDER_DIR . 'mediaron-modules/gravityforms/',
			'url'             => MEDIARON_BEAVER_BUILDER_URL . 'mediaron-modules/gravityforms/',
			'editor_export'   => true, // Defaults to true and can be omitted.
			'enabled'         => true, // Defaults to true and can be omitted.
			'partial_refresh' => true, // Defaults to false and can be omitted.
		));

	}

	public function filter_settings( $settings, $helper ) {
		return $settings;
	}
}
/**
 * Register the module and its form settings.
 */
$forms_array = array( '0' => __( 'Select a form', 'mediaron-bb-modules' ) );
$forms = GFAPI::get_forms();
if( ! empty( $forms ) ) {
	foreach( $forms as $form ) {
		$forms_array[$form['id']] = $form['title'];
	}
}
FLBuilder::register_module('MediaRon_Gravityforms_Module', array(
	'general'       => array( // Tab
		'title'         => __('General', 'mediaron-bb-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'general'       => array( // Section
				'title'         => __('Form Select', 'mediaron-bb-modules'), // Section Title
				'fields'        => array( // Section Fields
					'form' => array(
						'type'          => 'select',
						'label'         => __( 'Select a form', 'mediaron-bb-modules' ),
						'options'       => $forms_array
					),
					'form_title' => array(
						'type'          => 'select',
						'label'         => __( 'Show form title', 'mediaron-bb-modules' ),
						'options'       => array(
							'no'  => __( 'No', 'mediaron-bb-modules' ),
							'yes' => __( 'Yes', 'mediaron-bb-modules' ),
							'custom' => __( 'Custom', 'mediaron-bb-modules' ),
						),
						'default' => 'no',
						'toggle' => array(
							'custom' => array( 'fields' => array( 'custom_title' ) )
						)
					),
					'form_title_padding' => array(
						'type' => 'dimension',
						'label' => __( 'Form Title Padding', 'mediaron-bb-modules' )
					),
					'form_title_margin' => array(
						'type' => 'dimension',
						'label' => __( 'Form Title Margin', 'mediaron-bb-modules' )
					),
					'custom_title' => array(
						'type' => 'text',
						'label' => __( 'Custom title', 'mediaron-bb-modules' ),
					),
					'form_title_color' => array(
						'type' => 'color',
						'label' => __( 'Form title color', 'mediaron-bb-modules' ),
					),
					'form_description' => array(
						'type'          => 'select',
						'label'         => __( 'Show form description', 'mediaron-bb-modules' ),
						'options'       => array(
							'no'  => __( 'No', 'mediaron-bb-modules' ),
							'yes' => __( 'Yes', 'mediaron-bb-modules' ),
							'custom' => __( 'Custom', 'mediaron-bb-modules' )
						),
						'default' => 'no',
						'toggle' => array(
							'custom' => array( 'fields' => array( 'custom_description' ) )
						)
					),
					'form_description_padding' => array(
						'type' => 'dimension',
						'label' => __( 'Form Description Padding', 'mediaron-bb-modules' )
					),
					'form_description_margin' => array(
						'type' => 'dimension',
						'label' => __( 'Form Description Margin', 'mediaron-bb-modules' )
					),
					'custom_description' => array(
						'type' => 'text',
						'label' => __( 'Custom description', 'mediaron-bb-modules' ),
					),
					'form_description_color' => array(
						'type' => 'color',
						'label' => __( 'Form description color', 'mediaron-bb-modules' ),
					),
				)
			),
			'advanced'       => array( // Section
				'title'         => __('Advanced', 'mediaron-bb-modules'), // Section Title
				'fields'        => array( // Section Fields
					'ajax_only' => array(
						'type'          => 'select',
						'label'         => __( 'Ajax only form?', 'mediaron-bb-modules' ),
						'options' => array(
							'yes' => __( 'Yes', 'mediaron-bb-modules' ),
							'no' => __( 'No', 'mediaron-bb-modules' )
						),
						'default' => 'no'
					),
					'tabindex' => array(
						'type'          => 'unit',
						'label'         => __( 'Select a tabindex', 'mediaron-bb-modules' ),
						'default'       => '0',
					),
				)
			),
			'layout'       => array( // Section
				'title'         => __('Layout', 'mediaron-bb-modules'), // Section Title
				'fields'        => array( // Section Fields
					'layout' => array(
						'type'          => 'select',
						'label'         => __( 'Choose Layout', 'mediaron-bb-modules' ),
						'options' => array(
							'default' => __( 'Default', 'mediaron-bb-modules' ),
							'full_width' => __( 'Full Width', 'mediaron-bb-modules' ),
							'full_width_centered' => __( 'Full Width Centered', 'mediaron-bb-modules' ),
						),
						'default' => 'default'
					),
					'max_width' => array(
						'type'          => 'unit',
						'label'         => __( 'Select a maximum width for the form', 'mediaron-bb-modules' ),
						'default'       => '100',
						'description'   => '%',
						'responsive' => true,
					),
				)
			)
		)
	),
	'styles'       => array( // Tab
		'title'         => __('Styles', 'mediaron-bb-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'styles'       => array( // Section
				'title'         => __('General Styles', 'mediaron-bb-modules'), // Section Title
				'fields'        => array( // Section Fields
					'padding' => array(
						'type' => 'dimension',
						'label' => __( 'Select a padding', 'mediaron-bb-modules' ),
						'responsive' => array(
							'placeholder' => array(
								'default'    => '15',
								'medium'     => '15',
								'responsive' => '15',
							),
						),
					),
					'form_margin' => array(
						'type' => 'dimension',
						'label' => __( 'Select a form margin', 'mediaron-bb-modules' ),
						'responsive' => true,
					),
					'form_background_color' => array(
						'type' => 'color',
						'label' => __( 'Select a background color for your form', 'mediaron-bb-modules' ),
						'default' => '#FFFFFF',
						'show_reset'    => true,
						'show_alpha'    => true
					),
					'form_radius' => array(
						'type' => 'dimension',
						'label' => __( 'Select a border radius for your form', 'mediaron-bb-modules' )
					),
				)
			),
			'show_hide'       => array( // Section
				'title'         => __('Show/Hide', 'mediaron-bb-modules'), // Section Title
				'fields'        => array( // Section Fields
					'form_show_labels' => array(
						'type' => 'select',
						'label' => __( 'Show or hide labels', 'mediaron-bb-modules' ),
						'options' => array(
							'yes' => __( 'Show labels', 'mediaron-bb-modules' ),
							'no' => __( 'Hide labels', 'mediaron-bb-modules' )
						),
						'default' => 'yes'
					),
					'form_show_description' => array(
						'type' => 'select',
						'label' => __( 'Show or hide descriptions', 'mediaron-bb-modules' ),
						'options' => array(
							'yes' => __( 'Show description', 'mediaron-bb-modules' ),
							'no' => __( 'Hide description', 'mediaron-bb-modules' )
						),
						'default' => 'yes'
					),
					'form_show_placeholders' => array(
						'type' => 'select',
						'label' => __( 'Show or hide placeholders', 'mediaron-bb-modules' ),
						'options' => array(
							'yes' => __( 'Show placeholders', 'mediaron-bb-modules' ),
							'no' => __( 'Hide placeholders', 'mediaron-bb-modules' )
						),
						'default' => 'yes'
					)
				)
			),
			'labels'       => array( // Section
				'title'         => __('Labels', 'mediaron-bb-modules'), // Section Title
				'fields'        => array( // Section Fields
					'form_label_color' => array(
						'type' => 'color',
						'label' => __( 'Label Color', 'mediaron-bb-modules' ),
						'default' => '000000'
					),
					'form_sub_label_color' => array(
						'type' => 'color',
						'label' => __( 'Sub-label Color', 'mediaron-bb-modules' ),
						'default' => '000000'
					),
					'label_padding' => array(
						'type' => 'dimension',
						'label' => __( 'Label Padding', 'mediaron-bb-modules' ),
					),
					'label_margin' => array(
						'type' => 'dimension',
						'label' => __( 'Label Margin', 'mediaron-bb-modules' ),
					),
				)
			),
			'inputs'       => array( // Section
				'title'         => __('Input styles', 'mediaron-bb-modules'), // Section Title
				'fields'        => array( // Section Fields
					'input_height' => array(
						'type' => 'unit',
						'label' => __( 'Input Height', 'mediaron-bb-modules' ),
						'description' => 'px',
						'default' => '50',
					),
					'input_general_padding' => array(
						'type' => 'dimension',
						'label' => __( 'Input General Padding', 'mediaron-bb-modules' ),
						'responsive' => true
					),
					'input_general_margin' => array(
						'type' => 'dimension',
						'label' => __( 'Input General Margin', 'mediaron-bb-modules' ),
						'responsive' => true
					),
					'input_padding' => array(
						'type' => 'dimension',
						'label' => __( 'Input padding', 'mediaron-bb-modules' ),
						'responsive' => true
					),
					'input_background_color' => array(
						'type' => 'color',
						'label' => __( 'Input background color', 'mediaron-bb-modules' ),
						'default' => 'FFFFFF',
						'show_alpha' => true
					),
					'input_text_color' => array(
						'type' => 'color',
						'label' => __( 'Input text color', 'mediaron-bb-modules' ),
						'default' => '000000',
					),
					'input_border' => array(
						'type' => 'dimension',
						'label' => __( 'Input border width', 'mediaron-bb-modules' ),
						'description' => 'px'
					),
					'input_border_color' => array(
						'type' => 'color',
						'label' => __( 'Input border color', 'mediaron-bb-modules' ),
						'default' => 'e6e6e6',
					),
					'input_border_radius' => array(
						'type' => 'dimension',
						'label' => __( 'Input border_radius', 'mediaron-bb-modules' ),
					),
					'input_text_align' => array(
						'type' => 'align',
						'label' => __( 'Input text align', 'mediaron-bb-modules' ),
						'default' => 'left',
					)
				)
			),
			'selects'       => array( // Section
				'title'         => __('Select styles', 'mediaron-bb-modules'), // Section Title
				'fields'        => array( // Section Fields
					'select_padding' => array(
						'type' => 'dimension',
						'label' => __( 'Select padding', 'mediaron-bb-modules' ),
						'responsive' => true
					),
					'select_height' => array(
						'type' => 'unit',
						'label' => __( 'Select height', 'mediaron-bb-modules' ),
					),
					'select_align' => array(
						'type' => 'align',
						'label' => __( 'Select align', 'mediaron-bb-modules' ),
					),
				)
			),
			'textarea'       => array( // Section
				'title'         => __('Textarea styles', 'mediaron-bb-modules'), // Section Title
				'fields'        => array( // Section Fields
					'textarea_background_color' => array(
						'type' => 'color',
						'label' => __( 'Textarea background color', 'mediaron-bb-modules' ),
						'default' => 'FFFFFF',
						'show_alpha' => true
					),
					'textarea_color' => array(
						'type' => 'color',
						'label' => __( 'Textarea text color', 'mediaron-bb-modules' ),
						'default' => '000000',
					),
					'textarea_border' => array(
						'type' => 'dimension',
						'label' => __( 'Textarea border width', 'mediaron-bb-modules' ),
						'description' => 'px'
					),
					'textarea_border_color' => array(
						'type' => 'color',
						'label' => __( 'Textarea border color', 'mediaron-bb-modules' ),
						'default' => 'e6e6e6',
					),
					'textarea_border_radius' => array(
						'type' => 'dimension',
						'label' => __( 'Textarea border radius', 'mediaron-bb-modules' ),
					),
					'textarea_padding' => array(
						'type' => 'dimension',
						'label' => __( 'Textarea padding', 'mediaron-bb-modules' ),
						'responsive' => true
					),
					'textarea_height' => array(
						'type' => 'unit',
						'label' => __( 'Textarea height', 'mediaron-bb-modules' ),
						'default' => '250',
					),
					'textarea_align' => array(
						'type' => 'align',
						'label' => __( 'Textarea text align', 'mediaron-bb-modules' ),
						'default' => 'left',
					),
				)
			),
			'lists'       => array( // Section
				'title'         => __('List	 styles', 'mediaron-bb-modules'), // Section Title
				'fields'        => array( // Section Fields
					'list_size' => array(
						'type' => 'unit',
						'label' => __( 'List bullet size', 'mediaron-bb-modules' ),
						'default' => '20',
					),
					'list_background' => array(
						'type' => 'color',
						'label' => __( 'List bullet background', 'mediaron-bb-modules' ),
						'default' => 'FFFFFF'
					),
					'list_color' => array(
						'type' => 'color',
						'label' => __( 'List text color', 'mediaron-bb-modules' ),
					),
					'list_selected_color' => array(
						'type' => 'color',
						'label' => __( 'List item selected color', 'mediaron-bb-modules' ),
						'default' => '000000',
					),
					'list_border' => array(
						'type' => 'unit',
						'label' => __( 'List border width', 'mediaron-bb-modules' ),
					),
					'list_border_color' => array(
						'type' => 'color',
						'label' => __( 'List border color', 'mediaron-bb-modules' ),
					),
					'list_radio_radius' => array(
						'type' => 'unit',
						'label' => __( 'List radio radius', 'mediaron-bb-modules' ),
						'default' => '50',
					),
					'list_checkbox_radius' => array(
						'type' => 'unit',
						'label' => __( 'List checkbox radius', 'mediaron-bb-modules' ),
						'default' => '0',
					),

				)
			),
			'placeholders'       => array( // Section
				'title'         => __('Placeholder styles', 'mediaron-bb-modules'), // Section Title
				'fields'        => array( // Section Fields
					'placeholder_typography' => array(
						'type' => 'typography',
						'label' => __( 'Placeholder typography', 'mediaron-bb-modules' ),
					),
					'placeholder_color' => array(
						'type' => 'color',
						'label' => __( 'Placeholder color', 'mediaron-bb-modules' ),
					)
				)
			)
		)
	),
	'typography'       => array( // Tab
		'title'         => __('Typography', 'mediaron-bb-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'inputs'       => array( // Section
				'title'         => __('General typography', 'mediaron-bb-modules'), // Section Title
				'fields'        => array( // Section Fields
					'form_title_typography' => array(
						'type' => 'typography',
						'label' => __( 'Select an form title typography', 'mediaron-bb-modules' ),
						'responsive' => true
					),
					'form_description_typography' => array(
						'type' => 'typography',
						'label' => __( 'Select an form description typography', 'mediaron-bb-modules' ),
						'responsive' => true
					),
					'label_typography' => array(
						'type' => 'typography',
						'label' => __( 'Select an label typography', 'mediaron-bb-modules' ),
						'responsive' => true
					),
					'sublabel_typography' => array(
						'type' => 'typography',
						'label' => __( 'Select an sub-label typography', 'mediaron-bb-modules' ),
						'responsive' => true
					),
					'input_typography' => array(
						'type' => 'typography',
						'label' => __( 'Select an input typography', 'mediaron-bb-modules' ),
						'responsive' => true
					),
					'select_typography' => array(
						'type' => 'typography',
						'label' => __( 'Dropdown typography', 'mediaron-bb-modules' ),
						'responsive' => true
					),
					'list_typography' => array(
						'type' => 'typography',
						'label' => __( 'List typography', 'mediaron-bb-modules' ),
						'responsive' => true
					),
					'textarea_typography' => array(
						'type' => 'typography',
						'label' => __( 'Textarea typography', 'mediaron-bb-modules' ),
						'responsive' => true
					),
					'placeholder_typography' => array(
						'type' => 'typography',
						'label' => __( 'Placeholder typography', 'mediaron-bb-modules' ),
						'responsive' => true
					),
				)
			),
		)
	),
	'buttons'       => array( // Tab
		'title'         => __('Buttons', 'mediaron-bb-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'inputs'       => array( // Section
				'title'         => __('Button styles', 'mediaron-bb-modules'), // Section Title
				'fields'        => array( // Section Fields
					'button_typography' => array(
						'type' => 'typography',
						'label' => __( 'Select button typography', 'mediaron-bb-modules' ),
						'responsive' => true,
					),
					'button_padding' => array(
						'type' => 'dimension',
						'label' => __( 'Select button padding', 'mediaron-bb-modules' ),
						'responsive' => true,
					),
					'button_border' => array(
						'type' => 'unit',
						'label' => __( 'Select button border width', 'mediaron-bb-modules' ),
						'default' => '1',
					),
					'button_radius' => array(
						'type' => 'dimension',
						'label' => __( 'Select a button border radius', 'mediaron-bb-modules' ),
					),
					'button_background' => array(
						'type' => 'color',
						'label' => __( 'Select button background color', 'mediaron-bb-modules' ),
						'show_alpha' => true,
						'default' => '000000',
					),
					'button_background_hover' => array(
						'type' => 'color',
						'label' => __( 'Select button background hover color', 'mediaron-bb-modules' ),
						'show_alpha' => true,
						'default' => '000000',
					),
					'button_color' => array(
						'type' => 'color',
						'label' => __( 'Select button text color', 'mediaron-bb-modules' ),
						'default' => 'FFFFFF',
					),
					'button_color_hover' => array(
						'type' => 'color',
						'label' => __( 'Select button text hover color', 'mediaron-bb-modules' ),
						'default' => 'FFFFFF',
					),
					'button_border' => array(
						'type' => 'unit',
						'label' => __( 'Select an button border width', 'mediaron-bb-modules' ),
					),
					'button_border_color' => array(
						'type' => 'color',
						'label' => __( 'Select an button border color', 'mediaron-bb-modules' ),
					),
				)
			),
		)
	),
	'errorsconfirmations'       => array( // Tab
		'title'         => __('Errors/Confirmations', 'mediaron-bb-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'errors'       => array( // Section
				'title'         => __('Errors', 'mediaron-bb-modules'), // Section Title
				'fields'        => array( // Section Fields
					'error_message_color' => array(
						'type' => 'color',
						'label' => __( 'Select a message color', 'mediaron-bb-modules' ),
						'default' => 'ce0000',
					),
					'error_message_typography' => array(
						'type' => 'typography',
						'label' => __( 'Select a message typography', 'mediaron-bb-modules' ),
					),
					'error_label_color' => array(
						'type' => 'color',
						'label' => __( 'Select a label color', 'mediaron-bb-modules' ),
						'default' => '790000',
					),
					'error_label_background_color' => array(
						'type' => 'color',
						'label' => __( 'Select a label background color', 'mediaron-bb-modules' ),
						'default' => 'ffdfe0',
					),
					'error_label_border_color' => array(
						'type' => 'color',
						'label' => __( 'Select a label border color', 'mediaron-bb-modules' ),
						'default' => '790000',
					),
					'error_label_border_width' => array(
						'type' => 'unit',
						'label' => __( 'Select a label border width', 'mediaron-bb-modules' ),
						'default' => '1',
						'description' => 'px'
					),
				)
			),
			'confirmations'       => array( // Section
				'title'         => __('Confirmations', 'mediaron-bb-modules'), // Section Title
				'fields'        => array( // Section Fields
					'confirmation_color' => array(
						'type' => 'color',
						'label' => __( 'Select a confirmation color', 'mediaron-bb-modules' ),
						'default' => '3c763d'
					),
					'confirmation_background_color' => array(
						'type' => 'color',
						'label' => __( 'Select a confirmation background color', 'mediaron-bb-modules' ),
						'default' => 'FFFFFF',
					),
					'confirmation_padding' => array(
						'type' => 'dimension',
						'label' => __( 'Select a confirmation padding', 'mediaron-bb-modules' ),
						'responsive' => true
					),
					'confirmation_typography' => array(
						'type' => 'typography',
						'label' => __( 'Select confirmation typography', 'mediaron-bb-modules' ),
						'responsive' => true
					),
				)
			),
		)
	),
	'pagination'       => array( // Tab
		'title'         => __('Pagination', 'mediaron-bb-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'progress_bar'       => array( // Section
				'title'         => __('Progress Bar', 'mediaron-bb-modules'), // Section Title
				'fields'        => array( // Section Fields
					'progress_title_show' => array(
						'type'          => 'select',
						'label'         => __( 'Show progress bar title?', 'mediaron-bb-modules' ),
						'options' => array(
							'yes' => __( 'Yes', 'mediaron-bb-modules' ),
							'no' => __( 'No', 'mediaron-bb-modules' )
						),
						'default' => 'yes',
						'toggle' => array(
							'yes' => array( 'fields' => array( 'progress_title', 'progress_title_color' ) )
						)
					),
					'progress_title' => array(
						'type' => 'typography',
						'label' => __( 'Progress title', 'mediaron-bb-modules' ),
					),
					'progress_title_color' => array(
						'type' => 'color',
						'label' => __( 'Progress title color', 'mediaron-bb-modules' ),
					),
					'progress_bar_outer_border_radius' => array(
						'type' => 'unit',
						'label' => __( 'Progress bar outer border radius', 'mediaron-bb-modules' ),
						'default' => '25',
						'description' => 'px',
					),
					'progress_bar_inner_border_radius' => array(
						'type' => 'dimension',
						'label' => __( 'Progress bar inner border radius', 'mediaron-bb-modules' ),
						'description' => 'px'
					),
					'progress_bar_padding' => array(
						'type' => 'dimension',
						'label' => __( 'Progress bar padding', 'mediaron-bb-modules' ),
						'description' => 'px'
					),
					'progress_bar_inner_color' => array(
						'type' => 'color',
						'label' => __( 'Progress bar inner color', 'mediaron-bb-modules' ),
					),
					'progress_bar_outer_color' => array(
						'type' => 'color',
						'label' => __( 'Progress bar outer color', 'mediaron-bb-modules' ),
						'show_reset'    => true,
						'show_alpha'    => true
					),
					'progress_bar_text_color' => array(
						'type' => 'color',
						'label' => __( 'Progress bar text color', 'mediaron-bb-modules' ),
						'default' => 'FFFFFF'
					),
					'progress_bar_text_typography' => array(
						'type' => 'typography',
						'label' => __( 'Progress bar text typography', 'mediaron-bb-modules' ),
					),
				)
			),
			'progress_steps'       => array( // Section
				'title'         => __('Progress Steps', 'mediaron-bb-modules'), // Section Title
				'fields'        => array( // Section Fields
					'progress_steps_internal_margin' => array(
						'type' => 'dimension',
						'label' => __( 'Internal margin for progress steps', 'mediaron-bb-modules' ),
						'description' => 'px',
						'responsive' => true,
					),
					'progress_steps_padding' => array(
						'type' => 'dimension',
						'label' => __( 'Padding for progress steps', 'mediaron-bb-modules' ),
						'description' => 'px',
						'responsive' => true
					),
					'progress_steps_active_background_color' => array(
						'type' => 'color',
						'label' => __( 'Active background color', 'mediaron-bb-modules' ),
					),
					'progress_steps_active_text_color' => array(
						'type' => 'color',
						'label' => __( 'Active text color', 'mediaron-bb-modules' ),
					),
					'progress_steps_active_border_color' => array(
						'type' => 'color',
						'label' => __( 'Active border color', 'mediaron-bb-modules' ),
					),
					'progress_steps_active_border' => array(
						'type' => 'dimension',
						'label' => __( 'Active border width', 'mediaron-bb-modules' ),
					),
					'progress_steps_active_border_radius' => array(
						'type' => 'dimension',
						'label' => __( 'Active border radius', 'mediaron-bb-modules' ),
					),
					'progress_steps_active_typography' => array(
						'type' => 'typography',
						'label' => __( 'Active typography', 'mediaron-bb-modules' ),
					),
					'progress_steps_inactive_background_color' => array(
						'type' => 'color',
						'label' => __( 'Inactive background color', 'mediaron-bb-modules' ),
					),
					'progress_steps_inactive_text_color' => array(
						'type' => 'color',
						'label' => __( 'Inactive text color', 'mediaron-bb-modules' ),
					),
					'progress_steps_inactive_opacity' => array(
						'type' => 'unit',
						'label' => __( 'Inctive opacity', 'mediaron-bb-modules' ),
						'type'   => 'unit',
						'slider' => array(
							'min'  	=> 0,
							'max'  	=> 1,
							'step' 	=> 0.1,
						),
					),
					'progress_steps_inactive_border_color' => array(
						'type' => 'color',
						'label' => __( 'Inactive border color', 'mediaron-bb-modules' ),
					),
					'progress_steps_inactive_border' => array(
						'type' => 'dimension',
						'label' => __( 'Inactive border width', 'mediaron-bb-modules' ),
					),
					'progress_steps_inactive_border_radius' => array(
						'type' => 'dimension',
						'label' => __( 'Inactive border radius', 'mediaron-bb-modules' ),
					),
					'progress_steps_inactive_typography' => array(
						'type' => 'typography',
						'label' => __( 'Inactive typography', 'mediaron-bb-modules' ),
					),
				)
			)
		)
	),
) );
