<?php

// Padding
FLBuilderCSS::dimension_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'syntax_padding',
	'selector' 	=> ".fl-node-$id .fl-bbvm-syntax-highlighter-for-beaverbuilder",
	'unit'		=> 'px',
	'props'		=> array(
		'padding-top' 	 => 'syntax_padding_top',
		'padding-right'  => 'syntax_padding_right',
		'padding-bottom' => 'syntax_padding_bottom',
		'padding-left' 	 => 'syntax_padding_left',
	),
) );