<?php
/**
 * EDD Download Count Module.
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 1.3.0
 */

?>
<div class="fl-bbvm-download-count-for-beaverbuilder">
	<?php
	if ( ! empty( $settings->product ) ) {
		global $edd_logs;

		$count = get_post_meta( $settings->product, 'mrbb_edd_download_count', true );
		if ( false === $count ) {
			$count = 0;
		}

		echo number_format( $edd_logs->get_log_count( $settings->product, 'file_download' ) + $count ) . ' ' . esc_html( $settings->download_text );
	}
	?>
</div>
