<?php
/**
 * Gist Module.
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 1.3.0
 */

?>
<div class="fl-bbvm-gist-for-beaverbuilder">
	<?php
	if ( isset( $settings->gist ) ) :
		$response = wp_remote_get( esc_url_raw( $settings->gist . '.json' ) );
		if ( ! is_wp_error( $response ) ) {
			$body = json_decode( wp_remote_retrieve_body( $response ) );
			?>
			<link rel="stylesheet" href="<?php echo esc_url( $body->stylesheet ); ?>" /> <?php // phpcs:ignore ?>
			<?php
			echo wp_kses_post( $body->div );
			if ( ! empty( $settings->gist_caption ) ) :
				?>
				<figcaption><?php echo wp_kses_post( $settings->gist_caption ); ?></figcaption>
				<?php
			endif;
		}
	endif;
	?>
</div>
