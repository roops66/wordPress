<?php

return array(
	'favico' => array(
		'dir' => '/theme_config/icons/favicon.png'
	),
	'option_saved_text' => 'Options successfully saved',
	'tabs' => array(
		array(
			'title'=>'General Options',
			'icon'=>1,
			'boxes' => array(
				'Logo Customization' => array(
					'icon'=>'customization',
					'size'=>'2_3',
					'columns'=>true,
					'description'=>'Here you upload a image as logo or you can write it as text and select the logo color, size, font.',
					'input_fields' => array(
						'Logo As Image'=>array(
							'size'=>'half',
							'id'=>'logo_image',
							'type'=>'image_upload',
							'note'=>'Here you can insert your link to a image logo or upload a new logo image.'
						),
						'Logo As Text'=>array(
							'size'=>'half_last',
							'id'=>'logo_text',
							'type'=>'text',
							'note' => "Type the logo text here, then select a color, set a size and font",
							'color_changer'=>true,
							'font_changer'=>true,
							'font_size_changer'=>array(8,50, 'px'),
							'font_preview'=>array(true, true)
						)
					)
				),
				'Favicon' => array(
					'icon'=>'customization',
					'size'=>'1_3_last',
					'input_fields' => array(
						array(
							'id'=>'favicon',
							'type'=>'image_upload',
							'note'=>'Here you can upload the favicon icon.'
						)
					)
				),
				'Custom CSS' => array(
					'icon'=>'css',
					'size'=>'half',
					'description'=>'Here you can write your personal CSS for customizing the classes you want. Or use our <b>Custom Styler</b>, from the Site Colors tab, for an easier custom css color picking.',
					'input_fields' => array(
						array(
							'id'=>'custom_css',
							'type'=>'textarea'
						)
					)
				),
				'Custom JS' => array(
					'icon'=>'js',
					'size'=>'half_last',
					'description'=>'Here you can write your personal JS that will be appended to footer.<br><br>',
					'input_fields' => array(
						array(
							'id'=>'custom_js',
							'type'=>'textarea'
						)
					)
				)
			)
		),
		array(
			'title' => 'Site Colors',
			'icon'=>4,
			'boxes' => array(
				'Background Customization'=>array(
					'icon'=>'customization',
					'columns'=>true,
					'size' => '1',
					'input_fields' => array(
							'Background Color'=>array(
								'size'=>'half',
								'id'=>'bg_color',
								'type'=>'colorpicker'
							),
							'Background Image' => array(
								'size'=>'half_last',
								'id'=>'bg_image',
								'type'=>'image_upload'
							)
						)
					),
					'Site Colors' => array(
						'icon'=>'background',
						'columns'=>true,
						'size' => '1',
						'input_fields' => array(
							'Primary Site Color'=>array(
								'size'=>'1_3',
								'id'=>'site_color',
								'type'=>'colorpicker',
								'note'=>'Choose primary color for your website. This will affect only specific elements.<br>To return to default color , open colorpicker and click the Clear button.'
							),
							'Secondary Site Color'=>array(
								'size'=>'1_3',
								'id'=>'site_color_2',
								'type'=>'colorpicker',
								'note'=>'Choose secondary color for your website. This will affect only specific elements.<br>To return to default color , open colorpicker and click the Clear button.'
							),
							'Tertiary Site Color'=>array(
								'size'=>'1_3_last',
								'id'=>'site_color_3',
								'type'=>'colorpicker',
								'note'=>'Choose tertiary color for your website. This will affect only specific elements.<br>To return to default color , open colorpicker and click the Clear button.'
							)
						)
					),
					'Custom Styler'=>array(
						'icon' => 'customization',
						'description'=>"Add new custom CSS rules with ease. <a target='_blank' href='http://teslathemes.com/doc/yopta/#fw-custom-styler'>How to use ?</a>",
						'size'=>'half',
						'repeater' => 'Add new rule/style',
						'input_fields' =>array(
							'CSS Selector'=>array(
								'size'=>'1_3',
								'id'=>'custom_selector',
								'type'=>'text',
								'placeholder' => '.class',
								'note' => "Insert CSS selector that will be used when applying the custom colors.",
								),
							'Color'=>array(
								'type'=>'colorpicker',
								'id'=>'custom_color',
								'note'=>'Custom color applied to the elemnts matching the above css selector.'
								),
							'Background Color'=>array(
								'type'=>'colorpicker',
								'id'=>'custom_bg_color',
								'note'=>'Custom background color applied to the elemnts matching the above css selector.'
								),
							'Important' => array(
								'id'    => 'important',
								'type'  => 'checkbox',
								'label' => 'If the colors are not applied you can try selecting this checkbox to make them important.',
							),
						)
					),
				)
			),
			array(
				'title' => 'Typography',
				'icon'  => 1,
				'boxes' => array(
					'Font Changers'=>array(
						'icon' => 'customization',
						'description'=>'Change the fonts & colors for site\'s sections:',
						'size'=>'1',
						'columns'=>true,
						'input_fields' => array(
							'Main Content Font/Color'=>array(
								'size'=>'1_3',
								'id'=>'main_content_text',
								'type'=>'text',
								'note' => "Then select a color, set a size and choose a font",
								'color_changer'=>true,
								'font_changer'=>true,
								'font_size_changer'=>array(8,50, 'px'),
								'hide_input'=>true,
							),
							'Sidebar Font/Color'=>array(
								'size'=>'1_3',
								'id'=>'sidebar_text',
								'type'=>'text',
								'note' => "Then select a color, set a size and choose a font",
								'color_changer'=>true,
								'font_changer'=>true,
								'font_size_changer'=>array(8,50, 'px'),
								'hide_input'=>true,
							),
							'Menu Font/Color'=>array(
								'size'=>'1_3_last',
								'id'=>'menu_text',
								'type'=>'text',
								'note' => "Then select a color, set a size and choose a font",
								'color_changer'=>true,
								'font_changer'=>true,
								'font_size_changer'=>array(8,50, 'px'),
								'hide_input'=>true,
							),
								
						)
					),
						
				)
			),
		array(
			'title' => 'SEO and Socials',
			'icon'=>2,
			'boxes'=>array(
				'ShareThis feature'=>array(
					'icon'=>'social',
					'description'=>"To use this service please select your favorite social networks",
					'size'=>'3',
					'input_fields'=>array(
						array(
							'type'  => 'select',
							'id'    => 'share_this',
							'label' => 'Facebook',
							'class'  => 'social_search',
							'multiple' => true,
							'options'=>array('Google'=>'googleplus','Facebook'=>'facebook','Twitter'=>'twitter','Pinterest'=>'pinterest','Linkedin'=>"linkedin",'Vkontakte'=>'vkontakte')
						),
					)
				),
				'Social Platforms'=>array(
					'icon'=>'social',
					'description'=>"Insert the link to the social share page.",
					'size'=>'3',
					'columns'=>true,
					'input_fields'=>array(
						array(
							'id'=>'social_platforms',
							'size'=>'half',
							'type'=>'social_platforms',
							'platforms'=>array('facebook','twitter','google','pinterest','linkedin','dribbble','behance','youtube','flickr','rss')
						),
					)
				),
				'Tracking Code' => array(
					'icon'=>'track',
					'size'=>'3_last',
					'input_fields'=>array(
						array(
							'type'=>'textarea',
							'id'=>'tracking_code'
						)
					)
				),
				'Twitter Settings'=>array(	
					'icon' => 'customization',
					'description'=>"Used by the Twitter widget. Visit <a href='https://dev.twitter.com/apps/new' target='_blank'>Twitter Apps</a> , create your App , press 'Generate Access token at the bottom', insert the following from the 'Oauth' tab.",
					'size'=>'1_3_last',
					'columns'=>false,
					'input_fields' =>array(
						'Consumer Key' => array(
							'id'    => 'twitter_consumerkey',
							'type'  => 'text',
							'size' => '1'
						),
						'Consumer Secret' => array(
							'id'    => 'twitter_consumersecret',
							'type'  => 'text',
							'size' => '1',
						),
						'Access Token' => array(
							'id'    => 'twitter_accesstoken',
							'type'  => 'text',
							'size' => '1',
						),
						'Access Token Secret' => array(
							'id'    => 'twitter_accesstokensecret',
							'type'  => 'text',
							'size' => '1',
						)
					)
				),
			)
		),
		array(
			'title' => 'Contact Info',
			'icon'  => 5,
			'boxes' => array(
				'Contact info'=>array(
					'icon' => 'customization',
					'description'=>"Provide contact information. This information will appear in contact template. For more informations read documentation.",
					'size'=>'2_3',
					'columns'=>true,
					'input_fields' =>array(
						'Show Map' => array(
							'id'    => 'show_map_contact',
							'type'  => 'checkbox',
							'label' => 'To use Google Map, the above checkbox must be checked',
							'size' => '1',
							'action' => array('show',array('map-wrapper'))
						),
						'Map' => array(
							'id'    => 'map-wrapper',
							'type'  => 'map',
							'note' => 'Just navigate to the location you want to be displayed on the google map and if you want a pin over your location , press the "Drop marker here" button. ' ,
							'size' => '1',
							'icons' => array('google-marker.gif','home.png','home_1.png','home_2.png','administration.png','office-building.png','../../../../theme_config/icons/Motive-map.png')
						),
						'Map Border' => array(
							'id' => 'map_border',
							'type' => 'image_upload',
							'note' => 'Here you can choose a map border on your Contact Page',
							'size' => 'half',
							),
						'Contact Page Background' => array(
							'id' => 'contact_background',
							'type' => 'image_upload',
							'note' => 'Choose a background image for your Contact Page.',
							'size' => 'half_last'
							),
						'Contact info' => array(
							'id'    => 'contact_form',
							'type'  => 'checkbox',
							'label' => 'To use Contact Form , the above checkbox must be checked',
							'size' => '1',
							'action' => array('show',array('email_contact','contact_address'))
						),
						'Contact e-mail'=> array(
							'id'    => 'email_contact',
							'type'  => 'text',
							'note' => 'Provide an email, used to recive messages from Contact Form',
							'size' => '1',
							'placeholder' => 'Contact Form Email'
						),
						'Contact address' => array(
							'id'    => 'contact_address',
							'type'  => 'textarea',
							'note' => 'Provide your address',
							'size' => '1'
						),
					)
				),
				'Phone numbers'=>array(
					'icon' => 'customization',
					'description'=>"A list of offices with respective contact details.",
					'size'=>'1_3_last',
					'repeater' => 'Add new',
					'input_fields' =>array(
						'Phone'=>array(
							'type'=>'text',
							'id'=>'office_phone',
							'placeholder'=>'Phone',
							'note'=>'Phone'
						)
					)
				),
			)
		),
		array(
			'title' => 'Additional Options',
			'icon'  => 6,
			'boxes' => array(
				'404 page settings'=>array(
					'icon' => 'customization',
					'description'=>"Setup your 404 page",
					'size'=>'half',
					'input_fields' =>array(
						'Page title' => array(
							'id'    => 'error_title',
							'type'  => 'text',
							'note' => 'This is the title of the 404 page',
						),
						'Message' => array(
							'id'    => 'error_message',
							'type'  => 'textarea',
							'note' => 'This message will appear on 404 page. Wrap text in [<span></span>] to enhance it .',
						),
						'Error 404 Image'=>array(
							'size'=>'half',
							'id'=>'error_404',
							'type'=>'image_upload',
							'note'=>'Here you can upload image for error page 404 .'
						),
						'Error 404 Background Color'=>array(
							'id'=>'back_color',
							'note' => 'Here you can choose a color for error page 404.',
							'type' => 'colorpicker'
						),
					),
				),
				'Related Posts Settings'=>array(
					'icon' => 'customization',
					'size'=>'half_last',
					'columns'=>false,
					'input_fields' =>array(
						'Related Posts Title'=>array(
							'id'  => 'related_posts_title',
							'type'  => 'text',
							'label' => 'Set the Title for Related Posts'
						),
						'Related Posts Number'=>array(
							'id'  => 'related_posts_number',
							'type'  => 'select',
							'label' => 'Number of Related Posts to be displayed',
							'range' => array(0,6),
							'range_type' => 'digit'
						),
						array(
							'id'  => 'show_related_posts',
							'type'  => 'checkbox',
							'label' => 'Show Similar Posts for Post Page',
						),
					),
				),
				'Page Settings' =>	array(
					'icon'	=>	'customization',
					'size' =>	'half_last',
					'columns'	=>	false,
					'input_fields' =>	array(
							'Single Portfolio Permalink' => array(
								'id'	=>	'portfolio_url',
								'type'	=>	'text',
								'label'	=>	'Change Portfolio Url',
							),
						)
					),
				'Footer Settings' => array(
					'icon' => 'customization',
					'size' => '1',
					'columns' => false,
					'input_fields' => array(
						'Footer Style'=>array(
							'id' => 'footer_style',
							'type' => 'radio',
							'label' => 'Chose Your Footer Style',
							'values' => array('Style_1','Style_2'),
						),
						'Contact Form' => array(
							'id' => 'footer_contact_form',
							'type' => 'checkbox',
							'label' => 'Show Contact Form in Footer Area'
						),
						'Map' => array(
							'id' => 'show_map_footer',
							'type' => 'checkbox',
							'label' => 'Show Map in Footer Area'
						),
						'Copyright Message' => array(
							'id'    => 'copyright_message',
							'type'  => 'text',
							'note' => 'Message that will appear in the footer.'
						),
					),
				),
			),
		),
		array(
				'title' => 'Subscription',
				'icon'  => 7,
				'boxes' => array(
						'Subscribers'=>array(
								'icon' => 'social',
								'description'=>'First 20 subscribers are listed here. To get the full list export files using buttons below:',
								'size'=>'full',
								'input_fields' => array(
										array(
												'type'=>'subscription',
												'id'=>'subscription_list'
										)
								)
						)
				)
		),
	),
	'styles' => array( array('wp-color-picker'),'style','select2' )
	,
	'scripts' => array( array( 'jquery', 'jquery-ui-core','jquery-ui-datepicker','wp-color-picker' ), 'select2.min','jquery.cookie','tt_options', 'admin_js' )
);