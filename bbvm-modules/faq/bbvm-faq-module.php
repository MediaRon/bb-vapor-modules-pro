<?php // phpcs:ignore
class BBVapor_FAQ_Module extends FLBuilderModule {
	public function __construct() {
		parent::__construct(
			array(
				'name'            => __( 'FAQ', 'bb-vapor-modules-pro' ),
				'description'     => __( 'Add a FAQ', 'bb-vapor-modules-pro' ),
				'category'        => __( 'Base', 'bb-vapor-modules-pro' ),
				'group'           => __( 'Vapor', 'bb-vapor-modules-pro' ),
				'dir'             => BBVAPOR_PRO_BEAVER_BUILDER_DIR . 'bbvm-modules/faq/',
				'url'             => BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/faq/',
				'editor_export'   => true, // Defaults to true and can be omitted.
				'enabled'         => true, // Defaults to true and can be omitted.
				'partial_refresh' => false, // Defaults to false and can be omitted.
			)
		);
	}
}
FLBuilder::register_settings_form(
	'mrbb_faq',
	array(
		'title' => __( 'Add FAQ', 'bb-vapor-modules-pro' ),
		'tabs'  => array(
			'general' => array(
				'title'    => __( 'FAQ', 'bb-vapor-modules-pro' ),
				'sections' => array(
					'general' => array(
						'title'  => '',
						'fields' => array(
							'faq'      => array(
								'type'  => 'text',
								'label' => __( 'FAQ Item', 'bb-vapor-modules-pro' ),
							),
							'faq_text' => array(
								'type'  => 'editor',
								'label' => __( 'FAQ Answer', 'bb-vapor-modules-pro' ),
							),
						),
					),
				),
			),
		),
	)
);
/**
 * Register the module and its form settings.
 */
FLBuilder::register_module(
	'BBVapor_FAQ_Module',
	array(
		'general' => array( // Tab
			'title'    => __( 'General', 'bb-vapor-modules-pro' ), // Tab title
			'sections' => array( // Tab Sections
				'general' => array( // Section
					'title'  => __( 'General', 'bb-vapor-modules-pro' ), // Section Title
					'fields' => array( // Section Fields
						'faq' => array(
							'type'         => 'form',
							'label'        => __( 'FAQ', 'bb-vapor-modules-pro' ),
							'form'         => 'mrbb_faq',
							'multiple'     => true,
							'preview_text' => 'faq',
						),
						'toc'      => array(
							'type'    => 'select',
							'label'   => __( 'Display a Table of Contents', 'bb-vapor-modules-pro' ),
							'options' => array(
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
							),
							'default' => 'yes',
						),
						'expanded' => array(
							'type'    => 'select',
							'label'   => __( 'Answers Expanded?', 'bb-vapor-modules-pro' ),
							'options' => array(
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
							),
							'default' => 'yes',
						),
					),
				),
			),
		),
		'styles'  => array( // Tab
			'title'    => __( 'Styles', 'bb-vapor-modules-pro' ), // Tab title
			'sections' => array( // Tab Sections
				'styles' => array( // Section
					'title'  => __( 'Styles', 'bb-vapor-modules-pro' ), // Section Title
					'fields' => array( // Section Fields
						'toc_typography' => array(
							'type'       => 'typography',
							'label'      => __( 'Table of Contents Typography', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'question_typography'       => array(
							'type'       => 'typography',
							'label'      => __( 'Question Typography', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'question_color'            => array(
							'type'       => 'color',
							'label'      => __( 'Question Color', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
							'default'    => '000000',
						),
						'question_background_color' => array(
							'type'       => 'color',
							'label'      => __( 'Question Background Color', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
							'default'    => 'FFFFFF',
						),
						'question_padding'          => array(
							'type'       => 'dimension',
							'label'      => __( 'Question Padding', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'question_margin'           => array(
							'type'       => 'dimension',
							'label'      => __( 'Question Margin', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'question_radius'           => array(
							'type'       => 'dimension',
							'label'      => __( 'Question Radius', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'question_border_bottom'    => array(
							'type'    => 'unit',
							'label'   => __( 'Question Border Bottom', 'bb-vapor-modules-pro' ),
							'default' => '1',
						),
						'question_border_color'     => array(
							'type'    => 'color',
							'label'   => __( 'Question Border Bottom Color', 'bb-vapor-modules-pro' ),
							'default' => 'FFFFFF',
						),
						'answer_typography'         => array(
							'type'       => 'typography',
							'label'      => __( 'Answer Typography', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'answer_color'              => array(
							'type'       => 'color',
							'label'      => __( 'Answer Color', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
							'default'    => '000000',
						),
						'answer_background_color'   => array(
							'type'       => 'color',
							'label'      => __( 'Answer Background Color', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
							'default'    => 'FFFFFF',
						),
						'answer_padding' => array(
							'type'       => 'dimension',
							'label'      => __( 'Answer Padding', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'answer_margin'             => array(
							'type'       => 'dimension',
							'label'      => __( 'Answer Margin', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'answer_radius'             => array(
							'type'       => 'dimension',
							'label'      => __( 'Answer Radius', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
					),
				),
			),
		),
	)
);
