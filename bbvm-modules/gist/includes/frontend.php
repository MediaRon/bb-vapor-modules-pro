<div class="fl-bbvm-gist-for-beaverbuilder">
	<?php
	$response = wp_remote_get( esc_url_raw( $settings->gist . '.json' ) );
	if ( ! is_wp_error( $response ) ) {
		$body = json_decode( wp_remote_retrieve_body( $response ) );
		?>
		<link rel="stylesheet" href="<?php echo esc_url( $body->stylesheet ); ?>" />
		<?php
		echo $body->div;
		if ( ! empty( $settings->gist_caption ) ):
			?>
		<figcaption><?php echo $settings->gist_caption; ?></figcaption>
			<?php
		endif;
	}
	?>
</div>