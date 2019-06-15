<?php /* Setup Container */ ?>
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-category-grid-for-beaverbuilder ul {
	display: flex;
	flex-direction: row;
	flex-wrap: wrap;
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
