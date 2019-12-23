<?php // phpcs:ignoreline
/**
 * Admin settings.
 *
 * Admin settings for BB Vapor Modules Pro.
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules Pro
 * @since 1.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'No direct access.' );
}
/**
 * Admin class for Vapor modules.
 *
 * @package BB Vapor Modules Pro
 */
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

	/**
	 * Class constructor to initialize actions.
	 */
	public function __construct() {
		add_action( 'admin_init', array( $this, 'init' ) );

		add_action( 'admin_menu', array( $this, 'register_sub_menu' ) );
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

			// setup the updater.
			$edd_updater = new BBVM_EDD_SL_Plugin_Updater(
				'https://bbvapormodules.com',
				BBVAPOR_PRO_BEAVER_BUILDER_FILE,
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

		// Add settings link.
		add_action( 'plugin_action_links_' . BBVAPOR_PRO_BEAVER_BUILDER_SLUG, array( $this, 'plugin_settings_link' ) );

		add_action( 'after_plugin_row_' . BBVAPOR_PRO_BEAVER_BUILDER_SLUG, array( $this, 'after_plugin_row' ), 10, 3 );

	}

	/**
	 * Adds license information
	 *
	 * @since 1.4.1.
	 * @access public
	 * @see __construct
	 * @param string $plugin_file Plugin file.
	 * @param array  $plugin_data Array of plugin data.
	 * @param string $status      If plugin is active or not.
	 * @return void HTML Settings.
	 */
	public function after_plugin_row( $plugin_file, $plugin_data, $status ) {
		$license        = get_site_option( 'bbvm_for_beaver_builder_license', '' );
		$license_status = get_site_option( 'bbvm_for_beaver_builder_license_status', false );
		$options_url    = add_query_arg( array( 'page' => 'bb-vapor-modules-pro' ), admin_url( 'options-general.php' ) );
		if ( empty( $license ) || false === $license_status ) {
			echo sprintf( '<tr class="active"><td colspan="3">%s <a href="%s">%s</a></td></tr>', esc_html__( 'Please enter a license to receive automatic updates.', 'bb-vapor-modules-pro' ), esc_url( $options_url ), esc_html__( 'Enter License.', 'bb-vapor-modules-pro' ) );
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
			apply_filters( 'bbvm_whitelabel_menu_name', __( 'Vapor Modules', 'bb-vapor-modules-pro' ) ),
			apply_filters( 'bbvm_whitelabel_menu_name', __( 'Vapor Modules', 'bb-vapor-modules-pro' ) ),
			'manage_options',
			'bb-vapor-modules-pro',
			array( $this, 'admin_page' )
		);
		add_action( 'load-' . $hook, array( $this, 'add_admin_scripts' ) );
	}

	/**
	 * Add admin scripts for the admin.
	 */
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
			'advanced-coupon'               => 'Advanced Coupon',
			'advanced-headings'             => 'Advanced Headings',
			'animated-letters'              => 'Animated Letters',
			'advanced-separator'            => 'Advanced Separator',
			'alerts'                        => 'Alerts',
			'animated-button'               => 'Animated Button',
			'animated-headlines'            => 'Animated Headlines',
			'basic-breadcrumbs-module'      => 'Breadcrumbs',
			'beforeafter'                   => 'Before and After',
			'blockquotes'                   => 'Blockquotes',
			'button'                        => 'Button',
			'button-group'                  => 'Button Group',
			'calendly'                      => 'Calendly',
			'card'                          => 'Card',
			'card-group'                    => 'Card Group',
			'category-grid'                 => 'Category Grid',
			'content-scroller'              => 'Content Scroller',
			'columns'                       => 'Columns',
			'copyright'                     => 'Copyright',
			'credit-cards'                  => 'Credit Cards',
			'edd-download-count'            => 'EDD Download Count',
			'emailoctopus'                  => 'EmailOctopus',
			'faq'                           => 'FAQ',
			'featured-category'             => 'Featured Category',
			'gist'                          => 'Gists',
			'gravatar'                      => 'Gravatar',
			'gravityforms'                  => 'Gravity Forms',
			'instagram'                     => 'Instagram',
			'instagram-slideshow'           => 'Instagram Slideshow',
			'intermediate-separator'        => 'Intermediate Separator',
			'jetpack-related-posts'         => 'Jetpack Related Posts',
			'jetpack-sharing'               => 'Jetpack Sharing',
			'markdown'                      => 'Markdown',
			'photo'                         => 'Photo',
			'photo-overlay'                 => 'Photo Overlay',
			'photo-overlay-advanced'        => 'Photo Overlay Advanced',
			'photoproof'                    => 'Photoproof',
			'postselect'                    => 'Post Select',
			'pricing-table'                 => 'Pricing Table',
			'restaurant-menu-category'      => 'Restaurant Menu Category',
			'restaurant-menu-item'          => 'Restaurant Menu Item',
			'restaurant-menu-items'         => 'Restaurant Menu Items',
			'restaurant-menu-tabbed'        => 'Restaurant Tabbed Menu',
			'simple-coupon'                 => 'Simple Coupon',
			'simple-spacer'                 => 'Simple Spacer',
			'simple-separator'              => 'Simple Separator',
			'social-media-icons'            => 'Social Media Icons',
			'soliloquy'                     => 'Soliloquy Slider',
			'soliloquy-dynamic'             => 'Soliloquy Dynamic',
			'syntax-highlighter'            => 'Syntax Highlighter Evolved',
			'syntax-highlighter-native'     => 'Syntax Highlighter Native',
			'testimonials'                  => 'Testimonials',
			'timeline'                      => 'Timeline',
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
		if ( isset( $_POST['submit'] ) && isset( $_POST['facebook-app-id'] ) ) {
			check_admin_referer( 'save_bbvm_beaver_builder_facebook' );
			$facebook_app_id = filter_input( INPUT_POST, 'facebook-app-id', FILTER_DEFAULT );
			update_site_option( 'bbvm_facebook_app_id', $facebook_app_id );
			?>
			<div class="notice notice-success"><p><?php esc_html_e( 'Facebook APP ID Saved!', 'bb-vapor-modules-pro' ); ?></p></div>
			<?php
		}
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
		<div class="wrap">
				<h1><img src="<?php echo esc_url( apply_filters( 'bbvm_whitelabel_logo_small', BBVAPOR_PRO_BEAVER_BUILDER_URL . 'img/favicon.png' ) ); ?>" height="20" width="20" alt="BB Vapor Modules Pro" />&nbsp;<?php echo esc_html( apply_filters( 'bbvm_whitelabel_admin_label', __( 'Vapor Modules for Beaver Builder', 'bb-vapor-modules-pro' ) ) ); ?></h1>

				<div id="prompt-tabs">
					<h2 class="nav-tab-wrapper">
						<a href="<?php echo esc_url( admin_url( 'options-general.php?page=bb-vapor-modules-pro&tab=tab-welcome' ) ); ?>" class="nav-tab show nav-tab-active" data-tab-name="tab-welcome" style="">Welcome</a>
						<a href="<?php echo esc_url( admin_url( 'options-general.php?page=bb-vapor-modules-pro&tab=tab-license' ) ); ?>" class="nav-tab show" data-tab-name="tab-license" style="">License</a>
						<?php if ( ! defined( 'BBVM_HIDE_WHITELABEL' ) ) : ?>
						<a href="<?php echo esc_url( admin_url( 'options-general.php?page=bb-vapor-modules-pro&tab=tab-whitelabel' ) ); ?>" class="nav-tab show" data-tab-name="tab-whitelabel" style="">Whitelabel</a>
						<?php endif; ?>
						<a href="<?php echo esc_url( admin_url( 'options-general.php?page=bb-vapor-modules-pro&tab=tab-instagram' ) ); ?>" class="nav-tab show" data-tab-name="tab-instagram" style="">Instagram</a>
						<a href="<?php echo esc_url( admin_url( 'options-general.php?page=bb-vapor-modules-pro&tab=tab-facebook' ) ); ?>" class="nav-tab show" data-tab-name="tab-facebook" style="">Facebook</a>
					</h2>
				</div>
				<div id="tab-welcome" class="tab-content hide">
					<div><img src="<?php echo esc_url( apply_filters( 'bbvm_whitelabel_logo', BBVAPOR_PRO_BEAVER_BUILDER_URL . 'img/logo.png' ) ); ?>" alt="BB Vapor Modules Pro" style="max-width: 200px;" /></div>
					<h2><?php echo esc_html( apply_filters( 'bbvm_whitelabel_admin_welcome', esc_html__( 'Welcome to BB Vapor Modules for Beaver Builder', 'bb-vapor-modules-pro' ) ) ); ?></h2>
					<h3><?php esc_html_e( 'Disable/Enable Modules', 'bb-vapor-modules-pro' ); ?></h3>
					<?php
					$options = get_option( 'bbvm_modules' );
					$modules = $this->modules();
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
				<div id="tab-license" class="tab-content hide">
					<form action="
					<?php
					echo esc_url(
						add_query_arg(
							array(
								'page' => 'bb-vapor-modules-pro',
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
										printf( '<p>%s</p>', esc_html__( 'Please enter your licence key.', 'bb-vapor-modules-pro' ) );
									} else {
										printf( '<p>%s</p>', esc_html__( 'Your license is valid and you will now receive update notifications.', 'bb-vapor-modules-pro' ) );
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
					<?php submit_button( __( 'Save Options', 'bb-vapor-modules-pro' ) ); ?>
					</form>
				</div>
				<?php if ( ! defined( 'BBVM_HIDE_WHITELABEL' ) ) : ?>
				<div id="tab-whitelabel" class="tab-content hide">
					<form method="POST" action="
					<?php
					echo esc_url(
						add_query_arg(
							array(
								'page' => 'bb-vapor-modules-pro',
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
				<div id="tab-instagram" class="tab-content hide">
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
			<div id="tab-facebook" class="tab-content hide">
				<form action="
					<?php
					echo esc_url(
						add_query_arg(
							array(
								'page' => 'bb-vapor-modules-pro',
								'tab'  => 'tab-facebook',
							),
							admin_url( 'options-general.php' )
						)
					);
					?>
				" method="POST">
				<?php
				wp_nonce_field( 'save_bbvm_beaver_builder_facebook' );
				?>
				<table class="form-table">
					<tbody>
						<tr>
							<?php
							$facebook_app_id = get_site_option( 'bbvm_facebook_app_id', '' );
							?>
							<th scope="row"><label for="bbvm-facebook-app-id"><?php esc_html_e( 'Facebook APP ID', 'bb-vapor-modules-pro' ); ?></label></th>
							<td><input type="text" class="regular-text" id="bbvm-facebook-app-id" value="<?php echo esc_attr( $facebook_app_id ); ?>" name="facebook-app-id" /><p class="description"><?php esc_html_e( 'Enter a Facebook APP ID to allow for Facebook related modules.', 'bb-vapor-modules-pro' ); ?></p></td>
						</tr>
					</tbody>
				</table>
				<p>
				<?php
				submit_button( __( 'Save Facebook APP ID', 'bb-vapor-modules-pro' ), 'primary', 'submit', false );
				?>
				</p>
				</form>
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
	 * @param array $settings Uses $prefix . "plugin_action_links_$plugin_file" action.
	 * @return array Array of settings
	 */
	public function plugin_settings_link( $settings ) {
		$admin_anchor = sprintf( '<a href="%s">%s</a>', esc_url( $this->get_url() ), esc_html__( 'Settings', 'bb-vapor-modules-pro' ) );
		if ( ! is_array( $settings ) ) {
			return array( $admin_anchor );
		} else {
			return array_merge( array( $admin_anchor ), $settings );
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
			$url       = add_query_arg( array( 'page' => self::$slug ), admin_url( 'options-general.php' ) );
			self::$url = $url;
		}
		return $url;
	}
}
