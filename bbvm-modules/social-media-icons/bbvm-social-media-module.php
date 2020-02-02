<?php // phpcs:ignore
class BBVapor_Social_Media_Module extends FLBuilderModule {
	/**
	 * Class Constructor.
	 */
	public function __construct() {
		parent::__construct(
			array(
				'name'            => __( 'Social Media Icons', 'bb-vapor-modules-pro' ),
				'description'     => __( 'Adds social media icons', 'bb-vapor-modules-pro' ),
				'category'        => __( 'Base', 'bb-vapor-modules-pro' ),
				'group'           => apply_filters( 'bbvm_whitelabel_category', __( 'Vapor', 'bb-vapor-modules-pro' ) ),
				'dir'             => BBVAPOR_PRO_BEAVER_BUILDER_DIR . 'bbvm-modules/social-media-icons/',
				'url'             => BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/social-media-icons/',
				'editor_export'   => true, // Defaults to true and can be omitted.
				'enabled'         => true, // Defaults to true and can be omitted.
				'partial_refresh' => false, // Defaults to false and can be omitted.
			)
		);
		add_action( 'fl_builder_editing_enabled', array( $this, 'register_svg' ) );
	}

	/**
	 * Includes the SVG for social media icons
	 */
	public function register_svg() {
		add_action( 'wp_footer', array( $this, 'output_svg' ) );
	}

	/**
	 * Includes the SVG for social media icons
	 */
	public function output_svg() {

		// Define SVG sprite file.
		$path = BBVAPOR_PRO_BEAVER_BUILDER_DIR . 'bbvm-modules/social-media-icons/includes/social-logos.svg';

		/**
		 * Filter Social Icons Sprite.
		 *
		 * @since 1.1.0
		 *
		 * @param string Absolute directory path to SVG sprite
		 */
		$svg_icons = apply_filters( 'bbvapor_modules_beaver_builder_social_icons_sprite', $path );

		// If it exists, include it.
		if ( file_exists( $svg_icons ) ) {
			echo '<div style="position: absolute; height: 0; width: 0; overflow: hidden;">';
			require_once $svg_icons;
			echo '</div>';
		}
	}
}
/**
 * Register the module and its form settings.
 */
FLBuilder::register_settings_form(
	'bbvm_social_form',
	array(
		'title' => __( 'Add Social Media URL', 'bb-vapor-modules-pro' ),
		'tabs'  => array(
			'general' => array(
				'title'    => __( 'General', 'bb-vapor-modules-pro' ),
				'sections' => array(
					'general' => array(
						'title'  => '',
						'fields' => array(
							'social_share_type' => array(
								'type'  => 'text',
								'label' => __( 'Enter Social Media URL', 'bb-vapor-modules-pro' ),
							),
							'social_share_text' => array(
								'type'  => 'text',
								'label' => __( 'Enter Alt Text', 'bb-vapor-modules-pro' ),
							),
						),
					),
				),
			),
		),
	)
);
FLBuilder::register_module(
	'BBVapor_Social_Media_Module',
	array(
		'general' => array(
			'title'    => __( 'General', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'general' => array(
					'title'  => __( 'Add Social Icons', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'social_form' => array(
							'type'         => 'form',
							'label'        => __( 'Social Item', 'bb-vapor-modules-pro' ),
							'form'         => 'bbvm_social_form',
							'preview_text' => 'social_share_type',
							'multiple'     => true,
						),
					),
				),
			),
		),
		'styles'  => array(
			'title'    => __( 'Styles', 'bbvm-bb-module' ),
			'sections' => array(
				'general' => array(
					'title'  => __( 'Style', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'padding'             => array(
							'type'        => 'dimension',
							'label'       => __( 'Padding', 'bb-vapor-modules-pro' ),
							'description' => 'px',
							'responsive'  => true,
							'preview'     => array(
								'type'     => 'css',
								'property' => 'padding',
								'unit'     => 'px',
								'selector' => '.bbvm-module-social-wrapper',
							),
						),
						'orientation'         => array(
							'type'    => 'select',
							'label'   => __( 'Orientation', 'bb-vapor-modules-pro' ),
							'default' => 'horizontal',
							'options' => array(
								'horizontal' => __( 'Horizontal', 'bb-vapor-modules-pro' ),
								'vertical'   => __( 'Vertical', 'bb-vapor-modules-pro' ),
							),
							'preview' => array( 'type' => false ),
						),
						'background_select'   => array(
							'type'    => 'select',
							'label'   => __( 'Background Type', 'bb-vapor-modules-pro' ),
							'default' => 'color',
							'options' => array(
								'color'    => __( 'Color', 'bb-vapor-modules-pro' ),
								'gradient' => __( 'Gradient', 'bb-vapor-modules-pro' ),
								'photo'    => __( 'Photo', 'bb-vapor-modules-pro' ),
							),
							'toggle'  => array(
								'color'    => array( 'fields' => array( 'background_color' ) ),
								'gradient' => array( 'fields' => array( 'background_gradient' ) ),
								'photo'    => array( 'fields' => array( 'background_image', 'background_overlay' ) ),
							),
						),
						'background_image'    => array(
							'type'  => 'photo',
							'label' => __( 'Background Image', 'bb-vapor-modules-pro' ),
						),
						'background_overlay'  => array(
							'type'       => 'color',
							'label'      => 'Background Overlay',
							'show_reset' => true,
							'show_alpha' => true,
						),
						'background_color'    => array(
							'type'       => 'color',
							'label'      => __( 'Background Color', 'bb-vapor-modules-pro' ),
							'default'    => 'FFFFFF',
							'show_reset' => true,
							'show_alpha' => true,
							'preview'    => array(
								'type'      => 'css',
								'property'  => 'background-color',
								'selector'  => '.bbvm-module-social-wrapper',
								'important' => true,
							),
						),
						'background_gradient' => array(
							'type'    => 'gradient',
							'label'   => __( 'Gradient Background Color', 'bb-vapor-modules-pro' ),
							'preview' => array(
								'type'      => 'css',
								'selector'  => '.bbvm-module-social-wrapper',
								'property'  => 'background',
								'important' => true,
							),
						),
						'fill'                => array(
							'type'    => 'select',
							'label'   => __( 'Fill Color', 'bb-vapor-modules-pro' ),
							'default' => 'none',
							'options' => array(
								'none'   => __( 'Select a color', 'bb-vapor-modules-pro' ),
								'white'  => __( 'White', 'bb-vapor-modules-pro' ),
								'black'  => __( 'Black', 'bb-vapor-modules-pro' ),
								'brand'  => __( 'Brand Colors', 'bb-vapor-modules-pro' ),
								'custom' => __( 'Custom', 'bb-vapor-modules-pro' ),
							),
							'toggle'  => array(
								'custom' => array(
									'fields' => array( 'fill_custom' ),
								),
							),
							'preview' => array( 'type' => false ),
						),
						'fill_custom'         => array(
							'type'       => 'color',
							'label'      => __( 'Custom Fill Color', 'bb-vapor-modules-pro' ),
							'default'    => '333333',
							'show_reset' => true,
							'show_alpha' => true,
							'preview'    => array(
								'type'     => 'css',
								'property' => 'fill',
								'selector' => '.bbvm-module-social.custom svg',
							),
						),
						'icon_size'           => array(
							'type'        => 'select',
							'label'       => __( 'Icon Size', 'bb-vapor-modules-pro' ),
							'description' => 'px',
							'default'     => '24',
							'options'     => array(
								'12' => '12px',
								'18' => '18px',
								'24' => '24px',
								'36' => '36px',
								'48' => '48px',
							),
							'preview'     => array( 'type' => false ),
						),
						'alignment'           => array(
							'type'    => 'align',
							'label'   => __( 'Alignment', 'bb-vapor-modules-pro' ),
							'default' => 'left',
							'preview' => array(
								'type'     => 'css',
								'property' => 'text-align',
								'selector' => '.bbvm-module-social ',
							),
						),
					),
				),
			),
		),
	)
);
