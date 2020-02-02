<?php
/**
 * Admin Instagram Settings.
 *
 * Admin Instagram for BB Vapor Modules Pro.
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
class BBVM_Admin_Instagram {

	/**
	 * Class constructor
	 */
	public function __construct() {
	}

	/**
	 * Output for the welcome screen.
	 */
	public function output() {
		if ( isset( $_POST['disconnect-instagram'] ) ) {
			check_admin_referer( 'save_bbvm_beaver_builder_options' );
			delete_option( 'bbvm-modules-instagram' );
		}
		if ( isset( $_POST['clear-cache-instagram'] ) ) {
			check_admin_referer( 'save_bbvm_beaver_builder_options' );
			$options = get_option( 'bbvm-modules-instagram' );
			if ( isset( $options['last_cached'] ) ) {
				unset( $options['last_cached'] );
				update_option( 'bbvm-modules-instagram', $options );
			}
			?>
			<div class="notice notice-success"><p><?php esc_html_e( 'Cache cleared!', 'bb-vapor-modules-pro' ); ?></p></div>
			<?php
		}
		?>
		<div id="tab-instagram" class="tab-content">
			<form action="
				<?php
				echo esc_url(
					add_query_arg(
						array(
							'page' => 'bb-vapor-modules-pro',
							'tab'  => 'tab-instagram',
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
							<th scope="row"><label for="bbvm-instagram"><?php esc_html_e( 'Connect to Instagram', 'bb-vapor-modules-pro' ); ?></label>
							</th>
							<td>
							<?php
							$instagram = get_option( 'bbvm-modules-instagram', array() );
							if ( ! isset( $instagram['token'] ) ) {
								$instagram['token'] = isset( $_GET['token'] ) ? sanitize_text_field( wp_unslash( $_GET['token'] ) ) : '';
							}
							if ( ! isset( $instagram['token'] ) || empty( $instagram['token'] ) ) {
								$instagram_options = array(
									'hash' => wp_generate_password( 12 ),
								);
								update_option( 'bbvm-modules-instagram', $instagram_options );
								$instagram          = get_option( 'bbvm-modules-instagram', array() );
								$site_redirect_link = ( isset( $_SERVER['HTTPS'] ) && 'on' === $_SERVER['HTTPS'] ? "https" : "http" ) . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" . '?hash=' . sanitize_text_field( $instagram['hash'] ); // phpcs:ignore

								$state         = base64_encode( $site_redirect_link ); // phpcs:ignore
								$redirect_url  = 'https://mediaron.com/instagram/index.php';
								$instagram_url = sprintf( 'https://api.instagram.com/oauth/authorize/?client_id=%s&redirect_uri=%s&state=%s&response_type=code', '8dba23ca2c1c45509c32343db0d37a96', $redirect_url, $state );
								?>
								<a class="button button-primary" href="<?php echo esc_url_raw( $instagram_url ); ?>"><?php esc_html_e( 'Connect to Instagram', 'bb-vapor-modules-pro' ); ?></a>
								<?php
							} else {
								$instagram_token = isset( $_GET['token'] ) ? sanitize_text_field( wp_unslash( $_GET['token'] ) ) : $instagram['token'];
								$user_id         = isset( $_GET['user_id'] ) ? sanitize_text_field( wp_unslash( $_GET['user_id'] ) ) : $instagram['user_id'];
								update_option(
									'bbvm-modules-instagram',
									array(
										'token'       => $instagram_token,
										'user_id'     => $user_id,
										'last_cached' => time(),
									)
								);
								?>
								<div class="instagram-status">
								<button class="button button-primary"><?php esc_html_e( 'Connected', 'bb-vapor-modules-pro' ); ?></button>&nbsp;<input type="submit" class="button button-secondary delete" value="<?php echo esc_html__( 'Disconnect', 'bb-vapor-modules-pro' ); ?>" name="disconnect-instagram" />&nbsp;<input type="submit" class="button button-secondary" value="<?php echo esc_html__( 'Clear Cache', 'bb-vapor-modules-pro' ); ?>" name="clear-cache-instagram" />
								</div>
								<?php
							}
							?>
							</td>
						</tr>
					</tbody>
				</table>
			</form>
		</div>
		<?php
	}
}
