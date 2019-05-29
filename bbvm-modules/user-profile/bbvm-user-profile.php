<?php
class BBVapor_User_Profile_Module extends FLBuilderModule {
	public function __construct()
	{
		parent::__construct(array(
			'name'            => __( 'User Profile', 'bb-vapor-modules-pro' ),
			'description'     => __( 'Add User Profile', 'bb-vapor-modules-pro' ),
			'category'        => __( 'Base', 'bb-vapor-modules-pro' ),
			'group'           => __( 'Vapor', 'bb-vapor-modules-pro' ),
			'dir'             => BBVAPOR_PRO_BEAVER_BUILDER_DIR . 'bbvm-modules/user-profile/',
			'url'             => BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/user-profile/',
			'editor_export'   => true, // Defaults to true and can be omitted.
			'enabled'         => true, // Defaults to true and can be omitted.
			'partial_refresh' => false, // Defaults to false and can be omitted.
		));
	}
}
FLBuilder::register_module('BBVapor_User_Profile_Module', array(
	'general'       => array( // Tab
		'title'         => __('Settings', 'bb-vapor-modules-pro'), // Tab title
		'sections'      => array( // Tab Sections
			'general'       => array( // Section
				'title'         => __('Settings', 'bb-vapor-modules-pro'), // Section Title
				'fields'        => array( // Section Fields
					'post_author' => array(
						'type' => 'select',
						'label' => __( 'Use Post Author', 'mediaron-bb-modules' ),
						'options' => array(
							'yes' => __( 'Yes', 'mediaron-bb-modules' ),
							'no' => __( 'No', 'mediaron-bb-modules' ),
						),
						'default' => 'yes',
						'toggle' => array(
							'no' => array( 'fields' => array( 'user' ) )
						)
					),
					'user' => array(
						'type'          => 'suggest',
						'label'         => __('User ID', 'bb-vapor-modules-pro'),
						'action'        => 'fl_as_users',
						'limit'         => 1
					),
					'theme' => array(
						'type' => 'select',
						'label' => __( 'Select a Profile Theme', 'bb-vapor-modules-pro' ),
						'options' => array(
							'regular' => __( 'Regular', 'bb-vapor-modules-pro' ),
							'compact' => __( 'Compact', 'bb-vapor-modules-pro' ),
							'profile' => __( 'Profile', 'bb-vapor-modules-pro' ),
							'tabbed'  => __( 'Tabbed', 'bb-vapor-modules-pro' ),
						),
						'default' => 'regular',
						'toggle' => array(
							'compact' => array( 'fields' => array( 'compact_align' ) ),
							'tabbed' => array( 'tabs' => array( 'tabs' ) )
						)
					),
					'compact_align' => array(
						'type' => 'select',
						'label' => __( 'Select Compact Alignment', 'bb-vapor-modules-pro' ),
						'options' => array(
							'left'  => __( 'Left', 'bb-vapor-modules-pro' ),
							'center' => __( 'Center', 'bb-vapor-modules-pro' ),
							'right' => __( 'Right', 'bb-vapor-modules-pro' ),
						),
						'default' => 'center'
					),
					'avatar_shape' => array(
						'type' => 'select',
						'label' => __( 'Select an Avatar Shape', 'bb-vapor-modules-pro' ),
						'options' => array(
							'square'  => __( 'Square', 'bb-vapor-modules-pro' ),
							'round' => __( 'Rounded', 'bb-vapor-modules-pro' ),
						),
						'default' => 'rounded'
					),
					'padding' => array(
						'type' => 'unit',
						'label' => __( 'Select a Padding', 'bb-vapor-modules-pro' ),
						'default' => '10'
					),
					'border_width' => array(
						'type' => 'unit',
						'label' => __( 'Select a Border Width', 'bb-vapor-modules-pro' ),
						'default' => '1'
					),
					'border_radius' => array(
						'type' => 'unit',
						'label' => __( 'Select a Border Radius', 'bb-vapor-modules-pro' ),
						'default' => '5'
					),
					'border_color' => array(
						'type' => 'color',
						'label' => __( 'Select a Border Color', 'bb-vapor-modules-pro' ),
						'default' => '000000'
					),
					'profile_background_color' => array(
						'type' => 'color',
						'label' => __( 'Select a Profile Background Color', 'bb-vapor-modules-pro' ),
						'default' => 'FFFFFF'
					)
					,
					'profile_text_color' => array(
						'type' => 'color',
						'label' => __( 'Select a Profile Text Color', 'bb-vapor-modules-pro' ),
						'default' => '000000'
					),
					'show_name' => array(
						'type' => 'select',
						'label' => __( 'Show Name', 'bb-vapor-modules-pro' ),
						'options' => array(
							'yes'  => __( 'Yes', 'bb-vapor-modules-pro' ),
							'no' => __( 'No', 'bb-vapor-modules-pro' ),
						),
						'default' => 'yes'
					),
					'show_title' => array(
						'type' => 'select',
						'label' => __( 'Show Title', 'bb-vapor-modules-pro' ),
						'options' => array(
							'yes'  => __( 'Yes', 'bb-vapor-modules-pro' ),
							'no' => __( 'No', 'bb-vapor-modules-pro' ),
						),
						'default' => 'no',
						'toggle' => array( 'yes' => array( 'fields' => array( 'title' ) ) )
					),
					'title' => array(
						'type'        => 'text',
						'label'       => __( 'Enter a Title', 'bb-vapor-modules-pro' ),
					),
					'font_size' => array(
						'type'        => 'unit',
						'label'       => __( 'Font Size', 'bb-vapor-modules-pro' ),
						'description' => 'px',
						'default'     => '18'
					),
					'avatar_size' => array(
						'type'        => 'unit',
						'label'       => __( 'Avatar Size', 'bb-vapor-modules-pro' ),
						'description' => 'px',
						'default'     => '150'
					),
					'header_font_size' => array(
						'type'        => 'unit',
						'label'       => __( 'Header Font Size', 'bb-vapor-modules-pro' ),
						'description' => 'px',
						'default'     => '24'
					),
					'profile_font_size' => array(
						'type'        => 'unit',
						'label'       => __( 'Profile Font Size', 'bb-vapor-modules-pro' ),
						'description' => 'px',
						'default'     => '18'
					),
					'profile_link_color' => array(
						'type'        => 'color',
						'label'       => __( 'Profile Link Color', 'bb-vapor-modules-pro' ),
						'default'     => '000000'
					),
					'show_description' => array(
						'type' => 'select',
						'label' => __( 'Show Description', 'bb-vapor-modules-pro' ),
						'options' => array(
							'yes'  => __( 'Yes', 'bb-vapor-modules-pro' ),
							'no' => __( 'No', 'bb-vapor-modules-pro' ),
						),
						'default' => 'yes'
					),
					'show_view_posts' => array(
						'type' => 'select',
						'label' => __( 'Show View Posts', 'bb-vapor-modules-pro' ),
						'options' => array(
							'yes'  => __( 'Yes', 'bb-vapor-modules-pro' ),
							'no' => __( 'No', 'bb-vapor-modules-pro' ),
						),
						'default' => 'yes'
					),
					'view_posts_background_color' => array(
						'type' => 'color',
						'label' => __( 'Select a View Posts Background Color', 'bb-vapor-modules-pro' ),
						'default' => 'cf6d38'
					),
					'view_posts_text_color' => array(
						'type' => 'color',
						'label' => __( 'Select a View Posts Text Color', 'bb-vapor-modules-pro' ),
						'default' => 'FFFFFF'
					),
					'button_font_size' => array(
						'type'        => 'unit',
						'label'       => __( 'Button Font Size', 'bb-vapor-modules-pro' ),
						'description' => 'px',
						'default'     => '18'
					),
					'show_website' => array(
						'type' => 'select',
						'label' => __( 'Show Website', 'bb-vapor-modules-pro' ),
						'options' => array(
							'yes'  => __( 'Yes', 'bb-vapor-modules-pro' ),
							'no' => __( 'No', 'bb-vapor-modules-pro' ),
						),
						'default' => 'no',
						'toggle' => array(
							'yes' => array( 'fields' => array( 'website_background_color', 'website_text_color', 'website_url' ) )
						)
					),
					'website_url' => array(
						'type' => 'text',
						'label' => __( 'Website URL', 'bb-vapor-modules-pro' ),
						'default' => ''
					),
					'website_background_color' => array(
						'type' => 'color',
						'label' => __( 'Select a Website Background Color', 'bb-vapor-modules-pro' ),
						'default' => '333333'
					),
					'website_text_color' => array(
						'type' => 'color',
						'label' => __( 'Select a Website Text Color', 'bb-vapor-modules-pro' ),
						'default' => 'FFFFFF'
					),
					'show_social_media' => array(
						'type' => 'select',
						'label' => __( 'Show Social Media', 'bb-vapor-modules-pro' ),
						'options' => array(
							'yes'  => __( 'Yes', 'bb-vapor-modules-pro' ),
							'no' => __( 'No', 'bb-vapor-modules-pro' ),
						),
						'default' => 'yes',
						'toggle' => array(
							'yes' => array( 'tabs' => array( 'social_media' ) )
						)
					),

				)
			)
		)
	),
	'social_media'       => array( // Tab
		'title'         => __('Social Media', 'bb-vapor-modules-pro'), // Tab title
		'sections'      => array( // Tab Sections
			'social_media'       => array( // Section
				'title'         => __('Social Media', 'bb-vapor-modules-pro'), // Section Title
				'fields'        => array( // Section Fields
					'show_brand_colors' => array(
						'type' => 'select',
						'label' => __( 'Show Brand Colors', 'bb-vapor-modules-pro' ),
						'options' => array(
							'brand'  => __( 'Yes', 'bb-vapor-modules-pro' ),
							'custom' => __( 'No', 'bb-vapor-modules-pro' ),
						),
						'default' => 'brand',
						'toggle' => array(
							'custom' => array( 'fields' => array( 'social_fill_color' ) )
						)
					),
					'social_fill_color' => array(
						'type' => 'color',
						'label' => __( 'Enter a Fill Color', 'bb-vapor-modules-pro' )
					),
					'wordpress' => array(
						'type'        => 'text',
						'label'       => __( 'Enter a WordPress URL', 'bb-vapor-modules-pro' ),
						'default' => ''
					),
					'facebook' => array(
						'type'        => 'text',
						'label'       => __( 'Enter a Facebook URL', 'bb-vapor-modules-pro' ),
						'default' => ''
					),
					'twitter' => array(
						'type'        => 'text',
						'label'       => __( 'Enter a Twitter URL', 'bb-vapor-modules-pro' ),
						'default' => ''
					),
					'instagram' => array(
						'type'        => 'text',
						'label'       => __( 'Enter an Instagram URL', 'bb-vapor-modules-pro' ),
						'default' => ''
					),
					'pinterest' => array(
						'type'        => 'text',
						'label'       => __( 'Enter a Pinterest URL', 'bb-vapor-modules-pro' ),
						'default' => ''
					),
					'linkedin' => array(
						'type'        => 'text',
						'label'       => __( 'Enter a LinkedIn URL', 'bb-vapor-modules-pro' ),
						'default' => ''
					),
					'youtube' => array(
						'type'        => 'text',
						'label'       => __( 'Enter a YouTube URL', 'bb-vapor-modules-pro' ),
						'default' => ''
					),
					'github' => array(
						'type'        => 'text',
						'label'       => __( 'Enter a GitHub URL', 'bb-vapor-modules-pro' ),
						'default' => ''
					),

				)
			)
		)
	),
	'tabs'       => array( // Tab
		'title'         => __('Tabbed Settings', 'bb-vapor-modules-pro'), // Tab title
		'sections'      => array( // Tab Sections
			'tabs'       => array( // Section
				'title'         => __('Tabbed Settings', 'bb-vapor-modules-pro'), // Section Title
				'fields'        => array( // Section Fields
					'tabbed_profile_title' => array(
						'type' => 'text',
						'label' => __( 'Tabbed Profile Title', 'bb-vapor-modules-pro' ),
						'default' => ''
					),
					'tabbed_subheading' => array(
						'type' => 'text',
						'label' => __( 'Tabbed Subheading', 'bb-vapor-modules-pro' ),
						'default' => ''
					),
					'tabbed_author_heading' => array(
						'type' => 'text',
						'label' => __( 'Tabbed Author Heading', 'bb-vapor-modules-pro' ),
						'default' => __( 'Author', 'bb-vapor-modules-pro' )
					),
					'tabbed_latest_posts_heading' => array(
						'type' => 'text',
						'label' => __( 'Tabbed Latest Posts Heading', 'bb-vapor-modules-pro' ),
						'default' => __( 'Latest Posts', 'bb-vapor-modules-pro' )
					),
					'tabbed_author_heading' => array(
						'type' => 'text',
						'label' => __( 'Tabbed Author Heading', 'bb-vapor-modules-pro' ),
						'default' => __( 'Author Information', 'bb-vapor-modules-pro' )
					),
					'tabbed_latest_posts_theme' => array(
						'type' => 'select',
						'label' => __( 'Latest Posts Theme', 'bb-vapor-modules-pro' ),
						'options' => array(
							'none' => __( 'None', 'bb-vapor-modules-pro' ),
							'white' => __( 'White', 'bb-vapor-modules-pro' ),
							'light' => __( 'Light', 'bb-vapor-modules-pro' ),
							'black' => __( 'Black', 'bb-vapor-modules-pro' ),
							'magenta' => __( 'Magenta', 'bb-vapor-modules-pro' ),
							'blue' => __( 'Blue', 'bb-vapor-modules-pro' ),
							'green' => __( 'Green', 'bb-vapor-modules-pro' ),
						),
						'default' => 'white'
					),
					'tab_color' => array(
						'type' => 'color',
						'label' => __( 'Enter a Tab Color', 'bb-vapor-modules-pro' ),
						'default' => '333333',
					),
					'tab_post_color' => array(
						'type' => 'color',
						'label' => __( 'Enter a Tab Color for Posts', 'bb-vapor-modules-pro' ),
						'default' => '333333',
					),
					'tab_headline_color' => array(
						'type' => 'color',
						'label' => __( 'Enter a Tab Headline Color', 'bb-vapor-modules-pro' ),
						'default' => '333333',
					),
					'tab_headline_text_color' => array(
						'type' => 'color',
						'label' => __( 'Enter a Tab Headline Text Color', 'bb-vapor-modules-pro' ),
						'default' => 'FFFFFF',
					),
					'tab_text_color' => array(
						'type' => 'color',
						'label' => __( 'Enter a Tab Text Color', 'bb-vapor-modules-pro' ),
						'default' => 'FFFFFF',
					),
					'tab_post_text_color' => array(
						'type' => 'color',
						'label' => __( 'Enter a Tab Post Text Color', 'bb-vapor-modules-pro' ),
						'default' => 'FFFFFF',
					),

				)
			)
		)
	),
) );
