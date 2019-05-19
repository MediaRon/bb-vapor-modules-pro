<?php
class MediaRon_Jetpack_Sharing_Module extends FLBuilderModule {
	public function __construct()
	{
		parent::__construct(array(
			'name'            => __( 'Jetpack Sharing Icons', 'mediaron-bb-modules' ),
			'description'     => __( 'Jetpack Sharing Icons for Beaver Builder', 'mediaron-bb-modules' ),
			'category'        => __( 'External Plugins', 'mediaron-bb-modules' ),
			'group'           => __( 'MediaRon Modules', 'mediarion-bb-modules' ),
			'dir'             => MEDIARON_BEAVER_BUILDER_DIR . 'mediaron-modules/jetpack-sharing/',
			'url'             => MEDIARON_BEAVER_BUILDER_URL . 'mediaron-modules/jetpack-sharing/',
			'editor_export'   => true, // Defaults to true and can be omitted.
			'enabled'         => true, // Defaults to true and can be omitted.
			'partial_refresh' => false, // Defaults to false and can be omitted.
		));
	}
}
/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('MediaRon_Jetpack_Sharing_Module', array(
	'general'       => array( // Tab
		'title'         => __('General', 'mediaron-bb-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'general'       => array( // Section
				'title'         => __('Jetpack Sharing Icons', 'mediaron-bb-modules'), // Section Title
				'fields'        => array( // Section Fields
					'show_headline' => array(
						'type' => 'select',
						'label' => __( 'Show Sharing Headline', 'mediaron-bb-modules' ),
						'options' => array(
							'yes' => __( 'Yes', 'mediaron-bb-modules' ),
							'no' => __( 'No', 'mediaron-bb-modules' ),
						),
						'default' => 'yes',
						'toggle' => array( 'yes' => array( 'tabs' => array( 'headline' ) ) )
					),
					'load_css' => array(
						'type' => 'select',
						'label' => __( 'Load CSS', 'mediaron-bb-modules' ),
						'options' => array(
							'yes' => __( 'Yes', 'mediaron-bb-modules' ),
							'no' => __( 'No', 'mediaron-bb-modules' ),
						),
						'default' => 'no',
						'help' => __( 'Enable if you have one sharing option per page, otherwise leave off.', 'mediaron-bb-modules' )
					),
					'sharing_display' => array(
						'type' => 'select',
						'label' => __( 'Button Style', 'mediaron-bb-modules' ),
						'options' => array(
							'icon' => __( 'Icons Only', 'mediaron-bb-modules' ),
							'icon-text' => __( 'Icon + Text', 'mediaron-bb-modules' ),
							'text' => __( 'Text Only', 'mediaron-bb-modules' ),
							'official' => __( 'Official Buttons', 'mediaron-bb-modules' ),
						),
						'default' => 'icon-text',
						'toggle' => array(
							'icon-text' => array( 'tabs' => array( 'button_text', 'button_styles' ), 'sections' => array( 'icon_styles' ) ),
							'text' => array( 'tabs' => array( 'button_text', 'button_styles' ) )
						),
						'help' => __( 'You may need to save and refresh to see the official buttons if that option is selected.', 'mediaron-bb-modules' )
					),
				)
			)
		)
	),
	'headline'       => array( // Tab
		'title'         => __('Headline', 'mediaron-bb-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'headline'       => array( // Section
				'title'         => __('Headline', 'mediaron-bb-modules'), // Section Title
				'fields'        => array( // Section Fields
					'sharing_headline' => array(
						'type' => 'text',
						'label' => __( 'Sharing Headline', 'mediaron-bb-modules' ),
						'default' => __( 'Share this:', 'mediaron-bb-modules' ),
					),
					'sharing_headline_color' => array(
						'type' => 'color',
						'label' => __( 'Sharing Headline Color', 'mediaron-bb-modules' ),
						'show_reset' => true,
						'show_alpha' => true,
					),
					'sharing_headline_typography' => array(
						'type' => 'typography',
						'label' => __( 'Sharing Headline Typography', 'mediaron-bb-modules' ),
					),
					'sharing_headline_padding' => array(
						'type' => 'dimension',
						'label' => __( 'Sharing Headline Padding', 'mediaron-bb-modules' ),
						'responsive' => true,
					),
					'sharing_headline_margin' => array(
						'type' => 'dimension',
						'label' => __( 'Sharing Headline Margin', 'mediaron-bb-modules' ),
						'responsive' => true,
					),
					'sharing_headline_show_top_border' => array(
						'type' => 'select',
						'label' => __( 'Show Top Border', 'mediaron-bb-modules' ),
						'options' => array(
							'yes' => __( 'Yes', 'mediaron-bb-modules' ),
							'no' => __( 'No', 'mediaron-bb-modules' ),
						),
						'default' => 'yes',
					),
					'sharing_headline_display' => array(
						'type' => 'select',
						'label' => __( 'Display', 'mediaron-bb-modules' ),
						'options' => array(
							'inline' => __( 'Inline Block', 'mediaron-bb-modules' ),
							'block' => __( 'Block', 'mediaron-bb-modules' ),
						),
						'default' => 'inline',
						'toggle' => array( 'block' => array( 'fields' => array( 'sharing_headline_align' ) ) ),
						'help' => __( 'Displaying as a block allows you to align the headline text.', 'mediaron-bb-modules' )
					),
					'sharing_headline_align' => array(
						'type' => 'align',
						'label' => __( 'Align', 'mediaron-bb-modules' ),
						'default' => 'left',
					)
				)
			)
		)
	),
	'button_text'       => array( // Tab
		'title'         => __('Button Text', 'mediaron-bb-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'button_text'       => array( // Section
				'title'         => __('Button Text', 'mediaron-bb-modules'), // Section Title
				'fields'        => array( // Section Fields
					'twitter' => array(
						'type' => 'text',
						'label' => __( 'Twitter', 'mediaron-bb-modules' ),
						'default' => __( 'Twitter', 'mediaron-bb-modules' ),
					),
					'facebook' => array(
						'type' => 'text',
						'label' => __( 'Facebook', 'mediaron-bb-modules' ),
						'default' => __( 'Facebook', 'mediaron-bb-modules' ),
					),
					'whatsapp' => array(
						'type' => 'text',
						'label' => __( 'WhatsApp', 'mediaron-bb-modules' ),
						'default' => __( 'WhatsApp', 'mediaron-bb-modules' ),
					),
					'pocket' => array(
						'type' => 'text',
						'label' => __( 'Pocket', 'mediaron-bb-modules' ),
						'default' => __( 'Pocket', 'mediaron-bb-modules' ),
					),
					'print' => array(
						'type' => 'text',
						'label' => __( 'Print', 'mediaron-bb-modules' ),
						'default' => __( 'Print', 'mediaron-bb-modules' ),
					),
					'reddit' => array(
						'type' => 'text',
						'label' => __( 'Reddit', 'mediaron-bb-modules' ),
						'default' => __( 'Reddit', 'mediaron-bb-modules' ),
					),
					'linkedin' => array(
						'type' => 'text',
						'label' => __( 'LinkedIn', 'mediaron-bb-modules' ),
						'default' => __( 'LinkedIn', 'mediaron-bb-modules' ),
					),
					'telegram' => array(
						'type' => 'text',
						'label' => __( 'Telegram', 'mediaron-bb-modules' ),
						'default' => __( 'Telegram', 'mediaron-bb-modules' ),
					),
					'skype' => array(
						'type' => 'text',
						'label' => __( 'Skype', 'mediaron-bb-modules' ),
						'default' => __( 'Skype', 'mediaron-bb-modules' ),
					),
					'tumblr' => array(
						'type' => 'text',
						'label' => __( 'Tumblr', 'mediaron-bb-modules' ),
						'default' => __( 'Tumblr', 'mediaron-bb-modules' ),
					),
					'pinterest' => array(
						'type' => 'text',
						'label' => __( 'Pinterest', 'mediaron-bb-modules' ),
						'default' => __( 'Pinterest', 'mediaron-bb-modules' ),
					),
					'email' => array(
						'type' => 'text',
						'label' => __( 'Email', 'mediaron-bb-modules' ),
						'default' => __( 'Email', 'mediaron-bb-modules' ),
					)
				)
			)
		)
	),
	'button_styles'       => array( // Tab
		'title'         => __('Button Styles', 'mediaron-bb-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'icon_styles'       => array( // Section
				'title'         => __('Icon Styles', 'mediaron-bb-modules'), // Section Title
				'fields'        => array( // Section Fields
					'icon_color' => array(
						'type' => 'color',
						'label' => __( 'Icon Color', 'mediaron-bb-modules' ),
						'show_reset' => true,
					),
					'icon_color_hover' => array(
						'type' => 'color',
						'label' => __( 'Icon Color on Hover', 'mediaron-bb-modules' ),
						'show_reset' => true,
					),
					'icon_size' => array(
						'type' => 'unit',
						'label' => __( 'Icon Size', 'mediaron-bb-modules' ),
						'default' => '18',
						'description' => 'px',
						'responsive' => true
					)
				)
			),
			'button_styles'       => array( // Section
				'title'         => __('Button Styles', 'mediaron-bb-modules'), // Section Title
				'fields'        => array( // Section Fields
					'button_typography' => array(
						'type' => 'typography',
						'label' => __( 'Button Typography', 'mediaron-bb-modules' ),
						'responsive' => true
					),
					'button_text_color' => array(
						'type' => 'color',
						'label' => __( 'Button Text Color', 'mediaron-bb-modules' ),
						'show_reset' => true,
					),
					'button_text_color_hover' => array(
						'type' => 'color',
						'label' => __( 'Button Text Color on Hover', 'mediaron-bb-modules' ),
						'show_reset' => true,
					),
					'button_maybe_gradient' => array(
						'type' => 'select',
						'label' => __( 'Button Background Type', 'mediaron-bb-modules' ),
						'options' => array(
							'color' => __( 'Color', 'mediaron-bb-modules' ),
							'gradient' => __( 'Gradient', 'mediaron-bb-modules' ),
						),
						'default' => 'color',
						'toggle' => array(
							'color' => array( 'fields' => array( 'button_background_color', 'button_background_color_hover' ) ),
							'gradient' => array( 'fields' => array( 'button_background_gradient', 'button_background_gradient_hover' ) ),
						)
					),
					'button_background_color' => array(
						'type' => 'color',
						'label' => __( 'Button Background Color', 'mediaron-bb-modules' ),
						'show_reset' => true,
						'show_alpha' => true,
					),
					'button_background_color_hover' => array(
						'type' => 'color',
						'label' => __( 'Button Background Color on Hover', 'mediaron-bb-modules' ),
						'show_reset' => true,
						'show_alpha' => true,
					),
					'button_background_gradient' => array(
						'type' => 'gradient',
						'label' => __( 'Button Background Gradient', 'mediaron-bb-modules' ),
					),
					'button_background_gradient_hover' => array(
						'type' => 'gradient',
						'label' => __( 'Button Background Gradient on Hover', 'mediaron-bb-modules' ),
					),
					'button_border' => array(
						'type' => 'border',
						'label' => __( 'Button Border', 'mediaron-bb-modules' ),
						'responsive' => true,
					),
					'button_padding' => array(
						'type' => 'dimension',
						'label' => __( 'Button Padding', 'mediaron-bb-modules' ),
						'responsive' => true,
					),
					'button_margin' => array(
						'type' => 'dimension',
						'label' => __( 'Button Margin', 'mediaron-bb-modules' ),
						'responsive' => true,
					),

				),
			),
			'button_layout'       => array( // Section
				'title'         => __('Button Layout', 'mediaron-bb-modules'), // Section Title
				'fields'        => array( // Section Fields
					'button_layout_type' => array(
						'type' => 'select',
						'label' => __( 'Button Layout Type', 'mediaron-bb-modules' ),
						'options' => array(
							'flex' => __( 'Flex Layout', 'mediaron-bb-modules' ),
							'block' => __( 'Block Layout', 'mediaron-bb-modules' ),
							'inline' => __( 'Inline Layout', 'mediaron-bb-modules' ),
						),
						'default' => 'inline',
						'toggle' => array(
							'flex' => array( 'fields' => array( 'flex_columns', 'flex_layout_align' ) ),
							'block' => array( 'fields' => array( 'block_width', 'block_align' ) ),
						)
					),
					'flex_columns' => array(
						'type' => 'select',
						'label' => __( 'Number of Columns', 'mediaron-bb-modules' ),
						'options' => array(
							'1' => '1',
							'2' => '2',
							'3' => '3',
							'4' => '4',
							'5' => '5',
							'6' => '6',
						),
						'default' => '6',
						'help' => __( 'Columns work best if there is no margin on the buttons.', 'mediaron-bb-modules' ),
					),
					'flex_layout_align' => array(
						'type' => 'align',
						'label' => __( 'Align Button Text', 'mediaron-bb-modules' ),
						'values'  => array(
							'left'   => 'flex-start',
							'center' => 'center',
							'right'  => 'flex-end',
						),
						'default' => 'flex-start',
					),
					'block_width' => array(
						'type' => 'unit',
						'label' => __( 'Block Width', 'mediaron-bb-modules' ),
						'description' => '%',
						'default' => '100',
						'responsive' => true,
					),
					'block_align' => array(
						'type' => 'align',
						'label' => __( 'Block Align', 'mediaron-bb-modules' ),
						'values'  => array(
							'left'   => '5px auto 5px 0',
							'center' => '5px auto',
							'right'  => '5px 0 5px auto',
						),
						'default' => 'left',
					),
					'block_text_align' => array(
						'type' => 'align',
						'label' => __( 'Block Text Align', 'mediaron-bb-modules' ),
						'values'  => array(
							'left'   => 'flex-start',
							'center' => 'center',
							'right'  => 'flex-end',
						),
						'default' => 'flex-start',
					)
				)
			)
		)
	),
) );