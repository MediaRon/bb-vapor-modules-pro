<?php
class BBVapor_Featured_Category_Module extends FLBuilderModule {
	public function __construct()
	{
		parent::__construct(array(
			'name'            => __( 'Featured Category', 'bb-vapor-modules-pro' ),
			'description'     => __( 'Featured Category', 'bb-vapor-modules-pro' ),
			'category'        => __( 'Base', 'bb-vapor-modules-pro' ),
			'group'           => __( 'Vapor', 'bb-vapor-modules-pro' ),
			'dir'             => BBVAPOR_PRO_BEAVER_BUILDER_DIR . 'bbvm-modules/featured-category/',
			'url'             => BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/featured-category/',
			'editor_export'   => true, // Defaults to true and can be omitted.
			'enabled'         => true, // Defaults to true and can be omitted.
			'partial_refresh' => true, // Defaults to false and can be omitted.
		));

		add_action( 'wp_ajax_bbvm_featured_bb_get_taxonomies', array( $this, 'get_taxonomies' ) );
		add_action( 'wp_ajax_bbvm_featured_bb_get_terms', array( $this, 'get_terms' ) );
		add_action( 'wp_ajax_bbvm_featured_bb_get_data', array( $this, 'get_ajax_data' ) );
	}

	public function get_taxonomies() {
		$post_type = $_POST['post_type'];
		$taxonomies = get_object_taxonomies( $post_type, 'objects' );
		$selected_taxonomy = $_POST['selected_taxonomy'];
		$return_html = sprintf( '<option value="0">%s</option>', esc_html__( 'All Taxonomies', 'bb-vapor-modules-pro' ) );
		foreach( $taxonomies as $taxonomy ) {
			$return_html .= sprintf( '<option value="%s" %s>%s</option>', esc_attr( $taxonomy->name ), selected( $taxnonomy->name, $selected_taxonomy, false ), esc_html( $taxonomy->label ) );
		}
		die( $return_html );
	}

	public function get_terms() {
		$taxonomy = $_POST['taxonomy'];
		$post_type = $_POST['post_type'];
		add_filter( 'terms_clauses', 'bbvm_bb_terms_clauses', 10, 3 );
		$terms = get_terms( array(
			'taxonomy' => $taxonomy,
			'hide_empty' => true,
			'post_type' => $post_type,
		) );
		remove_filter( 'terms_clauses', 'bbvm_bb_terms_clauses', 10, 3 );
		$return_html = sprintf( '<option value="0">%s</option>', esc_html__( 'All Terms', 'bb-vapor-modules-pro' ) );
		if( is_wp_error( $terms ) ) {
			die( $return_html );
		} else {
			foreach( $terms as $term ) {
				$return_html .= sprintf( '<option value="%d">%s</option>', $term->term_id, $term->name );
			}
			die( $return_html );
		}
	}

	public function get_ajax_data() {

		$selected_post = sanitize_text_field( $_POST['post_type'] );
		$selected_taxonomy = !empty( $_POST['taxonomy'] ) ? sanitize_text_field( $_POST['taxonomy'] ) : '0';
		$selected_term = !empty( $_POST['term'] ) ? sanitize_text_field( $_POST['term'] ) : '0';

		$bbvm_post_types = get_post_types( array( 'public' => true, 'show_ui' => true ), 'objects' );
		$oost_html = sprintf( '<option value="0">%s</option>', esc_html__( 'Select a Post Type', 'bb-vapor-modules-pro' ) );
		foreach( $bbvm_post_types as $post_type ) {
			if( 'attachment' == $post_type->name || 'fl-builder-template' == $post_type->name ) continue;
			$oost_html .= sprintf( '<option value="%s">%s</option>', esc_attr( $post_type->name ), esc_html( $post_type->label ) );
		}
		$tax_html = sprintf( '<option value="0">%s</option>', esc_html__( 'All Taxonomies', 'bb-vapor-modules-pro' ) );
		$bbvm_taxonomies = get_object_taxonomies( $selected_post, 'objects' );
		foreach( $bbvm_taxonomies as $taxonomy ) {
			$tax_html .= sprintf( '<option value="%s">%s</option>', esc_attr( $taxonomy->name ), esc_html( $taxonomy->label ) );
		}
		$term_html = sprintf( '<option value="0">%s</option>', esc_html__( 'All Terms', 'bb-vapor-modules-pro' ) );
		add_filter( 'terms_clauses', 'bbvm_bb_terms_clauses', 10, 3 );
		$bbvm_terms = get_terms( array(
			'taxonomy' => $selected_taxonomy,
			'hide_empty' => true,
			'post_type' => $selected_post,
		) );
		remove_filter( 'terms_clauses', 'bbvm_bb_terms_clauses', 10, 3 );
		if( ! is_wp_error( $bbvm_terms ) ) {
			foreach( $bbvm_terms as $term ) {
				$term_html .= sprintf( '<option value="%d">%s</option>', $term->term_id, $term->name );
			}
		}
		$return = array(
			'post_types' => $oost_html,
			'taxonomies' => $tax_html,
			'terms' => $term_html,
			'taxonomy' => $selected_taxonomy,
			'term' => $selected_term
		);
		wp_send_json( $return );
	}
}

// Get Post Types
$bbvm_post_types = get_post_types( array( 'public' => true, 'show_ui' => true ), 'objects' );
$bbvm_post_types_array = array( '0' => __( 'Select a Post Type', 'bb-vapor-modules-pro' ) );
foreach( $bbvm_post_types as $post_type ) {
	if( 'attachment' == $post_type->name || 'fl-builder-template' == $post_type->name ) continue;
	$bbvm_post_types_array[$post_type->name] = $post_type->label;
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('BBVapor_Featured_Category_Module', array(
	'general'       => array( // Tab
		'title'         => __('General', 'bb-vapor-modules-pro'), // Tab title
		'sections'      => array( // Tab Sections
			'general'       => array( // Section
				'title'         => __('Featured Category', 'bb-vapor-modules-pro'), // Section Title
				'fields'        => array( // Section Fields
					'post_type' => array(
						'type'          => 'select',
						'label'         => __( 'Select A Post Type', 'bb-vapor-modules-pro' ),
						'options'       => $bbvm_post_types_array,
						'class' => 'bbvm-post-select'
					),
					'taxonomy_select' => array(
						'type'          => 'select',
						'label'         => __( 'Select A Taxonomy', 'bb-vapor-modules-pro' ),
						'options'       => array(),
						'class' => 'bbvm-taxonomy-select',
						'default' => '0',
					),
					'terms_select' => array(
						'type'          => 'select',
						'label'         => __( 'Select A Term', 'bb-vapor-modules-pro' ),
						'options'       => array(),
						'class' => 'bbvm-term-select',
						'default' => '0'
					),
					'category_title' => array(
						'type' => 'text',
						'label' => __( 'Category Name', 'bb-vapor-modules-pro' ),
						'help' => __( 'Leave blank to use the default category name', 'bb-vapor-modules-pro' ),
						'default' => ''
					),
					'category_width' => array(
						'type' => 'unit',
						'label' => __( 'Category Title Max Width', 'bb-vapor-modules-pro' ),
						'help' => __( 'The maximum width of the category text. Default is 70%.', 'bb-vapor-modules-pro' ),
						'default' => '70',
						'responsive' => true,
						'description' => '%',
					),
					'category_title_padding' => array(
						'type' => 'dimension',
						'label' => __( 'Category Title Padding', 'bb-vapor-modules-pro' ),
						'responsive' => true,
					),
					'min_height' => array(
						'type'          => 'unit',
						'label'         => __( 'Item Height', 'bb-vapor-modules-pro' ),
						'default'       => '400',
						'responsive'    => true,
						'description'   => 'px',
					),
					'inner_margin' => array(
						'type' => 'dimension',
						'label' => __( 'Inner Margin', 'bb-vapor-modules-pro' ),
						'description' => __( 'Recommended margin is 20', 'bb-vapor-modules-pro' ),
						'responsive' => true
					),
					'link_category' => array(
						'type'          => 'select',
						'label'         => __( 'Link Entire Container to Category', 'bb-vapor-modules-pro' ),
						'options' => array(
							'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
							'no' => __( 'No', 'bb-vapor-modules-pro' ),
						),
						'default' => 'no',
					),
					'category_text_color' => array(
						'type' => 'color',
						'label' => __( 'Category Color', 'bb-vapor-modules-pro' ),
						'default' => '000000'
					),
					'category_typography' => array(
						'type' => 'typography',
						'label' => __( 'Category Typography', 'bb-vapor-modules-pro' ),
						'responsive' => true
					),
					'border_style' => array(
						'type'          => 'select',
						'label'         => __( 'Select Style', 'bb-vapor-modules-pro' ),
						'options' => array(
							'inner_border' => __( 'Inner Border', 'bb-vapor-modules-pro' ),
							'no_border' => __( 'No Border', 'bb-vapor-modules-pro' ),
						),
						'default' => 'no_border',
						'toggle' => array( 'inner_border' => array( 'fields' => array( 'border_width', 'border_color', 'border_color_hover' ) ) )
					),
					'border_width' => array(
						'type' => 'unit',
						'label' => __( 'Border Width', 'bb-vapor-modules-pro' ),
						'description' => 'px',
						'default' => '2'
					),
					'border_color' => array(
						'type'          => 'color',
						'label'         => __( 'Border Color', 'bb-vapor-modules-pro' ),
						'default'       => '000000',
					),
					'border_color_hover' => array(
						'type'          => 'color',
						'label'         => __( 'Border Hover Color', 'bb-vapor-modules-pro' ),
						'default'       => '333333',
					),
					'category_padding' => array(
						'type'          => 'dimension',
						'label'         => __( 'Category Padding', 'bb-vapor-modules-pro' ),
						'responsive'    => true,
					),
					'show_button' => array(
						'type' => 'select',
						'label' => __( 'Show Button', 'bb-vapor-modules-pro' ),
						'options' => array(
							'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
							'no' => __( 'No', 'bb-vapor-modules-pro' )
						),
						'default' => 'no',
						'toggle' => array(
							'yes' => array( 'tabs' => array( 'button' ) )
						)
					)
				)
			)
		)
	),
	'photo'       => array( // Tab
		'title'         => __('Background Photo', 'bb-vapor-modules-pro'), // Tab title
		'sections'      => array( // Tab Sections
			'photo'       => array( // Section
				'title'         => __('Background Photo', 'bb-vapor-modules-pro'), // Section Title
				'fields'        => array( // Section Fields
					'background_photo' => array(
						'type' => 'photo',
						'label' => __( 'Background Photo', 'bb-vapor-modules-pro' ),
						'show_remove'   => false,
					),
					'background_overlay' => array(
						'type'          => 'color',
						'label'         => __( 'Background Overlay', 'bb-vapor-modules-pro' ),
						'default'       => 'rgba(0,0,0,0.5)',
						'show_reset' => true,
						'show_alpha' => true,

					),
					'background_overlay_hover' => array(
						'type'          => 'color',
						'label'         => __( 'Background Overlay Hover', 'bb-vapor-modules-pro' ),
						'default'       => 'rgba(0,0,0,0.3)',
						'show_reset' => true,
						'show_alpha' => true,

					),
				)
			)
		)
	),
	'button'       => array( // Tab
		'title'         => __('Button', 'bb-vapor-modules-pro'), // Tab title
		'sections'      => array( // Tab Sections
			'button'       => array( // Section
				'title'         => __('Button', 'bb-vapor-modules-pro'), // Section Title
				'fields'        => array( // Section Fields
					'button_text' => array(
						'type' => 'text',
						'label' => __( 'Button Text', 'bb-vapor-modules-pro' ),
						'default' => __( 'View', 'bb-vapor-modules-pro' ),
					),
					'button_background' => array(
						'type' => 'color',
						'label' => __( 'Button Background', 'bb-vapor-modules-pro' ),
						'show_reset' => true,
						'show_alpha' => true,
						'default' => 'rgba(0,0,0,0)'
					),
					'button_background_hover' => array(
						'type' => 'color',
						'label' => __( 'Button Background Hover', 'bb-vapor-modules-pro' ),
						'show_reset' => true,
						'show_alpha' => true,
						'default' => 'rgba(255,255,255,1)'
					),
					'button_color' => array(
						'type' => 'color',
						'label' => __( 'Button Text Color', 'bb-vapor-modules-pro' ),
						'show_reset' => true,
						'default' => 'FFFFFF'
					),
					'button_color_hover' => array(
						'type' => 'color',
						'label' => __( 'Button Text Hover Color', 'bb-vapor-modules-pro' ),
						'show_reset' => true,
						'default' => '000000'
					),
					'button_border_color' => array(
						'type' => 'color',
						'label' => __( 'Button Border Color', 'bb-vapor-modules-pro' ),
						'show_reset' => true,
						'default' => '000000'
					),
					'button_border_color_hover' => array(
						'type' => 'color',
						'label' => __( 'Button Border Color on Hover', 'bb-vapor-modules-pro' ),
						'show_reset' => true,
					),
					'button_border_width' => array(
						'type' => 'unit',
						'label' => __( 'Button Border Width', 'bb-vapor-modules-pro' ),
						'default' => '2',
					),
					'button_border_width_hover' => array(
						'type' => 'unit',
						'label' => __( 'Button Border Width on Hover', 'bb-vapor-modules-pro' ),
						'default' => '0',
					),
					'button_padding' => array(
						'type' => 'dimension',
						'label' => __( 'Button Padding', 'bb-vapor-modules-pro' ),
					),
					'button_typography' => array(
						'type' => 'typography',
						'label' => __( 'Button Typography', 'bb-vapor-modules-pro' ),
					)
				)
			)
		)
	),
) );
