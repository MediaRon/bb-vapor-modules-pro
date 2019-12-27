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
.fl-node-<?php echo esc_html( $id ); ?> .fl-node-circular-carousel-slideshow .bbvm-circular-carousel-slide {
	max-width: 240px;
	max-height: 240px;
	height: 100vh;
	width: 100%;
	border: 1px solid red;
	border-radius: 100%;
	background-color: #FFF;
	color: #000;
	margin: 0 auto;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-node-instafeed-slideshow .instagram-image-slide {
	width: 100%;
	text-align: center;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-instagram-slideshow .instagram-author {
	display: flex;
	justify-content: flex-start;
	align-items: center;
	padding: 10px 0;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-instagram-slideshow .instagram-author img {
	width: 50px;
	height: 50px;
	border-radius: 100%;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-instagram-slideshow .instagram-author a,
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-instagram-slideshow .instagram-author a:hover,
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-instagram-slideshow .instagram-author a:visited {
	color: #000000;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-instagram-slideshow .instagram-buttons {
	margin-top: 20px;
	text-align: center;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-instagram-slideshow .instagram-buttons a {
	display: inline-block;
	padding: 10px 20px;
	text-decoration: none;
	border-radius: 5px;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-instagram-slideshow .instagram-buttons a.instagram-follow,
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-instagram-slideshow .instagram-buttons a.instagram-follow:hover,
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-instagram-slideshow .instagram-buttons a.instagram-follow:visited {
	color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->follow_text_color ) ); ?>;
	background: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->follow_background_color ) ); ?>;
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
.fl-node-<?php echo esc_html( $id ); ?> .instagram-author {
	display: flex;
	justify-content: flex-start;
	align-items: center;
	padding: 10px 0;
}
.fl-node-<?php echo esc_html( $id ); ?> .instagram-author img {
	width: 50px;
	height: 50px;
	border-radius: 100%;
}
.fl-node-<?php echo esc_html( $id ); ?> .instagram-author a,
.fl-node-<?php echo esc_html( $id ); ?> .instagram-author a:hover,
.fl-node-<?php echo esc_html( $id ); ?> .instagram-author a:visited {
	color: #000000;
}
<?php
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'card_padding',
		'selector'     => ".fl-node-$id .instagram-image-slide",
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
		'selector'     => ".fl-node-$id .instagram-image-slide",
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
if ( isset( $settings->lightbox_caption ) && 'yes' === $settings->lightbox_caption ) :
	?>
	.bbvm-mfp-fade .mfp-bottom-bar {
		bottom: 0;
		margin: 0;
	}
	.bbvm-mfp-fade .mfp-title {
		text-align: center;
		background: rgba(0,0,0,0.4);
		font-size: 18px;
		padding: 20px 20px;
		line-height: 1.2;
	}
	<?php else : ?>
	.bbvm-mfp-fade .mfp-bottom-bar {
		display: none;
	}
<?php endif; ?>
.fl-node-<?php echo esc_html( $id ); ?> .instagram-image-slide {
	overflow: hidden;
}
.fl-node-<?php echo esc_html( $id ); ?> .instagram-image-slide img {
	transition: transform .5s ease;
}
.fl-node-<?php echo esc_html( $id ); ?> .instagram-image-slide img:hover {
	transform: scale(1.2);
}
