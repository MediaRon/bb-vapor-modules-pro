<?php // phpcs:ignore
class BBVapor_TomTom extends FLBuilderModule {
	/**
	 * Class Constructor.
	 */
	public function __construct() {
		parent::__construct(
			array(
				'name'            => __( 'TomTom Map', 'bb-vapor-modules-pro' ),
				'description'     => __( 'TomTom Map', 'bb-vapor-modules-pro' ),
				'category'        => __( 'Base', 'bb-vapor-modules-pro' ),
				'group'           => apply_filters( 'bbvm_whitelabel_category', __( 'Vapor', 'bb-vapor-modules-pro' ) ),
				'dir'             => BBVAPOR_PRO_BEAVER_BUILDER_DIR . 'bbvm-modules/tomtom/',
				'url'             => BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/tomtom/',
				'editor_export'   => true, // Defaults to true and can be omitted.
				'enabled'         => true, // Defaults to true and can be omitted.
				'partial_refresh' => false, // Defaults to false and can be omitted.
			)
		);
		$tomtom_api_key = get_option( 'bbvm_tomtom', '' );
		if ( ! empty( $tomtom_api_key ) ) {
			$this->add_js(
				'bbvm-tom-tom',
				BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/tomtom/tomtom-sdk/maps-web.min.js',
				array( 'jquery' ),
				'5.0.0',
				false
			);
			$this->add_css(
				'bbvm-tom-tom',
				BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/tomtom/tomtom-sdk/maps.css',
				array(),
				'5.0.0',
				'all'
			);
		}
	}
}
$tomtom_api_key = get_option( 'bbvm_tomtom', '' );
$notice         = '';
if ( empty( $tomtom_api_key ) ) {
	$notice = sprintf( /* translators: %s is the Admin URL to TomTom API Key entry */
		__( '<strong>A TomTom API Key is necessary to show the TomTom Map. Enter your API Key in the <a href="%s" target="_blank" rel="noopener">TomTom Settings</a>.</strong>', 'bb-vapor-modules-pro' ),
		esc_url( admin_url( 'options-general.php?page=bb-vapor-modules-pro&tab=tab-tomtom' ) )
	);
}
FLBuilder::register_settings_form(
	'bbvm_tomtom_markers',
	array(
		'title' => __( 'Add Marker', 'bb-vapor-modules-pro' ),
		'tabs'  => array(
			'general' => array(
				'title'    => __( 'Marker', 'bb-vapor-modules-pro' ),
				'sections' => array(
					'general' => array(
						'title'  => __( 'Enter a Marker', 'bb-vapor-modules-pro' ),
						'fields' => array(
							'marker_name'     => array(
								'type'  => 'text',
								'label' => __( 'Marker Name', 'bb-vapor-modules-pro' ),
							),
							'latitude'        => array(
								'type'  => 'text',
								'label' => __( 'Latitude', 'bb-vapor-modules-pro' ),
							),
							'longitude'       => array(
								'type'  => 'text',
								'label' => __( 'Longitude', 'bb-vapor-modules-pro' ),
							),
							'marker_icon'     => array(
								'type'        => 'photo',
								'label'       => __( 'Marker Icon', 'bb-vapor-modules-pro' ),
								'show_remove' => true,
								'description' => __( 'Square images are recommended', 'bb-vapor-modules-pro' ),
							),
							'marker_category' => array(
								'type'        => 'text',
								'label'       => __( 'Marker Category', 'bb-vapor-modules-pro' ),
								'description' => __( 'The category that will be displayed if sidebar is true.', 'bb-vapor-modules-pro' ),
							),
							'show_info'       => array(
								'type'    => 'select',
								'label'   => __( 'Show Info Window', 'bb-vapor-modules-pro' ),
								'options' => array(
									'no'  => __( 'No', 'bb-vapor-modules-pro' ),
									'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
								),
								'default' => 'yes',
								'toggle'  => array(
									'yes' => array(
										'tabs' => array(
											'info',
										),
									),
								),
							),
						),
					),
				),
			),
			'info'    => array(
				'title'    => __( 'Info Window', 'bb-vapor-modules-pro' ),
				'sections' => array(
					'general' => array(
						'title'  => __( 'Marker Information', 'bb-vapor-modules-pro' ),
						'fields' => array(
							'location_name' => array(
								'type'  => 'text',
								'label' => __( 'Location Name', 'bb-vapor-modules-pro' ),
							),
							'location'      => array(
								'type'  => 'textarea',
								'label' => __( 'Location', 'bb-vapor-modules-pro' ),
							),
							'phone'         => array(
								'type'  => 'text',
								'label' => __( 'Phone Number', 'bb-vapor-modules-pro' ),
							),
							'show_link'     => array(
								'type'    => 'select',
								'label'   => __( 'Show Link?', 'bb-vapor-modules-pro' ),
								'options' => array(
									'no'  => __( 'No', 'bb-vapor-modules-pro' ),
									'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
								),
								'toggle'  => array(
									'yes' => array(
										'fields' => array(
											'link_text',
											'link_url',
										),
									),
								),
							),
							'link_text'     => array(
								'type'  => 'text',
								'label' => __( 'Link Text', 'bb-vapor-modules-pro' ),
							),
							'link_url'      => array(
								'type'          => 'link',
								'label'         => __( 'URL', 'bb-vapor-modules-pro' ),
								'show_target'   => true,
								'show_nofollow' => true,
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
	'BBVapor_TomTom',
	array(
		'markers'    => array(
			'title'       => __( 'Markers', 'bb-vapor-modules-pro' ),
			'description' => $notice,
			'sections'    => array(
				'markers' => array(
					'title'  => __( 'Markers', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'markers' => array(
							'type'         => 'form',
							'label'        => __( 'Marker', 'bb-vapor-modules-pro' ),
							'form'         => 'bbvm_tomtom_markers',
							'multiple'     => true,
							'preview_text' => 'marker_name',
						),
						'sidebar' => array(
							'type'    => 'select',
							'label'   => __( 'Enable Sidebar?', 'bb-vapor-modules-pro' ),
							'options' => array(
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
							),
							'default' => 'no',
						),
					),
				),
			),
		),
		'options'    => array(
			'title'    => __( 'Options', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'map'      => array(
					'title'  => __( 'Map Options', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'width'  => array(
							'type'         => 'unit',
							'label'        => __( 'Width', 'bb-vapor-modules-pro' ),
							'units'        => array( 'px', 'vw', '%' ),
							'default_unit' => '%',
							'default'      => 100,
							'preview'      => array(
								'type'     => 'css',
								'property' => 'width',
								'selector' => '.bbvm-map',
							),
						),
						'height' => array(
							'type'    => 'unit',
							'label'   => __( 'Height', 'bb-vapor-modules-pro' ),
							'default' => 500,
						),
					),
				),
				'center'   => array(
					'title'  => __( 'Center View', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'latitude'   => array(
							'type'    => 'text',
							'label'   => __( 'Latitude', 'bb-vapor-modules-pro' ),
							'default' => '-96.5681667',
						),
						'longitude'  => array(
							'type'    => 'text',
							'label'   => __( 'Longitude', 'bb-vapor-modules-pro' ),
							'default' => '41.1963831',
						),
						'zoom_level' => array(
							'type'    => 'unit',
							'label'   => __( 'Zoom Level', 'bb-vapor-modules-pro' ),
							'slider'  => array(
								'min'  => 1,
								'max'  => 20,
								'step' => 1,
							),
							'default' => 3,
						),
					),
				),
				'controls' => array(
					'title'  => __( 'Controls', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'pan_zoom'             => array(
							'type'    => 'select',
							'label'   => __( 'Allow Pan and Zoom?', 'bb-vapor-modules-pro' ),
							'options' => array(
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
							),
							'default' => 'yes',
							'toggle'  => array(
								'yes' => array(
									'fields' => array(
										'pan_zoom_location',
									),
								),
							),
						),
						'pan_zoom_location'    => array(
							'type'    => 'select',
							'label'   => __( 'Pan and Zoom Location', 'bb-vapor-modules-pro' ),
							'options' => array(
								'top-right'    => __( 'Top Right', 'bb-vapor-modules-pro' ),
								'top-left'     => __( 'Top Left', 'bb-vapor-modules-pro' ),
								'bottom-left'  => __( 'Bottom Left', 'bb-vapor-modules-pro' ),
								'bottom-right' => __( 'Bottom Right', 'bb-vapor-modules-pro' ),
							),
							'default' => 'top-right',
						),
						'fullscreen'           => array(
							'type'    => 'select',
							'label'   => __( 'Allow Fullscreen?', 'bb-vapor-modules-pro' ),
							'options' => array(
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
							),
							'default' => 'yes',
							'toggle'  => array(
								'yes' => array(
									'fields' => array(
										'fullscreen_location',
									),
								),
							),
						),
						'fullscreen_location'  => array(
							'type'    => 'select',
							'label'   => __( 'Full Screen Location', 'bb-vapor-modules-pro' ),
							'options' => array(
								'top-right'    => __( 'Top Right', 'bb-vapor-modules-pro' ),
								'top-left'     => __( 'Top Left', 'bb-vapor-modules-pro' ),
								'bottom-left'  => __( 'Bottom Left', 'bb-vapor-modules-pro' ),
								'bottom-right' => __( 'Bottom Right', 'bb-vapor-modules-pro' ),
							),
							'default' => 'top-right',
						),
						'geolocation'          => array(
							'type'    => 'select',
							'label'   => __( 'Allow Geolocation?', 'bb-vapor-modules-pro' ),
							'options' => array(
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
							),
							'default' => 'yes',
							'toggle'  => array(
								'yes' => array(
									'fields' => array(
										'geolocation_location',
									),
								),
							),
						),
						'geolocation_location' => array(
							'type'    => 'select',
							'label'   => __( 'Geolocation Location', 'bb-vapor-modules-pro' ),
							'options' => array(
								'top-right'    => __( 'Top Right', 'bb-vapor-modules-pro' ),
								'top-left'     => __( 'Top Left', 'bb-vapor-modules-pro' ),
								'bottom-left'  => __( 'Bottom Left', 'bb-vapor-modules-pro' ),
								'bottom-right' => __( 'Bottom Right', 'bb-vapor-modules-pro' ),
							),
							'default' => 'top-right',
						),
					),
				),
			),
		),
		'appearance' => array(
			'title'       => __( 'Appearance', 'bb-vapor-modules-pro' ),
			'description' => sprintf( /* translators: %s is the URL to the TomTom map styler */
				__( '<strong>To use a custom map style, select custom and <a href="%s" target="_blank" rel="noopener">build out your layout</a>.</strong>', 'bb-vapor-modules-pro' ),
				'https://developer.tomtom.com/maps-api/map-styler'
			),
			'sections'    => array(
				'styles' => array(
					'title'  => __( 'Appearance', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'map_style'    => array(
							'type'    => 'select',
							'label'   => __( 'Map Style', 'bb-vapor-modules-pro' ),
							'options' => array(
								'tomtom://vector/1/basic-main' => __( 'Basic Main', 'bb-vapor-modules-pro' ),
								'tomtom://vector/1/basic-night' => __( 'Basic Night', 'bb-vapor-modules-pro' ),
								'tomtom://vector/1/hybrid-main' => __( 'Hybrid Main', 'bb-vapor-modules-pro' ),
								'tomtom://vector/1/hybrid-night' => __( 'Hybrid Night', 'bb-vapor-modules-pro' ),
								'tomtom://vector/1/labels-main' => __( 'Labels Main', 'bb-vapor-modules-pro' ),
								'tomtom://vector/1/labels-night' => __( 'Labels Night', 'bb-vapor-modules-pro' ),
								'tomtom://vector/1/basic-light' => __( 'Basic Light', 'bb-vapor-modules-pro' ),
								'custom' => __( 'Custom', 'bb-vapor-modules-pro' ),
							),
							'default' => 'tomtom://vector/1/basic-main',
							'toggle'  => array(
								'custom' => array(
									'fields' => array(
										'map_json',
										'map_json_raw',
									),
								),
							),
							'default' => 'day',
						),
						'map_json'     => array(
							'type'    => 'raw',
							'content' => '<a target="_blank" href="https://developer.tomtom.com/maps-api/map-styler">Map Styler Documentation</a>',
						),
						'map_json_raw' => array(
							'type'          => 'editor',
							'label'         => __( 'Raw JSON Input', 'bb-vapor-modules-pro' ),
							'rows'          => 30,
							'media_buttons' => false,
							'connections'   => array( 'string', 'html' ),
						),
					),
				),
			),
		),
	)
);
