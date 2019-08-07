<?php
/**
 * Restaurant Menu Category Module.
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 1.3.0
 */

?>
.fl-node-<?php echo esc_html( $id ); ?> h2,
.fl-node-<?php echo esc_html( $id ); ?> p,
.fl-node-<?php echo esc_html( $id ); ?> hr {
	position: relative;
	margin: 0;
	padding: 0;
	border: 0;
	background: transparent;
}
<?php
if ( 'line' === $settings->category_separator ) {
	if ( 'single' === $settings->category_separator_line ) {
		?>
		.fl-node-<?php echo esc_html( $id ); ?> .bbvm-restaurant-heading hr {
			background-color: #<?php echo esc_html( $settings->category_separator_line_color ); ?>;
			height: <?php echo absint( $settings->category_separator_line_height ); ?>px;
			margin: 10px 0;
		}
		<?php
	}
	if ( 'double' === $settings->category_separator_line ) {
		?>
		.fl-node-<?php echo esc_html( $id ); ?> .bbvm-restaurant-heading hr {
			height: 10px;
		}
		.fl-node-<?php echo esc_html( $id ); ?> .bbvm-restaurant-heading hr:before {
			content: ' ';
			background-color: #<?php echo esc_html( $settings->category_separator_line_color ); ?>;
			width: 100%;
			display: block;
			height: 2px;
			position: absolute;
			top: 0;
		}
		.fl-node-<?php echo esc_html( $id ); ?> .bbvm-restaurant-heading hr:after {
			content: ' ';
			background-color: #<?php echo esc_html( $settings->category_separator_line_color ); ?>;
			height: 2px;
			width: 100%;
			display: block;
			position: absolute;
			bottom: 0;
		}
		<?php
	}
} elseif ( 'image' === $settings->category_separator ) {
	?>
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-restaurant-heading hr {
		background: transparent url(<?php echo esc_url( $settings->category_separator_line_image_src ); ?>) top left repeat-x;
		height: <?php echo absint( $settings->category_separator_line_height ); ?>px;
		margin: 10px 0;
	}
	<?php
}
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'category_seperator_margin',
		'selector'     => ".fl-node-$id .bbvm-restaurant-heading hr",
		'unit'         => 'px',
		'props'        => array(
			'margin-top'    => 'category_seperator_margin_top',
			'margin-right'  => 'category_seperator_margin_right',
			'margin-bottom' => 'category_seperator_margin_bottom',
			'margin-left'   => 'category_seperator_margin_left',
		),
	)
);
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'category_typography',
		'selector'     => ".fl-node-$id .bbvm-restaurant-menu-items-heading",
	)
);
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'category_description_typography',
		'selector'     => ".fl-node-$id .bbvm-restaurant-menu-items-description",
	)
);
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'category_padding',
		'selector'     => ".fl-node-$id .bbvm-restaurant-menu-items-heading",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'category_padding_top',
			'padding-right'  => 'category_padding_right',
			'padding-bottom' => 'category_padding_bottom',
			'padding-left'   => 'category_padding_left',
		),
	)
);
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'category_description_padding',
		'selector'     => ".fl-node-$id .bbvm-restaurant-menu-items-description",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'category_description_padding_top',
			'padding-right'  => 'category_description_padding_right',
			'padding-bottom' => 'category_description_padding_bottom',
			'padding-left'   => 'category_description_padding_left',
		),
	)
);
