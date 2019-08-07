<?php // phpcs:ignore
class BBVapor_Twitter_Embed extends FLBuilderModule {
	/**
	 * Class Constructor.
	 */
	public function __construct() {
		parent::__construct(
			array(
				'name'            => __( 'Twitter Embed', 'bb-vapor-modules-pro' ),
				'description'     => __( 'Twitter Embed for Beaver Builder', 'bb-vapor-modules-pro' ),
				'category'        => __( 'Base', 'bb-vapor-modules-pro' ),
				'group'           => apply_filters( 'bbvm_whitelabel_category', __( 'Vapor', 'bb-vapor-modules-pro' ) ),
				'dir'             => BBVAPOR_PRO_BEAVER_BUILDER_DIR . 'bbvm-modules/twitter-embed/',
				'url'             => BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/twitter-embed/',
				'editor_export'   => true, // Defaults to true and can be omitted.
				'enabled'         => true, // Defaults to true and can be omitted.
				'partial_refresh' => false, // Defaults to false and can be omitted.
			)
		);
	}
}
/**
 * Register the module and its form settings.
 */
FLBuilder::register_module(
	'BBVapor_Twitter_Embed',
	array(
		'general' => array(
			'title'    => __( 'General', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'general' => array(
					'title'  => __( 'Twitter Embed', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'tweet'       => array(
							'type'    => 'text',
							'label'   => __( 'Enter Your Tweet URL Here', 'bb-vapor-modules-pro' ),
							'default' => 'https://twitter.com/mediaronllc/status/1140182354855677955',
						),
						'size'        => array(
							'type'    => 'unit',
							'label'   => __( 'Embed Max Width', 'bb-vapor-modules-pro' ),
							'default' => 550,
							'slider'  => array(
								'min'  => 220,
								'max'  => 550,
								'step' => 5,
							),
						),
						'align'       => array(
							'type'    => 'select',
							'label'   => __( 'Align', 'bb-vapor-modules-pro' ),
							'options' => array(
								'none'   => __( 'None', 'bb-vapor-modules-pro' ),
								'left'   => __( 'Left', 'bb-vapor-modules-pro' ),
								'center' => __( 'Center', 'bb-vapor-modules-pro' ),
								'right'  => __( 'Right', 'bb-vapor-modules-pro' ),
							),
							'default' => 'center',
						),
						'lang'        => array(
							'type'    => 'select',
							'label'   => __( 'Language', 'bb-vapor-modules-pro' ),
							'default' => 'en',
							'options' => array(
								'en'    => __( 'English', 'bb-vapor-modules-pro' ),
								'ar'    => __( 'Arabic', 'bb-vapor-modules-pro' ),
								'bn'    => __( 'Bengali', 'bb-vapor-modules-pro' ),
								'cs'    => __( 'Czech', 'bb-vapor-modules-pro' ),
								'da'    => __( 'Danish', 'bb-vapor-modules-pro' ),
								'de'    => __( 'German', 'bb-vapor-modules-pro' ),
								'el'    => __( 'Greek', 'bb-vapor-modules-pro' ),
								'es'    => __( 'Spanish', 'bb-vapor-modules-pro' ),
								'fa'    => __( 'Persian', 'bb-vapor-modules-pro' ),
								'fi'    => __( 'Finish', 'bb-vapor-modules-pro' ),
								'fil'   => __( 'Filipino', 'bb-vapor-modules-pro' ),
								'fr'    => __( 'French', 'bb-vapor-modules-pro' ),
								'he'    => __( 'Hebrew', 'bb-vapor-modules-pro' ),
								'hi'    => __( 'Hindi', 'bb-vapor-modules-pro' ),
								'hu'    => __( 'Hungarian', 'bb-vapor-modules-pro' ),
								'id'    => __( 'Indonesian', 'bb-vapor-modules-pro' ),
								'it'    => __( 'Italian', 'bb-vapor-modules-pro' ),
								'ja'    => __( 'Japanese', 'bb-vapor-modules-pro' ),
								'ko'    => __( 'Korean', 'bb-vapor-modules-pro' ),
								'msa'   => __( 'Malaysian', 'bb-vapor-modules-pro' ),
								'nl'    => __( 'Dutch', 'bb-vapor-modules-pro' ),
								'no'    => __( 'Norwegian', 'bb-vapor-modules-pro' ),
								'pl'    => __( 'Polish', 'bb-vapor-modules-pro' ),
								'pt'    => __( 'Portuguese', 'bb-vapor-modules-pro' ),
								'ro'    => __( 'Romanian', 'bb-vapor-modules-pro' ),
								'ru'    => __( 'Russian', 'bb-vapor-modules-pro' ),
								'sv'    => __( 'Swedish', 'bb-vapor-modules-pro' ),
								'th'    => __( 'Thai', 'bb-vapor-modules-pro' ),
								'tr'    => __( 'Turkish', 'bb-vapor-modules-pro' ),
								'uk'    => __( 'Ukranian', 'bb-vapor-modules-pro' ),
								'ur'    => __( 'Urdu', 'bb-vapor-modules-pro' ),
								'vi'    => __( 'Vietnamese', 'bb-vapor-modules-pro' ),
								'zh-cn' => __( 'Chinese (Simplified', 'bb-vapor-modules-pro' ),
								'zh-tw' => __( 'Chinese (Traditional)', 'bb-vapor-modules-pro' ),
							),
						),
						'hide_media'  => array(
							'type'    => 'select',
							'label'   => __( 'Hide Media', 'bb-vapor-modules-pro' ),
							'options' => array(
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
							),
							'default' => 'no',
						),
						'hide_thread' => array(
							'type'    => 'select',
							'label'   => __( 'Hide Thread', 'bb-vapor-modules-pro' ),
							'options' => array(
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
							),
							'default' => 'no',
						),
						'related'     => array(
							'type'  => 'text',
							'label' => __( 'Related Twitter Usernames (Comma Separated)', 'bb-vapor-modules-pro' ),
						),
					),
				),
			),
		),
		'styles'  => array(
			'title'    => __( 'Styles', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'styles' => array(
					'title'  => __( 'Styles', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'tweet_padding' => array(
							'type'  => 'dimension',
							'label' => __( 'Select a Padding', 'bb-vapor-modules-pro' ),
						),
						'twitter_theme' => array(
							'type'    => 'select',
							'label'   => __( 'Select a Theme', 'bb-vapor-modules-pro' ),
							'default' => 'light',
							'options' => array(
								'light' => __( 'Light', 'bb-vapor-modules-pro' ),
								'dark'  => __( 'Dark', 'bb-vapor-modules-pro' ),
							),
						),
						'link_color'    => array(
							'type'    => 'color',
							'label'   => __( 'Select a Link Color', 'bb-vapor-modules-pro' ),
							'default' => '2b7bb9',
						),
					),
				),
			),
		),
	)
);
