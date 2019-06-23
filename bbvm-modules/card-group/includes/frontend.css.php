<?php
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'card_padding',
		'selector'     => ".fl-node-$id .fl-bbvm-card-wrapper",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'card_padding_top',
			'padding-right'  => 'card_padding_right',
			'padding-bottom' => 'card_padding_bottom',
			'padding-left'   => 'card_padding_left',
		),
	)
);
?>
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-card-group-for-beaverbuilder {
	display: flex;
	flex-wrap: wrap;
	justify-content: space-around;
	flex-direction: row;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-card-group-for-beaverbuilder .fl-bbvm-card-wrapper .fl-bbvm-card {
	height: 100%;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-card-group-for-beaverbuilder.columns-6 .fl-bbvm-card-wrapper {
	width: 16.66%;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-card-group-for-beaverbuilder.columns-5 .fl-bbvm-card-wrapper {
	width: 20%;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-card-group-for-beaverbuilder.columns-4 .fl-bbvm-card-wrapper {
	width: 25%;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-card-group-for-beaverbuilder.columns-3 .fl-bbvm-card-wrapper {
	width: 33.33%;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-card-group-for-beaverbuilder.columns-2 .fl-bbvm-card-wrapper {
	width: 50%;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-card-group-for-beaverbuilder.columns-1 .fl-bbvm-card-wrapper {
	width: 100%;
}
@media only screen and (max-width: 1200px) {
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-card-group-for-beaverbuilder.columns-6 .fl-bbvm-card-wrapper {
		width: 20%;
	}
}
@media only screen and (max-width: 1000px) {
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-card-group-for-beaverbuilder.columns-6 .fl-bbvm-card-wrapper {
		width: 25%;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-card-group-for-beaverbuilder.columns-5 .fl-bbvm-card-wrapper {
		width: 25%;
	}
}
@media only screen and (max-width: 800px) {
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-card-group-for-beaverbuilder.columns-6 .fl-bbvm-card-wrapper {
		width: 33.33%;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-card-group-for-beaverbuilder.columns-5 .fl-bbvm-card-wrapper {
		width: 33.33%;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-card-group-for-beaverbuilder.columns-4 .fl-bbvm-card-wrapper {
		width: 33.33%;
	}
}
@media only screen and (max-width: 600px) {
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-card-group-for-beaverbuilder.columns-6 .fl-bbvm-card-wrapper {
		width: 50%;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-card-group-for-beaverbuilder.columns-5 .fl-bbvm-card-wrapper {
		width: 50%;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-card-group-for-beaverbuilder.columns-4 .fl-bbvm-card-wrapper {
		width: 50%;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-card-group-for-beaverbuilder.columns-3 .fl-bbvm-card-wrapper {
		width: 50%;
	}
}
@media only screen and (max-width: 500px) {
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-card-group-for-beaverbuilder.columns-6 .fl-bbvm-card-wrapper {
		width: 100%;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-card-group-for-beaverbuilder.columns-5 .fl-bbvm-card-wrapper {
		width: 100%;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-card-group-for-beaverbuilder.columns-4 .fl-bbvm-card-wrapper {
		width: 100%;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-card-group-for-beaverbuilder.columns-3 .fl-bbvm-card-wrapper {
		width: 100%;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-card-group-for-beaverbuilder.columns-2 .fl-bbvm-card-wrapper {
		width: 100%;
	}
}

<?php

$count = 1;
foreach ( $settings->card as $card ) :
	$card = wp_json_encode( $card );
	$card = json_decode( $card );
	?>
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-card-group-for-beaverbuilder #bbvm-card-<?php echo absint( $count ); ?> .fl-bbvm-card-icon-header {
		font-size: <?php echo absint( $card->icon_font_size ); ?>px;
		color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $card->icon_color ) ); ?>;
		text-align: center;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-card-group-for-beaverbuilder #bbvm-card-<?php echo absint( $count ); ?> .fl-bbvm-card-icon-header .bbvm-card-icon {
		display: inline-block;
		background: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $card->icon_background ) ); ?>;
		<?php
		if ( 'rounded' === $card->icon_appearance ) :
			?>
			border-radius: 100%;
			<?php
		endif;
		?>
	}

	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-card-group-for-beaverbuilder #bbvm-card-<?php echo absint( $count ); ?>  {
		color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $card->text_color ) ); ?>;
		border: <?php echo absint( $card->border ); ?>px solid <?php echo esc_html( BBVapor_Modules_Pro::get_color( $card->border_color ) ); ?>;
		box-shadow: <?php echo FLBuilderColor::shadow( (array)$card->text_shadow ); // phpcs:ignore ?>;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-card-group-for-beaverbuilder #bbvm-card-<?php echo absint( $count ); ?>:hover {
		color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $card->text_color_hover ) ); ?>;
		border: <?php echo absint( $card->border ); ?>px solid <?php echo esc_html( BBVapor_Modules_Pro::get_color( $card->border_color_hover ) ); ?>;
		box-shadow: <?php echo FLBuilderColor::shadow( (array)$card->text_shadow_hover ); // phpcs:ignore ?>;
	}
	<?php
	FLBuilderCSS::dimension_field_rule(
		array(
			'settings'     => $card,
			'setting_name' => 'border_radius',
			'selector'     => ".fl-node-$id .fl-bbvm-card-group-for-beaverbuilder #bbvm-card-$count ",
			'unit'         => 'px',
			'props'        => array(
				'border-top-left-radius'     => 'border_radius_top',
				'border-top-right-radius'    => 'border_radius_right',
				'border-bottom-left-radius'  => 'border_radius_bottom',
				'border-bottom-right-radius' => 'border_radius_left',
			),
		)
	);
	if ( 'color' === $card->background_type ) :
		?>
		.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-card-group-for-beaverbuilder #bbvm-card-<?php echo absint( $count ); ?>  {
			background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $card->background_color ) ); ?>;
		}
		.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-card-group-for-beaverbuilder #bbvm-card-<?php echo absint( $count ); ?>:hover {
			background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $card->background_color_hover ) ); ?>;
		}
		<?php
	endif;
	if ( 'gradient' === $card->background_type ) :
		?>
		.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-card-group-for-beaverbuilder #bbvm-card-<?php echo absint( $count ); ?>  {
			background-image: <?php echo FLBuilderColor::gradient( json_decode( json_encode( $card->background_gradient ), true ) ); // phpcs:ignore ?>;
		}
		.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-card-group-for-beaverbuilder #bbvm-card-<?php echo absint( $count ); ?>:hover {
			background-image: <?php echo FLBuilderColor::gradient( json_decode( json_encode( $card->background_gradient_hover ), true ) ); //phpcs:ignore ?>;
		}
		<?php
	endif;
	FLBuilderCSS::dimension_field_rule(
		array(
			'settings'     => $card,
			'setting_name' => 'padding',
			'selector'     => ".fl-node-$id .fl-bbvm-card-group-for-beaverbuilder #bbvm-card-$count",
			'unit'         => 'px',
			'props'        => array(
				'padding-top'    => 'padding_top',
				'padding-right'  => 'padding_right',
				'padding-bottom' => 'padding_bottom',
				'padding-left'   => 'padding_left',
			),
		)
	);
	?>
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-card-group-for-beaverbuilder #bbvm-card-<?php echo absint( $count ); ?>:hover .fl-bbvm-card-icon-header .bbvm-card-icon {
		background: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $card->icon_background_hover ) ); ?>;
		color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $card->icon_color_hover ) ); ?>;
	}
	<?php
	FLBuilderCSS::dimension_field_rule(
		array(
			'settings'     => $card,
			'setting_name' => 'icon_padding',
			'selector'     => ".fl-node-$id .fl-bbvm-card-group-for-beaverbuilder #bbvm-card-$count .fl-bbvm-card-icon-header .bbvm-card-icon",
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
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-card-group-for-beaverbuilder #bbvm-card-<?php echo absint( $count ); ?> .fl-bbvm-card-photo-header {
		text-align: center;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-card-group-for-beaverbuilder #bbvm-card-<?php echo absint( $count ); ?> .fl-bbvm-card-photo-header img.rounded {
		border-radius: 100%;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-card-group-for-beaverbuilder #bbvm-card-<?php echo absint( $count ); ?> .fl-bbvm-card-photo-header img {
		width: <?php echo absint( $card->photo_size ); ?>px;
		height: <?php echo absint( $card->photo_size ); ?>px;
	}
	.fl-node-<?php echo esc_html( $id ); ?> #bbvm-card-<?php echo absint( $count ); ?> .fl-bbvm-card-heading {
		font-size: 18px;
		padding: 10px 20px;
		font-weight: 700;
		text-align: center;
	}
	<?php
	FLBuilderCSS::typography_field_rule(
		array(
			'settings'     => $card,
			'setting_name' => 'heading_typography',
			'selector'     => ".fl-node-$id #bbvm-card-$count .fl-bbvm-card-heading",
		)
	);
	FLBuilderCSS::dimension_field_rule(
		array(
			'settings'     => $card,
			'setting_name' => 'heading_padding',
			'selector'     => ".fl-node-$id #bbvm-card-$count .fl-bbvm-card-heading",
			'unit'         => 'px',
			'props'        => array(
				'padding-top'    => 'heading_padding_top',
				'padding-right'  => 'heading_padding_right',
				'padding-bottom' => 'heading_padding_bottom',
				'padding-left'   => 'heading_padding_left',
			),
		)
	);
	?>
	.fl-node-<?php echo esc_html( $id ); ?> #bbvm-card-<?php echo absint( $count ); ?> .fl-bbvm-card-content {
		font-size: 18px;
		padding: 10px 20px;
		font-weight: 400;
		text-align: center;
	}
	<?php
	FLBuilderCSS::typography_field_rule(
		array(
			'settings'     => $card,
			'setting_name' => 'content_typography',
			'selector'     => ".fl-node-$id #bbvm-card-$count .fl-bbvm-card-content",
		)
	);
	FLBuilderCSS::dimension_field_rule(
		array(
			'settings'     => $card,
			'setting_name' => 'content_padding',
			'selector'     => ".fl-node-$id #bbvm-card-$count .fl-bbvm-card-content",
			'unit'         => 'px',
			'props'        => array(
				'padding-top'    => 'content_padding_top',
				'padding-right'  => 'content_padding_right',
				'padding-bottom' => 'content_padding_bottom',
				'padding-left'   => 'content_padding_left',
			),
		)
	);
	?>
	.fl-node-<?php echo esc_html( $id ); ?> #bbvm-card-<?php echo absint( $count ); ?> .fl-bbvm-card-subheading {
		font-size: 18px;
		padding: 10px 20px;
		font-weight: 700;
		text-align: center;
	}
	<?php
	FLBuilderCSS::typography_field_rule(
		array(
			'settings'     => $card,
			'setting_name' => 'subheading_typography',
			'selector'     => ".fl-node-$id #bbvm-card-$count .fl-bbvm-card-subheading",
		)
	);
	FLBuilderCSS::dimension_field_rule(
		array(
			'settings'     => $card,
			'setting_name' => 'subheading_padding',
			'selector'     => ".fl-node-$id #bbvm-card-$count .fl-bbvm-card-subheading",
			'unit'         => 'px',
			'props'        => array(
				'padding-top'    => 'subheading_padding_top',
				'padding-right'  => 'subheading_padding_right',
				'padding-bottom' => 'subheading_padding_bottom',
				'padding-left'   => 'subheading_padding_left',
			),
		)
	);
	?>
	.fl-node-<?php echo esc_html( $id ); ?> #bbvm-card-<?php echo absint( $count ); ?> .fl-bbvm-card-subheading-text {
		font-size: 18px;
		padding: 10px 20px;
		font-weight: 400;
		text-align: center;
	}
	<?php
	FLBuilderCSS::typography_field_rule(
		array(
			'settings'     => $card,
			'setting_name' => 'subheading_text_typography',
			'selector'     => ".fl-node-$id #bbvm-card-$count .fl-bbvm-card-subheading-text",
		)
	);
	FLBuilderCSS::dimension_field_rule(
		array(
			'settings'     => $card,
			'setting_name' => 'subheading_text_padding',
			'selector'     => ".fl-node-$id #bbvm-card-$count .fl-bbvm-card-subheading-text",
			'unit'         => 'px',
			'props'        => array(
				'padding-top'    => 'subheading_text_padding_top',
				'padding-right'  => 'subheading_text_padding_right',
				'padding-bottom' => 'subheading_text_padding_bottom',
				'padding-left'   => 'subheading_text_padding_left',
			),
		)
	);
	?>
	.fl-node-<?php echo esc_html( $id ); ?> #bbvm-card-<?php echo absint( $count ); ?> .fl-bbvm-card-readmore a  {
		display: inline-block;
		font-size: 18px;
		padding: 10px 20px;
		font-weight: 400;
		margin: 0 auto;
		border: <?php echo absint( $card->button_border ); ?>px solid <?php echo esc_html( BBVapor_Modules_Pro::get_color( $card->button_border_color ) ); ?>;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-card-group-for-beaverbuilder #bbvm-card-<?php echo absint( $count ); ?> .fl-bbvm-card-readmore a,
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-card-group-for-beaverbuilder #bbvm-card-<?php echo absint( $count ); ?> .fl-bbvm-card-readmore a:hover,
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-card-group-for-beaverbuilder #bbvm-card-<?php echo absint( $count ); ?> .fl-bbvm-card-readmore a:visited {
		color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $card->button_text_color ) ); ?>;
		text-decoration: none;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-card-group-for-beaverbuilder #bbvm-card-<?php echo absint( $count ); ?>  a:hover {
		color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $card->button_text_color_hover ) ); ?>;
	}
	<?php
	if ( 'color' === $card->button_background_type ) :
		?>
		.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-card-group-for-beaverbuilder #bbvm-card-<?php echo absint( $count ); ?> .fl-bbvm-card-readmore a {
			background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $card->button_background_color ) ); ?>;
		}
		.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-card-group-for-beaverbuilder #bbvm-card-<?php echo absint( $count ); ?> .fl-bbvm-card-readmore a:hover {
			background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $card->button_background_color_hover ) ); ?>;
		}
		<?php
	endif;
	if ( 'gradient' === $card->button_background_type ) :
		?>
		.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-card-group-for-beaverbuilder #bbvm-card-<?php echo absint( $count ); ?> .fl-bbvm-card-readmore a {
			background-image: <?php echo FLBuilderColor::gradient( json_decode( json_encode($card->button_color_gradient ), true ) ); // phpcs:ignore ?>;
		}
		.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-card-group-for-beaverbuilder #bbvm-card-<?php echo absint( $count ); ?> .fl-bbvm-card-readmore a:hover {
			background-image: <?php echo FLBuilderColor::gradient( json_decode( json_encode($card->button_color_gradient_hover ), true ) ); // phpcs:ignore ?>;
		}
		<?php
	endif;
	FLBuilderCSS::typography_field_rule(
		array(
			'settings'     => $card,
			'setting_name' => 'readmore_text_typography',
			'selector'     => ".fl-node-$id #bbvm-card-$count .fl-bbvm-card-readmore",
		)
	);
	FLBuilderCSS::dimension_field_rule(
		array(
			'settings'     => $card,
			'setting_name' => 'button_padding',
			'selector'     => ".fl-node-$id #bbvm-card-$count .fl-bbvm-card-readmore a",
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
			'settings'     => $card,
			'setting_name' => 'button_border_radius',
			'selector'     => ".fl-node-$id .fl-bbvm-card-group-for-beaverbuilder #bbvm-card-$count .fl-bbvm-card-readmore a",
			'unit'         => 'px',
			'props'        => array(
				'border-top-left-radius'     => 'button_border_radius_top',
				'border-top-right-radius'    => 'button_border_radius_right',
				'border-bottom-left-radius'  => 'button_border_radius_bottom',
				'border-bottom-right-radius' => 'button_border_radius_left',
			),
		)
	);
	FLBuilderCSS::dimension_field_rule(
		array(
			'settings'     => $card,
			'setting_name' => 'button_margin',
			'selector'     => ".fl-node-$id #bbvm-card-$count .fl-bbvm-card-readmore a",
			'unit'         => 'px',
			'props'        => array(
				'margin-top'    => 'button_margin_top',
				'margin-right'  => 'button_margin_right',
				'margin-bottom' => 'button_margin_bottom',
				'margin-left'   => 'button_margin_left',
			),
		)
	);
	$count++;
endforeach;
