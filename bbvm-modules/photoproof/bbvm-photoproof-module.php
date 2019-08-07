<?php // phpcs:ignore
class BBVapor_Photoproof_Module extends FLBuilderModule {
	/**
	 * Class Constructor.
	 */
	public function __construct() {
		parent::__construct(
			array(
				'name'            => __( 'Photoproof', 'bb-vapor-modules-pro' ),
				'description'     => __( 'Photoproof for Beaver Builder', 'bb-vapor-modules-pro' ),
				'category'        => __( 'External Plugins', 'bb-vapor-modules-pro' ),
				'group'           => apply_filters( 'bbvm_whitelabel_category', __( 'Vapor', 'bb-vapor-modules-pro' ) ),
				'dir'             => BBVAPOR_PRO_BEAVER_BUILDER_DIR . 'bbvm-modules/photoproof/',
				'url'             => BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/photoproof/',
				'editor_export'   => true, // Defaults to true and can be omitted.
				'enabled'         => true, // Defaults to true and can be omitted.
				'partial_refresh' => true, // Defaults to false and can be omitted.
			)
		);
	}
}
/**
 * Register the module and its form settings.
 */
$albums_array = array( '0' => __( 'Select an album', 'bb-vapor-modules-pro' ) );
$albums       = get_posts(
	array(
		'post_type'      => 'album',
		'post_status'    => 'publish',
		'orderby'        => 'title',
		'order'          => 'ASC',
		'posts_per_page' => 100,
	)
);
if ( ! empty( $albums ) ) {
	foreach ( $albums as $album ) {
		$albums_array[ $album->ID ] = $album->post_title;
	}
}
FLBuilder::register_module(
	'BBVapor_Photoproof_Module',
	array(
		'general' => array(
			'title'    => __( 'General', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'general' => array(
					'title'  => __( 'Album Select', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'album'                  => array(
							'type'    => 'select',
							'label'   => __( 'Select an album', 'bb-vapor-modules-pro' ),
							'options' => $albums_array,
						),
						'album_type'             => array(
							'type'    => 'select',
							'label'   => __( 'Album Type', 'bb-vapor-modules-pro' ),
							'options' => array(
								'slider'   => __( 'Slider', 'bb-vapor-modules-pro' ),
								'scroller' => __( 'Scroller', 'bb-vapor-modules-pro' ),
								'gallery'  => __( 'Gallery', 'bb-vapor-modules-pro' ),
							),
							'default' => 'gallery',
							'toggle'  => array(
								'slider'   => array(
									'fields' => array(
										'slider_autoplay',
										'slider_texts',
										'slider_thumbs',
										'slider_socials',
										'slider_window_high',
										'slider_ratio',
									),
								),
								'scroller' => array(
									'fields' => array(
										'scroller_autoplay',
										'scroller_texts',
										'scroller_socials',
										'scroller_window_high',
										'scroller_ratio',
										'scroller_parallax',
										'scroller_effect',
									),
								),
								'gallery'  => array(
									'fields' => array(
										'gallery_texts',
										'gallery_texts_hover',
										'gallery_texts_position',
										'gallery_socials',
										'gallery_ratio',
										'gallery_filter',
										'gallery_lightbox',
										'gallery_hover_effect',
										'gallery_cover',
										'gallery_cover_hover',
										'gallery_cover_color',
										'gallery_gradient',
										'gallery_gradient_hover',
										'gallery_columns',
										'gallery_margin',
									),
								),
							),
						),
						'slider_autoplay'        => array(
							'type'    => 'select',
							'label'   => __( 'Slider Autoplay', 'bb-vapor-modules-pro' ),
							'options' => array(
								'0' => __( 'No', 'bb-vapor-modules-pro' ),
								'1' => __( 'Yes', 'bb-vapor-modules-pro' ),
							),
							'default' => '0',
						),
						'slider_texts'           => array(
							'type'    => 'select',
							'label'   => __( 'Show Slider Images and Descriptions', 'bb-vapor-modules-pro' ),
							'options' => array(
								'0' => __( 'No', 'bb-vapor-modules-pro' ),
								'1' => __( 'Yes', 'bb-vapor-modules-pro' ),
							),
							'default' => '0',
						),
						'slider_thumbs'          => array(
							'type'    => 'select',
							'label'   => __( 'Show Slider Thumbs', 'bb-vapor-modules-pro' ),
							'options' => array(
								'0' => __( 'No', 'bb-vapor-modules-pro' ),
								'1' => __( 'Yes', 'bb-vapor-modules-pro' ),
							),
							'default' => '0',
						),
						'slider_social'          => array(
							'type'    => 'select',
							'label'   => __( 'Show Slider Social', 'bb-vapor-modules-pro' ),
							'options' => array(
								'0' => __( 'No', 'bb-vapor-modules-pro' ),
								'1' => __( 'Yes', 'bb-vapor-modules-pro' ),
							),
							'default' => '0',
						),
						'slider_window_high'     => array(
							'type'    => 'select',
							'label'   => __( 'Slider Full Height Mode', 'bb-vapor-modules-pro' ),
							'options' => array(
								'0' => __( 'No', 'bb-vapor-modules-pro' ),
								'1' => __( 'Yes', 'bb-vapor-modules-pro' ),
							),
							'default' => '0',
						),
						'slider_ratio'           => array(
							'type'    => 'text',
							'label'   => __( 'Slider Radio', 'bb-vapor-modules-pro' ),
							'default' => '16/9',
						),
						'scroller_autoplay'      => array(
							'type'    => 'select',
							'label'   => __( 'Scroller Autoplay', 'bb-vapor-modules-pro' ),
							'options' => array(
								'0' => __( 'No', 'bb-vapor-modules-pro' ),
								'1' => __( 'Yes', 'bb-vapor-modules-pro' ),
							),
							'default' => '0',
						),
						'scroller_texts'         => array(
							'type'    => 'select',
							'label'   => __( 'Show Slider Images and Descriptions', 'bb-vapor-modules-pro' ),
							'options' => array(
								'0' => __( 'No', 'bb-vapor-modules-pro' ),
								'1' => __( 'Yes', 'bb-vapor-modules-pro' ),
							),
							'default' => '0',
						),
						'scroller_social'        => array(
							'type'    => 'select',
							'label'   => __( 'Show Scroller Social', 'bb-vapor-modules-pro' ),
							'options' => array(
								'0' => __( 'No', 'bb-vapor-modules-pro' ),
								'1' => __( 'Yes', 'bb-vapor-modules-pro' ),
							),
							'default' => '0',
						),
						'scroller_window_high'   => array(
							'type'    => 'select',
							'label'   => __( 'Scroller Full Height Mode', 'bb-vapor-modules-pro' ),
							'options' => array(
								'0' => __( 'No', 'bb-vapor-modules-pro' ),
								'1' => __( 'Yes', 'bb-vapor-modules-pro' ),
							),
							'default' => '0',
						),
						'scroller_ratio'         => array(
							'type'    => 'text',
							'label'   => __( 'Scroller Radio', 'bb-vapor-modules-pro' ),
							'default' => '16/9',
						),
						'scroller_parallax'      => array(
							'type'    => 'select',
							'label'   => __( 'Scroller Parallax', 'bb-vapor-modules-pro' ),
							'options' => array(
								'0' => __( 'No', 'bb-vapor-modules-pro' ),
								'1' => __( 'Yes', 'bb-vapor-modules-pro' ),
							),
							'default' => '0',
						),
						'scroller_effect'        => array(
							'type'    => 'select',
							'label'   => __( 'Scroller Parallax', 'bb-vapor-modules-pro' ),
							'options' => array(
								'off'        => __( 'Off', 'bb-vapor-modules-pro' ),
								'opacity'    => __( 'Opacity', 'bb-vapor-modules-pro' ),
								'scale-down' => __( 'Scale Down', 'bb-vapor-modules-pro' ),
								'grayscale'  => __( 'Grayscale', 'bb-vapor-modules-pro' ),
								'blur'       => __( 'Blur', 'bb-vapor-modules-pro' ),
							),
							'default' => 'off',
						),
						'gallery_columns'        => array(
							'type'    => 'select',
							'label'   => __( 'Columns for Gallery', 'bb-vapor-modules-pro' ),
							'options' => array(
								'1' => '1',
								'2' => '2',
								'3' => '3',
								'4' => '4',
								'5' => '5',
								'6' => '6',
							),
							'default' => '3',
						),
						'gallery_margin'         => array(
							'type'    => 'unit',
							'default' => '5',
							'label'   => __( 'Gallery Module', 'bb-vapor-modules-pro' ),
						),
						'gallery_texts'          => array(
							'type'    => 'select',
							'label'   => __( 'Show Images and Descriptions', 'bb-vapor-modules-pro' ),
							'options' => array(
								'0' => __( 'No', 'bb-vapor-modules-pro' ),
								'1' => __( 'Yes', 'bb-vapor-modules-pro' ),
							),
							'default' => '0',
						),
						'gallery_texts_hover'    => array(
							'type'    => 'select',
							'label'   => __( 'Show title/description on hover', 'bb-vapor-modules-pro' ),
							'options' => array(
								'0' => __( 'No', 'bb-vapor-modules-pro' ),
								'1' => __( 'Yes', 'bb-vapor-modules-pro' ),
							),
							'default' => '0',
						),
						'gallery_texts_position' => array(
							'type'    => 'select',
							'label'   => __( 'Text position over image', 'bb-vapor-modules-pro' ),
							'options' => array(
								'top_left'      => __( 'Top Left', 'bb-vapor-modules-pro' ),
								'top_center'    => __( 'Top Center', 'bb-vapor-modules-pro' ),
								'top_right'     => __( 'Top Right', 'bb-vapor-modules-pro' ),
								'mid_left'      => __( 'Mid Left', 'bb-vapor-modules-pro' ),
								'mid_center'    => __( 'Mid Center', 'bb-vapor-modules-pro' ),
								'mid_right'     => __( 'Mid Right', 'bb-vapor-modules-pro' ),
								'bottom_left'   => __( 'Bottom Left', 'bb-vapor-modules-pro' ),
								'bottom_center' => __( 'Bottom Center', 'bb-vapor-modules-pro' ),
								'bottom_right'  => __( 'Bottom Right', 'bb-vapor-modules-pro' ),
							),
							'default' => 'bottom_center',
						),
						'gallery_filter'         => array(
							'type'    => 'select',
							'label'   => __( 'Show Gallery Filter', 'bb-vapor-modules-pro' ),
							'options' => array(
								'0' => __( 'No', 'bb-vapor-modules-pro' ),
								'1' => __( 'Yes', 'bb-vapor-modules-pro' ),
							),
							'default' => '0',
						),
						'gallery_lightbox'       => array(
							'type'    => 'select',
							'label'   => __( 'Open Image in Lightbox', 'bb-vapor-modules-pro' ),
							'options' => array(
								'0' => __( 'No', 'bb-vapor-modules-pro' ),
								'1' => __( 'Yes', 'bb-vapor-modules-pro' ),
							),
							'default' => '1',
						),
						'gallery_hover_effect'   => array(
							'type'    => 'select',
							'label'   => __( 'Gallery Hover Effect', 'bb-vapor-modules-pro' ),
							'options' => array(
								'cross'  => __( 'Cross', 'bb-vapor-modules-pro' ),
								'drop'   => __( 'Drop', 'bb-vapor-modules-pro' ),
								'shift'  => __( 'Shift', 'bb-vapor-modules-pro' ),
								'pop'    => __( 'Pop', 'bb-vapor-modules-pro' ),
								'border' => __( 'Border', 'bb-vapor-modules-pro' ),
								'none'   => __( 'None', 'bb-vapor-modules-pro' ),
							),
							'default' => 'drop',
						),
						'gallery_gradient'       => array(
							'type'    => 'select',
							'label'   => __( 'Show Gradient Be Displayed Over Item', 'bb-vapor-modules-pro' ),
							'options' => array(
								'0' => __( 'No', 'bb-vapor-modules-pro' ),
								'1' => __( 'Yes', 'bb-vapor-modules-pro' ),
							),
							'default' => '0',
						),
						'gallery_gradient_hover' => array(
							'type'    => 'select',
							'label'   => __( 'Show Gradient Be Displayed Over Item on Hover', 'bb-vapor-modules-pro' ),
							'options' => array(
								'0' => __( 'No', 'bb-vapor-modules-pro' ),
								'1' => __( 'Yes', 'bb-vapor-modules-pro' ),
							),
							'default' => '0',
						),
						'gallery_cover'          => array(
							'type'    => 'select',
							'label'   => __( 'Should Cover Be Displayed Over Item', 'bb-vapor-modules-pro' ),
							'options' => array(
								'0' => __( 'No', 'bb-vapor-modules-pro' ),
								'1' => __( 'Yes', 'bb-vapor-modules-pro' ),
							),
							'default' => '0',
						),
						'gallery_cover_hover'    => array(
							'type'    => 'select',
							'label'   => __( 'Should Cover Be Displayed Over Item on Hover', 'bb-vapor-modules-pro' ),
							'options' => array(
								'0' => __( 'No', 'bb-vapor-modules-pro' ),
								'1' => __( 'Yes', 'bb-vapor-modules-pro' ),
							),
							'default' => '0',
						),
						'gallery_cover_color'    => array(
							'type'    => 'select',
							'label'   => __( 'Show Cover Color', 'bb-vapor-modules-pro' ),
							'options' => array(
								'0' => __( 'No', 'bb-vapor-modules-pro' ),
								'1' => __( 'Yes', 'bb-vapor-modules-pro' ),
							),
							'default' => '0',
						),
						'gallery_socials'        => array(
							'type'    => 'select',
							'label'   => __( 'Show Sharing Icons Be Displayed?', 'bb-vapor-modules-pro' ),
							'options' => array(
								'0' => __( 'No', 'bb-vapor-modules-pro' ),
								'1' => __( 'Yes', 'bb-vapor-modules-pro' ),
							),
							'default' => '0',
						),
						'gallery_ratio'          => array(
							'type'    => 'select',
							'label'   => __( 'Gallery Radio', 'bb-vapor-modules-pro' ),
							'default' => '0',
							'options' => array(
								'1/1'  => '1/1',
								'2/3'  => '2/3',
								'3/2'  => '3/2',
								'4/3'  => '4/3',
								'9/16' => '9/16',
								'16/9' => '16/9',
							),
						),
					),
				),
			),
		),
	)
);
