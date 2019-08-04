<?php
class BBVM_Whitelabel {
	private $options = array();
	public function __construct() {
		$this->options = get_site_option( 'bbvm_whitelabel' );
	}

	public function register_hooks() {
		add_filter( 'bbvm_whitelabel_logo_small', array( $this, 'maybe_change_logo_small' ) );
		add_filter( 'bbvm_whitelabel_logo', array( $this, 'maybe_change_admin_logo' ) );
		add_filter( 'bbvm_whitelabel_admin_label', array( $this, 'maybe_change_admin_label' ) );
		add_filter( 'bbvm_whitelabel_admin_welcome', array( $this, 'maybe_change_admin_welcome' ) );
		add_filter( 'bbvm_whitelabel_menu_name', array( $this, 'maybe_change_menu_name' ) );
		add_filter( 'all_plugins', array( $this, 'maybe_change_plugin_name' ) );
	}

	public function maybe_change_logo_small( $logo ) {
		if ( isset( $this->options['small_logo'] ) && filter_var( $this->options['small_logo'], FILTER_VALIDATE_URL ) ) {
			return $this->options['small_logo'];
		}
		return $logo;
	}

	public function maybe_change_admin_logo( $logo ) {
		if ( isset( $this->options['large_logo'] ) && filter_var( $this->options['large_logo'], FILTER_VALIDATE_URL ) ) {
			return $this->options['large_logo'];
		}
		return $logo;
	}

	public function maybe_change_admin_welcome( $welcome_text ) {
		if ( isset( $this->options['welcome_label'] ) ) {
			return $this->options['welcome_label'];
		}
		return $welcome_text;
	}

	public function maybe_change_admin_label( $admin_label ) {
		if ( isset( $this->options['admin_label'] ) ) {
			return $this->options['admin_label'];
		}
		return $admin_label;
	}

	public function maybe_change_menu_name( $menu_title ) {
		if ( isset( $this->options['menu_title'] ) ) {
			return $this->options['menu_title'];
		}
		return $menu_title;
	}

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
}
