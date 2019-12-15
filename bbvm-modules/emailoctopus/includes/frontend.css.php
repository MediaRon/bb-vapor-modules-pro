<?php
/**
 * EmailOctopus Module.
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 1.6.0
 */

// Branding Styles.
if ( 'yes' === $settings->hide_credit ) {
	?>
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-emailoctopus-for-beaverbuilder .emailoctopus-referral {
		display: none;
	}
	<?php
}

// Layout styles.
if ( 'full_width' === $settings->layout ) :
	?>
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-emailoctopus-for-beaverbuilder .emailoctopus-form-row label,
	.fl-node-<?php echo esc_html( $id ); ?> .emailoctopus-form-row-subscribe button,
	.fl-node-<?php echo esc_html( $id ); ?> .emailoctopus-form-row-subscribe button:hover {
		width: 100%;
	}
	<?php
endif;

if ( 'full_width_centered' === $settings->layout ) :
	?>
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-emailoctopus-for-beaverbuilder .emailoctopus-form-row label,
	.fl-node-<?php echo esc_html( $id ); ?> .emailoctopus-form-row-subscribe button,
	.fl-node-<?php echo esc_html( $id ); ?> .emailoctopus-form-row-subscribe button:hover {
		width: 100%;
		text-align: center;
	}
	<?php
endif;

// Max Width.
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .fl-bbvm-emailoctopus-for-beaverbuilder",
		'media'    => 'default', // Optional. Can be `default`, `medium`, `responsive` or a custom statement.
		'props'    => array(
			'max-width' => $settings->max_width . '%',
			'margin'    => '0 auto',
		),
	)
);
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .fl-bbvm-emailoctopus-for-beaverbuilder",
		'media'    => 'medium', // Optional. Can be `default`, `medium`, `responsive` or a custom statement.
		'props'    => array(
			'max-width' => $settings->max_width_medium . '%',
			'margin'    => '0 auto',
		),
	)
);
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .fl-bbvm-emailoctopus-for-beaverbuilder",
		'media'    => 'responsive', // Optional. Can be `default`, `medium`, `responsive` or a custom statement.
		'props'    => array(
			'max-width' => $settings->max_width_responsive . '%',
			'margin'    => '0 auto',
		),
	)
);

// General Styles.
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'padding',
		'selector'     => ".fl-node-$id .fl-bbvm-emailoctopus-for-beaverbuilder .emailoctopus-form-wrapper",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'padding_top',
			'padding-right'  => 'padding_right',
			'padding-bottom' => 'padding_bottom',
			'padding-left'   => 'padding_left',
		),
	)
);
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'form_margin',
		'selector'     => ".fl-node-$id .fl-bbvm-emailoctopus-for-beaverbuilder .emailoctopus-form-wrapper",
		'unit'         => 'px',
		'props'        => array(
			'margin-top'    => 'form_margin_top',
			'margin-right'  => 'form_margin_right',
			'margin-bottom' => 'form_margin_bottom',
			'margin-left'   => 'form_margin_left',
		),
	)
);
if ( ! empty( $settings->overall_color ) ) :
	$text_color = BBVapor_Modules_Pro::get_color( $settings->overall_color );
	?>
	.fl-node-<?php echo esc_html( $id ); ?> .emailoctopus-form-wrapper {
		color: <?php echo esc_html( $text_color ); ?>;
	}
	<?php
endif;
if ( ! empty( $settings->form_background_color ) ) :
	$background_color = isset( $settings->form_background_color ) ? esc_attr( $settings->form_background_color ) : 'FFFFFF';
	$background_color = BBVapor_Modules_Pro::get_color( $background_color );
	?>
	.fl-node-<?php echo esc_html( $id ); ?> .emailoctopus-form-wrapper {
		background-color: <?php echo esc_html( $background_color ); ?>;
	}
	<?php
endif;

FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'form_radius',
		'selector'     => ".fl-node-$id .emailoctopus-form-wrapper",
		'unit'         => 'px',
		'props'        => array(
			'border-top-left-radius'     => 'form_radius_top',
			'border-top-right-radius'    => 'form_radius_right',
			'border-bottom-left-radius'  => 'form_radius_bottom',
			'border-bottom-right-radius' => 'form_radius_left',
		),
	)
);

// Label styling.
if ( ! empty( $settings->form_label_color ) ) :
	$text_color = BBVapor_Modules_Pro::get_color( $settings->form_label_color );
	?>
	.fl-node-<?php echo esc_html( $id ); ?> .emailoctopus-form-wrapper label {
		color: <?php echo esc_html( $text_color ); ?>;
	}
	<?php
endif;
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'label_padding',
		'selector'     => ".fl-node-$id .fl-bbvm-emailoctopus-for-beaverbuilder .emailoctopus-form-wrapper label",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'label_padding_top',
			'padding-right'  => 'label_padding_right',
			'padding-bottom' => 'label_padding_bottom',
			'padding-left'   => 'label_padding_left',
		),
	)
);
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'label_margin',
		'selector'     => ".fl-node-$id .fl-bbvm-emailoctopus-for-beaverbuilder .emailoctopus-form-wrapper label",
		'unit'         => 'px',
		'props'        => array(
			'margin-top'    => 'label_margin_top',
			'margin-right'  => 'label_margin_right',
			'margin-bottom' => 'label_margin_bottom',
			'margin-left'   => 'label_margin_left',
		),
	)
);

// Input Styling.
?>
.fl-node-<?php echo esc_html( $id ); ?> .emailoctopus-form-wrapper .emailoctopus-form-copy-wrapper label input[type=text],
.fl-node-<?php echo esc_html( $id ); ?> .emailoctopus-form-wrapper .emailoctopus-form-copy-wrapper label input[type=email] {
	background: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->input_background_color ) ); ?> !important;
	color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->input_text_color ) ); ?> !important;
	height: <?php echo absint( $settings->input_height ); ?>px;
	display: inline-block !important;
	border: <?php echo absint( $settings->input_border ); ?>px solid <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->input_border_color ) ); ?> !important;
	text-align: <?php echo esc_html( $settings->input_text_align ); ?>;
}
<?php
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'input_general_padding',
		'selector'     => ".fl-node-$id .emailoctopus-form-wrapper .emailoctopus-form-copy-wrapper label input[type=text], .fl-node-$id .emailoctopus-form-wrapper .emailoctopus-form-copy-wrapper label input[type=email]",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'input_general_padding_top',
			'padding-right'  => 'input_general_padding_right',
			'padding-bottom' => 'input_general_padding_bottom',
			'padding-left'   => 'input_general_padding_left',
		),
	)
);
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'input_general_margin',
		'selector'     => ".fl-node-$id .emailoctopus-form-wrapper .emailoctopus-form-copy-wrapper label input[type=text], .fl-node-$id .emailoctopus-form-wrapper .emailoctopus-form-copy-wrapper label input[type=email]",
		'unit'         => 'px',
		'props'        => array(
			'margin-top'    => 'input_general_margin_top',
			'margin-right'  => 'input_general_margin_right',
			'margin-bottom' => 'input_general_margin_bottom',
			'margin-left'   => 'input_general_margin_left',
		),
	)
);

// Typography settings.
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'form_title_typography',
		'selector'     => ".fl-node-$id .emailoctopus-form-wrapper .emailoctopus-heading",
	)
);
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'form_description_typography',
		'selector'     => ".fl-node-$id .emailoctopus-form-wrapper p",
	)
);
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'label_typography',
		'selector'     => ".fl-node-$id .emailoctopus-form-wrapper .emailoctopus-form-copy-wrapper label",
	)
);
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'input_typography',
		'selector'     => ".fl-node-$id .emailoctopus-form-wrapper .emailoctopus-form-copy-wrapper label input[type=text], .fl-node-$id .emailoctopus-form-wrapper .emailoctopus-form-copy-wrapper label input[type=email]",
	)
);
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'button_typography',
		'selector'     => ".fl-node-$id .emailoctopus-form-row-subscribe button, .fl-node-$id .emailoctopus-form-row-subscribe button:hover",
	)
);
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'input_border_radius',
		'selector'     => ".fl-node-$id .emailoctopus-form-wrapper .emailoctopus-form-copy-wrapper label input[type=text], .fl-node-$id .emailoctopus-form-wrapper .emailoctopus-form-copy-wrapper label input[type=email]",
		'unit'         => 'px',
		'props'        => array(
			'border-top-left-radius'     => 'input_border_radius_top',
			'border-top-right-radius'    => 'input_border_radius_right',
			'border-bottom-left-radius'  => 'input_border_radius_bottom',
			'border-bottom-right-radius' => 'input_border_radius_left',
		),
	)
);

// Button styles.

$button_background_color = isset( $settings->button_background ) ? esc_attr( $settings->button_background ) : '000000';
$button_background_color = BBVapor_Modules_Pro::get_color( $button_background_color );

FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'button_padding',
		'selector'     => ".fl-node-$id .emailoctopus-form-wrapper .emailoctopus-form-row-subscribe button, .fl-node-$id .emailoctopus-form-wrapper .emailoctopus-form-row-subscribe button:hover",
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
		'setting_name' => 'button_radius',
		'selector'     => ".fl-node-$id .emailoctopus-form-row-subscribe button, .fl-node-$id .emailoctopus-form-row-subscribe button:hover",
		'unit'         => 'px',
		'props'        => array(
			'border-top-left-radius'     => 'button_radius_top',
			'border-top-right-radius'    => 'button_radius_right',
			'border-bottom-left-radius'  => 'button_radius_bottom',
			'border-bottom-right-radius' => 'button_radius_left',
		),
	)
);
?>
.fl-node-<?php echo esc_html( $id ); ?> .emailoctopus-form-row-subscribe button {
	color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->button_color ) ); ?>;
	background: <?php echo esc_html( $button_background_color ); ?>;
	border-width: <?php echo absint( $settings->button_border ); ?>px;
	border-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->button_border_color ) ); ?>;
}
<?php
$button_background_hover_color = isset( $settings->button_background_hover ) ? esc_attr( $settings->button_background_hover ) : '000000';
$button_background_hover_color = BBVapor_Modules_Pro::get_color( $button_background_hover_color );
?>
.fl-node-<?php echo esc_html( $id ); ?> .emailoctopus-form-row-subscribe button:hover {
	border-width: <?php echo absint( $settings->button_border ); ?>px !important;
	border-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->button_border_color ) ); ?> !important;
	color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->button_color_hover ) ); ?> !important;
	background: <?php echo esc_html( $button_background_hover_color ); ?> !important;
}
.fl-node-<?php echo esc_html( $id ); ?> .emailoctopus-form-row-subscribe button:hover {
	color: inherit;
	background: inherit;
	border-width: inherit;
	border-color: inherit;
	font-size: inherit;
	line-height: inherit;
	border-radius: 0;
}
