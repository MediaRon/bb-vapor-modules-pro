.fl-node-<?php echo esc_html( $id ); ?> .bbvm-faq-item i {
	display: block;
	margin-right: 15px;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-faq-item .bbvm-faq-heading {
	display: flex;
	justify-content: space-between;
	align-items: center;
	box-sizing: border-box;
	cursor: pointer;
	color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->question_color ) ); ?>;
	background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->question_background_color ) ); ?>;
	border-bottom: <?php echo absint( $settings->question_border_bottom ); ?>px solid <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->question_border_color ) ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-faq-item .bbvm-faq-content {
	box-sizing: border-box;
	color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->answer_color ) ); ?>;
	background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->answer_background_color ) ); ?>;
}
<?php
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'toc_typography',
		'selector'     => ".fl-node-$id .bbvm-faq",
	)
);
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'question_typography',
		'selector'     => ".fl-node-$id .bbvm-faq-item .bbvm-faq-heading",
	)
);
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'question_margin',
		'selector'     => ".fl-node-$id .bbvm-faq-item .bbvm-faq-heading",
		'unit'         => 'px',
		'props'        => array(
			'margin-top'    => 'question_margin_top',
			'margin-right'  => 'question_margin_right',
			'margin-bottom' => 'question_margin_bottom',
			'margin-left'   => 'question_margin_left',
		),
	)
);
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'question_padding',
		'selector'     => ".fl-node-$id .bbvm-faq-item .bbvm-faq-heading",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'question_padding_top',
			'padding-right'  => 'question_padding_right',
			'padding-bottom' => 'question_padding_bottom',
			'padding-left'   => 'question_padding_left',
		),
	)
);
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'question_radius',
		'selector'     => ".fl-node-$id .bbvm-faq-item .bbvm-faq-heading",
		'unit'         => 'px',
		'props'        => array(
			'border-top-left-radius'     => 'question_radius_top',
			'border-top-right-radius'    => 'question_radius_right',
			'border-bottom-left-radius'  => 'question_radius_bottom',
			'border-bottom-right-radius' => 'question_radius_left',
		),
	)
);
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'answer_typography',
		'selector'     => ".fl-node-$id .bbvm-faq-item .bbvm-faq-content",
	)
);
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'answer_margin',
		'selector'     => ".fl-node-$id .bbvm-faq-item .bbvm-faq-content",
		'unit'         => 'px',
		'props'        => array(
			'margin-top'    => 'answer_margin_top',
			'margin-right'  => 'answer_margin_right',
			'margin-bottom' => 'answer_margin_bottom',
			'margin-left'   => 'answer_margin_left',
		),
	)
);
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'answer_padding',
		'selector'     => ".fl-node-$id .bbvm-faq-item .bbvm-faq-content",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'answer_padding_top',
			'padding-right'  => 'answer_padding_right',
			'padding-bottom' => 'answer_padding_bottom',
			'padding-left'   => 'answer_padding_left',
		),
	)
);
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'answer_radius',
		'selector'     => ".fl-node-$id .bbvm-faq-item .bbvm-faq-content",
		'unit'         => 'px',
		'props'        => array(
			'border-top-left-radius'     => 'answer_radius_top',
			'border-top-right-radius'    => 'answer_radius_right',
			'border-bottom-left-radius'  => 'answer_radius_bottom',
			'border-bottom-right-radius' => 'answer_radius_left',
		),
	)
);
