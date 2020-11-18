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
			<div><img style="max-width: 200px;" src="<?php echo esc_url( apply_filters( 'bbvm_whitelabel_logo', BBVAPOR_PRO_BEAVER_BUILDER_URL . 'img/logo.png' ) ); ?>" alt="BB Vapor Modules Pro" /></div>
			<h2><?php echo esc_html( apply_filters( 'bbvm_whitelabel_admin_welcome', esc_html__( 'Welcome to BB Vapor Modules for Beaver Builder', 'bb-vapor-modules-pro' ) ) ); ?></h2>
			<h3><?php esc_html_e( 'Disable/Enable Modules', 'bb-vapor-modules-pro' ); ?></h3>
			<?php
			$options = get_option( 'bbvm_modules' );
			$modules = BBVapor_BeaverBuilder_Admin::modules();
			?>
			<form method="POST" action="
				<?php
				echo esc_url(
					add_query_arg(
						array(
							'page' => 'bb-vapor-modules-pro',
							'tab'  => 'tab-welcome',
						),
						admin_url( 'options-general.php' )
					)
				);
				?>
			">
			<p>
				<input type="radio" name="bbvm-options-toggle" id="toggle-on" /> <label for="toggle-on"><?php esc_html_e( 'Toggle All On', 'bb-vapor-modules-pro' ); ?></label><br />
				<input type="radio" name="bbvm-options-toggle" id="toggle-off" /> <label for="toggle-off"><?php esc_html_e( 'Toggle All Off', 'bb-vapor-modules-pro' ); ?></label>
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
