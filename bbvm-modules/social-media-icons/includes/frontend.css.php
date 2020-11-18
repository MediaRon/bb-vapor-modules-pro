<?php
/**
 * Social Icons Module.
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 1.3.0
 */

?>
.fl-node-<?php echo esc_html( $id ); ?> ul.bbvm-module-social {
	list-style: none;
	margin: 0;
	padding: 0;
}
.fl-node-<?php echo esc_html( $id ); ?> ul.bbvm-module-social li {
	margin: 0;
	padding: 0;
}

.fl-node-<?php echo esc_html( $id ); ?> ul.bbvm-module-social.vertical {
	list-style-type: none;
	margin: 0;
	padding: 0;
}
.fl-node-<?php echo esc_html( $id ); ?> ul.bbvm-module-social.vertical li {
	display: block;
	margin: 0 0 5px 0;
}

.fl-node-<?php echo esc_html( $id ); ?> ul.bbvm-module-social.horizontal {
	list-style-type: none;
	margin: 0;
	padding: 0;
}
.fl-node-<?php echo esc_html( $id ); ?> ul.bbvm-module-social.horizontal li {
	display: inline-block;
	margin-right: 5px;
}
/* Icon Sizes */
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-module-social-icon-12 svg {
	height: 12px;
	width: 12px;
	vertical-align: top;
}

.fl-node-<?php echo esc_html( $id ); ?> .bbvm-module-social-icon-18 svg {
	height: 18px;
	width: 18px;
	vertical-align: top;
}

.fl-node-<?php echo esc_html( $id ); ?> .bbvm-module-social-icon-24 svg {
	height: 24px;
	width: 24px;
	vertical-align: top;
}

.fl-node-<?php echo esc_html( $id ); ?> .bbvm-module-social-icon-36 svg {
	height: 36px;
	width: 36px;
	vertical-align: top;
}

.fl-node-<?php echo esc_html( $id ); ?> .bbvm-module-social-icon-48 svg {
	height: 48px;
	width: 48px;
	vertical-align: top;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-module-social-wrapper {
	position: relative;
}
<?php
if ( isset( $settings->background_select ) && 'gradient' === $settings->background_select ) {
	?>
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-module-social-wrapper {
		background-image: <?php echo FLBuilderColor::gradient( $settings->background_gradient ); // phpcs:ignore ?>
	}
	<?php
}
?>
<?php
if ( isset( $settings->background_select ) ) {
	if ( 'color' === $settings->background_select ) {
		if ( 6 === strlen( $settings->background_color ) ) {
			$background_color = '#' . $settings->background_color;
			?>
			.fl-node-<?php echo esc_html( $id ); ?> .bbvm-module-social-wrapper {
				background-color: <?php echo esc_attr( $background_color ); ?>
			}
			<?php
		}
	} elseif ( 'gradient' === $settings->background_select ) {
		?>
		.fl-node-<?php echo esc_html( $id ); ?> .bbvm-module-social-wrapper {
			background-image: <?php echo FLBuilderColor::gradient( $settings->background_gradient ); // phpcs:ignore ?>
		}
		<?php
	} elseif ( 'photo' === $settings->background_select ) {
		?>
		.fl-node-<?php echo esc_html( $id ); ?> .bbvm-module-social-wrapper {
			background-image: url(<?php echo esc_url( $settings->background_image_src ); ?>);
			background-repeat: no-repeat;
			background-size: cover;
		}
		<?php
		$background_overlay = $settings->background_overlay;
		if ( 6 === strlen( $settings->background_overlay ) ) {
			$background_overlay = '#' . $settings->background_overlay;
		}
		?>
		.fl-node-<?php echo esc_html( $id ); ?> .bbvm-module-social-wrapper:before {
			position: absolute;
			content: ' ';
			display: block;
			width: 100%;
			height: 100%;
			top: 0;
			left: 0;
			background: <?php echo esc_html( $background_overlay ); ?>;
		}
		<?php
	}
}
?>
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-module-social.black svg {
	fill: #000000;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-module-social.white svg {
	fill: #FFFFFF;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-module-social.custom svg {
	fill: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->fill_custom ) ); ?>
}

.fl-node-<?php echo esc_html( $id ); ?> .bbvm-module-social {
	text-align: <?php echo esc_html( $settings->alignment ); ?>;
}

<?php
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'padding',
		'selector'     => ".fl-node-$id .bbvm-module-social-wrapper",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'padding_top',
			'padding-right'  => 'padding_right',
			'padding-bottom' => 'padding_bottom',
			'padding-left'   => 'padding_left',
		),
	)
);
