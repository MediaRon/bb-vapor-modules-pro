<?php // phpcs:ignoreline
/**
 * Plugin Name: BB Vapor Modules Pro
 * Plugin URI: https://bbvapormodules.com
 * Description: A growing selection of modules for Beaver Builder.
 * Version: 1.3.5
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
define( 'BBVAPOR_PRO_BEAVER_BUILDER_VERSION', '1.3.5' );
define( 'BBVAPOR_PRO_BEAVER_BUILDER_SLUG', plugin_basename( __FILE__ ) );
define( 'BBVAPOR_PRO_BEAVER_BUILDER_FILE', __FILE__ );

/**
 * Main plugin class for BB Vapor Modules.
 */
class BBVapor_Modules_Pro {

	/**
	 * Class constructor.
	 */
	public function __construct() {
		add_action( 'plugin_loaded', array( $this, 'bbvm_beaver_builder_plugin_loaded' ), 9 );

		// Load text domain.
		load_plugin_textdomain( 'bb-vapor-modules-pro', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
	}

	/**
	 * Get a color based on module settings.
	 *
	 * @param string $color The color (could be alpha, six digits, or a string such as inherit).
	 *
	 * @return string The updated color.
	 */
	public static function get_color( $color ) {
		if ( empty( $color ) ) {
			return 'inherit';
		}
		if ( 6 === strlen( $color ) ) {
			return '#' . $color;
		} else {
			return $color;
		}
		return $color;
	}

	/**
	 * Checks to see if a module is enabled.
	 *
	 * @param array  $options Options to check.
	 * @param string $module The module to check.
	 *
	 * @return bool Whether a module is enabled or not.
	 */
	private function is_module_enabled( $options, $module ) {
		if ( ! $options ) {
			return true;
		}
		if ( isset( $options[ $module ] ) ) {
			if ( 'on' === $options[ $module ] ) {
				return true;
			} else {
				return false;
			}
		}
		return true;
	}

	/**
	 * Register modules and blocks.
	 */
	public function bbvm_beaver_builder_module_init() {

		// Register admin panel.
		require_once 'includes/bbvm-beaverbuilder-admin.php';
		new BBVapor_BeaverBuilder_Admin();

		// Register White Label Settings.
		require_once 'includes/class-bbvm-whitelabel.php';
		$whitelabel = new BBVM_Whitelabel();
		$whitelabel->register_hooks();

		// Register block.
		require_once 'includes/class-bbvm-row-block.php';
		new BBVM_Row_Block();

		// Register Icons.
		require_once 'includes/icons/class-bbvm-icons.php';

		if ( class_exists( 'FLBuilder' ) ) {

			$module_options = get_option( 'bbvm_modules' );

			add_action( 'wp_head', array( $this, 'bbvm_beaver_builder_ajax_url' ) );

			// Breadcrumb module.
			if ( $this->is_module_enabled( $module_options, 'basic-breadcrumbs-module' ) ) {
				require_once 'bbvm-modules/basic-breadcrumbs-module/bbvm-breadcrumbs-module.php';
				new BBVapor_Breadcrumbs_Module();
			}

			// Timeline module.
			if ( $this->is_module_enabled( $module_options, 'timeline' ) ) {
				require_once 'bbvm-modules/timeline/bbvm-timeline.php';
				new BBVapor_Timeline_Module();
			}

			// Markdown module.
			if ( $this->is_module_enabled( $module_options, 'markdown' ) ) {
				require_once 'bbvm-modules/markdown/bbvm-markdown.php';
				new BBVapor_Markdown_Module();
			}

			// Content scroller module.
			if ( $this->is_module_enabled( $module_options, 'content-scroller' ) ) {
				require_once 'bbvm-modules/content-scroller/bbvm-content-scroller.php';
				new BBVapor_Content_Scroller();
			}

			// Animated Letters Module.
			if ( $this->is_module_enabled( $module_options, 'animated-letters' ) ) {
				require_once 'bbvm-modules/animated-letters/bbvm-animated-letters.php';
				new BBVapor_Animated_Letters_Module();
			}

			// User Profile module.
			if ( $this->is_module_enabled( $module_options, 'user-profile' ) ) {
				require_once 'bbvm-modules/user-profile/bbvm-user-profile.php';
				new BBVapor_User_Profile_Module();
			}

			// Twitter Embed.
			if ( $this->is_module_enabled( $module_options, 'twitter-embed' ) ) {
				require_once 'bbvm-modules/twitter-embed/bbvm-twitter-embed.php';
				new BBVapor_Twitter_Embed();
			}

			// Photo overlay module.
			if ( $this->is_module_enabled( $module_options, 'photo-overlay' ) ) {
				require_once 'bbvm-modules/photo-overlay/bbvm-photo-overlay-module.php';
				new BBVapor_Photo_Overlay_Module();
			}
			if ( $this->is_module_enabled( $module_options, 'photo-overlay-advanced' ) ) {
				require_once 'bbvm-modules/photo-overlay-advanced/bbvm-photo-overlay-advanced-module.php';
				new BBVapor_Photo_Overlay_Advanced_Module();
			}

			// Card Module.
			if ( $this->is_module_enabled( $module_options, 'card' ) ) {
				require_once 'bbvm-modules/card/bbvm-card-module.php';
				new BBVapor_Card_Module();
			}

			// Card Group Module.
			if ( $this->is_module_enabled( $module_options, 'card-group' ) ) {
				require_once 'bbvm-modules/card-group/bbvm-card-group-module.php';
				new BBVapor_Card_Group_Module();
			}

			// Before and After Module.
			if ( $this->is_module_enabled( $module_options, 'beforeafter' ) ) {
				require_once 'bbvm-modules/beforeafter/bbvm-beforeafter-module.php';
				new BBVapor_Before_After_Module();
			}

			// Alerts Module.
			if ( $this->is_module_enabled( $module_options, 'alerts' ) ) {
				require_once 'bbvm-modules/alerts/bbvm-alerts-module.php';
				new BBVapor_Alerts_Module();
			}

			// Animated Headlines Module.
			if ( $this->is_module_enabled( $module_options, 'animated-headlines' ) ) {
				require_once 'bbvm-modules/animated-headlines/bbvm-animated-headlines-module.php';
				new BBVapor_Animated_Headlines_Module();
			}

			// Variable Headings Module.
			if ( $this->is_module_enabled( $module_options, 'variable-headings' ) ) {
				require_once 'bbvm-modules/variable-headings/bbvm-variable-headings.php';
				new BBVapor_Variable_Headings_Module();
			}

			// Advanced Headings Module.
			if ( $this->is_module_enabled( $module_options, 'advanced-headings' ) ) {
				require_once 'bbvm-modules/advanced-headings/bbvm-advanced-headings.php';
				new BBVapor_Advanced_Headings_Module();
			}

			// Animated Button Module.
			if ( $this->is_module_enabled( $module_options, 'animated-button' ) ) {
				require_once 'bbvm-modules/animated-button/bbvm-animated-button.php';
				new BBVapor_Animated_Button_Module();
			}

			// Button Module.
			if ( $this->is_module_enabled( $module_options, 'button' ) ) {
				require_once 'bbvm-modules/button/bbvm-button.php';
				new BBVapor_Button_Module();
			}

			// Button Group Module.
			if ( $this->is_module_enabled( $module_options, 'button-group' ) ) {
				require_once 'bbvm-modules/button-group/bbvm-button-module.php';
				new BBVapor_Button_Group_Module();
			}

			// Blockquote Module.
			if ( $this->is_module_enabled( $module_options, 'blockquotes' ) ) {
				require_once 'bbvm-modules/blockquotes/bbvm-blockquotes-module.php';
				new BBVapor_Blockquotes_Module();
			}

			// FAQ Module.
			if ( $this->is_module_enabled( $module_options, 'faq' ) ) {
				require_once 'bbvm-modules/faq/bbvm-faq-module.php';
				new BBVapor_FAQ_Module();
			}

			// Testimonials Module.
			if ( $this->is_module_enabled( $module_options, 'testimonials' ) ) {
				require_once 'bbvm-modules/testimonials/bbvm-testimonials-module.php';
				new BBVapor_Testimonials_Module();
			}

			// Select Posts Module.
			if ( $this->is_module_enabled( $module_options, 'postselect' ) ) {
				require_once 'bbvm-modules/postselect/bbvm-post-select-module.php';
				new BBVapor_PostSelect_Module();
			}

			// Gists Module.
			if ( $this->is_module_enabled( $module_options, 'gist' ) ) {
				require_once 'bbvm-modules/gist/bbvm-gist-module.php';
				new BBVapor_Testimonials_Module();
			}

			// Unordered List Module.
			if ( $this->is_module_enabled( $module_options, 'unordered-list' ) ) {
				require_once 'bbvm-modules/unordered-list/bbvm-unordered-list-module.php';
				new BBVapor_Unordered_List_Module();
			}

			// Gravatar module.
			if ( $this->is_module_enabled( $module_options, 'gravatar' ) ) {
				require_once 'bbvm-modules/gravatar/bbvm-gravatar-module.php';
				new BBVapor_Gravatar_Module();
			}

			// Social Media Icons Module.
			if ( $this->is_module_enabled( $module_options, 'social-media-icons' ) ) {
				require_once 'bbvm-modules/social-media-icons/bbvm-social-media-module.php';
				new BBVapor_Social_Media_Module();
			}

			// Copyright Module.
			if ( $this->is_module_enabled( $module_options, 'copyright' ) ) {
				require_once 'bbvm-modules/copyright/bbvm-copyright-module.php';
				new BBVapor_Copyright_Module();
			}

			// Syntax highligheter module.
			if ( $this->is_module_enabled( $module_options, 'syntax-highlighter' ) ) {
				global $SyntaxHighlighter; // phpcs:ignore
				if ( is_object( $SyntaxHighlighter ) ) { // phpcs:ignore
					require_once 'bbvm-modules/syntax-highlighter/bbvm-syntax-highlighter-module.php';
					new BBVapor_Syntax_Highlighter_Module();
				}
			}
			if ( $this->is_module_enabled( $module_options, 'syntax-highlighter-native' ) ) {
				require_once 'bbvm-modules/syntax-highlighter-native/bbvm-syntax-highlighter-native-module.php';
				new BBVapor_Syntax_Highlighter_Native_Module();
			}

			// Jetpack Related Posts module.
			if ( $this->is_module_enabled( $module_options, 'jetpack-related-posts' ) ) {
				if ( class_exists( 'Jetpack_RelatedPosts' ) ) {
					require_once 'bbvm-modules/jetpack-related-posts/bbvm-jetpack-related-posts-module.php';
					new BBVapor_Jetpack_Related_Posts_Module();
				}
			}

			// Jetpack Sharing module.
			if ( $this->is_module_enabled( $module_options, 'jetpack-sharing' ) ) {
				if ( function_exists( 'sharing_display' ) ) {
					require_once 'bbvm-modules/jetpack-sharing/bbvm-jetpack-sharing.php';
					new BBVapor_Jetpack_Sharing_Module();
				}
			}

			// Restaurant Menu Module.
			if ( $this->is_module_enabled( $module_options, 'restaurant-menu-items' ) ) {
				require_once 'bbvm-modules/restaurant-menu-items/bbvm-restaurant-menu-items.php';
				new BBVapor_Restaurant_Menu_Item_Module();
			}

			// Restaurant Add Menu Item Module.
			if ( $this->is_module_enabled( $module_options, 'restaurant-menu-items' ) ) {
				require_once 'bbvm-modules/restaurant-menu-item/bbvm-restaurant-menu-item.php';
				new BBVapor_Restaurant_Menu_Item_Add_Module();
			}

			// Restaurant Add Menu Item Category Module.
			if ( $this->is_module_enabled( $module_options, 'restaurant-menu-category' ) ) {
				require_once 'bbvm-modules/restaurant-menu-category/bbvm-restaurant-menu-category.php';
				new BBVapor_Restaurant_Menu_Category();
			}

			// Spacers/Separators.
			if ( $this->is_module_enabled( $module_options, 'simple-spacer' ) ) {
				require_once 'bbvm-modules/simple-spacer/bbvm-simple-spacer-module.php';
				new BBVapor_Simple_Spacer_Module();
			}
			if ( $this->is_module_enabled( $module_options, 'simple-separator' ) ) {
				require_once 'bbvm-modules/simple-separator/bbvm-simple-separator.php';
				new BBVapor_Simple_Separator_Module();
			}
			if ( $this->is_module_enabled( $module_options, 'intermediate-separator' ) ) {
				require_once 'bbvm-modules/intermediate-separator/bbvm-intermediate-separator.php';
				new BBVapor_Intermediate_Separator_Module();
			}
			if ( $this->is_module_enabled( $module_options, 'advanced-separator' ) ) {
				require_once 'bbvm-modules/advanced-separator/bbvm-advanced-separator-module.php';
				new BBVapor_Advanced_Separator_Module();
			}

			// Vegas Slideshow.
			if ( $this->is_module_enabled( $module_options, 'vegas-slideshow' ) ) {
				require_once 'bbvm-modules/vegas-slideshow/bbvm-vegas-slideshow-module.php';
				new BBVapor_Vegas_Slideshow_Module();
			}

			// Restaurant Tabbed Module.
			if ( $this->is_module_enabled( $module_options, 'restaurant-menu-tabbed' ) ) {
				require_once 'bbvm-modules/restaurant-menu-tabbed/bbvm-restaurant-menu-tabbed.php';
				new BBVapor_Restaurant_Menu_Tabbed_Module();
			}

			// Gravity Forms.
			if ( $this->is_module_enabled( $module_options, 'gravityforms' ) ) {
				if ( class_exists( 'GFAPI' ) ) {
					require_once 'bbvm-modules/gravityforms/bbvm-gravityforms-module.php';
					new BBVapor_Gravityforms_Module();
				}
			}

			// Soliloquy.
			if ( class_exists( 'Soliloquy' ) ) {
				if ( $this->is_module_enabled( $module_options, 'soliloquy' ) ) {
					require_once 'bbvm-modules/soliloquy/bbvm-soliloquy-module.php';
					new BBVapor_Soliloquy_Module();
				}

				if ( class_exists( 'Soliloquy_Dynamic' ) ) {
					if ( $this->is_module_enabled( $module_options, 'soliloquy-dynamic' ) ) {
						require_once 'bbvm-modules/soliloquy-dynamic/bbvm-soliloquy-dynamic.php';
						new BBVapor_Soliloquy_Dynamic_Module();
					}
				}
			}

			// Instagram.
			if ( $this->is_module_enabled( $module_options, 'instagram' ) ) {
				require_once 'bbvm-modules/instagram/bbvm-instagram-module.php';
				new BBVapor_Instagram_Module();
			}

			// Featured Category.
			if ( $this->is_module_enabled( $module_options, 'featured-category' ) ) {
				require_once 'bbvm-modules/featured-category/bbvm-featured-category.php';
				new BBVapor_Featured_Category_Module();
			}

			// Category Grid.
			if ( $this->is_module_enabled( $module_options, 'category-grid' ) ) {
				require_once 'bbvm-modules/category-grid/bbvm-category-grid.php';
				new BBVapor_Category_Grid_Module();
			}

			// Photoproof.
			if ( $this->is_module_enabled( $module_options, 'photoproof' ) ) {
				if ( class_exists( 'Apollo13Framework' ) ) {
					require_once 'bbvm-modules/photoproof/bbvm-photoproof-module.php';
					new BBVapor_Photoproof_Module();
				}
			}

			// WooCommerce Modules.
			if ( class_exists( 'woocommerce' ) ) {
				if ( $this->is_module_enabled( $module_options, 'woocommerce-add-to-cart' ) ) {
					require_once 'bbvm-modules/woocommerce-add-to-cart/bbvm-woocommerce-add-to-cart.php';
					new BBVapor_WooCommerce_Add_To_Cart_Module();
				}
				if ( $this->is_module_enabled( $module_options, 'woocommerce-featured-products' ) ) {
					require_once 'bbvm-modules/woocommerce-featured-products/bbvm-woocommerce-featured-products.php';
					new BBVapor_WooCommerce_Featured_Products_Module();
				}
				if ( $this->is_module_enabled( $module_options, 'woocommerce-featured-category' ) ) {
					require_once 'bbvm-modules/woocommerce-featured-category/bbvm-woocommerce-featured-category.php';
					new BBVapor_WooCommerce_Featured_Category_Module();
				}
			}

			// Edd Modules.
			if ( class_exists( 'Easy_Digital_Downloads' ) ) {
				if ( $this->is_module_enabled( $module_options, 'edd-download-count' ) ) {
					require_once 'bbvm-modules/edd-download-count/bbvm-edd-download-count-module.php';
					new BBVapor_EDD_Download_Count_Module();
				}
			}

			add_shortcode( 'bbvm_bb_copyright', array( $this, 'bbvm_beaver_builder_copyright' ) );
		}
	}

	/**
	 * Output the Ajax URL for the front-end.
	 */
	public function bbvm_beaver_builder_ajax_url() {
		?>
	<script>
	var bbvm_beaver_builder_ajax_url = '<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>';
	</script>
		<?php
	}

	/**
	 * Load the Vegas row settings and run initialization.
	 */
	public function bbvm_beaver_builder_plugin_loaded() {
		add_filter( 'bbvapor_load', '__return_false' );

		add_action( 'init', array( $this, 'bbvm_beaver_builder_module_init' ), 20 );

		// Vegas.
		require_once 'includes/vegas-row-settings.php';
		bbvapor_modules_row_register_settings();
	}

	/**
	 * Shortcode for the copyright module.
	 *
	 * @param array $atts Shortcode attributes.
	 *
	 * @return string Copyright HTML.
	 */
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

		$copyright_html  = '';
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

/**
 * Add a large thumbnail size for WooCommerce sites.
 */
function bbvm_bb_add_image_sizes() {
	// Add a large WooCommerce Thumb.
	if ( class_exists( 'woocommerce' ) ) {
		add_image_size( 'woocommerce_large_thumb', 600, 600, true );
	}
}
add_action( 'after_setup_theme', 'bbvm_bb_add_image_sizes' );

if ( ! function_exists( 'bbvm_edd_download_count' ) ) {
	/**
	 * Track download counts for Easy Digital Downloads
	 *
	 * @param int    $id The download post ID.
	 * @param string $hash The download hash.
	 * @param string $license The download license.
	 * @param string $expires The expiration date.
	 */
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
