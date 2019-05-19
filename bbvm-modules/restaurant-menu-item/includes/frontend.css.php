.fl-node-<?php echo $id; ?> h2,
.fl-node-<?php echo $id; ?> p,
.fl-node-<?php echo $id; ?> hr {
	position: relative;
	margin: 0;
	padding: 0;
	border: 0;
}
.fl-node-<?php echo $id; ?> .bbvm-restaurant-menu-item {
	display: flex;
}
@media only screen and (max-width: 768px) {

}
.fl-node-<?php echo $id; ?> .bbvm-restaurant-menu-item .menu-item-text-wrapper {
	flex-grow: 2;
	padding-left: 20px;
}
.fl-node-<?php echo $id; ?> .bbvm-restaurant-menu-item .menu-item-text-wrapper.no-photo {
	flex-grow: 3;
	padding: 0;
}

.fl-node-<?php echo $id; ?> .bbvm-restaurant-menu-item .menu-item-price {
	flex-grow: 2;
	text-align: right;
}




<?php
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
	'setting_name' 	=> 'menu_item_padding',
	'selector' 	=> ".fl-node-$id .bbvm-restaurant-menu-item",
	'unit'		=> 'px',
	'props'		=> array(
		'padding-top' 	 => 'menu_item_padding_top',
		'padding-right'  => 'menu_item_padding_right',
		'padding-bottom' => 'menu_item_padding_bottom',
		'padding-left' 	 => 'menu_item_padding_left',
	),
) );