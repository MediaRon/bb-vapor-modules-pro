<?php
/**
 * LearnDash Quiz
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 2.0.0
 */

// Quiz Styles.
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'label_typography',
		'selector'     => ".fl-node-$id .bbvm-learndash-quiz-wrapper .wpProQuiz_button",
	)
);
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'question_typography',
		'selector'     => ".fl-node-$id .bbvm-learndash-quiz-wrapper .wpProQuiz_question_text",
	)
);
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'answer_typography',
		'selector'     => ".fl-node-$id .bbvm-learndash-quiz-wrapper .wpProQuiz_questionListItem",
	)
);
FLBuilderCSS::border_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'button_border',
		'selector'     => ".fl-node-$id .bbvm-learndash-quiz-wrapper .wpProQuiz_button",
	)
);
?>
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-quiz-wrapper .wpProQuiz_text div {
	text-align: <?php echo esc_html( $settings->button_align ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-quiz-wrapper .wpProQuiz_button {
	display: inline-block;
	padding: 10px 20px;
}
<?php if ( ! empty( $settings->text_color ) ) : ?>
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-quiz-wrapper .wpProQuiz_button {
		color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->text_color ) ); ?>;
	}
<?php endif; ?>
<?php if ( ! empty( $settings->text_color_hover ) ) : ?>
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-quiz-wrapper .wpProQuiz_button:hover {
		color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->text_color_hover ) ); ?>;
	}
<?php endif; ?>
<?php if ( ! empty( $settings->background_color ) ) : ?>
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-quiz-wrapper .wpProQuiz_button {
		background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->background_color ) ); ?>;
	}
<?php endif; ?>
<?php if ( ! empty( $settings->background_color_hover ) ) : ?>
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-quiz-wrapper .wpProQuiz_button:hover {
		background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->background_color_hover ) ); ?>;
	}
<?php endif; ?>
<?php if ( ! empty( $settings->question_color ) ) : ?>
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-quiz-wrapper .wpProQuiz_question_text,
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-quiz-wrapper .wpProQuiz_results,
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-quiz-wrapper .wpProQuiz_header,
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-quiz-wrapper .wpProQuiz_quiz_time,
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-quiz-wrapper .wpProQuiz_sending{
		color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->question_color ) ); ?>;
	}
<?php endif; ?>
<?php if ( ! empty( $settings->answer_color ) ) : ?>
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-quiz-wrapper .wpProQuiz_questionListItem {
		color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->answer_color ) ); ?>;
	}
<?php endif; ?>
<?php if ( ! empty( $settings->answer_background_color ) ) : ?>
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-quiz-wrapper .wpProQuiz_questionListItem label {
		background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->answer_background_color ) ); ?>;
	}
<?php endif; ?>
