<?php
/**
 * Unordered List Module.
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 1.3.0
 */

if ( 'icon' === $settings->list_style ) :
	?>
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-unordered-list-for-beaverbuilder ul {
		margin: 0;
		padding: 0;
		list-style-type: none;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-unordered-list-for-beaverbuilder li {
		position: relative;
		padding: 0;
		margin: 0;
		margin-left: <?php echo absint( $settings->list_icon_size ) + 10; ?>px;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-unordered-list-for-beaverbuilder li .icon {
		position: absolute;
		left: -<?php echo absint( $settings->list_icon_size ) + 10; ?>px;
		top: 0;
		font-size: <?php echo absint( $settings->list_icon_size ); ?>px;
		color: #<?php echo esc_html( $settings->list_icon_color ); ?>;
	}
	<?php
	FLBuilderCSS::typography_field_rule(
		array(
			'settings'     => $settings,
			'setting_name' => 'list_typography',
			'selector'     => ".fl-node-$id .fl-bbvm-unordered-list-for-beaverbuilder li .content",
		)
	);
endif;
if ( 'circular' === $settings->list_style ) :
	?>
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-unordered-list-for-beaverbuilder ul {
		margin: 0;
		padding: 0;
		list-style-type: none;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-unordered-list-for-beaverbuilder li {
		position: relative;
		padding: 0;
		margin: 0;
		margin-left: <?php echo absint( absint( $settings->item_size ) ) + 10; ?>px;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-unordered-list-for-beaverbuilder li:before {
		position: relative;
		content: '';
		width: <?php echo absint( $settings->item_size ); ?>px;
		height: <?php echo absint( $settings->item_size ); ?>px;
		border-radius: 100%;
		display: block;
		position: absolute;
		top: <?php echo absint( $settings->top_offset ); ?>px;
		left: -<?php echo absint( $settings->item_size ) + 10; ?>px;
		background: #<?php echo esc_html( $settings->background_color ); ?>;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-unordered-list-for-beaverbuilder li:hover:before {
		background: #<?php echo esc_html( $settings->hover_color ); ?>;
	}
	<?php
	FLBuilderCSS::typography_field_rule(
		array(
			'settings'     => $settings,
			'setting_name' => 'list_typography',
			'selector'     => ".fl-node-$id .fl-bbvm-unordered-list-for-beaverbuilder li",
		)
	);
endif;
if ( 'square' === $settings->list_style ) :
	?>
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-unordered-list-for-beaverbuilder ul {
		margin: 0;
		padding: 0;
		list-style-type: none;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-unordered-list-for-beaverbuilder li {
		position: relative;
		padding: 0;
		margin: 0;
		margin-left: <?php echo absint( $settings->item_size ) + 10; ?>px;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-unordered-list-for-beaverbuilder li:before {
		position: relative;
		content: '';
		width: <?php echo absint( $settings->item_size ); ?>px;
		height: <?php echo absint( $settings->item_size ); ?>px;
		position: absolute;
		top: <?php echo absint( $settings->top_offset ); ?>px;
		left: -<?php echo absint( $settings->item_size ) + 10; ?>px;
		background: #<?php echo esc_html( $settings->background_color ); ?>;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-unordered-list-for-beaverbuilder li:hover:before {
		background: #<?php echo esc_html( $settings->hover_color ); ?>;
	}
	<?php
	FLBuilderCSS::typography_field_rule(
		array(
			'settings'     => $settings,
			'setting_name' => 'list_typography',
			'selector'     => ".fl-node-$id .fl-bbvm-unordered-list-for-beaverbuilder li",
		)
	);
endif;
if ( 'bar' === $settings->list_style ) :
	?>
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-unordered-list-for-beaverbuilder ul {
		margin: 0;
		padding: 0;
		list-style-type: none;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-unordered-list-for-beaverbuilder li {
		position: relative;
		padding: 0;
		margin: 0;
		margin-left: <?php echo absint( $settings->bar_width ) + 10; ?>px;
		-webkit-transition: -webkit-transform .8s ease-in-out;
		transition: transform .8s ease-in-out;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-unordered-list-for-beaverbuilder li:before {
		position: relative;
		content: '';
		width: <?php echo absint( $settings->bar_width ); ?>px;
		height: <?php echo absint( $settings->bar_height ); ?>px;
		position: absolute;
		top: <?php echo absint( $settings->top_offset ); ?>px;
		left: -<?php echo absint( $settings->bar_width ) + 10; ?>px;
		background: #<?php echo esc_html( $settings->background_color ); ?>;
		-webkit-transition: -webkit-transform .8s ease-in-out;
		transition: transform .8s ease-in-out;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-unordered-list-for-beaverbuilder li:hover:before {
		background: #<?php echo esc_html( $settings->hover_color ); ?>;
	}
	<?php
	if ( 'yes' === $settings->allow_spinning_animation ) :
		?>
		.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-unordered-list-for-beaverbuilder li:hover:before {
			-webkit-transform: rotate(360deg);
			transform: rotate(360deg);
		}
		<?php
	endif;
	?>
	<?php
	FLBuilderCSS::typography_field_rule(
		array(
			'settings'     => $settings,
			'setting_name' => 'list_typography',
			'selector'     => ".fl-node-$id .fl-bbvm-unordered-list-for-beaverbuilder li",
		)
	);
endif;
// Credit https://codepen.io/the_dro/pen/pJrMZN.
if ( 'hover' === $settings->list_style ) :
	?>
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-unordered-list-for-beaverbuilder ul {
		margin: 0;
		padding: 0;
		list-style-type: none;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-unordered-list-for-beaverbuilder li {
		position: relative;
		padding: 0;
		margin: 0;
		border-bottom: <?php echo absint( $settings->border_bottom_size ); ?>px solid #<?php echo esc_html( $settings->border_bottom_color ); ?>;
		background: #<?php echo esc_html( $settings->background_color ); ?>;
		color: #<?php echo esc_html( $settings->text_color ); ?>;
		transition: font-size 0.3s ease 0s, background-color 0.3s ease 0s;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-unordered-list-for-beaverbuilder li p {
		margin-bottom: 0;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-unordered-list-for-beaverbuilder li:hover {
		background: #<?php echo esc_html( $settings->background_hover_color ); ?>;
		color: #<?php echo esc_html( $settings->text_color_hover ); ?>
	}
	<?php
	FLBuilderCSS::typography_field_rule(
		array(
			'settings'     => $settings,
			'setting_name' => 'list_typography',
			'selector'     => ".fl-node-$id .fl-bbvm-unordered-list-for-beaverbuilder li",
		)
	);
	FLBuilderCSS::dimension_field_rule(
		array(
			'settings'     => $settings,
			'setting_name' => 'hover_padding',
			'selector'     => ".fl-node-$id .fl-bbvm-unordered-list-for-beaverbuilder li",
			'unit'         => 'px',
			'props'        => array(
				'padding-top'    => 'hover_padding_top',
				'padding-right'  => 'hover_padding_right',
				'padding-bottom' => 'hover_padding_bottom',
				'padding-left'   => 'hover_padding_left',
			),
		)
	);
endif;
if ( 'list_background' === $settings->list_style ) :
	?>
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-unordered-list-for-beaverbuilder ul {
		margin: 0;
		padding: 0;
		list-style-type: none;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-unordered-list-for-beaverbuilder li {
		position: relative;
		padding: 0;
		margin: 0;
		border-bottom: <?php echo absint( $settings->border_bottom_size ); ?>px solid #<?php echo esc_html( $settings->border_bottom_color ); ?>;
		background: #<?php echo esc_html( $settings->background_color ); ?>;
		color: #<?php echo esc_html( $settings->text_color ); ?>
	}
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-unordered-list-for-beaverbuilder li p {
		margin-bottom: 0;
	}
	<?php
	FLBuilderCSS::typography_field_rule(
		array(
			'settings'     => $settings,
			'setting_name' => 'list_typography',
			'selector'     => ".fl-node-$id .fl-bbvm-unordered-list-for-beaverbuilder li",
		)
	);
	FLBuilderCSS::dimension_field_rule(
		array(
			'settings'     => $settings,
			'setting_name' => 'hover_padding',
			'selector'     => ".fl-node-$id .fl-bbvm-unordered-list-for-beaverbuilder li",
			'unit'         => 'px',
			'props'        => array(
				'padding-top'    => 'hover_padding_top',
				'padding-right'  => 'hover_padding_right',
				'padding-bottom' => 'hover_padding_bottom',
				'padding-left'   => 'hover_padding_left',
			),
		)
	);
endif;
