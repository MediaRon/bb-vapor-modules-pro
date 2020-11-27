<?php // phpcs:ignore
class BBVapor_Markdown_Module extends FLBuilderModule {
	/**
	 * Class Constructor.
	 */
	public function __construct() {
		parent::__construct(
			array(
				'name'            => __( 'GitHub Markdown', 'bb-vapor-modules-pro' ),
				'description'     => __( 'GitHub Markdown for Beaver Builder', 'bb-vapor-modules-pro' ),
				'category'        => __( 'Base', 'bb-vapor-modules-pro' ),
				'group'           => apply_filters( 'bbvm_whitelabel_category', __( 'Vapor', 'bb-vapor-modules-pro' ) ),
				'dir'             => BBVAPOR_PRO_BEAVER_BUILDER_DIR . '/bbvm-modules/markdown/',
				'url'             => BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/markdown/',
				'editor_export'   => true, // Defaults to true and can be omitted.
				'enabled'         => true, // Defaults to true and can be omitted.
				'partial_refresh' => false, // Defaults to false and can be omitted.
			)
		);
	}
	/**
	 * Enqueue the theme and syntax highlighting.
	 */
	public function enqueue_scripts() {
		if ( $this->settings && 'default' === $this->settings->markdown_theme ) {
			$this->add_css( 'mrbb-markdown-default', BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/markdown/css/markdown-theme-default.css' );
		}
		if ( $this->settings && 'yes' === $this->settings->enable_syntax_highlighting ) {
			$this->add_js( 'prism', BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/markdown/js/prism.js' );
			$this->add_css( 'prism-' . $this->settings->theme, BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/markdown/css/' . $this->settings->theme . '.css' );
		}
	}
}
/**
 * Register the module and its form settings.
 */
FLBuilder::register_module(
	'BBVapor_Markdown_Module',
	array(
		'general'            => array(
			'title'    => __( 'General', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'general' => array(
					'title'  => __( 'GitHub Markdown', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'markdown' => array(
							'type'        => 'code',
							'label'       => __( 'Enter Your GitHub Flavored Markdown', 'bb-vapor-modules-pro' ),
							'description' => __( 'Supports GitHub flavored Markdown. Details here:', 'bb-vapor-modules-pro' ) . ' <a href="https://guides.github.com/features/mastering-markdown/" target="_blank" style="color: blue">' . __( 'GitHub Markdown Guide', 'bb-vapor-modules-pro' ) . '</a>',
							'help'        => __( 'Supports GitHub flavored Markdown.', 'bb-vapor-modules-pro' ),
						),
					),
				),
			),
		),
		'syntaxhighlighting' => array(
			'title'    => __( 'Syntax Highlighting', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'syntaxhighlighting' => array(
					'title'  => __( 'Syntax Highlighting', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'enable_syntax_highlighting' => array(
							'type'    => 'select',
							'label'   => __( 'Enable Syntax Highlighting', 'bb-vapor-modules-pro' ),
							'options' => array(
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
							),
							'default' => 'no',
							'toggle'  => array( 'yes' => array( 'fields' => array( 'theme' ) ) ),
						),
						'theme'                      => array(
							'type'    => 'select',
							'label'   => __( 'Theme', 'bb-vapor-modules-pro' ),
							'default' => 'default',
							'options' => array(
								'default'        => __( 'Default', 'bb-vapor-modules-pro' ),
								'coy'            => __( 'Coy', 'bb-vapor-modules-pro' ),
								'dark'           => __( 'Dark', 'bb-vapor-modules-pro' ),
								'funky'          => __( 'Funky', 'bb-vapor-modules-pro' ),
								'okaidia'        => __( 'Okaidia', 'bb-vapor-modules-pro' ),
								'solarized'      => __( 'Solarized', 'bb-vapor-modules-pro' ),
								'tomorrow-night' => __( 'Tomorrow Night', 'bb-vapor-modules-pro' ),
								'twilight'       => __( 'Twilight', 'bb-vapor-modules-pro' ),
							),
							'default' => 'default',
						),
					),
				),
			),
		),
		'theme'              => array(
			'title'    => __( 'Theme', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'theme' => array(
					'title'  => __( 'Theme', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'markdown_theme' => array(
							'type'        => 'select',
							'label'       => __( 'Markdown Theme', 'bb-vapor-modules-pro' ),
							'options'     => array(
								'none'    => __( 'None', 'bb-vapor-modules-pro' ),
								'default' => __( 'GitHub Inspired', 'bb-vapor-modules-pro' ),
							),
							'description' => __( 'More themes will be added if the popularity of this module grows.', 'bb-vapor-modules-pro' ),
							'default'     => 'none',
						),
					),
				),
			),
		),
	)
);
