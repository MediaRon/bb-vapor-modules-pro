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
	private static $slug = 'vapor-modules';

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
			apply_filters( 'bbvm_whitelabel_menu_name', __( 'Vapor', 'bb-vapor-modules-pro' ) ),
			'manage_options',
			'vapor-modules',
			array( $this, 'admin_page' ),
			7
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
	public static function modules() {
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
			'circular-carousel'             => 'Circular Carousel',
			'content-scroller'              => 'Content Scroller',
			'columns'                       => 'Columns',
			'copyright'                     => 'Copyright',
			'credit-cards'                  => 'Credit Cards',
			'edd-download-count'            => 'EDD Download Count',
			'emailoctopus'                  => 'EmailOctopus',
			'faq'                           => 'FAQ',
			'featured-category'             => 'Featured Category',
			'featured-post'                 => 'Featured Post',
			'gist'                          => 'Gists',
			'gravatar'                      => 'Gravatar',
			'gravityforms'                  => 'Gravity Forms',
			'icon'                          => 'Icon',
			'instagram'                     => 'Instagram',
			'instagram-slideshow'           => 'Instagram Slideshow',
			'intermediate-separator'        => 'Intermediate Separator',
			'jetpack-related-posts'         => 'Jetpack Related Posts',
			'jetpack-sharing'               => 'Jetpack Sharing',
			'learndash-certificates'        => 'LearnDash Certificates',
			'learndash-courses'             => 'LearnDash Courses',
			'learndash-course-content'      => 'LearnDash Course Content',
			'learndash-course-info'         => 'LearnDash Course Info',
			'learndash-course-progress'     => 'LearnDash Course Progress',
			'learndash-course-status'       => 'LearnDash Course Status',
			'learndash-lessons'             => 'LearnDash Lessons',
			'learndash-login'               => 'LearnDash Login',

			'learndash-messages'            => 'LearnDash Messages',
			'learndash-payments'            => 'LearnDash Payments',
			'learndash-profile'             => 'LearnDash Profile',
			'learndash-topics'              => 'LearnDash Topics',
			'learndash-quizzes'             => 'LearnDash Quizzes',
			'learndash-quiz'                => 'LearnDash Quiz',
			'learndash-user-status'         => 'LearnDash User Status',
			'learndash-user-points'         => 'LearnDash User Points',
			'markdown'                      => 'Markdown',
			'photo'                         => 'Photo',
			'photo-overlay'                 => 'Photo Overlay',
			'photo-overlay-advanced'        => 'Photo Overlay Advanced',
			'photoproof'                    => 'Photoproof',
			'plugin-info-card'              => 'Plugin Info Card',
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
			'tomtom'                        => 'TomTom',
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
		?>
		<div class="wrap">
			<div id="bbvm-logo-wrap">
				<h1><img src="<?php echo esc_url( apply_filters( 'bbvm_whitelabel_logo_small', BBVAPOR_PRO_BEAVER_BUILDER_URL . 'img/logo.png' ) ); ?>" height="115" width="515" alt="Vapor Modules" /></h1>
			</div>
			<div id="prompt-tabs">
				<h2 class="nav-tab-wrapper">
					<a href="<?php echo esc_url( admin_url( 'options-general.php?page=bb-vapor-modules-pro&tab=tab-welcome' ) ); ?>" class="nav-tab show <?php echo 'tab-welcome' === filter_input( INPUT_GET, 'tab' ) || ! filter_input( INPUT_GET, 'tab' ) ? 'nav-tab-active' : ''; ?>" data-tab-name="tab-welcome" style="">Welcome</a>
					<a href="<?php echo esc_url( admin_url( 'options-general.php?page=bb-vapor-modules-pro&tab=tab-license' ) ); ?>" class="nav-tab show <?php echo 'tab-license' === filter_input( INPUT_GET, 'tab' ) ? 'nav-tab-active' : ''; ?>" data-tab-name="tab-license" style="">License</a>
					<?php if ( ! defined( 'BBVM_HIDE_WHITELABEL' ) ) : ?>
					<a href="<?php echo esc_url( admin_url( 'options-general.php?page=bb-vapor-modules-pro&tab=tab-whitelabel' ) ); ?>" class="nav-tab show <?php echo 'tab-whitelabel' === filter_input( INPUT_GET, 'tab' ) ? 'nav-tab-active' : ''; ?>" data-tab-name="tab-whitelabel" style="">Whitelabel</a>
					<?php endif; ?>
					<a href="<?php echo esc_url( admin_url( 'options-general.php?page=bb-vapor-modules-pro&tab=tab-tomtom' ) ); ?>" class="nav-tab show <?php echo 'tab-tomtom' === filter_input( INPUT_GET, 'tab' ) ? 'nav-tab-active' : ''; ?>" data-tab-name="tab-tomtom" style="">TomTom</a>
				</h2>
			</div>
			<?php
			if ( 'tab-welcome' === filter_input( INPUT_GET, 'tab' ) || ! filter_input( INPUT_GET, 'tab' ) ) {
				require_once 'admin/class-bbvm-admin-welcome.php';
				$welcome_tab = new BBVM_Admin_Welcome();
				$welcome_tab->output();
			}
			if ( 'tab-license' === filter_input( INPUT_GET, 'tab' ) ) {
				require_once 'admin/class-bbvm-admin-license.php';
				$license_tab = new BBVM_Admin_License();
				$license_tab->output();
			}
			if ( 'tab-whitelabel' === filter_input( INPUT_GET, 'tab' ) ) {
				require_once 'admin/class-bbvm-admin-whitelabel.php';
				$whitelabel = new BBVM_Admin_Whitelabel();
				$whitelabel->output();
			}
			if ( 'tab-tomtom' === filter_input( INPUT_GET, 'tab' ) ) {
				require_once 'admin/class-bbvm-admin-tomtom.php';
				$tomtom = new BBVM_Admin_TomTom();
				$tomtom->output();
			}
			?>
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
