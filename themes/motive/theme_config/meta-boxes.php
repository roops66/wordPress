<?php 
return array(
	'metaboxes'	=>	array(
		array(
			'id'             => 'sidebar_',            // meta box id, unique per meta box
			'title'          => _x('Page Settings','meta boxes','motive'),   // meta box title
			'post_type'      => array('page'),		// post types, accept custom post types as well, default is array('post'); optional
			'taxonomy'       => array(),    // taxonomy name, accept categories, post_tag and custom taxonomies
			'context'		 => 'normal',						// where the meta box appear: normal (default), advanced, side; optional
			'priority'		 => 'low',						// order of meta box: high (default), low; optional
			'input_fields'   => array(          			// list of meta fields 
				'sidebar_position'=>array(
					'name'=> _x('Sidebar Position','meta boxes','motive'),
					'type'=>'select',
					'values'=>array(
							'full_width'=>_x('No Sidebar/Full Width','meta boxes','motive'),
							'right'=>_x('Right','meta boxes','motive'),
							'left'=>_x('Left','meta boxes','motive'),
					),
				'std'=>'right'  //default value selected
				),
				'header_layout'=>array(
					'name'=> _x('Page Nav Menu Layout','meta boxes','motive'),
					'type'=>'select',
					'values'=>array(
							'fixed'=>_x('Fixed','meta boxes','motive'),
							'un-fixed'=>_x('Motive Style','meta boxes','motive'),
					),
				'std'=>'un-fixed'  //default value selected
				),
				'header_type'=>array(
					'name'=> _x('Page Nav Menu Type','meta boxes','motive'),
					'type'=>'select',
					'values'=>array(
							'blog-page'=>_x('Initial with black background','meta boxes','motive'),
							'page'=>_x('Initial Transparent','meta boxes','motive'),
					),
				'std'=>'blog-page'  //default value selected
				),
				'header_image'=>array(
					'name'=> _x('Page Header Image','meta boxes','motive'),
					'type'=>'image',
					'notice' => _x('Insert your image URL for Page Header','meta boxes','motive'),				
				),
				'header_icon'=>array(
					'name'=> _x('Page Header Icon','meta boxes','motive'),
					'type'=>'text',
					'values'=>array(
							'name'=>_x("Insert your icon slug for Page Header",'meta boxes','motive'),
							'desc'=>_x('Choose an icon from <a href="https://icomoon.io/#preview-free" target="_blank">here</a>','meta boxes','motive'),
							'type'=>"text"						
					)				
				)
			)
		),
		array(
			'id'             => 'sidebar_',            // meta box id, unique per meta box
			'title'          => _x('Post Settings','meta boxes','motive'),   // meta box title
			'post_type'      => array('post'),		// post types, accept custom post types as well, default is array('post'); optional
			'taxonomy'       => array(),    // taxonomy name, accept categories, post_tag and custom taxonomies
			'context'		 => 'normal',						// where the meta box appear: normal (default), advanced, side; optional
			'priority'		 => 'low',						// order of meta box: high (default), low; optional
			'input_fields'   => array(            			// list of meta fields 
				'sidebar_position'=>array(
					'name'=> _x('Sidebar Position','meta boxes','motive'),
					'type'=>'select',
					'values'=>array(
							'as_blog'=>_x('Same as Blog Page','meta boxes','motive'),
							'full_width'=>_x('No Sidebar/Full Width','meta boxes','motive'),
							'right'=>_x('Right','meta boxes','motive'),
							'left'=>_x('Left','meta boxes','motive'),
						),
					'std'=>'as_blog'  //default value selected
					)
				)
			),
		array(
			'id'             => 'video_featured',// meta box id, unique per meta box
			'title'          => _x('Featured Video Embed','meta boxes','motive'),         // meta box titl,'meta boxes','motive')e
			'post_type'      => array('post'),
			'priority'		 => 'low',
			'context'		=> 'normal',
			'input_fields'   => array(            // list of meta fields (can be added by field arrays)
				'video_embed'=>array(
					'name'=>_x("Insert your embed code",'meta boxes','motive'),
					'type'=>"text",
					'rows'=> 3 ,
					)
				)
			),
		array(
			'id'             => 'audio_featured',// meta box id, unique per meta box
			'title'          => _x('Featured Audio Embed','meta boxes','motive'),         // meta box titl,'meta boxes','motive')e
			'post_type'      => array('post'),
			'priority'		 => 'low',
			'context'		=> 'normal',
			'input_fields'   => array(            // list of meta fields (can be added by field arrays)
				'audio_embed'=>array(
					'name'=>_x("Insert your embed code",'meta boxes','motive'),
					'type'=>"text",
					)
				)
			),
		array(
			'id'             => 'sidebar_',            // meta box id, unique per meta box
			'title'          => _x('Page Settings','meta boxes','motive'),   // meta box title
			'post_type'      => array('motive_portfolio'),		// post types, accept custom post types as well, default is array('post'); optional
			'taxonomy'       => array(),    // taxonomy name, accept categories, post_tag and custom taxonomies
			'context'		 => 'normal',						// where the meta box appear: normal (default), advanced, side; optional
			'priority'		 => 'low',						// order of meta box: high (default), low; optional
			'input_fields'   => array(          			// list of meta fields 
				'header_layout'=>array(
					'name'=> _x('Page Nav Menu Layout','meta boxes','motive'),
					'type'=>'select',
					'values'=>array(
							'fixed'=>_x('Fixed','meta boxes','motive'),
							'un-fixed'=>_x('Motive Style','meta boxes','motive'),
					),
				'std'=>'un-fixed'  //default value selected
				),
				'header_type'=>array(
					'name'=> _x('Page Nav Menu Type','meta boxes','motive'),
					'type'=>'select',
					'values'=>array(
							'blog-page'=>_x('Initial with black background','meta boxes','motive'),
							'page'=>_x('Initial Transparent','meta boxes','motive'),
					),
				'std'=>'blog-page'  //default value selected
				),
				)
			),
		)
	);