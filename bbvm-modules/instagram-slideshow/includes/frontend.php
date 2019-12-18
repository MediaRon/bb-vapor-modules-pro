<?php
/**
 * Instagram Module.
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 1.3.0
 */

?>
<div class="fl-bbvm-instagram-for-beaverbuilder">
	<?php
	// Get cache if possible.
	$instagram = get_option( 'bbvm-modules-instagram-slideshow', array() );
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
			update_option( 'bbvm-modules-instagram-slideshow', $instagram );
			$instagram_json = json_decode( $response_json );
		} else {
			$instagram_json = json_decode( $instagram_json );
		}
		?>
		<section class="fl-node-instagram">
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
			<div class="fl-node-instafeed <?php echo ( 'card' === $settings->layout ) ? 'instagram-card-wrapper' : 'instagram-masonry-wrapper'; ?>">
			<?php
			foreach ( $instagram_json->data as $key => $user_data ) {
				?>
				<div class="instagram-card">
					<div class="instagram-image">
						<?php
						if ( 'yes' === $settings->load_images_background_image ) :
							$instagram_background_image_css = sprintf( 'style="background-image: url(%s); background-size: cover; background-position: center center;"', esc_url( $user_data->images->standard_resolution->url ) );
							if ( 'yes' === $settings->lightbox ) :
								?>
								<a class="bbvm-ig-bgimage bbvm-instagram-lightbox" href="<?php echo esc_url( $user_data->images->standard_resolution->url ); ?>" <?php echo $instagram_background_image_css; // phpcs:ignore ?>></a>
								<?php
							else :
								?>
								<a class="bbvm-ig-bgimage" href="<?php echo esc_url( $user_data->link ); ?>" <?php echo $instagram_background_image_css; // phpcs:ignore ?>></a>
								<?php
							endif;
							?>
							<?php
							else :
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
								<?php
						endif;
							?>
					</div>
					<?php
					if ( 'yes' === $settings->show_likes_comments ) :
						?>
						<div class="instagram-meta">
							<span class="instagram-likes">Likes: <?php echo esc_html( number_format( $user_data->likes->count ) ); ?></span><span class="instagram-comments"><?php echo esc_html__( 'Comments:', 'bb-vapor-modules-pro' ); ?> <?php echo esc_html( number_format( $user_data->comments->count ) ); ?></span>
						</div>
						<?php
					endif;
					?>
					<?php
					if ( 'yes' === $settings->show_caption ) :
						?>
						<p class="instagram-caption"><?php echo esc_html( $user_data->caption->text ); ?></p>
						<?php
					endif;
					?>
				</div>
				<?php
			}
			?>
			</div>
			<?php
			if ( 'yes' === $settings->show_load_more_button || 'yes' === $settings->show_follow_us_button ) :
				?>
				<div class="instagram-buttons">
				<?php
				if ( isset( $instagram_json->pagination->next_url ) ) {
					$sig_response  = wp_remote_get( esc_url_raw( sprintf( 'https://mediaron.com/instagram/getsig.php?user_id=%s&token=%s&max_id=%s&feed_count=%s', $instagram['user_id'], $instagram['token'], $instagram_json->pagination->next_max_id, $settings->items_show ) ) );
					$sig           = wp_remote_retrieve_body( $sig_response );
					$load_more_url = sprintf( 'https://api.instagram.com/v1/users/%d/media/recent?access_token=%s&sig=%s&count=%d&max_id=%s', $instagram['user_id'], $instagram['token'], $sig, $settings->items_show, $instagram_json->pagination->next_max_id );

					?>
					<?php
					if ( 'yes' === $settings->show_load_more_button ) :
						?>
						<a class="load-more"  data-ajax-url="<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>" data-user-id="<?php echo esc_attr( $instagram['user_id'] ); ?>" data-access-token="<?php echo esc_attr( $instagram['token'] ); ?>" data-feed-count="<?php echo esc_attr( $settings->items_show ); ?>" data-lightbox="<?php echo 'yes' === $settings->load_images_background_image ? 'on' : 'off'; ?>" data-background="<?php echo 'yes' === $settings->lightbox ? 'on' : 'off'; ?>" class="btn btn-default" href="<?php echo esc_url_raw( $load_more_url ); ?>"><?php echo esc_html( $settings->load_more_text ); ?></a>
					<?php endif; ?>
					<?php
				}
				?>
				<?php
				if ( 'yes' === $settings->show_follow_us_button ) :
					?>
					<a class="instagram-follow" href="<?php echo esc_url( $author_instagram_feed_url ); ?>"><i class="fab fa-instagram"></i> <?php echo esc_html( $settings->follow_text ); ?></a>
				<?php endif; ?>
				</div>
				<?php
			endif;
			?>
		</section>
		<?php
	}
	?>
</div>
