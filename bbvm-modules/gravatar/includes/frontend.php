<div class="fl-bbvm-gravatar-for-beaverbuilder">
	<div class="fl-bbvm-gravatar">
	<?php
		$gravatar_settings = $gravatar_size = $gravatar_url = 0;
		if( is_int( $settings->user_id ) ) {
			$gravatar_settings = $settings->user_id;
		}
		if ( is_email( $settings->email_address ) ) {
			$gravatar_settings = $settings->email_address;
			if( $settings->avatar_link ) {
				$gravatar_profile = 'https://www.gravatar.com/' . md5( $gravatar_settings ) . '.php';
				$request = wp_remote_get( $gravatar_profile );
				$response = unserialize( wp_remote_retrieve_body( $request ) );
				$gravatar_url = $response['entry'][0]['profileUrl'];
			}
					}
		$gravatar_size = absint( $settings->avatar_size );
		if( 'yes' === $settings->avatar_link ) {
			printf( '<a href="%s" target="_blank"	>%s</a>', esc_url( $gravatar_url ), get_avatar( $gravatar_settings, $gravatar_size ) );
		} else {
			echo get_avatar( $gravatar_settings, $gravatar_size );
		}
	?>
	</div>
	<?php
	if ( !empty( $settings->avatar_title ) ):
	?>
	<h2>
	<?php
	if( 'yes' === $settings->avatar_link ) {
		printf( '<a href="%s" target="_blank">%s</a>', esc_url( $gravatar_url ), esc_html( $settings->avatar_title ) );
	} else {
		echo esc_html( $settings->avatar_title );
	}
	?>
	</h2>
	<?php
	endif;
	?>
</div>