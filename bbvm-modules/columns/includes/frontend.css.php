<?php
/**
 * Columns Module.
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 1.4.5
 */
?>
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-columns {
	background: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->background_color ) ); ?>;
	color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->text_color ) ); ?>;
}
<?php
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'padding',
		'selector'     => ".fl-node-$id .fl-bbvm-columns",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'padding_top',
			'padding-right'  => 'padding_right',
			'padding-bottom' => 'padding_bottom',
			'padding-left'   => 'padding_left',
		),
	)
);
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'typography',
		'selector'     => ".fl-node-$id .fl-bbvm-columns",
	)
);

// Now style the columns.
?>
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-columns {
	column-count: <?php echo absint( $settings->column_count + 1 ); ?>;
	column-gap: <?php echo absint( $settings->column_gap ); ?>px;
	column-rule: <?php echo absint( $settings->column_border_width ); ?>px solid <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->column_border_color ) ); ?>;
}
<?php
$bbvm_column_count = absint( $settings->column_count + 1 );
if ( 6 === $bbvm_column_count ) :
	?>
	@media only screen and (max-width: 1200px) {
		.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-columns {
			column-count: 5;
		}
	}
	@media only screen and (max-width: 1000px) {
		.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-columns {
			column-count: 4;
		}
	}
	@media only screen and (max-width: 768px) {
		.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-columns {
			column-count: 3;
		}
	}
	@media only screen and (max-width: 500px) {
		.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-columns {
			column-count: 2;
		}
	}
	@media only screen and (max-width: 400px) {
		.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-columns {
			column-count: 1;
		}
	}
	<?php
endif;
if ( 5 === $bbvm_column_count ) :
	?>
	@media only screen and (max-width: 1000px) {
		.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-columns {
			column-count: 4;
		}
	}
	@media only screen and (max-width: 768px) {
		.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-columns {
			column-count: 3;
		}
	}
	@media only screen and (max-width: 500px) {
		.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-columns {
			column-count: 2;
		}
	}
	@media only screen and (max-width: 400px) {
		.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-columns {
			column-count: 1;
		}
	}
	<?php
endif;
if ( 4 === $bbvm_column_count ) :
	?>
	@media only screen and (max-width: 768px) {
		.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-columns {
			column-count: 3;
		}
	}
	@media only screen and (max-width: 500px) {
		.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-columns {
			column-count: 2;
		}
	}
	@media only screen and (max-width: 400px) {
		.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-columns {
			column-count: 1;
		}
	}
	<?php
endif;
if ( 3 === $bbvm_column_count ) :
	?>
	@media only screen and (max-width: 500px) {
		.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-columns {
			column-count: 2;
		}
	}
	@media only screen and (max-width: 400px) {
		.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-columns {
			column-count: 1;
		}
	}
	<?php
endif;
if ( 2 === $bbvm_column_count ) :
	?>
	@media only screen and (max-width: 400px) {
		.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-columns {
			column-count: 1;
		}
	}
	<?php
endif;
