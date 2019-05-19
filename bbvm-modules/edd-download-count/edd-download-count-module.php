<?php
class MediaRon_EDD_Download_Count_Module extends FLBuilderModule {
	public function __construct()
	{
		parent::__construct(array(
			'name'            => __( 'EDD Download Count', 'mediaron-bb-modules' ),
			'description'     => __( 'EDD Download Count', 'mediaron-bb-modules' ),
			'category'        => __( 'EDD', 'mediaron-bb-modules' ),
			'group'           => __( 'MediaRon Modules', 'mediarion-bb-modules' ),
			'dir'             => MEDIARON_BEAVER_BUILDER_DIR . 'mediaron-modules/edd-download-count/',
			'url'             => MEDIARON_BEAVER_BUILDER_URL . 'mediaron-modules/edd-download-count/',
			'editor_export'   => true, // Defaults to true and can be omitted.
			'enabled'         => true, // Defaults to true and can be omitted.
			'partial_refresh' => false, // Defaults to false and can be omitted.
		));
	}
}
/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('MediaRon_EDD_Download_Count_Module', array(
	'general'       => array( // Tab
		'title'         => __('General', 'mediaron-bb-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'general'       => array( // Section
				'title'         => __('EDD Download Count', 'mediaron-bb-modules'), // Section Title
				'fields'        => array( // Section Fields
					'download_text' => array(
						'type'          => 'text',
						'label'         => __( 'Enter Download Text', 'mediaron-bb-modules' ),
						'default'       => __( 'Downloads', 'mediaron-bb-modules' ),
					),
					'product' => array(
						'type'          => 'suggest',
						'label'         => __( 'EDD Product', 'fl-builder' ),
						'action'        => 'fl_as_posts', // Search posts.
						'data'          => 'download', // Slug of the post type to search.
						'limit'         => 1,
					),
					'text_color' => array(
						'type'          => 'color',
						'label'         => __( 'Text Color', 'mediaron-bb-modules' ),
						'default'       => '000000',
					),
					'background_color' => array(
						'type'          => 'color',
						'label'         => __( 'Background Color', 'mediaron-bb-modules' ),
						'default'       => 'FFFFFF',
						'show_reset' => true,
						'show_alpha' => true
					),
					'typography' => array(
						'type' => 'typography',
						'label' => __( 'Text Typography', 'mediaron-bb-modules' )
					),
					'padding' => array(
						'type' => 'dimension',
						'label' => __( 'Padding', 'mediaron-bb-modules' )
					),
				)
			)
		)
	),
) );