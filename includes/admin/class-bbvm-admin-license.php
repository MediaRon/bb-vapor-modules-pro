<?php
/**
 * Admin License Settings.
 *
 * Admin License for BB Vapor Modules Pro.
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules Pro
 * @since 2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'No direct access.' );
}

/**
 * Welcome Admin Screen.
 */
class BBVM_Admin_License {

	/**
	 * Class constructor
	 */
	public function __construct() {
	}

	/**
	 * Output for the license screen.
	 */
	public function output() {
		if ( isset( $_POST['submit'] ) && isset( $_POST['options'] ) ) {
			check_admin_referer( 'save_bbvm_beaver_builder_options' );

			// Check for valid license.
			$store_url  = 'https://bbvapormodules.com';
			$api_params = array(
				'edd_action' => 'activate_license',
				'license'    => sanitize_text_field( wp_unslash( isset( $_POST['options']['license'] ) ? $_POST['options']['license'] : '' ) ),
				'item_name'  => rawurlencode( 'BB Vapor Modules Pro' ),
				'url'        => home_url(),
			);
			// Call the custom API.
			$response = wp_remote_post(
				$store_url,
				array(
					'timeout'   => 15,
					'sslverify' => false,
					'body'      => $api_params,
				)
			);

			// make sure the response came back okay.
			if ( is_wp_error( $response ) || 200 !== wp_remote_retrieve_response_code( $response ) ) {

				if ( is_wp_error( $response ) ) {
					$license_message = $response->get_error_message();
				} else {
					$license_message = __( 'An error occurred, please try again.', 'bb-vapor-modules-pro' );
				}
			} else {

				$license_data = json_decode( wp_remote_retrieve_body( $response ) );

				if ( false === $license_data->success ) {
					delete_site_option( 'bbvm_for_beaver_builder_license_status' );
					switch ( $license_data->error ) {
						case 'expired':
							$license_message = sprintf(
								/* Translators: %s is a date format placeholder */
								__( 'Your license key expired on %s.', 'bb-vapor-modules-pro' ),
								date_i18n( get_option( 'date_format' ), strtotime( $license_data->expires, current_time( 'timestamp' ) ) ) // phpcs:ignore
							);
							break;

						case 'disabled':
						case 'revoked':
							$license_message = __( 'Your license key has been disabled.', 'bb-vapor-modules-pro' );
							break;

						case 'missing':
							$license_message = __( 'Invalid license.', 'bb-vapor-modules-pro' );
							break;
						case 'invalid':
						case 'site_inactive':
							$license_message = __( 'Your license is not active for this URL.', 'bb-vapor-modules-pro' );
							break;

						case 'item_name_mismatch':
							/* Translators: %s is the plugin name */
							$license_message = sprintf( __( 'This appears to be an invalid license key for %s.', 'bb-vapor-modules-pro' ), 'BB Vapor Modules Pro' );
							break;

						case 'no_activations_left':
							$license_message = __( 'Your license key has reached its activation limit.', 'bb-vapor-modules-pro' );
							break;
						default:
							$license_message = __( 'An error occurred, please try again.', 'bb-vapor-modules-pro' );
							break;
					}
				}
				if ( empty( $license_message ) ) {
					update_site_option( 'bbvm_for_beaver_builder_license_status', $license_data->license );
					update_site_option( 'bbvm_for_beaver_builder_license', sanitize_text_field( wp_unslash( $_POST['options']['license'] ) ) );
				}
			}
		}
		$license_status = get_site_option( 'bbvm_for_beaver_builder_license_status', false );
		$license        = get_site_option( 'bbvm_for_beaver_builder_license', '' );
		?>
		<div id="tab-license" class="tab-content">
			<form action="
			<?php
			echo esc_url(
				add_query_arg(
					array(
						'page' => 'vapor-modules',
						'tab'  => 'tab-license',
					),
					admin_url( 'options-general.php' )
				)
			);
			?>
			" method="POST">
			<?php wp_nonce_field( 'save_bbvm_beaver_builder_options' ); ?>
			<table class="form-table">
				<tbody>
				<tr>
						<th scope="row"><label for="bbvm-license"><?php esc_html_e( 'Enter Your License', 'bb-vapor-modules-pro' ); ?></label></th>
						<td>
							<input id="bbvm-license" class="regular-text" type="text" value="<?php echo esc_attr( $license ); ?>" name="options[license]" /><br />
							<?php
							if ( false === $license || empty( $license ) ) {
								?>
								<div class="notice notice-error"><p><strong><?php esc_html_e( 'Please enter your license key.', 'bb-vapor-modules-pro' ); ?></strong></p></div>
								<?php
							} else {
								?>
								<div class="notice notice-success"><p><strong><?php esc_html_e( 'Your license is valid and you will now receive update notifications.', 'bb-vapor-modules-pro' ); ?></strong></p></div>
								<?php
							}
							?>
							<?php
							if ( ! empty( $license_message ) ) {
								printf( '<div class="updated error"><p><strong>%s</p></strong></div>', esc_html( $license_message ) );
							}
							?>
						</td>
					</tr>
				</tbody>
			</table>
			<?php submit_button( __( 'Update License', 'bb-vapor-modules-pro' ) ); ?>
			</form>
		</div>
		<?php
	}
}
