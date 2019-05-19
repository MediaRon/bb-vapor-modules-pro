<div class="fl-bbvm-instagram-for-beaverbuilder">
	<?php
	// Get cache if possible
	$instagram = get_option( 'bbvm-modules-instagram', array() );
	if( ! isset( $instagram['token'] ) ) {
		?>
		<p><?php _e( 'Please connect to Instagram in the plugin settings.', 'bb-vapor-modules' ); ?>&nbsp;<a href="<?php echo esc_url( add_query_arg( array( 'page' => 'bbvm-for-beaver-builder' ), admin_url( 'options-general.php' ) ) ); ?>"><?php _e( 'Connect', 'bb-vapor-modules' ); ?></a>
		<?php
	} else{
		$instagram_json = isset( $instagram['json'] ) ? $instagram['json'] : '';
		$time_now = time();
		$break_cache = false;
		if (($time_now - ( isset( $instagram['last_cached'] ) ? $instagram['last_cached'] : 0 )  > 3600 )) {
			$break_cache = true;
		}
		if ( empty( $instagram_json ) || $break_cache ) {
			$sig = bbvm_instagram_get_sig( $instagram['user_id'], $instagram['token'], false, $settings->items_show );
			$ch = curl_init();
			curl_setopt( $ch, CURLOPT_URL, sprintf( 'https://api.instagram.com/v1/users/%d/media/recent?access_token=%s&sig=%s&count=%d', $instagram['user_id'], $instagram['token'], $sig, $settings->items_show ) );
			curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
			$response = curl_exec($ch);
			$instagram['json'] = $response;
			$instagram['last_cached'] = time();
			update_option( 'bbvm-modules-instagram', $instagram );
			$instagramJSON = json_decode( $response );
		} else {
			$instagramJSON = json_decode( $instagram_json );
		}
		?>
		<section class="fl-node-instagram">
			<?php
			// Get profile information
			$author_avatar = $author_full_name = $author_instagram_feed_url = '';
			foreach( $instagramJSON->data as $key => $user_data ) {
				$author_full_name = $user_data->user->full_name;
				$author_avatar = $user_data->user->profile_picture;
				$author_instagram_feed_url = sprintf( 'https://instagram.com/%s', $user_data->user->username );
				break;
			}
			?>
			<div class="instagram-author">
			<a href="<?php echo esc_url( $author_instagram_feed_url ); ?>"><img src="<?php echo esc_url( $author_avatar ); ?>" alt="<?php echo esc_attr( $author_full_name ); ?>" />&nbsp;<?php echo esc_html( $author_full_name ); ?></a>
			</div>
			<div class="fl-node-instafeed <?php echo ('card' === $settings->layout) ? 'instagram-card-wrapper': 'instagram-masonry-wrapper'; ?>">
			<?php
			foreach( $instagramJSON->data as $key => $user_data ) {
				?>
				<div class="instagram-card">
					<div class="instagram-image">
						<a href="<?php echo esc_url( $user_data->link ); ?>"><img src="<?php echo esc_url( $user_data->images->standard_resolution->url ); ?>" /></a>
					</div>
					<?php
					if( 'yes' === $settings->show_likes_comments ):
					?>
					<div class="instagram-meta">
						<span class="instagram-likes">Likes: <?php echo esc_html( number_format( $user_data->likes->count ) ); ?></span><span class="instagram-comments"><?php echo esc_html__( 'Comments:', 'bb-vapor-modules' ); ?> <?php echo esc_html( number_format( $user_data->comments->count ) ); ?></span>
					</div>
					<?php
					endif;
					?>
					<?php
					if( 'yes' === $settings->show_caption ):
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
			if( 'yes' === $settings->show_load_more_button || 'yes' === $settings->show_follow_us_button ):
			?>
			<div class="instagram-buttons">
			<?php
			if( isset( $instagramJSON->pagination->next_url ) ) {
				$sig = bbvm_instagram_get_sig( $instagram['user_id'], $instagram['token'], $instagramJSON->pagination->next_max_id, $settings->items_show );
				$load_more_url = sprintf( 'https://api.instagram.com/v1/users/%d/media/recent?access_token=%s&sig=%s&count=%d&max_id=%s', $instagram['user_id'], $instagram['token'], $sig, $settings->items_show, $instagramJSON->pagination->next_max_id );

				?>
				<?php
				if ( 'yes' === $settings->show_load_more_button ):
				?>
				<a class="load-more"  data-ajax-url="<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>" data-user-id="<?php echo esc_attr( $instagram['user_id'] ) ?>" data-access-token="<?php echo esc_attr( $instagram['token'] ); ?>" data-feed-count="<?php echo esc_attr( $settings->items_show ); ?>" class="btn btn-default" href="<?php echo $load_more_url ?>"><?php echo esc_html( $settings->load_more_text ); ?></a>
				<?php endif; ?>
				<?php
			}
			?>
			<?php
				if ( 'yes' === $settings->show_follow_us_button ):
				?>
			<a class="instagram-follow" href="<?php echo esc_url( $author_instagram_feed_url ); ?>"><i class="<?php echo $settings->follow_icon; ?>"></i> <?php echo esc_html( $settings->follow_text ); ?></a>
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