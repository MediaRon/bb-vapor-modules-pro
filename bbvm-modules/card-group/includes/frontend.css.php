<?php
FLBuilderCSS::dimension_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'card_padding',
	'selector' 	=> ".fl-node-$id .fl-mediaron-card-wrapper",
	'unit'		=> 'px',
	'props'		=> array(
		'padding-top' 	 => 'card_padding_top',
		'padding-right'  => 'card_padding_right',
		'padding-bottom' => 'card_padding_bottom',
		'padding-left' 	 => 'card_padding_left',
	),
) );
?>
.fl-node-<?php echo $id; ?> .fl-mediaron-card-group-for-beaverbuilder {
	display: flex;
	flex-wrap: wrap;
	justify-content: space-around;
	flex-direction: row;
}
.fl-node-<?php echo $id; ?> .fl-mediaron-card-group-for-beaverbuilder .fl-mediaron-card-wrapper .fl-mediaron-card {
	height: 100%;
}
.fl-node-<?php echo $id; ?> .fl-mediaron-card-group-for-beaverbuilder.columns-6 .fl-mediaron-card-wrapper {
	width: 16.66%;
}
.fl-node-<?php echo $id; ?> .fl-mediaron-card-group-for-beaverbuilder.columns-5 .fl-mediaron-card-wrapper {
	width: 20%;
}
.fl-node-<?php echo $id; ?> .fl-mediaron-card-group-for-beaverbuilder.columns-4 .fl-mediaron-card-wrapper {
	width: 25%;
}
.fl-node-<?php echo $id; ?> .fl-mediaron-card-group-for-beaverbuilder.columns-3 .fl-mediaron-card-wrapper {
	width: 33.33%;
}
.fl-node-<?php echo $id; ?> .fl-mediaron-card-group-for-beaverbuilder.columns-2 .fl-mediaron-card-wrapper {
	width: 50%;
}
.fl-node-<?php echo $id; ?> .fl-mediaron-card-group-for-beaverbuilder.columns-1 .fl-mediaron-card-wrapper {
	width: 100%;
}
@media only screen and (max-width: 1200px) {
	.fl-node-<?php echo $id; ?> .fl-mediaron-card-group-for-beaverbuilder.columns-6 .fl-mediaron-card-wrapper {
		width: 20%;
	}
}
@media only screen and (max-width: 1000px) {
	.fl-node-<?php echo $id; ?> .fl-mediaron-card-group-for-beaverbuilder.columns-6 .fl-mediaron-card-wrapper {
		width: 25%;
	}
	.fl-node-<?php echo $id; ?> .fl-mediaron-card-group-for-beaverbuilder.columns-5 .fl-mediaron-card-wrapper {
		width: 25%;
	}
}
@media only screen and (max-width: 800px) {
	.fl-node-<?php echo $id; ?> .fl-mediaron-card-group-for-beaverbuilder.columns-6 .fl-mediaron-card-wrapper {
		width: 33.33%;
	}
	.fl-node-<?php echo $id; ?> .fl-mediaron-card-group-for-beaverbuilder.columns-5 .fl-mediaron-card-wrapper {
		width: 33.33%;
	}
	.fl-node-<?php echo $id; ?> .fl-mediaron-card-group-for-beaverbuilder.columns-4 .fl-mediaron-card-wrapper {
		width: 33.33%;
	}
}
@media only screen and (max-width: 600px) {
	.fl-node-<?php echo $id; ?> .fl-mediaron-card-group-for-beaverbuilder.columns-6 .fl-mediaron-card-wrapper {
		width: 50%;
	}
	.fl-node-<?php echo $id; ?> .fl-mediaron-card-group-for-beaverbuilder.columns-5 .fl-mediaron-card-wrapper {
		width: 50%;
	}
	.fl-node-<?php echo $id; ?> .fl-mediaron-card-group-for-beaverbuilder.columns-4 .fl-mediaron-card-wrapper {
		width: 50%;
	}
	.fl-node-<?php echo $id; ?> .fl-mediaron-card-group-for-beaverbuilder.columns-3 .fl-mediaron-card-wrapper {
		width: 50%;
	}
}
@media only screen and (max-width: 500px) {
	.fl-node-<?php echo $id; ?> .fl-mediaron-card-group-for-beaverbuilder.columns-6 .fl-mediaron-card-wrapper {
		width: 100%;
	}
	.fl-node-<?php echo $id; ?> .fl-mediaron-card-group-for-beaverbuilder.columns-5 .fl-mediaron-card-wrapper {
		width: 100%;
	}
	.fl-node-<?php echo $id; ?> .fl-mediaron-card-group-for-beaverbuilder.columns-4 .fl-mediaron-card-wrapper {
		width: 100%;
	}
	.fl-node-<?php echo $id; ?> .fl-mediaron-card-group-for-beaverbuilder.columns-3 .fl-mediaron-card-wrapper {
		width: 100%;
	}
	.fl-node-<?php echo $id; ?> .fl-mediaron-card-group-for-beaverbuilder.columns-2 .fl-mediaron-card-wrapper {
		width: 100%;
	}
}

<?php

$count = 1;
foreach( $settings->card as $card ) :
	$card = json_encode( $card );
	$card = json_decode( $card );
?>
	.fl-node-<?php echo $id; ?> .fl-mediaron-card-group-for-beaverbuilder #mediaron-card-<?php echo absint( $count ); ?> .fl-mediaron-card-icon-header {
		font-size: <?php echo absint( $card->icon_font_size ); ?>px;
		color: #<?php echo $card->icon_color; ?>;
		text-align: center;
	}
	.fl-node-<?php echo $id; ?> .fl-mediaron-card-group-for-beaverbuilder #mediaron-card-<?php echo absint( $count ); ?> .fl-mediaron-card-icon-header .mediaron-card-icon {
		display: inline-block;
		background: #<?php echo $card->icon_background; ?>;
		<?php
		if( 'rounded' === $card->icon_appearance ):
		?>
		border-radius: 100%;
		<?php
		endif;
		?>
	}

	.fl-node-<?php echo $id; ?> .fl-mediaron-card-group-for-beaverbuilder #mediaron-card-<?php echo absint( $count ); ?>  {
		color: #<?php echo $card->text_color; ?>;
		border: <?php echo $card->border; ?>px solid #<?php echo $card->border_color; ?>;
		box-shadow: <?php echo FLBuilderColor::shadow( (array)$card->text_shadow ); ?>;
	}
	.fl-node-<?php echo $id; ?> .fl-mediaron-card-group-for-beaverbuilder #mediaron-card-<?php echo absint( $count ); ?>:hover {
		color: #<?php echo $card->text_color_hover; ?>;
		border: <?php echo $card->border; ?>px solid #<?php echo $card->border_color_hover; ?>;
		box-shadow: <?php echo FLBuilderColor::shadow( (array)$card->text_shadow_hover ); ?>;
	}
	<?php
	FLBuilderCSS::dimension_field_rule( array(
		'settings'	=> $card,
		'setting_name' 	=> 'border_radius',
		'selector' 	=> ".fl-node-$id .fl-mediaron-card-group-for-beaverbuilder #mediaron-card-$count ",
		'unit'		=> 'px',
		'props'		=> array(
			'border-top-left-radius' 	 => 'border_radius_top',
			'border-top-right-radius'  => 'border_radius_right',
			'border-bottom-left-radius' => 'border_radius_bottom',
			'border-bottom-right-radius' 	 => 'border_radius_left',
		),
	) );
	if( 'color' === $card->background_type ):
	?>
	.fl-node-<?php echo $id; ?> .fl-mediaron-card-group-for-beaverbuilder #mediaron-card-<?php echo absint( $count ); ?>  {
		background-color: #<?php echo $card->background_color; ?>;
	}
	.fl-node-<?php echo $id; ?> .fl-mediaron-card-group-for-beaverbuilder #mediaron-card-<?php echo absint( $count ); ?>:hover {
		background-color: #<?php echo $card->background_color_hover; ?>;
	}
	<?php
	endif;
	if( 'gradient' === $card->background_type ):
	?>
	.fl-node-<?php echo $id; ?> .fl-mediaron-card-group-for-beaverbuilder #mediaron-card-<?php echo absint( $count ); ?>  {
		background-image: <?php echo FLBuilderColor::gradient( json_decode( json_encode( $card->background_gradient ), true ) ); ?>;
	}
	.fl-node-<?php echo $id; ?> .fl-mediaron-card-group-for-beaverbuilder #mediaron-card-<?php echo absint( $count ); ?>:hover {
		background-image: <?php echo FLBuilderColor::gradient( json_decode( json_encode( $card->background_gradient_hover ), true ) ); ?>;
	}
	<?php
	endif;
	FLBuilderCSS::dimension_field_rule( array(
		'settings'	=> $card,
		'setting_name' 	=> 'padding',
		'selector' 	=> ".fl-node-$id .fl-mediaron-card-group-for-beaverbuilder #mediaron-card-$count",
		'unit'		=> 'px',
		'props'		=> array(
			'padding-top' 	 => 'padding_top',
			'padding-right'  => 'padding_right',
			'padding-bottom' => 'padding_bottom',
			'padding-left' 	 => 'padding_left',
		),
	) );
	?>
	.fl-node-<?php echo $id; ?> .fl-mediaron-card-group-for-beaverbuilder #mediaron-card-<?php echo absint( $count ); ?>:hover .fl-mediaron-card-icon-header .mediaron-card-icon {
		background: #<?php echo $card->icon_background_hover; ?>;
		color: #<?php echo $card->icon_color_hover; ?>;
	}
	<?php
	FLBuilderCSS::dimension_field_rule( array(
		'settings'	=> $card,
		'setting_name' 	=> 'icon_padding',
		'selector' 	=> ".fl-node-$id .fl-mediaron-card-group-for-beaverbuilder #mediaron-card-$count .fl-mediaron-card-icon-header .mediaron-card-icon",
		'unit'		=> 'px',
		'props'		=> array(
			'padding-top' 	 => 'icon_padding_top',
			'padding-right'  => 'icon_padding_right',
			'padding-bottom' => 'icon_padding_bottom',
			'padding-left' 	 => 'icon_padding_left',
		),
	) );
	?>
	.fl-node-<?php echo $id; ?> .fl-mediaron-card-group-for-beaverbuilder #mediaron-card-<?php echo absint( $count ); ?> .fl-mediaron-card-photo-header {
		text-align: center;
	}
	.fl-node-<?php echo $id; ?> .fl-mediaron-card-group-for-beaverbuilder #mediaron-card-<?php echo absint( $count ); ?> .fl-mediaron-card-photo-header img.rounded {
		border-radius: 100%;
	}
	.fl-node-<?php echo $id; ?> .fl-mediaron-card-group-for-beaverbuilder #mediaron-card-<?php echo absint( $count ); ?> .fl-mediaron-card-photo-header img {
		width: <?php echo absint( $card->photo_size ); ?>px;
		height: <?php echo absint( $card->photo_size ); ?>px;
	}
	.fl-node-<?php echo $id; ?> #mediaron-card-<?php echo absint( $count ); ?> .fl-mediaron-card-heading {
		font-size: 18px;
		padding: 10px 20px;
		font-weight: 700;
		text-align: center;
	}
	<?php
	FLBuilderCSS::typography_field_rule( array(
		'settings'	=> $card,
		'setting_name' 	=> 'heading_typography',
		'selector' 	=> ".fl-node-$id #mediaron-card-$count .fl-mediaron-card-heading"
	) );
	FLBuilderCSS::dimension_field_rule( array(
		'settings'	=> $card,
		'setting_name' 	=> 'heading_padding',
		'selector' 	=> ".fl-node-$id #mediaron-card-$count .fl-mediaron-card-heading",
		'unit'		=> 'px',
		'props'		=> array(
			'padding-top' 	 => 'heading_padding_top',
			'padding-right'  => 'heading_padding_right',
			'padding-bottom' => 'heading_padding_bottom',
			'padding-left' 	 => 'heading_padding_left',
		),
	) );
	?>
	.fl-node-<?php echo $id; ?> #mediaron-card-<?php echo absint( $count ); ?> .fl-mediaron-card-content {
		font-size: 18px;
		padding: 10px 20px;
		font-weight: 400;
		text-align: center;
	}
	<?php
	FLBuilderCSS::typography_field_rule( array(
		'settings'	=> $card,
		'setting_name' 	=> 'content_typography',
		'selector' 	=> ".fl-node-$id #mediaron-card-$count .fl-mediaron-card-content"
	) );
	FLBuilderCSS::dimension_field_rule( array(
		'settings'	=> $card,
		'setting_name' 	=> 'content_padding',
		'selector' 	=> ".fl-node-$id #mediaron-card-$count .fl-mediaron-card-content",
		'unit'		=> 'px',
		'props'		=> array(
			'padding-top' 	 => 'content_padding_top',
			'padding-right'  => 'content_padding_right',
			'padding-bottom' => 'content_padding_bottom',
			'padding-left' 	 => 'content_padding_left',
		),
	) );
	?>
	.fl-node-<?php echo $id; ?> #mediaron-card-<?php echo absint( $count ); ?> .fl-mediaron-card-subheading {
		font-size: 18px;
		padding: 10px 20px;
		font-weight: 700;
		text-align: center;
	}
	<?php
	FLBuilderCSS::typography_field_rule( array(
		'settings'	=> $card,
		'setting_name' 	=> 'subheading_typography',
		'selector' 	=> ".fl-node-$id #mediaron-card-$count .fl-mediaron-card-subheading"
	) );
	FLBuilderCSS::dimension_field_rule( array(
		'settings'	=> $card,
		'setting_name' 	=> 'subheading_padding',
		'selector' 	=> ".fl-node-$id #mediaron-card-$count .fl-mediaron-card-subheading",
		'unit'		=> 'px',
		'props'		=> array(
			'padding-top' 	 => 'subheading_padding_top',
			'padding-right'  => 'subheading_padding_right',
			'padding-bottom' => 'subheading_padding_bottom',
			'padding-left' 	 => 'subheading_padding_left',
		),
	) );
	?>
	.fl-node-<?php echo $id; ?> #mediaron-card-<?php echo absint( $count ); ?> .fl-mediaron-card-subheading-text {
		font-size: 18px;
		padding: 10px 20px;
		font-weight: 400;
		text-align: center;
	}
	<?php
	FLBuilderCSS::typography_field_rule( array(
		'settings'	=> $card,
		'setting_name' 	=> 'subheading_text_typography',
		'selector' 	=> ".fl-node-$id #mediaron-card-$count .fl-mediaron-card-subheading-text"
	) );
	FLBuilderCSS::dimension_field_rule( array(
		'settings'	=> $card,
		'setting_name' 	=> 'subheading_text_padding',
		'selector' 	=> ".fl-node-$id #mediaron-card-$count .fl-mediaron-card-subheading-text",
		'unit'		=> 'px',
		'props'		=> array(
			'padding-top' 	 => 'subheading_text_padding_top',
			'padding-right'  => 'subheading_text_padding_right',
			'padding-bottom' => 'subheading_text_padding_bottom',
			'padding-left' 	 => 'subheading_text_padding_left',
		),
	) );
	?>
	.fl-node-<?php echo $id; ?> #mediaron-card-<?php echo absint( $count ); ?> .fl-mediaron-card-readmore a  {
		display: inline-block;
		font-size: 18px;
		padding: 10px 20px;
		font-weight: 400;
		margin: 0 auto;
		border: <?php echo $card->button_border; ?>px solid #<?php echo $card->button_border_color; ?>;
	}
	.fl-node-<?php echo $id; ?> .fl-mediaron-card-group-for-beaverbuilder #mediaron-card-<?php echo absint( $count ); ?> .fl-mediaron-card-readmore a,
	.fl-node-<?php echo $id; ?> .fl-mediaron-card-group-for-beaverbuilder #mediaron-card-<?php echo absint( $count ); ?> .fl-mediaron-card-readmore a:hover,
	.fl-node-<?php echo $id; ?> .fl-mediaron-card-group-for-beaverbuilder #mediaron-card-<?php echo absint( $count ); ?> .fl-mediaron-card-readmore a:visited {
		color: #<?php echo $card->button_text_color; ?>;
		text-decoration: none;
	}
	.fl-node-<?php echo $id; ?> .fl-mediaron-card-group-for-beaverbuilder #mediaron-card-<?php echo absint( $count ); ?>  a:hover {
		color: #<?php echo $card->button_text_color_hover; ?>;
	}
	<?php
	if( 'color' === $card->button_background_type ):
	?>
	.fl-node-<?php echo $id; ?> .fl-mediaron-card-group-for-beaverbuilder #mediaron-card-<?php echo absint( $count ); ?> .fl-mediaron-card-readmore a {
		background-color: #<?php echo $card->button_background_color; ?>;
	}
	.fl-node-<?php echo $id; ?> .fl-mediaron-card-group-for-beaverbuilder #mediaron-card-<?php echo absint( $count ); ?> .fl-mediaron-card-readmore a:hover {
		background-color: #<?php echo $card->button_background_color_hover; ?>;
	}
	<?php
	endif;
	if( 'gradient' === $card->button_background_type ):
	?>
	.fl-node-<?php echo $id; ?> .fl-mediaron-card-group-for-beaverbuilder #mediaron-card-<?php echo absint( $count ); ?> .fl-mediaron-card-readmore a {
		background-image: <?php echo FLBuilderColor::gradient( json_decode( json_encode($card->button_color_gradient ), true ) ); ?>;
	}
	.fl-node-<?php echo $id; ?> .fl-mediaron-card-group-for-beaverbuilder #mediaron-card-<?php echo absint( $count ); ?> .fl-mediaron-card-readmore a:hover {
		background-image: <?php echo FLBuilderColor::gradient( json_decode( json_encode($card->button_color_gradient_hover ), true ) ); ?>;
	}
	<?php
	endif;
	FLBuilderCSS::typography_field_rule( array(
		'settings'	=> $card,
		'setting_name' 	=> 'readmore_text_typography',
		'selector' 	=> ".fl-node-$id #mediaron-card-$count .fl-mediaron-card-readmore"
	) );
	FLBuilderCSS::dimension_field_rule( array(
		'settings'	=> $card,
		'setting_name' 	=> 'button_padding',
		'selector' 	=> ".fl-node-$id #mediaron-card-$count .fl-mediaron-card-readmore a",
		'unit'		=> 'px',
		'props'		=> array(
			'padding-top' 	 => 'button_padding_top',
			'padding-right'  => 'button_padding_right',
			'padding-bottom' => 'button_padding_bottom',
			'padding-left' 	 => 'button_padding_left',
		),
	) );
	FLBuilderCSS::dimension_field_rule( array(
		'settings'	=> $card,
		'setting_name' 	=> 'button_border_radius',
		'selector' 	=> ".fl-node-$id .fl-mediaron-card-group-for-beaverbuilder #mediaron-card-$count .fl-mediaron-card-readmore a",
		'unit'		=> 'px',
		'props'		=> array(
			'border-top-left-radius' 	 => 'button_border_radius_top',
			'border-top-right-radius'  => 'button_border_radius_right',
			'border-bottom-left-radius' => 'button_border_radius_bottom',
			'border-bottom-right-radius' 	 => 'button_border_radius_left',
		),
	) );
	FLBuilderCSS::dimension_field_rule( array(
		'settings'	=> $card,
		'setting_name' 	=> 'button_margin',
		'selector' 	=> ".fl-node-$id #mediaron-card-$count .fl-mediaron-card-readmore a",
		'unit'		=> 'px',
		'props'		=> array(
			'margin-top' 	 => 'button_margin_top',
			'margin-right'  => 'button_margin_right',
			'margin-bottom' => 'button_margin_bottom',
			'margin-left' 	 => 'button_margin_left',
		),
	) );
$count += 1;
endforeach;