<?php
/**
 * White label settings
 *
 * White label settings for the plugin.
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
 * White label options for Vapor Modules
 *
 * @package BB Vapor Modules
 */
class BBVM_Whitelabel {
	/**
	 * Stores an array of white label options.
	 *
	 * @var array $options
	 */
	private $options = array();

	/**
	 * Class constructor.
	 */
	public function __construct() {
		$this->options = get_site_option( 'bbvm_whitelabel' );
	}

	/**
	 * Register hooks for overriding plugin settings.
	 */
	public function register_hooks() {
		add_filter( 'bbvm_whitelabel_logo_small', array( $this, 'maybe_change_logo_small' ) );
		add_filter( 'bbvm_whitelabel_logo', array( $this, 'maybe_change_admin_logo' ) );
		add_filter( 'bbvm_whitelabel_admin_label', array( $this, 'maybe_change_admin_label' ) );
		add_filter( 'bbvm_whitelabel_admin_welcome', array( $this, 'maybe_change_admin_welcome' ) );
		add_filter( 'bbvm_whitelabel_menu_name', array( $this, 'maybe_change_menu_name' ) );
		add_filter( 'all_plugins', array( $this, 'maybe_change_plugin_name' ) );
		add_filter( 'bbvm_whitelabel_category', array( $this, 'maybe_change_bb_category_name' ) );
	}

	/**
	 * Override the small logo in the admin section.
	 *
	 * @param string $logo New logo URL.
	 *
	 * @return string New or default logo.
	 */
	public function maybe_change_logo_small( $logo ) {
		if ( isset( $this->options['small_logo'] ) && filter_var( $this->options['small_logo'], FILTER_VALIDATE_URL ) ) {
			return $this->options['small_logo'];
		}
		return $logo;
	}

	/**
	 * Override the large logo in the admin section.
	 *
	 * @param string $logo New logo URL.
	 *
	 * @return string New or default logo.
	 */
	public function maybe_change_admin_logo( $logo ) {
		if ( isset( $this->options['large_logo'] ) && filter_var( $this->options['large_logo'], FILTER_VALIDATE_URL ) ) {
			return $this->options['large_logo'];
		}
		return $logo;
	}

	/**
	 * Change the welcome text in the admin area.
	 *
	 * @param string $welcome_text Default welcome text.
	 *
	 * @return string New or default welcome text.
	 */
	public function maybe_change_admin_welcome( $welcome_text ) {
		if ( isset( $this->options['welcome_label'] ) ) {
			return $this->options['welcome_label'];
		}
		return $welcome_text;
	}

	/**
	 * Change the admin label for the plugin.
	 *
	 * @param string $admin_label Default welcome text.
	 *
	 * @return string New or default admin label.
	 */
	public function maybe_change_admin_label( $admin_label ) {
		if ( isset( $this->options['admin_label'] ) ) {
			return $this->options['admin_label'];
		}
		return $admin_label;
	}

	/**
	 * Change the menu title for the plugin.
	 *
	 * @param string $menu_title Default menu title.
	 *
	 * @return string New or default admin label.
	 */
	public function maybe_change_menu_name( $menu_title ) {
		if ( isset( $this->options['menu_title'] ) ) {
			return $this->options['menu_title'];
		}
		return $menu_title;
	}

	/**
	 * Change the plugin name.
	 *
	 * @param array $plugins Array of plugins for the site.
	 *
	 * @return array Updated plugins array.
	 */
	public function maybe_change_plugin_name( $plugins ) {
		foreach ( $plugins as $slug => &$data ) {
			if ( 'BB Vapor Modules Pro' === $data['Name'] ) {
				$data['Name']        = isset( $this->options['plugin_name'] ) ? esc_html( $this->options['plugin_name'] ) : 'BB Vapor Modules Pro';
				$data['Title']       = isset( $this->options['plugin_name'] ) ? esc_html( $this->options['plugin_name'] ) : 'BB Vapor Modules Pro';
				$data['AuthorName']  = isset( $this->options['plugin_author'] ) ? esc_html( $this->options['plugin_author'] ) : 'Ronald Huereca';
				$data['Author']      = isset( $this->options['plugin_author'] ) ? esc_html( $this->options['plugin_author'] ) : 'Ronald Huereca';
				$data['PluginURI']   = isset( $this->options['plugin_author_url'] ) ? esc_url( $this->options['plugin_author_url'] ) : 'https://bbvapormodules.com';
				$data['AuthorURI']   = isset( $this->options['plugin_site'] ) ? esc_url( $this->options['plugin_site'] ) : 'https://mediaron.com';
				$data['Description'] = isset( $this->options['plugin_author_description'] ) ? esc_html( $this->options['plugin_author_description'] ) : 'A growing selection of modules for Beaver Builder.';
			}
		}
		return $plugins;
	}

	/**
	 * Change the category name in Beaver Builder.
	 *
	 * @param string $category The default category for Beaver Builder.
	 *
	 * @return string Updated or default category.
	 */
	public function maybe_change_bb_category_name( $category ) {
		if ( isset( $this->options['plugin_bb_category'] ) ) {
			return $this->options['plugin_bb_category'];
		}
		return $category;
	}
}
