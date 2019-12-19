<?php
/**
 * Photo Module Module.
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 1.7.0
 */

// Background Image.
if ( 'yes' === $settings->background_image ) {
	?>
	.fl-node-<?php echo esc_html( $id ); ?> figure {
		min-height: <?php echo absint( $settings->photo_min_height ); ?><?php echo esc_html( $settings->photo_min_height_unit ); ?>;
		background-image: url('<?php echo esc_url( $settings->image_src ); ?>');
		background-repeat: no-repeat;
		background-size: cover;
		background-position: center center;
		display: inline-block;
		width: 100%;
	}
	<?php
}
// Overlays.
?>
@keyframes bbvm-fadein {
	from { opacity: 0; }
	to   { opacity: 1; }
}
@keyframes bbvm-slide-up-horizontal-bottom {
	from { bottom: -1000px; }
	to   { bottom: 0; }
}
@keyframes bbvm-slide-down-horizontal-top {
	from { top: -1000px; }
	to   { top: 0; }
}
@keyframes bbvm-slide-up-horizontal-bottom {
	from { bottom: -1000px; }
	to   { bottom: 0; }
}
@keyframes bbvm-slide-down-horizontal-bottom {
	from { top: -1000px; bottom: 200% }
	to   { top: inherit; bottom: 0; }
}
@keyframes bbvm-slide-down-horizontal-top {
	from { top: -1000px; }
	to   { top: 0; }
}
@keyframes bbvm-slide-up-horizontal-top {
	from { bottom: -10000px; top: 200%; }
	to   { bottom: inherit; top: 0; }
}
@keyframes bbvm-slide-left {
	from { left: -10000px; }
	to   { left: 0 }
}
@keyframes bbvm-slide-right-top {
	from { right: -10000px; left: 100%; top: 0; }
	to   { left: 0; right: inherit; top: 0; }
}
@keyframes bbvm-slide-right-bottom {
	from { right: -10000px; left: 100%; bottom: 0; }
	to   { bottom: 0; right: inherit; }
}
<?php if ( 'yes' === $settings->display_caption && 'overlay' === $settings->caption_display ) : ?>
	.fl-node-<?php echo esc_html( $id ); ?> figcaption * {
		color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->overlay_text_color ) ); ?> !important;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-photo figure,
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-photo img {
		position: relative;
		display: inline-block;
		padding: 0;
		margin: 0;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-photo figcaption {
		padding; 0;
		margin: 0;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-photo figure.horizontal {
		position: relative;
		box-sizing: border-box;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-photo figure.horizontal figcaption p {
		padding: 0;
		margin: 0;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-photo figure.horizontal .hover-only {
		opacity: 0;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-photo figure.horizontal.regular:hover .hover-only {
		opacity: 1;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-photo figure.horizontal.fade:hover .hover-only {
		-webkit-animation: bbvm-fadein <?php echo absint( $settings->animation_duration ); ?>s;
		-moz-animation: bbvm-fadein <?php echo absint( $settings->animation_duration ); ?>s;
		-ms-animation: bbvm-fadein <?php echo absint( $settings->animation_duration ); ?>s;
		-o-animation: bbvm-fadein <?php echo absint( $settings->animation_duration ); ?>s;
		animation: bbvm-fadein <?php echo absint( $settings->animation_duration ); ?>s;
		opacity: 1;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-photo figure.horizontal.fade figcaption:not(.hover-only) {
		-webkit-animation: bbvm-fadein <?php echo absint( $settings->animation_duration ); ?>s;
		-moz-animation: bbvm-fadein <?php echo absint( $settings->animation_duration ); ?>s;
		-ms-animation: bbvm-fadein <?php echo absint( $settings->animation_duration ); ?>s;
		-o-animation: bbvm-fadein <?php echo absint( $settings->animation_duration ); ?>s;
		animation: bbvm-fadein <?php echo absint( $settings->animation_duration ); ?>s;
		opacity: 1;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-photo figure.horizontal figcaption.top {
		background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->overlay_background_color ) ); ?>;
		color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->overlay_text_color ) ); ?>;
		position: absolute;
		width: 100%;
		top: 0;
		left: 0;
		z-index: 20;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-photo figure.horizontal:hover figcaption.top {
		background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->overlay_background_color ) ); ?>;
		color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->overlay_text_color ) ); ?>;
		position: absolute;
		width: 100%;
		top: 0;
		left: 0;
		z-index: 20;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-photo figure.horizontal.slideleft figcaption.top:not(.hover-only) {
		background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->overlay_background_color ) ); ?>;
		color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->overlay_text_color ) ); ?>;
		position: absolute;
		width: 100%;
		left: -10000px;
		opacity: 1;
		-webkit-animation: bbvm-slide-left <?php echo absint( $settings->animation_duration ); ?>s;
		-moz-animation: bbvm-slide-left <?php echo absint( $settings->animation_duration ); ?>s;
		-ms-animation: bbvm-slide-left <?php echo absint( $settings->animation_duration ); ?>s;
		-o-animation: bbvm-slide-left <?php echo absint( $settings->animation_duration ); ?>s;
		animation: bbvm-slide-left <?php echo absint( $settings->animation_duration ); ?>s;
		top: 0;
		left: 0;
		z-index: 20;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-photo figure.horizontal.slideleft:hover figcaption.top {
		background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->overlay_background_color ) ); ?>;
		color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->overlay_text_color ) ); ?>;
		position: absolute;
		width: 100%;
		left: -10000px;
		opacity: 1;
		-webkit-animation: bbvm-slide-left <?php echo absint( $settings->animation_duration ); ?>s;
		-moz-animation: bbvm-slide-left <?php echo absint( $settings->animation_duration ); ?>s;
		-ms-animation: bbvm-slide-left <?php echo absint( $settings->animation_duration ); ?>s;
		-o-animation: bbvm-slide-left <?php echo absint( $settings->animation_duration ); ?>s;
		animation: bbvm-slide-left <?php echo absint( $settings->animation_duration ); ?>s;
		top: 0;
		left: 0;
		z-index: 20;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-photo figure.horizontal.slideright figcaption.top:not(.hover-only) {
		background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->overlay_background_color ) ); ?>;
		color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->overlay_text_color ) ); ?>;
		position: absolute;
		width: 100%;
		right: -10000px;
		top: 0;
		opacity: 1;
		left: 100%;
		-webkit-animation: bbvm-slide-right-top <?php echo absint( $settings->animation_duration ); ?>s;
		-moz-animation: bbvm-slide-right-top <?php echo absint( $settings->animation_duration ); ?>s;
		-ms-animation: bbvm-slide-right-top <?php echo absint( $settings->animation_duration ); ?>s;
		-o-animation: bbvm-slide-right-top <?php echo absint( $settings->animation_duration ); ?>s;
		animation: bbvm-slide-right-top <?php echo absint( $settings->animation_duration ); ?>s;
		left: 0;
		top: 0;
		z-index: 20;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-photo figure.horizontal.slideright:hover figcaption.top {
		background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->overlay_background_color ) ); ?>;
		color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->overlay_text_color ) ); ?>;
		position: absolute;
		width: 100%;
		right: -10000px;
		opacity: 1;
		top: 0;
		left: 100%;
		-webkit-animation: bbvm-slide-right-top <?php echo absint( $settings->animation_duration ); ?>s;
		-moz-animation: bbvm-slide-right-top <?php echo absint( $settings->animation_duration ); ?>s;
		-ms-animation: bbvm-slide-right-top <?php echo absint( $settings->animation_duration ); ?>s;
		-o-animation: bbvm-slide-right-top <?php echo absint( $settings->animation_duration ); ?>s;
		animation: bbvm-slide-right-top <?php echo absint( $settings->animation_duration ); ?>s;
		left: 0;
		top: 0;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-photo figure.horizontal.hover-only.fade figcaption.top:not(.hover-only) {
		background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->overlay_background_color ) ); ?>;
		color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->overlay_text_color ) ); ?>;
		position: absolute;
		width: 100%;
		opacity: 0;
		top: 0;
		left: 0;
		-webkit-animation: bbvm-fadein <?php echo absint( $settings->animation_duration ); ?>s;
		-moz-animation: bbvm-fadein <?php echo absint( $settings->animation_duration ); ?>s;
		-ms-animation: bbvm-fadein <?php echo absint( $settings->animation_duration ); ?>s;
		-o-animation: bbvm-fadein <?php echo absint( $settings->animation_duration ); ?>s;
		animation: bbvm-fadein <?php echo absint( $settings->animation_duration ); ?>s;
		opacity: 1;
		z-index: 20;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-photo figure.horizontal.middle {
		position: relative;
		display: flex;
		align-items: center;
		justify-content: center;
		text-align: center;
		object-fit: cover;
		width: 100%;
		height: 100%;
		z-index: 20;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-photo figure.horizontal.middle img {
		width: 100%;
		object-fit: cover;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-photo figure.horizontal.middle figcaption {
		background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->overlay_background_color ) ); ?>;
		color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->overlay_text_color ) ); ?>;
		position: absolute;
		width: 100%;
		z-index: 20;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-photo figure.horizontal.middle:hover figcaption {
		background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->overlay_background_color ) ); ?>;
		color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->overlay_text_color ) ); ?>;
		position: absolute;
		width: 100%;
		z-index: 20;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-photo figure.horizontal.middle.fade figcaption:not(.hover-only) {
		background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->overlay_background_color ) ); ?>;
		color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->overlay_text_color ) ); ?>;
		position: absolute;
		width: 100%;
		opacity: 0;
		-webkit-animation: bbvm-fadein <?php echo absint( $settings->animation_duration ); ?>s;
		-moz-animation: bbvm-fadein <?php echo absint( $settings->animation_duration ); ?>s;
		-ms-animation: bbvm-fadein <?php echo absint( $settings->animation_duration ); ?>s;
		-o-animation: bbvm-fadein <?php echo absint( $settings->animation_duration ); ?>s;
		animation: bbvm-fadein <?php echo absint( $settings->animation_duration ); ?>s;
		opacity: 1;
		z-index: 20;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-photo figure.horizontal.middle.slideup:hover figcaption {
		background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->overlay_background_color ) ); ?>;
		color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->overlay_text_color ) ); ?>;
		position: absolute;
		width: 100%;
		opacity: 0;
		-webkit-animation: bbvm-fadein <?php echo absint( $settings->animation_duration ); ?>s;
		-moz-animation: bbvm-fadein <?php echo absint( $settings->animation_duration ); ?>s;
		-ms-animation: bbvm-fadein <?php echo absint( $settings->animation_duration ); ?>s;
		-o-animation: bbvm-fadein <?php echo absint( $settings->animation_duration ); ?>s;
		animation: bbvm-fadein <?php echo absint( $settings->animation_duration ); ?>s;
		opacity: 1;
		z-index: 20;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-photo figure.horizontal.bottom figcaption.bottom {
		background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->overlay_background_color ) ); ?>;
		color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->overlay_text_color ) ); ?>;
		position: absolute;
		width: 100%;
		bottom: 0;
		left: 0;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-photo figure.horizontal.fade figcaption.bottom:not(.hover-only) {
		background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->overlay_background_color ) ); ?>;
		color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->overlay_text_color ) ); ?>;
		position: absolute;
		width: 100%;
		bottom: 0;
		left: 0;
		opacity: 0;
		-webkit-animation: bbvm-fadein <?php echo absint( $settings->animation_duration ); ?>s;
		-moz-animation: bbvm-fadein <?php echo absint( $settings->animation_duration ); ?>s;
		-ms-animation: bbvm-fadein <?php echo absint( $settings->animation_duration ); ?>s;
		-o-animation: bbvm-fadein <?php echo absint( $settings->animation_duration ); ?>s;
		animation: bbvm-fadein <?php echo absint( $settings->animation_duration ); ?>s;
		opacity: 1;
		z-index: 20;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-photo figure.horizontal.slideup figcaption.bottom:not(.hover-only) {
		background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->overlay_background_color ) ); ?>;
		color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->overlay_text_color ) ); ?>;
		position: absolute;
		width: 100%;
		left: 0;
		opacity: 1;
		-webkit-animation: bbvm-slide-up-horizontal-bottom <?php echo absint( $settings->animation_duration ); ?>s;
		-moz-animation: bbvm-slide-up-horizontal-bottom <?php echo absint( $settings->animation_duration ); ?>s;
		-ms-animation: bbvm-slide-up-horizontal-bottom <?php echo absint( $settings->animation_duration ); ?>s;
		-o-animation: bbvm-slide-up-horizontal-bottom <?php echo absint( $settings->animation_duration ); ?>s;
		animation: bbvm-slide-up-horizontal-bottom <?php echo absint( $settings->animation_duration ); ?>s;
		bottom: 0;
		z-index: 20;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-photo figure.horizontal.slideup:hover figcaption.bottom {
		background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->overlay_background_color ) ); ?>;
		color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->overlay_text_color ) ); ?>;
		position: absolute;
		width: 100%;
		left: 0;
		opacity: 1;
		-webkit-animation: bbvm-slide-up-horizontal-bottom <?php echo absint( $settings->animation_duration ); ?>s;
		-moz-animation: bbvm-slide-up-horizontal-bottom <?php echo absint( $settings->animation_duration ); ?>s;
		-ms-animation: bbvm-slide-up-horizontal-bottom <?php echo absint( $settings->animation_duration ); ?>s;
		-o-animation: bbvm-slide-up-horizontal-bottom <?php echo absint( $settings->animation_duration ); ?>s;
		animation: bbvm-slide-up-horizontal-bottom <?php echo absint( $settings->animation_duration ); ?>s;
		bottom: 0;
		z-index: 20;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-photo figure.horizontal.bottom.slidedown figcaption.bottom:not(.hover-only) {
		background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->overlay_background_color ) ); ?>;
		color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->overlay_text_color ) ); ?>;
		position: absolute;
		width: 100%;
		left: 0;
		top: -2000px;
		bottom: 100%;
		-webkit-animation: bbvm-slide-down-horizontal-bottom <?php echo absint( $settings->animation_duration ); ?>s;
		-moz-animation: bbvm-slide-down-horizontal-bottom <?php echo absint( $settings->animation_duration ); ?>s;
		-ms-animation: bbvm-slide-down-horizontal-bottom <?php echo absint( $settings->animation_duration ); ?>s;
		-o-animation: bbvm-slide-down-horizontal-bottom <?php echo absint( $settings->animation_duration ); ?>s;
		animation: bbvm-slide-down-horizontal-bottom <?php echo absint( $settings->animation_duration ); ?>s;
		opacity: 1;
		top: inherit;
		bottom: 0;
		z-index: 20;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-photo figure.horizontal.bottom.slidedown:hover figcaption.bottom {
		background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->overlay_background_color ) ); ?>;
		color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->overlay_text_color ) ); ?>;
		position: absolute;
		width: 100%;
		left: 0;
		top: -2000px;
		bottom: 100%;
		-webkit-animation: bbvm-slide-down-horizontal-bottom <?php echo absint( $settings->animation_duration ); ?>s;
		-moz-animation: bbvm-slide-down-horizontal-bottom <?php echo absint( $settings->animation_duration ); ?>s;
		-ms-animation: bbvm-slide-down-horizontal-bottom <?php echo absint( $settings->animation_duration ); ?>s;
		-o-animation: bbvm-slide-down-horizontal-bottom <?php echo absint( $settings->animation_duration ); ?>s;
		animation: bbvm-slide-down-horizontal-bottom <?php echo absint( $settings->animation_duration ); ?>s;
		opacity: 1;
		top: inherit;
		bottom: 0;
		z-index: 20;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-photo figure.horizontal.bottom.slideleft figcaption.bottom:not(.hover-only) {
		background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->overlay_background_color ) ); ?>;
		color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->overlay_text_color ) ); ?>;
		position: absolute;
		width: 100%;
		left: -10000px;
		opacity: 1;
		-webkit-animation: bbvm-slide-left <?php echo absint( $settings->animation_duration ); ?>s;
		-moz-animation: bbvm-slide-left <?php echo absint( $settings->animation_duration ); ?>s;
		-ms-animation: bbvm-slide-left <?php echo absint( $settings->animation_duration ); ?>s;
		-o-animation: bbvm-slide-left <?php echo absint( $settings->animation_duration ); ?>s;
		animation: bbvm-slide-left <?php echo absint( $settings->animation_duration ); ?>s;
		opacity: 1;
		left: 0;
		z-index: 20;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-photo figure.horizontal.bottom.slideleft:hover figcaption.bottom {
		background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->overlay_background_color ) ); ?>;
		color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->overlay_text_color ) ); ?>;
		position: absolute;
		width: 100%;
		left: -10000px;
		opacity: 1;
		-webkit-animation: bbvm-slide-left <?php echo absint( $settings->animation_duration ); ?>s;
		-moz-animation: bbvm-slide-left <?php echo absint( $settings->animation_duration ); ?>s;
		-ms-animation: bbvm-slide-left <?php echo absint( $settings->animation_duration ); ?>s;
		-o-animation: bbvm-slide-left <?php echo absint( $settings->animation_duration ); ?>s;
		animation: bbvm-slide-left <?php echo absint( $settings->animation_duration ); ?>s;
		opacity: 1;
		left: 0;
		z-index: 20;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-photo figure.horizontal.bottom.slideright figcaption.bottom:not(.hover-only) {
		background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->overlay_background_color ) ); ?>;
		color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->overlay_text_color ) ); ?>;
		position: absolute;
		width: 100%;
		right: -10000px;
		opacity: 1;
		-webkit-animation: bbvm-slide-right-bottom <?php echo absint( $settings->animation_duration ); ?>s;
		-moz-animation: bbvm-slide-right-bottom <?php echo absint( $settings->animation_duration ); ?>s;
		-ms-animation: bbvm-slide-right-bottom <?php echo absint( $settings->animation_duration ); ?>s;
		-o-animation: bbvm-slide-right-bottom <?php echo absint( $settings->animation_duration ); ?>s;
		animation: bbvm-slide-right-bottom <?php echo absint( $settings->animation_duration ); ?>s;
		opacity: 1;
		right: inherit;
		left: 0;
		z-index: 20;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-photo figure.horizontal.bottom.slideright:hover figcaption.bottom {
		background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->overlay_background_color ) ); ?>;
		color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->overlay_text_color ) ); ?>;
		position: absolute;
		width: 100%;
		right: -10000px;
		opacity: 1;
		-webkit-animation: bbvm-slide-right-bottom <?php echo absint( $settings->animation_duration ); ?>s;
		-moz-animation: bbvm-slide-right-bottom <?php echo absint( $settings->animation_duration ); ?>s;
		-ms-animation: bbvm-slide-right-bottom <?php echo absint( $settings->animation_duration ); ?>s;
		-o-animation: bbvm-slide-right-bottom <?php echo absint( $settings->animation_duration ); ?>s;
		animation: bbvm-slide-right-bottom <?php echo absint( $settings->animation_duration ); ?>s;
		opacity: 1;
		right: inherit;
		left: 0;
		z-index: 20;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-photo figure.horizontal.top.slideup figcaption.top:not(.hover-only) {
		background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->overlay_background_color ) ); ?>;
		color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->overlay_text_color ) ); ?>;
		position: absolute;
		width: 100%;
		left: 0;
		bottom: -1000px;
		top: 100%;
		opacity: 0;
		-webkit-animation: bbvm-slide-up-horizontal-top <?php echo absint( $settings->animation_duration ); ?>s;
		-moz-animation: bbvm-slide-up-horizontal-top <?php echo absint( $settings->animation_duration ); ?>s;
		-ms-animation: bbvm-slide-up-horizontal-top <?php echo absint( $settings->animation_duration ); ?>s;
		-o-animation: bbvm-slide-up-horizontal-top <?php echo absint( $settings->animation_duration ); ?>s;
		animation: bbvm-slide-up-horizontal-top <?php echo absint( $settings->animation_duration ); ?>s;
		bottom: inherit;
		opacity: 1;
		top: 0;
		z-index: 20;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-photo figure.horizontal.top.slideup:hover figcaption.top {
		background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->overlay_background_color ) ); ?>;
		color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->overlay_text_color ) ); ?>;
		position: absolute;
		width: 100%;
		bottom: -1000px;
		top: 100%;
		left: 0;
		opacity: 0;
		-webkit-animation: bbvm-slide-up-horizontal-top <?php echo absint( $settings->animation_duration ); ?>s;
		-moz-animation: bbvm-slide-up-horizontal-top <?php echo absint( $settings->animation_duration ); ?>s;
		-ms-animation: bbvm-slide-up-horizontal-top <?php echo absint( $settings->animation_duration ); ?>s;
		-o-animation: bbvm-slide-up-horizontal-top <?php echo absint( $settings->animation_duration ); ?>s;
		animation: bbvm-slide-up-horizontal-top <?php echo absint( $settings->animation_duration ); ?>s;
		bottom: inherit;
		opacity: 1;
		top: 0;
		z-index: 20;
	}
	fl-node-<?php echo esc_html( $id ); ?> .bbvm-photo figure.horizontal.top.slidedown figcaption.top:not(.hover-only) {
		background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->overlay_background_color ) ); ?>;
		color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->overlay_text_color ) ); ?>;
		position: absolute;
		width: 100%;
		left: 0;
		bottom: -1000px;
		opacity: 0;
		-webkit-animation: bbvm-slide-down-horizontal-top <?php echo absint( $settings->animation_duration ); ?>s;
		-moz-animation: bbvm-slide-down-horizontal-top <?php echo absint( $settings->animation_duration ); ?>s;
		-ms-animation: bbvm-slide-down-horizontal-top <?php echo absint( $settings->animation_duration ); ?>s;
		-o-animation: bbvm-slide-down-horizontal-top <?php echo absint( $settings->animation_duration ); ?>s;
		animation: bbvm-slide-down-horizontal-top <?php echo absint( $settings->animation_duration ); ?>s;
		bottom: inherit;
		opacity: 1;
		top: 0;
		z-index: 20;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-photo figure.horizontal.top.slidedown:hover figcaption.top {
		background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->overlay_background_color ) ); ?>;
		color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->overlay_text_color ) ); ?>;
		position: absolute;
		width: 100%;
		bottom: -1000px;
		left: 0;
		opacity: 0;
		-webkit-animation: bbvm-slide-down-horizontal-top <?php echo absint( $settings->animation_duration ); ?>s;
		-moz-animation: bbvm-slide-down-horizontal-top <?php echo absint( $settings->animation_duration ); ?>s;
		-ms-animation: bbvm-slide-down-horizontal-top <?php echo absint( $settings->animation_duration ); ?>s;
		-o-animation: bbvm-slide-down-horizontal-top <?php echo absint( $settings->animation_duration ); ?>s;
		animation: bbvm-slide-down-horizontal-top <?php echo absint( $settings->animation_duration ); ?>s;
		bottom: inherit;
		opacity: 1;
		top: 0;
		z-index: 20;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-photo figure.full figcaption {
		display: flex;
		align-items: center;
		justify-content: center;
		position: absolute;
		background: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->overlay_background_color ) ); ?>;
		color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->overlay_text_color ) ); ?>;
		width: 100%;
		height: 100%;
		z-index: 20;
		top: 0;
		left: 0;
		z-index: 20;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-photo figure.full .hover-only {
		opacity: 0;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-photo figure.full.regular:hover .hover-only {
		opacity: 1;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-photo figure.full.fade figcaption:not(.hover-only) {
		display: flex;
		align-items: center;
		justify-content: center;
		position: absolute;
		background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->overlay_background_color ) ); ?>;
		color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->overlay_text_color ) ); ?>;
		width: 100%;
		height: 100%;
		top: 0;
		left: 0;
		opacity: 0;
		-webkit-animation: bbvm-fadein <?php echo absint( $settings->animation_duration ); ?>s;
		-moz-animation: bbvm-fadein <?php echo absint( $settings->animation_duration ); ?>s;
		-ms-animation: bbvm-fadein <?php echo absint( $settings->animation_duration ); ?>s;
		-o-animation: bbvm-fadein <?php echo absint( $settings->animation_duration ); ?>s;
		animation: bbvm-fadein <?php echo absint( $settings->animation_duration ); ?>s;
		opacity: 1;
		z-index: 20;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-photo figure.full.fade:hover .hover-only {
		display: flex;
		align-items: center;
		justify-content: center;
		position: absolute;
		background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->overlay_background_color ) ); ?>;
		color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->overlay_text_color ) ); ?>;
		width: 100%;
		height: 100%;
		top: 0;
		left: 0;
		opacity: 0;
		-webkit-animation: bbvm-fadein <?php echo absint( $settings->animation_duration ); ?>s;
		-moz-animation: bbvm-fadein <?php echo absint( $settings->animation_duration ); ?>s;
		-ms-animation: bbvm-fadein <?php echo absint( $settings->animation_duration ); ?>s;
		-o-animation: bbvm-fadein <?php echo absint( $settings->animation_duration ); ?>s;
		animation: bbvm-fadein <?php echo absint( $settings->animation_duration ); ?>s;
		opacity: 1;
		z-index: 20;
	}
	<?php
	FLBuilderCSS::dimension_field_rule(
		array(
			'settings'     => $settings,
			'setting_name' => 'overlay_padding',
			'selector'     => ".fl-node-$id .bbvm-photo figcaption",
			'unit'         => 'px',
			'props'        => array(
				'padding-top'    => 'overlay_padding_top',
				'padding-right'  => 'overlay_padding_right',
				'padding-bottom' => 'overlay_padding_bottom',
				'padding-left'   => 'overlay_padding_left',
			),
		)
	);
	FLBuilderCSS::typography_field_rule(
		array(
			'settings'     => $settings,
			'setting_name' => 'overlay_typography',
			'selector'     => ".fl-node-$id .bbvm-photo figcaption, .fl-node-$id .bbvm-photo figcaption *",
		)
	);
endif;

// Image styles.
$image_justify = 'center';
if ( 'left' === $settings->image_align ) {
	$image_justify = 'flex-start';
}
if ( 'right' === $settings->image_align ) {
	$image_justify = 'flex-end';
}
?>
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-photo figure {
	display: flex;
	align-items: center;
	justify-content: <?php echo esc_html( $image_justify ); ?>;
	text-align: center;
	object-fit: cover;
	width: 100%;
	height: 100%;
	flex-wrap: wrap;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-photo figure figcaption {
	width: 100%;
}
<?php
// Image Appearance Options.
if ( 'appearance-circular' === $settings->image_appearance ) {
	?>
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-photo figure img,
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-photo figure {
		border-radius: 100%;
		overflow: hidden;
	}
	<?php
}
if ( 'appearance-mirror' === $settings->image_appearance ) {
	?>
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-photo figure img {
		-webkit-box-reflect: below 0px -webkit-gradient(linear, left top, left bottom, from(transparent), color-stop(70%, transparent) , to(rgba(250, 250, 250, 0.3)));
	}
	<?php
}

// Caption Below Image styles.
if ( 'below' === $settings->caption_display ) :
	$image_justify = 'center';
	if ( 'left' === $settings->caption_typography['text_align'] ) {
		$image_justify = 'flex-start';
	}
	if ( 'right' === $settings->caption_typography['text_align'] ) {
		$image_justify = 'flex-end';
	}
	?>
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-photo figcaption {
		display: flex;
		align-items: center;
		justify-content: <?php echo esc_html( $image_justify ); ?>;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-photo figcaption p {
		margin: 0;
		padding: 0;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-photo figcaption,
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-photo figcaption * {
		color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->caption_text_color ) ); ?>;
		background: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->caption_background_color ) ); ?>;
	}
	<?php
	FLBuilderCSS::dimension_field_rule(
		array(
			'settings'     => $settings,
			'setting_name' => 'caption_padding',
			'selector'     => ".fl-node-$id .bbvm-photo figcaption",
			'unit'         => 'px',
			'props'        => array(
				'padding-top'    => 'caption_padding_top',
				'padding-right'  => 'caption_padding_right',
				'padding-bottom' => 'caption_padding_bottom',
				'padding-left'   => 'caption_padding_left',
			),
		)
	);
	FLBuilderCSS::dimension_field_rule(
		array(
			'settings'     => $settings,
			'setting_name' => 'caption_margin',
			'selector'     => ".fl-node-$id .bbvm-photo figcaption",
			'unit'         => 'px',
			'props'        => array(
				'margin-top'    => 'caption_margin_top',
				'margin-right'  => 'caption_margin_right',
				'margin-bottom' => 'caption_margin_bottom',
				'margin-left'   => 'caption_margin_left',
			),
		)
	);
	FLBuilderCSS::typography_field_rule(
		array(
			'settings'     => $settings,
			'setting_name' => 'caption_typography',
			'selector'     => ".fl-node-$id .bbvm-photo figcaption, .fl-node-$id .bbvm-photo figcaption *",
		)
	);
	FLBuilderCSS::border_field_rule(
		array(
			'settings'     => $settings,
			'setting_name' => 'caption_border',
			'selector'     => ".fl-node-$id .bbvm-photo figcaption",
		)
	);
endif;

// Title styles.
// Caption Below Image styles.
if ( 'yes' === $settings->display_title ) :
	$image_justify = 'center';
	if ( 'left' === $settings->title_typography['text_align'] ) {
		$image_justify = 'flex-start';
	}
	if ( 'right' === $settings->title_typography['text_align'] ) {
		$image_justify = 'flex-end';
	}
	?>
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-photo-title {
		display: flex;
		align-items: center;
		justify-content: <?php echo esc_html( $image_justify ); ?>;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-photo-title p {
		margin: 0;
		padding: 0;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-photo-title,
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-photo-title * {
		color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->title_text_color ) ); ?>;
		background: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->title_background_color ) ); ?>;
	}
	<?php
	FLBuilderCSS::dimension_field_rule(
		array(
			'settings'     => $settings,
			'setting_name' => 'title_padding',
			'selector'     => ".fl-node-$id .bbvm-photo-title",
			'unit'         => 'px',
			'props'        => array(
				'padding-top'    => 'title_padding_top',
				'padding-right'  => 'title_padding_right',
				'padding-bottom' => 'title_padding_bottom',
				'padding-left'   => 'title_padding_left',
			),
		)
	);
	FLBuilderCSS::dimension_field_rule(
		array(
			'settings'     => $settings,
			'setting_name' => 'title_margin',
			'selector'     => ".fl-node-$id .bbvm-photo-title",
			'unit'         => 'px',
			'props'        => array(
				'margin-top'    => 'title_margin_top',
				'margin-right'  => 'title_margin_right',
				'margin-bottom' => 'title_margin_bottom',
				'margin-left'   => 'title_margin_left',
			),
		)
	);
	FLBuilderCSS::typography_field_rule(
		array(
			'settings'     => $settings,
			'setting_name' => 'title_typography',
			'selector'     => ".fl-node-$id .bbvm-photo-title, .fl-node-$id .bbvm-photo-title *",
		)
	);
	FLBuilderCSS::border_field_rule(
		array(
			'settings'     => $settings,
			'setting_name' => 'title_border',
			'selector'     => ".fl-node-$id .bbvm-photo-title",
		)
	);
endif;

// Link settings.
?>
.fl-node-<?php echo esc_html( $id ); ?> figure {
	position: relative;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-photo-link {
	position: absolute;
	z-index: 2000;
	width: 100%;
	height: 100%;
	top: 0;
	left: 0;
}
.bbvm-mfp-fade .mfp-title p {
	padding: 10px 20px 10px 20px;
	font-weight: 700;
	font-size: 16px;
	text-align: center;
	color: #FFF;
}
<?php
// Container settings.
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'container_padding',
		'selector'     => ".fl-node-$id .bbvm-photo-wrapper",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'container_padding_top',
			'padding-right'  => 'container_padding_right',
			'padding-bottom' => 'container_padding_bottom',
			'padding-left'   => 'container_padding_left',
		),
	)
);
FLBuilderCSS::border_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'container_border',
		'selector'     => ".fl-node-$id .bbvm-photo-wrapper",
	)
);
?>
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-photo-wrapper {
	background: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->container_background_color ) ); ?>;
}
