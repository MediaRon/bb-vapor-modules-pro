<?php // phpcs:ignore
class BBVapor_PostSelect_Module extends FLBuilderModule {
	/**
	 * Class Constructor.
	 */
	public function __construct() {
		parent::__construct(
			array(
				'name'            => __( 'Post Select', 'bb-vapor-modules-pro' ),
				'description'     => __( 'Post Select for Beaver Builder', 'bb-vapor-modules-pro' ),
				'category'        => __( 'Base', 'bb-vapor-modules-pro' ),
				'group'           => apply_filters( 'bbvm_whitelabel_category', __( 'Vapor', 'bb-vapor-modules-pro' ) ),
				'dir'             => BBVAPOR_PRO_BEAVER_BUILDER_DIR . 'bbvm-modules/postselect/',
				'url'             => BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/postselect/',
				'editor_export'   => true, // Defaults to true and can be omitted.
				'enabled'         => true, // Defaults to true and can be omitted.
				'partial_refresh' => false, // Defaults to false and can be omitted.
			)
		);
	}

	/**
	 * Ensure backwards compatibility with old settings.
	 *
	 * @since 1.1.8
	 * @param object $settings A module settings object.
	 * @param object $helper A settings compatibility helper.
	 * @return object
	 */
	public function filter_settings( $settings, $helper ) {
		if ( ! isset( $settings->migrated ) ) {
			$settings->migrated         = true;
			$settings_name              = "tax_{$settings->post_type}_{$settings->taxonomy_select}";
			$settings->{$settings_name} = ( 0 !== filter_var( $settings->terms_select, FILTER_VALIDATE_INT ) ? $settings->terms_select : '' );
		}
		return $settings;
	}
}
// Get image sizes.
global $_wp_additional_image_sizes;
$bbvm_default_image_sizes = get_intermediate_image_sizes();
$bbvm_image_sizes         = array();

foreach ( $bbvm_default_image_sizes as $size ) {
	$bbvm_image_sizes[ $size ]['width']  = intval( get_option( "{$size}_size_w" ) );
	$bbvm_image_sizes[ $size ]['height'] = intval( get_option( "{$size}_size_h" ) );
	$bbvm_image_sizes[ $size ]['crop']   = get_option( "{$size}_crop" ) ? get_option( "{$size}_crop" ) : false;
}

if ( isset( $_wp_additional_image_sizes ) && count( $_wp_additional_image_sizes ) ) {
	$bbvm_image_sizes = array_merge( $bbvm_image_sizes, $_wp_additional_image_sizes );
}
$bbvm_thumbnail_sizes = array();
foreach ( $bbvm_image_sizes as $size => $image_size ) {
	$bbvm_thumbnail_sizes[ $size ] = $size;
}
FLBuilder::register_module(
	'BBVapor_PostSelect_Module',
	array(
		'post_select' => array(
			'title' => __( 'Post Select', 'bb-vapor-modules-pro' ),
			'file'  => FL_BUILDER_DIR . 'includes/loop-settings.php',
		),
		'options'     => array(
			'title'    => __( 'Options', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'general' => array(
					'title'  => __( 'Options', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'posts_per_page' => array(
							'type'    => 'unit',
							'label'   => __( 'Select Number of Items to Retrieve', 'bb-vapor-modules-pro' ),
							'default' => '6',
						),
						'post_display'   => array(
							'type'    => 'select',
							'label'   => __( 'Post Display', 'bb-vapor-modules-pro' ),
							'options' => array(
								'grid' => __( 'Grid', 'bb-vapor-modules-pro' ),
								'list' => __( 'List', 'bb-vapor-modules-pro' ),
							),
							'default' => 'grid',
						),
						'columns'        => array(
							'type'    => 'unit',
							'label'   => __( 'Select Number of Columns', 'bb-vapor-modules-pro' ),
							'default' => '4',
							'slider'  => array(
								'min'  => 1,
								'max'  => 6,
								'step' => 1,
							),
						),
						'item_padding'   => array(
							'type'       => 'dimension',
							'label'      => __( 'Select Padding For Post Items', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'orderby'        => array(
							'type'    => 'select',
							'label'   => __( 'Order By', 'bb-vapor-modules-pro' ),
							'options' => array(
								'DATEDESC'  => __( 'Newest to Oldest', 'bb-vapor-modules-pro' ),
								'DATEASC'   => __( 'Oldest to Newest', 'bb-vapor-modules-pro' ),
								'TITLEASC'  => __( 'A - Z', 'bb-vapor-modules-pro' ),
								'TITLEDESC' => __( 'Z-A', 'bb-vapor-modules-pro' ),
							),
							'default' => 'DATEASC',
						),
					),
				),
			),
		),
		'display'     => array(
			'title'    => __( 'Display', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'general' => array(
					'title'  => __( 'Display', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'display_taxonomies'       => array(
							'type'    => 'select',
							'label'   => __( 'Display Taxonomies?', 'bb-vapor-modules-pro' ),
							'options' => array(
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
							),
							'default' => 'yes',
						),
						'display_featured_image'   => array(
							'type'    => 'select',
							'label'   => __( 'Display Featured Image?', 'bb-vapor-modules-pro' ),
							'options' => array(
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
							),
							'default' => 'yes',
							'toggle'  => array(
								'yes' => array(
									'fields' => array(
										'featured_image_type',
										'featured_thumbnail_size',
										'featured_image_location',
									),
								),
							),
						),
						'featured_image_type'      => array(
							'type'    => 'select',
							'label'   => __( 'Featured Image Type', 'bb-vapor-modules-pro' ),
							'options' => array(
								'featured' => __( 'Featured Image', 'bb-vapor-modules-pro' ),
								'gravatar' => __( 'Gravatar', 'bb-vapor-modules-pro' ),
							),
							'default' => 'featured',
							'toggle'  => array(
								'gravatar' => array( 'fields' => array( 'gravatar_size' ) ),
							),
						),
						'gravatar_size'            => array(
							'type'    => 'unit',
							'label'   => __( 'Gravatar Size', 'bb-vapor-modules-pro' ),
							'default' => '150',
							'slider'  => array(
								'min'  => 100,
								'max'  => 1000,
								'step' => 50,
							),
						),
						'featured_thumbnail_size'  => array(
							'type'    => 'select',
							'label'   => __( 'Thumbnail Size', 'bb-vapor-modules-pro' ),
							'options' => $bbvm_thumbnail_sizes,
						),
						'featured_image_location'  => array(
							'type'    => 'select',
							'label'   => __( 'Featured Image Location', 'bb-vapor-modules-pro' ),
							'options' => array(
								'regular'          => __( 'Regular Placement', 'bb-vapor-modules-pro' ),
								'below_title'      => __( 'Below Title', 'bb-vapor-modules-pro' ),
								'below_title_meta' => __( 'Below Title and Post Meta', 'bb-vapor-modules-pro' ),
								'bottom'           => __( 'Bottom', 'bb-vapor-modules-pro' ),
							),
							'default' => 'regular',
						),
						'display_post_author'      => array(
							'type'    => 'select',
							'label'   => __( 'Display Post Author?', 'bb-vapor-modules-pro' ),
							'options' => array(
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
							),
							'default' => 'yes',
						),
						'display_post_date'        => array(
							'type'    => 'select',
							'label'   => __( 'Display Post Date?', 'bb-vapor-modules-pro' ),
							'options' => array(
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
							),
							'default' => 'yes',
						),
						'display_post_excerpt'     => array(
							'type'    => 'select',
							'label'   => __( 'Display Post Excerpt?', 'bb-vapor-modules-pro' ),
							'options' => array(
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
							),
							'default' => 'yes',
						),
						'display_pagination'       => array(
							'type'    => 'select',
							'label'   => __( 'Display Pagination?', 'bb-vapor-modules-pro' ),
							'options' => array(
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
							),
							'default' => 'no',
						),
						'change_capitalization'    => array(
							'type'    => 'select',
							'label'   => __( 'Change Capitalization?', 'bb-vapor-modules-pro' ),
							'options' => array(
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
							),
							'default' => 'no',
						),
						'center_text'              => array(
							'type'    => 'select',
							'label'   => __( 'Center Text?', 'bb-vapor-modules-pro' ),
							'options' => array(
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
							),
							'default' => 'no',
						),
						'display_continue_reading' => array(
							'type'    => 'select',
							'label'   => __( 'Display Continue Reading Link?', 'bb-vapor-modules-pro' ),
							'options' => array(
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
							),
							'default' => 'yes',
							'toggle'  => array(
								'yes' => array( 'fields' => array( 'continue_reading' ) ),
							),
						),
						'continue_reading'         => array(
							'type'    => 'text',
							'label'   => __( 'Continue Reading Text', 'bb-vapor-modules-pro' ),
							'default' => 'Continue Reading',
						),
					),
				),
			),
		),
		'color'       => array(
			'title'    => __( 'Color and Typography', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'general' => array(
					'title'  => __( 'Color and Typography', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'heading_typography'  => array(
							'type'       => 'typography',
							'label'      => __( 'Heading Typography', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'meta_typography'     => array(
							'type'       => 'typography',
							'label'      => __( 'Meta Typography', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'excerpt_typography'  => array(
							'type'       => 'typography',
							'label'      => __( 'Excerpt Typography', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'readmore_typography' => array(
							'type'       => 'typography',
							'label'      => __( 'Read More Typography', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'background_color'    => array(
							'type'    => 'color',
							'label'   => __( 'Background Color', 'bb-vapor-modules-pro' ),
							'default' => 'FFFFFF',
						),
						'text_color'          => array(
							'type'    => 'color',
							'label'   => __( 'Text Color', 'bb-vapor-modules-pro' ),
							'default' => '000000',
						),
						'link_color'          => array(
							'type'    => 'color',
							'label'   => __( 'Link Color', 'bb-vapor-modules-pro' ),
							'default' => '000000',
						),
						'link_color_hover'    => array(
							'type'    => 'color',
							'label'   => __( 'Link Color Hover', 'bb-vapor-modules-pro' ),
							'default' => '000000',
						),
					),
				),
			),
		),
		'pagination'  => array(
			'title'    => __( 'Pagination', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'general' => array(
					'title'  => __( 'Pagination', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'pagination_padding'           => array(
							'type'       => 'dimension',
							'label'      => __( 'Select Padding for Pagination', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'pagination_border_color'      => array(
							'type'    => 'color',
							'label'   => __( 'Pagination Border Color', 'bb-vapor-modules-pro' ),
							'default' => 'EEEEEE',
						),
						'pagination_background'        => array(
							'type'    => 'color',
							'label'   => __( 'Pagination Item Background', 'bb-vapor-modules-pro' ),
							'default' => 'FFFFFF',
						),
						'pagination_background_active' => array(
							'type'    => 'color',
							'label'   => __( 'Pagination Active Item Background', 'bb-vapor-modules-pro' ),
							'default' => 'FFFFFF',
						),
						'pagination_background_hover'  => array(
							'type'    => 'color',
							'label'   => __( 'Pagination Item Hover Background', 'bb-vapor-modules-pro' ),
							'default' => 'FFFFFF',
						),
						'pagination_active_color'      => array(
							'type'    => 'color',
							'label'   => __( 'Pagination Active Text Color', 'bb-vapor-modules-pro' ),
							'default' => '000000',
						),
						'pagination_link_color'        => array(
							'type'    => 'color',
							'label'   => __( 'Pagination Link Color', 'bb-vapor-modules-pro' ),
							'default' => 'FFFFFF',
						),
						'pagination_link_color_hover'  => array(
							'type'    => 'color',
							'label'   => __( 'Pagination Link Color Hover', 'bb-vapor-modules-pro' ),
							'default' => 'FFFFFF',
						),
					),
				),
			),
		),
	)
);
