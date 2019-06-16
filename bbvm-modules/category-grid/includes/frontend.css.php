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
			'min-height' => $settings->min_height_medium . 'px',
		),
	)
);
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .fl-bbvm-category-grid-for-beaverbuilder li",
		'media'    => 'responsive',
		'props'    => array(
			'min-height' => $settings->min_height_responsive . 'px',
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
			'grid-template-columns' => 'repeat(auto-fill, minmax(' . absint( $settings->min_width_medium ) . 'px, 1fr))',
		),
	)
);
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .fl-bbvm-category-grid-for-beaverbuilder ul",
		'media'    => 'responsive',
		'props'    => array(
			'grid-template-columns' => 'repeat(auto-fill, minmax(' . absint( $settings->min_width_responsive ) . 'px, 1fr))',
		),
	)
);
