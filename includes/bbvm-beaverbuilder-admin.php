<?php
if (!defined('ABSPATH')) die('No direct access.');
class BBVapor_BeaverBuilder_Admin {

	/**
	 * Holds the slug to the admin panel page
	 *
	 * @since 1.0.0
	 * @static
	 * @var string $slug
	 */
	private static $slug = 'bb-vapor-modules';

	/**
	 * Holds the URL to the admin panel page
	 *
	 * @since 1.0.0
	 * @static
	 * @var string $url
	 */
	private static $url = '';

	public function __construct() {
		add_action( 'init', array( $this, 'init' ) );
	}

	/**
	 * Initializes admin menus, plugin settings links.
	 *
	 * @since 1.0.0
	 * @access public
	 * @see __construct
	 */
	public function init() {

		// Add settings link
		add_action( 'plugin_action_links_' . BBVAPOR_BEAVER_BUILDER_SLUG, array( $this, 'plugin_settings_link' ) );
		add_action( 'admin_menu', array( $this, 'register_sub_menu') );

		add_action( 'after_plugin_row_' . BBVAPOR_BEAVER_BUILDER_SLUG, array( $this, 'after_plugin_row' ), 10, 3 );

	}

	/**
	 * Adds license information
	 *
	 * @since 1.4.1.
	 * @access public
	 * @see __construct
	 * @param string $plugin_File Plugin file
	 * @param array  $plugin_data Array of plugin data
	 * @param string $status      If plugin is active or not
	 * @return null HTML Settings
	 */
	public function after_plugin_row( $plugin_file, $plugin_data, $status ) {
		echo sprintf( '<tr class="active"><td colspan="3"><a href="%s">%s</a></td></tr>', esc_url( 'https://bbvapormodules.com' ), __( 'Update to Pro for more modules!', 'bb-vapor-modules' ) );
	}

	/**
	 * Initializes admin menus
	 *
	 * @since 1.0.0
	 * @access public
	 * @see init
	 */
	public function register_sub_menu() {
		$hook = '';

		$hook = add_submenu_page(
			'options-general.php', __( 'Vapor Modules', 'bb-vapor-modules' ), __( 'Vapor Modules', 'bb-vapor-modules' ), 'manage_options', 'bb-vapor-modules', array( $this, 'admin_page' )
		);
	}

	/**
	 * Output admin menu
	 *
	 * @since 1.0.0
	 * @access public
	 * @see register_sub_menu
	 */
	public function admin_page() {
		if( isset( $_POST['disconnect-instagram'] ) ) {
			check_admin_referer( 'save_bbvm_beaver_builder_options' );
			delete_option( 'bbvm-modules-instagram' );
		}
		if( isset( $_POST['clear-cache-instagram'] ) ) {
			check_admin_referer( 'save_bbvm_beaver_builder_options' );
			$options = get_option( 'bbvm-modules-instagram' );
			if ( isset( $options[ 'last_cached' ] ) ) {
				unset( $options[ 'last_cached' ] );
				update_option( 'bbvm-modules-instagram', $options );
			}
			?>
			<div class="notice notice-success"><p><?php esc_html_e( 'Cache cleared!', 'bb-vapor-modules' ); ?></p></div>
			<?php
		}
		?>
		<div class="wrap">
			<form action="<?php echo esc_url( add_query_arg( array( 'page' => 'bb-vapor-modules' ), admin_url( 'options-general.php' ) ) ); ?>" method="POST">
				<?php wp_nonce_field('save_bbvm_beaver_builder_options'); ?>
				<h2><?php esc_html_e( 'Vapor Modules for Beaver Builder', 'breadcrumbs-for-beaver-builder' ); ?></h2>
				<table class="form-table">
					<tbody>
						<tr>
							<th scope="row"><label for="bbvm-instagram"><?php esc_html_e( 'Connect to Instagram', 'bb-vapor-modules' ); ?></label>
							</th>
							<td>
							<?php
							$instagram = get_option( 'bbvm-modules-instagram', array() );
							if( ! isset( $instagram['token'] ) ) {
								$instagram['token'] = isset( $_GET['token'] ) ? sanitize_text_field( $_GET['token'] ) : '';
							}
							if( !isset( $instagram['token'] ) || empty( $instagram['token'] ) ) {
								$instagram_options = array(
									'hash' => wp_generate_password(12)
								);
								update_option( 'bbvm-modules-instagram', $instagram_options );
								$instagram = get_option( 'bbvm-modules-instagram', array() );
								$siteRedirectLink = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" . '?hash=' . sanitize_text_field( $instagram['hash'] );

								$state = base64_encode( $siteRedirectLink );
								$redirect_url = 'https://mediaron.com/instagram/index.php';
								$instagram_url = sprintf( 'https://api.instagram.com/oauth/authorize/?client_id=%s&redirect_uri=%s&state=%s&response_type=code', '8dba23ca2c1c45509c32343db0d37a96', $redirect_url, $state );
								?>
								<a class="button button-primary" href="<?php echo esc_url_raw( $instagram_url ); ?>"><?php _e( 'Connect to Instagram', 'bb-vapor-modules' ); ?></a>
								<?php
							} else {
								$instagram_token = isset( $_GET['token'] ) ? sanitize_text_field( $_GET['token'] ) : $instagram['token'];
								$user_id = isset( $_GET['user_id'] ) ? sanitize_text_field( $_GET['user_id'] ) : $instagram['user_id'];
								update_option( 'bbvm-modules-instagram', array(
									'token'   => $instagram_token,
									'user_id' => $user_id,
									'last_cached' => time()
								) );
								?>
								<div class="instagram-status">
								<button class="button button-primary"><?php _e( 'Connected', 'bb-vapor-modules' ); ?></button>&nbsp;<input type="submit" class="button button-secondary delete" value="<?php echo esc_html__( 'Disconnect', 'bb-vapor-modules' ); ?>" name="disconnect-instagram" />&nbsp;<input type="submit" class="button button-secondary" value="<?php echo esc_html__( 'Clear Cache', 'bb-vapor-modules' ); ?>" name="clear-cache-instagram" />
								</div>
								<?php
							}
							?>
							</td>
						</tr>
						<tr>
							<th scope="row"><label for="bbvm-pro"><?php esc_html_e( 'Upgrade', 'bb-vapor-modules' ); ?></label>
							</th>
							<td>
								<a class="button button-secondary" href="https://bbvapormodules.com" target="_blank"><?php esc_html_e( 'Upgrade to Pro for more modules', 'bb-vapor-modules' ); ?></a>
							</td>
						</tr>
					</tbody>
				</table>
			</form>
		</div>
		<?php
	}

	/**
	 * Adds plugin settings page link to plugin links in WordPress Dashboard Plugins Page
	 *
	 * @since 1.0.0
	 * @access public
	 * @see __construct
	 * @param array $settings Uses $prefix . "plugin_action_links_$plugin_file" action
	 * @return array Array of settings
	 */
	public function plugin_settings_link( $settings ) {
		$admin_anchor = sprintf( '<a href="%s">%s</a>', esc_url($this->get_url()), esc_html__( 'Settings', 'bb-vapor-modules' ) );
		if (! is_array( $settings  )) {
			return array( $admin_anchor );
		} else {
			return array_merge( array( $admin_anchor ), $settings) ;
		}
	}

	/**
	 * Return the URL to the admin panel page.
	 *
	 * Return the URL to the admin panel page.
	 *
	 * @since 1.0.0
	 * @access static
	 *
	 * @return string URL to the admin panel page.
	 */
	public static function get_url() {
		$url = self::$url;
		if ( empty( $url ) ) {
			$url = add_query_arg(array( 'page' => self::$slug ), admin_url('options-general.php'));
			self::$url = $url;
		}
		return $url;
	}
}