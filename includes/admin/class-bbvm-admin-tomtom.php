<?php
/**
 * Admin TomTom Settings.
 *
 * Admin TomTom for BB Vapor Modules Pro.
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules Pro
 * @since 2.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'No direct access.' );
}

/**
 * Welcome Admin Screen.
 */
class BBVM_Admin_TomTom {

	/**
	 * Class constructor
	 */
	public function __construct() {
	}

	/**
	 * Output for the whitelabel screen.
	 */
	public function output() {
		if ( isset( $_POST['submit'] ) && isset( $_POST['tomtom'] ) ) {
			check_admin_referer( 'save_bbvm_beaver_builder_options' );
			$tomtom_api_key = sanitize_text_field( wp_unslash( isset( $_POST['tomtom'] ) ? $_POST['tomtom'] : '' ) );
			update_option( 'bbvm_tomtom', $tomtom_api_key );
			?>
			<div class="notice notice-success"><p><?php esc_html_e( 'TomTom API Key Saved.', 'bb-vapor-modules-pro' ); ?></p></div>
			<?php
		}
		?>
		<div id="tab-tomtom" class="tab-content">
			<form method="POST" action="
			<?php
			echo esc_url(
				add_query_arg(
					array(
						'page' => 'bb-vapor-modules-pro',
						'tab'  => 'tab-tomtom',
					),
					admin_url( 'options-general.php' )
				)
			);
			?>
			">
			<?php
			wp_nonce_field( 'save_bbvm_beaver_builder_options' );
			$tomtom = get_option( 'bbvm_tomtom', '' );
			?>
			<table class="form-table">
				<tbody>
					<tr>
						<th scope="row"><label for="bbvm-tomtom"><?php esc_html_e( 'TomTom API Key', 'bb-vapor-modules-pro' ); ?></label></th>
						<td><input type="text" class="regular-text" id="bbvm-tomtom" value="<?php echo esc_attr( $tomtom ); ?>" name="tomtom" /><p class="description"><a target="_blank" href="https://developer.tomtom.com/user/register"><?php esc_html_e( 'Register and retrieve a TomTom API Key.', 'bb-vapor-modules-pro' ); ?></a></p></td>
					</tr>
				</tbody>
			</table>
			<p>
			<?php
			submit_button( __( 'Save Options', 'bb-vapor-modules-pro' ), 'primary', 'submit', false );
			?>
			</p>
			</form>
		</div>
		<?php
	}
}
