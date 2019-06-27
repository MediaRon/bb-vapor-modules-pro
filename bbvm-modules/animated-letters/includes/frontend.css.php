<?php
// Headline block or inline
?>
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-animated-letters-for-beaverbuilder {
	position: relative;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-animated-letters-for-beaverbuilder h2 {
	position: relative;
	text-align: <?php echo esc_html( $settings->alignment ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-animated-letters-for-beaverbuilder span.text-wrapper {
	position: relative;
	display: inline-block;
	overflow: hidden;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-animated-letters-for-beaverbuilder .letter {
	display: inline-block;
	color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->text_color ) ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-animated-letters-for-beaverbuilder .line {
	opacity: 0;
	position: absolute;
	left: 0;
	height: 3px;
	width: 100%;
	background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->text_color ) ); ?>;
	transform-origin: 0 0;
}

.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-animated-letters-for-beaverbuilder .line1 { top: 0; }
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-animated-letters-for-beaverbuilder .line2 { bottom: 0; }
<?php
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'typography',
		'selector'     => ".fl-node-$id .fl-bbvm-animated-letters-for-beaverbuilder .letter",
	)
);
if ( 'go' === $settings->style ) {
	?>
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-animated-letters-for-beaverbuilder .letter {
		position: absolute;
		margin: auto;
		left: 0;
		right: 0;
		opacity: 0;
		top: calc( 50% - 30px );
	}
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-animated-letters-for-beaverbuilder h2 {
		padding: 40px 0;
	}
	<?php
}
if ( 'hello' === $settings->style ) :
	?>
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-animated-letters-for-beaverbuilder .line {
		opacity: 0;
		position: absolute;
		left: 0;
		height: 100%;
		width: 3px;
		background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->text_color ) ); ?>;
		transform-origin: 0 50%;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-animated-letters-for-beaverbuilder .line1 {
		top: 0;
		left: 0;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-animated-letters-for-beaverbuilder .letter {
		display: inline-block;
	}
	<?php
endif;
if ( 'bottom' === $settings->style ) :
	?>
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-animated-letters-for-beaverbuilder .line {
		opacity: 0;
		position: absolute;
		bottom: 0;
		top: auto;
		width: 100%;
		height: 3px;
		background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->text_color ) ); ?>;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-animated-letters-for-beaverbuilder .letter {
		display: inline-block;
	}
	<?php
endif;
if ( 'find' === $settings->style ) :
	?>
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-animated-letters-for-beaverbuilder .line {
		opacity: 0;
		position: absolute;
		left: 0;
		top: auto;
		height: 2px;
		width: 100%;
		transform-origin: 100% 100%;
		bottom: 0;
		background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->text_color ) ); ?>;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-animated-letters-for-beaverbuilder .letter {
		display: inline-block;
	}
	<?php
endif;
