<?php // phpcs:ignoreline
/**
 * Plugin Name: BB Vapor Modules Pro
 * Plugin URI: https://bbvapormodules.com
 * Description: A growing selection of modules for Beaver Builder.
 * Version: 2.2.1
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
define( 'BBVAPOR_PRO_BEAVER_BUILDER_VERSION', '2.2.1' );
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
	 * Get an opening anchor based on link settings
	 *
	 * @param object $settings The Beaver Builder module settings object.
	 * @param string $name     The setting name to check for.
	 * @param string $class    The class to insert into an anchor.
	 *
	 * @return string Anchor HTML markup
	 */
	public static function get_starting_anchor( $settings, $name, $class = '' ) {
		$return = sprintf(
			'<a href="%s" class="%s"',
			esc_url( $settings->{$name} ),
			esc_attr( $class )
		);

		$no_follow = $name . '_nofollow';
		if ( isset( $settings->{$no_follow} ) && 'yes' === $settings->{$no_follow} ) {
			$return .= ' rel="nofollow"';
		}

		// Target.
		$target = $name . '_target';
		if ( isset( $settings->{$target} ) && ! empty( $settings->{$target} ) ) {
			$return .= sprintf( ' target="%s"', esc_attr( $settings->{$target} ) );
		}
		$return .= '>';
		return $return;
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
	 * Add Vapor to the front of all Vapor modules.
	 */
	public function render_scripts() {
		?>
		<style>
		form[class*="fl-builder-bbvm-"] .fl-lightbox-header h1:before {
			content: "Vapor " !important;
			position: relative;
			display: inline-block;
			margin-right: 5px;
		}
		</style>
		<?php
	}

	/**
	 * Register modules and blocks.
	 */
	public function bbvm_beaver_builder_module_init() {

		// Register Module Scripts.
		add_action( 'wp_head', array( $this, 'render_scripts' ) );

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

			// LearnDash modules.
			if ( defined( 'LEARNDASH_VERSION' ) ) {
				if ( $this->is_module_enabled( $module_options, 'learndash-profile' ) ) {
					require_once 'bbvm-modules/learndash-profile/bbvm-learndash-profile.php';
					new BBVapor_LearnDash_Profile();
				}
				if ( $this->is_module_enabled( $module_options, 'learndash-courses' ) ) {
					require_once 'bbvm-modules/learndash-courses/bbvm-learndash-courses.php';
					new BBVapor_LearnDash_Courses();
				}
				if ( $this->is_module_enabled( $module_options, 'learndash-lessons' ) ) {
					require_once 'bbvm-modules/learndash-lessons/bbvm-learndash-lessons.php';
					new BBVapor_LearnDash_Lessons();
				}
				if ( $this->is_module_enabled( $module_options, 'learndash-topics' ) ) {
					require_once 'bbvm-modules/learndash-topics/bbvm-learndash-topics.php';
					new BBVapor_LearnDash_Topics();
				}
				if ( $this->is_module_enabled( $module_options, 'learndash-quizzes' ) ) {
					require_once 'bbvm-modules/learndash-quizzes/bbvm-learndash-quizzes.php';
					new BBVapor_LearnDash_Quizzes();
				}
				if ( $this->is_module_enabled( $module_options, 'learndash-quiz' ) ) {
					require_once 'bbvm-modules/learndash-quiz/bbvm-learndash-quiz.php';
					new BBVapor_LearnDash_Quiz();
				}
				if ( $this->is_module_enabled( $module_options, 'learndash-course-content' ) ) {
					require_once 'bbvm-modules/learndash-course-content/bbvm-learndash-course-content.php';
					new BBVapor_LearnDash_Course_Content();
				}
				if ( $this->is_module_enabled( $module_options, 'learndash-course-info' ) ) {
					require_once 'bbvm-modules/learndash-course-info/bbvm-learndash-course-info.php';
					new BBVapor_LearnDash_Course_Info();
				}
				if ( $this->is_module_enabled( $module_options, 'learndash-course-progress' ) ) {
					require_once 'bbvm-modules/learndash-course-progress/bbvm-learndash-course-progress.php';
					new BBVapor_LearnDash_Course_Progress();
				}
				if ( $this->is_module_enabled( $module_options, 'learndash-course-status' ) ) {
					require_once 'bbvm-modules/learndash-course-status/bbvm-learndash-course-status.php';
					new BBVapor_LearnDash_Course_Status();
				}
				if ( $this->is_module_enabled( $module_options, 'learndash-messages' ) ) {
					require_once 'bbvm-modules/learndash-messages/bbvm-learndash-messages.php';
					new BBVapor_LearnDash_Messages();
				}
				if ( $this->is_module_enabled( $module_options, 'learndash-login' ) ) {
					require_once 'bbvm-modules/learndash-login/bbvm-learndash-login.php';
					new BBVapor_LearnDash_Login();
				}
				if ( $this->is_module_enabled( $module_options, 'learndash-user-status' ) ) {
					require_once 'bbvm-modules/learndash-user-status/bbvm-learndash-user-status.php';
					new BBVapor_LearnDash_User_Status();
				}
				if ( $this->is_module_enabled( $module_options, 'learndash-user-points' ) ) {
					require_once 'bbvm-modules/learndash-user-points/bbvm-learndash-user-points.php';
					new BBVapor_LearnDash_User_Points();
				}
				if ( $this->is_module_enabled( $module_options, 'learndash-payments' ) ) {
					require_once 'bbvm-modules/learndash-payments/bbvm-learndash-payments.php';
					new BBVapor_LearnDash_Payments();
				}
				if ( $this->is_module_enabled( $module_options, 'learndash-certificates' ) ) {
					require_once 'bbvm-modules/learndash-certificates/bbvm-learndash-certificates.php';
					new BBVapor_LearnDash_Certificates();
				}
			}

			// Emailoctopus module.
			if ( $this->is_module_enabled( $module_options, 'emailoctopus' ) && class_exists( 'EmailOctopus' ) ) {
				require_once 'bbvm-modules/emailoctopus/bbvm-emailoctopus.php';
				new BBVapor_EmailOctopus();
			}

			// WP Plugin Info Card module.
			if ( $this->is_module_enabled( $module_options, 'plugin-info-card' ) && function_exists( 'wppic_shortcode_function' ) ) {
				require_once 'bbvm-modules/plugin-info-card/bbvm-plugin-info-card.php';
				new BBVapor_Plugin_Info_card();
			}

			// Pricing table module.
			if ( $this->is_module_enabled( $module_options, 'pricing-table' ) ) {
				require_once 'bbvm-modules/pricing-table/bbvm-pricing-table.php';
				new BBVapor_Pricing_Table();
			}

			// TomTom Map module.
			if ( $this->is_module_enabled( $module_options, 'tomtom' ) ) {
				require_once 'bbvm-modules/tomtom/bbvm-tomtom.php';
				new BBVapor_TomTom();
			}

			// Simple Coupon module.
			if ( $this->is_module_enabled( $module_options, 'simple-coupon' ) ) {
				require_once 'bbvm-modules/simple-coupon/bbvm-simple-coupon.php';
				new BBVapor_Simple_Coupon();
			}

			// Advanced Coupon module.
			if ( $this->is_module_enabled( $module_options, 'advanced-coupon' ) ) {
				require_once 'bbvm-modules/advanced-coupon/bbvm-advanced-coupon.php';
				new BBVapor_Advanced_Coupon();
			}

			// Columns module.
			if ( $this->is_module_enabled( $module_options, 'columns' ) ) {
				require_once 'bbvm-modules/columns/bbvm-columns.php';
				new BBVapor_Columns();
			}

			// Timeline module.
			if ( $this->is_module_enabled( $module_options, 'timeline' ) ) {
				require_once 'bbvm-modules/timeline/bbvm-timeline.php';
				new BBVapor_Timeline_Module();
			}

			// Circular Carousel module.
			if ( $this->is_module_enabled( $module_options, 'circular-carousel' ) ) {
				require_once 'bbvm-modules/circular-carousel/bbvm-circular-carousel.php';
				new BBVapor_Circular_Carousel();
			}

			// Credit Card module.
			if ( $this->is_module_enabled( $module_options, 'credit-cards' ) ) {
				require_once 'bbvm-modules/credit-cards/bbvm-credit-cards.php';
				new BBVapor_Credit_Cards_Module();
			}

			// Calendly module.
			if ( $this->is_module_enabled( $module_options, 'calendly' ) ) {
				require_once 'bbvm-modules/calendly/bbvm-calendly-module.php';
				new BBVapor_Calendly_Module();
				// Customizer.
				add_action( 'customize_register', array( $this, 'calendly_customizer' ) );
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

			// Photo modules.
			if ( $this->is_module_enabled( $module_options, 'icon' ) ) {
				require_once 'bbvm-modules/icon/bbvm-icon.php';
				new BBVapor_Icon();
			}
			if ( $this->is_module_enabled( $module_options, 'photo' ) ) {
				require_once 'bbvm-modules/photo/bbvm-photo.php';
				new BBVapor_Photo();
			}
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

			// Featured Posts Module.
			if ( $this->is_module_enabled( $module_options, 'featured-post' ) ) {
				require_once 'bbvm-modules/featured-post/bbvm-featured-post.php';
				new BBVapor_Featured_Post();
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

			// Instagram Slideshow.
			if ( $this->is_module_enabled( $module_options, 'instagram-slideshow' ) ) {
				require_once 'bbvm-modules/instagram-slideshow/bbvm-instagram-slideshow.php';
				new BBVapor_Instagram_Slideshow();
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
	 * Add Calendly to the WordPress Customizer.
	 *
	 * @since 1.4.0
	 *
	 * @param  WP_Customize_Manager $customizer Customizer object.
	 */
	public function calendly_customizer( $customizer ) {
		$customizer->add_section(
			'Vapor Calendly',
			array(
				'title'      => __( 'Calendly', 'bb-vapor-modules-pro' ),
				'priority'   => 120,
				'capability' => 'edit_theme_options',
			)
		);

		// Calendly Enable.
		$customizer->add_setting(
			'bb-vapor-modules-pro-calendly[calendly-enable]',
			array(
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => array( $this, 'customizer_sanitize_checkbox' ),
				'type'              => 'option',
			)
		);

		$customizer->add_control(
			'bb-vapor-modules-pro-calendly[calendly-enable]',
			array(
				'type'        => 'checkbox',
				'label'       => __( 'Popup Enabled?', 'bb-vapor-modules-pro' ),
				'section'     => 'Vapor Calendly',
				'settings'    => 'bb-vapor-modules-pro-calendly[calendly-enable]',
				'priority'    => 10,
				'description' => __( 'Enable Calendly Popup', 'bb-vapor-modules-pro' ),
			)
		);

		$customizer->add_setting(
			'bb-vapor-modules-pro-calendly[bbvm_calendly_account]',
			array(
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
				'type'              => 'option',
			)
		);
		$customizer->add_control(
			new WP_Customize_Control(
				$customizer,
				'bb-vapor-modules-pro-calendly[bbvm_calendly_account]',
				array(
					'type'     => 'text',
					'label'    => __( 'Calendly Account Name', 'bb-vapor-modules-pro' ),
					'section'  => 'Vapor Calendly',
					'settings' => 'bb-vapor-modules-pro-calendly[bbvm_calendly_account]',
					'priority' => 10,
				)
			)
		);

		$customizer->add_setting(
			'bb-vapor-modules-pro-calendly[bbvm_calendly_button_text]',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => __( 'Schedule time with me', 'bb-vapor-modules-pro' ),
				'sanitize_callback' => 'sanitize_text_field',
				'type'              => 'option',
			)
		);
		$customizer->add_control(
			new WP_Customize_Control(
				$customizer,
				'bb-vapor-modules-pro-calendly[bbvm_calendly_button_text]',
				array(
					'type'     => 'text',
					'label'    => __( 'Calendly Button Text', 'bb-vapor-modules-pro' ),
					'section'  => 'Vapor Calendly',
					'settings' => 'bb-vapor-modules-pro-calendly[bbvm_calendly_button_text]',
					'priority' => 10,
				)
			)
		);

		$customizer->add_setting(
			'bbvm_calendly_button_background_color',
			array(
				'capability' => 'edit_theme_options',
				'default'    => '#00A2FF',
			)
		);
		$customizer->add_control(
			new WP_Customize_Color_Control(
				$customizer,
				'bbvm_calendly_button_background_color',
				array(
					'label'    => __( 'Calendly Button Background Color', 'bb-vapor-modules-pro' ),
					'section'  => 'Vapor Calendly',
					'settings' => 'bbvm_calendly_button_background_color',
					'priority' => 12,
				)
			)
		);

		$customizer->add_setting(
			'bbvm_calendly_button_text_color',
			array(
				'capability' => 'edit_theme_options',
				'default'    => '#FFFFFF',
			)
		);
		$customizer->add_control(
			new WP_Customize_Color_Control(
				$customizer,
				'bbvm_calendly_button_text_color',
				array(
					'label'    => __( 'Calendly Button Text Color', 'bb-vapor-modules-pro' ),
					'section'  => 'Vapor Calendly',
					'settings' => 'bbvm_calendly_button_text_color',
					'priority' => 12,
				)
			)
		);

		// Calendly Enable.
		$customizer->add_setting(
			'bb-vapor-modules-pro-calendly[page-settings-enable]',
			array(
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => array( $this, 'customizer_sanitize_checkbox' ),
				'type'              => 'option',
			)
		);

		$customizer->add_control(
			'bb-vapor-modules-pro-calendly[page-settings-enable]',
			array(
				'type'        => 'checkbox',
				'label'       => __( 'Page Settings Enabled?', 'bb-vapor-modules-pro' ),
				'section'     => 'Vapor Calendly',
				'settings'    => 'bb-vapor-modules-pro-calendly[page-settings-enable]',
				'priority'    => 14,
				'description' => __( 'Customize the look of your booking page to fit seamlessly into your website.', 'bb-vapor-modules-pro' ),
				'default'     => true,
			)
		);

		$customizer->add_setting(
			'bbvm_calendly_background_color',
			array(
				'capability' => 'edit_theme_options',
				'default'    => '#FFFFFF',
			)
		);
		$customizer->add_control(
			new WP_Customize_Color_Control(
				$customizer,
				'bbvm_calendly_background_color',
				array(
					'label'    => __( 'Background Color', 'bb-vapor-modules-pro' ),
					'section'  => 'Vapor Calendly',
					'settings' => 'bbvm_calendly_background_color',
					'priority' => 15,
				)
			)
		);

		$customizer->add_setting(
			'bbvm_calendly_text_color',
			array(
				'capability' => 'edit_theme_options',
				'default'    => '#4D5055',
			)
		);
		$customizer->add_control(
			new WP_Customize_Color_Control(
				$customizer,
				'bbvm_calendly_text_color',
				array(
					'label'    => __( 'Text Color', 'bb-vapor-modules-pro' ),
					'section'  => 'Vapor Calendly',
					'settings' => 'bbvm_calendly_text_color',
					'priority' => 16,
				)
			)
		);

		$customizer->add_setting(
			'bbvm_calendly_button_link_color',
			array(
				'capability' => 'edit_theme_options',
				'default'    => '#00A2FF',
			)
		);
		$customizer->add_control(
			new WP_Customize_Color_Control(
				$customizer,
				'bbvm_calendly_button_link_color',
				array(
					'label'    => __( 'Button and Link Color', 'bb-vapor-modules-pro' ),
					'section'  => 'Vapor Calendly',
					'settings' => 'bbvm_calendly_button_link_color',
					'priority' => 17,
				)
			)
		);
	}

	/**
	 * Sanitizes an input variable
	 *
	 * Sanitizes an input variable
	 *
	 * @since 1.4.0
	 * @access public
	 *
	 * @param bool $input Whether the input is checked or not.
	 *
	 * @return bool Whether the input is checked or not
	 */
	public function customizer_sanitize_checkbox( $input ) {
		// returns true if checkbox is checked.
		return ( $input ) ? true : false;
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

		add_action( 'wp_head', array( $this, 'maybe_include_calendly' ) );

		// Vegas.
		require_once 'includes/vegas-row-settings.php';
		bbvapor_modules_row_register_settings();
	}

	/**
	 * Include calendrly scripts.
	 */
	public function maybe_include_calendly() {
		$options = get_option( 'bb-vapor-modules-pro-calendly', false );
		if ( false === $options ) {
			return;
		}
		if ( true === $options['calendly-enable'] ) {
			?>
			<link href="https://assets.calendly.com/assets/external/widget.css" rel="stylesheet"><?php // phpcs:ignore ?>
			<script src="https://assets.calendly.com/assets/external/widget.js" type="text/javascript"></script><?php // phpcs:ignore ?>
			<script type="text/javascript">Calendly.initBadgeWidget({ url: 'https://calendly.com/<?php echo esc_js( $options['bbvm_calendly_account'] ); ?>?hide_landing_page_details=<?php echo true === $options['page-settings-enable'] ? 1 : 0; ?>&background_color=<?php echo str_replace( '#', '', esc_js( get_theme_mod( 'bbvm_calendly_background_color' ) ) ); ?>&text_color=<?php echo str_replace( '#', '', esc_js( get_theme_mod( 'bbvm_calendly_button_text_color' ) ) ); ?>&primary_color=<?php echo str_replace( '#', '', esc_js( get_theme_mod( 'bbvm_calendly_button_link_color' ) ) ); ?>', text: '<?php echo esc_js( $options['bbvm_calendly_button_text'] ); ?>', color: '<?php echo esc_js( get_theme_mod( 'bbvm_calendly_button_background_color' ) ); ?>', textColor: '<?php echo esc_js( get_theme_mod( 'bbvm_calendly_button_text_color' ) ); ?>', branding: false });</script> <?php // phpcs:ignore ?>
			<?php
		}
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
				'end'            => date( 'Y' ), // phpcs:ignore
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

if ( ! function_exists( 'bbvm_debug' ) ) {
	/**
	 * Debug the settings object.
	 *
	 * @param object $settings  The settings object.
	 * @param string $key       The key to retrieve (optional: default return all keys).
	 * @param bool   $error_log Whether to output to the error log or not (optional: default is print_r).
	 * @param bool   $echo       Whether to echo the output or not (optional; default is echo).
	 * @param bool   $die        Whether to die instead of returning.
	 *
	 * @return string Object data.
	 */
	function bbvm_debug( $settings, $key = '', $error_log = false, $echo = true, $die = false ) {
		$return = '';
		if ( isset( $settings->{$key} ) ) {
			$return .= '<pre>' . print_r( $settings->{$key}, true ) . '</pre>'; // phpcs:ignore
		} else {
			$return .= '<pre>' . print_r( $settings, true ) . '</pre>'; // phpcs:ignore
		}
		if ( $error_log ) {
			error_log( $return ); // phpcs:ignore
		}
		if ( $echo ) {
			echo $return; // phpcs:ignore
		}
		if ( $die ) {
			die( '' );
		}
		return $return;
	}
}
