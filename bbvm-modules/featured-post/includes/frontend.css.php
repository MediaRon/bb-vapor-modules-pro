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
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-featured,
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-category,
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-category span,
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-title,
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-read-more {
	display: inline-block;
	vertical-align: middle;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-featured {
	max-width: 75px;
	max-height: 75px;
	margin-right: 15px;
	border-radius: 100%;
	overflow: hidden;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-featured img {
	width: 100%;
	height: 100%;
	transition: all 0.5s ease-in-out;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-featured img:hover {
	transform: scale(1.2);
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-featured-post-wrapper {
	text-align: center;
}

<?php
// Category styles.
?>
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-category span {
	color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->category_color ) ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-category {
	background: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->category_background_color ) ); ?>;
	margin-right: 15px;
}
<?php
FLBuilderCSS::border_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'category_border',
		'selector'     => ".fl-node-$id .bbvm-category",
	)
);
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'category_typography',
		'selector'     => ".fl-node-$id .bbvm-category span",
	)
);
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'category_padding',
		'selector'     => ".fl-node-$id .bbvm-category span",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'category_padding_top',
			'padding-right'  => 'category_padding_right',
			'padding-bottom' => 'category_padding_bottom',
			'padding-left'   => 'category_padding_left',
		),
	)
);

// Title Styles.
?>
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-title a {
	color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->title_color ) ); ?>;
	margin-right: 15px;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-title a:hover {
	color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->title_color_hover ) ); ?>;
	margin-right: 15px;
}
<?php
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'title_typography',
		'selector'     => ".fl-node-$id .bbvm-title a",
	)
);

// Read More Styles.
?>
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-read-more a {
	color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->read_more_color ) ); ?>;
	margin-right: 15px;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-read-more a:hover {
	color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->read_more_color_hover ) ); ?>;
}
<?php
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'read_more_typography',
		'selector'     => ".fl-node-$id .bbvm-read-more a",
	)
);
?>
@media only screen and (max-width: 700px) {
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-featured,
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-category,
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-title,
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-read-more {
		display: block;
		text-align: center;
		margin: 0 auto;
		margin-bottom: 15px;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-category {
		display: inline-block;
	}
}
