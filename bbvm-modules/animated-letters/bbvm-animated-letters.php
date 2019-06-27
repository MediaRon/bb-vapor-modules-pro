<?php //phpcs:ignore
class BBVapor_Animated_Letters_Module extends FLBuilderModule {
	public function __construct() {
		parent::__construct(
			array(
				'name'            => __( 'Animated Letters', 'bb-vapor-modules-pro' ),
				'description'     => __( 'Animated Letters for Beaver Builder', 'bb-vapor-modules-pro' ),
				'category'        => __( 'Base', 'bb-vapor-modules-pro' ),
				'group'           => __( 'Vapor', 'bb-vapor-modules-pro' ),
				'dir'             => BBVAPOR_PRO_BEAVER_BUILDER_DIR . 'bbvm-modules/animated-letters/',
				'url'             => BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/animated-letters/',
				'editor_export'   => true, // Defaults to true and can be omitted.
				'enabled'         => true, // Defaults to true and can be omitted.
				'partial_refresh' => false, // Defaults to false and can be omitted.
			)
		);
		$this->add_js( 'anime', BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/animated-letters/js/anime.js', array( 'jquery' ), BBVAPOR_PRO_BEAVER_BUILDER_VERSION, true );
	}
}

FLBuilder::register_settings_form(
	'bbvm_text_animate',
	array(
		'title' => __( 'Add Text', 'bb-vapor-modules-pro' ),
		'tabs'  => array(
			'general' => array(
				'title'    => __( 'General', 'bb-vapor-modules-pro' ),
				'sections' => array(
					'general' => array(
						'title'  => __( 'Add Text', 'bb-vapor-modules-pro' ),
						'fields' => array(
							'text'            => array(
								'type'    => 'text',
								'label'   => __( 'Text', 'bb-vapor-modules' ),
								'default' => '',
							),
						),
					),
				),
			),
		),
	)
);
FLBuilder::register_module(
	'BBVapor_Animated_Letters_Module',
	array(
		'general' => array( // Tab
			'title'    => __( 'General', 'bb-vapor-modules-pro' ), // Tab title
			'sections' => array( // Tab Sections
				'general' => array( // Section
					'title'  => __( 'Animated Text', 'bb-vapor-modules-pro' ), // Section Title
					'fields' => array( // Section Fields
						'alignment'    => array(
							'type'    => 'align',
							'label'   => __( 'Text Alignment', 'bb-vapor-modules-pro' ),
							'default' => 'center',
						),
						'text_color' => array(
							'type'       => 'color',
							'label'      => __( 'Text Color', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
							'default'    => '000000',
						),
						'style'        => array(
							'type'    => 'select',
							'label'   => __( 'Animation Style', 'bb-vapor-modules-pro' ),
							'options' => array(
								'thursday' => __( 'Thursday', 'bb-vapor-modules-pro' ),
								'sunny'    => __( 'Sunny', 'bb-vapor-modules-pro' ),
								'great'    => __( 'Great', 'bb-vapor-modules-pro' ),
								'go'       => __( 'Go', 'bb-vapor-modules-pro' ),
								'signal'   => __( 'Signal', 'bb-vapor-modules-pro' ),
								'beauty'   => __( 'Beauty', 'bb-vapor-modules-pro' ),
								'reality'  => __( 'Reality', 'bb-vapor-modules-pro' ),
								'coffee'   => __( 'Coffee', 'bb-vapor-modules-pro' ),
								'domino'   => __( 'Domino', 'bb-vapor-modules-pro' ),
								'hello'    => __( 'Hello', 'bb-vapor-modules-pro' ),
								'bottom'   => __( 'Bottom', 'bb-vapor-modules-pro' ),
								'rising'   => __( 'Rising', 'bb-vapor-modules-pro' ),
								'find'     => __( 'Find', 'bb-vapor-modules-pro' ),
								'out'      => __( 'Out', 'bb-vapor-modules-pro' ),
								'love'     => __( 'Love', 'bb-vapor-modules-pro' ),
							),
							'default' => 'thursday',
							'toggle'  => array(
								'thursday' => array(
									'fields' => array(
										'text_animate',
										'typography',
									),
								),
								'sunny' => array(
									'fields' => array(
										'text_animate',
										'typography',
									),
								),
								'great' => array(
									'fields' => array(
										'text_animate',
										'typography',
									),
								),
								'go' => array(
									'fields' => array(
										'text_form',
										'typography',
									),
								),
								'signal' => array(
									'fields' => array(
										'text_left',
										'text_center',
										'text_right',
										'text_left_typography',
										'text_center_typography',
										'text_right_typography',
									),
								),
								'beauty' => array(
									'fields' => array(
										'text_animate',
										'typography',
									),
								),
								'reality' => array(
									'fields' => array(
										'text_animate',
										'typography',
									),
								),
								'coffee' => array(
									'fields' => array(
										'text_animate',
										'typography',
									),
								),
								'domino' => array(
									'fields' => array(
										'text_animate',
										'typography',
									),
								),
								'hello' => array(
									'fields' => array(
										'text_animate',
										'typography',
									),
								),
							),
						),
						'text_animate' => array(
							'type'    => 'text',
							'label'   => __( 'Text to Animate', 'bb-vapor-modules-pro' ),
							'default' => __( 'Animated Text', 'bb-vapor-modules-pro' ),
						),
						'text_form'    => array(
							'type'         => 'form',
							'form'         => 'bbvm_text_animate',
							'label'        => __( 'Animated Text', 'bb-vapor-modules-pro' ),
							'multiple'     => true,
							'preview_text' => 'text',
						),
						'loop'         => array(
							'type'    => 'select',
							'label'   => __( 'Loop', 'bb-vapor-modules-pro' ),
							'options' => array(
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
							),
							'default' => 'yes',
						),
						'text_left' => array(
							'type'    => 'text',
							'label'   => __( 'Left Text', 'bb-vapor-modules-pro' ),
							'default' => __( 'Left', 'bb-vapor-modules-pro' ),
						),
						'text_center' => array(
							'type'    => 'text',
							'label'   => __( 'Center Text', 'bb-vapor-modules-pro' ),
							'default' => __( 'Center', 'bb-vapor-modules-pro' ),
						),
						'text_right' => array(
							'type'    => 'text',
							'label'   => __( 'Right Text', 'bb-vapor-modules-pro' ),
							'default' => __( 'Right', 'bb-vapor-modules-pro' ),
						),
						'text_left_typography' => array(
							'type'       => 'typography',
							'label'      => __( 'Left Text Typography', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'text_center_typography' => array(
							'type'       => 'typography',
							'label'      => __( 'Center Text Typography', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'text_right_typography' => array(
							'type'       => 'typography',
							'label'      => __( 'Right Text Typography', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'delay'         => array(
							'type'    => 'unit',
							'label'   => __( 'Delay in Milliseconds', 'bb-vapor-modules-pro' ),
							'default' => '100',
						),
						'typography'   => array(
							'type'       => 'typography',
							'label'      => __( 'Letter Typography', 'bb-vapor-modules-pro' ),
							'responsive' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.fl-bbvm-animated-letters-for-beaverbuilder .letters',
							),
						),
					),
				),
			),
		),
	)
);
