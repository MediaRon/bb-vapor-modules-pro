<?php
if( ! function_exists( 'bbvm_bb_get_profile_image' ) ):
function bbvm_bb_get_profile_image( $settings, $post_thumb_id = 0, $post_author = 0, $post_id = 0 ) {
	ob_start();
	// Get the featured image
	$list_item_markup = '';
	if ( 'yes' ===  $settings->display_featured_image ) {
		$post_thumb_size = $settings->featured_thumbnail_size;
		$image_type = $settings->featured_image_type;
		if( $image_type === 'gravatar' ) {
			$list_item_markup .= sprintf(
				'<div class="ptam-block-post-grid-image"><a href="%1$s" rel="bookmark">%2$s</a></div>',
				esc_url( get_permalink( $post_id ) ),
				get_avatar( $post_author, $settings->gravatar_size )
			);
		} else {
			$list_item_markup .= sprintf(
				'<div class="ptam-block-post-grid-image"><a href="%1$s" rel="bookmark">%2$s</a></div>',
				esc_url( get_permalink( $post_id ) ),
				wp_get_attachment_image( $post_thumb_id, $post_thumb_size )
			);
		}
		echo $list_item_markup;
	}
	return ob_get_clean();
}
endif;
?>
<div class="fl-bbvm-postselect-for-beaverbuilder">
<?php
if ( '0' != $settings->post_type ) {
	$orderby = $order = '';
	switch( $settings->orderby ) {
		case 'DATEASC':
			$orderby = 'date';
			$order = 'ASC';
			break;
		case 'DATEDESC':
			$orderby = 'date';
			$order = 'DESC';
			break;
		case 'TITLEASC':
			$orderby = 'title';
			$order = 'ASC';
			break;
		case 'TITLEDESC':
			$orderby = 'title';
			$order = 'DESC';
			break;
	}
	$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
	$post_args = array(
		'post_type' => $settings->post_type,
		'posts_per_page' => $settings->posts_per_page,
		'post_status' => 'publish',
		'order' => $order,
		'orderby' => $orderby,
		'paged' => $paged
	);
	if( '0' != $settings->taxonomy_select && '0' != $settings->terms_select ) {
		$post_args[ 'tax_query' ] = array( array(
			'taxonomy' => $settings->taxonomy_select,
			'terms' => $settings->terms_select
		) );
	}
	$image_placememt_options = $settings->featured_image_location;
	$image_size = $settings->featured_thumbnail_size;
	$recent_posts = new WP_Query( $post_args );

	$list_items_markup = '';
	if( $recent_posts->have_posts()):
		while ( $recent_posts->have_posts() ) {
			global $post;
			$recent_posts->the_post();

			// Get the post ID
			$post_id = $post->ID;

			// Get the post thumbnail
			$post_thumb_id = get_post_thumbnail_id( $post_id );

			if ( $post_thumb_id && 'yes' === $settings->display_featured_image ) {
				$post_thumb_class = 'has-thumb';
			} else {
				$post_thumb_class = 'no-thumb';
			}

			// Start the markup for the post
			$list_items_markup .= sprintf(
				'<article class="%1$s">',
				esc_attr( $post_thumb_class )
			);
			if ( 'regular' === $image_placememt_options ) {
				$list_items_markup .= bbvm_bb_get_profile_image( $settings, $post_thumb_id, $post->post_author, $post->ID );
			}

			// Wrap the text content
			$list_items_markup .= sprintf(
				'<div class="ptam-block-post-grid-text">'
			);

				// Get the post title
				$title = get_the_title( $post_id );

				if ( ! $title ) {
					$title = __( 'Untitled' );
				}

				$list_items_markup .= sprintf(
					'<h2 class="ptam-block-post-grid-title"><a href="%1$s" rel="bookmark">%2$s</a></h2>',
					esc_url( get_permalink( $post_id ) ),
					esc_html( $title )
				);

				// Wrap the byline content
				$list_items_markup .= sprintf(
					'<div class="ptam-block-post-grid-byline %s">', 'yes' === $settings->change_capitalization ? 'ptam-text-lower-case' : '' );

					// Get the featured image
					if ( 'yes' === $settings->display_featured_image && ( $post_thumb_id || 'gravatar' === $settings->featured_image_type ) && 'below_title' === $settings->featured_image_location ) {

						$list_items_markup .= sprintf(
							'<div class="ptam-block-post-grid-image"><a href="%1$s" rel="bookmark">%2$s</a></div>',
							esc_url( get_permalink( $post_id ) ),
							bbvm_bb_get_profile_image( $settings, $post_thumb_id, $post->post_author, $post->ID ) );
					}

					// Get the post author
					if ( 'yes' === $settings->display_post_author ) {
						$list_items_markup .= sprintf(
							'<div class="ptam-block-post-grid-author"><a class="ptam-text-link" href="%2$s">%1$s</a></div>',
							esc_html( get_the_author_meta( 'display_name', $post->post_author ) ),
							esc_html( get_author_posts_url( $post->post_author ) )
						);
					}

					// Get the post date
					if ( 'yes' === $settings->display_post_date ) {
						$list_items_markup .= sprintf(
							'<time datetime="%1$s" class="ptam-block-post-grid-date">%2$s</time>',
							esc_attr( get_the_date( 'c', $post_id ) ),
							esc_html( get_the_date( '', $post_id ) )
						);
					}
					// Get the taxonomies
					if ( 'yes' === $settings->display_taxonomies ) {
						$taxonomies = get_object_taxonomies( $post->post_type, 'objects' );
						$terms = array();
						foreach( $taxonomies as $key => $taxonomy ) {
							$terms[$key] = get_the_term_list( $post->ID, $key, '', ', ' );
						}
						foreach( $taxonomies as $key => $taxonomy ) {
							if ( false === $terms[$key] ) continue;
							$list_items_markup .= sprintf( '<div class="ptam-terms"><span class="ptam-term-label">%s: </span><span class="ptam-term-values">%s</span></div>', $taxonomy->label, $terms[$key] );
						}
					}
					// Get the featured image
					if ( 'yes' === $settings->display_featured_image && ( $post_thumb_id || 'gravatar' === $settings->featured_image_type ) && 'below_title_meta' === $settings->featured_image_location ) {
						$list_items_markup .= sprintf(
							'<div class="ptam-block-post-grid-image"><a href="%1$s" rel="bookmark">%2$s</a></div>',
							esc_url( get_permalink( $post_id ) ),
							bbvm_bb_get_profile_image( $settings, $post_thumb_id, $post->post_author, $post->ID )
						);
					}

				// Close the byline content
				$list_items_markup .= sprintf(
					'</div>'
				);

				// Wrap the excerpt content
				$list_items_markup .= sprintf(
					'<div class="ptam-block-post-grid-excerpt">'
				);

					// Get the excerpt
					remove_filter( 'the_content', 'sharing_display', 19 );
					remove_filter( 'the_excerpt', 'sharing_display', 19 );
					$excerpt = apply_filters( 'the_excerpt', get_post_field( 'post_excerpt', $post_id, 'display' ) );

					if( empty( $excerpt ) ) {
						$excerpt = apply_filters( 'the_excerpt', wp_trim_words( $post->post_content, 55 ) );
					}

					if ( ! $excerpt ) {
						$excerpt = null;
					}
					if ( function_exists( 'sharing_display' ) ) {
						add_filter( 'the_content', 'sharing_display', 19 );
						add_filter( 'the_excerpt', 'sharing_display', 19 );
					}

					if ( 'yes' === $settings->display_post_excerpt ) {
						$list_items_markup .=  wp_kses_post( $excerpt );
					}

					if ( 'yes' === $settings->display_continue_reading ) {
						$list_items_markup .= sprintf(
							'<p><a class="ptam-block-post-grid-link ptam-text-link" href="%1$s" rel="bookmark">%2$s</a></p>',
							esc_url( get_permalink( $post_id ) ),
							esc_html( $settings->continue_reading )
						);
					}

					// Get the featured image
					if ( 'yes' === $settings->display_featured_image && ( $post_thumb_id || 'gravatar' === $settings->featured_image_type ) && 'bottom' === $settings->featured_image_location ) {

						$list_items_markup .= sprintf(
							'<div class="ptam-block-post-grid-image"><a href="%1$s" rel="bookmark">%2$s</a></div>',
							esc_url( get_permalink( $post_id ) ),
							bbvm_bb_get_profile_image( $settings, $post_thumb_id, $post->post_author, $post->ID )
						);
					}

				// Close the excerpt content
				$list_items_markup .= sprintf(
					'</div>'
				);

			// Wrap the text content
			$list_items_markup .= sprintf(
				'</div>'
			);

			// Close the markup for the post
			$list_items_markup .= "</article>\n";
		}
	endif;

	// Build the classes
	$class = "ptam-block-post-grid";

	$grid_class = 'ptam-post-grid-items';

	if ( 'list' === $settings->post_display ) {
		$grid_class .= ' is-list';
	} else {
		$grid_class .= ' is-grid';
	}

	if ( 'grid' === $settings->post_display ) {
		$grid_class .= ' columns-' . $settings->columns;
	}

	// Pagination
	$pagination = '';
	if( 'yes' === $settings->display_pagination ) {
		$pagination = paginate_links( array(
			'total'        => $recent_posts->max_num_pages,
			'current'      => max( 1, get_query_var( 'paged' ) ),
			'format'       => '/page/%#%',
			'show_all'     => false,
			'type'         => 'list',
			'end_size'     => 1,
			'mid_size'     => 2,
			'prev_next'    => false,
			'prev_text'    => sprintf( '<i></i> %1$s', __( 'Newer Items', 'bb-vapor-modules-pro' ) ),
			'next_text'    => sprintf( '%1$s <i></i>', __( 'Older Items', 'bb-vapor-modules-pro' ) ),
			'add_args'     => false,
			'add_fragment' => '',
		) );
	}

	// Output the post markup
	$block_content = sprintf(
		'<div class="%1$s"><div class="%2$s">%3$s</div><div class="ptam-pagination">%4$s</div></div>',
		esc_attr( $class ),
		esc_attr( $grid_class ),
		$list_items_markup,
		$pagination
	);
	echo $block_content;
	wp_reset_query();
}
?>
</div>