<?php
/**
 * Breadcrumbs Module.
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 1.3.0
 */

if ( isset( $settings->breadcrumb_select_field ) && 'none' !== $settings->breadcrumb_select_field ) :
	?>
<div class="fl-bbvm-breadcrumbs-for-beaverbuilder">
	<div class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">
	<?php
	switch ( $settings->breadcrumb_select_field ) {
		case 'none':
			echo '';
			break;
		case 'yoast':
			if ( function_exists( 'yoast_breadcrumb' ) ) {
				echo wp_kses_post( yoast_breadcrumb( '<p id="breadcrumbs">', '</p>', true ) );
			}
			break;
		case 'breadcrumb_navxt':
			if ( function_exists( 'bcn_display' ) ) {
				echo wp_kses_post( bcn_display( true ) );
			}
			break;
		case 'seopress':
			if ( function_exists( 'seopress_display_breadcrumbs' ) ) {
				seopress_display_breadcrumbs();
			}
			break;
		case 'rankmath':
			if ( function_exists( 'rank_math_get_breadcrumbs' ) ) {
				echo wp_kses_post( rank_math_get_breadcrumbs() );
			}
			break;
		default:
			break;
	}
	?>
	</div>
</div>
	<?php
endif;
