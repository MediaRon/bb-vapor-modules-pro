<?php
/**
 * Admin Welcome Settings.
 *
 * Admin welcome for BB Vapor Modules Pro.
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
class BBVM_Admin_Welcome {

	/**
	 * Class constructor
	 */
	public function __construct() {
	}

	/**
	 * Output for the welcome screen.
	 */
	public function output() {
		if ( isset( $_POST['submit'] ) && isset( $_POST['modules'] ) ) {
			check_admin_referer( 'save_bbvm_beaver_builder_options' );
			if ( ! current_user_can( 'manage_options' ) ) {
				return;
			}
			$module_options = array();
			foreach ( filter_input( INPUT_POST, 'modules', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY ) as $key => $module ) {
				$module_options[ $key ] = $module;
			}
			update_option( 'bbvm_modules', $module_options );
			?>
			<div class="notice notice-success"><p><?php esc_html_e( 'Settings Saved!', 'bb-vapor-modules-pro' ); ?></p></div>
			<?php
		}
		?>
		<div id="tab-welcome" class="tab-content">
			<h2><?php esc_html_e( 'Disable/Enable Modules', 'bb-vapor-modules-pro' ); ?></h2>
			<?php
			$options = get_option( 'bbvm_modules' );
			$modules = BBVapor_BeaverBuilder_Admin::modules();
			?>
			<form method="POST" action="
				<?php
				echo esc_url(
					add_query_arg(
						array(
							'page' => 'vapor-modules',
							'tab'  => 'tab-welcome',
						),
						admin_url( 'options-general.php' )
					)
				);
				?>
			">
			<p>
				<input type="radio" name="bbvm-options-toggle" id="bbvm-toggle-on" /> <label for="bbvm-toggle-on"><?php esc_html_e( 'Toggle All On', 'bb-vapor-modules-pro' ); ?></label><br />
				<input type="radio" name="bbvm-options-toggle" id="bbvm-toggle-off" /> <label for="bbvm-toggle-off"><?php esc_html_e( 'Toggle All Off', 'bb-vapor-modules-pro' ); ?></label>
			</p>
			<?php
			wp_nonce_field( 'save_bbvm_beaver_builder_options' );
			echo '<ul>';
			foreach ( $modules as $key => $module ) {
				printf(
					'<li><label><input type="hidden" name="modules[%1$s]" value="off" /><input type="checkbox" name="modules[%1$s]" %2$s value="on" />%3$s</label>',
					esc_attr( $key ),
					checked( 'on', $options && isset( $options[ $key ] ) ? esc_attr( $options[ $key ] ) : esc_attr( 'on' ), false ),
					esc_attr( $module )
				);
			}
			echo '</ul>';
			submit_button( __( 'Save Options', 'bb-vapor-modules-pro' ) );
			?>
			</form>
		</div>
		<?php
	}
}
