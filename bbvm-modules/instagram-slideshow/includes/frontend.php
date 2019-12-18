<?php
/**
 * Instagram Slideshow Module.
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 1.6.5
 */

?>
<div class="fl-bbvm-instagram-slideshow-for-beaverbuilder">
	<?php
	// Get cache if possible.
	$instagram = get_option( 'bbvm-modules-instagram', array() );
	if ( ! isset( $instagram['token'] ) && is_user_logged_in() ) {
		?>
		<p><?php esc_html_e( 'Please connect to Instagram in the plugin settings.', 'bb-vapor-modules-pro' ); ?>&nbsp;<a href="<?php echo esc_url( add_query_arg( array( 'page' => 'bb-vapor-modules-pro', 'tab' => 'instagram' ), admin_url( 'options-general.php' ) ) ); ?>"><?php esc_html_e( 'Connect', 'bb-vapor-modules-pro' ); // phpcs:ignore ?></a>
		<?php
	} else {
		$instagram_json = isset( $instagram['json'] ) ? $instagram['json'] : '';
		$time_now       = time();
		$break_cache    = false;
		if ( ( $time_now - ( isset( $instagram['last_cached'] ) ? $instagram['last_cached'] : 0 ) > 3600 ) || FLBuilderModel::is_builder_enabled() ) {
			$break_cache = true;
		}
		if ( empty( $instagram_json ) || $break_cache ) {
			$sig_response = wp_remote_get( esc_url_raw( sprintf( 'https://mediaron.com/instagram/getsig.php?user_id=%s&token=%s&max_id=%s&feed_count=%s', $instagram['user_id'], $instagram['token'], false, $settings->items_show ) ) );
			$sig          = wp_remote_retrieve_body( $sig_response );

			$response                 = wp_remote_get( esc_url_raw( sprintf( 'https://api.instagram.com/v1/users/%d/media/recent?access_token=%s&sig=%s&count=%d', $instagram['user_id'], $instagram['token'], $sig, $settings->items_show ) ) );
			$response_json            = wp_remote_retrieve_body( $response );
			$instagram['json']        = $response_json;
			$instagram['last_cached'] = time();
			update_option( 'bbvm-modules-instagram', $instagram );
			$instagram_json = json_decode( $response_json );
		} else {
			$instagram_json = json_decode( $instagram_json );
		}
		?>
		<div class="bbvm-instagram-slideshow">
			<?php
			// Get profile information.
			$author_avatar             = '';
			$author_full_name          = '';
			$author_instagram_feed_url = '';
			foreach ( $instagram_json->data as $key => $user_data ) {
				$author_full_name          = $user_data->user->full_name;
				$author_avatar             = $user_data->user->profile_picture;
				$author_instagram_feed_url = sprintf( 'https://instagram.com/%s', $user_data->user->username );
				break;
			}
			?>
			<div class="instagram-author">
				<a href="<?php echo esc_url( $author_instagram_feed_url ); ?>"><img src="<?php echo esc_url( $author_avatar ); ?>" alt="<?php echo esc_attr( $author_full_name ); ?>" />&nbsp;<?php echo esc_html( $author_full_name ); ?></a>
			</div>
			<div class="fl-node-instafeed-slideshow owl-carousel owl-theme">
			<?php
			foreach ( $instagram_json->data as $key => $user_data ) {
				?>
					<div class="instagram-image-slide">
						<?php
						if ( 'yes' === $settings->lightbox ) :
							?>
							<a class="bbvm-instagram-lightbox" href="<?php echo esc_url( $user_data->images->standard_resolution->url ); ?>"><img src="<?php echo esc_url( $user_data->images->standard_resolution->url ); ?>" /></a>
							<?php
						else :
							?>
							<a href="<?php echo esc_url( $user_data->link ); ?>"><img src="<?php echo esc_url( $user_data->images->standard_resolution->url ); ?>" /></a>
							<?php
						endif;
						?>
					</div><!-- .instagram-image -->
				<?php
			}
			?>
			</div><!-- fl-node-instafeed-slideshow -->
			<?php
			if ( 'yes' === $settings->show_follow_us_button ) :
				?>
				<div class="instagram-buttons">
				<?php
				if ( 'yes' === $settings->show_follow_us_button ) :
					?>
					<a class="instagram-follow" href="<?php echo esc_url( $author_instagram_feed_url ); ?>"><i class="fab fa-instagram"></i> <?php echo esc_html( $settings->follow_text ); ?></a>
				<?php endif; ?>
				</div>
				<?php
			endif;
			?>
		</div>
		<?php
	}
	?>
</div>
