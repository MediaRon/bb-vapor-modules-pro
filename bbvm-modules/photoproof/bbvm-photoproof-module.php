<?php
class MediaRon_Photoproof_Module extends FLBuilderModule {
	public function __construct()
	{
		parent::__construct(array(
			'name'            => __( 'Photoproof', 'mediaron-bb-modules' ),
			'description'     => __( 'Photoproof for Beaver Builder', 'mediaron-bb-modules' ),
			'category'        => __( 'External Plugins', 'mediaron-bb-modules' ),
			'group'           => __( 'MediaRon Modules', 'mediarion-bb-modules' ),
			'dir'             => MEDIARON_BEAVER_BUILDER_DIR . 'mediaron-modules/photoproof/',
			'url'             => MEDIARON_BEAVER_BUILDER_URL . 'mediaron-modules/photoproof/',
			'editor_export'   => true, // Defaults to true and can be omitted.
			'enabled'         => true, // Defaults to true and can be omitted.
			'partial_refresh' => true, // Defaults to false and can be omitted.
		));

	}
}
/**
 * Register the module and its form settings.
 */
$albums_array = array( '0' => __( 'Select an album', 'mediaron-bb-modules' ) );
$albums = get_posts( array(
	'post_type' => 'album',
	'post_status' => 'publish',
	'orderby' => 'title',
	'order' => 'ASC',
	'posts_per_page' => 100
) );
if( ! empty( $albums ) ) {
	foreach( $albums as $album ) {
		$albums_array[$album->ID] = $album->post_title;
	}
}
FLBuilder::register_module('MediaRon_Photoproof_Module', array(
	'general'       => array( // Tab
		'title'         => __('General', 'mediaron-bb-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'general'       => array( // Section
				'title'         => __('Album Select', 'mediaron-bb-modules'), // Section Title
				'fields'        => array( // Section Fields
					'album' => array(
						'type'          => 'select',
						'label'         => __( 'Select an album', 'mediaron-bb-modules' ),
						'options'       => $albums_array
					),
					'album_type' => array(
						'type'          => 'select',
						'label'         => __( 'Album Type', 'mediaron-bb-modules' ),
						'options'       => array(
							'slider'  => __( 'Slider', 'mediaron-bb-modules' ),
							'scroller' => __( 'Scroller', 'mediaron-bb-modules' ),
							'gallery' => __( 'Gallery', 'mediaron-bb-modules' ),
						),
						'default' => 'gallery',
						'toggle' => array(
							'slider' => array( 'fields' => array( 'slider_autoplay', 'slider_texts', 'slider_thumbs', 'slider_socials', 'slider_window_high', 'slider_ratio' ) ),
							'scroller' => array( 'fields' => array( 'scroller_autoplay', 'scroller_texts','scroller_socials', 'scroller_window_high', 'scroller_ratio', 'scroller_parallax', 'scroller_effect' ) ),
							'gallery' => array( 'fields' => array( 'gallery_texts', 'gallery_texts_hover', 'gallery_texts_position', 'gallery_socials',  'gallery_ratio', 'gallery_filter', 'gallery_lightbox', 'gallery_hover_effect', 'gallery_cover', 'gallery_cover_hover', 'gallery_cover_color',   'gallery_gradient', 'gallery_gradient_hover', 'gallery_columns', 'gallery_margin' ) )
						)
					),
					'slider_autoplay' => array(
						'type' => 'select',
						'label' => __( 'Slider Autoplay', 'mediaron-bb-modules' ),
						'options' => array(
							'0' => __( 'No', 'mediaron-bb-modules' ),
							'1' => __( 'Yes', 'mediarion-bb-modules' )
						),
						'default' => '0'
					),
					'slider_texts' => array(
						'type' => 'select',
						'label' => __( 'Show Slider Images and Descriptions', 'mediaron-bb-modules' ),
						'options' => array(
							'0' => __( 'No', 'mediaron-bb-modules' ),
							'1' => __( 'Yes', 'mediarion-bb-modules' )
						),
						'default' => '0'
					),
					'slider_thumbs' => array(
						'type' => 'select',
						'label' => __( 'Show Slider Thumbs', 'mediaron-bb-modules' ),
						'options' => array(
							'0' => __( 'No', 'mediaron-bb-modules' ),
							'1' => __( 'Yes', 'mediarion-bb-modules' )
						),
						'default' => '0'
					),
					'slider_social' => array(
						'type' => 'select',
						'label' => __( 'Show Slider Social', 'mediaron-bb-modules' ),
						'options' => array(
							'0' => __( 'No', 'mediaron-bb-modules' ),
							'1' => __( 'Yes', 'mediarion-bb-modules' )
						),
						'default' => '0'
					),
					'slider_window_high' => array(
						'type' => 'select',
						'label' => __( 'Slider Full Height Mode', 'mediaron-bb-modules' ),
						'options' => array(
							'0' => __( 'No', 'mediaron-bb-modules' ),
							'1' => __( 'Yes', 'mediarion-bb-modules' )
						),
						'default' => '0'
					),
					'slider_ratio' => array(
						'type' => 'text',
						'label' => __( 'Slider Radio', 'mediaron-bb-modules' ),
						'default' => '16/9'
					),
					'scroller_autoplay' => array(
						'type' => 'select',
						'label' => __( 'Scroller Autoplay', 'mediaron-bb-modules' ),
						'options' => array(
							'0' => __( 'No', 'mediaron-bb-modules' ),
							'1' => __( 'Yes', 'mediarion-bb-modules' )
						),
						'default' => '0'
					),
					'scroller_texts' => array(
						'type' => 'select',
						'label' => __( 'Show Slider Images and Descriptions', 'mediaron-bb-modules' ),
						'options' => array(
							'0' => __( 'No', 'mediaron-bb-modules' ),
							'1' => __( 'Yes', 'mediarion-bb-modules' )
						),
						'default' => '0'
					),
					'scroller_social' => array(
						'type' => 'select',
						'label' => __( 'Show Scroller Social', 'mediaron-bb-modules' ),
						'options' => array(
							'0' => __( 'No', 'mediaron-bb-modules' ),
							'1' => __( 'Yes', 'mediarion-bb-modules' )
						),
						'default' => '0'
					),
					'scroller_window_high' => array(
						'type' => 'select',
						'label' => __( 'Scroller Full Height Mode', 'mediaron-bb-modules' ),
						'options' => array(
							'0' => __( 'No', 'mediaron-bb-modules' ),
							'1' => __( 'Yes', 'mediarion-bb-modules' )
						),
						'default' => '0'
					),
					'scroller_ratio' => array(
						'type' => 'text',
						'label' => __( 'Scroller Radio', 'mediaron-bb-modules' ),
						'default' => '16/9'
					),
					'scroller_parallax' => array(
						'type' => 'select',
						'label' => __( 'Scroller Parallax', 'mediaron-bb-modules' ),
						'options' => array(
							'0' => __( 'No', 'mediaron-bb-modules' ),
							'1' => __( 'Yes', 'mediarion-bb-modules' )
						),
						'default' => '0'
					),
					'scroller_effect' => array(
						'type' => 'select',
						'label' => __( 'Scroller Parallax', 'mediaron-bb-modules' ),
						'options' => array(
							'off' => __( 'Off', 'mediaron-bb-modules' ),
							'opacity' => __( 'Opacity', 'mediarion-bb-modules' ),
							'scale-down' => __( 'Scale Down', 'mediarion-bb-modules' ),
							'grayscale' => __( 'Grayscale', 'mediarion-bb-modules' ),
							'blur' => __( 'Blur', 'mediarion-bb-modules' )
						),
						'default' => 'off'
					),
					'gallery_columns' => array(
						'type' => 'select',
						'label' => __( 'Columns for Gallery', 'mediaron-bb-modules' ),
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
					'gallery_margin' => array(
						'type' => 'unit',
						'default' => '5',
						'label' => __( 'Gallery Module', 'mediaron-bb-modules' ),
					),
					'gallery_texts' => array(
						'type' => 'select',
						'label' => __( 'Show Images and Descriptions', 'mediaron-bb-modules' ),
						'options' => array(
							'0' => __( 'No', 'mediaron-bb-modules' ),
							'1' => __( 'Yes', 'mediarion-bb-modules' )
						),
						'default' => '0'
					),
					'gallery_texts_hover' => array(
						'type' => 'select',
						'label' => __( 'Show title/description on hover', 'mediaron-bb-modules' ),
						'options' => array(
							'0' => __( 'No', 'mediaron-bb-modules' ),
							'1' => __( 'Yes', 'mediaron-bb-modules' ),
						),
						'default' => '0',
					),
					'gallery_texts_position' => array(
						'type' => 'select',
						'label' => __( 'Text position over image', 'mediaron-bb-modules' ),
						'options' => array(
							'top_left' => __( 'Top Left', 'mediaron-bb-modules' ),
							'top_center' => __( 'Top Center', 'mediaron-bb-modules' ),
							'top_right' => __( 'Top Right', 'mediaron-bb-modules' ),
							'mid_left' => __( 'Mid Left', 'mediaron-bb-modules' ),
							'mid_center' => __( 'Mid Center', 'mediaron-bb-modules' ),
							'mid_right' => __( 'Mid Right', 'mediaron-bb-modules' ),
							'bottom_left' => __( 'Bottom Left', 'mediaron-bb-modules' ),
							'bottom_center' => __( 'Bottom Center', 'mediaron-bb-modules' ),
							'bottom_right' => __( 'Bottom Right', 'mediaron-bb-modules' ),
						),
						'default' => 'bottom_center',
					),
					'gallery_filter' => array(
						'type' => 'select',
						'label' => __( 'Show Gallery Filter', 'mediaron-bb-modules' ),
						'options' => array(
							'0' => __( 'No', 'mediaron-bb-modules' ),
							'1' => __( 'Yes', 'mediaron-bb-modules' ),
						),
						'default' => '0',
					),
					'gallery_lightbox' => array(
						'type' => 'select',
						'label' => __( 'Open Image in Lightbox', 'mediaron-bb-modules' ),
						'options' => array(
							'0' => __( 'No', 'mediaron-bb-modules' ),
							'1' => __( 'Yes', 'mediaron-bb-modules' ),
						),
						'default' => '1',
					),
					'gallery_hover_effect' => array(
						'type' => 'select',
						'label' => __( 'Gallery Hover Effect', 'mediaron-bb-modules' ),
						'options' => array(
							'cross' => __( 'Cross', 'mediaron-bb-modules' ),
							'drop' => __( 'Drop', 'mediaron-bb-modules' ),
							'shift' => __( 'Shift', 'mediaron-bb-modules' ),
							'pop' => __( 'Pop', 'mediaron-bb-modules' ),
							'border' => __( 'Border', 'mediaron-bb-modules' ),
							'none' => __( 'None', 'mediaron-bb-modules' ),
						),
						'default' => 'drop',
					),
					'gallery_gradient' => array(
						'type' => 'select',
						'label' => __( 'Show Gradient Be Displayed Over Item', 'mediaron-bb-modules' ),
						'options' => array(
							'0' => __( 'No', 'mediaron-bb-modules' ),
							'1' => __( 'Yes', 'mediaron-bb-modules' ),
						),
						'default' => '0',
					),
					'gallery_gradient_hover' => array(
						'type' => 'select',
						'label' => __( 'Show Gradient Be Displayed Over Item on Hover', 'mediaron-bb-modules' ),
						'options' => array(
							'0' => __( 'No', 'mediaron-bb-modules' ),
							'1' => __( 'Yes', 'mediaron-bb-modules' ),
						),
						'default' => '0',
					),
					'gallery_cover' => array(
						'type' => 'select',
						'label' => __( 'Should Cover Be Displayed Over Item', 'mediaron-bb-modules' ),
						'options' => array(
							'0' => __( 'No', 'mediaron-bb-modules' ),
							'1' => __( 'Yes', 'mediaron-bb-modules' ),
						),
						'default' => '0',
					),
					'gallery_cover_hover' => array(
						'type' => 'select',
						'label' => __( 'Should Cover Be Displayed Over Item on Hover', 'mediaron-bb-modules' ),
						'options' => array(
							'0' => __( 'No', 'mediaron-bb-modules' ),
							'1' => __( 'Yes', 'mediaron-bb-modules' ),
						),
						'default' => '0',
					),
					'gallery_cover_color' => array(
						'type' => 'select',
						'label' => __( 'Show Cover Color', 'mediaron-bb-modules' ),
						'options' => array(
							'0' => __( 'No', 'mediaron-bb-modules' ),
							'1' => __( 'Yes', 'mediaron-bb-modules' ),
						),
						'default' => '0',
					),
					'gallery_socials' => array(
						'type' => 'select',
						'label' => __( 'Show Sharing Icons Be Displayed?', 'mediaron-bb-modules' ),
						'options' => array(
							'0' => __( 'No', 'mediaron-bb-modules' ),
							'1' => __( 'Yes', 'mediaron-bb-modules' ),
						),
						'default' => '0',
					),
					'gallery_ratio' => array(
						'type' => 'select',
						'label' => __( 'Gallery Radio', 'mediaron-bb-modules' ),
						'default' => '0',
						'options' => array(
							'1/1' => '1/1',
							'2/3' => '2/3',
							'3/2' => '3/2',
							'4/3' => '4/3',
							'9/16' => '9/16',
							'16/9' => '16/9'
						)
					),
				)
			)
		)
	),
) );
