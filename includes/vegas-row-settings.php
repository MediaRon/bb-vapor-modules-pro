<?php
/**
 * Function that registers the row's settings file for the Vegas slider
 *
 * @since 1.3.0
 */
function bbvapor_modules_row_register_settings() {
	add_filter( 'fl_builder_register_settings_form', 'bbvm_row_register_settings', 11, 2 );
	add_action( 'fl_builder_after_render_rows', 'bbvapor_modules_enqueue_vegas', 10, 1 );
}

/**
 * Function that inserts Vegas script
 *
 * @since 1.3.0
 * @param array $row an array to get the row settings.
 */
function bbvapor_modules_enqueue_vegas( $row ) {
	foreach( $row as $row_id => $row_object ) {
		if( isset( $row_object->settings->bg_type ) && 'bbvm_vegas' === $row_object->settings->bg_type ) {
			$photos = $row_object->settings->bbvm_vegas_photos;
			$javascript = '';
			$javascript .= 'jQuery ( document ).ready( function( $ ) {';
			$javascript .= sprintf( '$(".fl-node-%s").find("div").css("z-index", "15");', $row_id );
			$javascript .= sprintf( '$(".fl-node-%s").css("position", "relative").append("%s");', $row_id, '<div class=\"vegas\" style=\"position: absolute; width: 100%; height: 100%; z-index: 1; top: 0; left: 0;\"></div>' );
			$javascript .= sprintf( '$(".fl-node-%s .vegas").vegas({', $row_id );
			$javascript .= sprintf( 'timer: %s,', 'yes' === $row_object->settings->bbvm_vegas_show_timer ? 'true' : 'false' );
			$javascript .= sprintf( 'delay: %d,', $row_object->settings->bbvm_vegas_transition_time );
			$javascript .= sprintf( "transition: ['%s'],", $row_object->settings->bbvm_vegas_transition );
			$javascript .= sprintf( "animation: '%s',", $row_object->settings->bbvm_vegas_animations );
			$javascript .= 'slides: [';
			foreach( $photos as $photo ) {
				$image_src = wp_get_attachment_image_src($photo, 'full' );
				$image = $image_src[0];
				$javascript .= sprintf( '{ src: "%s" },', esc_url( $image ) );
			}
			$javascript .= ']';
			$javascript .= '});';
			$javascript .= '} );';
			wp_enqueue_script( 'vegas', BBVAPOR_PRO_BEAVER_BUILDER_URL . 'js/vegas/vegas.js', array( 'jquery' ), BBVAPOR_PRO_BEAVER_BUILDER_VERSION, true );
			wp_add_inline_script( 'vegas', $javascript, 'after' );
			wp_enqueue_style( 'vegas', BBVAPOR_PRO_BEAVER_BUILDER_URL . 'js/vegas/vegas.css', array(), BBVAPOR_PRO_BEAVER_BUILDER_VERSION, 'all' );
		}
	}
}
/**
 * Function that inserts Vegas Background setting in the Row's settings
 *
 * @since 1.3.0
 * @param array $form an array to get the form.
 * @param int   $id an integer to get the form's id.
 */
function bbvm_row_register_settings( $form, $id ) {
	if ( 'row' != $id ) {
		return $form;
	}
	$form['tabs']['style']['sections']['background']['fields']['bg_type']['options']['bbvm_vegas'] = __( 'Vegas', 'bb-vapor-modules-pro' );
	$form['tabs']['style']['sections']['background']['fields']['bg_type']['toggle']['bbvm_vegas']  = array(
		'sections' => array( 'bbvm_vegas_settings' ),
	);
	$form['tabs']['style']['sections']['bbvm_vegas_settings'] = array(
		'title'  => __( 'Vegas', 'bb-vapor-modules-pro' ),
		'fields' => array(
			'bbvm_vegas_photos' => array(
				'type'          => 'multiple-photos',
				'label'         => __( 'Select photos', 'bb-vapor-modules-pro' )
			),
			'bbvm_vegas_transition_time' => array(
				'type' => 'unit',
				'label' => __( 'Transition time in milliseconds', 'bb-vapor-modules-pro' ),
				'default' => 5000,
			),
			'bbvm_vegas_show_timer' => array(
				'type' => 'select',
				'label' => 'Show transition timer',
				'default' => 'no',
				'options' => array(
					'no' => __( 'No', 'bb-vapor-modules-pro' ),
					'yes' => __( 'Yes', 'bb-vapor-modules-pro' )
				)
			),
			'bbvm_vegas_transition' => array(
				'type'          => 'select',
				'label'         => __( 'Transition', 'bb-vapor-modules-pro' ),
				'options' => array(
					'fade' => __( 'Fade', 'bb-vapor-modules-pro' ),
					'fade2' => __( 'Fade 2', 'bb-vapor-modules-pro' ),
					'slideLeft' => __( 'Slide Left', 'bb-vapor-modules-pro' ),
					'slideLeft2' => __( 'Slide Left 2', 'bb-vapor-modules-pro' ),
					'slideRight' => __( 'Slide Right', 'bb-vapor-modules-pro' ),
					'slideRight2' => __( 'Slide Right 2', 'bb-vapor-modules-pro' ),
					'slideUp' => __( 'Slide Up', 'bb-vapor-modules-pro' ),
					'slideUp2' => __( 'Slide Up 2', 'bb-vapor-modules-pro' ),
					'slideDown' => __( 'Slide Down', 'bb-vapor-modules-pro' ),
					'slideDown2' => __( 'Slide Down 2', 'bb-vapor-modules-pro' ),
					'zoomIn' => __( 'Zoom In', 'bb-vapor-modules-pro' ),
					'zoomIn2' => __( 'Zoom In 2', 'bb-vapor-modules-pro' ),
					'zoomOut' => __( 'Zoom Out', 'bb-vapor-modules-pro' ),
					'zoomOut2' => __( 'Zoom Out 2', 'bb-vapor-modules-pro' ),
					'swirlLeft' => __( 'Swirl Left', 'bb-vapor-modules-pro' ),
					'swirlLeft2' => __( 'Swirl Left 2', 'bb-vapor-modules-pro' ),
					'swirlRight' => __( 'Swirl Right', 'bb-vapor-modules-pro' ),
					'swirlRight2' => __( 'Swirl Right 2', 'bb-vapor-modules-pro' ),
					'burn' => __( 'Burn', 'bb-vapor-modules-pro' ),
					'burn2' => __( 'Burn 2', 'bb-vapor-modules-pro' ),
					'blur' => __( 'Blur', 'bb-vapor-modules-pro' ),
					'blur2' => __( 'Blur 2', 'bb-vapor-modules-pro' ),
					'flash' => __( 'Flash', 'bb-vapor-modules-pro' ),
					'flash2' => __( 'Flash 2', 'bb-vapor-modules-pro' ),

				)
			),
			'bbvm_vegas_animations' => array(
				'type' => 'select',
				'label' => __( 'Animations', 'bb-vapor-modules-pro' ),
				'default' => 'none',
				'options' => array(
					'none' => __( 'None', 'bb-vapor-modules-pro' ),
					'kenburns' => __( 'Ken Burns', 'bb-vapor-modules-pro' ),
					'kenburnsLeft' => __( 'Ken Burns Left', 'bb-vapor-modules-pro'),
					'kenburnsRight' => __( 'Ken Burns Right', 'bb-vapor-modules-pro' ),
					'kenburnsUp' => __( 'Ken Burns Up', 'bb-vapor-modules-pro' ),
					'kenburnsUpLeft' => __( 'Ken Burns Up Left', 'bb-vapor-modules-pro' ),
					'kenburnsUpRight' => __( 'Ken Burns Up Right', 'bb-vapor-modules-pro' ),
					'kenburnsDown' => __( 'Ken Burns Down', 'bb-vapor-modules-pro' ),
					'kenburnsDownLeft' => __( 'Ken Burns Down Left', 'bb-vapor-modules-pro' ), 'kenburnsDownRight' => __( 'Ken Burns Down Right', 'bb-vapor-modules-pro' )
				)
			)
		)
	);
	return $form;
}
