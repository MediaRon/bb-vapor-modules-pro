<?php /* Setup Container */ ?>
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-category-grid-for-beaverbuilder ul {
	display: flex;
	flex-direction: row;
	flex-wrap: wrap;
	position: relative;
}

.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-category-grid-for-beaverbuilder ul .link-full {
	display: block;
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	content: ' ';
	z-index: 100;
}
@supports (display: grid) {
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-category-grid-for-beaverbuilder ul {
		display: grid;
		grid-column-gap: 15px;
		grid-row-gap: 15px;
		grid-template-columns: repeat(auto-fill, minmax(290px, 1fr));
	}
}

.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-category-grid-for-beaverbuilder ul {
	list-style: none;
	margin: 0;
	padding: 0;
}

.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-category-grid-for-beaverbuilder li {
	display: flex;
	justify-content: center;
	background-position: center center;
	background-repeat: no-repeat;
	background-size: cover;
	position: relative;
}
<?php
// Setup Category.
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'category_typography',
		'selector'     => ".fl-node-$id .fl-bbvm-category-grid-for-beaverbuilder li .bbvm-category",
	)
);
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'category_padding',
		'selector'     => ".fl-node-$id .fl-bbvm-category-grid-for-beaverbuilder li .bbvm-category",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'category_padding_top',
			'padding-right'  => 'category_padding_right',
			'padding-bottom' => 'category_padding_bottom',
			'padding-left'   => 'category_padding_left',
		),
	)
);
?>
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-category-grid-for-beaverbuilder li .bbvm-category {
	color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->category_text_color ) ); ?>;
	margin-top: 50px;
	position: relative;
	z-index: 5;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-category-grid-for-beaverbuilder li:hover .bbvm-category {
	color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->category_text_color_hover ) ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-category-grid-for-beaverbuilder li:after {
	position: absolute;
	width: 100%;
	height: 100%;
	content: '';
	display: block;
	background: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->background_overlay ) ); ?>;
	z-index: 1;
	transition: background-color 0.5s ease;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-category-grid-for-beaverbuilder li:hover:after {
	background: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->background_overlay_hover ) ); ?>;
}
<?php
// Setup Min Height.
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .fl-bbvm-category-grid-for-beaverbuilder li",
		'media'    => 'default',
		'props'    => array(
			'min-height' => $settings->min_height . 'px',
		),
	)
);
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .fl-bbvm-category-grid-for-beaverbuilder li",
		'media'    => 'medium',
		'props'    => array(
			'min-height' => absint( $settings->min_height_medium ? $settings->min_height_medium : $settings->min_height ) . 'px',
		),
	)
);
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .fl-bbvm-category-grid-for-beaverbuilder li",
		'media'    => 'responsive',
		'props'    => array(
			'min-height' => absint( $settings->min_height_responsive ? $settings->min_height_responsive : $settings->min_height ) . 'px',
		),
	)
);

// Setup Min Width.
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .fl-bbvm-category-grid-for-beaverbuilder ul",
		'media'    => 'default',
		'props'    => array(
			'grid-template-columns' => 'repeat(auto-fill, minmax(' . absint( $settings->min_width ) . 'px, 1fr))',
		),
	)
);
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .fl-bbvm-category-grid-for-beaverbuilder ul",
		'media'    => 'medium',
		'props'    => array(
			'grid-template-columns' => 'repeat(auto-fill, minmax(' . absint( $settings->min_width_medium ? $settings->min_width_medium : $settings->min_width ) . 'px, 1fr))',
		),
	)
);
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .fl-bbvm-category-grid-for-beaverbuilder ul",
		'media'    => 'responsive',
		'props'    => array(
			'grid-template-columns' => 'repeat(auto-fill, minmax(' . absint( $settings->min_width_responsive ? $settings->min_width_responsive : $settings->min_width ) . 'px, 1fr))',
		),
	)
);
// Set up border
FLBuilderCSS::border_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'outer_border',
		'selector'     => ".fl-node-$id .fl-bbvm-category-grid-for-beaverbuilder ul li",
	)
);
