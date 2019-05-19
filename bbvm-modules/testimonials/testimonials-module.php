<?php
class MediaRon_Testimonials_Module extends FLBuilderModule {
	public function __construct()
	{
		parent::__construct(array(
			'name'            => __( 'Testimonials', 'mediaron-bb-modules' ),
			'description'     => __( 'Add Testimonials', 'mediaron-bb-modules' ),
			'category'        => __( 'Base', 'mediaron-bb-modules' ),
			'group'           => __( 'MediaRon Modules', 'mediarion-bb-modules' ),
			'dir'             => MEDIARON_BEAVER_BUILDER_DIR . 'mediaron-modules/testimonials/',
			'url'             => MEDIARON_BEAVER_BUILDER_URL . 'mediaron-modules/testimonials/',
			'editor_export'   => true, // Defaults to true and can be omitted.
			'enabled'         => true, // Defaults to true and can be omitted.
			'partial_refresh' => false, // Defaults to false and can be omitted.
		));
	}
	public function enqueue_scripts() {
		if ( $this->settings && 'slider' === $this->settings->testimonial_type ) {
			$this->add_css('animate', MEDIARON_BEAVER_BUILDER_URL . 'mediaron-modules/testimonials/css/animate.css', array(), '3.7.0', 'all' );
			$this->add_css('owl-carousel', MEDIARON_BEAVER_BUILDER_URL . 'mediaron-modules/testimonials/js/assets/owl.carousel.min.css', array(), '2.3.4', 'all' );
			$this->add_css('owl-carousel-default', MEDIARON_BEAVER_BUILDER_URL . 'mediaron-modules/testimonials/js/assets/owl.theme.default.min.css', array('owl-carousel'), '2.3.4', 'all' );
			$this->add_js('owl-carousel', MEDIARON_BEAVER_BUILDER_URL . 'mediaron-modules/testimonials/js/owl.carousel.min.js', array('jquery'), '2.3.4', true );
		}
	}
}
FLBuilder::register_settings_form(
	'mrbb_testimonials', array(
		'title' => __( 'Add Testimonial', 'mediaron-bb-modules' ),
		'tabs'  => array(
			'general'      => array(
				'title'         => __('General', 'mediaron-bb-modules'),
				'sections'      => array(
					'general'       => array(
						'title'         => __( 'Add Testimonial Content', 'mediaron-bb-modules' ),
						'fields'        => array(
							'testimonial_rating'         => array(
								'type'          => 'select',
								'label' => __( 'Testimonial Rating', 'mediaron-bb-modules' ),
								'options' => array(
									'1' => '1',
									'2' => '2',
									'3' => '3',
									'4' => '4',
									'5' => '5'
								),
								'default' => '5'
							),
							'testimonial_name'         => array(
								'type'          => 'text',
								'label' => __( 'Testimonial Name', 'mediaron-bb-modules' )
							),
							'testimonial_title'         => array(
								'type'          => 'text',
								'label' => __( 'Testimonial Title', 'mediaron-bb-modules' )
							),
							'testimonial_content' => array(
								'type' => 'editor',
								'label' => __( 'Testimonial Content', 'mediaron-bb-modules' )
							),
						)
					)
				),
			),
			'image'      => array(
				'title'         => __('Image', 'mediaron-bb-modules'),
				'sections'      => array(
					'image'       => array(
						'title'         => __( 'Add Image', 'mediaron-bb-modules' ),
						'fields'        => array(
							'testimonial_image_type'         => array(
								'type'          => 'select',
								'label' => __( 'Testimonial Image Type', 'mediaron-bb-modules' ),
								'options' => array(
									'icon' => __( 'Icon', 'mediaron-bb-modules' ),
									'image' => __( 'Image', 'mediaron-bb-modules' )
								),
								'toggle' => array(
									'icon' => array( 'fields' => array( 'testimonial_icon' ) ),
									'image' => array( 'fields' => array( 'testimonial_image' ) ),
								)
							),
							'testimonial_icon'         => array(
								'type'          => 'icon',
								'label' => __( 'Testimonial Icon', 'mediaron-bb-modules' )
							),
							'testimonial_image' => array(
								'type' => 'photo',
								'label' => __( 'Testimonial Image', 'mediaron-bb-modules' )
							)
						),
					)
				)
			)
		)
	)
);
/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('MediaRon_Testimonials_Module', array(
	'general'       => array( // Tab
		'title'         => __('Settings', 'mediaron-bb-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'general'       => array( // Section
				'title'         => __('Settings', 'mediaron-bb-modules'), // Section Title
				'fields'        => array( // Section Fields
					'testimonial_type' => array(
						'type'          => 'select',
						'label'         => __('Testimonial type', 'mediaron-bb-modules'),
						'options' => array(
							'slider' => __( 'Slider', 'mediaron-bb-modules' ),
							'card' => __( 'Card', 'mediaron-bb-modules' ),
							'list' => __( 'List', 'mediaron-bb-modules' )
						),
						'default' => 'slider',
						'toggle' => array(
							'card' => array( 'fields' => array( 'card_background', 'card_background_hover', 'card_padding', 'card_width', 'card_margin' ) ),
							'list' => array( 'fields' => array( 'left_area_background', 'right_area_background', 'left_area_padding', 'left_border', 'left_border_color', 'right_area_padding',  'list_margin_bottom', 'list_border', 'list_border_color', 'list_border_radius', 'list_shadow' ) ),
							'slider' => array( 'fields' => array( 'card_background', 'card_background_hover', 'card_padding', 'show_nav_buttons', 'nav_color', 'show_nav_bullets', 'nav_bullets_color', 'nav_bullets_active_color', 'animation', 'slide_duration', 'slide_loop', 'auto_play', 'pause_hover', 'auto_height' ) )
						)
					),
					'card_width' => array(
						'type' => 'unit',
						'label' => __( 'Card Width', 'mediaron-bb-modules' ),
						'default' => '33',
						'description' => '%',
						'responsive' => true
					),
					'card_background' => array(
						'type' => 'color',
						'label' => __( 'Card Background Color', 'mediaron-bb-modules' ),
						'default' => 'FFFFFF'
					),
					'card_background_hover' => array(
						'type' => 'color',
						'label' => __( 'Card Background Hover Color', 'mediaron-bb-modules' ),
						'default' => 'FFFFFF'
					),
					'card_padding' => array(
						'type' => 'dimension',
						'label' => __( 'Card Padding', 'mediaron-bb-modules' ),
						'responsive' => true
					),
					'card_margin' => array(
						'type' => 'dimension',
						'label' => __( 'Card Margin', 'mediaron-bb-modules' ),
						'responsive' => true
					),
					'list_margin_bottom' => array(
						'type' => 'unit',
						'label' => __( 'Bottom Margin', 'mediaron-bb-modules' ),
						'default' => '10',
						'description' => 'px'
					),
					'left_area_background' => array(
						'type' => 'color',
						'label' => __( 'Left Area Background', 'mediaron-bb-modules' ),
						'default' => 'FFFFFF',
					),
					'left_border' => array(
						'type' => 'unit',
						'label' => 'Left Border Separator Width', 'mediaron-bb-modules',
						'default' => '0',
					),
					'left_border_color' => array(
						'type' => 'color',
						'label' => 'Left Border Separator Color', 'mediaron-bb-modules',
						'default' => 'FFFFFF'
					),
					'right_area_background' => array(
						'type' => 'color',
						'label' => __( 'Right Area Background', 'mediaron-bb-modules' ),
						'default' => 'FFFFFF'
					),
					'left_area_padding' => array(
						'type' => 'dimension',
						'label' => __( 'Left Area Padding', 'mediaron-bb-modules' ),
						'responsive' => true,
						'description' => 'px',
					),
					'right_area_padding' => array(
						'type' => 'dimension',
						'label' => __( 'Right Area Padding', 'mediaron-bb-modules' ),
						'responsive' => true,
						'description' => 'px',
					),
					'list_border' => array(
						'type' => 'dimension',
						'label' => __( 'List Border', 'mediaron-bb-modules' ),
						'responsive' => true,
					),
					'list_border_color' => array(
						'type' => 'color',
						'label' => __( 'List Border Color', 'mediaron-bb-modules' ),
						'default' => 'FFFFFF',
					),
					'list_border_radius' => array(
						'type' => 'dimension',
						'label' => __( 'List Border Radius', 'mediaron-bb-modules' ),
						'responsive' => true,
					),
					'list_shadow' => array(
						'type' => 'shadow',
						'label' => __( 'List Shadow', 'mediaron-bb-modules' ),
						'show_spread' => true,
					),
					'animation' => array(
						'type' => 'select',
						'label' => __( 'Select An Animation', 'mediaron-bb-modules' ),
						'options' => array(
							'fadeIn' => __( 'Fade In', 'mediaron-bb-modules' ),
							'fadeInDown' => __( 'Fade In Down', 'mediaron-bb-modules' ),
							'fadeInDownBig' => __( 'Fade In Down Big', 'mediaron-bb-modules' ),
							'fadeInLeft' => __( 'Fade In Left', 'mediaron-bb-modules' ),
							'fadeInLeftBig' => __( 'Fade In Left Big', 'mediaron-bb-modules' ),
							'fadeInRight' => __( 'Fade In Right', 'mediaron-bb-modules' ),
							'fadeInRightBig' => __( 'Fade In Right Big', 'mediaron-bb-modules' ),
							'fadeInUp' => __( 'Fade In Up', 'mediaron-bb-modules' ),
							'fadeInRightUp' => __( 'Fade In Up Big', 'mediaron-bb-modules' ),
							'bounceIn' => __( 'Bounce In', 'mediaron-bb-modules' ),
							'bounceInDown' => __( 'Bounce In Down', 'mediaron-bb-modules' ),
							'bounceInLeft' => __( 'Bounce In Left', 'mediaron-bb-modules' ),
							'bounceInRight' => __( 'Bounce In Right', 'mediaron-bb-modules' ),
							'bounceInUp' => __( 'Bounce In Up', 'mediaron-bb-modules' ),
							'flip' => __( 'Flip', 'mediaron-bb-modules' ),
							'flipInX' => __( 'Flip In X', 'mediaron-bb-modules' ),
							'flipInY' => __( 'Flip In Y', 'mediaron-bb-modules' ),
							'lightSpeedIn' => __( 'Light Speed In', 'mediaron-bb-modules' ),
							'rotateIn' => __( 'Rotate In', 'mediaron-bb-modules' ),
							'rotateInDownLeft' => __( 'Rotate In Down Left', 'mediaron-bb-modules' ),
							'rotateInDownRight' => __( 'Rotate In Down Right', 'mediaron-bb-modules' ),
							'rotateInUpLeft' => __( 'Rotate In Up Left', 'mediaron-bb-modules' ),
							'rotateInUpRight' => __( 'Rotate In Up Right', 'mediaron-bb-modules' ),
							'slideInUp' => __( 'Slide In Up', 'mediaron-bb-modules' ),
							'slideInDown' => __( 'Slide In Down', 'mediaron-bb-modules' ),
							'slideInLeft' => __( 'Slide In Left', 'mediaron-bb-modules' ),
							'slideInRight' => __( 'Slide In Right', 'mediaron-bb-modules' ),
							'zoomIn' => __( 'Zoom In', 'mediaron-bb-modules' ),
							'zoomInDown' => __( 'Zoom In Down', 'mediaron-bb-modules' ),
							'zoomInLeft' => __( 'Zoom In Left', 'mediaron-bb-modules' ),
							'zoomInRight' => __( 'Zoom In Right', 'mediaron-bb-modules' ),
							'zoomInUp' => __( 'Zoom In Up', 'mediaron-bb-modules' )
						),
						'default' => 'slideInRight'
					),
					'show_nav_buttons' => array(
						'type' => 'select',
						'label' => __( 'Show Nav Buttons', 'mediaron-bb-modules' ),
						'options' => array(
							'no' => __( 'No', 'mediaron-bb-modules' ),
							'yes' => __( 'Yes', 'mediaron-bb-modules' ),
						),
						'default' => 'yes',
						'toggle' => array( 'yes' => array( 'fields' => array( 'nav_color' ) ) )
					),
					'nav_color' => array(
						'type' => 'color',
						'label' => __( 'Navigation Arrows Color', 'mediaron-bb-modules' ),
						'default' => '000000'
					),
					'show_nav_bullets' => array(
						'type' => 'select',
						'label' => __( 'Show Nav Bullets', 'mediaron-bb-modules' ),
						'options' => array(
							'no' => __( 'No', 'mediaron-bb-modules' ),
							'yes' => __( 'Yes', 'mediaron-bb-modules' ),
						),
						'default' => 'yes',
						'toggle' => array( 'yes' => array( 'fields' => array( 'nav_bullets_color', 'nav_bullets_active_color' ) ) )
					),
					'nav_bullets_color' => array(
						'type' => 'color',
						'label' => __( 'Navigation Bullets Color', 'mediaron-bb-modules' ),
						'default' => 'D6D6D6'
					),
					'nav_bullets_active_color' => array(
						'type' => 'color',
						'label' => __( 'Navigation Bullets Active Color', 'mediaron-bb-modules' ),
						'default' => '869791'
					),
					'slide_duration' => array(
						'type' => 'unit',
						'label' => __( 'Slide Duration in Milliseconds', 'mediaron-bb-modules' ),
						'default' => '5000'
					),
					'slide_loop' => array(
						'type' => 'select',
						'label' => __( 'Loop', 'mediaron-bb-modules' ),
						'options' => array(
							'no' => __( 'No', 'mediaron-bb-modules' ),
							'yes' => __( 'Yes', 'mediaron-bb-modules' ),
						),
						'default' => 'yes'
					),
					'auto_play' => array(
						'type' => 'select',
						'label' => __( 'Auto Play?', 'mediaron-bb-modules' ),
						'options' => array(
							'no' => __( 'No', 'mediaron-bb-modules' ),
							'yes' => __( 'Yes', 'mediaron-bb-modules' ),
						),
						'default' => 'yes'
					),
					'pause_hover' => array(
						'type' => 'select',
						'label' => __( 'Pause on Hover?', 'mediaron-bb-modules' ),
						'options' => array(
							'no' => __( 'No', 'mediaron-bb-modules' ),
							'yes' => __( 'Yes', 'mediaron-bb-modules' ),
						),
						'default' => 'yes'
					),
					'auto_height' => array(
						'type' => 'select',
						'label' => __( 'Auto Height?', 'mediaron-bb-modules' ),
						'options' => array(
							'no' => __( 'No', 'mediaron-bb-modules' ),
							'yes' => __( 'Yes', 'mediaron-bb-modules' ),
						),
						'default' => 'yes'
					),
				)
			)
		)
	),
	'testimonials'       => array( // Tab
		'title'         => __('Testimonials', 'mediaron-bb-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'testimonials'       => array( // Section
				'title'         => __('Testimonials', 'mediaron-bb-modules'), // Section Title
				'fields'        => array( // Section Fields
					'testimonial_entries' => array(
						'type'          => 'form',
						'form'          => 'mrbb_testimonials',
						'label'         => __( 'Testimonial', 'mediaron-bb-modules' ),
						'multiple'      => true,
						'preview_text'  => 'testimonial_name',
					)
				)
			)
		)
	),
	'appearance'       => array( // Tab
		'title'         => __('Appearance', 'mediaron-bb-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'rating'       => array( // Section
				'title'         => __('Rating', 'mediaron-bb-modules'), // Section Title
				'fields'        => array( // Section Fields
					'show_rating' => array(
						'type'  => 'select',
						'label' => __( 'Show Rating', 'mediaron-bb-modules' ),
						'options' => array(
							'no' => __( 'No', 'mediaron-bb-modules' ),
							'yes' => __( 'Yes', 'mediaron-bb-modules' )
						),
						'default' => 'yes',
						'toggle' => array(
							'yes' => array( 'fields' => array( 'rating_color', 'rating_size' ) )
						)
					),
					'rating_color' => array(
						'type' => 'color',
						'label' => __( 'Rating Color', 'mediaron-bb-modules' ),
						'default' => 'ff6d15'
					),
					'rating_size' => array(
						'type' => 'unit',
						'label' => __( 'Rating Size', 'mediaron-bb-modules' ),
						'description' => 'px',
						'default' => '20'
					),
				)
			),
			'icon' => array(
				'title' => __( 'Icon', 'mediaron-bb-modules' ),
				'fields' => array(
					'icon_size' => array(
						'type' => 'unit',
						'label' => __( 'Icon Size', 'mediaron-bb-modules' ),
						'default' => '30',
						'description' => 'px'
					),
					'icon_color' => array(
						'type' => 'color',
						'label' => __( 'Icon Color', 'mediaron-bb-modules' ),
						'default' => '000000',
					)
				)
			),
			'photo' => array(
				'title' => __( 'Photo', 'mediaron-bb-modules' ),
				'fields' => array(
					'photo_size' => array(
						'type' => 'unit',
						'label' => __( 'Photo Size', 'mediaron-bb-modules' ),
						'default' => '100',
						'description' => 'px'
					),
					'photo_appearance' => array(
						'type' => 'select',
						'label' => __( 'Photo Appearance', 'mediaron-bb-modules' ),
						'options' => array(
							'square' => __( 'Square', 'mediaron-bb-modules' ),
							'circle' => __( 'Circle', 'mediaron-bb-modules' ),
						)
					)
				)
			)
		)
	),
	'typography'       => array( // Tab
		'title'         => __('Typography', 'mediaron-bb-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'overlay'       => array( // Section
				'title'         => __('Typography', 'mediaron-bb-modules'), // Section Title
				'fields'        => array( // Section Fields
					'testimonial_name_typography' => array(
						'type'  => 'typography',
						'label' => __( 'Name Typography', 'mediaron-bb-modules' ),
						'responsive' => true
					),
					'testimonial_name_color' => array(
						'type'  => 'color',
						'label' => __( 'Name Color', 'mediaron-bb-modules' ),
						'default' => '000000'
					),
					'testimonial_name_padding' => array(
						'type'  => 'dimension',
						'label' => __( 'Name Padding', 'mediaron-bb-modules' ),
						'description' => 'px'
					),
					'testimonial_title_typography' => array(
						'type'  => 'typography',
						'label' => __( 'Title Typography', 'mediaron-bb-modules' ),
						'responsive' => true
					),
					'testimonial_title_color' => array(
						'type'  => 'color',
						'label' => __( 'Title Color', 'mediaron-bb-modules' ),
						'default' => '000000'
					),
					'testimonial_title_padding' => array(
						'type'  => 'dimension',
						'label' => __( 'Title Padding', 'mediaron-bb-modules' ),
						'description' => 'px'
					),
					'testimonial_content_typography' => array(
						'type'  => 'typography',
						'label' => __( 'Content Typography', 'mediaron-bb-modules' ),
						'responsive' => true
					),
					'testimonial_content_color' => array(
						'type'  => 'color',
						'label' => __( 'Content Color', 'mediaron-bb-modules' ),
						'default' => '000000'
					),
					'testimonial_content_padding' => array(
						'type'  => 'dimension',
						'label' => __( 'Content Padding', 'mediaron-bb-modules' ),
						'description' => 'px'
					),
				)
			)
		)
	)
) );
