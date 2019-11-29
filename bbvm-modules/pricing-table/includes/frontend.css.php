<?php
/**
 * Pricing Table Module.
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 1.5.0
 */

?>
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-pricing-table-title {
	color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->pricing_table_title_color ) ); ?>;
	background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->pricing_table_title_background ) ); ?>;
	text-align: <?php echo esc_html( $settings->pricing_table_title_align ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-pricing-container {
	display: flex;
	justify-content: space-between;
	text-align: center;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-pricing-container.bbvm-cols-6 .bbvm-pricing-table-column {
	width: 15%;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-pricing-container.bbvm-cols-5 .bbvm-pricing-table-column {
	width: 18%;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-pricing-container.bbvm-cols-4 .bbvm-pricing-table-column {
	width: 22%;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-pricing-container.bbvm-cols-3 .bbvm-pricing-table-column {
	width: 30%;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-pricing-container.bbvm-cols-2 .bbvm-pricing-table-column {
	width: 48%;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-pricing-container.bbvm-cols-1 .bbvm-pricing-table-column {
	width: 100%;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-pricing-table-card {
	overflow: hidden;
}
<?php
FLBuilderCSS::border_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'pricing_table_title_border',
		'selector'     => ".fl-node-$id .bbvm-pricing-table-title",
	)
);
FLBuilderCSS::border_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'feature_border',
		'selector'     => ".fl-node-$id .bbvm-pricing-table-card",
	)
);
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'pricing_table_title_padding',
		'selector'     => ".fl-node-$id .bbvm-pricing-table-title",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'pricing_table_title_padding_top',
			'padding-right'  => 'pricing_table_title_padding_right',
			'padding-bottom' => 'pricing_table_title_padding_bottom',
			'padding-left'   => 'pricing_table_title_padding_left',
		),
	)
);
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'pricing_table_title_typography',
		'selector'     => ".fl-node-$id .bbvm-pricing-table-title",
	)
);

// Go through the items.
$count       = 1;
$total_count = count( $settings->items );
foreach ( $settings->items as $item ) :
	if ( 'yes' === $item->display_featured ) :
		// Featured styles.
		?>
		.fl-node-<?php echo esc_html( $id ); ?> .bbvm-pricing-table-column.bbvm-col-<?php echo absint( $count ); ?> .bbvm-pricing-table-featured {
			background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $item->featured_background_color ) ); ?>;
			color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $item->featured_text_color ) ); ?>;
		}
		<?php
		FLBuilderCSS::dimension_field_rule(
			array(
				'settings'     => $item,
				'setting_name' => 'featured_padding',
				'selector'     => ".fl-node-$id .bbvm-pricing-table-column.bbvm-col-$count .bbvm-pricing-table-featured",
				'unit'         => 'px',
				'props'        => array(
					'padding-top'    => 'featured_padding_top',
					'padding-right'  => 'featured_padding_right',
					'padding-bottom' => 'featured_padding_bottom',
					'padding-left'   => 'featured_padding_left',
				),
			)
		);
		FLBuilderCSS::typography_field_rule(
			array(
				'settings'     => $item,
				'setting_name' => 'featured_typography',
				'selector'     => ".fl-node-$id .bbvm-pricing-table-column.bbvm-col-$count .bbvm-pricing-table-featured",
			)
		);
	endif;
	if ( 'yes' === $item->display_title ) :
		// Title styles.
		?>
		.fl-node-<?php echo esc_html( $id ); ?> .bbvm-pricing-table-column.bbvm-col-<?php echo absint( $count ); ?> .bbvm-pricing-table-title {
			background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $item->item_background_color ) ); ?>;
			color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $item->item_text_color ) ); ?>;
		}
		<?php
		FLBuilderCSS::dimension_field_rule(
			array(
				'settings'     => $item,
				'setting_name' => 'item_padding',
				'selector'     => ".fl-node-$id .bbvm-pricing-table-column.bbvm-col-$count .bbvm-pricing-table-title",
				'unit'         => 'px',
				'props'        => array(
					'padding-top'    => 'item_padding_top',
					'padding-right'  => 'item_padding_right',
					'padding-bottom' => 'item_padding_bottom',
					'padding-left'   => 'item_padding_left',
				),
			)
		);
		FLBuilderCSS::typography_field_rule(
			array(
				'settings'     => $item,
				'setting_name' => 'item_typography',
				'selector'     => ".fl-node-$id .bbvm-pricing-table-column.bbvm-col-$count .bbvm-pricing-table-title",
			)
		);
	endif;
	if ( 'yes' === $item->display_price ) :
		// Pricing styles.
		?>
		.fl-node-<?php echo esc_html( $id ); ?> .bbvm-pricing-table-column.bbvm-col-<?php echo absint( $count ); ?> .bbvm-pricing-table-price {
			background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $item->price_background_color ) ); ?>;
		}
		.fl-node-<?php echo esc_html( $id ); ?> .bbvm-pricing-table-column.bbvm-col-<?php echo absint( $count ); ?> .bbvm-pricing-table-price .bbvm-pricing-table-price-amount {
			color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $item->price_text_color ) ); ?>;
		}
		.fl-node-<?php echo esc_html( $id ); ?> .bbvm-pricing-table-column.bbvm-col-<?php echo absint( $count ); ?> .bbvm-pricing-table-price .bbvm-pricing-table-price-duration {
			color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $item->duration_text_color ) ); ?>;
		}
		<?php
		FLBuilderCSS::dimension_field_rule(
			array(
				'settings'     => $item,
				'setting_name' => 'price_padding',
				'selector'     => ".fl-node-$id .bbvm-pricing-table-column.bbvm-col-$count .bbvm-pricing-table-price",
				'unit'         => 'px',
				'props'        => array(
					'padding-top'    => 'price_padding_top',
					'padding-right'  => 'price_padding_right',
					'padding-bottom' => 'price_padding_bottom',
					'padding-left'   => 'price_padding_left',
				),
			)
		);
		FLBuilderCSS::typography_field_rule(
			array(
				'settings'     => $item,
				'setting_name' => 'price_typography',
				'selector'     => ".fl-node-$id .bbvm-pricing-table-column.bbvm-col-$count .bbvm-pricing-table-price .bbvm-pricing-table-price-amount",
			)
		);
		FLBuilderCSS::typography_field_rule(
			array(
				'settings'     => $item,
				'setting_name' => 'duration_typography',
				'selector'     => ".fl-node-$id .bbvm-pricing-table-column.bbvm-col-$count .bbvm-pricing-table-price .bbvm-pricing-table-price-duration",
			)
		);
	endif;
	// Feature styles.
	?>
		.fl-node-<?php echo esc_html( $id ); ?> .bbvm-pricing-table-column.bbvm-col-<?php echo absint( $count ); ?> .bbvm-pricing-table-features {
			list-style-type: none;
			margin: 0;
			padding: 0;
		}
		.fl-node-<?php echo esc_html( $id ); ?> .bbvm-pricing-table-column.bbvm-col-<?php echo absint( $count ); ?> .bbvm-pricing-table-features li.odd {
			background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->odd_color ) ); ?>;
			color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->odd_color_text ) ); ?>;
		}
		.fl-node-<?php echo esc_html( $id ); ?> .bbvm-pricing-table-column.bbvm-col-<?php echo absint( $count ); ?> .bbvm-pricing-table-features li.even {
			background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->even_color ) ); ?>;
			color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->even_color_text ) ); ?>;
		}
	<?php
	FLBuilderCSS::typography_field_rule(
		array(
			'settings'     => $item,
			'setting_name' => 'feature_typography',
			'selector'     => ".fl-node-$id .bbvm-pricing-table-column.bbvm-col-$count .bbvm-pricing-table-features li",
		)
	);
	FLBuilderCSS::dimension_field_rule(
		array(
			'settings'     => $settings,
			'setting_name' => 'feature_padding',
			'selector'     => ".fl-node-$id .bbvm-pricing-table-column.bbvm-col-$count .bbvm-pricing-table-features li",
			'unit'         => 'px',
			'props'        => array(
				'padding-top'    => 'feature_padding_top',
				'padding-right'  => 'feature_padding_right',
				'padding-bottom' => 'feature_padding_bottom',
				'padding-left'   => 'feature_padding_left',
			),
		)
	);
	// Pricing button.
	FLBuilderCSS::typography_field_rule(
		array(
			'settings'     => $item,
			'setting_name' => 'button_typography',
			'selector'     => ".fl-node-$id .bbvm-pricing-table-column.bbvm-col-$count .bbvm-pricing-table-button a .button-text",
		)
	);
	FLBuilderCSS::dimension_field_rule(
		array(
			'settings'     => $item,
			'setting_name' => 'button_padding',
			'selector'     => ".fl-node-$id .bbvm-pricing-table-column.bbvm-col-$count .bbvm-pricing-table-button a",
			'unit'         => 'px',
			'props'        => array(
				'padding-top'    => 'button_padding_top',
				'padding-right'  => 'button_padding_right',
				'padding-bottom' => 'button_padding_bottom',
				'padding-left'   => 'button_padding_left',
			),
		)
	);
	FLBuilderCSS::dimension_field_rule(
		array(
			'settings'     => $item,
			'setting_name' => 'button_margin',
			'selector'     => ".fl-node-$id .bbvm-pricing-table-column.bbvm-col-$count .bbvm-pricing-table-button a",
			'unit'         => 'px',
			'props'        => array(
				'margin-top'    => 'button_margin_top',
				'margin-right'  => 'button_margin_right',
				'margin-bottom' => 'button_margin_bottom',
				'margin-left'   => 'button_margin_left',
			),
		)
	);
	FLBuilderCSS::border_field_rule(
		array(
			'settings'     => $item,
			'setting_name' => 'button_border',
			'selector'     => ".fl-node-$id .bbvm-pricing-table-column.bbvm-col-$count .bbvm-pricing-table-button a",
		)
	);
	?>
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-pricing-table-column.bbvm-col-<?php echo absint( $count ); ?> .bbvm-pricing-table-button {
		background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $item->button_row_background ) ); ?>;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-pricing-table-column.bbvm-col-<?php echo absint( $count ); ?> .bbvm-pricing-table-button a {
		display: inline-block;
		text-decoration: none;
		transition: all 0.2s ease;
	}
	<?php
	if ( 'block' === $item->button_width ) :
		?>
		.fl-node-<?php echo esc_html( $id ); ?> .bbvm-pricing-table-column.bbvm-col-<?php echo absint( $count ); ?> .bbvm-pricing-table-button a {
			width: 80%;
		}
		<?php
	endif;
	if ( 'flat' === $item->button_background_select ) :
		?>
		.fl-node-<?php echo esc_html( $id ); ?> .bbvm-pricing-table-column.bbvm-col-<?php echo absint( $count ); ?> .bbvm-pricing-table-button a {
			background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $item->button_background ) ); ?>;
			color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $item->button_text_color ) ); ?>;
		}
		.fl-node-<?php echo esc_html( $id ); ?> .bbvm-pricing-table-column.bbvm-col-<?php echo absint( $count ); ?> .bbvm-pricing-table-button a:hover {
			background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $item->button_background_hover ) ); ?>;
			color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $item->button_text_color_hover ) ); ?>;
		}
		<?php
	endif;
	if ( 'transparent' === $item->button_background_select ) :
		?>
		.fl-node-<?php echo esc_html( $id ); ?> .bbvm-pricing-table-column.bbvm-col-<?php echo absint( $count ); ?> .bbvm-pricing-table-button a {
			color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $item->button_text_color ) ); ?>;
		}
		.fl-node-<?php echo esc_html( $id ); ?> .bbvm-pricing-table-column.bbvm-col-<?php echo absint( $count ); ?> .bbvm-pricing-table-button a:hover {
			color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $item->button_text_color_hover ) ); ?>;
		}
		<?php
	endif;
	if ( 'gradient' === $item->button_background_select ) :
		?>
		.fl-node-<?php echo esc_html( $id ); ?> .bbvm-pricing-table-column.bbvm-col-<?php echo absint( $count ); ?> .bbvm-pricing-table-button a {
			background-image: <?php echo FLBuilderColor::gradient( json_decode( json_encode( $item->button_gradient ), true ) ); // phpcs:ignore ?>;
			color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $item->button_text_color ) ); ?>;
		}
		.fl-node-<?php echo esc_html( $id ); ?> .bbvm-pricing-table-column.bbvm-col-<?php echo absint( $count ); ?> .bbvm-pricing-table-button a:hover {
			background-image: <?php echo FLBuilderColor::gradient( json_decode( json_encode( $item->button_gradient_hover ), true ) ); // phpcs:ignore ?>;
			color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $item->button_text_color_hover ) ); ?>;
		}
		<?php
	endif;
	$count++;
endforeach;
