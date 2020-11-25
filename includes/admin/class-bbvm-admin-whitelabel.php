<?php
/**
 * Admin Whitelabel Settings.
 *
 * Admin whitelabel for BB Vapor Modules Pro.
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
class BBVM_Admin_Whitelabel {

	/**
	 * Class constructor
	 */
	public function __construct() {
	}

	/**
	 * Output for the whitelabel screen.
	 */
	public function output() {
		if ( isset( $_POST['submit'] ) && isset( $_POST['whitelabel'] ) ) {
			check_admin_referer( 'save_bbvm_beaver_builder_options' );
			$whitelabel = array();
			foreach ( filter_input( INPUT_POST, 'whitelabel', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY ) as $key => $option ) {
				$whitelabel[ $key ] = sanitize_text_field( $option );
			}
			update_site_option( 'bbvm_whitelabel', $whitelabel );
			?>
			<div class="notice notice-success"><p><?php esc_html_e( 'White Label Settings Saved!', 'bb-vapor-modules-pro' ); ?></p></div>
			<?php
		}
		if ( isset( $_POST['reset'] ) && isset( $_POST['whitelabel'] ) ) {
			check_admin_referer( 'save_bbvm_beaver_builder_options' );
			delete_site_option( 'bbvm_whitelabel' );
			?>
			<div class="notice notice-success"><p><?php esc_html_e( 'White Label Settings Have Been Reset!', 'bb-vapor-modules-pro' ); ?></p></div>
			<?php
		}
		?>
		<?php if ( ! defined( 'BBVM_HIDE_WHITELABEL' ) ) : ?>
			<div id="tab-whitelabel" class="tab-content">
				<form method="POST" action="
				<?php
				echo esc_url(
					add_query_arg(
						array(
							'page' => 'vapor-modules',
							'tab'  => 'tab-whitelabel',
						),
						admin_url( 'options-general.php' )
					)
				);
				?>
				">
				<?php
				wp_nonce_field( 'save_bbvm_beaver_builder_options' );
				$whitelabel = get_site_option( 'bbvm_whitelabel' );
				?>
				<table class="form-table">
					<tbody>
						<tr>
							<th scope="row"><label for="bbvm-small-logo"><?php esc_html_e( 'Small Logo', 'bb-vapor-modules-pro' ); ?></label></th>
							<td><input type="text" class="regular-text" id="bbvm-small-logo" value="<?php echo esc_url( isset( $whitelabel['small_logo'] ) ? $whitelabel['small_logo'] : BBVAPOR_PRO_BEAVER_BUILDER_URL . 'img/favicon.png' ); ?>" name="whitelabel[small_logo]" placeholder="https://" /><p class="description"><?php esc_html_e( 'Logo should be square.', 'bb-vapor-modules-pro' ); ?></p></td>
						</tr>
						<tr>
							<th scope="row"><label for="bbvm-large-logo"><?php esc_html_e( 'Large Logo', 'bb-vapor-modules-pro' ); ?></label></th>
							<td><input type="text" class="regular-text" id="bbvm-large-logo" value="<?php echo esc_url( isset( $whitelabel['large_logo'] ) ? $whitelabel['large_logo'] : BBVAPOR_PRO_BEAVER_BUILDER_URL . 'img/logo.png' ); ?>" name="whitelabel[large_logo]" placeholder="https://" /><p class="description"><?php esc_html_e( 'This logo will show up on the Welcome tab.', 'bb-vapor-modules-pro' ); ?></p></td>
						</tr>
						<tr>
							<th scope="row"><label for="bbvm-admin-label"><?php esc_html_e( 'Admin label', 'bb-vapor-modules-pro' ); ?></label></th>
							<td><input type="text" class="regular-text" id="bbvm-admin-label" value="<?php echo isset( $whitelabel['admin_label'] ) ? esc_attr( $whitelabel['admin_label'] ) : 'Vapor Modules for Beaver Builder'; ?>" name="whitelabel[admin_label]" placeholder="Vapor Modules for Beaver Builder" /><p class="description"><?php esc_html_e( 'This will replace the admin label.', 'bb-vapor-modules-pro' ); ?></p></td>
						</tr>
						<tr>
							<th scope="row"><label for="bbvm-admin-welcome"><?php esc_html_e( 'Welcome Label', 'bb-vapor-modules-pro' ); ?></label></th>
							<td><input type="text" class="regular-text" id="bbvm-admin-welcome" value="<?php echo isset( $whitelabel['welcome_label'] ) ? esc_attr( $whitelabel['welcome_label'] ) : 'Welcome to BB Vapor Modules for Beaver Builder'; ?>" name="whitelabel[welcome_label]" placeholder="Welcome to BB Vapor Modules for Beaver Builder" /><p class="description"><?php esc_html_e( 'This will replace the welcome label on the Welcome tab.', 'bb-vapor-modules-pro' ); ?></p></td>
						</tr>
						<tr>
							<th scope="row"><label for="bbvm-admin-menu-title"><?php esc_html_e( 'Menu Title', 'bb-vapor-modules-pro' ); ?></label></th>
							<td><input type="text" class="regular-text" id="bbvm-admin-menu-title" value="<?php echo isset( $whitelabel['menu_title'] ) ? esc_attr( $whitelabel['menu_title'] ) : 'Vapor Modules'; ?>" name="whitelabel[menu_title]" placeholder="Vapor Modules" /><p class="description"><?php esc_html_e( 'This will replace the menu label that shows up in the Settings section.', 'bb-vapor-modules-pro' ); ?></p></td>
						</tr>
						<tr>
							<th scope="row"><label for="bbvm-plugin-name"><?php esc_html_e( 'Plugin Name', 'bb-vapor-modules-pro' ); ?></label></th>
							<td><input type="text" class="regular-text" id="bbvm-plugin-name" value="<?php echo isset( $whitelabel['plugin_name'] ) ? esc_attr( $whitelabel['plugin_name'] ) : 'BB Vapor Modules Pro'; ?>" name="whitelabel[plugin_name]" placeholder="BB Vapor Modules Pro" /><p class="description"><?php esc_html_e( 'This will replace the plugin name.', 'bb-vapor-modules-pro' ); ?></p></td>
						</tr>
						<tr>
							<th scope="row"><label for="bbvm-plugin-author"><?php esc_html_e( 'Plugin Author', 'bb-vapor-modules-pro' ); ?></label></th>
							<td><input type="text" class="regular-text" id="bbvm-plugin-author" value="<?php echo isset( $whitelabel['plugin_author'] ) ? esc_attr( $whitelabel['plugin_author'] ) : 'Ronald Huereca'; ?>" name="whitelabel[plugin_author]" placeholder="Ronald Huereca" /><p class="description"><?php esc_html_e( 'This will replace the plugin author name.', 'bb-vapor-modules-pro' ); ?></p></td>
						</tr>
						<tr>
							<th scope="row"><label for="bbvm-plugin-author-url"><?php esc_html_e( 'Plugin Author URL', 'bb-vapor-modules-pro' ); ?></label></th>
							<td><input type="text" class="regular-text" id="bbvm-plugin-author-url" value="<?php echo isset( $whitelabel['plugin_author_url'] ) ? esc_attr( $whitelabel['plugin_author_url'] ) : 'https://mediaron.com'; ?>" name="whitelabel[plugin_author_url]" placeholder="https://mediaron.com" /><p class="description"><?php esc_html_e( 'This will replace the plugin author name.', 'bb-vapor-modules-pro' ); ?></p></td>
						</tr>
						<tr>
							<th scope="row"><label for="bbvm-plugin-description"><?php esc_html_e( 'Plugin Description', 'bb-vapor-modules-pro' ); ?></label></th>
							<td><input type="text" class="regular-text" id="bbvm-plugin-description" value="<?php echo isset( $whitelabel['plugin_author_description'] ) ? esc_attr( $whitelabel['plugin_author_description'] ) : 'A growing selection of modules for Beaver Builder.'; ?>" name="whitelabel[plugin_author_description]" placeholder="A growing selection of modules for Beaver Builder." /><p class="description"><?php esc_html_e( 'This will replace the plugin description.', 'bb-vapor-modules-pro' ); ?></p></td>
						</tr>
						<tr>
							<th scope="row"><label for="bbvm-plugin-site"><?php esc_html_e( 'Plugin Site URL', 'bb-vapor-modules-pro' ); ?></label></th>
							<td><input type="text" class="regular-text" id="bbvm-plugin-site" value="<?php echo isset( $whitelabel['plugin_site'] ) ? esc_attr( $whitelabel['plugin_site'] ) : 'https://bbvapormodules.com'; ?>" name="whitelabel[plugin_site]" placeholder="https://bbvapormodules.com" /><p class="description"><?php esc_html_e( 'This will replace the plugin site URL.', 'bb-vapor-modules-pro' ); ?></p></td>
						</tr>
						<tr>
							<th scope="row"><label for="bbvm-plugin-category"><?php esc_html_e( 'Beaver Builder Category Name', 'bb-vapor-modules-pro' ); ?></label></th>
							<td><input type="text" class="regular-text" id="bbvm-plugin-category" value="<?php echo isset( $whitelabel['plugin_bb_category'] ) ? esc_attr( $whitelabel['plugin_bb_category'] ) : 'Vapor'; ?>" name="whitelabel[plugin_bb_category]" placeholder="Vapor" /><p class="description"><?php esc_html_e( 'This will replace the Beaver Builder category name.', 'bb-vapor-modules-pro' ); ?></p></td>
						</tr>
					</tbody>
				</table>
				<p>
				<?php
				submit_button( __( 'Save Options', 'bb-vapor-modules-pro' ), 'primary', 'submit', false );
				echo '&nbsp;&nbsp;';
				submit_button( __( 'Reset', 'bb-vapor-modules-pro' ), 'secondary', 'reset', false );
				?>
				</p>
				<p class="description"><?php esc_html_e( 'Define the constant BBVM_HIDE_WHITELABEL in your wp-config.php or functions.php file to hide the Whitelabel settings from clients.', 'bb-vapor-modules-pro' ); ?></p>
				</form>
			</div>
			<?php endif; ?>
		<?php
	}
}
