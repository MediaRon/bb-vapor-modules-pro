<?php
/**
 * Embedded Tweet Module.
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 1.3.0
 */

// Padding.
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'gist_padding',
		'selector'     => ".fl-node-$id .fl-bbvm-twitter-embed-for-beaverbuilder",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'tweet_padding_top',
			'padding-right'  => 'tweet_padding_right',
			'padding-bottom' => 'tweet_padding_bottom',
			'padding-left'   => 'tweet_padding_left',
		),
	)
);
