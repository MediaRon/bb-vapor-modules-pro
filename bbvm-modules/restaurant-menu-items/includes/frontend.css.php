.fl-node-<?php echo $id; ?> h2,
.fl-node-<?php echo $id; ?> p,
.fl-node-<?php echo $id; ?> hr {
	position: relative;
	margin: 0;
	padding: 0;
	border: 0;
	background: transparent;
}
<?php
if( 'line' === $settings->category_separator ) {
	if( 'single' === $settings->category_separator_line ) {
		?>
		.fl-node-<?php echo $id; ?> .mediaron-restaurant-heading hr {
			background-color: #<?php echo esc_html( $settings->category_separator_line_color ); ?>;
			height: <?php echo absint( $settings->category_separator_line_height ); ?>px;
			margin: 10px 0;
		}
		<?php
	}
	if( 'double' === $settings->category_separator_line ) {
		?>
		.fl-node-<?php echo $id; ?> .mediaron-restaurant-heading hr {
			height: 10px;
		}
		.fl-node-<?php echo $id; ?> .mediaron-restaurant-heading hr:before {
			content: ' ';
			background-color: #<?php echo esc_html( $settings->category_separator_line_color ); ?>;
			width: 100%;
			display: block;
			height: 2px;
			position: absolute;
			top: 0;
		}
		.fl-node-<?php echo $id; ?> .mediaron-restaurant-heading hr:after {
			content: ' ';
			background-color: #<?php echo esc_html( $settings->category_separator_line_color ); ?>;
			height: 2px;
			width: 100%;
			display: block;
			position: absolute;
			bottom: 0;
		}
		<?php
	}

} else if ( 'image' === $settings->category_separator ) {
	error_log( print_r( $settings, true ) );
	?>
	.fl-node-<?php echo $id; ?> .mediaron-restaurant-heading hr {
		background: transparent url(<?php echo esc_url( $settings->category_separator_line_image_src ); ?>) top left repeat-x;
		height: <?php echo absint( $settings->category_separator_line_height ); ?>px;
		margin: 10px 0;
	}
	<?php
}
FLBuilderCSS::dimension_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'category_seperator_margin',
	'selector' 	=> ".fl-node-$id .mediaron-restaurant-heading hr",
	'unit'		=> 'px',
	'props'		=> array(
		'margin-top' 	 => 'category_seperator_margin_top',
		'margin-right'  => 'category_seperator_margin_right',
		'margin-bottom' => 'category_seperator_margin_bottom',
		'margin-left' 	 => 'category_seperator_margin_left',
	),
) );
if( 'none' !== $settings->item_separator ) {
	$item_color = '#' . esc_html( $settings->item_separator_line_color );
	$line_type = esc_html( $settings->item_separator );
	$line_height = absint( $settings->item_separator_line_height );
	?>
	.fl-node-<?php echo $id; ?> .mediaron-restaurant-menu-items .mediaron-restaurant-menu-item {
		border-bottom: <?php echo $line_height; ?>px <?php echo $line_type; ?> <?php echo $item_color; ?>;
	}
	<?php
}
?>
.fl-node-<?php echo $id; ?> .mediaron-restaurant-menu-items .mediaron-restaurant-menu-item {
	display: flex;
	margin-bottom: 20px;
}
@media only screen and (max-width: 768px) {
	.fl-node-<?php echo $id; ?> .mediaron-restaurant-menu-items-wrapper .mediaron-restaurant-menu-items .mediaron-restaurant-menu-item {
		display: block;
	}
	.fl-node-<?php echo $id; ?> .mediaron-restaurant-menu-items-wrapper .mediaron-restaurant-menu-items .mediaron-restaurant-menu-item .menu-item-photo {
		max-width: none;
		max-height: none;
		text-align: center;
		margin-bottom: 20px;
	}
}
.fl-node-<?php echo $id; ?> .mediaron-restaurant-menu-items .mediaron-restaurant-menu-item .menu-item-photo {
	flex-grow: 1;
	max-width: <?php echo absint( $settings->image_size ); ?>px;
	max-height: <?php echo absint( $settings->image_size ); ?>px;
}
.fl-node-<?php echo $id; ?> .mediaron-restaurant-menu-items .mediaron-restaurant-menu-item .menu-item-photo img {
	display: block;
	width: 100%;
	height: 100%;
	object-fit: cover;
}
<?php
if( 'circular' === $settings->image_type ) {
	?>
	.fl-node-<?php echo $id; ?> .mediaron-restaurant-menu-items .mediaron-restaurant-menu-item .menu-item-photo img {
		border-radius: 50%;
	}
	<?php
}
?>
.fl-node-<?php echo $id; ?> .mediaron-restaurant-menu-items .mediaron-restaurant-menu-item .menu-item-text-wrapper {
	flex-grow: 2;
	padding-left: 20px;
}
.fl-node-<?php echo $id; ?> .mediaron-restaurant-menu-items .mediaron-restaurant-menu-item .menu-item-text-wrapper.no-photo {
	flex-grow: 3;
	padding: 0;
}

.fl-node-<?php echo $id; ?> .mediaron-restaurant-menu-items .mediaron-restaurant-menu-item .menu-item-price {
	flex-grow: 2;
	text-align: right;
}




<?php
FLBuilderCSS::typography_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'category_typography',
	'selector' 	=> ".fl-node-$id .mediaron-restaurant-menu-items-heading",
) );
FLBuilderCSS::typography_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'category_description_typography',
	'selector' 	=> ".fl-node-$id .mediaron-restaurant-menu-items-description",
) );
FLBuilderCSS::typography_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'menu_item_typography',
	'selector' 	=> ".fl-node-$id .menu-item-title",
) );
FLBuilderCSS::typography_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'menu_item_description_typography',
	'selector' 	=> ".fl-node-$id .menu-item-description",
) );
FLBuilderCSS::typography_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'menu_item_price_typography',
	'selector' 	=> ".fl-node-$id .menu-item-price",
) );
FLBuilderCSS::dimension_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'category_padding',
	'selector' 	=> ".fl-node-$id .mediaron-restaurant-menu-items-heading",
	'unit'		=> 'px',
	'props'		=> array(
		'padding-top' 	 => 'category_padding_top',
		'padding-right'  => 'category_padding_right',
		'padding-bottom' => 'category_padding_bottom',
		'padding-left' 	 => 'category_padding_left',
	),
) );
FLBuilderCSS::dimension_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'category_description_padding',
	'selector' 	=> ".fl-node-$id .mediaron-restaurant-menu-items-description",
	'unit'		=> 'px',
	'props'		=> array(
		'padding-top' 	 => 'category_description_padding_top',
		'padding-right'  => 'category_description_padding_right',
		'padding-bottom' => 'category_description_padding_bottom',
		'padding-left' 	 => 'category_description_padding_left',
	),
) );
FLBuilderCSS::dimension_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'menu_item_padding',
	'selector' 	=> ".fl-node-$id .mediaron-restaurant-menu-item",
	'unit'		=> 'px',
	'props'		=> array(
		'padding-top' 	 => 'menu_item_padding_top',
		'padding-right'  => 'menu_item_padding_right',
		'padding-bottom' => 'menu_item_padding_bottom',
		'padding-left' 	 => 'menu_item_padding_left',
	),
) );