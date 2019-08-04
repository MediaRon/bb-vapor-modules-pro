<?php // phpcs:ignore
class BBVapor_Vegas_Slideshow_Module extends FLBuilderModule {
	public function __construct() {
		parent::__construct(
			array(
				'name'            => __( 'Vegas Full-width Slideshow', 'bb-vapor-modules-pro' ),
				'description'     => __( 'Vegas Full-width Slideshow for Beaver Builder', 'bb-vapor-modules-pro' ),
				'category'        => __( 'Base', 'bb-vapor-modules-pro' ),
				'group'           => apply_filters( 'bbvm_whitelabel_category', __( 'Vapor', 'bb-vapor-modules-pro' ) ),
				'dir'             => BBVAPOR_PRO_BEAVER_BUILDER_DIR . 'bbvm-modules/vegas-slideshow/',
				'url'             => BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/vegas-slideshow/',
				'editor_export'   => true, // Defaults to true and can be omitted.
				'enabled'         => true, // Defaults to true and can be omitted.
				'partial_refresh' => false, // Defaults to false and can be omitted.
			)
		);
		$this->add_js( 'vegas', BBVAPOR_PRO_BEAVER_BUILDER_URL . 'js/vegas/vegas.js', array( 'jquery' ), BBVAPOR_PRO_BEAVER_BUILDER_VERSION, true );
		$this->add_css( 'vegas', BBVAPOR_PRO_BEAVER_BUILDER_URL . 'js/vegas/vegas.css', array(), BBVAPOR_PRO_BEAVER_BUILDER_VERSION, 'all' );
	}
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_settings_form(
	'bbvm_slideshow_images',
	array(
		'title' => __( 'Add Slideshow Image', 'bb-vapor-modules-pro' ),
		'tabs'  => array(
			'general' => array(
				'title'    => __( 'General', 'bb-vapor-modules-pro' ),
				'sections' => array(
					'general' => array(
						'title'  => '',
						'fields' => array(
							'image'      => array(
								'type'  => 'photo',
								'label' => __( 'Slideshow Photo', 'bb-vapor-modules-pro' ),
							),
							'caption'    => array(
								'type'  => 'text',
								'label' => __( 'Slideshow Caption', 'bb-vapor-modules-pro' ),
							),
							'subcaption' => array(
								'type'  => 'text',
								'label' => __( 'Slideshow Sub-Caption', 'bb-vapor-modules-pro' ),
							),
							'link_text'  => array(
								'type'  => 'text',
								'label' => __( 'Link Text', 'bb-vapor-modules-pro' ),
							),
							'link'       => array(
								'type'  => 'link',
								'label' => __( 'Link Location', 'bb-vapor-modules-pro' ),
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
	'BBVapor_Vegas_Slideshow_Module',
	array(
		'general'    => array( // Tab
			'title'    => __( 'Images', 'bb-vapor-modules-pro' ), // Tab title
			'sections' => array( // Tab Sections
				'general' => array( // Section
					'title'  => __( 'Simple Slideshow', 'bb-vapor-modules-pro' ), // Section Title
					'fields' => array( // Section Fields
						'images' => array(
							'type'         => 'form',
							'form'         => 'bbvm_slideshow_images',
							'label'        => __( 'Slideshow Image', 'bb-vapor-modules-pro' ),
							'multiple'     => true,
							'preview_text' => 'caption',
						),
					),
				),
			),
		),
		'options'    => array( // Tab
			'title'    => __( 'Slideshow Options', 'bb-vapor-modules-pro' ), // Tab title
			'sections' => array( // Tab Sections
				'options' => array( // Section
					'title'  => __( 'Slideshow Options', 'bb-vapor-modules-pro' ), // Section Title
					'fields' => array( // Section Fields
						'min_height'            => array(
							'type'        => 'unit',
							'label'       => __( 'Slider Min Height', 'bb-vapor-modules-pro' ),
							'description' => 'px',
							'default'     => '500',
							'responsive'  => true,
						),
						'vegas_delay'           => array(
							'type'    => 'unit',
							'label'   => __( 'Slide Delay Between Transitions In Milliseconds', 'bb-vapor-modules-pro' ),
							'default' => '5000',
						),
						'vegas_transition_time' => array(
							'type'    => 'unit',
							'label'   => __( 'Transition Time in Milliseconds' ),
							'default' => '1000',
						),
						'vegas_show_timer'      => array(
							'type'    => 'select',
							'label'   => 'Show transition timer',
							'default' => 'no',
							'options' => array(
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
							),
						),
						'vegas_transition'      => array(
							'type'    => 'select',
							'label'   => __( 'Transition', 'bb-vapor-modules-pro' ),
							'options' => array(
								'fade'        => __( 'Fade', 'bb-vapor-modules-pro' ),
								'fade2'       => __( 'Fade 2', 'bb-vapor-modules-pro' ),
								'slideLeft'   => __( 'Slide Left', 'bb-vapor-modules-pro' ),
								'slideLeft2'  => __( 'Slide Left 2', 'bb-vapor-modules-pro' ),
								'slideRight'  => __( 'Slide Right', 'bb-vapor-modules-pro' ),
								'slideRight2' => __( 'Slide Right 2', 'bb-vapor-modules-pro' ),
								'slideUp'     => __( 'Slide Up', 'bb-vapor-modules-pro' ),
								'slideUp2'    => __( 'Slide Up 2', 'bb-vapor-modules-pro' ),
								'slideDown'   => __( 'Slide Down', 'bb-vapor-modules-pro' ),
								'slideDown2'  => __( 'Slide Down 2', 'bb-vapor-modules-pro' ),
								'zoomIn'      => __( 'Zoom In', 'bb-vapor-modules-pro' ),
								'zoomIn2'     => __( 'Zoom In 2', 'bb-vapor-modules-pro' ),
								'zoomOut'     => __( 'Zoom Out', 'bb-vapor-modules-pro' ),
								'zoomOut2'    => __( 'Zoom Out 2', 'bb-vapor-modules-pro' ),
								'swirlLeft'   => __( 'Swirl Left', 'bb-vapor-modules-pro' ),
								'swirlLeft2'  => __( 'Swirl Left 2', 'bb-vapor-modules-pro' ),
								'swirlRight'  => __( 'Swirl Right', 'bb-vapor-modules-pro' ),
								'swirlRight2' => __( 'Swirl Right 2', 'bb-vapor-modules-pro' ),
								'burn'        => __( 'Burn', 'bb-vapor-modules-pro' ),
								'burn2'       => __( 'Burn 2', 'bb-vapor-modules-pro' ),
								'blur'        => __( 'Blur', 'bb-vapor-modules-pro' ),
								'blur2'       => __( 'Blur 2', 'bb-vapor-modules-pro' ),
								'flash'       => __( 'Flash', 'bb-vapor-modules-pro' ),
								'flash2'      => __( 'Flash 2', 'bb-vapor-modules-pro' ),
							),
						),
						'vegas_animations'      => array(
							'type'    => 'select',
							'label'   => __( 'Animations', 'bb-vapor-modules-pro' ),
							'default' => 'none',
							'options' => array(
								'none'              => __( 'None', 'bb-vapor-modules-pro' ),
								'kenburns'          => __( 'Ken Burns', 'bb-vapor-modules-pro' ),
								'kenburnsLeft'      => __( 'Ken Burns Left', 'bb-vapor-modules-pro' ),
								'kenburnsRight'     => __( 'Ken Burns Right', 'bb-vapor-modules-pro' ),
								'kenburnsUp'        => __( 'Ken Burns Up', 'bb-vapor-modules-pro' ),
								'kenburnsUpLeft'    => __( 'Ken Burns Up Left', 'bb-vapor-modules-pro' ),
								'kenburnsUpRight'   => __( 'Ken Burns Up Right', 'bb-vapor-modules-pro' ),
								'kenburnsDown'      => __( 'Ken Burns Down', 'bb-vapor-modules-pro' ),
								'kenburnsDownLeft'  => __( 'Ken Burns Down Left', 'bb-vapor-modules-pro' ),
								'kenburnsDownRight' => __( 'Ken Burns Down Right', 'bb-vapor-modules-pro' ),
							),
						),
						'show_arrows'           => array(
							'type'    => 'select',
							'label'   => __( 'Show Arrows', 'bb-vapor-modules-pro' ),
							'options' => array(
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
							),
							'default' => 'yes',
						),
						'show_bullets'          => array(
							'type'    => 'select',
							'label'   => __( 'Show Bullets', 'bb-vapor-modules-pro' ),
							'options' => array(
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
							),
							'default' => 'yes',
						),
						'preload'               => array(
							'type'    => 'select',
							'label'   => __( 'Pre-load All Assets Before Starting Slider', 'bb-vapor-modules-pro' ),
							'options' => array(
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
							),
							'default' => 'no',
						),
						'autoplay'              => array(
							'type'    => 'select',
							'label'   => __( 'Start Slideshow Automatically', 'bb-vapor-modules-pro' ),
							'options' => array(
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
							),
							'default' => 'yes',
						),
						'loop'                  => array(
							'type'    => 'select',
							'label'   => __( 'Loop Slideshow', 'bb-vapor-modules-pro' ),
							'options' => array(
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
							),
							'default' => 'yes',
						),
						'shuffle'               => array(
							'type'    => 'select',
							'label'   => __( 'Shuffle Slides', 'bb-vapor-modules-pro' ),
							'options' => array(
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
							),
							'default' => 'no',
						),
						'arrows_hover'          => array(
							'type'    => 'select',
							'label'   => __( 'Show Arrows on Hover', 'bb-vapor-modules-pro' ),
							'options' => array(
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
							),
							'default' => 'no',
						),
					),
				),
			),
		),
		'styles'     => array( // Tab
			'title'    => __( 'Styles', 'bb-vapor-modules-pro' ), // Tab title
			'sections' => array( // Tab Sections
				'styles' => array( // Section
					'title'  => __( 'Styles', 'bb-vapor-modules-pro' ), // Section Title
					'fields' => array( // Section Fields
						'slideshow_padding'          => array(
							'type'  => 'dimension',
							'label' => __( 'Select a Padding', 'bb-vapor-modules-pro' ),
						),
						'slideshow_background_color' => array(
							'type'       => 'color',
							'label'      => __( 'Select a Background Color', 'bb-vapor-modules-pro' ),
							'default'    => 'FFFFFF',
							'show_reset' => true,
							'show_alpha' => true,
						),
						'arrow_color'                => array(
							'type'    => 'color',
							'label'   => __( 'Arrow Color', 'bb-vapor-modules-pro' ),
							'default' => '25bb2f',
						),
						'arrow_background_color'     => array(
							'type'    => 'color',
							'label'   => __( 'Arrow Background Color', 'bb-vapor-modules-pro' ),
							'default' => 'FFFFFF',
						),
						'bullet_color'               => array(
							'type'    => 'color',
							'label'   => __( 'Bullet Color', 'bb-vapor-modules-pro' ),
							'default' => '000000',
						),
						'bullet_active_color'        => array(
							'type'    => 'color',
							'label'   => __( 'Bullet Active Color', 'bb-vapor-modules-pro' ),
							'default' => '333333',
						),
						'show_overlay'               => array(
							'type'    => 'select',
							'label'   => __( 'Show Overlay', 'bb-vapor-modules-pro' ),
							'options' => array(
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
							),
							'default' => 'no',
							'toggle'  => array( 'yes' => array( 'fields' => array( 'overlay_type' ) ) ),
						),
						'overlay_type'               => array(
							'type'    => 'select',
							'label'   => __( 'Overlay Type', 'bb-vapor-modules-pro' ),
							'options' => array(
								'background' => __( 'Background Color', 'bb-vapor-modules-pro' ),
								'gradient'   => __( 'Gradient', 'bb-vapor-modules-pro' ),
							),
							'toggle' => array(
								'background' => array( 'fields' => array( 'show_overlay_color' ) ),
								'gradient'   => array( 'fields' => array( 'show_overlay_gradient' ) ),
							),
							'default' => 'background',
						),
						'show_overlay_color'         => array(
							'type'       => 'color',
							'label'      => __( 'Overlay Color', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
							'show_alpha' => true,
						),
						'show_overlay_gradient'      => array(
							'type'       => 'gradient',
							'label'      => __( 'Overlay Gradient', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
							'show_alpha' => true,
						),
					),
				),
			),
		),
		'caption'    => array( // Tab
			'title'    => __( 'Caption', 'bb-vapor-modules-pro' ), // Tab title
			'sections' => array( // Tab Sections
				'caption' => array( // Section
					'title'  => __( 'Caption', 'bb-vapor-modules-pro' ), // Section Title
					'fields' => array( // Section Fields
						'show_caption'         => array(
							'type'    => 'select',
							'label'   => __( 'Show Caption', 'bb-vapor-modules-pro' ),
							'options' => array(
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
							),
							'default' => 'yes',
						),
						'caption_text_color'   => array(
							'type'       => 'color',
							'label'      => __( 'Caption Text Color', 'bb-vapor-modules-pro' ),
							'default'    => '000000',
							'show_reset' => true,
						),
						'caption_padding'      => array(
							'type'       => 'dimension',
							'label'      => __( 'Caption Padding', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'caption_background'   => array(
							'type'       => 'color',
							'label'      => __( 'Caption Background Color', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
							'show_alpha' => true,
						),
						'caption_border'       => array(
							'type'       => 'dimension',
							'label'      => __( 'Caption Border Width', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'caption_border_color' => array(
							'type'       => 'color',
							'label'      => __( 'Caption Border Color', 'bb-vapor-modules-pro' ),
							'default'    => '000000',
							'show_reset' => true,
						),
						'caption_typography'   => array(
							'type'  => 'typography',
							'label' => __( 'Caption Typography', 'bb-vapor-modules-pro' ),
						),
					),
				),
			),
		),
		'subcaption' => array( // Tab
			'title'    => __( 'Subcaption', 'bb-vapor-modules-pro' ), // Tab title
			'sections' => array( // Tab Sections
				'subcaption' => array( // Section
					'title'  => __( 'Subcaption', 'bb-vapor-modules-pro' ), // Section Title
					'fields' => array( // Section Fields
						'show_subcaption'       => array(
							'type'    => 'select',
							'label'   => __( 'Show Sub-Caption', 'bb-vapor-modules-pro' ),
							'options' => array(
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
							),
							'default' => 'yes',
						),
						'subcaption_text_color' => array(
							'type'       => 'color',
							'label'      => __( 'Sub-Caption Text Color', 'bb-vapor-modules-pro' ),
							'default'    => '000000',
							'show_reset' => true,
						),
						'subcaption_typography' => array(
							'type'  => 'typography',
							'label' => __( 'Sub-Caption Typography', 'bb-vapor-modules-pro' ),
						),
					),
				),
			),
		),
		'link'       => array( // Tab
			'title'    => __( 'Link', 'bb-vapor-modules-pro' ), // Tab title
			'sections' => array( // Tab Sections
				'link' => array( // Section
					'title'  => __( 'Link', 'bb-vapor-modules-pro' ), // Section Title
					'fields' => array( // Section Fields
						'show_link'       => array(
							'type'    => 'select',
							'label'   => __( 'Show Link', 'bb-vapor-modules-pro' ),
							'options' => array(
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
							),
							'default' => 'yes',
						),
						'link_color'      => array(
							'type'       => 'color',
							'label'      => __( 'Link Text Color', 'bb-vapor-modules-pro' ),
							'default'    => '000000',
							'show_reset' => true,
						),
						'link_typography' => array(
							'type'  => 'typography',
							'label' => __( 'Link Typography', 'bb-vapor-modules-pro' ),
						),
					),
				),
			),
		),
	)
);
