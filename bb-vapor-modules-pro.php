<?php
/**
 * Plugin Name: BB Vapor Modules Pro
 * Plugin URI: https://bbvapormodules.com
 * Description: A growing selection of modules for Beaver Builder.
 * Version: 1.1.1
 * Author: Ronald Huereca
 * Author URI: https://mediaron.com
 * Requires at least: 5.0
 * Contributors: ronalfy
 * Text Domain: bb-vapor-modules-pro
 * Domain Path: /languages
 */
define( 'BBVAPOR_PRO_PLUGIN_NAME', 'BB Vapor Modules Pro' );
define( 'BBVAPOR_PRO_BEAVER_BUILDER_DIR', plugin_dir_path( __FILE__ ) );
define( 'BBVAPOR_PRO_BEAVER_BUILDER_URL', plugins_url( '/', __FILE__ ) );
define( 'BBVAPOR_PRO_BEAVER_BUILDER_VERSION', '1.1.1' );
define( 'BBVAPOR_PRO_BEAVER_BUILDER_SLUG', plugin_basename( __FILE__ ) );
define( 'BBVAPOR_PRO_BEAVER_BUILDER_FILE', __FILE__ );

class BBVapor_Modules_Pro {

	public function __construct() {
		add_action( 'plugin_loaded', array( $this, 'bbvm_beaver_builder_plugin_loaded' ), 9 );

		// Load text domain
		load_plugin_textdomain( 'bb-vapor-modules-pro', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
	}

	public static function get_color( $color ) {
		if ( 6 === strlen( $color ) ) {
			return '#' . $color;
		} else {
			return $color;
		}
		return $color;
	}
	public function bbvm_beaver_builder_module_init() {

		// Register admin panel
		require_once 'includes/bbvm-beaverbuilder-admin.php';
		new BBVapor_BeaverBuilder_Admin();

		if ( class_exists( 'FLBuilder' ) ) {

			add_action( 'wp_head', array( $this, 'bbvm_beaver_builder_ajax_url' ) );

			// Breadcrumb module
			require_once 'bbvm-modules/basic-breadcrumbs-module/bbvm-breadcrumbs-module.php';
			new BBVapor_Breadcrumbs_Module();

			// Markdown module
			require_once 'bbvm-modules/markdown/bbvm-markdown.php';
			new BBVapor_Markdown_Module();

			// User Profile module
			require_once 'bbvm-modules/user-profile/bbvm-user-profile.php';
			new BBVapor_User_Profile_Module();

			// Photo overlay module
			require_once 'bbvm-modules/photo-overlay/bbvm-photo-overlay-module.php';
			new BBVapor_Photo_Overlay_Module();
			require_once 'bbvm-modules/photo-overlay-advanced/bbvm-photo-overlay-advanced-module.php';
			new BBVapor_Photo_Overlay_Advanced_Module();

			// Card Module
			require_once 'bbvm-modules/card/bbvm-card-module.php';
			new BBVapor_Card_Module();

			// Card Group Module
			require_once 'bbvm-modules/card-group/bbvm-card-group-module.php';
			new BBVapor_Card_Group_Module();

			// Before and After Module
			require_once 'bbvm-modules/beforeafter/bbvm-beforeafter-module.php';
			new BBVapor_Before_After_Module();

			// Alerts Module
			require_once 'bbvm-modules/alerts/bbvm-alerts-module.php';
			new BBVapor_Alerts_Module();

			// Animated Headlines Module
			require_once 'bbvm-modules/animated-headlines/bbvm-animated-headlines-module.php';
			new BBVapor_Animated_Headlines_Module();

			// Variable Headings Module
			require_once 'bbvm-modules/variable-headings/bbvm-variable-headings.php';
			new BBVapor_Variable_Headings_Module();

			// Advanced Headings Module
			require_once 'bbvm-modules/advanced-headings/bbvm-advanced-headings.php';
			new BBVapor_Advanced_Headings_Module();

			// Animated Button Module
			require_once 'bbvm-modules/animated-button/bbvm-animated-button.php';
			new BBVapor_Animated_Button_Module();

			// Button Module
			require_once 'bbvm-modules/button/bbvm-button.php';
			new BBVapor_Button_Module();

			// Button Group Module
			require_once 'bbvm-modules/button-group/bbvm-button-module.php';
			new BBVapor_Button_Group_Module();

			// Blockquote Module
			require_once 'bbvm-modules/blockquotes/bbvm-blockquotes-module.php';
			new BBVapor_Blockquotes_Module();

			// FAQ Module
			require_once 'bbvm-modules/faq/bbvm-faq-module.php';
			new BBVapor_FAQ_Module();

			// Testimonials Module
			require_once 'bbvm-modules/testimonials/bbvm-testimonials-module.php';
			new BBVapor_Testimonials_Module();

			// Select Posts Module
			require_once 'bbvm-modules/postselect/bbvm-post-select-module.php';
			new BBVapor_PostSelect_Module();

			// Gists Module
			require_once 'bbvm-modules/gist/bbvm-gist-module.php';
			new BBVapor_Testimonials_Module();

			// Unordered List Module
			require_once 'bbvm-modules/unordered-list/bbvm-unordered-list-module.php';
			new BBVapor_Unordered_List_Module();

			// Gravatar module
			require_once 'bbvm-modules/gravatar/bbvm-gravatar-module.php';
			new BBVapor_Gravatar_Module();

			// Social Media Icons Module
			require_once 'bbvm-modules/social-media-icons/bbvm-social-media-module.php';
			new BBVapor_Social_Media_Module();

			// Copyright Module
			require_once 'bbvm-modules/copyright/bbvm-copyright-module.php';
			new BBVapor_Copyright_Module();

			// Syntax highligheter module
			global $SyntaxHighlighter;
			if ( is_object( $SyntaxHighlighter ) ) {
				require_once 'bbvm-modules/syntax-highlighter/bbvm-syntax-highlighter-module.php';
				new BBVapor_Syntax_Highlighter_Module();
			}
			require_once 'bbvm-modules/syntax-highlighter-native/bbvm-syntax-highlighter-native-module.php';
			new BBVapor_Syntax_Highlighter_Native_Module();

			// Jetpack Related Posts module
			if ( class_exists( 'Jetpack_RelatedPosts' ) ) {
				require_once 'bbvm-modules/jetpack-related-posts/bbvm-jetpack-related-posts-module.php';
				new BBVapor_Jetpack_Related_Posts_Module();
			}

			// Jetpack Sharing module
			if ( function_exists( 'sharing_display' ) ) {
				require_once 'bbvm-modules/jetpack-sharing/bbvm-jetpack-sharing.php';
				new BBVapor_Jetpack_Sharing_Module();
			}

			// Restaurant Menu Module
			require_once 'bbvm-modules/restaurant-menu-items/bbvm-restaurant-menu-items.php';
			new BBVapor_Restaurant_Menu_Item_Module();

			// Restaurant Add Menu Item Module
			require_once 'bbvm-modules/restaurant-menu-item/bbvm-restaurant-menu-item.php';
			new BBVapor_Restaurant_Menu_Item_Add_Module();

			// Restaurant Add Menu Item Category Module
			require_once 'bbvm-modules/restaurant-menu-category/bbvm-restaurant-menu-category.php';
			new BBVapor_Restaurant_Menu_Category();

			// Spacers/Separators
			require_once 'bbvm-modules/simple-spacer/bbvm-simple-spacer-module.php';
			new BBVapor_Simple_Spacer_Module();
			require_once 'bbvm-modules/simple-separator/bbvm-simple-separator.php';
			new BBVapor_Simple_Separator_Module();
			require_once 'bbvm-modules/intermediate-separator/bbvm-intermediate-separator.php';
			new BBVapor_Intermediate_Separator_Module();
			require_once 'bbvm-modules/advanced-separator/bbvm-advanced-separator-module.php';
			new BBVapor_Advanced_Separator_Module();

			// Vegas Slideshow
			require_once 'bbvm-modules/vegas-slideshow/bbvm-vegas-slideshow-module.php';
			new BBVapor_Vegas_Slideshow_Module();

			// Restaurant Tabbed Module
			require_once 'bbvm-modules/restaurant-menu-tabbed/bbvm-restaurant-menu-tabbed.php';
			new BBVapor_Restaurant_Menu_Tabbed_Module();

			// Gravity Forms
			if ( class_exists( 'GFAPI' ) ) {
				require_once 'bbvm-modules/gravityforms/bbvm-gravityforms-module.php';
				new BBVapor_Gravityforms_Module();
			}

			// Soliloquy
			if ( class_exists( 'Soliloquy' ) ) {
				require_once 'bbvm-modules/soliloquy/bbvm-soliloquy-module.php';
				new BBVapor_Soliloquy_Module();

				if ( class_exists( 'Soliloquy_Dynamic' ) ) {
					require_once 'bbvm-modules/soliloquy-dynamic/bbvm-soliloquy-dynamic.php';
					new BBVapor_Soliloquy_Dynamic_Module();
				}
			}

			// Instagram
			require_once 'bbvm-modules/instagram/bbvm-instagram-module.php';
			new BBVapor_Instagram_Module();

			// Featured Category
			require_once 'bbvm-modules/featured-category/bbvm-featured-category.php';
			new BBVapor_Featured_Category_Module();

			// Photoproof
			if ( class_exists( 'Apollo13Framework' ) ) {
				require_once 'bbvm-modules/photoproof/bbvm-photoproof-module.php';
				new BBVapor_Photoproof_Module();
			}

			// WooCommerce Modules
			if ( class_exists( 'woocommerce' ) ) {
				require_once 'bbvm-modules/woocommerce-add-to-cart/bbvm-woocommerce-add-to-cart.php';
				new BBVapor_WooCommerce_Add_To_Cart_Module();
				require_once 'bbvm-modules/woocommerce-featured-products/bbvm-woocommerce-featured-products.php';
				new BBVapor_WooCommerce_Featured_Products_Module();
				require_once 'bbvm-modules/woocommerce-featured-category/bbvm-woocommerce-featured-category.php';
				new BBVapor_WooCommerce_Featured_Category_Module();
			}

			// Edd Modules
			if ( class_exists( 'Easy_Digital_Downloads' ) ) {
				require_once 'bbvm-modules/edd-download-count/bbvm-edd-download-count-module.php';
				new BBVapor_EDD_Download_Count_Module();
			}

			add_shortcode( 'bbvm_bb_copyright', array( $this, 'bbvm_beaver_builder_copyright' ) );
		}
	}

	public function bbvm_beaver_builder_ajax_url() {
		?>
	<script>
	var bbvm_beaver_builder_ajax_url = '<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>';
	</script>
		<?php
	}
	public function bbvm_beaver_builder_plugin_loaded() {
		add_filter( 'bbvapor_load', '__return_false' );

		add_action( 'init', array( $this, 'bbvm_beaver_builder_module_init' ), 20 );

		// Vegas
		require_once 'includes/vegas-row-settings.php';
		bbvapor_modules_row_register_settings();
	}

	public function bbvm_beaver_builder_copyright( $atts ) {
		$args = shortcode_atts(
			array(
				'site'           => get_bloginfo( 'sitename' ),
				'start'          => false,
				'end'            => date( 'Y' ),
				'copyright_text' => __( 'Copyright', 'bb-vapor-modules-pro' ),
				'symbol'         => '&copy;',
			),
			$atts
		);

		$copyright_html = '';
		$copyright_html .= $args['symbol'] . '&nbsp;';
		if ( false !== $args['start'] ) {
			$copyright_html .= esc_html( $args['start'] ) . '-';
		}
		$copyright_html .= esc_html( $args['end'] );
		$copyright_html .= '&nbsp';
		$copyright_html .= esc_html( $args['copyright_text'] ) . '&nbsp';
		$copyright_html .= esc_html( $args['site'] );
		return $copyright_html;
	}
}

new BBVapor_Modules_Pro();

function bbvm_bb_add_image_sizes() {
	// Add a large WooCommerce Thumb
	if ( class_exists( 'woocommerce' ) ) {
		add_image_size( 'woocommerce_large_thumb', 600, 600, true );
	}
}
add_action( 'after_setup_theme', 'bbvm_bb_add_image_sizes' );

if ( ! function_exists( 'bbvm_edd_download_count' ) ) {
	function bbvm_edd_download_count( $id, $hash, $license, $expires ) {
		$count = get_post_meta( $id, 'bbvm_edd_download_count', true );
		if ( false === $count ) {
			$count = 1;
			update_post_meta( $id, 'bbvm_edd_download_count', $count );
			return;
		}
		$count = absint( $count );
		$count++;
		update_post_meta( $id, 'bbvm_edd_download_count', $count );
	}
}
add_action( 'edd_sl_before_package_download', 'bbvm_edd_download_count', 10, 4 );
