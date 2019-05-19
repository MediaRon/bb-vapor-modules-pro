.fl-node-<?php echo $id; ?> .fl-bbvm-advanced-separator {
	clear: both;
	margin: 0;
	padding: 0;
	border: 0;
	background: transparent;
}
<?php
if( 'line' == $settings->style ) {
	?>
	.fl-node-<?php echo $id; ?> hr.fl-bbvm-advanced-separator {
		height: <?php echo $settings->separator_height; ?>px;
		width: 100%;
	}
	.fl-node-<?php echo $id; ?> hr.fl-bbvm-advanced-separator::before {
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
if( 'line_radius' == $settings->style ) {
	?>
	.fl-node-<?php echo $id; ?> .fl-bbvm-advanced-separator-radius {
		height: <?php echo $settings->separator_height; ?>px;
		background-color: <?php echo (6 == strlen( $settings->color ) ) ? '#' . $settings->color : $settings->color; ?>;
		width: 100%;
		border-radius: <?php echo absint( $settings->radius ); ?>px;
	}
	<?php
}
if( 'double' == $settings->style ) {
	?>
	.fl-node-<?php echo $id; ?> hr.fl-bbvm-advanced-separator {
		height: <?php echo $settings->separator_height; ?>px;
		width: 100%;
	}
	.fl-node-<?php echo $id; ?> hr.fl-bbvm-advanced-separator::before {
		display: block;
		content: "";
		width: 100%;
		height: <?php echo $settings->border_thickness; ?>px;
		border: <?php echo $settings->border_thickness; ?>px solid <?php echo (6 == strlen( $settings->color ) ) ? '#' . $settings->color : $settings->color; ?>;
		margin-bottom: <?php echo $settings->double_margin; ?>px;
	}
	.fl-node-<?php echo $id; ?> hr.fl-bbvm-advanced-separator::after {
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
	.fl-node-<?php echo $id; ?> hr.fl-bbvm-advanced-separator {
		height: <?php echo $settings->separator_height; ?>px;
		width: 100%;
		background: url(<?php echo esc_url( $settings->photo_src ); ?>) <?php echo $settings->repeat; ?>;
	}
	<?php
}
if( 'line_icon' == $settings->style || 'line_photo' == $settings->style || 'line_content' == $settings->style ):
	?>
	.fl-node-<?php echo $id; ?> .fl-bbvm-advanced-separator-wrapper {
		display: flex;
		align-items: center;
	}
	.fl-node-<?php echo $id; ?> .fl-bbvm-advanced-separator-wrapper .fl-bbvm-advanced-separator-line {
		flex-grow: 1;
	}
	<?php
	FLBuilderCSS::rule( array(
		'selector' => ".fl-node-$id .fl-bbvm-advanced-separator-wrapper img",
		'media' => 'default', // Optional. Can be `default`, `medium`, `responsive` or a custom statement.
		'props' => array(
			'height' => $settings->photo_size . 'px',
			'width' => $settings->photo_size . 'px'
		),
	) );
	FLBuilderCSS::rule( array(
		'selector' => ".fl-node-$id .fl-bbvm-advanced-separator-wrapper img",
		'media' => 'medium', // Optional. Can be `default`, `medium`, `responsive` or a custom statement.
		'props' => array(
			'height' => $settings->photo_size_medium . 'px',
			'width' => $settings->photo_size_medium . 'px'
		),
	) );
	FLBuilderCSS::rule( array(
		'selector' => ".fl-node-$id .fl-bbvm-advanced-separator-wrapper img",
		'media' => 'responsive', // Optional. Can be `default`, `medium`, `responsive` or a custom statement.
		'props' => array(
			'height' => $settings->photo_size_responsive . 'px',
			'width' => $settings->photo_size_responsive . 'px'
		),
	) );
	?>
	.fl-node-<?php echo $id; ?> .fl-bbvm-advanced-separator-wrapper img {
		width: 50px;
		height: 50px;
	}
	.fl-node-<?php echo $id; ?> .fl-bbvm-advanced-separator-wrapper .fl-bbvm-advanced-separator-line:first-of-type {
		margin-right: 20px;
	}
	.fl-node-<?php echo $id; ?> .fl-bbvm-advanced-separator-wrapper .fl-bbvm-advanced-separator-line:last-of-type {
		margin-left: 20px;
	}
	.fl-node-<?php echo $id; ?> .line-content {
		color: #<?php echo $settings->content_color; ?>;
	}
	<?php
	FLBuilderCSS::typography_field_rule( array(
		'settings'	=> $settings,
		'setting_name' 	=> 'content_typography',
		'selector' 	=> ".fl-node-$id .line-content",
	) );
endif;