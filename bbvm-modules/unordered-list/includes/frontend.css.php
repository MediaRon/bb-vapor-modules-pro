<?php
if ( 'icon' === $settings->list_style ):
?>
.fl-node-<?php echo $id; ?> .fl-bbvm-unordered-list-for-beaverbuilder ul {
	margin: 0;
	padding: 0;
	list-style-type: none;
}
.fl-node-<?php echo $id; ?> .fl-bbvm-unordered-list-for-beaverbuilder li {
	position: relative;
	padding: 0;
	margin: 0;
	margin-left: <?php echo $settings->list_icon_size + 10; ?>px;
}
.fl-node-<?php echo $id; ?> .fl-bbvm-unordered-list-for-beaverbuilder li .icon {
	position: absolute;
	left: -<?php echo $settings->list_icon_size + 10; ?>px;
	top: 0;
	font-size: <?php echo $settings->list_icon_size; ?>px;
	color: #<?php echo $settings->list_icon_color; ?>;
}
<?php
FLBuilderCSS::typography_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'list_typography',
	'selector' 	=> ".fl-node-$id .fl-bbvm-unordered-list-for-beaverbuilder li .content"
) );
endif;
if ( 'circular' === $settings->list_style ):
?>
.fl-node-<?php echo $id; ?> .fl-bbvm-unordered-list-for-beaverbuilder ul {
	margin: 0;
	padding: 0;
	list-style-type: none;
}
.fl-node-<?php echo $id; ?> .fl-bbvm-unordered-list-for-beaverbuilder li {
	position: relative;
	padding: 0;
	margin: 0;
	margin-left: <?php echo $settings->item_size + 10; ?>px;
}
.fl-node-<?php echo $id; ?> .fl-bbvm-unordered-list-for-beaverbuilder li:before {
	position: relative;
	content: '';
	width: <?php echo $settings->item_size; ?>px;
	height: <?php echo $settings->item_size; ?>px;
	border-radius: 100%;
	display: block;
	position: absolute;
	top: <?php echo $settings->top_offset; ?>px;
	left: -<?php echo $settings->item_size + 10; ?>px;
	background: #<?php echo $settings->background_color; ?>;
}
.fl-node-<?php echo $id; ?> .fl-bbvm-unordered-list-for-beaverbuilder li:hover:before {
	background: #<?php echo $settings->hover_color; ?>;
}
<?php
FLBuilderCSS::typography_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'list_typography',
	'selector' 	=> ".fl-node-$id .fl-bbvm-unordered-list-for-beaverbuilder li"
) );
endif;
if ( 'square' === $settings->list_style ):
?>
.fl-node-<?php echo $id; ?> .fl-bbvm-unordered-list-for-beaverbuilder ul {
	margin: 0;
	padding: 0;
	list-style-type: none;
}
.fl-node-<?php echo $id; ?> .fl-bbvm-unordered-list-for-beaverbuilder li {
	position: relative;
	padding: 0;
	margin: 0;
	margin-left: <?php echo $settings->item_size + 10; ?>px;
}
.fl-node-<?php echo $id; ?> .fl-bbvm-unordered-list-for-beaverbuilder li:before {
	position: relative;
	content: '';
	width: <?php echo $settings->item_size; ?>px;
	height: <?php echo $settings->item_size; ?>px;
	position: absolute;
	top: <?php echo $settings->top_offset; ?>px;
	left: -<?php echo $settings->item_size + 10; ?>px;
	background: #<?php echo $settings->background_color; ?>;
}
.fl-node-<?php echo $id; ?> .fl-bbvm-unordered-list-for-beaverbuilder li:hover:before {
	background: #<?php echo $settings->hover_color; ?>;
}
<?php
FLBuilderCSS::typography_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'list_typography',
	'selector' 	=> ".fl-node-$id .fl-bbvm-unordered-list-for-beaverbuilder li"
) );
endif;
if ( 'bar' === $settings->list_style ):
?>
.fl-node-<?php echo $id; ?> .fl-bbvm-unordered-list-for-beaverbuilder ul {
	margin: 0;
	padding: 0;
	list-style-type: none;
}
.fl-node-<?php echo $id; ?> .fl-bbvm-unordered-list-for-beaverbuilder li {
	position: relative;
	padding: 0;
	margin: 0;
	margin-left: <?php echo $settings->bar_width + 10; ?>px;
	-webkit-transition: -webkit-transform .8s ease-in-out;
	transition: transform .8s ease-in-out;
}
.fl-node-<?php echo $id; ?> .fl-bbvm-unordered-list-for-beaverbuilder li:before {
	position: relative;
	content: '';
	width: <?php echo $settings->bar_width; ?>px;
	height: <?php echo $settings->bar_height; ?>px;
	position: absolute;
	top: <?php echo $settings->top_offset; ?>px;
	left: -<?php echo $settings->bar_width + 10; ?>px;
	background: #<?php echo $settings->background_color; ?>;
	-webkit-transition: -webkit-transform .8s ease-in-out;
	transition: transform .8s ease-in-out;
}
.fl-node-<?php echo $id; ?> .fl-bbvm-unordered-list-for-beaverbuilder li:hover:before {
	background: #<?php echo $settings->hover_color; ?>;
}
<?php
if( 'yes' === $settings->allow_spinning_animation ):
?>
.fl-node-<?php echo $id; ?> .fl-bbvm-unordered-list-for-beaverbuilder li:hover:before {
	-webkit-transform: rotate(360deg);
	transform: rotate(360deg);
}
<?php
endif;
?>
<?php
FLBuilderCSS::typography_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'list_typography',
	'selector' 	=> ".fl-node-$id .fl-bbvm-unordered-list-for-beaverbuilder li"
) );
endif;
// Credit https://codepen.io/the_dro/pen/pJrMZN
if ( 'hover' === $settings->list_style ):
?>
.fl-node-<?php echo $id; ?> .fl-bbvm-unordered-list-for-beaverbuilder ul {
	margin: 0;
	padding: 0;
	list-style-type: none;
}
.fl-node-<?php echo $id; ?> .fl-bbvm-unordered-list-for-beaverbuilder li {
	position: relative;
	padding: 0;
	margin: 0;
	border-bottom: <?php echo $settings->border_bottom_size; ?>px solid #<?php echo $settings->border_bottom_color; ?>;
	background: #<?php echo $settings->background_color; ?>;
	color: #<?php echo $settings->text_color; ?>;
	transition: font-size 0.3s ease 0s, background-color 0.3s ease 0s;
}
.fl-node-<?php echo $id; ?> .fl-bbvm-unordered-list-for-beaverbuilder li p {
	margin-bottom: 0;
}
.fl-node-<?php echo $id; ?> .fl-bbvm-unordered-list-for-beaverbuilder li:hover {
	background: #<?php echo $settings->background_hover_color; ?>;
	color: #<?php echo $settings->text_color_hover; ?>
}
<?php
FLBuilderCSS::typography_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'list_typography',
	'selector' 	=> ".fl-node-$id .fl-bbvm-unordered-list-for-beaverbuilder li"
) );
FLBuilderCSS::dimension_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'hover_padding',
	'selector' 	=> ".fl-node-$id .fl-bbvm-unordered-list-for-beaverbuilder li",
	'unit'		=> 'px',
	'props'		=> array(
		'padding-top' 	 => 'hover_padding_top',
		'padding-right'  => 'hover_padding_right',
		'padding-bottom' => 'hover_padding_bottom',
		'padding-left' 	 => 'hover_padding_left',
	),
) );
endif;
if ( 'list_background' === $settings->list_style ):
?>
.fl-node-<?php echo $id; ?> .fl-bbvm-unordered-list-for-beaverbuilder ul {
	margin: 0;
	padding: 0;
	list-style-type: none;
}
.fl-node-<?php echo $id; ?> .fl-bbvm-unordered-list-for-beaverbuilder li {
	position: relative;
	padding: 0;
	margin: 0;
	border-bottom: <?php echo $settings->border_bottom_size; ?>px solid #<?php echo $settings->border_bottom_color; ?>;
	background: #<?php echo $settings->background_color; ?>;
	color: #<?php echo $settings->text_color; ?>
}
.fl-node-<?php echo $id; ?> .fl-bbvm-unordered-list-for-beaverbuilder li p {
	margin-bottom: 0;
}
<?php
FLBuilderCSS::typography_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'list_typography',
	'selector' 	=> ".fl-node-$id .fl-bbvm-unordered-list-for-beaverbuilder li"
) );
FLBuilderCSS::dimension_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'hover_padding',
	'selector' 	=> ".fl-node-$id .fl-bbvm-unordered-list-for-beaverbuilder li",
	'unit'		=> 'px',
	'props'		=> array(
		'padding-top' 	 => 'hover_padding_top',
		'padding-right'  => 'hover_padding_right',
		'padding-bottom' => 'hover_padding_bottom',
		'padding-left' 	 => 'hover_padding_left',
	),
) );
endif;
?>


.fl-node-<?php echo $id; ?> .fl-bbvm-testimonials-cards {
	display: flex;
	justify-content: space-between;
	flex-wrap: wrap;
	text-align: center;
}
.fl-node-<?php echo $id; ?> .owl-nav {
	position: absolute;
    top: calc(50% - 44px);
	width: 100%;
}
.fl-node-<?php echo $id; ?> .owl-prev {
	position: absolute;
	left: 0;
}
.fl-node-<?php echo $id; ?> .owl-dots .owl-dot span {
	background: #<?php echo $settings->nav_bullets_color; ?>;
}
.fl-node-<?php echo $id; ?> .owl-dots .owl-dot.active span {
	background: #<?php echo $settings->nav_bullets_active_color; ?>;
}
.fl-node-<?php echo $id; ?> .fl-bbvm-testimonials-card {
	box-sizing: border-box;
	background: #<?php echo $settings->card_background; ?>;
}
.fl-node-<?php echo $id; ?> .fl-bbvm-testimonials-card:hover {
	background: #<?php echo $settings->card_background_hover; ?>;
}
<?php
FLBuilderCSS::rule( array(
	'selector' => ".fl-node-$id .fl-bbvm-testimonials-card",
	'media' => 'default', // Optional. Can be `default`, `medium`, `responsive` or a custom statement.
	'props' => array(
		'width' => $settings->card_width . '%'
	),
) );
FLBuilderCSS::rule( array(
	'selector' => ".fl-node-$id .fl-bbvm-testimonials-card",
	'media' => 'medium', // Optional. Can be `default`, `medium`, `responsive` or a custom statement.
	'props' => array(
		'width' => $settings->card_width_medium . '%'
	),
) );
FLBuilderCSS::rule( array(
	'selector' => ".fl-node-$id .fl-bbvm-testimonials-card",
	'media' => 'responsive', // Optional. Can be `default`, `medium`, `responsive` or a custom statement.
	'props' => array(
		'width' => $settings->card_width_responsive . '%'
	),
) );
FLBuilderCSS::dimension_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'card_padding',
	'selector' 	=> ".fl-node-$id .fl-bbvm-testimonials-card",
	'unit'		=> 'px',
	'props'		=> array(
		'padding-top' 	 => 'card_padding_top',
		'padding-right'  => 'card_padding_right',
		'padding-bottom' => 'card_padding_bottom',
		'padding-left' 	 => 'card_padding_left',
	),
) );
FLBuilderCSS::dimension_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'card_margin',
	'selector' 	=> ".fl-node-$id .fl-bbvm-testimonials-card",
	'unit'		=> 'px',
	'props'		=> array(
		'margin-top' 	 => 'card_margin_top',
		'margin-right'  => 'card_margin_right',
		'margin-bottom' => 'card_margin_bottom',
		'margin-left' 	 => 'card_margin_left',
	),
) );
?>
.fl-node-<?php echo $id; ?> .is-placeholder {
	background: transparent !important;
	padding: 0 !important;
	margin: 0 !important;
}
.fl-node-<?php echo $id; ?> .fl-bbvm-testimonials-card-img img,
.fl-node-<?php echo $id; ?> .fl-bbvm-testimonials-list-img img {
	width: <?php echo absint( $settings->photo_size ); ?>px;
	height: <?php echo absint( $settings->photo_size ); ?>px;
	min-width: <?php echo absint( $settings->photo_size ); ?>px;
	min-height: <?php echo absint( $settings->photo_size ); ?>px;
}
<?php
if( 'circle' === $settings->photo_appearance ) :
?>
.fl-node-<?php echo $id; ?> .fl-bbvm-testimonials-card-img img,
.fl-node-<?php echo $id; ?> .fl-bbvm-testimonials-list-img img {
	border-radius: 100%;
}
<?php
endif;
?>
.fl-node-<?php echo $id; ?> .fl-bbvm-testimonials-card-img i,
.fl-node-<?php echo $id; ?> .fl-bbvm-testimonials-list-img i {
	color: #<?php echo $settings->icon_color; ?>;
	font-size: <?php echo absint( $settings->icon_size ); ?>px;
}
.fl-node-<?php echo $id; ?> .fl-bbvm-testimonials-card-rating i,
.fl-node-<?php echo $id; ?> .fl-bbvm-testimonials-list-rating i {
	color: #<?php echo $settings->rating_color; ?>;
	font-size: <?php echo absint( $settings->rating_size ); ?>px !important;
}
<?php
FLBuilderCSS::typography_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'testimonial_name_typography',
	'selector' 	=> ".fl-node-$id .fl-bbvm-testimonials-card-name, .fl-node-$id .fl-bbvm-testimonials-list-name"
) );
FLBuilderCSS::typography_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'testimonial_title_typography',
	'selector' 	=> ".fl-node-$id .fl-bbvm-testimonials-card-title, .fl-node-$id .fl-bbvm-testimonials-list-title"
) );
FLBuilderCSS::typography_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'testimonial_content_typography',
	'selector' 	=> ".fl-node-$id .fl-bbvm-testimonials-card-content, .fl-node-$id .fl-bbvm-testimonials-list-content"
) );
FLBuilderCSS::dimension_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'testimonial_name_padding',
	'selector' 	=> ".fl-node-$id .fl-bbvm-testimonials-card-name, .fl-node-$id .fl-bbvm-testimonials-list-name",
	'unit'		=> 'px',
	'props'		=> array(
		'padding-top' 	 => 'testimonial_name_padding_top',
		'padding-right'  => 'testimonial_name_padding_right',
		'padding-bottom' => 'testimonial_name_padding_bottom',
		'padding-left' 	 => 'testimonial_name_padding_left',
	),
) );
FLBuilderCSS::dimension_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'testimonial_title_padding',
	'selector' 	=> ".fl-node-$id .fl-bbvm-testimonials-card-title, .fl-node-$id .fl-bbvm-testimonials-list-title",
	'unit'		=> 'px',
	'props'		=> array(
		'padding-top' 	 => 'testimonial_title_padding_top',
		'padding-right'  => 'testimonial_title_padding_right',
		'padding-bottom' => 'testimonial_title_padding_bottom',
		'padding-left' 	 => 'testimonial_title_padding_left',
	),
) );
FLBuilderCSS::dimension_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'testimonial_content_padding',
	'selector' 	=> ".fl-node-$id .fl-bbvm-testimonials-card-content, .fl-node-$id .fl-bbvm-testimonials-list-content",
	'unit'		=> 'px',
	'props'		=> array(
		'padding-top' 	 => 'testimonial_content_padding_top',
		'padding-right'  => 'testimonial_content_padding_right',
		'padding-bottom' => 'testimonial_content_padding_bottom',
		'padding-left' 	 => 'testimonial_content_padding_left',
	),
) );
?>
.fl-node-<?php echo $id; ?> .fl-bbvm-testimonials-card-content,
.fl-node-<?php echo $id; ?> .fl-bbvm-testimonials-list-content {
	color: #<?php echo $settings->testimonial_content_color; ?>;
}
.fl-node-<?php echo $id; ?> .fl-bbvm-testimonials-card-name,
.fl-node-<?php echo $id; ?> .fl-bbvm-testimonials-list-name {
	color: #<?php echo $settings->testimonial_name_color; ?>;
}
.fl-node-<?php echo $id; ?> .fl-bbvm-testimonials-card-title,
.fl-node-<?php echo $id; ?> .fl-bbvm-testimonials-list-title {
	color: #<?php echo $settings->testimonial_title_color; ?>;
}
<?php
// List Content
?>
.fl-node-<?php echo $id; ?> .fl-bbvm-testimonials {
	overflow: hidden;
	box-shadow: <?php echo FLBuilderColor::shadow( $settings->list_shadow ); ?>;
	display: flex;
	margin-bottom: <?php echo absint( $settings->list_margin_bottom ); ?>px;
}
.fl-node-<?php echo $id; ?> .fl-bbvm-testimonials-list-left {

	text-align: center;
	padding: 20px;
	background: #<?php echo $settings->left_area_background; ?>;
}
.fl-node-<?php echo $id; ?> .fl-bbvm-testimonials-list-right {
	flex: 1 1 20em;
	padding: 20px;
	background: #<?php echo $settings->right_area_background; ?>;
}
.fl-node-<?php echo $id; ?> .fl-bbvm-testimonials {
	border-style: solid;
	border-color: #<?php echo $settings->list_border_color; ?>;
}
<?php
if ( '0' != $settings->left_border ):
?>
.fl-node-<?php echo $id; ?> .fl-bbvm-testimonials .fl-bbvm-testimonials-list-left {
	border-right: <?php echo $settings->left_border; ?>px solid #<?php echo $settings->left_border_color; ?>;
}
<?php endif; ?>
<?php
FLBuilderCSS::dimension_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'left_area_padding',
	'selector' 	=> ".fl-node-$id .fl-bbvm-testimonials-list-left",
	'unit'		=> 'px',
	'props'		=> array(
		'padding-top' 	 => 'left_area_padding_top',
		'padding-right'  => 'left_area_padding_right',
		'padding-bottom' => 'left_area_padding_bottom',
		'padding-left' 	 => 'left_area_padding_left',
	),
) );
FLBuilderCSS::dimension_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'right_area_padding',
	'selector' 	=> ".fl-node-$id .fl-bbvm-testimonials-list-right",
	'unit'		=> 'px',
	'props'		=> array(
		'padding-top' 	 => 'right_area_padding_top',
		'padding-right'  => 'right_area_padding_right',
		'padding-bottom' => 'right_area_padding_bottom',
		'padding-left' 	 => 'right_area_padding_left',
	),
) );
FLBuilderCSS::dimension_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'list_border',
	'selector' 	=> ".fl-node-$id .fl-bbvm-testimonials",
	'unit'		=> 'px',
	'props'		=> array(
		'border-top-width' 	 => 'list_border_top',
		'border-right-width'  => 'list_border_right',
		'border-bottom-width' => 'list_border_bottom',
		'border-left-width' 	 => 'list_border_left',
	),
) );
FLBuilderCSS::dimension_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'list_border_radius',
	'selector' 	=> ".fl-node-$id .fl-bbvm-testimonials",
	'unit'		=> 'px',
	'props'		=> array(
		'border-top-left-radius' 	 => 'list_border_radius_top',
		'border-top-right-radius'  => 'list_border_radius_right',
		'border-bottom-left-radius' => 'list_border_radius_bottom',
		'border-bottom-right-radius' 	 => 'list_border_radius_left',
	),
) );

// Carousel
?>
.fl-node-<?php echo $id; ?> .owl-carousel .fl-bbvm-testimonials-card {
	width: 100%;
	text-align: center;
}
.fl-node-<?php echo $id; ?> .owl-carousel .fl-bbvm-testimonials-card-img {
	display: inline-block;
}
.fl-node-<?php echo $id; ?> .owl-prev,
.fl-node-<?php echo $id; ?> .owl-next {
	float: left;
}
.fl-node-<?php echo $id; ?> .owl-next  {
	float: right;
}
.fl-node-<?php echo $id; ?> .owl-prev i,
.fl-node-<?php echo $id; ?> .owl-next i{
	font-size: 24px;
	color: #<?php echo $settings->nav_color; ?>;
}
.fl-node-<?php echo $id; ?> .owl-theme .owl-nav [class*=owl-]:hover {
	background: transparent;
}