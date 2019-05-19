<?php
class BBVapor_Syntax_Highlighter_Module extends FLBuilderModule {
	public function __construct()
	{
		parent::__construct(array(
			'name'            => __( 'Syntax Highlighter', 'bb-vapor-modules' ),
			'description'     => __( 'Syntax Highlighter for Beaver Builder', 'bb-vapor-modules' ),
			'category'        => __( 'External Plugins', 'bb-vapor-modules' ),
			'group'           => __( 'Vapor', 'mediarion-bb-modules' ),
			'dir'             => BBVAPOR_BEAVER_BUILDER_DIR . 'bbvm-modules/syntax-highlighter/',
			'url'             => BBVAPOR_BEAVER_BUILDER_URL . 'bbvm-modules/syntax-highlighter/',
			'editor_export'   => true, // Defaults to true and can be omitted.
			'enabled'         => true, // Defaults to true and can be omitted.
			'partial_refresh' => false, // Defaults to false and can be omitted.
		));
	}
}
/**
 * Register the module and its form settings.
 */
global $SyntaxHighlighter;
FLBuilder::register_module('BBVapor_Syntax_Highlighter_Module', array(
	'general'       => array( // Tab
		'title'         => __('General', 'bb-vapor-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'general'       => array( // Section
				'title'         => __('Syntax Highlighter', 'bb-vapor-modules'), // Section Title
				'fields'        => array( // Section Fields
					'code' => array(
						'type'          => 'select',
						'label'         => __( 'Enter your code type', 'bb-vapor-modules' ),
						'options' => $SyntaxHighlighter->brush_names
					),
					'raw' => array(
						'type'          => 'code',
						'label' => __( 'Enter your code here. For this to preview properly, enable loading all brushes in the Syntax Highlighting settings.', 'bb-vapor-modules' ),
						'rows'          => '18'
					),
				)
			)
		)
	),
	'options'       => array( // Tab
		'title'         => __('Options', 'bb-vapor-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'options'       => array( // Section
				'title'         => __('Options', 'bb-vapor-modules'), // Section Title
				'fields'        => array( // Section Fields
					'title' => array(
						'type' => 'text',
						'label' => __( 'Select a Title or Leave Blank', 'bb-vapor-modules' ),
					),
					'syntax_padding' => array(
						'type' => 'dimension',
						'label' => __( 'Select a Padding', 'bb-vapor-modules' ),
					),
				)
			)
		)
	),
) );
