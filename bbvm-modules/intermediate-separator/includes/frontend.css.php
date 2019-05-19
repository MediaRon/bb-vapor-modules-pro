.fl-node-<?php echo $id; ?> .fl-bbvm-intermediate-separator {
	clear: both;
	margin: 0;
	padding: 0;
	border: 0;
	background: transparent;
}
<?php
if( 'content' == $settings->style ) {
	?>
	.fl-node-<?php echo $id; ?> .fl-bbvm-intermediate-separator {
		background: none;
		border: 0;
		margin: 0 0 1.5em;
		opacity: 1;
		padding: 0;
		position: relative;
		width: 100%;
		height: <?php echo isset( $settings->content_height ) ? $settings->content_height : 50; ?>px;
	}
	.fl-node-<?php echo $id; ?> hr.fl-bbvm-intermediate-separator::before {
		content: '<?php echo $settings->content; ?>';
		display: inline-block;
		color: <?php echo (6 == strlen( $settings->color ) ) ? '#' . $settings->color : $settings->color; ?>;
		font-size: 22px;
		font-weight: 400;
		left: 0;
		letter-spacing: 0.95em;
		line-height: 1;
		margin-right: auto;
		margin-left: 21px;
		position: absolute;
		right: 0;
		text-align: center;
		top: calc(50%);
	}
	<?php
	FLBuilderCSS::typography_field_rule( array(
		'settings'	=> $settings,
		'setting_name' 	=> 'content_typography',
		'selector' 	=> ".fl-node-$id hr.fl-bbvm-intermediate-separator::before",
	) );
}
if( 'simple' == $settings->style ) {
	?>
	.fl-node-<?php echo $id; ?> hr.fl-bbvm-intermediate-separator {
		height: <?php echo $settings->separator_height; ?>px;
	}
	.fl-node-<?php echo $id; ?> hr.fl-bbvm-intermediate-separator::before {
		content: "";
		max-width: 260px;
		height: <?php echo $settings->separator_height; ?>px;
		display: block;
		top: 50%;
		margin: 0 auto;
		background-color: <?php echo (6 == strlen( $settings->color ) ) ? '#' . $settings->color : $settings->color; ?>;
	}
	<?php
}
if( 'full_width' == $settings->style ) {
	?>
	.fl-node-<?php echo $id; ?> hr.fl-bbvm-intermediate-separator {
		height: <?php echo $settings->separator_height; ?>px;
		width: 100%;
	}
	.fl-node-<?php echo $id; ?> hr.fl-bbvm-intermediate-separator::before {
		content: "";
		max-width: 100%;
		height: <?php echo $settings->separator_height; ?>px;
		display: block;
		top: 50%;
		margin: 0 auto;
		background-color: <?php echo (6 == strlen( $settings->color ) ) ? '#' . $settings->color : $settings->color; ?>;
	}
	<?php
}
if( 'double' == $settings->style ) {
	?>
	.fl-node-<?php echo $id; ?> hr.fl-bbvm-intermediate-separator {
		height: auto;
		width: 100%;
	}
	.fl-node-<?php echo $id; ?> hr.fl-bbvm-intermediate-separator::before {
		display: block;
		content: "";
		width: 100%;
		height: <?php echo $settings->border_thickness; ?>px;
		border: <?php echo $settings->border_thickness; ?>px solid <?php echo (6 == strlen( $settings->color ) ) ? '#' . $settings->color : $settings->color; ?>;
		margin-bottom: <?php echo $settings->double_margin; ?>px;
	}
	.fl-node-<?php echo $id; ?> hr.fl-bbvm-intermediate-separator::after {
		display: block;
		content: "";
		width: 100%;
		height: <?php echo $settings->border_thickness; ?>px;
		border: <?php echo $settings->border_thickness; ?>px solid <?php echo (6 == strlen( $settings->color ) ) ? '#' . $settings->color : $settings->color; ?>;
		margin-top: <?php echo $settings->double_margin; ?>px;
	}
	<?php
}
if( 'photo' == $settings->style ) {
	?>
	.fl-node-<?php echo $id; ?> hr.fl-bbvm-intermediate-separator {
		height: <?php echo $settings->separator_height; ?>px;
		width: 100%;
		background: url(<?php echo esc_url( $settings->photo_src ); ?>) <?php echo $settings->repeat; ?>;
	}
	<?php
}