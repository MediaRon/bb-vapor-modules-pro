<?php // phpcs:ignore
class BBVapor_Testimonials_Module extends FLBuilderModule {
	public function __construct() {
		parent::__construct(
			array(
				'name'            => __( 'Testimonials', 'bb-vapor-modules-pro' ),
				'description'     => __( 'Add Testimonials', 'bb-vapor-modules-pro' ),
				'category'        => __( 'Base', 'bb-vapor-modules-pro' ),
				'group'           => apply_filters( 'bbvm_whitelabel_category', __( 'Vapor', 'bb-vapor-modules-pro' ) ),
				'dir'             => BBVAPOR_PRO_BEAVER_BUILDER_DIR . 'bbvm-modules/testimonials/',
				'url'             => BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/testimonials/',
				'editor_export'   => true, // Defaults to true and can be omitted.
				'enabled'         => true, // Defaults to true and can be omitted.
				'partial_refresh' => false, // Defaults to false and can be omitted.
			)
		);
	}
	public function enqueue_scripts() {
		if ( $this->settings && 'slider' === $this->settings->testimonial_type ) {
			$this->add_css( 'animate', BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/testimonials/css/animate.css', array(), '3.7.0', 'all' );
			$this->add_css( 'owl-carousel', BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/testimonials/js/assets/owl.carousel.min.css', array(), '2.3.4', 'all' );
			$this->add_css( 'owl-carousel-default', BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/testimonials/js/assets/owl.theme.default.min.css', array( 'owl-carousel' ), '2.3.4', 'all' );
			$this->add_js( 'owl-carousel', BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/testimonials/js/owl.carousel.min.js', array( 'jquery' ), '2.3.4', true );
		}
	}
}
FLBuilder::register_settings_form(
	'mrbb_testimonials',
	array(
		'title' => __( 'Add Testimonial', 'bb-vapor-modules-pro' ),
		'tabs'  => array(
			'general' => array(
				'title'    => __( 'General', 'bb-vapor-modules-pro' ),
				'sections' => array(
					'general' => array(
						'title'  => __( 'Add Testimonial Content', 'bb-vapor-modules-pro' ),
						'fields' => array(
							'testimonial_rating'  => array(
								'type'    => 'select',
								'label'   => __( 'Testimonial Rating', 'bb-vapor-modules-pro' ),
								'options' => array(
									'1' => '1',
									'2' => '2',
									'3' => '3',
									'4' => '4',
									'5' => '5',
								),
								'default' => '5',
							),
							'testimonial_name'    => array(
								'type'          => 'text',
								'label' => __( 'Testimonial Name', 'bb-vapor-modules-pro' ),
							),
							'testimonial_title'   => array(
								'type'  => 'text',
								'label' => __( 'Testimonial Title', 'bb-vapor-modules-pro' ),
							),
							'testimonial_content' => array(
								'type'  => 'editor',
								'label' => __( 'Testimonial Content', 'bb-vapor-modules-pro' ),
							),
						),
					),
				),
			),
			'image'   => array(
				'title'    => __( 'Image', 'bb-vapor-modules-pro' ),
				'sections' => array(
					'image' => array(
						'title'  => __( 'Add Image', 'bb-vapor-modules-pro' ),
						'fields' => array(
							'testimonial_image_type' => array(
								'type'    => 'select',
								'label'   => __( 'Testimonial Image Type', 'bb-vapor-modules-pro' ),
								'options' => array(
									'icon'  => __( 'Icon', 'bb-vapor-modules-pro' ),
									'image' => __( 'Image', 'bb-vapor-modules-pro' ),
								),
								'toggle' => array(
									'icon'  => array( 'fields' => array( 'testimonial_icon' ) ),
									'image' => array( 'fields' => array( 'testimonial_image' ) ),
								),
							),
							'testimonial_icon'       => array(
								'type'  => 'icon',
								'label' => __( 'Testimonial Icon', 'bb-vapor-modules-pro' ),
							),
							'testimonial_image'      => array(
								'type'  => 'photo',
								'label' => __( 'Testimonial Image', 'bb-vapor-modules-pro' ),
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
	'BBVapor_Testimonials_Module',
	array(
		'general'      => array( // Tab
			'title'    => __( 'Settings', 'bb-vapor-modules-pro' ), // Tab title
			'sections' => array( // Tab Sections
				'general'       => array( // Section
					'title'  => __( 'Settings', 'bb-vapor-modules-pro' ), // Section Title
					'fields' => array( // Section Fields
						'testimonial_type'         => array(
							'type'    => 'select',
							'label'   => __( 'Testimonial type', 'bb-vapor-modules-pro' ),
							'options' => array(
								'slider' => __( 'Slider', 'bb-vapor-modules-pro' ),
								'card'   => __( 'Card', 'bb-vapor-modules-pro' ),
								'list'   => __( 'List', 'bb-vapor-modules-pro' ),
							),
							'default' => 'slider',
							'toggle'  => array(
								'card'   => array( 'fields' => array( 'card_background', 'card_background_hover', 'card_padding', 'card_width', 'card_margin' ) ),
								'list'   => array( 'fields' => array( 'left_area_background', 'right_area_background', 'left_area_padding', 'left_border', 'left_border_color', 'right_area_padding', 'list_margin_bottom', 'list_border', 'list_border_color', 'list_border_radius', 'list_shadow' ) ),
								'slider' => array( 'fields' => array( 'card_background', 'card_background_hover', 'card_padding', 'show_nav_buttons', 'nav_color', 'show_nav_bullets', 'nav_bullets_color', 'nav_bullets_active_color', 'animation', 'slide_duration', 'slide_loop', 'auto_play', 'pause_hover', 'auto_height' ) ),
							),
						),
						'card_width'               => array(
							'type'        => 'unit',
							'label'       => __( 'Card Width', 'bb-vapor-modules-pro' ),
							'default'     => '33',
							'description' => '%',
							'responsive'  => true,
						),
						'card_background'          => array(
							'type'    => 'color',
							'label'   => __( 'Card Background Color', 'bb-vapor-modules-pro' ),
							'default' => 'FFFFFF',
						),
						'card_background_hover'    => array(
							'type'    => 'color',
							'label'   => __( 'Card Background Hover Color', 'bb-vapor-modules-pro' ),
							'default' => 'FFFFFF',
						),
						'card_padding'             => array(
							'type'       => 'dimension',
							'label'      => __( 'Card Padding', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'card_margin'              => array(
							'type'       => 'dimension',
							'label'      => __( 'Card Margin', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'list_margin_bottom'       => array(
							'type'        => 'unit',
							'label'       => __( 'Bottom Margin', 'bb-vapor-modules-pro' ),
							'default'     => '10',
							'description' => 'px',
						),
						'left_area_background'     => array(
							'type'    => 'color',
							'label'   => __( 'Left Area Background', 'bb-vapor-modules-pro' ),
							'default' => 'FFFFFF',
						),
						'left_border' => array(
							'type'    => 'unit',
							'label'   => __( 'Left Border Separator Width', 'bb-vapor-modules-pro' ),
							'default' => '0',
						),
						'left_border_color'        => array(
							'type'    => 'color',
							'label'   => __( 'Left Border Separator Color', 'bb-vapor-modules-pro' ),
							'default' => 'FFFFFF',
						),
						'right_area_background'    => array(
							'type'    => 'color',
							'label'   => __( 'Right Area Background', 'bb-vapor-modules-pro' ),
							'default' => 'FFFFFF',
						),
						'left_area_padding'        => array(
							'type'        => 'dimension',
							'label'       => __( 'Left Area Padding', 'bb-vapor-modules-pro' ),
							'responsive'  => true,
							'description' => 'px',
						),
						'right_area_padding'       => array(
							'type'        => 'dimension',
							'label'       => __( 'Right Area Padding', 'bb-vapor-modules-pro' ),
							'responsive'  => true,
							'description' => 'px',
						),
						'list_border'              => array(
							'type'       => 'dimension',
							'label'      => __( 'List Border', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'list_border_color'        => array(
							'type'    => 'color',
							'label'   => __( 'List Border Color', 'bb-vapor-modules-pro' ),
							'default' => 'FFFFFF',
						),
						'list_border_radius'       => array(
							'type'       => 'dimension',
							'label'      => __( 'List Border Radius', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'list_shadow'              => array(
							'type'        => 'shadow',
							'label'       => __( 'List Shadow', 'bb-vapor-modules-pro' ),
							'show_spread' => true,
						),
						'animation'                => array(
							'type'    => 'select',
							'label'   => __( 'Select An Animation', 'bb-vapor-modules-pro' ),
							'options' => array(
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
							'default' => 'slideInRight',
						),
						'show_nav_buttons'         => array(
							'type'    => 'select',
							'label'   => __( 'Show Nav Buttons', 'bb-vapor-modules-pro' ),
							'options' => array(
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
							),
							'default' => 'yes',
							'toggle'  => array( 'yes' => array( 'fields' => array( 'nav_color' ) ) ),
						),
						'nav_color'                => array(
							'type'    => 'color',
							'label'   => __( 'Navigation Arrows Color', 'bb-vapor-modules-pro' ),
							'default' => '000000',
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
							'type'   => 'select',
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
		'testimonials' => array( // Tab
			'title'    => __( 'Testimonials', 'bb-vapor-modules-pro' ), // Tab title
			'sections' => array( // Tab Sections
				'testimonials' => array( // Section
					'title'  => __( 'Testimonials', 'bb-vapor-modules-pro' ), // Section Title
					'fields' => array( // Section Fields
						'testimonial_entries' => array(
							'type'         => 'form',
							'form'         => 'mrbb_testimonials',
							'label'        => __( 'Testimonial', 'bb-vapor-modules-pro' ),
							'multiple'     => true,
							'preview_text' => 'testimonial_name',
						),
					),
				),
			),
		),
		'appearance'   => array( // Tab
			'title'    => __( 'Appearance', 'bb-vapor-modules-pro' ), // Tab title
			'sections' => array( // Tab Sections
				'rating'   => array( // Section
					'title'  => __( 'Rating', 'bb-vapor-modules-pro' ), // Section Title
					'fields' => array( // Section Fields
						'show_rating' => array(
							'type'    => 'select',
							'label'   => __( 'Show Rating', 'bb-vapor-modules-pro' ),
							'options' => array(
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
							),
							'default' => 'yes',
							'toggle'  => array(
								'yes' => array( 'fields' => array( 'rating_color', 'rating_size' ) ),
							),
						),
						'rating_color' => array(
							'type'    => 'color',
							'label'   => __( 'Rating Color', 'bb-vapor-modules-pro' ),
							'default' => 'ff6d15',
						),
						'rating_size'  => array(
							'type'        => 'unit',
							'label'       => __( 'Rating Size', 'bb-vapor-modules-pro' ),
							'description' => 'px',
							'default'     => '20',
						),
					),
				),
				'icon'   => array(
					'title'  => __( 'Icon', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'icon_size'  => array(
							'type'        => 'unit',
							'label'       => __( 'Icon Size', 'bb-vapor-modules-pro' ),
							'default'     => '30',
							'description' => 'px',
						),
						'icon_color' => array(
							'type'    => 'color',
							'label'   => __( 'Icon Color', 'bb-vapor-modules-pro' ),
							'default' => '000000',
						),
					),
				),
				'photo'  => array(
					'title'  => __( 'Photo', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'photo_size'       => array(
							'type'        => 'unit',
							'label'       => __( 'Photo Size', 'bb-vapor-modules-pro' ),
							'default'     => '100',
							'description' => 'px',
						),
						'photo_appearance' => array(
							'type'    => 'select',
							'label'   => __( 'Photo Appearance', 'bb-vapor-modules-pro' ),
							'options' => array(
								'square' => __( 'Square', 'bb-vapor-modules-pro' ),
								'circle' => __( 'Circle', 'bb-vapor-modules-pro' ),
							),
						),
					),
				),
			),
		),
		'typography'   => array( // Tab
			'title'    => __( 'Typography', 'bb-vapor-modules-pro' ), // Tab title
			'sections' => array( // Tab Sections
				'overlay' => array( // Section
					'title'  => __( 'Typography', 'bb-vapor-modules-pro' ), // Section Title
					'fields' => array( // Section Fields
						'testimonial_name_typography'    => array(
							'type'       => 'typography',
							'label'      => __( 'Name Typography', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'testimonial_name_color'         => array(
							'type'    => 'color',
							'label'   => __( 'Name Color', 'bb-vapor-modules-pro' ),
							'default' => '000000',
						),
						'testimonial_name_padding'       => array(
							'type'        => 'dimension',
							'label'       => __( 'Name Padding', 'bb-vapor-modules-pro' ),
							'description' => 'px',
						),
						'testimonial_title_typography'   => array(
							'type'       => 'typography',
							'label'      => __( 'Title Typography', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'testimonial_title_color'        => array(
							'type'    => 'color',
							'label'   => __( 'Title Color', 'bb-vapor-modules-pro' ),
							'default' => '000000',
						),
						'testimonial_title_padding'      => array(
							'type'        => 'dimension',
							'label'       => __( 'Title Padding', 'bb-vapor-modules-pro' ),
							'description' => 'px',
						),
						'testimonial_content_typography' => array(
							'type'       => 'typography',
							'label'      => __( 'Content Typography', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'testimonial_content_color'      => array(
							'type'    => 'color',
							'label'   => __( 'Content Color', 'bb-vapor-modules-pro' ),
							'default' => '000000',
						),
						'testimonial_content_padding'    => array(
							'type'        => 'dimension',
							'label'       => __( 'Content Padding', 'bb-vapor-modules-pro' ),
							'description' => 'px',
						),
					),
				),
			),
		),
	)
);
