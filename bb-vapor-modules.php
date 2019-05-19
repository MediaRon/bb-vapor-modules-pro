<?php
/**
 * Plugin Name: BB Vapor Modules
 * Plugin URI: https://bbvapormodules.com
 * Description: A selection of modules for Beaver Builder.
 * Version: 1.0.0
 * Author: Ronald Huereca
 * Author URI: https://mediaron.com
 * Requires at least: 5.0
 * Contributors: ronalfy
 * Text Domain: bb-vapor-modules
 * Domain Path: /languages
 */
define( 'BBVAPOR_PLUGIN_FREE', true );
define( 'BBVAPOR_PLUGIN_NAME', 'BB Vapor Modules' );
define( 'BBVAPOR_BEAVER_BUILDER_DIR', plugin_dir_path( __FILE__ ) );
define( 'BBVAPOR_BEAVER_BUILDER_URL', plugins_url( '/', __FILE__ ) );
define( 'BBVAPOR_BEAVER_BUILDER_VERSION', '1.0.0' );
define( 'BBVAPOR_BEAVER_BUILDER_SLUG', plugin_basename(__FILE__) );
define( 'BBVAPOR_INSTAGRAM_CLIENT_ID', '8dba23ca2c1c45509c32343db0d37a96' );
define( 'BBVAPOR_INSTAGRAM_CLIENT_SECRET', '60a83038c1ff42deb69a47ccce7c5eb1' );

class BBVapor_Modules {

	public function __construct() {
		add_action( 'plugin_loaded', array( $this, 'bbvm_beaver_builder_plugin_loaded' ) );

		// Load text domain
		load_plugin_textdomain( 'bb-vapor-modules', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
	}
	public function bbvm_beaver_builder_module_init() {

		require_once( 'includes/bbvm-beaverbuilder-admin.php' );
		new BBVapor_BeaverBuilder_Admin();

		if ( class_exists( 'FLBuilder' ) ) {

			add_action( 'wp_head', array( $this, 'bbvm_beaver_builder_ajax_url' ) );

			// Breadcrumb module
			require_once 'bbvm-modules/basic-breadcrumbs-module/bbvm-breadcrumbs-module.php';
			new BBVapor_Breadcrumbs_Module();

			// Photo overlay module
			require_once 'bbvm-modules/photo-overlay/bbvm-photo-overlay-module.php';
			new BBVapor_Photo_Overlay_Module();

			// Card Module
			require_once 'bbvm-modules/card/bbvm-card-module.php';
			new BBVapor_Card_Module();

			// Alerts Module
			require_once 'bbvm-modules/alerts/bbvm-alerts-module.php';
			new BBVapor_Alerts_Module();

			// Animated Button Module
			require_once 'bbvm-modules/animated-button/bbvm-animated-button.php';
			new BBVapor_Animated_Button_Module();

			// Button Module
			require_once 'bbvm-modules/button/bbvm-button.php';
			new BBVapor_Button_Module();

			// Gists Module
			require_once 'bbvm-modules/gist/bbvm-gist-module.php';
			new BBVapor_Gist_Module();

			// Gravatar module
			require_once 'bbvm-modules/gravatar/bbvm-gravatar-module.php';
			new BBVapor_Gravatar_Module();

			// Social Media Icons Module
			require_once 'bbvm-modules/social-media-icons/bbvm-social-media-module.php';
			new BBVapor_Social_Media_Module();

			// Copyright Module
			require_once 'bbvm-modules/copyright/bbvm-copyright-module.php';
			new BBVapor_Copyright_Module();

			// Syntax highlighter module
			global $SyntaxHighlighter;
			if( is_object( $SyntaxHighlighter ) ) {
				require_once 'bbvm-modules/syntax-highlighter/bbvm-syntax-highlighter-module.php';
				new BBVapor_Syntax_Highlighter_Module();
			}

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

			// Instagram
			require_once 'bbvm-modules/instagram/bbvm-instagram-module.php';
			new BBVapor_Instagram_Module();

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

		if ( ! apply_filters( 'bbvapor_load', true ) ) {
			return;
		}

		add_action( 'init', array( $this, 'bbvm_beaver_builder_module_init' ), 20 );

		// Vegas
		require_once 'includes/vegas-row-settings.php';
		bbvapor_modules_row_register_settings();
	}

	public function bbvm_beaver_builder_copyright( $atts ) {
		$args = shortcode_atts( array(
			'site' => get_bloginfo( 'sitename' ),
			'start' => false,
			'end' => date('Y'),
			'copyright_text' => __( 'Copyright', 'bb-vapor-modules' ),
			'symbol' => '&copy;'
		), $atts );
		$copyright_html = '';
		$copyright_html .= $args['symbol'] . '&nbsp;';
		if( false !== $args['start'] ) {
			$copyright_html .= esc_html( $args['start'] ) . '-';
		}
		$copyright_html .= esc_html( $args['end'] );
		$copyright_html .= '&nbsp';
		$copyright_html .= esc_html( $args['copyright_text'] ) . '&nbsp';
		$copyright_html .= esc_html( $args['site'] );
		return $copyright_html;
	}
}

function bbvm_instagram_get_sig( $instagramUserId, $instagramToken, $maxId, $feedCount ) {
	$params = array(
		'access_token' => $instagramToken,
		'count' => $feedCount
	);
	if( false !== $maxId ) {
		$params['max_id'] = $maxId;
	}
	$endpoint = sprintf( '/users/%d/media/recent', $instagramUserId );
	$sig = bbvm_instagram_generage_sig( $endpoint, $params, BBVAPOR_INSTAGRAM_CLIENT_SECRET );
	return $sig;
}
function bbvm_instagram_generage_sig($endpoint, $params, $secret) {
	$sig = $endpoint;
	ksort($params);
	foreach ($params as $key => $val) {
		$sig .= "|$key=$val";
	}
	return hash_hmac('sha256', $sig, $secret, false);
}

new BBVapor_Modules();