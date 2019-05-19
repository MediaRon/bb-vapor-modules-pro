<?php
// Background Color
$background_color = isset( $settings->copyright_background_color ) ? esc_attr( $settings->copyright_background_color ) : 'FFFFFF';
if( 6 === strlen( $background_color ) ) {
	$background_color = '#' . $background_color;
}

// General Typography
?>
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=text],
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=password],
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=email],
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=tel],
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=date],
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=month],
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=week],
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=time],
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=number],
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=search],
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=url],
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> textarea {
	display: block;
	padding: 15px;
	margin: 10px 0 15px 0;
	font-size: 14px;
	line-height: 1.4;
	color: #808080;
	height: 50px;
	vertical-align: middle;
	background-color: #fcfcfc;
	background-image: none;
	border: 1px solid #e6e6e6;
	-moz-transition: all ease-in-out .15s;
	-webkit-transition: all ease-in-out .15s;
	transition: all ease-in-out .15s;
	-moz-box-shadow: none;
	-webkit-box-shadow: none;
	box-shadow: none;
	-moz-border-radius: 4px;
	-webkit-border-radius: 4px;
	border-radius: 4px;
}
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> select {
	-webkit-appearance: none;
	-moz-appearance: none;
	appearance: none;
}
<?php

// Padding
FLBuilderCSS::dimension_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'padding',
	'selector' 	=> ".fl-node-$id .fl-bbvm-gravityforms-for-beaverbuilder, .fl-node-$id .fl-bbvm-gravityforms-for-beaverbuilder .gform_wrapper",
	'unit'		=> 'px',
	'props'		=> array(
		'padding-top' 	 => 'padding_top',
		'padding-right'  => 'padding_right',
		'padding-bottom' => 'padding_bottom',
		'padding-left' 	 => 'padding_left',
	),
) );
FLBuilderCSS::dimension_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'form_margin',
	'selector' 	=> ".fl-node-$id .fl-bbvm-gravityforms-for-beaverbuilder, .fl-node-$id .fl-bbvm-gravityforms-for-beaverbuilder .gform_wrapper",
	'unit'		=> 'px',
	'props'		=> array(
		'margin-top' 	 => 'form_margin_top',
		'margin-right'  => 'form_margin_right',
		'margin-bottom' => 'form_margin_bottom',
		'margin-left' 	 => 'form_margin_left',
	),
) );
// Full Width Centered
if ( 'full_width_centered' === $settings->layout ) :
?>
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=text],
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=password],
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=email],
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=tel],
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=date],
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=month],
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=week],
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=time],
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=number],
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=search],
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=url],
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=submit],
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=button],
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> textarea,
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> .ginput_container span,
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> .gfinput_container span label,
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> .gfield_label,
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=text]::placeholder,
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=password]::placeholder,
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=email]::placeholder,
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=tel]::placeholder,
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=date]::placeholder,
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=month]::placeholder,
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=week]::placeholder,
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=time]::placeholder,
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=number]::placeholder,
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=search]::placeholder,
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=url]::placeholder,
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> textarea::placeholder,
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> .ginput_container span::placeholder,
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> .gfinput_container span label::placeholder
 {
	display: inline-block;
	width: 100%;
	text-align: center !important;
	text-align-last: center !important;
}
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=button], .fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=submit], .fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> button {
	text-align: center;
	margin: 0 auto;
}
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> span.gfield_required {
	display: inline;
	width: 10px;
}

<?php
endif;

// Full Width Centered
if ( 'full_width' === $settings->layout ) :
?>
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=text],
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=password],
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=email],
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=tel],
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=date],
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=month],
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=week],
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=time],
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=number],
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=search],
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=url],
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=submit],
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=button],
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> textarea,
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> .ginput_container span,
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> .gfinput_container span label,
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> .gfield_label,
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=text]::placeholder,
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=password]::placeholder,
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=email]::placeholder,
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=tel]::placeholder,
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=date]::placeholder,
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=month]::placeholder,
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=week]::placeholder,
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=time]::placeholder,
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=number]::placeholder,
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=search]::placeholder,
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=url]::placeholder,
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> textarea::placeholder,
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> .ginput_container span::placeholder,
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> .gfinput_container span label::placeholder
	{
	display: inline-block;
	width: 100%;
	text-align: left;
	text-align-last: left;
}
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=button], .fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=submit], .fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> button {
	text-align: center !important;
	text-align-last: center !important;
	margin: 0 auto;
}
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> span.gfield_required {
	display: inline;
	width: 10px;
}
<?php
endif;
?>
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> span label {
	color: #<?php echo $settings->form_sub_label_color; ?>;
}
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> .gfield_label {
	color: #<?php echo $settings->form_label_color; ?>;
}
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=text],
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=password],
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=email],
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=tel],
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=date],
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=month],
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=week],
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=time],
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=number],
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=search],
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=url] {
	height: <?php echo absint( $settings->input_height ); ?>px;
}
<?php
// Max Width
FLBuilderCSS::rule( array(
	'selector' => ".fl-node-$id .fl-bbvm-gravityforms-for-beaverbuilder",
	'media' => 'default', // Optional. Can be `default`, `medium`, `responsive` or a custom statement.
	'props' => array(
		'max-width' => $settings->max_width . '%',
		'margin'    => '0 auto'
	),
) );
FLBuilderCSS::rule( array(
	'selector' => ".fl-node-$id .fl-bbvm-gravityforms-for-beaverbuilder",
	'media' => 'medium', // Optional. Can be `default`, `medium`, `responsive` or a custom statement.
	'props' => array(
		'max-width' => $settings->max_width_medium . '%',
		'margin'    => '0 auto'
	),
) );
FLBuilderCSS::rule( array(
	'selector' => ".fl-node-$id .fl-bbvm-gravityforms-for-beaverbuilder",
	'media' => 'responsive', // Optional. Can be `default`, `medium`, `responsive` or a custom statement.
	'props' => array(
		'max-width' => $settings->max_width_responsive . '%',
		'margin'    => '0 auto'
	),
) );

// Pagination Progress Title
FLBuilderCSS::typography_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'progress_title',
	'selector' 	=> ".fl-node-$id #gform_{$settings->form} .gf_progressbar_wrapper h3.gf_progressbar_title",
) );
if( ! empty( $settings->progress_title_show ) && 'no' === $settings->progress_title_show ):
?>
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> .gf_progressbar_wrapper h3.gf_progressbar_title {
	display: none;
}
<?php
endif;
if( ! empty( $settings->progress_title_color ) ):
?>
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> .gf_progressbar_wrapper h3.gf_progressbar_title {
	color: #<?php echo $settings->progress_title_color; ?>;
}
<?php
endif;

// Pagination Progress Bar
if( isset( $settings->progress_bar_outer_border_radius ) ):
?>
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> .gf_progressbar_wrapper .gf_progressbar {
	border-radius: <?php echo absint( $settings->progress_bar_outer_border_radius ); ?>px;
	-moz-border-radius: <?php echo absint( $settings->progress_bar_outer_border_radius ); ?>px;
	-webkit-border-radius: <?php echo absint( $settings->progress_bar_outer_border_radius ); ?>px;
}
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> .gf_progressbar_wrapper .gf_progressbar_percentage:after {
	border-radius: <?php echo absint( $settings->progress_bar_outer_border_radius ); ?>px;
	-moz-border-radius: <?php echo absint( $settings->progress_bar_outer_border_radius ); ?>px;
	-webkit-border-radius: <?php echo absint( $settings->progress_bar_outer_border_radius ); ?>px;
}
<?php
endif;
FLBuilderCSS::dimension_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'progress_bar_inner_border_radius',
	'selector' 	=> ".fl-node-$id #gform_{$settings->form} .gf_progressbar_wrapper .gf_progressbar_percentage",
	'unit'		=> 'px',
	'props'		=> array(
		'border-top-left-radius' 	 => 'progress_bar_inner_border_radius_top',
		'border-top-right-radius'  => 'progress_bar_inner_border_radius_right',
		'border-bottom-left-radius' => 'progress_bar_inner_border_radius_bottom',
		'border-bottom-right-radius' 	 => 'progress_bar_inner_border_radius_left',
	),
) );
FLBuilderCSS::dimension_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'progress_bar_inner_border_radius',
	'selector' 	=> ".fl-node-$id #gform_{$settings->form} .gf_progressbar_wrapper .gf_progressbar:after",
	'unit'		=> 'px',
	'props'		=> array(
		'border-top-left-radius' 	 => 'progress_bar_inner_border_radius_top',
		'border-top-right-radius'  => 'progress_bar_inner_border_radius_right',
		'border-bottom-left-radius' => 'progress_bar_inner_border_radius_bottom',
		'border-bottom-right-radius' 	 => 'progress_bar_inner_border_radius_left',
	),
) );

// Progress Bar Color and Text
if( ! empty( $settings->progress_bar_inner_color ) ):
?>
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> .gf_progressbar_wrapper .gf_progressbar_percentage {
	background-color: #<?php echo $settings->progress_bar_inner_color; ?>;
}
<?php
endif;
if( ! empty( $settings->progress_bar_outer_color ) ):
$progress_bar_outer_background_color = isset( $settings->progress_bar_outer_color ) ? esc_attr( $settings->progress_bar_outer_color ) : 'transparent';
if( 6 === strlen( $progress_bar_outer_background_color ) ) {
	$progress_bar_outer_background_color = '#' . $progress_bar_outer_background_color;
}
?>
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> .gf_progressbar_wrapper .gf_progressbar {
	background-color: <?php echo $progress_bar_outer_background_color ?>;
	-webkit-box-shadow: none;
	-moz-box-shadow: none;
	box-shadow: none;
}
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> .gf_progressbar_wrapper .gf_progressbar:after {
	background-color: <?php echo $progress_bar_outer_background_color ?>;
	-webkit-box-shadow: none;
	-moz-box-shadow: none;
	box-shadow: none;
}
<?php
endif;
FLBuilderCSS::dimension_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'progress_bar_padding',
	'selector' 	=> ".fl-node-$id #gform_{$settings->form} .gf_progressbar_wrapper .gf_progressbar",
	'unit'		=> 'px',
	'props'		=> array(
		'padding-top' 	 => 'progress_bar_padding_top',
		'padding-right'  => 'progress_bar_padding_right',
		'padding-bottom' => 'progress_bar_padding_bottom',
		'padding-left' 	 => 'progress_bar_padding_left',
	),
) );
FLBuilderCSS::typography_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'progress_bar_text_typography',
	'selector' 	=> ".fl-node-$id #gform_{$settings->form} .gf_progressbar_wrapper .gf_progressbar_percentage span",
) );
?>
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> .gf_progressbar_wrapper .gf_progressbar_percentage span {
	display: inline-block;
	color: #<?php echo $settings->progress_bar_text_color ?>;
}
<?php
// Pagination Steps Styles
FLBuilderCSS::dimension_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'progress_steps_internal_margin',
	'selector' 	=> ".fl-node-$id #gform_{$settings->form} .gf_page_steps .gf_step",
	'unit'		=> 'px',
	'props'		=> array(
		'margin-top' 	 => 'progress_steps_internal_margin_top',
		'margin-right'  => 'progress_steps_internal_margin_right',
		'margin-bottom' => 'progress_steps_internal_margin_bottom',
		'margin-left' 	 => 'progress_steps_internal_margin_left',
	),
) );
FLBuilderCSS::dimension_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'progress_steps_padding',
	'selector' 	=> ".fl-node-$id #gform_{$settings->form} .gf_page_steps .gf_step",
	'unit'		=> 'px',
	'props'		=> array(
		'padding-top' 	 => 'progress_steps_padding_top',
		'padding-right'  => 'progress_steps_padding_right',
		'padding-bottom' => 'progress_steps_padding_bottom',
		'padding-left' 	 => 'progress_steps_padding_left',
	),
) );
?>
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> .gf_page_steps .gf_step {
	height: auto;
}
<?php
if( ! empty( $settings->progress_steps_active_background_color ) ):
?>
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> .gf_page_steps .gf_step.gf_step_active,
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> .gf_page_steps .gf_step.gf_step_completed {
	background-color: #<?php echo $settings->progress_steps_active_background_color; ?>;
	color: #<?php echo $settings->progress_steps_active_text_color; ?>;
}
<?php
endif;
if( ! empty( $settings->progress_steps_active_border_color ) ):
?>
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> .gf_page_steps .gf_step.gf_step_active, .fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> .gf_page_steps .gf_step.gf_step_completed,   {
	border-color: #<?php echo $settings->progress_steps_active_border_color; ?>;
	border-style: solid;
}
<?php
endif;
FLBuilderCSS::dimension_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'progress_steps_active_border',
	'selector' 	=> ".fl-node-$id #gform_{$settings->form} .gf_page_steps .gf_step.gf_step_active, .fl-node-$id #gform_{$settings->form} .gf_page_steps .gf_step.gf_step_completed",
	'unit'		=> 'px',
	'props'		=> array(
		'border-top-width' 	 => 'progress_steps_active_border_top',
		'border-right-width'  => 'progress_steps_active_border_right',
		'border-bottom-width' => 'progress_steps_active_border_bottom',
		'border-left-width' 	 => 'progress_steps_active_border_left',
	),
) );
FLBuilderCSS::dimension_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'progress_steps_active_border_radius',
	'selector' 	=> ".fl-node-$id #gform_{$settings->form} .gf_page_steps .gf_step.gf_step_active, .fl-node-$id #gform_{$settings->form} .gf_page_steps .gf_step.gf_step_completed",
	'unit'		=> 'px',
	'props'		=> array(
		'border-top-left-radius' 	 => 'progress_steps_active_border_radius_top',
		'border-top-right-radius'  => 'progress_steps_active_border_radius_right',
		'border-bottom-left-radius' => 'progress_steps_active_border_radius_bottom',
		'border-bottom-right-radius' 	 => 'progress_steps_active_border_radius_left',
	),
) );
FLBuilderCSS::typography_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'progress_steps_active_typography',
	'selector' 	=> ".fl-node-$id #gform_{$settings->form} .gf_page_steps .gf_step.gf_step_active .gf_step_label, .fl-node-$id #gform_{$settings->form} .gf_page_steps .gf_step.gf_step_completed .gf_step_number",
) );
if( ! empty( $settings->progress_steps_inactive_background_color ) ):
?>
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> .gf_page_steps .gf_step.gf_step_pending,
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> .gf_page_steps .gf_step.gf_step_completed {
	background-color: #<?php echo $settings->progress_steps_inactive_background_color; ?>;
	color: #<?php echo $settings->progress_steps_inactive_text_color; ?>;
}
<?php
endif;
if ( ! empty( $settings->progress_steps_inactive_border_color ) ):
?>
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> .gf_page_steps .gf_step.gf_step_pending,
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> .gf_page_steps .gf_step.gf_step_completed {
	border-color: #<?php echo $settings->progress_steps_inactive_border_color; ?>;
	border-style: solid;
}
<?php
endif;
if( ! empty( $settings->progress_steps_inactive_opacity ) ):
?>
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> .gf_page_steps .gf_step.gf_step_pending,
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> .gf_page_steps .gf_step.gf_step_completed{
	opacity: <?php echo $settings->progress_steps_inactive_opacity; ?>;
}
<?php
endif;
FLBuilderCSS::dimension_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'progress_steps_inactive_border',
	'selector' 	=> ".fl-node-$id #gform_{$settings->form} .gf_page_steps .gf_step.gf_step_pending, .fl-node-$id #gform_{$settings->form} .gf_page_steps .gf_step.gf_step_completed",
	'unit'		=> 'px',
	'props'		=> array(
		'border-top-width' 	 => 'progress_steps_inactive_border_top',
		'border-right-width'  => 'progress_steps_inactive_border_right',
		'border-bottom-width' => 'progress_steps_inactive_border_bottom',
		'border-left-width' 	 => 'progress_steps_inactive_border_left',
	),
) );
FLBuilderCSS::dimension_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'progress_steps_inactive_border_radius',
	'selector' 	=> ".fl-node-$id #gform_{$settings->form} .gf_page_steps .gf_step.gf_step_pending, .fl-node-$id #gform_{$settings->form} .gf_page_steps .gf_step.gf_step_completed",
	'unit'		=> 'px',
	'props'		=> array(
		'border-top-left-radius' 	 => 'progress_steps_inactive_border_radius_top',
		'border-top-right-radius'  => 'progress_steps_inactive_border_radius_right',
		'border-bottom-left-radius' => 'progress_steps_inactive_border_radius_bottom',
		'border-bottom-right-radius' 	 => 'progress_steps_inactive_border_radius_left',
	),
) );
FLBuilderCSS::typography_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'progress_steps_inactive_typography',
	'selector' 	=> ".fl-node-$id #gform_{$settings->form} .gf_page_steps .gf_step.gf_step_pending .gf_step_label, .fl-node-$id #gform_{$settings->form} .gf_page_steps .gf_step.gf_step_pending .gf_step_number, .fl-node-$id #gform_{$settings->form} .gf_page_steps .gf_step.gf_step_completed .gf_step_label, .fl-node-$id #gform_{$settings->form} .gf_page_steps .gf_step.gf_step_completed .gf_step_number",
) );

// General form styling
if( ! empty( $settings->form_background_color ) ) :
	$background_color = isset( $settings->form_background_color ) ? esc_attr( $settings->form_background_color ) : 'FFFFFF';
	if( 6 === strlen( $background_color ) ) {
		$background_color = '#' . $background_color;
	}
	?>
	.fl-node-<?php echo $id; ?> .fl-bbvm-gravityforms-for-beaverbuilder {
		background-color: <?php echo $background_color; ?>;
	}
<?php
endif;
FLBuilderCSS::dimension_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'form_radius',
	'selector' 	=> ".fl-node-$id .fl-bbvm-gravityforms-for-beaverbuilder",
	'unit'		=> 'px',
	'props'		=> array(
		'border-top-left-radius' 	 => 'form_radius_top',
		'border-top-right-radius'  => 'form_radius_right',
		'border-bottom-left-radius' => 'form_radius_bottom',
		'border-bottom-right-radius' 	 => 'form_radius_left',
	),
) );
if( ! empty( $settings->form_show_labels ) && 'no' === $settings->form_show_labels ):
?>
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> .gfield .gfield_label {
	display: none;
}
<?php
endif;
if( ! empty( $settings->form_show_description ) && 'no' === $settings->form_show_description ):
?>
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> .ginput_container_name label
,.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> .ginput_container label,
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> .gfield_description {
	display: none;
}
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> ul.gfield_radio label,
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> ul.gfield_checkbox label {
	display: inline-block;
}
<?php
endif;
if( ! empty( $settings->form_show_placeholders ) && 'no' === $settings->form_show_placeholders ):
?>
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> .ginput_container input::-webkit-input-placeholder {
	color: transparent;
}
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> .gfield_radio label {
	display: inline-block;
}
<?php
endif;

// Inputs
FLBuilderCSS::dimension_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'input_padding',
	'selector' 	=> ".fl-node-$id #gform_{$settings->form} input[type=text], .fl-node-$id #gform_{$settings->form} input[type=password], .fl-node-$id #gform_{$settings->form} input[type=email], .fl-node-$id #gform_{$settings->form} input[type=tel], .fl-node-$id #gform_{$settings->form} input[type=date], .fl-node-$id #gform_{$settings->form} input[type=month], .fl-node-$id #gform_{$settings->form} input[type=week], .fl-node-$id #gform_{$settings->form} input[type=time], .fl-node-$id #gform_{$settings->form} input[type=number], .fl-node-$id #gform_{$settings->form} input[type=search], .fl-node-$id #gform_{$settings->form} input[type=url]",
	'unit'		=> 'px',
	'props'		=> array(
		'padding-top' 	 => 'input_padding_top',
		'padding-right'  => 'input_padding_right',
		'padding-bottom' => 'input_padding_bottom',
		'padding-left' 	 => 'input_padding_left',
	),
) );
$input_background_color = isset( $settings->input_background_color ) ? esc_attr( $settings->input_background_color ) : 'FFFFFF';
if( 6 === strlen( $input_background_color ) ) {
	$input_background_color = '#' . $input_background_color;
}
?>
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=text],
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=password],
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=email],
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=tel],
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=date],
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=month],
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=week],
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=time],
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=number],
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=search],
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=url] {
	background: <?php echo $input_background_color ?>;
	border: <?php echo $settings->input_border_width; ?>px solid #<?php echo $settings->input_border_color; ?>;
	color: #<?php echo $settings->input_text_color; ?>;
}
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=text],
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=password],
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=email],
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=tel],
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=date],
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=month],
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=week],
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=time],
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=number],
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=search],
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=url],
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=submit],
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=button],
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> textarea,
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> .ginput_container span,
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> .gfinput_container span label,
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> .gfield_label,
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=text]::placeholder,
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=password]::placeholder,
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=email]::placeholder,
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=tel]::placeholder,
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=date]::placeholder,
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=month]::placeholder,
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=week]::placeholder,
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=time]::placeholder,
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=number]::placeholder,
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=search]::placeholder,
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=url]::placeholder,
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> textarea::placeholder,
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> .ginput_container span::placeholder,
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> .gfinput_container span label::placeholder {
	text-align: <?php echo $settings->input_text_align; ?>;
	text-align-last: <?php echo $settings->input_text_align; ?>;
}
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> select {
	text-align: <?php echo $settings->select_align; ?>;
	text-align-last: <?php echo $settings->select_align; ?>;
}
<?php
FLBuilderCSS::dimension_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'input_border',
	'selector' 	=> ".fl-node-$id #gform_{$settings->form} input[type=text], .fl-node-$id #gform_{$settings->form} input[type=password], .fl-node-$id #gform_{$settings->form} input[type=email], .fl-node-$id #gform_{$settings->form} input[type=tel], .fl-node-$id #gform_{$settings->form} input[type=date], .fl-node-$id #gform_{$settings->form} input[type=month], .fl-node-$id #gform_{$settings->form} input[type=week], .fl-node-$id #gform_{$settings->form} input[type=time], .fl-node-$id #gform_{$settings->form} input[type=number], .fl-node-$id #gform_{$settings->form} input[type=search], .fl-node-$id #gform_{$settings->form} input[type=url]",
	'unit'		=> 'px',
	'props'		=> array(
		'border-top-width' 	 => 'input_border_top',
		'border-right-width'  => 'input_border_right',
		'border-bottom-width' => 'input_border_bottom',
		'border-left-width' 	 => 'input_border_left',
	),
) );
FLBuilderCSS::dimension_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'input_border_radius',
	'selector' 	=> ".fl-node-$id #gform_{$settings->form} input[type=text], .fl-node-$id #gform_{$settings->form} input[type=password], .fl-node-$id #gform_{$settings->form} input[type=email], .fl-node-$id #gform_{$settings->form} input[type=tel], .fl-node-$id #gform_{$settings->form} input[type=date], .fl-node-$id #gform_{$settings->form} input[type=month], .fl-node-$id #gform_{$settings->form} input[type=week], .fl-node-$id #gform_{$settings->form} input[type=time], .fl-node-$id #gform_{$settings->form} input[type=number], .fl-node-$id #gform_{$settings->form} input[type=search], .fl-node-$id #gform_{$settings->form} input[type=url]",
	'unit'		=> 'px',
	'props'		=> array(
		'border-top-left-radius' 	 => 'input_border_radius_top',
		'border-top-right-radius'  => 'input_border_radius_right',
		'border-bottom-left-radius' => 'input_border_radius_bottom',
		'border-bottom-right-radius' 	 => 'input_border_radius_left',
	),
) );

// Selects
FLBuilderCSS::dimension_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'select_padding',
	'selector' 	=> ".fl-node-$id #gform_{$settings->form} select",
	'unit'		=> 'px',
	'props'		=> array(
		'padding-top' 	 => 'select_padding_top',
		'padding-right'  => 'select_padding_right',
		'padding-bottom' => 'select_padding_bottom',
		'padding-left' 	 => 'select_padding_left',
	),
) );
FLBuilderCSS::dimension_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'form_title_padding',
	'selector' 	=> ".fl-node-$id #gform_{$settings->form} .gform_title, .fl-node-$id .form-heading",
	'unit'		=> 'px',
	'props'		=> array(
		'padding-top' 	 => 'form_title_padding_top',
		'padding-right'  => 'form_title_padding_right',
		'padding-bottom' => 'form_title_padding_bottom',
		'padding-left' 	 => 'form_title_padding_left',
	),
) );
FLBuilderCSS::dimension_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'form_description_padding',
	'selector' 	=> ".fl-node-$id #gform_{$settings->form} .gform_description, .fl-node-$id .form-description",
	'unit'		=> 'px',
	'props'		=> array(
		'padding-top' 	 => 'form_description_padding_top',
		'padding-right'  => 'form_description_padding_right',
		'padding-bottom' => 'form_description_padding_bottom',
		'padding-left' 	 => 'form_description_padding_left',
	),
) );
FLBuilderCSS::dimension_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'form_title_margin',
	'selector' 	=> ".fl-node-$id #gform_{$settings->form} .gform_title, .fl-node-$id .form-heading",
	'unit'		=> 'px',
	'props'		=> array(
		'margin-top' 	 => 'form_title_margin_top',
		'margin-right'  => 'form_title_margin_right',
		'margin-bottom' => 'form_title_margin_bottom',
		'margin-left' 	 => 'form_title_margin_left',
	),
) );
FLBuilderCSS::dimension_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'form_description_margin',
	'selector' 	=> ".fl-node-$id #gform_{$settings->form} .gform_description, .fl-node-$id .form-description",
	'unit'		=> 'px',
	'props'		=> array(
		'margin-top' 	 => 'form_description_margin_top',
		'margin-right'  => 'form_description_margin_right',
		'margin-bottom' => 'form_description_margin_bottom',
		'margin-left' 	 => 'form_description_margin_left',
	),
) );
FLBuilderCSS::dimension_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'label_padding',
	'selector' 	=> ".fl-node-$id #gform_{$settings->form} li, .fl-node-$id #gform_{$settings->form} label",
	'unit'		=> 'px',
	'props'		=> array(
		'padding-top' 	 => 'label_padding_top',
		'padding-right'  => 'label_padding_right',
		'padding-bottom' => 'label_padding_bottom',
		'padding-left' 	 => 'label_padding_left',
	),
) );
FLBuilderCSS::dimension_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'label_margin',
	'selector' 	=> ".fl-node-$id #gform_{$settings->form} li, .fl-node-$id #gform_{$settings->form} label",
	'unit'		=> 'px',
	'props'		=> array(
		'margin-top' 	 => 'label_margin_top',
		'margin-right'  => 'label_margin_right',
		'margin-bottom' => 'label_margin_bottom',
		'margin-left' 	 => 'label_margin_left',
	),
) );
FLBuilderCSS::dimension_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'input_general_padding',
	'selector' 	=> ".fl-node-$id #gform_{$settings->form} .ginput_container, .fl-node-$id #gform_{$settings->form} .gform_footer",
	'unit'		=> 'px',
	'props'		=> array(
		'padding-top' 	 => 'input_general_padding_top',
		'padding-right'  => 'input_general_padding_right',
		'padding-bottom' => 'input_general_padding_bottom',
		'padding-left' 	 => 'input_general_padding_left',
	),
) );
FLBuilderCSS::dimension_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'input_general_margin',
	'selector' 	=> ".fl-node-$id #gform_{$settings->form} .ginput_container, .fl-node-$id #gform_{$settings->form} input[type=text], .fl-node-$id #gform_{$settings->form} input[type=password], .fl-node-$id #gform_{$settings->form} input[type=email], .fl-node-$id #gform_{$settings->form} input[type=tel], .fl-node-$id #gform_{$settings->form} input[type=date], .fl-node-$id #gform_{$settings->form} input[type=month], .fl-node-$id #gform_{$settings->form} input[type=week], .fl-node-$id #gform_{$settings->form} input[type=time], .fl-node-$id #gform_{$settings->form} input[type=number], .fl-node-$id #gform_{$settings->form} input[type=search], .fl-node-$id #gform_{$settings->form} input[type=url], .fl-node-$id #gform_{$settings->form} textarea, .fl-node-$id #gform_{$settings->form} .gform_footer",
	'unit'		=> 'px',
	'props'		=> array(
		'margin-top' 	 => 'input_general_margin_top',
		'margin-right'  => 'input_general_margin_right',
		'margin-bottom' => 'input_general_margin_bottom',
		'margin-left' 	 => 'input_general_margin_left',
	),
) );
if( ! empty( $settings->select_height ) ):
?>
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> select {
	height: <?php echo absint( $settings->select_height ); ?>px;
}
<?php
endif;
?>
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=text]::placeholder,
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=password]::placeholder,
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=email]::placeholder,
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=tel]::placeholder,
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=date]::placeholder,
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=month]::placeholder,
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=week]::placeholder,
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=time]::placeholder,
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=number]::placeholder,
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=search]::placeholder,
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=url]::placeholder,
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> textarea::placeholder {
	color: #<?php echo $settings->placeholder_color; ?>;
}
<?php
FLBuilderCSS::typography_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'placeholder_typography',
	'selector' 	=> ".fl-node-$id #gform_{$settings->form} input[type=text]::placeholder, .fl-node-$id #gform_{$settings->form} input[type=password]::placeholder, .fl-node-$id #gform_{$settings->form} input[type=email]::placeholder, .fl-node-$id #gform_{$settings->form} input[type=tel]::placeholder, .fl-node-$id #gform_{$settings->form} input[type=date]::placeholder, .fl-node-$id #gform_{$settings->form} input[type=month]::placeholder, .fl-node-$id #gform_{$settings->form} input[type=week]::placeholder, .fl-node-$id #gform_{$settings->form} input[type=time]::placeholder, .fl-node-$id #gform_{$settings->form} input[type=number]::placeholder, .fl-node-$id #gform_{$settings->form} input[type=search]::placeholder, .fl-node-$id #gform_{$settings->form} input[type=url]::placeholder, .fl-node-$id #gform_{$settings->form} textarea::placeholder",
) );

// Textareas
FLBuilderCSS::dimension_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'textarea_border',
	'selector' 	=> ".fl-node-$id #gform_{$settings->form} textarea",
	'unit'		=> 'px',
	'props'		=> array(
		'border-top-width' 	 => 'textarea_border_top',
		'border-right-width'  => 'textarea_border_right',
		'border-bottom-width' => 'textarea_border_bottom',
		'border-left-width' 	 => 'textarea_border_left',
	),
) );
FLBuilderCSS::dimension_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'textarea_padding',
	'selector' 	=> ".fl-node-$id #gform_{$settings->form} textarea",
	'unit'		=> 'px',
	'props'		=> array(
		'padding-top' 	 => 'textarea_padding_top',
		'padding-right'  => 'textarea_padding_right',
		'padding-bottom' => 'textarea_padding_bottom',
		'padding-left' 	 => 'textarea_padding_left',
	),
) );
FLBuilderCSS::dimension_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'textarea_border_radius',
	'selector' 	=> ".fl-node-$id #gform_{$settings->form} textarea",
	'unit'		=> 'px',
	'props'		=> array(
		'border-top-left-radius' 	 => 'textarea_border_radius_top',
		'border-top-right-radius'  => 'textarea_border_radius_right',
		'border-bottom-left-radius' => 'textarea_border_radius_bottom',
		'border-bottom-right-radius' 	 => 'textarea_border_radius_left',
	),
) );
$textarea_background_color = isset( $settings->textarea_background_color ) ? esc_attr( $settings->textarea_background_color ) : 'FFFFFF';
if( 6 === strlen( $textarea_background_color ) ) {
	$textarea_background_color = '#' . $textarea_background_color;
}
?>
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> textarea {
	color: #<?php echo $settings->textarea_color; ?>;
	background: <?php echo $textarea_background_color; ?>;
	border-color: #<?php echo $settings->textarea_border_color; ?>;
	height: <?php echo absint( $settings->textarea_height ); ?>px;
	text-align: <?php echo $settings->textarea_align; ?>;
}
<?php
// List areas
?>
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> .gfield_radio label,
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> .gfield_checkbox label {
	margin: 0;
}
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> .gfield_radio,
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> .gfield_checkbox {
	color: #<?php echo $settings->list_color; ?>;
}
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> .gfield_radio li input[type=radio],
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> .gfield_checkbox li input[type=checkbox] {
	display: none;
}
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> .gfield_radio label:before {
	border-radius: <?php echo $settings->list_radio_radius; ?>px;
}
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> .gfield_checkbox label:before {
	border-radius: <?php echo $settings->list_checkbox_radius; ?>px;
}
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> .gfield_radio label:before,
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> .gfield_checkbox label:before {
	content: "";
	display: inline-block;
	vertical-align: middle;
	width: <?php echo $settings->list_size; ?>px;
	height: <?php echo $settings->list_size; ?>px;
	margin-right: 10px;
	background: #<?php echo $settings->list_background; ?>;
	border-width: <?php echo $settings->list_border; ?>px;
	border-style: solid;
	border-color: #<?php echo $settings->list_border_color; ?>;
	padding: 4px;
	font-size: <?php echo $settings->list_size - 2; ?>px;
}
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> .gfield_radio input[type="radio"]:checked + label::before {
	box-shadow: rgb(222, 222, 222) 0px 0px 0px 4px inset;
    background: #<?php echo $settings->list_selected_color; ?>;
}
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> .gfield_checkbox input[type="checkbox"]:checked + label::before {
	content: "";
	background: #<?php echo $settings->list_selected_color; ?>;
	width: <?php echo $settings->list_size; ?>px;
	height: <?php echo $settings->list_size; ?>px;
}
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> .gform_title, .fl-node-<?php echo $id; ?> .fl-bbvm-gravityforms-for-beaverbuilder .form-heading {
	color: #<?php echo $settings->form_title_color; ?>;
}
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> .gform_description, .fl-node-<?php echo $id; ?> .fl-bbvm-gravityforms-for-beaverbuilder .form-description {
	color: #<?php echo $settings->form_description_color; ?>;
}

<?php
// Typography
FLBuilderCSS::typography_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'form_title_typography',
	'selector' 	=> ".fl-node-$id #gform_{$settings->form} .gform_title, .fl-node-$id .fl-bbvm-gravityforms-for-beaverbuilder .form-heading"
) );
FLBuilderCSS::typography_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'form_description_typography',
	'selector' 	=> ".fl-node-$id #gform_{$settings->form} .gform_description, .fl-node-$id .fl-bbvm-gravityforms-for-beaverbuilder .form-description"
) );
FLBuilderCSS::typography_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'sublabel_typography',
	'selector' 	=> ".fl-node-$id #gform_{$settings->form} label"
) );
FLBuilderCSS::typography_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'label_typography',
	'selector' 	=> ".fl-node-$id #gform_{$settings->form} label.gfield_label"
) );
FLBuilderCSS::typography_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'input_typography',
	'selector' 	=> ".fl-node-$id #gform_{$settings->form} input[type=text], .fl-node-$id #gform_{$settings->form} input[type=password], .fl-node-$id #gform_{$settings->form} input[type=email], .fl-node-$id #gform_{$settings->form} input[type=tel], .fl-node-$id #gform_{$settings->form} input[type=date], .fl-node-$id #gform_{$settings->form} input[type=month], .fl-node-$id #gform_{$settings->form} input[type=week], .fl-node-$id #gform_{$settings->form} input[type=time], .fl-node-$id #gform_{$settings->form} input[type=number], .fl-node-$id #gform_{$settings->form} input[type=search], .fl-node-$id #gform_{$settings->form} input[type=url]"
) );
FLBuilderCSS::typography_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'textarea_typography',
	'selector' 	=> ".fl-node-$id #gform_{$settings->form} textarea"
) );
FLBuilderCSS::typography_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'select_typography',
	'selector' 	=> ".fl-node-$id #gform_{$settings->form} select"
) );
FLBuilderCSS::typography_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'list_typography',
	'selector' 	=> ".fl-node-$id #gform_{$settings->form} ul.gfield_radio, .fl-node-$id #gform_{$settings->form} ul.gfield_checkbox"
) );

// Buttons
$button_background_color = isset( $settings->button_background ) ? esc_attr( $settings->button_background ) : '000000';
if( 6 === strlen( $button_background_color ) ) {
	$button_background_color = '#' . $button_background_color;
}
FLBuilderCSS::typography_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'button_typography',
	'selector' 	=> ".fl-node-$id #gform_{$settings->form} input[type=button], .fl-node-$id #gform_{$settings->form} input[type=submit], .fl-node-$id #gform_{$settings->form} button"
) );
FLBuilderCSS::dimension_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'button_padding',
	'selector' 	=> ".fl-node-$id #gform_{$settings->form} input[type=button], .fl-node-$id #gform_{$settings->form} input[type=submit], .fl-node-$id #gform_{$settings->form} button",
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
	'setting_name' 	=> 'button_radius',
	'selector' 	=> ".fl-node-$id #gform_{$settings->form} input[type=button], .fl-node-$id #gform_{$settings->form} input[type=submit], .fl-node-$id #gform_{$settings->form} button",
	'unit'		=> 'px',
	'props'		=> array(
		'border-top-left-radius' 	 => 'button_radius_top',
		'border-top-right-radius'  => 'button_radius_right',
		'border-bottom-left-radius' => 'button_radius_bottom',
		'border-bottom-right-radius' 	 => 'button_radius_left',
	),
) );
?>
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=button],
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=submit],
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> button {
	color: #<?php echo $settings->button_color; ?>;
	background: <?php echo $button_background_color; ?>;
	border-width: <?php echo $settings->button_border; ?>px;
	border-color: #<?php echo $settings->button_border_color; ?>;
}
<?php
$button_background_hover_color = isset( $settings->button_background_hover ) ? esc_attr( $settings->button_background_hover ) : '000000';
if( 6 === strlen( $button_background_hover_color ) ) {
	$button_background_hover_color = '#' . $button_background_hover_color;
}
?>
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=button]:hover,
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> input[type=submit]:hover,
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> button:hover {
	color: #<?php echo $settings->button_color_hover; ?>;
	background: <?php echo $button_background_hover_color; ?>;
}
<?php
// Error messages
FLBuilderCSS::typography_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'error_message_typography',
	'selector' 	=> ".fl-node-$id #gform_{$settings->form} .validation_error"
) );
?>
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> .validation_error {
	color: #<?php echo $settings->error_message_color; ?>;
	border-top-color: #<?php echo $settings->error_message_color; ?>;
	border-bottom-color: #<?php echo $settings->error_message_color; ?>;
}
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> li.gfield.gfield_error {
	background: #<?php echo $settings->error_label_background_color; ?>;
}
.fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> .gfield_error .gfield_label, .fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> li.gfield_error div.ginput_complex.ginput_container label, .fl-node-<?php echo $id; ?> #gform_<?php echo $settings->form; ?> .gfield_description.validation_message {
	color: #<?php echo $settings->error_label_color; ?>;
}
<?php
// Confirmation Message
FLBuilderCSS::typography_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'confirmation_typography',
	'selector' 	=> ".fl-node-$id #gform_confirmation_wrapper_{$settings->form} .gform_confirmation_message"
) );
FLBuilderCSS::dimension_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'confirmation_padding',
	'selector' 	=> ".fl-node-$id #gform_confirmation_wrapper_{$settings->form}",
	'unit'		=> 'px',
	'props'		=> array(
		'padding-top' 	 => 'confirmation_padding_top',
		'padding-right'  => 'confirmation_padding_right',
		'padding-bottom' => 'confirmation_padding_bottom',
		'padding-left' 	 => 'confirmation_padding_left',
	),
) );
?>
.fl-node-<?php echo $id; ?> #gform_confirmation_wrapper_<?php echo $settings->form; ?> {
	color: #<?php echo $settings->confirmation_color; ?>;
	background: #<?php echo $settings->confirmation_background_color; ?>;
}