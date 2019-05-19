.fl-node-<?php echo $id; ?> .fl-bbvm-card-for-beaverbuilder .fl-bbvm-card-icon-header {
	font-size: <?php echo absint( $settings->icon_font_size ); ?>px;
	color: #<?php echo $settings->icon_color; ?>;
	text-align: center;
}
.fl-node-<?php echo $id; ?> .fl-bbvm-card-for-beaverbuilder .fl-bbvm-card-icon-header .bbvm-card-icon {
	display: inline-block;
	background: #<?php echo $settings->icon_background; ?>;
	<?php
	if( 'rounded' === $settings->icon_appearance ):
	?>
	border-radius: 50%;
	<?php
	endif;
	?>
}
.fl-node-<?php echo $id; ?> .fl-bbvm-card-for-beaverbuilder {
	padding: 20px 10px;
}
.fl-node-<?php echo $id; ?> .fl-bbvm-card-for-beaverbuilder {
	color: #<?php echo $settings->text_color; ?>;
	border: <?php echo $settings->border; ?>px solid #<?php echo $settings->border_color; ?>;
	box-shadow: <?php echo FLBuilderColor::shadow( $settings->text_shadow ); ?>;
}
.fl-node-<?php echo $id; ?> .fl-bbvm-card-for-beaverbuilder:hover {
	color: #<?php echo $settings->text_color_hover; ?>;
	border: <?php echo $settings->border; ?>px solid #<?php echo $settings->border_color_hover; ?>;
	box-shadow: <?php echo FLBuilderColor::shadow( $settings->text_shadow_hover ); ?>;
}
<?php
FLBuilderCSS::dimension_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'border_radius',
	'selector' 	=> ".fl-node-$id .fl-bbvm-card-for-beaverbuilder",
	'unit'		=> 'px',
	'props'		=> array(
		'border-top-left-radius' 	 => 'border_radius_top',
		'border-top-right-radius'  => 'border_radius_right',
		'border-bottom-left-radius' => 'border_radius_bottom',
		'border-bottom-right-radius' 	 => 'border_radius_left',
	),
) );
if( 'color' === $settings->background_type ):
?>
.fl-node-<?php echo $id; ?> .fl-bbvm-card-for-beaverbuilder {
	background-color: #<?php echo $settings->background_color; ?>;
}
.fl-node-<?php echo $id; ?> .fl-bbvm-card-for-beaverbuilder:hover {
	background-color: #<?php echo $settings->background_color_hover; ?>;
}
<?php
endif;
if( 'gradient' === $settings->background_type ):
?>
.fl-node-<?php echo $id; ?> .fl-bbvm-card-for-beaverbuilder {
	background-image: <?php echo FLBuilderColor::gradient( $settings->background_gradient ); ?>;
}
.fl-node-<?php echo $id; ?> .fl-bbvm-card-for-beaverbuilder:hover {
	background-image: <?php echo FLBuilderColor::gradient( $settings->background_gradient_hover ); ?>;
}
<?php
endif;
FLBuilderCSS::dimension_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'padding',
	'selector' 	=> ".fl-node-$id .fl-bbvm-card-for-beaverbuilder",
	'unit'		=> 'px',
	'props'		=> array(
		'padding-top' 	 => 'padding_top',
		'padding-right'  => 'padding_right',
		'padding-bottom' => 'padding_bottom',
		'padding-left' 	 => 'padding_left',
	),
) );
?>
.fl-node-<?php echo $id; ?> .fl-bbvm-card-for-beaverbuilder:hover .fl-bbvm-card-icon-header .bbvm-card-icon {
	background: #<?php echo $settings->icon_background_hover; ?>;
	color: #<?php echo $settings->icon_color_hover; ?>;
}
<?php
FLBuilderCSS::dimension_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'icon_padding',
	'selector' 	=> ".fl-node-$id .fl-bbvm-card-for-beaverbuilder .fl-bbvm-card-icon-header .bbvm-card-icon",
	'unit'		=> 'px',
	'props'		=> array(
		'padding-top' 	 => 'icon_padding_top',
		'padding-right'  => 'icon_padding_right',
		'padding-bottom' => 'icon_padding_bottom',
		'padding-left' 	 => 'icon_padding_left',
	),
) );
?>
.fl-node-<?php echo $id; ?> .fl-bbvm-card-for-beaverbuilder .fl-bbvm-card-photo-header {
	text-align: center;
}
.fl-node-<?php echo $id; ?> .fl-bbvm-card-for-beaverbuilder .fl-bbvm-card-photo-header img.rounded {
	border-radius: 100%;
}
.fl-node-<?php echo $id; ?> .fl-bbvm-card-for-beaverbuilder .fl-bbvm-card-photo-header img {
	width: <?php echo absint( $settings->photo_size ); ?>px;
	height: <?php echo absint( $settings->photo_size ); ?>px;
}
.fl-node-<?php echo $id; ?> .fl-bbvm-card-heading {
	font-size: 18px;
	padding: 10px 20px;
	font-weight: 700;
	text-align: center;
}
<?php
FLBuilderCSS::typography_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'heading_typography',
	'selector' 	=> ".fl-node-$id .fl-bbvm-card-heading"
) );
FLBuilderCSS::dimension_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'heading_padding',
	'selector' 	=> ".fl-node-$id .fl-bbvm-card-heading",
	'unit'		=> 'px',
	'props'		=> array(
		'padding-top' 	 => 'heading_padding_top',
		'padding-right'  => 'heading_padding_right',
		'padding-bottom' => 'heading_padding_bottom',
		'padding-left' 	 => 'heading_padding_left',
	),
) );
?>
.fl-node-<?php echo $id; ?> .fl-bbvm-card-content {
	font-size: 18px;
	padding: 10px 20px;
	font-weight: 400;
	text-align: center;
}
<?php
FLBuilderCSS::typography_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'content_typography',
	'selector' 	=> ".fl-node-$id .fl-bbvm-card-content"
) );
FLBuilderCSS::dimension_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'content_padding',
	'selector' 	=> ".fl-node-$id .fl-bbvm-card-content",
	'unit'		=> 'px',
	'props'		=> array(
		'padding-top' 	 => 'content_padding_top',
		'padding-right'  => 'content_padding_right',
		'padding-bottom' => 'content_padding_bottom',
		'padding-left' 	 => 'content_padding_left',
	),
) );
?>
.fl-node-<?php echo $id; ?> .fl-bbvm-card-subheading {
	font-size: 18px;
	padding: 10px 20px;
	font-weight: 700;
	text-align: center;
}
<?php
FLBuilderCSS::typography_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'subheading_typography',
	'selector' 	=> ".fl-node-$id .fl-bbvm-card-subheading"
) );
FLBuilderCSS::dimension_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'subheading_padding',
	'selector' 	=> ".fl-node-$id .fl-bbvm-card-subheading",
	'unit'		=> 'px',
	'props'		=> array(
		'padding-top' 	 => 'subheading_padding_top',
		'padding-right'  => 'subheading_padding_right',
		'padding-bottom' => 'subheading_padding_bottom',
		'padding-left' 	 => 'subheading_padding_left',
	),
) );
?>
.fl-node-<?php echo $id; ?> .fl-bbvm-card-subheading-text {
	font-size: 18px;
	padding: 10px 20px;
	font-weight: 400;
	text-align: center;
}
<?php
FLBuilderCSS::typography_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'subheading_text_typography',
	'selector' 	=> ".fl-node-$id .fl-bbvm-card-subheading-text"
) );
FLBuilderCSS::dimension_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'subheading_text_padding',
	'selector' 	=> ".fl-node-$id .fl-bbvm-card-subheading-text",
	'unit'		=> 'px',
	'props'		=> array(
		'padding-top' 	 => 'subheading_text_padding_top',
		'padding-right'  => 'subheading_text_padding_right',
		'padding-bottom' => 'subheading_text_padding_bottom',
		'padding-left' 	 => 'subheading_text_padding_left',
	),
) );
?>
.fl-node-<?php echo $id; ?> .fl-bbvm-card-readmore a  {
	display: inline-block;
	font-size: 18px;
	padding: 10px 20px;
	font-weight: 400;
	margin: 0 auto;
	border: <?php echo $settings->button_border; ?>px solid #<?php echo $settings->button_border_color; ?>;
}
.fl-node-<?php echo $id; ?> .fl-bbvm-card-for-beaverbuilder .fl-bbvm-card-readmore a,
.fl-node-<?php echo $id; ?> .fl-bbvm-card-for-beaverbuilder .fl-bbvm-card-readmore a:hover,
.fl-node-<?php echo $id; ?> .fl-bbvm-card-for-beaverbuilder .fl-bbvm-card-readmore a:visited {
	color: #<?php echo $settings->button_text_color; ?>;
	text-decoration: none;
}
.fl-node-<?php echo $id; ?> .fl-bbvm-card-for-beaverbuilder a:hover {
	color: #<?php echo $settings->button_text_color_hover; ?>;
}
<?php
if( 'color' === $settings->button_background_type ):
?>
.fl-node-<?php echo $id; ?> .fl-bbvm-card-for-beaverbuilder .fl-bbvm-card-readmore a {
	background-color: #<?php echo $settings->button_background_color; ?>;
}
.fl-node-<?php echo $id; ?> .fl-bbvm-card-for-beaverbuilder .fl-bbvm-card-readmore a:hover {
	background-color: #<?php echo $settings->button_background_color_hover; ?>;
}
<?php
endif;
if( 'gradient' === $settings->button_background_type ):
?>
.fl-node-<?php echo $id; ?> .fl-bbvm-card-for-beaverbuilder .fl-bbvm-card-readmore a {
	background-image: <?php echo FLBuilderColor::gradient( $settings->button_color_gradient ); ?>;
}
.fl-node-<?php echo $id; ?> .fl-bbvm-card-for-beaverbuilder .fl-bbvm-card-readmore a:hover {
	background-image: <?php echo FLBuilderColor::gradient( $settings->button_color_gradient_hover ); ?>;
}
<?php
endif;
FLBuilderCSS::typography_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'readmore_text_typography',
	'selector' 	=> ".fl-node-$id .fl-bbvm-card-readmore, .fl-node-$id .fl-bbvm-card-readmore a"
) );
FLBuilderCSS::dimension_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'button_padding',
	'selector' 	=> ".fl-node-$id .fl-bbvm-card-readmore a",
	'unit'		=> 'px',
	'props'		=> array(
		'padding-top' 	 => 'button_padding_top',
		'padding-right'  => 'button_padding_right',
		'padding-bottom' => 'button_padding_bottom',
		'padding-left' 	 => 'button_padding_left',
	),
) );
FLBuilderCSS::dimension_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'button_border_radius',
	'selector' 	=> ".fl-node-$id .fl-bbvm-card-for-beaverbuilder .fl-bbvm-card-readmore a",
	'unit'		=> 'px',
	'props'		=> array(
		'border-top-left-radius' 	 => 'button_border_radius_top',
		'border-top-right-radius'  => 'button_border_radius_right',
		'border-bottom-left-radius' => 'button_border_radius_bottom',
		'border-bottom-right-radius' 	 => 'button_border_radius_left',
	),
) );
FLBuilderCSS::dimension_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'button_margin',
	'selector' 	=> ".fl-node-$id .fl-bbvm-card-readmore a",
	'unit'		=> 'px',
	'props'		=> array(
		'margin-top' 	 => 'button_margin_top',
		'margin-right'  => 'button_margin_right',
		'margin-bottom' => 'button_margin_bottom',
		'margin-left' 	 => 'button_margin_left',
	),
) );