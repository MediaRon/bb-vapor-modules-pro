<?php
/**
 * Jetpack Sharing Module.
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 1.3.0
 */

// Button Styles.
$icon_color = isset( $settings->icon_color ) ? esc_attr( $settings->icon_color ) : 'inherit';

$icon_color_hover = isset( $settings->icon_color_hover ) ? esc_attr( $settings->icon_color_hover ) : 'inherit';

$button_text_color = isset( $settings->button_text_color ) ? esc_attr( $settings->button_text_color ) : 'inherit';
$button_text_color = BBVapor_Modules_Pro::get_color( $button_text_color );

$button_text_color_hover = isset( $settings->button_text_color_hover ) ? esc_attr( $settings->button_text_color_hover ) : 'inherit';
$button_text_color_hover = BBVapor_Modules_Pro::get_color( $button_text_color_hover );

$button_background_color = isset( $settings->button_background_color ) ? esc_attr( $settings->button_background_color ) : 'inherit';
$button_text_color_hover = BBVapor_Modules_Pro::get_color( $button_text_color_hover );

$button_background_color_hover = isset( $settings->button_background_color_hover ) ? esc_attr( $settings->button_background_color_hover ) : 'inherit';
$button_background_color_hover = BBVapor_Modules_Pro::get_color( $button_background_color_hover );

if ( 'icon-text' === $settings->sharing_display ) :
	FLBuilderCSS::rule(
		array(
			'selector' => ".fl-node-$id .fl-bbvm-jetpack-sharing-for-beaverbuilder div.sharedaddy .sd-content ul li a.sd-button::before",
			'media'    => 'default', // Optional. Can be `default`, `medium`, `responsive` or a custom statement.
			'props'    => array(
				'font-size' => $settings->icon_size . 'px',
				'top'       => 'calc( 50% - ' . round( $settings->icon_size / 2 ) . 'px )',
				'color'     => $icon_color,
				'height'    => '100%',
			),
		)
	);
	if ( empty( $settings->icon_size_medium ) ) {
		$settings->icon_size_medium = $settings->icon_size;
	}
	FLBuilderCSS::rule(
		array(
			'selector' => ".fl-node-$id .fl-bbvm-jetpack-sharing-for-beaverbuilder div.sharedaddy .sd-content ul li a.sd-button::before",
			'media'    => 'medium', // Optional. Can be `default`, `medium`, `responsive` or a custom statement.
			'props'    => array(
				'font-size' => $settings->icon_size_medium . 'px',
				'top'       => 'calc( 50% - ' . round( $settings->icon_size_medium / 2 ) . 'px )',
				'color'     => $icon_color,
				'height'    => '100%',
			),
		)
	);
	if ( empty( $settings->icon_size_responsive ) ) {
		$settings->icon_size_responsive = $settings->icon_size;
	}
	FLBuilderCSS::rule(
		array(
			'selector' => ".fl-node-$id .fl-bbvm-jetpack-sharing-for-beaverbuilder div.sharedaddy .sd-content ul li a.sd-button::before",
			'media'    => 'responsive', // Optional. Can be `default`, `medium`, `responsive` or a custom statement.
			'props'    => array(
				'font-size' => $settings->icon_size_responsive . 'px',
				'top'       => 'calc(50% - ' . round( $settings->icon_size_responsive / 2 ) . 'px)',
				'color'     => $icon_color . ' !important',
				'height'    => '100%',
			),
		)
	);
	FLBuilderCSS::rule(
		array(
			'selector' => ".fl-node-$id .fl-bbvm-jetpack-sharing-for-beaverbuilder div.sharedaddy .sd-content ul li a.sd-button:hover:before",
			'media'    => 'default', // Optional. Can be `default`, `medium`, `responsive` or a custom statement.
			'props'    => array(
				'color' => $icon_color_hover . ' !important',
			),
		)
	);
	FLBuilderCSS::rule(
		array(
			'selector' => ".fl-node-$id .fl-bbvm-jetpack-sharing-for-beaverbuilder div.sharedaddy .sd-content ul li a.sd-button:hover:before",
			'media'    => 'medium', // Optional. Can be `default`, `medium`, `responsive` or a custom statement.
			'props'    => array(
				'color' => $icon_color_hover . ' !important',
			),
		)
	);
	FLBuilderCSS::rule(
		array(
			'selector' => ".fl-node-$id .fl-bbvm-jetpack-sharing-for-beaverbuilder div.sharedaddy .sd-content ul li a.sd-button:hover:before",
			'media'    => 'responsive', // Optional. Can be `default`, `medium`, `responsive` or a custom statement.
			'props'    => array(
				'color' => $icon_color_hover . ' !important',
			),
		)
	);
endif;
if ( 'icon-text' === $settings->sharing_display || 'text' === $settings->sharing_display ) :
	?>
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-jetpack-sharing-for-beaverbuilder div.sharedaddy .sd-content ul li a.sd-button span {
		color: <?php echo esc_html( $button_text_color ); ?>;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-jetpack-sharing-for-beaverbuilder div.sharedaddy .sd-content ul li a.sd-button:hover span {
		color: <?php echo esc_html( $button_text_color_hover ); ?>;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-jetpack-sharing-for-beaverbuilder div.sharedaddy .sd-content ul li a.sd-button {
		display: flex;
		align-items: center;
	}
	<?php
	FLBuilderCSS::typography_field_rule(
		array(
			'settings'     => $settings,
			'setting_name' => 'button_typography',
			'selector'     => ".fl-node-$id .fl-bbvm-jetpack-sharing-for-beaverbuilder div.sharedaddy .sd-content ul li a.sd-button",
		)
	);
	FLBuilderCSS::border_field_rule(
		array(
			'settings'     => $settings,
			'setting_name' => 'button_border',
			'selector'     => ".fl-node-$id .fl-bbvm-jetpack-sharing-for-beaverbuilder div.sharedaddy .sd-content ul li a.sd-button",
		)
	);
	if ( 'color' === $settings->button_maybe_gradient ) :
		?>
		.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-jetpack-sharing-for-beaverbuilder div.sharedaddy .sd-content ul li a.sd-button {
			background: #<?php echo esc_html( $button_background_color ); ?>;
		}
		.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-jetpack-sharing-for-beaverbuilder div.sharedaddy .sd-content ul li a.sd-button:hover {
			background: <?php echo esc_html( $button_background_color_hover ); ?>;
		}
		<?php
	endif;
	if ( 'gradient' === $settings->button_maybe_gradient ) :
		?>
		.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-jetpack-sharing-for-beaverbuilder div.sharedaddy .sd-content ul li a.sd-button {
			background-image: <?php echo FLBuilderColor::gradient( $settings->button_background_gradient ); // phpcs:ignore ?> !important;
		}
		.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-jetpack-sharing-for-beaverbuilder div.sharedaddy .sd-content ul li a.sd-button:hover {
			background-image: <?php echo FLBuilderColor::gradient( $settings->button_background_gradient_hover ); // phpcs:ignore  ?> !important;
		}
		<?php
	endif;
	FLBuilderCSS::dimension_field_rule(
		array(
			'settings'     => $settings,
			'setting_name' => 'button_padding',
			'selector'     => ".fl-node-$id .fl-bbvm-jetpack-sharing-for-beaverbuilder div.sharedaddy .sd-content ul li a.sd-button",
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
			'settings'     => $settings,
			'setting_name' => 'button_margin',
			'selector'     => ".fl-node-$id .fl-bbvm-jetpack-sharing-for-beaverbuilder div.sharedaddy .sd-content ul li",
			'unit'         => 'px',
			'props'        => array(
				'margin-top'    => 'button_margin_top',
				'margin-right'  => 'button_margin_right',
				'margin-bottom' => 'button_margin_bottom',
				'margin-left'   => 'button_margin_left',
			),
		)
	);
	if ( 'flex' === $settings->button_layout_type ) {
		$num_columns  = absint( $settings->flex_columns );
		$column_width = floor( 100 / $num_columns );
		?>
		.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-jetpack-sharing-for-beaverbuilder div.sharedaddy .sd-content ul {
			display: flex;
			flex-wrap: wrap;
		}
		.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-jetpack-sharing-for-beaverbuilder div.sharedaddy .sd-content li {
			display: block;
			width: <?php echo absint( $column_width ); ?>%;
			box-sizing: border-box;
		}
		.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-jetpack-sharing-for-beaverbuilder div.sharedaddy .sd-content li a.sd-button {
			display: flex;
			justify-content: <?php echo esc_html( $settings->flex_layout_align ); ?>;
			height: 100%;
			width: 100% !important;
			box-sizing: border-box;
		}
		.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-jetpack-sharing-for-beaverbuilder div.sharedaddy .sd-content li a.sd-button:before {
			height: 100%;
		}
		@media only screen and (max-width: 1200px) {
			<?php if ( in_array( $num_columns, array( 6 ), true ) ) : ?>
			.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-jetpack-sharing-for-beaverbuilder div.sharedaddy .sd-content li {
				width: 20%;
			}
			<?php endif; ?>
		}
		@media only screen and (max-width: 1000px) {
			<?php if ( in_array( $num_columns, array( 6, 5 ), true ) ) : ?>
			.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-jetpack-sharing-for-beaverbuilder div.sharedaddy .sd-content li {
				width: 25%;
			}
			<?php endif; ?>
		}
		@media only screen and (max-width: 800px) {
			<?php if ( in_array( $num_columns, array( 6, 5, 4 ), true ) ) : ?>
			.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-jetpack-sharing-for-beaverbuilder div.sharedaddy .sd-content li {
				width: 33%;
			}
			<?php endif; ?>
		}
		@media only screen and (max-width: 600px) {
			<?php if ( in_array( $num_columns, array( 6, 5, 4, 3 ), true ) ) : ?>
			.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-jetpack-sharing-for-beaverbuilder div.sharedaddy .sd-content li {
				width: 50%;
			}
			<?php endif; ?>
		}
		@media only screen and (max-width: 500px) {
			<?php if ( in_array( $num_columns, array( 6, 5, 4, 3, 2 ), true ) ) : ?>
			.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-jetpack-sharing-for-beaverbuilder div.sharedaddy .sd-content li {
				width: 100%;
			}
			<?php endif; ?>
		}
		<?php
	}
	if ( 'block' === $settings->button_layout_type ) {
		FLBuilderCSS::rule(
			array(
				'selector' => ".fl-node-$id .fl-bbvm-jetpack-sharing-for-beaverbuilder div.sharedaddy .sd-content ul li",
				'media'    => 'default', // Optional. Can be `default`, `medium`, `responsive` or a custom statement.
				'props'    => array(
					'width' => $settings->block_width . '%',
				),
			)
		);
		FLBuilderCSS::rule(
			array(
				'selector' => ".fl-node-$id .fl-bbvm-jetpack-sharing-for-beaverbuilder div.sharedaddy .sd-content ul li",
				'media'    => 'medium', // Optional. Can be `default`, `medium`, `responsive` or a custom statement.
				'props'    => array(
					'width' => $settings->block_width_medium . 'px',
				),
			)
		);
		FLBuilderCSS::rule(
			array(
				'selector' => ".fl-node-$id .fl-bbvm-jetpack-sharing-for-beaverbuilder div.sharedaddy .sd-content ul li",
				'media'    => 'responsive', // Optional. Can be `default`, `medium`, `responsive` or a custom statement.
				'props'    => array(
					'width' => $settings->block_width_responsive . 'px',
				),
			)
		);
		?>
		.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-jetpack-sharing-for-beaverbuilder div.sharedaddy .sd-content li {
			display: block;
			box-sizing: border-box;
			margin: <?php echo esc_html( $settings->block_align ); ?> !important;
		}
		.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-jetpack-sharing-for-beaverbuilder div.sharedaddy .sd-content li a.sd-button {
			width: 100% !important;
			box-sizing: border-box;
			display: flex;
			justify-content: <?php echo esc_html( $settings->block_text_align ); ?>;
		}
		<?php
	}
	?>

	<?php
endif;

// Headline.
$sharing_headline_color = isset( $settings->sharing_headline_color ) ? esc_attr( $settings->sharing_headline_color ) : 'inherit';
$sharing_headline_color = BBVapor_Modules_Pro::get_color( $sharing_headline_color );
?>
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-jetpack-sharing-for-beaverbuilder div.sharedaddy h3.sd-title {
		color: <?php echo esc_html( $sharing_headline_color ); ?>;
}
<?php
if ( 'no' === $settings->sharing_headline_show_top_border ) {
	?>
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-jetpack-sharing-for-beaverbuilder div.sharedaddy h3.sd-title {
		border: 0;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-jetpack-sharing-for-beaverbuilder div.sharedaddy h3.sd-title:before {
		display: none;
	}
	<?php
}
if ( 'block' === $settings->sharing_headline_display ) {
	?>
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-jetpack-sharing-for-beaverbuilder div.sharedaddy h3.sd-title {
		display: block;
		text-align: <?php echo esc_html( $settings->sharing_headline_align ); ?>;
	}
	<?php
}
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'sharing_headline_padding',
		'selector'     => ".fl-node-$id .fl-bbvm-jetpack-sharing-for-beaverbuilder div.sharedaddy h3.sd-title",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'sharing_headline_padding_top',
			'padding-right'  => 'sharing_headline_padding_right',
			'padding-bottom' => 'sharing_headline_padding_bottom',
			'padding-left'   => 'sharing_headline_padding_left',
		),
	)
);
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'sharing_headline_margin',
		'selector'     => ".fl-node-$id .fl-bbvm-jetpack-sharing-for-beaverbuilder div.sharedaddy h3.sd-title",
		'unit'         => 'px',
		'props'        => array(
			'margin-top'    => 'sharing_headline_margin_top',
			'margin-right'  => 'sharing_headline_margin_right',
			'margin-bottom' => 'sharing_headline_margin_bottom',
			'margin-left'   => 'sharing_headline_margin_left',
		),
	)
);
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'sharing_headline_typography',
		'selector'     => ".fl-node-$id .fl-bbvm-jetpack-sharing-for-beaverbuilder div.sharedaddy h3.sd-title",
	)
);
