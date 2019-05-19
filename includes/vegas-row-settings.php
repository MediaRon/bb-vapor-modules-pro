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
			wp_enqueue_script( 'vegas', BBVAPOR_BEAVER_BUILDER_URL . 'js/vegas/vegas.js', array( 'jquery' ), BBVAPOR_BEAVER_BUILDER_VERSION, true );
			wp_add_inline_script( 'vegas', $javascript, 'after' );
			wp_enqueue_style( 'vegas', BBVAPOR_BEAVER_BUILDER_URL . 'js/vegas/vegas.css', array(), BBVAPOR_BEAVER_BUILDER_VERSION, 'all' );
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
	$form['tabs']['style']['sections']['background']['fields']['bg_type']['options']['bbvm_vegas'] = __( 'Vegas', 'bb-vapor-modules' );
	$form['tabs']['style']['sections']['background']['fields']['bg_type']['toggle']['bbvm_vegas']  = array(
		'sections' => array( 'bbvm_vegas_settings' ),
	);
	$form['tabs']['style']['sections']['bbvm_vegas_settings'] = array(
		'title'  => __( 'Vegas', 'bb-vapor-modules' ),
		'fields' => array(
			'bbvm_vegas_photos' => array(
				'type'          => 'multiple-photos',
				'label'         => __( 'Select photos', 'bb-vapor-modules' )
			),
			'bbvm_vegas_transition_time' => array(
				'type' => 'unit',
				'label' => __( 'Transition time in milliseconds', 'bb-vapor-modules' ),
				'default' => 5000,
			),
			'bbvm_vegas_show_timer' => array(
				'type' => 'select',
				'label' => 'Show transition timer',
				'default' => 'no',
				'options' => array(
					'no' => __( 'No', 'bb-vapor-modules' ),
					'yes' => __( 'Yes', 'bb-vapor-modules' )
				)
			),
			'bbvm_vegas_transition' => array(
				'type'          => 'select',
				'label'         => __( 'Transition', 'bb-vapor-modules' ),
				'options' => array(
					'fade' => __( 'Fade', 'bb-vapor-modules' ),
					'fade2' => __( 'Fade 2', 'bb-vapor-modules' ),
					'slideLeft' => __( 'Slide Left', 'bb-vapor-modules' ),
					'slideLeft2' => __( 'Slide Left 2', 'bb-vapor-modules' ),
					'slideRight' => __( 'Slide Right', 'bb-vapor-modules' ),
					'slideRight2' => __( 'Slide Right 2', 'bb-vapor-modules' ),
					'slideUp' => __( 'Slide Up', 'bb-vapor-modules' ),
					'slideUp2' => __( 'Slide Up 2', 'bb-vapor-modules' ),
					'slideDown' => __( 'Slide Down', 'bb-vapor-modules' ),
					'slideDown2' => __( 'Slide Down 2', 'bb-vapor-modules' ),
					'zoomIn' => __( 'Zoom In', 'bb-vapor-modules' ),
					'zoomIn2' => __( 'Zoom In 2', 'bb-vapor-modules' ),
					'zoomOut' => __( 'Zoom Out', 'bb-vapor-modules' ),
					'zoomOut2' => __( 'Zoom Out 2', 'bb-vapor-modules' ),
					'swirlLeft' => __( 'Swirl Left', 'bb-vapor-modules' ),
					'swirlLeft2' => __( 'Swirl Left 2', 'bb-vapor-modules' ),
					'swirlRight' => __( 'Swirl Right', 'bb-vapor-modules' ),
					'swirlRight2' => __( 'Swirl Right 2', 'bb-vapor-modules' ),
					'burn' => __( 'Burn', 'bb-vapor-modules' ),
					'burn2' => __( 'Burn 2', 'bb-vapor-modules' ),
					'blur' => __( 'Blur', 'bb-vapor-modules' ),
					'blur2' => __( 'Blur 2', 'bb-vapor-modules' ),
					'flash' => __( 'Flash', 'bb-vapor-modules' ),
					'flash2' => __( 'Flash 2', 'bb-vapor-modules' ),

				)
			),
			'bbvm_vegas_animations' => array(
				'type' => 'select',
				'label' => __( 'Animations', 'bb-vapor-modules' ),
				'default' => 'none',
				'options' => array(
					'none' => __( 'None', 'bb-vapor-modules' ),
					'kenburns' => __( 'Ken Burns', 'bb-vapor-modules' ),
					'kenburnsLeft' => __( 'Ken Burns Left', 'bb-vapor-modules'),
					'kenburnsRight' => __( 'Ken Burns Right', 'bb-vapor-modules' ),
					'kenburnsUp' => __( 'Ken Burns Up', 'bb-vapor-modules' ),
					'kenburnsUpLeft' => __( 'Ken Burns Up Left', 'bb-vapor-modules' ),
					'kenburnsUpRight' => __( 'Ken Burns Up Right', 'bb-vapor-modules' ),
					'kenburnsDown' => __( 'Ken Burns Down', 'bb-vapor-modules' ),
					'kenburnsDownLeft' => __( 'Ken Burns Down Left', 'bb-vapor-modules' ), 'kenburnsDownRight' => __( 'Ken Burns Down Right', 'bb-vapor-modules' )
				)
			)
		)
	);
	return $form;
}
