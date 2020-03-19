<?php
/**
 * Icon Module.
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 2.2.1
 */

// Image/Icon Container.
?>
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-icon-wrapper {
	display: flex;
}
<?php

// Image/Icon Size.
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .bbvm-icon i, .fl-node-$id .bbvm-icon img",
		'media'    => 'default', // Optional. Can be `default`, `medium`, `responsive` or a custom statement.
		'props'    => array(
			'max-width'  => $settings->size . 'px',
			'max-height' => $settings->size . 'px',
			'min-width'  => $settings->size . 'px',
			'min-height' => $settings->size . 'px',
			'font-size'  => $settings->size . 'px',
		),
	)
);
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .bbvm-icon i, .fl-node-$id .bbvm-icon img",
		'media'    => 'medium', // Optional. Can be `default`, `medium`, `responsive` or a custom statement.
		'props'    => array(
			'max-width'  => $settings->size_medium . 'px',
			'max-height' => $settings->size_medium . 'px',
			'font-size'  => $settings->size_medium . 'px',
			'min-width'  => $settings->size_medium . 'px',
			'min-height' => $settings->size_medium . 'px',
		),
	)
);
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .bbvm-icon i, .fl-node-$id .bbvm-icon img",
		'media'    => 'responsive', // Optional. Can be `default`, `medium`, `responsive` or a custom statement.
		'props'    => array(
			'max-width'  => $settings->size_responsive . 'px',
			'max-height' => $settings->size_responsive . 'px',
			'font-size'  => $settings->size_responsive . 'px',
			'min-width'  => $settings->size_responsive . 'px',
			'min-height' => $settings->size_responsive . 'px',
		),
	)
);

// Icon Styles.
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'icon_padding',
		'selector'     => ".fl-node-$id .bbvm-icon i",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'icon_padding_top',
			'padding-right'  => 'icon_padding_right',
			'padding-bottom' => 'icon_padding_bottom',
			'padding-left'   => 'icon_padding_left',
		),
	)
);
?>
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-icon i {
	color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->icon_color ) ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-icon i:hover {
	color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->icon_color_hover ) ); ?>;
}
<?php
if ( 'color' === $settings->icon_background_type ) :
	?>
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-icon i {
		background: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->icon_background_color ) ); ?>;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-icon i:hover {
		background: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->icon_background_color_hover ) ); ?>;
	}
	<?php
endif;
if ( 'gradient' === $settings->icon_background_type ) :
	?>
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-icon i {
		background-image: <?php echo esc_html( FLBuilderColor::gradient( $settings->icon_gradient_color ) ); ?>;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-icon i:hover {
		background-image: <?php echo esc_html( FLBuilderColor::gradient( $settings->icon_gradient_color_hover ) ); ?>;
	}
	<?php
endif;
if ( 'circle' === $settings->icon_appearance ) :
	?>
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-icon i {
		border-radius: 100%;
	}
	<?php
endif;

// Photo Styles.
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'image_padding',
		'selector'     => ".fl-node-$id .bbvm-icon img",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'image_padding_top',
			'padding-right'  => 'image_padding_right',
			'padding-bottom' => 'image_padding_bottom',
			'padding-left'   => 'image_padding_left',
		),
	)
);
if ( 'color' === $settings->image_background_type ) :
	?>
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-icon img {
		background: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->image_background_color ) ); ?>;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-icon img:hover {
		background: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->image_background_color_hover ) ); ?>;
	}
	<?php
endif;
if ( 'gradient' === $settings->image_background_type ) :
	?>
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-icon img {
		background-image: <?php echo esc_html( FLBuilderColor::gradient( $settings->image_gradient_color ) ); ?>;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-icon img:hover {
		background-image: <?php echo esc_html( FLBuilderColor::gradient( $settings->image_gradient_color_hover ) ); ?>;
	}
	<?php
endif;
if ( 'circle' === $settings->image_appearance ) :
	?>
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-icon img {
		border-radius: 100%;
	}
	<?php
endif;

// Vertical Alignment.
if ( 'top' === $settings->vertical_alignment ) {
	?>
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-icon-wrapper {
		align-items: flex-start;
	}
	<?php
}
if ( 'middle' === $settings->vertical_alignment ) {
	?>
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-icon-wrapper {
		align-items: center;
	}
	<?php
}
if ( 'bottom' === $settings->vertical_alignment ) {
	?>
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-icon-wrapper {
		align-items: flex-end;
	}
	<?php
}

// Horizontal Alignment.
if ( 'left' === $settings->alignment ) {
	?>
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-icon-wrapper {
		justify-content: flex-start;
	}
	<?php
}
if ( 'center' === $settings->alignment ) {
	?>
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-icon-wrapper {
		justify-content: center;
	}
	<?php
}
if ( 'right' === $settings->alignment ) {
	?>
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-icon-wrapper {
		justify-content: flex-end;
	}
	<?php
}
// Text Padding Left Spacing.
?>
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-text {
	padding-left: <?php echo absint( $settings->spacing ); ?>px;
}
<?php

// Text color.
?>
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-text {
	color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->text_color ) ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-text p {
	margin: 0;
}
<?php
// Text Typography.
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'text_typography',
		'selector'     => ".fl-node-$id .bbvm-text",
	)
);
