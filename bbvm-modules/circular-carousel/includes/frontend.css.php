<?php
/**
 * Instagram Slideshow module.
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 1.6.5
 */

?>
.fl-node-<?php echo esc_html( $id ); ?> .fl-node-circular-carousel-slideshow .bbvm-circular-carousel-slide .bbvm-circular-carousel-slide-front,
.fl-node-<?php echo esc_html( $id ); ?> .fl-node-circular-carousel-slideshow .bbvm-circular-carousel-slide .bbvm-circular-carousel-slide-back {
	position: relative;
	max-width: <?php echo absint( $settings->carousel_width ); ?>px;
	max-height: <?php echo absint( $settings->carousel_width ); ?>px;
	height: 100vh;
	width: 100%;
	border-radius: 100%;
	margin: 0 auto;
	display: flex;
	align-items: center;
	justify-content: center;
	overflow: hidden;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-node-circular-carousel-slideshow .bbvm-circular-carousel-slide .bbvm-circular-carousel-slide-back {
	position: absolute;
	display: none;
	z-index: 2;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-node-circular-carousel-slideshow .bbvm-circular-carousel-slide .bbvm-circular-carousel-slide-front:hover .bbvm-circular-carousel-slide-back {
	position: absolute;
	display: block;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	background: #FFF;
	z-index: 10;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-node-circular-carousel-slideshow .bbvm-circular-carousel-slide .bbvm-circular-carousel-slide-front .bbvm-carousel-content,
.fl-node-<?php echo esc_html( $id ); ?> .fl-node-circular-carousel-slideshow .bbvm-circular-carousel-slide .bbvm-circular-carousel-slide-back .bbvm-carousel-content {
	z-index: 2;
}

.fl-node-<?php echo esc_html( $id ); ?> .owl-dots .owl-dot span {
	background: #<?php echo esc_html( $settings->nav_bullets_color ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> .owl-dots .owl-dot.active span {
	background: #<?php echo esc_html( $settings->nav_bullets_active_color ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> .owl-nav {
	position: absolute;
	top: calc(50% - 44px);
	width: 100%;
}
.fl-node-<?php echo esc_html( $id ); ?> .owl-prev {
	position: absolute;
	left: 0;
}
.fl-node-<?php echo esc_html( $id ); ?> .owl-prev,
.fl-node-<?php echo esc_html( $id ); ?> .owl-next {
	float: left;
}
.fl-node-<?php echo esc_html( $id ); ?> .owl-next  {
	float: right;
}
.fl-node-<?php echo esc_html( $id ); ?> .owl-prev i,
.fl-node-<?php echo esc_html( $id ); ?> .owl-next i{
	font-size: 24px;
	color: #<?php echo esc_html( $settings->nav_color ); ?>;
	background: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->nav_background ) ); ?>;
	padding: 10px;
	border-radius: 50%;
}
.fl-node-<?php echo esc_html( $id ); ?> .owl-theme .owl-nav [class*=owl-]:hover {
	background: transparent;
}
<?php
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'card_padding',
		'selector'     => ".fl-node-$id .bbvm-circular-carousel-slide .bbvm-circular-carousel-slide-front, .fl-node-$id .bbvm-circular-carousel-slide .bbvm-circular-carousel-slide-back",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'card_padding_top',
			'padding-right'  => 'card_padding_right',
			'padding-bottom' => 'card_padding_bottom',
			'padding-left'   => 'card_padding_left',
		),
	)
);
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'card_margin',
		'selector'     => ".fl-node-$id .bbvm-circular-carousel-slide .bbvm-circular-carousel-slide-front, .fl-node-$id .bbvm-circular-carousel-slide .bbvm-circular-carousel-slide-back",
		'unit'         => 'px',
		'props'        => array(
			'margin-top'    => 'card_margin_top',
			'margin-right'  => 'card_margin_right',
			'margin-bottom' => 'card_margin_bottom',
			'margin-left'   => 'card_margin_left',
		),
	)
);
?>
.fl-node-<?php echo esc_html( $id ); ?> .is-placeholder {
	background: transparent !important;
	padding: 0 !important;
	margin: 0 !important;
}
<?php
$count = 1;
foreach ( $settings->circles as $key => $circle ) :
	FLBuilderCSS::typography_field_rule(
		array(
			'settings'     => $circle,
			'setting_name' => 'text_typography',
			'selector'     => ".fl-node-$id .bbvm-circular-carousel-slide.slide-$count .bbvm-circular-carousel-slide-front",
		)
	);
	FLBuilderCSS::border_field_rule(
		array(
			'settings'     => $circle,
			'setting_name' => 'front_border',
			'selector'     => ".fl-node-$id .bbvm-circular-carousel-slide.slide-$count .bbvm-circular-carousel-slide-front",
		)
	);
	?>
	.fl-node-<?php echo esc_html( $id ); ?> .fl-node-circular-carousel-slideshow .bbvm-circular-carousel-slide.slide-<?php echo absint( $count ); ?> .bbvm-circular-carousel-slide-front {
		background-image: url(<?php echo esc_url( $circle->background_image_src ); ?>);
		background-size: cover;
		background-position: center center;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .fl-node-circular-carousel-slideshow .bbvm-circular-carousel-slide.slide-<?php echo absint( $count ); ?> .bbvm-circular-carousel-slide-front {
		color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $circle->text_color ) ); ?>
	}
	<?php if ( 'background' === $circle->overlay_type ) : ?>
		.fl-node-<?php echo esc_html( $id ); ?> .fl-node-circular-carousel-slideshow .bbvm-circular-carousel-slide.slide-<?php echo absint( $count ); ?> .bbvm-circular-carousel-slide-front:before {
			background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $circle->overlay_background ) ); ?>;
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			content: ' ';
			z-index: 1;
		}
		<?php
	endif;
	if ( 'gradient' === $circle->overlay_type ) :
		?>
		.fl-node-<?php echo esc_html( $id ); ?> .fl-node-circular-carousel-slideshow .bbvm-circular-carousel-slide.slide-<?php echo absint( $count ); ?> .bbvm-circular-carousel-slide-front:before {
			background-image: <?php echo FLBuilderColor::gradient( json_decode( json_encode( $circle->overlay_gradient ), true ) ); // phpcs:ignore ?>;
			background-size: cover;
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			content: ' ';
			z-index: 1;
		}
		<?php
	endif;
	++$count;
endforeach;
