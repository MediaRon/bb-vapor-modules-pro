<?php
/**
 * Featured Post Module.
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 2.2.1
 */

?>
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-featured img {
	max-width: 75px;
	max-height: 75px;
	border-radius: 100%;
}
<?php
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'heading_typography',
		'selector'     => ".fl-node-$id h2.ptam-block-post-grid-title, .fl-node-$id h2.ptam-block-post-grid-title a",
	)
);
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'meta_typography',
		'selector'     => ".fl-node-$id .ptam-block-post-grid .ptam-block-post-grid-byline",
	)
);
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'excerpt_typography',
		'selector'     => ".fl-node-$id .ptam-block-post-grid .ptam-block-post-grid-text p",
	)
);
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'readmore_typography',
		'selector'     => ".fl-node-$id .ptam-block-post-grid .ptam-block-post-grid-text p .ptam-block-post-grid-link.ptam-text-link",
	)
);
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'item_padding',
		'selector'     => ".fl-node-$id .ptam-post-grid-items article",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'item_padding_top',
			'padding-right'  => 'item_padding_right',
			'padding-bottom' => 'item_padding_bottom',
			'padding-left'   => 'item_padding_left',
		),
	)
);
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'pagination_padding',
		'selector'     => ".fl-node-$id .ptam-pagination",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'pagination_padding_top',
			'padding-right'  => 'pagination_padding_right',
			'padding-bottom' => 'pagination_padding_bottom',
			'padding-left'   => 'pagination_padding_left',
		),
	)
);
