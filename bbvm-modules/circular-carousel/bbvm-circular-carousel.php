<?php // phpcs:ignore
class BBVapor_Circular_Carousel extends FLBuilderModule {
	/**
	 * Class constructor.
	 */
	public function __construct() {
		/**
		 * Class constructor.
		 */
		parent::__construct(
			array(
				'name'            => __( 'Circular Carousel', 'bb-vapor-modules-pro' ),
				'description'     => __( 'Add a circular carousel', 'bb-vapor-modules-pro' ),
				'category'        => __( 'Base', 'bb-vapor-modules-pro' ),
				'group'           => apply_filters( 'bbvm_whitelabel_category', __( 'Vapor', 'bb-vapor-modules-pro' ) ),
				'dir'             => BBVAPOR_PRO_BEAVER_BUILDER_DIR . 'bbvm-modules/circular-carousel/',
				'url'             => BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/circular-carousel/',
				'editor_export'   => true, // Defaults to true and can be omitted.
				'enabled'         => true, // Defaults to true and can be omitted.
				'partial_refresh' => false, // Defaults to false and can be omitted.
			)
		);

		$this->add_js( 'owl-carousel', BBVAPOR_PRO_BEAVER_BUILDER_URL . 'js/owl-carousel/owl.carousel.min.js', array( 'jquery' ), BBVAPOR_PRO_BEAVER_BUILDER_VERSION, true );
		$this->add_css( 'owl-carousel-css', BBVAPOR_PRO_BEAVER_BUILDER_URL . 'js/owl-carousel/assets/owl.carousel.min.css', array(), BBVAPOR_PRO_BEAVER_BUILDER_VERSION, 'all' );
		$this->add_css( 'owl-carousel-theme', BBVAPOR_PRO_BEAVER_BUILDER_URL . 'js/owl-carousel/assets/owl.theme.default.min.css', array(), BBVAPOR_PRO_BEAVER_BUILDER_VERSION, 'all' );
		$this->add_css( 'animate', BBVAPOR_PRO_BEAVER_BUILDER_URL . 'css/animate.css', array(), BBVAPOR_PRO_BEAVER_BUILDER_VERSION, 'all' );
	}
}
FLBuilder::register_settings_form(
	'bbvm_circular_carousel',
	array(
		'title' => __( 'Carousel Settings', 'bb-vapor-modules-pro' ),
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
/**
 * Register the module and its form settings.
 */
FLBuilder::register_module(
	'BBVapor_Circular_Carousel',
	array(
		'general' => array(
			'title'    => __( 'Carousel', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'general' => array(
					'title'  => __( 'Carousel Settings', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'circles'                  => array(
							'type'         => 'form',
							'form'         => 'bbvm_circular_carousel',
							'label'        => __( 'Circles', 'bb-vapor-modules-pro' ),
							'multiple'     => true,
							'preview_text' => 'headline',
						),
						'items'                    => array(
							'type'    => 'unit',
							'label'   => __( 'Number of Items in the Carousel', 'bb-vapor-modules-pro' ),
							'default' => 1,
							'slider'  => array(
								'min'  => 1,
								'max'  => 6,
								'step' => 1,
							),
						),
						'carousel_width'              => array(
							'type'        => 'unit',
							'label'       => __( 'Carousel Item Width', 'bb-vapor-modules-pro' ),
							'default'     => 400,
							'slider'      => array(
								'min'  => 400,
								'max'  => 1000,
								'step' => 10,
							),

						),
						'card_padding'             => array(
							'type'       => 'dimension',
							'label'      => __( 'Carousel Item Padding', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'card_margin'              => array(
							'type'       => 'dimension',
							'label'      => __( 'Carousel Item Margin', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'animation'                => array(
							'type'        => 'select',
							'label'       => __( 'Select An Animation', 'bb-vapor-modules-pro' ),
							'default'     => 'slideInRight',
							'description' => __( 'Animations only work if you have selected only one item in the carousel', 'bb-vapor-modules-pro' ),
							'options'     => array(
								'fadeIn'            => __( 'Fade In', 'bb-vapor-modules-pro' ),
								'fadeInDown'        => __( 'Fade In Down', 'bb-vapor-modules-pro' ),
								'fadeInDownBig'     => __( 'Fade In Down Big', 'bb-vapor-modules-pro' ),
								'fadeInLeft'        => __( 'Fade In Left', 'bb-vapor-modules-pro' ),
								'fadeInLeftBig'     => __( 'Fade In Left Big', 'bb-vapor-modules-pro' ),
								'fadeInRight'       => __( 'Fade In Right', 'bb-vapor-modules-pro' ),
								'fadeInRightBig'    => __( 'Fade In Right Big', 'bb-vapor-modules-pro' ),
								'fadeInUp'          => __( 'Fade In Up', 'bb-vapor-modules-pro' ),
								'fadeInRightUp'     => __( 'Fade In Up Big', 'bb-vapor-modules-pro' ),
								'bounceIn'          => __( 'Bounce In', 'bb-vapor-modules-pro' ),
								'bounceInDown'      => __( 'Bounce In Down', 'bb-vapor-modules-pro' ),
								'bounceInLeft'      => __( 'Bounce In Left', 'bb-vapor-modules-pro' ),
								'bounceInRight'     => __( 'Bounce In Right', 'bb-vapor-modules-pro' ),
								'bounceInUp'        => __( 'Bounce In Up', 'bb-vapor-modules-pro' ),
								'flip'              => __( 'Flip', 'bb-vapor-modules-pro' ),
								'flipInX'           => __( 'Flip In X', 'bb-vapor-modules-pro' ),
								'flipInY'           => __( 'Flip In Y', 'bb-vapor-modules-pro' ),
								'lightSpeedIn'      => __( 'Light Speed In', 'bb-vapor-modules-pro' ),
								'rotateIn'          => __( 'Rotate In', 'bb-vapor-modules-pro' ),
								'rotateInDownLeft'  => __( 'Rotate In Down Left', 'bb-vapor-modules-pro' ),
								'rotateInDownRight' => __( 'Rotate In Down Right', 'bb-vapor-modules-pro' ),
								'rotateInUpLeft'    => __( 'Rotate In Up Left', 'bb-vapor-modules-pro' ),
								'rotateInUpRight'   => __( 'Rotate In Up Right', 'bb-vapor-modules-pro' ),
								'slideInUp'         => __( 'Slide In Up', 'bb-vapor-modules-pro' ),
								'slideInDown'       => __( 'Slide In Down', 'bb-vapor-modules-pro' ),
								'slideInLeft'       => __( 'Slide In Left', 'bb-vapor-modules-pro' ),
								'slideInRight'      => __( 'Slide In Right', 'bb-vapor-modules-pro' ),
								'zoomIn'            => __( 'Zoom In', 'bb-vapor-modules-pro' ),
								'zoomInDown'        => __( 'Zoom In Down', 'bb-vapor-modules-pro' ),
								'zoomInLeft'        => __( 'Zoom In Left', 'bb-vapor-modules-pro' ),
								'zoomInRight'       => __( 'Zoom In Right', 'bb-vapor-modules-pro' ),
								'zoomInUp'          => __( 'Zoom In Up', 'bb-vapor-modules-pro' ),
							),
						),
						'show_nav_buttons'         => array(
							'type'    => 'select',
							'label'   => __( 'Show Nav Buttons', 'bb-vapor-modules-pro' ),
							'options' => array(
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
							),
							'default' => 'yes',
							'toggle'  => array( 'yes' => array( 'fields' => array( 'nav_color', 'nav_background' ) ) ),
						),
						'nav_color'                => array(
							'type'    => 'color',
							'label'   => __( 'Navigation Arrows Color', 'bb-vapor-modules-pro' ),
							'default' => '000000',
						),
						'nav_background'           => array(
							'type'       => 'color',
							'label'      => __( 'Navigation Arrows Background Color', 'bb-vapor-modules-pro' ),
							'default'    => 'FFFFFF',
							'show_reset' => true,
							'show_alpha' => true,
						),
						'show_nav_bullets'         => array(
							'type'    => 'select',
							'label'   => __( 'Show Nav Bullets', 'bb-vapor-modules-pro' ),
							'options' => array(
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
							),
							'default' => 'yes',
							'toggle'  => array( 'yes' => array( 'fields' => array( 'nav_bullets_color', 'nav_bullets_active_color' ) ) ),
						),
						'nav_bullets_color'        => array(
							'type'    => 'color',
							'label'   => __( 'Navigation Bullets Color', 'bb-vapor-modules-pro' ),
							'default' => 'D6D6D6',
						),
						'nav_bullets_active_color' => array(
							'type'    => 'color',
							'label'   => __( 'Navigation Bullets Active Color', 'bb-vapor-modules-pro' ),
							'default' => '869791',
						),
						'slide_duration'           => array(
							'type'    => 'unit',
							'label'   => __( 'Slide Duration in Milliseconds', 'bb-vapor-modules-pro' ),
							'default' => '5000',
						),
						'slide_loop'               => array(
							'type'    => 'select',
							'label'   => __( 'Loop', 'bb-vapor-modules-pro' ),
							'options' => array(
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
							),
							'default' => 'yes',
						),
						'auto_play'                => array(
							'type'    => 'select',
							'label'   => __( 'Auto Play?', 'bb-vapor-modules-pro' ),
							'options' => array(
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
							),
							'default' => 'yes',
						),
						'pause_hover'              => array(
							'type'    => 'select',
							'label'   => __( 'Pause on Hover?', 'bb-vapor-modules-pro' ),
							'options' => array(
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
							),
							'default' => 'yes',
						),
						'auto_height'              => array(
							'type'    => 'select',
							'label'   => __( 'Auto Height?', 'bb-vapor-modules-pro' ),
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
		'buttons' => array(
			'title'    => __( 'Buttons', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'buttons' => array(
					'title'  => __( 'Button Settings', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'show_follow_us_button'   => array(
							'type'    => 'select',
							'label'   => __( 'Show Follow Us Button', 'bb-vapor-modules-pro' ),
							'options' => array(
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
							),
							'default' => 'yes',
						),
						'follow_background_color' => array(
							'type'       => 'color',
							'label'      => __( 'Follow Background Color', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
							'default'    => '408bd1',
						),
						'follow_text_color'       => array(
							'type'       => 'color',
							'label'      => __( 'Show More Text Color', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
							'default'    => 'FFFFFF',
						),
						'follow_text'             => array(
							'type'    => 'text',
							'label'   => __( 'Follow Text', 'bb-vapor-modules-pro' ),
							'default' => __( 'Follow on Instagram', 'bb-vapor-modules-pro' ),
						),
						'follow_icon'             => array(
							'type'        => 'icon',
							'label'       => __( 'Follow Icon', 'bb-vapor-modules-pro' ),
							'show_remove' => true,
						),
					),
				),
			),
		),
	)
);
