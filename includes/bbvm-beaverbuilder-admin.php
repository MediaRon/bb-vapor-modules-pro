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
	private static $slug = 'bb-vapor-modules-pro';

	/**
	 * Holds the URL to the admin panel page
	 *
	 * @since 1.0.0
	 * @static
	 * @var string $url
	 */
	private static $url = '';

	public function __construct() {
		add_action( 'admin_init', array( $this, 'init' ) );

		add_action( 'admin_menu', array( $this, 'register_sub_menu') );
	}

	/**
	 * Initializes admin menus, plugin settings links.
	 *
	 * @since 1.0.0
	 * @access public
	 * @see __construct
	 */
	public function init() {

		require_once BBVAPOR_PRO_BEAVER_BUILDER_DIR . 'includes/EDD_SL_Plugin_Updater.php';
		$license = get_site_option( 'bbvm_for_beaver_builder_license', false );
		if ( false !== $license ) {

			// setup the updater
			$edd_updater = new BBVM_EDD_SL_Plugin_Updater( 'https://bbvapormodules.com', BBVAPOR_PRO_BEAVER_BUILDER_FILE,
				array(
					'version' => BBVAPOR_PRO_BEAVER_BUILDER_VERSION,
					'license' => $license,
					'item_id' => 688,
					'author'  => 'Ronald Huereca',
					'beta'    => false,
					'url'     => home_url(),
				)
			);
		}

		// Add settings link
		add_action( 'plugin_action_links_' . BBVAPOR_PRO_BEAVER_BUILDER_SLUG, array( $this, 'plugin_settings_link' ) );

		add_action( 'after_plugin_row_' . BBVAPOR_PRO_BEAVER_BUILDER_SLUG, array( $this, 'after_plugin_row' ), 10, 3 );

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
		$license = get_site_option( 'bbvm_for_beaver_builder_license', '' );
		$license_status = get_site_option( 'bbvm_for_beaver_builder_license_status', false );
		$options_url = add_query_arg( array( 'page' => 'bb-vapor-modules-pro' ), admin_url( 'options-general.php' ) );
		if( empty( $license ) || false === $license_status ) {
			echo sprintf( '<tr class="active"><td colspan="3">%s <a href="%s">%s</a></td></tr>', __( 'Please enter a license to receive automatic updates.', 'bb-vapor-modules-pro' ), esc_url( $options_url ), __( 'Enter License.', 'bb-vapor-modules-pro' ) );
		}
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
			'options-general.php',
			__( 'Vapor Modules', 'bb-vapor-modules-pro' ),
			__( 'Vapor Modules', 'bb-vapor-modules-pro' ),
			'manage_options',
			'bb-vapor-modules-pro',
			array( $this, 'admin_page' )
		);
		add_action( 'load-' . $hook, array( $this, 'add_admin_scripts' ) );
	}

	public function add_admin_scripts() {
		wp_enqueue_script(
			'vapor-admin',
			BBVAPOR_PRO_BEAVER_BUILDER_URL . 'js/admin-tabs.js',
			array( 'jquery', 'wp-ajax-response' ),
			BBVAPOR_PRO_BEAVER_BUILDER_VERSION,
			true
		);
		wp_enqueue_style(
			'vapor-admin',
			BBVAPOR_PRO_BEAVER_BUILDER_URL . 'css/admin.css',
			array(),
			BBVAPOR_PRO_BEAVER_BUILDER_VERSION,
			'all'
		);
	}

	/**
	 * Get a list of modules.
	 *
	 * @return array Array of modules.
	 */
	private function modules() {
		return array(
			'advanced-headings'             => 'Advanced Headings',
			'advanced-separator'            => 'Advanced Separator',
			'alerts'                        => 'Alerts',
			'animated-button'               => 'Animated Button',
			'animated-headlines'            => 'Animated Headlines',
			'basic-breadcrumbs-module'      => 'Breadcrumbs',
			'beforeafter'                   => 'Before and After',
			'blockquotes'                   => 'Blockquotes',
			'button'                        => 'Button',
			'button-group'                  => 'Button Group',
			'card'                          => 'Card',
			'card-group'                    => 'Card Group',
			'category-grid'                 => 'Category Grid',
			'content-scroller'              => 'Content Scroller',
			'copyright'                     => 'Copyright',
			'edd-download-count'            => 'EDD Download Count',
			'faq'                           => 'FAQ',
			'featured-category'             => 'Featured Category',
			'gist'                          => 'Gists',
			'gravatar'                      => 'Gravatar',
			'gravityforms'                  => 'Gravity Forms',
			'instagram'                     => 'Instagram',
			'intermediate-separator'        => 'Intermediate Separator',
			'jetpack-related-posts'         => 'Jetpack Related Posts',
			'jetpack-sharing'               => 'Jetpack Sharing',
			'markdown'                      => 'Markdown',
			'photo-overlay'                 => 'Photo Overlay',
			'photo-overlay-advanced'        => 'Photo Overlay Advanced',
			'photoproof'                    => 'Photoproof',
			'postselect'                    => 'Post Select',
			'restaurant-menu-category'      => 'Restaurant Menu Category',
			'restaurant-menu-item'          => 'Restaurant Menu Item',
			'restaurant-menu-items'         => 'Restaurant Menu Items',
			'restaurant-menu-tabbed'        => 'Restaurant Tabbed Menu',
			'simple-separator'              => 'Simple Separator',
			'social-media-icons'            => 'Social Media Icons',
			'soliloquy'                     => 'Soliloquy Slider',
			'soliloquy-dynamic'             => 'Soliloquy Dynamic',
			'syntax-highlighter'            => 'Syntax Highlighter Evolved',
			'syntax-highlighter-native'     => 'Syntax Highlighter Native',
			'testimonials'                  => 'Testimonials',
			'twitter-embed'                 => 'Twitter Embed',
			'unordered-list'                => 'Unordered List',
			'user-profile'                  => 'User Profile',
			'variable-headings'             => 'Variable Headings',
			'vegas-slideshow'               => 'Vegas Background Slideshow',
			'woocommerce-add-to-cart'       => 'WooCommerce Add to Cart',
			'woocommerce-featured-category' => 'WooCommerce Featured Category',
			'woocommerce-featured-products' => 'WooCommerce Featured Products',
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
		if ( isset( $_POST['submit'] ) && isset( $_POST['modules'] ) ) {
			check_admin_referer( 'save_bbvm_beaver_builder_options' );
			$module_options = array();
			foreach ( $_POST['modules'] as $key => $module ) {
				$module_options[ $key ] = $module;
			}
			update_option( 'bbvm_modules', $module_options );
		}
		if ( isset( $_POST['submit'] ) && isset( $_POST['options'] ) ) {
			check_admin_referer( 'save_bbvm_beaver_builder_options' );

			// Check for valid license
			$store_url = 'https://bbvapormodules.com';
			$api_params = array(
				'edd_action' => 'activate_license',
				'license'    => $_POST['options']['license'],
				'item_name'  => urlencode( 'BB Vapor Modules Pro' ),
				'url'        => home_url(),
			);
			// Call the custom API.
			$response = wp_remote_post( $store_url, array( 'timeout' => 15, 'sslverify' => false, 'body' => $api_params ) );

			// make sure the response came back okay
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
					switch( $license_data->error ) {

						case 'expired' :

							$license_message = sprintf(
								__( 'Your license key expired on %s.', 'bb-vapor-modules-pro' ),
								date_i18n( get_option( 'date_format' ), strtotime( $license_data->expires, current_time( 'timestamp' ) ) )
							);
							break;

						case 'disabled' :
						case 'revoked' :

							$license_message = __( 'Your license key has been disabled.', 'bb-vapor-modules-pro' );
							break;

						case 'missing' :

							$license_message = __( 'Invalid license.', 'bb-vapor-modules-pro' );
							break;

						case 'invalid' :
						case 'site_inactive' :

							$license_message = __( 'Your license is not active for this URL.', 'bb-vapor-modules-pro' );
							break;

						case 'item_name_mismatch' :

							$license_message = sprintf( __( 'This appears to be an invalid license key for %s.', 'bb-vapor-modules-pro' ), 'Simple Comment Editing Options' );
							break;

						case 'no_activations_left':

							$license_message = __( 'Your license key has reached its activation limit.', 'bb-vapor-modules-pro' );
							break;

						default :

							$license_message = __( 'An error occurred, please try again.', 'bb-vapor-modules-pro' );
							break;
					}
				}
				if ( empty( $license_message ) ) {
					update_site_option( 'bbvm_for_beaver_builder_license_status', $license_data->license );
					update_site_option( 'bbvm_for_beaver_builder_license', sanitize_text_field( $_POST['options']['license'] ) );
				}
			}
		}
		$license_status = get_site_option( 'bbvm_for_beaver_builder_license_status', false );
		$license = get_site_option( 'bbvm_for_beaver_builder_license', '' );
		?>
		<div class="wrap">
				<h1><img src="<?php echo esc_url( BBVAPOR_PRO_BEAVER_BUILDER_URL . 'img/favicon.png' ); ?>" height="20" width="20" alt="BB Vapor Modules Pro" />&nbsp;<?php esc_html_e( 'Vapor Modules for Beaver Builder', 'bb-vapor-modules-pro' ); ?></h1>

				<div id="prompt-tabs">
					<h2 class="nav-tab-wrapper">
						<a href="<?php echo esc_url( admin_url( 'options-general.php?page=bb-vapor-modules-pro&tab=tab-welcome' ) ); ?>" class="nav-tab show nav-tab-active" data-tab-name="tab-welcome" style="">Welcome</a>
						<a href="<?php echo esc_url( admin_url( 'options-general.php?page=bb-vapor-modules-pro&tab=tab-license' ) ); ?>" class="nav-tab show" data-tab-name="tab-license" style="">License</a>
						<a href="<?php echo esc_url( admin_url( 'options-general.php?page=bb-vapor-modules-pro&tab=tab-instagram' ) ); ?>" class="nav-tab show" data-tab-name="tab-instagram" style="">Instagram</a>
						<a href="<?php echo esc_url( admin_url( 'options-general.php?page=bb-vapor-modules-pro&tab=tab-template-cloud' ) ); ?>" class="nav-tab show" data-tab-name="tab-template-cloud" style="">Template Cloud</a>
					</h2>
				</div>
				<div id="tab-welcome" class="tab-content hide">
					<div><img src="<?php echo esc_url( BBVAPOR_PRO_BEAVER_BUILDER_URL . 'img/logo.png' ); ?>" alt="BB Vapor Modules Pro" /></div>
					<h2>Welcome to BB Vapor Modules for Beaver Builder</h2>
					<h3>Disable/Enable Modules</h3>
					<?php
					$options = get_option( 'bbvm_modules' );
					$modules = $this->modules();
					?>
					<form action="<?php echo esc_url( add_query_arg( array( 'page' => 'bb-vapor-modules-pro', 'tab' => 'tab-welcome' ), admin_url( 'options-general.php' ) ) ); ?>" method="POST">
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
							checked( 'on', $options ? esc_attr( $options[ $key ] ) : esc_attr( 'on' ), false ),
							esc_attr( $module )
						);
					}
					echo '</ul>';
					submit_button( __( 'Save Options', 'bb-vapor-modules-pro' ) ); ?>
					</form>
				</div>
				<div id="tab-license" class="tab-content hide">
					<form action="<?php echo esc_url( add_query_arg( array( 'page' => 'bb-vapor-modules-pro', 'tab' => 'tab-license' ), admin_url( 'options-general.php' ) ) ); ?>" method="POST">
					<?php wp_nonce_field( 'save_bbvm_beaver_builder_options' ); ?>
					<table class="form-table">
						<tbody>
						<tr>
								<th scope="row"><label for="bbvm-license"><?php esc_html_e( 'Enter Your License', 'bb-vapor-modules-pro' ); ?></label></th>
								<td>
									<input id="bbvm-license" class="regular-text" type="text" value="<?php echo esc_attr( $license ); ?>" name="options[license]" /><br />
									<?php
									if( false === $license || empty( $license ) ) {
										printf('<p>%s</p>', esc_html__( 'Please enter your licence key.', 'bb-vapor-modules-pro' ) );
									} else {
										printf('<p>%s</p>', esc_html__( 'Your license is valid and you will now receive update notifications.', 'bb-vapor-modules-pro' ) );
									}
									?>
									<?php
									if( ! empty( $license_message ) ) {
										printf( '<div class="updated error"><p><strong>%s</p></strong></div>', esc_html( $license_message ) );
									}
									?>
								</td>
							</tr>
						</tbody>
					</table>
					<?php submit_button( __( 'Save Options', 'bb-vapor-modules-pro' ) ); ?>
					</form>
				</div>
				<div id="tab-instagram" class="tab-content hide">
					<form action="<?php echo esc_url( add_query_arg( array( 'page' => 'bb-vapor-modules-pro', 'tab' => 'tab-instagram' ), admin_url( 'options-general.php' ) ) ); ?>" method="POST">
					<?php wp_nonce_field( 'save_bbvm_beaver_builder_options' ); ?>
					<table class="form-table">
						<tbody>
						<tr>
							<th scope="row"><label for="bbvm-instagram"><?php esc_html_e( 'Connect to Instagram', 'bb-vapor-modules-pro' ); ?></label>
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
								<a class="button button-primary" href="<?php echo esc_url_raw( $instagram_url ); ?>"><?php _e( 'Connect to Instagram', 'bb-vapor-modules-pro' ); ?></a>
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
								<button class="button button-primary"><?php _e( 'Connected', 'bb-vapor-modules-pro' ); ?></button>&nbsp;<input type="submit" class="button button-secondary delete" value="<?php echo esc_html__( 'Disconnect', 'bb-vapor-modules-pro' ); ?>" name="disconnect-instagram" />&nbsp;<input type="submit" class="button button-secondary" value="<?php echo esc_html__( 'Clear Cache', 'bb-vapor-modules-pro' ); ?>" name="clear-cache-instagram" />
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
			<div id="tab-template-cloud" class="tab-content hide">
				<h2>Coming Soon</h2>
			</div>
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
		$admin_anchor = sprintf( '<a href="%s">%s</a>', esc_url($this->get_url()), esc_html__( 'Settings', 'bb-vapor-modules-pro' ) );
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