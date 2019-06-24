.fl-node-<?php echo esc_html( $id ); ?> #soliloquy-container-acf_images,
.fl-node-<?php echo esc_html( $id ); ?> #soliloquy-container-woocommerce_images {
	opacity: 1;
}
<?php if ( 'yes' === $settings->show_arrows ) : ?>
.fl-node-<?php echo esc_html( $id ); ?> #soliloquy-container-acf_images .soliloquy-controls-direction,
.fl-node-<?php echo esc_html( $id ); ?> #soliloquy-container-woocommerce_images .soliloquy-controls-direction {
	display: block !important;
}
.fl-node-<?php echo esc_html( $id ); ?> #soliloquy-container-acf_images .soliloquy-prev,
.fl-node-<?php echo esc_html( $id ); ?> #soliloquy-container-woocommerce_images .soliloquy-prev {
	opacity: 1 !important;
}
.fl-node-<?php echo esc_html( $id ); ?> #soliloquy-container-acf_images .soliloquy-next,
.fl-node-<?php echo esc_html( $id ); ?> #soliloquy-container-woocommerce_images .soliloquy-next {
	opacity: 1 !important;
}
<?php else : ?>
.fl-node-<?php echo esc_html( $id ); ?> #soliloquy-container-acf_images .soliloquy-controls-direction,
.fl-node-<?php echo esc_html( $id ); ?> #soliloquy-container-woocommerce_images .soliloquy-controls-direction {
	display: none !important;
}
.fl-node-<?php echo esc_html( $id ); ?> #soliloquy-container-acf_images .soliloquy-prev,
.fl-node-<?php echo esc_html( $id ); ?> #soliloquy-container-woocommerce_images .soliloquy-prev {
	opacity: 0 !important;
}
.fl-node-<?php echo esc_html( $id ); ?> #soliloquy-container-acf_images .soliloquy-next,
.fl-node-<?php echo esc_html( $id ); ?> #soliloquy-container-woocommerce_images .soliloquy-next {
	opacity: 0 !important;
}
<?php endif; ?>
<?php if ( ! empty( $settings->max_height ) && 0 !== filter_var( $settings->max_height, FILTER_VALIDATE_INT ) ) : ?>
.fl-node-<?php echo esc_html( $id ); ?> #soliloquy-container-acf_images .soliloquy-image,
.fl-node-<?php echo esc_html( $id ); ?> #soliloquy-container-woocommerce_images .soliloquy-image {
	max-height: <?php echo absint( $settings->max_height ); ?>px;
}
<?php endif; ?>
<?php if ( ! empty( $settings->max_width ) && 0 !== filter_var( $settings->max_width, FILTER_VALIDATE_INT ) ) : ?>
.fl-node-<?php echo esc_html( $id ); ?> #soliloquy-container-acf_images,
.fl-node-<?php echo esc_html( $id ); ?> #soliloquy-container-woocommerce_images {
	max-width: <?php echo absint( $settings->max_width ); ?>px !important;
}
<?php endif; ?>
<?php if ( ! empty( $settings->arrow_background ) ) : ?>
.fl-node-<?php echo esc_html( $id ); ?> #soliloquy-container-acf_images .soliloquy-prev,
.fl-node-<?php echo esc_html( $id ); ?> #soliloquy-container-acf_images .soliloquy-next,
.fl-node-<?php echo esc_html( $id ); ?> #soliloquy-container-woocommerce_images .soliloquy-prev,
.fl-node-<?php echo esc_html( $id ); ?> #soliloquy-container-woocommerce_images .soliloquy-next
 {
	background-color: #<?php echo esc_html( $settings->arrow_background ); ?>;
}
<?php endif; ?>
<?php if ( 'yes' === $settings->hide_pager ) : ?>
.fl-node-<?php echo esc_html( $id ); ?> #soliloquy-container-acf_images .soliloquy-pager,
.fl-node-<?php echo esc_html( $id ); ?> #soliloquy-container-woocommerce_images .soliloquy-pager {
	display: none !important;
}
<?php endif; ?>
<?php if ( 'yes' === $settings->hide_caption ) : ?>
.fl-node-<?php echo esc_html( $id ); ?> #soliloquy-container-acf_images .soliloquy-caption,
.fl-node-<?php echo esc_html( $id ); ?> #soliloquy-container-woocommerce_images .soliloquy-caption{
	display: none !important;
}
<?php endif; ?>
<?php
if ( ! empty( $settings->caption_background ) ) :
	$caption_background = isset( $settings->caption_background ) ? esc_attr( $settings->caption_background ) : '000000';
	if ( 6 === strlen( $caption_background ) ) {
		$caption_background = '#' . $caption_background;
	}
	?>
	.fl-node-<?php echo esc_html( $id ); ?> #soliloquy-container-acf_images .soliloquy-caption .soliloquy-caption-inside,
	.fl-node-<?php echo esc_html( $id ); ?> #soliloquy-container-woocommerce_images .soliloquy-caption .soliloquy-caption-inside {
		background: <?php echo esc_html( $caption_background ); ?> !important;
	}
<?php endif; ?>
<?php if ( ! empty( $settings->caption_text_background ) ) : ?>
.fl-node-<?php echo esc_html( $id ); ?> #soliloquy-container-acf_images .soliloquy-caption .soliloquy-caption-inside,
.fl-node-<?php echo esc_html( $id ); ?> #soliloquy-container-woocommerce_images .soliloquy-caption .soliloquy-caption-inside {
	color: #<?php echo esc_html( $settings->caption_text_background ); ?>;
}
<?php endif; ?>
<?php
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'caption_typography',
		'selector'     => ".fl-node-$id #soliloquy-container-acf_images .soliloquy-caption .soliloquy-caption-inside, .fl-node-$id #soliloquy-container-woocommerce_images .soliloquy-caption .soliloquy-caption-inside",
	)
);
