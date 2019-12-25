<?php
/**
 * LearnDash Profile
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 2.0.0
 */

// Image Styles.
?>
<?php if ( 'square' === $settings->profile_appearance ) : ?>
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-profile-wrapper .learndash-wrapper .ld-profile-avatar {
	border-radius: 0;
}
<?php endif; ?>
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-profile-wrapper .learndash-wrapper .ld-profile-summary .ld-profile-card .ld-profile-avatar {
	width: <?php echo absint( $settings->profile_width ); ?>px;
	height: <?php echo absint( $settings->profile_width ); ?>px;
}
<?php
FLBuilderCSS::border_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'profile_border',
		'selector'     => ".fl-node-$id .bbvm-learndash-profile-wrapper .learndash-wrapper .ld-profile-summary .ld-profile-card .ld-profile-avatar",
	)
);
