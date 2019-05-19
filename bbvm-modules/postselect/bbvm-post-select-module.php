<?php
class MediaRon_PostSelect_Module extends FLBuilderModule {
	public function __construct()
	{
		parent::__construct(array(
			'name'            => __( 'Post Select', 'mediaron-bb-modules' ),
			'description'     => __( 'Post Select for Beaver Builder', 'mediaron-bb-modules' ),
			'category'        => __( 'Base', 'mediaron-bb-modules' ),
			'group'           => __( 'MediaRon Modules', 'mediarion-bb-modules' ),
			'dir'             => MEDIARON_BEAVER_BUILDER_DIR . 'mediaron-modules/postselect/',
			'url'             => MEDIARON_BEAVER_BUILDER_URL . 'mediaron-modules/postselect/',
			'editor_export'   => true, // Defaults to true and can be omitted.
			'enabled'         => true, // Defaults to true and can be omitted.
			'partial_refresh' => false, // Defaults to false and can be omitted.
		));

		add_action( 'wp_ajax_mediaron_bb_get_taxonomies', array( $this, 'get_taxonomies' ) );
		add_action( 'wp_ajax_mediaron_bb_get_terms', array( $this, 'get_terms' ) );
		add_action( 'wp_ajax_mediaron_bb_get_data', array( $this, 'get_ajax_data' ) );
	}

	public function get_taxonomies() {
		$post_type = $_POST['post_type'];
		$taxonomies = get_object_taxonomies( $post_type, 'objects' );
		$selected_taxonomy = $_POST['selected_taxonomy'];
		$return_html = sprintf( '<option value="0">%s</option>', esc_html__( 'All Taxonomies', 'mediaron-bb-modules' ) );
		foreach( $taxonomies as $taxonomy ) {
			$return_html .= sprintf( '<option value="%s" %s>%s</option>', esc_attr( $taxonomy->name ), selected( $taxnonomy->name, $selected_taxonomy, false ), esc_html( $taxonomy->label ) );
		}
		die( $return_html );
	}

	public function get_terms() {
		$taxonomy = $_POST['taxonomy'];
		$post_type = $_POST['post_type'];
		add_filter( 'terms_clauses', 'mediaron_bb_terms_clauses', 10, 3 );
		$terms = get_terms( array(
			'taxonomy' => $taxonomy,
			'hide_empty' => true,
			'post_type' => $post_type,
		) );
		remove_filter( 'terms_clauses', 'mediaron_bb_terms_clauses', 10, 3 );
		$return_html = sprintf( '<option value="0">%s</option>', esc_html__( 'All Terms', 'mediaron-bb-modules' ) );
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

		$mediaron_post_types = get_post_types( array( 'public' => true, 'show_ui' => true ), 'objects' );
		$oost_html = sprintf( '<option value="0">%s</option>', esc_html__( 'Select a Post Type', 'mediaron-bb-modules' ) );
		foreach( $mediaron_post_types as $post_type ) {
			if( 'attachment' == $post_type->name || 'fl-builder-template' == $post_type->name ) continue;
			$oost_html .= sprintf( '<option value="%s">%s</option>', esc_attr( $post_type->name ), esc_html( $post_type->label ) );
		}
		$tax_html = sprintf( '<option value="0">%s</option>', esc_html__( 'All Taxonomies', 'mediaron-bb-modules' ) );
		$mediaron_taxonomies = get_object_taxonomies( $selected_post, 'objects' );
		foreach( $mediaron_taxonomies as $taxonomy ) {
			$tax_html .= sprintf( '<option value="%s">%s</option>', esc_attr( $taxonomy->name ), esc_html( $taxonomy->label ) );
		}
		$term_html = sprintf( '<option value="0">%s</option>', esc_html__( 'All Terms', 'mediaron-bb-modules' ) );
		add_filter( 'terms_clauses', 'mediaron_bb_terms_clauses', 10, 3 );
		$mediaron_terms = get_terms( array(
			'taxonomy' => $selected_taxonomy,
			'hide_empty' => true,
			'post_type' => $selected_post,
		) );
		remove_filter( 'terms_clauses', 'mediaron_bb_terms_clauses', 10, 3 );
		if( ! is_wp_error( $mediaron_terms ) ) {
			foreach( $mediaron_terms as $term ) {
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
$mediaron_post_types = get_post_types( array( 'public' => true, 'show_ui' => true ), 'objects' );
$mediaron_post_types_array = array( '0' => __( 'Select a Post Type', 'mediaron-bb-modules' ) );
foreach( $mediaron_post_types as $post_type ) {
	if( 'attachment' == $post_type->name || 'fl-builder-template' == $post_type->name ) continue;
	$mediaron_post_types_array[$post_type->name] = $post_type->label;
}

// Get image sizes
global $_wp_additional_image_sizes;

$mediaron_default_image_sizes = get_intermediate_image_sizes();
$mediaron_image_sizes = array();

foreach ( $mediaron_default_image_sizes as $size ) {
	$mediaron_image_sizes[ $size ][ 'width' ] = intval( get_option( "{$size}_size_w" ) );
	$mediaron_image_sizes[ $size ][ 'height' ] = intval( get_option( "{$size}_size_h" ) );
	$mediaron_image_sizes[ $size ][ 'crop' ] = get_option( "{$size}_crop" ) ? get_option( "{$size}_crop" ) : false;
}

if ( isset( $_wp_additional_image_sizes ) && count( $_wp_additional_image_sizes ) ) {
	$mediaron_image_sizes = array_merge( $mediaron_image_sizes, $_wp_additional_image_sizes );
}
$mediaron_thumbnail_sizes = array();
foreach( $mediaron_image_sizes as $size => $image_size ) {
	$mediaron_thumbnail_sizes[$size] = $size;
}

FLBuilder::register_module('MediaRon_PostSelect_Module', array(
	'general'       => array( // Tab
		'title'         => __('General', 'mediaron-bb-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'general'       => array( // Section
				'title'         => __('Post Select', 'mediaron-bb-modules'), // Section Title
				'fields'        => array( // Section Fields
					'post_type' => array(
						'type'          => 'select',
						'label'         => __( 'Select A Post Type', 'mediaron-bb-modules' ),
						'options'       => $mediaron_post_types_array,
						'class' => 'mediaron-post-select'
					),
					'taxonomy_select' => array(
						'type'          => 'select',
						'label'         => __( 'Select A Taxonomy', 'mediaron-bb-modules' ),
						'options'       => array(),
						'class' => 'mediaron-taxonomy-select',
						'default' => '0',
					),
					'terms_select' => array(
						'type'          => 'select',
						'label'         => __( 'Select A Term', 'mediaron-bb-modules' ),
						'options'       => array(),
						'class' => 'mediaron-term-select',
						'default' => '0'
					),
				)
			)
		)
	),
	'options'       => array( // Tab
		'title'         => __('Options', 'mediaron-bb-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'general'       => array( // Section
				'title'         => __('Options', 'mediaron-bb-modules'), // Section Title
				'fields'        => array( // Section Fields
					'posts_per_page' => array(
						'type'          => 'unit',
						'label'         => __( 'Select Number of Items to Retrieve', 'mediaron-bb-modules' ),
						'default' => '6',
					),
					'post_display' => array(
						'type'          => 'select',
						'label'         => __( 'Post Display', 'mediaron-bb-modules' ),
						'options'       => array(
							'grid' => __( 'Grid', 'mediaron-bb-modules' ),
							'list' => __( 'List', 'mediaron-bb-modules' ),
						),
						'default' => 'grid',
					),
					'columns' => array(
						'type'          => 'unit',
						'label'         => __( 'Select Number of Columns', 'mediaron-bb-modules' ),
						'default' => '4',
						'slider' => array(
							'min'  	=> 1,
							'max'  	=> 6,
							'step' 	=> 1,
						),
					),
					'item_padding' => array(
						'type'          => 'dimension',
						'label'         => __( 'Select Padding For Post Items', 'mediaron-bb-modules' ),
						'responsive'    => true,
					),
					'orderby' => array(
						'type'          => 'select',
						'label'         => __( 'Order By', 'mediaron-bb-modules' ),
						'options'       => array(
							'DATEDESC' => __( 'Newest to Oldest', 'mediaron-bb-modules' ),
							'DATEASC' => __( 'Oldest to Newest', 'mediaron-bb-modules' ),
							'TITLEASC' => __( 'A - Z', 'mediaron-bb-modules' ),
							'TITLEDESC' => __( 'Z-A', 'mediaron-bb-modules' )
						),
						'default' => 'DATEASC',
					),
				)
			)
		)
	),
	'display'       => array( // Tab
		'title'         => __('Display', 'mediaron-bb-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'general'       => array( // Section
				'title'         => __('Display', 'mediaron-bb-modules'), // Section Title
				'fields'        => array( // Section Fields
					'display_taxonomies' => array(
						'type'          => 'select',
						'label'         => __( 'Display Taxonomies?', 'mediaron-bb-modules' ),
						'options' => array(
							'yes' => __( 'Yes', 'mediaron-bb-modules' ),
							'no' => __( 'No', 'mediaron-bb-modules' ),
						),
						'default' => 'yes'
					),
					'display_featured_image' => array(
						'type'          => 'select',
						'label'         => __( 'Display Featured Image?', 'mediaron-bb-modules' ),
						'options' => array(
							'yes' => __( 'Yes', 'mediaron-bb-modules' ),
							'no' => __( 'No', 'mediaron-bb-modules' ),
						),
						'default' => 'yes',
						'toggle' => array(
							'yes' => array( 'fields' => array( 'featured_image_type', 'featured_thumbnail_size', 'featured_image_location' ) )
						)
					),
					'featured_image_type' => array(
						'type' => 'select',
						'label' => __( 'Featured Image Type', 'mediaron-bb-modules' ),
						'options' => array(
							'featured' => __( 'Featured Image', 'mediaron-bb-modules' ),
							'gravatar' => __( 'Gravatar', 'mediaron-bb-modules' ),
						),
						'default' => 'featured',
						'toggle' => array(
							'gravatar' => array( 'fields' => array( 'gravatar_size' ) )
						)
					),
					'gravatar_size' => array(
						'type' => 'unit',
						'label' => __( 'Gravatar Size', 'mediaron-bb-modules' ),
						'default' => '150',
						'slider' => array(
							'min'  	=> 100,
							'max'  	=> 1000,
							'step' 	=> 50,
						),
					),
					'featured_thumbnail_size' => array(
						'type' => 'select',
						'label' => __( 'Thumbnail Size', 'mediaron-bb-modules' ),
						'options' => $mediaron_thumbnail_sizes
					),
					'featured_image_location' => array(
						'type' => 'select',
						'label' => __( 'Featured Image Location', 'mediaron-bb-modules' ),
						'options' => array(
							'regular' => __( 'Regular Placement', 'mediaron-bb-modules' ),
							'below_title' => __( 'Below Title', 'mediaron-bb-modules' ),
							'below_title_meta' => __( 'Below Title and Post Meta', 'mediaron-bb-modules' ),
							'bottom' => __( 'Bottom', 'mediaron-bb-modules' ),
						),
						'default' => 'regular'
					),
					'display_post_author' => array(
						'type'          => 'select',
						'label'         => __( 'Display Post Author?', 'mediaron-bb-modules' ),
						'options' => array(
							'yes' => __( 'Yes', 'mediaron-bb-modules' ),
							'no' => __( 'No', 'mediaron-bb-modules' ),
						),
						'default' => 'yes'
					),
					'display_post_date' => array(
						'type'          => 'select',
						'label'         => __( 'Display Post Date?', 'mediaron-bb-modules' ),
						'options' => array(
							'yes' => __( 'Yes', 'mediaron-bb-modules' ),
							'no' => __( 'No', 'mediaron-bb-modules' ),
						),
						'default' => 'yes'
					),
					'display_post_excerpt' => array(
						'type'          => 'select',
						'label'         => __( 'Display Post Excerpt?', 'mediaron-bb-modules' ),
						'options' => array(
							'yes' => __( 'Yes', 'mediaron-bb-modules' ),
							'no' => __( 'No', 'mediaron-bb-modules' ),
						),
						'default' => 'yes'
					),
					'display_pagination' => array(
						'type'          => 'select',
						'label'         => __( 'Display Pagination?', 'mediaron-bb-modules' ),
						'options' => array(
							'yes' => __( 'Yes', 'mediaron-bb-modules' ),
							'no' => __( 'No', 'mediaron-bb-modules' ),
						),
						'default' => 'no'
					),
					'change_capitalization' => array(
						'type'          => 'select',
						'label'         => __( 'Change Capitalization?', 'mediaron-bb-modules' ),
						'options' => array(
							'yes' => __( 'Yes', 'mediaron-bb-modules' ),
							'no' => __( 'No', 'mediaron-bb-modules' ),
						),
						'default' => 'no'
					),
					'center_text' => array(
						'type'          => 'select',
						'label'         => __( 'Center Text?', 'mediaron-bb-modules' ),
						'options' => array(
							'yes' => __( 'Yes', 'mediaron-bb-modules' ),
							'no' => __( 'No', 'mediaron-bb-modules' ),
						),
						'default' => 'no'
					),
					'display_continue_reading' => array(
						'type'          => 'select',
						'label'         => __( 'Display Continue Reading Link?', 'mediaron-bb-modules' ),
						'options' => array(
							'yes' => __( 'Yes', 'mediaron-bb-modules' ),
							'no' => __( 'No', 'mediaron-bb-modules' ),
						),
						'default' => 'yes',
						'toggle' => array(
							'yes' => array( 'fields' => array( 'continue_reading' ) )
						)
					),
					'continue_reading' => array(
						'type' => 'text',
						'label' => __( 'Continue Reading Text', 'mediaron-bb-modules' ),
						'default' => 'Continue Reading'
					)

				)
			)
		),
	),
	'color'       => array( // Tab
		'title'         => __('Color and Typography', 'mediaron-bb-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'general'       => array( // Section
				'title'         => __('Color and Typography', 'mediaron-bb-modules'), // Section Title
				'fields'        => array( // Section Fields
					'heading_typography' => array(
						'type'          => 'typography',
						'label'         => __( 'Heading Typography', 'mediaron-bb-modules' ),
						'responsive' => true
					),
					'meta_typography' => array(
						'type'          => 'typography',
						'label'         => __( 'Meta Typography', 'mediaron-bb-modules' ),
						'responsive' => true
					),
					'excerpt_typography' => array(
						'type'          => 'typography',
						'label'         => __( 'Excerpt Typography', 'mediaron-bb-modules' ),
						'responsive' => true
					),
					'readmore_typography' => array(
						'type'          => 'typography',
						'label'         => __( 'Read More Typography', 'mediaron-bb-modules' ),
						'responsive' => true
					),
					'background_color' => array(
						'type'          => 'color',
						'label'         => __( 'Background Color', 'mediaron-bb-modules' ),
						'default' => 'FFFFFF'
					),
					'text_color' => array(
						'type'          => 'color',
						'label'         => __( 'Text Color', 'mediaron-bb-modules' ),
						'default' => '000000'
					),
					'link_color' => array(
						'type'          => 'color',
						'label'         => __( 'Link Color', 'mediaron-bb-modules' ),
						'default' => '000000'
					),
					'link_color_hover' => array(
						'type'          => 'color',
						'label'         => __( 'Link Color Hover', 'mediaron-bb-modules' ),
						'default' => '000000'
					),
				)
			)
		),
	),
	'pagination'       => array( // Tab
		'title'         => __('Pagination', 'mediaron-bb-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'general'       => array( // Section
				'title'         => __('Pagination', 'mediaron-bb-modules'), // Section Title
				'fields'        => array( // Section Fields
					'pagination_padding' => array(
						'type'          => 'dimension',
						'label'         => __( 'Select Padding for Pagination', 'mediaron-bb-modules' ),
						'responsive'    => true,
					),
					'pagination_border_color' => array(
						'type' => 'color',
						'label' => __( 'Pagination Border Color', 'mediaron-bb-modules' ),
						'default' => 'EEEEEE'
					),
					'pagination_background' => array(
						'type' => 'color',
						'label' => __( 'Pagination Item Background', 'mediaron-bb-modules' ),
						'default' => 'FFFFFF'
					),
					'pagination_background_active' => array(
						'type' => 'color',
						'label' => __( 'Pagination Active Item Background', 'mediaron-bb-modules' ),
						'default' => 'FFFFFF'
					),
					'pagination_background_hover' => array(
						'type' => 'color',
						'label' => __( 'Pagination Item Hover Background', 'mediaron-bb-modules' ),
						'default' => 'FFFFFF'
					),
					'pagination_active_color' => array(
						'type' => 'color',
						'label' => __( 'Pagination Active Text Color', 'mediaron-bb-modules' ),
						'default' => '000000',
					),
					'pagination_link_color' => array(
						'type' => 'color',
						'label' => __( 'Pagination Link Color', 'mediaron-bb-modules' ),
						'default' => 'FFFFFF',
					),
					'pagination_link_color_hover' => array(
						'type' => 'color',
						'label' => __( 'Pagination Link Color Hover', 'mediaron-bb-modules' ),
						'default' => 'FFFFFF',
					)
				)
			)
		),
	),
) );
/**
 * Extend get terms with post type parameter.
 *
 * @global $wpdb
 * @param string $clauses
 * @param string $taxonomy
 * @param array $args
 * @return string
 */
function mediaron_bb_terms_clauses( $clauses, $taxonomy, $args ) {
	if ( isset( $args['post_type'] ) && ! empty( $args['post_type'] ) && $args['fields'] !== 'count' ) {
		global $wpdb;

		$post_types = array();

		if ( is_array( $args['post_type'] ) ) {
			foreach ( $args['post_type'] as $cpt ) {
				$post_types[] = "'" . $cpt . "'";
			}
		} else {
			$post_types[] = "'" . $args['post_type'] . "'";
		}

		if ( ! empty( $post_types ) ) {
			$clauses['fields'] = 'DISTINCT ' . str_replace( 'tt.*', 'tt.term_taxonomy_id, tt.taxonomy, tt.description, tt.parent', $clauses['fields'] ) . ', COUNT(p.post_type) AS count';
			$clauses['join'] .= ' LEFT JOIN ' . $wpdb->term_relationships . ' AS r ON r.term_taxonomy_id = tt.term_taxonomy_id LEFT JOIN ' . $wpdb->posts . ' AS p ON p.ID = r.object_id';
			$clauses['where'] .= ' AND (p.post_type IN (' . implode( ',', $post_types ) . ') OR p.post_type IS NULL)';
			$clauses['orderby'] = 'GROUP BY t.term_id ' . $clauses['orderby'];
		}
	}
	return $clauses;
}