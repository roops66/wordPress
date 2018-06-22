<?php

return array(
	'motive_portfolio' => array(
		'name' => 'Portfolio',
		'term' => 'Portfolio',
		'term_plural' => 'Items in portfolio',
		'order' => 'DESC',
		'has_single' => true,
		'url'	=>	_go('portfolio_url'),
		'post_options' => array(
			'supports'=> array( 'title', 'editor' , 'comments'),
			'taxonomies' => array('post_tag'),
			'has_archive'=>true
			),
		'taxonomy_options' => array('show_ui' => true),
		'options' => array(
			'cover_image' => array(
				'type' => 'image',
				'description' => 'Portfolio item cover/thumbnail (shown in the portfolio grids). If you use portfolio with columns you can upload smaller resolution images for the grid for a better website optimization',
				'title' => 'Cover',
				'default' => 'holder.js/240x240/auto'
			),
			'full_image' => array(
				'type' => 'image',
				'description' => 'Portfolio item full size image ( as big as you need - shown at zooming in )',
				'title' => 'Full Size',
				'default' => 'holder.js/940x799/auto'
			),
			'header_image'	=>	array(
				'title' => 'Header Image',
				'description' => 'Choose header image background.',
				'type' => 'image',
				'default' => 'holder.js/1920x617/auto'
			),
			'size'=>array(
				'type'=>'radio',
				'description' => 'Select box size (1x or 2x) used in the mosaic portfolio grid',
				'title' => 'Box Size',
				'label' => array('1'=>'1x', '2'=>'2x' , '3'=>'3x' , '4'=>'4x'),
				'default' => '2'
			),
			'link'	=>	array(
				'title' => 'Link to',
				'description' => 'Insert the URL of the page to which the grid item should be linked. Default is the single portfolio page.',
				'type' => 'line',
				'default' => ''
			),
			'header_title'	=>	array(
				'title' => 'Header Title',
				'description' => 'Insert the title that will appear on single portfolio page header. Default is the single portfolio item\'s title.',
				'type' => 'line',
				'default' => ''
			),
			'header_icon'	=>	array(
				'title' => 'Header Icon',
				'description' => 'Insert the icon slug for the header. See <a href="https://icomoon.io/#preview-free" target="_blank">here</a> all the icons.',
				'type' => 'line',
				'default' => 'briefcase2'
			),
			'header_icon_2'	=>	array(
				'title' => 'Header Icon 2',
				'description' => 'Insert the icon slug for the second header icon (above the title). See <a href="https://icomoon.io/#preview-free" target="_blank">here</a> all the icons.',
				'type' => 'line',
				'default' => 'cross'
			),
			'client'	=>	array(
				'title' => 'Client',
				'description' => 'Insert the client of the project.',
				'type' => 'line',
				'default' => ''
			),
		),
		'output' => array(
			'main' => array(
				'shortcode' => 'tesla_portfolio',
				'view' => 'views/portfolio_view',
				'shortcode_defaults' => array(
					'layout' => 'grid',
					'type' => '',
					'columns' => '4',
					'title' => '',
					'nr'=>'',
					'bg_url' => ''
				)
			),
			'second' => array(
				'shortcode' => 'tesla_portfolio_gallery',
				'view' => 'views/portfolio_view_gallery',
				'shortcode_defaults' => array(
					'type' => '',
					'title' => '',
					'description' => '',
					'bg_url' => '',
					'nr' => '',
				)
			),
			'third' => array(
				'shortcode' => 'tesla_portfolio_gallery_2',
				'view' => 'views/portfolio_view_gallery_2',
				'shortcode_defaults' => array(
					'title' => '',
					'description' => '',
					'nr' => '',
					'tags' => '',
					'url' => '',
					'submit' => _x('View our portfolio','Portfolio Shortcode Button','motive')
				)
			),
			'single' => array(
				'view' => 'views/portfolio_single_view',
				'shortcode_defaults' => array(

				)
			),
		),
	'icon' => 'icons/favicon.png'
	),
	'motive_team' => array(
		'name' => 'Team',
		'term' => 'Team member',
		'term_plural' => 'Team members',
		'order' => 'ASC',
		'options' => array(
			'image' => array(
				'type' => 'image',
				'description' => 'Image of the team member',
				'title' => 'Image',
				'default' => 'holder.js/220x220/auto'
			),
			'position' => array(
				'type' => 'line',
				'description' => 'Position of the team member',
				'title' => 'Position'
			),
			'description' => array(
				'type' => 'text',
				'description' => 'Description of the team member',
				'title' => 'Description'
			),
			'facebook' => array(
				'type' => 'line',
				'description' => 'Facebook URL of the team member',
				'title' => 'Facebook'
			),
			'twitter' => array(
				'type' => 'line',
				'description' => 'Twitter URL of the team member',
				'title' => 'Twitter'
			),
			'pinterest' => array(
				'type' => 'line',
				'description' => 'Pinterest URL of the team member',
				'title' => 'Pinterest'
			),
			'url' => array(
				'type' => 'line',
				'description' => 'This URL will be applied to the image of the team member.',
				'title' => 'URL (optional)'
			)
		),
		'output' => array(
			'main' => array(
				'shortcode' => 'tesla_team',
				'view' => 'views/team_view',
				'shortcode_defaults' => array(
					'nr'=>'',
					'new_member_url' =>'',
					'new_member_img' =>'',
					'type' => ''
				)
			),
		),
		'icon' => 'icons/favicon.png'
	),
	'motive_testimonials' => array(
		'name' => 'Testimonials',
		'term' => 'testimonial',
		'term_plural' => 'testimonials',
		'order' => 'ASC',
		'has_single' => false,
		'post_options' => array('supports'=>array('title','editor','thumbnail')),
		'taxonomy_options' => array('show_ui'=>true),
		'options' => array(
			'position' => array(
				'type' => 'line',
				'description' => 'Position of the team member',
				'title' => 'Position'
			),
		),
		'icon' => 'icons/favicon.png',
		'output_default' => 'main',
		'output' => array(
			'main' => array(
				'shortcode' => 'tesla_testimonials',
				'view' => 'views/testimonials-view',
				'shortcode_defaults' => array(					
					'layout' => 'single',
					'bg_url' => '',
					'nr' => '',
					'speed'	=>	1000,
				)
			),			
		)
	),
	'partners' => array(
		'name' => 'Partners',
		'term' => 'partner',
		'term_plural' => 'partners',
		'order' => 'ASC',
		'has_single' => false,
		'post_options' => array('supports'=>array('title','thumbnail')),
		'taxonomy_options' => array('show_ui'=>true),
		'options' => array(
			'url' => array(
				'type' => 'line',
				'description' => 'Partner URL',
				'title' => 'Partner URL'
			),
		),
		'icon' => 'icons/favicon.png',
		'output_default' => 'main',
		'output' => array(
			'main' => array(
				'shortcode' => 'tesla_partners',
				'view' => 'views/partner-view',
				'shortcode_defaults' => array(	
					'type' => '1',
					'title'=>'',
					'layout' =>'single',
					'nr' => ''
				)
			),			
		)
	),
	'services' => array(
		'name' => 'Services',
		'term' => 'service',
		'term_plural' => 'services',
		'order' => 'ASC',
		'has_single' => false,
		'post_options' => array('supports'=>array('title','editor')),
		'taxonomy_options' => array('show_ui'=>true),
		'options' => array(
			'icon' => array(
				'type' => 'line',
				'icon' => 'Service icon',
				'title' => 'Service icon',
				'description' => 'Insert the icon slug for the second header icon (above the title). See <a href="http://fortawesome.github.io/Font-Awesome/icons/">here</a> all the icons.',
			),
			'url' => array(
				'type' => 'line',
				'url' => 'Service url',
				'title' => 'Service url'
			),
		),
		'icon' => 'icons/favicon.png',
		'output_default' => 'main',
		'output' => array(
			'main' => array(
				'shortcode' => 'tesla_services',
				'view' => 'views/services-view',
				'shortcode_defaults' => array(	
					'type' => '',
					'layout' => '',
					'columns' => '4',
					'nr' => ''
				)
			),			
		)
	),
);