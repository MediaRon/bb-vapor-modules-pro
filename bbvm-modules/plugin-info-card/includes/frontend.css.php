<?php
/**
 * Plugin Info Card module.
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 2.1.1
 */

?>
.fl-node-<?php echo esc_html( $id ); ?> .wp-pic-flip,
.fl-node-<?php echo esc_html( $id ); ?> .wp-pic-wordpress,
.fl-node-<?php echo esc_html( $id ); ?> .wp-pic-large,
.fl-node-<?php echo esc_html( $id ); ?> .wp-pic-flex {
	display: block !important;
}
<?php
if ( 'custom' === $settings->appearance ) :
	?>
	.fl-node-<?php echo esc_html( $id ); ?> .wp-pic.custom .wp-pic-no-plugin,
	.fl-node-<?php echo esc_html( $id ); ?> .entry .wp-pic.custom p,
	.fl-node-<?php echo esc_html( $id ); ?> .wp-pic.custom p,
	.fl-node-<?php echo esc_html( $id ); ?> .wp-pic.custom .wp-pic-back a:not(.wp-pic-page):hover,
	.fl-node-<?php echo esc_html( $id ); ?> .wp-pic.custom .wp-pic-back p,
	.fl-node-<?php echo esc_html( $id ); ?> .wp-pic.custom:not(.wordpress) .wp-pic-author a, <?php // phpcs:ignore ?>
	.fl-node-<?php echo esc_html( $id ); ?> .wp-pic.custom .wp-pic-dl-link,
	.fl-node-<?php echo esc_html( $id ); ?> .wp-pic.custom a.wp-pic-name {
		color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->text_color ) ); ?>;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .wp-pic.custom .wp-pic-front a.wp-pic-name {
		color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->text_color ) ); ?>;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .wp-pic.custom .wp-pic-bar {
		background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->bar_color ) ); ?>;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .wp-pic.custom .wp-pic-bar span:after
	.fl-node-<?php echo esc_html( $id ); ?> .wp-pic.custom .wp-pic-bar a:after{
		background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->bar_color ) ); ?>;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .wp-pic.custom > div> div {
		background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->background_color ) ); ?>;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .wp-pic.custom .wp-pic-back .wp-pic-name,
	.fl-node-<?php echo esc_html( $id ); ?> .wp-pic.custom p.wp-pic-updated {
		color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->text_color ) ); ?>;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .wp-pic.custom .wp-pic-bar em{
		color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->bar_item_color ) ); ?> !important;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .wp-pic.custom .wp-pic-flip .wp-pic-face.wp-pic-back ,
	.fl-node-<?php echo esc_html( $id ); ?> .wp-pic.custom .wp-pic-bar span,
	.fl-node-<?php echo esc_html( $id ); ?> .wp-pic.custom .wp-pic-bar a,
	.fl-node-<?php echo esc_html( $id ); ?> .wp-pic.custom .wp-pic-back a:not(.wp-pic-page),
	.fl-node-<?php echo esc_html( $id ); ?> .wp-pic.custom .wp-pic-asset-bg-title,
	.fl-node-<?php echo esc_html( $id ); ?> .wp-pic.custom .wp-pic-download-link span,
	.fl-node-<?php echo esc_html( $id ); ?> .wp-pic.custom .wp-pic-download,
	.fl-node-<?php echo esc_html( $id ); ?> .wp-pic.custom .wp-pic-page,
	.fl-node-<?php echo esc_html( $id ); ?> .wp-pic.custom a.wp-pic-page {
		color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->text_color ) ); ?>;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .wp-pic.custom .wp-pic-rating,
	.fl-node-<?php echo esc_html( $id ); ?> .wp-pic.custom .wp-pic-downloaded,
	.fl-node-<?php echo esc_html( $id ); ?> .wp-pic.custom .wp-pic-requires {
		color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->bar_text_color ) ); ?> !important;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .wp-pic.custom .wp-pic-download,
	.fl-node-<?php echo esc_html( $id ); ?> .wp-pic.custom .wp-pic-asset-bg,
	.fl-node-<?php echo esc_html( $id ); ?> .wp-pic.custom a.wp-pic-page,
	.fl-node-<?php echo esc_html( $id ); ?> .wp-pic.custom.flex .wp-pic-download-link span{
		background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->download_background_color ) ); ?>;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .wp-pic.custom .wp-pic-download-link span {
		color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->download_text_color ) ); ?>;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .wp-pic.custom .wp-pic-download,
	.fl-node-<?php echo esc_html( $id ); ?> .wp-pic.custom a.wp-pic-page {
		background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->download_background_color ) ); ?>;
	}
	<?php
endif;
