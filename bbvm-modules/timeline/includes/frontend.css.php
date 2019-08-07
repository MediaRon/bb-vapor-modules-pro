<?php
/**
 * Timeline Module
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 1.3.0
 */

$count = 1;
foreach ( $settings->timeline as $timeline_item ) :
	?>
	.timeline-item-content.count-<?php echo absint( $count ); ?>::after {
		background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $timeline_item->background_color ) ); ?>;
	}
	.timeline-item-content.count-<?php echo absint( $count ); ?> a {
		color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $timeline_item->button_link_color ) ); ?>;
	}
	<?php
	FLBuilderCSS::typography_field_rule(
		array(
			'settings'     => $timeline_item,
			'setting_name' => 'date_typography',
			'selector'     => ".fl-node-$id .timeline-item-content.count-$count time",
		)
	);
	FLBuilderCSS::typography_field_rule(
		array(
			'settings'     => $timeline_item,
			'setting_name' => 'content_typography',
			'selector'     => ".fl-node-$id .timeline-item-content.count-$count p",
		)
	);
	FLBuilderCSS::typography_field_rule(
		array(
			'settings'     => $timeline_item,
			'setting_name' => 'category_typography',
			'selector'     => ".fl-node-$id .timeline-item-content.count-$count .tag",
		)
	);
	FLBuilderCSS::typography_field_rule(
		array(
			'settings'     => $timeline_item,
			'setting_name' => 'link_typography',
			'selector'     => ".fl-node-$id .timeline-item-content.count-$count a",
		)
	);

	$count++;
endforeach;
?>
.timeline-container {
	display: flex;
	flex-direction: column;
	position: relative;
	margin: 40px 0;
}

.timeline-container::after {
	background-color: #e17b77;
	content: '';
	position: absolute;
	left: calc(50% - 2px);
	width: 4px;
	height: 100%;
}
.timeline-item {
	display: flex;
	justify-content: flex-end;
	padding-right: 30px;
	position: relative;
	margin: 10px 0;
	width: 50%;
}

.timeline-item:nth-child(odd) {
	align-self: flex-end;
	justify-content: flex-start;
	padding-left: 30px;
	padding-right: 0;
}
.timeline-item-content {
	box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
	border-radius: 5px;
	background-color: #fff;
	display: flex;
	flex-direction: column;
	align-items: flex-end;
	padding: 15px;
	position: relative;
	width: 400px;
	max-width: 70%;
	text-align: right;
}

.timeline-item-content::after {
	content: ' ';
	background-color: #fff;
	box-shadow: 1px -1px 1px rgba(0, 0, 0, 0.2);
	position: absolute;
	right: -7.5px;
	top: calc(50% - 7.5px);
	transform: rotate(45deg);
	width: 15px;
	height: 15px;
}

.timeline-item:nth-child(odd) .timeline-item-content {
	text-align: left;
	align-items: flex-start;
}

.timeline-item:nth-child(odd) .timeline-item-content::after {
	right: auto;
	left: -7.5px;
	box-shadow: -1px 1px 1px rgba(0, 0, 0, 0.2);
}
.timeline-item-content .tag {
	color: #fff;
	font-size: 12px;
	font-weight: bold;
	top: 5px;
	left: 5px;
	letter-spacing: 1px;
	padding: 5px;
	position: absolute;
	text-transform: uppercase;
}

.timeline-item:nth-child(odd) .timeline-item-content .tag {
	left: auto;
	right: 5px;
}

.timeline-item-content time {
	color: #777;
	font-size: 12px;
	font-weight: bold;
}

.timeline-item-content p {
	font-size: 16px;
	line-height: 24px;
	margin: 15px 0;
	max-width: 250px;
}

.timeline-item-content a {
	font-size: 14px;
	font-weight: bold;
}

.timeline-item-content a::after {
	content: ' ►';
	font-size: 12px;
}

.timeline-item-content .circle {
	background-color: #fff;
	border: 3px solid #e17b77;
	border-radius: 50%;
	position: absolute;
	top: calc(50% - 10px);
	right: -40px;
	width: 20px;
	height: 20px;
	z-index: 100;
}

.timeline-item:nth-child(odd) .timeline-item-content .circle {
	right: auto;
	left: -40px;
}
@media only screen and (max-width: 1023px) {
	.timeline-item-content {
		max-width: 100%;
	}
}

@media only screen and (max-width: 767px) {
	.timeline-item-content,
	.timeline-item:nth-child(odd) .timeline-item-content {
		padding: 15px 10px;
		text-align: center;
		align-items: center;
	}

	.timeline-item-content .tag {
		width: calc(100% - 10px);
		text-align: center;
	}

	.timeline-item-content time {
		margin-top: 20px;
	}

	.timeline-item-content a {
		text-decoration: underline;
	}

	.timeline-item-content a::after {
		display: none;
	}
}
.fl-node-<?php echo esc_html( $id ); ?> .circle {
	border-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->timeline_color ) ); ?> !important;
}
.fl-node-<?php echo esc_html( $id ); ?> .timeline-container::after {
	background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->timeline_color ) ); ?>;
}
