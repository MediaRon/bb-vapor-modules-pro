<?php // phpcs:ignore
class BBVapor_Content_Scroller extends FLBuilderModule {
	public function __construct() {
		parent::__construct(
			array(
				'name'            => __( 'Content Scroller', 'bb-vapor-modules-pro' ),
				'description'     => __( 'Content Scroller for Beaver Builder', 'bb-vapor-modules-pro' ),
				'category'        => __( 'Base', 'bb-vapor-modules-pro' ),
				'group'           => __( 'Vapor', 'bb-vapor-modules-pro' ),
				'dir'             => BBVAPOR_PRO_BEAVER_BUILDER_DIR . 'bbvm-modules/content-scroller/',
				'url'             => BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/content-scroller/',
				'editor_export'   => true, // Defaults to true and can be omitted.
				'enabled'         => true, // Defaults to true and can be omitted.
				'partial_refresh' => false, // Defaults to false and can be omitted.
			)
		);

		$this->add_js( 'waypoints', BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/content-scroller/js/jquery.waypoints.min.js', array( 'jquery' ), BBVAPOR_PRO_BEAVER_BUILDER_VERSION, true );
		$this->add_js( 'waypoints-sticky', BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/content-scroller/js/sticky.min.js', array( 'jquery' ), BBVAPOR_PRO_BEAVER_BUILDER_VERSION, true );
	}
}
FLBuilder::register_settings_form(
	'bbvm_content_variable_headings',
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
FLBuilder::register_settings_form(
	'bbvm_content_scroller',
	array(
		'title' => __( 'Scroller Content', 'bb-vapor-modules-pro' ),
		'tabs'  => array(
			'left_area' => array(
				'title'    => __( 'Left Area', 'bb-vapor-modules-pro' ),
				'sections' => array(
					'left_area' => array(
						'title'  => __( 'Scroller Options - Left Area', 'bb-vapor-modules-pro' ),
						'fields' => array(
							'unique_id_left' => array(
								'type'  => 'text',
								'label' => __( 'Unique ID for this area', 'bb-vapor-modules-pro' ),
								'help'  => __( 'This is required for JavaScript targeting', 'bb-vapor-modules-pro' ),
							),
							'background_color_left'            => array(
								'type'       => 'color',
								'label'      => __( 'Left Item Background Color', 'bb-vapor-modules' ),
								'default'    => 'FFFFFF',
								'show_alpha' => true,
								'show_reset' => true,
							),
							'background_photo_left'      => array(
								'type'       => 'photo',
								'label'      => __( 'Left Item Background Photo', 'bb-vapor-modules' ),
								'show_reset' => true,
							),
						),
					),
				),
			),
			'right_area' => array(
				'title'    => __( 'Right Area', 'bb-vapor-modules-pro' ),
				'sections' => array(
					'right_area' => array(
						'title'  => __( 'Scroller Options - Right Area', 'bb-vapor-modules-pro' ),
						'fields' => array(
							'unique_id_right' => array(
								'type'  => 'text',
								'label' => __( 'Unique ID for this area', 'bb-vapor-modules-pro' ),
								'help'  => __( 'This is required for JavaScript targeting', 'bb-vapor-modules-pro' ),
							),
							'background_color_right'            => array(
								'type'       => 'color',
								'label'      => __( 'Right Item Background Color', 'bb-vapor-modules' ),
								'default'    => 'FFFFFF',
								'show_alpha' => true,
								'show_reset' => true,
							),
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
							'headline' => array(
								'type'         => 'form',
								'label'        => __( 'Headline for Right Item', 'bb-vapor-modules' ),
								'form'         => 'bbvm_content_variable_headings',
								'description'  => __( 'Place the headline in the content below with {headline}', 'bb-vapor-modules-pro' ),
								'multiple'     => true,
								'preview_text' => 'headline',
							),
							'content_color' => array(
								'type'        => 'color',
								'label'       => __( 'Content Color', 'bb-vapor-modules' ),
								'show_alpha' => true,
								'show_reset' => true,
							),
							'typography' => array(
								'type'        => 'typography',
								'label'       => __( 'Typography', 'bb-vapor-modules' ),
								'description' => __( 'Typography for the content.', 'bb-vapor-modules-pro' ),
							),
							'content' => array(
								'type'        => 'editor',
								'label'       => __( 'Content', 'bb-vapor-modules' ),
								'description' => __( 'Place the headline in the content with {headline}', 'bb-vapor-modules-pro' ),
							),
						),
					),
				),
			),
		),
	)
);
FLBuilder::register_module(
	'BBVapor_Content_Scroller',
	array(
		'general' => array( // Tab
			'title'    => __( 'General', 'bb-vapor-modules-pro' ), // Tab title
			'sections' => array( // Tab Sections
				'general' => array( // Section
					'title'  => __( 'Headings', 'bb-vapor-modules-pro' ), // Section Title
					'fields' => array( // Section Fields
						'scroller_content' => array(
							'type'     => 'form',
							'label'    => __( 'Scroller Content' ),
							'form'     => 'bbvm_content_scroller',
							'multiple' => true,
						),
					),
				),
			),
		),
	)
);
