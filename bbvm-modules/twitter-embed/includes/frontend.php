<div class="fl-bbvm-twitter-embed-for-beaverbuilder">
	<div class="bbvm-tweet-container">
		<?php
		if ( ! empty( $settings->tweet ) && filter_var( $settings->tweet, FILTER_VALIDATE_URL ) ) :
			$args = add_query_arg(
				array(
					'url'         => rawurlencode( $settings->tweet ),
					'maxwidth'    => absint( $settings->size ),
					'align'       => $settings->align,
					'lang'        => $settings->lang,
					'dnt'         => true,
					'hide_media'  => 'yes' === $settings->hide_media ? true : false,
					'hide_thread' => 'yes' === $settings->hide_thread ? true : false,
					'link_color'  => rawurlencode( BBVapor_Modules_Pro::get_color( $settings->link_color ) ),
					'theme'       => $settings->twitter_theme,
					'related'     => $settings->related,

				),
				'https://publish.twitter.com/oembed'
			);
			$json_decoded = json_decode( wp_remote_retrieve_body( wp_remote_get( esc_url_raw( $args ) ) ) );
			echo $json_decoded->html; // phpcs:ignore
		endif;
		?>
	</div>
</div>
