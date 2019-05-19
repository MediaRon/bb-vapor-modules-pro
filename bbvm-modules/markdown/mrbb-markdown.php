<?php
class BBVapor_Markdown_Module extends FLBuilderModule {
	public function __construct()
	{
		parent::__construct(array(
			'name'            => __( 'GitHub Markdown', 'bb-vapor-modules' ),
			'description'     => __( 'GitHub Markdown for Beaver Builder', 'bb-vapor-modules' ),
			'category'        => __( 'Base', 'bb-vapor-modules' ),
			'group'           => __( 'Vapor', 'mediarion-bb-modules' ),
			'dir'             => BBVAPOR_BEAVER_BUILDER_DIR . 'bbvm-modules/markdown/',
			'url'             => BBVAPOR_BEAVER_BUILDER_URL . 'bbvm-modules/markdown/',
			'editor_export'   => true, // Defaults to true and can be omitted.
			'enabled'         => true, // Defaults to true and can be omitted.
			'partial_refresh' => false, // Defaults to false and can be omitted.
		));
	}
	public function enqueue_scripts() {
		if( $this->settings && 'default' === $this->settings->markdown_theme ) {
			$this->add_css('mrbb-markdown-default', BBVAPOR_BEAVER_BUILDER_URL . 'bbvm-modules/markdown/css/markdown-theme-default.css' );
		}
		if( $this->settings && 'yes' === $this->settings->enable_syntax_highlighting ) {
			$this->add_js('prism', BBVAPOR_BEAVER_BUILDER_URL . 'bbvm-modules/markdown/js/prism.js' );
			$this->add_css('prism-' . $this->settings->theme, BBVAPOR_BEAVER_BUILDER_URL . 'bbvm-modules/markdown/css/' . $this->settings->theme . '.css' );
		}
	}
}
/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('BBVapor_Markdown_Module', array(
	'general'       => array( // Tab
		'title'         => __('General', 'bb-vapor-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'general'       => array( // Section
				'title'         => __('GitHub Markdown', 'bb-vapor-modules'), // Section Title
				'fields'        => array( // Section Fields
					'markdown' => array(
						'type'          => 'code',
						'label'         => __( 'Enter Your GitHub Flavored Markdown', 'bb-vapor-modules' ),
						'description'   => __( 'Supports GitHub flavored Markdown. Details here:', 'bb-vapor-modules' ) . ' <a href="https://guides.github.com/features/mastering-markdown/" target="_blank" style="color: blue">' . __( 'GitHub Markdown Guide', 'bb-vapor-modules' ) . '</a>',
						'help' => __( 'Supports GitHub flavored Markdown.', 'bb-vapor-modules' )
					),
				)
			)
		)
	),
	'syntaxhighlighting'       => array( // Tab
		'title'         => __('Syntax Highlighting', 'bb-vapor-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'syntaxhighlighting'       => array( // Section
				'title'         => __('Syntax Highlighting', 'bb-vapor-modules'), // Section Title
				'fields'        => array( // Section Fields
					'enable_syntax_highlighting' => array(
						'type' => 'select',
						'label' => __( 'Enable Syntax Highlighting', 'bb-vapor-modules' ),
						'options' => array(
							'yes' => __( 'Yes', 'bb-vapor-modules' ),
							'no' => __( 'No', 'bb-vapor-modules' ),
						),
						'default' => 'no',
						'toggle' => array( 'yes' => array( 'fields' => array( 'theme' ) ) )
					),
					'theme' => array(
						'type' => 'select',
						'label' => __( 'Theme', 'bb-vapor-modules' ),
						'default' => 'default',
						'options' => array(
							'default' => __( 'Default', 'bb-vapor-modules' ),
							'coy' => __( 'Coy', 'bb-vapor-modules' ),
							'dark' => __( 'Dark', 'bb-vapor-modules' ),
							'funky' => __( 'Funky', 'bb-vapor-modules' ),
							'okaidia' => __( 'Okaidia', 'bb-vapor-modules' ),
							'solarized' => __( 'Solarized', 'bb-vapor-modules' ),
							'tomorrow-night' => __( 'Tomorrow Night', 'bb-vapor-modules' ),
							'twilight' => __( 'Twilight', 'bb-vapor-modules' )
						),
						'default' => 'default'
					),
				)
			)
		)
	),
	'theme'       => array( // Tab
		'title'         => __('Theme', 'bb-vapor-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'theme'       => array( // Section
				'title'         => __('Theme', 'bb-vapor-modules'), // Section Title
				'fields'        => array( // Section Fields
					'markdown_theme' => array(
						'type' => 'select',
						'label' => __( 'Markdown Theme', 'bb-vapor-modules' ),
						'options' => array(
							'none' => __( 'None', 'bb-vapor-modules' ),
							'default' => __( 'GitHub Inspired', 'bb-vapor-modules' )
						),
						'description' => __( 'More themes will be added if the popularity of this module grows.', 'bb-vapor-modules' ),
						'default' => 'none',
					),
				)
			)
		)
	)
) );
