<?php
class MediaRon_Jetpack_Related_Posts_Module extends FLBuilderModule {
	public function __construct()
	{
		parent::__construct(array(
			'name'            => __( 'Jetpack Related Posts', 'mediaron-bb-modules' ),
			'description'     => __( 'Jetpack Related Posts for Beaver Builder', 'mediaron-bb-modules' ),
			'category'        => __( 'External Plugins', 'mediaron-bb-modules' ),
			'group'           => __( 'MediaRon Modules', 'mediarion-bb-modules' ),
			'dir'             => MEDIARON_BEAVER_BUILDER_DIR . 'mediaron-modules/jetpack-related-posts/',
			'url'             => MEDIARON_BEAVER_BUILDER_URL . 'mediaron-modules/jetpack-related-posts/',
			'editor_export'   => true, // Defaults to true and can be omitted.
			'enabled'         => true, // Defaults to true and can be omitted.
			'partial_refresh' => false, // Defaults to false and can be omitted.
		));
	}
}
/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('MediaRon_Jetpack_Related_Posts_Module', array(
	'general'       => array( // Tab
		'title'         => __('General', 'mediaron-bb-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'general'       => array( // Section
				'title'         => __('Jetpack Related Posts', 'mediaron-bb-modules'), // Section Title
				'fields'        => array( // Section Fields
					'title' => array(
						'type'          => 'text',
						'label'         => __( 'Enter Related Post Title', 'mediaron-bb-modules' ),
						'default'       => __( 'Related Posts', 'mediaron-bb-modules' ),
					),
					'items' => array(
						'type'          => 'unit',
						'label'         => __( 'Number of Items', 'mediaron-bb-modules' ),
						'default'       => '3',
						'slider' => array(
							'min'  	=> 1,
							'max'  	=> 6,
							'step' 	=> 1,
						),
					),
					'layout' => array(
						'type' => 'select',
						'label' => __( 'Related Posts Layout', 'mediaron-bb-modules' ),
						'options' => array(
							'grid' => __( 'Grid', 'mediaron-bb-modules' ),
							'list' => __(  'List', 'mediaron-bb-modules' )
						),
						'default' => 'grid'
					),
					'show_title' => array(
						'type' => 'select',
						'label' => __( 'Show Title?', 'mediaron-bb-modules' ),
						'options' => array(
							'yes' => __( 'Yes', 'mediaron-bb-modules' ),
							'no' => __(  'No', 'mediaron-bb-modules' )
						),
						'default' => 'yes',
						'toggle' => array(
							'yes' => array( 'fields' => array( 'headline_title' ) )
						)
					),
					'show_thumbnails' => array(
						'type' => 'select',
						'label' => __( 'Show Thumbnails?', 'mediaron-bb-modules' ),
						'options' => array(
							'yes' => __( 'Yes', 'mediaron-bb-modules' ),
							'no' => __(  'No', 'mediaron-bb-modules' )
						),
						'default' => 'yes',
						'toggle' => array(
							'yes' => array( 'fields' => array( 'fallback_image' ) )
						)
					),
					'fallback_image' => array(
						'type' => 'photo',
						'label' => __( 'Fallback Image', 'mediaron-bb-modules' ),
						'description' => __( 'Recommended image size is 320x200', 'mediaron-bb-modules' ),
					),
					'show_date' => array(
						'type' => 'select',
						'label' => __( 'Show Date?', 'mediaron-bb-modules' ),
						'options' => array(
							'yes' => __( 'Yes', 'mediaron-bb-modules' ),
							'no' => __(  'No', 'mediaron-bb-modules' )
						),
						'default' => 'yes',
					),
					'show_context' => array(
						'type' => 'select',
						'label' => __( 'Show Context?', 'mediaron-bb-modules' ),
						'options' => array(
							'yes' => __( 'Yes', 'mediaron-bb-modules' ),
							'no' => __(  'No', 'mediaron-bb-modules' )
						),
						'default' => 'yes',
					),
				)
			)
		)
	),
	'styles'       => array( // Tab
		'title'         => __('Styles', 'mediaron-bb-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'styles'       => array( // Section
				'title'         => __('Styles', 'mediaron-bb-modules'), // Section Title
				'fields'        => array( // Section Fields
					'heading_color' => array(
						'type' => 'color',
						'label' => __( 'Heading Color', 'mediaron-bb-modules' ),
						'default' => '000000',
					),
					'text_color' => array(
						'type' => 'color',
						'label' => __( 'Text Color', 'mediaron-bb-modules' ),
						'default' => '000000',
					),
					'title_color' => array(
						'type' => 'color',
						'label' => __( 'Title Color', 'mediaron-bb-modules' ),
						'default' => '000000',
					),
					'related_posts_padding' => array(
						'type' => 'dimension',
						'label' => __( 'Select a Padding', 'mediaron-bb-modules' ),
						'responsive' => true
					),
					'related_posts_margin' => array(
						'type' => 'dimension',
						'label' => __( 'Select a Margin', 'mediaron-bb-modules' ),
						'responsive' => true
					),
				)
			)
		)
	),
	'typography'       => array( // Tab
		'title'         => __('Typography', 'mediaron-bb-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'styles'       => array( // Section
				'title'         => __('Typography', 'mediaron-bb-modules'), // Section Title
				'fields'        => array( // Section Fields
					'heading_typography' => array(
						'type' => 'typography',
						'label' => __( 'Heading Typography', 'mediaron-bb-modules' )
					),
					'link_typography' => array(
						'type' => 'typography',
						'label' => __( 'Link Typography', 'mediaron-bb-modules' )
					),
					'excerpt_typography' => array(
						'type' => 'typography',
						'label' => __( 'Excerpt Typography', 'mediaron-bb-modules' )
					),
					'date_typography' => array(
						'type' => 'typography',
						'label' => __( 'Date Typography', 'mediaron-bb-modules' )
					),
					'context_typography' => array(
						'type' => 'typography',
						'label' => __( 'Context Typography', 'mediaron-bb-modules' )
					),
				)
			)
		)
	)
) );
add_post_type_support( 'page', 'excerpt' );